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
        session_destroy();
        ?>
        <h1>Se ha cerrado la sesión</h1>
        <meta http-equiv="refresh" content="3;url=index.php">
    </body>
</html>