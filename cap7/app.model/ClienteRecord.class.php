<?php

	//active record para tabela clientes
	class ClienteRecord extends TRecord{
			
		private $cidade;

		//executado sempre se for acesssada a propriedade nome_cidade
		function get_nome_cidade(){
			//instancia cidadeRecord, carrega na
			//memoria a cidade de codigo $this->id_cidade
			if (empty($this->cidade))
				$this->cidade = new CidadeRecord($this->id_cidade);
			//retorna o objeto instanciado
			return $this->cidade->nome;			
		}
	}
?>