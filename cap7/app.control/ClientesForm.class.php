<?php  

	//formulario de cadastro de clientes
	class ClientesForm extends TPage{

		private $form; //formulario

		//cria a pagina e o formulario de cadastro
		function __construct(){

			parent::__construct();
			//instancia umm formulatrio
			$this->form = new TForm('form_clientes');
			//instancia uma tabela
			$table = new TTable;
			//adiciona a tabela ao formulario
			$this->form->add($table);
			//cria os campos do formulario
			$codigo = new TEntry('id');
			$nome = new TEntry('nome');
			$endereco = new TEntry('endereco');
			$telefone = new TEntry('telefone');
			$cidade = new TCombo('id_cidade');
			//define alguns atribuitos para o campo do formulario
			$codigo->setEditable(false);
			$codigo->setSize(100);
			$nome->setSize(300);
			$endereco->setSize(300);

			//carrega as cidades do banco de dados
			TTransaction::open('my_livro');
			//instancia m repositorio de cidade
			$repository = new TRepository('Cidade');
			//carrega todos os objetos
			$collection = $repository->load(new TCriteria);
			//adiciona os objetos na combo
			foreach($collection as $object){

				$itens[$object->id] = $object->nome;
			}

			$cidade->addItens($itens);
			TTransaction::close();

			//adiciona uma linha para o campo codigo
			$row = $table->addRow();
			$row->addCell(new TLabel('Código:'));
			$row->addCell($codigo);

			//adiciona uma linha para o campo nome
			$row = $table->addRow();
			$row->addCell(new TLabel('Nome:'));
			$row->addCell($nome);

			//adiciona uma linha para o campo endereco
			$row = $table->addRow();
			$row->addCell(new TLabel('Endereço:'));
			$row->addCell($endereco);

			//adiciona uma linha para o campo telefone
			$row = $table->addRow();
			$row->addCell(new TLabel('Telefone:'));
			$row->addCell($telefone);

			//adiciona uma linha para o campo cidade
			$row = $table->addRow();
			$row->addCell(new TLabel('Cidade:'));
			$row->addCell($cidade);

			//cria um botao de acao do formulario
			$button1 = new TButton('action1');
			//define a acao do butao
			$button1->setAction(new TAction(array($this,'onSave')),'Salvar');

			//adiciona uma linha para acao do formulario
			$row = $table->addRow();
			$row->addCell('');
			$row->addCell($button1);

			//define quais os campos do formualrio
			$this->form->setFields(array($codigo,$nome,$endereco,$telefone,$cidade,$button1));
			//adiciona o formulario a pagina
			parent::add($this->form);
		}
		//edita os dados de um registro
		function onEdit($param){

			try{
				if (isset($param['key']))
            {
                // inicia transação com o banco 'pg_livro'
                TTransaction::open('my_livro');

                // obtém o Cliente de acordo com o parâmetro
                $cliente = new ClienteRecord($param['key']);

                // lança os dados do cliente no formulário
                $this->form->setData($cliente);

                // finaliza a transação
                TTransaction::close();
            }
			} catch(Exception $e) {
				new TMessage('error','ERRO' . $e->getMessage());
				//desfaz alteracoes no banco
				TTransaction::rollback();
			}
		}
		//executado quando o usuario clicar em salvar
		function onSave(){

			try{
				//inicia a transacao com bd
				TTransaction::open('my_livro');
				//le dados do formulario e instancia um objeto clientRecord
				$cliente = $this->form->getData('ClienteRecord');
				//armazena o objeto no banco de dados
				$cliente->store();

				//finaliza trnasacao
				TTransaction::close();
				new TMessage('checked','Dados armazenados com sucesso');
			
			}  catch(Exception $e) {
				new TMessage('error','ERRO' . $e->getMessage());
				TTransaction::rollback();
			}
		}
	}
?>