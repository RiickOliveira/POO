<?php

	final class Produto {
		static $recordset = array();
	
		function adicionar($id,$descricao,$estoque,$preco_custo){

			self::$recordset[$id]['descricao']     = $descricao;
			self::$recordset[$id]['estoque']       = $estoque;
			self::$recordset[$id]['preco_custo']   = $preco_custo;
		}

		function registraCompra($id,$unidades,$preco_custo){

			self::$recordset[$id]['preco_custo']   =$preco_custo;
			self::$recordset[$id]['estoque']      +=$unidades;
		}

		function registraVenda($id,$unidades){

			self::$recordset[$id]['estoque']  -=$unidades;
		}

		function getEstoque($id){

			return self::$recordset[$id]['estoque'];
		}

		function calculaPreco($id){

			return self::$recordset[$id]['preco_custo'] * 1.3;
		}


	}

	$produto = new Produto;

	$produto->adicionar(1,'Arroz',10,15);
	$produto->adicionar(2,'Queijo',20,10);
	$produto->adicionar(3,'Vinho',30,5);


	echo $produto->getEstoque(1)."<br>";
	echo $produto->getEstoque(2)."<br>";
	echo $produto->getEstoque(3)."<br>";

	echo $produto->calculaPreco(2);
	echo $produto->registraCompra(2,15,12);
	echo $produto->getEstoque(2)."<br>";
	echo $produto->calculaPreco(2);

?>