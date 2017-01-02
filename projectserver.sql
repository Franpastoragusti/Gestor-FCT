-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 02, 2017 at 01:15 AM
-- Server version: 10.0.28-MariaDB-0ubuntu0.16.04.1
-- PHP Version: 7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectserver`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumnos`
--

CREATE TABLE `alumnos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellido1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellido2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ciclo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `empresas_id` int(11) DEFAULT NULL,
  `profesores_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `alumnos`
--

INSERT INTO `alumnos` (`id`, `nombre`, `apellido1`, `apellido2`, `ciclo`, `empresas_id`, `profesores_id`) VALUES
(1, 'Fran', 'Pastor', 'Agustí', 'DAW', NULL, NULL),
(2, 'Tomás', 'Martinez', 'Jareño', 'DAW', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `empresas`
--

CREATE TABLE `empresas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cp` int(11) NOT NULL,
  `telefono1` int(11) NOT NULL,
  `telefono2` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `empresas`
--

INSERT INTO `empresas` (`id`, `nombre`, `direccion`, `cp`, `telefono1`, `telefono2`, `fecha_creacion`) VALUES
(1, 'Florida Universitaria', 'Calle la parra, Catarroja, nº5', 46112, 967574636, 622434455, '1999-05-12 00:00:00'),
(2, 'Panaderia Ferriz', 'Calle Meson 45', 46142, 666555888, 888555444, '1924-05-04 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `profesores`
--

CREATE TABLE `profesores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `departamento` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `profesores`
--

INSERT INTO `profesores` (`id`, `nombre`, `apellidos`, `departamento`) VALUES
(1, 'Arturo', 'Fernandez', 'Astrologia');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`) VALUES
(1, 'franuser', 'fran@gmail.com', '$2y$13$WT2aYaMV9goK3C9mVEi9tu2i76kcVpZgeHgXOyi9pvOAhRtIBJO5G'),
(4, 'franuser2', 'fran2@gmail.com', '$2y$13$Fdqh3VomZDWLr1NMZm165OxNYkY1mjkPmLZM2qo9rmi8msco4UHju'),
(5, 'fran4', 'fran3@gmail.com', '$2y$13$T5tynUqvRH7vgxfnj0EUHO1Xp.fFGNPm41LqRnUOhO6snHJxNyyNe'),
(6, 'Fraswa', 'dawadwadwada@gmail.com', '$2y$13$8LgDQHP1CfSsoN0WZhrdKeMbTQSIEB0RkcTlPJX1Nsl/qT4HoW4s6'),
(7, 'fran7', 'frans@gmail.com', '$2y$13$KWlhMZjApEq/RLyrsopPJu7ntmSBN6nDz5a8zXhVQn/bTvnlq6N96'),
(8, 'dwadaw', 'gasg@gmail.com', '$2y$13$mopke97kbsOs55CSoQGc7eayDciNSIAkMvgIHPw5FoxhPfQzvI9Je'),
(9, 'prueba1', 'dawa21dwa@gmail.com', '$2y$13$wwihMa85.6/bLm4OB3BLxuapXcTmOuVHCST8xOyxfSC/fUZcLV56W'),
(10, 'fran21', 'hola@gmail.com', '$2y$13$bVFd8Ndzo3GaPGbwzylyUu/dGOxoKWeLOsmgODstmj8wpqNFyHmPi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_5EC5A6AB602B00EE` (`empresas_id`),
  ADD KEY `IDX_5EC5A6ABDC431A97` (`profesores_id`);

--
-- Indexes for table `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `profesores`
--
ALTER TABLE `profesores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `FK_5EC5A6AB602B00EE` FOREIGN KEY (`empresas_id`) REFERENCES `empresas` (`id`),
  ADD CONSTRAINT `FK_5EC5A6ABDC431A97` FOREIGN KEY (`profesores_id`) REFERENCES `profesores` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
