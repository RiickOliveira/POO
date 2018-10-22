<?php
	//CARREGA AS CLASSES CRIADAS
	include_once 'classes/pessoa.classe.php';
	include_once 'classes/conta.classe.php';

	//CRIAÇÃO DE UM OBJETO (CARLOS)

	$carlos = new Pessoa;
	$carlos-> codigo = 10;
	$carlos-> nome = 'Carlos da Silva';
	$carlos-> altura = 1.85;
	$carlos-> idade = 25;
	$carlos-> nascimento = '01/09/1993';
	$carlos-> escolaridade = 'Ensino Medio';

	echo "Manipulando o objeto $carlos->nome : <br>";

	echo "$carlos->nome é formado em: $carlos->escolaridade<br>";
	$carlos->formar('Engenharia Mecanica');
	echo "$carlos->nome é formado em: $carlos->escolaridade<br>";
	
	echo "$carlos->nome possui $carlos->idade anos<br>";
	$carlos->envelhecer(1);
	echo "$carlos->nome possui $carlos->idade anos<br>";

	echo "\n";

	//CRIAÇÃO DO OBJETO CONTA_CARLOS
	$itau_carlos = new Conta;
	$itau_carlos-> agencia = 1289-0;
	$itau_carlos-> conta = 57530-5;
	$itau_carlos-> dataDeCriacao = '14/09/2012';
	$itau_carlos-> titular = $carlos;
	$itau_carlos-> senha = 587859;
	$itau_carlos-> saldo = 1589;
	$itau_carlos-> cancelada = false;

	echo "<br>";

	echo "Manipulando a conta de : {$itau_carlos->titular->nome}<br>";
	echo "O saldo atual da sua conta é : R\$ {$itau_carlos->obterSaldo()}<br>";

	$itau_carlos->depositar(100);
	echo "O saldo atual da sua conta é : R\$ {$itau_carlos->obterSaldo()}<br>";

	$itau_carlos->retirar(500);
	echo "O saldo atual da sua conta é : R\$ {$itau_carlos->obterSaldo()}";



?>