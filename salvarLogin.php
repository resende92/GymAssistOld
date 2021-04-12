<?php 

include ($_SERVER['DOCUMENT_ROOT'] . '/GymAssist/classes/Aluno.php');
include ($_SERVER['DOCUMENT_ROOT'] . '/GymAssist/classes/ConectaBD.php');

$Aluno = new Aluno();


$Aluno->matricula = $_POST['matricula'];
$Aluno->data_matricula = $_POST['data_matricula'];
$Aluno->nome = $_POST['nome'];
$Aluno->plano = $_POST['plano'];
$Aluno->cpf = $_POST['cpf'];
$Aluno->data_nascimento = $_POST['data_nascimento'];
$Aluno->telefone = $_POST['telefone'];
$Aluno->rg = $_POST['rg'];
$Aluno->bairro = $_POST['bairro'];
$Aluno->municipio = $_POST['municipio'];
$Aluno->email = $_POST['email'];
$Aluno->sexo = $_POST['sexo'];

if (isset($_POST['desativar']) == 'true') {
	$Aluno->status = '0';
}
else {
	$Aluno->status = '1';
};

$retorno = $Aluno->salvar();

//echo json_encode($Aluno);
                   

echo "<script>alert('Dados salvos com sucesso!!');top.location.href='../Paginas/Aluno.php'; </script>";

?>

</body>
 </html>