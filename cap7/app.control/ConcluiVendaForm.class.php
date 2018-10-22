<?PHP

	//classe concluiVenda formulario de conclusao de venda
	class ConcluiVendaForm extends TForm{

		public $button; //botao de acao do formulario

		//cria a pagina e o formulario de cadastro
		function __construct(){

			parent::__construct('form_conclui_venda');

			$table = new TTable;
			//adiciona a tabela ao formulario
			parent::add($table);

			//cria os campos do formulario
			$cliente = new TEntry('id_cliente');
			$desconto = new TEntry('desconto');
			$valor_total = new TEntry('valor_total');
			$valor_pago = new TEntry('valor_pago');
			//define alguns atributos para os campos do form
			$valor_total->setEditable(false);
			$cliente->setSize(100);
			$desconto->setSize(100);
			$valor_total->setSize(100);
			$valor_pago->setSize(100);
			//adiciona uma lionha para o campo 
			$row = $table->addRow();
			$row->addCell(new TLabel('Cliente: '));
			$row->addCell($cliente);
			//adiciona uma lionha para o campo 
			$row = $table->addRow();
			$row->addCell(new TLabel('Desconto: '));
			$row->addCell($desconto);
			//adiciona uma lionha para o campo 
			$row = $table->addRow();
			$row->addCell(new TLabel('Valor Total: '));
			$row->addCell($valor_total);
			//adiciona uma lionha para o campo 
			$row = $table->addRow();
			$row->addCell(new TLabel('Valor Pago: '));
			$row->addCell($valor_pago);

			//cria um botao de acao para o formulario
			$this->button = new TButton('finaliza');
			$this->button2 = new TButton('cancela');

			//adiciona uma linha para as acoes do formulario 
			$row = $table->addRow();
			$row->addCell('');
			$row->addCell($this->button);
			

			//define quais sao os campos do formulario
			parent::setFields(array($cliente,$desconto,$valor_total,$valor_pago,$this->button));
		}
	}

?>