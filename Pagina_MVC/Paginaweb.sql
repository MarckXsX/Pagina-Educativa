-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 10-05-2023 a las 17:56:23
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 
--
CREATE DATABASE PaginaWeb;
use PaginaWeb;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla Foros
--

DROP TABLE IF EXISTS Foros;
CREATE TABLE IF NOT EXISTS Foros (
  `ID_FORO` int NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(50) NOT NULL,
  `Descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_Foro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
--
-- Estructura de tabla para la tabla tipo_usuarios
--

DROP TABLE IF EXISTS tipo_usuarios;
CREATE TABLE IF NOT EXISTS `tipo_usuarios` (
  `ID_Tipo_Usuario` int NOT NULL,
  `Tipo_Usuario` varchar(30) NOT NULL,
  PRIMARY KEY (`ID_Tipo_Usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla tipo_usuarios
--

INSERT INTO tipo_usuarios (`ID_Tipo_Usuario`, `Tipo_Usuario`) VALUES
(1, 'ADMIN'),
(2, 'USUARIO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla usuarios
--

DROP TABLE IF EXISTS usuarios;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `ID_Usuario` int NOT NULL AUTO_INCREMENT,
  `Nombres` varchar(30) NOT NULL,
  `Apellidos` varchar(30) NOT NULL,
  `Correo` varchar(50) NOT NULL,
  `Pass` varchar(60) NOT NULL,
  `id_tipo_usuario` int NOT NULL,
  PRIMARY KEY (`ID_Usuario`),
  KEY `FK_USUARIO` (`id_tipo_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla usuarios
--

INSERT INTO usuarios (`ID_Usuario`, `Nombres`, `Apellidos`, `Correo`, `Pass`, `id_tipo_usuario`) VALUES
(1, 'Gerardo', 'Serrano', 'marckxsx@gmail.com','123456', 1),
(2, 'Luis', 'Sosa', 'marcolopez121@outlook.com', '123456', 2);


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla Foros_Usuarios
--

DROP TABLE IF EXISTS Foros_Usuarios;
CREATE TABLE IF NOT EXISTS Foros_Usuarios (
  `ID` int NOT NULL AUTO_INCREMENT,
  `id_foro` int NOT NULL,
  `id_usuario` int NOT NULL,
  `Comentario` varchar(200) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_FORO` (`id_foro`),
  KEY `FK_USUARIO_FORO` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Estructura de tabla para la tabla Foros_Usuarios
--

DROP TABLE IF EXISTS Documentos;
CREATE TABLE IF NOT EXISTS Documentos (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla Foros_Usuarios
--
ALTER TABLE Foros_Usuarios
  ADD CONSTRAINT `FK_FORO` FOREIGN KEY (`id_foro`) REFERENCES `Foros` (`ID_FORO`),
  ADD CONSTRAINT `FK_USUARIO_FORO` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`ID_Usuario`);

--
-- Filtros para la tabla usuarios
--
ALTER TABLE usuarios
  ADD CONSTRAINT `FK_USUARIO` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tipo_usuarios` (`ID_Tipo_Usuario`);


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
