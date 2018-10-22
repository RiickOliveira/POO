<?php

	function __autoload($classe)
{
    $pastas = array('app.widgets', 'app.ado');
    foreach ($pastas as $pasta)
    {
        if (file_exists("{$pasta}/{$classe}.class.php"))
        {
            include_once "{$pasta}/{$classe}.class.php";
        }
    }
}
	class PessoaRecord extends TRecord{}

	class PessoasList extends TPage{

		private $datagrid;
		private $loaded;
		function __construct(){

			parent::__construct();

			$this->datagrid = new TDataGrid;
			//instancia as colunas da datagrid
			$codigo = new TDataGridColumn('id','Codigo','center',50);
			$nome = new TDataGridColumn('nome','Nome','left',160);
			$endereco = new TDataGridColumn('endereco','Endereço','left',140);
			$qualifica = new TDataGridColumn('qualifica','Qualificações','left',100);
			
			$action1 = new TAction(array($this,'onReload'));
			$action1->setParameter('order','id');

			$action2 = new TAction(array($this,'onReload'));
			$action2->setParameter('order','nome');
			$codigo->setAction($action1);
			$nome->setAction($action2);
			//adiciona as clunas a datagrid
			$this->datagrid->addColumn($codigo);
			$this->datagrid->addColumn($nome);
			$this->datagrid->addColumn($endereco);
			$this->datagrid->addColumn($qualifica);
			//cria o modelo da datagrid montando sua estrutura
			$this->datagrid->createModel();
			//adiciona a datagrid a pagina
			parent::add($this->datagrid);
		}
		//carrega a datagrid com os objetos do banco de dados
		function onReload($param = NULL){

			$order = $param['order'];

			TTransaction::open('my_livro');
			//inicia um repositorio para a pessoa
			$repository = new TRepository('Pessoa');
			//retorna todos os objetos q satisfazem o criterio
			$criteria = new TCriteria;
			$criteria->setProperty('order',$order);
			$pessoas = $repository->load($criteria);

			if($pessoas){

				$this->datagrid->clear();
				foreach($pessoas as $pessoa){
					//adciona o objeto na datagrid
					$this->datagrid->addItem($pessoa);
				}
			}
			TTransaction::close();
			$this->loaded = TRUE;
		}
		function show(){

			if(!$this->loaded){

				$this->onReload();
			}
			parent::show();
		}
	}
	$page = new PessoasList;
	$page->show();


?>