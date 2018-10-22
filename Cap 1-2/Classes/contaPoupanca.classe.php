<?php
	
	class contaPoupança extends Conta {

		var $aniversario;
	
		function __construct($agencia,$codigo,$dataDeCriacao,$titular,$senha,$saldo,$aniversario){
			//CHAMADA DO METODO CONSTRUTOR DA CLASSE PAI
			parent::__construct($agencia,$codigo,$dataDeCriacao,$titular,$senha,$saldo);
			$this->aniversario = $aniversario;
		}
	
		/*METODO RETIRAR (SOBRESCRITO) VERIFICA SE HA SALDO PARA RETIRAR TAL QUANTIA*/  

		function retirar ($quantia){

			if ($this->saldo >= $quantia)
			{
				//EXECUTA METODO CLASSE PAI(CONTA)
				parent::retirar($quantia);
			}
			else
			{
				echo "Retirada nao permitida. <br>";
				return false;
			} 

		//RETIRADA PERMITIDA
		return true;

		}
	}

?>