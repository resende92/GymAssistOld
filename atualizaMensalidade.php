<?php
include ($_SERVER['DOCUMENT_ROOT'] . '/GymAssist/classes/conectaBD.php');

 $conexao = new Conexao();
 $con = $conexao->abrirConexao();


         
         try{
            
             //$query = "select nome, matricula, DATE_FORMAT(data_matricula,'%Y/%m/%d') as data_matricula from aluno";
            $query = "
            update 
                aluno as a 
                inner join mensalidade as m on a.matricula = m.matricula
            set
                a.status_mensalidade =   case 
                                        when DATEDIFF(DATE_FORMAT(m.datavencimento,'%Y-%m-%d'),DATE_FORMAT(IFNULL(datapagamento,NOW()),'%Y-%m-%d')) < 0 then 3

                                        when DATEDIFF(DATE_FORMAT(m.datavencimento,'%Y-%m-%d'),DATE_FORMAT(IFNULL(datapagamento,NOW()),'%Y-%m-%d')) between 1 and 3 then 2

                                        when DATEDIFF(DATE_FORMAT(m.datavencimento,'%Y-%m-%d'),DATE_FORMAT(IFNULL(datapagamento,NOW()),'%Y-%m-%d')) > 3 then 1
            else null end
            WHERE 
                M.STATUS = 1;
            "; 

            $resultado = mysqli_query($con, $query);

            //echo 'resultado=' . $resultado . '<br>';


            echo "<script>alert('Mensalidades Atualizadas !!');top.location.href='/GymAssist/usuarios/admin/Paginas/Aluno.php'; </script>";


            } catch (Exception $ex) {
             echo "Houve um erro ao atualizar mensalidades";
         }
         finally{
             $conexao->fecharConexao();
         }

?>