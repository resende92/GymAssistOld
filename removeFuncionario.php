<?php

require_once '../class/Conexao.php';
require_once '../class/Aluno.php';

$id = $_POST['id'];

try{
    $conexao = new Conexao();
    $conexao->abrirConexao();
    
    $query = "DELETE FROM aluno WHERE idAluno = '$id'";

    $result = mysqli_query($conexao->abrirConexao(), $query);
    
    $resultado[] = array('tipo'=>'success','mensagem'=>'Aluno removido com sucesso!');
    echo json_encode($resultado);
    
} catch (Exception $ex) {
   $resultado[] = array('tipo'=>'error','mensagem'=>'Não foi possível remover o aluno');
   echo json_encode($resultado);
}
finally{
    $conexao->fecharConexao();
}
