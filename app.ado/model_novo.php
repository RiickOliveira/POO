<?php

function __autoload($classe){
	if (file_exists("{$classe}.class.php")){
		include_once"{$classe}.class.php";
	}
}
	class alunoRecord extends TRecord {}

	class cursoRecord extends TRecord {}

	try {
		
		TTransaction::open('my_banco');
		TTransaction::setLogger( new TLoggerTXT('C:\Users\Ricardo\Desktop\log5.txt'));

		TTransaction::log("* INSERINDO ALUNOS");

		$ricardo = new alunoRecord;
		$ricardo->nome = 'Ricardo ';
		$ricardo->endereco = 'Rua teste';
		$ricardo->telefone = '5555-8888';
		$ricardo->cidade = 'Tx freitas';
		$ricardo->store();

		$rodrigo = new alunoRecord;
		$rodrigo->nome = 'rodrigo ';
		$rodrigo->endereco = 'Rua asde';
		$rodrigo->telefone = '5555-8888';
		$rodrigo->cidade = 'freitas';
		$rodrigo->store();

		TTransaction::log("* INSERIDNO CURSOS");

		$curso = new cursoRecord;
		$curso->descricao = 'Mysql';
		$curso->duracao = 24;
		$curso->store();

		$curso = new cursoRecord;
		$curso->descricao = 'JavaScript';
		$curso->duracao = 45;
		$curso->store();

		$curso = new cursoRecord;
		$curso->descricao = 'C#';
		$curso->duracao = 120;
		$curso->store();

		TTransaction::close();
		echo "REGISTRO INSERIDOS COM SUCESSO";
	}	
		catch (Exception $e){
		echo "<b>ERRO</b>".$e->getMessage();
		TTransaction::rollback();
	}
?>