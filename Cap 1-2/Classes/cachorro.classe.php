<?php

	class cachorro {

		private $nascimento;

		function __construct($nome){

			$this->nome = $nome;
		}
		
		function __set($propriedade,$valor){

			if ($propriedade == 'nascimento')
			{
				//VERIFICA SE O VALOR É DIVIDO EM 3 PARTES POR '/'
				if(count(explode('/', $valor))==3)
				{
					echo "Dado $valor, atribuido a '$propriedade'<br>";
					$this ->$propriedade = $valor;	
				}	
				else
				{
					echo "Dado '$valor', nao atribuido a '$propriedade'<br>";
				}
		
			}
			else
			{
				$this->$propriedade=$valor;
			}
		}
	}







?>