-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 12 avr. 2023 à 07:17
-- Version du serveur : 8.0.27
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `snakes_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `snakes`
--

CREATE TABLE `snakes` (
  `snake_id` int NOT NULL,
  `snake_name` varchar(15) NOT NULL DEFAULT 'SssSssSSssSSs',
  `snake_weight` int NOT NULL DEFAULT '1',
  `snake_lifespan` int NOT NULL COMMENT 'in months',
  `snake_H_DoB` date NOT NULL,
  `snake_specie` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `snake_gender` enum('Male','Female') CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `snake_reproduced` tinyint NOT NULL,
  `snake_dad` varchar(15) DEFAULT 'Papa',
  `snake_mom` varchar(15) DEFAULT 'Maman',
  `snake_dead` tinyint NOT NULL DEFAULT '0' COMMENT '0 = alive, 1 = dead'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `user_pseudo` varchar(320) NOT NULL,
  `user_mail` varchar(320) NOT NULL,
  `user_password` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `user_pseudo`, `user_mail`, `user_password`) VALUES
(2, 'admin', 'admin@here.com', 'admin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `snakes`
--
ALTER TABLE `snakes`
  ADD PRIMARY KEY (`snake_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `snakes`
--
ALTER TABLE `snakes`
  MODIFY `snake_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
