-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-06-2019 a las 23:36:18
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
  `nombre` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `creado_en` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `descripcion`, `creado_en`) VALUES
(1, 'Tecnologia', 'Desde televisores, audio y musica hasta telefonia y computacion.', '2019-06-30 19:42:53'),
(3, 'Deporte y aventura', 'Desde zapatillas y ropa deportiva, hasta camping y tiempo libre.', '2019-06-30 19:44:59'),
(4, 'Zapatos', 'Desde calzados masculinos y femeninos, en todas las variedades.', '2019-06-30 19:45:55'),
(6, 'Moda hombre', 'Incluye tops y chaquetas, ademas de jeans y pantalones entre otros.', '2019-06-30 19:46:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `locales`
--

CREATE TABLE `locales` (
  `id` int(11) NOT NULL,
  `nombre` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `sucursal_fk` int(11) NOT NULL,
  `telefono_fk` int(11) NOT NULL,
  `imagen` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `creado_en` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `locales`
--

INSERT INTO `locales` (`id`, `nombre`, `descripcion`, `sucursal_fk`, `telefono_fk`, `imagen`, `creado_en`) VALUES
(1, 'Mundo Joven', 'Mundo Joven Outdoor Way, es una tienda especializada en indumentaria outdoor para todo tipo de actividades al aire libre.', 1, 1, 'includes/img/5d1915a59f7b54.23402023.jpg', '2019-06-30 20:03:49'),
(2, 'Local Ejemplo', 'Tipo de establecimiento comercial, físico o virtual, donde el comprador puede adquirir tanto bienes como servicios a cambio de dinero.​', 1, 2, 'includes/img/5d191d7be901f0.65468687.jpg', '2019-06-30 20:37:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `imagen` longblob NOT NULL,
  `creado_en` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id`, `nombre`, `descripcion`, `imagen`, `creado_en`) VALUES
(1, 'Acer', 'Es una empresa taiwanesa fabricante de computadoras y productos informáticos.', 0x696e636c756465732f696d672f35643139313362393635613939372e33353837333831382e706e67, '2019-06-30 19:55:37'),
(3, 'Lg', 'Es una de las mayores empresas de electrónica de consumo del mundo. Desarrolla avances tecnológicos en electrónica, comunicaciones móviles y electrodomésticos.', 0x696e636c756465732f696d672f35643139313430616333626662382e36373534313230392e6a706567, '2019-06-30 19:56:58'),
(5, 'Samsung', 'Se trata del mayor grupo empresarial surcoreano, con numerosas filiales que abarcan negocios como la electrónica de consumo y tecnologias.', 0x696e636c756465732f696d672f35643139313437393635633339312e39323632333031372e6a7067, '2019-06-30 19:58:49'),
(6, 'Philips', 'Es una de las empresas de tecnología más grandes e importantes del mundo.', 0x696e636c756465732f696d672f35643139313439343730303662302e36313630353930352e706e67, '2019-06-30 19:59:16'),
(7, 'Under Armour', 'Es una empresa estadounidense de ropa y accesorios deportivos. La compañía vende ropa deportiva y de vestimenta informal.​', 0x696e636c756465732f696d672f35643139316539343836613364372e32313330323339352e6a7067, '2019-06-30 20:41:56'),
(8, 'Adidas', 'Adidas es una compañía multinacional alemana fundada en 1949 dedicada a la fabricación de calzado, ropa deportiva y otros productos.', 0x696e636c756465732f696d672f35643139316562376135323232332e35353033303932392e6a7067, '2019-06-30 20:42:31'),
(9, 'Nike', 'Nike, Inc.​ es una empresa multinacional estadounidense dedicada al diseño, desarrollo, fabricación y comercialización de balones, calzado, ropa, equipo, accesorios y otros artículos deportivos.', 0x696e636c756465732f696d672f35643139316565336466613834352e38383031343234352e6a7067, '2019-06-30 20:43:15'),
(10, 'Puma', 'Puma SE es una empresa alemana fabricante de accesorios, ropa y calzado deportivo, cuya sede central está en Herzogenaurach, Alemania. ', 0x696e636c756465732f696d672f35643139316631316432633063302e35353133373530342e6a7067, '2019-06-30 20:44:01'),
(11, 'New Balance', 'Es un fabricante norteamericano de calzado deportivo, textil y accesorios con sede en Boston.', 0x696e636c756465732f696d672f35643139323332613938633037322e35363637303139332e6a7067, '2019-06-30 21:01:30'),
(12, 'Converse', 'Converse es una compañía estadounidense de ropa y calzado fundada en 1900 por Marquis Harpper Converse en San Francisco, California, Estados Unidos.', 0x696e636c756465732f696d672f35643139323334333031646562372e39363434383438322e706e67, '2019-06-30 21:01:55'),
(13, 'Lee', 'Lee es una marca de ropa vaquera fundada en Salina, Kansas en 1889. ', 0x696e636c756465732f696d672f35643139323736396532646336392e39333438373332312e706e67, '2019-06-30 21:19:37'),
(14, 'Pepe Jeans', 'Pepe Jeans London es una empresa de ropa de ocio europea presente en numerosos países. ', 0x696e636c756465732f696d672f35643139323738363131656363362e36333236383739372e6a7067, '2019-06-30 21:20:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `precio` int(11) NOT NULL,
  `marca_fk` int(11) NOT NULL,
  `categoria_fk` int(11) NOT NULL,
  `local_fk` int(11) NOT NULL,
  `destacado` int(11) DEFAULT NULL,
  `imagen` longblob NOT NULL,
  `creado_en` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `marca_fk`, `categoria_fk`, `local_fk`, `destacado`, `imagen`, `creado_en`) VALUES
(1, 'LED LG 55UK6350 55\"', 'Alta resolución para una imagen nítida.', 339990, 3, 1, 1, 1, 0x696e636c756465732f696d672f35643139313637366130323330302e33383930373035332e6a7067, '2019-06-30 20:07:18'),
(2, 'LED SAMSUNG UN50NU7095 50”', 'Maravilla tus espacios con los colores, el sonido y la definición perfecta del LED Samsung Ultra HD UN50NU7095 Smart TV de 50”.', 269990, 5, 1, 1, 0, 0x696e636c756465732f696d672f35643139313863366139333037362e32323430313639322e6a7067, '2019-06-30 20:11:09'),
(3, 'SAMSUNG A7 6\" DORADO', 'Gracias a su avanzada cámara triple captura fotos más brillantes (F1.7), disfruta la modalidad Ultra Gran Angular o aprovecha el enfoque dinámico y así tus fotografías podrán revelar mucho más del mundo que te rodea.', 239990, 5, 1, 1, 1, 0x696e636c756465732f696d672f35643139316135633235303462332e36323137353535312e6a7067, '2019-06-30 20:23:56'),
(4, 'ACER ASPIRE 3 A315-53', 'Con un diseño elegante y fácil de llevar, el Aspire 3 incorpora una pantalla de 15,6 pulgadas HD con tecnología Acer BluelightShield™ que filtra la molesta luz azul de la pantalla para reducir la fatiga ocular durante usos prolongados.', 339990, 1, 1, 1, 0, 0x696e636c756465732f696d672f35643139316237373062616634332e33343239303234302e6a7067, '2019-06-30 20:28:39'),
(5, 'JOCKEY ADIDAS 6 PANEL CAP', 'Entrena al aire libre con esta gorra de seis paneles Adidas. Incorpora una banda transpirable alrededor de la frente con tecnología Climalite que expulsa el sudor de la piel.', 7990, 8, 3, 1, 1, 0x696e636c756465732f696d672f35643139316663633232306337392e34333639373233372e6a7067, '2019-06-30 20:47:08'),
(6, ' MOCHILA NIKE BRASILIA', 'Prueba la mochila de entrenamiento Nike en su modelo Brasilia. Perfecto artículo para trasladar tus pertenencias a entrenamientos y desafíos físicos. ', 15990, 9, 3, 1, 0, 0x696e636c756465732f696d672f35643139323033366164666162302e31333934393639362e6a7067, '2019-06-30 20:48:54'),
(7, 'BALÓN UNDER ARMOUR UC', 'Para los fanáticos del Club Universidad Católica, Under Armour trae el nuevo diseño para tus tardes deportivas entre amigos. ', 16990, 7, 3, 2, 1, 0x696e636c756465732f696d672f35643139323130656538303835342e30393635373730362e6a7067, '2019-06-30 20:51:00'),
(8, 'POLERON PUMA SPORT BLOC 838311-40', 'El polerón Puma te otorgará máxima cobertura en todo momento. Creado para uso diario o cualquier entrenamiento que se presente.', 19990, 10, 3, 2, 0, 0x696e636c756465732f696d672f35643139323161643632623662322e30383834313933342e6a7067, '2019-06-30 20:55:09'),
(9, 'ZAPATILLA ADIDAS TERREX EASTRAIL BC0975', 'Sigue tu camino con las Zapatillas Adidas Terrex Eastrail. Estos zapatos para excursionismo están diseñados para brindar una sensación de estabilidad y una tracción segura en terrenos húmedos e irregulares. ', 39990, 8, 4, 1, 1, 0x696e636c756465732f696d672f35643139323437373263656562382e36343632383735332e6a7067, '2019-06-30 21:07:03'),
(10, ' ZAPATILLA NIKE DELFINE ZAPATILLA NIKE DELFINE', 'Nike Delfine es una combinación superior que se mantiene fiel a sus raíces de los años 90.', 42990, 9, 4, 1, 0, 0x696e636c756465732f696d672f35643139323532623635373130342e39393935393431352e6a7067, '2019-06-30 21:10:03'),
(11, 'ZAPATILLA CONVERSE CHUCK TAYLOR ALL STAR STREET', 'Conquista la ciudad con un look urbano de alto calibre con la clásica zapatilla Converse Chuck Taylor All Star Street.', 31990, 12, 4, 2, 1, 0x696e636c756465732f696d672f35643139323562653537306566342e30363835343333352e6a7067, '2019-06-30 21:12:30'),
(12, 'ZAPATILLA NEW BALANCE GM500NAB', 'ZAPATILLA NEW BALANCE GM500NAB', 34990, 11, 4, 2, 0, 0x696e636c756465732f696d672f35643139323636393861613732312e35373636363731392e6a7067, '2019-06-30 21:15:21'),
(13, 'POLERA ADIDAS', 'POLERA ADIDAS', 14990, 8, 6, 1, 1, 0x696e636c756465732f696d672f35643139323765643236346565362e38333131353436302e6a7067, '2019-06-30 21:21:49'),
(14, ' POLERON NIKE CLUB Q1 804389-323 POLERON NIKE CLUB Q1 804389-323', 'El polerón con capucha para hombre Nike Sportswear te aporta comodidad acolchada sin agregar volumen. Confeccionada con una suave tela de friza, incluye un dobladillo y puños entallados y modernos para lograr un estilo impecable.', 27990, 9, 6, 1, 0, 0x696e636c756465732f696d672f35643139323861343633666434372e35303134383339322e6a7067, '2019-06-30 21:24:52'),
(15, 'JEANS LEE', 'JEANS LEE', 24990, 13, 6, 2, 1, 0x696e636c756465732f696d672f35643139323930646339336230382e38333638363135332e6a7067, '2019-06-30 21:26:37'),
(16, 'JEANS PEPE JEANS', 'En Pepe Kids somos una marca inglesa que desde 1973 ofrecemos todo tipo de tallas, además de una gran variedad de estilos y colores para vestuario teens. ', 11890, 14, 6, 2, 0, 0x696e636c756465732f696d672f35643139323939353364343835342e37303237333138322e6a7067, '2019-06-30 21:28:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursales`
--

CREATE TABLE `sucursales` (
  `id` int(11) NOT NULL,
  `nombre` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `imagen` longblob NOT NULL,
  `creado_en` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `sucursales`
--

INSERT INTO `sucursales` (`id`, `nombre`, `direccion`, `imagen`, `creado_en`) VALUES
(1, 'Sur', 'Calle hogar, 123', 0x696e636c756465732f696d672f35643139313533613232353162392e32333239333135382e6a7067, '2019-06-30 20:02:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonos`
--

CREATE TABLE `telefonos` (
  `id` int(11) NOT NULL,
  `dueno` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `numero` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `creado_en` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `telefonos`
--

INSERT INTO `telefonos` (`id`, `dueno`, `numero`, `creado_en`) VALUES
(1, 'Admin', '912345678', '2019-06-30 20:00:08'),
(2, 'Dueño Local', '987654321', '2019-06-30 20:36:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `contrasena` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `creado_en` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `correo`, `contrasena`, `creado_en`) VALUES
(1, 'admin', 'correo@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2019-06-30 19:39:22');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `locales`
--
ALTER TABLE `locales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `telefonos`
--
ALTER TABLE `telefonos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
