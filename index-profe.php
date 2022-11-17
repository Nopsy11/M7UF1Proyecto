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
        <table>
            <tr>
                <td class = 'modificar'>
                    <a href='modificarUsuario.php' class='enlaces'>Modificar perfil </a>
                </td>
            </tr>
        </table>
        <?php
        echo "<table style='border: black 3px solid; text-align: center;'>";
            echo "<tr>";
                echo "<td>Codigo curso</td>";
                echo "<td>Nombre</td>";
                echo "<td>Descripcion</td>";
                echo "<td>Horas</td>";
                echo "<td>Fecha inicio</td>";
                echo "<td>Fecha fin</td>";
            echo "</tr>";
            foreach (mostrarCursosApuntados($_SESSION['dni']) as $key => $value){
                echo "<tr>";
                    echo "<td>".$value[0]."</td>";
                    echo "<td>".$value[1]."</td>";
                    echo "<td>".$value[2]."</td>";
                    echo "<td>".$value[3]."</td>";
                    echo "<td>".$value[4]."</td>";
                    echo "<td>".$value[5]."</td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td style='border: black 3px solid; background-color: red;' colspan='9'></td>";
                echo "</tr>";
            }
        echo "</table>";

        /* modificar datos profesor */
        if (isset($_POST['modificarUsuario'])){
            $_SESSION['modificarNombreUsuario'] = $_POST['modificarNombreUsuario'];
            $_SESSION['modificarApellidos'] = $_POST['modificarApellidos'];
            $_SESSION['modificarEdad'] = $_POST['modificarEdad'];
            $_SESSION['modificarFoto'] = $_POST['modificarFoto'];
            $_SESSION['modificarEmail'] = $_POST['modificarEmail'];
            modificarUsuario();
            echo "<meta http-equiv='refresh' content='0;url=index-profe.php'>";
        }
        ?>
        <?php
        }
        else {
            echo "<meta http-equiv='refresh' content='0;url=login.php'>";
        }
        ?>
    </body>
</html>