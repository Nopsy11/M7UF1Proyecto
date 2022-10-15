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

        if (isset($_POST['submit'])){
            if ($datos = iniciarSesion($_POST['dni'], $_POST['contra'])){
                $_SESSION['dni'] = $datos['dni'];
                $_SESSION['nombre'] = $datos['nombre'];
                $_SESSION['apellidos'] = $datos['apellidos'];
                $_SESSION['contra'] = $datos['contra'];
                $_SESSION['foto'] = $datos['foto'];
                $_SESSION['edad'] = $datos['edad'];
                $_SESSION['email'] = $datos['email'];
                $_SESSION['rol'] = $datos['rol'];
                echo "<meta http-equiv='refresh' content='0;url=index-".$_SESSION['rol'].".php'>";
            }
        }
        ?>
        <header>
            <p> <a href="index.php" class="enlaces">Inicio</a> </p>
        </header>
        <h1>Iniciar sesion</h1>
        <form action="login.php" method="post" name="formularioLogin">
            <table style="border: black 3px solid">
                <tr>
                    <td>DNI:</td>
                    <td>
                        <input type="text" id="dni" name="dni" required>
                    </td>
                </tr>
                <tr>
                    <td>Contraseña:</td>
                    <td>
                        <input type="password" id="contra" name="contra" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="submit" value="Enviar">
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>