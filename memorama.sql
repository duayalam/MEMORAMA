-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-12-2021 a las 23:53:45
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `memorama`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `progress`
--

CREATE TABLE `progress` (
  `id_usr` double NOT NULL,
  `nivel` double NOT NULL,
  `acertadas` double NOT NULL,
  `tiempo` time NOT NULL,
  `intentos` double NOT NULL,
  `creado` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `progress`
--

INSERT INTO `progress` (`id_usr`, `nivel`, `acertadas`, `tiempo`, `intentos`, `creado`) VALUES
(1, 0, 1, '00:00:00', 1, '0000-00-00 00:00:00'),
(1, 1, 2, '00:00:00', 2, '0000-00-00 00:00:00'),
(1, 2, 4, '00:00:00', 4, '0000-00-00 00:00:00'),
(1, 3, 6, '00:00:00', 7, '0000-00-00 00:00:00'),
(3, 1, 2, '00:00:00', 2, '0000-00-00 00:00:00'),
(3, 2, 4, '00:00:00', 10, '0000-00-00 00:00:00'),
(3, 3, 6, '00:00:00', 8, '0000-00-00 00:00:00'),
(3, 4, 8, '00:00:00', 16, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` double NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `usuario` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `clave` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nivel` double NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `usuario`, `clave`, `nivel`) VALUES
(1, 'Duvan Camilo Ayala Muñoz', 'DUVAN1108', 'camiloayala', 1),
(2, 'DUVAN2', 'DUVAN2', 'CAMILOAYALA', 1),
(3, 'NATALIA GARZON', 'NATALIA', '123456', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`id_usr`,`nivel`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` double NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
