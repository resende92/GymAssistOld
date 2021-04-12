<?php    
include ($_SERVER['DOCUMENT_ROOT'] . '/GymAssist/classes/ConectaBD.php');
include ($_SERVER['DOCUMENT_ROOT'] . '/GymAssist/classes/mensalidade.php');

$mensalidade = new Mensalidade();

$id_mensalidade = $_POST['id_mensalidade'];

$mensalidade->id_mensalidade = $id_mensalidade;

$mensalidade->excluir();

echo "<script>alert('Aluno está fora da turma!!');top.location.href='/GymAssist/usuarios/admin/Paginas/Turma.php'; </script>";
?>