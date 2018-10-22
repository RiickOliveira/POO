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
			// instancia objeto datagrid
			$this->datagrid = new TDataGrid;
			//instancia as colunas da datagrid
			$codigo = new TDataGridColumn('id','Codigo','center',50);
			$nome = new TDataGridColumn('nome','Nome','left',160);
			$endereco = new TDataGridColumn('endereco','Endereço','left',140);
			$qualifica = new TDataGridColumn('qualifica','Qualificações','left',100);
			//adiciona as colunasa datagrid
			$this->datagrid->addColumn($codigo);
			$this->datagrid->addColumn($nome);
			$this->datagrid->addColumn($endereco);
			$this->datagrid->addColumn($qualifica);
			//instancia duas acoes da datagrid
			$action1 = new TDataGridAction(array($this,'onDelete'));
			$action1->setLabel('Deletar');
 			$action1->setImage('deletebt.png');
 			$action1->setField('id');

 			$action2 = new TDataGridAction(array($this,'onView'));
			$action2->setLabel('Visualizar');
 			$action2->setImage('research.png');
 			$action2->setField('id');
 			//adiciona as acoes a datagrid
 			$this->datagrid->addAction($action1);
 			$this->datagrid->addAction($action2);
			//cria o modelo da datagrid montando sua estrutura
			$this->datagrid->createModel();
			//adicona a datagrid  a pagina
			parent::add($this->datagrid);
		}
		//carrega datagrid com os objetos do banco de dados
		function onReload(){
			//inicia a transacao com o db
			TTransaction::open('my_livro');
			//instancia ym repositorio para a pessoa
			$repository = new TRepository('Pessoa');
			//cria um criterio definido a ordenacao
			$criteria = new TCriteria;
			$criteria->setProperty('order','id');
			//carrega os objetos pessoa
			$pessoas = $repository->load($criteria);
			$this->datagrid->clear();

			if ($pessoas){
				foreach ($pessoas as $pessoa) {
					//adiciona o objeto na grid
					$this->datagrid->addItem($pessoa);
				}
			}
			TTransaction::close();
			$this->loaded = true;
		}
		//executada quando o usuario clicar no butao excluir
		function onDelete($param){
			//obtem o parametro e exibe a mensagem
			$key = $param['key'];

			$action1 = new TAction(array($this,'Delete'));
			$action2 = new TAction(array($this,'teste'));
			$action1->setParameter('key',$key);
			$action2->setParameter('key',$key);

			new TQuestion('Deseja realmente excluir o registro?',$action1,$action2);
		}
		//exclui o registro no bd
		function Delete($param){
			//obtem o parametro
			$key = $param['key'];
			//inicia a transacao com o bd
			TTransaction::open('my_livro');

			$pessoa = new PessoaRecord($key);
			$pessoa->delete();
			TTransaction::close();
			new TMessage('info','Registro excluido com sucesso');
			$this->onReload();
		}
		//executada quando o usuario clicar em visulaizar
		function onView($param){
			//obtem o parametro
			$key = $param['key'];
			//inicia a transacao com o bd
			TTransaction::open('my_livro');

			$pessoa = new PessoaRecord($key);
			TTransaction::close();
			$mensagem = "O nome da pessoa é: $pessoa->nome<br>";
			$mensagem.= "O endereço é: $pessoa->endereco";
			new TMessage('info',$mensagem);
			$this->onReload();
		}
		//exceutada quando o usuario clica em excluir
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