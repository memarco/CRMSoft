-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 01 Mai 2019 à 11:52
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `crm_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `action`
--

CREATE TABLE IF NOT EXISTS `action` (
  `id_dossier` int(11) NOT NULL,
  `id_prospects` int(11) NOT NULL,
  PRIMARY KEY (`id_dossier`,`id_prospects`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_categorie` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id`, `libelle_categorie`) VALUES
(1, 'ACHAT CAMION'),
(2, 'DEDOUANEMENT');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `clients`
--

INSERT INTO `clients` (`id`, `nom_client`, `prenom_client`, `email_client`, `tel_client`, `addresse_client`, `autre_info_client`) VALUES
(1, 'GERARD', 'Lamouse', 'g@', '0655621224', 'oslo', 'ras'),
(3, 'kame', 'FLEBEERT', 'kam@', '0655621224', 'DOUALA, NDOGBONG', 'RAS'),
(4, 'MARCERL', 'DESAIER', 'SDFSD@', '877474', NULL, 'RAS');

-- --------------------------------------------------------

--
-- Structure de la table `depenses`
--

CREATE TABLE IF NOT EXISTS `depenses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_type_depense` int(11) NOT NULL,
  `id_dossier` int(11) NOT NULL,
  `num_depense` varchar(254) DEFAULT NULL,
  `libelle_depense` varchar(254) DEFAULT NULL,
  `montant_depense` varchar(254) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `commentaire_depense` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `dossiers`
--

CREATE TABLE IF NOT EXISTS `dossiers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_client` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `id_todo` int(11) NOT NULL,
  `numero_dossier` varchar(254) DEFAULT NULL,
  `libelle_dossier` varchar(254) DEFAULT NULL,
  `montant_traitement` varchar(254) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `payements`
--

CREATE TABLE IF NOT EXISTS `payements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_dossier` int(11) NOT NULL,
  `id_type_payement` int(11) NOT NULL,
  `numero_payement` varchar(254) DEFAULT NULL,
  `libelle_payement` varchar(254) DEFAULT NULL,
  `montant_payement` varchar(254) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `commentaire_payement` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `prospects`
--

CREATE TABLE IF NOT EXISTS `prospects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_prospects` varchar(254) DEFAULT NULL,
  `date_relance` datetime DEFAULT NULL,
  `commentaire_relance` varchar(254) DEFAULT NULL,
  `selectbox` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `todo`
--

CREATE TABLE IF NOT EXISTS `todo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_todo` varchar(254) DEFAULT NULL,
  `deadline_todo` datetime DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `todo`
--

INSERT INTO `todo` (`id`, `libelle_todo`, `deadline_todo`, `date`) VALUES
(1, 'REMORQUAGE', '2019-05-02 00:00:00', '2019-05-01 00:00:00'),
(2, 'ACHAT', '2019-05-10 00:00:00', '2019-05-10 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `type_depenses`
--

CREATE TABLE IF NOT EXISTS `type_depenses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_type_depense` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `type_payements`
--

CREATE TABLE IF NOT EXISTS `type_payements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_payement_libelle` varchar(254) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_user` varchar(254) DEFAULT NULL,
  `email_user` varchar(254) DEFAULT NULL,
  `tel_user` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `depenses`
--
ALTER TABLE `depenses`
  ADD CONSTRAINT `FK_conserne` FOREIGN KEY (`id`) REFERENCES `dossiers` (`id`),
  ADD CONSTRAINT `FK_Association_1` FOREIGN KEY (`id`) REFERENCES `type_depenses` (`id`);

--
-- Contraintes pour la table `dossiers`
--
ALTER TABLE `dossiers`
  ADD CONSTRAINT `FK_Association_6` FOREIGN KEY (`id`) REFERENCES `categories` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;





-- Structure de la table `histo_status`


CREATE TABLE IF NOT EXISTS `histo_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `action` enum('update','delete') DEFAULT NULL,
  `date_action` datetime DEFAULT NULL,
  `version` bigint(20) NOT NULL DEFAULT '0',
  `id_original` int(11) NOT NULL DEFAULT '0',
  `status_dossier` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_original` (`id_original`),
  KEY `action` (`action`),
  KEY `date_action` (`date_action`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

