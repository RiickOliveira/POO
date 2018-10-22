<?php
	
	class fornecedor {
		var $codigo, $razaoSocial, $endereco, $cidade,$contato;
		
		function __construct(){

			$this->contato= new contato;
		}

		//GRAVA CONTATO
		function setContato($nome,$telefone,$email){

				//DELEGA CHAMADA DE METODO
				$this->contato->setContato($nome,$telefone,$email);
		
		}

		//RETORNA CONTATO
		function getContato(){

				return $this->contato->getContato();
		}

	}
  ?>