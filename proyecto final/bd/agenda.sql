-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-04-2024 a las 11:28:29
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agenda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `amigos`
--

CREATE TABLE `amigos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dueño` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `fecha_nacimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `amigos`
--

INSERT INTO `amigos` (`id`, `dueño`, `nombre`, `apellidos`, `fecha_nacimiento`) VALUES
(1, 1, 'Andrés ', 'López', '2005-02-25'),
(2, 1, 'Juana', 'Rodríguez', '2006-03-30'),
(3, 1, 'María', 'Pino', '2005-06-21'),
(4, 2, 'María', 'Pérez', '2000-06-06'),
(5, 2, 'Luis', 'López', '0000-00-00'),
(6, 1, 'Raúl', 'Ruiz', '2001-06-21'),
(7, 3, 'Raquel', 'Molina', '2005-06-22'),
(8, 3, 'Miriam', 'Muñoz', '2001-04-29'),
(9, 3, 'Paco', 'Pérez', '2006-06-30'),
(10, 1, 'Pedro', 'Palomo', '2005-06-05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos`
--

CREATE TABLE `juegos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `plataforma` varchar(50) NOT NULL,
  `año` year(4) NOT NULL,
  `foto` varchar(20) DEFAULT NULL,
  `dueño` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `juegos`
--

INSERT INTO `juegos` (`id`, `titulo`, `plataforma`, `año`, `foto`, `dueño`) VALUES
(1, 'Fornite', 'PC', 2017, '1.jpg', 1),
(2, 'Minecraft', 'PC', 2009, '2.jpg', 1),
(3, 'World of Warcraft', 'PC', 2004, '3.jpg', 1),
(4, 'Los sims 4', 'PC', 2014, '4.jpg', 2),
(5, 'Assassin\'s creed ', 'Xbox', 2015, '5.jpg', 3),
(6, 'Grand Theft auto 5', 'Xbox', 2015, '6.jpg', 3),
(7, 'Days gone', 'PS4', 2019, '7.jpg', 3),
(8, 'Fifa 19', 'PS4', 2000, '8.jpg', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE `prestamos` (
  `id_amigo` bigint(20) NOT NULL,
  `id_juego` bigint(20) NOT NULL,
  `fecha_prestamo` date NOT NULL,
  `devuelto` set('s','n') NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `prestamos`
--

INSERT INTO `prestamos` (`id_amigo`, `id_juego`, `fecha_prestamo`, `devuelto`) VALUES
(3, 2, '2024-04-22', 's'),
(6, 3, '2024-04-28', 'n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre_usuario` varchar(20) NOT NULL,
  `contraseña` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre_usuario`, `contraseña`) VALUES
(1, 'alberto', 'alberto'),
(2, 'antonio', 'antonio'),
(3, 'maria', 'maria'),
(4, 'pedro', 'pedro');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `amigos`
--
ALTER TABLE `amigos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_amigo` (`id`);

--
-- Indices de la tabla `juegos`
--
ALTER TABLE `juegos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_disco` (`id`);

--
-- Indices de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD PRIMARY KEY (`id_amigo`,`id_juego`,`fecha_prestamo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
