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
        if ($_SESSION['rol'] == "profe"){
        ?>
        <header>
            <?php
            echo "Hola ".$_SESSION['nombre'].", eres un ".$_SESSION['rol']."";
            ?>
            <p> <a href="logout.php" class="enlaces">Cerrar sesion</a> </p>
        </header>
        <h1>Vista profe</h1>
        <?php
        }
        else {
            echo "<meta http-equiv='refresh' content='0;url=login.php'>";
        }
        ?>
    </body>
</html>