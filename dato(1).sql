-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-08-2021 a las 21:28:59
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dato`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(10) NOT NULL,
  `cantidad` int(10) NOT NULL,
  `fecha` date NOT NULL,
  `precio` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `idpro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id`, `cantidad`, `fecha`, `precio`, `idpro`) VALUES
(1, 5, '2021-07-10', '123', 1),
(2, 10, '2021-07-13', '230', 10),
(3, 5, '2021-07-13', '98', 3),
(4, 10, '2021-07-13', '230', 10),
(5, 2, '2021-07-14', '$365', 11),
(7, 20, '2021-07-14', '450', 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizar`
--

CREATE TABLE `cotizar` (
  `id` int(10) NOT NULL,
  `cantidad` int(10) NOT NULL,
  `fecha` date NOT NULL,
  `precio` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `idpro` int(11) NOT NULL,
  `user` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `cotizar`
--

INSERT INTO `cotizar` (`id`, `cantidad`, `fecha`, `precio`, `idpro`, `user`) VALUES
(3, 5, '2021-07-11', '98', 3, 0),
(4, 3, '2021-07-11', '23', 4, 0),
(5, 3, '2021-07-13', '123', 1, 250),
(6, 3, '2021-07-13', '12', 2, 247),
(7, 2, '2021-07-13', '98', 3, 247),
(9, 2, '2021-07-13', '98', 3, 252),
(10, 2, '2021-07-14', '$125', 17, 252),
(12, 2, '0000-00-00', '$40', 22, 253);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `depa`
--

CREATE TABLE `depa` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `depa`
--

INSERT INTO `depa` (`id`, `nombre`) VALUES
(2, 'Trupper'),
(3, 'Pintura'),
(5, 'obra negra'),
(6, 'Fontaneria ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `codigo` varchar(10) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `name` text CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `cantidad` int(10) NOT NULL,
  `fecha` date NOT NULL,
  `precio` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `detalles` text CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `iddepa` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `codigo`, `name`, `cantidad`, `fecha`, `precio`, `detalles`, `iddepa`) VALUES
(6, '', 'clavos', 10, '0000-00-00', '12', 'de acero', 0),
(7, '', 'clavos', 10, '2021-07-14', '12', 'de acero', 0),
(8, '', 'clavos', 10, '0000-00-00', '12', 'de acero', 0),
(9, '', 'serrucho', 2, '2021-07-14', '14', 'chico', 0),
(14, 'we2', 'Metro De Arena', 15, '2021-07-14', '450', 'Metalico', 5),
(15, 'sde', 'Lata De grava', 2, '0000-00-00', '15', '', 5),
(16, '', 'cuchara tipo filadefia', 1, '0000-00-00', '65', '', 2),
(17, '', 'marro de 3libras', 30, '0000-00-00', '125', 'mango corto', 2),
(18, '', 'marro 4 libras', 5, '0000-00-00', '95', 'tipo nevada', 2),
(19, '', 'cavadora', 5, '2021-07-14', '325', 'mango de madera', 2),
(20, '', 'Cinta de Aislar', 5, '2021-07-14', '20', '', 2),
(21, '', 'pintura Aerosol', 5, '2021-07-14', '40', 'color negro', 3),
(22, '', 'pintura Aerosol', 5, '2021-07-14', '40', 'color verde hoja pretul', 3),
(23, '', 'pintura Aerosol', 5, '2021-07-14', '40', 'negro Santin', 3),
(24, '', 'pintura Aerosol azul', 5, '2021-07-14', '53', 'Holandes trupper', 3),
(25, '', 'pintura  de agua', 5, '2021-07-14', '510', 'color blanco', 3),
(26, '', 'pintura de agua', 5, '2021-07-14', '$510', 'color marfil de 19L', 0),
(27, '', 'pintura  de agua', 5, '2021-07-14', '510', 'color marfil de 19L', 3),
(28, '', 'pintura Aerosol metalica', 5, '2021-07-14', '53', 'color plata pretul', 3),
(29, '', 'pintura Aerosol metalica', 5, '2021-07-14', '53', 'color oro pretul', 3),
(30, '', 'llave de retencion angular', 5, '2021-07-14', '$40', '1/2x1/2', 6),
(31, '', 'pegamento de cpvc', 10, '2021-07-14', '35', 'foset 50m', 6),
(32, '', 'lamina', 10, '2021-07-14', '600', 'rectangular de 5.50m', 5),
(33, '', 'lamina ', 10, '2021-07-14', '550', 'rectangular de 4.88m', 5),
(34, '', 'lamina', 10, '2021-07-14', '790', 'cuadrada de 7.32m', 5),
(35, '', 'brocha de uso general', 10, '2021-07-14', '$30', '4p(hogar)', 3),
(36, '', 'segueta', 15, '2021-07-14', '$20', 'Bimetalica 24', 2),
(37, '', 'clavos', 15, '2021-07-14', '50 el kg', 'de 1 pulgada', 5),
(38, '', 'tuvo de pvc', 10, '2021-07-14', '1100', '6p', 6),
(39, '', 'corta pernos', 10, '2021-07-14', '$250', 'profesional', 2),
(40, '', 'cemento blanco', 0, '2021-07-14', '$10', 'por kilo', 5),
(41, '', 'Arco profesional', 5, '2021-07-14', '$145', 'tubular de acero', 2),
(42, '', 'brochas', 15, '2021-07-14', '$5', 'Economico', 3),
(43, '', 'brochas economicas', 10, '2021-07-14', '$7', 'de 1 1/2', 3),
(44, '', 'brochas economica', 10, '2021-07-14', '$10', ' de 21/2 pulgada', 3),
(45, '', 'caja de herramienta pretul', 5, '2021-07-14', '$45', 'de 13 pulgadas', 2),
(46, '', 'caja de herramienta pretul', 5, '2021-07-14', '$110', 'de 19 pulgadas', 2),
(47, '', 'sincel', 5, '2021-07-14', '$50', 'de 5/8x10', 2),
(48, '', 'cople', 20, '2021-07-14', '$45', 'de 6 pulgadas', 6),
(49, '', 'tuvo de pvc', 10, '2021-07-14', '$79', ' de 1 pulgada', 0),
(50, '', 'cincho', 50, '2021-07-14', '$1', 'de plastico', 0),
(51, '', 'clavos para madera', 0, '2021-07-14', '$14', 'de 4 pulgadas', 5),
(52, '', 'carretilla 4.50', 3, '2021-07-14', '$1450', 'llanta neumatica reforzada', 2),
(53, '', 'abrazadera de acero', 30, '2021-07-14', '$7', 'inoxidable N6', 6),
(54, '', 'abrazadera de acero', 20, '2021-07-14', '$8', 'inoxidable 5/8 N8', 6),
(55, '', 'manguera alimentadora', 1, '2021-07-14', '$85', 'tipo p', 6),
(56, '', 'lona multi-usos', 1, '2021-07-14', '$100', '2x3m', 2),
(57, '', 'cinta transparente', 1, '2021-07-14', '15', '40m', 2),
(58, '', 'candado de hierro', 5, '2021-07-14', '$45', '50mm', 2),
(59, '', 'candado antipalanca', 10, '2021-07-14', '100', 'de 70mm', 2),
(60, '', 'candado de hierro', 5, '0000-00-00', '36', '38mm GC', 2),
(61, '', 'brocha de uso general', 15, '2021-07-14', '48', '6 pulgadas', 3),
(62, '', 'brochas economica', 10, '2021-07-14', '12', 'de 3pulgadas', 3),
(63, 'xxx', 'xxxx', 2, '2021-07-14', '234', 'Litros', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sold`
--

CREATE TABLE `sold` (
  `id` int(10) NOT NULL,
  `name` text COLLATE latin1_spanish_ci NOT NULL,
  `cantidad` int(10) NOT NULL,
  `fecha` date NOT NULL,
  `precio` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `detalles` text COLLATE latin1_spanish_ci NOT NULL,
  `idpro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `sold`
--

INSERT INTO `sold` (`id`, `name`, `cantidad`, `fecha`, `precio`, `detalles`, `idpro`) VALUES
(1, 'cemento', 4, '2021-06-19', '12', '20kg', 1),
(2, 'cemento', 5, '2021-06-11', '123', '3443', 2),
(3, 'tabique', 10, '2021-06-20', '12', '2123', 2),
(4, 'gfdgdf', 0, '2021-07-07', 'df', 'dfg', 2),
(5, '', 3, '2021-07-10', '123', '', 5),
(6, 'marro de 3libras', 30, '2021-07-14', '125', 'mango corto', 5),
(7, '', 3, '2021-07-10', '123', '', 5),
(8, '', 3, '0000-00-00', '123', '', 1),
(9, '', 5, '2021-07-10', '98', '', 3),
(10, '', 1, '2021-07-14', '$365', '', 11),
(11, '', 3, '2021-07-14', '$50', '', 12),
(14, 'Metro De Arena', 10, '2021-07-13', '450', 'Metalico', 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `usuario` varchar(250) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `apellido` varchar(250) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `password` varchar(250) NOT NULL,
  `pass` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `usuario`, `nombre`, `apellido`, `telefono`, `password`, `pass`) VALUES
(245, 'admin', 'admin', 'admin', '', '$2y$10$BfixAOOL/Rpzf/m.0a/el./yKwelUO7t1P6PBLETmfNPjhiqWOie.', '1'),
(247, 'ffrank', 'Francisco', 'Mendez', '9333811167', '$2y$10$ln7R8oSPHmIKXKYdOdb/pe8nNJ.yzhl4irK5zkd2DeOoPq8epJqrO', '2'),
(253, 'Frank', 'Francisco', 'Rodriguez', '9321125110', '$2y$10$gQA8ZrpXxA2MAmO/aoiS1O0Ey3XgClwr4dnlBiEzNxof0TydrU0Fy', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cotizar`
--
ALTER TABLE `cotizar`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `depa`
--
ALTER TABLE `depa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `sold`
--
ALTER TABLE `sold`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `cotizar`
--
ALTER TABLE `cotizar`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `depa`
--
ALTER TABLE `depa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de la tabla `sold`
--
ALTER TABLE `sold`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=254;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
