<?php 

include ($_SERVER['DOCUMENT_ROOT'] . '/GymAssist/classes/Turma.php');
include ($_SERVER['DOCUMENT_ROOT'] . '/GymAssist/classes/ConectaBD.php');

$turma = new Turma();

$turma->id_turma = $_POST['id_turma'];
$turma->id_atividade = $_POST['id_atividade'];
$turma->id_funcionario = $_POST['id_funcionario'];
$turma->nome_turma = $_POST['nome_turma'];
$turma->horario = $_POST['horario'];
//$turma->totalAlunos = $_POST['totalAlunos'];
$turma->maxAlunos = $_POST['maxAlunos'];


if ($_POST['btnModal'] == 'desativar')
{
	$turma->status = '0';

	$retorno = $turma->salvar();
	$retorno2 = $turma->excluir();

//echo json_encode($turma);
//echo $retorno;
echo "<script>alert('Turma desativada com sucesso!!');top.location.href='/GymAssist/usuarios/admin/Paginas/turma.php'; </script>";

} else if ($_POST['btnModal'] == 'salvar')
{
	$turma->status = '1';


$retorno = $turma->salvar();

$turma->atualizaAlunoTurma();

//echo json_encode($turma);
//echo $retorno;
echo "<script>alert('Turma salva com sucesso!!');top.location.href='/GymAssist/usuarios/admin/Paginas/turma.php'; </script>";

}


?>