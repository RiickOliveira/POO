<?php

	include_once 'classes/produto.classe.php';
	//INSTANCIA DOS OBJETOS
	$produto1 = new Produto;
	$produto2 = new Produto;
	$produto3 = new Produto;
	
	//ATRIBUIÇAO DE VALORES
	$produto1 ->codigo = 4001;
	$produto1 ->descricao = 'CD - Roberto Carlos<br>';

	$produto2 ->codigo = 5001;
	$produto2 ->descricao = 'CD - Erasmo Carlos<br>';

	$produto3 -> codigo= 5014;
	$produto3-> descricao = 'CD - jorge Ben Jor';
	
	//IMPRIME INFORMAÇOES DE ETIQUETA
	$produto1->imprimeEtiqueta();
	$produto2->imprimeEtiqueta();
	$produto3->imprimeEtiqueta();




?>