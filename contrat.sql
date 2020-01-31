-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 31 jan. 2020 à 15:42
-- Version du serveur :  10.1.38-MariaDB
-- Version de PHP :  7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `contrat-a-tout`
--

-- --------------------------------------------------------

--
-- Structure de la table `contrat`
--

CREATE TABLE `contrat` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `client` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `technologie` text NOT NULL,
  `debut` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contrat`
--

INSERT INTO `contrat` (`id`, `titre`, `client`, `description`, `technologie`, `debut`) VALUES
(1, 'Embellissement d\'un site XOOPS', ' Mentor Québec', 'Le site de rencontre mentor-mentoré doit être redécoré pour améliorer le taux d\'inscription au projet pédagogique.', 'PHP, CSS, XOOPS, AJAX', 'Février 2020'),
(2, 'Installation d\'un site WordPress', 'Cégep de Matane', 'Le blog servira à référencer le Cégep à une plus grande amplitude.\r\n', 'WordPress, mod_rewrite', ''),
(3, 'Programmation d\'une APP sur les océans', 'Centre de recherche sur les biotechnologies marines', 'L\'app des océans présentera une vue des températures sur toute la terre et pourra \'voyager dans le temps\'.  \r\n\r\n', 'PhoneGap', '15 mars 2020');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `contrat`
--
ALTER TABLE `contrat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `contrat`
--
ALTER TABLE `contrat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
