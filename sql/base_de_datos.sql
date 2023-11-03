-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-11-2023 a las 20:06:05
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
-- Base de datos: `auto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `DNI_cliente` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `telefono` int(11) NOT NULL,
  `correo_electronico` varchar(30) NOT NULL,
  `contraseña` varchar(30) NOT NULL,
  `rol` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`DNI_cliente`, `nombre`, `apellido`, `telefono`, `correo_electronico`, `contraseña`, `rol`) VALUES
(1, 'Maximiliano', 'Soto de la Colina', 1185396024, 'maxi@gmail.com', 'maxixd', ''),
(2, 'Nahiara', 'Sassone', 1133445566, 'n@gmail.com', 'nanu797', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `polizas`
--

CREATE TABLE `polizas` (
  `IDpoliza` int(11) NOT NULL,
  `DNI_cliente` int(11) NOT NULL,
  `IDvehiculo` int(11) NOT NULL,
  `numero_poliza` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `monto_cobertura` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `polizas`
--

INSERT INTO `polizas` (`IDpoliza`, `DNI_cliente`, `IDvehiculo`, `numero_poliza`, `fecha_inicio`, `fecha_fin`, `monto_cobertura`) VALUES
(1, 1, 1, 121212121, '2023-09-05', '2023-09-09', 5000.00),
(2, 2, 2, 15151515, '2023-09-22', '2023-09-30', 6000.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reclamos`
--

CREATE TABLE `reclamos` (
  `IDreclamo` int(11) NOT NULL,
  `DNI_reclamo` int(11) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `descripcion` varchar(20) NOT NULL,
  `fecha_reclamo` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reclamos`
--

INSERT INTO `reclamos` (`IDreclamo`, `DNI_reclamo`, `estado`, `descripcion`, `fecha_reclamo`) VALUES
(1, 1, 'ninguno', 'auto sano xd', '2023-09-20'),
(2, 2, 'destruido', 'auto chocado', '2023-09-21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `siniestros`
--

CREATE TABLE `siniestros` (
  `id_siniestro` int(11) NOT NULL,
  `IDpoliza` int(11) NOT NULL,
  `fecha_suceso` date NOT NULL,
  `descripcion` varchar(20) NOT NULL,
  `monto_reclamado` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `siniestros`
--

INSERT INTO `siniestros` (`id_siniestro`, `IDpoliza`, `fecha_suceso`, `descripcion`, `monto_reclamado`) VALUES
(1, 1, '2023-09-03', 'auto chocado ', 200.00),
(2, 2, '2023-09-18', 'auto chocado ', 300.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `IDvehiculo` int(11) NOT NULL,
  `DNI_cliente` int(11) NOT NULL,
  `tipo_vehiculo` varchar(30) NOT NULL,
  `modelo` varchar(20) NOT NULL,
  `marca` varchar(20) NOT NULL,
  `fecha_salida` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`IDvehiculo`, `DNI_cliente`, `tipo_vehiculo`, `modelo`, `marca`, `fecha_salida`) VALUES
(1, 1, 'carro', '2006', 'toyota', '2016-09-07'),
(2, 2, 'camioneta', '2007', 'chevrolet', '2018-09-04'),
(5, 1, 'Carro', 'MX-5 2024', 'Mazda', '2023-09-29'),
(6, 0, 'Carro', 'XLF-300', 'Audi', '0000-00-00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`DNI_cliente`);

--
-- Indices de la tabla `polizas`
--
ALTER TABLE `polizas`
  ADD PRIMARY KEY (`IDpoliza`),
  ADD UNIQUE KEY `DNI_cliente` (`DNI_cliente`,`IDvehiculo`),
  ADD KEY `IDvehiculo` (`IDvehiculo`);

--
-- Indices de la tabla `reclamos`
--
ALTER TABLE `reclamos`
  ADD PRIMARY KEY (`IDreclamo`),
  ADD UNIQUE KEY `DNI_reclamo` (`DNI_reclamo`);

--
-- Indices de la tabla `siniestros`
--
ALTER TABLE `siniestros`
  ADD PRIMARY KEY (`id_siniestro`),
  ADD UNIQUE KEY `IDpoliza` (`IDpoliza`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`IDvehiculo`),
  ADD KEY `DNI_cliente` (`DNI_cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `DNI_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `polizas`
--
ALTER TABLE `polizas`
  MODIFY `IDpoliza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `reclamos`
--
ALTER TABLE `reclamos`
  MODIFY `IDreclamo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `siniestros`
--
ALTER TABLE `siniestros`
  MODIFY `id_siniestro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `IDvehiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `polizas`
--
ALTER TABLE `polizas`
  ADD CONSTRAINT `polizas_ibfk_1` FOREIGN KEY (`DNI_cliente`) REFERENCES `clientes` (`DNI_cliente`),
  ADD CONSTRAINT `polizas_ibfk_2` FOREIGN KEY (`IDvehiculo`) REFERENCES `vehiculos` (`IDvehiculo`);

--
-- Filtros para la tabla `reclamos`
--
ALTER TABLE `reclamos`
  ADD CONSTRAINT `reclamos_ibfk_1` FOREIGN KEY (`DNI_reclamo`) REFERENCES `clientes` (`DNI_cliente`);

--
-- Filtros para la tabla `siniestros`
--
ALTER TABLE `siniestros`
  ADD CONSTRAINT `siniestros_ibfk_1` FOREIGN KEY (`IDpoliza`) REFERENCES `polizas` (`IDpoliza`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
