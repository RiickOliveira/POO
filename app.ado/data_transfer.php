<?php

	class produtoGateway{

		private $data;

		function __get($prop){

			return $this->data[$prop];
		}

		function __set($prop, $value){

			$this->data[$prop] = $value;
		}

		function insert (){

			$sql = "INSERT INTO Produtos (id, descricao, estoque, preco_custo)".
					"VALUES ('{$this->id}','{$this->descricao}','{$this->estoque}','{$this->preco_custo}' )";

			echo $sql."<br>";
			//	INSTANCIA UM OBJETO 'PDO'
			$conn = new PDO("mysql:host=localhost;port=3306;dbname=produtos",'root','');
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
			//EXCURA INSTRUCAO SQL
			$conn->exec($sql);
			unset($conn);
		}
	
		function update(){

			$sql = "UPDATE  Produtos SET ".
			" descricao = '{$this->descricao}',".
			" estoque = '{$this->estoque}',".
			" preco_custo = '{$this->preco_custo}'".
			" WHERE id = '{$this->id}'";

			echo $sql."<br>";
			//	INSTANCIA UM OBJETO 'PDO'
			$conn = new PDO("mysql:host=localhost;port=3306;dbname=produtos",'root','');
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
			//EXCURA INSTRUCAO SQL
			$conn->exec($sql);
			unset($conn);

		}

		function delete(){

			$sql = "DELETE FROM Produtos where id = '{$this->id}'";

			echo $sql."<br>";
			//	INSTANCIA UM OBJETO 'PDO'
			$conn = new PDO("mysql:host=localhost;port=3306;dbname=produtos",'root','');
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
			//EXCURA INSTRUCAO SQL
			$conn->exec($sql);
			unset($conn);
		}

		function getObject($id){

			$sql = "SELECT * FROM produtos WHERE id = {$id}";

			echo $sql."<br>";
			//	INSTANCIA UM OBJETO 'PDO'
			$conn = new PDO("mysql:host=localhost;port=3306;dbname=produtos",'root','');
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

			$result = $conn->query($sql);
			$this->data = $result->fetch(PDO::FETCH_ASSOC);
			unset($conn);

		}

	}

	$vinho = new produtoGateway;

	$vinho->id   = 3;
	$vinho->descricao = 'Vinho tinto';
	$vinho->estoque = 10;
	$vinho->preco_custo = 15;

	$vinho->update();

	$salame = new produtoGateway;

	$salame->id   = 4;
	$salame->descricao = 'salame sadia';
	$salame->estoque = 20;
	$salame->preco_custo = 30  ;

	$salame->update();



?>