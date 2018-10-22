<?php
	function __autoload($classe){
	if (file_exists("{$classe}.class.php")){
		include_once"{$classe}.class.php";
	}
}

	class inscricaoRecord extends TRecord {}
	


?>