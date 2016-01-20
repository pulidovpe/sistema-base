-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 22-04-2014 a las 16:39:15
-- Versión del servidor: 5.5.35
-- Versión de PHP: 5.4.4-14+deb7u8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `piscicola`
--
DROP DATABASE IF EXISTS `sistema-base`;
CREATE DATABASE `sistema-base` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `sistema-base`;


-- --------------------------------------------------------


--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `usuario` varchar(10) NOT NULL,
  `clave` varchar(128) NOT NULL,
  `tipo` tinyint(4) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  PRIMARY KEY (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario`, `clave`, `tipo`, `nombre`, `telefono`) VALUES
('99009009', '81dc9bdb52d04dc20036dbd8313ed055', 1, 'Usuario Administrador', '2147483647'),
('12001002', '81dc9bdb52d04dc20036dbd8313ed055', 2, 'Paulina', '12345678');


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
