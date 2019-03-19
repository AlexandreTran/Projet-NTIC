-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  lun. 18 mars 2019 à 15:13
-- Version du serveur :  10.1.35-MariaDB
-- Version de PHP :  7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `NTIC`
--

-- --------------------------------------------------------

--
-- Structure de la table `Coeur`
--

CREATE TABLE `Coeur` (
  `Id_Coeur` int(255) NOT NULL,
  `Id_User` int(255) NOT NULL,
  `Id_Post` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `Coeur`
--

INSERT INTO `Coeur` (`Id_Coeur`, `Id_User`, `Id_Post`) VALUES
(1, 1, 9),
(2, 1, 8);

-- --------------------------------------------------------

--
-- Structure de la table `Moderateur`
--

CREATE TABLE `Moderateur` (
  `Id_Moderateur` int(11) NOT NULL,
  `Username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `MDP` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Post`
--

CREATE TABLE `Post` (
  `Id_Post` int(255) NOT NULL,
  `Titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Id_Utilisateur` int(255) NOT NULL,
  `Coeur` int(255) DEFAULT NULL,
  `Detail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Theme` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Tags` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Nb_commentaire` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `Post`
--

INSERT INTO `Post` (`Id_Post`, `Titre`, `Id_Utilisateur`, `Coeur`, `Detail`, `Theme`, `Tags`, `Nb_commentaire`) VALUES
(1, 'Quelqu\'un à trouvé x+2 pour la réponse du TP2 ex2 de math ?', 1, 0, NULL, 'Mathématique', NULL, 0),
(6, 'Commeent on fait pour faire ca', 1, 0, 'Détail du post(facultatif)', 'Question Global', NULL, 0),
(7, 'fdsfdsf', 1, 0, 'Détail du post(facultatif)', 'Question Global', NULL, 0),
(8, 'fdsfds', 1, 0, 'Détail du post(facultatif)', 'Question Global', NULL, 0),
(9, 'ça va mek ?', 1, 0, '', 'Question Global', NULL, 0),
(10, 'Abdul pue', 1, 0, 'Détail du post(facultatif)', 'Question Global', NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `Theme`
--

CREATE TABLE `Theme` (
  `Id_Theme` int(11) NOT NULL,
  `Intitule` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateur`
--

CREATE TABLE `Utilisateur` (
  `ID` int(11) NOT NULL,
  `Nom_Utilisateur` varchar(24) COLLATE utf8_unicode_ci NOT NULL,
  `MDP` varchar(24) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(24) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `Utilisateur`
--

INSERT INTO `Utilisateur` (`ID`, `Nom_Utilisateur`, `MDP`, `Email`) VALUES
(1, 'Alex', 'test', 'Alexandre.Tran@etu.unige'),
(2, 'fdsfds', 'fdsfsd', 'fdsfds@fdsf.cds');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Coeur`
--
ALTER TABLE `Coeur`
  ADD PRIMARY KEY (`Id_Coeur`),
  ADD KEY `Id_User` (`Id_User`),
  ADD KEY `Id_Post` (`Id_Post`);

--
-- Index pour la table `Moderateur`
--
ALTER TABLE `Moderateur`
  ADD PRIMARY KEY (`Id_Moderateur`);

--
-- Index pour la table `Post`
--
ALTER TABLE `Post`
  ADD PRIMARY KEY (`Id_Post`),
  ADD KEY `Id_Utilisateur` (`Id_Utilisateur`);

--
-- Index pour la table `Theme`
--
ALTER TABLE `Theme`
  ADD PRIMARY KEY (`Id_Theme`);

--
-- Index pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Coeur`
--
ALTER TABLE `Coeur`
  MODIFY `Id_Coeur` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `Post`
--
ALTER TABLE `Post`
  MODIFY `Id_Post` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Coeur`
--
ALTER TABLE `Coeur`
  ADD CONSTRAINT `Coeur_ibfk_1` FOREIGN KEY (`Id_User`) REFERENCES `Utilisateur` (`ID`),
  ADD CONSTRAINT `Coeur_ibfk_2` FOREIGN KEY (`Id_Post`) REFERENCES `Post` (`Id_Post`);

--
-- Contraintes pour la table `Post`
--
ALTER TABLE `Post`
  ADD CONSTRAINT `Post_ibfk_1` FOREIGN KEY (`Id_Utilisateur`) REFERENCES `Utilisateur` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
