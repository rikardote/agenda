-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 03, 2016 at 04:31 AM
-- Server version: 5.7.12
-- PHP Version: 7.0.5-2+deb.sury.org~trusty+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pacientes`
--

-- --------------------------------------------------------

--
-- Table structure for table `pacientes`
--

CREATE TABLE `pacientes` (
  `id` int(10) UNSIGNED NOT NULL,
  `rfc` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `nombres` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `apellido_pat` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `apellido_mat` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pacientes`
--

INSERT INTO `pacientes` (`id`, `rfc`, `nombres`, `apellido_pat`, `apellido_mat`, `fecha_nacimiento`, `slug`, `tipo_id`, `created_at`, `updated_at`, `gender`) VALUES
(1, 'FUAH800427', 'HECTOR RICARDO', 'FUENTES', 'ARMENTA', '1980-04-27', 'fuentes-armenta-hector-ricardo', 1, '2016-05-12 15:38:26', '2016-05-12 15:38:26', 'M'),
(2, 'FUAH800427', 'MONICA', 'GUTIERREZ', 'SAMANIEGO', '1976-11-27', 'gutierrez-samaniego-monica', 3, '2016-05-12 15:38:43', '2016-05-12 15:38:43', 'F'),
(3, 'AESR540206', 'ROSALVA', 'ARMENTA', 'SALAZAR', '1954-02-06', 'armenta-salazar-rosalva', 10, '2016-05-12 15:39:02', '2016-05-12 15:39:02', 'F'),
(5, 'FUGR040201', 'RENATA', 'FUENTES', 'GUTIERREZ', '2004-02-01', 'fuentes-gutierrez-renata', 2, '2016-05-25 16:47:25', '2016-05-26 17:32:13', 'F'),
(6, 'FUAJ770330', 'JOSE MARIA', 'FUENTES', 'ARMENTA', '1977-03-30', 'fuentes-armenta-jose-maria', 7, '2016-05-26 17:10:36', '2016-05-26 17:10:36', 'M'),
(7, 'AERT750825', 'ROBERTO TIPES', 'AROLLO', 'ERROR', '1975-08-25', 'arollo-error-roberto-tipes', 1, '2016-05-28 01:13:16', '2016-05-28 01:13:16', 'M'),
(8, 'GUSM761127', 'GABRIELA', 'JIMENEZ', 'APOLINAR', '1976-11-27', 'jimenez-apolinar-gabriela', 1, '2016-06-01 17:55:36', '2016-06-01 17:55:36', 'F'),
(10, 'AAAA560206', 'ALBERTO', 'AGUILAR', 'ARMENTA', '1956-06-02', NULL, 1, '2016-06-02 01:38:32', '2016-06-02 01:41:04', 'M'),
(11, 'ERTI980415', 'ERDERZ', 'LOPEZ', 'SANCHEZ', '1998-04-15', NULL, 2, '2016-06-02 01:54:40', '2016-06-02 01:54:40', 'F'),
(12, 'TGBH000512', 'TOBIAS', 'LOPEZ', 'JIMENEZ', '2000-05-12', NULL, 1, '2016-06-02 01:56:24', '2016-06-02 01:56:24', 'M'),
(13, 'XCVB770809', 'ANGELICA', 'XOCHILT', 'DIAS', '1977-08-09', NULL, 2, '2016-06-02 01:58:32', '2016-06-02 01:58:32', 'F'),
(14, 'CDHM660708', 'HECTOR MONTALVO', 'CABALLERO', 'DIEZ', '1966-07-08', 'caballero-diez', 1, '2016-06-02 02:02:34', '2016-06-02 02:02:34', 'M'),
(15, 'AJJA770208', 'JOSEFINA', 'AROS', 'JIMENEZ', '1977-02-08', 'josefina-aros-jimenez', 1, '2016-06-02 02:04:24', '2016-06-02 02:04:24', 'F');

-- --------------------------------------------------------

--
-- Table structure for table `tipos`
--

CREATE TABLE `tipos` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` int(2) UNSIGNED ZEROFILL NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tipos`
--

INSERT INTO `tipos` (`id`, `code`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 01, 'TRABAJADOR', '2016-05-12 15:35:05', '2016-05-12 15:35:05'),
(2, 02, 'TRABAJADORA', '2016-05-12 15:35:05', '2016-05-12 15:35:05'),
(3, 03, 'ESPOSA', '2016-05-12 15:35:05', '2016-05-12 15:35:05'),
(4, 04, 'ESPOSO', '2016-05-12 15:35:05', '2016-05-12 15:35:05'),
(5, 05, 'PAPA', '2016-05-12 15:35:05', '2016-05-12 15:35:05'),
(6, 06, 'MAMA', '2016-05-12 15:35:05', '2016-05-12 15:35:05'),
(7, 07, 'HIJO', '2016-05-12 15:35:05', '2016-05-12 15:35:05'),
(8, 08, 'HIJA', '2016-05-12 15:35:05', '2016-05-12 15:35:05'),
(9, 90, 'JUBILADO / PENSIONADO', '2016-05-12 15:35:05', '2016-05-12 15:35:05'),
(10, 91, 'JUBILADA / PENSIONADA', '2016-05-12 15:35:05', '2016-05-12 15:35:05'),
(11, 92, 'VIUDEZ', '2016-05-12 15:35:05', '2016-05-12 15:35:05'),
(12, 31, 'CONCUBINA', '2016-05-12 15:35:05', '2016-05-12 15:35:05'),
(13, 41, 'CONCUBINO', '2016-05-12 15:35:05', '2016-05-12 15:35:05'),
(14, 51, 'ABUELO', '2016-05-12 15:35:05', '2016-05-12 15:35:05'),
(15, 61, 'ABUELA', '2016-05-12 15:35:05', '2016-05-12 15:35:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pacientes_tipo_id_foreign` (`tipo_id`);

--
-- Indexes for table `tipos`
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tipos`
--
ALTER TABLE `tipos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `pacientes`
--
ALTER TABLE `pacientes`
  ADD CONSTRAINT `pacientes_tipo_id_foreign` FOREIGN KEY (`tipo_id`) REFERENCES `tipos` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
