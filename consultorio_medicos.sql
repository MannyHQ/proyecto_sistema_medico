-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-11-2022 a las 03:56:27
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `consultorio_medicos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aseguradora`
--

CREATE TABLE `aseguradora` (
  `id_aseguradora` bigint(20) NOT NULL,
  `nombre_aseguradora` varchar(50) NOT NULL,
  `direccion_aseguradora` varchar(50) NOT NULL,
  `correo_aseguradora` varchar(20) NOT NULL,
  `telefono` bigint(20) NOT NULL,
  `status` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `aseguradora`
--

INSERT INTO `aseguradora` (`id_aseguradora`, `nombre_aseguradora`, `direccion_aseguradora`, `correo_aseguradora`, `telefono`, `status`) VALUES
(1, 'HUMANO', 'SANTIAGO DE LOS CABALL', 'HUMANO@GMAIL.COM', 8295468245, b'1'),
(2, 'ERIKSEGURO', 'C/ ramiro', 'erikseguro@gmail.com', 8297773423, b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id_citas` bigint(20) NOT NULL,
  `id_doctor` bigint(20) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_final` datetime NOT NULL,
  `status` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cobertura`
--

CREATE TABLE `cobertura` (
  `id_cob` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `cedula` bigint(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefono` bigint(20) NOT NULL,
  `celular` bigint(20) NOT NULL,
  `ars` varchar(50) NOT NULL,
  `num_ars` varchar(50) NOT NULL,
  `direccion` varchar(70) NOT NULL,
  `status` bit(1) NOT NULL,
  `procedimiento` varchar(50) NOT NULL,
  `precio` int(11) NOT NULL,
  `cob_solicitado` int(11) NOT NULL,
  `num_autorizacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cobertura`
--

INSERT INTO `cobertura` (`id_cob`, `nombre`, `apellido`, `cedula`, `email`, `telefono`, `celular`, `ars`, `num_ars`, `direccion`, `status`, `procedimiento`, `precio`, `cob_solicitado`, `num_autorizacion`) VALUES
(1, 'ISAAC', 'ESPINAL', 40211104340, 'ISAAC@GMAIL.COM', 8292803056, 0, '11111111111', 'HUMANO', 'CARRIZAL', b'0', '2', 1000, 1000, 8159),
(2, 'ISAAC', 'ESPINAL', 40211104340, 'ISAAC@GMAIL.COM', 8292803056, 0, '11111111111', 'HUMANO', 'CARRIZAL', b'0', '1', 1000, 1000, 4857),
(3, 'ISAAC', 'ESPINAL', 40211104340, 'ISAAC@GMAIL.CO', 8292803056, 0, '11111111111', 'HUMANO', 'CARRIZAL', b'1', '', 0, 0, 0),
(4, 'ISAAC', 'ESPINAL', 40211104340, 'ISAAC@GMAIL.CO', 8292803056, 0, '11111111111', 'HUMANO', 'CARRIZAL', b'1', '', 0, 0, 0),
(5, 'ISAAC', 'ESPINAL', 40211104340, 'ISAAC@GMAIL.CO', 8292803056, 0, '11111111111', 'HUMANO', 'CARRIZAL', b'1', '', 0, 0, 0),
(6, 'ISAAC', 'ESPINAL', 40211104340, 'ISAAC@GMAIL.CO', 8292803056, 0, '11111111111', 'HUMANO', 'CARRIZAL', b'1', '', 0, 0, 0),
(7, 'ISAAC', 'ESPINAL', 40211104340, 'ISAAC@GMAIL.CO', 8292803056, 0, '11111111111', 'HUMANO', 'CARRIZAL', b'1', '', 0, 0, 0),
(8, 'ISAAC', 'ESPINAL', 40211104340, 'ISAAC@GMAIL.CO', 8292803056, 0, '11111111111', 'HUMANO', 'CARRIZAL', b'0', '1', 1000, 50, 4488),
(9, 'ISAA', 'ESPINAL', 40211104340, 'ISAAC@GMAIL.CO', 8292803056, 0, '11111111111', 'HUMANO', 'CARRIZAL', b'0', '1', 1000, 50, 1789);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correo`
--

CREATE TABLE `correo` (
  `id_correo` bigint(20) NOT NULL,
  `correo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `correo`
--

INSERT INTO `correo` (`id_correo`, `correo`) VALUES
(1, 'ISAAC@GMAIL.CO'),
(2, 'erikrdbs@gmail.com'),
(3, 'moisesbs@gmail.com'),
(4, 'margaritaromanrdbs@g'),
(5, 'PacoRabonea@gmail.co'),
(6, 'asdasd@gmail.com'),
(7, 'juanito@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_factura`
--

CREATE TABLE `detalle_factura` (
  `id_factura` bigint(20) NOT NULL,
  `precio` float NOT NULL,
  `cobertura` float NOT NULL,
  `id_proc` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctor`
--

CREATE TABLE `doctor` (
  `id_doctor` bigint(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `sexo` char(1) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `exequatur` varchar(10) NOT NULL,
  `cedula` varchar(11) NOT NULL,
  `especialidades` varchar(20) NOT NULL,
  `horario` varchar(255) NOT NULL,
  `status` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `doctor`
--

INSERT INTO `doctor` (`id_doctor`, `nombre`, `sexo`, `direccion`, `exequatur`, `cedula`, `especialidades`, `horario`, `status`) VALUES
(1, 'Erik Cruz', 'M', '601w 172st ny ny 10032 apt 6a', 'q', '4021146408', 'Fumar juka', '7AM - 3PM', b'1'),
(2, 'Moises Ortiz', 'M', 'C/ sajomas', 'aeiouz', '402114641', 'Jugar nba', '3PM - 7PM', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctor_vs_correo`
--

CREATE TABLE `doctor_vs_correo` (
  `id_doctor` bigint(20) NOT NULL,
  `id_correo` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `doctor_vs_correo`
--

INSERT INTO `doctor_vs_correo` (`id_doctor`, `id_correo`) VALUES
(4021146408, 2),
(402114641, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctor_vs_telefono`
--

CREATE TABLE `doctor_vs_telefono` (
  `id_doctor` bigint(20) NOT NULL,
  `num_telefono` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `doctor_vs_telefono`
--

INSERT INTO `doctor_vs_telefono` (`id_doctor`, `num_telefono`) VALUES
(4021146408, 8299599496),
(402114641, 8095852020);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id_factura` bigint(20) NOT NULL,
  `id_paciente` bigint(20) NOT NULL,
  `monto` float NOT NULL,
  `fecha_factura` datetime NOT NULL,
  `tipo_pago` varchar(20) NOT NULL,
  `status` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`id_factura`, `id_paciente`, `monto`, `fecha_factura`, `tipo_pago`, `status`) VALUES
(1, 40211104340, 1000, '0000-00-00 00:00:00', 'Efectivo', b'1'),
(2, 40211104340, 1000, '2022-11-29 20:15:28', 'Efectivo', b'1'),
(3, 40211104340, 1000, '2022-11-29 21:00:09', 'Efectivo', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_medico`
--

CREATE TABLE `historial_medico` (
  `id_historial` bigint(20) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `radiografia` longblob NOT NULL,
  `otros` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_vs_paciente`
--

CREATE TABLE `historial_vs_paciente` (
  `id_paciente` bigint(20) NOT NULL,
  `id_doctor` bigint(20) NOT NULL,
  `id_historial` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `id_paciente` bigint(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `sexo` char(1) NOT NULL,
  `fecha_naci` date NOT NULL,
  `cedula` char(11) NOT NULL,
  `seguro` varchar(20) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `tipo_sangre` char(2) NOT NULL,
  `status_paciente` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`id_paciente`, `nombre`, `apellido`, `sexo`, `fecha_naci`, `cedula`, `seguro`, `direccion`, `tipo_sangre`, `status_paciente`) VALUES
(1, 'ISAA', 'ESPINAL', 'M', '2001-08-02', '40211104340', '11111111111', 'CARRIZAL', 'B+', b'1'),
(2, 'Margarita', 'Roman bgggg222', 'F', '1942-02-02', '40211464101', '77', 'Santiago Rodriguez #10', 'A+', b'1'),
(3, 'Pacos', 'Rabones', 'M', '1943-06-03', '1111222345', '078', 'Calle plant', 'A+', b'1'),
(4, 'Kylian', 'Mbappe', 'M', '2006-12-12', '42742212345', '44', 'Santiago Rodriguez #10', 'A+', b'1'),
(5, 'Juanito', 'Alimana', 'M', '0000-00-00', '45678421', '22', 'Una direccion', 'A+', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente_vs_aseguradora`
--

CREATE TABLE `paciente_vs_aseguradora` (
  `id_paciente` bigint(20) NOT NULL,
  `id_aseguradora` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `paciente_vs_aseguradora`
--

INSERT INTO `paciente_vs_aseguradora` (`id_paciente`, `id_aseguradora`) VALUES
(40211104340, 1),
(40211464101, 1),
(1111222345, 1),
(42742212345, 1),
(45678421, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente_vs_correo`
--

CREATE TABLE `paciente_vs_correo` (
  `id_paciente` bigint(20) NOT NULL,
  `id_correo` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `paciente_vs_correo`
--

INSERT INTO `paciente_vs_correo` (`id_paciente`, `id_correo`) VALUES
(40211104340, 1),
(40211464101, 4),
(1111222345, 5),
(42742212345, 6),
(45678421, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente_vs_telefono`
--

CREATE TABLE `paciente_vs_telefono` (
  `id_paciente` bigint(20) NOT NULL,
  `num_telefono` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `paciente_vs_telefono`
--

INSERT INTO `paciente_vs_telefono` (`id_paciente`, `num_telefono`) VALUES
(40211104340, 8292803056),
(40211464101, 8293914438),
(1111222345, 456786422),
(42742212345, 829391443),
(45678421, 7873722223);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procedimientos`
--

CREATE TABLE `procedimientos` (
  `id_proc` int(11) NOT NULL,
  `nombre_proc` varchar(50) NOT NULL,
  `descripcion` varchar(25) NOT NULL,
  `precio_proc` float NOT NULL,
  `status` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `procedimientos`
--

INSERT INTO `procedimientos` (`id_proc`, `nombre_proc`, `descripcion`, `precio_proc`, `status`) VALUES
(1, 'Consulta', 'Consultas Gen', 1000, b'1'),
(2, 'Cirugia', 'Cirugia geee', 5000, b'0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recetas`
--

CREATE TABLE `recetas` (
  `id_receta` bigint(20) NOT NULL,
  `id_doctor` bigint(20) NOT NULL,
  `id_paciente` bigint(20) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `fecha_receta` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_medico`
--

CREATE TABLE `registro_medico` (
  `id_reg` bigint(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `cedula` bigint(20) NOT NULL,
  `celular` bigint(20) NOT NULL,
  `alergia_medic` varchar(100) NOT NULL,
  `alergia_comi` varchar(100) NOT NULL,
  `resultados` longblob NOT NULL,
  `observaciones` varchar(100) NOT NULL,
  `objeto_consulta` varchar(100) NOT NULL,
  `enfermedad` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefono`
--

CREATE TABLE `telefono` (
  `id_tel` bigint(20) NOT NULL,
  `num_telefono` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `telefono`
--

INSERT INTO `telefono` (`id_tel`, `num_telefono`) VALUES
(1, 8292803056),
(2, 8293914438),
(3, 456786422),
(4, 829391443),
(5, 7873722223),
(6, 8293914438),
(7, 7873722223);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipo` int(11) NOT NULL,
  `nombre_tipo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo`, `nombre_tipo`) VALUES
(1, 'Administrador'),
(2, 'Doctores'),
(3, 'Empleados');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `tipo_user` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `hora_entrada` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `username`, `password`, `tipo_user`, `nombre`, `apellido`, `hora_entrada`, `status`) VALUES
(0, 'kelok3rik', 'ERIKmama21', 2, 'Erik', 'Cruz', '2022-11-30 00:15:57', b'1'),
(0, 'Pedrito', '123', 1, 'Pedro', 'Jose', '0000-00-00 00:00:00', b'1'),
(0, 'Juanita', '123', 2, 'Juana', 'Roman', '0000-00-00 00:00:00', b'1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aseguradora`
--
ALTER TABLE `aseguradora`
  ADD PRIMARY KEY (`id_aseguradora`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id_citas`);

--
-- Indices de la tabla `cobertura`
--
ALTER TABLE `cobertura`
  ADD PRIMARY KEY (`id_cob`);

--
-- Indices de la tabla `correo`
--
ALTER TABLE `correo`
  ADD PRIMARY KEY (`id_correo`);

--
-- Indices de la tabla `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id_doctor`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id_factura`);

--
-- Indices de la tabla `historial_medico`
--
ALTER TABLE `historial_medico`
  ADD PRIMARY KEY (`id_historial`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id_paciente`);

--
-- Indices de la tabla `paciente_vs_correo`
--
ALTER TABLE `paciente_vs_correo`
  ADD PRIMARY KEY (`id_correo`);

--
-- Indices de la tabla `procedimientos`
--
ALTER TABLE `procedimientos`
  ADD PRIMARY KEY (`id_proc`);

--
-- Indices de la tabla `recetas`
--
ALTER TABLE `recetas`
  ADD PRIMARY KEY (`id_receta`);

--
-- Indices de la tabla `telefono`
--
ALTER TABLE `telefono`
  ADD PRIMARY KEY (`id_tel`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aseguradora`
--
ALTER TABLE `aseguradora`
  MODIFY `id_aseguradora` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id_citas` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cobertura`
--
ALTER TABLE `cobertura`
  MODIFY `id_cob` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `correo`
--
ALTER TABLE `correo`
  MODIFY `id_correo` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id_doctor` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id_factura` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `historial_medico`
--
ALTER TABLE `historial_medico`
  MODIFY `id_historial` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id_paciente` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `paciente_vs_correo`
--
ALTER TABLE `paciente_vs_correo`
  MODIFY `id_correo` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `procedimientos`
--
ALTER TABLE `procedimientos`
  MODIFY `id_proc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `recetas`
--
ALTER TABLE `recetas`
  MODIFY `id_receta` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `telefono`
--
ALTER TABLE `telefono`
  MODIFY `id_tel` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
