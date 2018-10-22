<?php

include_once 'classes/pessoa.classe.php';
include_once 'classes/conta.classe.php';

$carlos = new Pessoa (10,'Carlos da Silva',1.85,25,'14/09/1998','Ensino Médio',937.00);

	echo "Manipulando o objeto {$carlos->nome}: <br>";

	echo "$carlos->nome é formado em: $carlos->escolaridade<br>";
	
	$carlos->formar('Engenharia Mecanica');
	echo "$carlos->nome é formado em: $carlos->escolaridade<br>";
	
	echo "$carlos->nome possui $carlos->idade anos<br>";
	
	$carlos->envelhecer(1);
	echo "$carlos->nome possui $carlos->idade anos<br>";

	echo "<br>";


$itau_carlos = new Conta (1289,"C/C 57530-5","12/08/2017",$carlos,"123456",500);


	echo "Manipulando a conta de : {$itau_carlos->titular->nome}<br>";
	echo "O saldo atual da sua conta é : R\$ {$itau_carlos->obterSaldo()}<br>";

	$itau_carlos->depositar(100);
	echo "O saldo atual da sua conta é : R\$ {$itau_carlos->obterSaldo()}<br>";

	$itau_carlos->retirar(500);
	echo "O saldo atual da sua conta é : R\$ {$itau_carlos->obterSaldo()}<br>";




?>