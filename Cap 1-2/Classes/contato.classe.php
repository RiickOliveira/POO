<?php

	class contato {

		var $nome, $telefone, $email;

		//GRAVA INFORMACOES DE CONTATO

		function setContato($nome,$telefone,$email){

			$this->nome= $nome;
			$this->telefone= $telefone;
			$this->email= $email;
		}

		function getContato(){

			return "Nome: {$this->nome}, Telefone: {$this->telefone}, Email: {$this->email}";
		}

	}






?>