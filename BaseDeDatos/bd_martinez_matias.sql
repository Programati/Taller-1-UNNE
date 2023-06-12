-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-06-2023 a las 20:42:24
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_martinez_matias`
--
CREATE DATABASE IF NOT EXISTS `bd_martinez_matias` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci;
USE `bd_martinez_matias`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(50) NOT NULL,
  `descripcion_categoria` varchar(100) NOT NULL,
  `activo` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre_categoria`, `descripcion_categoria`, `activo`) VALUES
(1, 'Cuadernos', 'Cuadernos tapa dura o blanda', 1),
(2, 'Mini-Polaroid', 'Mini Polaroids copados', 1),
(3, 'Photocard', 'Fotografias en cartitas copadas', 1),
(4, 'Poster', 'Posters bien copetes', 1),
(5, 'Stickers', 'Stickers bien chulis', 1),
(6, 'Botellas', 'Botella p/agua personalizada', 1),
(7, 'Termo', 'Termos ploteados D-1', 0),
(8, 'Alfombra', 'Alfombra artesanal TUFFTING', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE `consultas` (
  `id_consulta` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `asunto` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mensaje` varchar(256) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `leido` int(2) NOT NULL,
  `fecha_create` date NOT NULL,
  `fecha_updated` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `consultas`
--

INSERT INTO `consultas` (`id_consulta`, `id_usuario`, `asunto`, `email`, `mensaje`, `nombre`, `leido`, `fecha_create`, `fecha_updated`) VALUES
(1, NULL, 'Compra mayorista', 'emiliano@gmail.com', 'Consulta sobre compra mayorista', 'Emiliano', 0, '2023-05-01', '2023-06-07'),
(2, 12, 'Compra rechazada', 'usuario@gmail.com', 'Como me contactan para el problema que tengo?', 'usuario', 1, '2023-05-15', '2023-06-08'),
(3, 12, 'Compra rechazada', 'usuario@gmail.com', 'Sigo esperando respuesta', 'usuario', 1, '2023-05-15', '2023-06-08'),
(4, 14, 'Cómo comprar de manera presencial', 'mauro@gmail.com', 'Me podrían ayudar a ir a buscar mi producto?', 'Mauro', 0, '2023-05-28', '2023-06-07'),
(5, 14, 'Primera vez comprando', 'mauro@gmail.com', 'Puedo pedir diseños que no sea de la tematica K-PoP?', 'Mauro', 0, '2023-06-01', '2023-06-07'),
(6, 12, 'Caro', 'usuario@gmail.com', 'Por qué tan caro?', 'usuario', 0, '2023-06-02', '2023-06-07'),
(7, NULL, 'Registrarse', 'matias@gmail.com', 'Hola, quiero registrarme pero no soy de Argentina. No hay algún tipo de impedimento a la hora de comprar?', 'Matias Martinez', 1, '2023-06-04', '2023-06-08'),
(8, 17, 'Envíos al exterior', 'rene@gmail.com', 'Hola, quiero comprar sus productos, pero que me lo envien a otro país, se puede hacer eso?', 'Rene Maximiliano', 1, '2023-06-04', '2023-06-07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallesfacturas`
--

CREATE TABLE `detallesfacturas` (
  `id_detalle_factura` int(11) NOT NULL,
  `id_factura` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `subTotal` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `detallesfacturas`
--

INSERT INTO `detallesfacturas` (`id_detalle_factura`, `id_factura`, `id_producto`, `cantidad`, `subTotal`) VALUES
(9, 4, 1, 1, '99.00'),
(10, 5, 2, 1, '200.00'),
(11, 5, 7, 1, '300.00'),
(12, 5, 4, 1, '500.00'),
(13, 5, 1, 1, '99.00'),
(14, 6, 5, 2, '200.00'),
(15, 6, 7, 1, '300.00'),
(16, 6, 3, 2, '1000.00'),
(17, 7, 5, 1, '100.00'),
(18, 7, 6, 1, '1.00'),
(19, 7, 7, 1, '300.00'),
(20, 8, 5, 1, '99.99'),
(21, 8, 9, 1, '350.39'),
(22, 8, 8, 1, '199.90'),
(23, 9, 9, 2, '700.78'),
(24, 9, 7, 1, '300.00'),
(25, 9, 6, 1, '1.00'),
(26, 9, 5, 1, '99.99'),
(27, 9, 4, 3, '1500.00'),
(28, 9, 3, 3, '1500.00'),
(29, 9, 1, 4, '796.00'),
(30, 10, 9, 4, '1401.56'),
(31, 10, 6, 2, '2.00'),
(32, 10, 5, 4, '399.96'),
(33, 11, 5, 2, '199.98'),
(34, 11, 6, 2, '2.00'),
(35, 11, 7, 2, '600.00'),
(36, 11, 9, 1, '350.39'),
(37, 11, 8, 1, '199.90'),
(38, 11, 4, 1, '500.00'),
(39, 11, 3, 1, '500.00'),
(40, 11, 1, 1, '199.00'),
(41, 12, 13, 1, '589.30'),
(42, 12, 12, 1, '8000.00'),
(43, 12, 5, 1, '99.99'),
(44, 12, 7, 1, '300.00'),
(45, 12, 3, 2, '1000.00'),
(46, 12, 2, 1, '200.00'),
(47, 12, 11, 1, '100.00'),
(48, 13, 11, 1, '100.00'),
(49, 14, 4, 1, '500.00'),
(50, 15, 5, 6, '599.94'),
(51, 16, 11, 4, '400.00'),
(52, 16, 12, 2, '16000.00'),
(53, 16, 9, 2, '700.78'),
(54, 16, 8, 2, '399.80'),
(55, 16, 7, 2, '600.00'),
(56, 16, 5, 2, '199.98'),
(57, 16, 3, 2, '1000.00'),
(58, 16, 2, 1, '200.00'),
(59, 16, 1, 1, '199.00'),
(60, 17, 9, 2, '700.78'),
(61, 18, 12, 2, '16000.00'),
(62, 18, 9, 1, '350.39'),
(63, 18, 3, 1, '500.00'),
(64, 19, 28, 1, '70.00'),
(65, 19, 11, 1, '100.00'),
(66, 19, 4, 1, '500.00'),
(67, 19, 14, 3, '449.70'),
(68, 19, 16, 1, '149.90'),
(69, 20, 27, 5, '350.00'),
(70, 20, 17, 3, '448.50'),
(71, 20, 20, 5, '900.00'),
(72, 20, 9, 2, '700.78'),
(73, 20, 11, 1, '100.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domicilios`
--

CREATE TABLE `domicilios` (
  `id_domicilio` int(11) NOT NULL,
  `calle` varchar(50) NOT NULL,
  `numero` varchar(50) NOT NULL,
  `codigo_postal` int(11) NOT NULL,
  `localidad` varchar(50) NOT NULL,
  `provincia` varchar(100) NOT NULL,
  `pais` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `domicilios`
--

INSERT INTO `domicilios` (`id_domicilio`, `calle`, `numero`, `codigo_postal`, `localidad`, `provincia`, `pais`) VALUES
(30, 'Esnaola', '1590', 3900, 'Corrientes', 'Corrientes', 'Argentina'),
(31, '9 de Julio', '798', 3900, 'Corrientes', 'Corrientes', 'Argentina'),
(32, 'San Lorenzo', '342', 3900, 'Corrientes', 'Corrientes', 'Argentina'),
(33, 'Calle OFF', '100', 7000, 'Corrientes', 'Corrientes', 'Argentina'),
(34, 'Independecia', 'Mz 11 Cs 20', 3900, 'Formosa', 'Formosa', 'Argentina'),
(35, 'Santa Fe', '5102', 3400, 'Formosa', 'Formosa', 'Argentina'),
(36, '25 de Mayo', '2309', 5600, 'Resistencia', 'Chaco', 'Argentina'),
(37, 'Av Raul Alfonsin', '34', 1600, 'Bs As', 'Buenos Aires', 'Argentina'),
(41, 'Av. Francia', '7199', 4900, 'Salta', 'Salta', 'Argentina'),
(42, 'Madariaga', '72', 4000, 'Neuquen', 'Neuquen', 'Argentina'),
(43, 'San Lorenzo', '1922', 4900, 'Bs As', 'Buenos Aires', 'Argentina');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `id_factura` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `importe_total` decimal(12,2) NOT NULL,
  `fecha_factura` date NOT NULL,
  `fecha_updated` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`id_factura`, `id_usuario`, `importe_total`, `fecha_factura`, `fecha_updated`) VALUES
(4, 12, '99.00', '2023-05-29', '2023-05-29'),
(5, 12, '1099.00', '2023-05-29', '2023-05-29'),
(6, 13, '1500.00', '2023-05-29', '2023-05-29'),
(7, 12, '401.00', '2023-05-30', '2023-05-30'),
(8, 15, '650.28', '2023-06-03', '2023-06-03'),
(9, 15, '4897.77', '2023-06-03', '2023-06-03'),
(10, 14, '1803.52', '2023-06-03', '2023-06-03'),
(11, 14, '2551.27', '2023-06-04', '2023-06-04'),
(12, 16, '10289.29', '2023-06-04', '2023-06-04'),
(13, 17, '100.00', '2023-06-04', '2023-06-04'),
(14, 17, '500.00', '2023-06-04', '2023-06-04'),
(15, 17, '599.94', '2023-06-04', '2023-06-04'),
(16, 17, '19699.56', '2023-06-04', '2023-06-04'),
(17, 14, '700.78', '2023-06-06', '2023-06-06'),
(18, 15, '16850.39', '2023-06-07', '2023-06-07'),
(19, 15, '1269.60', '2023-06-12', '2023-06-12'),
(20, 18, '2499.28', '2023-06-12', '2023-06-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id_persona` int(11) NOT NULL,
  `dni` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `id_domicilio` int(11) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id_persona`, `dni`, `nombre`, `apellido`, `telefono`, `email`, `id_domicilio`, `password`) VALUES
(13, '1234556', 'Matias', 'Martinez', '3704646563', 'mati.j.martinez@gmail.com', 30, '$2y$10$T40IFGmZw8vg4iHu4Wg7vea6VgSlJ4Qtjw4E42mmTUKZGDAOQBfEW'),
(14, '10987652', 'Administrador', 'ADMIN', '3794987654', 'admin@gmail.com', 31, '$2y$10$k4tGmEuypxgfX0xM/I/70uA9pwP3l5KGBi/NuI.ZUjjG.ODM7gTza'),
(15, '20989891', 'usuario', 'USU', '4456483647', 'usuario@gmail.com', 32, '$2y$10$j8dc.GjjRS2l6l9MIy3AaeFrGprUaWLti3.3iHYfNsXvhQ1ziPsYi'),
(16, '100000', 'inactivo', 'OFF', '110303456', 'off@gmail.com', 33, '$2y$10$W2VSPKCAtMevYocc4IBWD.Cy/HXWUSC67v2TaOWJyWajP9OehYdSy'),
(17, '39817030', 'Mauro', 'Pessolano', '1147483647', 'mauro@gmail.com', 34, '$2y$10$uC3bg2x84ix29Cr.89w9J.bX84n2A3IBaS9Qp0gmKibq4JwegVy9e'),
(18, '30917234', 'Belen', 'Lopez', '2147483647', 'belen@gmail.com', 35, '$2y$10$HXW6bxZuzGSOFRnvz5.GyORr1r6PWGjFJWIJ625/8X.nCWsG.qEq.'),
(19, '40571829', 'Enzo Fabian', 'Lopez', '2147989909', 'enzo@gmail.com', 36, '$2y$10$QLG8nUXdbpaMlrkKTzqyy.qhSwK6lnrX1JIQvvQd2opsGz.CJBxI6'),
(20, '36912544', 'Rene Maximiliano', 'Perez', '11345234', 'rene@gmail.com', 37, '$2y$10$Lyx70zpTXYs80lk1yXa1Z.Z4rnVsl23NNW74nCmOEg.Wiw30f517u'),
(21, '39553991', 'Francisco Javier', 'Dinax', '3705102938', 'fransico@gmail.com', 41, '$2y$10$327ranBB.sB4Jmd/vw/EX.pD/YCLTSBpVpRqzLBGcqLt09wBc7ywe'),
(22, '41098123', 'Augusto Ramiro', 'Felix', '4041728911', 'augusto@gmail.com', 42, '$2y$10$GGsxZ6d.R75L.jSXssyruulL86J6UIoVjcCXBgfI1M5Kl73djyeqC'),
(23, '39553991', 'Ramon Augusto', 'Rodriguez', '0303456789', 'ramon@gmail.com', 43, '$2y$10$6kVgrX6POz9SelqZrXpj7OrMINsaDIQCgSwvuzDoexqjtOGjbEHcO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre_producto` varchar(50) NOT NULL,
  `descripcion_producto` varchar(100) NOT NULL,
  `precio` decimal(12,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `url_imagen` varchar(256) NOT NULL,
  `activo` int(2) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre_producto`, `descripcion_producto`, `precio`, `cantidad`, `url_imagen`, `activo`, `id_categoria`) VALUES
(1, 'Diseño p/botellas COOKY-TATA', 'Diseño para botellas con los personajes COOKY y TATA', '199.00', 9, '1686264216_957ee6670a239b22fad8.jpg', 1, 6),
(2, 'Botellas Mang', 'Botella personalizada', '200.00', 8, '1686264201_27eef061a3c2b6703660.jpg', 1, 6),
(3, 'Cuaderno BTS D-1', 'Cuaderno BTS diseño morado c/Cantante', '500.00', 15, '1686264250_1a8b4078141b4a92d9e5.jpg', 1, 1),
(4, 'Diseño p/botellas VAN-SHOOKY ', 'Diseño para botellas, con los personajes VAN y SHOOKY', '500.00', 8, '1686264149_5c44a768c7f448aacf21.jpg', 1, 6),
(5, 'Cuaderno c/calendario', 'Cuaderno con calendario', '99.99', 31, '1686264165_bbc6a6486c62becf1ff4.jpg', 1, 1),
(6, 'Diseño p/botellas RJ-MANG', 'Diseños para botellas con los personajes RJ y MANG', '0.99', 0, '1686264339_75d60a3fb678090c60ed.jpg', 1, 6),
(7, 'Cuaderno BTS D-2', 'Cuaderno BTS contra-tapa y primera hoja', '300.00', 24, '1686264268_523780b09fe7bbf931b7.jpg', 1, 1),
(8, 'Cuaderno DYNAMITE', 'Cuaderno rallado blanco, DYNAMITE', '199.90', 8, '1686264182_001863d676438cbe6536.jpg', 1, 1),
(9, 'Diseño p/botellas CHIMMY-KOYA', 'Diseño para botellas con los personajes CHIMMY y KOYA', '350.39', 8, '1686264232_5a5314595a26ef01ece9.jpg', 1, 6),
(10, 'Cuaderno BTS D-3', 'Cuaderno BTS Contra-Tapa cantante', '275.40', 5, '1686264290_510594ea9a0a5afa0ea1.jpg', 1, 1),
(11, 'Poster DYNAMITE', 'Poster DYNAMITE con diseños para cuadernos', '100.00', 93, '1686264304_9fe06a9da74776aff989.jpg', 1, 4),
(12, 'Cuaderno DYNAMITE D-All', 'Conjunto de 8 cuadernos DYNAMITE c/diseños variados', '8000.00', 3, '1686264323_004895fbc5231d68a561.jpg', 1, 1),
(13, 'Cuaderno MANG D-1', 'Cuaderno MANG BT21', '589.30', 2, '1686264365_167c916e943cf5eaff8b.jpg', 1, 1),
(14, 'Polaroid D-1', 'Tamaño : 5x8 cm\r\nPapel: Fotográfico 240g', '149.90', 0, '1686261267_a1cfd22b95de4f50ff1e.jpg', 1, 2),
(15, 'Polaroid D-2', 'Tamaño : 5x8 cm\r\nPapel: Fotográfico 240g', '149.90', 5, '1686261406_7acb3656dc0cf2cbf6e4.jpg', 1, 2),
(16, 'Polaroid D-3', 'Tamaño : 5x8 cm\r\nPapel: Fotográfico 240g', '149.90', 0, '1686261491_4b3b017a2d222577ebfc.jpg', 1, 2),
(17, 'Polaroid D-4', 'Tamaño : 5x8 cm\r\nPapel: Fotográfico 240g', '149.50', 9, '1686261523_b78ee44802fd60dd720e.jpg', 1, 2),
(18, 'Polaroid D-5', 'Tamaño : 5x8 cm\r\nPapel: Fotográfico 240g', '149.99', 5, '1686261553_e01d424bccdf9899f489.jpg', 1, 2),
(19, 'Polaroid D-6', 'Tamaño : 5x8 cm\r\nPapel: Fotográfico 240g', '150.00', 12, '1686261583_d365f7d7fcc590b7604d.jpg', 1, 2),
(20, 'PhotoCard D-4', 'Set x8 - \r\nPapel fotográfico de 240g', '180.00', 7, '1686261712_2e5fc75a546d025d5044.jpg', 1, 3),
(21, 'PhotoCard D-3', 'Set x8 - \r\nPapel fotográfico de 240g', '180.00', 3, '1686261750_b188e1a04f099333ed77.jpg', 1, 3),
(22, 'PhotoCard D-2', 'Set x8 - \r\nPapel fotográfico de 240g', '180.00', 4, '1686261868_9be2f40e83fce796414d.jpg', 1, 3),
(23, 'PhotoCard D-1', 'Set x8 - \r\nPapel fotográfico de 240g', '180.00', 6, '1686261941_b66c8d1edc80d75c97ee.jpg', 1, 3),
(24, 'Sticker BTS D-1', 'Papel Fotográfico - Vinilo Adhesivo - Resistente al agua', '70.00', 10, '1686262619_d02000d6dbcaff2fb010.jpg', 1, 5),
(25, 'Sticker BTS D-2', 'Papel Fotográfico - Vinilo Adhesivo - Resistente al agua', '70.00', 10, '1686262642_0d9e4e83accc27c07e4c.jpg', 1, 5),
(26, 'Sticker BTS D-3', 'Papel Fotográfico - Vinilo Adhesivo - Resistente al agua', '70.00', 10, '1686262671_e5f3da1a2b9226541c46.jpg', 1, 5),
(27, 'Sticker BTS D-4', 'Papel Fotográfico - Vinilo Adhesivo - Resistente al agua', '70.00', 9, '1686262693_b848e924d02e8302bfcb.jpg', 1, 5),
(28, 'Sticker BTS D-5', 'Papel Fotográfico - Vinilo Adhesivo - Resistente al agua', '70.00', 3, '1686262720_3cf8dd55d5f8e203d972.jpg', 1, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(50) NOT NULL,
  `descripcion_rol` varchar(100) NOT NULL,
  `activo` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `nombre_rol`, `descripcion_rol`, `activo`) VALUES
(1, 'admin', 'Usuario que puede dar de baja a los demás usuarios y cargar productos', 1),
(2, 'usuario', 'Usuario que puede comprar productos', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `activo` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `id_persona`, `id_rol`, `activo`) VALUES
(10, 13, 1, 1),
(11, 14, 1, 1),
(12, 15, 2, 1),
(13, 16, 2, 0),
(14, 17, 2, 1),
(15, 18, 2, 1),
(16, 19, 2, 1),
(17, 20, 2, 1),
(18, 21, 2, 1),
(19, 22, 2, 1),
(20, 23, 2, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id_consulta`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `detallesfacturas`
--
ALTER TABLE `detallesfacturas`
  ADD PRIMARY KEY (`id_detalle_factura`),
  ADD KEY `id_factura` (`id_factura`,`id_producto`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `domicilios`
--
ALTER TABLE `domicilios`
  ADD PRIMARY KEY (`id_domicilio`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`id_factura`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id_persona`),
  ADD KEY `id_domicilio` (`id_domicilio`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_persona` (`id_persona`,`id_rol`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id_consulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `detallesfacturas`
--
ALTER TABLE `detallesfacturas`
  MODIFY `id_detalle_factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT de la tabla `domicilios`
--
ALTER TABLE `domicilios`
  MODIFY `id_domicilio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD CONSTRAINT `consultas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detallesfacturas`
--
ALTER TABLE `detallesfacturas`
  ADD CONSTRAINT `detallesfacturas_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `detallesfacturas_ibfk_3` FOREIGN KEY (`id_factura`) REFERENCES `facturas` (`id_factura`) ON UPDATE NO ACTION;

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `facturas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON UPDATE NO ACTION;

--
-- Filtros para la tabla `personas`
--
ALTER TABLE `personas`
  ADD CONSTRAINT `personas_ibfk_1` FOREIGN KEY (`id_domicilio`) REFERENCES `domicilios` (`id_domicilio`) ON UPDATE NO ACTION;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`) ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`) ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
