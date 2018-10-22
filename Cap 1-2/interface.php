<?php

	interface Ialuno{

		function getNome();
		function setNome($nome);
		function setResponsavel(Pessoa $responsavel);
	}

	class aluno implements Ialuno{

		function setNome($nome){

			$this->nome = $nome;
		}
	
		function getNome(){

			return $this->nome;
		}

		func

	}

	$fernandinha= new aluno;
	
	$fernandinha->setNome("Fernanda Alves");

	echo $fernandinha->getNome();



?>