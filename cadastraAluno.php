<?php 

include ($_SERVER['DOCUMENT_ROOT'] . '/GymAssist/classes/Aluno.php');
include ($_SERVER['DOCUMENT_ROOT'] . '/GymAssist/classes/ConectaBD.php');
include ($_SERVER['DOCUMENT_ROOT'] . '/GymAssist/classes/login.php');

$Aluno = new Aluno();
$Login = new Login();

//Montando a matricula do aluno
//Pegando a data atual
$data = new DateTime();
$GerarMatricula = $data->format('Ydhms');
 //Inserido Ano+dia+hora+minuto+segundo como matricula
$Aluno->matricula = $GerarMatricula;

//Fim matricula
//Inicio Grava Login

$Login->login = $GerarMatricula;
$Login->senha = $_POST['senha'];
$Login->id_permissao = '2';
$Login->status = "B'01";

$id_login = $Login->cadastrar();
// FIM GRAVA LOGIN

$Aluno->data_matricula = $data->format('Ymd');
$Aluno->nome = $_POST['nome'];
$Aluno->plano = !isset($_POST['plano']) ? 'white' : $_POST['plano'];

$Aluno->status = '1';
$Aluno->cpf = $_POST['cpf'];
$Aluno->data_nascimento = $_POST['data_nascimento'];
$Aluno->telefone = $_POST['telefone'];
$Aluno->rg = $_POST['rg'];
$Aluno->bairro = $_POST['bairro'];
$Aluno->municipio = $_POST['municipio'];
$Aluno->email = $_POST['email'];
$Aluno->sexo = $_POST['sexo'];
$Aluno->id_login = $id_login;

$retorno = $Aluno->cadastrar();

//echo json_encode($Aluno);
//echo $retorno;
echo "<script>alert('Aluno cadastrado!!');top.location.href='/GymAssist/usuarios/admin/Paginas/Aluno.php'; </script>";

?>