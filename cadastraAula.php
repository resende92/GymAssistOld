<?php 

include ($_SERVER['DOCUMENT_ROOT'] . '/GymAssist/classes/Atividade.php');
include ($_SERVER['DOCUMENT_ROOT'] . '/GymAssist/classes/ConectaBD.php');

$Atividade = new Atividade();

//$Atividade->id_atividade = $_POST[''];
$Atividade->aula = $_POST['aula'];
$Atividade->Duracao = $_POST['duracao'];
$Atividade->minAluno = $_POST['min_alunos'];


$retorno = $Atividade->cadastrar();

//echo $retorno;
echo "<script>alert('Aula cadastrada!!');top.location.href='/GymAssist/usuarios/admin/Paginas/Aula.php'; </script>";

?>