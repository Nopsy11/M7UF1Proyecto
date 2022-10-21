<?php

session_start();

function conexion() {
    return mysqli_connect("localhost", "root", "", "infobdn");
}

function añadirUsuario() {
    mysqli_query (conexion(), "INSERT INTO usuarios (dni, nombre, apellidos, contra, email, rol) VALUES ('".$_SESSION['dni']."', '".$_SESSION['nombre']."', '".$_SESSION['apellidos']."', '".$_SESSION['contra']."', '".$_SESSION['email']."', '".$_SESSION['rol']."')");
}

function iniciarSesion($dni, $contra) {
    $resultado = mysqli_query (conexion(), "SELECT * FROM usuarios WHERE dni = '".$dni."' AND contra = '".md5($contra)."'");
    return mysqli_fetch_array($resultado);
}

function crearCurso() {
    mysqli_query (conexion(), "INSERT INTO cursos (nombre, descripcion, horas, fecha_inicio, fecha_fin, activo) VALUES ('".$_SESSION['nombreCurso']."', '".$_SESSION['descripcion']."', '".$_SESSION['horas']."', '".$_SESSION['fecha_inicio']."', '".$_SESSION['fecha_fin']."', '1')");
}

function añadirProfe() {
    mysqli_query (conexion(), "INSERT INTO usuarios (dni, nombre, apellidos, contra, email, rol) VALUES ('".$_SESSION['dniProfe']."', '".$_SESSION['nombreProfe']."', '".$_SESSION['apellidosProfe']."', '".$_SESSION['contraProfe']."', '".$_SESSION['emailProfe']."', '".$_SESSION['rolProfe']."')");
}

function mostrarCursos() {
    return mysqli_fetch_all (mysqli_query (conexion(), "SELECT * FROM cursos"));
}

function mostrarProfes() {
    return mysqli_fetch_all (mysqli_query (conexion(), "SELECT * FROM usuarios WHERE rol LIKE 'profe'"));
}

function eliminarProfe($dniEliminarProfe) {
    $resultado = mysqli_query (conexion(), "DELETE FROM usuarios WHERE dni = '".$dniEliminarProfe."'");
    return ($resultado);
}

function activarCurso($codigoCurso) {
    $resultado = mysqli_query (conexion(), "UPDATE cursos SET activo=1 WHERE codigo = '".$codigoCurso."'");
    return ($resultado);
}

function desactivarCurso($codigoCurso) {
    $resultado = mysqli_query (conexion(), "UPDATE cursos SET activo=0 WHERE codigo = '".$codigoCurso."'");
    return ($resultado);
}

function mostrarCursosDisponibles() {
    return mysqli_fetch_all (mysqli_query (conexion(), "SELECT * FROM cursos WHERE activo = 1"));
}

function mostrarCursosApuntados($dni) {
    return mysqli_fetch_all (mysqli_query (conexion(), "SELECT * FROM cursos INNER JOIN usuarios ON cursos.codigo = usuarios.codigoCurso WHERE cursos.activo = 1 AND usuarios.dni = '".$dni."'"));
}

// modificarCurso() {
    // $resultado = mysqli_query (conexion(), "UPDATE cursos SET nombre='".$_SESSION['modificarNombreCurso']."' WHERE codigo=1");
    // return ($resultado);
    // mysqli_query (conexion(), "UPDATE cursos SET nombre='".$_SESSION['modificarCursoNombre']."', descripcion = '".$_SESSION['modificarCursoDescripcion']."' WHERE codigo LIKE '".$_SESSION['']."'");
// }

// modificarUsuario() PONER LA FOTO!!!
?>