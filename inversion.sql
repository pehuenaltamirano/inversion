-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-11-2021 a las 17:27:58
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inversion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `montos`
--

CREATE TABLE `montos` (
  `monto_id` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `monto` decimal(10,0) NOT NULL,
  `diferencia` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `montos`
--

INSERT INTO `montos` (`monto_id`, `fecha`, `monto`, `diferencia`) VALUES
(1, '2021-11-16 12:27:35', '10050', NULL),
(2, '2021-11-16 12:27:54', '10000', '-50'),
(3, '2021-11-16 12:28:13', '10100', '100');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `montos`
--
ALTER TABLE `montos`
  ADD PRIMARY KEY (`monto_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `montos`
--
ALTER TABLE `montos`
  MODIFY `monto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
