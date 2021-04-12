<html>
 <title>Titulo do site</title>
 <head>
 <meta http-equiv="refresh" content=1;url="../Paginas/Aluno.php">
 </head>
 <body>
<?php 

require_once '../classes/clAluno.php';

$Aluno = new Aluno();

$Aluno->cdAluno = $_POST['codigo_aluno'];
$Aluno->nome = $_POST['nome_aluno'];
$Aluno->matricula = $_POST['mensalidade_aluno'];
$Aluno->dataMatricula = $_POST['data_matricula'];


if ($_POST['btnModalAtivar']){
	$retorno = $Aluno->salvar();

	echo $retorno;
	echo 'Ativar';
} else if ($_POST['btnModalDesativar']) {
	$retorno = $Aluno->excluir();
	echo $retorno;
	echo 'Desativar';
}

echo 'Nada';

//echo "<script>alert('Aluno cadastrado!!');top.location.href='/GymAssist/usuarios/admin/Paginas/Professor.php'; </script>";

?>

</body>
 </html>