<?PHP

	include_once'TAction.class.php';

	class Receptor {

		function acao($parameter){

			echo "acao executada com sucesso<br>";
		}
	}

	$receptor = new Receptor;
	$action1 = new TAction(array($receptor,'acao'));
	$action1->setParameter('nome','rick');
	echo $action1->serialize();
	echo "<br>";

	$action2 = new TAction('strtoup');
	$action2->setParameter('nome','rick');
	echo $action2->serialize();

?>