<?php

	function __autoload($classe) {

 	if (file_exists("{$classe}.class.php")) {

 		include_once "{$classe}.class.php";
 	}
 }
 	//instancia objeto datagrid
 	$datagrid = new TDataGrid;
 	//instancia as colunas de datagrid
 	$codigo = new TDataGridColumn('codigo','Código','left',50);
 	$nome = new TDataGridColumn('nome','Nome','left',180);
 	$endereco = new TDataGridColumn('endereco','Endereco','left',140);
 	$telefone = new TDataGridColumn('telefone','Telefone','center',100);
 	//adiciona as colunas a datagrid
 	$datagrid->addColumn($codigo);
 	$datagrid->addColumn($nome);
 	$datagrid->addColumn($endereco);
 	$datagrid->addColumn($telefone);
 	//instancia duas acoes de datagrid
 	$action1 = new TDataGridAction('onDelete');
 	$action1->setLabel('Deletar');
 	$action1->setImage('../app.images/ico_delete.png');
 	$action1->setField('codigo');


 	$action2 = new TDataGridAction('onView');
 	$action2->setLabel('Visualizar');
 	$action2->setImage('ico_view.png');
 	$action2->setField('nome');
 	//adiciona as acoes a datagrid
 	$datagrid->addAction($action1);
 	$datagrid->addAction($action2);
 	//cria o modelo da datagrid montando sua estrutura
 	$datagrid->createModel();

 	//adiciona um objeto padrao a datagrid
 	$item = new StdClass;
 	$item->codigo = 1;
 	$item->nome = 'Daline Dalloglio';
 	$item->endereco = 'Rua Conceiçao';
 	$item->telefone = '1111-1111';
 	$datagrid->addItem($item);

 	$item = new StdClass;
 	$item->codigo = 2;
 	$item->nome = 'Willian Scatola';
 	$item->endereco = 'Rua Conceiçao';
 	$item->telefone = '2222-2222';
 	$datagrid->addItem($item);

 	$item = new StdClass;
 	$item->codigo = 3;
 	$item->nome = 'Samara Petter';
 	$item->endereco = 'Rua Oliveira';
 	$item->telefone = '3333-3333';
 	$datagrid->addItem($item);

 	$item = new StdClass;
 	$item->codigo = 4;
 	$item->nome = 'Ana Amelia Petter';
 	$item->endereco = 'Rua Oliveira';
 	$item->telefone = '4444-4444';
 	$datagrid->addItem($item);

 	//instancia um pagina TPage
 	$page = new TPage;
 	// adiciona a datagrid a pagina
 	$page->add($datagrid);
 	//exibe a pagina
 	$page->show();
 	//executada quadno o usuario clicar em exluir
		function onDelete($param){
			//obtem o parametro e exibe a mensagem
			$key = $param['key'];
			new TMessage('error',"O registro $key <br> nao pode ser excluido");
 		}

 		function onView($param){
 			//obtem o parametro e exibe a mensagem
 			$key = $param['key'];
 			new TMessage('info',"O nome é: <br> $key");
 		}
?>