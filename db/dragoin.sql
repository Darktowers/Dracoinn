-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-01-2015 a las 02:49:33
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
`idAsignacion` int(15) NOT NULL,
  `fkUsuAsignador` varchar(50) DEFAULT NULL,
  `fkUsuPropietario` varchar(50) DEFAULT NULL,
  `fkTarjeta` int(15) DEFAULT NULL,
  `Estado` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asignaciones`
--

INSERT INTO `asignaciones` (`idAsignacion`, `fkUsuAsignador`, `fkUsuPropietario`, `fkTarjeta`, `Estado`) VALUES
(1, 'Andres', 'Usuario', 10, 0),
(3, 'Andres', 'Usuario', 10, 0),
(4, 'Andres', 'Usuario', 10, 0),
(5, 'Andres', 'Usuario', 10, 0),
(8, 'Andres', 'Usuario', 13, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadosnotificacion`
--

CREATE TABLE IF NOT EXISTS `estadosnotificacion` (
  `idEstadosNotificacion` int(15) NOT NULL DEFAULT '0',
  `descripcion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estadosnotificacion`
--

INSERT INTO `estadosnotificacion` (`idEstadosNotificacion`, `descripcion`) VALUES
(111, 'Pendiente'),
(222, 'Vista'),
(333, 'Vencida');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE IF NOT EXISTS `notificaciones` (
`idNotificacion` int(11) NOT NULL,
  `fkUsuarioDestinatario` varchar(50) DEFAULT NULL,
  `fkUsuarioRemitente` varchar(50) DEFAULT NULL,
  `fkIdTarjeta` int(15) DEFAULT NULL,
  `fechaNotificacion` date DEFAULT NULL,
  `fechaVencimientoNotificacion` int(5) DEFAULT NULL,
  `fkEstadoNotificacion` int(15) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `notificaciones`
--

INSERT INTO `notificaciones` (`idNotificacion`, `fkUsuarioDestinatario`, `fkUsuarioRemitente`, `fkIdTarjeta`, `fechaNotificacion`, `fechaVencimientoNotificacion`, `fkEstadoNotificacion`) VALUES
(1, 'WillDeveloper', 'Usuario2', 10, '2014-12-31', 364, 111),
(2, 'WillDeveloper', 'Usuario2', 13, '2014-12-31', 364, 111),
(3, 'WillDeveloper', 'Usuario2', 10, '2014-12-31', 364, 111),
(4, 'WillDeveloper', 'Usuario2', 13, '2015-01-04', 3, 111),
(5, 'WillDeveloper', 'Usuario', 10, '2015-01-04', 3, 222),
(6, 'WillDeveloper', 'Usuario', 10, '2015-01-04', 3, 111);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjetas`
--

CREATE TABLE IF NOT EXISTS `tarjetas` (
  `idTarjeta` int(15) NOT NULL DEFAULT '0',
  `nombreTarjeta` varchar(50) DEFAULT NULL,
  `valor` int(15) DEFAULT NULL,
  `urlImgTarjeta` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tarjetas`
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
  `urlFotoUsuario` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`nickName`, `correo`, `passWord`, `telefono`, `estadoUsuario`, `rolUsuario`, `urlFotoUsuario`) VALUES
('Andres', 'caarrieta40@misena.edu.co', 'metallica', 8143170, 'Activo', 'Usuario', 'img_user/default.png'),
('Usuario', 'cristian-rock1@hotmail.com', 'e170f80139aac716ebca4320121de416231b4109', 8143170, 'Activo', 'Usuario', 'img_user/default.png'),
('Usuario2', 'usuario2@usuario.com', 'de5497386ea07babb1afcaeea8f49d340f6d1a5b', 917777, 'activo', 'activo', 'img_user/default.png'),
('WillDeveloper', 'willtf.wb@gmail.com', 'de5497386ea07babb1afcaeea8f49d340f6d1a5b', 1234, 'Activo', 'Usuario', 'img_user/default.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignaciones`
--
ALTER TABLE `asignaciones`
 ADD PRIMARY KEY (`idAsignacion`), ADD KEY `fkUsuAsignador` (`fkUsuAsignador`), ADD KEY `fkUsuPropietario` (`fkUsuPropietario`), ADD KEY `fkTarjeta` (`fkTarjeta`);

--
-- Indices de la tabla `estadosnotificacion`
--
ALTER TABLE `estadosnotificacion`
 ADD PRIMARY KEY (`idEstadosNotificacion`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
 ADD PRIMARY KEY (`idNotificacion`), ADD KEY `fkUsuarioDestinatario` (`fkUsuarioDestinatario`), ADD KEY `fkUsuarioRemitente` (`fkUsuarioRemitente`), ADD KEY `fkIdTarjeta` (`fkIdTarjeta`), ADD KEY `fkEstadoNotificacion` (`fkEstadoNotificacion`);

--
-- Indices de la tabla `tarjetas`
--
ALTER TABLE `tarjetas`
 ADD PRIMARY KEY (`idTarjeta`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`nickName`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignaciones`
--
ALTER TABLE `asignaciones`
MODIFY `idAsignacion` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
MODIFY `idNotificacion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Restricciones para tablas volcadas
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
