-- MySQL dump 10.13  Distrib 8.0.39, for Linux (aarch64)
--
-- Host: localhost    Database: edokin_bappeda_dev
-- ------------------------------------------------------
-- Server version	8.0.39

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `bab1s`
--

DROP TABLE IF EXISTS `bab1s`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bab1s` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `bidang3` text COLLATE utf8mb4_unicode_ci,
  `uraian` text COLLATE utf8mb4_unicode_ci,
  `kode_bidang_urusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default_value',
  `nama_opd` text COLLATE utf8mb4_unicode_ci,
  `bidang_urusan` text COLLATE utf8mb4_unicode_ci,
  `bidang1` text COLLATE utf8mb4_unicode_ci,
  `bidang2` text COLLATE utf8mb4_unicode_ci,
  `kode_opd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_bab` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latar_belakang` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dasar_hukum` text COLLATE utf8mb4_unicode_ci,
  `maksud_tujuan` text COLLATE utf8mb4_unicode_ci,
  `sistematika_penulisan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jenis_id` bigint unsigned NOT NULL,
  `tahun_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bab1s_jenis_id_foreign` (`jenis_id`),
  KEY `bab1s_tahun_id_foreign` (`tahun_id`),
  CONSTRAINT `bab1s_jenis_id_foreign` FOREIGN KEY (`jenis_id`) REFERENCES `jenis` (`id`),
  CONSTRAINT `bab1s_tahun_id_foreign` FOREIGN KEY (`tahun_id`) REFERENCES `tahun_dokumen` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bab1s`
--

LOCK TABLES `bab1s` WRITE;
/*!40000 ALTER TABLE `bab1s` DISABLE KEYS */;
/*!40000 ALTER TABLE `bab1s` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bab2s`
--

DROP TABLE IF EXISTS `bab2s`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bab2s` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tugas_fungsi` text COLLATE utf8mb4_unicode_ci,
  `uraian_asets` text COLLATE utf8mb4_unicode_ci,
  `uraian` text COLLATE utf8mb4_unicode_ci,
  `kode_opd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_bab` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_opd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bidang_urusan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jenis_id` bigint unsigned NOT NULL,
  `tahun_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bab2s_jenis_id_foreign` (`jenis_id`),
  KEY `bab2s_tahun_id_foreign` (`tahun_id`),
  CONSTRAINT `bab2s_jenis_id_foreign` FOREIGN KEY (`jenis_id`) REFERENCES `jenis` (`id`),
  CONSTRAINT `bab2s_tahun_id_foreign` FOREIGN KEY (`tahun_id`) REFERENCES `tahun_dokumen` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bab2s`
--

LOCK TABLES `bab2s` WRITE;
/*!40000 ALTER TABLE `bab2s` DISABLE KEYS */;
/*!40000 ALTER TABLE `bab2s` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bab3`
--

DROP TABLE IF EXISTS `bab3`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bab3` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uraian` text COLLATE utf8mb4_unicode_ci,
  `uraian1` text COLLATE utf8mb4_unicode_ci,
  `uraian2` text COLLATE utf8mb4_unicode_ci,
  `uraian3` text COLLATE utf8mb4_unicode_ci,
  `uraian4` text COLLATE utf8mb4_unicode_ci,
  `uraian5` text COLLATE utf8mb4_unicode_ci,
  `isu_strategis1` text COLLATE utf8mb4_unicode_ci,
  `isu_strategis2` text COLLATE utf8mb4_unicode_ci,
  `nama_bab` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_id` bigint unsigned NOT NULL,
  `kode_opd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_id` bigint unsigned NOT NULL,
  `permasalahan_pelayanan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `isu_strategis` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bab3_jenis_id_foreign` (`jenis_id`),
  KEY `bab3_tahun_id_foreign` (`tahun_id`),
  CONSTRAINT `bab3_jenis_id_foreign` FOREIGN KEY (`jenis_id`) REFERENCES `jenis` (`id`) ON DELETE CASCADE,
  CONSTRAINT `bab3_tahun_id_foreign` FOREIGN KEY (`tahun_id`) REFERENCES `tahun_dokumen` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bab3`
--

LOCK TABLES `bab3` WRITE;
/*!40000 ALTER TABLE `bab3` DISABLE KEYS */;
/*!40000 ALTER TABLE `bab3` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bab4s`
--

DROP TABLE IF EXISTS `bab4s`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bab4s` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uraian` text COLLATE utf8mb4_unicode_ci,
  `nama_bab` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_id` bigint unsigned NOT NULL,
  `tahun_id` bigint unsigned NOT NULL,
  `kode_opd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuan_opd` json DEFAULT NULL,
  `sasaran_opd` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bab4s_jenis_id_foreign` (`jenis_id`),
  KEY `bab4s_tahun_id_foreign` (`tahun_id`),
  CONSTRAINT `bab4s_jenis_id_foreign` FOREIGN KEY (`jenis_id`) REFERENCES `jenis` (`id`) ON DELETE CASCADE,
  CONSTRAINT `bab4s_tahun_id_foreign` FOREIGN KEY (`tahun_id`) REFERENCES `tahun_dokumen` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bab4s`
--

LOCK TABLES `bab4s` WRITE;
/*!40000 ALTER TABLE `bab4s` DISABLE KEYS */;
/*!40000 ALTER TABLE `bab4s` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bab5s`
--

DROP TABLE IF EXISTS `bab5s`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bab5s` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uraian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_bab` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_id` bigint unsigned NOT NULL,
  `tahun_id` bigint unsigned NOT NULL,
  `kode_opd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuan_opd` json DEFAULT NULL,
  `sasaran_opd` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bab5s_jenis_id_foreign` (`jenis_id`),
  KEY `bab5s_tahun_id_foreign` (`tahun_id`),
  CONSTRAINT `bab5s_jenis_id_foreign` FOREIGN KEY (`jenis_id`) REFERENCES `jenis` (`id`) ON DELETE CASCADE,
  CONSTRAINT `bab5s_tahun_id_foreign` FOREIGN KEY (`tahun_id`) REFERENCES `tahun_dokumen` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bab5s`
--

LOCK TABLES `bab5s` WRITE;
/*!40000 ALTER TABLE `bab5s` DISABLE KEYS */;
/*!40000 ALTER TABLE `bab5s` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bab6s`
--

DROP TABLE IF EXISTS `bab6s`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bab6s` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uraian` text COLLATE utf8mb4_unicode_ci,
  `nama_bab` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_id` bigint unsigned NOT NULL,
  `tahun_id` bigint unsigned NOT NULL,
  `kode_opd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuan_opd` json DEFAULT NULL,
  `sasaran_opd` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bab6s_jenis_id_foreign` (`jenis_id`),
  KEY `bab6s_tahun_id_foreign` (`tahun_id`),
  CONSTRAINT `bab6s_jenis_id_foreign` FOREIGN KEY (`jenis_id`) REFERENCES `jenis` (`id`) ON DELETE CASCADE,
  CONSTRAINT `bab6s_tahun_id_foreign` FOREIGN KEY (`tahun_id`) REFERENCES `tahun_dokumen` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bab6s`
--

LOCK TABLES `bab6s` WRITE;
/*!40000 ALTER TABLE `bab6s` DISABLE KEYS */;
/*!40000 ALTER TABLE `bab6s` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bab7s`
--

DROP TABLE IF EXISTS `bab7s`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bab7s` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_bab` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_id` bigint unsigned NOT NULL,
  `tahun_id` bigint unsigned NOT NULL,
  `kode_opd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuan_opd` json DEFAULT NULL,
  `sasaran_opd` json DEFAULT NULL,
  `uraian` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bab7s_jenis_id_foreign` (`jenis_id`),
  KEY `bab7s_tahun_id_foreign` (`tahun_id`),
  CONSTRAINT `bab7s_jenis_id_foreign` FOREIGN KEY (`jenis_id`) REFERENCES `jenis` (`id`) ON DELETE CASCADE,
  CONSTRAINT `bab7s_tahun_id_foreign` FOREIGN KEY (`tahun_id`) REFERENCES `tahun_dokumen` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bab7s`
--

LOCK TABLES `bab7s` WRITE;
/*!40000 ALTER TABLE `bab7s` DISABLE KEYS */;
/*!40000 ALTER TABLE `bab7s` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bab8s`
--

DROP TABLE IF EXISTS `bab8s`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bab8s` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_bab` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_id` bigint unsigned NOT NULL,
  `tahun_id` bigint unsigned NOT NULL,
  `kode_opd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uraian` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bab8s_jenis_id_foreign` (`jenis_id`),
  KEY `bab8s_tahun_id_foreign` (`tahun_id`),
  CONSTRAINT `bab8s_jenis_id_foreign` FOREIGN KEY (`jenis_id`) REFERENCES `jenis` (`id`) ON DELETE CASCADE,
  CONSTRAINT `bab8s_tahun_id_foreign` FOREIGN KEY (`tahun_id`) REFERENCES `tahun_dokumen` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bab8s`
--

LOCK TABLES `bab8s` WRITE;
/*!40000 ALTER TABLE `bab8s` DISABLE KEYS */;
/*!40000 ALTER TABLE `bab8s` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
INSERT INTO `cache` VALUES ('admin@test.com|192.168.107.1','i:1;',1729476369),('admin@test.com|192.168.107.1:timer','i:1729476369;',1729476369),('test@example.com|192.168.107.1','i:1;',1729476191),('test@example.com|192.168.107.1:timer','i:1729476191;',1729476191);
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jenis`
--

DROP TABLE IF EXISTS `jenis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jenis` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `jenis` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jenis`
--

LOCK TABLES `jenis` WRITE;
/*!40000 ALTER TABLE `jenis` DISABLE KEYS */;
INSERT INTO `jenis` VALUES (1,'Renstra',NULL,NULL),(2,'Renja',NULL,NULL);
/*!40000 ALTER TABLE `jenis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_100000_create_password_resets_table',1),(2,'2024_07_15_052518_create_bab1s_table',1),(3,'2024_07_15_053139_create_bab2s_table',1),(4,'2024_07_20_092140_create_jenis_table',1),(5,'2024_07_20_092423_add_nama_bab_and_jenis_to_bab1s_table',1),(6,'2024_07_20_114727_add_kode_opd_to_bab1s_table',1),(7,'2024_07_20_154436_create_sessions_table',1),(8,'2024_07_20_155433_create_users_table',1),(9,'2024_07_22_075800_create_tahun_dokumen_table',1),(10,'2024_07_22_075949_add_tahun_id_to_bab1s_table',1),(11,'2024_07_24_111205_create_bab3s_table',1),(12,'2024_07_31_070627_create_cache_table',1),(13,'2024_08_01_112013_add_bidang1_and_bidang2_to_bab1s_table',1),(14,'2024_08_05_054204_add_nama_opd_and_bidang_urusan_to_bab1s_table',1),(15,'2024_08_06_032541_add_kode_bidang_urusan_to_bab1s_table',1),(16,'2024_08_15_173719_add_uraian1_uraian2_uraian3_uraian4_uraian5_isu_strategis1_isu_strategis2_to_bab3_table',1),(17,'2024_08_20_043039_add_name_bab_nama_opd_kode_opd_tahun_id_jenis_id_bidang_urusan_to_bab2s_table',1),(18,'2024_08_26_115357_create_bab4s_table',1),(19,'2024_09_09_150851_create_bab5s_table',1),(20,'2024_09_25_073124_add_uraian_to_bab5s_table',1),(21,'2024_09_25_122558_create_bab6s_table',1),(22,'2024_09_25_170304_create_bab7s_table',1),(23,'2024_09_27_032820_add_uraian_to_bab6s_table',1),(24,'2024_09_27_105843_create_bab8s_table',1),(25,'2024_09_27_182758_add_uraian_to_bab1s_table',1),(26,'2024_09_27_182802_add_uraian_to_bab2s_table',1),(27,'2024_09_27_182806_add_uraian_to_bab3s_table',1),(28,'2024_09_27_182809_add_uraian_to_bab4s_table',1),(29,'2024_10_15_015239_add_bidang3_to_bab1s_table',1),(30,'2024_10_15_015357_add_tugas_fungsi_uraian_asets_to_bab2s_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('a5ww3IQlnnVaDeIbHjDFvUom11K5TJpxDz9gmH1t',2,'192.168.107.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.0 Safari/605.1.15','YTo1OntzOjY6Il90b2tlbiI7czo0MDoidVpiZEpsUnNXVlE0Q08xdjVIWnlvdnR6dDQyaUJwbDJLUFFPT3hSZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO3M6NDoiYXV0aCI7YToxOntzOjIxOiJwYXNzd29yZF9jb25maXJtZWRfYXQiO2k6MTcyOTQ3NjMyMTt9fQ==',1729476340);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tahun_dokumen`
--

DROP TABLE IF EXISTS `tahun_dokumen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tahun_dokumen` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tahun` year NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tahun_dokumen`
--

LOCK TABLES `tahun_dokumen` WRITE;
/*!40000 ALTER TABLE `tahun_dokumen` DISABLE KEYS */;
INSERT INTO `tahun_dokumen` VALUES (1,2024,NULL,NULL),(2,2025,NULL,NULL),(3,2026,NULL,NULL);
/*!40000 ALTER TABLE `tahun_dokumen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'admin','admin@test.com',NULL,'$2y$12$6dQcmPUueth81xBGXE2sDeQ4bbrxm5zve8wbueRFqFpDpDkwi.1Gq',NULL,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-10-21  2:10:56
