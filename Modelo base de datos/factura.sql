-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-11-2019 a las 22:16:27
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `factura`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `ID_CLI` int(11) NOT NULL,
  `NOMBRE_CLI` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `DIRECCION_CLI` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `TELEFONO_CLI` varchar(10) COLLATE latin1_spanish_ci DEFAULT NULL,
  `CEDULA_CLI` varchar(10) COLLATE latin1_spanish_ci DEFAULT NULL,
  `EMAIL_CLI` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`ID_CLI`, `NOMBRE_CLI`, `DIRECCION_CLI`, `TELEFONO_CLI`, `CEDULA_CLI`, `EMAIL_CLI`) VALUES
(72, 'Gema Castillo', 'Luz de america', '0978694781', '1313602920', 'ggcastillo1@espe.edu.ec'),
(74, 'Marlene Zambrano', 'Luz de america', '0939677957', '1309772711', 'marlenezambrano@gmail.om');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_factura`
--

CREATE TABLE `detalle_factura` (
  `ID_DETFACT` int(11) NOT NULL,
  `ID_PRO` int(11) NOT NULL,
  `ID_FAC` int(11) NOT NULL,
  `CANT_DETFACT` int(11) DEFAULT NULL,
  `VALORTOTAL_DETFACT` float DEFAULT NULL,
  `PRECIO_DETFACT` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `detalle_factura`
--

INSERT INTO `detalle_factura` (`ID_DETFACT`, `ID_PRO`, `ID_FAC`, `CANT_DETFACT`, `VALORTOTAL_DETFACT`, `PRECIO_DETFACT`) VALUES
(1, 1, 1, 0, 160, 16),
(2, 1, 1, 0, 32, 16),
(3, 1, 1, 10, 160, 16),
(4, 1, 2, 1, 16, 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `ID_FAC` int(11) NOT NULL,
  `ID_CLI` int(11) DEFAULT NULL,
  `SUBTOTAL_FAC` float DEFAULT NULL,
  `IVA_FAC` float DEFAULT NULL,
  `TOTAL_TAC` float DEFAULT NULL,
  `fecha_fac` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`ID_FAC`, `ID_CLI`, `SUBTOTAL_FAC`, `IVA_FAC`, `TOTAL_TAC`, `fecha_fac`) VALUES
(1, 72, 0, 0, 0, '2019-11-10'),
(2, 72, 0, 0, 0, '2019-11-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `nombre_user` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `password` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `correo_user` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `ciudad_user` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `username` varchar(20) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`id`, `nombre_user`, `password`, `correo_user`, `ciudad_user`, `username`) VALUES
(1, 'Gema', '123456', 'gemagcz@gmail.com', 'Luz de america', 'gemycz');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `ID_PRO` int(11) NOT NULL,
  `NOMBRE_PRO` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `CODIGO_PRO` int(11) DEFAULT NULL,
  `CANTIDAD_PRO` int(11) DEFAULT NULL,
  `PRECIO_PRO` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`ID_PRO`, `NOMBRE_PRO`, `CODIGO_PRO`, `CANTIDAD_PRO`, `PRECIO_PRO`) VALUES
(1, 'Mouse', 1234, 21, 16),
(2, 'cargador', 12345, 12, 15),
(3, 'aaaa', 12344, 11, 12);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`ID_CLI`);

--
-- Indices de la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD PRIMARY KEY (`ID_DETFACT`) USING BTREE,
  ADD KEY `FK_DETALLE_FACTURA2` (`ID_PRO`),
  ADD KEY `FK_DETALLE_FACTURA` (`ID_FAC`) USING BTREE;

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`ID_FAC`),
  ADD KEY `FK_RELATIONSHIP_1` (`ID_CLI`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`ID_PRO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `ID_CLI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT de la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  MODIFY `ID_DETFACT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `ID_FAC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `ID_PRO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD CONSTRAINT `FK_DETALLE_FACTURA` FOREIGN KEY (`ID_FAC`) REFERENCES `factura` (`ID_FAC`),
  ADD CONSTRAINT `FK_DETALLE_FACTURA2` FOREIGN KEY (`ID_PRO`) REFERENCES `producto` (`ID_PRO`);

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `FK_RELATIONSHIP_1` FOREIGN KEY (`ID_CLI`) REFERENCES `cliente` (`ID_CLI`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
