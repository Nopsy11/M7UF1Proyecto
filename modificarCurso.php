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
            
            foreach (mostrarDatosCursosModificar($_SESSION['idCurso']) as $key => $value){}
            ?>
            <p> <a href="logout.php" class="enlaces">Cerrar sesion</a> </p>
        </header>
        <h1>Modificar curso</h1>
        <form action="index-admin.php" method="post" name="formularioModificarCurso">
            <table style="border: black 3px solid">
                <tr>
                    <td>Nombre:</td>
                    <td>
                        <?php
                        echo "<input type='text' id='modificarNombreCurso' name='modificarNombreCurso' value='".$value[1]."'>";
                        ?>
                    </td>
                    <td>Desripcion:</td>
                    <td>
                        <?php
                        echo "<input type='text' id='modificarDescripcion' name='modificarDescripcion' value='".$value[2]."'>";
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Fecha inicio:</td>
                    <td>
                        <?php
                        echo "<input type='date' id='modificarFecha_inicio' name='modificarFecha_inicio' value='".$value[4]."'>";
                        ?>
                    </td>
                    <td>Fecha finalización:</td>
                    <td>
                        <?php
                        echo "<input type='date' id='modificarFecha_fin' name='modificarFecha_fin' value='".$value[5]."'>";
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Cantidad de horas:</td>
                    <td>
                        <?php
                        echo "<input type='number' id='modificarHoras' name='modificarHoras' value='".$value[3]."'>";
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Profesores:</td>
                    <td>
                        <select name="nombreProfesor">
                            <?php
                                foreach (mostrarProfes() as $key => $value){
                                    echo "<option>".$value[1]."</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="modificarCurso" value="Modificar curso">
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