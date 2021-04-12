<?php 

include ($_SERVER['DOCUMENT_ROOT'] . '/GymAssist/classes/Turma.php');
include ($_SERVER['DOCUMENT_ROOT'] . '/GymAssist/classes/ConectaBD.php');

$turma = new Turma();

$turma->id_atividade = $_POST['id_atividade'];
$turma->id_funcionario = $_POST['id_funcionario'];
$turma->nome_turma = $_POST['nome_turma'];
$turma->horario = $_POST['horario'];
//$turma->totalAlunos = $_POST['totalAlunos'];
$turma->maxAlunos = $_POST['maxAlunos'];
$turma->status = '01';


$retorno = $turma->cadastrar();

echo "<script>alert('Turma Cadastrada!!');top.location.href='/GymAssist/usuarios/admin/Paginas/Turma.php'; </script>";

?>