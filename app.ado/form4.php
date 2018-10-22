<?php

	function __autoload($classe) {

	$pastas = array('app.ado','app.widgets');
	foreach($pastas as $pasta){	

 	if (file_exists("../{$pasta}/{$classe}.class.php")) {

 		include_once "../{$pasta}/{$classe}.class.php"; 	
 	}
  }
}

	class livroRecord extends TRecord{}

	class livroForm extends TPage{

		private $form;

		function __construct(){

			parent::__construct();
			$this->form = new TForm;
			$this->form->setName('form_livros');

			$panel = new TPanel(400,300);
			$this->form->add($panel);

			$panel->put(new TLabel('ID'), 10,10);
			$panel->put($id = new TEntry('id'),100,10);
			$id->setSize(100);
			$id->setEditable(false);

			$panel->put(new TLabel('Titulo'), 10,40);
			$panel->put($titulo = new TEntry('titulo'),100,40);
		
			$panel->put(new TLabel('Autor'), 10,70);
			$panel->put($autor = new TEntry('autor'),100,70);

			$panel->put(new TLabel('Tema'), 10,100);
			$panel->put($tema = new TCombo('tema'),100,100);

			//cria um vetor com as opcoes da combo tema
			$itens = array();
			$itens['1'] = 'Administracao';
			$itens['2'] = 'Informatica';
			$itens['3'] = 'Economia';
			$itens['4'] = 'Matematica';
			//adiciona os itens na combo
			$tema->addItens($itens);

			$panel->put(new TImage('book.png'),320,20);
			
			$editora = new TEntry('editora');
			$panel->put(new TLabel('Editora'), 10,130);
			$panel->put($editora,100,130);
			
			$panel->put(new TLabel('Ano'),210,130);
			$panel->put($ano = new TEntry('ano'),260,130);

			$editora->setSize(100);
			$ano->setSize(40);

			$panel->put(new TLabel('Resumo'), 10,160);
			$panel->put($resumo = new TText('resumo'),100,160);

			//cria uma acao
			$panel->put($acao = new TButton('action'),320,240);
			$acao->setAction(new TAction(array($this,'onSave')),'Salvar');

			//define quais sao os campos do fomulario
			$this->form->setFields(array($id,$titulo,$autor,$tema,$editora,$ano,$resumo,$acao));

			parent::add($this->form);
		}

		function onSave(){

			try{

				TTransaction::open('my_banco');
				//obtem dados
				$livro = $this->form->getData('livroRecord');
				//armazena registro
				$livro->store();
				//joga os dados de volta ao formulario
				$this->form->setData($livro);
				//define o formulario como nao editavel
				$this->form->setEditable(false);
				TTransaction::close();
				echo "Dados armazenados com sucesso<br>";
				echo "<br>";
			} 
				catch (Exception $e){
					echo $e->getMessage();
					//desfaz alteracoes no banco
					TTransaction::rollback();
			}
		}

		function onEdit($param){

			try{

				TTransaction::open('my_banco');
				//obtem o livro pelo ID
				$livro = new livroRecord($param['id']);
				//joga os dados no formulario
				$this->form->setData($livro);

				TTransaction::close();
			}
			catch (Exception $e){

				echo $e->getMessage();
				//desfaz alteracoes
				TTransaction::rollback();
			}
		}
	}

	$page = new livroForm;
	$page->show();

?>