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

            foreach (mostrarDatosUsuarioModificar($_SESSION['dniModificarProfe']) as $key => $value){}
            ?>
            <p> <a href="logout.php" class="enlaces">Cerrar sesion</a> </p>
        </header>
        <h1>Modificar curso</h1>
        <form action="index-admin.php" method="post" name="formularioModificarProfe">
            <table style="border: black 3px solid">
                <tr>
                    <td>Nombre:</td>
                    <td>
                        <?php
                        echo "<input type='text' id='modificarNombreProfe' name='modificarNombreProfe' value='".$value[1]."'>";
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
                        <input type="submit" name="modificarProfe" value="Modificar profesor">
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