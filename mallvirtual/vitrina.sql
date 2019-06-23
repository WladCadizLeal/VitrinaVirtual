-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-06-2019 a las 00:14:44
-- Versión del servidor: 10.1.40-MariaDB
-- Versión de PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `vitrina`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `creado_en` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `descripcion`, `creado_en`) VALUES
(2, 'Ropa', 'De calidad', '2019-06-23 22:00:25'),
(3, 'Pantalones', 'De calidad', '2019-06-23 22:00:35'),
(4, 'Televisores', 'De calidad', '2019-06-23 22:00:45'),
(5, 'Instrumentos', 'De calidad', '2019-06-23 22:00:54'),
(6, 'Electrodomesticos', 'De calidad', '2019-06-23 22:01:02'),
(7, 'Computadoras', 'De calidad', '2019-06-23 22:01:12'),
(8, 'Autos', 'si señol', '2019-06-23 22:08:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `locales`
--

CREATE TABLE `locales` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `sucursal_fk` int(11) NOT NULL,
  `telefono_fk` int(11) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `creado_en` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `locales`
--

INSERT INTO `locales` (`id`, `nombre`, `descripcion`, `sucursal_fk`, `telefono_fk`, `imagen`, `creado_en`) VALUES
(2, 'Mundo Joven', 'Es joven', 2, 4, 'includes/img/5d0ff77bb4af98.05246359.jpg', '2019-06-23 22:04:43'),
(3, 'Blockbuster', 'Peliculas bla bla', 2, 3, 'includes/img/5d0ff79202dc82.85508830.png', '2019-06-23 22:05:06'),
(5, 'Audiomusica', 'Instrumentos hartos', 2, 2, 'includes/img/5d0ff81d82d2b6.66196450.png', '2019-06-23 22:07:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` longblob NOT NULL,
  `creado_en` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id`, `nombre`, `descripcion`, `imagen`, `creado_en`) VALUES
(2, 'Adidas', 'Alemana', 0x696e636c756465732f696d672f35643066663665333037323962322e34353734333533352e6a7067, '2019-06-23 22:02:11'),
(3, 'Nike', 'Americana', 0x696e636c756465732f696d672f35643066663665666561636239362e36313634383933342e706e67, '2019-06-23 22:02:23'),
(4, 'Jeep', '4 ruedas', 0x696e636c756465732f696d672f35643066663730303935333064342e37393730353034382e6a7067, '2019-06-23 22:02:40'),
(5, 'Fender', 'Guitarritas', 0x696e636c756465732f696d672f35643066663731313265653863362e34343037323837302e6a7067, '2019-06-23 22:02:57'),
(6, 'Sony', 'No Phillips', 0x696e636c756465732f696d672f35643066663733303663326662362e33313335343738362e706e67, '2019-06-23 22:03:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` int(11) NOT NULL,
  `marca_fk` int(11) NOT NULL,
  `categoria_fk` int(11) NOT NULL,
  `local_fk` int(11) NOT NULL,
  `imagen` longblob NOT NULL,
  `creado_en` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `marca_fk`, `categoria_fk`, `local_fk`, `imagen`, `creado_en`) VALUES
(2, 'Guitarra Stratocaster', 'si si no no', 1990, 5, 5, 5, 0x696e636c756465732f696d672f35643066663833353361313830342e33343430323236332e6a7067, '2019-06-23 22:07:49'),
(3, 'Auto Jeep', 'si', 1230, 4, 8, 3, 0x696e636c756465732f696d672f35643066663838366537313665392e37363030353435372e6a7067, '2019-06-23 22:09:10'),
(4, 'Pantalon Nike', 'sipo', 120, 3, 2, 2, 0x696e636c756465732f696d672f35643066663863336236386634322e33343731393733352e6a7067, '2019-06-23 22:10:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_destacados`
--

CREATE TABLE `productos_destacados` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `producto_fk` int(11) NOT NULL,
  `creado_en` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos_destacados`
--

INSERT INTO `productos_destacados` (`id`, `nombre`, `producto_fk`, `creado_en`) VALUES
(1, 'OMG MIRA ESTA OFERTA 19% DESC', 4, '2019-06-23 22:10:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursales`
--

CREATE TABLE `sucursales` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `imagen` longblob NOT NULL,
  `creado_en` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sucursales`
--

INSERT INTO `sucursales` (`id`, `nombre`, `direccion`, `imagen`, `creado_en`) VALUES
(2, 'Sur', 'Es asi no?', 0x696e636c756465732f696d672f35643066663736316136396235372e31323832343037342e6a7067, '2019-06-23 22:04:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonos`
--

CREATE TABLE `telefonos` (
  `id` int(11) NOT NULL,
  `dueno` varchar(255) NOT NULL,
  `numero` varchar(255) NOT NULL,
  `creado_en` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `telefonos`
--

INSERT INTO `telefonos` (`id`, `dueno`, `numero`, `creado_en`) VALUES
(2, 'Sr. Alexis', '912345678', '2019-06-23 22:01:26'),
(3, 'Sr. Arturo', '912345689', '2019-06-23 22:01:39'),
(4, 'Sr. Alexis', '987654321', '2019-06-23 22:01:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `creado_en` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `correo`, `contrasena`, `creado_en`) VALUES
(1, 'admin', 'correo@gmail.com', '202cb962ac59075b964b07152d234b70', '2019-06-23 22:00:13');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `locales`
--
ALTER TABLE `locales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sucursal_fk` (`sucursal_fk`),
  ADD KEY `telefono_fk` (`telefono_fk`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `marca_fk` (`marca_fk`),
  ADD KEY `categoria_fk` (`categoria_fk`),
  ADD KEY `local_fk` (`local_fk`);

--
-- Indices de la tabla `productos_destacados`
--
ALTER TABLE `productos_destacados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producto_fk` (`producto_fk`);

--
-- Indices de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `telefonos`
--
ALTER TABLE `telefonos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `locales`
--
ALTER TABLE `locales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `productos_destacados`
--
ALTER TABLE `productos_destacados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `telefonos`
--
ALTER TABLE `telefonos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `locales`
--
ALTER TABLE `locales`
  ADD CONSTRAINT `locales_ibfk_1` FOREIGN KEY (`sucursal_fk`) REFERENCES `sucursales` (`id`),
  ADD CONSTRAINT `locales_ibfk_2` FOREIGN KEY (`telefono_fk`) REFERENCES `telefonos` (`id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`marca_fk`) REFERENCES `marcas` (`id`),
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`categoria_fk`) REFERENCES `categorias` (`id`),
  ADD CONSTRAINT `productos_ibfk_3` FOREIGN KEY (`local_fk`) REFERENCES `locales` (`id`);

--
-- Filtros para la tabla `productos_destacados`
--
ALTER TABLE `productos_destacados`
  ADD CONSTRAINT `productos_destacados_ibfk_1` FOREIGN KEY (`producto_fk`) REFERENCES `productos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
