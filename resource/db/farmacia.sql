-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-04-2020 a las 18:33:07
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `farmacia`
--

-- -----------------------------------------------------
-- Schema farmacia
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `farmacia` DEFAULT CHARACTER SET utf8 ;
USE `farmacia` ;
--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idcliente` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `cedula` varchar(45) DEFAULT NULL,
  `genero` varchar(45) DEFAULT NULL,
  `fecha_naci` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idcliente`, `nombre`, `apellido`, `cedula`, `genero`, `fecha_naci`) VALUES
(1, 'Jairo', 'Salazar', '12345', 'Masculino', '2032-02-02'),
(2, 'willy', 'colon', '971', 'Masculino', '1987-03-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `iddetalle_venta` int(11) NOT NULL,
  `cant` int(11) DEFAULT NULL,
  `medicamento_idmedicamento` int(11) NOT NULL,
  `venta_idventa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`iddetalle_venta`, `cant`, `medicamento_idmedicamento`, `venta_idventa`) VALUES
(1, 1, 2, 5),
(2, 1, 2, 6),
(3, 1, 1, 7),
(4, 1, 3, 7),
(5, 2, 3, 8),
(6, 1, 2, 9),
(7, 1, 2, 10),
(8, 2, 3, 10),
(9, 1, 2, 11),
(10, 1, 2, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `laboratorio`
--

CREATE TABLE `laboratorio` (
  `idlaboratorio` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `descrip` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `laboratorio`
--

INSERT INTO `laboratorio` (`idlaboratorio`, `nombre`, `descrip`) VALUES
(1, 'genfar', 'jajajajajajaja');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamento`
--

CREATE TABLE `medicamento` (
  `idmedicamento` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `descrip` varchar(45) DEFAULT NULL,
  `fecha_venc` date DEFAULT NULL,
  `cant` varchar(45) DEFAULT NULL,
  `fecha_creado` date DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `usuario_idusuario` int(11) NOT NULL,
  `laboratorio_idlaboratorio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `medicamento`
--

INSERT INTO `medicamento` (`idmedicamento`, `nombre`, `descrip`, `fecha_venc`, `cant`, `fecha_creado`, `precio`, `usuario_idusuario`, `laboratorio_idlaboratorio`) VALUES
(1, 'ACETAMINOFEN', 'no sea', '2032-02-02', '0', '2020-02-02', 1, 1, 1),
(2, 'IBUPRO', 'ajkn', '2019-12-31', '16', '2021-12-02', 55, 1, 1),
(3, 'ADW', 'jn', '2017-12-31', '0', '2017-12-26', 100, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `cedula` int(11) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `password` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `cedula`, `nombre`, `apellido`, `correo`, `usuario`, `password`) VALUES
(1, 1094, 'sebas', 'palaee', 'sebas@pala.com', 'admin', 123),
(2, 1, 'fw', 'awd', 'wd', 'yhj', 341),
(3, 22, 'da', 'dwa', 'daw', 'we', 34);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `idventa` int(11) NOT NULL,
  `fecha_venta` datetime DEFAULT NULL,
  `valor_total` int(11) DEFAULT NULL,
  `cliente_idcliente` int(11) NOT NULL,
  `usuario_idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`idventa`, `fecha_venta`, `valor_total`, `cliente_idcliente`, `usuario_idusuario`) VALUES
(5, '0000-00-00 00:00:00', 55, 1, 1),
(6, '0000-00-00 00:00:00', 55, 1, 1),
(7, '0000-00-00 00:00:00', 101, 1, 1),
(8, NULL, 200, 2, 1),
(9, '0000-00-00 00:00:00', 55, 2, 1),
(10, '0000-00-00 00:00:00', 255, 1, 1),
(11, '0000-00-00 00:00:00', 55, 2, 1),
(12, '0000-00-00 00:00:00', 55, 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idcliente`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`iddetalle_venta`),
  ADD KEY `medicamento_idmedicamento` (`medicamento_idmedicamento`),
  ADD KEY `venta_idventa` (`venta_idventa`);

--
-- Indices de la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
  ADD PRIMARY KEY (`idlaboratorio`);

--
-- Indices de la tabla `medicamento`
--
ALTER TABLE `medicamento`
  ADD PRIMARY KEY (`idmedicamento`),
  ADD KEY `usuario_idusuario` (`usuario_idusuario`),
  ADD KEY `laboratorio_idlaboratorio` (`laboratorio_idlaboratorio`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`idventa`),
  ADD KEY `cliente_idcliente` (`cliente_idcliente`),
  ADD KEY `usuario_idusuario` (`usuario_idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `iddetalle_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
  MODIFY `idlaboratorio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `medicamento`
--
ALTER TABLE `medicamento`
  MODIFY `idmedicamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `idventa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `detalle_venta_ibfk_1` FOREIGN KEY (`medicamento_idmedicamento`) REFERENCES `medicamento` (`idmedicamento`),
  ADD CONSTRAINT `detalle_venta_ibfk_2` FOREIGN KEY (`venta_idventa`) REFERENCES `venta` (`idventa`);

--
-- Filtros para la tabla `medicamento`
--
ALTER TABLE `medicamento`
  ADD CONSTRAINT `medicamento_ibfk_1` FOREIGN KEY (`usuario_idusuario`) REFERENCES `usuario` (`idusuario`),
  ADD CONSTRAINT `medicamento_ibfk_2` FOREIGN KEY (`laboratorio_idlaboratorio`) REFERENCES `laboratorio` (`idlaboratorio`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`cliente_idcliente`) REFERENCES `cliente` (`idcliente`),
  ADD CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`usuario_idusuario`) REFERENCES `usuario` (`idusuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
