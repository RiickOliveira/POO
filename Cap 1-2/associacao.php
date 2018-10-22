<?php

	include_once 'classes/fornecedor.classe.php';
	include_once 'classes/produto.classe.php';

	$fornecedor = new fornecedor;
	$fornecedor->codigo = 848; 
 	$fornecedor->razaoSocial ="Bauducco Alimentos LTDA"; 
 	$fornecedor->endereco = "Rua dos Girassois";
 	$fornecedor->cidade = "Teixeira de Freitas";

 	$produto = new produto;
 	$produto->codigo = 462;
 	$produto->descricao ="Salgadinhos PLINC";
 	$produto->preco = 1.50;
 	$produto->fornecedor = $fornecedor;

 	echo "Codigo          : ". $produto->codigo."<br>";
 	echo "Descrição       : ". $produto->descricao."<br>";
 	echo "Codigo          : ". $produto->fornecedor->codigo."<br>";
 	echo "Razão Social    : ". $produto->fornecedor->razaoSocial."<br>";



 ?>