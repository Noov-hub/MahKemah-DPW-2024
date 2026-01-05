/*
Navicat MySQL Data Transfer

Source Server         : LatihanDatabase
Source Server Version : 80030
Source Host           : localhost:3306
Source Database       : mahkemah

Target Server Type    : MYSQL
Target Server Version : 80030
File Encoding         : 65001

Date: 2025-02-27 16:38:38
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `bags`
-- ----------------------------
DROP TABLE IF EXISTS `bags`;
CREATE TABLE `bags` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of bags
-- ----------------------------
INSERT INTO `bags` VALUES ('0', '-', 'bag-0.png', '0', '0', '2024-06-05 21:58:50', '2024-06-05 21:58:50');
INSERT INTO `bags` VALUES ('1', 'Eiger', 'bag-1.jpg', '80000', '1', '2024-06-05 19:32:40', '2024-06-19 22:38:56');
INSERT INTO `bags` VALUES ('2', 'Consina', 'bag-2.jpg', '70000', '0', '2024-06-05 19:33:14', '2025-02-27 08:43:11');
INSERT INTO `bags` VALUES ('3', 'Rei', 'bag-3.jpg', '75000', '1', '2024-06-05 19:33:31', '2024-06-05 19:33:33');
INSERT INTO `bags` VALUES ('4', 'Antarestar', 'bag-4.jpg', '100000', '1', '2024-06-05 21:58:50', '2024-06-05 21:58:52');

-- ----------------------------
-- Table structure for `cache`
-- ----------------------------
DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of cache
-- ----------------------------

-- ----------------------------
-- Table structure for `cache_locks`
-- ----------------------------
DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of cache_locks
-- ----------------------------

-- ----------------------------
-- Table structure for `carts`
-- ----------------------------
DROP TABLE IF EXISTS `carts`;
CREATE TABLE `carts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `bag_id` bigint NOT NULL DEFAULT '0',
  `shoe_id` bigint NOT NULL DEFAULT '0',
  `tent_id` bigint NOT NULL DEFAULT '0',
  `total_harga` decimal(10,0) DEFAULT NULL,
  `metode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '-',
  `status_konfirmasi` int NOT NULL DEFAULT '0',
  `id_user` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of carts
-- ----------------------------
INSERT INTO `carts` VALUES ('1', '1', '1', '1', '385000', '-', '1', '2', null, '2024-06-19 14:25:57');
INSERT INTO `carts` VALUES ('3', '2', '2', '2', '520000', '-', '1', '1', '2024-06-19 12:52:21', '2024-06-19 22:15:29');
INSERT INTO `carts` VALUES ('5', '1', '0', '3', '280000', '-', '1', '3', '2024-06-19 13:16:19', '2024-06-19 22:25:08');
INSERT INTO `carts` VALUES ('6', '1', '2', '4', '355000', '-', '1', '2', '2024-06-19 14:25:57', '2024-06-19 19:22:12');
INSERT INTO `carts` VALUES ('11', '0', '1', '0', '55000', 'Kredit', '1', '2', '2024-06-19 18:40:43', '2024-06-19 18:40:43');
INSERT INTO `carts` VALUES ('12', '0', '0', '1', '150000', 'Kredit', '1', '2', '2024-06-19 18:55:22', '2024-06-19 18:55:22');
INSERT INTO `carts` VALUES ('13', '0', '0', '5', '250000', 'Kredit', '1', '2', '2024-06-19 18:56:52', '2024-06-19 18:56:52');
INSERT INTO `carts` VALUES ('14', '0', '0', '0', '0', '-', '0', '2', '2024-06-19 19:22:12', '2024-06-19 19:41:40');
INSERT INTO `carts` VALUES ('15', '1', '0', '0', '80000', 'COD', '1', '1', '2024-06-19 22:14:53', '2024-06-19 22:14:53');
INSERT INTO `carts` VALUES ('16', '0', '0', '0', '0', '-', '0', '1', '2024-06-19 22:15:29', '2024-06-19 22:15:29');
INSERT INTO `carts` VALUES ('17', '1', '3', '0', '200000', '-', '1', '3', '2024-06-19 22:25:08', '2024-06-19 22:38:00');
INSERT INTO `carts` VALUES ('18', '0', '1', '0', '55000', 'COD', '1', '3', '2024-06-19 22:25:24', '2024-06-19 22:25:24');
INSERT INTO `carts` VALUES ('19', '2', '0', '0', '70000', 'COD', '1', '3', '2024-06-19 22:37:08', '2024-06-19 22:37:08');
INSERT INTO `carts` VALUES ('20', '0', '0', '0', '0', '-', '0', '3', '2024-06-19 22:38:00', '2024-06-20 06:00:15');
INSERT INTO `carts` VALUES ('21', '1', '0', '0', '0', '-', '0', '4', '2024-06-21 03:49:27', '2024-06-21 03:49:27');
INSERT INTO `carts` VALUES ('22', '2', '0', '1', '220000', '-', '1', '5', '2025-02-27 08:42:25', '2025-02-27 08:43:11');
INSERT INTO `carts` VALUES ('23', '0', '0', '0', '0', '-', '0', '5', '2025-02-27 08:43:12', '2025-02-27 08:43:12');

-- ----------------------------
-- Table structure for `failed_jobs`
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
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

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for `jobs`
-- ----------------------------
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of jobs
-- ----------------------------

-- ----------------------------
-- Table structure for `job_batches`
-- ----------------------------
DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of job_batches
-- ----------------------------

-- ----------------------------
-- Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '0001_01_01_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '0001_01_01_000001_create_cache_table', '1');
INSERT INTO `migrations` VALUES ('3', '0001_01_01_000002_create_jobs_table', '1');
INSERT INTO `migrations` VALUES ('4', '2024_06_05_094504_create_bags_table', '2');
INSERT INTO `migrations` VALUES ('5', '2024_06_19_100451_create_carts_table', '3');
INSERT INTO `migrations` VALUES ('6', '2024_06_19_100716_create_shoes_table', '4');
INSERT INTO `migrations` VALUES ('7', '2024_06_19_101338_create_tents_table', '5');

-- ----------------------------
-- Table structure for `password_reset_tokens`
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_reset_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for `sessions`
-- ----------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of sessions
-- ----------------------------
INSERT INTO `sessions` VALUES ('dgmlP6K7NIyXi65y42kkoI03BiYRX3AE6o9A71Q9', '5', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQlFWbDVZWWV3TUJ1a3JYTkg1b3g5WjJqbUNoTndyTTYwZ3k1WDN1RyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9wcm9maWxlIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NTt9', '1740648482');
INSERT INTO `sessions` VALUES ('YKer5kh4U2mznSGlkZFvsNAS0CV092noutxxO3XV', null, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRmhIZ044OUJTOGRxbHo4UExMdWRoWU8xdjcxNDhqZjF5cWNleUVxdiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly9sYXJhdmVsMTFjb21wb3Nlci50ZXN0L2hvbWUiO31zOjIzOiJhZG1pbl9wYXNzd29yZF92ZXJpZmllZCI7YjoxO30=', '1740647193');

-- ----------------------------
-- Table structure for `shoes`
-- ----------------------------
DROP TABLE IF EXISTS `shoes`;
CREATE TABLE `shoes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `brand` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of shoes
-- ----------------------------
INSERT INTO `shoes` VALUES ('0', '-', 'shoes-0.png', '0', '0', '2024-06-05 21:58:50', '2024-06-05 21:58:50');
INSERT INTO `shoes` VALUES ('1', 'Lowa', 'shoe-1.jpeg', '55000', '1', '2024-06-05 19:32:40', '2024-06-19 22:26:24');
INSERT INTO `shoes` VALUES ('2', 'Scarpa', 'shoe-2.jpeg', '150000', '1', '2024-06-05 19:33:14', '2024-06-19 22:17:14');
INSERT INTO `shoes` VALUES ('3', 'La Sportiva', 'shoe-3.jpeg', '120000', '1', '2024-06-05 19:33:31', '2024-06-19 22:39:04');
INSERT INTO `shoes` VALUES ('4', 'Salomon\n\n', 'shoe-4.jpeg', '100000', '1', '2024-06-05 21:58:50', '2024-06-05 21:58:52');

-- ----------------------------
-- Table structure for `tents`
-- ----------------------------
DROP TABLE IF EXISTS `tents`;
CREATE TABLE `tents` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `brand` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of tents
-- ----------------------------
INSERT INTO `tents` VALUES ('0', '-', 'tent-0.png', '0', '0', '2024-06-05 21:58:50', '2024-06-05 21:58:50');
INSERT INTO `tents` VALUES ('1', 'Eiger', 'tent-1.jpeg', '150000', '0', '2024-06-05 19:32:40', '2025-02-27 08:43:11');
INSERT INTO `tents` VALUES ('2', 'Consina', 'tent-2.jpeg', '300000', '1', '2024-06-05 19:33:14', '2024-06-19 22:17:08');
INSERT INTO `tents` VALUES ('3', ' Naturehike', 'tent-3.jpeg', '200000', '1', '2024-06-05 19:33:31', '2024-06-19 22:26:14');
INSERT INTO `tents` VALUES ('4', 'Great Outdoor', 'tent-4.jpeg', '125000', '1', '2024-06-05 21:58:50', '2024-06-19 19:22:12');
INSERT INTO `tents` VALUES ('5', ' Arei', 'tent-5.jpeg', '250000', '1', '2024-06-19 22:44:18', '2024-06-19 18:56:52');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'nu', 'nu@depew.com', null, '$2y$12$6rt7NTYWAZA2baUfoWZCBufNJYtjCkGJ8i4z1wNRh7lRnhP5RztBS', null, '2024-06-05 11:11:45', '2024-06-19 22:15:56');
INSERT INTO `users` VALUES ('2', 'zeta', 'jeta@depew', null, '$2y$12$QjE60Qk72Z29aoT39IyDk.QOkafVREUpP2c5e1Ebr.c1cuQrvtkNK', null, '2024-06-06 01:59:44', '2024-06-06 01:59:44');
INSERT INTO `users` VALUES ('3', 'Ibnu', 'nunu@gamil', null, '$2y$12$ebKp.68cEl5QJ71G2DAIsuqxy56GlQEHUsIEO2y.evqrtgMYGo30S', null, '2024-06-19 22:24:37', '2024-06-19 22:24:37');
INSERT INTO `users` VALUES ('4', 'AMIR', 'amir@gamil', null, '$2y$12$TbciZ2Sv5LJFq7LyI.nB2OQy5OucvhjRKPn7i/BJNnWmyPBbhAl.C', null, '2024-06-21 03:48:03', '2024-06-21 03:48:03');
INSERT INTO `users` VALUES ('5', 'ripki', 'ripki@gamil.com', null, '$2y$12$dj3ggYeYNgOLid3Oe8pN8OJz5MB9L0D0v0Oqx5as6EPmrbDTDT8FK', null, '2025-02-27 08:42:08', '2025-02-27 08:42:08');
