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

-- Dumping structure for table sisper.dversis
CREATE TABLE IF NOT EXISTS `dversis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ttl` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pisn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fakultas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prodi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lulus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gelar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ijazah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sisper.dversis: ~33 rows (approximately)
/*!40000 ALTER TABLE `dversis` DISABLE KEYS */;
INSERT INTO `dversis` (`id`, `nama`, `ttl`, `nim`, `nik`, `pisn`, `fakultas`, `prodi`, `lulus`, `gelar`, `ijazah`, `created_at`, `updated_at`) VALUES
	(1, 'AHMAD SYAHRUL', 'KELUA, 15 OKTOBER 2001', 'SA20001', '6309021510010004', '111031132612024100001', 'ILMU KESEHATAN DAN SAINS TEKNOLOGI', 'ADMINISTRASI RUMAH SAKIT', '30 AGUSTUS 2024', 'Sarjana Kesehatan (S.Kes)', '1iBUv6qOBBH1Sytd8FaIPTNJFHjsFSRtb', NULL, NULL),
	(2, 'ANITA PUTRI FATONAH', 'KOTA BARU, 17 JANUARI 2002', 'SA20002', '6310055701020001', '111031132612024100002', 'ILMU KESEHATAN DAN SAINS TEKNOLOGI', 'ADMINISTRASI RUMAH SAKIT', '30 AGUSTUS 2024', 'Sarjana Kesehatan (S.Kes)', '1wvBOT0HYGKBgFpWBt1JzM76JnX9Qx7Qh', NULL, NULL),
	(3, 'ASSYIFA FITRIA WAHDATI', 'HULU SUNGAI TENGAH, 29 OKTOBER 2002', 'SA20003', '6307076910020003', '111031132612024100003', 'ILMU KESEHATAN DAN SAINS TEKNOLOGI', 'ADMINISTRASI RUMAH SAKIT', '30 AGUSTUS 2024', 'Sarjana Kesehatan (S.Kes)', '1jNnAdnETEPbsmVcueLVOtBFLS1biX1D7', NULL, NULL),
	(4, 'BAYU PANGESTU', 'MUARA TEWEH, 07 MEI 2003', 'SA20004', '6205050405030001', '111031132612024100004', 'ILMU KESEHATAN DAN SAINS TEKNOLOGI', 'ADMINISTRASI RUMAH SAKIT', '30 AGUSTUS 2024', 'Sarjana Kesehatan (S.Kes)', '1rMDwRLAoD7rkvyJXkqFxYmNMMYEqla4W', NULL, NULL),
	(5, 'DENISA VIONA ANGGRAENI', 'KUALA KAPUAS, 23 DESEMBER 2001', 'SA20005', '6371016312010005', '111031132612024100005', 'ILMU KESEHATAN DAN SAINS TEKNOLOGI', 'ADMINISTRASI RUMAH SAKIT', '30 AGUSTUS 2024', 'Sarjana Kesehatan (S.Kes)', '1OuvfMnM0hijuETTR2NzMccYmMRWDPj49', NULL, NULL),
	(6, 'DEVITA DELLA AMELIA', 'MARTAPURA, 15 JUNI 2001', 'SA20006', '6372055506010001', '111031132612024100006', 'ILMU KESEHATAN DAN SAINS TEKNOLOGI', 'ADMINISTRASI RUMAH SAKIT', '30 AGUSTUS 2024', 'Sarjana Kesehatan (S.Kes)', '1XWgh5X1kwKZ-99Tsg5lUrqGb8xs6Qmxz', NULL, NULL),
	(7, 'DINA NURIYATI', 'LALAYAU, 23 FEBRUARI 2003', 'SA20007', '6311016302030004', '111031132612024100007', 'ILMU KESEHATAN DAN SAINS TEKNOLOGI', 'ADMINISTRASI RUMAH SAKIT', '30 AGUSTUS 2024', 'Sarjana Kesehatan (S.Kes)', '1SC4dzHY_i6E54ebqFNcgzCC289-pf1DV', NULL, NULL),
	(8, 'DUNA', 'HULU SUNGAI SELATAN, 17 SEPTEMBER 2001', 'SA20008', '6306105709010001', '111031132612024100008', 'ILMU KESEHATAN DAN SAINS TEKNOLOGI', 'ADMINISTRASI RUMAH SAKIT', '30 AGUSTUS 2024', 'Sarjana Kesehatan (S.Kes)', '17ddJmY-7QcBZoQv91R_jVVs0eld-nZqh', NULL, NULL),
	(9, 'FATHIAH', 'MARTAPURA, 27 MARET 2003', 'SA20009', '6303076703030005', '111031132612024100009', 'ILMU KESEHATAN DAN SAINS TEKNOLOGI', 'ADMINISTRASI RUMAH SAKIT', '30 AGUSTUS 2024', 'Sarjana Kesehatan (S.Kes)', '12gUCxQ-7vqbQ34r9ZqM_pZGCHX4RtkB0', NULL, NULL),
	(10, 'FLORIDA SINTANI', 'TABAK KANILAN, 12 MARET 2002', 'SA20010', '6207025203020002', '111031132612024100010', 'ILMU KESEHATAN DAN SAINS TEKNOLOGI', 'ADMINISTRASI RUMAH SAKIT', '30 AGUSTUS 2024', 'Sarjana Kesehatan (S.Kes)', '1d-rsLt-uOpQbCWpPEQwkfAAP-VJ9sGHN', NULL, NULL),
	(11, 'GHINA LAILATURRAHMAH', 'TANAH LAUT, 04 OKTOBER 2002', 'SA20012', '6301034410020010', '111031132612024100011', 'ILMU KESEHATAN DAN SAINS TEKNOLOGI', 'ADMINISTRASI RUMAH SAKIT', '30 AGUSTUS 2024', 'Sarjana Kesehatan (S.Kes)', '16ZIqyKPaBFp_pWvNLJ4bBtbBMNgFCwZS', NULL, NULL),
	(12, 'MUHAMMAD FEBRIYAN', 'BANJARMASIN, 11 FEBRUARI 2001', 'SA20013', '6371011102010007', '111031132612024100012', 'ILMU KESEHATAN DAN SAINS TEKNOLOGI', 'ADMINISTRASI RUMAH SAKIT', '30 AGUSTUS 2024', 'Sarjana Kesehatan (S.Kes)', '1Azi1VvD_cPjTt7KD2dV4B3yQ6t9nIKh_', NULL, NULL),
	(13, 'MUHAMMAD RIZKY FIRZATULLAH', 'BANDUNG, 10 APRIL 2002', 'SA20015', '6303051004020007', '111031132612024100013', 'ILMU KESEHATAN DAN SAINS TEKNOLOGI', 'ADMINISTRASI RUMAH SAKIT', '30 AGUSTUS 2024', 'Sarjana Kesehatan (S.Kes)', '1XlJE8l30I16XsNwypVW0NiqdtmORFylP', NULL, NULL),
	(14, 'MUHAMMAD WILDAN', 'TABALONG, 16 APRIL 2002', 'SA20016', '6309111604020002', '111031132612024100014', 'ILMU KESEHATAN DAN SAINS TEKNOLOGI', 'ADMINISTRASI RUMAH SAKIT', '30 AGUSTUS 2024', 'Sarjana Kesehatan (S.Kes)', '1Tlj65FsSdHRx3rA9OK9HgZBu5InQ2JGu', NULL, NULL),
	(15, 'NISA APRILIYANI', 'TANAH LAUT, 17 APRIL 2002', 'SA20019', '6301075704020001', '111031132612024100015', 'ILMU KESEHATAN DAN SAINS TEKNOLOGI', 'ADMINISTRASI RUMAH SAKIT', '30 AGUSTUS 2024', 'Sarjana Kesehatan (S.Kes)', '1370rk8pXrDFUNG-n3fXGRVojpST7rwQx', NULL, NULL),
	(16, 'NOOR\'AIDA', 'TANAH LAUT, 25 JUNI 2002', 'SA20020', '6301046506020001', '111031132612024100016', 'ILMU KESEHATAN DAN SAINS TEKNOLOGI', 'ADMINISTRASI RUMAH SAKIT', '30 AGUSTUS 2024', 'Sarjana Kesehatan (S.Kes)', '1lo52MPWqVC_CrgVJ9CheBvAW66Yg89sg', NULL, NULL),
	(17, 'NOR AIDA SARI', 'BATUNG, 02 JUNI 2001', 'SA20021', '6306104206010001', '111031132612024100017', 'ILMU KESEHATAN DAN SAINS TEKNOLOGI', 'ADMINISTRASI RUMAH SAKIT', '30 AGUSTUS 2024', 'Sarjana Kesehatan (S.Kes)', '1t0kj-vFtRoCyTZd3d_mA93HdxXAfnr_u', NULL, NULL),
	(18, 'NURUL HUDA', 'ASTAMBUL, 12 MEI 2002', 'SA20022', '6303075205020004', '111031132612024100018', 'ILMU KESEHATAN DAN SAINS TEKNOLOGI', 'ADMINISTRASI RUMAH SAKIT', '30 AGUSTUS 2024', 'Sarjana Kesehatan (S.Kes)', '1Eb730MIseLy6sy-P-l5_pt8sfb0G7XZR', NULL, NULL),
	(19, 'RAHMAT RAMA MAULANA', 'BANJARMASIN, 24 NOVEMBER 2001', 'SA20023', '6371022411010005', '111031132612024100019', 'ILMU KESEHATAN DAN SAINS TEKNOLOGI', 'ADMINISTRASI RUMAH SAKIT', '30 AGUSTUS 2024', 'Sarjana Kesehatan (S.Kes)', '1bSnRIOhYrsk07qcjc_OpFf7gH160xRgs', NULL, NULL),
	(20, 'RETNO ISTIANA', 'TANAH LAUT, 23 APRIL 2002', 'SA20024', '6301086304020004', '111031132612024100020', 'ILMU KESEHATAN DAN SAINS TEKNOLOGI', 'ADMINISTRASI RUMAH SAKIT', '30 AGUSTUS 2024', 'Sarjana Kesehatan (S.Kes)', '1lN4kl8KUhv5J0oLM-xm15QwRNIi7rfeq', NULL, NULL),
	(21, 'RISDA ARIYANTI', 'ALABIO, 09 MARET 2002', 'SA20025', '6308034903020005', '111031132612024100021', 'ILMU KESEHATAN DAN SAINS TEKNOLOGI', 'ADMINISTRASI RUMAH SAKIT', '30 AGUSTUS 2024', 'Sarjana Kesehatan (S.Kes)', '1xf6ZNAZyNnY4uQ-ZG2ZL04MpcNDUg6iA', NULL, NULL),
	(22, 'RITA SAFITRI', 'KOTABARU, 28 AGUSTUS 2002', 'SA20026', '6310075808020001', '111031132612024100022', 'ILMU KESEHATAN DAN SAINS TEKNOLOGI', 'ADMINISTRASI RUMAH SAKIT', '30 AGUSTUS 2024', 'Sarjana Kesehatan (S.Kes)', '11VB3QgjkF4SAn3DmUm5xuSJZ8KpucXEv', NULL, NULL),
	(23, 'SHAILLA KHOFISAH', 'PENGARON, 14 APRIL 2002', 'SA20027', '6303095404020003', '111031132612024100023', 'ILMU KESEHATAN DAN SAINS TEKNOLOGI', 'ADMINISTRASI RUMAH SAKIT', '30 AGUSTUS 2024', 'Sarjana Kesehatan (S.Kes)', '1wP_CpmSYQdC1DJvWIYDCb5dl85NWVsEC', NULL, NULL),
	(24, 'SRI WULANDARI', 'TANJUNG LALAK, 30 MARET 2002', 'SA20028', '6302177003020002', '111031132612024100024', 'ILMU KESEHATAN DAN SAINS TEKNOLOGI', 'ADMINISTRASI RUMAH SAKIT', '30 AGUSTUS 2024', 'Sarjana Kesehatan (S.Kes)', '1ZptsNTUjxLaaombmzrAg2h0NTi1DLr5H', NULL, NULL),
	(25, 'SUFIA HIDAYAH', 'BANJARBARU, 05 JUNI 2001', 'SA20029', '6306054506010003', '111031132612024100025', 'ILMU KESEHATAN DAN SAINS TEKNOLOGI', 'ADMINISTRASI RUMAH SAKIT', '30 AGUSTUS 2024', 'Sarjana Kesehatan (S.Kes)', '1qH1lltXzqVuUC40PLyH6h7bT_iMT_di_', NULL, NULL),
	(26, 'WULAN', 'BENUA ANYAR, 17 DESEMBER 2002', 'SA20030', '6303075712020001', '111031132612024100026', 'ILMU KESEHATAN DAN SAINS TEKNOLOGI', 'ADMINISTRASI RUMAH SAKIT', '30 AGUSTUS 2024', 'Sarjana Kesehatan (S.Kes)', '112zeB4ZT8qkTyMS94cYtfIYgIar-72dG', NULL, NULL),
	(27, 'SITI ANISYAH', 'KOTABARU, 25 JULI 2002', 'SA20031', '6302066707020001', '111031132612024100027', 'ILMU KESEHATAN DAN SAINS TEKNOLOGI', 'ADMINISTRASI RUMAH SAKIT', '30 AGUSTUS 2024', 'Sarjana Kesehatan (S.Kes)', '1X85og1UA6sCR-XRiTAdhHIwu_DuKWasA', NULL, NULL),
	(28, 'ALDA', 'TANAH LAUT, 18 SEPTEMBER 2001', 'SA20032', '6301075809010001', '111031132612024100028', 'ILMU KESEHATAN DAN SAINS TEKNOLOGI', 'ADMINISTRASI RUMAH SAKIT', '30 AGUSTUS 2024', 'Sarjana Kesehatan (S.Kes)', '1NIVeiWrAmM7VDXZphevEr701tUUyR0DR', NULL, NULL),
	(29, 'DARA ADISA', 'SUNGAI DANAU,26 FEBRUARI 2002', 'SA20033', '6301076602020001', '111031132612024100029', 'ILMU KESEHATAN DAN SAINS TEKNOLOGI', 'ADMINISTRASI RUMAH SAKIT', '30 AGUSTUS 2024', 'Sarjana Kesehatan (S.Kes)', '1pKDYHGM686T3zN8owdW_OJiFe4HKMmZH', NULL, NULL),
	(30, 'ANGGI NOORSOPIE MAHARANI', 'MARABAHAN, 17 MEI 2002', 'SA20034', '6371035705020015', '111031132612024100030', 'ILMU KESEHATAN DAN SAINS TEKNOLOGI', 'ADMINISTRASI RUMAH SAKIT', '30 AGUSTUS 2024', 'Sarjana Kesehatan (S.Kes)', '1GLY4q5jfUAdaOGtZ__PciXQsncCJmILr', NULL, NULL),
	(31, 'ISSANAIS SHOBAH', 'TANAH LAUT, 27 AGUSTUS 2002', 'SA20035', '6301056708020002', '111031132612024100031', 'ILMU KESEHATAN DAN SAINS TEKNOLOGI', 'ADMINISTRASI RUMAH SAKIT', '30 AGUSTUS 2024', 'Sarjana Kesehatan (S.Kes)', '1sm3FKIQmHulolkvmm6CHRYXO9Ypy7TfJ', NULL, NULL),
	(32, 'MUHAMMAD RAFI RAMADHAN', 'SLEMAN, 22 DESEMBER 2000', 'SA20037', '6471032212000004', '111031132612024100032', 'ILMU KESEHATAN DAN SAINS TEKNOLOGI', 'ADMINISTRASI RUMAH SAKIT', '30 AGUSTUS 2024', 'Sarjana Kesehatan (S.Kes)', '14qDIYhVSHLrWm1gG7V1PpcR_A9Pj5pjE', NULL, NULL),
	(33, 'ZAHRA FAKHRIYAH EFFENDI', 'DEMAK, 28 OKTOBER 2002', 'SA20039', '6371046810020005', '111031132612024100033', 'ILMU KESEHATAN DAN SAINS TEKNOLOGI', 'ADMINISTRASI RUMAH SAKIT', '30 AGUSTUS 2024', 'Sarjana Kesehatan (S.Kes)', '1MxSTZlDOGoDGDmzcO1JrK9rmJENuf-PC', NULL, NULL);
/*!40000 ALTER TABLE `dversis` ENABLE KEYS */;

-- Dumping structure for table sisper.dversi_verifikasis
CREATE TABLE IF NOT EXISTS `dversi_verifikasis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ttl` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pisn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fakultas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prodi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lulus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gelar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ijazah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verifikasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sisper.dversi_verifikasis: ~1 rows (approximately)
/*!40000 ALTER TABLE `dversi_verifikasis` DISABLE KEYS */;
INSERT INTO `dversi_verifikasis` (`id`, `nama`, `ttl`, `nim`, `nik`, `pisn`, `fakultas`, `prodi`, `lulus`, `gelar`, `ijazah`, `verifikasi`, `created_at`, `updated_at`) VALUES
	(1, 'FATHIAH', 'MARTAPURA, 27 MARET 2003', 'SA20009', '6303076703030005', '111031132612024100009', 'ILMU KESEHATAN DAN SAINS TEKNOLOGI', 'ADMINISTRASI RUMAH SAKIT', '30 AGUSTUS 2024', 'Sarjana Kesehatan (S.Kes)', 'https://drive.google.com/uc?id=12gUCxQ-7vqbQ34r9ZqM_pZGCHX4RtkB0', '22-09-2024 01:25:09', '2024-09-22 01:26:38', '2024-09-22 01:26:38');
/*!40000 ALTER TABLE `dversi_verifikasis` ENABLE KEYS */;

-- Dumping structure for table sisper.failed_jobs
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

-- Dumping data for table sisper.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table sisper.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sisper.migrations: ~7 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2022_12_22_062626_create_skpis_table', 1),
	(6, '2024_09_21_070828_create_dversis_table', 1),
	(7, '2024_09_21_174952_create_dversi_verifikasis_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table sisper.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sisper.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table sisper.personal_access_tokens
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

-- Dumping data for table sisper.personal_access_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Dumping structure for table sisper.skpi
CREATE TABLE IF NOT EXISTS `skpi` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `program_studi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lama_studi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_masuk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lulus` date NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ijazah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `toefl` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pencapaian` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sertifikasi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `beasiswa` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `organisasi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_warna` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sisper.skpi: ~0 rows (approximately)
/*!40000 ALTER TABLE `skpi` DISABLE KEYS */;
/*!40000 ALTER TABLE `skpi` ENABLE KEYS */;

-- Dumping structure for table sisper.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sisper.users: ~0 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
