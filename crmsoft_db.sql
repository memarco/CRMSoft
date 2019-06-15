 -- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 16 Juin 2019 à 00:42
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Structure de la table `depenses`
--

CREATE TABLE IF NOT EXISTS `depenses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_dossier` int(11) NOT NULL,
  `montant_depense` varchar(254) DEFAULT NULL,
  `date_depense` datetime DEFAULT NULL,
  `commentaire_depense` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_dossier2` (`id_dossier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `dossiers`
--

CREATE TABLE IF NOT EXISTS `dossiers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero_dossier` varchar(254) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `status_dossier` varchar(254) DEFAULT NULL,
  `montant_traitement` varchar(254) DEFAULT NULL,
  `date_creation` datetime DEFAULT NULL,
  `description_dossier` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_client` (`client_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Contenu de la table `histo_status`
--

INSERT INTO `histo_status` (`id`, `date_action`, `id_original`, `status_dossier`) VALUES
(1, '2019-06-10 15:43:19', 2, 'Encours de Traitement'),
(2, '2019-06-10 15:57:57', 1, 'Terminé'),
(3, '2019-06-11 16:08:54', 6, 'Encours de Traitement'),
(4, '2019-06-11 18:47:35', 13, 'Encours de Traitement'),
(5, '2019-06-11 18:49:49', 1, 'Encours de Traitement'),
(6, '2019-06-12 08:11:35', 3, 'Encours de Traitement'),
(7, '2019-06-12 08:11:50', 1, 'Encours de Traitement'),
(8, '2019-06-12 09:18:04', 1, 'Terminé'),
(9, '2019-06-12 12:01:46', 3, 'Encours de Traitement'),
(10, '2019-06-12 12:07:18', 1, 'Terminé'),
(11, '2019-06-14 01:50:22', 16, 'Terminé'),
(12, '2019-06-14 01:53:41', 6, 'Encours de Traitement'),
(13, '2019-06-15 10:56:19', 16, 'Clôturé'),
(14, '2019-06-15 11:36:30', 19, 'Encours de Traitement'),
(15, '2019-06-15 11:36:46', 18, 'Terminé'),
(16, '2019-06-15 12:06:07', 20, 'Encours de Traitement'),
(17, '2019-06-15 12:59:51', 16, 'Clôturé'),
(18, '2019-06-15 22:38:26', 1, 'Encours de Traitement'),
(19, '2019-06-15 22:38:41', 2, 'Encours de Traitement'),
(20, '2019-06-15 22:43:13', 1, 'Encours de Traitement'),
(21, '2019-06-15 23:00:41', 4, 'Encours de Traitement'),
(22, '2019-06-15 23:39:03', 5, 'Encours de Traitement');

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
  KEY `fk_dossier` (`id_dossier`)
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
  ADD CONSTRAINT `fk_dossier2` FOREIGN KEY (`id_dossier`) REFERENCES `dossiers` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `dossiers`
--
ALTER TABLE `dossiers`
  ADD CONSTRAINT `fk_client` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `payements`
--
ALTER TABLE `payements`
  ADD CONSTRAINT `fk_dossier` FOREIGN KEY (`id_dossier`) REFERENCES `dossiers` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
