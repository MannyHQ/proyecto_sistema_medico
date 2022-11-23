-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-11-2022 a las 18:39:40
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
-- Base de datos: `consultorio_medico`
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
(1, 'HUMANO', 'SANTIAGO DE LOS CABALL', 'HUMANO@GMAIL.COM', 8295468245, b'1');

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
(2, 'ISAAC', 'ESPINAL', 40211104340, 'ISAAC@GMAIL.COM', 8292803056, 0, '11111111111', 'HUMANO', 'CARRIZAL', b'0', '1', 1000, 1000, 4857);

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
(1, 'ISAAC@GMAIL.COM');

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
  `horario` time NOT NULL,
  `status` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctor_vs_correo`
--

CREATE TABLE `doctor_vs_correo` (
  `id_doctor` bigint(20) NOT NULL,
  `id_correo` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctor_vs_telefono`
--

CREATE TABLE `doctor_vs_telefono` (
  `id_doctor` bigint(20) NOT NULL,
  `num_telefono` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'ISAAC', 'ESPINAL', 'M', '2001-08-02', '40211104340', '11111111111', 'CARRIZAL', 'A+', b'1');

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
(40211104340, 1);

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
(40211104340, 1);

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
(40211104340, 8292803056);

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
(1, 8292803056);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipo` int(11) NOT NULL,
  `nombre_tipo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  MODIFY `id_aseguradora` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id_citas` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cobertura`
--
ALTER TABLE `cobertura`
  MODIFY `id_cob` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `correo`
--
ALTER TABLE `correo`
  MODIFY `id_correo` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id_doctor` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id_factura` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `historial_medico`
--
ALTER TABLE `historial_medico`
  MODIFY `id_historial` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id_paciente` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `paciente_vs_correo`
--
ALTER TABLE `paciente_vs_correo`
  MODIFY `id_correo` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id_tel` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
