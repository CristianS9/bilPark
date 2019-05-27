-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-05-2019 a las 05:13:23
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bilpark`
--
CREATE DATABASE IF NOT EXISTS `bilpark` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bilpark`;

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `spGetAparcamiento`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spGetAparcamiento` (IN `iId` INT(50))  NO SQL
BEGIN
	SELECT 
    	aparcamientos.id,
        aparcamientos.nombre,
		zonas.id AS zona,
        aparcamientos.precio,
        aparcamientos.plazasTotales,
        aparcamientos.posX,
        aparcamientos.posY
	FROM aparcamientos

    INNER JOIN zonas ON aparcamientos.zona=zonas.id
    WHERE aparcamientos.id = iId;
    

END$$

DROP PROCEDURE IF EXISTS `spGetAparcamientos`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spGetAparcamientos` ()  NO SQL
BEGIN
	SELECT 
    	aparcamientos.id,
        aparcamientos.nombre,
		zonas.id AS zona,
        aparcamientos.precio,
        aparcamientos.plazasTotales,
        aparcamientos.posX,
        aparcamientos.posY
	FROM aparcamientos
    INNER JOIN zonas ON aparcamientos.zona=zonas.id;
    

END$$

DROP PROCEDURE IF EXISTS `spGetReservasUsuario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spGetReservasUsuario` (IN `iId` INT(50))  NO SQL
BEGIN
	
    SELECT reservas.id,
    	aparcamientos.nombre as aparcamiento,
        zonas.zona,
        reservas.hora_entrada,
        reservas.hora_salida,
        reservas.fecha
     FROM reservas
     INNER JOIN aparcamientos ON aparcamientos.id = reservas.aparcamiento
     INNER JOIN zonas ON aparcamientos.zona = zonas.id
	WHERE reservas.usuario = iId;
END$$

DROP PROCEDURE IF EXISTS `spNuevoAparcamiento`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spNuevoAparcamiento` (IN `iNombre` VARCHAR(255), IN `iPrecio` DECIMAL(10,2), IN `iNumPlazas` INT(50), IN `iZona` INT(50), IN `iPosX` DECIMAL(10,2), IN `iPosY` DECIMAL(10,2))  NO SQL
BEGIN
	INSERT INTO aparcamientos(nombre,precio,plazasTotales,zona,posX,posY)
    VALUES(iNombre,iPrecio,iNumPlazas,iZona,iPosX,iPosY);
    SELECT * FROM aparcamientos WHERE id=LAST_INSERT_ID();

END$$

DROP PROCEDURE IF EXISTS `spPlazasDisponibles`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spPlazasDisponibles` (IN `iNum` INT(50), IN `iHoraInicio` DATETIME, IN `iAparcamiento` INT(50))  NO SQL
BEGIN 
set @num = iNum;
SET @resultado = "<aa>";
SET @hora_inicio = iHoraInicio;
SET @hora_fin =  DATE_ADD(@hora_inicio,INTERVAL 30 HOUR_MINUTE);
SET @cantidad = 0;
SET @limite = 0;

-- Query para pillar el limite de plazas del aparcamiento
SELECT plazasTotales 
	INTO @limite 
    FROM aparcamientos 
    WHERE id=iAparcamiento;
    
 -- Añadir el limite al resultado
 SET @resultado = CONCAT(@resultado,@limite,"<aa>");

WHILE @num > 0 DO
	-- Query que devuelve la cantidad reservas para dihca media hora
	SELECT COUNT(id) INTO @cantidad 
    	FROM reservas 
    	WHERE
        	(reservas.hora_entrada<=@hora_inicio
        	AND reservas.hora_salida>@hora_inicio)
        	AND reservas.aparcamiento=iAparcamiento;
        
    -- Añadir la cantidad al resultado
	SET @resultado = CONCAT(@resultado,@cantidad,"<aa>");
    
    -- Preparar Valores para la siguiente vuelta
    SET @num = @num -1;
    SET @hora_inicio = DATE_ADD(@hora_inicio,INTERVAL 30 HOUR_MINUTE);
    
END WHILE;
	-- Devolver el resultado
	SELECT @resultado as string;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aparcamientos`
--

DROP TABLE IF EXISTS `aparcamientos`;
CREATE TABLE `aparcamientos` (
  `id` int(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `zona` int(255) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `plazasTotales` int(255) DEFAULT NULL,
  `posX` decimal(10,2) UNSIGNED NOT NULL,
  `posY` decimal(10,2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `aparcamientos`
--

INSERT INTO `aparcamientos` (`id`, `nombre`, `zona`, `precio`, `plazasTotales`, `posX`, `posY`) VALUES
(20, 'Teófilo Guiard', 2, '1.80', 1002, '55.76', '73.53'),
(21, 'Basterra', 2, '2.30', 224, '29.25', '68.16'),
(22, 'Plaza Euskadi', 2, '2.40', 405, '61.98', '35.78'),
(23, 'Aparcamiento Francia', 2, '1.60', 254, '78.85', '67.32'),
(24, 'Zubiarte', 2, '1.40', 1200, '37.58', '22.52'),
(25, 'Alameda Mazarredo ', 2, '2.80', 198, '83.67', '24.87'),
(26, 'Aparcamiento Hospital IMQ-Zorrotzaurre', 1, '1.60', 302, '34.47', '67.15'),
(27, 'Polideportivo de Deusto', 1, '2.05', 66, '69.71', '66.65'),
(28, 'Plaza San Pedro I', 1, '1.50', 255, '79.35', '37.45'),
(29, 'Sarriko', 1, '1.30', 180, '24.93', '8.76'),
(30, 'Plaza Furicular', 4, '1.20', 280, '35.88', '34.10'),
(31, 'Travesía Ciudad Jardín', 4, '1.14', 217, '54.15', '23.70'),
(32, 'Plaza del Gas', 4, '1.80', 566, '56.66', '95.84'),
(33, 'Campa de Las Piedritas', 4, '1.60', 249, '74.63', '81.24'),
(34, 'Pio Baroja', 5, '1.42', 123, '66.30', '52.22'),
(35, 'Plaza Jado', 5, '2.05', 275, '30.15', '57.08'),
(36, 'Escolapios', 5, '1.95', 187, '29.85', '39.80'),
(37, 'Arenal', 6, '1.68', 468, '28.11', '30.37'),
(38, 'Plaza Nueva', 6, '1.99', 423, '30.62', '52.18'),
(39, 'Camino del Polvorín', 6, '1.34', 532, '52.01', '41.28'),
(40, 'Prim-Dolaretxe', 6, '1.60', 74, '45.98', '65.44'),
(41, 'Plaza Zumarraga', 6, '1.76', 317, '39.46', '84.40'),
(42, 'Realizar otra búsquedaVía Vieja de Lezama', 7, '0.89', 167, '37.45', '28.19'),
(43, 'Jardines Garai', 8, '1.12', 258, '41.37', '52.68'),
(44, 'Ugarte', 8, '1.05', 97, '69.98', '54.19'),
(45, 'Cocherito de Bilbao', 9, '1.14', 364, '40.96', '77.18'),
(46, 'Iturriaga', 9, '1.22', 282, '35.44', '46.64'),
(47, 'Calle Carmelo', 10, '1.40', 159, '62.85', '38.42'),
(48, 'El Carmelo', 10, '1.20', 315, '48.59', '45.64'),
(49, 'Casa Grúa (Particular de Allende)', 10, '1.55', 389, '49.80', '54.36'),
(50, 'Parque Encarnación', 10, '1.63', 133, '17.77', '43.29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rangos`
--

DROP TABLE IF EXISTS `rangos`;
CREATE TABLE `rangos` (
  `id` int(50) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rangos`
--

INSERT INTO `rangos` (`id`, `nombre`) VALUES
(1, 'Usuario'),
(2, 'Administrador'),
(3, 'Dueño');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

DROP TABLE IF EXISTS `reservas`;
CREATE TABLE `reservas` (
  `id` int(255) NOT NULL,
  `aparcamiento` int(255) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `hora_entrada` datetime DEFAULT NULL,
  `hora_salida` datetime DEFAULT NULL,
  `usuario` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id`, `aparcamiento`, `fecha`, `hora_entrada`, `hora_salida`, `usuario`) VALUES
(1, 25, '2019-05-26 21:49:24', '1899-12-31 04:30:00', '1899-12-31 05:30:00', 10),
(2, 25, '2019-05-26 21:53:00', '1899-12-31 03:30:00', '1899-12-31 06:00:00', 10),
(3, 25, '2019-05-26 23:41:15', '1899-12-31 01:00:00', '1899-12-31 01:30:00', 10),
(4, 29, '2019-05-26 23:43:53', '1899-12-31 01:00:00', '1899-12-31 01:30:00', 10),
(5, 24, '2019-05-26 23:45:43', '1899-12-31 01:00:00', '1899-12-31 03:00:00', 10),
(6, 24, '2019-05-27 00:17:10', '1899-12-31 01:00:00', '1899-12-31 01:30:00', 10),
(7, 30, '2019-05-27 00:17:31', '1899-12-31 02:30:00', '1899-12-31 09:00:00', 10),
(8, 36, '2019-05-27 00:35:17', '1899-12-31 01:00:00', '1899-12-31 01:30:00', 10),
(9, 31, '2019-05-27 00:41:23', '1899-12-31 01:00:00', '1899-12-31 01:30:00', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellidos` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `rango` int(50) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `nombre`, `apellidos`, `email`, `contrasena`, `telefono`, `rango`) VALUES
(10, 'Cristian', 'Cristian', 'Siroca', 'cristisiroca@hotmail.es', '$2y$10$GVxnvQtinqHNxyk8AlpLfukyxUq5cZehDxso3obFvaJR7q8w7noHe', '661184318', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zonas`
--

DROP TABLE IF EXISTS `zonas`;
CREATE TABLE `zonas` (
  `id` int(255) NOT NULL,
  `zona` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `zonas`
--

INSERT INTO `zonas` (`id`, `zona`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14),
(15, 15),
(16, 16);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aparcamientos`
--
ALTER TABLE `aparcamientos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_aparcamiento_zona` (`zona`);

--
-- Indices de la tabla `rangos`
--
ALTER TABLE `rangos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_reserva_aparcamiento` (`aparcamiento`),
  ADD KEY `fk_reserva_usuario` (`usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fp_usuarios_rangos` (`rango`);

--
-- Indices de la tabla `zonas`
--
ALTER TABLE `zonas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aparcamientos`
--
ALTER TABLE `aparcamientos`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `rangos`
--
ALTER TABLE `rangos`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `zonas`
--
ALTER TABLE `zonas`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aparcamientos`
--
ALTER TABLE `aparcamientos`
  ADD CONSTRAINT `fk_aparcamiento_zona` FOREIGN KEY (`zona`) REFERENCES `zonas` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `fk_reserva_aparcamiento` FOREIGN KEY (`aparcamiento`) REFERENCES `aparcamientos` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_reserva_usuario` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fp_usuarios_rangos` FOREIGN KEY (`rango`) REFERENCES `rangos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
