<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Gym Assist - Registre-se</title>
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
<script>

</script>
<div class="col-md-6 col-md-offset-3">
<form action='Controller/cadastraLogin.php' method="post" name='dados'>
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">CADASTRAR</h4>
        </div>
        <div class="modal-body">
          <table class = 'table table-hover'>
            <tr><td>NOME : </td> <td> <input class='form-control' type="text" id = 'nome' name = 'nome' maxlength="30" minlength="5" required='true'/></td></tr>
            <tr><td>CPF : </td> <td><input class='form-control' type="text" name="cpf" id="cpf" maxlength="14" required='true' /></td></tr>
            <tr><td>DATA DE NASCIMENTO : </td> <td> <input class='form-control' type="date" id = "data_nascimento" name = "data_nascimento" required="true" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" min="1916-01-01" max="2000-12-31" /></td></tr>
            <tr><td>TELEFONE : </td> <td> <input class='form-control' type="text" id = 'telefone' name = 'telefone' maxlength="14" required='true'/></td></tr>
            <tr><td>RG : </td> <td> <input class='form-control' type="text" id = 'rg' name = 'rg' maxlength="20" required='true'/></td></tr>
            <tr><td>BAIRRO : </td> <td> <input class='form-control' type="text" id = 'bairro' name = 'bairro' maxlength="30" required='true'/></td></tr>
            <tr><td>MUNICÍPIO : </td> <td> <input class='form-control' type="text" id = 'municipio' name = 'municipio' maxlength="40" required='true'/></td></tr>
            <tr><td>E-MAIL : </td> <td> <input class='form-control' type="text" id = 'email' name = 'email' maxlength="40" required='true'/></td></tr>
            <tr><td>SENHA : </td> <td><input class='form-control' type="password" name="senha" id="senha" minlength="10" maxlength="30" required='true' /></td></tr>
            <tr><td>CONFIRME SUA SENHA : </td> <td><input class='form-control' type="password" name="confirmasenha" id="confirmasenha" minlength="10" maxlength="30" required='true'/></td></tr>
            <tr><td>SEXO : </td> 
                <td> 
                    <input type="radio" name="sexo" value="M"> Masculino
                    <input type="radio" name="sexo" value="F"> Feminino
                </td>
            </tr>            

          </table>


        </div>
        <div class="modal-footer">
          <a href='index.php'> <button type="button" class="btn btn-default">Voltar</button></a>
          <input type="submit" class="btn btn-primary" value="Enviar"></input>
        </div>
      </div><!-- /.modal-content -->
    </form>
</div>
<script src="/GymAssist/content/js/jquery-2.2.4.min.js"></script>
<script src="/GymAssist/content/js/bootstrap.min.js"></script>
<script src="/GymAssist/content/js/InputMask/dist/jquery.inputmask.bundle.js"></script>
<script>

    $(document).ready(function() {

        //$('#btn-registrar').click(function(){
           // location.href ='/login.php';
        //});

        $('#cpf').inputmask('999.999.999-99');
        $('#telefone').inputmask('(99)99999-9999');

        $('form').submit(function(e){
            return enviardados(e);

        })
    });

function enviardados(e){
    var ok = true;
    var txt = "";

    if( $("#email").val().match(/((\w|\W){1,50})@((\w|){1,50}).((\w){1,10})/g)  ==  null){
        ok = false;
        txt +=  "Preencha campo E-Mail corretamente (ex.:email.email@email.com) !\n" ;
    }

    if(ValidadorCpf($("#cpf").val()) == false){
        ok = false;
        txt +=  "Preencha com um cpf válido!\n" ;
    }
    
    if($("#senha").val() != $("#confirmasenha").val() ){
        ok = false;
        txt +=  "Por favor digite as senhas iguais! !\n" ;
    }

    if(!ok){ 
        e.preventDefault();
        alert(txt);
    }
    return ok;
 }


function ValidadorCpf(strCPF) {

    strCPF = strCPF.replace('.','').replace('.','').replace('-','');    

    if(strCPF == '') return false; 

    // Elimina CPFs invalidos conhecidos    
    if (strCPF.length != 11 || 
        strCPF == "00000000000" || 
        strCPF == "11111111111" || 
        strCPF == "22222222222" || 
        strCPF == "33333333333" || 
        strCPF == "44444444444" || 
        strCPF == "55555555555" || 
        strCPF == "66666666666" || 
        strCPF == "77777777777" || 
        strCPF == "88888888888" || 
        strCPF == "99999999999")
            return false;       
    // Valida 1o digito 
    add = 0;    
    for (i=0; i < 9; i ++)       
        add += parseInt(strCPF.charAt(i)) * (10 - i);  
        rev = 11 - (add % 11);  
        if (rev == 10 || rev == 11)     
            rev = 0;    
        if (rev != parseInt(strCPF.charAt(9)))     
            return false;       
    // Valida 2o digito 
    add = 0;    
    for (i = 0; i < 10; i ++)        
        add += parseInt(strCPF.charAt(i)) * (11 - i);  
    rev = 11 - (add % 11);  
    if (rev == 10 || rev == 11) 
        rev = 0;    
    if (rev != parseInt(strCPF.charAt(10)))
        return false;       
    return true;   
}
</script>
</body>

</html>
