<?php

include ($_SERVER['DOCUMENT_ROOT'] . '/GymAssist/classes/professor.php');
include ($_SERVER['DOCUMENT_ROOT'] . '/GymAssist/classes/ConectaBD.php');

$id = $_GET['id'];

try {

    $professor = new Professor();

    $professor->id_funcionario = $id;

    $obj = $professor->Selecionar();

    ECHO $obj;
   
    
} catch (Exception $ex) {
    echo "Erro!". $ex;
}
finally{
    echo '';
}
