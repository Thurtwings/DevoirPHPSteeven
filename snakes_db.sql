-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 06 fév. 2023 à 16:42
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

DROP TABLE IF EXISTS `snakes`;
CREATE TABLE IF NOT EXISTS `snakes` (
  `snake_id` int NOT NULL AUTO_INCREMENT,
  `snake_name` varchar(15) NOT NULL DEFAULT 'SssSssSSssSSs',
  `snake_weight` int NOT NULL DEFAULT '1',
  `snake_lifespan` int NOT NULL COMMENT 'in months',
  `snake_H_DoB` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `snake_specie` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `snake_gender` enum('Male','Female') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `snake_dad` varchar(15) DEFAULT NULL,
  `snake_mom` varchar(15) DEFAULT NULL,
  `snake_dead` tinyint NOT NULL DEFAULT '0' COMMENT '0 = alive, 1 = dead',
  PRIMARY KEY (`snake_id`)
) ENGINE=MyISAM AUTO_INCREMENT=241 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `snakes`
--

INSERT INTO `snakes` (`snake_id`, `snake_name`, `snake_weight`, `snake_lifespan`, `snake_H_DoB`, `snake_specie`, `snake_gender`, `snake_dad`, `snake_mom`, `snake_dead`) VALUES
(1, 'Adhiso', 41, 78, '2023-02-03 00:00:00', 'Serpent de mer', 'Female', '', '', 1),
(2, 'Yessish', 22, 16, '2023-02-03 00:00:00', 'Boa', 'Male', '', '', 0),
(3, 'Talicsie', 5, 90, '2023-02-03 00:00:00', 'Couleuvre', 'Male', '', '', 0),
(4, 'Aco', 40, 37, '2023-02-03 00:00:00', 'Mamba Noir', 'Male', '', '', 0),
(5, 'Erkuxzai', 34, 76, '2023-02-03 00:00:00', 'Serpent corail', 'Female', '', '', 0),
(6, 'Vrirmadmu', 8, 47, '2023-02-03 00:00:00', 'Python', 'Female', '', '', 0),
(7, 'Szaccolhai', 27, 29, '2023-02-03 00:00:00', 'Anaconda', 'Female', '', '', 0),
(8, 'Eksaa', 29, 54, '2023-02-03 00:00:00', 'Serpent vert', 'Male', '', '', 0),
(9, 'Movastha', 39, 10, '2023-02-03 00:00:00', 'Serpent à lunettes', 'Male', '', '', 0),
(10, 'Hoswatrala', 35, 5, '2023-02-03 00:00:00', 'Couleuvre', 'Male', '', '', 0),
(11, 'Iraazs', 10, 13, '2023-02-03 00:00:00', 'Serpent vert', 'Male', '', '', 0),
(12, 'Crudjuckaazs', 13, 75, '2023-02-03 00:00:00', 'Serpent à lunettes', 'Male', '', '', 0),
(13, 'Xaxsairral', 14, 71, '2023-02-03 00:00:00', 'Serpent corail', 'Male', '', '', 0),
(14, 'Iraazs', 1, 25, '2023-02-03 00:00:00', 'Serpent à lunettes', 'Male', '', '', 0),
(15, 'Movastha', 10, 88, '2023-02-03 00:00:00', 'Cobra', 'Female', '', '', 0),
(16, 'Nisat', 20, 22, '2023-02-03 00:00:00', 'Vipère', 'Female', '', '', 0),
(17, 'Adhiso', 13, 10, '2023-02-03 00:00:00', 'Vipère', 'Male', '', '', 0),
(18, 'Ladrarkattra', 32, 7, '2023-02-03 00:00:00', 'Boa', 'Female', '', '', 0),
(19, 'Ostibhat', 10, 63, '2023-02-03 00:00:00', 'Python', 'Female', '', '', 0),
(20, 'Erkuxzai', 41, 83, '2023-02-03 00:00:00', 'Serpent de mer', 'Female', '', '', 0),
(21, 'Kuscasasj', 16, 18, '2023-02-03 00:00:00', 'Serpent à lunettes', 'Male', '', '', 0),
(22, 'Eksaa', 45, 69, '2023-02-03 00:00:00', 'Anaconda', 'Male', '', '', 0),
(23, 'Tika', 33, 75, '2023-02-03 00:00:00', 'Serpent à lunettes', 'Female', '', '', 0),
(24, 'Kuscasasj', 4, 79, '2023-02-03 00:00:00', 'Couleuvre', 'Female', '', '', 0),
(25, 'Isashpat', 45, 6, '2023-02-03 00:00:00', 'Cobra', 'Male', '', '', 0),
(26, 'Ati', 34, 38, '2023-02-03 00:00:00', 'Mamba Noir', 'Female', '', '', 0),
(27, 'Crudjuckaazs', 40, 34, '2023-02-03 00:00:00', 'Python', 'Male', '', '', 0),
(28, 'Szaccolhai', 39, 48, '2023-02-03 00:00:00', 'Python', 'Male', '', '', 0),
(29, 'Kuscasasj', 4, 61, '2023-02-03 00:00:00', 'Serpent de mer', 'Male', '', '', 0),
(30, 'Kuscasasj', 17, 20, '2023-02-03 00:00:00', 'Serpent à lunettes', 'Male', '', '', 0),
(31, 'Yessish', 49, 79, '2023-02-03 00:00:00', 'Python', 'Male', '', '', 0),
(32, 'Aco', 13, 50, '2023-02-03 00:00:00', 'Boa', 'Male', '', '', 0),
(33, 'Ladrarkattra', 3, 24, '2023-02-03 00:00:00', 'Anaconda', 'Male', '', '', 0),
(34, 'Atahasha', 25, 49, '2023-02-03 00:00:00', 'Boa', 'Male', '', '', 0),
(35, 'Xaxsairral', 10, 54, '2023-02-03 00:00:00', 'Mamba Noir', 'Female', '', '', 0),
(36, 'Zarce', 5, 71, '2023-02-03 00:00:00', 'Serpent vert', 'Female', '', '', 0),
(37, 'Erkuxzai', 5, 43, '2023-02-03 00:00:00', 'Python', 'Male', '', '', 0),
(38, 'Odizhaash', 1, 41, '2023-02-03 00:00:00', 'Serpent corail', 'Male', '', '', 0),
(39, 'Hoswatrala', 38, 68, '2023-02-03 00:00:00', 'Serpent à sonnette', 'Male', '', '', 0),
(40, 'Khahirka', 19, 59, '2023-02-03 00:00:00', 'Python', 'Female', '', '', 0),
(41, 'Ladrarkattra', 35, 40, '2023-02-03 00:00:00', 'Serpent à lunettes', 'Female', '', '', 0),
(42, 'Ladrarkattra', 35, 41, '2023-02-03 00:00:00', 'Serpent corail', 'Male', '', '', 0),
(43, 'Ati', 39, 58, '2023-02-03 00:00:00', 'Serpent corail', 'Male', '', '', 0),
(44, 'Chiksha', 47, 9, '2023-02-03 00:00:00', 'Python', 'Female', '', '', 0),
(45, 'Xaxsairral', 42, 19, '2023-02-03 00:00:00', 'Boa', 'Female', '', '', 0),
(46, 'Chastha', 28, 18, '2023-02-03 00:00:00', 'Serpent vert', 'Male', '', '', 0),
(47, 'Iraazs', 17, 60, '2023-02-03 00:00:00', 'Boa', 'Male', '', '', 0),
(48, 'Sakitha', 22, 63, '2023-02-03 00:00:00', 'Cobra', 'Male', '', '', 0),
(49, 'Isashpat', 10, 43, '2023-02-03 00:00:00', 'Vipère', 'Female', '', '', 0),
(50, 'Aco', 7, 54, '2023-02-03 00:00:00', 'Serpent à lunettes', 'Male', '', '', 0),
(51, 'Xaxsairral', 15, 15, '2023-02-03 00:00:00', 'Boa', 'Male', '', '', 0),
(52, 'Vrirmadmu', 10, 56, '2023-02-03 00:00:00', 'Serpent de mer', 'Male', '', '', 0),
(53, 'Khivya', 49, 37, '2023-02-03 00:00:00', 'Cobra', 'Male', '', '', 0),
(54, 'Nisat', 38, 48, '2023-02-03 00:00:00', 'Serpent à sonnette', 'Female', '', '', 0),
(55, 'Ostibhat', 19, 75, '2023-02-06 00:00:00', 'Serpent à lunettes', 'Male', '', '', 0),
(56, 'Ashpa', 50, 49, '2023-02-06 00:00:00', 'Vipère', 'Female', '', '', 0),
(57, 'Atahasha', 37, 56, '2023-02-06 00:00:00', 'Python', 'Male', '', '', 0),
(58, 'Eksaa', 19, 4, '2023-02-06 00:00:00', 'Vipère', 'Male', '', '', 0),
(59, 'Aco', 16, 23, '2023-02-06 00:00:00', 'Python', 'Female', '', '', 0),
(60, 'Hoswatrala', 8, 56, '2023-02-06 00:00:00', 'Serpent à lunettes', 'Male', '', '', 0),
(61, 'Atahasha', 5, 79, '2023-02-06 00:00:00', 'Cobra', 'Male', '', '', 0),
(62, 'Kuscasasj', 24, 3, '2023-02-06 00:00:00', 'Mamba Noir', 'Female', '', '', 0),
(63, 'Ostibhat', 43, 6, '2023-02-06 00:00:00', 'Cobra', 'Female', '', '', 0),
(64, 'Xaxsairral', 5, 89, '2023-02-06 00:00:00', 'Serpent à lunettes', 'Female', '', '', 0),
(65, 'Crudjuckaazs', 41, 51, '2023-02-06 00:00:00', 'Couleuvre', 'Male', '', '', 0),
(66, 'Szaccolhai', 45, 48, '2023-02-06 00:00:00', 'Serpent de mer', 'Female', '', '', 0),
(67, 'Irjace', 9, 76, '2023-02-06 00:00:00', 'Vipère', 'Male', '', '', 0),
(68, 'Ostibhat', 5, 60, '2023-02-06 00:00:00', 'Cobra', 'Female', '', '', 0),
(69, 'Ladrarkattra', 35, 76, '2023-02-06 00:00:00', 'Serpent corail', 'Female', '', '', 0),
(70, 'Kuscasasj', 46, 43, '2023-02-06 00:00:00', 'Serpent à lunettes', 'Male', '', '', 0),
(71, 'Hoswatrala', 12, 60, '2023-02-06 00:00:00', 'Boa', 'Male', '', '', 0),
(72, 'Iraazs', 16, 10, '2023-02-06 00:00:00', 'Cobra', 'Male', '', '', 0),
(73, 'Khivya', 42, 81, '2023-02-06 00:00:00', 'Mamba Noir', 'Male', '', '', 0),
(74, 'Nisat', 34, 41, '2023-02-06 00:00:00', 'Python', 'Male', '', '', 0),
(75, 'Chiksha', 3, 39, '2023-02-06 00:00:00', 'Vipère', 'Male', '', '', 0),
(76, 'Yessish', 36, 31, '2023-02-06 00:00:00', 'Boa', 'Female', '', '', 0),
(77, 'Yessish', 15, 20, '2023-02-06 00:00:00', 'Couleuvre', 'Male', '', '', 0),
(78, 'Iraazs', 44, 31, '2023-02-06 00:00:00', 'Vipère', 'Male', '', '', 0),
(79, 'Tika', 24, 22, '2023-02-06 00:00:00', 'Serpent corail', 'Female', '', '', 0),
(80, 'Khivya', 23, 5, '2023-02-06 00:00:00', 'Serpent vert', 'Female', '', '', 0),
(81, 'Aco', 30, 66, '2023-02-06 00:00:00', 'Vipère', 'Male', '', '', 0),
(82, 'Ladrarkattra', 8, 45, '2023-02-06 00:00:00', 'Serpent à lunettes', 'Male', '', '', 0),
(83, 'Crudjuckaazs', 30, 88, '2023-02-06 00:00:00', 'Serpent à lunettes', 'Male', '', '', 0),
(84, 'Vrirmadmu', 4, 40, '2023-02-06 00:00:00', 'Cobra', 'Female', '', '', 0),
(85, 'Isashpat', 8, 86, '2023-02-06 00:00:00', 'Python', 'Female', '', '', 0),
(86, 'Hoswatrala', 18, 14, '2023-02-06 00:00:00', 'Serpent à lunettes', 'Male', '', '', 0),
(87, 'Iraazs', 14, 10, '2023-02-06 00:00:00', 'Serpent à sonnette', 'Male', '', '', 0),
(88, 'Isashpat', 23, 48, '2023-02-06 00:00:00', 'Cobra', 'Female', '', '', 0),
(89, 'Odizhaash', 12, 62, '2023-02-06 00:00:00', 'Anaconda', 'Female', '', '', 0),
(90, 'Iraazs', 48, 55, '2023-02-06 00:00:00', 'Serpent à sonnette', 'Male', '', '', 0),
(91, 'Atahasha', 46, 75, '2023-02-06 00:00:00', 'Serpent vert', 'Male', '', '', 0),
(92, 'Chastha', 9, 49, '2023-02-06 00:00:00', 'Serpent corail', 'Male', '', '', 0),
(93, 'Atahasha', 34, 86, '2023-02-06 00:00:00', 'Mamba Noir', 'Female', '', '', 0),
(94, 'Kuscasasj', 19, 76, '2023-02-06 00:00:00', 'Serpent de mer', 'Male', '', '', 0),
(95, 'Ostibhat', 27, 15, '2023-02-06 00:00:00', 'Serpent de mer', 'Male', '', '', 0),
(96, 'Xaxsairral', 19, 80, '2023-02-06 00:00:00', 'Serpent à sonnette', 'Male', '', '', 0),
(97, 'Khahirka', 6, 9, '2023-02-06 00:00:00', 'Mamba Noir', 'Female', '', '', 0),
(98, 'Zarce', 4, 68, '2023-02-06 00:00:00', 'Python', 'Female', '', '', 0),
(99, 'Khahirka', 36, 87, '2023-02-06 00:00:00', 'Python', 'Female', '', '', 0),
(100, 'Crudjuckaazs', 12, 49, '2023-02-06 00:00:00', 'Vipère', 'Male', '', '', 0),
(101, 'Ati', 30, 35, '2023-02-06 00:00:00', 'Python', 'Male', '', '', 0),
(102, 'Isashpat', 50, 13, '2023-02-06 00:00:00', 'Serpent à sonnette', 'Female', '', '', 0),
(103, 'Xaxsairral', 44, 13, '2023-02-06 00:00:00', 'Vipère', 'Female', '', '', 0),
(104, 'Vrirmadmu', 32, 76, '2023-02-06 00:00:00', 'Cobra', 'Female', '', '', 0),
(105, 'Odizhaash', 45, 45, '2023-02-06 00:00:00', 'Python', 'Male', '', '', 0),
(106, 'Nisat', 28, 18, '2023-02-06 00:00:00', 'Python', 'Male', '', '', 0),
(107, 'Sakitha', 10, 57, '2023-02-06 00:00:00', 'Couleuvre', 'Female', '', '', 0),
(108, 'Hoswatrala', 38, 61, '2023-02-06 00:00:00', 'Boa', 'Female', '', '', 0),
(109, 'Crudjuckaazs', 19, 34, '2023-02-06 00:00:00', 'Serpent corail', 'Male', '', '', 0),
(110, 'Odizhaash', 16, 38, '2023-02-06 00:00:00', 'Cobra', 'Male', '', '', 0),
(111, 'Vrirmadmu', 36, 61, '2023-02-06 00:00:00', 'Serpent de mer', 'Female', '', '', 0),
(112, 'Eksaa', 9, 28, '2023-02-06 00:00:00', 'Serpent corail', 'Male', '', '', 0),
(113, 'Isashpat', 35, 30, '2023-02-06 00:00:00', 'Serpent de mer', 'Male', '', '', 0),
(114, 'Zarce', 40, 24, '2023-02-06 00:00:00', 'Anaconda', 'Male', '', '', 0),
(115, 'Ati', 3, 20, '2023-02-06 00:00:00', 'Couleuvre', 'Male', '', '', 0),
(116, 'Movastha', 49, 25, '2023-02-06 00:00:00', 'Serpent à lunettes', 'Female', '', '', 0),
(117, 'Kuscasasj', 4, 58, '2023-02-06 00:00:00', 'Vipère', 'Female', '', '', 0),
(118, 'Nisat', 12, 42, '2023-02-06 00:00:00', 'Couleuvre', 'Male', '', '', 0),
(119, 'Ashpa', 34, 57, '2023-02-06 00:00:00', 'Serpent de mer', 'Male', '', '', 0),
(120, 'Tika', 7, 87, '2023-02-06 00:00:00', 'Vipère', 'Male', '', '', 0),
(121, 'Sakitha', 6, 87, '2023-02-06 00:00:00', 'Serpent vert', 'Female', '', '', 0),
(122, 'Xaxsairral', 6, 41, '2023-02-06 00:00:00', 'Serpent de mer', 'Male', '', '', 0),
(123, 'Nisat', 42, 89, '2023-02-06 00:00:00', 'Couleuvre', 'Male', '', '', 0),
(124, 'Movastha', 43, 82, '2023-02-06 00:00:00', 'Serpent corail', 'Male', '', '', 0),
(125, 'Irjace', 4, 57, '2023-02-06 00:00:00', 'Serpent à sonnette', 'Male', '', '', 0),
(126, 'Iraazs', 19, 31, '2023-02-06 00:00:00', 'Anaconda', 'Male', '', '', 0),
(127, 'Ostibhat', 15, 60, '2023-02-06 00:00:00', 'Serpent corail', 'Male', '', '', 0),
(128, 'Talicsie', 30, 72, '2023-02-06 00:00:00', 'Serpent vert', 'Female', '', '', 0),
(129, 'Ashpa', 46, 35, '2023-02-06 00:00:00', 'Anaconda', 'Female', '', '', 0),
(130, 'Movastha', 35, 33, '2023-02-06 00:00:00', 'Cobra', 'Male', '', '', 0),
(131, 'Talicsie', 37, 56, '2023-02-06 00:00:00', 'Vipère', 'Female', '', '', 0),
(132, 'Erkuxzai', 5, 66, '2023-02-06 00:00:00', 'Cobra', 'Female', '', '', 0),
(133, 'Tika', 40, 16, '2023-02-06 00:00:00', 'Vipère', 'Female', '', '', 0),
(134, 'Tika', 23, 25, '2023-02-06 00:00:00', 'Vipère', 'Female', '', '', 0),
(135, 'Chiksha', 2, 63, '2023-02-06 00:00:00', 'Vipère', 'Female', '', '', 0),
(136, 'Yessish', 2, 22, '2023-02-06 00:00:00', 'Serpent à lunettes', 'Male', '', '', 0),
(137, 'Ladrarkattra', 21, 9, '2023-02-06 00:00:00', 'Python', 'Male', '', '', 0),
(138, 'Zarce', 17, 44, '2023-02-06 00:00:00', 'Python', 'Female', '', '', 0),
(139, 'Khivya', 25, 42, '2023-02-06 00:00:00', 'Serpent à lunettes', 'Male', '', '', 0),
(140, 'Chastha', 26, 59, '2023-02-06 00:00:00', 'Cobra', 'Female', '', '', 0),
(141, 'Nisat', 36, 72, '2023-02-06 00:00:00', 'Vipère', 'Male', '', '', 0),
(142, 'Yessish', 36, 36, '2023-02-06 00:00:00', 'Anaconda', 'Male', '', '', 0),
(143, 'Crudjuckaazs', 8, 21, '2023-02-06 00:00:00', 'Serpent de mer', 'Female', '', '', 0),
(144, 'Zarce', 21, 54, '2023-02-06 00:00:00', 'Serpent à sonnette', 'Male', '', '', 0),
(145, 'Xaxsairral', 31, 80, '2023-02-06 00:00:00', 'Serpent corail', 'Female', '', '', 0),
(146, 'Erkuxzai', 13, 82, '2023-02-06 00:00:00', 'Serpent de mer', 'Male', '', '', 0),
(147, 'Ostibhat', 6, 3, '2023-02-06 00:00:00', 'Serpent à sonnette', 'Female', '', '', 0),
(148, 'Aco', 9, 79, '2023-02-06 00:00:00', 'Couleuvre', 'Male', '', '', 0),
(149, 'Ostibhat', 40, 52, '2023-02-06 00:00:00', 'Cobra', 'Male', '', '', 0),
(150, 'Aco', 49, 8, '2023-02-06 00:00:00', 'Serpent à sonnette', 'Male', '', '', 0),
(151, 'Ladrarkattra', 50, 27, '2023-02-06 00:00:00', 'Serpent vert', 'Male', '', '', 0),
(152, 'Aco', 28, 73, '2023-02-06 00:00:00', 'Anaconda', 'Female', '', '', 0),
(153, 'Kuscasasj', 33, 43, '2023-02-06 00:00:00', 'Mamba Noir', 'Male', '', '', 0),
(154, 'Ati', 26, 72, '2023-02-06 00:00:00', 'Mamba Noir', 'Female', '', '', 0),
(155, 'Hoswatrala', 32, 11, '2023-02-06 00:00:00', 'Serpent vert', 'Female', '', '', 0),
(156, 'Xaxsairral', 15, 67, '2023-02-06 00:00:00', 'Cobra', 'Male', '', '', 0),
(157, 'Ashpa', 16, 18, '2023-02-06 00:00:00', 'Boa', 'Male', '', '', 0),
(158, 'Sakitha', 39, 77, '2023-02-06 00:00:00', 'Couleuvre', 'Female', '', '', 0),
(159, 'Aco', 41, 76, '2023-02-06 00:00:00', 'Serpent de mer', 'Male', '', '', 0),
(160, 'Talicsie', 24, 46, '2023-02-06 00:00:00', 'Serpent de mer', 'Male', '', '', 0),
(161, 'Vrirmadmu', 22, 21, '2023-02-06 00:00:00', 'Serpent à lunettes', 'Female', '', '', 0),
(162, 'Iraazs', 16, 14, '2023-02-06 00:00:00', 'Serpent corail', 'Female', '', '', 0),
(163, 'Chastha', 40, 86, '2023-02-06 00:00:00', 'Serpent de mer', 'Male', '', '', 0),
(164, 'Talicsie', 25, 82, '2023-02-06 00:00:00', 'Mamba Noir', 'Male', '', '', 0),
(165, 'Khahirka', 19, 83, '2023-02-06 00:00:00', 'Python', 'Male', '', '', 0),
(166, 'Sakitha', 11, 31, '2023-02-06 00:00:00', 'Cobra', 'Male', '', '', 0),
(167, 'Yessish', 39, 36, '2023-02-06 00:00:00', 'Python', 'Male', '', '', 0),
(168, 'Movastha', 16, 12, '2023-02-06 00:00:00', 'Python', 'Male', '', '', 0),
(169, 'Eksaa', 46, 9, '2023-02-06 00:00:00', 'Vipère', 'Male', '', '', 0),
(170, 'Tika', 31, 27, '2023-02-06 00:00:00', 'Serpent vert', 'Female', '', '', 0),
(171, 'Adhiso', 4, 29, '2023-02-06 00:00:00', 'Python', 'Male', '', '', 0),
(172, 'Irjace', 33, 50, '2023-02-06 00:00:00', 'Cobra', 'Male', '', '', 0),
(173, 'Adhiso', 11, 18, '2023-02-06 00:00:00', 'Serpent à sonnette', 'Female', '', '', 0),
(174, 'Khivya', 30, 9, '2023-02-06 00:00:00', 'Serpent à sonnette', 'Male', '', '', 0),
(175, 'Odizhaash', 36, 40, '2023-02-06 00:00:00', 'Serpent à lunettes', 'Female', '', '', 0),
(176, 'Iraazs', 5, 89, '2023-02-06 00:00:00', 'Mamba Noir', 'Male', '', '', 0),
(177, 'Eksaa', 43, 43, '2023-02-06 00:00:00', 'Cobra', 'Female', '', '', 0),
(178, 'Hoswatrala', 39, 74, '2023-02-06 00:00:00', 'Python', 'Male', '', '', 0),
(179, 'Sakitha', 50, 61, '2023-02-06 00:00:00', 'Cobra', 'Male', '', '', 0),
(180, 'Aco', 35, 23, '2023-02-06 00:00:00', 'Vipère', 'Male', '', '', 0),
(181, 'Ati', 39, 7, '2023-02-06 00:00:00', 'Python', 'Female', '', '', 0),
(182, 'Szaccolhai', 49, 59, '2023-02-06 00:00:00', 'Mamba Noir', 'Male', '', '', 0),
(183, 'Chastha', 43, 58, '2023-02-06 00:00:00', 'Serpent à lunettes', 'Female', '', '', 0),
(184, 'Crudjuckaazs', 23, 18, '2023-02-06 00:00:00', 'Boa', 'Male', '', '', 0),
(185, 'Szaccolhai', 13, 46, '2023-02-06 00:00:00', 'Vipère', 'Female', '', '', 0),
(186, 'Szaccolhai', 3, 63, '2023-02-06 00:00:00', 'Anaconda', 'Male', '', '', 0),
(187, 'Khivya', 35, 46, '2023-02-06 00:00:00', 'Serpent de mer', 'Male', '', '', 0),
(188, 'Ladrarkattra', 11, 78, '2023-02-06 00:00:00', 'Serpent à sonnette', 'Female', '', '', 0),
(189, 'Zarce', 7, 83, '2023-02-06 00:00:00', 'Couleuvre', 'Female', '', '', 0),
(190, 'Talicsie', 20, 12, '2023-02-06 00:00:00', 'Python', 'Female', '', '', 0),
(191, 'Tika', 25, 64, '2023-02-06 00:00:00', 'Boa', 'Female', '', '', 0),
(192, 'Ati', 46, 86, '2023-02-06 00:00:00', 'Python', 'Male', '', '', 0),
(193, 'Movastha', 4, 70, '2023-02-06 00:00:00', 'Mamba Noir', 'Male', '', '', 0),
(194, 'Ati', 9, 24, '2023-02-06 00:00:00', 'Mamba Noir', 'Female', '', '', 0),
(195, 'Adhiso', 3, 44, '2023-02-06 00:00:00', 'Python', 'Male', '', '', 0),
(196, 'Atahasha', 13, 75, '2023-02-06 00:00:00', 'Couleuvre', 'Female', '', '', 0),
(197, 'Sakitha', 49, 10, '2023-02-06 00:00:00', 'Serpent corail', 'Female', '', '', 0),
(198, 'Irjace', 44, 26, '2023-02-06 00:00:00', 'Python', 'Male', '', '', 0),
(199, 'Yessish', 5, 88, '2023-02-06 00:00:00', 'Boa', 'Male', '', '', 0),
(200, 'Aco', 50, 66, '2023-02-06 00:00:00', 'Serpent à sonnette', 'Female', '', '', 0),
(201, 'Ladrarkattra', 2, 7, '2023-02-06 00:00:00', 'Python', 'Female', '', '', 0),
(202, 'Ostibhat', 27, 15, '2023-02-06 00:00:00', 'Python', 'Female', '', '', 0),
(203, 'Szaccolhai', 26, 40, '2023-02-06 00:00:00', 'Couleuvre', 'Male', '', '', 0),
(204, 'Yessish', 45, 80, '2023-02-06 00:00:00', 'Anaconda', 'Male', '', '', 0),
(205, 'Iraazs', 44, 23, '2023-02-06 00:00:00', 'Serpent à lunettes', 'Female', '', '', 0),
(206, 'Xaxsairral', 16, 66, '2023-02-06 00:00:00', 'Serpent à lunettes', 'Male', '', '', 0),
(207, 'Khivya', 27, 33, '2023-02-06 00:00:00', 'Serpent à lunettes', 'Male', '', '', 0),
(208, 'Ladrarkattra', 1, 58, '2023-02-06 00:00:00', 'Boa', 'Male', '', '', 0),
(209, 'Chastha', 21, 39, '2023-02-06 00:00:00', 'Anaconda', 'Male', '', '', 0),
(210, 'Kuscasasj', 28, 25, '2023-02-06 00:00:00', 'Python', 'Female', '', '', 0),
(211, 'Isashpat', 41, 17, '2023-02-06 00:00:00', 'Couleuvre', 'Male', '', '', 0),
(212, 'Khahirka', 49, 66, '2023-02-06 00:00:00', 'Vipère', 'Male', '', '', 0),
(213, 'Kuscasasj', 13, 33, '2023-02-06 00:00:00', 'Serpent vert', 'Male', '', '', 0),
(214, 'Eksaa', 41, 83, '2023-02-06 00:00:00', 'Anaconda', 'Male', '', '', 0),
(215, 'Yessish', 19, 8, '2023-02-06 00:00:00', 'Boa', 'Female', '', '', 0),
(216, 'Irjace', 41, 69, '2023-02-06 00:00:00', 'Anaconda', 'Female', '', '', 0),
(217, 'Sakitha', 38, 32, '2023-02-06 00:00:00', 'Couleuvre', 'Male', '', '', 0),
(218, 'Chastha', 18, 62, '2023-02-06 00:00:00', 'Serpent vert', 'Female', '', '', 0),
(219, 'Tika', 6, 42, '2023-02-06 00:00:00', 'Anaconda', 'Female', '', '', 0),
(220, 'Iraazs', 26, 59, '2023-02-06 00:00:00', 'Serpent à lunettes', 'Male', '', '', 0),
(221, 'Tika', 10, 88, '2023-02-06 00:00:00', 'Anaconda', 'Female', '', '', 0),
(222, 'Ostibhat', 6, 18, '2023-02-06 00:00:00', 'Couleuvre', 'Female', '', '', 0),
(223, 'Ati', 47, 48, '2023-02-06 00:00:00', 'Serpent vert', 'Male', '', '', 0),
(224, 'Adhiso', 15, 43, '2023-02-06 00:00:00', 'Serpent corail', 'Female', '', '', 0),
(225, 'Hoswatrala', 25, 77, '2023-02-06 00:00:00', 'Vipère', 'Male', '', '', 0),
(226, 'Movastha', 23, 89, '2023-02-06 00:00:00', 'Cobra', 'Male', '', '', 0),
(227, 'Movastha', 15, 90, '2023-02-06 00:00:00', 'Boa', 'Female', '', '', 0),
(228, 'Chiksha', 41, 87, '2023-02-06 00:00:00', 'Serpent de mer', 'Male', '', '', 0),
(229, 'Chiksha', 4, 31, '2023-02-06 00:00:00', 'Mamba Noir', 'Female', '', '', 0),
(230, 'Yessish', 2, 55, '2023-02-06 00:00:00', 'Serpent de mer', 'Female', '', '', 0),
(231, 'Talicsie', 12, 24, '2023-02-06 00:00:00', 'Serpent à sonnette', 'Male', '', '', 0),
(232, 'Tika', 49, 83, '2023-02-06 00:00:00', 'Serpent à lunettes', 'Male', '', '', 0),
(233, 'Ladrarkattra', 34, 22, '2023-02-06 00:00:00', 'Serpent vert', 'Male', '', '', 0),
(234, 'Irjace', 28, 60, '2023-02-06 00:00:00', 'Serpent vert', 'Male', '', '', 0),
(235, 'Erkuxzai', 1, 15, '2023-02-06 00:00:00', 'Python', 'Female', '', '', 0),
(236, 'Ati', 17, 25, '2023-02-06 00:00:00', 'Serpent de mer', 'Male', '', '', 0),
(237, 'Erkuxzai', 14, 71, '2023-02-06 00:00:00', 'Mamba Noir', 'Female', '', '', 0),
(238, 'Isashpat', 13, 67, '2023-02-06 00:00:00', 'Python', 'Female', '', '', 0),
(239, 'Sakitha', 46, 56, '2023-02-06 00:00:00', 'Serpent corail', 'Female', '', '', 0),
(240, 'Yessish', 41, 32, '2023-02-06 00:00:00', 'Python', 'Male', '', '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `snakes_pairing`
--

DROP TABLE IF EXISTS `snakes_pairing`;
CREATE TABLE IF NOT EXISTS `snakes_pairing` (
  `id` int NOT NULL AUTO_INCREMENT,
  `male_snake_id` int NOT NULL,
  `female_snake_id` int NOT NULL,
  `baby_snake_id` int DEFAULT NULL,
  `pairing_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `male_snake_id` (`male_snake_id`),
  KEY `female_snake_id` (`female_snake_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `snakes_pairing`
--

INSERT INTO `snakes_pairing` (`id`, `male_snake_id`, `female_snake_id`, `baby_snake_id`, `pairing_date`) VALUES
(1, 1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_pseudo` varchar(320) NOT NULL,
  `user_mail` varchar(320) NOT NULL,
  `user_password` varchar(36) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `user_pseudo`, `user_mail`, `user_password`) VALUES
(2, 'admin', 'admin@here.com', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
