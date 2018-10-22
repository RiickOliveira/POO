<?php

include_once'classes/funcionario.classe.php';

	$pedro = new funcionario;
	$pedro->setSalario(850);

	echo "salario de pedro é : {$pedro->getSalario()}";

?>