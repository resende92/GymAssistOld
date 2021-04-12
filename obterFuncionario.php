<?php
include ($_SERVER['DOCUMENT_ROOT'] . '/GymAssist/classes/professor.php');
include ($_SERVER['DOCUMENT_ROOT'] . '/GymAssist/classes/ConectaBD.php');

$id = $_GET['id'];

try {
    $Aluno = new Funcionario();

    $Aluno->cdFuncionario = $id;

    $Aluno->Selecionar();
   
    
} catch (Exception $ex) {
    echo "Erro!". $ex;
}
finally{
    echo '';
}
