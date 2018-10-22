<?php

	include_once 'classes/cesta.classe.php';
	include_once 'classes/produto.classe.php';

	$produto1 = new produto;
	$produto2 = new produto;
	$produto3 = new produto;
	$produto4 = new produto;


	$produto1->codigo = 1;
	$produto1->descricao ="Uva";
	$produto1->preco =5.48;

	$produto2->codigo =2;
	$produto2->descricao ="Maça";
	$produto2->preco = 3.58;

	$produto3->codigo =	3;
	$produto3->descricao = "Pessego";
	$produto3->preco = 6.80;

	$produto4->codigo = 4;
	$produto4->descricao = "Ameixa";
	$produto4->preco = 12.35;

	$cesta = new cesta;
	$cesta->adicionaItem($produto1);
	$cesta->adicionaItem($produto2);
	$cesta->adicionaItem($produto3);
	$cesta->adicionaItem($produto4);

	echo "{$cesta->calculaTotal()}";
	
	echo "{$cesta->exibeLista()}";

?>