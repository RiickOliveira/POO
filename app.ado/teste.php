<?php

//CARREGA UMA CLASSE QUADNO E NECESSARIA, QUANDO É INSTACIADA A PRIMEIRA VEZ
function __autoload($classe){
	if (file_exists("{$classe}.class.php")){
		include_once"{$classe}.class.php";
	}
}

//setlocale(LC_NUMERIC, 'POSIX');

$sql = new TSqlInsert;

$sql->setEntity('aluno');

$sql->setRowData('id','3');
$sql->setRowData('nome','Jose');
$sql->setRowData('cpf','124569');
$sql->setRowData('cidade','tx freitas');

echo $sql->getInstruction();

//CRIA CRITERIOS DE SELCEAO DE DADOS
#$criteria = new TCriteria;
#$criteria->add(new Tfilter('id','=','1'));

//CRIANDO INTRUCOES DE UPDATE
$sql2 = new TSqlUpdate;
$sql2->setEntity('aluno');
//ATRIBUICAO DO VALOR DE CADA COLUNA
$sql2->setRowData('nome','ricardo');
$sql2->setRowData('cpf','454654');
$sql2->setRowData('cidade','asads');

//$sql2->setCriteria($criteria);

echo $sql2->getInstruction();
 
 //CRIANFO INTRUCOES DE SELECT
$criteria= new TCriteria;
$criteria->add(new TFilter('nome','like','maria%'));
$criteria->setProperty('order','nome');

$sql3 = new TSqlSelect;
$sql3->setEntity('aluno');
$sql3->addColuna('nome');
$sql3->addColuna('cpf');
$sql3->setCriteria($criteria);

echo $sql3->getInstruction();

?>