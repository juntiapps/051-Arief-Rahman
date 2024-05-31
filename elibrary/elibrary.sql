-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table elibrary.books
CREATE TABLE IF NOT EXISTS `books` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `category_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `synopsis` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `publisher` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table elibrary.books: ~11 rows (approximately)
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` (`id`, `title`, `author`, `stock`, `category_id`, `cover`, `synopsis`, `year`, `publisher`, `created_at`, `updated_at`) VALUES
	(3, 'Book One', 'Author A', 11, '10,12', 'https://picsum.photos/id/10/210/290', 'This is the synopsis for Book One. This is the synopsis for Book One.', 2001, 'Publisher One', '2024-05-25 08:23:35', '2024-05-27 03:51:52'),
	(4, 'Book Two', 'Author A', 28, '10,12,4', 'https://picsum.photos/id/11/210/290', 'This is the synopsis for Book Two.', 2002, 'Publisher Two', '2024-05-25 08:23:35', '2024-05-27 02:59:21'),
	(5, 'Book Three', 'Author C', 16, '10', 'https://picsum.photos/id/12/210/290', 'This is the synopsis for Book Three.', 2003, 'Publisher Three', '2024-05-25 08:23:35', '2024-05-27 02:59:21'),
	(6, 'Book Four', 'Author E', 48, '10', 'https://picsum.photos/id/13/210/290', 'This is the synopsis for Book Four.', 2004, 'Publisher Four', '2024-05-25 08:23:35', '2024-05-27 02:59:21'),
	(7, 'Book Five', 'Author A', 5, '10,12', 'https://picsum.photos/id/14/210/290', 'This is the synopsis for Book Five.', 2005, 'Publisher Five', '2024-05-25 08:23:35', '2024-05-27 02:59:21'),
	(8, 'Book Six', 'Author B', 1, '10,12', 'https://picsum.photos/id/15/210/290', 'This is the synopsis for Book Six.', 2006, 'Publisher Six', '2024-05-25 08:23:35', '2024-05-27 02:59:21'),
	(9, 'Book Seven', 'Author A', 17, '10', 'https://picsum.photos/id/16/210/290', 'This is the synopsis for Book Seven.', 2007, 'Publisher Seven', '2024-05-25 08:23:35', '2024-05-27 02:59:21'),
	(10, 'Book Eight', 'Author A', 33, '10,12', 'https://picsum.photos/id/17/210/290', 'This is the synopsis for Book Eight.', 2008, 'Publisher Eight', '2024-05-25 08:23:35', '2024-05-27 02:59:21'),
	(11, 'Book Nine', 'Author C', 22, '10,12', 'https://picsum.photos/id/18/210/290', 'This is the synopsis for Book Nine.', 2009, 'Publisher Nine', '2024-05-25 08:23:35', '2024-05-27 02:59:21'),
	(12, 'Book Ten', 'Author B', 26, '10,12,4', 'https://picsum.photos/id/19/210/290', 'This is the synopsis for Book Ten.', 2010, 'Publisher Ten', '2024-05-25 08:23:35', '2024-05-27 02:59:21'),
	(13, 'Book Eleven', 'Author F', 10, '4,5', 'https://picsum.photos/id/20/210/290', 'The synopsis of Book Eleven', 2020, 'Publisher Two', '2024-05-27 04:01:19', '2024-05-27 04:01:19');
/*!40000 ALTER TABLE `books` ENABLE KEYS */;

-- Dumping structure for table elibrary.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table elibrary.categories: ~27 rows (approximately)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(4, 'Musik', '2024-05-25 06:34:54', '2024-05-25 06:34:54'),
	(5, 'Fiksi', '2024-05-25 06:35:35', '2024-05-25 06:35:35'),
	(6, 'Non-Fiksi', '2024-05-25 06:35:35', '2024-05-25 06:35:35'),
	(7, 'Fiksi Ilmiah', '2024-05-25 06:35:35', '2024-05-25 06:35:35'),
	(8, 'Fantasi', '2024-05-25 06:35:35', '2024-05-25 06:35:35'),
	(9, 'Misteri', '2024-05-25 06:35:35', '2024-05-25 06:35:35'),
	(10, 'Thriller', '2024-05-25 06:35:35', '2024-05-25 06:35:35'),
	(11, 'Romansa', '2024-05-25 06:35:35', '2024-05-25 06:35:35'),
	(12, 'Horor', '2024-05-25 06:35:35', '2024-05-25 06:35:35'),
	(13, 'Biografi', '2024-05-25 06:35:35', '2024-05-25 06:35:35'),
	(14, 'Pengembangan Diri', '2024-05-25 06:35:35', '2024-05-25 06:35:35'),
	(15, 'Sejarah', '2024-05-25 06:35:35', '2024-05-25 06:35:35'),
	(16, 'Anak-Anak', '2024-05-25 06:35:35', '2024-05-25 06:35:35'),
	(17, 'Remaja', '2024-05-25 06:35:35', '2024-05-25 06:35:35'),
	(18, 'Perjalanan', '2024-05-25 06:35:35', '2024-05-25 06:35:35'),
	(19, 'Masakan', '2024-05-25 06:35:35', '2024-05-25 06:35:35'),
	(20, 'Kesehatan', '2024-05-25 06:35:35', '2024-05-25 06:35:35'),
	(21, 'Novel Grafis', '2024-05-25 06:35:35', '2024-05-25 06:35:35'),
	(22, 'Puisi', '2024-05-25 06:35:35', '2024-05-25 06:35:35'),
	(23, 'Religi', '2024-05-25 06:35:35', '2024-05-25 06:35:35'),
	(24, 'Sains', '2024-05-25 06:35:35', '2024-05-25 06:35:35'),
	(25, 'Teknologi', '2024-05-25 06:35:35', '2024-05-25 06:35:35'),
	(26, 'Bisnis', '2024-05-25 06:35:35', '2024-05-25 06:35:35'),
	(27, 'Seni', '2024-05-25 06:35:35', '2024-05-25 06:35:35'),
	(28, 'Musik', '2024-05-25 06:35:35', '2024-05-25 06:35:35');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Dumping structure for table elibrary.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table elibrary.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table elibrary.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table elibrary.migrations: ~10 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2024_05_24_073625_create_categories_table', 1),
	(6, '2024_05_24_073636_create_books_table', 1),
	(7, '2024_05_24_073653_create_transaction_table', 1),
	(8, '2024_05_25_064850_change_column_type_in_book_table', 2),
	(9, '2024_05_27_024110_add_details_to_books_table', 3),
	(10, '2024_05_27_114701_create_param_table', 4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table elibrary.params
CREATE TABLE IF NOT EXISTS `params` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table elibrary.params: ~0 rows (approximately)
/*!40000 ALTER TABLE `params` DISABLE KEYS */;
INSERT INTO `params` (`id`, `harga`, `created_at`, `updated_at`) VALUES
	(1, 2000, '2024-05-27 11:58:22', '2024-05-27 11:58:22');
/*!40000 ALTER TABLE `params` ENABLE KEYS */;

-- Dumping structure for table elibrary.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table elibrary.password_reset_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;

-- Dumping structure for table elibrary.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
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

-- Dumping data for table elibrary.personal_access_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Dumping structure for table elibrary.transactions
CREATE TABLE IF NOT EXISTS `transactions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_id` int(11) NOT NULL,
  `borrow_date` date DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table elibrary.transactions: ~8 rows (approximately)
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT INTO `transactions` (`id`, `order_id`, `book_id`, `borrow_date`, `return_date`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
	(1, '20240527_2_134114', 4, '2024-05-27', '2024-05-29', 2, 2, '2024-05-27 08:34:29', '2024-05-28 10:03:29'),
	(2, '20240527_2_134114', 3, '2024-05-27', '2024-05-29', 2, 2, '2024-05-27 08:35:24', '2024-05-28 10:03:29'),
	(3, '20240529_3_040700', 10, '2024-05-29', '2024-05-31', 3, 1, '2024-05-29 03:27:55', '2024-05-29 04:07:07'),
	(5, '20240529_3_040818', 5, '2024-05-29', '2024-05-31', 3, 1, '2024-05-29 04:07:51', '2024-05-29 04:08:27'),
	(6, '20240529_3_040818', 6, '2024-05-29', '2024-05-31', 3, 1, '2024-05-29 04:08:07', '2024-05-29 04:08:27'),
	(7, '20240529_3_041005', 8, '2024-05-29', '2024-05-31', 3, 1, '2024-05-29 04:10:02', '2024-05-29 04:10:14'),
	(8, '20240529_3_041627', 13, '2024-05-29', '2024-05-31', 3, 3, '2024-05-29 04:10:51', '2024-05-29 06:21:32');
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;

-- Dumping structure for table elibrary.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table elibrary.users: ~4 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Admin User 3', 'admin@example.com', NULL, '$2y$12$F4YO/iQJSheHhUhPCKqlPuSfIQesR/gI43Hw6i3YBH7jP4VlUdfS2', '0', NULL, '2024-05-24 07:52:17', '2024-05-24 10:30:47'),
	(2, 'Arief Rahman', 'arief.rahman.6791@gmail.com', NULL, '$2y$12$JFmjR92IqG/l4jR2QR4DGORPQ/YJoN763d1UCSSaa9fx3h.6gJQcC', '1', NULL, '2024-05-24 11:19:21', '2024-05-24 11:19:21'),
	(3, 'Rahman Ariaf', 'arief@juntiapps.com', NULL, '$2y$12$fP0.lia.z1wcWgr5kxVDuO9nEfgSDXC1XF9LSeuGzMu2aD/7DbGtu', '1', NULL, '2024-05-24 13:30:50', '2024-05-24 13:30:50');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
