-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-09-2023 a las 21:10:24
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
  `status` tinyint(2) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `guias`
--

INSERT INTO `guias` (`id`, `nombre`, `descripcion`, `urlvideo`, `urlpdf`, `status`, `created_at`, `updated_at`) VALUES
(46, 'Introducción al Jardín Vertical', 'Aprende a crear y mantener impresionantes jardines verticales en espacios reducidos.', 'https://www.ejemplo.com/guia-jardin-vertical/video', 'https://www.ejemplo.com/guia-jardin-vertical/pdf', 1, '2023-08-31 00:56:13', '2023-09-06 22:36:12'),
(47, 'Fotografía Nocturna para Principiantes', 'Descubre los secretos para capturar imágenes sorprendentes en entornos de poca luz.', 'https://www.ejemplo.com/guia-fotografia-nocturna/video', 'https://www.ejemplo.com/guia-fotografia-nocturna/pdf', 1, '2023-08-31 00:56:13', '2023-08-31 00:56:13'),
(48, 'Cocina Mediterránea Paso a Paso', 'Aprende a cocinar deliciosos platillos mediterráneos con esta guía llena de recetas y técnicas.', 'https://www.ejemplo.com/guia-cocina-mediterranea/video', 'https://www.ejemplo.com/guia-cocina-mediterranea/pdf', 1, '2023-08-31 00:56:13', '2023-08-31 00:56:13'),
(49, 'Yoga para Flexibilidad Total', 'Mejora tu flexibilidad y bienestar general con esta guía de poses y rutinas de yoga.', 'https://www.ejemplo.com/guia-yoga-flexibilidad/video', 'https://www.ejemplo.com/guia-yoga-flexibilidad/pdf', 1, '2023-08-31 00:56:13', '2023-08-31 00:56:13'),
(50, 'Viaje para Mochileros en Asia', 'Descubre los destinos más asombrosos y consejos útiles para viajar como mochilero por Asia.', 'https://www.ejemplo.com/guia-viaje-asia/video', 'https://www.ejemplo.com/guia-viaje-asia/pdf', 1, '2023-08-31 00:56:13', '2023-08-31 00:56:13'),
(51, 'Marketing Digital para Emprendedores', 'Aprende estrategias efectivas de marketing digital para hacer crecer tu negocio en línea.', 'https://www.ejemplo.com/guia-marketing-digital/video', 'https://www.ejemplo.com/guia-marketing-digital/pdf', 1, '2023-08-31 00:56:13', '2023-08-31 00:56:13'),
(52, 'Reparación de Bicicletas DIY', 'Domina las habilidades básicas de reparación de bicicletas y ahorra dinero en el taller.', 'https://www.ejemplo.com/guia-reparacion-bicicletas/video', 'https://www.ejemplo.com/guia-reparacion-bicicletas/pdf', 1, '2023-08-31 00:56:13', '2023-08-31 00:56:13'),
(53, 'Escritura Creativa para Principiantes', 'Despierta tu creatividad y aprende técnicas para escribir relatos envolventes.', 'https://www.ejemplo.com/guia-escritura-creativa/video', 'https://www.ejemplo.com/guia-escritura-creativa/pdf', 1, '2023-08-31 00:56:13', '2023-08-31 00:56:13'),
(54, 'Primeros Auxilios en el Hogar', 'Conoce las prácticas de primeros auxilios que podrían salvar vidas en situaciones de emergencia.', 'https://www.ejemplo.com/guia-primeros-auxilios/video', 'https://www.ejemplo.com/guia-primeros-auxilios/pdf', 1, '2023-08-31 00:56:13', '2023-08-31 00:56:13'),
(55, 'Decoración de Interiores DIY', 'Transforma tu hogar con ideas creativas y consejos de diseño de interiores.', 'https://www.ejemplo.com/guia-decoracion-interiores/video', 'https://www.ejemplo.com/guia-decoracion-interiores/pdf', 1, '2023-08-31 00:56:13', '2023-08-31 00:56:13'),
(56, 'Fotografía de Paisajes en Blanco y Negro', 'Domina la técnica de capturar la belleza de los paisajes en blanco y negro con esta guía especializada.', 'https://www.ejemplo.com/guia-fotografia-paisajes-byn/video', 'https://www.ejemplo.com/guia-fotografia-paisajes-byn/pdf', 1, '2023-08-31 00:56:13', '2023-08-31 00:56:13'),
(57, 'Entrenamiento en Casa sin Equipo', 'Mantén tu rutina de ejercicios con esta guía que te enseñará a entrenar en casa sin necesidad de equipos costosos.', 'https://www.ejemplo.com/guia-entrenamiento-casa/video', 'https://www.ejemplo.com/guia-entrenamiento-casa/pdf', 1, '2023-08-31 00:56:13', '2023-08-31 00:56:13'),
(58, 'Cocina Vegana para Principiantes', 'Descubre deliciosas recetas veganas y aprende a cocinar platillos sabrosos y saludables.', 'https://www.ejemplo.com/guia-cocina-vegana/video', 'https://www.ejemplo.com/guia-cocina-vegana/pdf', 1, '2023-08-31 00:56:13', '2023-08-31 00:56:13'),
(59, 'Inversiones en Criptomonedas', 'Aprende los conceptos básicos para invertir en criptomonedas de manera segura y eficiente.', 'https://www.ejemplo.com/guia-inversion-criptomonedas/video', 'https://www.ejemplo.com/guia-inversion-criptomonedas/pdf', 1, '2023-08-31 00:56:13', '2023-08-31 00:56:13'),
(60, 'Meditación para Reducción del Estrés', 'Explora técnicas de meditación que te ayudarán a reducir el estrés y encontrar la tranquilidad interior.', 'https://www.ejemplo.com/guia-meditacion-estres/video', 'https://www.ejemplo.com/guia-meditacion-estres/pdf', 1, '2023-08-31 00:56:13', '2023-08-31 00:56:13'),
(61, 'Fotografía de Alimentos para Redes Sociales', 'Aprende a tomar fotografías atractivas de alimentos para compartir en redes sociales y captar la atención de tu audiencia.', 'https://www.ejemplo.com/guia-fotografia-alimentos/video', 'https://www.ejemplo.com/guia-fotografia-alimentos/pdf', 1, '2023-08-31 00:56:13', '2023-08-31 00:56:13'),
(62, 'Programación en Python para Principiantes', 'Inicia tu viaje en la programación con Python, uno de los lenguajes más amigables para principiantes.', 'https://www.ejemplo.com/guia-programacion-python/video', 'https://www.ejemplo.com/guia-programacion-python/pdf', 1, '2023-08-31 00:56:13', '2023-08-31 00:56:13'),
(63, 'Crianza Positiva para Padres', 'Aprende técnicas y enfoques de crianza positiva para fomentar un desarrollo saludable en tus hijos.', 'https://www.ejemplo.com/guia-crianza-positiva/video', 'https://www.ejemplo.com/guia-crianza-positiva/pdf', 1, '2023-08-31 00:56:13', '2023-08-31 00:56:13'),
(64, 'Fotografía de Retratos en Exteriores', 'Descubre cómo tomar retratos impresionantes en entornos al aire libre y aprovecha la luz natural.', 'https://www.ejemplo.com/guia-fotografia-retratos-exteriores/video', 'https://www.ejemplo.com/guia-fotografia-retratos-exteriores/pdf', 1, '2023-08-31 00:56:13', '2023-08-31 00:56:13'),
(65, 'Aprendizaje de Idiomas para Viajeros', 'Aprende estrategias efectivas para adquirir habilidades en un nuevo idioma antes de tu próximo viaje.', 'https://www.ejemplo.com/guia-aprendizaje-idiomas/video', 'https://www.ejemplo.com/guia-aprendizaje-idiomas/pdf', 1, '2023-08-31 00:56:13', '2023-08-31 00:56:13'),
(69, 'Guía de Fotografía de Aves en la Naturaleza', 'Aprende técnicas avanzadas para capturar la belleza de las aves en su entorno natural.', 'https://www.ejemplo.com/guia-fotografia-aves-naturaleza/video', 'https://www.ejemplo.com/guia-fotografia-aves-naturaleza/pdf', 1, '2023-09-06 21:55:59', '2023-09-06 21:55:59'),
(70, 'Guía de Costura DIY para Principiantes', 'Domina los fundamentos de la costura y crea tus propias prendas y proyectos de moda.', 'https://www.ejemplo.com/guia-costura-diy/video', 'https://www.ejemplo.com/guia-costura-diy/pdf', 1, '2023-09-06 21:55:59', '2023-09-06 21:55:59'),
(71, 'Guía de Marketing en Redes Sociales', 'Aprende estrategias efectivas para promocionar tu negocio en plataformas de redes sociales.', 'https://www.ejemplo.com/guia-marketing-redes-sociales/video', 'https://www.ejemplo.com/guia-marketing-redes-sociales/pdf', 1, '2023-09-06 21:55:59', '2023-09-06 21:55:59'),
(72, 'Guía de Nutrición y Dietética', 'Comprende los principios de una alimentación saludable y equilibrada para mejorar tu bienestar.', 'https://www.ejemplo.com/guia-nutricion-dietetica/video', 'https://www.ejemplo.com/guia-nutricion-dietetica/pdf', 1, '2023-09-06 21:55:59', '2023-09-06 21:55:59'),
(73, 'Guía de Photoshop para Retoque Fotográfico', 'Aprende a utilizar Photoshop para retocar y mejorar tus fotos de manera profesional.', 'https://www.ejemplo.com/guia-photoshop-retoque-fotografico/video', 'https://www.ejemplo.com/guia-photoshop-retoque-fotografico/pdf', 1, '2023-09-06 21:55:59', '2023-09-06 21:55:59'),
(74, 'Guía de Inversiones en Bienes Raíces', 'Descubre estrategias y consejos para invertir en propiedades y generar ingresos pasivos.', 'https://www.ejemplo.com/guia-inversion-bienes-raices/video', 'https://www.ejemplo.com/guia-inversion-bienes-raices/pdf', 1, '2023-09-06 21:55:59', '2023-09-06 21:55:59'),
(75, 'Guía de Escritura de Guiones para Cine y TV', 'Aprende a escribir guiones cinematográficos y televisivos que cautiven al público.', 'https://www.ejemplo.com/guia-escritura-guiones/video', 'https://www.ejemplo.com/guia-escritura-guiones/pdf', 1, '2023-09-06 21:55:59', '2023-09-06 21:55:59'),
(76, 'Guía de Viaje para Aventureros en Patagonia', 'Descubre los destinos más emocionantes y actividades extremas en la región de la Patagonia.', 'https://www.ejemplo.com/guia-viaje-patagonia/video', 'https://www.ejemplo.com/guia-viaje-patagonia/pdf', 1, '2023-09-06 21:55:59', '2023-09-06 21:55:59'),
(77, 'Guía de Fotografía Subacuática para Buceadores', 'Aprende a capturar la vida marina y los paisajes submarinos con tu cámara bajo el agua.', 'https://www.ejemplo.com/guia-fotografia-subacuatica/video', 'https://www.ejemplo.com/guia-fotografia-subacuatica/pdf', 1, '2023-09-06 21:55:59', '2023-09-06 21:55:59'),
(78, 'Guía de Yoga para Aliviar el Dolor de Espalda', 'Practica posturas de yoga diseñadas específicamente para reducir el dolor y mejorar la salud de la espalda.', 'https://www.ejemplo.com/guia-yoga-aliviar-dolor-espalda/video', 'https://www.ejemplo.com/guia-yoga-aliviar-dolor-espalda/pdf', 1, '2023-09-06 21:55:59', '2023-09-06 21:55:59'),
(79, 'Guía de Juegos de Mesa para Noches Divertidas', 'Descubre juegos de mesa emocionantes para pasar noches inolvidables con amigos y familiares.', 'https://www.ejemplo.com/guia-juegos-mesa-divertidas/video', 'https://www.ejemplo.com/guia-juegos-mesa-divertidas/pdf', 1, '2023-09-06 21:55:59', '2023-09-06 21:55:59'),
(80, 'Guía de Marketing de Afiliados en Línea', 'Aprende a ganar dinero promocionando productos y servicios como afiliado en línea.', 'https://www.ejemplo.com/guia-marketing-afiliados/video', 'https://www.ejemplo.com/guia-marketing-afiliados/pdf', 1, '2023-09-06 21:55:59', '2023-09-06 21:55:59'),
(81, 'Guía de Fotografía de Moda y Estilo', 'Captura la esencia de la moda y el estilo en tus fotografías con esta guía especializada.', 'https://www.ejemplo.com/guia-fotografia-moda-estilo/video', 'https://www.ejemplo.com/guia-fotografia-moda-estilo/pdf', 1, '2023-09-06 21:55:59', '2023-09-06 21:55:59'),
(82, 'Guía de Aprendizaje de Piano para Principiantes', 'Inicia tu viaje musical y aprende a tocar el piano desde cero con esta guía práctica.', 'https://www.ejemplo.com/guia-aprendizaje-piano/video', 'https://www.ejemplo.com/guia-aprendizaje-piano/pdf', 1, '2023-09-06 21:55:59', '2023-09-06 21:55:59'),
(83, 'Agregar registros en la web', 'Un ejemplo de como se van a agregar los registros', 'agregarregistros/video.com', 'agregarregistro/pdf.com', 1, '2023-09-06 22:35:56', '2023-09-06 22:35:56');

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
(44, 3, 9),
(45, 3, 6),
(47, 1, 4),
(48, 2, 4),
(49, 3, 4),
(51, 2, 5),
(59, 1, 16),
(60, 2, 16),
(62, 1, 17),
(63, 2, 17),
(66, 3, 18),
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
(103, 4, 26),
(104, 4, 27),
(105, 1, 1),
(106, 2, 1),
(107, 3, 1),
(108, 4, 12),
(109, 4, 13),
(117, 1, 25),
(140, 2, 2),
(146, 4, 74),
(157, 4, 84);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil_secciones_permisos`
--

CREATE TABLE `perfil_secciones_permisos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permiso_id` bigint(20) UNSIGNED DEFAULT 1,
  `seccion_id` bigint(20) UNSIGNED NOT NULL,
  `perfil_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `perfil_secciones_permisos`
--

INSERT INTO `perfil_secciones_permisos` (`id`, `permiso_id`, `seccion_id`, `perfil_id`, `status`) VALUES
(112, 1, 1, 1, 1),
(113, 2, 1, 1, 0),
(114, 3, 1, 1, 0),
(115, 1, 2, 1, 0),
(116, 2, 2, 1, 1),
(117, 3, 2, 1, 0),
(118, 1, 3, 1, 0),
(119, 2, 3, 1, 0),
(120, 3, 3, 1, 1),
(121, 1, 1, 2, 1),
(122, 2, 1, 2, 0),
(123, 3, 1, 2, 0),
(124, 1, 2, 2, 0),
(125, 2, 2, 2, 1),
(126, 3, 2, 2, 0),
(127, 1, 3, 2, 0),
(128, 2, 3, 2, 0),
(129, 3, 3, 2, 1),
(130, 1, 1, 3, 1),
(131, 2, 1, 3, 0),
(132, 3, 1, 3, 0),
(133, 1, 2, 3, 0),
(134, 2, 2, 3, 1),
(135, 3, 2, 3, 0),
(136, 1, 3, 3, 0),
(137, 2, 3, 3, 0),
(138, 3, 3, 3, 1),
(139, 1, 1, 4, 0),
(140, 2, 1, 4, 0),
(141, 3, 1, 4, 0),
(142, 1, 2, 4, 1),
(143, 2, 2, 4, 0),
(144, 3, 2, 4, 0),
(145, 1, 3, 4, 1),
(146, 2, 3, 4, 0),
(147, 3, 3, 4, 0);

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
(23, 46, 1, 1, 2),
(24, 47, 2, 2, 2),
(25, 48, 2, 2, 2),
(26, 49, 3, 3, 1),
(27, 50, 2, 2, 1),
(28, 51, 3, 1, 1),
(29, 52, 1, 2, 2),
(30, 53, 1, 2, 1),
(31, 54, 2, 2, 1),
(32, 55, 1, 2, 2),
(33, 56, 2, 2, 1),
(34, 57, 1, 1, 2),
(35, 58, 1, 1, 2),
(36, 59, 1, 3, 1),
(37, 60, 1, 2, 2),
(38, 61, 1, 2, 1),
(39, 62, 1, 3, 1),
(40, 63, 1, 3, 1),
(41, 64, 1, 3, 2),
(42, 65, 2, 1, 2),
(43, 69, 1, 2, 4),
(44, 70, 2, 3, 1),
(45, 71, 1, 1, 4),
(46, 72, 3, 3, 3),
(47, 73, 3, 3, 4),
(48, 74, 2, 1, 3),
(49, 75, 1, 3, 4),
(50, 76, 1, 3, 3),
(51, 77, 1, 1, 4),
(52, 78, 2, 1, 3),
(53, 79, 2, 3, 4),
(54, 80, 2, 1, 3),
(55, 81, 1, 3, 4),
(56, 82, 1, 2, 3),
(57, 83, 1, 3, 3);

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
  `status` tinyint(1) DEFAULT 1,
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
(1, 'usuario numero', 'uno', 'userUno@hotmail.com.mx', '3155551254', '$2y$10$4zEaYI9QMtQz7XLbmc2mMuj6Q8rdAqfSmGwQqLirSm2eLwTfKOz9S', 'Director', 1, 1, NULL, NULL, '2023-07-22 00:01:39', '2023-09-08 00:51:03'),
(2, 'Juan Alberto', 'Perez Gutierrez', 'juanalberto@gmail.com', '312456783', '$2y$10$RKnf9fMgKxGE5TrN71PzVuWadocl/55afByfY4STzSszXKMeb.aZe', 'Empleado', 1, 0, NULL, NULL, '2023-07-24 20:51:56', '2023-09-08 00:34:00'),
(3, 'Juana Alberta', 'Perez Gutierrez', 'juanaalberta@hotmail.com', '1234567891', '$2y$10$1Q2Wp31hS/bvOl4YiUxfpuMaqWHTGIsvpGuaUckxliO849LuxwB.m', 'Empleado', 1, 0, NULL, NULL, '2023-07-24 22:03:18', '2023-09-08 00:35:12'),
(4, 'UsuarioDesactivado', 'off', 'correoUsuarioDesactivado@live.com', '3142569870', '$2y$10$5uSEAf54kcVgn.d59P8WF.Okv.F7zOt8dtqPmZM1rh3ZwUBU3NOP6', 'Practicante', 0, 0, NULL, NULL, '2023-07-24 22:29:59', '2023-08-29 20:42:25'),
(5, 'daniel', 'munguia', 'danielmunguia@gmail.com', '1234567890', '$2y$10$c.6v9nuUSHyKZTrknEcTdeC3D6SbeMbV6c.otSOvg7cQMIkRMmbg6', 'Empleado', 0, 0, NULL, NULL, '2023-07-27 22:35:14', '2023-08-11 01:00:48'),
(6, 'invitado2', 'guest', 'correoinvitado2@gmail.com', '3124567890', '$2y$10$bc.IMFaniqCpNeDaQupaKuhLmlTawzSyWmii48qFz98.VFf2It55.', 'Practicante', 1, 0, NULL, NULL, '2023-07-27 22:35:28', '2023-09-08 00:41:26'),
(7, 'Empleado', 'Uno', 'correoEMpleado1@gmail.com', '4455654614', '$2y$10$Wa1hC1Ph/ND/6d9hsF4fXeRyJca9e5VksFhDDGBWt.d4OtfYzMdiu', 'Practicante', 1, 0, NULL, NULL, '2023-07-27 22:35:37', '2023-08-14 20:49:34'),
(8, 'Manuel Luis', 'Munguia Castillo', 'correoEjemplo@hotmail.com', '321654879', '$2y$10$2XCugudJdu5386Qnq71TouMdQLe6rHkOn.h4heUPfpgu4zYXMuxmG', 'Jefe de Área', 1, 0, NULL, NULL, '2023-07-27 22:36:13', '2023-08-11 21:50:59'),
(9, 'user9', 'usuarioNueve', 'correousuario9@hotmail.com', '3154789620', '$2y$10$mRWZg7D2zv56/qeRiwL7wuuPEIJVijVbZsHNGPPc6FtgT5c8iCSn.', 'Practicante', 1, 0, NULL, NULL, '2023-07-27 23:37:48', '2023-08-29 20:46:14'),
(10, 'user10', 'usuarioDiez', 'user10@gmail.com', '3147895620', '$2y$10$fhraY5jLpc05Iu7bvnqZoOben49YWjf8TYY5opdOeICLogKTrX1y.', 'Practicante', 1, 0, NULL, NULL, '2023-07-27 23:53:03', '2023-08-29 20:47:46'),
(11, 'user11', 'usuarioOnce', 'user11@gmail.com', '3147985620', '$2y$10$2akzox/d4K2B9uCE4ZZN5u9T77uxI2C1cauyOK3Cl6HWaS6hGE.rW', 'Practicante', 1, 0, NULL, NULL, '2023-07-27 23:53:19', '2023-08-29 20:48:30'),
(12, 'invitado3', 'guestTres', 'correoinvitado3@gmail.com', '3152647890', '$2y$10$4YXP5w9LSmcEKWBwdwYdqeh.zc3aOD9UwTWpd886KIJLtKKWSLa/C', 'Practicante', 1, 0, NULL, NULL, '2023-07-28 20:37:02', '2023-08-29 20:48:54'),
(13, 'invitado4', 'guestCuatro', 'correoinvitado4@hotmail.com', '3124567890', '$2y$10$U9cLhoG8rs8zhWgUb.zPRenXReAXrNAvrsr5T3I/QJLaEZfIxvlai', 'Practicante', 1, 0, NULL, NULL, '2023-07-28 20:37:30', '2023-08-29 20:49:18'),
(14, 'adm2', 'administradorDos', 'adm2correo@gmail.com', '3142569870', '$2y$10$gsfmYJLeM3Ed0Zpiv3ZPqeNVZBQ5myCmtmW8BIpgKcIlsYDxJrEOe', 'Director', 1, 0, NULL, NULL, '2023-07-28 20:37:59', '2023-08-29 20:50:37'),
(15, 'adm3', 'administradoTres', 'correoadmn3@gmail.com', '31402569987', '$2y$10$SxGqgAyHYLXf.lSHz6XP5u3O5pl/PiAUlzaPK1THCh3Igvs2lBVOW', 'Director', 1, 0, NULL, NULL, '2023-07-28 20:38:17', '2023-08-29 20:50:18'),
(16, 'usuarioPrueba', 'PruebaRegistro', 'pruebaUser@gmail.com', '3141440423', '$2y$10$/wF3Kh4YUDE21YTl/NS5JO9DdJxbHWHVPrnnLWhpzNoKS3P/H2iZW', 'Practicante', 1, 0, NULL, NULL, '2023-08-03 22:07:28', '2023-08-14 20:49:28'),
(17, 'Ultimo usuario', 'Apellido', 'correoUltimoUsuario@gmail.com', '3141440423', '$2y$10$83s8s9yQLtSjzdkJ3r6sv.HaR7A7YIGqknmtaFLCDz64DzFd3b56m', 'Gerente', 1, 0, NULL, NULL, '2023-08-07 20:37:41', '2023-08-14 20:43:50'),
(18, 'Luis Manuel', 'Munguia Castillo', 'luisma--munguia2@live.com.mx', '3151540423', '$2y$10$dmqWrQfukffrjC/4wD4HVeuXC/xLTzmUP7EXAUyhBF45iGM3laf4G', 'Practicante', 1, 0, NULL, NULL, '2023-08-08 00:48:52', '2023-08-11 22:33:05'),
(19, 'dsa', 'dsad', 'luisma--munguia1@live.com.mx', '1234567891', '$2y$10$QhvMiNzsgRt7GgwB7V/vbO2CJEA0Ik1vjn4e9RszbvtExtriU8.ju', 'practicante', 1, 0, NULL, NULL, '2023-08-08 22:51:17', '2023-08-14 20:49:26'),
(20, 'User', 'contraseña', 'correoContrasena@gmail.com', '1234567891', '$2y$10$t4U/5aiFLlLAoBN3mATB9OqPsCjiyqIqDCdy71IEOvm78R4n38LoC', 'Empleado', 1, 0, NULL, NULL, '2023-08-09 23:02:08', '2023-08-14 20:49:25'),
(21, 'Daniel', 'Zamora Tapia', 'daniel-zamora@gmail.com', '1234567891', '$2y$10$ofWbXm/jkb4KyuTY9XEL7e2oZGM6eu5.wfgqJ11ZpsncHt4VWaovO', 'Empleado', 0, 0, NULL, NULL, '2023-08-09 23:08:03', '2023-08-15 21:57:58'),
(22, 'nombre', 'apellido', 'nombreapellido@gmail.com', '1234567890', '$2y$10$EQ8uGG.MSJO/4FlJ0tdKKOGad.qy98pcjRBgmU3i50amxaw51e5mS', 'Empleado', 1, 0, NULL, NULL, '2023-08-09 23:20:42', '2023-08-14 20:49:23'),
(23, 'usuario', 'Ejemplo', 'CorreoEjemplo@gmail.com', '1234567890', '$2y$10$B3cjkw4rP2nlXSdoCFUr1u/yaTIC3kLtbk0aLmwdB1uhSP9fJ9xgG', 'Empleado', 0, 0, NULL, NULL, '2023-08-11 20:40:19', '2023-08-23 22:45:36'),
(24, 'miguel', 'reynoso', 'miguel@gmail.com', '3216549870', '$2y$10$rHWedj.ykroG5Jp2PD1tjOHPCzlmmjvKHqUdI4WUgAKXBxtjIA7Tm', 'empleado', 0, 0, NULL, NULL, '2023-08-11 20:48:17', '2023-08-11 22:32:47'),
(25, 'LUIS adm', 'MUNGUIA adm', 'CorreoAdmin@hotmail.com', '123456789', '$2y$10$zXxuArXlTQZWWzxfm94sie38.GwzS0Kxv9bGbtcTlTmnARN7AYvHG', 'Director', 1, 1, NULL, NULL, '2023-08-15 20:42:39', '2023-09-08 00:44:45'),
(26, 'carlos', 'garcia', 'carlos_garcia@gmail.com', '1234567890', '$2y$10$Z2jhhy0TwWgSimA6T0Gvnu7LkTnB.Y13MJhQcao0MdNIYZNGUmqmq', 'practicante', 1, 0, NULL, NULL, '2023-08-21 20:45:05', '2023-08-21 20:45:05'),
(27, 'adrian', 'sauceda', 'adrian_sauceda@gmail.com', '1234567890', '$2y$10$x1t42xxRE7u9h.z6qXMgCey4rvFnrnS6/ieDXmXt9Aysx8mcHDqXC', 'practicante', 1, 0, NULL, NULL, '2023-08-21 20:46:28', '2023-08-26 01:04:06'),
(28, 'pupfA3DZq0', 'W2wtgrPBVI', 'gVzyPVFVyK@gmail.com', 'vGvPHpc0fb', '$2y$10$UUzuuVUA8r0c2Z2UHuhVNeP6YoR/2t41QwCjjvUimFWuMzWF/aISi', 'Practicante', 1, 0, '2023-08-29 21:29:45', '4dk7CrCKSf', '2023-08-29 21:29:45', '2023-08-29 21:29:45'),
(29, 'ZSMFx21oEd', 'jRhY9kUMmo', '85ww80axp4@gmail.com', 'ZZieI8vnPF', '$2y$10$RNGeLvz8SA2518KL1Ap2A.a6zrCcC4gGCnHtizGqOj7IsTWsJOILK', 'Gerente', 1, 0, '2023-08-29 21:29:45', 'cAoyIxWdaW', '2023-08-29 21:29:45', '2023-08-29 21:29:45'),
(30, 'dlgrvRzIJ8', 'FjWDf8xZmB', 'CbGfjl7if1@gmail.com', 'sI3oJtA0QY', '$2y$10$nYT9KUcOowg3OzMtL7/Cu.XnySH9aIr.R.uH6QFOU.VR84.UNFNb2', 'Empleado', 1, 0, '2023-08-29 21:29:45', 'lklMI1Ld9Y', '2023-08-29 21:29:45', '2023-08-29 21:29:45'),
(31, '0aUR3KoCfJ', 'I0MdK9rUeA', 'KHR59aDm6m@gmail.com', 'XedKxknAul', '$2y$10$tf7dPIQYPSkiUP5.9M1xgO7FV4.d8vYlzgwLMWofxXaFq9l6wzfQ6', 'Supervisor', 1, 0, '2023-08-29 21:29:45', 'NRuYF9SDX5', '2023-08-29 21:29:45', '2023-08-29 21:29:45'),
(32, 'WXgFXcRZDJ', 'nySrMbry4T', 'zmcwxegUOr@gmail.com', 'iMVCWsmRbW', '$2y$10$i6RqzludBM7/jzaN3/4RVuNU/HxQSScNNbOmCV0Obkz7D.rVB9HFK', 'Empleado', 1, 0, '2023-08-29 21:29:45', 'ADNcHBeeGq', '2023-08-29 21:29:45', '2023-08-29 21:29:45'),
(33, 'ojAz8nWheT', 'QulgrU8kWy', 'g2l7xY1eiD@gmail.com', 'MK2NzsWtFs', '$2y$10$dvf3aF8DwcSX3LSEq3FIh.SBrtsSEY7HHMynyW7DwPYG9RU6W1mMq', 'Gerente', 1, 0, '2023-08-29 21:29:45', '1OVBBvlpKn', '2023-08-29 21:29:45', '2023-08-29 21:29:45'),
(34, 'woYKycwfp8', 'OoECGAqrlh', 'ESFnGhWxCX@gmail.com', 'k1CzdYO6IY', '$2y$10$ubSt0wpGghETRUHmcuhbHO5xDdMZeSOhgi0siXb9523qiKlNgCzUi', 'Jefe de Área', 1, 0, '2023-08-29 21:29:45', 'mijGumSn83', '2023-08-29 21:29:45', '2023-08-29 21:29:45'),
(35, 'g4kru6Wsqx', '9IGhfX2V7b', 'pP3xrnvFGh@gmail.com', '3WO0DUYSGp', '$2y$10$gjepV4tgL5w/LdHsRn2KW.wSRntWqfaZfG7Zhy1078j8wVxa4Ze2m', 'Practicante', 1, 0, '2023-08-29 21:29:45', 'xaZ4Sg95oo', '2023-08-29 21:29:45', '2023-08-29 21:29:45'),
(36, 'HJb9sJMXLX', 'oJ2TNXTyFZ', '1M1NsEbaxc@gmail.com', 'pRiC5DZKoa', '$2y$10$suFozPXl5f3HIWDI341DHObh.kdOuMnM28pVerjRR7kvdBT7GyzAu', 'Gerente', 1, 0, '2023-08-29 21:29:45', 'aHT1lHaqkY', '2023-08-29 21:29:45', '2023-08-29 21:29:45'),
(37, 'mo7wJzp3gZ', 'nYC9mOmkxY', 'YQTb0bPTSa@gmail.com', 'Og2F2cSk0z', '$2y$10$uhv.dmWiivHBNVsjR2L6We/bXSBm2ffC2tVbdTT3g7HhTx449nC4S', 'Gerente', 1, 0, '2023-08-29 21:29:46', 'dsAyUwVmvC', '2023-08-29 21:29:46', '2023-08-29 21:29:46'),
(38, 'awI6121rWr', 'hKFxz4FU8q', 'bTHQyiEE7v@gmail.com', '95HAKKekmu', '$2y$10$BVegZZ9l5h.13vCFbknLDeyauYn6c2BNIeofQ2jWMWgMcdgoau4M6', 'Practicante', 1, 0, '2023-08-29 21:29:46', '8nieGU8sZK', '2023-08-29 21:29:46', '2023-08-29 21:29:46'),
(39, '8h979ZInLj', 'FAfbotVr71', 'kIdmG9V0Jn@gmail.com', 'iAyiXaXwyF', '$2y$10$aBmPdb4VCqRyGXmFFdTDGOhjsQ0/xllc/LEMbCIx7DQTrtSuo/F.a', 'Empleado', 1, 0, '2023-08-29 21:29:46', 'DrCYbTJZcY', '2023-08-29 21:29:46', '2023-08-29 21:29:46'),
(40, 'tdhrIi90N8', 'qBMWwMFpvI', '8trMeM1rdq@gmail.com', '6USFWLHmDl', '$2y$10$bqJDF36b5Jm7VCxhZgthRewW1WISL8JNuqLJDDAftFPCWENowjbtS', 'Supervisor', 1, 0, '2023-08-29 21:29:46', '7LBUXp15rZ', '2023-08-29 21:29:46', '2023-08-29 21:29:46'),
(41, 'xWwURcocDW', 'BJpQbView6', 'pgmFRZmkiq@gmail.com', 'inTVGwDM6E', '$2y$10$tfytBICrlztAHdg3wLteCeXYjo31C2XOXeYIH6.bEHqDOM6sU1UR6', 'Jefe de Área', 1, 0, '2023-08-29 21:29:46', '0qX9lkNujJ', '2023-08-29 21:29:46', '2023-08-29 21:29:46'),
(42, 'HgpYvPiS48', 'MlkF3by6BX', 'uWq6QLM8Gj@gmail.com', 'l4umIGi8a6', '$2y$10$i4awGrIrUovTIqfDqmqWSundJHq7YhS.D0V4CkwtC5R2u7bF1i3em', 'Director', 1, 0, '2023-08-29 21:29:46', 'bpgnbM2poB', '2023-08-29 21:29:46', '2023-08-29 21:29:46'),
(43, '3PTUP7Nxd3', 'VlEymzvh0L', 'L1onSijFYB@gmail.com', 'ebMiwCfqlz', '$2y$10$7M.eukKm5e3oFkXGksZYS.B3er.5V9yFaDWDi/a8Mknlcds6Lsq.O', 'Supervisor', 1, 0, '2023-08-29 21:29:46', 'FxcZxM8Cq7', '2023-08-29 21:29:46', '2023-08-29 21:29:46'),
(44, 'XhwosuGMpE', 'Ze15o1ylbY', 'vPQcOSL1et@gmail.com', '6IC4SknaEy', '$2y$10$MvCXaYhZO8P4GaBRRlIST.PKVToS2sNKHs4iwglj6RLllRgHMyiT.', 'Practicante', 1, 0, '2023-08-29 21:29:46', 'w80KtzPSWO', '2023-08-29 21:29:46', '2023-08-29 21:29:46'),
(45, 'J0pGmD5EvO', '2lEygfTJBi', 'WVvqSIcxsm@gmail.com', 'RpCb5ixLcA', '$2y$10$G5bq.QVRp3ZF.DLby66vieic0lbC.RHOTarH0mg8WOAKh/G8dsVOy', 'Empleado', 1, 0, '2023-08-29 21:29:46', 'VSV56ZGsIg', '2023-08-29 21:29:46', '2023-08-29 21:29:46'),
(46, 'Ro3RhYkvUH', 'KmJZLZD4zJ', 'EWd4CZUMAj@gmail.com', 'M8dZ6Tgaif', '$2y$10$uNULYO4t.WeTKysMf9uCm.3dYmS6Fw7iLqRMxstlCYTOLPBD.frau', 'Jefe de Área', 1, 0, '2023-08-29 21:29:46', 'FshQL51qi3', '2023-08-29 21:29:46', '2023-08-29 21:29:46'),
(47, '8NtcLX9XZG', 'Ge3SwMRas5', 'I84IJST2PB@gmail.com', 'IgrzCNyZK7', '$2y$10$oo3fvLyHncq3wKeEBkuUteoriJvwGPliCsVoPs5VoTiMFsTi.3E3G', 'Supervisor', 1, 0, '2023-08-29 21:29:46', 'EZNUxiVnYV', '2023-08-29 21:29:46', '2023-08-29 21:29:46'),
(48, 'ylCa5QxzkF', 'tbFLjiuA4y', 'vgYSnmhQSN@gmail.com', 'Mxeb9mDZ1P', '$2y$10$S8.HzAzeG2oPCGlQldfvIOobJRpeetfs1fF2GnqQ7wwznpKwscUG2', 'Jefe de Área', 1, 0, '2023-08-29 21:29:46', '2D3MOGF2oJ', '2023-08-29 21:29:46', '2023-08-29 21:29:46'),
(49, 'tcBYKKMROx', 'uTORUOnPIB', 'Du5d0eekW5@gmail.com', 'me5FRfQd4T', '$2y$10$A8v09p3PiFIAjY1dKdNg7e6mJEX5wLdgkt.SmImJSrMgHsv/0apHK', 'Jefe de Área', 1, 0, '2023-08-29 21:29:46', '0vnmMYvtfI', '2023-08-29 21:29:46', '2023-08-29 21:29:46'),
(50, 'EiZSs1PniN', 'HmNbzd8utm', 'n5dppwRcwb@gmail.com', 'XwB1124rmr', '$2y$10$ald.4h7QscBrj7uxDuHM.uEHdHcHV5I6b2qkefidkwy4xgyXZ91lm', 'Practicante', 1, 0, '2023-08-29 21:29:46', 'Y01NPM1a0z', '2023-08-29 21:29:46', '2023-08-29 21:29:46'),
(51, 'Y9SLjiwUsW', 'wOY6cHjTfS', 'LdAK4j5tHS@gmail.com', 'IGqfdvnrGE', '$2y$10$.Cb0h8JQPRr5n/cm3Mzc/.USCJ4LTPZoXhRx8wKlcEq8Ja6c6EeNS', 'Jefe de Área', 1, 0, '2023-08-29 21:30:50', 'cDtziu9X4T', '2023-08-29 21:30:50', '2023-08-29 21:30:50'),
(52, 'G0atnvOC36', '3kDOeV6wJb', 'rrkXlBK5cc@gmail.com', 'FXMI19sH7R', '$2y$10$TnCu.kjhEw1CO6abiiqLnuWx5cd3RIdO/20pVrXHNgxY/saPQ3nxy', 'Director', 1, 0, '2023-08-29 21:30:50', 'LZlKGSHhRQ', '2023-08-29 21:30:50', '2023-08-29 21:30:50'),
(53, 'zR6V78g1Sh', 'zvhxuwEAnm', '7MYGRTahwW@gmail.com', '7QvTXdja3T', '$2y$10$Q3rf/2ZuB9JLQ7uK7qyrk.rBNrHa/es.SUrrUCEc4rrmfDImpfEGW', 'Gerente', 1, 0, '2023-08-29 21:30:50', 'AX0Q5eI3VL', '2023-08-29 21:30:50', '2023-08-29 21:30:50'),
(54, 'WBLi2liw1n', 'wArm0kXA3M', 'tVU9Ty6fXs@gmail.com', 'jJa5FmL0MH', '$2y$10$SEhkbVqysCm7YYz9XvSd5.vmFny.VbLUhJSVpZVxJhYUsq6p.Ttlm', 'Empleado', 1, 0, '2023-08-29 21:30:50', 'QShouvJOCg', '2023-08-29 21:30:50', '2023-08-29 21:30:50'),
(55, 'ULm5e8qLmR', 'FtIez4OXpp', 'rSlncjMCU0@gmail.com', '6AEI7WH9PD', '$2y$10$ZbmrzTLVGjGlU5qtGy843uFNZijVwEwLw93WM9edhmDKBjTm0vWbq', 'Gerente', 1, 0, '2023-08-29 21:30:50', 'Ibs65161yn', '2023-08-29 21:30:50', '2023-08-29 21:30:50'),
(56, 'waRXNTGxIj', 'b2PrSiJw0u', 'vn8raX4mvW@gmail.com', 'OlXHcVccRQ', '$2y$10$M4yjcf.kvirhrQUs73O0F.uNfQpFfB/Hk9O/Q3LkdinQ9g4CVEBsm', 'Supervisor', 1, 0, '2023-08-29 21:30:50', 'gt0HQ1Glec', '2023-08-29 21:30:50', '2023-08-29 21:30:50'),
(57, 'Db2Y6l35bS', 'Tt4EYeZY6M', 'Jwy75p2Kh1@gmail.com', 'bDAZOlmiaV', '$2y$10$nX9aIdA4U.HNc31MUoAnJu2qVNbPbQNDaCur7rROWoBE14OXWf4f.', 'Practicante', 1, 0, '2023-08-29 21:30:50', 'AqDYG3ceAJ', '2023-08-29 21:30:50', '2023-08-29 21:30:50'),
(58, 'iFeGRHZDPb', 'dJzMGTJnhZ', 'BMTRqL9MAR@gmail.com', 'gKDKUwzvBi', '$2y$10$0aUN4yrejaMO6oq/vrqNGur7z0KcLmdojs.6JsQD1z26VyUPw5nCq', 'Gerente', 1, 0, '2023-08-29 21:30:50', 'B3DhVxwToJ', '2023-08-29 21:30:50', '2023-08-29 21:30:50'),
(59, 'zYHHEF55ut', 'lPXDghboHv', 'OOAmHoLZ9F@gmail.com', 'fQlo0TvBuG', '$2y$10$rXpLRAh3qQJjRlglLqRDz.rROmN60JV8g.KaHLOav0jnqhQA2vfZS', 'Gerente', 1, 0, '2023-08-29 21:30:50', 'u7Drm76TAo', '2023-08-29 21:30:50', '2023-08-29 21:30:50'),
(60, '3kUiZ5Qrpn', 'AVQMzzyUrR', '8LlagnLG9L@gmail.com', 'yxyKy3JjJ8', '$2y$10$hEWWzxxs6Vz8afTNcj36Euj8IhxvXWPNxnBRazt6TqmxThYMfrqJu', 'Empleado', 1, 0, '2023-08-29 21:30:50', 'F4xq2AKyt4', '2023-08-29 21:30:50', '2023-08-29 21:30:50'),
(61, 'SW1Xqrz8nw', '4q0Id329df', 'i6jQu2DF2Y@gmail.com', 'GpFzGQuT4q', '$2y$10$xcQ.0qCLUdYwdTFRytQ4FuXCbKOAMEzViWSc0XaJvHUX7MUs07YiC', 'Practicante', 1, 0, '2023-08-29 21:30:50', 'mMnYlkf2jX', '2023-08-29 21:30:50', '2023-08-29 21:30:50'),
(62, 'sq80qIvsOV', 'HtFfB0QaSr', '9k9iHhCehw@gmail.com', 'HVeOvw31X7', '$2y$10$NUFJlAYNeS5S2PDDahFEFempuORUm3VsirAElh5UroaDf/.e6URIy', 'Supervisor', 1, 0, '2023-08-29 21:30:50', 'zEJDYbotMX', '2023-08-29 21:30:50', '2023-08-29 21:30:50'),
(63, 'cHPnBdp1w3', 'KG0D04vonX', 'R9tDCLIvjR@gmail.com', 'gTbICzMfXm', '$2y$10$n6Jk8J91L78FGH5YFjgQYuZXR51CgGV1Akizjqd0fFrXWTF8HG01O', 'Empleado', 1, 0, '2023-08-29 21:30:51', 'bcI5b677TA', '2023-08-29 21:30:51', '2023-08-29 21:30:51'),
(64, '8errvFB4YY', '5z7IuOAExB', 'w7onOl82dM@gmail.com', 'FzsgscUfvr', '$2y$10$bAXqMnq9kS/bADIrVXTdoup29FLKVn/SPaUHsUNCvX/lyBzD6wcM2', 'Supervisor', 1, 0, '2023-08-29 21:30:51', 'yI7Mbf9rAd', '2023-08-29 21:30:51', '2023-08-29 21:30:51'),
(65, 'q5Zi2LIBQz', 'yrZwidSEeR', '4wz8sWJHWp@gmail.com', 'qJ8nlStLK9', '$2y$10$vacrVBqkvze3vhojFq525OAr3urWazC0RIdm.cZdjWn23txrg2xFC', 'Supervisor', 1, 0, '2023-08-29 21:30:51', 'N6OjN7jdzZ', '2023-08-29 21:30:51', '2023-08-29 21:30:51'),
(66, '36kku1ydow', 'bc39O1oE2S', 'uDfZUoRgoJ@gmail.com', 'bDBeZ2Xepx', '$2y$10$8T3DZYzuRPm4lGMJ7Gfz8uoEaNETVyQ3r83T.oIXGyt4yP33KB/yK', 'Empleado', 1, 0, '2023-08-29 21:30:51', 'cDWVnvBKaE', '2023-08-29 21:30:51', '2023-08-29 21:30:51'),
(67, '6RoAPDgzlz', 'kEkudTQ6Wb', '4iOurBeu1Q@gmail.com', 'JZClTGH8uF', '$2y$10$niOfzep6ofuLWKoWtL7Aduspm1kW0GCJ/iEN3LpKUOGPn5j5bnC26', 'Empleado', 1, 0, '2023-08-29 21:30:51', 'uSsfaD8GjU', '2023-08-29 21:30:51', '2023-08-29 21:30:51'),
(68, 'HiWPwrp6Ps', 'nC2A5x9riH', 'pjew3q84qT@gmail.com', 'evBYiokuKx', '$2y$10$w7WvoVyhV1UDsetzOyK6yOBY.jmM60vKV6WQKxhOHskHe.f9YiE9W', 'Supervisor', 1, 0, '2023-08-29 21:30:51', 'BiZujQi9qM', '2023-08-29 21:30:51', '2023-08-29 21:30:51'),
(69, 'mwjyPi4cL8', '3SWXrB3qzX', '74dhDMT7BM@gmail.com', 'za9K2ZOiQH', '$2y$10$dBL5LwyYi76volp/iplAZ.4c.urdw6aQaNK1T8CUjHiz9JcmhuqSi', 'Supervisor', 1, 0, '2023-08-29 21:30:51', 'GM3Cy1yK61', '2023-08-29 21:30:51', '2023-08-29 21:30:51'),
(70, 'BGEXE3blJS', 'StKe1viCXP', 'HJwrDbKzK5@gmail.com', 'IOSh0CPNUS', '$2y$10$Kbpaq3v7aDRqf4pP6TezIO5qRjJW4r6I7M7gzFuofSuQrtjNQnLUW', 'Gerente', 1, 0, '2023-08-29 21:30:51', 'kjuACgN3Db', '2023-08-29 21:30:51', '2023-08-29 21:30:51'),
(71, 'MvRVk450XL', 'WuC6AX4Hka', 'st1YQD6ig1@gmail.com', 'fjRabeFrls', '$2y$10$9pFdZDKSUozWzJgnMXcs1OAI363Y1XWWVjBdr4VTNoOw58SvgPtlu', 'Gerente', 1, 0, '2023-08-29 21:30:51', '2aCC3b4BOx', '2023-08-29 21:30:51', '2023-08-29 21:30:51'),
(72, 'DJvF2GnOBq', 'dUqFD13sSy', 'BPsF69xWFm@gmail.com', 'YSoK4eEghG', '$2y$10$5wnUNdQqNI5brzTBW29jt.RzFQVqN688m8oJM93bpvbdRbnFljeQu', 'Supervisor', 1, 0, '2023-08-29 21:30:51', 'wCkui58eWk', '2023-08-29 21:30:51', '2023-08-29 21:30:51'),
(73, 'Hc18ucZ748', 'GcgSMzJYS5', 'awUsNMjhdT@gmail.com', 'lT01FcPgYr', '$2y$10$OknUA5NmgywvRAnrQNi.aeM4i32rxhcj/zaM5xpXeddc.RD5dnNfy', 'Jefe de Área', 1, 0, '2023-08-29 21:30:51', 'dh30tcsBW7', '2023-08-29 21:30:51', '2023-08-29 21:30:51'),
(74, 'Juan Carlos', 'Deniz Garcia', 'juancarlosdeniz@gmail.com', '3314025698', '$2y$10$rAN6Tbic/DyMRu.S8p1zgO9AleCuIXUjL60o6qnz7YEbHd2Q0N21K', 'empleado', 1, 0, NULL, NULL, '2023-09-06 22:41:27', '2023-09-06 22:42:01'),
(75, 'edsel', 'barbosa', 'edselb@gmail.com', '3127895620', '$2y$10$poyDJpcI4CMhuQNVznkCGuKld.6oyCbGy7588AbRU4STI/tgSND1y', 'director', 1, 0, NULL, NULL, '2023-09-08 00:53:11', '2023-09-08 00:53:33'),
(76, 'dsadsadsa', 'DSADSADSAD', 'qwerty@gmail.com', '1236547890', '$2y$10$4uVhlAU7Lw7BElb7VkAFmeVN2OYBjtfSgZWIKuVO7lE0bOmGfjluC', 'practicante', NULL, 0, NULL, NULL, '2023-09-08 01:06:20', '2023-09-08 01:06:20'),
(77, 'jfkdalañpqowieurnvmc', 'jdkslaoeiwuq', 'genericemail@gmail.com', '4315269874', '$2y$10$fFxiQSf1aoIdW/16nyeIdusH0a0QzvLZYDgcgK1ljiX6oWkqRw1zy', 'jefe de área', NULL, 0, NULL, NULL, '2023-09-08 20:57:19', '2023-09-08 20:57:19'),
(78, 'libreta', 'ejemplo', 'libretaemail@gmail.com', '3125478960', '$2y$10$U1EZfn9yopVk7TWvHKv3BuYGrallbqM0qkdlw0sINDy1wG52syAq6', 'jefe de área', 1, 0, NULL, NULL, '2023-09-08 21:31:56', '2023-09-08 21:31:56'),
(80, 'libreta2', 'ejemplo2', 'libretaemail2@gmail.com', '3125478967', '$2y$10$Qbs19cxxD7Xo8eeKI5b0cOp0DonPFrEkDEHTdVcyt9f.1qCK7ll5e', 'jefe de área', 1, 0, NULL, NULL, '2023-09-08 21:32:57', '2023-09-08 21:34:35'),
(82, 'libreta3', 'ejemplo3', 'libretaemail3@gmail.com', '4123456789', '$2y$10$WTw7eSVb87RWEYaFtnAqTuXwiXjyE8nfBDkayuxA34ueaDsLhFr6K', 'empleado', 1, 0, NULL, NULL, '2023-09-08 21:40:08', '2023-09-08 21:40:08'),
(84, 'libreta4', 'ejemplo4', 'libretaemail4@gmail.com', '4123456781', '$2y$10$BNaHNwi2BPDki5V0m4j9uO3aPuj3yTDO8v6MhUMs3ZkxpZpSuneze', 'empleado', 1, 0, NULL, NULL, '2023-09-08 22:04:45', '2023-09-08 22:04:45');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT de la tabla `perfil_secciones_permisos`
--
ALTER TABLE `perfil_secciones_permisos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `secciones`
--
ALTER TABLE `secciones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

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
