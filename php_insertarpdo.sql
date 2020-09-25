-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-09-2020 a las 22:04:36
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
-- Base de datos: `php_insertarpdo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_cat` int(11) NOT NULL,
  `descrip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `nombres` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `categoria` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `lugar` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fregis` date NOT NULL,
  `cod` int(200) NOT NULL,
  `proveedor` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombres`, `descripcion`, `categoria`, `lugar`, `fregis`, `cod`, `proveedor`, `cantidad`) VALUES
(69, 'AMD Series', 'COMPUTADORA JINX AMD RYZEN 5-3400G 8GB 1TB 19\" HD', 'Computadoras', 'Argentina', '2020-09-11', 211, 'INfotech', 10),
(70, 'TECLADO LOGITECH', 'K400R PLUS WIRELESS 2_4 GHZ TOUCH TECLADO EN ESPANOL COMPATILE CON WINDOWS', 'Accesorios', 'Ecuador', '2020-10-02', 21001, 'Panda sac', 14),
(78, 'Case gamer', 'COMPUTADORA FORTNITE INTEL I3-10100 8GB 480GB SSD T.VIDEO RX 5500 XT 4GB', 'Computadoras', 'EEUU', '2020-09-25', 103121, 'DELLStron', 5),
(80, 'MONITOR ', 'SAMSUNG LED 24\" FHD (S24F354FHL) HDMI', 'Monitores', 'Peru', '2020-09-11', 12, 'Sodimac', 13),
(81, 'Impresora', 'MPRESORA EPSON ECOTANK L1455 (C11CF49303) TINTA CONTINUA MULTIFUNCIONAL USB LAN WIFI', 'Impresoras', 'Europa', '1198-11-11', 2121212, 'Epson', 212),
(86, 'Laptop', 'LENOVO 520-24ARR RYZEN 3 2200GE 4GB 1TB T VIDEO RADEON VEGA 8 23.8 FHD WINDOWS 10 (F0DN003NLD)', 'Computadoras', 'EEUU', '2020-10-01', 21, 'StarGaiser', 10),
(87, 'Mouse', 'RAZER VIPER (RZ01-02550100-R3U1) GAMING | LED-RGB', 'Accesorios', 'Peru', '2020-10-10', 112, 'Raztech', 15);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
