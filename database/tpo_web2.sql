-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-11-2023 a las 20:58:15
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
-- Base de datos: `tpo_web2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `Categorias` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`Categorias`, `id`) VALUES
('Naruto', 1),
('Harry Potter', 2),
('One Piece', 3),
('Demon Slayer', 4),
('Minecraft', 5),
('Gof Of War', 6),
('Jujutsu Kaisen', 7),
('Los Simpsons', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `Producto` varchar(45) NOT NULL,
  `Imagen` varchar(1500) NOT NULL,
  `Precio` int(45) NOT NULL,
  `id` int(11) NOT NULL,
  `Categoria` varchar(255) NOT NULL,
  `Descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`Producto`, `Imagen`, `Precio`, `id`, `Categoria`, `Descripcion`) VALUES
('Set de Katanas| Demon slayer', 'https://ae01.alicdn.com/kf/Se917ad7447dd4e53a5b6c5419e83667d2/Katana-de-Demon-Slayer-para-ni-os-espada-Katana-de-80-CM-1-1-cuchillo-de.jpg_960x960.jpg', 10000, 26, 'Demon Slayer', 'Set vario de espadas Nichirin antiguamente usadas por Tanjiro y sus compañeros caza-demonios. Estas armas todavia siguen afiladas y listas para la accion!'),
('Caliz de fuego', 'https://http2.mlstatic.com/D_NQ_NP_908012-MLA51774703277_092022-O.webp', 400, 34, 'Harry Potter', 'El Cáliz de Fuego, reliquia mágica legendaria del Torneo de los Tres Magos. Potencia la magia, desvela misterios, y lanza hechizos asombrosos. Una oportunidad única para poseer un tesoro de la historia de Hogwarts'),
('Huevo de oro', 'https://elenanofriki.com/36788-large_default/replica-huevo-dorado-torneo-de-los-tres-magos-harry-potter.jpg', 10000, 35, 'Harry Potter', 'Huevo de oro especial utilizado en las pruebas de los Tres Magos, este objeto limitado y extremadamente raro fue adquirido por Cedric Diggory, solo esperamos no tener que volver a aquella laguna infestada de Selkies...'),
('Bandana sennin', 'https://down-mx.img.susercontent.com/file/7c985a93a53378f8afc63cd738765e29_tn', 100, 54, 'Naruto', 'Bandana de la epoca Sennin de Naruto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_usuario`
--

CREATE TABLE `producto_usuario` (
  `Nombre` varchar(255) NOT NULL,
  `Producto` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto_usuario`
--

INSERT INTO `producto_usuario` (`Nombre`, `Producto`, `id`) VALUES
('', '', 2),
('', '', 3),
('dfgdfgdfgd', 'Nimbus 2000| Replica', 6),
('dfgdfgdfgd', 'Remera sekiro', 7),
('dfgdfgdfgd', 'Saeta de fuego | Replica', 8),
('dfgdfgdfgd', 'Saeta de fuego | Replica', 9),
('dfgdfgdfgd', 'Saeta de fuego | Replica', 10),
('matias', 'a', 11),
('matias', 'Espadas del caos', 12),
('matias', 'Perlas de Enderman', 13),
('ignaciocasas132@gmail.com', 'Varita Harry Potter', 14),
('ignaciocasas132@gmail.com', 'Varita Harry Potter', 15),
('ignaciocasas132@gmail.com', 'Varita Harry Potter', 16),
('ignaciocasas132@gmail.com', 'Varita Harry Potter', 17),
('jorgemorcillo1966@gmail.com', 'Bandana sennin', 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Mail` varchar(255) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Contraseña` varchar(255) NOT NULL,
  `Permisos` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Mail`, `Nombre`, `Contraseña`, `Permisos`) VALUES
('hdgasfgadfsg', 'sdfdfasdf', '$2y$10$UrJyCcNM/QQxWf0DWzhDsO9sbkOHzARinAVAplkeNt1fCRFGlzZK6', 0),
('Icasas760@gmail.com', 'Nacho', '$2y$10$yZ3QrbNqx5pozXQ95kjn9OaWUDwbvKFo1ait0Jp0IB4cn2YUsd3sm', 0),
('ignaciocasas132@gmail.com', 'dfgdfgdfgd', '$2y$10$aA8lHiU9.LRkSIEGZ5Cp8.e2/Kay5o7YEoEpnwj63FwGk5XrlzOmC', 1),
('jorgemorcillo1966@gmail.com', 'matias', '$2y$10$AjevlZ/bOQ.4Kg638AJtLuZssBTD8AL6iWP9WUadMxBbz7wN.ku5e', 1),
('matias', 'a', '$2y$10$pzb6zG8SOj3ghF3avfTxUujZkVeFXrfjAznkocOqfROOiF64NZTIW', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Producto` (`Producto`);

--
-- Indices de la tabla `producto_usuario`
--
ALTER TABLE `producto_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Mail`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `producto_usuario`
--
ALTER TABLE `producto_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
