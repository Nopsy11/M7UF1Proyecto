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
        if ($_SESSION['rol'] == "alumno"){
        ?>
        <header>
            <?php
            echo "Hola ".$_SESSION['nombre'].", eres un ".$_SESSION['rol']."";
            ?>
            <p> <a href="logout.php" class="enlaces">Cerrar sesion</a> </p>
        </header>
        <h1>Vista alumno</h1>
        <h3>Tus cursos</h3>
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
        ?>
        <h3>Cursos disponibles</h3>
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
            foreach (mostrarCursosDisponibles() as $key => $value){
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
        ?>
        <?php
        }
        else {
            echo "<meta http-equiv='refresh' content='0;url=login.php'>";
        }
        ?>
    </body>
</html>