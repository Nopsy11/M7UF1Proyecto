/*crear base de datos*/
CREATE DATABASE infobdn;

USE infobdn;

/*crear tablas*/
CREATE TABLE cursos (
    codigo INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    descripcion VARCHAR(255) NOT NULL,
    horas INT(255) NOT NULL,
    fecha_inicio DATE NOT NULL,
    fecha_fin DATE NOT NULL,
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
    cursos VARCHAR(255) NOT NULL,
    FOREIGN KEY (codigoCurso) REFERENCES cursos(codigo)
);

/*crear cursos*/
INSERT INTO cursos (nombre, descripcion, horas, fecha_inicio, fecha_fin, activo)
VALUES ("prueba", "prueba", 11, '2022/11/11', '2022/11/12', 0);

INSERT INTO cursos (nombre, descripcion, horas, fecha_inicio, fecha_fin, activo)
VALUES ("M7", "Curso de php", 77, '2022/11/11', '2022/11/12', 1);

INSERT INTO cursos (nombre, descripcion, horas, fecha_inicio, fecha_fin, activo)
VALUES ("M9", "Curso de css", 77, '2022/11/11', '2022/11/12', 1);

/*crear usuarios*/
/*admin*/
INSERT INTO usuarios (dni, nombre, apellidos, contra, email, rol, cursos)
VALUES ("admin", "admin", "admin", "21232f297a57a5a743894a0e4a801fc3", "admin@admin.com", "admin", "1");

/*profe*/
INSERT INTO usuarios (dni, nombre, apellidos, contra, email, rol, cursos)
VALUES ("profe", "profe", "profe", "1145cbf42070c6704b66d6ac75347726", "profe@profe.com", "profe", "1");

/*alumno*/
INSERT INTO usuarios (dni, nombre, apellidos, contra, email, rol, cursos)
VALUES ("alumno", "alumno", "alumno", "c6865cf98b133f1f3de596a4a2894630", "alumno@alumno.com", "alumno", "1");