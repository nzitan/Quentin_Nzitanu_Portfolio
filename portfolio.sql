-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 27 Octobre 2016 à 16:59
-- Version du serveur :  5.7.13-log
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `portfolio`
--
CREATE DATABASE IF NOT EXISTS `portfolio` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `portfolio`;

-- --------------------------------------------------------

--
-- Structure de la table `projets`
--

CREATE TABLE IF NOT EXISTS `projets` (
  `id_projet` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `path` text NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id_projet`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `projets`
--

INSERT INTO `projets` (`id_projet`, `nom`, `path`, `description`, `image`) VALUES
(2, 'Flee Form Pangolin', '/FFP', 'Petit jeu en Phaser afin de tester la Techno', 'http://img15.hostingpics.net/pics/153176FFP.png'),
(3, 'PHP_my_meetic', '/PHP_my_meetic', 'Un de mes premier projets de l''année, le but étant de faire un simili de Meetic.\nC''est du PHP Natif tous ce qu''il y a de plus simple avec des requetes SQL pour la base de données.\nIl s''agit de mon premier projet.', 'http://img15.hostingpics.net/pics/707759meetic.png'),
(4, 'Maquette-2', '/HTML-CSS_Maquette-2', 'Une maquette réaliser en HTML5 et CSS3, les bases du début d''années', 'http://img15.hostingpics.net/pics/369522maquette.png'),
(5, '2048', '/JavaScript_2048', 'Un petit projet afin d''apprendre a utiliser JavaScript.\r\nUn 2048.', 'http://img15.hostingpics.net/pics/2109502048.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
