-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 08 jan. 2024 à 17:14
-- Version du serveur : 10.10.2-MariaDB
-- Version de PHP : 8.0.26

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

CREATE TABLE `forum_contact` (
  `ID` int(11) NOT NULL,
  `ID_utilisateur` int(11) NOT NULL,
  `ID_contact` int(11) NOT NULL,
  `blocquage` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `forum_contact`
--

INSERT INTO `forum_contact` (`ID`, `ID_utilisateur`, `ID_contact`, `blocquage`) VALUES
(1, 2, 3, NULL),
(2, 3, 2, NULL),
(3, 2, 4, NULL),
(4, 4, 2, NULL),
(5, 2, 5, NULL),
(6, 5, 2, NULL),
(7, 2, 6, NULL),
(8, 6, 2, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `forum_message`
--

CREATE TABLE `forum_message` (
  `id_message` int(11) NOT NULL,
  `ID_emetteur` varchar(255) NOT NULL,
  `ID_receveur` varchar(255) NOT NULL,
  `timestamp_message` varchar(255) NOT NULL,
  `messageposte` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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

CREATE TABLE `forum_utilisateur` (
  `ID_utilisateur` int(11) NOT NULL,
  `statut` varchar(255) DEFAULT NULL,
  `langue` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `mail` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `humeur` varchar(255) DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `date_inscription` date DEFAULT NULL,
  `blocage` timestamp NULL DEFAULT NULL,
  `niveau_autaurisation` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `forum_utilisateur`
--

INSERT INTO `forum_utilisateur` (`ID_utilisateur`, `statut`, `langue`, `pseudo`, `avatar`, `mail`, `mot_de_passe`, `humeur`, `date_naissance`, `date_inscription`, `blocage`, `niveau_autaurisation`) VALUES
(1, NULL, 'fr', 'Admin', NULL, 'test@test.com', 'Admin', NULL, '1985-08-14', '2023-12-23', NULL, '*'),
(2, 'EnLigne', 'defaut', 'Jean', 'rocket', 'test@test.com', 'Jean', 'j\'ai demandé à la lune', '2004-09-24', '2023-12-08', NULL, '1'),
(3, NULL, 'en', 'Jacques', 'dog', 'test@test.com', 'Jacques', 'je mord', '2004-09-24', '2023-12-15', NULL, '1'),
(4, NULL, 'fr', 'Pierre', 'moto', 'test@test.com', 'Pierre', '... qui roule', '2004-09-24', '2023-12-15', NULL, '1'),
(5, NULL, 'fr', 'Delphine', 'duck', 'test@test.com', 'Delphine', 'Mes chats, ma vie.', '2004-09-24', '2023-12-15', NULL, '1'),
(6, NULL, 'fr', 'Michael', 'flower', 'test@test.com', 'Michael', 'Proffesseur Tournesol', '2004-09-24', '2023-12-15', NULL, '1'),
(7, NULL, 'fr', 'Tiphaine', NULL, 'test@test.com', 'Tiphaine', NULL, '2004-09-24', '2023-12-15', NULL, '1'),
(8, NULL, 'fr', 'Alexandre', NULL, 'test@test.com', 'Alexandre', NULL, '2004-09-24', '2023-12-15', NULL, '1'),
(9, NULL, 'fr', 'Nicolas', NULL, 'test@test.com', 'Nicolas', NULL, '2004-09-24', '2023-12-15', NULL, '1'),
(10, NULL, 'fr', 'Francois', NULL, 'test@test.com', 'Francois', NULL, '2004-09-24', '2023-12-15', NULL, '1'),
(11, NULL, 'fr', 'Danielle', NULL, 'test@test.com', 'Danielle', NULL, '2004-09-24', '2023-12-15', NULL, '1');

-- --------------------------------------------------------

--
-- Structure de la table `iconesconnexionsecurite`
--

CREATE TABLE `iconesconnexionsecurite` (
  `ID` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `nomFichier` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `forum_contact`
--
ALTER TABLE `forum_contact`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `forum_message`
--
ALTER TABLE `forum_message`
  ADD PRIMARY KEY (`id_message`);

--
-- Index pour la table `forum_utilisateur`
--
ALTER TABLE `forum_utilisateur`
  ADD PRIMARY KEY (`ID_utilisateur`);

--
-- Index pour la table `iconesconnexionsecurite`
--
ALTER TABLE `iconesconnexionsecurite`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `forum_contact`
--
ALTER TABLE `forum_contact`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `forum_message`
--
ALTER TABLE `forum_message`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `forum_utilisateur`
--
ALTER TABLE `forum_utilisateur`
  MODIFY `ID_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `iconesconnexionsecurite`
--
ALTER TABLE `iconesconnexionsecurite`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
