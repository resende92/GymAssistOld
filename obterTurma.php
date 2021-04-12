<?php

include ($_SERVER['DOCUMENT_ROOT'] . '/GymAssist/classes/turma.php');
include ($_SERVER['DOCUMENT_ROOT'] . '/GymAssist/classes/ConectaBD.php');

$id_turma = $_GET['id_turma'];

try {
    $turma = new Turma();

    $turma->id_turma = $id_turma;

    $obj = $turma->selecionar();

    ECHO $obj;
   
    
} catch (Exception $ex) {
    echo "Erro!". $ex;
}
finally{
    echo '';
}
