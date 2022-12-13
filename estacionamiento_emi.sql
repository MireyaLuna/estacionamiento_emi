-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-12-2022 a las 23:07:10
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `emi_prueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `ci` int(10) NOT NULL,
  `nombre` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `fecha_creacion` datetime DEFAULT current_timestamp(),
  `fecha_modificacion` datetime DEFAULT current_timestamp(),
  `usuario_creacion` int(11) DEFAULT NULL,
  `usuario_modificacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_factura`
--

CREATE TABLE `datos_factura` (
  `id` int(11) NOT NULL,
  `nit` int(11) NOT NULL,
  `razon_social` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_creacion` datetime DEFAULT current_timestamp(),
  `fecha_modificacion` datetime DEFAULT current_timestamp(),
  `usuario_creacion` int(11) DEFAULT NULL,
  `usuario_modificacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `espacio`
--

CREATE TABLE `espacio` (
  `id` int(11) NOT NULL,
  `nro_espacio` varchar(11) COLLATE utf8_spanish2_ci NOT NULL,
  `id_estacionamiento` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `fecha_creacion` datetime DEFAULT current_timestamp(),
  `fecha_modificacion` datetime DEFAULT current_timestamp(),
  `usuario_creacion` int(11) DEFAULT NULL,
  `usuario_modificacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estacionamiento`
--

CREATE TABLE `estacionamiento` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `ubicacion` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `fecha_creacion` datetime DEFAULT current_timestamp(),
  `fecha_modificacion` timestamp NULL DEFAULT current_timestamp(),
  `usuario_creacion` int(11) DEFAULT NULL,
  `usuario_modificacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id` int(11) NOT NULL,
  `id_ticket` int(11) NOT NULL,
  `nit` int(11) NOT NULL,
  `monto_total` int(11) NOT NULL,
  `fecha_emision` date NOT NULL DEFAULT current_timestamp(),
  `estado` int(11) NOT NULL DEFAULT 1,
  `fecha_creacion` datetime DEFAULT current_timestamp(),
  `fecha_modificacion` datetime DEFAULT current_timestamp(),
  `usuario_creacion` int(11) DEFAULT NULL,
  `usuario_modificacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametro`
--

CREATE TABLE `parametro` (
  `id` int(11) NOT NULL,
  `codigo` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `grupo` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(1000) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_creacion` datetime DEFAULT current_timestamp(),
  `fecha_modificacion` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario_creacion` int(11) DEFAULT NULL,
  `usuario_modificacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `parametro`
--

INSERT INTO `parametro` (`id`, `codigo`, `nombre`, `grupo`, `descripcion`, `estado`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES
(1, '1FE', 'Femenino', 'Genero', 'Genero femenino', 'Activo', NULL, '2022-09-14 15:21:17', NULL, NULL),
(2, '2MA', 'Masculino', 'Genero', 'Genero masculino', 'Activo', NULL, '2022-09-14 15:21:17', NULL, NULL),
(3, '1AUT', 'Automovil', 'Tipo_Vehiculo', 'Automoviles en general de 4 ruedas', 'Activo', NULL, '2022-09-14 15:21:17', NULL, NULL),
(4, '2MOT', 'Motocicleta ', 'Tipo_Vehiculo', 'Vehículos en general de 2 ruedas ', 'Activo', NULL, '2022-12-13 12:44:31', NULL, NULL),
(5, '3CUA', 'Cuadratrack', 'Tipo_Vehiculo', 'Vehículo descapotado de 4 ruedas ', 'Activo', NULL, '2022-12-13 12:44:40', NULL, NULL),
(6, '1ADM', 'Administrativo', 'Cargo', 'Cargo que administra el funcionamiento correcto de la institucion', 'Activo', NULL, '2022-09-14 15:21:17', NULL, NULL),
(7, '2DOC', 'Docente', 'Cargo', 'Docentes en general ', 'Activo', NULL, '2022-09-14 15:21:17', NULL, NULL),
(8, '3EST', 'Estudiante ', 'Cargo', 'Estudiantes civiles y militares en general ', 'Activo', NULL, '2022-09-14 15:21:17', NULL, NULL),
(9, '4VIS', 'Visitantes', 'Cargo', ' Cualquier visitante ajeno a la Universidad', 'Activo', NULL, '2022-09-14 15:21:17', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `punto_atencion`
--

CREATE TABLE `punto_atencion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `id_estacionamiento` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `fecha_creacion` datetime DEFAULT current_timestamp(),
  `fecha_modificacion` datetime DEFAULT current_timestamp(),
  `usuario_creacion` int(11) DEFAULT NULL,
  `usuario_modificacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `codigo` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `id_vehiculo` int(11) NOT NULL,
  `hora_ingreso` datetime NOT NULL,
  `hora_salida` datetime DEFAULT NULL,
  `id_espacio` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `fecha_creacion` datetime DEFAULT current_timestamp(),
  `fecha_modificacion` datetime DEFAULT current_timestamp(),
  `usuario_creacion` int(11) DEFAULT NULL,
  `usuario_modificacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `usuario` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `clave` varchar(500) COLLATE utf8_spanish2_ci NOT NULL,
  `genero` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `cargo` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `fecha_creacion` datetime DEFAULT current_timestamp(),
  `fecha_modificacion` datetime DEFAULT current_timestamp(),
  `usuario_creacion` int(11) DEFAULT NULL,
  `usuario_modificacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `nombre`, `clave`, `genero`, `cargo`, `estado`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES
(1, 'admin', 'Administrador del sistema', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '1FE', '1ADM', 1, '2022-12-13 18:02:11', '2022-12-13 18:02:11', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `id` int(11) NOT NULL,
  `placa` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `color` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `marca` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `tipo` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `fecha_creacion` datetime DEFAULT current_timestamp(),
  `fecha_modificacion` datetime DEFAULT current_timestamp(),
  `usuario_creacion` int(11) DEFAULT NULL,
  `usuario_modificacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `datos_factura`
--
ALTER TABLE `datos_factura`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `espacio`
--
ALTER TABLE `espacio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_estacionamiento` (`id_estacionamiento`);

--
-- Indices de la tabla `estacionamiento`
--
ALTER TABLE `estacionamiento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ticket` (`id_ticket`);

--
-- Indices de la tabla `parametro`
--
ALTER TABLE `parametro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `punto_atencion`
--
ALTER TABLE `punto_atencion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_estacionamiento` (`id_estacionamiento`);

--
-- Indices de la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_espacio` (`id_espacio`),
  ADD KEY `id_vehiculo` (`id_vehiculo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `datos_factura`
--
ALTER TABLE `datos_factura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `espacio`
--
ALTER TABLE `espacio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estacionamiento`
--
ALTER TABLE `estacionamiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `parametro`
--
ALTER TABLE `parametro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `punto_atencion`
--
ALTER TABLE `punto_atencion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `espacio`
--
ALTER TABLE `espacio`
  ADD CONSTRAINT `espacio_ibfk_1` FOREIGN KEY (`id_estacionamiento`) REFERENCES `estacionamiento` (`id`);

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`id_ticket`) REFERENCES `ticket` (`id`);

--
-- Filtros para la tabla `punto_atencion`
--
ALTER TABLE `punto_atencion`
  ADD CONSTRAINT `punto_atencion_ibfk_1` FOREIGN KEY (`id_estacionamiento`) REFERENCES `estacionamiento` (`id`);

--
-- Filtros para la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`id_espacio`) REFERENCES `espacio` (`id`),
  ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculo` (`id`);

--
-- Filtros para la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD CONSTRAINT `vehiculo_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
