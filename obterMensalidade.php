<?php
include ($_SERVER['DOCUMENT_ROOT'] . '/GymAssist/classes/mensalidade.php');
include ($_SERVER['DOCUMENT_ROOT'] . '/GymAssist/classes/ConectaBD.php');
// Mensal = 1

$matricula = $_GET['matricula'];

try {
	$mensalidade = new Mensalidade();

	$mensalidade->matricula = $matricula;

	$obj = $mensalidade->selecionarMensalidadeValor();

	echo $obj;
	
} catch (Exception $ex) {
	echo "Erro!". $ex;
}
finally{
	echo '';
}

?>
