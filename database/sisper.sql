-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table sisperv2.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sisperv2.cache: ~0 rows (approximately)
DELETE FROM `cache`;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;

-- Dumping structure for table sisperv2.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sisperv2.cache_locks: ~0 rows (approximately)
DELETE FROM `cache_locks`;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;

-- Dumping structure for table sisperv2.dversi_submits
CREATE TABLE IF NOT EXISTS `dversi_submits` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fakultas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prodi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gelar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pisn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `periode_lulus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dokumen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pdf` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_yudisium` date DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sisperv2.dversi_submits: ~0 rows (approximately)
DELETE FROM `dversi_submits`;
/*!40000 ALTER TABLE `dversi_submits` DISABLE KEYS */;
/*!40000 ALTER TABLE `dversi_submits` ENABLE KEYS */;

-- Dumping structure for table sisperv2.failed_jobs
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

-- Dumping data for table sisperv2.failed_jobs: ~0 rows (approximately)
DELETE FROM `failed_jobs`;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table sisperv2.fakultas
CREATE TABLE IF NOT EXISTS `fakultas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fakultas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dekan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_terbit` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sisperv2.fakultas: ~2 rows (approximately)
DELETE FROM `fakultas`;
/*!40000 ALTER TABLE `fakultas` DISABLE KEYS */;
INSERT INTO `fakultas` (`id`, `fakultas`, `dekan`, `nik`, `tanggal_terbit`, `created_at`, `updated_at`) VALUES
	(1, 'Farmasi', 'apt. Eka Fitri Susiani, M.Sc.', '010512024', '2025-03-14', NULL, NULL),
	(2, 'Ilmu Kesehatan Dan Sains Teknologi', 'Eny Hastuti, S.KM., M.Pd., M.PH', '020418099', '2025-03-14', NULL, NULL),
	(3, 'Ilmu Sosial Dan Humaniora', 'Rahmiati', '1', '2025-03-14', NULL, '2025-03-15 14:22:10');
/*!40000 ALTER TABLE `fakultas` ENABLE KEYS */;

-- Dumping structure for table sisperv2.forpis
CREATE TABLE IF NOT EXISTS `forpis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sisperv2.forpis: ~0 rows (approximately)
DELETE FROM `forpis`;
/*!40000 ALTER TABLE `forpis` DISABLE KEYS */;
/*!40000 ALTER TABLE `forpis` ENABLE KEYS */;

-- Dumping structure for table sisperv2.forpi_submits
CREATE TABLE IF NOT EXISTS `forpi_submits` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `prodi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gelar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pisn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `masuk` year(4) DEFAULT NULL,
  `tanggal_yudisium` date DEFAULT NULL,
  `judul` text COLLATE utf8mb4_unicode_ci,
  `toefl` smallint(5) unsigned DEFAULT '0',
  `kejuaraan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sertifikat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `beasiswa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organisasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `periode_lulus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dokumen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sisperv2.forpi_submits: ~0 rows (approximately)
DELETE FROM `forpi_submits`;
/*!40000 ALTER TABLE `forpi_submits` DISABLE KEYS */;
/*!40000 ALTER TABLE `forpi_submits` ENABLE KEYS */;

-- Dumping structure for table sisperv2.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sisperv2.jobs: ~0 rows (approximately)
DELETE FROM `jobs`;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;

-- Dumping structure for table sisperv2.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sisperv2.job_batches: ~0 rows (approximately)
DELETE FROM `job_batches`;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;

-- Dumping structure for table sisperv2.lapors
CREATE TABLE IF NOT EXISTS `lapors` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lapor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sisperv2.lapors: ~0 rows (approximately)
DELETE FROM `lapors`;
/*!40000 ALTER TABLE `lapors` DISABLE KEYS */;
/*!40000 ALTER TABLE `lapors` ENABLE KEYS */;

-- Dumping structure for table sisperv2.mahasiswas
CREATE TABLE IF NOT EXISTS `mahasiswas` (
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `fakultas` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `prodi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gelar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skpi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ijazah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pisn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `periode_lulus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_yudisium` date NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`nim`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sisperv2.mahasiswas: ~0 rows (approximately)
DELETE FROM `mahasiswas`;
/*!40000 ALTER TABLE `mahasiswas` DISABLE KEYS */;
/*!40000 ALTER TABLE `mahasiswas` ENABLE KEYS */;

-- Dumping structure for table sisperv2.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sisperv2.migrations: ~18 rows (approximately)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2025_02_18_005254_create_entries_table', 1),
	(6, '2025_02_26_043330_create_mahasiswas_table', 2),
	(7, '0001_01_01_000000_create_users_table', 3),
	(8, '0001_01_01_000001_create_cache_table', 3),
	(9, '0001_01_01_000002_create_jobs_table', 4),
	(10, '2025_03_01_153706_create_forpis_table', 4),
	(11, '2025_03_03_005259_submits', 4),
	(12, '2025_03_01_054420_create_portals_table', 5),
	(13, '2025_03_04_025240_create_posts_table', 5),
	(14, '2025_03_11_151140_create_settings_table', 6),
	(15, '2025_03_13_011034_create_lapors_table', 7),
	(16, '2025_03_14_183427_create_dversi_submits_table', 8),
	(17, '2025_03_14_224341_create_dversi_settings_table', 9),
	(18, '2025_03_14_231743_create_rektors_table', 10);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table sisperv2.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sisperv2.password_reset_tokens: ~0 rows (approximately)
DELETE FROM `password_reset_tokens`;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;

-- Dumping structure for table sisperv2.personal_access_tokens
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

-- Dumping data for table sisperv2.personal_access_tokens: ~0 rows (approximately)
DELETE FROM `personal_access_tokens`;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Dumping structure for table sisperv2.portals
CREATE TABLE IF NOT EXISTS `portals` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sisperv2.portals: ~0 rows (approximately)
DELETE FROM `portals`;
/*!40000 ALTER TABLE `portals` DISABLE KEYS */;
/*!40000 ALTER TABLE `portals` ENABLE KEYS */;

-- Dumping structure for table sisperv2.posts
CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sisperv2.posts: ~0 rows (approximately)
DELETE FROM `posts`;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;

-- Dumping structure for table sisperv2.prodis
CREATE TABLE IF NOT EXISTS `prodis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `prodi` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kaprodi` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_terbit` date DEFAULT NULL,
  `akreditasi` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_akreditasi` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sisperv2.prodis: ~9 rows (approximately)
DELETE FROM `prodis`;
/*!40000 ALTER TABLE `prodis` DISABLE KEYS */;
INSERT INTO `prodis` (`id`, `prodi`, `kaprodi`, `nik`, `tanggal_terbit`, `akreditasi`, `no_akreditasi`, `created_at`, `updated_at`) VALUES
	(1, 'Diploma Tiga Analis Kesehatan', 'Muhammad Arsyad, S.ST., M. Kes', '010912030', '2025-03-22', 'Program Studi : Baik Sekali', 'SK LAM PT Kes nomor: 0619/LAM-PTKes/Akr/Dip/VII/2022', NULL, '2025-03-23 02:05:16'),
	(2, 'Diploma Tiga Farmasi', 'Muhammad Hidayatullah', '0', '2025-03-23', 'Program Studi : Baik Sekali', 'SK LAM PT Kes Nomor : 0322/LAM-PTKes/Akr/Sar/VI/2019', NULL, '2025-03-23 03:17:37'),
	(3, 'Sarjana Administrasi Rumah Sakit', 'Liana Fitriani Hasymi, S.Pi, S.Kes', '010915075', NULL, NULL, NULL, NULL, NULL),
	(4, 'Sarjana Bisnis Digital', 'Ibrahim Rully Effendy, S.Kom, MM', '31', '2025-03-11', NULL, NULL, NULL, '2025-03-15 14:17:13'),
	(5, 'Sarjana Farmasi', 'Nur Rahmiati, M.Farm', '33232', '2025-03-11', 'Program Studi : Baik Sekali', 'LAM-PTKes Nomor : 0322/LAM-PTKes/Akr/Sar/VI/2019', NULL, '2025-03-21 11:41:42'),
	(6, 'Sarjana Gizi', 'yustin', NULL, NULL, NULL, NULL, NULL, NULL),
	(7, 'Sarjana Hukum', 'khairunnisa', NULL, NULL, NULL, NULL, NULL, NULL),
	(8, 'Sarjana Manajemen', 'hidayatullah as', NULL, NULL, NULL, NULL, NULL, NULL),
	(9, 'Sarjana Pendidikan Guru Sekolah Dasar', '', NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `prodis` ENABLE KEYS */;

-- Dumping structure for table sisperv2.rektors
CREATE TABLE IF NOT EXISTS `rektors` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sisperv2.rektors: ~0 rows (approximately)
DELETE FROM `rektors`;
/*!40000 ALTER TABLE `rektors` DISABLE KEYS */;
INSERT INTO `rektors` (`id`, `nama`, `nik`, `jabatan`, `created_at`, `updated_at`) VALUES
	(1, 'Dr. Ir. Neni Widaningsih, S. Pt., M.P., IPU', '231224196', 'Rektor', NULL, '2025-03-15 14:17:21');
/*!40000 ALTER TABLE `rektors` ENABLE KEYS */;

-- Dumping structure for table sisperv2.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nim` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pisn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sisperv2.users: ~2 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `role`, `menu`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `nim`, `pisn`, `foto`) VALUES
	(1, 'admin', 'admin', 'forpi', 'forpi.sisper@unbl.ac.id', '2025-02-21 14:30:24', '$2y$12$MNtinFYZqJC5uZnSxdH97us.rTcQU0nh2keBEXwXtON1Ymwj6gLFK', NULL, NULL, NULL, 'forpi', 'iprof', '0'),
	(2, '1', 'user', 'forpi', '1', NULL, '$2y$10$4Nw1YglFINNdwvOgK3iP5OS0AifTMd7qe7GFdpF890U4xzoKVKm3W', NULL, NULL, NULL, '1', '1', '0');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
