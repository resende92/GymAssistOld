<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Gym Assist - Página de Login</title>
    <link href="/GymAssist/content/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="/GymAssist/content/css/simple-sidebar.css" rel="stylesheet">
</head>

<body>
<style>



body{
    background: url("/GymAssist/content/imagem/background-gym.jpg");
    background-color: #444;
    background-repeat: no-repeat;
    background-size: cover;

}

.vertical-offset-100{
    padding-top:100px;
}

</style>
<div class="container">
    <div class="container">
    <div class="row vertical-offset-100">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Login</h3>
                </div>
                <div class="panel-body">
                    <form accept-charset="UTF-8" role="form" method="post">
                    <fieldset>
                        <div class="form-group">
                            <input class="form-control" placeholder="E-mail" name="login" type="text" id = "Login" >
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Senha" name="senha" type="password" id = "Senha" >
                        </div>
                        <div class="col-md-12">
                            <label>
                                <a href ="/gymAssist/registre.php">Registre-se</a>
                            </label>
                        </div>
                        <input class="btn btn-lg btn-success btn-block" type="submit" value="Entrar" name = "Entrar">

                    </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
 
</div>
 <?php
 // session_start inicia a sessão
 include_once ('/classes/conectaBD.php');

session_start();

        if (isset($_POST['Entrar'])){

            $login = $_POST['login'];
            $senha = $_POST['senha'];
            

            $conexao = new Conexao();
            $conexao->abrirConexao();
            
            try{
                $query = "
                            SELECT 
                                l.login,
                                l.senha,
                                l.status,
                                l.id_permissao,
                                a.nome
                            FROM 
                                login l 
                                LEFT JOIN aluno a ON l.login = a.matricula 

                            WHERE l.login = '$login' AND l.senha = '$senha'; ";

                $resultado = mysqli_query($conexao->abrirConexao(), $query);
                
                $row = (mysqli_fetch_array($resultado));
                
                // VERIFICANDO PERMISSÃO DO USUARIO
                // 1 ADMIN
                // 2 ALUNO
                // 3 FUNCIONARIO

                //VERIFICANDO SE É ADMIN
                if(mysqli_num_rows($resultado) > 0 and $row['id_permissao'] == 1){
                    
                    $_SESSION['login'] = $login;
                    $_SESSION['senha'] = $senha;
                    header('Location: usuarios/admin/index.php');
                } 
                        // VERIFICANDO SE É ALUNO
                        else if (mysqli_num_rows($resultado) > 0 and $row['id_permissao'] == 2 and $row['status'] == 0) {

                                        echo "<script>";
                                        echo "alert('Por favor, confirme seu cadastro na Sempre em Forma mais próxima!')";
                                        echo "</script>";

                        }

                            else if (mysqli_num_rows($resultado) > 0 and $row['id_permissao'] == 2 and $row['status'] == 1) {

                                    $_SESSION['login'] = $login;
                                    $_SESSION['senha'] = $senha;
                                    $_SESSION['nome'] = $row['nome'];
                                    header('Location: usuarios/aluno/index.php');
                            }

                                // VERIFICANDO SE É FUNCIONARIO
                                else if (mysqli_num_rows($resultado) > 0 and $row['id_permissao'] == 3) {

                                        $_SESSION['login'] = $login;
                                        $_SESSION['senha'] = $senha;
                                        header('Location: usuarios/funcionario/index.php');
                                }

                            else {
                                    unset ($_SESSION['login']);
                                    unset ($_SESSION['senha']);
                                    echo "<script>";
                                    echo "alert('Dados incorretos!')";
                                    echo "</script>";
                                }
                
                
            } catch (Exception $ex) {
                echo "Houve um erro ao conectar!";
            }
            finally{
                $conexao->fecharConexao();
            }
            
        }  
        
        ?> 

<script src="/GymAssist/content/js/jquery-2.2.4.min.js"></script>
<script src="/GymAssist/content/js/bootstrap.min.js"></script>

</body>

</html>
