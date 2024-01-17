-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 04 Novembre 2016 à 12:45
-- Version du serveur :  5.6.25
-- Version de PHP :  5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `movies`
--

-- --------------------------------------------------------

--
-- Structure de la table `directors`
--

CREATE TABLE IF NOT EXISTS `directors` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `directors`
--

INSERT INTO `directors` (`id`, `firstname`, `lastname`) VALUES
(1, 'Lana et Andy', 'Wachowski'),
(2, 'Georges', 'Lucas');

-- --------------------------------------------------------

--
-- Structure de la table `movies`
--

CREATE TABLE IF NOT EXISTS `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `length` int(3) NOT NULL,
  `description` text NOT NULL,
  `rating` float DEFAULT NULL,
  `id_director` int(11) NOT NULL,
  `id_type` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `movies`
--

INSERT INTO `movies` (`id`, `title`, `length`, `description`, `rating`, `id_director`, `id_type`) VALUES
(1, 'Star Wars', 120, 'Star Wars (à l''origine nommée sous son titre français, La Guerre des étoiles) est un univers fantastique et de science-fiction créé par George Lucas en 1977. D''abord conçue comme une trilogie cinématographique sortie entre 1977 et 1983, la saga s''est ensuite élargie de trois nouveaux films sortis entre 1999 et 2005 racontant des événements antérieurs à la première trilogie.', 4, 1, 2),
(2, 'Matrix', 120, 'Matrix (en France) ou La Matrice (au Québec et au Nouveau-Brunswick) (The Matrix) est un film australo-américain de science-fiction1, un « cyberfilm2», réalisé par Lana et Andy Wachowski et sorti en 1999.  Matrix est le premier volet de la trilogie Matrix qui se poursuivra avec les films Matrix Reloaded et Matrix Revolutions, sortis en 2003. Il est considéré comme l’un des films du genre le plus important de son époque3,4.', 5, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `types`
--

CREATE TABLE IF NOT EXISTS `types` (
  `id` int(11) NOT NULL,
  `label` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `types`
--

INSERT INTO `types` (`id`, `label`, `description`) VALUES
(1, 'Aventure', 'Les films d''aventure, un genre à part'),
(2, 'Science-Fiction', 'Se projeter dans l''avenir pour mieux penser le présent');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `directors`
--
ALTER TABLE `directors`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `directors`
--
ALTER TABLE `directors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
