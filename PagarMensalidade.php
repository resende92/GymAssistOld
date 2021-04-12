<?php
include ($_SERVER['DOCUMENT_ROOT'] . '/GymAssist/classes/mensalidade.php');
include ($_SERVER['DOCUMENT_ROOT'] . '/GymAssist/classes/conectaBD.php');

$matricula = $_POST['matriculaPagar'];
$valor = $_POST['ValorTurma'];
$id_mensalidade = $_POST['btnModalPagar'];

// Mensal = 1
$mensalidade = new Mensalidade();

$vencimento = 1;
//Pegar data atual para pagamento
$data_pagamento = date("Y-m-d");

//Calculando a data da proxima mensalidede
$dateTime = new DateTime();
$data = $dateTime->format('Y-m-d');
$time = strtotime($data);
$final = date("Y-m-d", strtotime("+1 month", $time));
$id_turma = $_POST['txtTurma'];

$mensalidade->dataVencimento = $final;
$mensalidade->valorMensalidade = $valor;
$mensalidade->dataPagamento = $data_pagamento;
$mensalidade->status = 1;
$mensalidade->matricula = $matricula;
$mensalidade->id_turma = $id_turma;
$mensalidade->id_mensalidade = $id_mensalidade;


//echo json_encode($mensalidade);
$obj = $mensalidade->pagarMensalidade();


// ATUALIZAR STATUS DO ALUNO CASO PAGUE MENSALIDADE
$conexao = new Conexao();
$conexao->abrirConexao();

$query = "update aluno  set status = 1 where matricula = '". $matricula . "';"; //WHERE status = B'01'";

$resultado = mysqli_query($conexao->abrirConexao(), $query);

//echo json_encode($mensalidade);

echo "<script>alert('Mensalidade Paga !!');top.location.href='/GymAssist/usuarios/admin/Paginas/Aluno.php'; </script>";

?>