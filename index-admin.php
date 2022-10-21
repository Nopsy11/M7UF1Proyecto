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
            <?php
            echo "Hola ".$_SESSION['nombre'].", eres un ".$_SESSION['rol']."";
            ?>
            <p> <a href="logout.php" class="enlaces">Cerrar sesion</a> </p>
        </header>
        <h1>Vista administrador</h1>
        <!-- Crear cursos y profes, modificar cursos y profes, eliminar cursos y profes -->
        <h3> <a href="crear-curso.php" class="enlaces">Crear curso</a> </h3>
        <h3> <a href="crear-profe.php" class="enlaces">Crear profesores</a> </h3>

        <?php
        echo "<table style='border: black 3px solid; text-align: center;'>";
            echo "<tr>";
                echo "<td>Codigo curso</td>";
                echo "<td>Nombre</td>";
                echo "<td>Descripcion</td>";
                echo "<td>Horas</td>";
                echo "<td>Fecha inicio</td>";
                echo "<td>Fecha fin</td>";
                echo "<td>Actividad</td>";
                echo "<td colspan='2'>Acciones</td>";
            echo "</tr>";
            foreach (mostrarCursos() as $key => $value){
                echo "<tr>";
                    echo "<td>".$value[0]."</td>";
                    echo "<td>".$value[1]."</td>";
                    echo "<td>".$value[2]."</td>";
                    echo "<td>".$value[3]."</td>";
                    echo "<td>".$value[4]."</td>";
                    echo "<td>".$value[5]."</td>";
                    if ($value[6] == 1){
                        echo "<td>SI activo</td>";
                        echo "<td class='desactivado'> <a href='index-admin.php?desactivar=true&desactivarCodigoCurso=".$value[0]."' class='enlaces'> Desactivar </a> </td>";
                    }
                    else{
                        echo "<td>NO activo</td>";
                        echo "<td class='activo'> <a href='index-admin.php?activar=true&activarCodigoCurso=".$value[0]."' class='enlaces'> Activar </a> </td>";
                    }
                    echo '<td class="modificar"> <a href="modificarCurso.php" class="enlaces"> Modificar </a> </td>';
                echo "</tr>";
                echo "<tr>";
                    echo "<td style='border: black 3px solid; background-color: red;' colspan='9'></td>";
                echo "</tr>";
            }
        echo "</table>";
        
        echo "<br> <br>";

        echo "<table style='border: black 3px solid; text-align: center;'>";
            echo "<tr>";
                echo "<td>DNI</td>";
                echo "<td>Nombre</td>";
                echo "<td>Apellidos</td>";
                echo "<td>Foto</td>";
                echo "<td>Edad</td>";
                echo "<td>Email</td>";
                echo "<td>Rol</td>";
                echo "<td></td>";
                // echo "<td>Codigo curso</td>";
                echo "<td colspan='2'>Acciones</td>";
            echo "</tr>";
            foreach (mostrarProfes() as $key => $values) {
                echo "<tr>";
                    echo "<td>".$values[0]."</td>";
                    echo "<td>".$values[1]."</td>";
                    echo "<td>".$values[2]."</td>";
                    echo "<td>".$values[4]."</td>";
                    echo "<td>".$values[5]."</td>";
                    echo "<td>".$values[6]."</td>";
                    echo "<td>".$values[7]."</td>";
                    echo "<td></td>";
                    // echo "<td>".$values[8]."</td>";
                    echo "<td class='modificar'>Modificar</td>";
                    echo "<td> <a href='index-admin.php?modificar=true&dniEliminarProfe=".$values[0]."' class='enlaces'>Eliminar</a> </td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td style='border: black 3px solid; background-color: blue;' colspan='11'></td>";
                echo "</tr>";
            }
            echo "</table>";


        /* crear curso */
        if (isset($_POST['crearCurso'])){
            $_SESSION['nombreCurso'] = $_POST['nombreCurso'];
            $_SESSION['descripcion'] = $_POST['descripcion'];
            $_SESSION['fecha_inicio'] = $_POST['fecha_inicio'];
            $_SESSION['fecha_fin'] = $_POST['fecha_fin'];
            $_SESSION['horas'] = $_POST['horas'];
            crearCurso();
            echo "<meta http-equiv='refresh' content='0;url=index-admin.php'>";
        }

        /* crear profe */
        if (isset($_POST['crearProfe'])){
            $_SESSION['dniProfe'] = $_POST['dniProfe'];
            $_SESSION['contraProfe'] = md5($_POST['contraProfe']);
            $_SESSION['nombreProfe'] = $_POST['nombreProfe'];
            $_SESSION['apellidosProfe'] = $_POST['apellidosProfe'];
            $_SESSION['emailProfe'] = $_POST['emailProfe'];
            $_SESSION['rolProfe'] = $_POST['rolProfe'];
            añadirProfe();
            echo "<meta http-equiv='refresh' content='0;url=index-admin.php'>";
        }

        /* eliminar profe */
        if (isset ($_GET['eliminar']) && isset($_GET['dniEliminarProfe'])){
            if ($_GET['eliminar']){
                eliminarProfe($_GET['dniEliminarProfe']);
                echo "<meta http-equiv='refresh' content='0;url=index-admin.php'>";
            }
        }

        /* desactivar curso */
        if (isset ($_GET['desactivar']) && isset($_GET['desactivarCodigoCurso'])){
            if ($_GET['desactivar']){
                desactivarCurso($_GET['desactivarCodigoCurso']);
                echo "<meta http-equiv='refresh' content='0;url=index-admin.php'>";
            }
        }

        /* activar curso */
        if (isset ($_GET['activar']) && isset($_GET['activarCodigoCurso'])){
            if ($_GET['activar']){
                activarCurso($_GET['activarCodigoCurso']);
                echo "<meta http-equiv='refresh' content='0;url=index-admin.php'>";
            }
        }

        /* modificar curso RECARGAR PAGINA */
        if (isset ($_GET['modificarCurso'])) {
            echo "<meta http-equiv='refresh' content='0;url=index-admin.php'>";
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