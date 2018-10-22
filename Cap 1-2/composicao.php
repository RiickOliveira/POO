<?php
	include_once 'classes/fornecedor.classe.php';
	include_once 'classes/contato.classe.php';

	//INSTANCIA NOVO FORNNECEDOR
	$fornecedor = new fornecedor;
	$fornecedor->razaoSocial = "Produtos Bom Gosto LTDA";

	//ATRIBUI INFORMCAOES DE CONTATO
	$fornecedor->setContato("Renato","(73)99830-1195","renato@hotmail.com");

	echo $fornecedor->razaoSocial ." <br>";
	echo "Informaçoes de Contato <br>";
	echo $fornecedor->getContato();
?>