<?php

	class funcionario {
		private $codigo;
		public $nome;
		private $nascimento;
		protected $salario;
	
			//ATRIBUI O PARAMETRO $SALARIO A PROPRIEDADE $SALARIO
			function setSalario($salario){

				//VERIFICA SE O NUMERO E POSITIVO
				if (is_numeric($salario) and ($salario > 0))
					{
						$this->salario = $salario;
					}

				}

			//RETORNA O VALOR DA PROPRIEDADE SALARIO
			function getSalario(){

				return $this->salario;
			}

	}
?>