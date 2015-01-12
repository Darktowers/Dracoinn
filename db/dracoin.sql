-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-01-2015 a las 06:01:32
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadosnotificacion`
--

CREATE TABLE IF NOT EXISTS `estadosnotificacion` (
  `idEstadosNotificacion` int(15) NOT NULL DEFAULT '0',
  `descripcion` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjetas`
--

CREATE TABLE IF NOT EXISTS `tarjetas` (
  `idTarjeta` int(15) NOT NULL DEFAULT '0',
  `nombreTarjeta` varchar(50) DEFAULT NULL,
  `valor` int(15) DEFAULT NULL,
  `urlImgTarjeta` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tarjetas`
--

INSERT INTO `tarjetas` (`idTarjeta`, `nombreTarjeta`, `valor`, `urlImgTarjeta`) VALUES
(10, 'draegg', 50000, '../tarjetas/draegg.png'),
(11, 'drapeq', 100000, '../tarjetas/drapeq.png'),
(12, 'draker', 200000, '../tarjetas/draker.png'),
(13, 'drator', 500000, '../tarjetas/drator.png'),
(14, 'drafire', 1000000, '../tarjetas/drafire.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `nickName` varchar(50) NOT NULL DEFAULT '',
  `correo` varchar(100) DEFAULT NULL,
  `passWord` varchar(200) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `estadoUsuario` varchar(50) DEFAULT NULL,
  `rolUsuario` varchar(50) DEFAULT NULL,
  `urlFotoUsuario` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`nickName`, `correo`, `passWord`, `telefono`, `estadoUsuario`, `rolUsuario`, `urlFotoUsuario`) VALUES
('Abssalon', 'Abssalon@correo.com', 'a9df7a764c8d08b9dd8a3cd8f7aa823319a75b5f', '000000', 'Activo', 'Administrador', '../img_user/default.png'),
('Aarat', 'Aarat@correo.com', 'a9df7a764c8d08b9dd8a3cd8f7aa823319a75b5f', '000000', 'Activo', 'Administrador', '../img_user/default.png');

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
MODIFY `idAsignacion` int(15) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
MODIFY `idNotificacion` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
