-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-08-2018 a las 06:41:15
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `videoslaravel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE `comments` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `video_id` int(255) NOT NULL,
  `body` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `video_id`, `body`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'hola soy un comentario', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `role` varchar(20) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `surname`, `email`, `password`, `image`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'ADMIN', 'Pepito', 'Grillo', 'pepito@grillo.com', 'pepito', NULL, NULL, NULL, NULL),
(2, NULL, 'irwin', NULL, 'idmc@hotmail.com', '$2y$10$uerVM/CIjSXq8mGhZCNgj.wbY.8WK4UBzEnzJGPxgRn4IvCaqy3Ki', NULL, '2018-07-01 02:14:01', '2018-07-01 02:14:01', 'nMxLyTXSOV8jDl61JsiWLsC6kvKOzMqPLGupkwnvj1M3rlPjf9nRixYnQASf'),
(3, NULL, 'Irwin', NULL, 'idmc@cadym.com', '$2y$10$AHEw2QegPBFA3tIlKWvg3.HjJ2fNvMjoHEKucTfgay6D.CgVDMgJS', NULL, '2018-07-08 20:32:32', '2018-07-08 20:32:32', 'Rd1UTx0sCQdgZ9xNRtzk3jZj7bcciZBZ9qVBoZ8bvmD9pVFh1VcmA1z4TKyn');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videos`
--

CREATE TABLE `videos` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `status` varchar(20) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `video_path` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `videos`
--

INSERT INTO `videos` (`id`, `user_id`, `title`, `description`, `status`, `image`, `video_path`, `created_at`, `updated_at`) VALUES
(1, 1, 'video1', 'video1', NULL, NULL, NULL, NULL, NULL),
(2, 1, 'video2', 'video2', NULL, NULL, NULL, NULL, NULL),
(3, 2, 'pruebavideo', 'prueba de video', NULL, NULL, NULL, '2018-07-03 00:56:03', '2018-07-03 00:56:03'),
(4, 2, 'Subiendo video', 'subiendo video mp4', NULL, NULL, NULL, '2018-07-03 03:28:37', '2018-07-03 03:28:37'),
(5, 2, 'Subir miniatura', 'Subir miniatura', NULL, 'goku_and_vegita_dbs-wallpaper-1600x900.jpg', NULL, '2018-07-03 03:35:29', '2018-07-03 03:35:29'),
(6, 2, 'Subir Imagen dos', 'Subir Imagen dos', NULL, '1530589065goku_and_vegita_dbs-wallpaper-1600x900.jpg', NULL, '2018-07-03 03:37:45', '2018-07-03 03:37:45'),
(7, 2, 'Subiendo miniatura-video', 'Subiendo miniatura-video', NULL, '153058941060852.jpg', '1530589411Cursosdev - Cursos de Programación Avanzada - Google Chrome 10_02_2018 15_42_52.mp4', '2018-07-03 03:43:31', '2018-07-03 03:43:31'),
(8, 2, 'vbvcbcvb', 'ccvbcv', NULL, '1530590460debian.jpg', '1530590460Cursosdev - Cursos de Programación Avanzada - Google Chrome 10_02_2018 15_44_44.mp4', '2018-07-03 04:01:00', '2018-07-03 04:01:00'),
(12, 3, 'Videoupdate', 'videoupdate3', NULL, '1531883369update.jpg', '1531882237Cursosdev - Cursos de Programación Avanzada - Google Chrome 10_02_2018 15_44_44.mp4', '2018-07-16 03:31:08', '2018-07-18 03:09:29');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comment` (`video_id`),
  ADD KEY `fk_user` (`user_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_videos` (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comment` FOREIGN KEY (`video_id`) REFERENCES `videos` (`id`),
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `fk_videos` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
