<?php

	class Pessoa {
 


		var $codigo,$nome,$altura,$idade,$nascimento,$escolaridade,$salario;

		function crescer($centimetros){
			if ($centimetros > 0)
			{
				$this->altura += $centimetros;
			}
		}

		function formar($titulacao){

			$this->escolaridade = $titulacao;
		}

		function envelhecer($anos){
			if ($anos > 0)
			{
				$this->idade += $anos;
			}
		}

		//METODO CONSTRUTOR (INICIALIZA PROPRIEDADES)
	function __construct($codigo,$nome,$altura,$idade,$nascimento,$escolaridade,$salario){

			$this->codigo = $codigo;
			$this->nome = $nome;
			$this->altura = $altura;
			$this->idade = $idade;
			$this->nascimento = $nascimento;
			$this->escolaridade = $escolaridade;
			$this->salario = $salario;
			
			}

		//METODO DESTRUTOR (FINALIZA O OBJETO)
	function __destruct(){
		
			echo "Objeto {$this->nome} finalizado<br>";
			}

}


?>