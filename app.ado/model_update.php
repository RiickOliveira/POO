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
		TTransaction::setLogger( new TLoggerTXT('C:\Users\Ricardo\Desktop\log3.txt'));

		TTransaction::log("OBTENDO O ALUNO 1");
		//INSTANCIA DE ALUNO
		$record = new alunoRecord;

		$aluno = $record->load(1);

		if ($aluno){

			$aluno->telefone = "999244148";
			TTransaction::log("persistindo o aluno");
			$aluno->store();
		}
	
		TTransaction::log("OBTENDO OS CURSOS");

		$record = new cursoRecord;
		$curso = $record->load(1);

		if ($curso) {

			$curso->duracao = 80;
			TTransaction::log("persistindo o curso");
			$curso->store();
		}

		TTransaction::close();
		echo "REGISTROS ALTERADOS COM SUCESSO<br>";
		echo "string";
	} catch (Exception $e){
		echo "<b>ERRO</b>".$e->getMessage();
		TTransaction::rollback();
		
	}

?>