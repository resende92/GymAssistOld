<?php 

include ($_SERVER['DOCUMENT_ROOT'] . '/GymAssist/classes/Atividade.php');
include ($_SERVER['DOCUMENT_ROOT'] . '/GymAssist/classes/ConectaBD.php');

$Atividade = new Atividade();

$Atividade->id_atividade = $_POST['id_atividade'];
$Atividade->aula = $_POST['aula'];
$Atividade->Duracao = $_POST['duracao'];
$Atividade->minAluno = $_POST['min_alunos'];

if ($_POST['btnModal'] == 'desativar'){

	$Atividade->excluir();
	$Atividade->status = 0;

} else {
	$Atividade->status = 1;
	$retorno = $Atividade->salvar();

	}	

//echo $retorno;
//echo json_encode($Atividade);

echo "<script>alert('Aula salva!!');top.location.href='/GymAssist/usuarios/admin/Paginas/Aula.php'; </script>";

?>