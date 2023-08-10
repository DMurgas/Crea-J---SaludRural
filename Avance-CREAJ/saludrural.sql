-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-08-2023 a las 14:21:01
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
(1, 5, 'dasdsa', 'dsadsads', 0x2e2e2f696d6167656e2f576861747341707020496d61676520323032332d30372d323820617420392e33302e303220504d2e6a706567, '2023-08-05 18:13:22'),
(2, 5, 'MESSI CAMPEON DEL MUNDO', 'MESSI', 0x2e2e2f696d6167656e2f6465736361726761202831292e6a7067, '2023-08-05 19:56:19'),
(3, 5, 'MESSI CAMPEON DEL MUNDO', 'dsadasdasdsada', 0x2e2e2f696d6167656e2f6d657373692e6a7067, '2023-08-05 19:59:07'),
(4, 5, 'EL DIBU LAS PARA TODAS', 'EL SIEMPRE LA PARADA TODAS PARA MESSI', 0x2e2e2f696d6167656e2f6d656469756d5f323032322d31322d32302d363062303365306335312e6a7067, '2023-08-05 20:00:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE `equipo` (
  `id_donacion` int(11) NOT NULL,
  `id_hospital` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `fecha` datetime NOT NULL,
  `equipo` varchar(100) NOT NULL,
  `cantidad` varchar(100) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`id_donacion`, `id_hospital`, `id_usuario`, `nombre`, `correo`, `telefono`, `fecha`, `equipo`, `cantidad`, `descripcion`) VALUES
(1, 3, 1, 'Julio Rodrigo', 'veterinario01@gmail.com', '2123121313', '2023-08-09 00:00:00', 'dsadasdas', '5', 'un juego de futbol,con plataforma multijugador para que te diviertas con todos tus amigos, y echarles muchos goles a tus contricantes');

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
(5, 'San Rafael', 'asdasdasd', 'dasdsadas', '123'),
(6, 'Julio Rodrigo', 'un jueguito de disparos', '', ''),
(7, 'free fire', 'un jueguito de disparos', '', ''),
(8, 'dsadasdas', 'dasdadasdsa', '', ''),
(9, 'Pou 2', 'un jueguito de disparos', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insumos`
--

CREATE TABLE `insumos` (
  `id_donacion` int(11) NOT NULL,
  `id_hospital` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `fecha` datetime NOT NULL,
  `insumo` varchar(100) NOT NULL,
  `cantidad` varchar(100) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `insumos`
--

INSERT INTO `insumos` (`id_donacion`, `id_hospital`, `id_usuario`, `nombre`, `correo`, `telefono`, `fecha`, `insumo`, `cantidad`, `descripcion`) VALUES
(1, 5, 1, 'Julio Rodrigo', 'admin1@gmail.com', '121321', '2023-08-09 00:00:00', '', '11111', 'un juego de aventura, en un mundo aberto para que derrotes a diferentes tipos de enemigos que encuentres en el camino, tambien tiene un modo multijugador para que difrutes con tus amigos. Desgalo y pruebalo ahora!!!'),
(2, 5, 1, 'Julio Rodrigo', 'admin1@gmail.com', '121321', '2023-08-09 00:00:00', 'sadasdas', '11111', 'un juego de aventura, en un mundo aberto para que derrotes a diferentes tipos de enemigos que encuentres en el camino, tambien tiene un modo multijugador para que difrutes con tus amigos. Desgalo y pruebalo ahora!!!');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamentos`
--

CREATE TABLE `medicamentos` (
  `id_donacion` int(11) NOT NULL,
  `id_hospital` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `fecha` datetime NOT NULL,
  `medicamento` varchar(100) NOT NULL,
  `cantidad` varchar(100) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `medicamentos`
--

INSERT INTO `medicamentos` (`id_donacion`, `id_hospital`, `id_usuario`, `nombre`, `correo`, `telefono`, `fecha`, `medicamento`, `cantidad`, `descripcion`) VALUES
(1, 5, 1, '', '', '', '0000-00-00 00:00:00', '', '', ''),
(2, 5, 1, 'dsad', 'admin1@gmail.com', '2123121313', '2023-08-31 00:00:00', 'acetaminofen', '11111', ''),
(3, 5, 1, 'dsad', 'admin1@gmail.com', '2123121313', '2023-08-31 00:00:00', 'acetaminofen', '11111', 'un juego de futbol,con plataforma multijugador para que te diviertas con todos tus amigos, y echarles muchos goles a tus contricantes'),
(4, 5, 1, 'Julio Rodrigo', 'veterinario01@gmail.com', '2123121313', '2023-08-06 00:00:00', 'sadasdas', '5', 'dsadasda');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monetaria`
--

CREATE TABLE `monetaria` (
  `id_donacion` int(11) NOT NULL,
  `id_hospital` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `fecha` datetime NOT NULL,
  `monto` varchar(100) NOT NULL,
  `tarjeta` varchar(100) NOT NULL,
  `cvv` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `monetaria`
--

INSERT INTO `monetaria` (`id_donacion`, `id_hospital`, `id_usuario`, `nombre`, `correo`, `telefono`, `fecha`, `monto`, `tarjeta`, `cvv`) VALUES
(1, 3, 1, 'dasdasd', 'admiJosue@gmail.com', '76160065', '2023-08-07 00:00:00', '-6', '123132', '321312');

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
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`id_donacion`),
  ADD KEY `id_hospital` (`id_hospital`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `hospitales`
--
ALTER TABLE `hospitales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `insumos`
--
ALTER TABLE `insumos`
  ADD PRIMARY KEY (`id_donacion`),
  ADD KEY `id_hospital` (`id_hospital`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  ADD PRIMARY KEY (`id_donacion`),
  ADD KEY `id_hospital` (`id_hospital`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `monetaria`
--
ALTER TABLE `monetaria`
  ADD PRIMARY KEY (`id_donacion`),
  ADD KEY `id_hospital` (`id_hospital`),
  ADD KEY `id_usuario` (`id_usuario`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `equipo`
--
ALTER TABLE `equipo`
  MODIFY `id_donacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `hospitales`
--
ALTER TABLE `hospitales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `insumos`
--
ALTER TABLE `insumos`
  MODIFY `id_donacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  MODIFY `id_donacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `monetaria`
--
ALTER TABLE `monetaria`
  MODIFY `id_donacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- Filtros para la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD CONSTRAINT `equipo_ibfk_1` FOREIGN KEY (`id_hospital`) REFERENCES `hospitales` (`id`),
  ADD CONSTRAINT `equipo_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `registro` (`id`);

--
-- Filtros para la tabla `insumos`
--
ALTER TABLE `insumos`
  ADD CONSTRAINT `insumos_ibfk_1` FOREIGN KEY (`id_hospital`) REFERENCES `hospitales` (`id`),
  ADD CONSTRAINT `insumos_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `registro` (`id`);

--
-- Filtros para la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  ADD CONSTRAINT `medicamentos_ibfk_1` FOREIGN KEY (`id_hospital`) REFERENCES `hospitales` (`id`),
  ADD CONSTRAINT `medicamentos_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `registro` (`id`);

--
-- Filtros para la tabla `monetaria`
--
ALTER TABLE `monetaria`
  ADD CONSTRAINT `monetaria_ibfk_1` FOREIGN KEY (`id_hospital`) REFERENCES `hospitales` (`id`),
  ADD CONSTRAINT `monetaria_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `registro` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
