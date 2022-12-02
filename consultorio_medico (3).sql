-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-12-2022 a las 00:45:21
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
  `telefono` varchar(20) NOT NULL,
  `status` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `aseguradora`
--

INSERT INTO `aseguradora` (`id_aseguradora`, `nombre_aseguradora`, `direccion_aseguradora`, `correo_aseguradora`, `telefono`, `status`) VALUES
(1, 'HUMANO', 'CALLE 20 VILLA PROGRESO', 'humano@gmaiul.com', '829-897-5241', b'1'),
(2, 'PALIC', 'Santo Domingo Este', 'palic@gmail.com', '849-574-6985', b'1'),
(3, 'UNIVERSAL', 'PUERTO PLATA', 'universal@hotmail.co', '809-875-9632', b'1'),
(4, 'H', 'LLLLLLLLDDDD', 'DD@F', '5252525', b'1'),
(5, 'HUMANO', 'JJJJJJJJJJJJ', 'DDD@JJ', '50505', b'1'),
(6, 'HUMANO', 'JJJJJJJJJJJ', 'DDDD@dd', '88888', b'1');

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
(1, 'ISAAC', 'ESPINAL', 40211104340, 'isaacespinal.iee@gmail.com', 8292803056, 0, '789654123', 'HUMANO', 'SAJOMA', b'0', '1', 2000, 500, 4465),
(2, 'ISAAC', 'ESPINAL', 40211104340, 'isaacespinal.iee@gmail.com', 8292803056, 0, '789654123', 'HUMANO', 'SAJOMA', b'0', '1', 2000, 500, 6206),
(3, 'ISAAC', 'ESPINAL', 40211104340, 'isaacespinal.iee@gmail.com', 829, 0, '789654123', 'HUMANO', 'SAJOMA', b'0', '2', 5000, 5000, 4782),
(4, 'ISAAC', 'ESPINAL', 40211104340, 'isaacespinal.iee@gmail.com', 829, 0, '789654123', 'HUMANO', 'SAJOMA', b'0', '1', 2000, 444, 4105),
(5, 'ISAAC', 'ESPINAL', 40211104340, 'isaacespinal.iee@gmail.com', 829, 0, '789654123', 'HUMANO', 'SAJOMA', b'0', '2', 5000, 444, 5829),
(6, 'ISAAC', 'ESPINAL', 40211104340, 'isaacespinal.iee@gmail.com', 829, 0, '789654123', 'HUMANO', 'SAJOMA', b'0', '1', 2000, 2333, 3188),
(7, 'ISAAC', 'ESPINAL', 40211104340, 'isaacespinal.iee@gmail.com', 829, 0, '789654123', 'HUMANO', 'SAJOMA', b'0', '2', 5000, 55, 2981),
(8, 'ISAAC', 'ESPINAL', 40211104340, 'isaacespinal.iee@gmail.com', 829, 0, '789654123', 'HUMANO', 'SAJOMA', b'0', 'CIRUGIA', 5000, 5000, 1066),
(9, 'ISAAC', 'ESPINAL', 40211104340, 'isaacespinal.iee@gmail.com', 829, 0, '789654123', 'HUMANO', 'SAJOMA', b'0', 'CIRUGIA', 5000, 5000, 7783);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correo`
--

CREATE TABLE `correo` (
  `id_correo` bigint(20) NOT NULL,
  `correo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `correo`
--

INSERT INTO `correo` (`id_correo`, `correo`) VALUES
(1, 'isaacespinal.iee@gmail.com'),
(2, 'ilpcarlos06@hotmail.com'),
(3, 'marcosg@gmail.com');

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

--
-- Volcado de datos para la tabla `doctor`
--

INSERT INTO `doctor` (`id_doctor`, `nombre`, `sexo`, `direccion`, `exequatur`, `cedula`, `especialidades`, `horario`, `status`) VALUES
(1, 'jjjj', 'M', 'shdhdhhdhd', 'ddddd', '11111111111', 'sssssssss', '00:00:30', b'1'),
(2, 'MARCOS GARCIA', 'M', 'San Pedro', '1000', '50246578982', 'Urologia', '00:00:07', b'1');

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
(50246578982, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctor_vs_telefono`
--

CREATE TABLE `doctor_vs_telefono` (
  `id_doctor` bigint(20) NOT NULL,
  `num_telefono` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `doctor_vs_telefono`
--

INSERT INTO `doctor_vs_telefono` (`id_doctor`, `num_telefono`) VALUES
(50246578982, '809-045-6698');

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
  `cedula` bigint(20) NOT NULL,
  `seguro` varchar(20) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `tipo_sangre` char(2) NOT NULL,
  `status_paciente` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`id_paciente`, `nombre`, `apellido`, `sexo`, `fecha_naci`, `cedula`, `seguro`, `direccion`, `tipo_sangre`, `status_paciente`) VALUES
(1, 'ISAAC', 'ESPINAL', 'M', '2001-03-28', 40211104340, '789654123', 'SAJOMA', 'A+', b'1'),
(2, 'CARLOS', 'DE JESUS', 'M', '1997-06-16', 40209236567, '1001930329300', 'Santiago Jrdines Del Rey', 'A+', b'1');

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
(40209236567, 1);

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
(40209236567, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente_vs_telefono`
--

CREATE TABLE `paciente_vs_telefono` (
  `id_paciente` bigint(20) NOT NULL,
  `num_telefono` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `paciente_vs_telefono`
--

INSERT INTO `paciente_vs_telefono` (`id_paciente`, `num_telefono`) VALUES
(40211104340, '829-280-3056'),
(40209236567, '829-456-1816');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procedimientos`
--

CREATE TABLE `procedimientos` (
  `id_proc` int(11) NOT NULL,
  `nombre_proc` varchar(50) NOT NULL,
  `descripcion` varchar(25) NOT NULL,
  `precio_proc` float(10,0) NOT NULL,
  `status` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `procedimientos`
--

INSERT INTO `procedimientos` (`id_proc`, `nombre_proc`, `descripcion`, `precio_proc`, `status`) VALUES
(1, 'CONSULTA GENERAL', 'CONSULTA GENE', 2000, b'1'),
(2, 'CIRUGIA', 'CIRUGIA', 5000, b'1');

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
  `num_telefono` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `telefono`
--

INSERT INTO `telefono` (`id_tel`, `num_telefono`) VALUES
(1, '829'),
(2, '809-045-6698'),
(3, '809');

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
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `username`, `password`, `tipo_user`, `nombre`, `apellido`, `hora_entrada`, `status`) VALUES
(1, 'isaac', 'isaac', 1, 'isaac', 'isaac', '2022-11-17 20:42:17', b'1');

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
  MODIFY `id_aseguradora` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id_correo` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id_doctor` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id_paciente` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `paciente_vs_correo`
--
ALTER TABLE `paciente_vs_correo`
  MODIFY `id_correo` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id_tel` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
