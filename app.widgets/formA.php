<?php
	
	function __autoload($classe) {

 	if (file_exists("{$classe}.class.php")) {

 		include_once "{$classe}.class.php";
 	}
 }

 	

 	$css = new TStyle('estudo');
	$css->background_color = 'blue';
	$css->show();
	exit();

	$form = new TForm('form_pessoas');
	//cria a tabela para organizar o layout
	$table = new TTable;
	$table->border = 1;
	$table->bgcolor = '#f2f2f2';
	//adiciona  atable no formulario
	$form->add($table);
	
	$titulo = new TLabel('EXEMPLO');
	$titulo->setFontFace('Arial');
	$titulo->setFontColor('red');
	$titulo->setFontSize('18');
	//adiciona uma linha a tabela
	$row = $table->addRow();
	$titulo = $row->addCell($titulo);
	$titulo->colspan = 2;
	//cria duas outras tabelas
	$table1 = new TTable;
	$table2 = new TTable;
	//cria uma serie de campos de entrada de dados
	$codigo = new TEntry('codigo');
	$nome = new TEntry('nome');
	$endereco = new TEntry('endereco');
	$telefone = new TEntry('telefone');
	/*$cidade = new TCombo('cidade');
	$itens = array();
	$itens['1'] = 'Rio de Janeiro';
	$itens['2'] = 'Sao Paulo';
	$cidade->addItens($itens);
*/
	$codigo->setSize(70);
	$nome->setSize(140);
	$endereco->setSize(140);
	$telefone->setSize(140);
	//$cidade->setSize(140);
	//cria uma serie de rotulo de textos
	$label1 = new TLabel('Codigo');
	$label2 = new TLabel('Nome');
	//$label3 = new TLabel('Cidade');
	$label4 = new TLabel('Endereco');
	$label5 = new TLabel('Telefone');
	//adiciona liha na tabela para o codigo
	$row = $table1->addRow();
	$row->addCell($label1);
	$row->addCell($codigo);

	$row = $table1->addRow();
	$row->addCell($label2);
	$row->addCell($nome);

	/*$row = $table1->addRow();
	$row->addCell($label3);
	$row->addCell($cidade);
*/
	$row = $table2->addRow();
	$row->addCell($label4);
	$row->addCell($endereco);

	$row = $table2->addRow();
	$row->addCell($label5);
	$row->addCell($telefone);

	$row = $table->addRow();
	$row->addCell($table1);
	$row->addCell($table2);

	$form->show();
?> 