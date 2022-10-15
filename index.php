<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/styles.css">
        <meta charset="UTF-8">
        <title>InfoBDN</title> 
    </head>
    <body>
        <?php
        include ("funciones.php");
        ?>

        <h1>InfoBDN</h1>
        <h3> <a href="login.php" class="enlaces">Iniciar sesión</a> </h3>
        <h3> <a href="register.php" class="enlaces">Registrate</a> </h3>

        <?php
        if (isset($_POST['enviar'])){
            $_SESSION['dni'] = $_POST['dni'];
            $_SESSION['contra'] = md5($_POST['contra']);
            $_SESSION['nombre'] = $_POST['nombre'];
            $_SESSION['apellidos'] = $_POST['apellidos'];
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['rol'] = $_POST['rol'];
            añadirUsuario();
        }
        ?>
    </body>
</html>