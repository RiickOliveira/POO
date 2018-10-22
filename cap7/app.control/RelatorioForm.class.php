<?php

	//class relatorioForm relatorio de vendas por pedido
	class RelatorioForm extends TPage{

		private $form;

		//cria a pagina e o formulario de parametros
		public function __construct(){

			parent::__construct();
			//instancia um formulario
			$this->form = new TForm('form_relat_vendas');

			//instancia uma tabela
			$table = new TTable;

			$this->form->add($table);

			//cria os campos do formulario
			$data_ini = new TEntry('data_ini');
			$data_fim = new TEntry('data_fim');
			//define os tamanhos
			$data_ini->setSize(100);
			$data_fim->setSize(100);

			//adiciona uma linha para a data inicial 
			$row = $table->addRow();
			$row->addCell(new TLabel('Data Inicial: '));
			$row->addCell($data_ini);

			$row = $table->addRow();
			$row->addCell(new TLabel('Data Final: '));
			$row->addCell($data_fim);

			//cria um botao de acao
			$gera_button = new TButton('');
			//define acao do botao
			$gera_button->setAction(new TAction(array($this,'onGera')),'Gerar Relatório');

			//adiciona linha para acao do foromulario
			$row = $table->addRow();
			$row->addCell($gera_button);

			//define campos do formulario
			$this->form->setFields(array($data_ini,$data_fim,$gera_button));

			//adiciona o form a pagina
			parent::add($this->form);
		}
		//gera o relatorio, baseado nos paramtros do formulario
		function onGera(){
			//obtem os dados do formulario
			$dados = $this->form->getData();
			//joga os dados de volta ao formulario
			$this->form->setData($dados);

			//le os campos do formulario, converte para o padrao americano
			$data_ini = $this->conv_data_to_us($dados->data_ini);
			$data_fim = $this->conv_data_to_us($dados->data_fim);
			
			//instancia uma nova tabela
			$table = new TTable;
			$table->border = 1;
			$table->width = '100%';
			$table->style = 'border-collapse:collapse';

			//adiciona uma linha para o cabecalho do relatorio
			$row = $table->addRow();
			$row->bgcolor = '#a0a0a0';
			//adiciona as celulas ao cabecalho
			$cell = $row->addCell('Data');
			$cell = $row->addCell('Cliente/Produtos');
			$cell = $row->addCell('Qtde');
			$cell->align = 'right';
			$cell = $row->addCell('Preço');
			$cell->align = 'right';

			try{
				//inicia a transacao com o db
				TTransaction::open('my_livro');

				//instancia um repositorio da classe vendaRecord
				$repositorio = new TRepository('Venda');
				//cria um criterio de selecao por intervalo das datas
				$criterio = new TCriteria;
				$criterio->add(new TFilter('data_venda','>=', $data_ini));
				$criterio->add(new TFilter('data_venda','<=', $data_fim));
				$criterio->setProperty('order','data_venda');

				//le todas vendas q satisfazem o criterio
				$vendas = $repositorio->load($criterio);
				//verifica se retornou algum objeto
				if ($vendas){
					//percorre as vendas
					foreach($vendas as $venda){
						//adiciona uma linha a tabela e define suas propriedades
						$row = $table->addRow();
						$row->bgcolor = '#e0e0e0';
						//adiciona celulas para data da venda e dados do cliente
						$cell = $row->addCell($this->conv_data_to_br($venda->data_venda));
						$cell = $row->addCell($venda->id_cliente . ' : ' . $venda->cliente->nome);
						$cell->colspan = 3;

						//verifica se a venda possui itens
						if ($venda->itens){

							$sub_total = 0;
							$total_qtde= 0;
							//percorre os itens da venda
							foreach($venda->itens as $item){
								//adiciona uma linha para cada item da venda
								$row = $table->addRow();
								//adiciona as celulas com os dados do item
								$cell = $row->addCell('');
								$cell = $row->addCell($item->id_produto . ' : ' . $item->descricao);

								$cell = $row->addCell($item->quantidade);
								$cell->align = 'right';
								$cell = $row->addCell(number_format($item->preco_venda,2,',','.'));
								$cell->align = 'right';
								//acumula totais de valor e quantidade
								$sub_total += $item->quantidade * $item->preco_venda;
								$total_qtde += $item->quantidade;
							}
							//adiciona uma linha para o total das vendas
							$row = $table->addRow();
							$cell = $row->addCell('');
							$cell = $row->addCell('<b>Sub-Total</b>');
							$cell = $row->addCell("<b> $total_qtde </b>");
							$cell->align = 'right';
							$cell = $row->addCell('<b>'.number_format($sub_total,2,',','.').'</b>');
							$cell->align = 'right';
						}
					}
				}
				TTransaction::close();
			} catch (Exception $e){
				//exibe msg gerada pela excecao
				new TMessage('error',$e->getMessage());

				TTransaction::rollback();
			}
			//adiciona a table a pagina
			parent::add($table);
		}
		function conv_data_to_us($data){

			$dia = substr($data,0,2);
			$mes = substr($data,3,2);
			$ano = substr($data,6,4);
			return "{$ano}-{$mes}-{$dia}";
		}
		function conv_data_to_br($data){

			$ano = substr($data,0,4);
			$mes = substr($data,5,2);
			$dia = substr($data,8,4);
			return "{$dia}-{$mes}-{$ano}";
		}
	}
?>