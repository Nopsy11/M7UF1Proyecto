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
        ?>

        <h1>InfoBDN</h1>
        <h3> <a href="login.php" class="enlaces">Iniciar sesión</a> </h3>
        <h3> <a href="register.php" class="enlaces">Registrate</a> </h3>

        <?php
        /****** */
        function guardar_image($fichero, $guardar_fichero){
            // "../img_users/"
            $directorio="/img_users";
            $aleatorio=mt_rand(100, 999);
            $ruta="/img_users".$aleatorio."jpg";
            
            $nombre=$fichero;
            $guardado=$guardar_fichero;
    
            if(!file_exists($directorio )){
                mkdir($directorio ,0777,true);
                if(file_exists($directorio )){
                    move_uploaded_file($guardado, 'archivos/'.$nombre);
                } 
            }else{
                move_uploaded_file($guardado, $ruta);
            }
            return $ruta;
        }
        /**** */

        /* bien */
        if (isset($_POST['enviar'])){
            $_SESSION['dni'] = $_POST['dni'];
            $_SESSION['contra'] = md5($_POST['contra']);
            $_SESSION['nombre'] = $_POST['nombre'];
            $_SESSION['apellidos'] = $_POST['apellidos'];
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['rol'] = $_POST['rol'];
            // añadirUsuario();
        /* fin bien */

            /***** */
            guardar_image($_FILES['imagen'], 'photo');
            /**** */


            /*********************/
            // $_SESSION['imagen'] = $_POST['imagen'];
            // $_FILES['imagen'] = $_POST['imagen'];
            

            /* foto */



            // if (is_uploaded_file ($_FILES['imagen']['tmp_name'])) {
            //     $nombreDirectorio = "img/";
            //     $idUnico = time();
            //     $nombreFichero = $idUnico . "-" . $_FILES['imagen']['name'];
            //     move_uploaded_file ($_FILES['imagen']['tmp_name'], $nombreDirectorio . $nombreFichero);
            // }
            // else {
            //     print ("No se ha podido subir el fichero\n");
            // }
        }
        ?>
    </body>
</html>