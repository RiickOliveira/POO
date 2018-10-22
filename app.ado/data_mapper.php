<?php

	final class Produto {

		private $descricao,$estoque,$preco_custo;

		function __construct($descricao,$estoque,$preco_custo){

			$this->descricao = $descricao;
			$this->estoque = $estoque;
			$this->preco_custo = $preco_custo;
		}

		function getDescricao(){

			return $this->descricao;
		}

	}


	final class Venda {

		private $id,$itens;


		function __construct ($id){

			$this->id = $id;
		}

		function getId(){

			return $this->id;
		}

		function addItem($quantidade, Produto $produto){

			$this->itens[] = array($quantidade,$produto);
		}

		function getItens(){

			return $this->itens;
		}

	}

	final class VendaMapper {

		static function insert(Venda $venda){

			$id = $venda->getId();
			$date = date("y-m-d");

			$sql = "INSERT INTO venda (id, data) values ('$id','$date')";
			echo $sql."<br>";

			foreach ($venda->getItens() as $item) {
			
				$quantidade = $item[0];
				$produto = $item[1];
				$descricao = $produto->getDescricao();

				$sql = "INSERT INTO venda_itens (ref_venda, produto,quantidade) values ('$id','$descricao','$quantidade')";
				echo $sql;
			}
		}
	}

	$venda = new Venda(1000);

	$venda->addItem(3, new Produto('Vinho',10,15));
	$venda->addItem(2, new Produto('uva',50,25));
	$venda->addItem(1, new Produto('pao',20,55));

	VendaMapper::insert($venda);

?>