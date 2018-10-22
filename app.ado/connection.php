<?php

	function __autoload($classe){
	if (file_exists("{$classe}.class.php")){
		include_once"{$classe}.class.php";
	}
}

$criteria= new TCriteria;
$criteria->add(new TFilter('id','=','1'));


$sql3 = new TSqlSelect;
$sql3->setEntity('aluno');
$sql3->addColuna('nome');
$sql3->addColuna('cpf');
$sql3->setCriteria($criteria);

try {
	$conn = TConnection::open('my_livro');

	$result = $conn->query($sql3->getInstruction());

	if ($result){
		$row = $result->fetch(PDO::FETCH_ASSOC);
		echo $row['id']. '-' . $row['nome']. "<br>";
	}
	$conn = null;

}
catch (PDOException $e){
	print "Erro ". $e->getMessage()."<br>";
	die();
}





















?>