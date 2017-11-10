-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-11-2017 a las 19:44:58
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `colegiodno`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_recursos`
--

CREATE TABLE `tbl_recursos` (
  `recurso_id` int(3) NOT NULL,
  `recurso_nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `recurso_tipo` enum('Aula de teoría','Aula de informática','Despacho','Sala de reuniones','Proyector portátil','Carro portátil','Portátil','Dispositivo móvil') COLLATE utf8_unicode_ci NOT NULL,
  `recurso_img` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_recursos`
--

INSERT INTO `tbl_recursos` (`recurso_id`, `recurso_nombre`, `recurso_tipo`, `recurso_img`) VALUES
(1, 'Aula A (con proyector)', 'Aula de teoría', '/img/aulateoria.jpg'),
(2, 'Aula B (con proyector)', 'Aula de teoría', ''),
(3, 'Aula C', 'Aula de teoría', ''),
(4, 'Aula A informática', 'Aula de informática', ''),
(5, 'Aula B informática', 'Aula de informática', ''),
(6, 'Despacho A', 'Despacho', ''),
(7, 'Despacho B', 'Despacho', ''),
(8, 'Sala de reuniones A', 'Sala de reuniones', ''),
(9, 'Sala de reuniones B', 'Sala de reuniones', ''),
(10, 'Proyector portátil A', 'Proyector portátil', ''),
(11, 'Carro de portátiles A', 'Carro portátil', ''),
(12, 'Portátil A', 'Portátil', ''),
(13, 'Portátil B', 'Portátil', ''),
(14, 'Portátil C', 'Portátil', ''),
(15, 'Móvil A', 'Dispositivo móvil', ''),
(16, 'Móvil B', 'Dispositivo móvil', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_reservasrecursos`
--

CREATE TABLE `tbl_reservasrecursos` (
  `reservarecurso_id` int(3) NOT NULL,
  `reservarecurso_recurso` int(3) NOT NULL,
  `reservarecurso_fechareserva` datetime DEFAULT CURRENT_TIMESTAMP,
  `reservarecurso_fechadevolucion` datetime DEFAULT CURRENT_TIMESTAMP,
  `reservarecurso_usuario` int(3) NOT NULL,
  `reservarecurso_estado` enum('Disponible','Reservada') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_reservasrecursos`
--

INSERT INTO `tbl_reservasrecursos` (`reservarecurso_id`, `reservarecurso_recurso`, `reservarecurso_fechareserva`, `reservarecurso_fechadevolucion`, `reservarecurso_usuario`, `reservarecurso_estado`) VALUES
(7, 1, '2017-11-10 19:25:29', '2017-11-10 19:25:29', 1, 'Disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `usuario_id` int(3) NOT NULL,
  `usuario_nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `usuario_pw` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`usuario_id`, `usuario_nombre`, `usuario_pw`) VALUES
(1, 'Oscar', 'qweQWE123'),
(2, 'Nico', 'qweQWE123'),
(3, 'David', 'qweQWE123'),
(4, 'Sergio', 'qweQWE123'),
(5, 'Admin', 'qweQWE123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_recursos`
--
ALTER TABLE `tbl_recursos`
  ADD PRIMARY KEY (`recurso_id`);

--
-- Indices de la tabla `tbl_reservasrecursos`
--
ALTER TABLE `tbl_reservasrecursos`
  ADD PRIMARY KEY (`reservarecurso_id`),
  ADD KEY `FK_reservarecurso_recurso` (`reservarecurso_recurso`),
  ADD KEY `FK_reservarecurso_usuario` (`reservarecurso_usuario`);

--
-- Indices de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_recursos`
--
ALTER TABLE `tbl_recursos`
  MODIFY `recurso_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `tbl_reservasrecursos`
--
ALTER TABLE `tbl_reservasrecursos`
  MODIFY `reservarecurso_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  MODIFY `usuario_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_reservasrecursos`
--
ALTER TABLE `tbl_reservasrecursos`
  ADD CONSTRAINT `FK_reservarecurso_recurso` FOREIGN KEY (`reservarecurso_recurso`) REFERENCES `tbl_recursos` (`recurso_id`),
  ADD CONSTRAINT `FK_reservarecurso_usuario` FOREIGN KEY (`reservarecurso_usuario`) REFERENCES `tbl_usuarios` (`usuario_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
