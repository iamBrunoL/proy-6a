-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-06-2023 a las 05:20:10
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
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(100) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `detalle_compra` mediumtext NOT NULL,
  `fecha` date NOT NULL,
  `estatus_compra` varchar(15) DEFAULT 'Pendiente',
  `totalAPagar` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `fecha` date DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `mensaje` varchar(300) NOT NULL,
  `estatus_msj` varchar(10) DEFAULT 'Pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre_producto` varchar(100) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `precio_individual` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `id_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre_producto`, `descripcion`, `precio_individual`, `stock`, `id_img`) VALUES
(1, ' Carretilla 6 ft', 'Concha plástica. Espesor concha: 3.6 mm. Bastidor calibre: 16 (1.5 mm de espesor).', 1785.00, 3, '0001'),
(2, 'Matracas', ' Matracas de liberación rápida, cabeza de pera, sistema reversible. Engrane de acero al cromo bolibdeno de 45 dientes', 319.00, 4, '0002'),
(3, 'Rodillos 9\" (23cm)', 'Para todo tipo de pinturas. Felpa de alta densidad para uso profesional 2x más eficiente que cubre áreas de mayor tamaño en menos tiempo.', 59.00, 15, '0003'),
(4, 'Formon', ' Fabricado en acero al cromo vnadio 2x más resistente al desgaste y mayor durabilidad de filo. Longitud de hoja: 100mm', 175.00, 5, '0004'),
(5, 'Llaves combinadas extralargas, std', ' Acero al cromo vanadio en llaves de 1/4\" a 1 1/4\". 2x más resistentes al desgaste que las de acero al carbono.', 125.00, 34, '0005'),
(6, 'Placas con interruptor, 1 módulo', 'Fabricación en policarbonato. Módulos de 23 mm. Tensión: 127 V. Corriente: 10 A.', 62.00, 25, '0006'),
(7, ' Portalámparas sencillos', 'Corriente: 4 A. Tensión: 125 V. Rosca integrada al cuerpo. Gran resistencia a impactos.', 14.00, 13, '0007'),
(8, 'Marro octagonal', 'Mango de madera 36\" (90 cm). Con absorbedor de impactos. Caras maquinadas.', 1595.00, 23, '0008'),
(9, 'Desarmador de precisión 106 piezas', 'Para electrónica y trabajos de precisión. Porta puntas magnético. Puntas de acero al cromo vanadio. Extensión flexible para lugares de difícil acceso.\nMango ergonómico antiderrapante', 455.00, 12, '0009'),
(10, 'Parrilla eléctrica, doble quemador tipo disco', 'Mayor estabilidad para recipientes en comparación con parrillas de resistencia. Termonstato que regula la temperatura, se apaga al llegar a la\ntemperatura indicada y se enciende para mantenerla.', 545.00, 2, '0010'),
(11, 'Regadera de plato delgado, cuadrada 8\" (20 cm)', ' Boquillas de fácil limpieza. Articuladas. Ahorradoras en baja presión. Para mayor flujo de agua se puede retirar el reductor.', 629.00, 4, '0011'),
(12, ' Llaves de esfera, cuerpo de latón', 'Rosca: 3 cuerdas. Cierre: 1/4 de vuelta. Manerales de aluminio tipo mariposa', 109.00, 6, '0012'),
(13, 'Candado de cable con llave', 'Ideales para motocicletas, bicicletas, rejas, escaleras, equipo de construcción, etc. Cable de acero trenzado cubierto de PVC.', 269.00, 8, '0013'),
(14, 'Cardas de alambre ondulado', 'Acabado fino. Para lmpieza de superficies. Fabricadas en acero al carbono.', 405.00, 25, '0014'),
(15, 'Juego de desarmadores, mango Comfort Grip', 'Puntas magnetizadas. Marcado y código de color para fácil identificación de medida y punta. Barra hexagonal para maximizar el torque con llave.', 275.00, 17, '0015'),
(16, 'Escoba plástica, diseño curvo', 'Cabezal de polipropileno de alta resistencia. Mango Comfort Grip de 29\" (73 cm). Ideal para jardineras y espacios reducidos', 325.00, 14, '0016'),
(17, 'Aspersor metálico', ' Presión de trabajo: 40 a 50 psi. Entrada de agua: 3/4\". Coneión estaca - aspersor: 1/2\". Clip de límite de riego. Conexión de latón', 435.00, 5, '0017'),
(18, ' Regulador para gas L.P., 2 vías', 'Para baja presión. Ideal para tanque doméstico y portátil. Incluye 2 pigtails con tuerca izquierda, niple terminal y tuerca cónica de latón', 85.00, 8, '0018'),
(19, 'Bolsa pijas cabeza hexagonal, punta de broca con rondana\nde neopreno', 'Espesor máximo de barrenado recomendado: 4 mm. Velocidad recomendada: 1,000 - 1,800 rpm. Fabricadas en acero con recubrimiento galvanizado', 77.00, 35, '0019'),
(20, ' Mezcladoras 4\" para lavabo, cuello tipo bar', 'Cuerpo de latón para máima duración. Cuello y cubierta de acero inoxidable. Disponible con cartuchos cerámicos y de compresión.', 475.00, 6, '0020'),
(21, 'Válvula de llenado para tanque estacionario de gas L.P', 'Presión máxima: 2,068 kPa / 300 psi. Conexión 1 3/4\" - ACME para adaptador de llenado. Cuerpo fabricado en latón para máxima duración.', 385.00, 14, '0021');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `edad` int(11) NOT NULL,
  `genero` varchar(10) NOT NULL,
  `nivel` varchar(20) NOT NULL DEFAULT 'Cliente',
  `username` varchar(50) NOT NULL,
  `contrasena` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `correo`, `direccion`, `edad`, `genero`, `nivel`, `username`, `contrasena`) VALUES
(1, '', '', '', '', 0, '', 'Administrador', 'juan', '12'),
(2, '', '', '', '', 0, '', 'Cliente', 'eve', '12');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
