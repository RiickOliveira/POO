<?php

	class cachorro {

		function __construct($coleira,$nome,$idade,$raca){

			$this->coleira = $coleira;
			$this->nome = $nome;
			$this->idade = $idade;
			$this->raca = $raca;
		}
	
		function __clone(){

			$this->coleira = $this->coleira + 1;
			$this->nome .= ' Junior';
			$this->idade = 0;
		}

	} 

	$dog = new cachorro(22,"Rex",12,"Vira Lata");

	$dog2 = clone $dog;


	echo "Codigo: {$dog->coleira}<br>";
	echo "Nome: {$dog->nome}<br>";
	echo "Idade: {$dog->idade} anos<br>";
	
	echo "<br>";
	
	echo "Codigo: {$dog2->coleira}<br>";
	echo "Nome: {$dog2->nome}<br>";
	echo "Idade: {$dog2->idade} anos";


?>