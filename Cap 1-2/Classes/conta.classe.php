<?php

	class Conta {

		var $agencia,$conta,$dataDeCriacao,$titular,
			$senha,$saldo,$cancelada;
		
		function retirar($quantia){
			if ($quantia > 0 )
			{
				$this->saldo -= $quantia;
			}
		}
	
		function depositar($quantia){
			if ($quantia > 0)
			{
				$this->saldo += $quantia;
			}
		}

		function obterSaldo(){
			return $this->saldo;
		}

//METODO CONSTRUTOR (INICIALIZA PROPRIEDADES)
	function __construct($agencia,$codigo,$dataDeCriacao,$titular,$senha,$saldo){

			$this->agencia = $agencia;
			$this->codigo = $codigo;
			$this->dataDeCriacao = $dataDeCriacao;
			$this->titular = $titular;
			$this->senha = $senha;
			
			//CHAMADA A OUTROS METODOS DA CLASSE
			$this->depositar($saldo);
			$this->cancelada=false;

			}

		//METODO CONSTRUTOR (INICIALIZA PROPRIEDADES)
	function __destruct(){
		
			echo "Objeto Conta {$this->codigo} de {$this->titular->nome} finalizada ...<br>";
			}


}



?>