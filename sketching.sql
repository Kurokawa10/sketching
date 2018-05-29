-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-05-2018 a las 02:16:25
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sketching`
--
CREATE DATABASE IF NOT EXISTS `sketching` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sketching`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acceso`
--

CREATE TABLE `acceso` (
  `id_usuario` int(11) NOT NULL,
  `password` varchar(64) NOT NULL,
  `ultimo_acceso` datetime NOT NULL,
  `rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `acceso`
--

INSERT INTO `acceso` (`id_usuario`, `password`, `ultimo_acceso`, `rol`) VALUES
(1, '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '2018-05-13 00:00:00', 0),
(5, '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '2018-05-17 02:26:31', 1),
(30, '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '2018-05-17 08:47:09', 1),
(31, '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '2018-05-17 09:39:57', 1),
(32, '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '2018-05-17 09:44:35', 1),
(34, '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '2018-05-17 10:01:03', 1),
(35, '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '2018-05-17 10:03:37', 1),
(39, '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '2018-05-21 02:01:53', 1),
(40, 'f2c28760605693c73d3855b73769d606c1f5dbbebcb1f5f2fd951fb6b8ef2d36', '2018-05-21 08:46:47', 1),
(41, '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '2018-05-24 07:16:53', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria`
--

CREATE TABLE `galeria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `autor` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `visitas` int(11) NOT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `galeria`
--

INSERT INTO `galeria` (`id`, `nombre`, `descripcion`, `autor`, `fecha_creacion`, `visitas`, `tipo`) VALUES
(1, 'Prueba', 'Esta galeria esta hardcodeada, es solo de pruebas', 1, '2018-05-20 20:00:00', 1, 5),
(2, 'Prueba2', 'Esta galeria tambien esta hardcodeada, es solo de pruebas', 1, '2018-05-20 20:00:00', 2, 0),
(3, 'Mas pruebas hardc', 'Esta galeria tambien esta hardcodeada, es solo de pruebas', 1, '2018-05-20 20:00:00', 5, 1),
(4, 'Otra pruebas hardc', 'Esta galeria tambien esta hardcodeada, es solo de pruebas', 1, '2018-05-20 20:00:00', 1, 5),
(5, '5 pruebas hardc', 'Esta galeria tambien esta hardcodeada, es solo de pruebas', 1, '2018-05-20 20:00:00', 2, 3),
(6, '6 pruebas hardc', 'Esta galeria tambien esta hardcodeada, es solo de pruebas', 1, '2018-05-20 20:00:00', 15, 1),
(7, '7 prueba', 'Esta galeria tambien esta hardcodeada, es solo de pruebas', 1, '2018-05-20 20:00:00', 193, 0),
(38, 'Galeria Buena', 'Galeria creada por el autor desde New gallery', 35, '2018-05-29 02:04:39', 1, 1),
(39, 'Galeria de pruebas', 'Galeria de pruebas', 35, '2018-05-29 02:06:36', 2, 0),
(40, 'Galeria para mis mejores fans', 'Exclusive content', 35, '2018-05-29 02:09:14', 3, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id` int(11) NOT NULL,
  `concepto` varchar(50) NOT NULL,
  `emisor` int(11) NOT NULL,
  `destinatario` int(11) NOT NULL,
  `cantidad` decimal(10,2) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subs`
--

CREATE TABLE `subs` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_autor` int(11) NOT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `subs`
--

INSERT INTO `subs` (`id`, `id_user`, `id_autor`, `tipo`) VALUES
(1, 30, 1, 5),
(2, 5, 1, 5),
(5, 39, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `birth_date` date NOT NULL,
  `profile_image` varchar(100) NOT NULL,
  `descripcion` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `email`, `nombre`, `apellido`, `birth_date`, `profile_image`, `descripcion`) VALUES
(1, 'kurokawa', 'rgkurokawa@gmail.com', 'Roberto', 'Garcia', '1993-11-15', 'kurokawa.jpg', 'Me apasiona el dibujo y quiero compartilo con los demas.'),
(5, 'ggrobert', 'robert5_gg@hotmail.com', 'Roberto García Gordi', 'Gordillo', '1968-05-02', 'ggrobert.jpg', ''),
(30, 'rgarciag', 'robert6_gg@hotmail.com', 'Roberto García Gordi', 'Gordillo', '1978-05-02', 'rgarciag.jpg', ''),
(31, 'cargonben', 'carlo64@hotmail.es', 'Carlos', 'Gonzalez', '1995-12-18', '', ''),
(32, 'cargonben1', 'carlo64@hotmail.com', 'Carlos', 'CASd', '1987-05-05', 'cargonben1.jpg', ''),
(34, 'kurokawa10', 'robert_gg@hotmail.com', 'Roberto García Gordi', 'Gordillo', '1987-05-05', 'kurokawa10.jpg', ''),
(35, 'kurokawa11', 'robert5_gg@hotmail.co', 'Roberto García Gordi', 'Gordillo', '1987-05-01', 'kurokawa11.jpg', ''),
(39, 'rgarciag11', 'robert5_gg@hotmail.com2', 'Roberto García Gordi', 'Gordillo', '1999-05-02', 'rgarciag11.jpg', 'Fanatico del dibujo, ayudame a ayudar a ayudate.'),
(40, 'Hasam', 'jsmjsmjsm17@gmail.com', 'Jorge', 'Sánchez Muñoz', '1997-05-06', '', ''),
(41, 'PichaBrava69', 'ainfanter01@gmail.com', 'PichaBrava69', 'PichaBrava69', '1993-12-29', 'PichaBrava69.jpg', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acceso`
--
ALTER TABLE `acceso`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `galeria`
--
ALTER TABLE `galeria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `autor` (`autor`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `subs`
--
ALTER TABLE `subs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UC_suscripciones` (`id_user`,`id_autor`),
  ADD KEY `id_autor` (`id_autor`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acceso`
--
ALTER TABLE `acceso`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `galeria`
--
ALTER TABLE `galeria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `subs`
--
ALTER TABLE `subs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `acceso`
--
ALTER TABLE `acceso`
  ADD CONSTRAINT `acceso_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `galeria`
--
ALTER TABLE `galeria`
  ADD CONSTRAINT `galeria_ibfk_1` FOREIGN KEY (`autor`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `subs`
--
ALTER TABLE `subs`
  ADD CONSTRAINT `subs_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `subs_ibfk_2` FOREIGN KEY (`id_autor`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `subs_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
