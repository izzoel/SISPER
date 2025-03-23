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

-- Dumping structure for table sisperv2.mahasiswas
CREATE TABLE IF NOT EXISTS `mahasiswas` (
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `prodi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pisn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `periode_lulus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`nim`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sisperv2.mahasiswas: ~51 rows (approximately)
DELETE FROM `mahasiswas`;
/*!40000 ALTER TABLE `mahasiswas` DISABLE KEYS */;
INSERT INTO `mahasiswas` (`nim`, `nama`, `password`, `tempat_lahir`, `kelamin`, `tanggal_lahir`, `prodi`, `no_hp`, `status`, `alamat`, `foto`, `pisn`, `periode_lulus`, `role`, `created_at`, `updated_at`) VALUES
	('4820102230001', 'AHMAD NOPAL', '$2y$12$XInazIH5qpGRyGarB67ofOx5EZFjV8e4KVIlJKIKSGtFyEySFE2fq', 'KUALA KUAYAN', 'L', '1988-12-28', 'SARJANA FARMASI', '81352911234', 'AKTIF', 'Jl. Ir. H. Juanda No. 96 Sampit', '2', '1000322010284', '2024/2025 Ganjil', NULL, '2025-03-11 14:48:24', '2025-03-11 14:49:31'),
	('4820102230002', 'ANNA SEPTIANI', '$2y$12$JnBzIHQjI6bBvB8eTDrtRObo1sPUo3MSwiddKFSZuh0tSLGzER2zS', 'SAMPIT', 'P', '1989-09-23', 'SARJANA FARMASI', '81255580138', 'AKTIF', 'Jl. Ir. H. Juanda No. 29', '1', '2000322010284', '2024/2025 Ganjil', NULL, '2025-03-11 14:48:24', '2025-03-11 14:49:31'),
	('4820102230003', 'ARIS SETIAWAN', '$2y$12$MfAXHaOMYmxX0HRMxSQYPOp/3XttpYOaoQaKEufXIXvp9VYaj8oG6', 'BANJARMASIN', 'L', '1995-09-22', 'SARJANA FARMASI', '85813577466', 'AKTIF', 'Jl. Sungai Miai Dalam Rt.12 No.18', '7', '3000322010284', '2024/2025 Ganjil', NULL, '2025-03-11 14:48:25', '2025-03-11 14:49:31'),
	('4820102230004', 'EVA AGUSTINA', '$2y$12$3aU8bkvpbCo73OZAOk5Sye8DLmbtK/Awqd1hEGIGRJfeqONl9uer.', 'PURUK CAHU', 'P', '1993-08-17', 'SARJANA FARMASI', '85763339498', 'AKTIF', 'Jl.A.Yani No.181', '6', '4000322010284', '2024/2025 Ganjil', NULL, '2025-03-11 14:48:25', '2025-03-11 14:49:31'),
	('4820102230005', 'ELYSA', '$2y$12$HZB7c5gmIlaVnV1SAoa5KevoD52fURPfS8ux/02skjHp1DvoyxeOW', 'BINJAI PUNGGAL', 'P', '1996-06-03', 'SARJANA FARMASI', '81253333289', 'AKTIF', 'jl. Dahlia II melati 3 no 80 Rt/034 Rw/003 Kelurahan Telawang', '3', '5000322010284', '2024/2025 Ganjil', NULL, '2025-03-11 14:48:25', '2025-03-11 14:49:32'),
	('4820102230006', 'EVI CHORIYAH', '$2y$12$Lh393bb.xmH.pBRiPTv38uqvvovk7eYmgop5bRFcLbzxU6.n96Yv2', 'TABAK KANILAN', 'P', '1989-02-05', 'SARJANA FARMASI', '82213254143', 'AKTIF', 'Jalan pahlawan bawah no 20 rt 27 rw.03', '1', '6000322010284', '2024/2025 Ganjil', NULL, '2025-03-11 14:48:25', '2025-03-11 14:49:32'),
	('4820102230007', 'HAKIEM MUSTAQIEM', '$2y$12$55ekXdkLKwGQ8BYLR7SF6OYQ2T6BgaKLs0E4hBgB1Xirz.bIEJrn2', 'SEMARANG', 'L', '1990-04-12', 'SARJANA FARMASI', '82254760446', 'AKTIF', 'Jalan Adhiyaksa komplek Adhiyaksa II jalur Utara Rt 27', '10', '7000322010284', '2024/2025 Ganjil', NULL, '2025-03-11 14:48:26', '2025-03-11 14:49:32'),
	('4820102230008', 'HIDAYAHTUL HIDAYAH', '$2y$12$frQDV0VfExT.0vvkuzZpEON5HF6c/ugZJp/0PBUU6aYhxHaIr4R4W', 'BALIKPAPAN', 'P', '1992-06-09', 'SARJANA FARMASI', '82148612871', 'AKTIF', 'Jl.raya batulicin rt 01 desa segumbanga kec.batulicin kab. Tanah bumbu', '5', '8000322010284', '2024/2025 Ganjil', NULL, '2025-03-11 14:48:26', '2025-03-11 14:49:32'),
	('4820102230009', 'INDRAYANA', '$2y$12$svMjKqcuVsefgRuZDy25Z.zO3iw2/GNOrSIvNyz3ar/c.Ax.0OTem', 'BANJARMASIN', 'P', '1993-07-05', 'SARJANA FARMASI', '82153673974', 'AKTIF', 'Jl. Keramat Raya Gg. H. Suhaimi RT.13 NO.34 Banjarmasin', '4', '9000322010284', '2024/2025 Ganjil', NULL, '2025-03-11 14:48:26', '2025-03-11 14:49:33'),
	('4820102230010', 'LAILA AGUSTINI', '$2y$12$jR93p6AT64euYP6R9ZyxZOwKK/xb/oQqB5murQFp3V84ByCUmBkti', 'RANTAU', 'P', '1992-08-24', 'SARJANA FARMASI', '8115002553', 'AKTIF', 'jl. Bupati Said Alwi No. 73 Rt.03', '10', '0100322010284', '2024/2025 Ganjil', NULL, '2025-03-11 14:48:26', '2025-03-11 14:49:33'),
	('4820102230011', 'LAILI RUKHMINA', '$2y$12$xkhslo7BLnbiG6aoY7rlf.6rXytHoJq.S4GiBH//t757V3ubXtYzK', 'KOTABARU', 'P', '1996-11-12', 'SARJANA FARMASI', '81250913884', 'AKTIF', 'Jl. Ansoka RT. 02 Desa Sepunggur Kec. Kusan Hilir Kab. Tanah Bumbu', '4', '1100322010284', '2024/2025 Ganjil', NULL, '2025-03-11 14:48:26', '2025-03-11 14:49:33'),
	('4820102230012', 'LISA SUNARTI', '$2y$12$bsU6.1QFNpwqS44U2Z16COZva2WdKbXUmFArEM3KGGCepnzUvxRBG', 'RANTAU', 'P', '1986-03-13', 'SARJANA FARMASI', '85248333636', 'AKTIF', 'JL. BRIGJED H. HASAN BASRY RT. 007 RW. 002', '4', '2100322010284', '2024/2025 Ganjil', NULL, '2025-03-11 14:48:27', '2025-03-11 14:49:33'),
	('4820102230013', 'MAULIDA JOHANDA', '$2y$12$nVb2M7j8IfoMszfHWoS87e44ipCJwoQc8NjlIFUebcgvFD2e7XzhW', 'TANAH LAUT', 'P', '1998-07-07', 'SARJANA FARMASI', NULL, 'AKTIF', NULL, '3', '3100322010284', '2024/2025 Ganjil', NULL, '2025-03-11 14:48:27', '2025-03-11 14:49:33'),
	('4820102230014', 'MASDIYATI RAHMI', '$2y$12$fySGShjCwKIIqpE4Z/togeObagI5q4UufFTKOk6C/MwfMGwZcDKrO', 'KANDANGAN', 'P', '1987-04-25', 'SARJANA FARMASI', '81251527362', 'AKTIF', 'Komplek bawan permai blok jambu no 12,rt.13 rw003', '7', '4100322010284', '2024/2025 Ganjil', NULL, '2025-03-11 14:48:27', '2025-03-11 14:49:34'),
	('4820102230015', 'MEI DAONY', '$2y$12$9Z7Kh9mhS8CIhh48BNo1bumr44/Jx8N8vS4QH1OYhjE3IyyRpyhmu', 'TAPUT', 'P', '1980-05-14', 'SARJANA FARMASI', '8135015511', 'AKTIF', 'Jl.cilik riwut km 2,5 no 1 b', '1', '5100322010284', '2024/2025 Ganjil', NULL, '2025-03-11 14:48:27', '2025-03-11 14:49:34'),
	('4820102230016', 'MUGE BU\'MININ', '$2y$12$.Kx9DJIPtRZEQrPvg97fDu27X4kUFdKZg9mn6gKicJQZ9P1UEMC42', 'SEI GITA', 'L', '1995-10-18', 'SARJANA FARMASI', '85246305783', 'AKTIF', 'Jalan garuda nomor 15, kuala kapuas', '8', '6100322010284', '2024/2025 Ganjil', NULL, '2025-03-11 14:48:27', '2025-03-11 14:49:34'),
	('4820102230017', 'M. FAUZI ARIANDI', '$2y$12$tabHApTPpa8p4mHPPiUsROgQgcVQsryNYcDCrFcAa0PrG9.k.Ovba', 'PAGATAN', 'L', '1997-04-15', 'SARJANA FARMASI', '83155877779', 'AKTIF', 'Jl. Transmigrasi RT.010 RW.001km.02', '1', '7100322010284', '2024/2025 Ganjil', NULL, '2025-03-11 14:48:28', '2025-03-11 14:49:34'),
	('4820102230018', 'MUHAMMAD RAFII', '$2y$12$0Pg257u4HjopZv2Ydo2vKOgoqylAsJIYlDnkqT4Nlh7KORmbo8DbW', 'BANJARMASIN', 'L', '1997-07-31', 'SARJANA FARMASI', NULL, 'AKTIF', NULL, '8', '8100322010284', '2024/2025 Ganjil', NULL, '2025-03-11 14:48:28', '2025-03-11 14:49:34'),
	('4820102230019', 'MUTIARA ANGGRAINI', '$2y$12$VKV3ycgjyLePB9i58KSHUOZooO26fvLjFSpVJ1z9Ngl1wqoqSnRBK', 'SAMPIT', 'P', '1994-08-28', 'SARJANA FARMASI', '85822901344', 'AKTIF', 'jalan cilik riwut km 53 kecamatan cempaga', '7', '9100322010284', '2024/2025 Ganjil', NULL, '2025-03-11 14:48:28', '2025-03-11 14:49:35'),
	('4820102230020', 'NADYA AULIA', '$2y$12$n6c8V1WwFimUA28ZEQsuceM5yd00ch17B/sqgcUGKKHCTfkFHM50C', 'BANJARMASIN', 'P', '1993-09-28', 'SARJANA FARMASI', '85251015425', 'AKTIF', 'Jl. A. Yani km. 21 ASMIL 623 Kompi A RT. 3', '3', '0200322010284', '2024/2025 Ganjil', NULL, '2025-03-11 14:48:28', '2025-03-11 14:49:35'),
	('4820102230021', 'NANDA FATIMA AZAHRA', '$2y$12$Ym8AUxymeZ3VwfwOTLdQAuXqoYXI1NOy5Ln0ZIcU5eNQvjCeO0YqC', 'BANJARMASIN', 'P', '1998-10-13', 'SARJANA FARMASI', '81253992768', 'AKTIF', NULL, '10', '1200322010284', '2024/2025 Ganjil', NULL, '2025-03-11 14:48:28', '2025-03-11 14:49:35'),
	('4820102230022', 'SITI ZULAEHA', '$2y$12$es11llALqeMuSGHYyAVNJO8zhxDS9dq6IWvwCCpRwUF7MYAWNnG/q', 'RANTAU', 'P', '1994-12-20', 'SARJANA FARMASI', '85331873384', 'AKTIF', 'Jl.Gerilya Kel.Rantau Kanan Kec.Tapin Utara Kab.Tapin', '11', '2200322010284', '2024/2025 Ganjil', NULL, '2025-03-11 14:48:29', '2025-03-11 14:49:35'),
	('4820102230023', 'SUFRIANTO', '$2y$12$XivO1wMMBHCFFJT0.iNjb.kZ/Hw4cVime8XMqUu2./LP2ozwhLRSu', 'BANJARBARU', 'L', '1978-04-17', 'SARJANA FARMASI', '8125134449', 'AKTIF', 'Komplek HKSN Blok 8 C No.45 Banjarmasin', '10', '3200322010284', '2024/2025 Ganjil', NULL, '2025-03-11 14:48:29', '2025-03-11 14:49:35'),
	('4820102230024', 'TATI MALYATI', '$2y$12$PIPqNEFl96RtIp6WSugqW.hVNH28H7kCk.f9Y2/JbLsY1xo/KqnCe', 'DESA BARU', 'P', '1994-09-02', 'SARJANA FARMASI', '82158034432', 'AKTIF', 'Jl. Barito Rt 007 Rw 003 desa baru', '4', '4200322010284', '2024/2025 Ganjil', NULL, '2025-03-11 14:48:29', '2025-03-11 14:49:36'),
	('4820102230025', 'TRI YUSNA SARI', '$2y$12$DwQZVPOdRzWP9jC9/DLau.s4Vc0HX.Fk8IriR0C2tc2Z2QCrAcdwm', 'BANJARMASIN', 'P', '1992-08-23', 'SARJANA FARMASI', '87885798092', 'AKTIF', 'Komplek Pasir Putih RT.06 Desa Karangan Putih', '10', '5200322010284', '2024/2025 Ganjil', NULL, '2025-03-11 14:48:29', '2025-03-11 14:49:36'),
	('4820102230026', 'WELDY', '$2y$12$4.sirlvVd3dtAoJ.uINBWuA70te4OJBJ0MPddv31w7.cb/14WLW3G', 'KOTA BESI', 'L', '1990-02-13', 'SARJANA FARMASI', '82288162486', 'AKTIF', 'Jl.Baamang Hulu II Sampit', '8', '6200322010284', '2024/2025 Ganjil', NULL, '2025-03-11 14:48:30', '2025-03-11 14:49:36'),
	('4820102230027', 'YENI NILMAWATI', '$2y$12$qXewwnNn1HhZyvhExWcAm.4BCw90X8.7vUX/XAckUfbwWyGiZf0hK', 'BANJARMASIN', 'P', '1987-09-21', 'SARJANA FARMASI', '82349294878', 'AKTIF', 'Jln. Gusti M. Seman Rt.02 Rw.01', '6', '7200322010284', '2024/2025 Ganjil', NULL, '2025-03-11 14:48:30', '2025-03-11 14:49:36'),
	('4820102230028', 'YUNI LESTARI', '$2y$12$L6KdqF9o91Pe.YvdMXR80OD/hMHO/oeo2KHsV74VKPEm8uN8nwCJa', 'BATU TUHUP', 'P', '1990-02-04', 'SARJANA FARMASI', '82157204199', 'AKTIF', 'Jalan temanggung tiong no 36, puruk cahu kalimantan tengah', '3', '8200322010284', '2024/2025 Ganjil', NULL, '2025-03-11 14:48:30', '2025-03-11 14:49:37'),
	('4820102230029', 'ARIF KURNIAWAN', '$2y$12$uOe1SWIQOhKw5dLE8RhlzOdcuVqSXw4/r/M3bBimZ0l1Ks0/ZtAzq', 'BANJARMASIN', 'L', '1993-01-13', 'SARJANA FARMASI', '82297300377', 'AKTIF', 'Jl. Jenderal Sudirman RT03 RW02', '6', '9200322010284', '2024/2025 Ganjil', NULL, '2025-03-11 14:48:30', '2025-03-11 14:49:37'),
	('4820102230030', 'AULIA RAHMAN', '$2y$12$KwbJ4DB0YL9bRHRJHxQSwe3Hg8d9pXtUP0YOxcnkXUDso4fbN/B.K', 'ALABIO', 'L', '1988-05-06', 'SARJANA FARMASI', '811501195', 'AKTIF', 'Banyu Tajun Pangkalan Rt.02 No.105', '10', '0300322010284', '2024/2025 Ganjil', NULL, '2025-03-11 14:48:30', '2025-03-11 14:49:37'),
	('4820102230031', 'ISTIANA ASTUTI', '$2y$12$GBMqyeQ3vRnX4lk2fQajLOuWN1bZHs8Pkj2MPjx/R.XUdydUllOMe', 'KANDANGAN', 'P', '1986-10-30', 'SARJANA FARMASI', '85251408586', 'AKTIF', 'jln. Budi Bakti No 18 Rt 003 rw 002', '8', '1300322010284', '2024/2025 Ganjil', NULL, '2025-03-11 14:48:31', '2025-03-11 14:49:37'),
	('4820102230032', 'LIESNA NISROHAH', '$2y$12$FMxwpepe4HREYpX8WzRABullUr7RmgDpMk57BpWsDQUJZEprdqbji', 'MARTAPURA', 'P', '1985-04-04', 'SARJANA FARMASI', '82149431166', 'AKTIF', 'Jl.AES. Nasution No 7', '6', '2300322010284', '2024/2025 Ganjil', NULL, '2025-03-11 14:48:31', '2025-03-11 14:49:37'),
	('4820102230033', 'MOCHAMMAD ARIEF BUDIMAN', '$2y$12$ILUd5avIh7Gwm9yfQ8rtH./6v677wpUx3S6Qy9nlDdE5ARR.ys7tq', 'MARGASARI', 'L', '1993-02-21', 'SARJANA FARMASI', NULL, 'AKTIF', NULL, '4', '3300322010284', '2024/2025 Ganjil', NULL, '2025-03-11 14:48:31', '2025-03-11 14:49:38'),
	('4820102230034', 'NELA MELANI', '$2y$12$udzyNKdnfhRDM0CyUQCpQOkkQpbz.l9VS41O6PbzriqChW1U5FkG6', 'KANDANGAN', 'P', '1983-12-10', 'SARJANA FARMASI', '81348334833', 'AKTIF', 'jalan kesehatan no 26 baluti kandangan kabupaten hulu sungai selatan provinsi k', '0', '4300322010284', '2024/2025 Ganjil', NULL, '2025-03-11 14:48:31', '2025-03-11 14:49:38'),
	('4820102230035', 'NORWINDA EKA MARDIANTI', '$2y$12$EJEMHevCIbeTVIpCRSB2sutEypGDNNMwGfVjAbjvGQNecBkGW5nG2', 'MARTAPURA', 'P', '1992-07-28', 'SARJANA FARMASI', '87716441466', 'AKTIF', 'JL.BUKHARI DESA TEBING TINGGI', '10', '5300322010284', '2024/2025 Ganjil', NULL, '2025-03-11 14:48:31', '2025-03-11 14:49:38'),
	('4820102230036', 'NURLISARI', '$2y$12$LwiaKjArJ4nvx1JHKM9odO9Kl26UpsY5Cn.jsxq7Eij9Epz30gvZ.', 'BIRAYANG MERDEKA', 'P', '1992-01-04', 'SARJANA FARMASI', '85348712223', 'AKTIF', 'Jln Kesuma Bangsa Rt.007 Rw.003', '0', '6300322010284', '2024/2025 Ganjil', NULL, '2025-03-11 14:48:32', '2025-03-11 14:49:38'),
	('4820102230037', 'PUTERI DEWI NOORVEYANI', '$2y$12$S7ctoliEU5iAJGpjL4E77OpfLGyhzC9e8sU5wrc4OsXjN3q3.nmhu', 'MARGASARI', 'P', '1987-11-13', 'SARJANA FARMASI', '81349568338', 'AKTIF', 'Jl.Pengadilan Negeri II RT.004 RW .002', '9', '7300322010284', '2024/2025 Ganjil', NULL, '2025-03-11 14:48:32', '2025-03-11 14:49:38'),
	('4820102230038', 'RIANITA RAHAYU', '$2y$12$5yqnv3H62.tFSfAfZjIOoeGmli6lt2voUWIDkNetGaja8FA2GbY1i', 'RANTAU', 'P', '1995-07-11', 'SARJANA FARMASI', '81351771717', 'AKTIF', 'Jl. Jenderal sudirman RT. 003/RW.002 Hamalau', '2', '8300322010284', '2024/2025 Ganjil', NULL, '2025-03-11 14:48:32', '2025-03-11 14:49:39'),
	('4820102230039', 'RUSMINA AGUSTINI', '$2y$12$SPG/i1FfskqEVgP0QvEbSeNy0uXPmnNqC2fi4.16yM4KFw12CmB3S', 'KANDANGAN', 'P', '1985-08-27', 'SARJANA FARMASI', '8125183412', 'AKTIF', 'JL. BUKHARI NO.109 RT.1 SUNGAI PARING KEC. KANDANGAN KAB. HULU SUNGAI SELATAN', '7', '9300322010284', '2024/2025 Ganjil', NULL, '2025-03-11 14:48:32', '2025-03-11 14:49:39'),
	('4820102230040', 'ASTUTI', '$2y$12$twumml0PU5N7igLHT5wWkuqS4ENGEeiFb6elereYABcIz/Bvts/Zi', 'MURUNG PUDAK', 'P', '1981-01-29', 'SARJANA FARMASI', '82151837903', 'AKTIF', 'Jl. Pelita RT 11 No. 32 , Bangun Sari, Kab. Tabalong Kal-Sel', '2', '0400322010284', '2024/2025 Ganjil', NULL, '2025-03-11 14:48:33', '2025-03-11 14:49:39'),
	('4820102230041', 'AYU RAHAYU DESIANA', '$2y$12$dQV8AYdvPX0Vn1od/Sxzuuayz164aONayCzo35UxsGpWqrB9TUlC6', 'BANJARMASIN', 'P', '1989-11-05', 'SARJANA FARMASI', '85393286633', 'AKTIF', 'Jl.Padat Karya Rt.08 Pembataan', '8', '1400322010284', '2024/2025 Ganjil', NULL, '2025-03-11 14:48:33', '2025-03-11 14:49:39'),
	('4820102230042', 'DIDY IRAWAN', '$2y$12$U7A8dmd1Zhkl/fS21AldZeGXHyNql7lQ9NZBfkKuSWZJ0/2k/x9l2', 'MURUNG PUDAK', 'L', '1997-07-26', 'SARJANA FARMASI', '82249173696', 'AKTIF', 'Jl. Anggrek 7 no 51', '8', '2400322010284', '2024/2025 Ganjil', NULL, '2025-03-11 14:48:33', '2025-03-11 14:49:39'),
	('4820102230044', 'MUHAMMAD FAUZIANNOOR AL IKHSAN', '$2y$12$4hxBA1qwPHx9Gv4OEsB8U.n4TPM6pwIfQKhQdAUjblNk7GQsEiyD6', 'HARUAI', 'L', '1992-10-05', 'SARJANA FARMASI', '82358233330', 'AKTIF', 'JL. IR. P. H. M. Noor Komplek Sukamaju RT 008 RW 003', '5', '4400322010284', '2024/2025 Ganjil', NULL, '2025-03-11 14:48:33', '2025-03-11 14:49:40'),
	('4820102230069', 'JYHAN ZULFA NAILY', '$2y$12$U4KxCrlNgxmgyRJHY/fXVuRubdI6a55.LXqAGdqMTa/YPaA0/N7/W', 'BANJARMASIN', 'P', '2000-10-03', 'SARJANA FARMASI', '81250129228', 'AKTIF', 'Jl. Manarap , komplek manarap indah permai no.99 rt.006 rw.003', '3', '9600322010284', '2024/2025 Ganjil', NULL, '2025-03-11 14:48:33', '2025-03-11 14:49:40'),
	('AK122044', 'SERIN SALSABILA', '$2y$12$rzOmnaNMp4NmWJnwyAKNzu0okgXPUziZvjkcsY2MuwzO00SU9DYb6', 'KOTABARU', 'P', '2001-12-07', 'D3 ANALIS KESEHATAN', NULL, 'LULUS', NULL, '6', NULL, '2024/2025 Ganjil', NULL, '2025-03-11 14:48:35', '2025-03-11 14:48:35'),
	('AK122051', 'AHMAD MUGHNIE', '$2y$12$hL7u9WzbB9I3hAI14XsWk.szCDFBcnXbtt9DPTiq2ZMdeaVdKZjaC', 'BARABAI', 'L', '2002-01-16', 'D3 ANALIS KESEHATAN', NULL, 'LULUS', NULL, '4', NULL, '2024/2025 Ganjil', NULL, '2025-03-11 14:48:35', '2025-03-11 14:48:35'),
	('AK1321010', 'ERISKA NUR AIDHA', '$2y$12$PmA9siIt4SWjaWYud1nCKeVnt8J9pTMgINBPPGaCD9CbApP7tPrm2', 'PURUK CAHU', 'P', '2003-02-12', 'D3 ANALIS KESEHATAN', NULL, 'LULUS', NULL, '7', NULL, '2024/2025 Ganjil', NULL, '2025-03-11 14:48:35', '2025-03-11 14:48:35'),
	('AK1321022', 'MUHAMMAD SULTAN', '$2y$12$AMNTX9GiJH8aR7ZNWFb7De.PlDwQnGgu882TF66uD6vc4yiekd1c.', 'BANJARMASIN', 'L', '2002-01-15', 'D3 ANALIS KESEHATAN', '85245507073', 'LULUS', 'Jl.arung abdurrahim RT.01 RW.01', '7', NULL, '2024/2025 Ganjil', NULL, '2025-03-11 14:48:34', '2025-03-11 14:48:34'),
	('DF21005', 'ARDIANSYAH', '$2y$12$8vZeqXGKPVXM8SFcxIPPhOCPOtgarX8t5hCsALeLfnZrtendlxg9a', 'Palangka Raya', 'L', '2002-12-14', 'D3 FARMASI', NULL, 'LULUS', NULL, '1', NULL, '2024/2025 Ganjil', NULL, '2025-03-11 14:48:34', '2025-03-11 14:48:34'),
	('DF21018', 'SYARIFAH AISYAH', '$2y$12$XrxuPgXHlvVdsC7sj8cjpu5lD3jWcep3rD7VPDvT1H5Ggt.B9r0yC', 'Sungai Besar', 'P', '2003-09-21', 'D3 FARMASI', NULL, 'LULUS', NULL, '1', NULL, '2024/2025 Ganjil', NULL, '2025-03-11 14:48:34', '2025-03-11 14:48:34'),
	('DF21021', 'ANGGI FREDIANTO', '$2y$12$7Kcq/F25lTeL4DL/UW1uxuh3IATwQg0cJBWi81Dx4SZ0ZhxJ5T7LW', 'Lamandau', 'L', '2003-12-11', 'D3 FARMASI', NULL, 'LULUS', NULL, '1', NULL, '2024/2025 Ganjil', NULL, '2025-03-11 14:48:34', '2025-03-11 14:48:34'),
	('DF21055', 'MURNI', '$2y$12$tlXo9YZVe8p9fE/l0kWUM.IUJ.KkqzeJtFOoX5cPONaWZXi3pwbvu', 'Tumbang Kunyi', 'P', '2003-11-27', 'D3 FARMASI', NULL, 'LULUS', NULL, '8', NULL, '2024/2025 Ganjil', NULL, '2025-03-11 14:48:34', '2025-03-11 14:48:34');
/*!40000 ALTER TABLE `mahasiswas` ENABLE KEYS */;

-- Dumping structure for table sisperv2.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sisperv2.migrations: ~11 rows (approximately)
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
	(14, '2025_03_11_151140_create_settings_table', 6);
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

-- Dumping structure for table sisperv2.settings
CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `prodi` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kaprodi` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_terbit` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sisperv2.settings: ~9 rows (approximately)
DELETE FROM `settings`;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` (`id`, `prodi`, `kaprodi`, `nik`, `tanggal_terbit`, `created_at`, `updated_at`) VALUES
	(1, 'Diploma Tiga Analis Kesehatan', 'Muhammad Arsyad, S.ST., M. Kes', '010912030', NULL, NULL, NULL),
	(2, 'Diploma Tiga Farmasi', 'Muhammad Hidayatullah', NULL, NULL, NULL, NULL),
	(3, 'Sarjana Administrasi Rumah Sakit', 'Liana Fitriani Hasymi, S.Pi, S.Kes', '010915075', NULL, NULL, NULL),
	(4, 'Sarjana Bisnis Digital', 'Ibrahim Rully Effendy, S.Kom, MM', '32', '2025-03-11', NULL, '2025-03-11 16:53:48'),
	(5, 'Sarjana Farmasi', 'Nur Rahmiati, M.Farm', '33232', '2025-03-11', NULL, NULL),
	(6, 'Sarjana Gizi', 'yustin', NULL, NULL, NULL, NULL),
	(7, 'Sarjana Hukum', 'khairunnisa', NULL, NULL, NULL, NULL),
	(8, 'Sarjana Manajemen', 'hidayatullah as', NULL, NULL, NULL, NULL),
	(9, 'Sarjana Pendidikan Guru Sekolah Dasar', '', NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;

-- Dumping structure for table sisperv2.submits
CREATE TABLE IF NOT EXISTS `submits` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `prodi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gelar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pisn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `masuk` year(4) DEFAULT NULL,
  `yudisium` date DEFAULT NULL,
  `judul` text COLLATE utf8mb4_unicode_ci,
  `toefl` smallint(5) unsigned DEFAULT '0',
  `kejuaraan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sertifikat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `beasiswa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organisasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dokumen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sisperv2.submits: ~0 rows (approximately)
DELETE FROM `submits`;
/*!40000 ALTER TABLE `submits` DISABLE KEYS */;
INSERT INTO `submits` (`id`, `nim`, `nama`, `tempat_lahir`, `tanggal_lahir`, `prodi`, `gelar`, `pisn`, `masuk`, `yudisium`, `judul`, `toefl`, `kejuaraan`, `sertifikat`, `beasiswa`, `organisasi`, `status`, `dokumen`, `created_at`, `updated_at`) VALUES
	(1, '4820102230001', 'AHMAD NOPAL', 'KUALA KUAYAN', '1988-12-28', 'SARJANA FARMASI', 'Sarjana Farmasi (S.Farm.)', '1000322010284', '2024', '2025-02-28', 'IMPOA', 450, 'Juara 1 Silat Tingkat Nasional (ST/1/2023/Nas)\nJuara 2 Pembalap Gubernuran (2)', 'Lembaga Kompetensi Sertifikasi - Network Enggineer (64554 3 434 21)\nJuara 1 Silat Tingkat Nasional panjaaaaaaaaaaaaaaaaaaaaaaaaaang (64554 3 434 21)', 'Beasiswa Internal Stikes Borneo Lestri Semester Ganjil 2020/2021\nBeasiswa Internal Stikes Borneo Lestri Semester Ganjil 2020/2021', 'STMIK Robotik Club Banjarbaru (Ketua)\newfefwfw (ds)', 'sudah print', 'https://docs.google.com/document/d/1nhHLFzU64FW6zyBMplZt93IBzK9XH94RnwUF-INKZig/edit?tab=t.0', '2025-03-11 23:05:55', '2025-03-11 23:07:22'),
	(2, '4820102230002', 'ANNA SEPTIANI', 'SAMPIT', '1989-09-23', 'SARJANA FARMASI', 'Sarjana Farmasi (S.Farm.)', '2000322010284', '2024', '2025-02-28', 'DSDS', 450, 'dsds (dsds)', '-', '-', 'STMIK Robotik Club Banjarbaru (Ketua)\newfefwfw (ds)', 'sudah print', 'https://docs.google.com/document/d/1qOuRx58u8x4Bds--sLnux2pv1uVszIZfV0fYpCqs_Ew/edit?tab=t.0', '2025-03-12 11:58:58', '2025-03-12 11:59:32'),
	(3, '4820102230003', 'ARIS SETIAWAN', 'BANJARMASIN', '1995-09-22', 'SARJANA FARMASI', 'Sarjana Farmasi (S.Farm.)', '3000322010284', '2024', '2025-02-28', 'SD', 450, '-', 'dsds (dsds)\nJuara 1 Silat Tingkat Nasional panjaaaaaaaaaaaaaaaaaaaaaaaaaang (64554 3 434 21)', 'STMIK Robotik Club Banjarbaru', '-', 'sudah print', 'https://docs.google.com/document/d/1zrUzmnCZOJHU9_vOkeVflW0ebXcYo2Sa7uvhN-_iJfE/edit?tab=t.0', '2025-03-12 12:02:26', '2025-03-12 12:03:17');
/*!40000 ALTER TABLE `submits` ENABLE KEYS */;

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
