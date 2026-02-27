-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 27-02-2026 a las 21:35:40
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `template`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tm_category`
--

DROP TABLE IF EXISTS `tm_category`;
CREATE TABLE IF NOT EXISTS `tm_category` (
  `cat_id` int NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) NOT NULL,
  `cat_desc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `state` int NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `tm_category`
--

INSERT INTO `tm_category` (`cat_id`, `cat_name`, `cat_desc`, `created_at`, `updated_at`, `deleted_at`, `state`) VALUES
(1, 'Electronica', 'Dispositivos electrónicos', '2026-02-27 14:32:28', '2026-02-27 15:02:08', NULL, 1),
(2, 'Perifericos', 'Accesorios del computador', '2026-02-27 16:04:47', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tm_product`
--

DROP TABLE IF EXISTS `tm_product`;
CREATE TABLE IF NOT EXISTS `tm_product` (
  `prod_id` int NOT NULL AUTO_INCREMENT,
  `prod_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `prod_cant` int DEFAULT NULL,
  `prod_desc` varchar(255) NOT NULL,
  `cat_id` int DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `state` int NOT NULL,
  PRIMARY KEY (`prod_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `tm_product`
--

INSERT INTO `tm_product` (`prod_id`, `prod_name`, `prod_cant`, `prod_desc`, `cat_id`, `created_at`, `updated_at`, `deleted_at`, `state`) VALUES
(1, 'Auriculares', NULL, 'ninguna', NULL, '2026-02-25 15:38:59', '2026-02-25 15:38:59', '2026-02-25 15:38:59', 1),
(2, 'Mouse', 1, 'ninguna', 2, '2026-02-25 15:40:23', '2026-02-27 16:28:43', '2026-02-27 10:20:23', 1),
(3, 'Monitor', 2, 'ningun', 1, '2026-02-27 10:43:45', '2026-02-27 16:28:37', NULL, 1),
(4, 'Impresora', NULL, 'ninguna', NULL, '2026-02-27 10:45:09', '2026-02-27 10:51:09', NULL, 1),
(5, 'Teclado', NULL, 'Ninguna', NULL, '2026-02-27 10:48:26', '2026-02-27 14:22:16', NULL, 1),
(6, 'Base', NULL, 'Ninguna', NULL, '2026-02-27 10:51:57', '2026-02-27 14:20:25', '2026-02-27 14:22:19', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
