-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-11-2021 a las 15:14:18
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
(1, 'admin1@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(2, 'admin2@gmial.com', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_evento`
--

CREATE TABLE `tbl_evento` (
  `id` int(11) NOT NULL,
  `nombre_even` varchar(45) DEFAULT NULL,
  `descripcion_even` varchar(1000) DEFAULT NULL,
  `lugar_even` varchar(50) DEFAULT NULL,
  `fecha_ini_even` date DEFAULT NULL,
  `fecha_fin_even` date DEFAULT NULL,
  `capacidad_even` int(5) NOT NULL,
  `capacidad_max_even` int(5) NOT NULL,
  `img_even` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_evento`
--

INSERT INTO `tbl_evento` (`id`, `nombre_even`, `descripcion_even`, `lugar_even`, `fecha_ini_even`, `fecha_fin_even`, `capacidad_even`, `capacidad_max_even`, `img_even`) VALUES
(1, 'Acto de encendido de las luces', 'El espectáculo “Ombrana” es el pistoletazo de salida de las actividades de Navidad en la ciudad de Barcelona. Se trata de un acto cultural, festivo, familiar y abierto a todo el mundo, que culminará con el encendido de las luces navideñas de la ciudad.', ' Plaça de Sant Jaume', '2021-12-15', '2021-12-16', 5, 100, 'img1.jpg'),
(2, 'Drap-Art 21', 'Exposición colectiva con obras de arte que nacen, unas veces, para denunciar el desaforado consumismo actual; otras veces, como evidencia de la enorme cantidad de residuos que generamos; otras, desde el romanticismo de los artistas que plasman en sus obras el deseo de un entorno mejor; y, en todos los casos, con el objetivo de crear conciencia social para conseguir un desarrollo más sostenible, tanto desde el punto de vista medioambiental como en relación con las problemáticas sociales actuales.', 'Cinemes Girona', '2021-12-13', '2021-12-19', 2, 50, 'img3.jpg'),
(3, 'Pesebre en la plaza de Sant Jaume', 'El pesebre es una celebración de la vida y utiliza el ritual agrario y los animales domésticos que lo representan como protagonistas del ciclo natural que, después de tantos meses, volvemos a recuperar, con la complicidad del tejido comercial, las escuelas y los vecinos y vecinas del barrio y la generosidad de creadores de muchas disciplinas artísticas.', ' Plaça de Sant Jaume', '2021-12-10', '2021-12-13', 0, 20, 'img2.jpg'),
(4, 'Feria de Navidad en la Sagrada Familia', 'La feria de Navidad de la Sagrada Familia es el mercado navideño de más tradición de L’Eixample y reúne puestos de abetos de Navidad y decoración, pesebres y figuras, regalos y productos alimentarios artesanos como turrones, quesos y embutidos. Se trata de una feria nacida en los años sesenta que está ubicada en la plaza de la Sagrada Família.', 'Plaça Sagrada Familia', '2022-01-19', '2021-12-21', 0, 40, 'img6.jpg'),
(5, 'Teatre \"Karaoke Elusia\"', 'L\'escenari acull a l\'Anita, el Sam i el Cristian, tres amics que lloguen una sala privada d\'un karaoke per celebrar la seva graduació d\'institut. Durant la nit canten cançons, xerren i recorden de tots els moments que han viscut durant l\'últim any, que no ha sigut pas fàcil per cap d\'ells.', 'Sala Beckett - Obrador Internacional de Dramatúrgi', '2022-01-04', '2022-01-04', 0, 20, 'img5.jpg'),
(6, 'Poblenou Open Night', 'Galeries d’art, centres de creació, estudis d’artistes, productores audiovisuals, espais gastronòmics, botigues, sales de concerts i hotels se sumen a aquesta coneguda proposta de  Poblenou Urban District oferint una programació amb activitats gratuïtes i promocions especials organitzades únicament per a aquesta ocasió.', 'Diferents espais del barri del Poblenou', '2021-12-06', '2021-11-07', 5, 5, 'img4.jpg');

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
(1, 1, 1),
(2, 4, 1),
(3, 2, 1),
(4, 3, 1),
(5, 5, 2),
(6, 6, 2),
(7, 6, 1),
(8, 7, 6),
(9, 8, 6),
(10, 9, 6),
(11, 10, 6),
(12, 11, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_voluntario`
--

CREATE TABLE `tbl_voluntario` (
  `id` int(11) NOT NULL,
  `nombre_vol` varchar(45) DEFAULT NULL,
  `correo_vol` varchar(50) DEFAULT NULL,
  `dni_vol` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_voluntario`
--

INSERT INTO `tbl_voluntario` (`id`, `nombre_vol`, `correo_vol`, `dni_vol`) VALUES
(1, 'Halfonso', 'halfonso@gmail.com', '46489113H'),
(2, 'Salmon', '4doorsmorewhores@gmail.com', '42487113H'),
(3, 'Vegetta', 'pizzagratis@gmail.com', '82485112H'),
(4, 'Otto', 'otto@gmail.com', '92485912Y'),
(5, 'Teodoro', 'marica@gmail.com', '59489249H'),
(6, 'Raul', 'alan@gmail.com', '46489113A'),
(7, 'Pepe', 'pepe@gmail.com', '72499219M'),
(8, 'Ratio', 'ratio@gmail.com', '10498235T'),
(9, 'Mr Basado', 'basado69@gmail.com', '12298905J'),
(10, 'españabola', 'crack@gmail.com', '00258904R'),
(11, 'Pedro', 'sanxee@gmail.com', '08758109R');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_evento`
--
ALTER TABLE `tbl_evento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tbl_evento_voluntario`
--
ALTER TABLE `tbl_evento_voluntario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tbl_voluntario`
--
ALTER TABLE `tbl_voluntario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
