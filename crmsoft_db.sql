 -- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 29 Mai 2019 à 17:57
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `crmsoft_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_client` varchar(254) DEFAULT NULL,
  `prenom_client` varchar(11) DEFAULT NULL,
  `email_client` varchar(254) DEFAULT NULL,
  `tel_client` varchar(254) DEFAULT NULL,
  `addresse_client` varchar(150) DEFAULT NULL,
  `autre_info_client` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `clients`
--

INSERT INTO `clients` (`id`, `nom_client`, `prenom_client`, `email_client`, `tel_client`, `addresse_client`, `autre_info_client`) VALUES
(1, 'ABENA ', 'GISLAIN', 'GI@', '5454', 'DOUALA, NDOGBONG', 'ras'),
(2, 'TITI', 'ELECTRIQUE', 'EF@', '0655621224', 'DOUALA, NDOGBONG', 'TZTZRE'),
(3, 'GERTRUDE', 'ALICEA', 'GER@', '55555', 'DOUALA, NDOGBONG', 'RRASSS'),
(4, 'EMANUEL', 'BALIABA', 'EM@', '0655621224', 'DOUALA, NDOGBONG', 'RAS'),
(5, 'ATANGA', 'NDI', 'AT@', '3344344', 'YAOUNDE', 'MITNAD');

-- --------------------------------------------------------

--
-- Structure de la table `depenses`
--

CREATE TABLE IF NOT EXISTS `depenses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_type_depense` int(11) DEFAULT NULL,
  `id_dossier` int(11) NOT NULL,
  `montant_depense` varchar(254) DEFAULT NULL,
  `date_depense` datetime DEFAULT NULL,
  `commentaire_depense` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_type_depense` (`id_type_depense`),
  KEY `id_dossier` (`id_dossier`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `depenses`
--

INSERT INTO `depenses` (`id`, `id_type_depense`, `id_dossier`, `montant_depense`, `date_depense`, `commentaire_depense`) VALUES
(1, NULL, 1, '30', '2019-05-29 14:43:05', 'TAXE  TAVA'),
(2, NULL, 3, '150', '2019-05-29 14:43:28', 'QUITANT IMPLOT'),
(3, NULL, 2, '23', '2019-05-29 14:45:11', 'RTTR'),
(4, NULL, 2, '4', '2019-05-29 14:55:35', 'TAXI'),
(5, NULL, 5, '10', '2019-05-29 17:17:24', 'TAXE SUR FUMEE');

-- --------------------------------------------------------

--
-- Structure de la table `dossiers`
--

CREATE TABLE IF NOT EXISTS `dossiers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_client` int(11) NOT NULL,
  `numero_dossier` varchar(254) DEFAULT NULL,
  `status_dossier` varchar(254) DEFAULT NULL,
  `montant_traitement` varchar(254) DEFAULT NULL,
  `date_creation` datetime DEFAULT NULL,
  `description_dossier` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_client` (`id_client`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `dossiers`
--

INSERT INTO `dossiers` (`id`, `id_client`, `numero_dossier`, `status_dossier`, `montant_traitement`, `date_creation`, `description_dossier`) VALUES
(1, 1, 'AG1559130808', 'Clôturé', '5000', '2019-05-29 16:57:56', 'DEDOUANEMENT'),
(2, 2, 'TE1559131355', 'Terminé', '30000', '2019-05-29 16:49:49', 'LOCATION HILUX'),
(3, 3, 'GA1559131586', 'Encours de Traitement', '4050000', '2019-05-29 14:07:42', 'DEDOUANEMENT MERCEDES'),
(4, 4, 'EB1559131611', 'Encours de Traitement', '200000', '2019-05-29 17:05:36', 'LOCATION CAMION SABLE '),
(5, 5, 'AN1559142525', 'Terminé', '23000', '2019-05-29 17:25:00', 'LOCATION CONTENEUR MATELAS');

-- --------------------------------------------------------

--
-- Structure de la table `histo_status`
--

CREATE TABLE IF NOT EXISTS `histo_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_action` datetime DEFAULT NULL,
  `id_original` int(11) NOT NULL DEFAULT '0',
  `status_dossier` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_original` (`id_original`),
  KEY `date_action` (`date_action`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `histo_status`
--

INSERT INTO `histo_status` (`id`, `date_action`, `id_original`, `status_dossier`) VALUES
(1, '2019-05-29 14:22:23', 0, 'Terminé'),
(2, '2019-05-29 15:49:49', 0, 'Encours de Traitement'),
(3, '2019-05-29 15:57:56', 1, 'Encours de Traitement'),
(4, '2019-05-29 16:05:36', 4, 'Clôturé'),
(5, '2019-05-29 16:09:10', 5, 'Encours de Traitement'),
(6, '2019-05-29 16:25:00', 5, 'Encours de Traitement');

-- --------------------------------------------------------

--
-- Structure de la table `payements`
--

CREATE TABLE IF NOT EXISTS `payements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_dossier` int(11) NOT NULL,
  `id_type_payement` int(11) NOT NULL,
  `montant_payement` varchar(254) DEFAULT NULL,
  `date_payement` datetime DEFAULT NULL,
  `commentaire_payement` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_dossier` (`id_dossier`),
  KEY `id_type_payement` (`id_type_payement`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `payements`
--

INSERT INTO `payements` (`id`, `id_dossier`, `id_type_payement`, `montant_payement`, `date_payement`, `commentaire_payement`) VALUES
(1, 1, 1, '200', '2019-05-29 14:20:33', 'AVANCE LOCATION'),
(2, 3, 2, '50', '2019-05-29 14:21:39', 'UDI'),
(3, 2, 2, '43', '2019-05-29 14:55:08', 'TAXE TVA'),
(4, 5, 2, '45', '2019-05-29 17:15:01', 'PARKING');

-- --------------------------------------------------------

--
-- Structure de la table `type_depenses`
--

CREATE TABLE IF NOT EXISTS `type_depenses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_type_depense` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `type_payements`
--

CREATE TABLE IF NOT EXISTS `type_payements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_payement_libelle` varchar(254) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `type_payements`
--

INSERT INTO `type_payements` (`id`, `type_payement_libelle`, `date`) VALUES
(1, 'COMPTE CHEQUE', '2019-05-02 00:00:00'),
(2, 'BANQUE', '2019-05-02 00:00:00'),
(3, 'COMPTANT', '2019-05-10 00:00:00');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `depenses`
--
ALTER TABLE `depenses`
  ADD CONSTRAINT `fk_depenses_idfk_1` FOREIGN KEY (`id_type_depense`) REFERENCES `type_depenses` (`id`),
  ADD CONSTRAINT `fk_depenses_idfk_2` FOREIGN KEY (`id_dossier`) REFERENCES `dossiers` (`id`);

--
-- Contraintes pour la table `dossiers`
--
ALTER TABLE `dossiers`
  ADD CONSTRAINT `dossiers_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id`);

--
-- Contraintes pour la table `payements`
--
ALTER TABLE `payements`
  ADD CONSTRAINT `payements_ibfk_1` FOREIGN KEY (`id_type_payement`) REFERENCES `type_payements` (`id`),
  ADD CONSTRAINT `payements_ibfk_2` FOREIGN KEY (`id_dossier`) REFERENCES `dossiers` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
