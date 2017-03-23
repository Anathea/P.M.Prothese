-- phpMyAdmin SQL Dump
-- version 4.6.4deb1
-- https://www.phpmyadmin.net/
--
-- Client :  localhost
-- Généré le :  Mer 22 Mars 2017 à 00:38
-- Version du serveur :  10.0.29-MariaDB-0ubuntu0.16.10.1
-- Version de PHP :  7.0.15-0ubuntu0.16.10.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `PMProthese`
--

-- --------------------------------------------------------

--
-- Structure de la table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `nom` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secu` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `allergie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caracteristique` int(1) NOT NULL DEFAULT '1',
  `detachable` int(1) NOT NULL DEFAULT '0',
  `longueur` int(11) NOT NULL,
  `largeur` int(11) NOT NULL,
  `mdp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `patients`
--

INSERT INTO `patients` (`id`, `nom`, `prenom`, `secu`, `allergie`, `type`, `caracteristique`, `detachable`, `longueur`, `largeur`, `mdp`) VALUES
(1, 'Tomy', 'Annah', '2012345678911', '', 'myoéléctrique', 1, 0, 42, 15, ''),
(2, 'Patchocolat', 'Abrah', '1012345678910', 'Silicone', 'fonctionnelle', 1, 1, 50, 23, ''),
(3, 'Nebra', 'Matthieu', '1012345678911', '', 'fonctionnelle', 2, 0, 48, 18, ''),
(4, 'Partou', 'Djamal', '1012345678912', 'Cuivre', 'myoéléctrique', 0, 0, 51, 28, ''),
(5, 'Mainpleur', 'Olga', '2012345678920', '', 'myoéléctrique', 2, 1, 40, 16, '');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
