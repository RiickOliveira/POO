<?php

function __autoload($classe){
	if (file_exists("{$classe}.class.php")){
		include_once"{$classe}.class.php";
	}
}

	class alunoRecord extends TRecord {}

	class cursoRecord extends TRecord {}

	try {

		
		TTransaction::open('my_livro');
		TTransaction::setLogger( new TLoggerTXT('C:\Users\Ricardo\Desktop\log2.txt'));
		
		echo "OBTNEDO ALUNOS<br>";
		echo "==============<br>";

		$aluno = new alunoRecord(1);

		echo "Nome : ".$aluno->nome."<br>";
		echo "Endereco : ".$aluno->endereco."<br>";

		$aluno = new alunoRecord(2);

		echo "Nome : ".$aluno->nome."<br>";
		echo "Endereco : ".$aluno->endereco."<br>";

		echo "OBTNEDO CURSOS<br>";
		echo "==============<br>";

		$curso= new cursoRecord(1);
		echo "Curso : ".$curso->descricao."<br>";

		$curso= new cursoRecord(2);
		echo "Curso : ".$curso->descricao."<br>";

		TTransaction::close();


	} catch (Exception $e){
		echo "<b>ERRO</b>".$e->getMessage();
		TTransaction::rollback();
	}