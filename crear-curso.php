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
        <form action="index-admin.php" method="post" name="formulariorCrearCurso">
            <table style="border: black 3px solid">
                <tr>
                    <td>Nombre:</td>
                    <td>
                        <input type="text" id="nombreCurso" name="nombreCurso" required>
                    </td>
                    <td>Desripcion:</td>
                    <td>
                        <input type="text" id="descripcion" name="descripcion" required>
                    </td>
                </tr>
                <tr>
                    <td>Fecha inicio:</td>
                    <td>
                        <input type="date" id="fecha_inicio" name="fecha_inicio" required>
                    </td>
                    <td>Fecha finalización:</td>
                    <td>
                        <input type="date" id="fecha_fin" name="fecha_fin" required>
                    </td>
                </tr>
                <tr>
                    <td>Cantidad de horas:</td>
                    <td>
                        <input type="number" id="horas" name="horas" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="crearCurso" value="Crear curso">
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