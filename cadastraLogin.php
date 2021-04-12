<?php 

include ($_SERVER['DOCUMENT_ROOT'] . '/GymAssist/classes/Login.php');
include ($_SERVER['DOCUMENT_ROOT'] . '/GymAssist/classes/ConectaBD.php');
include ($_SERVER['DOCUMENT_ROOT'] . '/GymAssist/classes/Aluno.php');

$Aluno = new Aluno();
$Login = new Login();

//Montando a matricula do aluno
//Pegando a data atual
$data = new DateTime();
$GerarMatricula = $data->format('Ydhms');
 //Inserido Ano+dia+hora+minuto+segundo como matricula
$Aluno->matricula = $GerarMatricula;

//Inicio Grava Login

$Login->login = $GerarMatricula;
$Login->senha = $_POST['senha'];
$Login->id_permissao = '2';
$Login->status = "B'00";

$id_login = $Login->cadastrar();
//Fim matricula
$Aluno->data_matricula = $data->format('Ymd');
$Aluno->nome = $_POST['nome'];
$Aluno->plano = 'white';
$Aluno->status = '0';
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
//echo json_encode($Login);


echo //"<script>alert('Login cadastrado, Seu login de acesso é: " . $Aluno->matricula . ", Vá até a Sempre em Forma mais próxima para confirmar seu cadastro!');
"<script> top.location.href='../../EnviarEmail/enviarEmail.php?matricula=".$GerarMatricula."&email=".$_POST['email']."'; </script>";

?>