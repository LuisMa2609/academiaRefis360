-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-08-2023 a las 20:22:39
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
-- Base de datos: `academiarefis360`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guias`
--

CREATE TABLE `guias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `urlvideo` varchar(255) NOT NULL,
  `urlpdf` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `guias`
--

INSERT INTO `guias` (`id`, `nombre`, `descripcion`, `urlvideo`, `urlpdf`, `created_at`, `updated_at`) VALUES
(1, 'Guía de prueba número uno para la pagina', 'Primer prueba de guia insertada por PhpMyAdmin\r\ntextotextotextotextotextotextotextotextotextotextotextotextotextotext', 'urldelvideo.com', 'urldelpdf.com', NULL, NULL),
(2, 'Ejemplo de guía de prueba numero dos para la ', 'Ejemplo numero dos para la pagina insertada mediante PHPMyAdmin\r\n', 'www.urlvideo.com', 'www.urlpdf.com', NULL, NULL),
(3, 'Guia de prueba con un nombre mas largo de lo normal ', 'Una descripcion mas larga para alargar el texto y probar una clase y ver si las columnas no se sobresalen de la tabla\r\nTEXTOTEXTOTEXTOTEXTOTEXTOTEXTOTEXTOTEXTOTEXTOTEXTOTEXTOTEXTOTEXTOTEXTOTEXTOTEXTOTEXTTEXTOTEXTOTEXTOTEXTOTEXTOTEXTOTEXTOTEXTOTEXTOTEXTOTE', 'vide.com', 'url.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_06_16_142919_create_perfiles_user_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2023_06_11_154425_create_relacionguias_table', 1),
(8, '2023_06_12_150937_create_perfil_secciones_permisos_table', 1),
(9, '2023_06_12_171200_create_perfiles_table', 1),
(10, '2023_06_12_171548_create_secciones_table', 1),
(11, '2023_06_16_151126_create_permisos_table', 1),
(12, '2023_06_17_170940_create_guias_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('CorreoAdmin@hotmail.com', '$2y$10$FOso1M5/hY3IxTqeU00TIOvg.22B8Go3cGEhBO2CvvcTJgr2pVAAC', '2023-08-07 23:14:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombreperfil` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id`, `nombreperfil`) VALUES
(1, 'Gerente de contabilidad'),
(2, 'Jefe de cobranza'),
(3, 'Practicante de cobranza'),
(4, 'Invitado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles_users`
--

CREATE TABLE `perfiles_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `perfil_id` bigint(20) UNSIGNED NOT NULL,
  `usuario_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `perfiles_users`
--

INSERT INTO `perfiles_users` (`id`, `perfil_id`, `usuario_id`) VALUES
(11, 1, 3),
(12, 2, 3),
(13, 3, 3),
(26, 2, 11),
(27, 3, 11),
(28, 2, 10),
(29, 3, 10),
(30, 1, 8),
(31, 2, 8),
(32, 3, 8),
(33, 1, 7),
(34, 2, 7),
(35, 1, 15),
(36, 2, 15),
(37, 3, 15),
(38, 1, 14),
(39, 2, 14),
(40, 3, 14),
(41, 1, 13),
(42, 2, 13),
(43, 3, 13),
(44, 3, 9),
(45, 3, 6),
(46, 3, 12),
(47, 1, 4),
(48, 2, 4),
(49, 3, 4),
(51, 2, 5),
(59, 1, 16),
(60, 2, 16),
(62, 1, 17),
(63, 2, 17),
(66, 3, 18),
(71, 1, 2),
(77, 3, 19),
(80, 1, 24),
(81, 2, 24),
(82, 3, 24),
(83, 1, 23),
(84, 2, 23),
(85, 3, 23),
(86, 1, 22),
(87, 2, 22),
(88, 3, 22),
(89, 1, 21),
(90, 2, 21),
(91, 3, 21),
(92, 1, 20),
(93, 2, 20),
(94, 3, 20),
(96, 4, 1),
(97, 1, 25),
(98, 2, 25),
(100, 3, 25),
(101, 2, 2),
(102, 3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil_secciones_permisos`
--

CREATE TABLE `perfil_secciones_permisos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permiso_id` bigint(20) UNSIGNED DEFAULT 1,
  `seccion_id` bigint(20) UNSIGNED NOT NULL,
  `perfil_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `perfil_secciones_permisos`
--

INSERT INTO `perfil_secciones_permisos` (`id`, `permiso_id`, `seccion_id`, `perfil_id`) VALUES
(21, 2, 2, 2),
(32, 1, 3, 1),
(37, 1, 2, 1),
(38, 1, 1, 3),
(40, 1, 3, 3),
(42, 1, 2, 3),
(46, 1, 1, 1),
(47, 1, 1, 2),
(48, 2, 3, 1),
(49, 2, 2, 1),
(50, 2, 1, 1),
(51, 3, 3, 1),
(52, 3, 2, 1),
(53, 3, 1, 1),
(54, 1, 3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permiso` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id`, `permiso`) VALUES
(1, 'Lectura'),
(2, 'Escritura'),
(3, 'Borrado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relacionguias`
--

CREATE TABLE `relacionguias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `guia_id` bigint(20) UNSIGNED NOT NULL,
  `permisos_id` bigint(20) UNSIGNED NOT NULL,
  `seccion_id` bigint(20) UNSIGNED NOT NULL,
  `perfil_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `relacionguias`
--

INSERT INTO `relacionguias` (`id`, `guia_id`, `permisos_id`, `seccion_id`, `perfil_id`) VALUES
(1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones`
--

CREATE TABLE `secciones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombreseccion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `secciones`
--

INSERT INTO `secciones` (`id`, `nombreseccion`) VALUES
(1, 'Notificaciones de pago'),
(2, 'Transacciones'),
(3, 'estado de cuenta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `celular` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `puesto` varchar(255) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `rol` tinyint(2) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `celular`, `password`, `puesto`, `status`, `rol`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'anterior', 'CorreoAdmin@hotmail.com.mx', '3155551254', '$2y$10$4zEaYI9QMtQz7XLbmc2mMuj6Q8rdAqfSmGwQqLirSm2eLwTfKOz9S', 'Gerente', 0, 1, NULL, NULL, '2023-07-22 00:01:39', '2023-08-15 21:33:47'),
(2, 'Juan Alberto', 'Perez Gutierrez', 'correoempleado@gmail.com', '312456783', '$2y$10$RKnf9fMgKxGE5TrN71PzVuWadocl/55afByfY4STzSszXKMeb.aZe', 'Empleado', 1, 0, NULL, NULL, '2023-07-24 20:51:56', '2023-08-16 20:57:21'),
(3, 'Usuario', 'Gerente', 'correoGerente@hotmail.com', '1234567891', '$2y$10$1Q2Wp31hS/bvOl4YiUxfpuMaqWHTGIsvpGuaUckxliO849LuxwB.m', 'Gerente', 0, 0, NULL, NULL, '2023-07-24 22:03:18', '2023-08-15 22:16:14'),
(4, 'UsuarioDesactivado', '', 'correoUsuarioDesactivado@live.com', '', '$2y$10$5uSEAf54kcVgn.d59P8WF.Okv.F7zOt8dtqPmZM1rh3ZwUBU3NOP6', '', 0, 0, NULL, NULL, '2023-07-24 22:29:59', '2023-07-29 00:50:18'),
(5, 'daniel', 'munguia', 'danielmunguia@gmail.com', '1234567890', '$2y$10$c.6v9nuUSHyKZTrknEcTdeC3D6SbeMbV6c.otSOvg7cQMIkRMmbg6', 'Empleado', 0, 0, NULL, NULL, '2023-07-27 22:35:14', '2023-08-11 01:00:48'),
(6, 'invitado2', '', 'correoinvitado2@gmail.com', '', '$2y$10$bc.IMFaniqCpNeDaQupaKuhLmlTawzSyWmii48qFz98.VFf2It55.', '', 0, 0, NULL, NULL, '2023-07-27 22:35:28', '2023-08-12 00:54:35'),
(7, 'Empleado', 'Uno', 'correoEMpleado1@gmail.com', '4455654614', '$2y$10$Wa1hC1Ph/ND/6d9hsF4fXeRyJca9e5VksFhDDGBWt.d4OtfYzMdiu', 'Practicante', 1, 0, NULL, NULL, '2023-07-27 22:35:37', '2023-08-14 20:49:34'),
(8, 'Manuel Luis', 'Munguia Castillo', 'correoEjemplo@hotmail.com', '321654879', '$2y$10$2XCugudJdu5386Qnq71TouMdQLe6rHkOn.h4heUPfpgu4zYXMuxmG', 'Jefe de Área', 1, 0, NULL, NULL, '2023-07-27 22:36:13', '2023-08-11 21:50:59'),
(9, 'user9', '', 'correousuario9@hotmail.com', '', '$2y$10$mRWZg7D2zv56/qeRiwL7wuuPEIJVijVbZsHNGPPc6FtgT5c8iCSn.', '', 1, 0, NULL, NULL, '2023-07-27 23:37:48', '2023-08-14 20:49:33'),
(10, 'user10', '', 'user10@gmail.com', '', '$2y$10$fhraY5jLpc05Iu7bvnqZoOben49YWjf8TYY5opdOeICLogKTrX1y.', '', 1, 0, NULL, NULL, '2023-07-27 23:53:03', '2023-07-27 23:53:03'),
(11, 'user11', '', 'user11@gmail.com', '', '$2y$10$2akzox/d4K2B9uCE4ZZN5u9T77uxI2C1cauyOK3Cl6HWaS6hGE.rW', '', 1, 0, NULL, NULL, '2023-07-27 23:53:19', '2023-07-29 00:34:31'),
(12, 'invitado3', '', 'correoinvitado3@gmail.com', '', '$2y$10$4YXP5w9LSmcEKWBwdwYdqeh.zc3aOD9UwTWpd886KIJLtKKWSLa/C', '', 1, 0, NULL, NULL, '2023-07-28 20:37:02', '2023-08-14 20:49:33'),
(13, 'invitado4', '', 'correoinvitado4@hotmail.com', '', '$2y$10$U9cLhoG8rs8zhWgUb.zPRenXReAXrNAvrsr5T3I/QJLaEZfIxvlai', '', 1, 0, NULL, NULL, '2023-07-28 20:37:30', '2023-08-11 21:12:09'),
(14, 'adm2', '', 'adm2correo@gmail.com', '', '$2y$10$gsfmYJLeM3Ed0Zpiv3ZPqeNVZBQ5myCmtmW8BIpgKcIlsYDxJrEOe', '', 1, 0, NULL, NULL, '2023-07-28 20:37:59', '2023-07-29 00:42:18'),
(15, 'adm3', '', 'correoadmn3@gmail.com', '', '$2y$10$SxGqgAyHYLXf.lSHz6XP5u3O5pl/PiAUlzaPK1THCh3Igvs2lBVOW', '', 1, 0, NULL, NULL, '2023-07-28 20:38:17', '2023-08-14 20:49:30'),
(16, 'usuarioPrueba', 'PruebaRegistro', 'pruebaUser@gmail.com', '3141440423', '$2y$10$/wF3Kh4YUDE21YTl/NS5JO9DdJxbHWHVPrnnLWhpzNoKS3P/H2iZW', 'Practicante', 1, 0, NULL, NULL, '2023-08-03 22:07:28', '2023-08-14 20:49:28'),
(17, 'Ultimo usuario', 'Apellido', 'correoUltimoUsuario@gmail.com', '3141440423', '$2y$10$83s8s9yQLtSjzdkJ3r6sv.HaR7A7YIGqknmtaFLCDz64DzFd3b56m', 'Gerente', 1, 0, NULL, NULL, '2023-08-07 20:37:41', '2023-08-14 20:43:50'),
(18, 'Luis Manuel', 'Munguia Castillo', 'luisma--munguia2@live.com.mx', '3151540423', '$2y$10$dmqWrQfukffrjC/4wD4HVeuXC/xLTzmUP7EXAUyhBF45iGM3laf4G', 'Practicante', 1, 0, NULL, NULL, '2023-08-08 00:48:52', '2023-08-11 22:33:05'),
(19, 'dsa', 'dsad', 'luisma--munguia1@live.com.mx', '1234567891', '$2y$10$QhvMiNzsgRt7GgwB7V/vbO2CJEA0Ik1vjn4e9RszbvtExtriU8.ju', 'practicante', 1, 0, NULL, NULL, '2023-08-08 22:51:17', '2023-08-14 20:49:26'),
(20, 'User', 'contraseña', 'correoContrasena@gmail.com', '1234567891', '$2y$10$t4U/5aiFLlLAoBN3mATB9OqPsCjiyqIqDCdy71IEOvm78R4n38LoC', 'Empleado', 1, 0, NULL, NULL, '2023-08-09 23:02:08', '2023-08-14 20:49:25'),
(21, 'Daniel', 'Zamora Tapia', 'daniel-zamora@gmail.com', '1234567891', '$2y$10$ofWbXm/jkb4KyuTY9XEL7e2oZGM6eu5.wfgqJ11ZpsncHt4VWaovO', 'Empleado', 0, 0, NULL, NULL, '2023-08-09 23:08:03', '2023-08-15 21:57:58'),
(22, 'nombre', 'apellido', 'nombreapellido@gmail.com', '1234567890', '$2y$10$EQ8uGG.MSJO/4FlJ0tdKKOGad.qy98pcjRBgmU3i50amxaw51e5mS', 'Empleado', 1, 0, NULL, NULL, '2023-08-09 23:20:42', '2023-08-14 20:49:23'),
(23, 'usuario', 'Ejemplo', 'CorreoEjemplo@gmail.com', '1234567890', '$2y$10$B3cjkw4rP2nlXSdoCFUr1u/yaTIC3kLtbk0aLmwdB1uhSP9fJ9xgG', 'Empleado', 1, 0, NULL, NULL, '2023-08-11 20:40:19', '2023-08-14 20:49:23'),
(24, 'miguel', 'reynoso', 'miguel@gmail.com', '3216549870', '$2y$10$rHWedj.ykroG5Jp2PD1tjOHPCzlmmjvKHqUdI4WUgAKXBxtjIA7Tm', 'empleado', 0, 0, NULL, NULL, '2023-08-11 20:48:17', '2023-08-11 22:32:47'),
(25, 'Administrador', 'nuevo', 'CorreoAdmin@hotmail.com', '1234567891', '$2y$10$zXxuArXlTQZWWzxfm94sie38.GwzS0Kxv9bGbtcTlTmnARN7AYvHG', 'Director', 1, 1, NULL, NULL, '2023-08-15 20:42:39', '2023-08-15 20:53:33');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `guias`
--
ALTER TABLE `guias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `guias_urlvideo_unique` (`urlvideo`),
  ADD UNIQUE KEY `guias_urlpdf_unique` (`urlpdf`);

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
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `perfiles_users`
--
ALTER TABLE `perfiles_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `perfiles_users_usuario_id_foreign` (`usuario_id`),
  ADD KEY `perfiles_users_perfil_id_foreign` (`perfil_id`);

--
-- Indices de la tabla `perfil_secciones_permisos`
--
ALTER TABLE `perfil_secciones_permisos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `perfil_secciones_permisos_perfil_id_foreign` (`perfil_id`),
  ADD KEY `perfil_secciones_permisos_seccion_id_foreign` (`seccion_id`),
  ADD KEY `perfil_secciones_permisos_permisos_id_foreign` (`permiso_id`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `relacionguias`
--
ALTER TABLE `relacionguias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `relacionguias_perfil_id_foreign` (`perfil_id`),
  ADD KEY `relacionguias_seccion_id_foreign` (`seccion_id`),
  ADD KEY `relacionguias_permisos_id_foreign` (`permisos_id`),
  ADD KEY `relacionguias_guia_id_foreign` (`guia_id`);

--
-- Indices de la tabla `secciones`
--
ALTER TABLE `secciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `guias`
--
ALTER TABLE `guias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `perfiles_users`
--
ALTER TABLE `perfiles_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT de la tabla `perfil_secciones_permisos`
--
ALTER TABLE `perfil_secciones_permisos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `relacionguias`
--
ALTER TABLE `relacionguias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `secciones`
--
ALTER TABLE `secciones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `perfiles_users`
--
ALTER TABLE `perfiles_users`
  ADD CONSTRAINT `perfiles_users_perfil_id_foreign` FOREIGN KEY (`perfil_id`) REFERENCES `perfiles` (`id`),
  ADD CONSTRAINT `perfiles_users_usuario_id_foreign` FOREIGN KEY (`usuario_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `perfil_secciones_permisos`
--
ALTER TABLE `perfil_secciones_permisos`
  ADD CONSTRAINT `perfil_secciones_permisos_perfil_id_foreign` FOREIGN KEY (`perfil_id`) REFERENCES `perfiles` (`id`),
  ADD CONSTRAINT `perfil_secciones_permisos_permisos_id_foreign` FOREIGN KEY (`permiso_id`) REFERENCES `permisos` (`id`),
  ADD CONSTRAINT `perfil_secciones_permisos_seccion_id_foreign` FOREIGN KEY (`seccion_id`) REFERENCES `secciones` (`id`);

--
-- Filtros para la tabla `relacionguias`
--
ALTER TABLE `relacionguias`
  ADD CONSTRAINT `relacionguias_guia_id_foreign` FOREIGN KEY (`guia_id`) REFERENCES `guias` (`id`),
  ADD CONSTRAINT `relacionguias_perfil_id_foreign` FOREIGN KEY (`perfil_id`) REFERENCES `perfiles` (`id`),
  ADD CONSTRAINT `relacionguias_permisos_id_foreign` FOREIGN KEY (`permisos_id`) REFERENCES `permisos` (`id`),
  ADD CONSTRAINT `relacionguias_seccion_id_foreign` FOREIGN KEY (`seccion_id`) REFERENCES `secciones` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
