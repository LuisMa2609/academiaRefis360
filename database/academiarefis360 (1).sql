-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-07-2023 a las 17:57:48
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
(1, 'Guia 1', 'Guia para principiantes', 'urlvideo.com', 'urlpdf.com', NULL, NULL);

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
(1, '2014_06_16_142919_create_usuarioperfils_table', 1),
(2, '2014_06_16_151155_create_usuariopermisos_table', 1),
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2019_08_19_000000_create_failed_jobs_table', 1),
(7, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(8, '2023_06_11_154425_create_relacionguias_table', 1),
(9, '2023_06_12_150937_create_seccionespermisos_table', 1),
(10, '2023_06_12_171199_create_perfilsecciones_table', 1),
(11, '2023_06_12_171200_create_perfiles_table', 1),
(12, '2023_06_12_171421_create_guias_table', 1),
(13, '2023_06_12_171548_create_secciones_table', 1),
(14, '2023_06_16_151126_create_permisos_table', 1);

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
(1, 'Gerente contabilidad'),
(2, 'Jefe cobranza'),
(3, 'Practicante cobranza'),
(4, 'invitado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfilsecciones`
--

CREATE TABLE `perfilsecciones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seccion_id` bigint(20) UNSIGNED NOT NULL,
  `perfil_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `perfilsecciones`
--

INSERT INTO `perfilsecciones` (`id`, `seccion_id`, `perfil_id`) VALUES
(230, 1, 1),
(232, 2, 2),
(233, 3, 2),
(236, 3, 1),
(237, 3, 3),
(238, 2, 1);

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
  `permisos_id` bigint(20) UNSIGNED NOT NULL,
  `seccion_id` bigint(20) UNSIGNED NOT NULL,
  `guia_id` bigint(20) UNSIGNED NOT NULL,
  `perfil_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, 'Estado de cuenta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccionespermisos`
--

CREATE TABLE `seccionespermisos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permisos_id` bigint(20) UNSIGNED NOT NULL,
  `secciones_id` bigint(20) UNSIGNED NOT NULL,
  `perfiles_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `seccionespermisos`
--

INSERT INTO `seccionespermisos` (`id`, `permisos_id`, `secciones_id`, `perfiles_id`) VALUES
(1, 1, 1, 0),
(2, 1, 2, 0),
(3, 1, 3, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Luis Munguia', 'correoEjemplo@hotmail.com', 1, NULL, '$2y$10$/BsIi2qt8Q65kNwiSlPSZeC5BJjloWNt7lArliZ7eampWUYjTwhf6', NULL, '2023-06-19 23:32:54', '2023-06-19 23:32:54'),
(2, 'UsuarioGerente', 'correoGerente@hotmail.com', 1, NULL, '$2y$10$8aOrZmCLT9bW1DJeKlPaLuijdI1TdO4.A1WwUHhDdrI8J5gW2H92m', NULL, '2023-06-20 23:52:35', '2023-06-20 23:52:35'),
(3, 'Usuario Jefe', 'correoJefe@hotmail.com', 1, NULL, '$2y$10$Xe5XUp8u4cCrp5SnJ0vi4e/jLJ2wCR/TA9r9ySVr7MbbwG.dLhdwe', NULL, '2023-06-20 23:58:45', '2023-06-20 23:58:45'),
(5, 'UsuarioPraticante', 'CorreoPracticante@hotmail.com', 1, NULL, '$2y$10$NIjSHAqmjHGT8gq.uIEthe9tWs8LHO0rPss73H7E59XO8yk53r8fW', NULL, '2023-06-21 21:18:38', '2023-06-21 21:18:38'),
(9, 'Administrador', 'CorreoAdmin@hotmail.com', 1, NULL, '$2y$10$LXSZqRIBZwzJ7LUQ9feppeGwMVDlb1q1iEBP3uxrI8n9ZtumQN3SW', NULL, '2023-06-22 00:06:38', '2023-06-22 00:06:38'),
(10, 'ejemplo', 'correoEjemplo2@hotmail.com', 1, NULL, '$2y$10$3/IyvlfX6B/8bVtrj9L12eYa8ju3so7pO.btTJXpVBW.is7fL7w.q', NULL, '2023-06-24 00:43:29', '2023-06-24 00:43:29'),
(11, 'CorreoDePrueba', 'hotmailPrueba@hotmail.com', 0, NULL, '$2y$10$KCxo/hihdili9OGl4eYKDunqffaN9NAlwn/xqgsIZTNQ1SOAdZ.TC', NULL, '2023-06-27 21:10:19', '2023-06-27 21:10:19'),
(40, 'UsuarioInvitado', 'correoinvitado@hotmail.com', 1, NULL, '$2y$10$kPNCfdwsijY2zkvZAsdmjOrD1UuKPrw7rKNbnIlUZ6LwIdttVmTIO', NULL, '2023-06-28 22:37:08', '2023-06-28 22:37:08'),
(41, 'Invitado2', 'correoinvitado2@gmail.com', 0, NULL, '$2y$10$3oaFYRoapZplWcuvyQ.OeO2TMuGt6RH1I4KS/vD05IXs9D8glB0yq', NULL, '2023-06-28 22:42:01', '2023-06-28 22:42:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarioperfils`
--

CREATE TABLE `usuarioperfils` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `perfil_id` bigint(20) UNSIGNED NOT NULL,
  `usuario_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarioperfils`
--

INSERT INTO `usuarioperfils` (`id`, `perfil_id`, `usuario_id`) VALUES
(5, 2, 3),
(6, 3, 5),
(7, 1, 9),
(8, 2, 9),
(9, 3, 9),
(10, 4, 10),
(19, 1, 41),
(20, 2, 41),
(21, 3, 41),
(22, 4, 41),
(23, 4, 11),
(24, 1, 2),
(25, 1, 1),
(26, 2, 1),
(27, 3, 1),
(29, 2, 10),
(30, 2, 2),
(37, 4, 40);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariopermisos`
--

CREATE TABLE `usuariopermisos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permisos_id` bigint(20) UNSIGNED NOT NULL,
  `usuario_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Indices de la tabla `perfilsecciones`
--
ALTER TABLE `perfilsecciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `perfilsecciones_perfil_id_foreign` (`perfil_id`),
  ADD KEY `perfilsecciones_secciones_id_foreign` (`seccion_id`);

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
  ADD KEY `relacionguias_guia_id_foreign` (`guia_id`),
  ADD KEY `relacionguias_seccion_id_foreign` (`seccion_id`),
  ADD KEY `relacionguias_relacion_id_foreign` (`permisos_id`);

--
-- Indices de la tabla `secciones`
--
ALTER TABLE `secciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `seccionespermisos`
--
ALTER TABLE `seccionespermisos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seccionespermisos_secciones_id_foreign` (`secciones_id`),
  ADD KEY `seccionespermisos_permisos_id_foreign` (`permisos_id`),
  ADD KEY `seccionespermisos_perfiles_id_foreign` (`perfiles_id`) USING BTREE;

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `usuarioperfils`
--
ALTER TABLE `usuarioperfils`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuarioperfils_usuario_id_foreign` (`usuario_id`),
  ADD KEY `usuarioperfils_perfil_id_foreign` (`perfil_id`);

--
-- Indices de la tabla `usuariopermisos`
--
ALTER TABLE `usuariopermisos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuariopermisos_usuario_id_foreign` (`usuario_id`),
  ADD KEY `usuariopermisos_permisos_id_foreign` (`permisos_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `perfilsecciones`
--
ALTER TABLE `perfilsecciones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `secciones`
--
ALTER TABLE `secciones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `seccionespermisos`
--
ALTER TABLE `seccionespermisos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `usuarioperfils`
--
ALTER TABLE `usuarioperfils`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `usuariopermisos`
--
ALTER TABLE `usuariopermisos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `perfilsecciones`
--
ALTER TABLE `perfilsecciones`
  ADD CONSTRAINT `perfilsecciones_perfil_id_foreign` FOREIGN KEY (`perfil_id`) REFERENCES `perfiles` (`id`),
  ADD CONSTRAINT `perfilsecciones_secciones_id_foreign` FOREIGN KEY (`seccion_id`) REFERENCES `secciones` (`id`);

--
-- Filtros para la tabla `relacionguias`
--
ALTER TABLE `relacionguias`
  ADD CONSTRAINT `relacionguias_guia_id_foreign` FOREIGN KEY (`guia_id`) REFERENCES `guias` (`id`),
  ADD CONSTRAINT `relacionguias_perfil_id_foreign` FOREIGN KEY (`perfil_id`) REFERENCES `perfiles` (`id`),
  ADD CONSTRAINT `relacionguias_relacion_id_foreign` FOREIGN KEY (`permisos_id`) REFERENCES `permisos` (`id`),
  ADD CONSTRAINT `relacionguias_seccion_id_foreign` FOREIGN KEY (`seccion_id`) REFERENCES `secciones` (`id`);

--
-- Filtros para la tabla `seccionespermisos`
--
ALTER TABLE `seccionespermisos`
  ADD CONSTRAINT `seccionespermisos_permisos_id_foreign` FOREIGN KEY (`permisos_id`) REFERENCES `permisos` (`id`),
  ADD CONSTRAINT `seccionespermisos_secciones_id_foreign` FOREIGN KEY (`secciones_id`) REFERENCES `secciones` (`id`);

--
-- Filtros para la tabla `usuarioperfils`
--
ALTER TABLE `usuarioperfils`
  ADD CONSTRAINT `usuarioperfils_perfil_id_foreign` FOREIGN KEY (`perfil_id`) REFERENCES `perfiles` (`id`),
  ADD CONSTRAINT `usuarioperfils_usuario_id_foreign` FOREIGN KEY (`usuario_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `usuariopermisos`
--
ALTER TABLE `usuariopermisos`
  ADD CONSTRAINT `usuariopermisos_permisos_id_foreign` FOREIGN KEY (`permisos_id`) REFERENCES `permisos` (`id`),
  ADD CONSTRAINT `usuariopermisos_usuario_id_foreign` FOREIGN KEY (`usuario_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
