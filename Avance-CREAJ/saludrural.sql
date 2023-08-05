-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-08-2023 a las 21:32:48
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `saludrural`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id` int(11) NOT NULL,
  `correo` varchar(70) NOT NULL,
  `contraseña` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id`, `correo`, `contraseña`) VALUES
(1, 'admin@gmail.com', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `hospital_id` int(11) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `contenido` text DEFAULT NULL,
  `imagen` blob DEFAULT NULL,
  `fecha_publicacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `blogs`
--

INSERT INTO `blogs` (`id`, `hospital_id`, `titulo`, `contenido`, `imagen`, `fecha_publicacion`) VALUES
(1, 5, 'dasdsa', 'dsadsads', 0x2e2e2f696d6167656e2f576861747341707020496d61676520323032332d30372d323820617420392e33302e303220504d2e6a706567, '2023-08-05 18:13:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donacion`
--

CREATE TABLE `donacion` (
  `ID` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `genero` enum('Masculino','Femenino') NOT NULL,
  `fecha` datetime NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `tarjeta` varchar(20) NOT NULL,
  `cvv` varchar(5) NOT NULL,
  `estado` enum('pendiente','aceptada','rechazada') NOT NULL DEFAULT 'pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `donacion`
--

INSERT INTO `donacion` (`ID`, `usuario_id`, `nombre`, `correo`, `telefono`, `genero`, `fecha`, `monto`, `tarjeta`, `cvv`, `estado`) VALUES
(1, 1, 'julio', 'a', '1232', 'Masculino', '2023-07-21 17:02:30', '111.00', '11', '123', 'pendiente'),
(2, 1, 'Gacha life 2', 'veterinario01@gmail.com', '11', 'Masculino', '2023-07-26 09:05:00', '111.00', '11', '11', 'pendiente'),
(3, 1, 'Gacha life 2', 'admin1@gmail.com', '2123121313', 'Masculino', '2023-07-27 14:14:00', '1.00', '111', '11111', 'pendiente'),
(4, 1, 'Gacha life 2', 'admin1@gmail.com', '2123121313', 'Masculino', '2023-07-27 14:14:00', '1.00', '111', '11111', 'pendiente'),
(5, 1, 'Gacha life 2', 'admin1@gmail.com', '2123121313', 'Masculino', '2023-07-27 14:14:00', '1.00', '111', '11111', 'pendiente'),
(6, 1, 'Gacha life 2', 'admin1@gmail.com', '2123121313', 'Masculino', '2023-07-27 14:14:00', '1.00', '111', '11111', 'pendiente'),
(7, 1, 'Gacha life 2', 'admin1@gmail.com', '2123121313', 'Masculino', '2023-07-27 14:14:00', '1.00', '111', '11111', 'pendiente'),
(8, 1, 'dsad', '123@gmail.com', '2123121313', 'Masculino', '2023-07-21 15:25:00', '6.00', '12', '12', 'pendiente'),
(9, 2, 'Julio Rodrigo', 'admiJosue@gmail.com', '149382', 'Masculino', '2023-07-24 00:00:00', '140.00', '1278394', '111', 'pendiente'),
(10, 1, 'Julio Rodrigo', 'admin1@gmail.com', '11', 'Masculino', '2023-07-27 00:00:00', '100000.00', '1278394', '1234', 'pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donaciones_insumos`
--

CREATE TABLE `donaciones_insumos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `cantidad` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `proveedor` varchar(100) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donaciones_medicamentos`
--

CREATE TABLE `donaciones_medicamentos` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `cantidad` int(11) NOT NULL,
  `medicamento` varchar(100) NOT NULL,
  `lote` varchar(50) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hospitales`
--

CREATE TABLE `hospitales` (
  `id` int(11) NOT NULL,
  `nombre` varchar(70) NOT NULL,
  `descripcion` text NOT NULL,
  `lugar` text NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `hospitales`
--

INSERT INTO `hospitales` (`id`, `nombre`, `descripcion`, `lugar`, `password`) VALUES
(1, 'adadsa', 'dasasdas', 'dsadas', ''),
(3, 'figo', 'a', 'aa', ''),
(5, 'San Rafael', 'asdasdasd', 'dasdsadas', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `id` int(11) NOT NULL,
  `nombre` varchar(70) NOT NULL,
  `apellidos` varchar(70) NOT NULL,
  `telefono` text NOT NULL,
  `correo` varchar(70) NOT NULL,
  `dui` varchar(70) NOT NULL,
  `contra` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`id`, `nombre`, `apellidos`, `telefono`, `correo`, `dui`, `contra`) VALUES
(1, 'Julio Rodrigo', 'sanchez jacinto', '76160065', 'jrsanchezjacinto@gmail.com', '20180293', '123'),
(2, 'free fire', 'sepa', '75477039', 'rodrigo07@gmail.com', '20180293', '123'),
(3, 'free fire', 'sanchez jacinto', '1231232131', 'ivorygames849@gmail.com', '20180293', '12312312'),
(4, 'julio', 'jacinto uwu', '77257482', 'elvictorcheck@gmail.com', '111111111111', '123456');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hospital_id` (`hospital_id`);

--
-- Indices de la tabla `donacion`
--
ALTER TABLE `donacion`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `donaciones_insumos`
--
ALTER TABLE `donaciones_insumos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `donaciones_medicamentos`
--
ALTER TABLE `donaciones_medicamentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `hospitales`
--
ALTER TABLE `hospitales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `donacion`
--
ALTER TABLE `donacion`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `donaciones_insumos`
--
ALTER TABLE `donaciones_insumos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `donaciones_medicamentos`
--
ALTER TABLE `donaciones_medicamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hospitales`
--
ALTER TABLE `hospitales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_ibfk_1` FOREIGN KEY (`hospital_id`) REFERENCES `hospitales` (`id`);

--
-- Filtros para la tabla `donacion`
--
ALTER TABLE `donacion`
  ADD CONSTRAINT `donacion_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `registro` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `donaciones_insumos`
--
ALTER TABLE `donaciones_insumos`
  ADD CONSTRAINT `donaciones_insumos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `registro` (`id`);

--
-- Filtros para la tabla `donaciones_medicamentos`
--
ALTER TABLE `donaciones_medicamentos`
  ADD CONSTRAINT `donaciones_medicamentos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `registro` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
