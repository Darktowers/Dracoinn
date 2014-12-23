-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 23-12-2014 a las 22:57:04
-- Versión del servidor: 5.5.8
-- Versión de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `dragoin`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaciones`
--

CREATE TABLE IF NOT EXISTS `asignaciones` (
  `idAsignacion` int(15) NOT NULL DEFAULT '0',
  `fkUsuAsignador` varchar(50) DEFAULT NULL,
  `fkUsuPropietario` varchar(50) DEFAULT NULL,
  `fkTarjeta` int(15) DEFAULT NULL,
  PRIMARY KEY (`idAsignacion`),
  KEY `fkUsuAsignador` (`fkUsuAsignador`),
  KEY `fkUsuPropietario` (`fkUsuPropietario`),
  KEY `fkTarjeta` (`fkTarjeta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `asignaciones`
--

INSERT INTO `asignaciones` (`idAsignacion`, `fkUsuAsignador`, `fkUsuPropietario`, `fkTarjeta`) VALUES
(1, 'Usuario', 'Usuario2', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadosnotificacion`
--

CREATE TABLE IF NOT EXISTS `estadosnotificacion` (
  `idEstadosNotificacion` int(15) NOT NULL DEFAULT '0',
  `descripcion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idEstadosNotificacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `estadosnotificacion`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE IF NOT EXISTS `notificaciones` (
  `idNotificacion` int(15) NOT NULL DEFAULT '0',
  `fkUsuarioDestinatario` varchar(50) DEFAULT NULL,
  `fkUsuarioRemitente` varchar(50) DEFAULT NULL,
  `fkIdTarjeta` int(15) DEFAULT NULL,
  `fechaNotificacion` date DEFAULT NULL,
  `fechaVencimientoNotificacion` date DEFAULT NULL,
  `fkEstadoNotificacion` int(15) DEFAULT NULL,
  PRIMARY KEY (`idNotificacion`),
  KEY `fkUsuarioDestinatario` (`fkUsuarioDestinatario`),
  KEY `fkUsuarioRemitente` (`fkUsuarioRemitente`),
  KEY `fkIdTarjeta` (`fkIdTarjeta`),
  KEY `fkEstadoNotificacion` (`fkEstadoNotificacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `notificaciones`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjetas`
--

CREATE TABLE IF NOT EXISTS `tarjetas` (
  `idTarjeta` int(15) NOT NULL DEFAULT '0',
  `nombreTarjeta` varchar(50) DEFAULT NULL,
  `valor` int(15) DEFAULT NULL,
  `urlImgTarjeta` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idTarjeta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `tarjetas`
--

INSERT INTO `tarjetas` (`idTarjeta`, `nombreTarjeta`, `valor`, `urlImgTarjeta`) VALUES
(10, 'draegg', 50000, '../tarjetas/draegg.png'),
(11, 'drafire', 1000000, '../tarjetas/drafire.png'),
(12, 'draker', 200000, '../tarjetas/draker.png'),
(13, 'drapeq', 100000, '../tarjetas/drapeq.png'),
(14, 'drator', 500000, '../tarjetas/drator.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `nickName` varchar(50) NOT NULL DEFAULT '',
  `correo` varchar(50) DEFAULT NULL,
  `passWord` varchar(50) DEFAULT NULL,
  `telefono` int(15) DEFAULT NULL,
  `estadoUsuario` varchar(50) DEFAULT NULL,
  `rolUsuario` varchar(50) DEFAULT NULL,
  `urlFotoUsuario` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`nickName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`nickName`, `correo`, `passWord`, `telefono`, `estadoUsuario`, `rolUsuario`, `urlFotoUsuario`) VALUES
('Andres', 'caarrieta40@misena.edu.co', 'metallica', 8143170, 'Activo', 'Usuario', 'img_user/default.png'),
('Usuario', 'cristian-rock1@hotmail.com', 'e170f80139aac716ebca4320121de416231b4109', 8143170, 'Activo', 'Usuario', 'img_user/default.png'),
('Usuario2', 'usuario2@usuario.com', 'metallica', 917777, 'activo', 'activo', 'img_user/default.png');

--
-- Filtros para las tablas descargadas (dump)
--

--
-- Filtros para la tabla `asignaciones`
--
ALTER TABLE `asignaciones`
  ADD CONSTRAINT `asignaciones_ibfk_1` FOREIGN KEY (`fkUsuAsignador`) REFERENCES `usuario` (`nickName`),
  ADD CONSTRAINT `asignaciones_ibfk_2` FOREIGN KEY (`fkUsuPropietario`) REFERENCES `usuario` (`nickName`),
  ADD CONSTRAINT `asignaciones_ibfk_3` FOREIGN KEY (`fkTarjeta`) REFERENCES `tarjetas` (`idTarjeta`);

--
-- Filtros para la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD CONSTRAINT `notificaciones_ibfk_1` FOREIGN KEY (`fkUsuarioDestinatario`) REFERENCES `usuario` (`nickName`),
  ADD CONSTRAINT `notificaciones_ibfk_2` FOREIGN KEY (`fkUsuarioRemitente`) REFERENCES `usuario` (`nickName`),
  ADD CONSTRAINT `notificaciones_ibfk_3` FOREIGN KEY (`fkIdTarjeta`) REFERENCES `tarjetas` (`idTarjeta`),
  ADD CONSTRAINT `notificaciones_ibfk_4` FOREIGN KEY (`fkEstadoNotificacion`) REFERENCES `estadosnotificacion` (`idEstadosNotificacion`);
