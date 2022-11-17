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
        if ($_SESSION['rol'] == "profe" || $_SESSION['rol'] == "alumno"){
        ?>
        <header>
            <?php
            echo "<p> <a href='index-".$_SESSION['rol'].".php' class='enlaces'>Inicio</a> </p>";
            echo "Hola ".$_SESSION['nombre'].", eres un ".$_SESSION['rol']."";

            foreach (mostrarDatosUsuarioModificar($_SESSION['dni']) as $key => $value){}
            ?>
            <p> <a href="logout.php" class="enlaces">Cerrar sesion</a> </p>
        </header>
        <h1>Modificar curso</h1>
        <?php
        echo "<form action='index-".$_SESSION['dni'].".php' method='post' name='formularioModificarUsuario'>";
        ?>
            <table style="border: black 3px solid">
                <tr>
                    <td>Nombre:</td>
                    <td>
                        <?php
                        echo "<input type='text' id='modificarNombreUsuario' name='modificarNombreUsuario' value='".$value[1]."'>";
                        ?>
                    </td>
                    <td>Apellidos:</td>
                    <td>
                        <?php
                        echo "<input type='text' id='modificarApellidos' name='modificarApellidos' value='".$value[2]."'>";
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Edad:</td>
                    <td>
                        <?php
                        echo "<input type='number' id='modificarEdad' name='modificarEdad' value='".$value[5]."'>";
                        ?>
                    </td>
                    <td>FOTO:</td>
                    <td>
                        <?php
                        echo "<input type='date' id='modificarFoto' name='modificarFoto' value='".$value[4]."'>";
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td>
                        <?php
                        echo "<input type='email' id='modificarEmail' name='modificarEmail' value='".$value[6]."'>";
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="modificarUsuario" value="Modificar usuario">
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