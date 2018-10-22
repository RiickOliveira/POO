<?php

include_once 'classes/pessoa.classe.php';
include_once 'classes/conta.classe.php';
include_once 'classes/contaCorrente.classe.php';
include_once 'classes/contaPoupanca.classe.php';

//CRIAÇÃO DO OBJETO $RICK
$rick = new Pessoa(10,"Ricardo Oliveira",1.80,25,"14/09/1998","Ensino Medio",650.00);
	echo "MANIPULANDO O OBJETO {$rick->nome}: <br>";

//CRIAÇÃO DO OBJETO $CONTA_RICK

	$contas[1]=new contaCorrente(6677,"C/C 1234.56","10/07/2005",$rick,9876,500.00,200.00);

	$contas[2]=new contaPoupança(6677,"C/P 4321.01","10/07/2005",$rick,9876,500.00,"10/07");			

//PERCORREMSO AS CONTAS

	foreach ($contas as $key => $conta) {
		
		echo "Manipulando a conta $key de: {$conta->titular->nome}<br>";
		echo "O saldo atual da conta $key é: R\$ {$conta->obterSaldo()}<br>";

		$conta->depositar(200);
		echo "O saldo atual da conta $key é: R\$ {$conta->obterSaldo()}<br>";

		$conta->retirar(300);
		echo "O saldo atual da conta $key é: R\$ {$conta->obterSaldo()}<br>";

	}


?>