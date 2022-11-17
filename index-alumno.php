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
        <table>
            <tr>
                <td class = 'modificar'>
                    <a href='modificarUsuario.php' class='enlaces'>Modificar perfil </a>
                </td>
            </tr>
        </table>
        <h3>Tus cursos</h3>
        <?php
        echo "<table style='border: black 3px solid; text-align: center;'>";
            echo "<tr>";
                echo "<td>Nombre</td>";
                echo "<td>Descripcion</td>";
                echo "<td>Horas</td>";
                echo "<td>Fecha inicio</td>";
                echo "<td>Fecha fin</td>";
                echo "<td>Desmatricularse</td>";
            echo "</tr>";
            foreach (mostrarCursosApuntados($_SESSION['dni']) as $key => $value){
                echo "<tr>";
                    // echo "<td>".$value[0]."</td>";
                    echo "<td>".$value[1]."</td>";
                    echo "<td>".$value[2]."</td>";
                    echo "<td>".$value[3]."</td>";
                    echo "<td>".$value[4]."</td>";
                    echo "<td>".$value[5]."</td>";
                    echo "<td> <a href='index-alumno.php?desmatricular=true&desmatricularCodigoCurso=".$value[0]."' class='enlaces'> X </a> </td>";
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
                echo "<td>Nombre</td>";
                echo "<td>Descripcion</td>";
                echo "<td>Horas</td>";
                echo "<td>Fecha inicio</td>";
                echo "<td>Fecha fin</td>";
                echo "<td>Apuntarse</td>";
            echo "</tr>";
            foreach (mostrarCursosDisponibles() as $key => $value){
                echo "<tr>";
                    // echo "<td>".$value[0]."</td>";
                    echo "<td>".$value[1]."</td>";
                    echo "<td>".$value[2]."</td>";
                    echo "<td>".$value[3]."</td>";
                    echo "<td>".$value[4]."</td>";
                    echo "<td>".$value[5]."</td>";
                    echo "<td> <a href='index-alumno.php?unirse=true&unirCodigoCurso=".$value[0]."' class='enlaces'> Unirse </a> </td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td style='border: black 3px solid; background-color: red;' colspan='9'></td>";
                echo "</tr>";
            }
        echo "</table>";

        /* unirse a un curso */
        if (isset ($_GET['unirse']) && isset($_GET['unirCodigoCurso'])){
            if ($_GET['unirse']){
                unirse($_GET['unirCodigoCurso']);
                echo "<meta http-equiv='refresh' content='0;url=index-alumno.php'>";
            }
        }

        /* desmatricularse de un curso */
        if (isset ($_GET['desmatricular'])){
            if ($_GET['desmatricular']){
                desmatricular();
                echo "<meta http-equiv='refresh' content='0;url=index-alumno.php'>";
            }
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