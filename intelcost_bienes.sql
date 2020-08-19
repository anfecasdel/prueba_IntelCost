-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-08-2020 a las 15:01:45
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `intelcost_bienes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `misbienes`
--

CREATE TABLE `misbienes` (
  `id` int(11) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `postal` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `precio` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `misbienes`
--

INSERT INTO `misbienes` (`id`, `direccion`, `ciudad`, `telefono`, `postal`, `tipo`, `precio`) VALUES
(1, 'Ap #549-7395 Ut Rd.', '', '334-052-0954', '85328', 'Casa', 'Ap #549-7395 Ut Rd.'),
(2, 'Ap #549-7395 Ut Rd.', '', '334-052-0954', '85328', 'Casa', 'Ap #549-7395 Ut Rd.'),
(3, 'Ap #549-7395 Ut Rd.', 'New York', '334-052-0954', '85328', 'Casa', 'Ap #549-7395 Ut Rd.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `misbienes`
--
ALTER TABLE `misbienes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `misbienes`
--
ALTER TABLE `misbienes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
