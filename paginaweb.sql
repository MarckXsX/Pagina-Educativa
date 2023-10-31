-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 31-10-2023 a las 02:36:39
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
-- Base de datos: `paginaweb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

DROP TABLE IF EXISTS `documentos`;
CREATE TABLE IF NOT EXISTS `documentos` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) NOT NULL,
  `Descripcion` varchar(900) NOT NULL,
  `Recurso` varchar(900) NOT NULL,
  `Tipo` varchar(60) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `documentos`
--

INSERT INTO `documentos` (`ID`, `Nombre`, `Descripcion`, `Recurso`, `Tipo`) VALUES
(3, 'Márquetin de Apple ', 'Video donde habla sobre Apple', 'https://www.youtube.com/embed/CdzFay1YgZY', 'Video'),
(5, 'Documento', 'fdsfsfs', 'https://drive.google.com/file/d/17b6kW0tbyV18qG85ZFWQjnWvmvc0Pz-n/preview', 'PDF'),
(7, 'Lenguaje de señas', 'El lenguaje de señas no es universal en el sentido de que no existe un solo lenguaje de señas que sea comprendido y utilizado en todo el mundo de la misma manera que el lenguaje hablado. En cambio, existen numerosas lenguas de señas diferentes en todo el mundo, y cada una de ellas es única y tiene su propia gramática, léxico y estructura.\r\n\r\nLas lenguas de señas se desarrollan de manera orgánica en las comunidades sordas de diferentes países o regiones. Cada país o región puede tener su propio lenguaje de señas, y a menudo, incluso dentro de un mismo país, hay variaciones regionales en las lenguas de señas.\r\n\r\nEs importante destacar que, aunque las lenguas de señas no son universales, comparten algunas características comunes, como el uso de gestos y movimientos de las manos y la expresión facial para comunicar ideas. Sin embargo, las reglas gramaticales y el vocabulario pueden ser muy d', 'https://www.youtube.com/embed/q-juc7-tByU', 'Video');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foros`
--

DROP TABLE IF EXISTS `foros`;
CREATE TABLE IF NOT EXISTS `foros` (
  `ID_FORO` int NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(50) NOT NULL,
  `Descripcion` varchar(800) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`ID_FORO`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `foros`
--

INSERT INTO `foros` (`ID_FORO`, `Titulo`, `Descripcion`) VALUES
(2, 'Votos de Amor', 'Novel romantica para principiantes '),
(3, 'La importancia del lenguaje de señas en la socieda', 'Para ti que impacto tiene el lenguaje de señas en '),
(5, 'El aprendizaje del lenguaje de señas', 'Cual consideras la dificultad sobre aprender un nu');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foros_usuarios`
--

DROP TABLE IF EXISTS `foros_usuarios`;
CREATE TABLE IF NOT EXISTS `foros_usuarios` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `id_foro` int NOT NULL,
  `id_usuario` int NOT NULL,
  `Comentario` varchar(200) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_FORO` (`id_foro`),
  KEY `FK_USUARIO_FORO` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `foros_usuarios`
--

INSERT INTO `foros_usuarios` (`ID`, `id_foro`, `id_usuario`, `Comentario`) VALUES
(1, 2, 2, 'prueba'),
(2, 5, 2, 'sdadasd'),
(3, 2, 2, 'asdasdasd'),
(4, 2, 2, 'prueba 2'),
(5, 2, 2, 'PRUEBA 3'),
(6, 2, 2, 'Prueba 4'),
(7, 3, 2, 'muy malo'),
(8, 3, 2, 'prueba 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuarios`
--

DROP TABLE IF EXISTS `tipo_usuarios`;
CREATE TABLE IF NOT EXISTS `tipo_usuarios` (
  `ID_Tipo_Usuario` int NOT NULL,
  `Tipo_Usuario` varchar(30) NOT NULL,
  PRIMARY KEY (`ID_Tipo_Usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `tipo_usuarios`
--

INSERT INTO `tipo_usuarios` (`ID_Tipo_Usuario`, `Tipo_Usuario`) VALUES
(1, 'ADMIN'),
(2, 'USUARIO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
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
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID_Usuario`, `Nombres`, `Apellidos`, `Correo`, `Pass`, `id_tipo_usuario`) VALUES
(1, 'Gerardo', 'Serrano', 'marckxsx@gmail.com', '123456', 1),
(2, 'Luis', 'Sosa', 'marcolopez121@outlook.com', '123456', 2);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `foros_usuarios`
--
ALTER TABLE `foros_usuarios`
  ADD CONSTRAINT `FK_FORO` FOREIGN KEY (`id_foro`) REFERENCES `foros` (`ID_FORO`),
  ADD CONSTRAINT `FK_USUARIO_FORO` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`ID_Usuario`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `FK_USUARIO` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tipo_usuarios` (`ID_Tipo_Usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
