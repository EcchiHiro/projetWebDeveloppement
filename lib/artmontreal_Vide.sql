-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 03 Mars 2016 à 05:06
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `artmontreal`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `IdAdmin_` int(11) NOT NULL AUTO_INCREMENT,
  `Login` varchar(32) DEFAULT NULL,
  `MotPasse` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`IdAdmin_`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`IdAdmin_`, `Login`, `MotPasse`) VALUES
(1, 'test', '098f6bcd4621d373cade4e832627b4f6');

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

CREATE TABLE IF NOT EXISTS `adresse` (
  `IdAdresse` int(11) NOT NULL AUTO_INCREMENT,
  `NumRue` varchar(32) DEFAULT NULL,
  `Rue` varchar(60) DEFAULT NULL,
  `Ville` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`IdAdresse`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1914 ;

-- --------------------------------------------------------

--
-- Structure de la table `artiste`
--

CREATE TABLE IF NOT EXISTS `artiste` (
  `IdArtiste` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(32) DEFAULT NULL,
  `Prenom` varchar(32) DEFAULT NULL,
  `Collectif` varchar(60) NOT NULL,
  `photoArtiste` varchar(60) DEFAULT NULL,
  `descriptionArtiste` varchar(1000) NOT NULL,
  PRIMARY KEY (`IdArtiste`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1000 ;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `IdCat` int(11) NOT NULL AUTO_INCREMENT,
  `NomSousCat` varchar(200) DEFAULT NULL,
  `NomSousCatEN` varchar(200) DEFAULT NULL,
  `PhotoCat` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`IdCat`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=58 ;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`IdCat`, `NomSousCat`, `NomSousCatEN`, `PhotoCat`) VALUES
(42, 'Sculpture', 'Sculpture', './images/categories/sculpture.jpg'),
(43, 'Installation', 'Installation', './images/categories/installation.png'),
(44, 'Vitrail', 'Stained Glass', './images/categories/vitrail.jpg'),
(45, 'Peinture', 'Painting', './images/categories/peinture.jpg'),
(46, 'Mosaique', 'Mosaics', './images/categories/mosaique.PNG'),
(47, 'Photographie', 'Photography', './images/categories/photographie.jpg'),
(48, 'Techniques mixtes', 'Mixed Media', './images/categories/techMixtes.PNG'),
(49, 'Céramique', 'Ceramics', './images/categories/ceramique.png'),
(50, 'Verre', 'Glass', './images/categories/verre.png'),
(51, 'Bois/menuiserie d''art', 'Wood/Woodcraft', './images/categories/bois.png'),
(52, 'Mobilier', 'Furnishings', './images/categories/mobilier.png'),
(53, 'Multimédia', 'Multimedia Work', './images/categories/multimedia.png'),
(54, 'Design industriel', 'Industrial Design', './images/categories/designInd.PNG'),
(55, 'Émaux', 'Enamels', './images/categories/emaux.png'),
(57, 'Graffiti', 'Graffiti', './images/categories/graffiti.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `est_composee`
--

CREATE TABLE IF NOT EXISTS `est_composee` (
  `IdOeuvre` int(11) NOT NULL AUTO_INCREMENT,
  `IdMat` int(11) NOT NULL,
  PRIMARY KEY (`IdOeuvre`,`IdMat`),
  KEY `FK_est_composée_IdMat` (`IdMat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `db_installe` bit(1) NOT NULL DEFAULT b'0',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Structure de la table `materiaux`
--

CREATE TABLE IF NOT EXISTS `materiaux` (
  `IdMat` int(11) NOT NULL AUTO_INCREMENT,
  `NomMateriaux` varchar(200) DEFAULT NULL,
  `NomMateriauxEN` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`IdMat`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=689 ;

-- --------------------------------------------------------

--
-- Structure de la table `oeuvre`
--

CREATE TABLE IF NOT EXISTS `oeuvre` (
  `IdOeuvre` int(11) NOT NULL AUTO_INCREMENT,
  `Titre` varchar(60) DEFAULT NULL,
  `TitreVariante` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `Collection` varchar(60) DEFAULT NULL,
  `CollectionEN` varchar(60) DEFAULT NULL,
  `Technique` varchar(60) DEFAULT NULL,
  `TechniqueEN` varchar(60) DEFAULT NULL,
  `Dimensions` varchar(60) DEFAULT NULL,
  `Arrondissement` varchar(60) DEFAULT NULL,
  `CoordonneeLatitude` double DEFAULT NULL,
  `CoordonneeLongitude` double DEFAULT NULL,
  `EstValide` tinyint(1) DEFAULT NULL,
  `IdAdresse` int(11) NOT NULL,
  `IdArtiste` int(11) NOT NULL,
  `IdCat` int(11) NOT NULL,
  `photoPresentation` varchar(60) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  PRIMARY KEY (`IdOeuvre`),
  KEY `FK_Oeuvre_IdAdresse` (`IdAdresse`),
  KEY `FK_Oeuvre_IdArtiste` (`IdArtiste`),
  KEY `FK_Oeuvre_IdCat` (`IdCat`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=963 ;

-- --------------------------------------------------------

--
-- Structure de la table `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
  `IdPhotographie` int(11) NOT NULL AUTO_INCREMENT,
  `Photo` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`IdPhotographie`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

-- --------------------------------------------------------

--
-- Structure de la table `possede`
--

CREATE TABLE IF NOT EXISTS `possede` (
  `IdOeuvre` int(11) NOT NULL AUTO_INCREMENT,
  `IdPhotographie` int(11) NOT NULL,
  PRIMARY KEY (`IdOeuvre`,`IdPhotographie`),
  KEY `FK_possede_IdPhotographie` (`IdPhotographie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `est_composee`
--
ALTER TABLE `est_composee`
  ADD CONSTRAINT `FK_est_composée_IdMat` FOREIGN KEY (`IdMat`) REFERENCES `materiaux` (`IdMat`),
  ADD CONSTRAINT `FK_est_composée_IdOeuvre` FOREIGN KEY (`IdOeuvre`) REFERENCES `oeuvre` (`IdOeuvre`);

--
-- Contraintes pour la table `oeuvre`
--
ALTER TABLE `oeuvre`
  ADD CONSTRAINT `FK_Oeuvre_IdAdresse` FOREIGN KEY (`IdAdresse`) REFERENCES `adresse` (`IdAdresse`),
  ADD CONSTRAINT `FK_Oeuvre_IdArtiste` FOREIGN KEY (`IdArtiste`) REFERENCES `artiste` (`IdArtiste`),
  ADD CONSTRAINT `FK_Oeuvre_IdCat` FOREIGN KEY (`IdCat`) REFERENCES `categorie` (`IdCat`);

--
-- Contraintes pour la table `possede`
--
ALTER TABLE `possede`
  ADD CONSTRAINT `FK_possede_IdOeuvre` FOREIGN KEY (`IdOeuvre`) REFERENCES `oeuvre` (`IdOeuvre`),
  ADD CONSTRAINT `FK_possede_IdPhotographie` FOREIGN KEY (`IdPhotographie`) REFERENCES `photos` (`IdPhotographie`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
