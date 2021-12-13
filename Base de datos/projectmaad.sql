-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 15-03-2017 a las 18:20:46
-- Versión del servidor: 5.5.8-log
-- Versión de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `projectmaad`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea`
--

CREATE TABLE IF NOT EXISTS `tarea` (
  `id_tarea` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `tarea` varchar(200) NOT NULL,
  `descrip` text NOT NULL,
  `inicio` date NOT NULL,
  `fin` date NOT NULL,
  `id_usuario` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_tarea`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Volcado de datos para la tabla `tarea`
--

INSERT INTO `tarea` (`id_tarea`, `tarea`, `descrip`, `inicio`, `fin`, `id_usuario`) VALUES
(31, 'Final de Sistemas', 'Pruebas, etc', '2017-03-18', '2017-03-19', 2),
(37, 'Reunión', ' Compañero del Inst ', '2017-03-18', '2017-03-19', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea_realizada`
--

CREATE TABLE IF NOT EXISTS `tarea_realizada` (
  `id_tarea_r` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `tarea` varchar(150) NOT NULL,
  `descrip` text NOT NULL,
  `inicio` date NOT NULL,
  `fin` date NOT NULL,
  `id_usuario` tinyint(3) unsigned NOT NULL,
  `id_tarea` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id_tarea_r`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `tarea_realizada`
--

INSERT INTO `tarea_realizada` (`id_tarea_r`, `tarea`, `descrip`, `inicio`, `fin`, `id_usuario`, `id_tarea`) VALUES
(17, 'Entrevista', 'En Palermo a las 8:00 hr', '2017-03-11', '2017-03-19', 1, 16),
(20, 'Final de Practica', 'Proyecto Planificador de tareas', '2017-03-16', '2017-03-18', 2, 29);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(100) NOT NULL,
  `email` varchar(250) NOT NULL,
  `contra` varchar(200) NOT NULL,
  `nick_usuario` varchar(100) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `nick_usuario` (`nick_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `email`, `contra`, `nick_usuario`) VALUES
(1, 'Analia', 'analiacisneros1394@gmail.com', 'capitan1', 'ana'),
(2, 'Melina', 'melina@gmail.com', 'mely12', 'mely'),
(3, 'Sandra', 'sandra@gmail.com', 'sandra01', 'sandra23'),
(4, 'Andres', 'andres@gmail.com', 'andres01', 'andres'),
(5, 'Ricardo', 'ricardo12@gmail.com', 'ricardo', 'ricky'),
(6, 'Paola', 'paola@gmail.com', 'pao1', 'pao12'),
(7, 'Sara', 'saracontreras@gmail.com', 'sara', 'sara123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `verif_compar`
--

CREATE TABLE IF NOT EXISTS `verif_compar` (
  `id_verificacion` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `tarea` varchar(150) NOT NULL,
  `descrip` text NOT NULL,
  `inicio` date NOT NULL,
  `fin` date NOT NULL,
  `id_tarea` tinyint(3) unsigned NOT NULL,
  `usuario1` tinyint(3) unsigned NOT NULL,
  `usuario2` tinyint(3) unsigned NOT NULL,
  `confir1` varchar(50) DEFAULT NULL,
  `confir2` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_verificacion`),
  KEY `usuario1` (`usuario1`),
  KEY `usuario2` (`usuario2`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `verif_compar`
--

INSERT INTO `verif_compar` (`id_verificacion`, `tarea`, `descrip`, `inicio`, `fin`, `id_tarea`, `usuario1`, `usuario2`, `confir1`, `confir2`) VALUES
(20, 'Reunión', ' Compañero del Inst ', '2017-03-18', '2017-03-19', 37, 7, 4, 'si', 'si');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `verif_compar`
--
ALTER TABLE `verif_compar`
  ADD CONSTRAINT `verif_compar_ibfk_1` FOREIGN KEY (`usuario1`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `verif_compar_ibfk_2` FOREIGN KEY (`usuario2`) REFERENCES `usuario` (`id_usuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
