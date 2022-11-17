<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/styles.css">
        <meta charset="UTF-8">
        <title>InfoBDN</title> 
    </head>
    <body>
        <header>
            <p> <a href="index.php" class="enlaces">Inicio</a> </p>
        </header>
        <!-- formulario de registro de un nuevo usuario en la plataforma, o profesor o alumno -->
        <h1>Registrate</h1>
        <form action="index.php" method="post" enctype="multipart/form-data" name="formularioRegister">
            <table style="border: black 3px solid">
                <tr>
                    <td>DNI:</td>
                    <td>
                        <input type="text" id="dni" name="dni" required>
                    </td>
                    <td>Contraseña:</td>
                    <td>
                        <input type="password" id="contra" name="contra" required>
                    </td>
                </tr>
                <tr>
                    <td>Nombre:</td>
                    <td>
                        <input type="text" id="nombre" name="nombre" required>
                    </td>
                    <td>Apellidos:</td>
                    <td>
                        <input type="text" id="apellidos" name="apellidos" required>
                    </td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td>
                        <input type="email" id="email" name="email" required>
                    </td>
                </tr>
                <tr>
                    <td>Foto de perfil</td>
                    <td>
                        <input id="imagen" name="imagen" type="file">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="radio" id="profe" name="rol" value="profe" required>
                        <label for="profe">Profesor</label>
                        <input type="radio" id="alumno" name="rol" value="alumno">
                        <label for="alumno">Alumno</label>
                        <!-- <input type="radio" id="admin" name="rol" value="admin">
                        <label for="admin">admin</label> -->
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="enviar" value="Enviar">
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>