<html>

    <form name="registar" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <input type="hidden" name="oculto" value="teste">
        <input type="submit" class="submit" name="submit"  value="Enviar registo" />
    </form>

    <?php
    if (isset($_POST['submit'])) {
        //var_dump($_POST);

        echo $_POST['oculto'];
    } else {
        echo "AGUARDANDO";
    }
    ?>

</html>



DELIMITER $$
CREATE PROCEDURE nome_procedimento (MODO Matricula INT, MODO DATA VARCHAR(30))
BEGIN
	
END $$
DELIMITER ;