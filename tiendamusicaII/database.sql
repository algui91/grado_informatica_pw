-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 27, 2016 at 06:43 PM
-- Server version: 5.5.47-MariaDB
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db76625397`
--

-- --------------------------------------------------------

--
-- Table structure for table `comentarios`
--

CREATE TABLE IF NOT EXISTS `comentarios` (
  `id_comentario` int(11) NOT NULL,
  `id_usuario` varchar(100) NOT NULL,
  `id_disco` int(11) NOT NULL,
  `comentario` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Disco`
--

CREATE TABLE IF NOT EXISTS `Disco` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `genero` varchar(100) NOT NULL,
  `precio` double NOT NULL,
  `productora` varchar(100) NOT NULL,
  `valoracion` tinyint(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Disco`
--

INSERT INTO `Disco` (`id`, `titulo`, `genero`, `precio`, `productora`, `valoracion`) VALUES
(1, 'Chronicles', 'EPIC', 10, 'Audiomachine', 5),
(2, 'Epica', 'EPIC', 20, 'Audiomachine', 5),
(3, 'Helio', 'EPIC', 10, 'Audiomachine', 2),
(4, 'Tree Of Life', 'EPIC', 2, 'Audiomachine', 5),
(5, 'Existence', 'EPIC', 10, 'Audiomachine', 2),
(6, 'Invincible', 'EPIC', 10, 'Two Steps From Hell', 2),
(7, 'Illusions', 'EPIC', 10, 'Two Steps From Hell', 5);

-- --------------------------------------------------------

--
-- Table structure for table `Usuario`
--

CREATE TABLE IF NOT EXISTS `Usuario` (
  `nombre` varchar(20) NOT NULL,
  `apellidos` varchar(20) NOT NULL,
  `nombreUsuario` varchar(20) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `direccion` varchar(20) NOT NULL,
  `provincia` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `dni` varchar(20) NOT NULL,
  `visa` int(20) NOT NULL,
  `observaciones` varchar(20) NOT NULL,
  `ciudad` varchar(20) NOT NULL,
  `envio` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`,`id_usuario`,`id_disco`),
  ADD KEY `FK_id_user` (`id_usuario`),
  ADD KEY `FK_id_disco` (`id_disco`);

--
-- Indexes for table `Disco`
--
ALTER TABLE `Disco`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Usuario`
--
ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`dni`),
  ADD UNIQUE KEY `nombreUsuario` (`nombreUsuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Disco`
--
ALTER TABLE `Disco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `FK_id_disco` FOREIGN KEY (`id_disco`) REFERENCES `Disco` (`id`),
  ADD CONSTRAINT `FK_id_user` FOREIGN KEY (`id_usuario`) REFERENCES `Usuario` (`dni`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
