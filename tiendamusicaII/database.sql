-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 03, 2016 at 11:17 AM
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
-- Table structure for table `canciones`
--

CREATE TABLE IF NOT EXISTS `canciones` (
  `id` int(11) NOT NULL,
  `id_disco` int(11) NOT NULL,
  `cancion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=139 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `canciones`
--

INSERT INTO `canciones` (`id`, `id_disco`, `cancion`) VALUES
(1, 1, 'Guardians At the Gate  '),
(2, 1, 'Reaching  '),
(3, 1, 'Akkadian Empire  '),
(4, 1, 'House Of Cards  '),
(5, 1, '11 Days in Hell  '),
(6, 1, 'Eterna  '),
(7, 1, 'Veni Vidi Vici  '),
(8, 1, 'Breath and Life  '),
(9, 1, 'Creation  '),
(10, 1, 'Redemption  '),
(11, 1, 'Beyond Good and Evil  '),
(12, 1, 'Lost Empire  '),
(13, 1, 'Sands of Time  '),
(14, 1, 'Black Cauldron  '),
(15, 1, 'Lost Generation  '),
(16, 1, 'Hell''s Battalion  '),
(17, 1, 'Red Warrior  '),
(18, 1, 'Lachrimae  '),
(19, 1, 'Legions of Doom  '),
(20, 1, 'Road to Glory  '),
(21, 1, 'Army of Kings  '),
(22, 1, 'Lost Raiders  '),
(23, 1, 'Battle of the Kings  '),
(24, 1, 'Path to Freedom  '),
(25, 1, 'Hymn of the Rising  '),
(26, 1, 'Danuvius  '),
(27, 1, 'Blood and Glory  '),
(28, 1, 'The Messenger  '),
(29, 2, 'Prologue: Birth  '),
(30, 2, 'Fire and Honor  '),
(31, 2, 'Nameless Heroes  '),
(32, 2, 'Transcendence  '),
(33, 2, 'Young Blood  '),
(34, 2, 'Knights and Lords  '),
(35, 2, 'The New Earth  '),
(36, 2, 'Flames of War  '),
(37, 2, 'Maya  '),
(38, 2, 'Epica  '),
(39, 2, 'Tribes  '),
(40, 2, 'Eternal Flame  '),
(41, 5, 'Millennium  '),
(42, 5, 'Uprising  '),
(43, 5, 'Pillars of Earth  '),
(44, 5, 'Existence  '),
(45, 5, 'Mission to the Unknown  '),
(46, 5, 'Beyond the Clouds  '),
(47, 5, 'How the World Sees You  '),
(48, 5, 'Discovery of Power  '),
(49, 5, 'And the Heavens Shall Tremble  '),
(50, 5, '100 Years War  '),
(51, 5, 'Destroyer  '),
(52, 5, 'Triumph  '),
(53, 5, 'Shadowfall  '),
(54, 5, 'New Beginning  '),
(55, 5, 'The Last Immortal  '),
(56, 5, 'Tempest  '),
(57, 5, 'Amethyst  '),
(58, 5, 'The Future is Upon Us  '),
(59, 3, 'Colossus  '),
(60, 3, 'Sol Invictus  '),
(61, 3, 'Helios  '),
(62, 3, 'Requiem of the Night  '),
(63, 3, 'The Odyssey  '),
(64, 3, 'Land of Shadows  '),
(65, 3, 'Four Horsemen  '),
(66, 3, 'Rising Dawn  '),
(67, 3, 'Phoenix Rising  '),
(68, 3, 'Farewell to Earth  '),
(69, 3, 'Sirens of Hyperion  '),
(70, 3, 'March on the Black Gate  '),
(71, 3, 'Apollo''s Triumph  '),
(72, 4, 'Above and Beyond  '),
(73, 4, 'Tree of Life  '),
(74, 4, 'An Unfinished Life  '),
(75, 4, 'Breaking Through  '),
(76, 4, 'Equinox  '),
(77, 4, 'The Fire Within  '),
(78, 4, 'Life Chronicles  '),
(79, 4, 'Solstice Sun  '),
(80, 4, 'The Truth  '),
(81, 4, 'Homecoming  '),
(82, 4, 'Apotheosis  '),
(83, 4, 'Turning Point  '),
(84, 4, 'Rebirth  '),
(85, 4, 'Age of Innocence  '),
(86, 4, 'Hallowed Dawn  '),
(87, 4, 'Hope and Glory  '),
(88, 4, 'The New World  '),
(89, 4, 'Ashes to Ashes  '),
(90, 4, 'Cry Freedom  '),
(91, 4, 'Day One  '),
(92, 4, 'The Great Unknown  '),
(93, 4, 'Remember the Titans  '),
(94, 4, 'Across the Horizon  '),
(95, 4, 'The Legend Begins  '),
(96, 4, 'Leaving the Nest  '),
(97, 4, 'Final Hope  '),
(98, 7, 'Aura  '),
(99, 7, 'Starvation  '),
(100, 7, 'Dreammaker  '),
(101, 7, 'Hurt  '),
(102, 7, 'Ocean Princess  '),
(103, 7, 'Gift of Life  '),
(104, 7, 'Rada  '),
(105, 7, 'A Place in Heaven  '),
(106, 7, 'Merchant Prince  '),
(107, 7, 'Promise  '),
(108, 7, 'Femme fatale  '),
(109, 7, 'Homecoming  '),
(110, 7, 'Immortal  '),
(111, 7, 'Remember Me  '),
(112, 7, 'Sonera  '),
(113, 7, 'Reborn  '),
(114, 7, 'Age of Gods  '),
(115, 7, 'Illusions  '),
(116, 7, 'Soulseeker  '),
(117, 6, 'Freedom Fighters (from Legend)'),
(118, 6, 'Heart of Courage (from Legend)'),
(119, 6, 'Master of Shadows (from Power of Darkness)'),
(120, 6, 'Moving Mountains (from Nemesis)'),
(121, 6, 'Am I Not Human? (later released on Nero)'),
(122, 6, 'Enigmatic Soul (from Nemesis)'),
(123, 6, 'Fire Nation (from Power of Darkness)'),
(124, 6, 'Black Blade (from Power of Darkness)'),
(125, 6, 'Super Strength (from Volume One)'),
(126, 6, 'Invincible (from Power of Darkness)'),
(127, 6, 'False King (from Nemesis)'),
(128, 6, 'Hypnotica (from Legend)'),
(129, 6, 'Fill My Heart (from Legend)'),
(130, 6, 'Protectors of the Earth (from Legend)'),
(131, 6, 'Velocitron (from Power of Darkness)'),
(132, 6, 'Undying Love (from Legend)'),
(133, 6, '1000 Ships of the Underworld (from Dynasty)'),
(134, 6, 'Tristan (from Nemesis)'),
(135, 6, 'Breath of Ran Gor (from Dynasty)'),
(136, 6, 'Infinite Legends (from Legend)'),
(137, 6, 'To Glory (later released on Nero)'),
(138, 6, 'After the Fall (from The Devil Wears Nada)');

-- --------------------------------------------------------

--
-- Table structure for table `comentarios`
--

CREATE TABLE IF NOT EXISTS `comentarios` (
  `id_comentario` int(11) NOT NULL,
  `id_usuario` varchar(100) NOT NULL,
  `id_disco` int(11) NOT NULL,
  `comentario` text NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `id_usuario`, `id_disco`, `comentario`, `fecha`) VALUES
(3, '1', 1, 'Comentario en Chronicles', '2016-05-27 21:10:53'),
(4, '1', 4, 'Comentario en Tree Of Life', '2016-05-27 21:11:06'),
(5, '1', 3, 'Comentario en Helio', '2016-05-27 21:11:14'),
(6, '1', 6, 'Comentario en Invincible', '2016-05-27 21:11:21'),
(7, '1', 5, 'Comentario en Existence', '2016-05-27 21:11:28'),
(8, '1', 7, 'Comentario en Illusions', '2016-05-27 21:11:35'),
(9, '1', 2, 'Comentario en Epica', '2016-05-27 21:11:46'),
(10, '1', 6, 'Segundo comentario por  el mismo usuario', '2016-05-27 21:12:25'),
(11, '2', 6, 'Un comentario de otro usuario', '2016-05-27 21:13:16');

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

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
(7, 'Illusions', 'EPIC', 10, 'Two Steps From Hell', 5),
(9, 'Desde Form', 'EPIC', 100, 'Productora desde FORM', 0);

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
  `envio` int(20) NOT NULL,
  `rol` varchar(10) NOT NULL DEFAULT 'subscriber'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Usuario`
--

INSERT INTO `Usuario` (`nombre`, `apellidos`, `nombreUsuario`, `contrasena`, `direccion`, `provincia`, `email`, `dni`, `visa`, `observaciones`, `ciudad`, `envio`, `rol`) VALUES
('Alejandro', 'Aleclade', 'a', '$2y$10$.ToIjGQcTUOW7XinF2GJSOhqy9mtR9RYh8q3AjeyVQ/4CNYGZPd6K', 'fas', '1', 'fjsakl', '1', 0, 'fsafsda', 'fdsa', 2, 'admin'),
('Otro Usuario', 'Otro', 'Otro Usuario', '$2y$10$z7bAG7sWHtPAvheFQAN1BOoXbZWaCtO4fY5/EU14fC4N.OoFHY31e', 'fdfdsa', '1', '', '2', 0, '', '', 0, 'subscriber');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `canciones`
--
ALTER TABLE `canciones`
  ADD PRIMARY KEY (`id`,`id_disco`),
  ADD KEY `FK_id_disco_comentario` (`id_disco`);

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
-- AUTO_INCREMENT for table `canciones`
--
ALTER TABLE `canciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=139;
--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `Disco`
--
ALTER TABLE `Disco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `canciones`
--
ALTER TABLE `canciones`
  ADD CONSTRAINT `FK_id_disco_comentario` FOREIGN KEY (`id_disco`) REFERENCES `Disco` (`id`);

--
-- Constraints for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `FK_id_disco` FOREIGN KEY (`id_disco`) REFERENCES `Disco` (`id`),
  ADD CONSTRAINT `FK_id_user` FOREIGN KEY (`id_usuario`) REFERENCES `Usuario` (`dni`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
