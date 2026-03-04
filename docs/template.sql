-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 04-03-2026 a las 20:07:48
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
-- Estructura de tabla para la tabla `tm_order`
--

DROP TABLE IF EXISTS `tm_order`;
CREATE TABLE IF NOT EXISTS `tm_order` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `order_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `user_id` int NOT NULL,
  `prod_id` int NOT NULL,
  `num_prod` int NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `state` int NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `tm_order`
--

INSERT INTO `tm_order` (`order_id`, `order_code`, `user_id`, `prod_id`, `num_prod`, `created_at`, `updated_at`, `deleted_at`, `state`) VALUES
(1, NULL, 1, 4, 4, '2026-03-04 10:26:07', '2026-03-04 12:04:23', '2026-03-04 15:06:53', 2),
(2, NULL, 1, 1, 2, '2026-03-04 10:30:52', NULL, '2026-03-04 11:44:01', 2),
(3, 'ORD-20260304103624', 1, 1, 2, '2026-03-04 10:36:24', '2026-03-04 15:05:56', NULL, 1),
(4, 'ORD-20260304103837', 1, 3, 3, '2026-03-04 10:38:37', '2026-03-04 11:47:44', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tm_product`
--

DROP TABLE IF EXISTS `tm_product`;
CREATE TABLE IF NOT EXISTS `tm_product` (
  `prod_id` int NOT NULL AUTO_INCREMENT,
  `prod_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `prod_reference` varchar(50) DEFAULT NULL,
  `prod_cant` int DEFAULT NULL,
  `prod_unit_value` int NOT NULL,
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

INSERT INTO `tm_product` (`prod_id`, `prod_name`, `prod_reference`, `prod_cant`, `prod_unit_value`, `prod_desc`, `cat_id`, `created_at`, `updated_at`, `deleted_at`, `state`) VALUES
(1, 'Auriculares', '203-29', 10, 30000, 'ninguna', 2, '2026-02-25 15:38:59', '2026-03-04 15:06:15', '2026-02-25 15:38:59', 1),
(2, 'Mouse', '203-27', 100, 0, 'ninguna', 2, '2026-02-25 15:40:23', '2026-03-04 15:06:21', '2026-02-27 10:20:23', 1),
(3, 'Monitor', '203-26', 20, 100000, 'ningun', 1, '2026-02-27 10:43:45', '2026-03-04 15:06:25', NULL, 1),
(4, 'Impresora', '203-27', 200, 50000, 'ninguna', 2, '2026-02-27 10:45:09', '2026-03-04 15:06:29', NULL, 1),
(5, 'Teclado', NULL, NULL, 0, 'Ninguna', NULL, '2026-02-27 10:48:26', '2026-02-27 14:22:16', NULL, 1),
(6, 'Base', NULL, NULL, 0, 'Ninguna', NULL, '2026-02-27 10:51:57', '2026-02-27 14:20:25', '2026-02-27 14:22:19', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tm_user`
--

DROP TABLE IF EXISTS `tm_user`;
CREATE TABLE IF NOT EXISTS `tm_user` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_identification` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `state` int NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `tm_user`
--

INSERT INTO `tm_user` (`user_id`, `user_name`, `user_lastname`, `user_identification`, `created_at`, `updated_at`, `deleted_at`, `state`) VALUES
(1, 'Ron', 'Srz', '1001234567', '2026-03-03 15:07:50', '2026-03-04 14:39:10', NULL, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
