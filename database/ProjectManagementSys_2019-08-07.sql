# ************************************************************
# Sequel Pro SQL dump
# Version 5425
#
# https://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 8.0.17)
# Database: ProjectManagementSys
# Generation Time: 2019-08-07 10:11:08 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table invites
# ------------------------------------------------------------

DROP TABLE IF EXISTS `invites`;

CREATE TABLE `invites` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `invites_token_unique` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(12,'2014_10_12_000000_create_users_table',1),
	(13,'2014_10_12_100000_create_password_resets_table',1),
	(14,'2019_08_06_180223_create_teams_table',1),
	(15,'2019_08_06_180234_create_projects_table',1),
	(16,'2019_08_06_180242_create_invites_table',1),
	(17,'2019_08_07_065429_create_project_user_table',1);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table projects
# ------------------------------------------------------------

DROP TABLE IF EXISTS `projects`;

CREATE TABLE `projects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lead_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;

INSERT INTO `projects` (`id`, `created_at`, `updated_at`, `title`, `details`, `lead_id`)
VALUES
	(1,'2019-08-07 10:05:12','2019-08-07 10:05:12','Project 1','some random details of project 1',1),
	(3,'2019-08-07 10:05:53','2019-08-07 10:05:53','Project 2','some random details of project 2',2),
	(4,'2019-08-07 10:05:58','2019-08-07 10:05:58','Project 3','some random details of project 3',3);

/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table teams
# ------------------------------------------------------------

DROP TABLE IF EXISTS `teams`;

CREATE TABLE `teams` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lead_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `teams` WRITE;
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;

INSERT INTO `teams` (`id`, `created_at`, `updated_at`, `title`, `lead_id`)
VALUES
	(1,'2019-08-07 09:45:38','2019-08-07 09:45:38','1st team',1),
	(2,'2019-08-07 10:06:26','2019-08-07 10:06:26','1st team',1),
	(3,'2019-08-07 10:06:34','2019-08-07 10:06:34','2nd team',2),
	(4,'2019-08-07 10:06:45','2019-08-07 10:06:45','3rd team',3);

/*!40000 ALTER TABLE `teams` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `project_id` int(10) unsigned DEFAULT NULL,
  `team_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_project_id_index` (`project_id`),
  KEY `users_team_id_index` (`team_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `contact`, `gender`, `role`, `project_id`, `team_id`)
VALUES
	(1,'GOD','god@god.god',NULL,'$2y$10$EZKbrMcLhVyQ3smj.AexaO2EPB9JAl.wFGfLLK5QSxRHDDluBgxuW',NULL,'2019-08-07 09:41:54','2019-08-07 09:41:54','98763434321','Male',3,NULL,NULL),
	(2,'admin1','admin1@abc.com',NULL,'$2y$10$nfo9F7WE/ywdtTIylOlhSu9aptjMXIVyc9bU2rcbHMh789vOuSCGy',NULL,'2019-08-07 09:43:32','2019-08-07 09:43:32','98763434321','Male',1,NULL,NULL),
	(3,'admin2','admin2@abc.com',NULL,'$2y$10$arpZqGQDXZPL97wfyD7R5OK6zljUXQTjQ3q3TI2z8nguYFRWAgxkK',NULL,'2019-08-07 09:43:46','2019-08-07 09:43:46','98763434321','Male',1,NULL,NULL),
	(4,'admin3','admin3@abc.com',NULL,'$2y$10$Gxkqgqq.DvWnuhjP4ovxkub6vlBN1qhFHTTntu9V.86/rs/WshVpy',NULL,'2019-08-07 09:43:51','2019-08-07 09:43:51','98763434321','Male',1,NULL,NULL),
	(5,'user1','user1@abc.com',NULL,'$2y$10$Lnd6vWAJrGsujouhVUlZAeZLqlWrYtwouDcDa9Eq6uVXIRPjTY2.y',NULL,'2019-08-07 09:44:08','2019-08-07 09:44:08','98763434321','Male',0,NULL,NULL),
	(6,'user2','user2@abc.com',NULL,'$2y$10$cacFODVapqhIpnZb09zsae45ySy0R7g5B0UowkwXAgoZYmJpMskDu',NULL,'2019-08-07 09:44:17','2019-08-07 09:44:17','98763434321','Male',0,NULL,NULL),
	(7,'user3','user3@abc.com',NULL,'$2y$10$CT31NpKroPifKMjhdlycnOmDx1nnAeP8EV876.hqhd7FTPblwoVN2',NULL,'2019-08-07 09:44:25','2019-08-07 09:44:25','98763434321','Male',0,NULL,NULL),
	(8,'user4','user4@abc.com',NULL,'$2y$10$oSlYUDsQH6zFBTg42zdB2eAmXSRXb6Cc8nwRF1T/7ANtnjx3Bp26y',NULL,'2019-08-07 09:44:31','2019-08-07 09:44:31','98763434321','Male',0,NULL,NULL);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
