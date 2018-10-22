<?php
	
	include_once'classes/produto.classe.php';

	$produto = new Produto(1,"Pen Drive 8GB",1,39.90);

	echo $produto->preco;








?>