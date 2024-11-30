-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour bd_consulte
CREATE DATABASE IF NOT EXISTS `bd_consulte` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `bd_consulte`;

-- Listage de la structure de table bd_consulte. domaines
CREATE TABLE IF NOT EXISTS `domaines` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table bd_consulte.domaines : ~2 rows (environ)
INSERT INTO `domaines` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
	(1, 'finance', 'kkk', 'images/mWvQvLDlU8PSmwUtla3Ibk6Lldpckw6DNrARXl1s.png', '2024-11-19 10:14:34', '2024-11-30 09:47:46'),
	(2, 'Fnance12', 'kkk', 'images/ZKvGDIOVIl7pbEW8ZDjCZEGlVfadeEzrfIKtUOhR.jpg', '2024-11-19 10:17:10', '2024-11-19 10:19:46');

-- Listage de la structure de table bd_consulte. domaine_user
CREATE TABLE IF NOT EXISTS `domaine_user` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `domaine_id` bigint unsigned NOT NULL,
  `certification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile` text COLLATE utf8mb4_unicode_ci,
  `availability` tinyint(1) NOT NULL DEFAULT '1',
  `professional_experience` text COLLATE utf8mb4_unicode_ci,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `domaine_user_user_id_foreign` (`user_id`),
  KEY `domaine_user_domaine_id_foreign` (`domaine_id`),
  CONSTRAINT `domaine_user_domaine_id_foreign` FOREIGN KEY (`domaine_id`) REFERENCES `domaines` (`id`) ON DELETE CASCADE,
  CONSTRAINT `domaine_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table bd_consulte.domaine_user : ~0 rows (environ)

-- Listage de la structure de table bd_consulte. failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table bd_consulte.failed_jobs : ~0 rows (environ)

-- Listage de la structure de table bd_consulte. migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table bd_consulte.migrations : ~6 rows (environ)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(5, '2014_10_12_000000_create_users_table', 1),
	(6, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(7, '2019_08_19_000000_create_failed_jobs_table', 1),
	(8, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(9, '2024_11_19_095052_create_domaines_table', 2),
	(10, '2024_11_19_095302_create_domaine_user_table', 2);

-- Listage de la structure de table bd_consulte. password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table bd_consulte.password_reset_tokens : ~0 rows (environ)

-- Listage de la structure de table bd_consulte. personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table bd_consulte.personal_access_tokens : ~0 rows (environ)

-- Listage de la structure de table bd_consulte. users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('user','admin','expert') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specialty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `availability` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table bd_consulte.users : ~11 rows (environ)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `address`, `role`, `phone`, `specialty`, `availability`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'imen moua', 'ichraf12@gmail.com', NULL, '$2y$12$dYQh3468LI9tVckn5elxYuzHlNjoUIkNTxCChwCFnRFNizaJlIJ6G', 'ggggg', 'admin', '45745467', 'finance', 1, NULL, '2024-11-16 17:01:18', '2024-11-16 17:01:18'),
	(3, 'nour', 'ichraf125555@gmail.com', NULL, '$2y$12$jvpSrVR2V9I83vcyfF/TlO3hJGWUjPU.CLyhpv3ylgrf0Rz0tZFPS', 'nabeul', 'user', '12345678', 'finance', 1, NULL, '2024-11-16 19:10:37', '2024-11-16 19:10:37'),
	(4, 'nour', 'nour@gmail.com', NULL, '$2y$12$KRsbC8o4MDpHsbh/Au4ZSunZ3Iq2OqdarJkG5TTerwmvJ08/qwPD2', 'nabeul', 'expert', '12345678', 'Medical', 1, NULL, '2024-11-16 19:26:50', '2024-11-16 19:26:50'),
	(5, 'admin', 'admin@gmail.com', NULL, '$2y$12$Rfb2nkQEDf3n9aCaQ4Zwx.4j0uhbcNgN6HJuKVxwBfdnv4I7rS3Du', 'nabeul', 'admin', '12345678', 'juridrique', 1, NULL, '2024-11-16 19:28:26', '2024-11-16 19:28:26'),
	(6, 'ichraf Moula', 'user3@gmail.com', NULL, '$2y$12$pE9/bXC46muJVHzGcGHS5uncTjueItS.6J7qLTjyZWt/sICVAcA1y', 'afh2', 'user', '45745467', 'Avocat', 1, NULL, '2024-11-16 19:37:49', '2024-11-16 19:37:49'),
	(7, 'imen', 'imen@gmail.com', NULL, '$2y$12$Y7yECMeo6GkJBtM5hUjo6ut8Wr0PTe7HpC/E31ePlLhHWmPTSKcdG', 'afh2', 'user', '45745467', 'juridrique', 1, NULL, '2024-11-16 20:15:45', '2024-11-16 20:15:45'),
	(8, 'lamis', 'lamis@gmail.com', NULL, '$2y$12$snQ1A0X1yzzHaQEkjjeHXOw6k/NrNvb3vNNcYIFJ99kvufUTzsKk.', 'nabeul', 'user', '12345678', 'finance', 1, NULL, '2024-11-30 09:43:08', '2024-11-30 09:43:08'),
	(9, 'nour', 'User@gmail.com', NULL, '$2y$12$nOcKg380tcXfcJskwa1aGe0MTSjGOTJkkyBV2Ckk2O7nTvI1wkY9a', 'ggggg', 'user', '12345678', 'finance', 1, NULL, '2024-11-30 09:45:22', '2024-11-30 09:45:22'),
	(10, 'lamisExpert', 'lamis12@expert.com', NULL, '$2y$12$SjTxuCVe2hkqcpQzKrSagOPzbLlP8oupbZinrYnqcixX3vl4Fy5Uu', 'bin khiar', 'expert', '12345678', 'Avocat', 1, NULL, '2024-11-30 09:49:37', '2024-11-30 09:49:37'),
	(11, 'med', 'med@gmail.com', NULL, '$2y$12$GEfYIhoNc4/mkQSh/w00UOpKklF5BKDCiroTBHW7msCYz2uATSrl2', 'nabeul', 'expert', '45745467', 'juridrique', 1, NULL, '2024-11-30 09:50:44', '2024-11-30 09:50:44'),
	(12, 'lamisExpert', 'lamis@yahoo.com', NULL, '$2y$12$l2SHhYRpovPiA0g61bl5xuPcHj9kWRDd0DwN89UgbqCHJxVxU5Lgq', 'bin khiar', 'expert', '12345678', 'Medical', 1, NULL, '2024-11-30 09:54:54', '2024-11-30 09:54:54');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
