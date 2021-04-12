<?php 

include ($_SERVER['DOCUMENT_ROOT'] . '/GymAssist/classes/Aluno.php');
include ($_SERVER['DOCUMENT_ROOT'] . '/GymAssist/classes/ConectaBD.php');
include ($_SERVER['DOCUMENT_ROOT'] . '/GymAssist/classes/Login.php');

$Aluno = new Aluno();
$Login = new Login();

//Inicio Grava Login

$Login->login = $_POST['matricula'];
$Login->senha = $_POST['senha'];

// FIM GRAVA LOGIN


$Aluno->matricula = $_POST['matricula'];
$Aluno->nome = $_POST['nome'];
$Aluno->plano = !isset($_POST['plano']) ? 'white' : $_POST['plano'];
$Aluno->cpf = $_POST['cpf'];
$Aluno->data_nascimento = $_POST['data_nascimento'];
$Aluno->telefone = $_POST['telefone'];
$Aluno->rg = $_POST['rg'];
$Aluno->bairro = $_POST['bairro'];
$Aluno->municipio = $_POST['municipio'];
$Aluno->email = $_POST['email'];
$Aluno->sexo = $_POST['sexo'];

if (isset($_POST['btnModalDesativar'])) {
	$Aluno->status = '0';
	$Login->status = '00';
}
else if (isset($_POST['btnModalAtivar'])){
	$Aluno->status = '1';
	$Login->status = '01';
};

$retorno = $Aluno->salvar();
$Login->salvar();

//echo json_encode($Aluno);
//echo json_encode($Login);
                   

echo "<script>alert('Dados salvos com sucesso!!');top.location.href='/GymAssist/usuarios/admin/Paginas/Aluno.php'; </script>";

?>