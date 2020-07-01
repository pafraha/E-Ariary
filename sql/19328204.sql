-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 12 juil. 2019 à 10:16
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `19328204`
--

-- --------------------------------------------------------

--
-- Structure de la table `blog`
--

DROP TABLE IF EXISTS `blog`;
CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `contenu` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `nom`, `description`, `created_at`) VALUES
(1, 'sportswear', NULL, '2019-07-09 06:05:32'),
(2, 'mens', NULL, '2019-07-09 05:00:00'),
(3, 'womens', NULL, '2019-07-09 12:34:34'),
(4, 'kids', NULL, '2019-07-09 09:00:12'),
(5, 'fashion', NULL, '2019-07-09 12:38:00'),
(6, 'inetriors', NULL, '2019-07-09 12:29:24'),
(7, 'clothing', NULL, '2019-07-10 13:00:26'),
(8, 'bags', NULL, '2019-07-17 00:00:00'),
(9, 'shoes', NULL, '2019-07-10 14:35:00'),
(10, 'Tsara', NULL, '2019-07-12 05:02:38');

-- --------------------------------------------------------

--
-- Structure de la table `commantaires`
--

DROP TABLE IF EXISTS `commantaires`;
CREATE TABLE IF NOT EXISTS `commantaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_blog` int(11) NOT NULL,
  `auteur_id` int(11) NOT NULL,
  `commentaire` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `marques`
--

DROP TABLE IF EXISTS `marques`;
CREATE TABLE IF NOT EXISTS `marques` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `marques`
--

INSERT INTO `marques` (`id`, `nom`, `created_at`) VALUES
(1, 'acne', '2019-07-09 10:00:00'),
(2, 'nike', '2019-07-10 15:00:00'),
(3, 'addidas', '2019-07-09 14:37:00'),
(4, 'oddmoly', '2019-07-10 10:00:00'),
(5, 'ronhill', '2019-07-11 11:18:00'),
(6, 'boudestjn', '2019-07-11 11:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `img_link` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `prix` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `img_link`, `prix`, `category_id`, `stock`, `created_at`) VALUES
(5, 'Gasy', 'images/product8.jpg', '1500', 7, 55, '2019-07-12 10:03:55'),
(3, 'Gasy', 'images/product2.jpg', '1414', 1, 25, '2019-07-12 08:51:26');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `remembre_token` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `confirmation_token` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_confirme` datetime DEFAULT NULL,
  `reset_token` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `username`, `email`, `password`, `remembre_token`, `confirmation_token`, `date_confirme`, `reset_token`, `updated_date`, `created_date`) VALUES
(7, 'Paulin', 'Franco', 'gasyhacks', 'admin@admin.com', '$2y$10$25RMfwiKFPO1skFDxAARJeDUpvMZkHvAb27e8m9VX0vOAnoKG9tL.', NULL, 'hS8eDavN92am54oSAiVz5FIrZqpcppRD45z2SWjHUdUZA3UuyHmtaGwkGJtawhvYGBQArmKKSPzVhxJNEln6ksNzr9g5KUwCEI1vlnk3TWD5vkEf9pf9eZvj8CLQqiWEp3y7laFTqQ4MJjgA4tdysACKHsOiAi5MDEiTwt8YaYq2M1WBu2pRvKv1G44pg6wMh7g9we7Pann4vbnxKFiROwRos0D9voBU9EtXXjuRVmNnMjQRXYIbgzMOjc', NULL, NULL, NULL, '2019-07-12 09:42:40');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
