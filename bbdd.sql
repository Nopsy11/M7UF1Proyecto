/*crear base de datos*/
CREATE DATABASE infobdn;

USE infobdn;

/*crear tablas*/
CREATE TABLE cursos (
    codigo INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    descripcion VARCHAR(255) NOT NULL,
    horas INT(255) NOT NULL,
    fecha_inicio VARCHAR(255) NOT NULL,
    fecha_fin VARCHAR(255) NOT NULL,
    activo BIT(1)
);

CREATE TABLE usuarios (
    dni VARCHAR(255) NOT NULL PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    apellidos VARCHAR(255) NOT NULL,
    contra VARCHAR(255) NOT NULL,
    foto VARCHAR(255),
    edad INT(10),
    email VARCHAR(255) NOT NULL,
    rol VARCHAR(255) NOT NULL,
    codigoCurso INT(10),
    FOREIGN KEY (codigoCurso) REFERENCES cursos(codigo)
);