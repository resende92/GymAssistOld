<?php

include ($_SERVER['DOCUMENT_ROOT'] . '/GymAssist/classes/Aluno.php');
include ($_SERVER['DOCUMENT_ROOT'] . '/GymAssist/classes/ConectaBD.php');

$matricula = $_GET['matricula'];

try {
    $Aluno = new Aluno();

    $Aluno->matricula = $matricula;

    $obj = $Aluno->Selecionar();
    

    echo $obj;
   
    
} catch (Exception $ex) {
    echo "Erro!". $ex;
}
finally{
    echo '';
}
