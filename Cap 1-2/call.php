<?php

include_once'classes/produto.classe.php';

$produto = new Produto(1,"Pen Drive 8GB",1,39.90);
$produto2 = new Produto(1,"Pen Drive 8GB",1,39.90);

echo $produto->vender(10);
echo $produto->vender(25);
echo $produto2->vender(450);



?>