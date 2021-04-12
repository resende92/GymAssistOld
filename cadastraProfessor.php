<?php 

include ($_SERVER['DOCUMENT_ROOT'] . '/GymAssist/classes/professor.php');
include ($_SERVER['DOCUMENT_ROOT'] . '/GymAssist/classes/ConectaBD.php');

$professor = new Professor();

//Fim matricula
$professor->cref = $_POST['cref'];
$professor->custo_hora = $_POST['custo_hora'];
$professor->nome = $_POST['nome'];
$professor->cpf = $_POST['cpf'];
$professor->data_nascimento = $_POST['data_nascimento'];
$professor->telefone = $_POST['telefone'];
$professor->rg = $_POST['rg'];
$professor->bairro = $_POST['bairro'];
$professor->municipio = $_POST['municipio'];
$professor->email = $_POST['email'];
$professor->sexo = $_POST['sexo'];
//$professor->id_login = $_POST['id_login'];

$retorno = $professor->cadastrar();

//echo json_encode($professor);
//echo $retorno;
echo "<script>alert('Professor cadastrado!!');top.location.href='/GymAssist/usuarios/admin/Paginas/Professor.php'; </script>";
?>

</body>