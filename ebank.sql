-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 13 nov. 2021 à 12:50
-- Version du serveur :  8.0.21
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ebank`
--

-- --------------------------------------------------------

--
-- Structure de la table `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idclient` int NOT NULL,
  `accountname` varchar(100) NOT NULL,
  `rib` varchar(30) NOT NULL,
  `balance` double NOT NULL,
  `creationdate` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idclient` (`idclient`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `account`
--

INSERT INTO `account` (`id`, `idclient`, `accountname`, `rib`, `balance`, `creationdate`) VALUES
(1, 1, 'Compte cheque particulier', '731.00.01.555.55.99999.12', 2000, '2015-03-16 00:00:00'),
(2, 2, 'Compte cheque particulier', '731.00.01.555.55.99999.15', 2000, '2017-08-25 00:00:00'),
(3, 3, 'Compte cheque particulier', '731.00.01.555.55.99995.01', 3900, '2017-08-25 00:00:00'),
(4, 4, 'Compte Entreprise ', '731.00.01.555.55.00001.01', 52800, '2005-08-25 00:00:00'),
(5, 5, 'Compte Entreprise ', '731.00.01.555.55.00001.02', 15800, '2000-08-25 00:00:00'),
(6, 6, 'Compte Entreprise ', '731.00.01.555.55.00001.03', 35200, '2015-08-25 00:00:00'),
(7, 7, 'Compte Entreprise ', '731.00.01.555.55.00001.03', 250000, '2015-08-25 00:00:00'),
(8, 8, 'Compte Entreprise ', '731.00.01.555.55.00001.33', 200000, '2015-08-25 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `card`
--

DROP TABLE IF EXISTS `card`;
CREATE TABLE IF NOT EXISTS `card` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idaccount` int NOT NULL,
  `cardnumber` varchar(30) NOT NULL,
  `finishdate` date NOT NULL,
  `ccv` int NOT NULL,
  `type` int NOT NULL,
  `issuspended` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `type` (`type`),
  KEY `idaccount` (`idaccount`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `card`
--

INSERT INTO `card` (`id`, `idaccount`, `cardnumber`, `finishdate`, `ccv`, `type`, `issuspended`) VALUES
(1, 1, '1111 2222 3333 4444', '2025-03-12', 0, 7, 0),
(2, 1, '5555 6666 7777 8888', '2025-03-12', 999, 4, 1),
(3, 2, '5555 2222 3333 8888', '2024-03-04', 0, 5, 0);

-- --------------------------------------------------------

--
-- Structure de la table `cardtype`
--

DROP TABLE IF EXISTS `cardtype`;
CREATE TABLE IF NOT EXISTS `cardtype` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(55) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cardtype`
--

INSERT INTO `cardtype` (`id`, `name`) VALUES
(1, 'JEUNE CAMPUS'),
(2, 'AZUR'),
(3, 'OPALE'),
(4, 'EPAY'),
(5, 'VOYAGE'),
(6, 'VISA PLATINUM'),
(7, 'VISA GOLD');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(55) NOT NULL,
  `lname` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `birthdate` datetime NOT NULL,
  `joiningdate` datetime NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `fname`, `lname`, `email`, `adresse`, `phone`, `birthdate`, `joiningdate`, `username`, `password`) VALUES
(1, 'Hatim', 'El wardi', 'Hatimwardi0@gmail.com', '663 hay essalam Bouznika', '06060606', '1999-10-23 00:00:00', '2015-03-31 00:00:00', 'Hatim_elwardi', 'Hatim123'),
(4, 'MAROC TELECOM', 'SA', 'IAM@gmail.com', '------------', '072355555', '1996-03-22 00:00:00', '0200-08-23 00:00:00', '000000', 'IAM@1'),
(5, 'REDAL', 'SA', 'redal@gmail.com', '------------', '0537908999', '1998-12-22 00:00:00', '2000-08-23 00:00:00', '50505', 'redal@23'),
(6, 'AUTOROUTE DE MAROC', '', 'adm@gmail.com', '------------', '0537908999', '1998-12-22 00:00:00', '2015-08-23 00:00:00', '30030', 'adm@adm'),
(7, 'DIRECTION GENERAL DES IMPOTS', '', 'dgi@gmail.com', '------------', '0537908999', '1998-12-22 00:00:00', '2015-08-23 00:00:00', '59578', 'dgi@2005'),
(8, 'TRESORERIE GENERALE DU ROYAUME', '', 'tgr@gmail.com', '------------', '0537908999', '1998-12-22 00:00:00', '2010-08-23 00:00:00', '30030', 'tgr@@123');

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

DROP TABLE IF EXISTS `facture`;
CREATE TABLE IF NOT EXISTS `facture` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nomFacture` varchar(55) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `facture`
--

INSERT INTO `facture` (`id`, `nomFacture`) VALUES
(1, 'IAM'),
(2, 'REDAL'),
(3, 'JAWAZ'),
(4, 'DIRECTION GENERAL DES IMPOTS'),
(5, 'TRESORERIE GENERALE DU ROYAUME');

-- --------------------------------------------------------

--
-- Structure de la table `logarchive`
--

DROP TABLE IF EXISTS `logarchive`;
CREATE TABLE IF NOT EXISTS `logarchive` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idclient` int NOT NULL,
  `logdate` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idclient` (`idclient`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `logarchive`
--

INSERT INTO `logarchive` (`id`, `idclient`, `logdate`) VALUES
(1, 1, '2021-03-09 12:52:00'),
(2, 1, '2021-03-02 15:30:00'),
(3, 1, '2021-03-10 21:21:00'),
(4, 1, '2021-03-04 04:35:00'),
(5, 1, '2021-03-12 12:52:00'),
(6, 2, '2021-03-12 12:30:00');

-- --------------------------------------------------------

--
-- Structure de la table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idsender` int NOT NULL,
  `idreciver` int NOT NULL,
  `nomtransaction` varchar(100) NOT NULL,
  `amount` double NOT NULL,
  `datetransaction` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idsender` (`idsender`),
  KEY `idreciver` (`idreciver`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `transaction`
--

INSERT INTO `transaction` (`id`, `idsender`, `idreciver`, `nomtransaction`, `amount`, `datetransaction`) VALUES
(1, 1, 2, 'Virment a partir de ...', 300, '2021-03-10'),
(2, 2, 1, 'v....', 500, '2021-03-03'),
(3, 3, 1, 'v....', 1000, '2021-03-03'),
(4, 2, 3, 'EFACTURE IAM', 550, '2021-03-17'),
(21, 3, 1, 'Virment a partir de ...', 300, '2021-03-10'),
(7, 3, 1, 'Virment ...', 1200, '2021-03-01'),
(26, 1, 4, 'Paiment Fac IAM', 1300, '2021-03-12'),
(25, 1, 5, 'Paiment Fac REDAL', 300, '2021-03-12'),
(24, 1, 4, 'Paiment Fac IAM', 200, '2021-03-12'),
(12, 1, 2, 'Virment test', 500, '2021-03-10'),
(22, 1, 2, 'Virment test', 300, '2021-03-12'),
(17, 1, 4, 'Paiment Fac IAM', 250, '2021-03-10'),
(18, 1, 4, 'Paiment Fac IAM', 550, '2021-03-10'),
(23, 1, 2, 'Virment test', 200, '2021-03-12'),
(20, 1, 6, 'Recharge abonment jawaz', 200, '2021-03-11'),
(27, 2, 1, 'Virment test', 2500, '2021-03-12'),
(28, 1, 2, 'Virment test', 500, '2021-03-13'),
(29, 2, 4, 'Paiment Fac IAM', 500, '2021-03-13');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
