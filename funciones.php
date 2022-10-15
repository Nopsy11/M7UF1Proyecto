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
    mysqli_query (conexion(), "INSERT INTO cursos (nombre, descripcion, horas, fecha_inicio, fecha_fin) VALUES ('".$_SESSION['nombreCurso']."', '".$_SESSION['descripcion']."', '".$_SESSION['horas']."', '".$_SESSION['fecha_inicio']."', '".$_SESSION['fecha_fin']."')");
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

// modificarUsuario() PONER LA FOTO!!!
?>