<?php
	
	class Produto{

		var $codigo,$descricao,$quantidade,$fornecedor;
		private $preco;
		const margem = 10;

		function __construct($codigo,$descricao,$quantidade,$preco){

			$this->codigo = $codigo;
			$this->descricao = $descricao;
			$this->quantidade = $quantidade;
			$this->preco = $preco;
			
		}

		function __call($metodo, $parametros){

			echo "Voce executou o metodo : {$metodo}<br>";
			
			foreach ($parametros as $key => $parametro) 
			{	
				echo "parametro $key: $parametro<br>";
			}

		}
		
	}


?>