-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 30-07-2020 a las 13:12:22
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `lealtadd_cotizador`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `competitions`
--

CREATE TABLE `competitions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `terminal_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `competitions`
--

INSERT INTO `competitions` (`id`, `nombre`, `terminal_id`, `created_at`, `updated_at`) VALUES
(1, 'Pemex', 1, '2020-06-01 13:05:49', '2020-06-01 13:05:49'),
(2, 'Pemex', 2, '2020-06-01 13:05:49', '2020-06-01 13:05:49'),
(3, 'Pemex', 3, '2020-06-01 13:05:49', '2020-06-01 13:05:49'),
(4, 'Pemex', 4, '2020-06-01 13:05:49', '2020-06-01 13:05:49'),
(5, 'Pemex', 5, '2020-06-01 13:05:49', '2020-06-01 13:05:49'),
(6, 'Pemex', 6, '2020-06-17 19:29:29', '2020-06-17 19:29:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datosubicacions`
--

CREATE TABLE `datosubicacions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codigo_postal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_de_vialidad` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre_de_vialidad` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `n_exterior` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `n_interior` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre_colonia` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre_localidad` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre_municipio_o_demarcacion_territorial` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre_entidad_federativa` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entre_calle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `y_calle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `datosubicacions`
--

INSERT INTO `datosubicacions` (`id`, `codigo_postal`, `tipo_de_vialidad`, `nombre_de_vialidad`, `n_exterior`, `n_interior`, `nombre_colonia`, `nombre_localidad`, `nombre_municipio_o_demarcacion_territorial`, `nombre_entidad_federativa`, `entre_calle`, `y_calle`, `created_at`, `updated_at`) VALUES
(1, '91157', 'Avenida', 'Lázaro Cárdenas', '81', '', 'Rafael Lucio', 'Xalapa', 'Ignacio de la Llave', 'Veracruz', 'Esq. Gildardo Aviles', '', '2020-06-01 13:05:44', '2020-06-01 13:05:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `discounts`
--

CREATE TABLE `discounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nivel_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nivel_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nivel_3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nivel_4` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nivel_5` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nivel_6` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nivel_7` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nivel_8` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nivel_9` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nivel_10` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `producto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vigencia_now` tinyint(1) DEFAULT NULL,
  `vigencia_old` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `discounts`
--

INSERT INTO `discounts` (`id`, `nivel_1`, `nivel_2`, `nivel_3`, `nivel_4`, `nivel_5`, `nivel_6`, `nivel_7`, `nivel_8`, `nivel_9`, `nivel_10`, `producto`, `nombre`, `vigencia_now`, `vigencia_old`, `created_at`, `updated_at`) VALUES
(1, '0,500,0.092', '501,1250,0.122', '1251,4167,0.153', '4168,8333,0.183', '8334,16667,0.244', '16668,25000,0.366', '25001,41667,0.458', '41668,75000,0.549', '75001,104167,0.610', '104168,0,0', 'M', 'Valero', 1, 1, '2020-06-01 13:05:48', '2020-06-01 13:05:48'),
(2, '0,167,0.108', '168,333,0.144', '334,584,0.180', '585,1333,0.216', '1334,2500,0.288', '2501,8333,0.432', '8344,12500,0.540', '12501,20833,0.648', '28834,33333,0.720', '33334,0,0', 'P', 'Valero', 1, 1, '2020-06-01 13:05:48', '2020-06-01 13:05:48'),
(3, '0,250,0.122', '251,1083,0.162', '1084,1167,0.203', '1168,3417,0.243', '3418,5750,0.324', '5751,8083,0.486', '8084,11583,0.608', '11584,15083,0.729', '1584,37500,0.810', '37501,0,0', 'D', 'Valero', 1, 1, '2020-06-01 13:05:48', '2020-06-01 13:05:48'),
(4, '0,500,0.092', '501,1250,0.122', '1251,4167,0.153', '4168,8333,0.183', '8334,16667,0.244', '16668,25000,0.366', '25001,41667,0.458', '41668,75000,0.549', '75001,104167,0.610', '104168,0,0', 'M', 'Pemex', 1, 1, '2020-06-01 13:05:48', '2020-06-01 13:05:48'),
(5, '0,167,0.108', '168,333,0.144', '334,584,0.180', '585,1333,0.216', '1334,2500,0.288', '2501,8333,0.432', '8344,12500,0.540', '12501,20833,0.648', '28834,33333,0.720', '33334,0,0', 'P', 'Pemex', 1, 1, '2020-06-01 13:05:48', '2020-06-01 13:05:48'),
(6, '0,250,0.122', '251,1083,0.162', '1084,1167,0.203', '1168,3417,0.243', '3418,5750,0.324', '5751,8083,0.486', '8084,11583,0.608', '11584,15083,0.729', '1584,37500,0.810', '37501,0,0', 'D', 'Pemex', 1, 1, '2020-06-01 13:05:49', '2020-06-01 13:05:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `discount_life`
--

CREATE TABLE `discount_life` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `discount_id` bigint(20) UNSIGNED NOT NULL,
  `life_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `discount_life`
--

INSERT INTO `discount_life` (`id`, `discount_id`, `life_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estacions`
--

CREATE TABLE `estacions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `razon_social` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rfc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cre` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `terminal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `saldo` double(12,2) NOT NULL,
  `nombre_sucursal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linea_credito` int(11) NOT NULL,
  `credito` double(12,2) NOT NULL,
  `credito_usado` double(12,2) NOT NULL,
  `dias_credito` int(11) NOT NULL,
  `retencion` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estacions`
--

INSERT INTO `estacions` (`id`, `razon_social`, `rfc`, `cre`, `terminal`, `saldo`, `nombre_sucursal`, `linea_credito`, `credito`, `credito_usado`, `dias_credito`, `retencion`, `status`, `created_at`, `updated_at`) VALUES
(1, '*', 'XEXX010101000', 'PL/11245/EXP/ES/2015', 'Tula', 0.00, '*', 1, 2000000.00, 1450409.40, 10, 4, 1, '2020-06-01 13:05:44', '2020-06-01 13:05:44'),
(2, 'NATYVO, S.A. DE C.V.', 'XEXX010101000', 'PL/11245/EXP/ES/2019', 'Tula1', 0.00, 'NATYVO', 1, 2000000.00, 1450409.40, 10, 4, 1, '2020-06-01 13:05:44', '2020-06-01 13:05:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estacion_user`
--

CREATE TABLE `estacion_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `estacion_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estacion_user`
--

INSERT INTO `estacion_user` (`id`, `user_id`, `estacion_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(3, 3, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fits`
--

CREATE TABLE `fits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `terminal_id` bigint(20) UNSIGNED NOT NULL,
  `policom` double(12,3) DEFAULT NULL,
  `impulsa` double(12,3) DEFAULT NULL,
  `comision` double(12,3) DEFAULT NULL,
  `regular_fit` double(12,3) DEFAULT NULL,
  `premium_fit` double(12,3) DEFAULT NULL,
  `disel_fit` double(12,3) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `fits`
--

INSERT INTO `fits` (`id`, `terminal_id`, `policom`, `impulsa`, `comision`, `regular_fit`, `premium_fit`, `disel_fit`, `created_at`, `updated_at`) VALUES
(1, 1, 0.030, 0.070, 0.050, 0.000, 0.000, 0.000, '2020-06-01 13:05:47', '2020-06-01 13:05:47'),
(2, 2, 0.030, 0.070, 0.050, 0.000, 0.000, 0.000, '2020-06-01 13:05:47', '2020-06-01 13:05:47'),
(3, 3, 0.000, 0.000, 0.000, 0.500, 0.300, 0.700, '2020-06-01 13:05:47', '2020-06-01 13:05:47'),
(4, 4, 0.000, 0.000, 0.050, 0.570, 0.300, 0.680, '2020-06-01 13:05:48', '2020-06-19 21:56:37'),
(5, 5, 0.030, 0.070, 0.050, 0.000, 0.000, 0.000, '2020-06-01 13:05:48', '2020-06-01 13:05:48'),
(6, 3, 0.000, 0.000, 0.000, 0.570, 0.300, 0.680, '2020-06-16 19:15:21', '2020-06-16 19:15:21'),
(7, 6, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, '2020-06-17 21:00:00', '2020-06-17 21:00:00'),
(8, 4, 0.000, 0.000, 0.000, 0.570, 0.300, 0.680, '2020-06-19 22:02:59', '2020-06-19 22:02:59'),
(9, 6, 0.000, 0.000, 0.000, 0.570, 0.300, 0.680, '2020-06-19 23:55:56', '2020-06-19 23:55:56'),
(10, 4, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-27 23:46:31', '2020-07-27 23:46:31'),
(11, 4, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, '2020-07-27 23:46:44', '2020-07-27 23:46:44'),
(12, 4, 0.000, 0.000, 0.000, 0.570, 0.300, 0.680, '2020-07-30 21:42:05', '2020-07-30 21:42:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `impulsas`
--

CREATE TABLE `impulsas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `terminal_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `impulsas`
--

INSERT INTO `impulsas` (`id`, `nombre`, `terminal_id`, `created_at`, `updated_at`) VALUES
(1, 'Impulsa', 1, '2020-06-01 13:05:50', '2020-06-01 13:05:50'),
(2, 'Impulsa', 2, '2020-06-01 13:05:50', '2020-06-01 13:05:50'),
(3, 'Impulsa', 3, '2020-06-01 13:05:50', '2020-06-01 13:05:50'),
(4, 'Impulsa', 4, '2020-06-01 13:05:50', '2020-06-01 13:05:50'),
(5, 'Impulsa', 5, '2020-06-01 13:05:50', '2020-06-01 13:05:50'),
(6, 'Impulsa', 6, '2020-06-17 19:28:46', '2020-06-17 19:28:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lives`
--

CREATE TABLE `lives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `inicio` date DEFAULT NULL,
  `fin` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `lives`
--

INSERT INTO `lives` (`id`, `inicio`, `fin`, `created_at`, `updated_at`) VALUES
(1, '2020-04-02', '2020-05-01', '2020-06-01 13:05:48', '2020-06-01 13:05:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_acts`
--

CREATE TABLE `login_acts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inicio` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `login_acts`
--

INSERT INTO `login_acts` (`id`, `nombre`, `email`, `inicio`, `created_at`, `updated_at`) VALUES
(1, 'Edurado', 'l4l0_love@hotmail.com', '2020-06-09 22:57:35', NULL, NULL),
(2, 'Edurado', 'l4l0_love@hotmail.com', '2020-06-10 01:16:14', NULL, NULL),
(3, 'Zuri', 'zuri@digitalsoft.mx', '2020-06-10 02:16:31', NULL, NULL),
(4, 'Zuri', 'zuri@digitalsoft.mx', '2020-06-10 02:21:37', NULL, NULL),
(5, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-06-11 20:11:00', NULL, NULL),
(6, 'Zuri', 'zuri@digitalsoft.mx', '2020-06-11 22:33:45', NULL, NULL),
(7, 'Edurado', 'l4l0_love@hotmail.com', '2020-06-16 18:56:50', NULL, NULL),
(8, 'Edurado', 'l4l0_love@hotmail.com', '2020-06-16 19:06:30', NULL, NULL),
(9, 'Daniela', 'd.blanco@impulsaenergia.mx', '2020-06-16 20:20:08', NULL, NULL),
(10, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-06-16 20:56:50', NULL, NULL),
(11, 'SERGIO', 'alex.hdez@digitalsoft.mx', '2020-06-16 21:03:10', NULL, NULL),
(12, 'Edurado', 'l4l0_love@hotmail.com', '2020-06-16 21:08:33', NULL, NULL),
(13, 'SERGIO', 'alex.hdez@digitalsoft.mx', '2020-06-16 21:09:28', NULL, NULL),
(14, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-06-16 21:10:53', NULL, NULL),
(15, 'Daniela', 'd.blanco@impulsaenergia.mx', '2020-06-16 21:30:20', NULL, NULL),
(16, 'Daniela', 'd.blanco@impulsaenergia.mx', '2020-06-16 21:31:01', NULL, NULL),
(17, 'SERGIO', 'alex.hdez@digitalsoft.mx', '2020-06-16 21:46:56', NULL, NULL),
(18, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-06-16 23:08:00', NULL, NULL),
(19, 'SERGIO', 'alex.hdez@digitalsoft.mx', '2020-06-16 23:08:47', NULL, NULL),
(20, 'SERGIO', 'alex.hdez@digitalsoft.mx', '2020-06-16 23:41:03', NULL, NULL),
(21, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-06-16 23:41:32', NULL, NULL),
(22, 'SERGIO', 'alex.hdez@digitalsoft.mx', '2020-06-16 23:47:34', NULL, NULL),
(23, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-06-16 23:53:04', NULL, NULL),
(24, 'SERGIO', 'alex.hdez@digitalsoft.mx', '2020-06-16 23:57:29', NULL, NULL),
(25, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-06-17 00:01:20', NULL, NULL),
(26, 'Edurado', 'l4l0_love@hotmail.com', '2020-06-17 00:02:29', NULL, NULL),
(27, 'Invitado', 'admin@material.com', '2020-06-17 00:04:27', NULL, NULL),
(28, 'Edurado', 'l4l0_love@hotmail.com', '2020-06-17 00:09:49', NULL, NULL),
(29, 'Daniela', 'd.blanco@impulsaenergia.mx', '2020-06-17 00:12:12', NULL, NULL),
(30, 'Zuri', 'zuri@digitalsoft.mx', '2020-06-17 08:05:15', NULL, NULL),
(31, 'Daniela', 'd.blanco@impulsaenergia.mx', '2020-06-17 17:07:00', NULL, NULL),
(32, 'Zuri', 'zuri@digitalsoft.mx', '2020-06-17 17:10:31', NULL, NULL),
(33, 'Daniela', 'danielablanco1986@gmail.com', '2020-06-17 17:13:39', NULL, NULL),
(34, 'Daniela', 'danielablanco1986@gmail.com', '2020-06-17 17:16:31', NULL, NULL),
(35, 'Daniela', 'd.blanco@impulsaenergia.mx', '2020-06-17 17:29:29', NULL, NULL),
(36, 'Edurado', 'l4l0_love@hotmail.com', '2020-06-17 18:10:59', NULL, NULL),
(37, 'Zuri', 'zuri@digitalsoft.mx', '2020-06-17 19:20:05', NULL, NULL),
(38, 'Edurado', 'l4l0_love@hotmail.com', '2020-06-17 19:24:59', NULL, NULL),
(39, 'Daniela', 'danielablanco1986@gmail.com', '2020-06-17 20:27:36', NULL, NULL),
(40, 'Daniela', 'd.blanco@impulsaenergia.mx', '2020-06-17 20:29:25', NULL, NULL),
(41, 'Daniela', 'd.blanco@impulsaenergia.mx', '2020-06-18 00:09:30', NULL, NULL),
(42, 'Zuri', 'zuri@digitalsoft.mx', '2020-06-18 00:28:29', NULL, NULL),
(43, 'Edurado', 'l4l0_love@hotmail.com', '2020-06-18 00:42:17', NULL, NULL),
(44, 'Invitado', 'admin@material.com', '2020-06-18 01:01:31', NULL, NULL),
(45, 'Daniela', 'd.blanco@impulsaenergia.mx', '2020-06-18 01:01:32', NULL, NULL),
(46, 'Edurado', 'l4l0_love@hotmail.com', '2020-06-18 01:14:16', NULL, NULL),
(47, 'Edurado', 'l4l0_love@hotmail.com', '2020-06-18 02:55:27', NULL, NULL),
(48, 'SERGIO', 'alex.hdez@digitalsoft.mx', '2020-06-18 16:22:43', NULL, NULL),
(49, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-06-18 16:23:12', NULL, NULL),
(50, 'Edurado', 'l4l0_love@hotmail.com', '2020-06-18 16:43:15', NULL, NULL),
(51, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-06-18 16:52:51', NULL, NULL),
(52, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-06-18 17:34:52', NULL, NULL),
(53, 'Daniela', 'd.blanco@impulsaenergia.mx', '2020-06-18 17:55:00', NULL, NULL),
(54, 'SERGIO', 'alex.hdez@digitalsoft.mx', '2020-06-18 19:07:01', NULL, NULL),
(55, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-06-18 19:35:29', NULL, NULL),
(56, 'Edurado', 'l4l0_love@hotmail.com', '2020-06-18 19:54:11', NULL, NULL),
(57, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-06-18 19:54:26', NULL, NULL),
(58, 'SERGIO', 'alex.hdez@digitalsoft.mx', '2020-06-18 20:01:04', NULL, NULL),
(59, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-06-18 20:01:45', NULL, NULL),
(60, 'Daniela', 'danielablanco1986@gmail.com', '2020-06-18 20:18:19', NULL, NULL),
(61, 'Daniela', 'd.blanco@impulsaenergia.mx', '2020-06-18 21:06:20', NULL, NULL),
(62, 'Daniela', 'danielablanco1986@gmail.com', '2020-06-18 23:31:38', NULL, NULL),
(63, 'Daniela', 'd.blanco@impulsaenergia.mx', '2020-06-18 23:35:43', NULL, NULL),
(64, 'Edurado', 'l4l0_love@hotmail.com', '2020-06-19 00:08:22', NULL, NULL),
(65, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-06-19 00:41:38', NULL, NULL),
(66, 'SERGIO', 'alex.hdez@digitalsoft.mx', '2020-06-19 00:49:23', NULL, NULL),
(67, 'SERGIO', 'alex.hdez@digitalsoft.mx', '2020-06-19 00:52:46', NULL, NULL),
(68, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-06-19 01:40:24', NULL, NULL),
(69, 'SERGIO', 'alex.hdez@digitalsoft.mx', '2020-06-19 01:43:25', NULL, NULL),
(70, 'Zuri', 'zuri@digitalsoft.mx', '2020-06-19 01:44:08', NULL, NULL),
(71, 'Alex', 'alex.hdez@digitalsoft.mx', '2020-06-19 01:46:43', NULL, NULL),
(72, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-06-19 01:47:42', NULL, NULL),
(73, 'Daniela', 'd.blanco@impulsaenergia.mx', '2020-06-19 16:34:10', NULL, NULL),
(74, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-06-19 18:14:18', NULL, NULL),
(75, 'Alex', 'alex.hdez@digitalsoft.mx', '2020-06-19 18:21:25', NULL, NULL),
(76, 'Zuri', 'zuri@digitalsoft.mx', '2020-06-19 18:27:21', NULL, NULL),
(77, 'Edurado', 'l4l0_love@hotmail.com', '2020-06-19 18:41:31', NULL, NULL),
(78, 'Edurado', 'l4l0_love@hotmail.com', '2020-06-19 20:18:17', NULL, NULL),
(79, 'Edurado', 'l4l0_love@hotmail.com', '2020-06-19 20:33:06', NULL, NULL),
(80, 'Daniela', 'danielablanco1986@gmail.com', '2020-06-19 20:50:52', NULL, NULL),
(81, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-06-19 20:52:15', NULL, NULL),
(82, 'Daniela', 'd.blanco@impulsaenergia.mx', '2020-06-19 21:46:48', NULL, NULL),
(83, 'Alex', 'alex.hdez@digitalsoft.mx', '2020-06-19 21:49:46', NULL, NULL),
(84, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-06-19 21:50:30', NULL, NULL),
(85, 'Edurado', 'l4l0_love@hotmail.com', '2020-06-19 21:51:05', NULL, NULL),
(86, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-06-19 21:54:56', NULL, NULL),
(87, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-06-19 23:46:07', NULL, NULL),
(88, 'Edurado', 'l4l0_love@hotmail.com', '2020-06-20 01:58:42', NULL, NULL),
(89, 'Daniela', 'd.blanco@impulsaenergia.mx', '2020-06-20 02:17:49', NULL, NULL),
(90, 'Daniela', 'd.blanco@impulsaenergia.mx', '2020-06-22 17:00:44', NULL, NULL),
(91, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-06-22 18:31:17', NULL, NULL),
(92, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-06-22 19:28:46', NULL, NULL),
(93, 'Zuri', 'zuri@digitalsoft.mx', '2020-06-22 23:03:57', NULL, NULL),
(94, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-06-22 23:04:29', NULL, NULL),
(95, 'Daniela', 'd.blanco@impulsaenergia.mx', '2020-06-22 23:49:05', NULL, NULL),
(96, 'Daniela', 'd.blanco@impulsaenergia.mx', '2020-06-22 23:55:18', NULL, NULL),
(97, 'Daniela', 'd.blanco@impulsaenergia.mx', '2020-06-23 00:41:52', NULL, NULL),
(98, 'Daniela', 'danielablanco1986@gmail.com', '2020-06-23 00:44:41', NULL, NULL),
(99, 'Daniela', 'd.blanco@impulsaenergia.mx', '2020-06-23 00:58:26', NULL, NULL),
(100, 'Christian', 'c.petersen@impulsaenergia.mx', '2020-06-23 01:31:53', NULL, NULL),
(101, 'Christian', 'c.petersen@impulsaenergia.mx', '2020-06-23 02:53:30', NULL, NULL),
(102, 'Daniela', 'd.blanco@impulsaenergia.mx', '2020-06-23 16:30:34', NULL, NULL),
(103, 'Christian', 'c.petersen@impulsaenergia.mx', '2020-06-23 16:43:59', NULL, NULL),
(104, 'Alex', 'alex.hdez@digitalsoft.mx', '2020-06-23 17:17:07', NULL, NULL),
(105, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-06-23 17:20:04', NULL, NULL),
(106, 'Christian', 'c.petersen@impulsaenergia.mx', '2020-06-23 19:24:41', NULL, NULL),
(107, 'Christian', 'c.petersen@impulsaenergia.mx', '2020-06-23 19:25:16', NULL, NULL),
(108, 'Christian', 'c.petersen@impulsaenergia.mx', '2020-06-23 22:51:35', NULL, NULL),
(109, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-06-23 23:04:53', NULL, NULL),
(110, 'Edurado', 'l4l0_love@hotmail.com', '2020-06-23 23:22:06', NULL, NULL),
(111, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-06-23 23:56:01', NULL, NULL),
(112, 'Christian', 'c.petersen@impulsaenergia.mx', '2020-06-24 01:49:22', NULL, NULL),
(113, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-06-24 11:25:28', NULL, NULL),
(114, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-06-24 11:54:50', NULL, NULL),
(115, 'Daniela', 'd.blanco@impulsaenergia.mx', '2020-06-24 16:23:56', NULL, NULL),
(116, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-06-24 16:46:05', NULL, NULL),
(117, 'Zuri', 'zuri@digitalsoft.mx', '2020-06-24 16:51:51', NULL, NULL),
(118, 'Edurado', 'l4l0_love@hotmail.com', '2020-06-24 16:54:25', NULL, NULL),
(119, 'Edurado', 'l4l0_love@hotmail.com', '2020-06-24 18:00:41', NULL, NULL),
(120, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-06-24 18:44:59', NULL, NULL),
(121, 'Alex', 'alex.hdez@digitalsoft.mx', '2020-06-24 18:57:19', NULL, NULL),
(122, 'Edurado', 'l4l0_love@hotmail.com', '2020-06-24 19:17:26', NULL, NULL),
(123, 'Edurado', 'l4l0_love@hotmail.com', '2020-06-24 20:17:16', NULL, NULL),
(124, 'Zuri', 'zuri@digitalsoft.mx', '2020-06-24 20:39:27', NULL, NULL),
(125, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-06-24 20:57:25', NULL, NULL),
(126, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-06-24 21:05:41', NULL, NULL),
(127, 'Ricardo', 'ricardo.resendiz@digitalsoft.mx', '2020-06-24 21:14:12', NULL, NULL),
(128, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-06-24 22:17:59', NULL, NULL),
(129, 'Daniela', 'd.blanco@impulsaenergia.mx', '2020-06-24 22:20:51', NULL, NULL),
(130, 'Alex', 'alex.hdez@digitalsoft.mx', '2020-06-24 22:25:01', NULL, NULL),
(131, 'Christian', 'c.petersen@impulsaenergia.mx', '2020-06-24 23:54:14', NULL, NULL),
(132, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-06-25 04:30:39', NULL, NULL),
(133, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-06-25 04:31:31', NULL, NULL),
(134, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-06-25 04:32:55', NULL, NULL),
(135, 'Edurado', 'l4l0_love@hotmail.com', '2020-06-25 05:03:59', NULL, NULL),
(136, 'Edurado', 'l4l0_love@hotmail.com', '2020-06-25 05:23:46', NULL, NULL),
(137, 'Zuri', 'zuri@digitalsoft.mx', '2020-06-25 16:24:57', NULL, NULL),
(138, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-06-25 16:58:25', NULL, NULL),
(139, 'Daniela', 'd.blanco@impulsaenergia.mx', '2020-06-25 17:01:40', NULL, NULL),
(140, 'Liz', 'estacionladiagonal@hotmail.com', '2020-06-25 18:21:49', NULL, NULL),
(141, 'Daniela', 'danielablanco1986@gmail.com', '2020-06-25 18:27:35', NULL, NULL),
(142, 'Daniela', 'danielablanco1986@gmail.com', '2020-06-25 19:12:06', NULL, NULL),
(143, 'Daniela', 'd.blanco@impulsaenergia.mx', '2020-06-25 19:16:37', NULL, NULL),
(144, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-06-25 23:17:08', NULL, NULL),
(145, 'Zuri', 'zuri@digitalsoft.mx', '2020-06-25 23:33:21', NULL, NULL),
(146, 'Christian', 'c.petersen@impulsaenergia.mx', '2020-06-26 06:39:24', NULL, NULL),
(147, 'Zuri', 'zuri@digitalsoft.mx', '2020-06-26 16:41:36', NULL, NULL),
(148, 'Liz', 'estacionladiagonal@hotmail.com', '2020-06-26 17:00:07', NULL, NULL),
(149, 'Daniela', 'd.blanco@impulsaenergia.mx', '2020-06-26 17:30:32', NULL, NULL),
(150, 'Christian', 'c.petersen@impulsaenergia.mx', '2020-06-26 20:10:02', NULL, NULL),
(151, 'Christian', 'c.petersen@impulsaenergia.mx', '2020-06-26 22:54:17', NULL, NULL),
(152, 'Christian', 'c.petersen@impulsaenergia.mx', '2020-06-29 05:10:46', NULL, NULL),
(153, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-06-29 16:37:22', NULL, NULL),
(154, 'Daniela', 'd.blanco@impulsaenergia.mx', '2020-06-29 16:50:39', NULL, NULL),
(155, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-06-29 16:52:02', NULL, NULL),
(156, 'Liz', 'estacionladiagonal@hotmail.com', '2020-06-29 17:26:21', NULL, NULL),
(157, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-06-29 17:47:47', NULL, NULL),
(158, 'Christian', 'c.petersen@impulsaenergia.mx', '2020-06-29 18:59:31', NULL, NULL),
(159, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-06-29 20:10:17', NULL, NULL),
(160, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-06-29 20:43:19', NULL, NULL),
(161, 'Daniela', 'd.blanco@impulsaenergia.mx', '2020-06-30 16:34:33', NULL, NULL),
(162, 'Liz', 'estacionladiagonal@hotmail.com', '2020-06-30 17:11:54', NULL, NULL),
(163, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-06-30 18:08:25', NULL, NULL),
(164, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-06-30 18:10:51', NULL, NULL),
(165, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-06-30 19:04:23', NULL, NULL),
(166, 'Edurado', 'l4l0_love@hotmail.com', '2020-06-30 19:22:03', NULL, NULL),
(167, 'Edurado', 'l4l0_love@hotmail.com', '2020-06-30 20:30:22', NULL, NULL),
(168, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-06-30 23:29:21', NULL, NULL),
(169, 'Daniela', 'd.blanco@impulsaenergia.mx', '2020-06-30 23:37:59', NULL, NULL),
(170, 'Christian', 'c.petersen@impulsaenergia.mx', '2020-07-01 05:15:22', NULL, NULL),
(171, 'Edurado', 'l4l0_love@hotmail.com', '2020-07-01 07:00:40', NULL, NULL),
(172, 'Liz', 'estacionladiagonal@hotmail.com', '2020-07-01 16:59:43', NULL, NULL),
(173, 'Christian', 'c.petersen@impulsaenergia.mx', '2020-07-01 17:50:29', NULL, NULL),
(174, 'Christian', 'c.petersen@impulsaenergia.mx', '2020-07-01 20:26:48', NULL, NULL),
(175, 'Daniela', 'd.blanco@impulsaenergia.mx', '2020-07-01 20:38:00', NULL, NULL),
(176, 'Christian', 'c.petersen@impulsaenergia.mx', '2020-07-01 23:01:28', NULL, NULL),
(177, 'Daniela', 'd.blanco@impulsaenergia.mx', '2020-07-01 23:22:20', NULL, NULL),
(178, 'Edurado', 'l4l0_love@hotmail.com', '2020-07-01 23:47:21', NULL, NULL),
(179, 'Daniela', 'danielablanco1986@gmail.com', '2020-07-02 00:11:34', NULL, NULL),
(180, 'Daniela', 'd.blanco@impulsaenergia.mx', '2020-07-02 00:13:23', NULL, NULL),
(181, 'Edurado', 'l4l0_love@hotmail.com', '2020-07-02 00:19:17', NULL, NULL),
(182, 'Zuri', 'zuri@digitalsoft.mx', '2020-07-02 00:21:21', NULL, NULL),
(183, 'Christian', 'c.petersen@impulsaenergia.mx', '2020-07-02 01:56:36', NULL, NULL),
(184, 'Daniela', 'd.blanco@impulsaenergia.mx', '2020-07-02 16:30:24', NULL, NULL),
(185, 'Liz', 'estacionladiagonal@hotmail.com', '2020-07-02 16:42:40', NULL, NULL),
(186, 'Denisse', 'd.fragoso@impulsaenergia.mx', '2020-07-02 16:53:36', NULL, NULL),
(187, 'Christian', 'c.petersen@impulsaenergia.mx', '2020-07-02 17:28:18', NULL, NULL),
(188, 'Edurado', 'l4l0_love@hotmail.com', '2020-07-02 17:33:22', NULL, NULL),
(189, 'Denisse', 'd.fragoso@impulsaenergia.mx', '2020-07-02 17:49:21', NULL, NULL),
(190, 'Christian', 'c.petersen@impulsaenergia.mx', '2020-07-02 21:20:28', NULL, NULL),
(191, 'Christian', 'c.petersen@impulsaenergia.mx', '2020-07-03 00:54:07', NULL, NULL),
(192, 'Denisse', 'd.fragoso@impulsaenergia.mx', '2020-07-03 01:14:15', NULL, NULL),
(193, 'Denisse', 'd.fragoso@impulsaenergia.mx', '2020-07-03 16:31:03', NULL, NULL),
(194, 'Daniela', 'd.blanco@impulsaenergia.mx', '2020-07-03 18:28:46', NULL, NULL),
(195, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-07-03 19:13:15', NULL, NULL),
(196, 'Christian', 'c.petersen@impulsaenergia.mx', '2020-07-03 19:22:47', NULL, NULL),
(197, 'Alex', 'alex.hdez@digitalsoft.mx', '2020-07-03 19:28:08', NULL, NULL),
(198, 'Edurado', 'l4l0_love@hotmail.com', '2020-07-03 20:52:44', NULL, NULL),
(199, 'Denisse', 'd.fragoso@impulsaenergia.mx', '2020-07-03 21:13:11', NULL, NULL),
(200, 'Christian', 'c.petersen@impulsaenergia.mx', '2020-07-03 23:33:01', NULL, NULL),
(201, 'Christian', 'c.petersen@impulsaenergia.mx', '2020-07-04 19:47:36', NULL, NULL),
(202, 'Denisse', 'd.fragoso@impulsaenergia.mx', '2020-07-06 17:14:40', NULL, NULL),
(203, 'Liz', 'estacionladiagonal@hotmail.com', '2020-07-06 17:21:14', NULL, NULL),
(204, 'Zuri', 'zuri@digitalsoft.mx', '2020-07-06 18:18:54', NULL, NULL),
(205, 'Edurado', 'l4l0_love@hotmail.com', '2020-07-06 18:29:07', NULL, NULL),
(206, 'Denisse', 'd.fragoso@impulsaenergia.mx', '2020-07-06 18:31:07', NULL, NULL),
(207, 'Christian', 'c.petersen@impulsaenergia.mx', '2020-07-06 18:32:25', NULL, NULL),
(208, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-07-06 19:07:04', NULL, NULL),
(209, 'Denisse', 'd.fragoso@impulsaenergia.mx', '2020-07-06 19:43:53', NULL, NULL),
(210, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-07-07 00:22:19', NULL, NULL),
(211, 'Alex', 'alex.hdez@digitalsoft.mx', '2020-07-07 00:27:57', NULL, NULL),
(212, 'Edurado', 'l4l0_love@hotmail.com', '2020-07-07 00:31:06', NULL, NULL),
(213, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-07-07 00:31:29', NULL, NULL),
(214, 'Denisse', 'd.fragoso@impulsaenergia.mx', '2020-07-07 00:32:06', NULL, NULL),
(215, 'Liz', 'estacionladiagonal@hotmail.com', '2020-07-07 16:56:19', NULL, NULL),
(216, 'Denisse', 'd.fragoso@impulsaenergia.mx', '2020-07-07 17:52:27', NULL, NULL),
(217, 'Edurado', 'l4l0_love@hotmail.com', '2020-07-07 21:20:39', NULL, NULL),
(218, 'Denisse', 'd.fragoso@impulsaenergia.mx', '2020-07-07 22:59:18', NULL, NULL),
(219, 'Denisse', 'd.fragoso@impulsaenergia.mx', '2020-07-07 23:41:42', NULL, NULL),
(220, 'Christian', 'c.petersen@impulsaenergia.mx', '2020-07-07 23:52:54', NULL, NULL),
(221, 'Edurado', 'l4l0_love@hotmail.com', '2020-07-08 04:15:29', NULL, NULL),
(222, 'Edurado', 'l4l0_love@hotmail.com', '2020-07-08 08:41:49', NULL, NULL),
(223, 'Zuri', 'zuri@digitalsoft.mx', '2020-07-08 16:14:16', NULL, NULL),
(224, 'Christian', 'c.petersen@impulsaenergia.mx', '2020-07-08 17:56:13', NULL, NULL),
(225, 'Denisse', 'd.fragoso@impulsaenergia.mx', '2020-07-08 18:11:38', NULL, NULL),
(226, 'Zuri', 'zuri@digitalsoft.mx', '2020-07-08 18:15:20', NULL, NULL),
(227, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-07-08 18:48:51', NULL, NULL),
(228, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-07-08 19:08:35', NULL, NULL),
(229, 'Denisse', 'd.fragoso@impulsaenergia.mx', '2020-07-08 19:09:43', NULL, NULL),
(230, 'Edurado', 'l4l0_love@hotmail.com', '2020-07-08 22:19:04', NULL, NULL),
(231, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-07-08 23:02:45', NULL, NULL),
(232, 'Alex', 'alex.hdez@digitalsoft.mx', '2020-07-08 23:29:29', NULL, NULL),
(233, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-07-09 02:00:27', NULL, NULL),
(234, 'Denisse', 'd.fragoso@impulsaenergia.mx', '2020-07-09 16:36:24', NULL, NULL),
(235, 'Zuri', 'zuri@digitalsoft.mx', '2020-07-09 17:21:00', NULL, NULL),
(236, 'Edurado', 'l4l0_love@hotmail.com', '2020-07-09 17:25:16', NULL, NULL),
(237, 'Sergio', 's.luna@gas-solution.com', '2020-07-09 19:31:28', NULL, NULL),
(238, 'Edurado', 'l4l0_love@hotmail.com', '2020-07-09 19:58:57', NULL, NULL),
(239, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-07-09 20:08:53', NULL, NULL),
(240, 'Liz', 'estacionladiagonal@hotmail.com', '2020-07-10 16:47:06', NULL, NULL),
(241, 'Denisse', 'd.fragoso@impulsaenergia.mx', '2020-07-10 17:39:55', NULL, NULL),
(242, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-07-11 00:23:11', NULL, NULL),
(243, 'Denisse', 'd.fragoso@impulsaenergia.mx', '2020-07-13 16:14:02', NULL, NULL),
(244, 'Liz', 'estacionladiagonal@hotmail.com', '2020-07-13 17:30:39', NULL, NULL),
(245, 'Alex', 'alex.hdez@digitalsoft.mx', '2020-07-13 19:11:40', NULL, NULL),
(246, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-07-14 00:18:15', NULL, NULL),
(247, 'Denisse', 'd.fragoso@impulsaenergia.mx', '2020-07-14 16:42:53', NULL, NULL),
(248, 'Liz', 'estacionladiagonal@hotmail.com', '2020-07-14 17:28:52', NULL, NULL),
(249, 'Denisse', 'd.fragoso@impulsaenergia.mx', '2020-07-15 00:59:08', NULL, NULL),
(250, 'Denisse', 'd.fragoso@impulsaenergia.mx', '2020-07-15 16:37:11', NULL, NULL),
(251, 'Zuri', 'zuri@digitalsoft.mx', '2020-07-15 18:18:51', NULL, NULL),
(252, 'Edurado', 'l4l0_love@hotmail.com', '2020-07-15 18:23:35', NULL, NULL),
(253, 'Christian', 'c.petersen@impulsaenergia.mx', '2020-07-15 22:18:02', NULL, NULL),
(254, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-07-15 23:41:21', NULL, NULL),
(255, 'Denisse', 'd.fragoso@impulsaenergia.mx', '2020-07-16 01:03:02', NULL, NULL),
(256, 'Denisse', 'd.fragoso@impulsaenergia.mx', '2020-07-16 18:57:08', NULL, NULL),
(257, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-07-16 19:57:31', NULL, NULL),
(258, 'Christian', 'c.petersen@impulsaenergia.mx', '2020-07-16 20:00:00', NULL, NULL),
(259, 'Denisse', 'd.fragoso@impulsaenergia.mx', '2020-07-16 23:33:54', NULL, NULL),
(260, 'Christian', 'c.petersen@impulsaenergia.mx', '2020-07-17 01:39:46', NULL, NULL),
(261, 'Denisse', 'd.fragoso@impulsaenergia.mx', '2020-07-17 16:48:11', NULL, NULL),
(262, 'Liz', 'estacionladiagonal@hotmail.com', '2020-07-17 17:32:05', NULL, NULL),
(263, 'Zuri', 'zuri@digitalsoft.mx', '2020-07-17 18:10:30', NULL, NULL),
(264, 'Edurado', 'l4l0_love@hotmail.com', '2020-07-17 18:18:41', NULL, NULL),
(265, 'Denisse', 'd.fragoso@impulsaenergia.mx', '2020-07-17 18:45:44', NULL, NULL),
(266, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-07-17 23:41:42', NULL, NULL),
(267, 'Edurado', 'l4l0_love@hotmail.com', '2020-07-18 00:21:04', NULL, NULL),
(268, 'Zuri', 'zuri@digitalsoft.mx', '2020-07-18 00:36:26', NULL, NULL),
(269, 'Denisse', 'd.fragoso@impulsaenergia.mx', '2020-07-18 00:46:50', NULL, NULL),
(270, 'Alex', 'alex.hdez@digitalsoft.mx', '2020-07-18 00:52:50', NULL, NULL),
(271, 'Alex', 'alex.hdez@digitalsoft.mx', '2020-07-18 01:18:29', NULL, NULL),
(272, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-07-18 01:19:20', NULL, NULL),
(273, 'Edurado', 'l4l0_love@hotmail.com', '2020-07-18 01:23:29', NULL, NULL),
(274, 'Lalo', 'f030016@gmail.com', '2020-07-18 01:25:13', NULL, NULL),
(275, 'Denisse', 'd.fragoso@impulsaenergia.mx', '2020-07-20 20:40:00', NULL, NULL),
(276, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-07-20 23:55:53', NULL, NULL),
(277, 'Denisse', 'd.fragoso@impulsaenergia.mx', '2020-07-21 00:30:22', NULL, NULL),
(278, 'Denisse', 'd.fragoso@impulsaenergia.mx', '2020-07-21 17:48:59', NULL, NULL),
(279, 'Zuri', 'zuri@digitalsoft.mx', '2020-07-21 19:12:08', NULL, NULL),
(280, 'Edurado', 'l4l0_love@hotmail.com', '2020-07-21 20:34:23', NULL, NULL),
(281, 'Denisse', 'd.fragoso@impulsaenergia.mx', '2020-07-21 21:22:46', NULL, NULL),
(282, 'Denisse', 'd.fragoso@impulsaenergia.mx', '2020-07-21 21:43:57', NULL, NULL),
(283, 'Edurado', 'l4l0_love@hotmail.com', '2020-07-21 21:47:21', NULL, NULL),
(284, 'Edurado', 'l4l0_love@hotmail.com', '2020-07-21 21:48:20', NULL, NULL),
(285, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-07-22 16:30:29', NULL, NULL),
(286, 'Denisse', 'd.fragoso@impulsaenergia.mx', '2020-07-22 18:58:22', NULL, NULL),
(287, 'Denisse', 'd.fragoso@impulsaenergia.mx', '2020-07-22 20:12:04', NULL, NULL),
(288, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-07-22 20:22:18', NULL, NULL),
(289, 'Denisse', 'd.fragoso@impulsaenergia.mx', '2020-07-23 17:53:46', NULL, NULL),
(290, 'Denisse', 'd.fragoso@impulsaenergia.mx', '2020-07-23 18:12:10', NULL, NULL),
(291, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-07-23 18:13:37', NULL, NULL),
(292, 'Christian', 'c.petersen@impulsaenergia.mx', '2020-07-24 02:13:04', NULL, NULL),
(293, 'Denisse', 'd.fragoso@impulsaenergia.mx', '2020-07-24 17:48:29', NULL, NULL),
(294, 'Christian', 'c.petersen@impulsaenergia.mx', '2020-07-24 18:07:56', NULL, NULL),
(295, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-07-24 22:30:25', NULL, NULL),
(296, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-07-25 20:46:11', NULL, NULL),
(297, 'Christian', 'c.petersen@impulsaenergia.mx', '2020-07-26 19:21:17', NULL, NULL),
(298, 'Christian', 'c.petersen@impulsaenergia.mx', '2020-07-26 22:52:43', NULL, NULL),
(299, 'Denisse', 'd.fragoso@impulsaenergia.mx', '2020-07-27 18:19:07', NULL, NULL),
(300, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-07-27 23:42:43', NULL, NULL),
(301, 'Zuri', 'zuri@digitalsoft.mx', '2020-07-27 23:45:35', NULL, NULL),
(302, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-07-28 00:15:09', NULL, NULL),
(303, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-07-28 00:18:10', NULL, NULL),
(304, 'Denisse', 'd.fragoso@impulsaenergia.mx', '2020-07-28 19:23:54', NULL, NULL),
(305, 'Christian', 'c.petersen@impulsaenergia.mx', '2020-07-28 19:51:42', NULL, NULL),
(306, 'Zuri', 'zuri@digitalsoft.mx', '2020-07-28 22:57:07', NULL, NULL),
(307, 'Edurado', 'l4l0_love@hotmail.com', '2020-07-28 23:07:07', NULL, NULL),
(308, 'Denisse', 'd.fragoso@impulsaenergia.mx', '2020-07-29 00:49:35', NULL, NULL),
(309, 'Denisse', 'd.fragoso@impulsaenergia.mx', '2020-07-29 18:28:24', NULL, NULL),
(310, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-07-29 20:01:21', NULL, NULL),
(311, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-07-30 00:18:43', NULL, NULL),
(312, 'Christian', 'c.petersen@impulsaenergia.mx', '2020-07-30 00:33:48', NULL, NULL),
(313, 'Zuri', 'zuri@digitalsoft.mx', '2020-07-30 02:09:29', NULL, NULL),
(314, 'Denisse', 'd.fragoso@impulsaenergia.mx', '2020-07-30 16:20:13', NULL, NULL),
(315, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-07-30 18:51:38', NULL, NULL),
(316, 'Alex', 'alex.hdez@digitalsoft.mx', '2020-07-30 19:06:21', NULL, NULL),
(317, 'Christian', 'c.petersen@impulsaenergia.mx', '2020-07-30 19:18:38', NULL, NULL),
(318, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-07-30 21:34:38', NULL, NULL),
(319, 'Zuri', 'zuri@digitalsoft.mx', '2020-07-30 21:37:31', NULL, NULL),
(320, 'Alejandro', 'alex.hdez@impulsaenergia.mx', '2020-07-30 21:52:10', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_modulo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desplegable` int(11) DEFAULT NULL,
  `ruta` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_role` int(11) DEFAULT NULL,
  `icono` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `menus`
--

INSERT INTO `menus` (`id`, `name_modulo`, `desplegable`, `ruta`, `id_role`, `icono`, `created_at`, `updated_at`) VALUES
(1, 'dashboard', 0, 'home', 1, 'dashboard', '2020-06-09 22:33:29', '2020-06-09 22:33:29'),
(2, 'Usuarios', 0, 'user', 1, 'perm_identity', '2020-06-09 22:33:29', '2020-06-09 22:33:29'),
(3, 'Cotizador', 0, 'cotizador', 1, 'local_atm', '2020-06-09 22:33:30', '2020-06-09 22:33:30'),
(4, 'Alta de Terminales', 0, 'terminales', 1, 'home_work', '2020-06-09 22:33:30', '2020-06-09 22:33:30'),
(5, 'Fee', 0, 'fits', 1, 'import_export', '2020-06-09 22:33:30', '2020-06-09 22:33:30'),
(6, 'Tabla de Descuentos Valero', 0, 'table_descount', 1, 'local_offer', '2020-06-09 22:33:30', '2020-06-09 22:33:30'),
(7, 'Tabla de Descuentos Pemex', 0, 'pemex', 1, 'local_parking', '2020-06-09 22:33:30', '2020-06-09 22:33:30'),
(8, 'Captura de precios pemex', 0, 'competencia', 1, 'thumbs_up_down', '2020-06-09 22:33:30', '2020-06-09 22:33:30'),
(9, 'Historial de Actividades', 0, 'actividades', 1, 'history', '2020-06-09 22:33:30', '2020-06-09 22:33:30'),
(10, 'Captura de precios policon', 0, 'policon', 1, 'domain', '2020-06-01 10:00:00', '2020-06-01 10:00:00'),
(11, 'Captura de precios impulsa', 0, 'impulsa', 1, 'offline_bolt', '2020-06-05 20:19:48', '2020-06-05 20:19:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu_role`
--

CREATE TABLE `menu_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `menu_role`
--

INSERT INTO `menu_role` (`id`, `menu_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 2, 1, NULL, NULL),
(4, 3, 1, NULL, NULL),
(6, 4, 1, NULL, NULL),
(7, 5, 1, NULL, NULL),
(8, 6, 1, NULL, NULL),
(9, 7, 1, NULL, NULL),
(10, 8, 1, NULL, NULL),
(12, 10, 1, NULL, NULL),
(13, 11, 1, NULL, NULL),
(14, 9, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(498, '2014_03_09_102119_create_terminals_table', 1),
(499, '2014_03_10_154105_create_fits_table', 1),
(500, '2014_03_12_120126_create_estacions_table', 1),
(501, '2014_03_12_120550_create_datosubicacions_table', 1),
(502, '2014_10_12_000000_create_users_table', 1),
(503, '2014_10_12_100000_create_password_resets_table', 1),
(504, '2020_03_10_010347_create_roles_table', 1),
(505, '2020_03_10_010830_create_role_user_table', 1),
(506, '2020_03_10_115712_create_menus_table', 1),
(507, '2020_03_19_133252_create_estacion_user_table', 1),
(508, '2020_03_27_113642_create_discounts_table', 1),
(509, '2020_03_30_045200_create_competition_table', 1),
(510, '2020_03_31_162806_create_lives_table', 1),
(511, '2020_03_31_162927_create_discount_life_table', 1),
(512, '2020_03_31_171145_create_prices_table', 1),
(513, '2020_04_07_184804_create_valeros_table', 1),
(514, '2020_04_29_005504_create_menu_role_table', 1),
(515, '2020_06_01_014220_create_policons_table', 1),
(516, '2020_06_01_015249_create_price_policons_table', 1),
(517, '2020_06_01_025402_create_impulsas_table', 1),
(518, '2020_06_01_030022_create_price_impulsas_table', 1),
(519, '2020_06_09_163525_create_login_acts_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `policons`
--

CREATE TABLE `policons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `terminal_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `policons`
--

INSERT INTO `policons` (`id`, `nombre`, `terminal_id`, `created_at`, `updated_at`) VALUES
(1, 'Policon', 1, '2020-06-01 13:05:49', '2020-06-01 13:05:49'),
(2, 'Policon', 2, '2020-06-01 13:05:49', '2020-06-01 13:05:49'),
(3, 'Policon', 3, '2020-06-01 13:05:49', '2020-06-01 13:05:49'),
(4, 'Policon', 4, '2020-06-01 13:05:49', '2020-06-01 13:05:49'),
(5, 'Policon', 5, '2020-06-01 13:05:49', '2020-06-01 13:05:49'),
(6, 'Policon', 6, '2020-06-17 19:28:10', '2020-06-17 19:28:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prices`
--

CREATE TABLE `prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `competition_id` bigint(20) UNSIGNED NOT NULL,
  `precio_regular` double(12,3) DEFAULT NULL,
  `precio_premium` double(12,3) DEFAULT NULL,
  `precio_disel` double(12,3) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `prices`
--

INSERT INTO `prices` (`id`, `competition_id`, `precio_regular`, `precio_premium`, `precio_disel`, `created_at`, `updated_at`) VALUES
(3, 3, 15.410, 15.140, 16.150, '2020-06-01 23:20:35', '2020-06-24 18:29:01'),
(6, 1, 0.000, 0.000, 0.000, '2020-04-02 14:20:35', '2020-04-02 14:20:35'),
(7, 1, 0.000, 0.000, 0.000, '2020-04-03 14:20:35', '2020-04-03 14:20:35'),
(8, 1, 13.290, 13.560, 14.060, '2020-04-04 14:20:35', '2020-05-01 06:51:52'),
(9, 1, 0.000, 0.000, 0.000, '2020-04-07 11:20:35', '2020-04-07 11:20:35'),
(10, 1, 13.193, 13.366, 16.697, '2020-04-08 11:20:35', '2020-04-08 11:20:35'),
(11, 2, 0.000, 0.000, 0.000, '2020-04-02 14:20:35', '2020-04-02 14:20:35'),
(12, 2, 0.000, 0.000, 0.000, '2020-04-03 14:20:35', '2020-04-03 14:20:35'),
(13, 2, 0.000, 0.000, 0.000, '2020-04-04 14:20:35', '2020-04-04 14:20:35'),
(14, 2, 0.000, 0.000, 0.000, '2020-04-07 11:20:35', '2020-04-07 11:20:35'),
(15, 2, 13.193, 13.366, 16.697, '2020-04-08 11:20:35', '2020-04-08 11:20:35'),
(16, 4, 0.000, 0.000, 0.000, '2020-04-02 14:20:35', '2020-04-02 14:20:35'),
(17, 4, 0.000, 0.000, 0.000, '2020-04-03 14:20:35', '2020-04-03 14:20:35'),
(18, 4, 0.000, 0.000, 0.000, '2020-04-04 14:20:35', '2020-04-04 14:20:35'),
(19, 4, 0.000, 0.000, 0.000, '2020-04-07 11:20:35', '2020-04-07 11:20:35'),
(20, 4, 13.193, 13.366, 16.697, '2020-04-08 11:20:35', '2020-04-08 11:20:35'),
(21, 5, 0.000, 0.000, 0.000, '2020-04-02 14:20:35', '2020-04-02 14:20:35'),
(22, 5, 0.000, 0.000, 0.000, '2020-04-03 14:20:35', '2020-04-03 14:20:35'),
(23, 5, 0.000, 0.000, 0.000, '2020-04-04 14:20:35', '2020-04-04 14:20:35'),
(24, 5, 0.000, 0.000, 0.000, '2020-04-07 11:20:35', '2020-04-07 11:20:35'),
(25, 5, 13.193, 13.366, 16.697, '2020-04-08 11:20:35', '2020-04-08 11:20:35'),
(26, 3, 17.731, 17.257, 18.156, '2020-03-02 21:20:35', '2020-03-02 21:20:35'),
(27, 3, 17.731, 17.257, 18.156, '2020-03-03 21:20:35', '2020-03-03 21:20:35'),
(28, 3, 17.590, 17.255, 18.268, '2020-03-04 21:20:35', '2020-03-04 21:20:35'),
(29, 3, 17.914, 17.562, 18.536, '2020-03-05 21:20:35', '2020-03-05 21:20:35'),
(30, 3, 17.445, 17.318, 18.450, '2020-03-06 21:20:35', '2020-03-06 21:20:35'),
(31, 3, 17.986, 17.816, 18.545, '2020-03-07 21:20:35', '2020-03-07 21:20:35'),
(32, 3, 17.801, 17.638, 18.412, '2020-03-08 21:20:35', '2020-03-08 21:20:35'),
(33, 3, 17.801, 17.638, 18.412, '2020-03-09 21:20:35', '2020-03-09 21:20:35'),
(34, 3, 17.801, 17.638, 18.412, '2020-03-10 21:20:35', '2020-03-10 21:20:35'),
(35, 3, 17.084, 17.079, 17.935, '2020-03-11 21:20:35', '2020-03-11 21:20:35'),
(36, 3, 15.755, 15.824, 16.861, '2020-03-12 21:20:35', '2020-03-12 21:20:35'),
(37, 3, 15.653, 15.936, 17.382, '2020-03-13 21:20:35', '2020-03-13 21:20:35'),
(38, 3, 15.499, 16.231, 17.401, '2020-03-14 21:20:35', '2020-03-14 21:20:35'),
(39, 3, 14.686, 15.083, 17.247, '2020-03-15 21:20:35', '2020-03-15 21:20:35'),
(40, 3, 14.686, 15.083, 17.247, '2020-03-16 21:20:35', '2020-03-16 21:20:35'),
(41, 3, 14.686, 15.083, 17.247, '2020-03-17 21:20:35', '2020-03-17 21:20:35'),
(42, 3, 14.813, 15.250, 17.001, '2020-03-18 21:20:35', '2020-03-18 21:20:35'),
(43, 3, 14.813, 15.250, 17.001, '2020-03-19 21:20:35', '2020-03-19 21:20:35'),
(44, 3, 13.577, 13.964, 16.611, '2020-03-20 21:20:35', '2020-03-20 21:20:35'),
(45, 3, 13.011, 13.524, 16.276, '2020-03-21 21:20:35', '2020-03-21 21:20:35'),
(46, 3, 13.525, 13.645, 16.800, '2020-03-22 21:20:35', '2020-03-22 21:20:35'),
(47, 3, 13.525, 13.645, 16.800, '2020-03-23 21:20:35', '2020-03-23 21:20:35'),
(48, 3, 13.525, 13.645, 16.800, '2020-03-24 21:20:35', '2020-03-24 21:20:35'),
(49, 3, 12.702, 12.923, 17.173, '2020-03-25 21:20:35', '2020-03-25 21:20:35'),
(50, 3, 11.841, 11.930, 17.056, '2020-03-26 21:20:35', '2020-03-26 21:20:35'),
(51, 3, 11.995, 12.241, 17.543, '2020-03-27 21:20:35', '2020-03-27 21:20:35'),
(52, 3, 12.428, 12.719, 17.474, '2020-03-28 21:20:35', '2020-03-28 21:20:35'),
(53, 3, 12.103, 12.496, 16.728, '2020-03-29 21:20:35', '2020-03-29 21:20:35'),
(54, 3, 12.103, 12.496, 16.728, '2020-03-30 21:20:35', '2020-03-30 21:20:35'),
(55, 3, 12.103, 12.496, 16.728, '2020-03-31 21:20:35', '2020-03-31 21:20:35'),
(56, 3, 12.624, 12.875, 16.985, '2020-04-01 21:20:35', '2020-04-01 21:20:35'),
(57, 3, 12.737, 13.183, 17.007, '2020-04-02 03:20:35', '2020-04-03 03:20:35'),
(58, 3, 12.399, 12.884, 16.614, '2020-04-03 03:20:35', '2020-04-04 03:20:35'),
(59, 3, 12.312, 12.636, 16.356, '2020-04-04 03:20:35', '2020-04-05 03:20:35'),
(60, 3, 13.193, 13.366, 16.697, '2020-04-05 03:20:35', '2020-04-06 01:20:35'),
(61, 3, 13.193, 13.366, 16.697, '2020-04-06 23:20:35', '2020-04-06 23:20:35'),
(62, 3, 13.193, 13.366, 16.697, '2020-04-07 23:20:35', '2020-04-07 23:20:35'),
(63, 3, 13.369, 13.582, 17.432, '2020-04-08 23:20:35', '2020-04-08 23:20:35'),
(64, 3, 13.383, 13.475, 17.193, '2020-04-09 23:20:35', '2020-04-09 23:20:35'),
(65, 3, 13.164, 13.260, 16.715, '2020-04-10 23:20:35', '2020-04-10 23:20:35'),
(66, 3, 13.164, 13.260, 16.715, '2020-04-11 23:20:35', '2020-04-11 23:20:35'),
(67, 3, 13.164, 13.260, 16.715, '2020-04-12 23:20:35', '2020-04-12 23:20:35'),
(68, 3, 13.164, 13.260, 16.715, '2020-04-13 03:43:20', '2020-04-15 03:43:20'),
(69, 3, 13.164, 13.260, 16.715, '2020-04-14 03:43:51', '2020-04-15 03:43:51'),
(70, 3, 13.164, 13.260, 16.715, '2020-04-15 03:44:18', '2020-04-15 03:44:18'),
(71, 3, 13.292, 13.238, 16.509, '2020-04-16 12:21:56', '2020-04-16 12:21:56'),
(72, 3, 13.497, 13.523, 16.138, '2020-04-17 11:08:39', '2020-04-17 11:08:39'),
(73, 3, 13.497, 13.523, 16.138, '2020-04-18 11:24:38', '2020-04-18 11:24:38'),
(74, 3, 13.497, 13.523, 16.138, '2020-04-19 15:50:00', '2020-04-19 15:50:00'),
(75, 3, 13.497, 13.523, 16.138, '2020-04-20 15:50:00', '2020-04-20 15:50:00'),
(76, 3, 13.497, 13.523, 16.138, '2020-04-21 15:58:07', '2020-04-21 15:58:07'),
(77, 3, 13.340, 13.418, 16.407, '2020-04-22 18:12:46', '2020-04-22 18:12:46'),
(78, 3, 13.155, 13.290, 15.914, '2020-04-23 11:21:25', '2020-04-23 11:21:25'),
(79, 3, 12.326, 13.290, 14.812, '2020-04-24 16:06:31', '2020-04-24 16:06:31'),
(80, 3, 13.201, 13.365, 14.921, '2020-04-25 08:53:03', '2020-04-25 08:53:03'),
(81, 3, 13.139, 13.303, 14.873, '2020-04-26 16:31:32', '2020-04-26 16:31:32'),
(82, 3, 13.139, 13.303, 14.873, '2020-04-27 16:32:15', '2020-04-27 16:32:15'),
(83, 3, 13.139, 13.303, 14.873, '2020-04-28 16:32:50', '2020-04-28 16:32:50'),
(84, 3, 13.216, 13.422, 14.175, '2020-04-29 18:23:57', '2020-04-29 18:23:57'),
(85, 3, 13.160, 13.440, 14.020, '2020-04-30 13:01:31', '2020-04-30 13:01:31'),
(86, 3, 13.295, 13.562, 14.063, '2020-05-01 06:56:32', '2020-05-01 06:56:32'),
(87, 3, 13.627, 13.848, 14.601, '2020-05-02 06:12:18', '2020-05-02 06:12:18'),
(88, 3, 13.770, 13.848, 14.601, '2020-05-03 06:12:18', '2020-05-03 06:12:18'),
(89, 3, 13.770, 13.848, 14.601, '2020-05-04 06:12:18', '2020-05-04 06:12:18'),
(90, 3, 13.770, 13.848, 14.601, '2020-05-05 06:12:18', '2020-05-05 06:12:18'),
(91, 3, 13.770, 13.990, 15.291, '2020-05-06 06:12:18', '2020-05-06 06:12:18'),
(92, 3, 14.359, 14.368, 15.430, '2020-05-07 02:06:18', '2020-05-07 02:06:18'),
(93, 3, 14.878, 14.838, 16.038, '2020-05-08 04:49:31', '2020-05-08 04:49:31'),
(94, 3, 14.842, 14.786, 15.510, '2020-05-09 03:45:32', '2020-05-09 03:45:32'),
(95, 3, 15.203, 15.132, 15.643, '2020-05-10 04:33:26', '2020-05-10 04:33:26'),
(96, 3, 15.203, 15.132, 15.643, '2020-05-11 04:33:26', '2020-05-11 04:33:26'),
(97, 3, 15.203, 15.132, 15.643, '2020-05-12 04:33:26', '2020-05-12 04:33:26'),
(98, 3, 15.226, 15.139, 16.059, '2020-05-13 04:01:46', '2020-05-13 04:01:46'),
(99, 3, 15.800, 15.041, 15.950, '2020-05-14 04:13:09', '2020-05-14 04:13:09'),
(100, 3, 15.099, 15.000, 15.762, '2020-05-15 04:13:09', '2020-05-15 04:13:09'),
(101, 3, 14.672, 14.591, 15.742, '2020-05-16 04:13:09', '2020-05-16 04:13:09'),
(102, 3, 15.234, 15.136, 16.273, '2020-05-17 04:13:09', '2020-05-17 04:13:09'),
(103, 3, 15.234, 15.136, 16.273, '2020-05-18 04:13:09', '2020-05-18 04:13:09'),
(104, 3, 15.234, 15.136, 16.273, '2020-05-19 04:13:09', '2020-05-19 04:13:09'),
(105, 3, 15.531, 15.270, 16.448, '2020-05-20 04:13:09', '2020-05-20 04:13:09'),
(106, 3, 15.779, 15.602, 16.976, '2020-05-21 04:13:09', '2020-05-21 04:13:09'),
(107, 3, 15.940, 15.710, 16.640, '2020-05-21 17:00:00', '2020-05-26 10:52:50'),
(108, 3, 15.810, 15.600, 16.680, '2020-05-22 17:00:00', '2020-05-26 10:53:23'),
(109, 3, 15.710, 15.490, 16.780, '2020-05-23 17:00:00', '2020-05-26 10:53:59'),
(110, 3, 15.710, 15.490, 16.780, '2020-05-24 17:00:00', '2020-05-26 10:54:32'),
(111, 3, 15.710, 15.490, 16.780, '2020-05-25 17:00:00', '2020-05-26 10:54:58'),
(112, 3, 15.610, 15.330, 16.661, '2020-05-26 10:00:00', '2020-06-02 00:37:37'),
(113, 3, 15.610, 15.330, 16.661, '2020-05-27 10:00:00', '2020-06-02 00:38:19'),
(114, 3, 15.609, 15.366, 16.698, '2020-05-28 10:00:00', '2020-06-02 00:39:05'),
(115, 3, 15.361, 15.108, 16.541, '2020-05-29 10:00:00', '2020-06-02 00:39:43'),
(116, 3, 15.360, 15.108, 16.541, '2020-05-29 12:00:00', '2020-06-02 04:54:33'),
(117, 3, 15.410, 15.140, 16.150, '2020-05-30 12:00:00', '2020-06-02 04:55:33'),
(118, 3, 15.410, 15.140, 16.150, '2020-05-31 12:00:00', '2020-06-02 04:56:13'),
(119, 3, 15.770, 15.350, 16.540, '2020-06-02 12:00:00', '2020-06-05 20:22:36'),
(120, 3, 15.770, 15.350, 16.540, '2020-06-03 07:00:00', '2020-06-16 19:18:44'),
(121, 3, 15.990, 15.490, 16.850, '2020-06-04 07:00:00', '2020-06-16 19:19:08'),
(122, 3, 15.770, 15.190, 16.390, '2020-06-05 07:00:00', '2020-06-16 19:19:36'),
(123, 3, 16.070, 15.540, 16.540, '2020-06-06 07:00:00', '2020-06-16 19:20:08'),
(125, 3, 16.070, 15.540, 16.540, '2020-06-07 07:00:00', '2020-06-16 20:45:04'),
(126, 3, 16.070, 15.540, 16.540, '2020-06-08 07:00:00', '2020-06-16 20:46:33'),
(127, 3, 16.440, 15.920, 17.030, '2020-06-09 07:00:00', '2020-06-16 20:47:40'),
(128, 3, 16.360, 15.910, 16.890, '2020-06-10 07:00:00', '2020-06-16 20:48:21'),
(129, 3, 16.510, 16.070, 17.090, '2020-06-11 07:00:00', '2020-06-16 20:48:58'),
(130, 3, 16.550, 16.190, 17.390, '2020-06-12 07:00:00', '2020-06-16 20:49:37'),
(131, 3, 16.550, 16.190, 17.390, '2020-06-13 07:00:00', '2020-06-16 20:50:20'),
(132, 3, 16.550, 16.190, 17.390, '2020-06-14 07:00:00', '2020-06-16 20:51:02'),
(133, 3, 16.550, 16.190, 17.390, '2020-06-15 07:00:00', '2020-06-16 20:51:54'),
(134, 3, 16.200, 15.710, 17.130, '2020-06-16 07:00:00', '2020-06-16 20:52:49'),
(135, 3, 16.600, 16.110, 17.400, '2020-06-17 07:00:00', '2020-06-16 23:46:50'),
(136, 1, 15.140, 15.400, 15.870, '2020-06-01 07:00:00', '2020-06-17 17:53:57'),
(153, 2, 15.920, 16.150, 16.090, '2020-06-01 07:00:00', '2020-06-17 18:14:23'),
(154, 2, 16.130, 16.360, 16.480, '2020-06-02 07:00:00', '2020-06-17 18:15:33'),
(155, 2, 16.130, 16.360, 16.480, '2020-06-03 07:00:00', '2020-06-17 18:16:25'),
(156, 2, 16.280, 16.490, 16.790, '2020-06-04 07:00:00', '2020-06-17 18:17:24'),
(157, 2, 16.100, 16.190, 16.400, '2020-06-05 07:00:00', '2020-06-17 18:18:17'),
(158, 2, 16.480, 16.580, 16.550, '2020-06-06 07:00:00', '2020-06-17 18:19:07'),
(159, 2, 16.480, 16.580, 16.550, '2020-06-07 07:00:00', '2020-06-17 18:20:16'),
(160, 2, 16.480, 16.580, 16.550, '2020-06-08 07:00:00', '2020-06-17 18:22:54'),
(161, 2, 16.850, 16.970, 17.050, '2020-06-09 07:00:00', '2020-06-17 18:24:46'),
(162, 2, 16.850, 16.970, 17.050, '2020-06-10 07:00:00', '2020-06-17 18:26:29'),
(163, 2, 16.910, 17.100, 17.200, '2020-06-11 07:00:00', '2020-06-17 18:29:09'),
(164, 2, 17.010, 17.220, 17.410, '2020-06-12 07:00:00', '2020-06-17 18:29:47'),
(165, 2, 17.500, 18.010, 19.020, '2020-06-13 07:00:00', '2020-06-17 18:30:23'),
(166, 2, 18.220, 18.730, 19.010, '2020-06-14 07:00:00', '2020-06-17 18:31:03'),
(167, 2, 18.720, 18.790, 18.140, '2020-06-15 07:00:00', '2020-06-17 18:31:45'),
(168, 2, 20.510, 21.780, 21.560, '2020-06-16 07:00:00', '2020-06-17 18:33:00'),
(169, 2, 16.940, 17.070, 17.420, '2020-06-17 07:00:00', '2020-06-17 18:34:05'),
(170, 5, 15.240, 15.920, 15.880, '2020-06-01 07:00:00', '2020-06-17 18:35:22'),
(171, 5, 15.610, 16.130, 16.280, '2020-06-02 07:00:00', '2020-06-17 18:36:17'),
(172, 5, 15.610, 16.130, 16.280, '2020-06-03 07:00:00', '2020-06-17 18:37:28'),
(173, 5, 15.820, 16.270, 16.590, '2020-06-04 07:00:00', '2020-06-17 18:38:09'),
(174, 5, 15.740, 15.970, 16.250, '2020-06-05 07:00:00', '2020-06-17 18:39:08'),
(175, 5, 16.050, 16.320, 16.400, '2020-06-06 07:00:00', '2020-06-17 18:39:46'),
(176, 5, 16.050, 16.320, 16.400, '2020-06-07 07:00:00', '2020-06-17 18:40:28'),
(178, 5, 16.050, 16.320, 16.400, '2020-06-08 07:00:00', '2020-06-17 18:47:42'),
(179, 5, 16.410, 16.700, 16.890, '2020-06-09 07:00:00', '2020-06-17 18:48:27'),
(180, 5, 16.410, 16.700, 16.890, '2020-06-10 07:00:00', '2020-06-17 18:49:08'),
(181, 5, 16.490, 16.850, 17.050, '2020-06-11 07:00:00', '2020-06-17 18:50:15'),
(182, 5, 16.520, 16.970, 17.250, '2020-06-12 07:00:00', '2020-06-17 18:50:54'),
(183, 5, 15.770, 16.660, 18.320, '2020-06-13 07:00:00', '2020-06-17 18:52:25'),
(184, 5, 17.500, 18.010, 19.020, '2020-06-14 07:00:00', '2020-06-17 18:53:08'),
(185, 5, 20.660, 17.760, 19.090, '2020-06-15 07:00:00', '2020-06-17 18:57:08'),
(186, 5, 17.510, 18.120, 18.600, '2020-06-16 07:00:00', '2020-06-17 19:02:08'),
(187, 5, 16.500, 16.810, 17.260, '2020-06-17 07:00:00', '2020-06-17 19:03:12'),
(188, 1, 15.510, 15.600, 16.260, '2020-06-02 07:00:00', '2020-06-17 19:05:19'),
(189, 1, 15.510, 15.600, 16.260, '2020-06-03 07:00:00', '2020-06-17 19:05:51'),
(190, 1, 15.720, 15.740, 16.570, '2020-06-04 07:00:00', '2020-06-17 19:06:34'),
(191, 1, 15.690, 15.450, 16.280, '2020-06-05 07:00:00', '2020-06-17 19:07:14'),
(192, 1, 15.990, 15.800, 16.440, '2020-06-06 07:00:00', '2020-06-17 19:07:52'),
(193, 1, 15.990, 15.800, 16.440, '2020-06-07 07:00:00', '2020-06-17 19:08:25'),
(194, 1, 15.990, 15.800, 16.440, '2020-06-08 07:00:00', '2020-06-17 19:08:58'),
(195, 1, 16.360, 16.170, 16.930, '2020-06-09 07:00:00', '2020-06-17 19:09:30'),
(197, 1, 16.360, 16.170, 16.930, '2020-06-10 07:00:00', '2020-06-17 19:10:33'),
(198, 1, 16.440, 16.320, 17.090, '2020-06-11 07:00:00', '2020-06-17 19:11:25'),
(200, 1, 16.470, 16.440, 17.290, '2020-06-12 07:00:00', '2020-06-17 19:12:52'),
(201, 1, 12.650, 14.320, 18.210, '2020-06-13 07:00:00', '2020-06-17 19:13:46'),
(202, 1, 17.550, 18.140, 19.080, '2020-06-14 07:00:00', '2020-06-17 19:14:28'),
(203, 1, 17.550, 18.140, 19.080, '2020-06-15 07:00:00', '2020-06-17 19:15:07'),
(204, 1, 12.630, 14.320, 18.190, '2020-06-16 07:00:00', '2020-06-17 19:15:45'),
(205, 1, 16.450, 16.290, 17.300, '2020-06-17 07:00:00', '2020-06-17 19:16:22'),
(208, 4, 15.670, 15.780, 15.860, '2020-06-01 07:00:00', '2020-06-18 00:11:32'),
(209, 4, 15.880, 15.990, 16.250, '2020-06-02 07:00:00', '2020-06-18 00:12:21'),
(210, 4, 15.880, 15.990, 16.250, '2020-06-03 07:00:00', '2020-06-18 00:13:07'),
(211, 4, 16.030, 16.120, 16.560, '2020-06-04 07:00:00', '2020-06-18 00:13:51'),
(212, 4, 15.850, 15.820, 16.150, '2020-06-05 07:00:00', '2020-06-18 00:14:38'),
(213, 4, 16.230, 16.220, 16.300, '2020-06-06 07:00:00', '2020-06-18 00:15:27'),
(214, 4, 16.230, 16.220, 16.300, '2020-06-07 07:00:00', '2020-06-18 00:16:05'),
(215, 4, 16.230, 16.220, 16.300, '2020-06-08 07:00:00', '2020-06-18 00:16:57'),
(216, 4, 16.600, 16.600, 16.800, '2020-06-09 07:00:00', '2020-06-18 00:17:46'),
(217, 4, 16.600, 16.600, 16.800, '2020-06-10 07:00:00', '2020-06-18 00:23:46'),
(218, 4, 16.660, 16.740, 16.950, '2020-06-11 07:00:00', '2020-06-18 00:25:26'),
(219, 4, 16.760, 16.850, 17.160, '2020-06-12 07:00:00', '2020-06-18 00:26:49'),
(220, 4, 17.550, 17.850, 18.220, '2020-06-13 07:00:00', '2020-06-18 00:27:35'),
(221, 4, 17.150, 17.340, 18.310, '2020-06-14 07:00:00', '2020-06-18 00:28:31'),
(222, 4, 17.150, 17.300, 18.310, '2020-06-15 07:00:00', '2020-06-18 00:31:58'),
(223, 4, 16.350, 16.310, 16.890, '2020-06-16 07:00:00', '2020-06-18 00:36:40'),
(224, 4, 16.690, 16.700, 17.170, '2020-06-17 07:00:00', '2020-06-18 00:37:39'),
(225, 1, 16.620, 16.460, 17.540, '2020-06-18 07:00:00', '2020-06-18 01:12:36'),
(226, 3, 16.780, 16.290, 17.640, '2020-06-18 07:00:00', '2020-06-18 01:14:26'),
(227, 5, 16.670, 16.980, 17.500, '2020-06-18 07:00:00', '2020-06-18 01:15:24'),
(228, 4, 16.870, 16.880, 17.410, '2020-06-18 07:00:00', '2020-06-18 01:16:20'),
(229, 6, 14.460, 14.190, 15.200, '2020-06-01 07:00:00', '2020-06-18 17:56:51'),
(230, 6, 14.820, 14.400, 15.590, '2020-06-02 07:00:00', '2020-06-18 17:57:50'),
(231, 6, 14.820, 14.400, 15.590, '2020-06-03 07:00:00', '2020-06-18 17:59:11'),
(232, 6, 15.040, 14.530, 15.900, '2020-06-04 07:00:00', '2020-06-18 17:59:55'),
(233, 6, 14.880, 14.300, 15.490, '2020-06-05 07:00:00', '2020-06-18 18:05:02'),
(234, 6, 15.180, 14.650, 15.650, '2020-06-06 07:00:00', '2020-06-18 18:08:45'),
(235, 6, 15.180, 14.650, 15.650, '2020-06-07 07:00:00', '2020-06-18 18:10:00'),
(236, 6, 15.180, 14.650, 15.650, '2020-06-08 07:00:00', '2020-06-18 18:10:59'),
(237, 6, 15.550, 15.030, 16.140, '2020-06-09 07:00:00', '2020-06-18 18:12:01'),
(238, 6, 15.550, 15.030, 16.140, '2020-06-10 07:00:00', '2020-06-18 18:13:44'),
(239, 6, 15.620, 15.180, 16.300, '2020-06-11 07:00:00', '2020-06-18 18:14:53'),
(240, 6, 15.650, 15.300, 16.500, '2020-06-12 07:00:00', '2020-06-18 18:15:54'),
(241, 6, 15.650, 15.300, 16.500, '2020-06-13 07:00:00', '2020-06-18 18:16:39'),
(242, 6, 15.950, 15.300, 16.500, '2020-06-14 07:00:00', '2020-06-18 18:17:47'),
(243, 6, 15.650, 15.300, 16.500, '2020-06-15 07:00:00', '2020-06-18 18:18:35'),
(244, 6, 15.310, 14.820, 17.240, '2020-06-16 07:00:00', '2020-06-18 18:20:12'),
(245, 6, 15.710, 15.220, 16.510, '2020-06-17 07:00:00', '2020-06-18 18:23:36'),
(246, 6, 15.890, 16.750, 16.750, '2020-06-18 07:00:00', '2020-06-18 18:26:10'),
(247, 3, 16.840, 16.440, 17.690, '2020-06-19 07:00:00', '2020-06-19 01:07:17'),
(248, 6, 15.940, 15.550, 16.800, '2020-06-19 07:00:00', '2020-06-19 19:52:21'),
(249, 4, 16.950, 17.040, 17.460, '2020-06-19 07:00:00', '2020-06-19 19:52:56'),
(250, 3, 17.170, 16.930, 17.920, '2020-06-20 07:00:00', '2020-06-19 23:31:30'),
(251, 4, 17.390, 17.550, 17.690, '2020-06-20 07:00:00', '2020-06-19 23:32:28'),
(252, 6, 16.280, 16.040, 17.030, '2020-06-20 07:00:00', '2020-06-19 23:33:10'),
(253, 3, 17.170, 16.930, 17.920, '2020-06-21 07:00:00', '2020-06-22 17:04:07'),
(254, 3, 17.170, 16.930, 17.920, '2020-06-22 07:00:00', '2020-06-22 17:05:07'),
(255, 4, 17.390, 17.550, 17.690, '2020-06-21 07:00:00', '2020-06-22 17:48:28'),
(256, 4, 17.390, 17.550, 17.690, '2020-06-22 07:00:00', '2020-06-22 17:49:23'),
(257, 6, 16.280, 16.040, 17.030, '2020-06-21 07:00:00', '2020-06-22 17:51:10'),
(258, 6, 16.280, 16.040, 17.030, '2020-06-22 07:00:00', '2020-06-22 17:52:00'),
(259, 3, 17.220, 16.960, 18.040, '2020-06-23 07:00:00', '2020-06-23 16:31:49'),
(260, 4, 17.450, 17.600, 17.800, '2020-06-23 07:00:00', '2020-06-23 16:32:23'),
(261, 6, 16.330, 16.070, 17.150, '2020-06-23 07:00:00', '2020-06-23 16:32:59'),
(262, 3, 17.340, 16.960, 18.010, '2020-06-24 07:00:00', '2020-06-24 20:29:33'),
(263, 4, 17.550, 17.630, 17.780, '2020-06-24 07:00:00', '2020-06-24 16:30:27'),
(264, 6, 16.450, 16.690, 17.120, '2020-06-24 07:00:00', '2020-06-24 16:35:38'),
(265, 3, 17.420, 17.060, 17.910, '2020-06-25 07:00:00', '2020-06-25 17:04:33'),
(266, 4, 17.660, 17.740, 17.680, '2020-06-25 07:00:00', '2020-06-25 17:06:35'),
(267, 6, 16.530, 16.170, 17.020, '2020-06-25 07:00:00', '2020-06-25 17:07:30'),
(268, 3, 16.840, 16.450, 17.670, '2020-06-26 07:00:00', '2020-06-26 18:47:09'),
(269, 4, 17.060, 17.120, 17.430, '2020-06-26 07:00:00', '2020-06-26 18:48:25'),
(270, 6, 15.950, 15.560, 16.770, '2020-06-26 07:00:00', '2020-06-26 18:49:16'),
(271, 3, 16.870, 16.470, 17.700, '2020-06-27 07:00:00', '2020-06-29 17:55:48'),
(272, 3, 16.870, 16.470, 17.700, '2020-06-27 07:00:00', '2020-06-29 17:55:55'),
(273, 3, 16.870, 16.470, 17.700, '2020-06-28 07:00:00', '2020-06-29 18:10:30'),
(274, 3, 16.870, 16.470, 17.700, '2020-06-29 07:00:00', '2020-06-29 18:11:44'),
(275, 4, 17.080, 17.140, 17.460, '2020-06-27 07:00:00', '2020-06-29 18:13:03'),
(276, 4, 17.080, 17.140, 17.460, '2020-06-28 07:00:00', '2020-06-29 18:14:08'),
(277, 4, 17.080, 17.140, 17.460, '2020-06-29 07:00:00', '2020-06-29 18:14:55'),
(278, 6, 15.590, 15.190, 16.410, '2020-06-27 07:00:00', '2020-06-29 18:15:46'),
(279, 6, 15.590, 15.190, 16.410, '2020-06-28 07:00:00', '2020-06-29 18:16:28'),
(280, 6, 15.590, 15.190, 16.510, '2020-06-29 07:00:00', '2020-06-29 18:17:08'),
(281, 3, 16.750, 16.340, 17.640, '2020-06-30 07:00:00', '2020-06-30 18:11:55'),
(283, 6, 14.470, 15.060, 16.350, '2020-06-30 07:00:00', '2020-06-30 18:21:09'),
(284, 4, 16.930, 17.010, 17.400, '2020-06-30 07:00:00', '2020-06-30 18:22:14'),
(286, 2, 0.000, 0.000, 0.000, '2020-07-01 07:05:41', '2020-07-01 07:05:41'),
(289, 5, 0.000, 0.000, 0.000, '2020-07-01 07:05:41', '2020-07-01 07:05:41'),
(291, 3, 17.160, 16.970, 17.710, '2020-07-01 07:00:00', '2020-07-01 20:41:16'),
(292, 4, 17.530, 17.350, 17.750, '2020-07-01 07:00:00', '2020-07-01 23:33:00'),
(293, 6, 16.340, 16.140, 16.880, '2020-07-01 07:00:00', '2020-07-01 23:33:52'),
(294, 3, 17.190, 17.000, 17.740, '2020-07-02 07:00:00', '2020-07-02 16:58:17'),
(295, 4, 17.550, 17.380, 17.790, '2020-07-02 17:35:11', '2020-07-02 17:07:50'),
(296, 6, 16.360, 16.170, 16.920, '2020-07-02 07:00:00', '2020-07-02 17:26:52'),
(297, 3, 17.160, 17.020, 17.820, '2020-07-03 07:00:00', '2020-07-03 21:39:42'),
(298, 4, 17.450, 17.340, 17.860, '2020-07-03 07:00:00', '2020-07-03 21:41:14'),
(300, 3, 17.320, 17.300, 17.910, '2020-07-04 07:00:00', '2020-07-06 17:30:25'),
(302, 6, 17.320, 17.300, 17.910, '2020-07-04 07:00:00', '2020-07-06 17:37:56'),
(303, 3, 17.320, 17.300, 17.910, '2020-07-05 07:00:00', '2020-07-06 17:31:52'),
(304, 4, 17.670, 17.630, 17.950, '2020-07-05 07:00:00', '2020-07-06 18:22:58'),
(306, 4, 17.670, 17.630, 17.950, '2020-07-06 07:00:00', '2020-07-06 17:35:41'),
(307, 6, 16.330, 16.190, 16.990, '2020-07-03 07:00:00', '2020-07-06 17:37:25'),
(308, 6, 16.500, 16.470, 17.080, '2020-07-04 07:00:00', '2020-07-06 17:38:16'),
(309, 6, 16.500, 16.470, 17.080, '2020-07-05 07:00:00', '2020-07-06 17:38:51'),
(310, 6, 16.500, 16.470, 17.080, '2020-07-06 07:00:00', '2020-07-06 17:39:38'),
(316, 3, 17.330, 17.310, 17.910, '2020-07-06 07:00:00', '2020-07-06 18:34:50'),
(317, 4, 17.680, 17.630, 17.950, '2020-07-04 07:00:00', '2020-07-06 18:36:05'),
(318, 3, 17.330, 17.310, 17.910, '2020-07-07 07:00:00', '2020-07-07 17:53:41'),
(319, 4, 17.670, 17.630, 17.950, '2020-07-07 07:00:00', '2020-07-07 17:54:13'),
(320, 6, 16.500, 16.470, 17.080, '2020-07-07 07:00:00', '2020-07-07 17:54:42'),
(321, 3, 17.100, 17.020, 17.890, '2020-07-08 07:00:00', '2020-07-08 18:36:13'),
(322, 4, 17.470, 17.350, 17.940, '2020-07-08 07:00:00', '2020-07-08 18:36:44'),
(323, 6, 16.270, 16.200, 17.070, '2020-07-08 07:00:00', '2020-07-08 18:37:10'),
(324, 3, 17.420, 17.360, 18.050, '2020-07-09 07:00:00', '2020-07-09 17:23:55'),
(325, 4, 17.740, 17.650, 18.090, '2020-07-09 07:00:00', '2020-07-09 17:24:27'),
(326, 6, 16.590, 16.530, 17.220, '2020-07-09 07:00:00', '2020-07-09 17:24:54'),
(327, 3, 17.580, 17.570, 18.050, '2020-07-10 07:00:00', '2020-07-10 17:43:07'),
(328, 4, 17.950, 17.860, 18.090, '2020-07-10 07:00:00', '2020-07-10 17:44:45'),
(329, 6, 16.750, 16.740, 17.220, '2020-07-10 07:00:00', '2020-07-10 17:48:41'),
(330, 3, 17.190, 17.240, 17.950, '2020-07-11 07:00:00', '2020-07-13 18:23:40'),
(331, 4, 17.620, 17.530, 17.990, '2020-07-11 07:00:00', '2020-07-13 18:24:06'),
(332, 6, 16.360, 16.410, 17.120, '2020-07-11 07:00:00', '2020-07-13 18:24:28'),
(333, 3, 17.190, 17.240, 17.950, '2020-07-12 07:00:00', '2020-07-13 18:24:54'),
(334, 4, 17.620, 17.530, 17.990, '2020-07-12 07:00:00', '2020-07-13 18:25:17'),
(336, 6, 16.360, 16.410, 17.120, '2020-07-12 07:00:00', '2020-07-13 18:26:15'),
(337, 3, 17.190, 17.240, 17.950, '2020-07-13 07:00:00', '2020-07-13 18:26:40'),
(338, 4, 17.620, 17.530, 17.990, '2020-07-13 07:00:00', '2020-07-13 18:27:04'),
(339, 6, 16.360, 16.410, 17.120, '2020-07-13 07:00:00', '2020-07-13 18:27:26'),
(340, 3, 17.310, 17.360, 17.970, '2020-07-14 07:00:00', '2020-07-14 17:11:23'),
(341, 4, 17.820, 17.690, 18.020, '2020-07-14 07:00:00', '2020-07-14 17:12:16'),
(342, 6, 16.490, 16.540, 17.140, '2020-07-14 07:00:00', '2020-07-14 17:13:36'),
(343, 3, 17.210, 17.240, 17.840, '2020-07-15 07:00:00', '2020-07-15 16:37:56'),
(344, 4, 17.720, 17.560, 17.880, '2020-07-15 07:00:00', '2020-07-15 16:38:27'),
(345, 6, 16.390, 16.410, 17.010, '2020-07-15 07:00:00', '2020-07-15 16:38:55'),
(346, 3, 17.070, 17.070, 17.850, '2020-07-16 07:00:00', '2020-07-16 18:57:55'),
(347, 4, 17.550, 17.400, 17.900, '2020-07-16 07:00:00', '2020-07-16 18:58:20'),
(348, 6, 16.250, 16.240, 17.020, '2020-07-16 07:00:00', '2020-07-16 18:58:45'),
(349, 3, 17.130, 17.040, 17.910, '2020-07-17 07:00:00', '2020-07-17 18:01:50'),
(350, 1, 16.840, 0.000, 17.650, '2020-07-01 07:00:00', '2020-07-17 18:02:17'),
(351, 1, 16.860, 0.000, 17.690, '2020-07-02 07:00:00', '2020-07-17 18:02:35'),
(352, 1, 16.840, 0.000, 17.760, '2020-07-03 07:00:00', '2020-07-17 18:02:53'),
(353, 1, 17.010, 0.000, 17.850, '2020-07-04 07:00:00', '2020-07-17 18:03:12'),
(354, 1, 17.010, 0.000, 17.850, '2020-07-05 07:00:00', '2020-07-17 18:03:30'),
(355, 1, 17.010, 0.000, 17.850, '2020-07-06 07:00:00', '2020-07-17 18:03:49'),
(356, 1, 17.010, 0.000, 17.850, '2020-07-07 07:00:00', '2020-07-17 18:04:06'),
(357, 1, 16.780, 0.000, 17.830, '2020-07-08 07:00:00', '2020-07-17 18:04:29'),
(358, 1, 17.100, 0.000, 17.980, '2020-07-09 07:00:00', '2020-07-17 18:04:47'),
(359, 1, 17.260, 0.000, 17.990, '2020-07-10 07:00:00', '2020-07-17 18:05:10'),
(360, 1, 16.880, 0.000, 17.890, '2020-07-11 07:00:00', '2020-07-17 18:05:28'),
(361, 1, 16.880, 0.000, 17.890, '2020-07-12 07:00:00', '2020-07-17 18:05:59'),
(362, 1, 16.880, 0.000, 17.890, '2020-07-13 07:00:00', '2020-07-17 18:06:17'),
(363, 1, 16.990, 0.000, 17.910, '2020-07-14 07:00:00', '2020-07-17 18:06:35'),
(364, 1, 16.890, 0.000, 17.780, '2020-07-15 07:00:00', '2020-07-17 18:06:57'),
(365, 1, 16.750, 0.000, 17.790, '2020-07-16 07:00:00', '2020-07-17 18:07:17'),
(366, 1, 16.820, 0.000, 17.850, '2020-07-17 07:00:00', '2020-07-17 18:07:39'),
(367, 4, 17.520, 17.370, 17.600, '2020-07-17 07:00:00', '2020-07-17 18:08:05'),
(368, 6, 16.300, 16.210, 17.090, '2020-07-17 07:00:00', '2020-07-17 18:08:34'),
(369, 1, 16.540, 0.000, 17.710, '2020-07-18 07:00:00', '2020-07-20 20:40:48'),
(370, 3, 16.850, 16.730, 17.780, '2020-07-18 07:00:00', '2020-07-20 20:41:12'),
(371, 4, 17.230, 17.030, 17.820, '2020-07-18 07:00:00', '2020-07-20 20:41:36'),
(372, 6, 16.030, 15.900, 16.950, '2020-07-18 07:00:00', '2020-07-20 20:42:01'),
(373, 1, 16.540, 0.000, 17.710, '2020-07-19 07:00:00', '2020-07-20 20:42:23'),
(374, 3, 16.850, 16.730, 17.780, '2020-07-19 07:00:00', '2020-07-20 20:43:17'),
(375, 4, 17.230, 17.030, 17.820, '2020-07-19 07:00:00', '2020-07-20 20:43:39'),
(376, 6, 16.030, 15.900, 16.950, '2020-07-19 07:00:00', '2020-07-20 20:44:00'),
(377, 1, 16.540, 0.000, 17.710, '2020-07-20 07:00:00', '2020-07-20 20:44:19'),
(378, 3, 16.850, 16.730, 17.780, '2020-07-20 07:00:00', '2020-07-20 20:44:46'),
(379, 4, 17.230, 17.030, 17.820, '2020-07-20 07:00:00', '2020-07-20 20:45:22'),
(380, 6, 16.030, 15.900, 16.950, '2020-07-20 07:00:00', '2020-07-20 20:46:31'),
(381, 1, 16.540, 0.000, 17.740, '2020-07-21 07:00:00', '2020-07-21 17:51:33'),
(382, 3, 16.850, 16.680, 17.800, '2020-07-21 07:00:00', '2020-07-21 17:51:59'),
(383, 4, 17.260, 16.980, 17.840, '2020-07-21 07:00:00', '2020-07-21 17:57:14'),
(384, 6, 16.030, 15.850, 16.970, '2020-07-21 07:00:00', '2020-07-21 17:57:40'),
(385, 1, 16.590, 0.000, 17.900, '2020-07-22 07:00:00', '2020-07-22 19:09:45'),
(386, 3, 16.910, 16.690, 17.960, '2020-07-22 07:00:00', '2020-07-22 19:10:12'),
(387, 4, 17.280, 16.990, 18.000, '2020-07-22 07:00:00', '2020-07-22 19:10:36'),
(388, 6, 16.080, 15.860, 17.140, '2020-07-22 07:00:00', '2020-07-22 19:11:03'),
(389, 3, 17.170, 16.970, 18.220, '2020-07-23 07:00:00', '2020-07-23 17:55:41'),
(390, 1, 16.860, 0.000, 18.150, '2020-07-23 07:00:00', '2020-07-23 17:55:59'),
(391, 4, 17.570, 17.280, 18.260, '2020-07-23 07:00:00', '2020-07-23 17:56:24'),
(392, 6, 16.350, 16.150, 17.390, '2020-07-23 07:00:00', '2020-07-23 17:57:20'),
(393, 1, 16.840, 0.000, 18.070, '2020-07-24 07:00:00', '2020-07-24 18:12:36'),
(394, 3, 17.150, 16.900, 18.130, '2020-07-24 07:00:00', '2020-07-24 18:12:59'),
(395, 4, 17.520, 17.210, 18.170, '2020-07-24 07:00:00', '2020-07-24 18:13:20'),
(396, 6, 16.320, 16.070, 17.300, '2020-07-24 07:00:00', '2020-07-24 18:13:47'),
(397, 1, 16.680, 0.000, 17.960, '2020-07-25 07:00:00', '2020-07-27 18:20:13'),
(398, 3, 16.990, 16.750, 18.020, '2020-07-25 07:00:00', '2020-07-27 18:20:47'),
(399, 4, 17.380, 17.070, 18.070, '2020-07-25 07:00:00', '2020-07-27 18:21:32'),
(400, 6, 16.170, 15.920, 17.200, '2020-07-25 07:00:00', '2020-07-27 18:22:16'),
(401, 1, 16.680, 0.000, 17.960, '2020-07-26 07:00:00', '2020-07-27 20:27:37'),
(402, 1, 16.680, 0.000, 17.960, '2020-07-27 07:00:00', '2020-07-27 20:27:59'),
(403, 3, 16.990, 16.750, 18.020, '2020-07-27 07:00:00', '2020-07-27 20:40:33'),
(404, 6, 16.170, 15.920, 17.200, '2020-07-27 07:00:00', '2020-07-27 20:41:09'),
(405, 4, 17.380, 17.070, 18.070, '2020-07-27 07:00:00', '2020-07-28 00:18:01'),
(406, 4, 17.380, 17.070, 18.070, '2020-07-26 07:00:00', '2020-07-27 20:44:07'),
(407, 6, 16.170, 15.920, 17.200, '2020-07-26 07:00:00', '2020-07-27 20:45:45'),
(408, 1, 16.860, 0.000, 17.950, '2020-07-28 07:00:00', '2020-07-28 19:59:02'),
(409, 3, 17.170, 16.910, 18.010, '2020-07-28 07:00:00', '2020-07-28 19:59:27'),
(410, 4, 17.540, 17.230, 18.060, '2020-07-28 07:00:00', '2020-07-28 19:59:54'),
(411, 6, 16.340, 16.080, 17.190, '2020-07-28 07:00:00', '2020-07-28 20:00:17'),
(412, 3, 16.930, 16.660, 17.860, '2020-07-29 07:00:00', '2020-07-29 20:21:15'),
(413, 4, 17.310, 16.980, 17.900, '2020-07-29 07:00:00', '2020-07-29 20:21:37'),
(414, 6, 16.100, 15.830, 17.030, '2020-07-29 07:00:00', '2020-07-29 20:22:03'),
(415, 1, 16.620, 0.000, 17.800, '2020-07-29 07:00:00', '2020-07-29 20:22:19'),
(416, 1, 16.570, 0.000, 17.690, '2020-07-30 07:00:00', '2020-07-30 17:31:25'),
(417, 3, 16.880, 16.580, 17.750, '2020-07-30 07:00:00', '2020-07-30 17:31:50'),
(418, 4, 17.240, 16.910, 17.800, '2020-07-30 07:00:00', '2020-07-30 17:32:21'),
(419, 6, 16.050, 15.760, 16.930, '2020-07-30 07:00:00', '2020-07-30 17:32:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `price_impulsas`
--

CREATE TABLE `price_impulsas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `impulsa_id` bigint(20) UNSIGNED NOT NULL,
  `precio_regular` double(12,3) DEFAULT NULL,
  `precio_premium` double(12,3) DEFAULT NULL,
  `precio_disel` double(12,3) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `price_impulsas`
--

INSERT INTO `price_impulsas` (`id`, `impulsa_id`, `precio_regular`, `precio_premium`, `precio_disel`, `created_at`, `updated_at`) VALUES
(1, 1, 0.000, 0.000, 0.000, '2020-06-01 23:20:35', '2020-06-01 23:20:35'),
(2, 2, 0.000, 0.000, 0.000, '2020-06-01 23:20:35', '2020-06-01 23:20:35'),
(5, 5, 0.000, 0.000, 0.000, '2020-06-01 23:20:35', '2020-06-01 23:20:35'),
(10, 3, 14.890, 15.240, 15.730, '2020-06-01 07:00:00', '2020-06-18 22:58:43'),
(11, 3, 15.310, 15.660, 16.120, '2020-06-02 07:00:00', '2020-06-18 22:59:49'),
(12, 3, 15.250, 15.610, 16.030, '2020-06-03 07:00:00', '2020-06-18 23:01:32'),
(13, 3, 15.530, 15.880, 16.430, '2020-06-04 07:00:00', '2020-06-18 23:03:47'),
(14, 3, 15.370, 15.720, 15.960, '2020-06-05 07:00:00', '2020-06-18 23:04:48'),
(15, 3, 15.720, 16.070, 16.110, '2020-06-06 07:00:00', '2020-06-18 23:05:57'),
(16, 3, 15.720, 16.070, 16.110, '2020-06-07 07:00:00', '2020-06-18 23:17:47'),
(17, 3, 15.720, 16.070, 16.110, '2020-06-08 07:00:00', '2020-06-18 23:19:52'),
(18, 3, 16.090, 16.430, 16.610, '2020-06-09 07:00:00', '2020-06-18 23:20:50'),
(19, 3, 15.920, 16.280, 16.450, '2020-06-10 07:00:00', '2020-06-18 23:21:36'),
(20, 3, 16.120, 16.470, 16.460, '2020-06-11 07:00:00', '2020-06-18 23:22:20'),
(21, 3, 16.000, 16.350, 16.780, '2020-06-12 07:00:00', '2020-06-18 23:23:10'),
(22, 3, 15.670, 15.970, 16.610, '2020-06-13 07:00:00', '2020-06-18 23:24:10'),
(23, 3, 15.670, 15.970, 16.610, '2020-06-14 07:00:00', '2020-06-18 23:25:11'),
(24, 3, 15.670, 15.970, 16.610, '2020-06-15 07:00:00', '2020-06-18 23:25:54'),
(25, 3, 15.840, 16.190, 16.700, '2020-06-16 07:00:00', '2020-06-18 23:27:01'),
(26, 3, 16.250, 16.590, 16.980, '2020-06-17 07:00:00', '2020-06-18 23:27:56'),
(27, 3, 16.380, 16.730, 17.100, '2020-06-18 07:00:00', '2020-06-18 23:28:52'),
(28, 3, 16.480, 16.840, 17.270, '2020-06-19 07:00:00', '2020-06-19 16:38:21'),
(29, 4, 14.890, 15.240, 15.730, '2020-06-01 07:00:00', '2020-06-19 16:40:46'),
(30, 4, 15.310, 15.660, 16.120, '2020-06-02 07:00:00', '2020-06-19 17:02:08'),
(31, 4, 15.250, 15.610, 16.030, '2020-06-03 07:00:00', '2020-06-19 17:02:45'),
(32, 4, 15.530, 15.880, 16.430, '2020-06-04 07:00:00', '2020-06-19 17:05:13'),
(33, 4, 15.370, 15.720, 15.960, '2020-06-05 07:00:00', '2020-06-19 17:05:47'),
(34, 4, 15.720, 15.070, 16.110, '2020-06-06 07:00:00', '2020-06-19 17:06:27'),
(35, 4, 15.720, 15.070, 16.110, '2020-06-07 07:00:00', '2020-06-19 17:07:15'),
(36, 4, 15.720, 16.070, 15.110, '2020-06-08 07:00:00', '2020-06-19 17:07:56'),
(37, 4, 16.090, 15.430, 16.610, '2020-06-09 07:00:00', '2020-06-19 17:08:30'),
(38, 4, 15.920, 16.280, 16.450, '2020-06-10 07:00:00', '2020-06-19 17:09:14'),
(39, 4, 16.120, 16.470, 16.760, '2020-06-11 07:00:00', '2020-06-19 17:10:14'),
(40, 4, 16.000, 16.350, 16.780, '2020-06-12 07:00:00', '2020-06-19 17:10:46'),
(41, 4, 15.670, 15.970, 16.610, '2020-06-13 07:00:00', '2020-06-19 17:11:31'),
(42, 4, 15.670, 15.970, 16.610, '2020-06-14 07:00:00', '2020-06-19 17:12:18'),
(43, 4, 15.670, 15.970, 16.610, '2020-06-15 07:00:00', '2020-06-19 17:13:17'),
(44, 4, 15.840, 16.190, 16.700, '2020-06-16 07:00:00', '2020-06-19 17:20:15'),
(45, 4, 16.250, 16.590, 16.980, '2020-06-17 07:00:00', '2020-06-19 17:21:16'),
(46, 4, 16.380, 16.730, 17.100, '2020-06-18 07:00:00', '2020-06-19 17:22:03'),
(47, 6, 14.890, 15.240, 15.730, '2020-06-01 07:00:00', '2020-06-19 17:25:50'),
(48, 6, 15.310, 15.660, 16.120, '2020-06-02 07:00:00', '2020-06-19 17:26:25'),
(49, 6, 15.250, 15.610, 16.030, '2020-06-03 07:00:00', '2020-06-19 17:27:17'),
(50, 6, 15.530, 15.880, 16.430, '2020-06-04 07:00:00', '2020-06-19 17:28:16'),
(51, 6, 15.370, 15.720, 15.960, '2020-06-05 07:00:00', '2020-06-19 17:30:45'),
(52, 6, 15.720, 16.070, 16.110, '2020-06-06 07:00:00', '2020-06-19 17:54:54'),
(53, 6, 15.720, 16.070, 16.110, '2020-06-07 07:00:00', '2020-06-19 17:55:47'),
(54, 6, 15.720, 16.070, 16.110, '2020-06-08 07:00:00', '2020-06-19 17:57:49'),
(55, 6, 16.090, 16.430, 16.610, '2020-06-09 07:00:00', '2020-06-19 17:58:33'),
(56, 6, 15.920, 16.280, 16.450, '2020-06-10 07:00:00', '2020-06-19 17:59:40'),
(57, 6, 16.120, 16.470, 16.760, '2020-06-11 07:00:00', '2020-06-19 18:00:40'),
(58, 6, 16.000, 16.350, 16.780, '2020-06-12 07:00:00', '2020-06-19 18:02:22'),
(59, 6, 15.670, 15.970, 16.610, '2020-06-13 07:00:00', '2020-06-19 18:03:08'),
(60, 6, 15.670, 15.970, 16.610, '2020-06-14 07:00:00', '2020-06-19 18:05:22'),
(61, 6, 15.670, 15.970, 16.610, '2020-06-15 07:00:00', '2020-06-19 18:06:02'),
(62, 6, 15.840, 16.190, 16.700, '2020-06-16 07:00:00', '2020-06-19 18:06:45'),
(63, 6, 16.250, 16.590, 16.980, '2020-06-17 07:00:00', '2020-06-19 18:07:26'),
(64, 6, 16.380, 16.730, 17.100, '2020-06-18 07:00:00', '2020-06-19 18:08:29'),
(65, 6, 16.480, 16.840, 17.270, '2020-06-19 07:00:00', '2020-06-19 18:09:12'),
(66, 4, 16.480, 16.840, 17.270, '2020-06-19 07:00:00', '2020-06-19 18:09:51'),
(67, 3, 16.040, 16.830, 17.280, '2020-06-20 07:00:00', '2020-06-22 17:30:09'),
(68, 3, 16.040, 16.830, 17.280, '2020-06-21 07:00:00', '2020-06-22 17:32:00'),
(69, 3, 16.040, 16.830, 17.280, '2020-06-22 07:00:00', '2020-06-22 17:33:56'),
(70, 4, 16.040, 16.830, 17.280, '2020-06-20 07:00:00', '2020-06-22 17:57:24'),
(71, 4, 16.040, 16.830, 17.280, '2020-06-21 07:00:00', '2020-06-22 17:58:19'),
(72, 4, 16.040, 16.830, 17.280, '2020-06-22 07:00:00', '2020-06-22 17:59:07'),
(73, 6, 16.040, 16.830, 17.280, '2020-06-20 07:00:00', '2020-06-22 18:01:39'),
(74, 6, 16.040, 16.830, 17.280, '2020-06-21 07:00:00', '2020-06-22 18:02:18'),
(75, 6, 16.040, 16.830, 17.280, '2020-06-22 07:00:00', '2020-06-22 18:03:00'),
(76, 3, 16.650, 17.120, 17.350, '2020-06-23 07:00:00', '2020-06-23 23:45:40'),
(77, 3, 16.700, 17.290, 17.240, '2020-06-24 07:00:00', '2020-06-24 20:55:39'),
(78, 4, 16.810, 17.170, 17.030, '2020-06-23 07:00:00', '2020-06-24 18:25:50'),
(79, 6, 15.390, 17.170, 16.380, '2020-06-23 07:00:00', '2020-06-24 18:34:36'),
(80, 4, 16.700, 17.290, 17.240, '2020-06-24 07:00:00', '2020-06-24 18:39:39'),
(81, 6, 16.700, 17.290, 17.240, '2020-06-24 07:00:00', '2020-06-24 18:40:17'),
(82, 3, 16.780, 17.220, 17.140, '2020-06-25 07:00:00', '2020-06-25 17:10:32'),
(83, 4, 16.780, 17.220, 17.140, '2020-06-25 07:00:00', '2020-06-25 17:11:08'),
(84, 6, 16.780, 17.220, 17.140, '2020-06-25 07:00:00', '2020-06-25 17:11:53'),
(85, 4, 16.120, 16.450, 681.000, '2020-06-26 07:00:00', '2020-06-26 18:51:03'),
(86, 3, 16.120, 16.450, 16.810, '2020-06-26 07:00:00', '2020-06-26 18:51:51'),
(87, 6, 16.120, 16.450, 16.810, '2020-06-26 07:00:00', '2020-06-26 18:52:33'),
(88, 3, 16.150, 17.020, 16.840, '2020-06-27 07:00:00', '2020-06-29 18:31:11'),
(89, 3, 16.150, 17.020, 16.840, '2020-06-28 07:00:00', '2020-06-29 18:31:53'),
(90, 3, 16.150, 17.020, 16.840, '2020-06-29 07:00:00', '2020-06-29 18:32:31'),
(91, 4, 16.150, 17.020, 16.840, '2020-06-27 07:00:00', '2020-06-29 18:33:13'),
(92, 4, 16.150, 17.020, 16.840, '2020-06-28 07:00:00', '2020-06-29 18:33:52'),
(93, 4, 16.150, 17.020, 16.840, '2020-06-29 07:00:00', '2020-06-29 18:34:41'),
(94, 6, 16.150, 17.020, 16.840, '2020-06-27 07:00:00', '2020-06-29 18:53:13'),
(95, 6, 16.150, 17.020, 16.840, '2020-06-28 07:00:00', '2020-06-29 18:53:46'),
(96, 6, 16.150, 17.020, 16.840, '2020-06-29 07:00:00', '2020-06-29 18:54:45'),
(97, 3, 16.030, 16.750, 16.780, '2020-06-30 19:23:43', '2020-06-30 18:48:25'),
(99, 2, 0.000, 0.000, 0.000, '2020-07-01 07:07:24', '2020-07-01 07:07:24'),
(102, 5, 0.000, 0.000, 0.000, '2020-07-01 07:07:24', '2020-07-01 07:07:24'),
(104, 3, 16.440, 17.060, 16.810, '2020-07-01 07:00:00', '2020-07-01 23:40:47'),
(105, 4, 16.440, 17.060, 16.810, '2020-07-01 07:00:00', '2020-07-01 23:47:59'),
(106, 6, 16.440, 17.060, 16.810, '2020-07-01 07:00:00', '2020-07-01 23:48:42'),
(107, 3, 16.470, 16.930, 16.840, '2020-07-02 07:00:00', '2020-07-02 17:55:52'),
(108, 4, 16.470, 16.930, 16.840, '2020-07-02 07:00:00', '2020-07-02 17:57:58'),
(109, 6, 16.470, 16.930, 16.840, '2020-07-02 07:00:00', '2020-07-02 17:58:40'),
(110, 3, 16.440, 16.930, 16.920, '2020-07-03 07:00:00', '2020-07-03 21:43:21'),
(111, 4, 16.440, 16.930, 16.920, '2020-07-03 07:00:00', '2020-07-03 21:43:50'),
(112, 6, 16.440, 16.930, 16.920, '2020-07-03 07:00:00', '2020-07-03 21:44:18'),
(113, 3, 16.670, 16.800, 17.100, '2020-07-04 07:00:00', '2020-07-06 17:46:34'),
(114, 4, 16.670, 16.800, 17.100, '2020-07-04 07:00:00', '2020-07-06 17:47:08'),
(115, 6, 16.670, 16.800, 17.100, '2020-07-04 07:00:00', '2020-07-06 17:48:12'),
(116, 3, 16.670, 16.800, 17.100, '2020-07-05 07:00:00', '2020-07-06 17:48:59'),
(117, 4, 16.670, 16.800, 17.100, '2020-07-05 07:00:00', '2020-07-06 17:49:22'),
(118, 6, 16.670, 16.800, 17.100, '2020-07-05 07:00:00', '2020-07-06 17:49:47'),
(119, 3, 16.680, 16.800, 17.100, '2020-07-06 07:00:00', '2020-07-06 18:06:23'),
(120, 4, 16.680, 16.800, 17.100, '2020-07-06 07:00:00', '2020-07-06 18:06:56'),
(121, 6, 16.680, 16.800, 17.100, '2020-07-06 07:00:00', '2020-07-06 18:08:29'),
(122, 3, 16.680, 17.100, 17.100, '2020-07-07 07:00:00', '2020-07-07 17:56:50'),
(123, 4, 16.680, 17.000, 0.000, '2020-07-07 07:00:00', '2020-07-07 17:57:46'),
(124, 4, 16.680, 17.100, 17.100, '2020-07-07 07:00:00', '2020-07-07 17:58:05'),
(125, 6, 16.680, 17.100, 17.100, '2020-07-07 07:00:00', '2020-07-07 17:58:29'),
(126, 3, 16.670, 17.000, 17.380, '2020-07-08 07:00:00', '2020-07-08 18:39:19'),
(127, 4, 16.670, 17.000, 17.380, '2020-07-08 07:00:00', '2020-07-08 18:39:44'),
(128, 6, 16.670, 17.000, 17.380, '2020-07-08 07:00:00', '2020-07-08 18:46:32'),
(129, 3, 16.680, 17.100, 17.100, '2020-07-09 07:00:00', '2020-07-09 17:26:58'),
(130, 4, 16.680, 17.100, 17.100, '2020-07-09 07:00:00', '2020-07-09 17:27:22'),
(131, 6, 16.680, 17.100, 17.100, '2020-07-09 07:00:00', '2020-07-09 17:27:41'),
(133, 3, 16.940, 17.140, 17.550, '2020-07-10 07:00:00', '2020-07-10 17:51:35'),
(134, 4, 16.940, 17.140, 17.550, '2020-07-10 07:00:00', '2020-07-10 17:51:58'),
(135, 6, 16.940, 17.140, 17.550, '2020-07-10 07:00:00', '2020-07-10 17:53:11'),
(136, 3, 16.850, 17.050, 17.460, '2020-07-11 07:00:00', '2020-07-13 16:20:53'),
(137, 4, 16.850, 17.050, 17.460, '2020-07-11 07:00:00', '2020-07-13 16:21:13'),
(138, 6, 16.850, 17.050, 17.460, '2020-07-13 07:00:00', '2020-07-13 16:22:07'),
(139, 6, 16.850, 17.050, 17.460, '2020-07-11 07:00:00', '2020-07-13 16:22:36'),
(140, 3, 16.850, 17.050, 17.460, '2020-07-12 07:00:00', '2020-07-13 16:23:11'),
(141, 4, 16.850, 17.050, 17.460, '2020-07-12 07:00:00', '2020-07-13 16:23:46'),
(142, 6, 16.850, 17.050, 17.460, '2020-07-12 07:00:00', '2020-07-13 16:24:18'),
(143, 3, 16.850, 17.050, 17.460, '2020-07-13 07:00:00', '2020-07-13 16:24:45'),
(144, 4, 16.850, 17.050, 17.460, '2020-07-13 07:00:00', '2020-07-13 16:25:13'),
(145, 6, 16.850, 17.050, 17.460, '2020-07-13 07:00:00', '2020-07-13 16:26:23'),
(146, 3, 16.840, 17.090, 17.410, '2020-07-14 07:00:00', '2020-07-14 18:21:32'),
(147, 4, 16.840, 17.090, 17.410, '2020-07-14 07:00:00', '2020-07-14 18:22:05'),
(148, 6, 16.840, 17.090, 17.410, '2020-07-14 07:00:00', '2020-07-14 18:21:17'),
(153, 1, 14.850, 0.000, 15.550, '2020-07-05 07:00:00', '2020-07-22 19:52:52'),
(154, 1, 14.840, 0.000, 15.410, '2020-07-06 07:00:00', '2020-07-22 19:53:09'),
(155, 3, 16.570, 16.850, 17.030, '2020-07-15 07:00:00', '2020-07-15 16:47:48'),
(156, 4, 16.570, 16.850, 17.030, '2020-07-15 07:00:00', '2020-07-15 16:48:07'),
(157, 6, 16.570, 16.850, 17.030, '2020-07-15 07:00:00', '2020-07-15 16:49:24'),
(158, 1, 14.680, 0.000, 15.430, '2020-07-07 07:00:00', '2020-07-22 19:53:25'),
(159, 1, 15.780, 0.000, 15.390, '2020-07-08 07:00:00', '2020-07-22 19:54:21'),
(160, 1, 14.960, 0.000, 15.440, '2020-07-09 07:00:00', '2020-07-22 19:55:12'),
(161, 1, 14.730, 0.000, 15.460, '2020-07-10 07:00:00', '2020-07-22 19:55:29'),
(162, 1, 14.730, 0.000, 15.460, '2020-07-11 07:00:00', '2020-07-22 19:55:53'),
(163, 1, 14.730, 0.000, 15.460, '2020-07-12 07:00:00', '2020-07-22 19:56:18'),
(164, 1, 14.870, 0.000, 15.540, '2020-07-13 07:00:00', '2020-07-22 19:56:38'),
(165, 3, 16.750, 16.790, 17.450, '2020-07-16 07:00:00', '2020-07-16 19:01:12'),
(166, 4, 16.750, 16.790, 17.450, '2020-07-16 07:00:00', '2020-07-16 19:01:37'),
(167, 6, 16.750, 16.790, 17.450, '2020-07-16 07:00:00', '2020-07-16 19:01:59'),
(168, 3, 16.590, 16.940, 17.440, '2020-07-17 07:00:00', '2020-07-17 18:12:36'),
(169, 4, 16.590, 16.940, 17.440, '2020-07-17 07:00:00', '2020-07-17 18:12:58'),
(170, 6, 16.590, 16.940, 17.440, '2020-07-17 07:00:00', '2020-07-17 18:13:22'),
(171, 1, 14.720, 0.000, 15.290, '2020-07-01 07:00:00', '2020-07-21 21:45:06'),
(173, 3, 16.480, 16.830, 17.440, '2020-07-18 07:00:00', '2020-07-20 20:48:59'),
(174, 4, 16.480, 16.830, 17.440, '2020-07-18 07:00:00', '2020-07-20 20:49:19'),
(175, 6, 16.480, 16.830, 17.440, '2020-07-18 07:00:00', '2020-07-20 20:49:38'),
(176, 3, 16.480, 16.830, 17.440, '2020-07-19 07:00:00', '2020-07-20 20:49:59'),
(177, 4, 16.480, 16.830, 17.440, '2020-07-19 07:00:00', '2020-07-20 20:50:21'),
(178, 6, 16.480, 16.830, 17.440, '2020-07-19 07:00:00', '2020-07-20 20:50:43'),
(179, 3, 16.480, 16.830, 17.440, '2020-07-20 07:00:00', '2020-07-20 20:51:11'),
(180, 4, 16.480, 16.830, 17.440, '2020-07-20 07:00:00', '2020-07-20 20:51:34'),
(181, 6, 16.480, 16.830, 17.440, '2020-07-20 07:00:00', '2020-07-20 20:51:55'),
(182, 3, 16.340, 16.630, 17.260, '2020-07-21 07:00:00', '2020-07-21 18:00:16'),
(183, 4, 16.340, 16.630, 17.260, '2020-07-21 07:00:00', '2020-07-21 18:00:52'),
(184, 6, 16.340, 16.630, 17.260, '2020-07-21 07:00:00', '2020-07-21 18:01:21'),
(186, 1, 14.800, 0.000, 15.420, '2020-07-02 07:00:00', '2020-07-21 18:37:46'),
(187, 1, 14.850, 0.000, 15.550, '2020-07-03 07:00:00', '2020-07-21 18:38:05'),
(188, 1, 14.850, 0.000, 15.550, '2020-07-04 07:00:00', '2020-07-21 18:38:32'),
(189, 1, 14.700, 0.000, 15.690, '2020-07-22 07:00:00', '2020-07-22 19:14:54'),
(190, 3, 16.540, 16.840, 17.510, '2020-07-22 07:00:00', '2020-07-22 19:15:22'),
(191, 4, 16.540, 16.840, 17.510, '2020-07-22 07:00:00', '2020-07-22 19:15:44'),
(192, 6, 16.540, 16.840, 17.510, '2020-07-22 07:00:00', '2020-07-22 19:16:08'),
(193, 1, 14.850, 0.000, 15.550, '2020-07-05 07:00:00', '2020-07-22 19:52:52'),
(194, 1, 14.840, 0.000, 15.410, '2020-07-06 07:00:00', '2020-07-22 19:53:09'),
(195, 1, 14.680, 0.000, 15.430, '2020-07-07 07:00:00', '2020-07-22 19:53:25'),
(196, 1, 15.780, 0.000, 15.390, '2020-07-08 07:00:00', '2020-07-22 19:54:21'),
(197, 1, 14.960, 0.000, 15.440, '2020-07-09 07:00:00', '2020-07-22 19:55:12'),
(198, 1, 14.730, 0.000, 15.460, '2020-07-10 07:00:00', '2020-07-22 19:55:29'),
(199, 1, 14.730, 0.000, 15.460, '2020-07-11 07:00:00', '2020-07-22 19:55:53'),
(200, 1, 14.730, 0.000, 15.460, '2020-07-12 07:00:00', '2020-07-22 19:56:18'),
(201, 1, 14.870, 0.000, 15.540, '2020-07-13 07:00:00', '2020-07-22 19:56:38'),
(202, 1, 14.530, 0.000, 15.270, '2020-07-14 07:00:00', '2020-07-22 19:24:05'),
(203, 1, 14.530, 0.000, 15.270, '2020-07-15 07:00:00', '2020-07-22 19:24:52'),
(204, 1, 14.840, 0.000, 15.410, '2020-07-06 07:00:00', '2020-07-22 19:53:09'),
(205, 1, 14.680, 0.000, 15.430, '2020-07-07 07:00:00', '2020-07-22 19:53:25'),
(206, 1, 14.840, 0.000, 15.410, '2020-07-06 07:00:00', '2020-07-22 19:53:09'),
(207, 1, 14.430, 0.000, 15.300, '2020-07-16 07:00:00', '2020-07-22 19:57:37'),
(208, 1, 14.380, 0.000, 15.260, '2020-07-17 07:00:00', '2020-07-22 19:58:04'),
(209, 1, 14.300, 0.000, 15.180, '2020-07-18 07:00:00', '2020-07-22 19:58:29'),
(210, 1, 14.300, 0.000, 15.180, '2020-07-19 07:00:00', '2020-07-22 19:58:50'),
(211, 1, 14.300, 0.000, 15.180, '2020-07-20 07:00:00', '2020-07-22 19:59:13'),
(212, 1, 14.690, 0.000, 15.690, '2020-07-23 07:00:00', '2020-07-23 17:59:16'),
(213, 3, 16.750, 17.060, 17.630, '2020-07-23 07:00:00', '2020-07-23 17:59:39'),
(214, 4, 16.750, 17.060, 17.630, '2020-07-23 07:00:00', '2020-07-23 18:00:03'),
(215, 6, 16.750, 17.060, 17.630, '2020-07-23 07:00:00', '2020-07-23 18:01:22'),
(216, 1, 14.700, 0.000, 15.690, '2020-07-21 07:00:00', '2020-07-23 18:04:55'),
(217, 3, 16.740, 17.090, 17.450, '2020-07-24 07:00:00', '2020-07-24 18:17:36'),
(218, 4, 16.740, 17.090, 17.450, '2020-07-24 07:00:00', '2020-07-24 18:18:04'),
(219, 6, 16.740, 17.090, 17.450, '2020-07-24 07:00:00', '2020-07-24 18:18:28'),
(220, 1, 14.420, 0.000, 15.410, '2020-07-24 07:00:00', '2020-07-24 18:21:54'),
(221, 1, 14.630, 0.000, 15.440, '2020-07-27 07:00:00', '2020-07-27 20:11:10'),
(222, 3, 16.670, 16.980, 17.480, '2020-07-25 07:00:00', '2020-07-30 18:47:37'),
(223, 3, 16.740, 17.090, 17.450, '2020-07-26 07:00:00', '2020-07-27 20:12:15'),
(224, 3, 16.670, 16.980, 17.480, '2020-07-27 07:00:00', '2020-07-27 20:12:51'),
(225, 4, 16.670, 16.980, 17.480, '2020-07-25 07:00:00', '2020-07-30 18:47:57'),
(226, 4, 16.740, 17.090, 17.450, '2020-07-26 07:00:00', '2020-07-27 20:36:08'),
(227, 4, 16.670, 16.980, 17.480, '2020-07-27 07:00:00', '2020-07-27 20:36:36'),
(228, 6, 16.670, 16.980, 17.480, '2020-07-25 07:00:00', '2020-07-30 18:51:09'),
(229, 6, 16.740, 17.090, 17.450, '2020-07-26 07:00:00', '2020-07-27 20:37:44'),
(230, 6, 16.670, 16.980, 17.480, '2020-07-27 07:00:00', '2020-07-27 20:38:51'),
(231, 1, 14.630, 0.000, 15.440, '2020-07-28 07:00:00', '2020-07-28 20:08:51'),
(232, 3, 16.780, 17.080, 17.510, '2020-07-28 07:00:00', '2020-07-28 20:13:37'),
(233, 4, 16.780, 17.080, 17.510, '2020-07-28 07:00:00', '2020-07-28 20:14:02'),
(234, 6, 16.780, 17.080, 17.510, '2020-07-28 07:00:00', '2020-07-28 20:14:27'),
(235, 1, 14.420, 0.000, 15.220, '2020-07-29 07:00:00', '2020-07-29 20:31:24'),
(236, 3, 16.590, 16.940, 17.270, '2020-07-29 07:00:00', '2020-07-29 20:31:47'),
(237, 4, 16.590, 16.940, 17.270, '2020-07-29 07:00:00', '2020-07-29 20:32:17'),
(238, 6, 16.590, 16.940, 17.270, '2020-07-29 07:00:00', '2020-07-29 20:32:50'),
(239, 1, 14.420, 0.000, 15.220, '2020-07-30 07:00:00', '2020-07-30 18:43:57'),
(240, 3, 16.530, 16.830, 17.270, '2020-07-30 07:00:00', '2020-07-30 18:44:23'),
(241, 4, 16.530, 16.830, 17.270, '2020-07-30 07:00:00', '2020-07-30 18:44:43'),
(242, 6, 16.530, 16.830, 17.270, '2020-07-30 07:00:00', '2020-07-30 18:45:05'),
(243, 6, 16.670, 16.980, 17.480, '2020-07-25 07:00:00', '2020-07-30 18:51:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `price_policons`
--

CREATE TABLE `price_policons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `policon_id` bigint(20) UNSIGNED NOT NULL,
  `precio_regular` double(12,3) DEFAULT NULL,
  `precio_premium` double(12,3) DEFAULT NULL,
  `precio_disel` double(12,3) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `price_policons`
--

INSERT INTO `price_policons` (`id`, `policon_id`, `precio_regular`, `precio_premium`, `precio_disel`, `created_at`, `updated_at`) VALUES
(1, 1, 0.000, 0.000, 0.000, '2020-06-01 23:20:35', '2020-06-01 23:20:35'),
(2, 2, 0.000, 0.000, 0.000, '2020-06-01 23:20:35', '2020-06-01 23:20:35'),
(3, 3, 14.840, 15.190, 15.680, '2020-06-01 23:20:35', '2020-06-01 23:20:35'),
(5, 5, 0.000, 0.000, 0.000, '2020-06-01 23:20:35', '2020-06-01 23:20:35'),
(6, 3, 13.300, 13.650, 14.180, '2020-05-01 10:00:00', '2020-06-01 23:13:30'),
(7, 3, 13.430, 13.780, 14.800, '2020-05-02 10:00:00', '2020-06-01 23:42:29'),
(8, 3, 13.430, 13.780, 14.800, '2020-05-03 10:00:00', '2020-06-01 23:43:14'),
(9, 3, 13.420, 13.780, 14.800, '2020-05-04 10:00:00', '2020-06-01 23:46:45'),
(10, 3, 13.410, 13.740, 14.770, '2020-05-05 10:00:00', '2020-06-01 23:47:47'),
(11, 3, 14.000, 14.320, 14.980, '2020-05-06 10:00:00', '2020-06-01 23:49:09'),
(12, 3, 14.430, 14.600, 15.490, '2020-05-07 10:00:00', '2020-06-01 23:49:48'),
(13, 3, 14.510, 14.830, 15.050, '2020-05-08 10:00:00', '2020-06-01 23:50:56'),
(14, 3, 14.830, 15.250, 15.210, '2020-05-09 10:00:00', '2020-06-01 23:54:36'),
(15, 3, 14.830, 15.250, 15.210, '2020-05-10 10:00:00', '2020-06-01 23:55:14'),
(16, 3, 14.830, 15.250, 15.210, '2020-05-11 10:00:00', '2020-06-01 23:57:16'),
(17, 3, 14.720, 15.020, 15.540, '2020-05-12 10:00:00', '2020-06-01 23:59:29'),
(18, 3, 14.560, 14.910, 15.340, '2020-05-13 10:00:00', '2020-06-02 00:00:06'),
(19, 3, 14.370, 14.720, 15.170, '2020-05-14 10:00:00', '2020-06-02 00:00:40'),
(20, 3, 14.290, 14.640, 15.280, '2020-05-15 10:00:00', '2020-06-02 00:04:39'),
(21, 3, 14.290, 14.640, 15.280, '2020-05-16 10:00:00', '2020-06-02 00:06:57'),
(22, 3, 14.290, 14.640, 15.280, '2020-05-17 10:00:00', '2020-06-02 00:07:33'),
(23, 3, 14.770, 15.170, 15.730, '2020-05-18 10:00:00', '2020-06-02 00:08:15'),
(24, 3, 15.110, 15.460, 15.950, '2020-05-19 10:00:00', '2020-06-02 00:08:56'),
(25, 3, 15.220, 15.570, 16.340, '2020-05-20 10:00:00', '2020-06-02 00:09:31'),
(26, 3, 15.370, 15.730, 16.010, '2020-05-21 10:00:00', '2020-06-02 00:10:11'),
(27, 3, 15.250, 15.600, 16.190, '2020-05-22 10:00:00', '2020-06-02 00:10:47'),
(28, 3, 15.250, 15.600, 16.190, '2020-05-23 10:00:00', '2020-06-02 00:11:26'),
(29, 3, 15.250, 15.600, 16.190, '2020-05-24 10:00:00', '2020-06-02 00:12:09'),
(30, 3, 15.150, 15.500, 16.210, '2020-05-25 10:00:00', '2020-06-02 00:12:47'),
(31, 3, 15.050, 15.400, 16.090, '2020-05-26 10:00:00', '2020-06-02 00:13:28'),
(32, 3, 15.050, 15.400, 16.160, '2020-05-27 10:00:00', '2020-06-02 00:15:23'),
(33, 3, 15.050, 15.400, 16.170, '2020-05-28 10:00:00', '2020-06-02 00:22:41'),
(34, 3, 14.820, 15.170, 15.990, '2020-05-29 10:00:00', '2020-06-02 00:23:21'),
(35, 3, 14.840, 15.190, 15.680, '2020-05-30 10:00:00', '2020-06-02 00:24:11'),
(36, 3, 14.840, 15.190, 15.680, '2020-05-31 10:00:00', '2020-06-02 00:25:15'),
(37, 3, 15.070, 15.610, 16.070, '2020-06-02 12:00:00', '2020-06-05 20:23:31'),
(38, 3, 15.480, 15.830, 16.380, '2020-06-04 07:00:00', '2020-06-16 20:24:20'),
(39, 3, 15.320, 15.670, 15.910, '2020-06-05 07:00:00', '2020-06-16 20:25:43'),
(40, 3, 15.670, 16.020, 16.060, '2020-06-06 07:00:00', '2020-06-16 20:26:49'),
(41, 3, 15.670, 16.020, 16.060, '2020-06-07 07:00:00', '2020-06-16 20:27:41'),
(42, 3, 15.670, 16.020, 16.060, '2020-06-08 07:00:00', '2020-06-16 20:28:57'),
(44, 3, 16.040, 16.380, 16.560, '2020-06-09 07:00:00', '2020-06-16 20:30:16'),
(45, 3, 15.870, 16.230, 16.420, '2020-06-10 07:00:00', '2020-06-16 20:31:06'),
(46, 3, 16.070, 16.420, 16.710, '2020-06-11 07:00:00', '2020-06-16 20:31:59'),
(47, 3, 15.950, 16.300, 16.730, '2020-06-12 07:00:00', '2020-06-16 20:32:52'),
(48, 3, 15.620, 15.920, 16.560, '2020-06-13 07:00:00', '2020-06-16 20:33:46'),
(49, 3, 15.620, 15.920, 16.560, '2020-06-14 07:00:00', '2020-06-16 20:34:33'),
(50, 3, 15.620, 15.920, 16.560, '2020-06-15 07:00:00', '2020-06-16 20:35:27'),
(51, 3, 15.790, 16.140, 16.650, '2020-06-16 07:00:00', '2020-06-16 20:36:06'),
(52, 3, 16.200, 16.540, 16.930, '2020-06-17 07:00:00', '2020-06-17 19:23:36'),
(55, 3, 15.200, 15.560, 16.030, '2020-06-03 07:00:00', '2020-06-03 17:01:40'),
(56, 3, 16.330, 16.680, 17.050, '2020-06-18 07:00:00', '2020-06-18 23:38:17'),
(57, 3, 16.430, 16.790, 17.220, '2020-06-19 07:00:00', '2020-06-19 16:37:29'),
(58, 4, 14.840, 15.190, 15.680, '2020-06-01 07:00:00', '2020-06-19 18:44:21'),
(59, 4, 15.260, 15.610, 16.070, '2020-06-02 07:00:00', '2020-06-19 18:45:03'),
(60, 4, 15.200, 16.560, 16.030, '2020-06-03 07:00:00', '2020-06-19 18:45:40'),
(61, 4, 15.480, 15.830, 16.380, '2020-06-04 07:00:00', '2020-06-19 18:46:25'),
(62, 4, 15.320, 15.670, 15.910, '2020-06-05 07:00:00', '2020-06-19 18:47:42'),
(63, 4, 15.970, 16.020, 16.060, '2020-06-06 07:00:00', '2020-06-19 18:48:19'),
(64, 4, 15.670, 16.020, 16.060, '2020-06-07 07:00:00', '2020-06-19 18:48:56'),
(65, 4, 15.670, 16.020, 16.060, '2020-06-08 07:00:00', '2020-06-19 18:49:41'),
(66, 4, 16.040, 16.380, 16.560, '2020-06-09 07:00:00', '2020-06-19 18:50:17'),
(67, 4, 15.870, 16.230, 16.420, '2020-06-10 07:00:00', '2020-06-19 18:50:56'),
(68, 4, 16.070, 16.420, 16.710, '2020-06-11 07:00:00', '2020-06-19 18:51:32'),
(69, 4, 15.950, 16.300, 16.730, '2020-06-12 07:00:00', '2020-06-19 18:52:15'),
(70, 4, 15.620, 15.920, 16.560, '2020-06-13 07:00:00', '2020-06-19 18:52:52'),
(71, 4, 15.620, 15.920, 16.560, '2020-06-14 07:00:00', '2020-06-19 18:53:32'),
(72, 4, 15.620, 15.920, 16.560, '2020-06-15 07:00:00', '2020-06-19 18:54:16'),
(73, 4, 15.790, 16.140, 16.650, '2020-06-16 07:00:00', '2020-06-19 18:54:52'),
(74, 4, 16.020, 16.540, 16.930, '2020-06-17 07:00:00', '2020-06-19 18:56:13'),
(75, 4, 16.330, 16.680, 17.050, '2020-06-18 07:00:00', '2020-06-19 18:56:50'),
(76, 6, 14.840, 15.190, 15.680, '2020-06-01 07:00:00', '2020-06-19 19:18:56'),
(77, 6, 15.260, 15.610, 16.070, '2020-06-02 07:00:00', '2020-06-19 19:19:52'),
(78, 6, 15.200, 15.560, 16.030, '2020-06-03 07:00:00', '2020-06-19 19:20:30'),
(79, 6, 15.480, 15.830, 16.380, '2020-06-04 07:00:00', '2020-06-19 19:28:10'),
(80, 6, 15.320, 15.670, 15.910, '2020-06-05 07:00:00', '2020-06-19 19:29:13'),
(81, 6, 15.670, 16.020, 16.060, '2020-06-06 07:00:00', '2020-06-19 19:29:48'),
(82, 6, 15.670, 16.020, 16.060, '2020-06-07 07:00:00', '2020-06-19 19:30:41'),
(83, 6, 15.670, 16.020, 16.060, '2020-06-08 07:00:00', '2020-06-19 19:31:22'),
(84, 6, 16.040, 16.380, 16.560, '2020-06-09 07:00:00', '2020-06-19 19:32:18'),
(85, 6, 15.870, 16.230, 16.420, '2020-06-10 07:00:00', '2020-06-19 19:35:50'),
(86, 6, 16.070, 16.420, 16.710, '2020-06-11 07:00:00', '2020-06-19 19:37:29'),
(87, 6, 15.950, 16.300, 16.730, '2020-06-12 07:00:00', '2020-06-19 19:38:14'),
(88, 6, 15.620, 15.920, 16.560, '2020-06-13 07:00:00', '2020-06-19 19:40:21'),
(89, 6, 15.620, 15.920, 16.560, '2020-06-14 07:00:00', '2020-06-19 19:40:58'),
(90, 6, 15.620, 15.920, 16.560, '2020-06-15 07:00:00', '2020-06-19 19:41:59'),
(91, 6, 15.790, 15.140, 16.650, '2020-06-16 07:00:00', '2020-06-19 19:42:40'),
(92, 6, 16.020, 16.540, 16.930, '2020-06-17 07:00:00', '2020-06-19 19:43:21'),
(93, 6, 16.330, 16.680, 17.050, '2020-06-18 07:00:00', '2020-06-19 19:47:24'),
(94, 6, 16.430, 16.790, 17.220, '2020-06-19 07:00:00', '2020-06-19 19:48:08'),
(95, 4, 16.430, 16.790, 17.220, '2020-06-19 07:00:00', '2020-06-19 19:48:49'),
(96, 3, 16.770, 17.120, 17.450, '2020-06-20 07:00:00', '2020-06-22 18:05:46'),
(97, 3, 16.770, 17.120, 17.450, '2020-06-21 07:00:00', '2020-06-22 18:06:43'),
(98, 3, 16.770, 17.120, 17.450, '2020-06-22 07:00:00', '2020-06-22 18:07:39'),
(99, 4, 16.770, 17.120, 17.450, '2020-06-20 07:00:00', '2020-06-22 18:19:23'),
(100, 4, 16.770, 17.120, 17.450, '2020-06-21 07:00:00', '2020-06-22 18:20:02'),
(101, 4, 16.770, 17.120, 17.450, '2020-06-22 07:00:00', '2020-06-22 18:21:06'),
(102, 6, 16.770, 17.120, 17.450, '2020-06-20 07:00:00', '2020-06-22 18:21:52'),
(103, 6, 16.770, 17.120, 17.450, '2020-06-21 07:00:00', '2020-06-22 18:22:39'),
(104, 6, 16.770, 17.120, 17.450, '2020-06-22 07:00:00', '2020-06-22 18:23:28'),
(105, 3, 16.820, 17.170, 17.560, '2020-06-23 07:00:00', '2020-06-23 23:43:52'),
(106, 3, 16.930, 17.290, 17.540, '2020-06-24 07:00:00', '2020-06-24 18:06:56'),
(107, 4, 16.820, 17.170, 17.560, '2020-06-23 07:00:00', '2020-06-24 18:16:07'),
(108, 6, 16.820, 17.170, 17.560, '2020-06-23 07:00:00', '2020-06-24 18:16:53'),
(109, 4, 16.930, 17.290, 17.540, '2020-06-24 07:00:00', '2020-06-24 18:18:07'),
(110, 6, 16.930, 17.290, 17.540, '2020-06-24 07:00:00', '2020-06-24 18:18:54'),
(111, 3, 16.840, 17.220, 17.250, '2020-06-25 07:00:00', '2020-06-25 17:08:14'),
(112, 4, 16.840, 17.220, 17.250, '2020-06-25 07:00:00', '2020-06-25 17:08:46'),
(113, 6, 16.840, 17.220, 17.250, '2020-06-25 07:00:00', '2020-06-25 17:09:22'),
(114, 3, 16.340, 16.720, 17.090, '2020-06-26 07:00:00', '2020-06-26 18:53:54'),
(115, 4, 16.340, 16.720, 17.090, '2020-06-26 07:00:00', '2020-06-26 18:54:40'),
(116, 6, 16.340, 16.720, 17.090, '2020-06-26 07:00:00', '2020-06-26 18:55:20'),
(117, 3, 16.820, 17.020, 17.660, '2020-06-27 07:00:00', '2020-06-29 18:19:02'),
(118, 3, 16.390, 16.760, 17.120, '2020-06-28 07:00:00', '2020-06-29 18:20:20'),
(119, 3, 16.390, 16.760, 17.120, '2020-06-29 07:00:00', '2020-06-29 18:21:13'),
(120, 4, 16.390, 16.760, 17.120, '2020-06-27 07:00:00', '2020-06-29 18:22:15'),
(121, 1, 16.390, 16.760, 17.120, '2020-06-28 07:00:00', '2020-06-29 18:22:52'),
(122, 4, 16.390, 16.760, 17.120, '2020-06-28 07:00:00', '2020-06-29 18:24:18'),
(123, 4, 16.390, 16.760, 17.120, '2020-06-29 07:00:00', '2020-06-29 18:27:04'),
(124, 6, 16.390, 16.760, 17.120, '2020-06-27 07:00:00', '2020-06-29 18:28:09'),
(125, 6, 16.390, 16.760, 17.120, '2020-06-28 07:00:00', '2020-06-29 18:28:50'),
(126, 6, 16.390, 16.760, 17.120, '2020-06-29 07:00:00', '2020-06-29 18:29:29'),
(127, 3, 16.450, 16.750, 17.060, '2020-06-30 07:00:00', '2020-06-30 18:13:16'),
(128, 4, 16.930, 17.010, 17.400, '2020-06-30 07:00:00', '2020-06-30 18:18:20'),
(129, 6, 14.470, 15.060, 16.350, '2020-06-30 07:00:00', '2020-06-30 18:18:57'),
(130, 4, 16.450, 16.750, 17.060, '2020-06-30 07:00:00', '2020-06-30 18:23:17'),
(131, 6, 16.450, 16.750, 17.060, '2020-06-30 07:00:00', '2020-06-30 18:24:09'),
(132, 1, 0.000, 0.000, 0.000, '2020-07-01 07:09:34', '2020-07-01 17:38:39'),
(133, 2, 0.000, 0.000, 0.000, '2020-07-01 07:09:34', '2020-07-01 07:09:34'),
(136, 5, 0.000, 0.000, 0.000, '2020-07-01 07:09:34', '2020-07-01 07:09:34'),
(138, 3, 16.680, 17.060, 17.130, '2020-07-01 07:00:00', '2020-07-01 20:44:03'),
(139, 4, 16.680, 17.060, 17.130, '2020-07-01 07:00:00', '2020-07-01 23:35:10'),
(140, 6, 16.680, 17.060, 17.130, '2020-07-01 07:00:00', '2020-07-01 23:35:51'),
(141, 3, 16.660, 16.930, 17.170, '2020-07-02 07:00:00', '2020-07-02 17:33:51'),
(142, 4, 16.660, 16.930, 17.170, '2020-07-02 07:00:00', '2020-07-02 17:53:50'),
(143, 6, 16.660, 16.930, 17.170, '2020-07-02 07:00:00', '2020-07-02 17:54:48'),
(144, 3, 16.650, 16.930, 17.240, '2020-07-03 07:00:00', '2020-07-03 21:45:46'),
(145, 4, 16.650, 16.930, 17.240, '2020-07-03 07:00:00', '2020-07-03 21:46:29'),
(146, 6, 16.650, 16.930, 17.240, '2020-07-03 07:00:00', '2020-07-03 21:47:00'),
(147, 3, 16.530, 16.800, 17.120, '2020-07-04 07:00:00', '2020-07-06 17:51:41'),
(148, 4, 16.530, 16.800, 17.120, '2020-07-04 07:00:00', '2020-07-06 17:52:11'),
(149, 6, 16.530, 16.800, 17.120, '2020-07-04 07:00:00', '2020-07-06 17:52:39'),
(150, 3, 16.530, 16.800, 17.120, '2020-07-05 07:00:00', '2020-07-06 17:53:07'),
(151, 4, 16.530, 16.800, 17.120, '2020-07-05 07:00:00', '2020-07-06 17:53:31'),
(152, 6, 16.530, 16.800, 17.120, '2020-07-05 07:00:00', '2020-07-06 17:54:01'),
(153, 3, 16.530, 16.800, 17.120, '2020-07-06 07:00:00', '2020-07-06 18:14:58'),
(154, 4, 16.530, 16.800, 17.120, '2020-07-06 07:00:00', '2020-07-06 18:15:54'),
(155, 6, 16.530, 16.800, 17.120, '2020-07-06 07:00:00', '2020-07-06 18:16:33'),
(156, 3, 16.770, 17.100, 17.330, '2020-07-07 07:00:00', '2020-07-07 17:55:11'),
(157, 4, 16.770, 17.100, 17.330, '2020-07-07 07:00:00', '2020-07-07 17:55:32'),
(158, 6, 16.770, 17.100, 17.330, '2020-07-07 07:00:00', '2020-07-07 17:56:09'),
(159, 3, 16.570, 16.900, 17.280, '2020-07-08 07:00:00', '2020-07-08 18:37:42'),
(160, 4, 16.900, 16.900, 17.280, '2020-07-08 07:00:00', '2020-07-08 18:38:06'),
(161, 6, 16.570, 16.900, 17.280, '2020-07-08 07:00:00', '2020-07-08 18:38:34'),
(162, 3, 16.890, 17.330, 17.640, '2020-07-09 07:00:00', '2020-07-09 17:25:42'),
(163, 4, 16.890, 17.330, 17.640, '2020-07-09 07:00:00', '2020-07-09 17:26:04'),
(164, 6, 16.890, 17.330, 17.640, '2020-07-09 07:00:00', '2020-07-09 17:26:34'),
(165, 3, 16.840, 17.140, 17.450, '2020-07-10 07:00:00', '2020-07-10 17:49:28'),
(166, 4, 16.840, 17.140, 17.450, '2020-07-10 07:00:00', '2020-07-10 17:49:59'),
(167, 6, 16.840, 17.140, 17.450, '2020-07-10 07:00:00', '2020-07-10 17:51:07'),
(168, 3, 16.750, 17.050, 17.360, '2020-07-11 07:00:00', '2020-07-13 16:15:21'),
(169, 3, 16.750, 17.050, 17.360, '2020-07-12 07:00:00', '2020-07-13 16:15:44'),
(170, 4, 16.750, 17.050, 17.360, '2020-07-11 07:00:00', '2020-07-13 16:16:07'),
(171, 4, 16.750, 17.050, 17.360, '2020-07-12 07:00:00', '2020-07-13 16:16:30'),
(172, 6, 16.750, 17.050, 17.360, '2020-07-11 07:00:00', '2020-07-13 16:16:57'),
(173, 6, 16.750, 17.050, 17.350, '2020-07-12 07:00:00', '2020-07-13 16:18:07'),
(174, 3, 16.750, 17.050, 17.350, '2020-07-13 07:00:00', '2020-07-13 16:18:33'),
(175, 4, 16.750, 17.050, 17.350, '2020-07-13 07:00:00', '2020-07-13 16:19:25'),
(176, 6, 16.750, 17.050, 17.350, '2020-07-13 07:00:00', '2020-07-13 16:20:06'),
(177, 3, 16.790, 17.090, 17.360, '2020-07-14 07:00:00', '2020-07-14 18:13:54'),
(178, 4, 16.790, 17.090, 17.360, '2020-07-14 07:00:00', '2020-07-14 18:14:33'),
(179, 4, 16.790, 17.090, 17.360, '2020-07-14 07:00:00', '2020-07-14 18:14:33'),
(180, 6, 16.790, 17.090, 17.360, '2020-07-14 07:00:00', '2020-07-14 18:16:24'),
(181, 3, 16.550, 16.850, 17.240, '2020-07-15 07:00:00', '2020-07-15 16:39:21'),
(182, 4, 16.550, 16.850, 17.240, '2020-07-15 07:00:00', '2020-07-15 16:40:55'),
(183, 6, 16.550, 16.850, 17.240, '2020-07-15 07:00:00', '2020-07-15 16:43:37'),
(184, 3, 16.650, 16.790, 17.350, '2020-07-16 07:00:00', '2020-07-16 18:59:31'),
(185, 4, 16.650, 16.790, 17.350, '2020-07-16 07:00:00', '2020-07-16 19:10:45'),
(186, 6, 16.650, 16.790, 17.350, '2020-07-16 07:00:00', '2020-07-16 19:11:48'),
(187, 3, 16.490, 16.840, 17.340, '2020-07-17 07:00:00', '2020-07-17 18:11:10'),
(188, 4, 16.490, 16.840, 17.340, '2020-07-17 07:00:00', '2020-07-17 18:11:34'),
(189, 6, 16.490, 16.840, 17.340, '2020-07-17 07:00:00', '2020-07-17 18:11:56'),
(190, 3, 16.380, 16.730, 17.200, '2020-07-18 07:00:00', '2020-07-20 20:46:58'),
(191, 4, 16.380, 16.730, 17.200, '2020-07-18 07:00:00', '2020-07-20 20:47:20'),
(192, 6, 16.380, 16.730, 17.200, '2020-07-18 07:00:00', '2020-07-20 20:47:39'),
(193, 3, 16.380, 16.730, 17.200, '2020-07-19 07:00:00', '2020-07-20 20:52:25'),
(194, 4, 16.380, 16.730, 17.200, '2020-07-19 07:00:00', '2020-07-20 20:52:45'),
(195, 6, 16.380, 16.730, 17.200, '2020-07-19 07:00:00', '2020-07-20 20:53:10'),
(196, 3, 16.380, 16.730, 17.200, '2020-07-20 07:00:00', '2020-07-20 20:53:33'),
(197, 4, 16.380, 16.730, 17.200, '2020-07-20 07:00:00', '2020-07-20 20:53:53'),
(198, 6, 16.380, 16.730, 17.200, '2020-07-20 07:00:00', '2020-07-20 20:54:15'),
(199, 3, 16.240, 16.580, 17.160, '2020-07-21 07:00:00', '2020-07-21 17:58:14'),
(200, 4, 16.240, 16.580, 17.160, '2020-07-21 07:00:00', '2020-07-21 17:58:38'),
(201, 6, 16.240, 16.580, 17.160, '2020-07-21 07:00:00', '2020-07-21 17:59:40'),
(202, 3, 16.440, 16.790, 17.410, '2020-07-22 07:00:00', '2020-07-22 19:12:09'),
(203, 4, 16.440, 16.790, 17.410, '2020-07-22 07:00:00', '2020-07-22 19:12:36'),
(204, 6, 16.440, 16.790, 17.410, '2020-07-22 07:00:00', '2020-07-22 19:12:59'),
(205, 3, 16.650, 17.010, 17.530, '2020-07-23 07:00:00', '2020-07-23 17:58:01'),
(206, 4, 16.650, 17.010, 17.530, '2020-07-23 07:00:00', '2020-07-23 17:58:24'),
(207, 6, 16.650, 17.010, 17.530, '2020-07-23 07:00:00', '2020-07-23 17:58:48'),
(208, 3, 16.690, 17.040, 17.400, '2020-07-24 07:00:00', '2020-07-24 18:14:19'),
(209, 4, 16.690, 17.040, 17.400, '2020-07-24 07:00:00', '2020-07-24 18:14:39'),
(210, 6, 16.690, 17.040, 17.400, '2020-07-24 07:00:00', '2020-07-24 18:15:02'),
(211, 3, 16.690, 17.040, 17.400, '2020-07-25 07:00:00', '2020-07-27 20:29:02'),
(212, 3, 16.690, 17.040, 17.400, '2020-07-26 07:00:00', '2020-07-27 20:29:24'),
(213, 4, 16.690, 17.040, 17.400, '2020-07-25 07:00:00', '2020-07-27 20:30:02'),
(214, 4, 16.690, 17.040, 17.400, '2020-07-26 07:00:00', '2020-07-27 20:30:38'),
(215, 6, 16.690, 17.040, 17.400, '2020-07-25 07:00:00', '2020-07-27 20:31:14'),
(216, 6, 16.690, 17.040, 17.400, '2020-07-26 07:00:00', '2020-07-27 20:31:37'),
(217, 6, 16.570, 16.930, 17.380, '2020-07-27 07:00:00', '2020-07-27 20:32:22'),
(218, 4, 16.570, 16.930, 17.380, '2020-07-27 07:00:00', '2020-07-27 20:32:51'),
(219, 3, 16.570, 16.930, 17.380, '2020-07-27 07:00:00', '2020-07-27 20:33:20'),
(220, 3, 16.680, 17.030, 17.410, '2020-07-28 07:00:00', '2020-07-28 20:01:09'),
(221, 4, 16.680, 17.030, 17.410, '2020-07-28 07:00:00', '2020-07-28 20:01:35'),
(222, 6, 16.680, 17.030, 17.410, '2020-07-28 07:00:00', '2020-07-28 20:02:40'),
(223, 3, 16.490, 16.840, 17.170, '2020-07-29 07:00:00', '2020-07-29 20:24:37'),
(224, 4, 16.490, 16.840, 17.170, '2020-07-29 07:00:00', '2020-07-29 20:24:58'),
(225, 6, 16.490, 16.840, 17.170, '2020-07-29 07:00:00', '2020-07-29 20:25:34'),
(226, 3, 16.430, 16.780, 17.170, '2020-07-30 07:00:00', '2020-07-30 17:33:15'),
(227, 4, 16.430, 16.780, 17.170, '2020-07-30 07:00:00', '2020-07-30 17:33:36'),
(228, 6, 16.430, 16.780, 17.170, '2020-07-30 07:00:00', '2020-07-30 17:33:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'Usuarion con nivel de administracion total.', '2020-06-09 22:33:29', '2020-06-09 22:33:29'),
(2, 'Invitado', 'Usuarion con nivel bajo de acceso.', '2020-06-09 22:33:29', '2020-06-09 22:33:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_user`
--

INSERT INTO `role_user` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(4, 3, 1, NULL, NULL),
(6, 5, 2, NULL, NULL),
(7, 6, 1, NULL, NULL),
(12, 11, 2, NULL, NULL),
(13, 12, 1, NULL, NULL),
(14, 13, 1, NULL, NULL),
(15, 14, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `terminals`
--

CREATE TABLE `terminals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `razon_social` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rfc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre_terminal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `codigo_postal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_de_vialidad` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre_de_vialidad` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `n_exterior` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `n_interior` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre_colonia` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre_localidad` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre_municipio_o_demarcacion_territorial` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre_entidad_federativa` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entre_calle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `y_calle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `terminals`
--

INSERT INTO `terminals` (`id`, `razon_social`, `rfc`, `nombre_terminal`, `status`, `codigo_postal`, `tipo_de_vialidad`, `nombre_de_vialidad`, `n_exterior`, `n_interior`, `nombre_colonia`, `nombre_localidad`, `nombre_municipio_o_demarcacion_territorial`, `nombre_entidad_federativa`, `entre_calle`, `y_calle`, `created_at`, `updated_at`) VALUES
(1, 'Laredo', 'XEXX010101000', 'Laredo', 1, '72845', 'calle', 'la', '4', '1', 'lo que sea', 'me importa un', 'dddddd', 'dddddd', '4', '4', '2020-06-01 13:05:43', '2020-06-01 13:05:43'),
(2, 'Guadalajara', 'XEXX010101000', 'Guadalajara', 1, '72845', 'calle', 'la', '4', '1', 'lo que sea', 'me importa un', 'dddddd', 'dddddd', '4', '4', '2020-06-01 13:05:44', '2020-06-01 13:05:44'),
(3, 'Puebla', 'XEXX010101000', 'Puebla', 1, '72845', 'calle', 'la', '4', '1', 'lo que sea', 'me importa un', 'dddddd', 'dddddd', '4', '4', '2020-06-01 13:05:44', '2020-06-01 13:05:44'),
(4, 'Añil', 'XEXX010101000', 'Añil', 1, '72845', 'calle', 'la', '4', '1', 'lo que sea', 'me importa un', 'dddddd', 'dddddd', '4', '4', '2020-06-01 13:05:44', '2020-06-01 13:05:44'),
(5, 'Chihuahua', 'XEXX010101000', 'Chihuahua', 1, '72845', 'calle', 'la', '4', '1', 'lo que sea', 'me importa un', 'dddddd', 'dddddd', '4', '4', '2020-06-01 13:05:44', '2020-06-01 13:05:44'),
(6, 'Veracruz', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-17 19:25:50', '2020-06-17 19:25:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apm_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` int(11) DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `app_name`, `apm_name`, `username`, `password`, `sex`, `phone`, `direccion`, `email`, `active`, `remember_token`, `email_verified_at`, `created_at`, `updated_at`) VALUES
(1, 'Alejandro', 'Hernandez', 'Lopez', 'Alex', '$2y$10$wnMB6qzJ.p.Mk08p2L/VZelxbnrY9wYi0neJWDN9HgrJqyVFPEEtm', 0, '2228130063', 'soledad #8', 'alex.hdez@impulsaenergia.mx', 1, 'LBhkOnyoOSOgUgAs7xe2vifu2FC6xgEqGvL9RENPTUJLO8vQuJJDkwDFra2O', '2020-06-01 13:05:45', '2020-06-01 13:05:45', '2020-06-25 04:30:39'),
(3, 'Edurado', 'Coyotl', 'Vazquez', 'Lalo', '$2y$10$2EX95JD85KUF1mjchxv18.SOojjxVFnpV813S7jN9HWlAKklhDwjq', 0, '', 'soledad #8', 'l4l0_love@hotmail.com', 1, 'QulstlvzaWNJNCdZj304tYYd55uoMmuJVyW4OhFFAorbwQxBA45pTBilOVSQ', '2020-06-01 13:05:46', '2020-06-01 13:05:46', '2020-06-25 05:23:46'),
(5, 'Alex', 'Hdez', 'Lopez', NULL, '$2y$10$EEoGSx95cZM7xi335EZGq.OeFRTzNgFsxrCtI0g5AAYWF1/8V.ESW', NULL, NULL, NULL, 'alex.hdez@digitalsoft.mx', NULL, 'oD0fWiPV20Jk06vVHJ4UG7JxDE6lSqucyTIDmHpgoSC1iIjA1YQlBBtbECVp', NULL, '2020-04-30 13:00:19', '2020-06-19 01:45:49'),
(6, 'Zuri', 'Contreras', 'Pérez', NULL, '$2y$10$FC2G7gUhyHXB0t1iWyPU9eJlby.lPQFtKzejIP6op.sZz9R1NrlzC', NULL, NULL, NULL, 'zuri@digitalsoft.mx', NULL, '9QGy9r92hMvfKT8Ed2y3COuPJNFrJxZfqt4iav1sh6GLKtRpGnqBvtCYNm6l', NULL, '2020-05-14 02:24:25', '2020-06-24 18:39:40'),
(11, 'Christian', 'H.', 'Petersen', NULL, '$2y$10$vowLAr8JM7NWHfSDRQ7j2OhScWlLyJCJWexT96NktWTsiCPxk6ZQW', NULL, NULL, NULL, 'c.petersen@impulsaenergia.mx', NULL, '8TWpUTpXNyuHaoSzjpFRn4nnl1zdVMDvOmlUihZPvG9CE0pegv2lMwwMQvRr', NULL, '2020-06-23 00:33:55', '2020-06-23 00:33:55'),
(12, 'Denisse', 'Fragoso', 'Mora', NULL, '$2y$10$dow7wzIxoZjoYr/8STfkP.3bxA8LB0gcF.i/Mu0q/8jocjmdHEtkW', NULL, NULL, NULL, 'd.fragoso@impulsaenergia.mx', NULL, '7Dxr5PGYfqDvh1RS0hzEzrm2OhPPa2uIhx8eecZ7w9oVXBXVegd3ohhiQcZh', NULL, '2020-07-02 16:47:16', '2020-07-02 16:47:16'),
(13, 'Sergio', 'Luna', 'Dominguez', NULL, '$2y$10$zEO.2vIHjxlD1FuUCTtJDui4bTVqFnB9knoY0pHP6dYs/G6xY4mXy', NULL, NULL, NULL, 's.luna@gas-solution.com', NULL, 'O9uA5ThmCz5j95kDei7C9sVCFevvMCesQeXgeCTwqxrzx1niC2138IcATdmw', NULL, '2020-07-07 00:34:22', '2020-07-07 00:34:22'),
(14, 'Lalo', 'Coyotl', 'Vazquez', NULL, '$2y$10$SEs6bmhDj/afSyQQsg0xO.YVA/g8Tod.u9tSwB1JTk6AWR0qOut8C', NULL, NULL, NULL, 'f030016@gmail.com', NULL, NULL, NULL, '2020-07-18 01:24:39', '2020-07-18 01:24:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valeros`
--

CREATE TABLE `valeros` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `terminal_id` bigint(20) UNSIGNED NOT NULL,
  `precio_regular` double(12,3) DEFAULT NULL,
  `precio_premium` double(12,3) DEFAULT NULL,
  `precio_disel` double(12,3) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `valeros`
--

INSERT INTO `valeros` (`id`, `terminal_id`, `precio_regular`, `precio_premium`, `precio_disel`, `created_at`, `updated_at`) VALUES
(2, 2, 0.000, 0.000, 0.000, '2020-06-01 23:20:35', '2020-06-01 23:20:35'),
(5, 5, 0.000, 0.000, 0.000, '2020-06-01 23:20:35', '2020-06-01 23:20:35'),
(6, 1, 0.000, 0.000, 0.000, '2020-04-02 14:20:35', '2020-04-02 14:20:35'),
(7, 1, 0.000, 0.000, 0.000, '2020-04-03 14:21:30', '2020-04-03 14:21:30'),
(8, 1, 0.000, 0.000, 0.000, '2020-04-04 14:22:13', '2020-04-04 14:22:13'),
(9, 1, 0.000, 0.000, 0.000, '2020-04-07 11:22:41', '2020-04-07 11:22:41'),
(10, 1, 0.000, 0.000, 0.000, '2020-04-08 11:24:38', '2020-04-08 11:24:38'),
(11, 2, 0.000, 0.000, 0.000, '2020-04-02 14:20:35', '2020-04-02 14:20:35'),
(12, 2, 0.000, 0.000, 0.000, '2020-04-03 14:21:30', '2020-04-03 14:21:30'),
(13, 2, 0.000, 0.000, 0.000, '2020-04-04 14:22:13', '2020-04-04 14:22:13'),
(14, 2, 0.000, 0.000, 0.000, '2020-04-07 11:22:41', '2020-04-07 11:22:41'),
(15, 2, 0.000, 0.000, 0.000, '2020-04-08 11:24:38', '2020-04-08 11:24:38'),
(16, 4, 0.000, 0.000, 0.000, '2020-04-02 14:20:35', '2020-04-02 14:20:35'),
(17, 4, 0.000, 0.000, 0.000, '2020-04-03 14:21:30', '2020-04-03 14:21:30'),
(18, 4, 0.000, 0.000, 0.000, '2020-04-04 14:22:13', '2020-04-04 14:22:13'),
(19, 4, 0.000, 0.000, 0.000, '2020-04-07 11:22:41', '2020-04-07 11:22:41'),
(20, 4, 0.000, 0.000, 0.000, '2020-04-08 11:24:38', '2020-04-08 11:24:38'),
(21, 5, 0.000, 0.000, 0.000, '2020-04-02 14:20:35', '2020-04-02 14:20:35'),
(22, 5, 0.000, 0.000, 0.000, '2020-04-03 14:21:30', '2020-04-03 14:21:30'),
(23, 5, 0.000, 0.000, 0.000, '2020-04-04 14:22:13', '2020-04-04 14:22:13'),
(24, 5, 0.000, 0.000, 0.000, '2020-04-07 11:22:41', '2020-04-07 11:22:41'),
(25, 5, 0.000, 0.000, 0.000, '2020-04-08 11:24:38', '2020-04-08 11:24:38'),
(26, 3, 11.640, 11.910, 16.760, '2020-03-02 21:24:38', '2020-03-02 21:24:38'),
(27, 3, 11.640, 11.910, 16.760, '2020-03-03 21:24:38', '2020-03-03 21:24:38'),
(28, 3, 11.640, 11.910, 16.760, '2020-03-04 21:24:38', '2020-03-04 21:24:38'),
(29, 3, 11.640, 11.910, 16.760, '2020-03-05 21:24:38', '2020-03-05 21:24:38'),
(30, 3, 11.640, 11.910, 16.760, '2020-03-06 21:24:38', '2020-03-06 21:24:38'),
(31, 3, 11.640, 11.910, 16.760, '2020-03-07 21:24:38', '2020-03-07 21:24:38'),
(32, 3, 11.640, 11.910, 16.760, '2020-03-08 21:24:38', '2020-03-08 21:24:38'),
(33, 3, 11.640, 11.910, 16.760, '2020-03-09 21:24:38', '2020-03-09 21:24:38'),
(34, 3, 11.640, 11.910, 16.760, '2020-03-10 21:24:38', '2020-03-10 21:24:38'),
(35, 3, 11.640, 11.910, 16.760, '2020-03-11 21:24:38', '2020-03-11 21:24:38'),
(36, 3, 11.640, 11.910, 16.760, '2020-03-12 21:24:38', '2020-03-12 21:24:38'),
(37, 3, 11.640, 11.910, 16.760, '2020-03-13 21:24:38', '2020-03-13 21:24:38'),
(38, 3, 11.640, 11.910, 16.760, '2020-03-14 21:24:38', '2020-03-14 21:24:38'),
(39, 3, 11.640, 11.910, 16.760, '2020-03-15 21:24:38', '2020-03-15 21:24:38'),
(40, 3, 11.640, 11.910, 16.760, '2020-03-16 21:24:38', '2020-03-16 21:24:38'),
(41, 3, 11.640, 11.910, 16.760, '2020-03-17 21:24:38', '2020-03-17 21:24:38'),
(42, 3, 11.640, 11.910, 16.760, '2020-03-18 21:24:38', '2020-03-18 21:24:38'),
(43, 3, 11.640, 11.910, 16.760, '2020-03-19 21:24:38', '2020-03-19 21:24:38'),
(44, 3, 11.640, 11.910, 16.760, '2020-03-20 21:24:38', '2020-03-20 21:24:38'),
(45, 3, 11.640, 11.910, 16.760, '2020-03-21 21:24:38', '2020-03-21 21:24:38'),
(46, 3, 11.640, 11.910, 16.760, '2020-03-22 21:24:38', '2020-03-22 21:24:38'),
(47, 3, 11.640, 11.910, 16.760, '2020-03-23 21:24:38', '2020-03-23 21:24:38'),
(48, 3, 11.640, 11.910, 16.760, '2020-03-24 21:24:38', '2020-03-24 21:24:38'),
(49, 3, 17.170, 16.940, 17.930, '2020-03-25 21:24:38', '2020-03-25 21:24:38'),
(50, 3, 17.220, 17.420, 18.030, '2020-03-26 21:24:38', '2020-03-26 21:24:38'),
(51, 3, 11.640, 11.910, 16.760, '2020-03-27 21:24:38', '2020-03-27 21:24:38'),
(52, 3, 12.140, 12.620, 17.100, '2020-03-28 21:24:38', '2020-03-28 21:24:38'),
(53, 3, 12.140, 12.620, 17.100, '2020-03-29 21:24:38', '2020-03-29 21:24:38'),
(54, 3, 12.140, 12.620, 17.100, '2020-03-30 21:24:38', '2020-03-30 21:24:38'),
(55, 3, 11.860, 12.420, 16.390, '2020-03-31 21:24:38', '2020-03-31 21:24:38'),
(56, 3, 12.270, 12.800, 16.540, '2020-04-01 21:24:38', '2020-04-01 21:24:38'),
(57, 3, 12.470, 13.160, 16.650, '2020-04-02 21:24:38', '2020-04-02 21:24:38'),
(58, 3, 12.090, 13.160, 16.650, '2020-04-03 03:20:35', '2020-04-03 03:20:35'),
(59, 3, 12.110, 12.600, 16.050, '2020-04-04 03:20:35', '2020-04-04 03:20:35'),
(60, 3, 12.110, 12.600, 16.050, '2020-04-05 03:22:13', '2020-04-05 03:22:13'),
(61, 3, 12.110, 12.600, 16.050, '2020-04-06 23:22:13', '2020-04-06 23:22:13'),
(62, 3, 12.600, 13.480, 16.690, '2020-04-07 23:22:41', '2020-04-07 23:22:41'),
(63, 3, 13.120, 13.560, 17.090, '2020-04-08 23:24:38', '2020-04-08 23:24:38'),
(64, 3, 13.120, 13.560, 17.090, '2020-04-09 23:24:38', '2020-04-09 23:24:38'),
(65, 3, 13.120, 13.560, 17.090, '2020-04-10 23:24:38', '2020-04-10 23:24:38'),
(66, 3, 13.120, 13.560, 17.090, '2020-04-11 23:24:38', '2020-04-11 23:24:38'),
(67, 3, 13.120, 13.560, 17.090, '2020-04-12 23:24:38', '2020-04-12 23:24:38'),
(68, 3, 13.120, 13.560, 17.090, '2020-04-13 10:00:00', '2020-04-13 10:00:00'),
(69, 3, 13.120, 13.560, 17.090, '2020-04-14 10:00:00', '2020-04-14 10:00:00'),
(70, 3, 12.830, 13.100, 16.260, '2020-04-15 00:37:33', '2020-04-15 00:37:33'),
(71, 3, 12.820, 13.200, 15.920, '2020-04-16 12:24:09', '2020-04-16 12:24:09'),
(72, 3, 12.880, 13.290, 16.030, '2020-04-17 15:36:19', '2020-04-17 15:36:19'),
(73, 3, 12.880, 13.290, 16.030, '2020-04-18 15:36:19', '2020-04-18 15:36:19'),
(74, 3, 12.880, 13.290, 16.030, '2020-04-19 15:36:19', '2020-04-19 15:36:19'),
(75, 3, 12.880, 13.290, 16.030, '2020-04-20 15:39:10', '2020-04-20 15:39:10'),
(76, 3, 13.020, 13.440, 15.760, '2020-04-21 16:04:13', '2020-04-21 16:04:13'),
(77, 3, 13.020, 13.220, 15.800, '2020-04-22 18:10:22', '2020-04-22 18:10:22'),
(78, 3, 12.590, 12.960, 15.270, '2020-04-23 11:08:28', '2020-04-23 11:08:28'),
(79, 1, 0.000, 0.000, 12.860, '2020-04-23 11:13:59', '2020-04-23 11:13:59'),
(80, 3, 12.590, 12.620, 14.950, '2020-04-24 16:04:58', '2020-04-24 16:04:58'),
(81, 3, 12.900, 13.200, 14.520, '2020-04-25 08:51:17', '2020-04-25 08:51:17'),
(82, 3, 12.900, 13.200, 14.520, '2020-04-26 16:38:41', '2020-04-26 16:38:41'),
(83, 3, 12.900, 13.200, 14.520, '2020-04-27 16:39:24', '2020-04-27 16:39:24'),
(84, 3, 12.780, 13.080, 14.310, '2020-04-28 16:41:08', '2020-04-28 16:41:08'),
(85, 3, 13.210, 13.410, 14.170, '2020-04-29 18:12:11', '2020-04-29 18:12:11'),
(86, 1, 0.000, 0.000, 11.670, '2020-04-28 18:12:41', '2020-04-28 18:12:41'),
(87, 5, 0.000, 0.000, 13.660, '2020-04-28 18:12:51', '2020-04-28 18:12:51'),
(88, 3, 12.820, 13.220, 13.570, '2020-04-30 13:00:50', '2020-04-30 13:00:50'),
(89, 3, 12.980, 13.360, 13.640, '2020-05-01 06:49:40', '2020-05-01 06:49:40'),
(90, 3, 13.300, 13.650, 14.180, '2020-05-02 06:28:39', '2020-05-02 06:28:39'),
(91, 3, 13.300, 13.650, 14.180, '2020-05-03 06:28:39', '2020-05-03 06:28:39'),
(92, 3, 13.300, 13.650, 14.180, '2020-05-04 06:28:39', '2020-05-04 06:28:39'),
(93, 3, 13.520, 13.880, 14.900, '2020-05-05 06:28:39', '2020-05-05 06:28:39'),
(94, 3, 13.410, 13.740, 14.770, '2020-05-06 06:28:39', '2020-05-06 06:28:39'),
(95, 3, 14.010, 14.320, 14.980, '2020-05-07 02:07:25', '2020-05-07 02:07:25'),
(96, 3, 14.430, 14.600, 15.490, '2020-05-08 04:52:32', '2020-05-08 04:52:32'),
(97, 3, 14.560, 14.890, 15.130, '2020-05-09 03:55:32', '2020-05-09 03:55:32'),
(98, 3, 14.830, 15.250, 15.210, '2020-05-10 04:39:25', '2020-05-10 04:39:25'),
(99, 3, 14.830, 15.250, 15.210, '2020-05-11 04:39:25', '2020-05-11 04:39:25'),
(100, 3, 14.830, 15.250, 15.210, '2020-05-12 07:32:17', '2020-05-12 07:32:17'),
(101, 3, 14.770, 15.060, 15.990, '2020-05-13 03:24:17', '2020-05-13 03:24:17'),
(102, 3, 14.770, 15.060, 15.590, '2020-05-14 04:26:11', '2020-05-14 04:26:11'),
(103, 3, 14.380, 14.720, 15.170, '2020-05-15 04:26:11', '2020-05-15 04:26:11'),
(104, 3, 14.290, 14.640, 15.280, '2020-05-16 04:26:11', '2020-05-16 04:26:11'),
(105, 3, 14.770, 15.170, 15.730, '2020-05-17 04:26:11', '2020-05-17 04:26:11'),
(106, 3, 14.770, 15.170, 15.730, '2020-05-18 04:26:11', '2020-05-18 04:26:11'),
(107, 3, 14.770, 15.170, 15.730, '2020-05-19 04:26:11', '2020-05-19 04:26:11'),
(108, 3, 15.110, 15.460, 15.950, '2020-05-20 04:26:11', '2020-05-20 04:26:11'),
(109, 3, 15.220, 15.570, 16.340, '2020-05-21 04:26:11', '2020-05-21 04:26:11'),
(110, 3, 15.350, 15.730, 16.010, '2020-05-21 17:00:00', '2020-05-26 04:47:24'),
(111, 3, 15.250, 15.600, 16.190, '2020-05-22 17:00:00', '2020-05-26 04:48:36'),
(112, 3, 15.250, 15.600, 16.190, '2020-05-23 17:00:00', '2020-05-26 04:49:41'),
(113, 3, 15.250, 15.600, 16.190, '2020-05-24 17:00:00', '2020-05-26 04:52:58'),
(114, 3, 15.150, 15.500, 16.210, '2020-05-25 17:00:00', '2020-05-26 10:56:16'),
(115, 3, 15.050, 15.400, 16.090, '2020-05-26 17:00:00', '2020-05-26 10:56:40'),
(116, 3, 15.050, 15.400, 16.160, '2020-05-27 12:00:00', '2020-06-02 04:49:39'),
(117, 3, 15.050, 15.400, 16.170, '2020-05-28 12:00:00', '2020-06-02 04:50:19'),
(118, 3, 14.820, 15.170, 15.990, '2020-05-29 12:00:00', '2020-06-02 04:50:56'),
(119, 3, 14.840, 15.190, 15.680, '2020-05-30 12:00:00', '2020-06-02 04:51:28'),
(120, 3, 14.840, 15.190, 15.680, '2020-05-31 12:00:00', '2020-06-02 04:52:02'),
(121, 3, 15.250, 15.450, 16.150, '2020-06-01 12:00:00', '2020-06-02 04:53:12'),
(123, 3, 15.620, 15.820, 16.500, '2020-06-03 07:00:00', '2020-06-16 19:16:17'),
(124, 3, 15.890, 16.090, 16.850, '2020-06-04 07:00:00', '2020-06-16 19:16:45'),
(125, 3, 15.730, 15.920, 16.380, '2020-06-05 07:00:00', '2020-06-16 19:17:21'),
(126, 3, 15.730, 15.920, 16.380, '2020-06-06 07:00:00', '2020-06-16 19:17:57'),
(127, 3, 16.080, 16.280, 16.530, '2020-06-08 07:00:00', '2020-06-16 21:18:31'),
(128, 3, 15.730, 15.920, 16.380, '2020-06-07 07:00:00', '2020-06-16 21:19:22'),
(129, 3, 16.440, 16.630, 17.030, '2020-06-09 07:00:00', '2020-06-16 21:20:33'),
(130, 3, 16.270, 16.480, 16.890, '2020-06-10 07:00:00', '2020-06-16 21:21:37'),
(131, 3, 16.470, 16.670, 17.180, '2020-06-11 07:00:00', '2020-06-16 21:22:31'),
(132, 3, 16.350, 16.550, 17.200, '2020-06-12 07:00:00', '2020-06-16 21:23:11'),
(133, 3, 16.350, 16.550, 17.200, '2020-06-13 07:00:00', '2020-06-16 21:24:19'),
(134, 3, 16.350, 16.550, 17.200, '2020-06-14 07:00:00', '2020-06-16 21:25:37'),
(135, 3, 16.020, 16.220, 17.000, '2020-06-15 07:00:00', '2020-06-16 21:26:33'),
(136, 3, 16.190, 16.390, 17.120, '2020-06-16 07:00:00', '2020-06-16 21:28:53'),
(137, 3, 16.600, 16.790, 17.400, '2020-06-17 07:00:00', '2020-06-16 23:43:06'),
(157, 3, 15.670, 15.790, 16.540, '2020-06-02 07:00:00', '2020-06-17 17:45:06'),
(162, 1, 0.000, 0.000, 0.000, '2020-06-01 18:16:02', '2020-06-01 18:16:02'),
(165, 1, 0.000, 0.000, 0.000, '2020-06-02 20:50:23', '2020-06-02 20:50:23'),
(171, 3, 16.730, 16.930, 17.520, '2020-06-18 07:00:00', '2020-06-19 01:04:37'),
(172, 4, 15.250, 15.450, 16.150, '2020-06-01 07:00:00', '2020-06-19 18:58:39'),
(173, 4, 15.670, 15.870, 16.540, '2020-06-02 07:00:00', '2020-06-19 18:59:10'),
(174, 4, 15.620, 15.820, 16.500, '2020-06-03 07:00:00', '2020-06-19 19:00:16'),
(175, 4, 15.890, 16.090, 16.850, '2020-06-04 07:00:00', '2020-06-19 19:01:10'),
(176, 4, 15.730, 15.920, 16.380, '2020-06-05 07:00:00', '2020-06-19 19:01:41'),
(177, 4, 15.730, 15.920, 16.380, '2020-06-06 07:00:00', '2020-06-19 19:02:16'),
(178, 4, 15.730, 15.920, 15.380, '2020-06-07 07:00:00', '2020-06-19 19:03:19'),
(179, 4, 16.080, 16.280, 16.530, '2020-06-08 07:00:00', '2020-06-19 19:03:55'),
(180, 4, 16.440, 16.630, 17.030, '2020-06-09 07:00:00', '2020-06-19 19:04:33'),
(181, 4, 16.270, 16.480, 16.890, '2020-06-10 07:00:00', '2020-06-19 19:09:48'),
(182, 4, 16.470, 16.670, 17.180, '2020-06-11 07:00:00', '2020-06-19 19:10:32'),
(183, 4, 16.350, 16.550, 17.200, '2020-06-12 07:00:00', '2020-06-19 19:11:16'),
(184, 4, 16.350, 16.550, 17.200, '2020-06-13 07:00:00', '2020-06-19 19:12:21'),
(185, 4, 16.350, 16.550, 17.200, '2020-06-14 07:00:00', '2020-06-19 19:13:10'),
(186, 4, 16.020, 16.220, 17.000, '2020-06-15 07:00:00', '2020-06-19 19:13:53'),
(187, 4, 16.190, 16.390, 16.120, '2020-06-16 07:00:00', '2020-06-19 19:14:42'),
(188, 4, 16.600, 16.790, 17.040, '2020-06-17 07:00:00', '2020-06-19 19:16:06'),
(189, 4, 16.730, 16.930, 17.620, '2020-06-18 07:00:00', '2020-06-19 19:16:49'),
(190, 6, 15.250, 15.450, 16.150, '2020-06-01 07:00:00', '2020-06-19 19:54:58'),
(191, 6, 15.670, 15.870, 16.540, '2020-06-02 07:00:00', '2020-06-19 19:55:41'),
(192, 6, 15.620, 15.820, 16.500, '2020-06-03 07:00:00', '2020-06-19 19:57:20'),
(193, 4, 16.830, 17.040, 17.690, '2020-06-19 07:00:00', '2020-06-19 19:58:38'),
(194, 6, 15.890, 16.090, 15.850, '2020-06-04 07:00:00', '2020-06-19 20:00:35'),
(195, 6, 15.730, 15.920, 16.380, '2020-06-05 07:00:00', '2020-06-19 20:01:22'),
(196, 6, 15.730, 15.920, 16.380, '2020-06-06 07:00:00', '2020-06-19 20:02:00'),
(197, 6, 15.730, 15.920, 16.380, '2020-06-07 07:00:00', '2020-06-19 20:03:03'),
(198, 6, 16.080, 16.280, 16.530, '2020-06-08 07:00:00', '2020-06-19 20:03:41'),
(199, 6, 16.440, 16.630, 17.030, '2020-06-09 07:00:00', '2020-06-19 20:04:26'),
(200, 6, 16.270, 16.480, 16.890, '2020-06-10 07:00:00', '2020-06-19 20:05:11'),
(201, 6, 16.470, 16.670, 17.180, '2020-06-11 07:00:00', '2020-06-19 20:05:42'),
(202, 6, 16.350, 16.550, 17.200, '2020-06-12 07:00:00', '2020-06-19 20:06:25'),
(203, 6, 16.350, 16.550, 17.200, '2020-06-13 07:00:00', '2020-06-19 20:07:09'),
(204, 6, 16.350, 16.550, 17.200, '2020-06-14 07:00:00', '2020-06-19 20:07:42'),
(205, 6, 16.020, 16.220, 17.000, '2020-06-15 07:00:00', '2020-06-19 20:08:31'),
(206, 6, 16.190, 16.390, 16.120, '2020-06-16 07:00:00', '2020-06-19 20:09:14'),
(207, 6, 16.600, 16.790, 17.040, '2020-06-17 07:00:00', '2020-06-19 20:10:00'),
(208, 3, 16.830, 17.040, 17.690, '2020-06-19 07:00:00', '2020-06-19 20:10:39'),
(209, 6, 16.730, 16.930, 17.620, '2020-06-18 07:00:00', '2020-06-19 20:11:10'),
(210, 6, 16.830, 17.040, 17.690, '2020-06-19 07:00:00', '2020-06-19 20:11:47'),
(211, 3, 16.600, 17.060, 17.240, '2020-06-20 07:00:00', '2020-06-22 17:40:08'),
(212, 3, 16.600, 17.060, 17.240, '2020-06-21 07:00:00', '2020-06-22 17:41:06'),
(213, 3, 17.170, 16.940, 17.930, '2020-06-22 07:00:00', '2020-06-22 17:41:39'),
(214, 4, 16.600, 17.060, 17.240, '2020-06-20 07:00:00', '2020-06-22 18:12:50'),
(215, 4, 16.600, 17.060, 17.240, '2020-06-21 07:00:00', '2020-06-22 18:13:31'),
(216, 4, 16.600, 17.060, 17.240, '2020-06-22 07:00:00', '2020-06-22 18:14:11'),
(217, 6, 16.600, 17.060, 17.240, '2020-06-20 07:00:00', '2020-06-22 18:14:54'),
(218, 6, 16.600, 17.060, 17.240, '2020-06-21 07:00:00', '2020-06-22 18:15:41'),
(219, 6, 16.600, 17.060, 17.240, '2020-06-22 07:00:00', '2020-06-22 18:16:28'),
(220, 3, 17.220, 17.420, 18.030, '2020-06-23 07:00:00', '2020-06-24 20:41:03'),
(221, 3, 17.330, 17.540, 18.010, '2020-06-24 07:00:00', '2020-06-24 18:34:18'),
(222, 4, 17.330, 17.540, 18.010, '2020-06-24 07:00:00', '2020-06-24 18:20:32'),
(223, 6, 17.330, 17.540, 18.010, '2020-06-24 07:00:00', '2020-06-24 18:21:41'),
(224, 4, 17.220, 17.420, 18.030, '2020-06-23 07:00:00', '2020-06-24 20:40:15'),
(225, 6, 17.330, 17.540, 18.010, '2020-06-23 07:00:00', '2020-06-24 20:19:48'),
(226, 3, 17.320, 17.520, 17.820, '2020-06-25 07:00:00', '2020-06-25 18:08:17'),
(227, 4, 17.320, 17.520, 17.820, '2020-06-25 07:00:00', '2020-06-25 18:09:15'),
(228, 6, 17.320, 17.520, 17.820, '2020-06-25 07:00:00', '2020-06-25 18:09:53'),
(229, 3, 16.820, 17.020, 17.660, '2020-06-26 07:00:00', '2020-06-26 20:50:59'),
(230, 4, 16.820, 17.020, 17.660, '2020-06-26 07:00:00', '2020-06-26 20:51:46'),
(231, 6, 16.820, 17.020, 17.660, '2020-06-26 07:00:00', '2020-06-26 20:52:26'),
(232, 3, 16.820, 17.020, 17.660, '2020-06-27 07:00:00', '2020-06-29 17:51:26'),
(233, 3, 16.820, 17.020, 17.660, '2020-06-28 07:00:00', '2020-06-29 17:52:20'),
(234, 3, 16.870, 17.060, 17.690, '2020-06-29 07:00:00', '2020-06-29 18:56:56'),
(235, 3, 16.750, 17.050, 17.630, '2020-06-30 17:00:00', '2020-06-30 18:11:42'),
(236, 4, 16.820, 17.020, 17.660, '2020-06-27 07:00:00', '2020-06-30 23:39:11'),
(237, 4, 16.820, 17.020, 17.660, '2020-06-28 07:00:00', '2020-06-30 23:40:02'),
(238, 4, 16.870, 17.060, 17.690, '2020-06-29 07:00:00', '2020-06-30 23:41:40'),
(239, 4, 16.750, 17.050, 17.630, '2020-06-30 07:00:00', '2020-06-30 23:42:56'),
(240, 6, 16.820, 17.020, 17.660, '2020-06-27 07:00:00', '2020-06-30 23:43:33'),
(241, 6, 16.820, 17.020, 17.660, '2020-06-28 07:00:00', '2020-06-30 23:44:42'),
(242, 6, 16.870, 17.060, 17.690, '2020-06-29 07:00:00', '2020-06-30 23:45:35'),
(243, 6, 16.750, 17.050, 17.630, '2020-06-30 07:00:00', '2020-06-30 23:46:01'),
(244, 1, 14.670, 0.000, 15.240, '2020-07-01 07:03:43', '2020-07-21 21:45:56'),
(245, 2, 0.000, 0.000, 0.000, '2020-07-01 07:03:43', '2020-07-01 07:03:43'),
(248, 5, 0.000, 0.000, 0.000, '2020-07-01 07:03:43', '2020-07-01 07:03:43'),
(251, 3, 17.160, 17.360, 17.700, '2020-07-01 07:00:00', '2020-07-02 01:01:58'),
(252, 4, 17.160, 17.360, 17.700, '2020-07-01 07:00:00', '2020-07-01 23:45:47'),
(253, 6, 17.160, 17.360, 17.700, '2020-07-01 07:00:00', '2020-07-01 23:46:31'),
(254, 3, 17.140, 17.230, 17.740, '2020-07-02 07:00:00', '2020-07-02 18:05:58'),
(255, 4, 17.140, 17.230, 17.740, '2020-07-02 07:00:00', '2020-07-02 18:07:09'),
(256, 6, 17.140, 17.230, 17.740, '2020-07-02 07:00:00', '2020-07-02 18:07:51'),
(257, 3, 17.000, 17.100, 17.690, '2020-07-03 07:00:00', '2020-07-06 17:21:14'),
(258, 4, 17.000, 17.100, 17.690, '2020-07-03 07:00:00', '2020-07-06 17:22:24'),
(259, 6, 17.000, 17.100, 17.690, '2020-07-03 07:00:00', '2020-07-06 17:23:23'),
(260, 3, 17.000, 17.100, 17.690, '2020-07-04 07:00:00', '2020-07-06 17:23:58'),
(261, 6, 17.000, 17.100, 17.690, '2020-07-04 07:00:00', '2020-07-06 17:25:22'),
(262, 4, 17.000, 17.100, 17.690, '2020-07-04 07:00:00', '2020-07-06 17:25:59'),
(263, 6, 17.000, 17.100, 17.690, '2020-07-05 07:00:00', '2020-07-06 17:26:36'),
(264, 3, 17.000, 17.100, 17.690, '2020-07-05 07:00:00', '2020-07-06 17:27:11'),
(265, 4, 17.000, 17.100, 17.690, '2020-07-05 07:00:00', '2020-07-06 17:41:42'),
(266, 3, 17.010, 17.100, 17.690, '2020-07-06 07:00:00', '2020-07-06 18:32:11'),
(267, 6, 17.010, 17.100, 17.690, '2020-07-06 07:00:00', '2020-07-06 18:32:59'),
(268, 4, 17.010, 17.100, 17.690, '2020-07-06 07:00:00', '2020-07-06 18:33:37'),
(269, 3, 17.250, 17.400, 17.900, '2020-07-07 07:00:00', '2020-07-07 17:53:10'),
(270, 4, 17.250, 17.400, 17.900, '2020-07-07 07:00:00', '2020-07-07 18:00:56'),
(271, 6, 17.250, 17.400, 17.900, '2020-07-07 07:00:00', '2020-07-07 18:01:22'),
(272, 3, 17.050, 17.200, 17.850, '2020-07-08 07:00:00', '2020-07-08 18:12:15'),
(273, 4, 17.050, 17.200, 17.850, '2020-07-08 07:00:00', '2020-07-08 18:13:17'),
(274, 6, 17.050, 17.200, 17.850, '2020-07-08 07:00:00', '2020-07-08 18:13:43'),
(275, 3, 17.320, 17.470, 18.000, '2020-07-09 07:00:00', '2020-07-09 17:28:39'),
(276, 4, 17.320, 17.470, 18.000, '2020-07-09 07:00:00', '2020-07-09 17:29:06'),
(277, 6, 17.320, 17.440, 18.000, '2020-07-09 07:00:00', '2020-07-09 17:29:28'),
(278, 3, 17.270, 17.420, 17.950, '2020-07-10 07:00:00', '2020-07-10 17:40:58'),
(279, 4, 17.270, 17.420, 17.950, '2020-07-10 07:00:00', '2020-07-10 17:41:20'),
(280, 6, 17.270, 17.420, 17.950, '2020-07-10 07:00:00', '2020-07-10 17:41:43'),
(281, 3, 17.160, 17.310, 17.850, '2020-07-11 07:00:00', '2020-07-13 17:22:10'),
(282, 4, 17.160, 17.310, 17.850, '2020-07-11 07:00:00', '2020-07-13 17:22:32'),
(283, 3, 17.160, 17.130, 17.850, '2020-07-12 07:00:00', '2020-07-13 18:17:01'),
(284, 6, 17.160, 17.310, 17.850, '2020-07-11 07:00:00', '2020-07-13 18:18:06'),
(285, 4, 17.160, 17.310, 17.850, '2020-07-12 07:00:00', '2020-07-13 18:20:47'),
(286, 6, 17.160, 17.310, 17.850, '2020-07-12 07:00:00', '2020-07-13 18:21:12'),
(287, 3, 17.160, 17.310, 17.850, '2020-07-13 07:00:00', '2020-07-13 18:21:30'),
(288, 4, 17.160, 17.310, 17.850, '2020-07-13 07:00:00', '2020-07-13 18:21:58'),
(289, 6, 17.160, 17.310, 17.850, '2020-07-13 07:00:00', '2020-07-13 18:22:30'),
(290, 3, 16.960, 17.110, 17.730, '2020-07-14 07:00:00', '2020-07-15 01:14:53'),
(291, 4, 16.960, 17.110, 17.730, '2020-07-14 07:00:00', '2020-07-15 01:15:16'),
(292, 6, 16.960, 17.110, 17.730, '2020-07-14 07:00:00', '2020-07-15 01:15:44'),
(293, 3, 16.960, 17.110, 17.730, '2020-07-15 07:00:00', '2020-07-15 16:49:54'),
(294, 4, 16.960, 17.110, 17.730, '2020-07-15 07:00:00', '2020-07-15 16:50:19'),
(295, 6, 16.960, 17.110, 17.730, '2020-07-15 07:00:00', '2020-07-15 16:51:05'),
(297, 1, 14.750, 0.000, 15.370, '2020-07-02 07:00:00', '2020-07-16 01:04:04'),
(298, 1, 14.800, 0.000, 15.500, '2020-07-03 07:00:00', '2020-07-16 01:04:22'),
(299, 3, 16.960, 17.110, 17.730, '2020-07-16 07:00:00', '2020-07-16 19:05:59'),
(300, 4, 16.960, 17.110, 17.730, '2020-07-16 07:00:00', '2020-07-16 19:06:32'),
(301, 6, 16.960, 17.110, 17.730, '2020-07-16 07:00:00', '2020-07-16 19:06:55'),
(302, 1, 14.800, 0.000, 15.500, '2020-07-04 07:00:00', '2020-07-16 23:35:54'),
(303, 1, 14.800, 0.000, 15.500, '2020-07-05 07:00:00', '2020-07-16 23:37:29'),
(304, 1, 14.790, 0.000, 15.360, '2020-07-06 07:00:00', '2020-07-17 00:01:50'),
(305, 1, 14.630, 0.000, 15.380, '2020-07-07 07:00:00', '2020-07-17 00:02:16'),
(306, 1, 15.730, 17.200, 15.340, '2020-07-08 07:00:00', '2020-07-17 00:02:45'),
(307, 1, 14.910, 0.000, 15.390, '2020-07-09 07:00:00', '2020-07-17 00:04:24'),
(308, 1, 14.680, 0.000, 15.410, '2020-07-10 07:00:00', '2020-07-17 00:04:44'),
(309, 1, 14.680, 0.000, 15.410, '2020-07-11 07:00:00', '2020-07-17 00:05:05'),
(310, 1, 14.680, 0.000, 15.410, '2020-07-12 07:00:00', '2020-07-17 00:05:26'),
(311, 1, 14.820, 0.000, 15.490, '2020-07-13 07:00:00', '2020-07-17 00:05:58'),
(312, 1, 14.480, 0.000, 15.220, '2020-07-14 07:00:00', '2020-07-17 00:06:17'),
(313, 1, 14.480, 0.000, 15.220, '2020-07-15 07:00:00', '2020-07-17 00:06:41'),
(314, 1, 14.380, 0.000, 15.250, '2020-07-16 07:00:00', '2020-07-17 00:06:57'),
(315, 3, 16.900, 0.000, 17.830, '2020-07-17 07:00:00', '2020-07-17 18:14:11'),
(316, 4, 16.900, 0.000, 17.830, '2020-07-17 07:00:00', '2020-07-17 18:14:31'),
(317, 6, 16.900, 0.000, 17.830, '2020-07-17 07:00:00', '2020-07-17 18:14:59'),
(318, 1, 14.330, 0.000, 15.210, '2020-07-17 07:00:00', '2020-07-17 18:18:28'),
(319, 3, 16.790, 16.990, 17.660, '2020-07-18 07:00:00', '2020-07-20 20:54:57'),
(320, 1, 14.250, 0.000, 15.130, '2020-07-18 07:00:00', '2020-07-20 20:55:13'),
(321, 4, 16.790, 16.990, 17.660, '2020-07-18 07:00:00', '2020-07-20 20:55:32'),
(322, 6, 16.790, 16.990, 17.660, '2020-07-18 07:00:00', '2020-07-20 20:55:50'),
(323, 3, 16.790, 16.990, 17.660, '2020-07-19 07:00:00', '2020-07-20 20:56:09'),
(324, 4, 16.790, 16.990, 17.660, '2020-07-19 07:00:00', '2020-07-20 20:56:29'),
(325, 6, 16.790, 16.990, 17.660, '2020-07-19 07:00:00', '2020-07-20 20:56:51'),
(326, 1, 14.250, 0.000, 15.130, '2020-07-19 07:00:00', '2020-07-20 20:57:08'),
(327, 1, 14.250, 0.000, 15.130, '2020-07-20 07:00:00', '2020-07-20 20:57:23'),
(328, 3, 16.790, 16.990, 17.660, '2020-07-20 07:00:00', '2020-07-20 20:57:38'),
(329, 4, 16.790, 16.990, 17.660, '2020-07-20 07:00:00', '2020-07-21 18:06:20'),
(330, 6, 16.790, 16.990, 17.660, '2020-07-20 07:00:00', '2020-07-20 21:01:23'),
(333, 3, 16.650, 16.840, 17.650, '2020-07-21 07:00:00', '2020-07-21 18:10:49'),
(334, 4, 16.650, 16.840, 17.650, '2020-07-21 07:00:00', '2020-07-21 18:11:14'),
(335, 6, 16.650, 16.840, 17.650, '2020-07-21 07:00:00', '2020-07-21 18:11:40'),
(336, 3, 16.850, 17.050, 17.900, '2020-07-22 07:00:00', '2020-07-22 19:16:44'),
(337, 4, 16.850, 17.050, 17.900, '2020-07-22 07:00:00', '2020-07-22 19:17:09'),
(338, 6, 16.850, 17.050, 17.900, '2020-07-22 07:00:00', '2020-07-22 19:17:31'),
(339, 1, 14.650, 0.000, 15.640, '2020-07-22 07:00:00', '2020-07-22 19:17:49'),
(340, 3, 17.060, 17.270, 18.220, '2020-07-23 07:00:00', '2020-07-23 18:02:00'),
(341, 4, 17.060, 17.270, 18.220, '2020-07-23 07:00:00', '2020-07-23 18:02:27'),
(342, 6, 17.060, 17.270, 18.220, '2020-07-23 07:00:00', '2020-07-23 18:02:54'),
(343, 1, 14.640, 0.000, 15.640, '2020-07-23 07:00:00', '2020-07-23 18:03:13'),
(344, 1, 14.650, 0.000, 15.640, '2020-07-21 07:00:00', '2020-07-23 18:04:26'),
(345, 3, 17.100, 17.300, 17.890, '2020-07-24 07:00:00', '2020-07-24 18:15:34'),
(346, 4, 17.100, 17.300, 17.890, '2020-07-24 07:00:00', '2020-07-24 18:15:56'),
(347, 6, 17.100, 17.300, 17.890, '2020-07-24 07:00:00', '2020-07-24 18:16:51'),
(348, 1, 14.370, 0.000, 15.360, '2020-07-24 07:00:00', '2020-07-24 18:17:10'),
(349, 3, 17.100, 17.300, 17.890, '2020-07-25 07:00:00', '2020-07-27 20:13:49'),
(350, 3, 17.100, 17.300, 17.890, '2020-07-26 07:00:00', '2020-07-27 20:14:16'),
(351, 3, 16.980, 17.190, 17.870, '2020-07-27 07:00:00', '2020-07-27 20:20:03'),
(352, 4, 17.100, 17.300, 17.890, '2020-07-25 07:00:00', '2020-07-27 20:23:15'),
(353, 4, 16.980, 17.190, 17.870, '2020-07-27 07:00:00', '2020-07-27 20:19:14'),
(354, 6, 16.980, 17.190, 17.870, '2020-07-27 07:00:00', '2020-07-27 20:20:30'),
(355, 1, 14.580, 0.000, 15.390, '2020-07-27 07:00:00', '2020-07-27 20:20:49'),
(356, 1, 14.370, 0.000, 15.360, '2020-07-25 07:00:00', '2020-07-27 20:21:10'),
(357, 1, 14.370, 0.000, 15.360, '2020-07-26 07:00:00', '2020-07-27 20:21:45'),
(358, 4, 17.100, 17.300, 17.870, '2020-07-26 07:00:00', '2020-07-27 20:24:03'),
(359, 6, 17.100, 17.300, 17.890, '2020-07-25 07:00:00', '2020-07-27 20:24:52'),
(360, 6, 17.100, 17.300, 17.890, '2020-07-26 07:00:00', '2020-07-27 20:25:54'),
(361, 3, 17.090, 17.290, 17.900, '2020-07-28 07:00:00', '2020-07-28 20:05:55'),
(362, 1, 14.580, 0.000, 15.390, '2020-07-28 07:00:00', '2020-07-28 20:06:13'),
(363, 4, 17.090, 17.290, 17.900, '2020-07-28 07:00:00', '2020-07-28 20:07:52'),
(364, 6, 17.090, 17.290, 17.900, '2020-07-28 07:00:00', '2020-07-28 20:08:15'),
(365, 1, 14.370, 0.000, 15.170, '2020-07-29 07:00:00', '2020-07-29 20:26:06'),
(366, 3, 16.880, 17.080, 17.650, '2020-07-29 07:00:00', '2020-07-29 20:26:25'),
(367, 4, 16.880, 17.080, 17.650, '2020-07-29 07:00:00', '2020-07-29 20:26:44'),
(368, 6, 16.880, 17.080, 17.650, '2020-07-29 07:00:00', '2020-07-29 20:27:04'),
(369, 1, 14.370, 0.000, 15.170, '2020-07-30 07:00:00', '2020-07-30 18:45:38'),
(370, 3, 16.820, 17.020, 17.650, '2020-07-30 07:00:00', '2020-07-30 18:45:57'),
(371, 4, 16.820, 17.020, 17.650, '2020-07-30 07:00:00', '2020-07-30 18:46:14'),
(372, 6, 16.820, 17.020, 17.650, '2020-07-30 07:00:00', '2020-07-30 18:46:33');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `competitions`
--
ALTER TABLE `competitions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `competitions_terminal_id_foreign` (`terminal_id`);

--
-- Indices de la tabla `datosubicacions`
--
ALTER TABLE `datosubicacions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `discount_life`
--
ALTER TABLE `discount_life`
  ADD PRIMARY KEY (`id`),
  ADD KEY `discount_life_discount_id_foreign` (`discount_id`),
  ADD KEY `discount_life_life_id_foreign` (`life_id`);

--
-- Indices de la tabla `estacions`
--
ALTER TABLE `estacions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estacion_user`
--
ALTER TABLE `estacion_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estacion_user_user_id_foreign` (`user_id`),
  ADD KEY `estacion_user_estacion_id_foreign` (`estacion_id`);

--
-- Indices de la tabla `fits`
--
ALTER TABLE `fits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fits_terminal_id_foreign` (`terminal_id`);

--
-- Indices de la tabla `impulsas`
--
ALTER TABLE `impulsas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `impulsas_terminal_id_foreign` (`terminal_id`);

--
-- Indices de la tabla `lives`
--
ALTER TABLE `lives`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `login_acts`
--
ALTER TABLE `login_acts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `menu_role`
--
ALTER TABLE `menu_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_role_menu_id_foreign` (`menu_id`),
  ADD KEY `menu_role_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `policons`
--
ALTER TABLE `policons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `policons_terminal_id_foreign` (`terminal_id`);

--
-- Indices de la tabla `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prices_competition_id_foreign` (`competition_id`);

--
-- Indices de la tabla `price_impulsas`
--
ALTER TABLE `price_impulsas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `price_impulsas_impulsa_id_foreign` (`impulsa_id`);

--
-- Indices de la tabla `price_policons`
--
ALTER TABLE `price_policons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `price_policons_policon_id_foreign` (`policon_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `terminals`
--
ALTER TABLE `terminals`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `valeros`
--
ALTER TABLE `valeros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `valeros_terminal_id_foreign` (`terminal_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `competitions`
--
ALTER TABLE `competitions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `datosubicacions`
--
ALTER TABLE `datosubicacions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `discount_life`
--
ALTER TABLE `discount_life`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `estacions`
--
ALTER TABLE `estacions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estacion_user`
--
ALTER TABLE `estacion_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `fits`
--
ALTER TABLE `fits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `impulsas`
--
ALTER TABLE `impulsas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `lives`
--
ALTER TABLE `lives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `login_acts`
--
ALTER TABLE `login_acts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=321;

--
-- AUTO_INCREMENT de la tabla `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `menu_role`
--
ALTER TABLE `menu_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=520;

--
-- AUTO_INCREMENT de la tabla `policons`
--
ALTER TABLE `policons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `prices`
--
ALTER TABLE `prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=420;

--
-- AUTO_INCREMENT de la tabla `price_impulsas`
--
ALTER TABLE `price_impulsas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=244;

--
-- AUTO_INCREMENT de la tabla `price_policons`
--
ALTER TABLE `price_policons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `terminals`
--
ALTER TABLE `terminals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `valeros`
--
ALTER TABLE `valeros`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=373;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `competitions`
--
ALTER TABLE `competitions`
  ADD CONSTRAINT `competitions_terminal_id_foreign` FOREIGN KEY (`terminal_id`) REFERENCES `terminals` (`id`);

--
-- Filtros para la tabla `datosubicacions`
--
ALTER TABLE `datosubicacions`
  ADD CONSTRAINT `datosubicacions_id_foreign` FOREIGN KEY (`id`) REFERENCES `estacions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `discount_life`
--
ALTER TABLE `discount_life`
  ADD CONSTRAINT `discount_life_discount_id_foreign` FOREIGN KEY (`discount_id`) REFERENCES `discounts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `discount_life_life_id_foreign` FOREIGN KEY (`life_id`) REFERENCES `lives` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `estacions`
--
ALTER TABLE `estacions`
  ADD CONSTRAINT `estacions_id_foreign` FOREIGN KEY (`id`) REFERENCES `terminals` (`id`);

--
-- Filtros para la tabla `estacion_user`
--
ALTER TABLE `estacion_user`
  ADD CONSTRAINT `estacion_user_estacion_id_foreign` FOREIGN KEY (`estacion_id`) REFERENCES `estacions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `estacion_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `fits`
--
ALTER TABLE `fits`
  ADD CONSTRAINT `fits_terminal_id_foreign` FOREIGN KEY (`terminal_id`) REFERENCES `terminals` (`id`);

--
-- Filtros para la tabla `impulsas`
--
ALTER TABLE `impulsas`
  ADD CONSTRAINT `impulsas_terminal_id_foreign` FOREIGN KEY (`terminal_id`) REFERENCES `terminals` (`id`);

--
-- Filtros para la tabla `menu_role`
--
ALTER TABLE `menu_role`
  ADD CONSTRAINT `menu_role_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `menu_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `policons`
--
ALTER TABLE `policons`
  ADD CONSTRAINT `policons_terminal_id_foreign` FOREIGN KEY (`terminal_id`) REFERENCES `terminals` (`id`);

--
-- Filtros para la tabla `prices`
--
ALTER TABLE `prices`
  ADD CONSTRAINT `prices_competition_id_foreign` FOREIGN KEY (`competition_id`) REFERENCES `competitions` (`id`);

--
-- Filtros para la tabla `price_impulsas`
--
ALTER TABLE `price_impulsas`
  ADD CONSTRAINT `price_impulsas_impulsa_id_foreign` FOREIGN KEY (`impulsa_id`) REFERENCES `impulsas` (`id`);

--
-- Filtros para la tabla `price_policons`
--
ALTER TABLE `price_policons`
  ADD CONSTRAINT `price_policons_policon_id_foreign` FOREIGN KEY (`policon_id`) REFERENCES `policons` (`id`);

--
-- Filtros para la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `valeros`
--
ALTER TABLE `valeros`
  ADD CONSTRAINT `valeros_terminal_id_foreign` FOREIGN KEY (`terminal_id`) REFERENCES `terminals` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
