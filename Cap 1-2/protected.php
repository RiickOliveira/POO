<?php  

include_once'classes/funcionario.classe.php';
include_once'classes/estagiario.classe.php';

$pedrinho = new estagiario;
$pedrinho->setSalario(248);
echo "salario de pedrinho: {$pedrinho->getSalario()}";


?>