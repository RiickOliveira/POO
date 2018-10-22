<?php
	include_once'app.widgets/TTranslation.class.php';

	//define a linguagem como portuges
	TTranslation::setLanguage('pt');
	echo "Em portugues: <br>";
	//imprime as palavras traduzidas
	echo _t('Function') . "<br>\n";
	echo _t('Table') . "<br>\n";
	echo _t('Tool') . "<br>\n";
	//define a limguagem como italiano
	TTranslation::setLanguage('it');
	echo "Em Italiano: <br>";
	echo _t('Function') . "<br>\n";
	echo _t('Table') . "<br>\n";
	echo _t('Tool') . "<br>\n";
?>