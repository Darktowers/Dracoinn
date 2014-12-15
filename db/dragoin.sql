-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 14-12-2014 a las 21:30:49
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadosnotificacion`
--

CREATE TABLE IF NOT EXISTS `estadosnotificacion` (
  `idEstadosNotificacion` int(15) NOT NULL DEFAULT '0',
  `descripcion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idEstadosNotificacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignaciones`
--
ALTER TABLE `asignaciones`
  ADD CONSTRAINT `asignaciones_ibfk_3` FOREIGN KEY (`fkTarjeta`) REFERENCES `tarjetas` (`idTarjeta`),
  ADD CONSTRAINT `asignaciones_ibfk_1` FOREIGN KEY (`fkUsuAsignador`) REFERENCES `usuario` (`nickName`),
  ADD CONSTRAINT `asignaciones_ibfk_2` FOREIGN KEY (`fkUsuPropietario`) REFERENCES `usuario` (`nickName`);

--
-- Filtros para la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD CONSTRAINT `notificaciones_ibfk_4` FOREIGN KEY (`fkEstadoNotificacion`) REFERENCES `estadosnotificacion` (`idEstadosNotificacion`),
  ADD CONSTRAINT `notificaciones_ibfk_1` FOREIGN KEY (`fkUsuarioDestinatario`) REFERENCES `usuario` (`nickName`),
  ADD CONSTRAINT `notificaciones_ibfk_2` FOREIGN KEY (`fkUsuarioRemitente`) REFERENCES `usuario` (`nickName`),
  ADD CONSTRAINT `notificaciones_ibfk_3` FOREIGN KEY (`fkIdTarjeta`) REFERENCES `tarjetas` (`idTarjeta`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;