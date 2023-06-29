-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-06-2023 a las 20:19:15
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `blockbl5_red_de_salud_oriente`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos`
--

CREATE TABLE `datos` (
  `id` int(11) NOT NULL,
  `empresa` varchar(30) NOT NULL,
  `sede` varchar(20) NOT NULL,
  `departamento` varchar(20) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `nom_usuario` varchar(20) NOT NULL,
  `fecha` varchar(20) NOT NULL,
  `hora` varchar(20) NOT NULL,
  `serial` varchar(20) NOT NULL,
  `activo_fijo` varchar(20) NOT NULL,
  `tipo_equipo` varchar(20) NOT NULL,
  `modelo` varchar(20) NOT NULL,
  `fabricante` varchar(20) NOT NULL,
  `nom_equipo` varchar(20) NOT NULL,
  `nom_procesador` varchar(20) NOT NULL,
  `ram` varchar(20) NOT NULL,
  `slot` varchar(20) NOT NULL,
  `ip_equipo` varchar(20) NOT NULL,
  `Componentes_add` text NOT NULL,
  `so` varchar(20) NOT NULL,
  `disco` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `datos`
--

INSERT INTO `datos` (`id`, `empresa`, `sede`, `departamento`, `nombre`, `nom_usuario`, `fecha`, `hora`, `serial`, `activo_fijo`, `tipo_equipo`, `modelo`, `fabricante`, `nom_equipo`, `nom_procesador`, `ram`, `slot`, `ip_equipo`, `Componentes_add`, `so`, `disco`) VALUES
(176, 'Integratic', 'Charco Azul ', 'Administración', 'Heimdall Rojas', 'Pedro', '29/06/2023', '12:56:43 PM', '4020', '123456', 'Servidor', 'Hp pro desk 400 G1', 'Lenovo', 'Desk_456', 'AMD FX-7600P Radeon ', '8', '2', '192.168.100.12', 'Hola Mundo', 'Windows 7', '500 GB');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `id_historial` int(11) NOT NULL,
  `empresa` varchar(30) NOT NULL,
  `sede` varchar(20) NOT NULL,
  `departamento` varchar(20) NOT NULL,
  `serial` varchar(20) NOT NULL,
  `fecha` varchar(20) NOT NULL,
  `hora` varchar(20) NOT NULL,
  `tipo_mant` varchar(20) NOT NULL,
  `visita` int(10) NOT NULL,
  `observacion` text NOT NULL,
  `recomendaciones` text NOT NULL,
  `nom_tec` varchar(30) NOT NULL,
  `repuesto` varchar(5) NOT NULL,
  `detalle_repuesto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`id_historial`, `empresa`, `sede`, `departamento`, `serial`, `fecha`, `hora`, `tipo_mant`, `visita`, `observacion`, `recomendaciones`, `nom_tec`, `repuesto`, `detalle_repuesto`) VALUES
(187, 'Integratic', 'Charco Azul', 'Administración', '4020', '29-06-23', '12:57:39 PM', 'Remoto', 1, 'El equipo esta muy lento', 'Cambierle el disco mecánico a solido', 'Heimdall Rojas', '1', 'Disco solido sata  256 Gb');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_impresora`
--

CREATE TABLE `tbl_impresora` (
  `id` int(11) NOT NULL,
  `empresa` varchar(20) NOT NULL,
  `sede` varchar(20) NOT NULL,
  `departamento` varchar(20) NOT NULL,
  `nom_tec` varchar(20) NOT NULL,
  `fecha` varchar(20) NOT NULL,
  `hora` varchar(20) NOT NULL,
  `serial` varchar(20) NOT NULL,
  `activo_fijo` varchar(20) NOT NULL,
  `ip_equipo` varchar(20) NOT NULL,
  `tipo_equipo` varchar(20) NOT NULL,
  `modelo` varchar(20) NOT NULL,
  `fabricante` varchar(20) NOT NULL,
  `visita` int(5) NOT NULL,
  `diagnostico` text NOT NULL,
  `recomendaciones` text NOT NULL,
  `repuesto` varchar(5) NOT NULL,
  `detalle_repuesto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `archivo` varchar(40) NOT NULL,
  `access_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `password`, `email`, `archivo`, `access_level`) VALUES
(1, 'Heimdall Rojas', '14721994', 'heimdallr20@gmail.com', 'Heimdall.jpeg', 1),
(2, 'Denyer', '2020', 'Deyer@gmail.com', 'Denyer.jpeg', 2),
(3, 'leo', '1111', 'Leo@gmail.com', 'leo.jpeg', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `datos`
--
ALTER TABLE `datos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id_historial`);

--
-- Indices de la tabla `tbl_impresora`
--
ALTER TABLE `tbl_impresora`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `datos`
--
ALTER TABLE `datos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id_historial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT de la tabla `tbl_impresora`
--
ALTER TABLE `tbl_impresora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
