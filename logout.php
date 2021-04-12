<?php 


session_start(); //iniciamos a sessão que foi aberta 

session_destroy(); // destruimos a sessão 

session_unset(); //limpamos as variaveis globais das sessões

echo "<script>alert('Deslogado com sucesso!!');top.location.href='index.php'; </script>";

?>