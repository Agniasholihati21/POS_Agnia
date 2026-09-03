-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
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


-- Dumping database structure for pos_agnia
CREATE DATABASE IF NOT EXISTS `pos_agnia` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `pos_agnia`;

-- Dumping structure for table pos_agnia.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_agnia.cache: ~0 rows (approximately)

-- Dumping structure for table pos_agnia.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_agnia.cache_locks: ~0 rows (approximately)

-- Dumping structure for table pos_agnia.failed_jobs
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

-- Dumping data for table pos_agnia.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table pos_agnia.item_penjualan
CREATE TABLE IF NOT EXISTS `item_penjualan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `penjualan_id` bigint unsigned NOT NULL,
  `produk_id` bigint unsigned NOT NULL,
  `kuantitas` int NOT NULL,
  `harga_satuan` int NOT NULL,
  `subtotal` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `item_penjualan_penjualan_id_foreign` (`penjualan_id`),
  KEY `item_penjualan_produk_id_foreign` (`produk_id`),
  CONSTRAINT `item_penjualan_penjualan_id_foreign` FOREIGN KEY (`penjualan_id`) REFERENCES `penjualan` (`id`),
  CONSTRAINT `item_penjualan_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_agnia.item_penjualan: ~20 rows (approximately)
INSERT INTO `item_penjualan` (`id`, `penjualan_id`, `produk_id`, `kuantitas`, `harga_satuan`, `subtotal`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 5, 30000, 150000, '2026-08-04 07:15:18', '2026-08-04 07:15:24'),
	(2, 3, 1, 1, 30000, 30000, '2026-08-05 02:04:05', '2026-08-05 02:04:05'),
	(4, 4, 1, 1, 30000, 30000, '2026-08-05 02:10:06', '2026-08-05 02:10:06'),
	(5, 5, 1, 1, 30000, 30000, '2026-08-05 02:12:29', '2026-08-05 02:12:29'),
	(6, 6, 1, 1, 30000, 30000, '2026-08-05 02:24:10', '2026-08-05 02:24:10'),
	(7, 7, 1, 1, 200000, 200000, '2026-08-05 03:59:40', '2026-08-05 03:59:40'),
	(8, 7, 9, 1, 40000, 40000, '2026-08-05 03:59:43', '2026-08-05 03:59:43'),
	(10, 10, 11, 1, 20000, 20000, '2026-08-10 05:05:43', '2026-08-10 05:05:43'),
	(11, 10, 1, 1, 200000, 200000, '2026-08-10 05:05:46', '2026-08-10 05:05:46'),
	(12, 10, 9, 1, 40000, 40000, '2026-08-10 05:05:51', '2026-08-10 05:05:51'),
	(13, 11, 3, 1, 100000, 100000, '2026-08-10 05:08:03', '2026-08-10 05:08:03'),
	(14, 11, 6, 2, 70000, 140000, '2026-08-10 05:08:06', '2026-08-10 05:08:09'),
	(15, 12, 13, 1, 450000, 450000, '2026-08-10 06:51:18', '2026-08-10 06:51:18'),
	(17, 15, 1, 5, 200000, 1000000, '2026-08-11 02:24:37', '2026-08-11 02:24:41'),
	(18, 16, 3, 1, 100000, 100000, '2026-08-11 02:26:16', '2026-08-11 02:26:16'),
	(19, 16, 8, 1, 50000, 50000, '2026-08-11 02:26:17', '2026-08-11 02:26:17'),
	(21, 18, 11, 1, 20000, 20000, '2026-08-12 06:35:31', '2026-08-12 06:35:31'),
	(22, 20, 7, 2, 60000, 120000, '2026-08-18 06:13:51', '2026-08-18 06:13:51'),
	(28, 29, 7, 3, 60000, 180000, '2026-08-28 02:57:32', '2026-08-28 02:57:32'),
	(30, 30, 13, 1, 450000, 450000, '2026-08-28 02:59:04', '2026-08-28 02:59:04'),
	(32, 32, 1, 5, 200000, 1000000, '2026-09-02 05:50:11', '2026-09-02 05:50:11'),
	(33, 33, 13, 1, 600000, 600000, '2026-09-02 05:51:01', '2026-09-02 05:51:01'),
	(34, 33, 4, 1, 500000, 500000, '2026-09-02 05:51:06', '2026-09-02 05:51:06');

-- Dumping structure for table pos_agnia.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
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

-- Dumping data for table pos_agnia.jobs: ~0 rows (approximately)

-- Dumping structure for table pos_agnia.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
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

-- Dumping data for table pos_agnia.job_batches: ~0 rows (approximately)

-- Dumping structure for table pos_agnia.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_agnia.migrations: ~0 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_roles_table', 1),
	(2, '0001_01_01_000000_create_users_table', 1),
	(3, '0001_01_01_000001_create_cache_table', 1),
	(4, '0001_01_01_000002_create_jobs_table', 1),
	(5, '2026_01_15_013251_create_produk_table', 1),
	(6, '2026_01_15_043522_create_penjualan_table', 1),
	(7, '2026_01_15_044838_create_item_penjualan_table', 1);

-- Dumping structure for table pos_agnia.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_agnia.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table pos_agnia.penjualan
CREATE TABLE IF NOT EXISTS `penjualan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `total_pembayaran` int NOT NULL,
  `metode_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('OPEN','COMPLETED') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `penjualan_user_id_foreign` (`user_id`),
  CONSTRAINT `penjualan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_agnia.penjualan: ~15 rows (approximately)
INSERT INTO `penjualan` (`id`, `user_id`, `total_pembayaran`, `metode_pembayaran`, `status`, `created_at`, `updated_at`) VALUES
	(1, 1, 150000, 'CASH', 'COMPLETED', '2026-08-04 07:15:15', '2026-08-04 07:15:34'),
	(3, 1, 30000, 'QRIS', 'COMPLETED', '2026-08-05 01:50:32', '2026-08-05 02:04:26'),
	(4, 1, 30000, 'CASH', 'COMPLETED', '2026-08-05 02:06:17', '2026-08-05 02:10:14'),
	(5, 2, 30000, 'QRIS', 'COMPLETED', '2026-08-05 02:12:25', '2026-08-05 02:12:42'),
	(6, 2, 30000, 'QRIS', 'COMPLETED', '2026-08-05 02:13:10', '2026-08-05 03:51:30'),
	(7, 1, 240000, 'CASH', 'COMPLETED', '2026-08-05 03:59:34', '2026-08-05 04:00:04'),
	(10, 1, 260000, 'QRIS', 'COMPLETED', '2026-08-10 04:37:39', '2026-08-10 05:06:02'),
	(11, 2, 240000, 'CASH', 'COMPLETED', '2026-08-10 05:07:55', '2026-08-10 05:08:22'),
	(12, 1, 450000, 'CASH', 'COMPLETED', '2026-08-10 06:45:53', '2026-08-10 06:51:48'),
	(15, 1, 1000000, 'CASH', 'COMPLETED', '2026-08-11 02:24:33', '2026-08-11 02:24:48'),
	(16, 2, 150000, 'QRIS', 'COMPLETED', '2026-08-11 02:26:12', '2026-08-11 02:26:27'),
	(18, 1, 20000, 'CASH', 'COMPLETED', '2026-08-12 06:34:28', '2026-08-12 06:35:57'),
	(20, 1, 120000, 'QRIS', 'COMPLETED', '2026-08-18 06:13:34', '2026-08-18 06:14:32'),
	(29, 1, 180000, 'CASH', 'COMPLETED', '2026-08-28 02:57:23', '2026-08-28 02:57:46'),
	(30, 1, 450000, 'QRIS', 'COMPLETED', '2026-08-28 02:58:51', '2026-08-28 02:59:38'),
	(32, 1, 1000000, 'QRIS', 'COMPLETED', '2026-09-01 03:54:54', '2026-09-02 05:50:29'),
	(33, 1, 1100000, 'CASH', 'COMPLETED', '2026-09-02 05:50:57', '2026-09-02 05:51:16');

-- Dumping structure for table pos_agnia.produk
CREATE TABLE IF NOT EXISTS `produk` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_beli` int NOT NULL,
  `harga_jual` int NOT NULL,
  `stok` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `produk_user_id_foreign` (`user_id`),
  KEY `produk_nama_index` (`nama`),
  CONSTRAINT `produk_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_agnia.produk: ~10 rows (approximately)
INSERT INTO `produk` (`id`, `user_id`, `foto`, `nama`, `harga_beli`, `harga_jual`, `stok`, `created_at`, `updated_at`) VALUES
	(1, 1, 'products/2cfmLcNc3PLbOEqAKxLQ2kmVjqE1NjBiYCxjF8bq.jpg', 'Brown Harmony Bouquet', 0, 200000, 90, '2026-08-04 07:14:51', '2026-09-02 05:50:11'),
	(3, 1, 'products/QtK1k7900l4aAoBL2fH76s6FmB0C0geJYxeNvXga.jpg', 'Romantic Rose Mix', 0, 620000, 88, '2026-08-05 03:53:07', '2026-09-01 02:54:10'),
	(4, 1, 'products/3B7rP88dWdH3t42D76RtK8RQrviQA1WZx8MKusBi.jpg', 'Sweet Purple', 0, 500000, 79, '2026-08-05 03:55:26', '2026-09-02 05:51:06'),
	(6, 1, 'products/xFhmtNvwuEVyl03i8oaDErT23nchYASPLg5h2LyV.jpg', 'Lovely Pink Bouquet', 0, 776000, 58, '2026-08-05 03:56:21', '2026-09-01 02:49:37'),
	(7, 1, 'products/zno5C9nIGTU6jewvgaNLVqkCxZNZiXasdKQx6pQm.jpg', 'Blue Dream Bouquet', 0, 650000, 45, '2026-08-05 03:56:50', '2026-09-01 02:46:53'),
	(8, 1, 'products/TQswU95hukiMqPYjhOFq3DA2f51SWrfGoIQiko9D.jpg', 'Sky Blue Bouquet', 0, 749000, 39, '2026-08-05 03:57:34', '2026-09-01 02:45:00'),
	(9, 1, 'products/GjWe9drzTwYT1K6ZBP37Iq7grLfMtRDoyYSg3k9I.jpg', 'Purple Dream Bouquet', 0, 600000, 50, '2026-08-05 03:58:13', '2026-09-01 02:42:34'),
	(10, 1, 'products/jQcqZahtUGp21VXCPX2vAvSkYOZHeXBPW2yq6cb9.jpg', 'Red Romance', 0, 500000, 40, '2026-08-05 03:58:39', '2026-09-01 02:39:18'),
	(11, 1, 'products/rPWdM9UTXTALLWhRIjaasisDzsvsBz6ienIENerJ.jpg', 'Romantic Red', 0, 550000, 30, '2026-08-05 03:59:05', '2026-09-01 02:40:28'),
	(13, 1, 'products/wKMzHlZx9mGrfIVteTAYR5vihmwUtHukXE4hEb5D.jpg', 'Gerbera', 0, 600000, 19, '2026-08-10 06:45:38', '2026-09-02 05:51:01');

-- Dumping structure for table pos_agnia.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_agnia.roles: ~2 rows (approximately)
INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'admin', '2026-07-21 23:25:35', '2026-07-21 23:25:35'),
	(2, 'kasir', '2026-07-21 23:25:36', '2026-07-21 23:25:36');

-- Dumping structure for table pos_agnia.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
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

-- Dumping data for table pos_agnia.sessions: ~1 rows (approximately)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('n37z3bfeYS58azwmExgfjz5Vp8hgPQvuRPqm16Tb', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiekVLZjNZVzFQVUJuYnhOZE93cGRtaFpjVVlKRW1MekVRU1Q0dGxGZCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9kdWsiO3M6NToicm91dGUiO3M6MTI6InByb2R1ay5pbmRleCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1788332476);

-- Dumping structure for table pos_agnia.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  FULLTEXT KEY `users_name_email_fulltext` (`name`,`email`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_agnia.users: ~5 rows (approximately)
INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Dr. Shanelle Cormier V', 'awisozk@example.com', '2026-07-21 23:25:36', '$2y$12$sq0xjT.S3x5u..t6awJob.MwnzeQ0gggmDqTIxX3Vrzdw5vghnk9a', 'S8Xgd0ssRjtskSDWm0wBPDkSLt5V8E0C5TpoQrTKdc4PAuD8NtfYj2x1Q92j', '2026-07-21 23:25:36', '2026-07-21 23:25:36'),
	(2, 2, 'Yasmin Schmeler', 'watsica.kyla@example.org', '2026-07-21 23:25:36', '$2y$12$sq0xjT.S3x5u..t6awJob.MwnzeQ0gggmDqTIxX3Vrzdw5vghnk9a', 'SZfZUShBrOyciOq5nxmv7WmeWeoWeVdlimX0wSSV9evNAjX2meXSXJj9oZSq', '2026-07-21 23:25:36', '2026-07-21 23:25:36'),
	(3, 2, 'Dr. Jessie Crist', 'qwunsch@example.org', '2026-07-21 23:25:36', '$2y$12$sq0xjT.S3x5u..t6awJob.MwnzeQ0gggmDqTIxX3Vrzdw5vghnk9a', '5dQbwG6JekDkjsB9QOclIVN0srADDa0IOaoVuTrMDw5zKks8XKCxCEiVm5Vo', '2026-07-21 23:25:36', '2026-07-21 23:25:36'),
	(4, 1, 'Gabe Reichel', 'hills.guadalupe@example.org', '2026-07-21 23:25:36', '$2y$12$sq0xjT.S3x5u..t6awJob.MwnzeQ0gggmDqTIxX3Vrzdw5vghnk9a', 'tRomv4qRaC', '2026-07-21 23:25:36', '2026-07-21 23:25:36'),
	(5, 1, 'Mr. Roel Murphy III', 'marquardt.myrtie@example.org', '2026-07-21 23:25:36', '$2y$12$sq0xjT.S3x5u..t6awJob.MwnzeQ0gggmDqTIxX3Vrzdw5vghnk9a', 'eSyuWJl449', '2026-07-21 23:25:36', '2026-07-21 23:25:36');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
