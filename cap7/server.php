<?php

		function __autoload($classe){

			$pastas = array('app.ado','app.model');
			foreach($pastas as $pasta){

				if(file_exists("{$pasta}/{$classe}.class.php")){
					include_once "{$pasta}/{$classe}.class.php";
				}
			}
		}

		//remote facade para cadastreo de clientes
		class ClienteFacade {

			//recebe um array com dados de cliente e armazena no banco de dados
			function salvar($dados){
				try{
					TTransaction::open('my_livro');
					//instancia um active record para cliente
					$cliente = new ClienteRecord;
					//alimenta o registro dados do array
					$cliente->fromArray($dados);
					$clinte->store(); //armazena o objeto
					TTransaction::close();
				} catch (Exception $e){
					//caso ocorra erros volta a transacao
					TTransaction::rollback();
					//retorna o erro na forma de um ojeto SoapFault
					return new SoapFault("Server", $e->getMessage());
				}
			}
		}
		//instancia servido SOAP
		$server = new SoapServer(NULL,array('encoding' => 'ISO-8859-1', 'uri'=>'http://test-uri/'));
		//define classe q ira responder as chamadas remotas
		$server->setClass('ClienteFacade');
		//prepara-se para receber as chamadas remotas
		$server->handle();  
?>