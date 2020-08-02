
DROP DATABASE IF EXISTS colegio; 
CREATE DATABASE colegio;
USE colegio;

/** Tabla colegio.alumno */
CREATE TABLE alumno (
  id int(11) NOT NULL AUTO_INCREMENT,
  nombre varchar(50) NOT NULL DEFAULT 'NA',
  apellido varchar(50) NOT NULL DEFAULT 'NA',
  sexo enum('Hombre','Mujer') NOT NULL DEFAULT 'Hombre',
  correo varchar(50) UNIQUE NOT NULL,
  foto varchar(255) NULL,
  fecha_nacimiento date DEFAULT NULL,
  fecha_registro date DEFAULT NULL,
  PRIMARY KEY (id)
);

/** Tabla colegio.usuario */
CREATE TABLE usuario (
  id int(11) NOT NULL AUTO_INCREMENT,
  nombre varchar(50) NOT NULL DEFAULT 'NA',
  apellidos varchar(50) NOT NULL DEFAULT 'NA',
  email varchar(50) UNIQUE NOT NULL,
  password varchar(20) NOT NULL,
  PRIMARY KEY(id)
);

INSERT INTO usuario (id,nombre,apellidos,email,password) values
(1, 'ROOT', 'MARS', 'root@mvc.com','abc1234');


