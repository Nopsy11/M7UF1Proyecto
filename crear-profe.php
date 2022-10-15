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
        if ($_SESSION['rol'] == "admin"){
        ?>
        <header>
            <p> <a href="index-admin.php" class="enlaces">Inicio</a> </p>
            <?php
            echo "Hola ".$_SESSION['nombre'].", eres un ".$_SESSION['rol']."";
            ?>
            <p> <a href="logout.php" class="enlaces kk">Cerrar sesion</a> </p>
        </header>
        <h1>Crear curso</h1>
        <form action="index-admin.php" method="post" name="formularioCrearProfe">
            <table style="border: black 3px solid">
                <tr>
                    <td>DNI:</td>
                    <td>
                        <input type="text" id="dniProfe" name="dniProfe" required>
                    </td>
                    <td>Contraseña:</td>
                    <td>
                        <input type="password" id="contraProfe" name="contraProfe" required>
                    </td>
                </tr>
                <tr>
                    <td>Nombre:</td>
                    <td>
                        <input type="text" id="nombreProfe" name="nombreProfe" required>
                    </td>
                    <td>Apellidos:</td>
                    <td>
                        <input type="text" id="apellidosProfe" name="apellidosProfe" required>
                    </td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td>
                        <input type="email" id="emailProfe" name="emailProfe" required>
                    </td>
                </tr>
                <tr style="display: none;">
                    <td>
                        <input type="radio" id="rolProfe" name="rolProfe" value="profe" checked="true" required>
                        <label for="profe">Profesor</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="crearProfe" value="Crear profe">
                    </td>
                </tr>
            </table>
        </form>
        <?php
        }
        else {
            echo "<meta http-equiv='refresh' content='0;url=login.php'>";
        }
        ?>
    </body>
</html>