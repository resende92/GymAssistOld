<?php

include ($_SERVER['DOCUMENT_ROOT'] . '/GymAssist/classes/atividade.php');
include ($_SERVER['DOCUMENT_ROOT'] . '/GymAssist/classes/ConectaBD.php');

$id_atividade = $_GET['id_atividade'];


try {

    $atividade = new Atividade();

    $atividade->id_atividade = $id_atividade;

    $obj = $atividade->selecionar();

    echo $obj;

} catch (Exception $ex) {
    echo "Erro!". $ex;
}
finally{
    echo '';
}
