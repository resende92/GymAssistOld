<?php 

include ($_SERVER['DOCUMENT_ROOT'] . '/GymAssist/classes/Aluno.php');
include ($_SERVER['DOCUMENT_ROOT'] . '/GymAssist/classes/ConectaBD.php');

$Aluno = new Aluno();

//Montando a matricula do aluno
//Pegando a data atual
 $data = new DateTime();
 $GerarMatricula = echo $data->format('Ydhms');
 //Inserido Ano+dia+hora+minuto+segundo como matricula
$Aluno->matricula = $GerarMatricula;

//Fim matricula

$Aluno->data_matricula = $_POST['data_matricula'];
$Aluno->nome = $_POST['nome'];
$Aluno->plano = $_POST['plano'];
$Aluno->status = '1';
$Aluno->cpf = $_POST['cpf'];
$Aluno->data_nascimento = $_POST['data_nascimento'];
$Aluno->telefone = $_POST['telefone'];
$Aluno->rg = $_POST['rg'];
$Aluno->bairro = $_POST['bairro'];
$Aluno->municipio = $_POST['municipio'];
$Aluno->email = $_POST['email'];
$Aluno->sexo = $_POST['sexo'];
$Aluno->id_login = $_POST['id_login'];

$retorno = $Aluno->cadastrar();

//echo json_encode($Aluno);
                   
echo "<script>alert('Aluno cadastrado!!');top.location.href='/GymAssist/usuarios/admin/Paginas/Professor.php'; </script>";

?>

</body>
 </html>