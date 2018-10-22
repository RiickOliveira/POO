<?php
	
	class contaCorrente extends Conta {

		var $limite;
	
		function __construct($agencia,$codigo,$dataDeCriacao,$titular,$senha,$saldo,$limite){
			//CHAMADA DO METODO CONSTRUTOR DA CLASSE PAI
			parent::__construct($agencia,$codigo,$dataDeCriacao,$titular,$senha,$saldo);
			$this->limite = $limite;
		}
		/*METODO RETIRAR (SOBRESCRITO) VERIFICA SE A $QUANTIA RETIRADA ESTA DENTRO DO LIMITE*/ 
	
		function retirar ($quantia){
			//IMPOSTO SOBRE MOVIMENTAÇAO FINANCEIRA
			$cpmf = 0.05;

			if (($this->saldo + $this->limite) >= $quantia)
			{
				//EXECUTA METODO DA CLASSE PAI
				parent::retirar($quantia);

				//DEBITA O IMMPOSTO
				parent::retirar($quantia * $cpmf);
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