-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 25 juil. 2019 à 02:31
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `galerie`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `content` varchar(100) NOT NULL,
  `Username` varchar(16) NOT NULL,
  `Nom` varchar(20) NOT NULL,
  KEY `Username` (`Username`),
  KEY `Nom` (`Nom`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`content`, `Username`, `Nom`) VALUES
('Jolie mon pote', 'admin', 'Photo1'),
('Très Jolie photo', 'Francois', 'Zup');

-- --------------------------------------------------------

--
-- Structure de la table `oeuvre`
--

DROP TABLE IF EXISTS `oeuvre`;
CREATE TABLE IF NOT EXISTS `oeuvre` (
  `Nom` varchar(20) NOT NULL,
  `Description` varchar(200) DEFAULT NULL,
  `Path` varchar(20) NOT NULL,
  `User` varchar(16) NOT NULL,
  PRIMARY KEY (`Nom`),
  KEY `User` (`User`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `oeuvre`
--

INSERT INTO `oeuvre` (`Nom`, `Description`, `Path`, `User`) VALUES
('Photo3', 'sérigraphie sur macule 3', 'Photo3.jpg', 'nina'),
('Photo4', 'photographie argentique', 'Photo4.jpg', 'nina'),
('Photo5', 'photographie argentique 2', 'Photo5.jpg', 'nina'),
('Photo1', 'sérigraphie sur macule', 'Photo1.jpg', 'nina'),
('Photo2', 'sérigraphie sur macule 2', 'Photo2.jpg', 'nina'),
('Photo6', 'photographie argentique 4', 'Photo6.jpg', 'nina'),
('Zup', 'Paysage', 'Zup.jpg', 'nina'),
('Marie1', 'Premier tableau préféré de ma fille', 'Marie1.jpg', 'admin'),
('Noah1', 'Tableau préféré de mon fils Noah', 'Noah1.jpg', 'admin'),
('Rolland', 'Mon tableau préféré', 'Rolland.jpg', 'admin'),
('VanGogh', 'mon tableau préféré', 'VanGogh.jpg', 'Francois');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `Username` varchar(16) NOT NULL,
  `Password` varchar(16) NOT NULL,
  `email` varchar(50) NOT NULL,
  `Birth` date NOT NULL,
  PRIMARY KEY (`Username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`Username`, `Password`, `email`, `Birth`) VALUES
('admin', 'admin', 'francois.jullion99@gmail.com', '2019-04-01'),
('nina', 'nina', 'nina@gmails.com', '2019-05-12'),
('Francois', 'test', 'francois.jullion99@laposte.net', '2019-05-01');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
