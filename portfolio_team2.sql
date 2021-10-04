-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 30 sep. 2021 à 10:06
-- Version du serveur : 8.0.21
-- Version de PHP : 8.0.11
SET
  SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET
  time_zone = "+00:00";
  /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
  /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
  /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
  /*!40101 SET NAMES utf8mb4 */;
--
  -- Base de données : `portfolio_team2`
  --
  -- --------------------------------------------------------
  --
  -- Structure de la table `educations`
  --
  DROP TABLE IF EXISTS `educations`;
CREATE TABLE IF NOT EXISTS `educations` (
    `id` int NOT NULL AUTO_INCREMENT,
    `title` varchar(60) NOT NULL,
    `school` varchar(30) NOT NULL,
    `year` char(4) NOT NULL,
    `description` text,
    PRIMARY KEY (`id`)
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8;
-- --------------------------------------------------------
  --
  -- Structure de la table `profile`
  --
  DROP TABLE IF EXISTS `profile`;
CREATE TABLE IF NOT EXISTS `profile` (
    `first_name` varchar(30) NOT NULL,
    `last_name` varchar(30) NOT NULL,
    `gender` tinyint NOT NULL,
    `adress` varchar(100) DEFAULT NULL,
    `cp` char(5) NOT NULL,
    `city` varchar(30) NOT NULL,
    `email` varchar(255) NOT NULL,
    `phone` char(10) DEFAULT NULL,
    `linkedin_url` varchar(255) DEFAULT NULL,
    `github_url` varchar(255) DEFAULT NULL,
    `twitter_url` varchar(255) DEFAULT NULL,
    `password` varchar(255) NOT NULL,
    `drive_licence` tinyint DEFAULT NULL,
    `catchphrase` text,
    `birthdate` date DEFAULT NULL,
    UNIQUE KEY `email` (`email`)
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8;
-- --------------------------------------------------------
  --
  -- Structure de la table `projects`
  --
  DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
    `id` int NOT NULL AUTO_INCREMENT,
    `name` varchar(100) NOT NULL,
    `company` varchar(40) NOT NULL,
    `logo_company` varchar(255) NOT NULL,
    `description` text NOT NULL,
    `website` varchar(255) DEFAULT NULL,
    `start` date NOT NULL,
    `end` date DEFAULT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8;
-- --------------------------------------------------------
  --
  -- Structure de la table `projects_tags`
  --
  DROP TABLE IF EXISTS `projects_tags`;
CREATE TABLE IF NOT EXISTS `projects_tags` (
    `id` int NOT NULL AUTO_INCREMENT,
    `tag_id` int NOT NULL,
    `project_id` int NOT NULL,
    PRIMARY KEY (`id`),
    KEY `project_id` (`project_id`),
    KEY `tag_id` (`tag_id`)
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8;
-- --------------------------------------------------------
  --
  -- Structure de la table `projects_tasks`
  --
  DROP TABLE IF EXISTS `projects_tasks`;
CREATE TABLE IF NOT EXISTS `projects_tasks` (
    `id` int NOT NULL AUTO_INCREMENT,
    `project_id` int NOT NULL,
    `task_id` int NOT NULL,
    PRIMARY KEY (`id`),
    KEY `project_id` (`project_id`),
    KEY `task_id` (`task_id`)
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8;
-- --------------------------------------------------------
  --
  -- Structure de la table `screenshots`
  --
  DROP TABLE IF EXISTS `screenshots`;
CREATE TABLE IF NOT EXISTS `screenshots` (
    `id` int NOT NULL AUTO_INCREMENT,
    `url` varchar(255) NOT NULL,
    `caption` varchar(100) NOT NULL,
    `project_id` int NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `url` (`url`),
    KEY `project_id` (`project_id`)
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8;
-- --------------------------------------------------------
  --
  -- Structure de la table `tags`
  --
  DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
    `id` int NOT NULL AUTO_INCREMENT,
    `name` varchar(30) NOT NULL,
    `type_id` int NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `name` (`name`),
    KEY `type_id` (`type_id`)
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8;
-- --------------------------------------------------------
  --
  -- Structure de la table `tasks`
  --
  DROP TABLE IF EXISTS `tasks`;
CREATE TABLE IF NOT EXISTS `tasks` (
    `id` int NOT NULL AUTO_INCREMENT,
    `description` varchar(255) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `description` (`description`)
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8;
-- --------------------------------------------------------
  --
  -- Structure de la table `types`
  --
  DROP TABLE IF EXISTS `types`;
CREATE TABLE IF NOT EXISTS `types` (
    `id` int NOT NULL AUTO_INCREMENT,
    `name` varchar(30) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `name` (`name`)
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8;
--
  -- Contraintes pour les tables déchargées
  --
  --
  -- Contraintes pour la table `projects_tags`
  --
ALTER TABLE
  `projects_tags`
ADD
  CONSTRAINT `projects_tags_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
ADD
  CONSTRAINT `projects_tags_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
--
  -- Contraintes pour la table `projects_tasks`
  --
ALTER TABLE
  `projects_tasks`
ADD
  CONSTRAINT `projects_tasks_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
ADD
  CONSTRAINT `projects_tasks_ibfk_2` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
--
  -- Contraintes pour la table `screenshots`
  --
ALTER TABLE
  `screenshots`
ADD
  CONSTRAINT `screenshots_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
--
  -- Contraintes pour la table `tags`
  --
ALTER TABLE
  `tags`
ADD
  CONSTRAINT `tags_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;
  /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
  /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
  /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;