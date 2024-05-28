-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 23 avr. 2024 à 08:26
-- Version du serveur : 11.2.2-MariaDB
-- Version de PHP : 8.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `forum`
--

-- --------------------------------------------------------

--
-- Structure de la table `forum_contact`
--

DROP TABLE IF EXISTS `forum_contact`;
CREATE TABLE IF NOT EXISTS `forum_contact` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_utilisateur` int(11) NOT NULL,
  `ID_contact` int(11) NOT NULL,
  `categorie` varchar(250) DEFAULT NULL,
  `blocquage` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `forum_contact`
--

INSERT INTO `forum_contact` (`ID`, `ID_utilisateur`, `ID_contact`, `categorie`, `blocquage`) VALUES
(1, 2, 3, 'favoris', NULL),
(2, 3, 2, 'normal', NULL),
(3, 2, 4, 'favoris', NULL),
(4, 4, 2, 'normal', NULL),
(5, 2, 5, 'normal', NULL),
(6, 5, 2, 'normal', NULL),
(7, 2, 6, 'normal', NULL),
(8, 6, 2, 'normal', NULL),
(9, 4, 5, 'normal', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `forum_invitation`
--

DROP TABLE IF EXISTS `forum_invitation`;
CREATE TABLE IF NOT EXISTS `forum_invitation` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_utilisateur` varchar(25) NOT NULL,
  `ID_destinataire` varchar(25) NOT NULL,
  `timestamp_invitation` varchar(255) NOT NULL,
  `messageDInvitation` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `forum_invitation`
--

INSERT INTO `forum_invitation` (`ID`, `ID_utilisateur`, `ID_destinataire`, `timestamp_invitation`, `messageDInvitation`) VALUES
(1, '4', '6', '1710958455681', 'rqdgterdsgresdjytgfjdsyhredfjtxyfg'),
(2, '9', '4', '1711025100644', 'rgdrfehgbrsfvdfbhdtgfhredfhbygtfbhnrtgfd'),
(3, '4', '7', '1711296265916', 'esgdfhbdtdfgvfrfdhbgtgfhbtdfgvdrfhbgfnghf'),
(11, '4', '8', '1711353342941', 'tehthrgtrhtrgfhbtdghdrgredgredgregreg');

-- --------------------------------------------------------

--
-- Structure de la table `forum_utilisateur`
--

DROP TABLE IF EXISTS `forum_utilisateur`;
CREATE TABLE IF NOT EXISTS `forum_utilisateur` (
  `ID_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `statut` varchar(255) DEFAULT NULL,
  `langue` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `mail` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `humeur` varchar(255) DEFAULT NULL,
  `categories_perso` text DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `date_inscription` date DEFAULT NULL,
  `niveau_autaurisation` varchar(10) DEFAULT NULL,
  `tokenRecuperation` varchar(255) DEFAULT NULL,
  `validiteToken` varchar(255) DEFAULT NULL,
  `codeValidation` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `forum_utilisateur`
--

INSERT INTO `forum_utilisateur` (`ID_utilisateur`, `statut`, `langue`, `pseudo`, `avatar`, `mail`, `mot_de_passe`, `humeur`, `categories_perso`, `date_naissance`, `date_inscription`, `niveau_autaurisation`, `tokenRecuperation`, `validiteToken`, `codeValidation`) VALUES
(2, 'EnLigne', 'fr', 'Jean', 'rocket', 'test@test.com', '56ec4fee9f20de343a99f2caa8793dadb6c8fbeebeed0f124e397d660112245c', 'j\'ai demandé à la lune', '[\"favoris\", \"normal\",\"travail\", \"sport\", \"ecole\", \"utile\", \"travaux\"]', '2004-09-24', '2023-12-08', '3', 'ae315e0cdf855e04d8f04411723423c268627851c6c7ecc5e8b325d4a4bf3c03', '1709500228119', 'lP3lQcVA'),
(3, 'EnLigne', 'fr', 'Jacques', 'dog', 'test@test.com', '79675d2e12b59f32f5331f2887a96e217cd7ac261a157a6e15e8a461144ec521', 'je mord', '[\"favoris\", \"normal\",\"travail\", \"sport\", \"école\", \"utile\", \"travaux\"]', '2004-09-24', '2023-12-15', '2', '888d3383399226fb8c677f2a656220779288bcf605c0adbc1adc7a78892d809d', '2024-02-27 09:05:58', 'eE737HNd'),
(4, 'EnLigne', 'fr', 'Pierre', 'moto', 'test@test.com', 'fd9c6c387debc9fe80435f5cb089aad87967b38bcffdad1e566a36271cf3cfec', '... qui roule', '[\"favoris\", \"normal\",\"travail\", \"sport\", \"école\", \"utile\", \"travaux\"]', '2004-09-24', '2023-12-15', '3', NULL, NULL, NULL),
(5, 'hors_ligne', 'fr', 'Delphine', 'duck', 'test@test.com', '3b6fd54a74af1a7deffa728b6e3e508337b0e46b82d41527b20d32491dd0cf6a', 'Mes chats, ma vie.', '[\"favoris\", \"normal\",\"travail\", \"sport\", \"école\", \"utile\", \"travaux\"]', '2004-09-24', '2023-12-15', '3', NULL, NULL, NULL),
(6, 'EnLigne', 'fr', 'Michael', 'flower', 'test@test.com', 'f089eaef57aba315bc0e1455985c0c8e40c247f073ce1f4c5a1f8ffde8773176', 'Proffesseur Tournesol', '[\"favoris\", \"normal\",\"travail\", \"sport\", \"école\", \"utile\", \"travaux\"]', '2004-09-24', '2023-12-15', '1', NULL, NULL, NULL),
(7, 'EnLigne', 'fr', 'Tiphaine', NULL, 'test@test.com', '02ee964c39b3142b0b91dc8b2980b9e7356b7d0bc682f5cc431dd41d896ccd8f', NULL, '[\"favoris\", \"normal\",\"travail\", \"sport\", \"école\", \"utile\", \"travaux\"]', '2004-09-24', '2023-12-15', '3', NULL, NULL, NULL),
(8, 'EnLigne', 'fr', 'Alexandre', NULL, 'test@test.com', '2366911dd1fb1606861a075cdb826de33ad3a2e84f7060a59d327e80f3a3c170', NULL, '[\"favoris\", \"normal\",\"travail\", \"sport\", \"école\", \"utile\", \"travaux\"]', '2004-09-24', '2023-12-15', '3', NULL, NULL, NULL),
(9, 'EnLigne', 'fr', 'Nicolas', NULL, 'test@test.com', '35298781dc6efb3dbe57241319cda4e5e1ea4236e0692bc1fa26f9ddd9b359ac', NULL, '[\"favoris\", \"normal\",\"travail\", \"sport\", \"école\", \"utile\", \"travaux\"]', '2004-09-24', '2023-12-15', '3', NULL, NULL, NULL),
(10, 'EnLigne', 'fr', 'Francois', NULL, 'test@test.com', 'a534c46b213867e511d742f2296f50501be81fc2c2976533673c8fabe8c5d21f', NULL, '[\"favoris\", \"normal\",\"travail\", \"sport\", \"école\", \"utile\", \"travaux\"]', '2004-09-24', '2023-12-15', '3', NULL, NULL, NULL),
(11, 'EnLigne', 'fr', 'Danielle', NULL, 'test@test.com', '06194305c1fe933e1d60b08657a61f7d2c74adf8f47c340fafc96bb10f8591f8', NULL, '[\"favoris\", \"normal\",\"travail\", \"sport\", \"école\", \"utile\", \"travaux\"]', '2004-09-24', '2023-12-15', '3', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `iconesconnexionsecurite`
--

DROP TABLE IF EXISTS `iconesconnexionsecurite`;
CREATE TABLE IF NOT EXISTS `iconesconnexionsecurite` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `nomFichier` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `iconesconnexionsecurite`
--

INSERT INTO `iconesconnexionsecurite` (`ID`, `nom`, `nomFichier`) VALUES
(1, 'voiture', 'car'),
(2, 'chat', 'cat'),
(3, 'ordinateur', 'computer'),
(4, 'chien', 'dog'),
(5, 'stylo', 'pen'),
(6, 'ciseaux', 'scissors'),
(7, 'camion', 'truck');

-- --------------------------------------------------------

--
-- Structure de la table `journal_tokenutilise`
--

DROP TABLE IF EXISTS `journal_tokenutilise`;
CREATE TABLE IF NOT EXISTS `journal_tokenutilise` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `utilisateur` varchar(255) NOT NULL,
  `refDemande` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `journal_tokenutilise`
--

INSERT INTO `journal_tokenutilise` (`ID`, `utilisateur`, `refDemande`) VALUES
(1, 'd4735e3a265e16eee03f59718b9b5d03019c07d8b6c51f90da3a666eec13ab35', '14b7eecf6a27bdeb3749ba4dde6d9ff7232cdbd181cee76019d7055c5f4399bf'),
(2, 'd4735e3a265e16eee03f59718b9b5d03019c07d8b6c51f90da3a666eec13ab35', 'a20fc5bb913d28d601867d103e9e684f84cc79e7dccb0f955c1b40f19684f8ab'),
(3, 'd4735e3a265e16eee03f59718b9b5d03019c07d8b6c51f90da3a666eec13ab35', 'ec1d7db5620185a860063c108d19a11ab5cb77bc4b7bcb695a807e15bc209e7b'),
(4, 'd4735e3a265e16eee03f59718b9b5d03019c07d8b6c51f90da3a666eec13ab35', '0fa74a42b8f811d4d090495d3be90ae6ac5426b1a2581c6fa0f52096715a80f4'),
(5, 'd4735e3a265e16eee03f59718b9b5d03019c07d8b6c51f90da3a666eec13ab35', 'd9265e99bdf3bd2644e4d6610d1676d6626f04a46cc8e6b2cb2b09f16801e4cb'),
(6, 'd4735e3a265e16eee03f59718b9b5d03019c07d8b6c51f90da3a666eec13ab35', 'fb73033acca5271cb4feefccf08244bd5f87c78764379774e14d2be60995f30f'),
(7, 'd4735e3a265e16eee03f59718b9b5d03019c07d8b6c51f90da3a666eec13ab35', '7946073aec3edd3849e5f7f3610264be06b0fba29508582e169c2dc928a9a3e4'),
(8, 'd4735e3a265e16eee03f59718b9b5d03019c07d8b6c51f90da3a666eec13ab35', 'b76240122c9d646dab719f4b607002f1561d33dc9746f51840b257c07b7d6f21'),
(9, 'd4735e3a265e16eee03f59718b9b5d03019c07d8b6c51f90da3a666eec13ab35', '0bc0b02ad3ffd592f1084a1423c9651e19b7bc4faa8fb473f19dff95e1c6b6d0'),
(10, 'd4735e3a265e16eee03f59718b9b5d03019c07d8b6c51f90da3a666eec13ab35', '460baac9551353d8918497ea3e8a1aaf3709ab70f21fcaac818b64a4ce0d44ef'),
(11, 'd4735e3a265e16eee03f59718b9b5d03019c07d8b6c51f90da3a666eec13ab35', '61bf89c9151ea71e46de08743c937b8519f23c27666bebacd42527e9b207c756'),
(12, 'd4735e3a265e16eee03f59718b9b5d03019c07d8b6c51f90da3a666eec13ab35', 'fc3c94407ebf36a6cfa63ed15d5f2645a0f6a6fdc70354010844182e2557b3fb'),
(13, 'd4735e3a265e16eee03f59718b9b5d03019c07d8b6c51f90da3a666eec13ab35', '6000df9beec24e23f29ef75380ae01986a40a4f13b207544c3a5b27a2ef4c000'),
(14, 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', '1f4ab8735f29fec0f0a56f0e4addb1e6680f897717ebd0b3a221bf61fe1b0c30'),
(15, 'd4735e3a265e16eee03f59718b9b5d03019c07d8b6c51f90da3a666eec13ab35', '3921527c9187ef64f9022671c8196e2a7bef6d2e01ca0d2e280132866755b8f4');

-- --------------------------------------------------------

--
-- Structure de la table `mouchard_avertissementsbloquage`
--

DROP TABLE IF EXISTS `mouchard_avertissementsbloquage`;
CREATE TABLE IF NOT EXISTS `mouchard_avertissementsbloquage` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `dossier` varchar(255) NOT NULL,
  `IP` varchar(255) DEFAULT NULL,
  `pseudo` varchar(255) DEFAULT NULL,
  `typeappareil` varchar(255) DEFAULT NULL,
  `timestamp_infraction` varchar(255) DEFAULT NULL,
  `navigateur` varchar(255) DEFAULT NULL,
  `blocage` int(11) DEFAULT NULL,
  `avertissement` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `repertoirebloquage`
--

DROP TABLE IF EXISTS `repertoirebloquage`;
CREATE TABLE IF NOT EXISTS `repertoirebloquage` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `dossier` varchar(255) NOT NULL,
  `IP` varchar(255) DEFAULT NULL,
  `pseudo` varchar(255) DEFAULT NULL,
  `actif` tinyint(1) DEFAULT NULL,
  `avertissement` tinyint(4) DEFAULT NULL,
  `niveau` varchar(10) DEFAULT NULL,
  `timestampblocage` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `repertoirebloquage`
--

INSERT INTO `repertoirebloquage` (`ID`, `dossier`, `IP`, `pseudo`, `actif`, `avertissement`, `niveau`, `timestampblocage`) VALUES
(1, '', '::1', '2', 0, 2, '0', '1709463680');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
