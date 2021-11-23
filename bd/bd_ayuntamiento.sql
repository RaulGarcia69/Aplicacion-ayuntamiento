-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-11-2021 a las 15:19:45
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_ayuntamiento`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `correo_admin` varchar(70) DEFAULT NULL,
  `pass_admin` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `correo_admin`, `pass_admin`) VALUES
(1, 'admin1@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_evento`
--

CREATE TABLE `tbl_evento` (
  `id` int(11) NOT NULL,
  `nombre_even` varchar(45) DEFAULT NULL,
  `descripcion_even` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_evento`
--

INSERT INTO `tbl_evento` (`id`, `nombre_even`, `descripcion_even`) VALUES
(1, 'Acto de encendido de las luces', 'El espectáculo “Ombrana” es el pistoletazo de salida de las actividades de Navidad en la ciudad de Barcelona. Se trata de un acto cultural, festivo, familiar y abierto a todo el mundo, que culminará con el encendido de las luces navideñas de la ciudad.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_evento_voluntario`
--

CREATE TABLE `tbl_evento_voluntario` (
  `id` int(11) NOT NULL,
  `id_vol` int(11) DEFAULT NULL,
  `id_even` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_evento_voluntario`
--

INSERT INTO `tbl_evento_voluntario` (`id`, `id_vol`, `id_even`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_voluntario`
--

CREATE TABLE `tbl_voluntario` (
  `id` int(11) NOT NULL,
  `nombre_vol` varchar(45) DEFAULT NULL,
  `correo_vol` varchar(50) DEFAULT NULL,
  `pass_vol` varchar(50) DEFAULT NULL,
  `dni_vol` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_voluntario`
--

INSERT INTO `tbl_voluntario` (`id`, `nombre_vol`, `correo_vol`, `pass_vol`, `dni_vol`) VALUES
(1, 'Halfonso', 'halfonso@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '46489113H');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_evento`
--
ALTER TABLE `tbl_evento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_evento_voluntario`
--
ALTER TABLE `tbl_evento_voluntario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tbl_evento_voluntario_tbl_voluntario_idx` (`id_vol`),
  ADD KEY `fk_tbl_evento_voluntario_tbl_evento1_idx` (`id_even`);

--
-- Indices de la tabla `tbl_voluntario`
--
ALTER TABLE `tbl_voluntario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbl_evento`
--
ALTER TABLE `tbl_evento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbl_evento_voluntario`
--
ALTER TABLE `tbl_evento_voluntario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbl_voluntario`
--
ALTER TABLE `tbl_voluntario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_evento_voluntario`
--
ALTER TABLE `tbl_evento_voluntario`
  ADD CONSTRAINT `fk_tbl_evento_voluntario_tbl_evento1` FOREIGN KEY (`id_even`) REFERENCES `tbl_evento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_evento_voluntario_tbl_voluntario` FOREIGN KEY (`id_vol`) REFERENCES `tbl_voluntario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
