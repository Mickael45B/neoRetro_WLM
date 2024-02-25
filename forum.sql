-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 25 fév. 2024 à 19:17
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
  `blocquage` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
(8, 6, 2, 'normal', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `forum_message`
--

DROP TABLE IF EXISTS `forum_message`;
CREATE TABLE IF NOT EXISTS `forum_message` (
  `id_message` int(11) NOT NULL AUTO_INCREMENT,
  `ID_emetteur` varchar(255) NOT NULL,
  `ID_receveur` varchar(255) NOT NULL,
  `timestamp_message` varchar(255) NOT NULL,
  `messageposte` longtext NOT NULL,
  PRIMARY KEY (`id_message`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `forum_message`
--

INSERT INTO `forum_message` (`id_message`, `ID_emetteur`, `ID_receveur`, `timestamp_message`, `messageposte`) VALUES
(4, '2', '4', '1704659982273', 'coucou'),
(5, '2', '4', '1704659992641', 'coucou'),
(6, '2', '4', '1704661143870', 'je teste'),
(7, '2', '4', '1704663072727', 'ceci est un test pour voir si Ã§a marche');

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
  `blocage` timestamp NULL DEFAULT NULL,
  `niveau_autaurisation` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`ID_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `forum_utilisateur`
--

INSERT INTO `forum_utilisateur` (`ID_utilisateur`, `statut`, `langue`, `pseudo`, `avatar`, `mail`, `mot_de_passe`, `humeur`, `categories_perso`, `date_naissance`, `date_inscription`, `blocage`, `niveau_autaurisation`) VALUES
(1, NULL, 'fr', 'Admin', NULL, 'test@test.com', 'Admin', NULL, NULL, '1985-08-14', '2023-12-23', NULL, '*'),
(2, 'EnLigne', 'fr', 'Jean', 'rocket', 'test@test.com', 'Jean', 'j\'ai demandé à la lune', '[\"favoris\", \"normal\",\"travail\", \"sport\", \"ecole\", \"utile\", \"travaux\"]', '2004-09-24', '2023-12-08', NULL, '1'),
(3, 'EnLigne', 'en', 'Jacques', 'dog', 'test@test.com', 'Jacques', 'je mord', '[\"favoris\", \"normal\",\"travail\", \"sport\", \"école\", \"utile\", \"travaux\"]', '2004-09-24', '2023-12-15', NULL, '1'),
(4, 'EnLigne', 'fr', 'Pierre', 'moto', 'test@test.com', 'Pierre', '... qui roule', '[\"favoris\", \"normal\",\"travail\", \"sport\", \"école\", \"utile\", \"travaux\"]', '2004-09-24', '2023-12-15', NULL, '1'),
(5, 'hors_ligne', 'fr', 'Delphine', 'duck', 'test@test.com', 'Delphine', 'Mes chats, ma vie.', '[\"favoris\", \"normal\",\"travail\", \"sport\", \"école\", \"utile\", \"travaux\"]', '2004-09-24', '2023-12-15', NULL, '1'),
(6, 'EnLigne', 'fr', 'Michael', 'flower', 'test@test.com', 'Michael', 'Proffesseur Tournesol', '[\"favoris\", \"normal\",\"travail\", \"sport\", \"école\", \"utile\", \"travaux\"]', '2004-09-24', '2023-12-15', NULL, '1'),
(7, 'EnLigne', 'fr', 'Tiphaine', NULL, 'test@test.com', 'Tiphaine', NULL, '[\"favoris\", \"normal\",\"travail\", \"sport\", \"école\", \"utile\", \"travaux\"]', '2004-09-24', '2023-12-15', NULL, '1'),
(8, 'EnLigne', 'fr', 'Alexandre', NULL, 'test@test.com', 'Alexandre', NULL, '[\"favoris\", \"normal\",\"travail\", \"sport\", \"école\", \"utile\", \"travaux\"]', '2004-09-24', '2023-12-15', NULL, '1'),
(9, 'EnLigne', 'fr', 'Nicolas', NULL, 'test@test.com', 'Nicolas', NULL, '[\"favoris\", \"normal\",\"travail\", \"sport\", \"école\", \"utile\", \"travaux\"]', '2004-09-24', '2023-12-15', NULL, '1'),
(10, 'EnLigne', 'fr', 'Francois', NULL, 'test@test.com', 'Francois', NULL, '[\"favoris\", \"normal\",\"travail\", \"sport\", \"école\", \"utile\", \"travaux\"]', '2004-09-24', '2023-12-15', NULL, '1'),
(11, 'EnLigne', 'fr', 'Danielle', NULL, 'test@test.com', 'Danielle', NULL, '[\"favoris\", \"normal\",\"travail\", \"sport\", \"école\", \"utile\", \"travaux\"]', '2004-09-24', '2023-12-15', NULL, '1');

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
