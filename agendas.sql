-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-05-2019 a las 00:07:42
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agendas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `start_hour` varchar(255) NOT NULL,
  `end_hour` varchar(255) NOT NULL,
  `fk_usuario` varchar(255) NOT NULL,
  `allDay` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `titulo`, `start_date`, `end_date`, `start_hour`, `end_hour`, `fk_usuario`, `allDay`) VALUES
(30, 'Empezando calendario', '2019-05-06', '2019-05-06', '08:30:00', '09:00:00', '8', 0),
(31, 'Depurando codigo', '2019-05-21', '2019-05-22', '09:00', '09:30', '8', 0),
(32, 'Analizando codigo', '2019-05-30', '2019-05-30', '07:00:00', '07:30:00', '3', 0),
(34, 'Depurando codigo', '2019-05-16', '2019-05-16', '10:00:00', '12:00:00', '3', 0),
(36, 'Nuevo evento', '2019-05-16', 'Invalid da', '07:00:00', 'e', '6', 0),
(37, 'Probando eventos', '2019-05-17', '2019-05-17', '07:30:00', '08:30:00', '9', 0),
(38, 'Nuevo evento', '2019-05-21', '2019-05-21', '07:30', '11:30', '10', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `fecha_nacimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`, `nombre`, `fecha_nacimiento`) VALUES
(3, 'usuario1@mail.com', '$2y$10$pEKk79vzlEQup8QBiqfCK.IegPjmCCA/k5Z5SlBYYD91XhaL/pcPO', 'Usuario 1', '1991-05-03'),
(6, 'Carlos@mail.com', '$2y$10$Il5WYpbfG6wjMHaEc.5P8.1Gx3MvO5UqUdT7MUPeh2uRqXXjLU.5i', 'Carlos Salvador', '1990-07-10'),
(8, 'Pepe@mail.com', '$2y$10$Gr50oAGV/0dwpISxLxCGMumQ8usj0KVdtVzegu6/AVjfXmPvdFqPG', 'Pepe Rivera', '1991-08-10'),
(9, 'Arnold@mail.com', '$2y$10$p.g7.wFEVJ.f7Wu.5REPmu2omew6G6Hnm/h0TZjauOm4k8NDsmPrm', 'Arnold Pedraza', '1995-07-11'),
(10, 'Kevin@mail.com', '$2y$10$zZ96v154rr9/vn0jvV6iUehz.u5cPLL4CsX8L3Z1tlr72I9y2oKn2', 'Kevin Manares', '1993-10-03');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
