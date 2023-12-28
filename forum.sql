-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 28 déc. 2023 à 11:24
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
-- Structure de la table `account`
--

CREATE TABLE `account` (
  `id` text NOT NULL,
  `name` text NOT NULL,
  `password` text NOT NULL,
  `comment` text NOT NULL,
  `avatar` text NOT NULL,
  `contacts` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `forum_message`
--

CREATE TABLE `forum_message` (
  `id_message` int(11) NOT NULL,
  `sujet` varchar(255) NOT NULL,
  `utilisateur` int(11) NOT NULL,
  `timestamp_message` timestamp NOT NULL,
  `message` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `forum_message`
--

INSERT INTO `forum_message` (`id_message`, `sujet`, `utilisateur`, `timestamp_message`, `message`) VALUES
(1, 'test_Fonctionnement', 3, '2023-12-25 16:34:23', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo molestiae ea a illum laudantium consequatur quos, ad itaque nesciunt ipsum saepe nam quam porro qui quia blanditiis tempora pariatur minus.'),
(2, 'test_Fonctionnement', 3, '2023-12-25 16:37:42', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Perferendis veritatis quae ipsum nulla hic maiores ut, delectus obcaecati modi velit illum, fugit itaque cupiditate beatae rerum aut fuga. Facilis, est!\r\n'),
(3, 'test_Fonctionnement', 2, '2023-12-25 16:37:42', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Perferendis veritatis quae ipsum nulla hic maiores ut, delectus obcaecati modi velit illum, fugit itaque cupiditate beatae rerum aut fuga. Facilis, est!\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `forum_sujet`
--

CREATE TABLE `forum_sujet` (
  `id_sujet` int(11) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `nom_sujet` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `forum_sujet`
--

INSERT INTO `forum_sujet` (`id_sujet`, `categorie`, `nom_sujet`) VALUES
(1, 'test', 'test_Fonctionnement');

-- --------------------------------------------------------

--
-- Structure de la table `forum_utilisateur`
--

CREATE TABLE `forum_utilisateur` (
  `ID_utilisateur` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `date_naissance` date NOT NULL,
  `date_inscription` date NOT NULL,
  `blocage` timestamp NULL DEFAULT NULL,
  `niveau_autaurisation` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `forum_utilisateur`
--

INSERT INTO `forum_utilisateur` (`ID_utilisateur`, `pseudo`, `mot_de_passe`, `date_naissance`, `date_inscription`, `blocage`, `niveau_autaurisation`) VALUES
(1, 'Admin', 'Admin', '1985-08-14', '2023-12-23', NULL, '*'),
(2, 'Jean', 'Jean', '2004-09-24', '2023-12-08', NULL, '1'),
(3, 'Jacques', 'Jacques', '2004-09-24', '2023-12-15', NULL, '1');

-- --------------------------------------------------------

--
-- Structure de la table `friend_requests`
--

CREATE TABLE `friend_requests` (
  `requesterID` text NOT NULL,
  `targetID` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `forum_message`
--
ALTER TABLE `forum_message`
  ADD PRIMARY KEY (`id_message`);

--
-- Index pour la table `forum_sujet`
--
ALTER TABLE `forum_sujet`
  ADD PRIMARY KEY (`id_sujet`);

--
-- Index pour la table `forum_utilisateur`
--
ALTER TABLE `forum_utilisateur`
  ADD PRIMARY KEY (`ID_utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `forum_message`
--
ALTER TABLE `forum_message`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `forum_sujet`
--
ALTER TABLE `forum_sujet`
  MODIFY `id_sujet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `forum_utilisateur`
--
ALTER TABLE `forum_utilisateur`
  MODIFY `ID_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
