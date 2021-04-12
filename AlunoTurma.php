<?php
include ($_SERVER['DOCUMENT_ROOT'] . '/GymAssist/classes/mensalidade.php');
include ($_SERVER['DOCUMENT_ROOT'] . '/GymAssist/classes/ConectaBD.php');


$link = new Conexao();
$conexao = $link->abrirConexao();

$mensalidade = new Mensalidade();

$dateTime = new DateTime();
$data = $dateTime->format('Y-m-d');
$time = strtotime($data);
$final = date("Y-m-d", strtotime("+1 month", $time));


$matricula = $_POST['matricula'];
$id_turma = $_POST['id_turma'];
$valormensalidade = $_POST['valor_mensalidade'];

$mensalidade->matricula = $matricula;
$mensalidade->id_turma = $id_turma;
$mensalidade->valorMensalidade = $valormensalidade;
//$mensalidade->dataPagamento = $data;
$mensalidade->dataVencimento = $final;
$mensalidade->status = 1;

$mensalidade->cadastrar();

echo "<script>alert('Aluno adicionado a turma!!');top.location.href='/GymAssist/usuarios/admin/Paginas/turma.php'; </script>"

?>