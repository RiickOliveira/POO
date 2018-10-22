<?php

	class Cesta{

		private $itens;

		//ADICIONA ITEMS NA LISTA
		function adicionaItem(produto $item){

			$this->itens[]= $item;
		}
	
		//EXIBE A LISTA DE PRODUTOS
		function exibeLista(){
			foreach ($this->itens as $item) 
			{
				$item->imprimeEtiqueta();
			}
		}

		//CALCULA O VALOR TOTAL DA CESTA
		function calculaTotal(){
			$total = 0;
			foreach ($this->itens as $item) 
			{
				$total += $item->preco;
			}
		
			return "R$ " .$total."<br>";
		}

	}







  ?>