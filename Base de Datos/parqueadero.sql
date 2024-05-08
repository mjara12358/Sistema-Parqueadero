-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 09-05-2024 a las 01:26:48
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
-- Base de datos: `parqueadero`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id` int(5) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `celular` varchar(200) DEFAULT NULL,
  `tipoDocumento` varchar(200) DEFAULT NULL,
  `documento` varchar(200) DEFAULT NULL,
  `userName` varchar(200) DEFAULT NULL,
  `contrasena` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id`, `nombre`, `celular`, `tipoDocumento`, `documento`, `userName`, `contrasena`) VALUES
(1, 'Gerente Mario Arboleda', '3224132121', 'Cedula de Ciudadania', '12343541232', 'admin', 'admin'),
(3, 'Vigilante Guillermo', '3114235454', 'Tarjeta de Identidad', '58354184', 'vigi', 'vigi');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Empleado`
--

CREATE TABLE `Empleado` (
  `id` int(5) NOT NULL,
  `nombres` varchar(255) DEFAULT NULL,
  `apellidos` varchar(255) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `tipoDocumento` varchar(50) DEFAULT NULL,
  `numeroDocumento` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `Empleado`
--

INSERT INTO `Empleado` (`id`, `nombres`, `apellidos`, `telefono`, `tipoDocumento`, `numeroDocumento`) VALUES
(1, 'Juan', 'Almeida', '3214123232', 'Cedula de Ciudadania', '1443254324'),
(2, 'Maria', 'Risado', '3114234112', 'Tarjeta de Identidad', '1982345443'),
(3, 'Andres', 'Perez', '3115234242', 'Cedula de Ciudadania', '1723454232'),
(10, 'Gabriel', 'Quiñones', '3114213121', 'Cedula de Ciudadania', '1132143233');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Servicio`
--

CREATE TABLE `Servicio` (
  `id` int(5) NOT NULL,
  `placa` varchar(50) DEFAULT NULL,
  `empleado` varchar(100) DEFAULT NULL,
  `fechaEntrada` datetime DEFAULT NULL,
  `idTarifa` int(11) DEFAULT NULL,
  `espacio` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `Servicio`
--

INSERT INTO `Servicio` (`id`, `placa`, `empleado`, `fechaEntrada`, `idTarifa`, `espacio`) VALUES
(56, 'SDR346 id:3', 'Andres id:3', '2024-05-08 10:18:07', 2, 3000),
(57, 'HGJ87T id:2', 'Juan id:1', '2024-05-08 10:18:50', 4, 26000),
(58, 'BGH768 id:1', 'Maria id:2', '2024-05-08 17:47:05', 1, 1),
(60, 'DSR876 id:6', 'Gabriel id:10', '2024-05-08 18:18:28', 5, 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Tarifa`
--

CREATE TABLE `Tarifa` (
  `id` int(5) NOT NULL,
  `tipoTarifa` varchar(50) DEFAULT NULL,
  `valorHora` decimal(10,2) DEFAULT NULL,
  `tipoVehiculo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `Tarifa`
--

INSERT INTO `Tarifa` (`id`, `tipoTarifa`, `valorHora`, `tipoVehiculo`) VALUES
(1, 'Automovil Dias de Semana', 4000.00, 'Automovil'),
(2, 'Motocicleta Dias de Semana', 2500.00, 'Motocicleta'),
(3, 'Automovil Festivo', 5000.00, 'Automovil '),
(4, 'Motocicleta Festivos', 3000.00, 'Motocicleta'),
(5, 'Lunes ', 3500.00, 'Moto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Ticket`
--

CREATE TABLE `Ticket` (
  `id` int(5) NOT NULL,
  `placa` varchar(50) DEFAULT NULL,
  `tipoVehiculo` varchar(50) DEFAULT NULL,
  `empleado` varchar(255) DEFAULT NULL,
  `documento` varchar(100) DEFAULT NULL,
  `fechaEntrada` datetime DEFAULT NULL,
  `fechaSalida` datetime DEFAULT NULL,
  `tarifa` varchar(255) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `Ticket`
--

INSERT INTO `Ticket` (`id`, `placa`, `tipoVehiculo`, `empleado`, `documento`, `fechaEntrada`, `fechaSalida`, `tarifa`, `total`) VALUES
(1, 'HGJ87T', 'Motocicleta', 'Juan', '1443254324', '2023-11-14 22:41:45', '2023-11-14 23:40:27', 'Automovil Dias de Semana', 3914.08),
(3, 'SDR346', 'Moto', 'Andre', '333333', '2023-11-16 09:01:18', '2023-11-16 09:02:35', 'Lunes ', 75.47),
(4, 'BGH768', 'Automovil', 'Maria', '1982345443', '2023-11-16 09:18:21', '2023-11-16 09:19:15', 'Automovil Dias de Semana', 60.41),
(6, 'BGH768', 'Automovil', 'Maria', '1982345443', '2023-11-16 12:41:27', '2024-04-26 16:55:34', 'Automovil Dias de Semana', 15568941.33),
(7, 'BIG-773', 'Automóvil ', 'Maria', '1982345443', '2024-04-26 16:57:15', '2024-05-07 17:29:22', 'Lunes ', 925874.30),
(8, 'BIG-773', 'Automóvil ', 'Maria', '1982345443', '2024-05-07 17:39:38', '2024-05-07 17:40:15', 'Automovil Dias de Semana', 41.67),
(9, 'HGJ87T', 'Motocicleta', 'Juan', '1443254324', '2024-05-07 17:41:39', '2024-05-07 19:08:10', 'Motocicleta Festivos', 4325.88),
(10, 'HGJ87T', 'Motocicleta', 'Juan', '1443254324', '2024-05-07 17:40:45', '2024-05-07 19:08:12', 'Motocicleta Festivos', 4372.83);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Vehiculo`
--

CREATE TABLE `Vehiculo` (
  `id` int(5) NOT NULL,
  `placa` varchar(20) DEFAULT NULL,
  `tipoVehiculo` varchar(50) DEFAULT NULL,
  `idEmpleado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `Vehiculo`
--

INSERT INTO `Vehiculo` (`id`, `placa`, `tipoVehiculo`, `idEmpleado`) VALUES
(1, 'BGH768', 'Automovil', 2),
(2, 'HGJ87T', 'Motocicleta', 1),
(3, 'SDR346', 'Motocicleta', 3),
(5, 'BIG773', 'Automóvil ', 2),
(6, 'DSR876', 'Automóvil', 10);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Empleado`
--
ALTER TABLE `Empleado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Servicio`
--
ALTER TABLE `Servicio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idTarifa` (`idTarifa`);

--
-- Indices de la tabla `Tarifa`
--
ALTER TABLE `Tarifa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Ticket`
--
ALTER TABLE `Ticket`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Vehiculo`
--
ALTER TABLE `Vehiculo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idEmpleado` (`idEmpleado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `Empleado`
--
ALTER TABLE `Empleado`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `Servicio`
--
ALTER TABLE `Servicio`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `Tarifa`
--
ALTER TABLE `Tarifa`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `Ticket`
--
ALTER TABLE `Ticket`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `Vehiculo`
--
ALTER TABLE `Vehiculo`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Servicio`
--
ALTER TABLE `Servicio`
  ADD CONSTRAINT `servicio_ibfk_1` FOREIGN KEY (`idTarifa`) REFERENCES `Tarifa` (`id`);

--
-- Filtros para la tabla `Vehiculo`
--
ALTER TABLE `Vehiculo`
  ADD CONSTRAINT `vehiculo_ibfk_1` FOREIGN KEY (`idEmpleado`) REFERENCES `Empleado` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
