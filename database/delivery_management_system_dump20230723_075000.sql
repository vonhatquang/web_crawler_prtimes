CREATE DATABASE  IF NOT EXISTS `delivery_management_system` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `delivery_management_system`;
-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)
--
-- Host: localhost    Database: delivery_management_system
-- ------------------------------------------------------
-- Server version	8.0.31

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2014_10_12_200000_add_two_factor_columns_to_users_table',2),(6,'2023_07_10_041240_create_sessions_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `redeliveries`
--

DROP TABLE IF EXISTS `redeliveries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `redeliveries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_title` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `requester_name` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pickup_zipcode` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pickup_add1` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pickup_add2` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pickup_tel` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_zipcode` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_add1` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_add2` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_tel` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_name` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_date` datetime NOT NULL,
  `delivery_date_display` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_type` int NOT NULL,
  `package_type_name` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int NOT NULL,
  `fare_amount` int NOT NULL,
  `delivery_driver` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_id` int DEFAULT NULL,
  `status_name` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_code` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `storage_period` int DEFAULT NULL,
  `note` varchar(246) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redelivery_date` date DEFAULT NULL,
  `redelivery_time_id` int DEFAULT NULL,
  `redelivery_time_name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `redeliveries_id_uuid_unique` (`id`,`uuid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `redeliveries`
--

LOCK TABLES `redeliveries` WRITE;
/*!40000 ALTER TABLE `redeliveries` DISABLE KEYS */;
INSERT INTO `redeliveries` VALUES (1,'d7470fae-3d98-46a9-9f0f-9d657450ca47','テスト案件あああああ','依頼者名 14','1050001','東京都 港区 虎ノ門','456','555-999','1500012','東京都 渋谷区 広尾',NULL,'999-9999','お名前 10','2023-07-09 00:00:00','2023/07/09（日）',1,'常温',1,123,'〇〇〇〇',2,'受付','123456789-999',11,'これはテストデータです。','2023-07-31',4,'19:00-21:00',NULL,'2023-07-11 10:41:48','2023-07-18 21:13:21'),(2,'0327a235-de28-4913-b361-6209fe7389d7','test',NULL,'1500012',NULL,NULL,NULL,'1500012',NULL,NULL,NULL,NULL,'2023-07-19 00:00:00','2023/07/19（水）',1,'常温',1,0,'a',1,'集荷','11',NULL,NULL,NULL,NULL,NULL,'2023-07-14 08:22:51','2023-07-11 22:35:38','2023-07-14 08:22:51'),(3,'124a54cc-f2c7-4dfc-b2e0-2ec6008b8720','あ',NULL,'1050004',NULL,NULL,NULL,'1050003',NULL,NULL,NULL,NULL,'2023-07-15 00:00:00','2023/07/15（土）',1,'常温',1,0,'あ',1,'集荷','111',NULL,NULL,NULL,NULL,NULL,'2023-07-14 06:49:38','2023-07-11 23:18:39','2023-07-14 06:49:38'),(4,'bceb3190-1fe8-4d27-993b-6d343fd746f7','あ',NULL,'1',NULL,NULL,NULL,'1',NULL,NULL,NULL,NULL,'2023-07-13 00:00:00','2023/07/13（木）',1,'常温',1,0,'1',1,'集荷','1',1,'1',NULL,NULL,NULL,'2023-07-14 06:47:00','2023-07-11 23:19:27','2023-07-14 06:47:00'),(5,'7d84843d-b5e6-4a8c-927e-2107f7a2a6bb','テスト',NULL,'1050004',NULL,NULL,NULL,'1050004',NULL,NULL,NULL,NULL,'2023-07-31 00:00:00','2023/07/31（月）',3,'冷凍',2,0,'宮前',1,'集荷','111-11111-1111',NULL,'テスト',NULL,NULL,NULL,'2023-07-14 06:50:43','2023-07-12 00:13:40','2023-07-14 06:50:43'),(6,'f8170140-2033-48d4-a710-efa1361df5b7',' Test',NULL,'2342342',NULL,NULL,NULL,'33333',NULL,NULL,NULL,NULL,'2023-07-26 00:00:00','2023/07/26（水）',2,'冷蔵',54,0,'12345',1,'集荷','4332342342',7,'fsdfaf','2023-07-26',4,'19:00-21:00','2023-07-14 06:50:14','2023-07-12 00:56:04','2023-07-14 06:50:14'),(7,'4cd1e63d-1f76-4d9f-95cc-7008d3e3148d','3424324','rwerqwerqw','2342342','Test 配送元1','Test 配送元2',NULL,'342432','Test 配送先1','Test 配送先2',NULL,'42342342','2023-07-20 00:00:00','2023/07/20（木）',1,'常温',54,242342,'5',2,'受付','rwew',2343424,'eqweq','2023-07-21',4,'19:00-21:00','2023-07-13 16:48:22','2023-07-12 21:53:59','2023-07-13 16:48:22'),(8,'48eb19c2-2ee7-4415-ab25-d498011b3b07','Test 13','依頼者名 14','2342342','Test 配送元1','Test 配送元2',NULL,'33333','Test 配送先1','Test 配送先2',NULL,'お名前 15','2023-07-14 00:00:00','2023/07/14（金）',3,'冷凍',54,242342,'ドライバー 16',3,'保管','荷物コード 17',123,'備考','2023-08-21',1,'09:00-12:00',NULL,'2023-07-12 23:04:13','2023-07-20 10:19:56'),(9,'f9bbc79e-9c90-4045-b9dc-e331ae0c38b6','1','2','1000004','東京都 千代田区 大手町','3','4','1000001','東京都 千代田区 千代田','5','6','7','2023-08-04 00:00:00','2023/08/04（金）',2,NULL,8,9,'10',1,NULL,'11',12,'13',NULL,NULL,NULL,'2023-07-14 11:37:27','2023-07-13 15:49:02','2023-07-14 11:37:27'),(10,'81aad69b-b92f-48d6-a553-bfcfec7fa052','12','23','1000001','東京都 千代田区 千代田','34','45','1000004','東京都 千代田区 大手町','56','67','78','2023-09-08 00:00:00','2023/09/08（金）',3,'冷凍',89,910,'1011',3,'保管','1112',1213,'1314',NULL,NULL,NULL,NULL,'2023-07-13 15:53:27','2023-07-13 22:57:39');
/*!40000 ALTER TABLE `redeliveries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
INSERT INTO `sessions` VALUES ('QyhFpNddVVTJHaHApFgBreZXAvjsQ642tD02iy4P',NULL,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiUU5PR0RpNjBaYXVNek1YbDB1WVZsTlpBYlJEU0o0OTlmZE4ydEhHWSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTU6Imh0dHA6Ly9sb2NhbGhvc3Q6OTA5MC9pbnZlbnRvcnlfbWFuYWdlbWVudF9zeXN0ZW0vbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1690083522),('ZRpLnBu7I1Ho6OKwea7Fi8A1s44zFCTRzf9O7tOu',8,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoieHpES2NMN2ZvWTU3dlZnSHZQMEdIaEkzMVVGb3VTMEl3b1lOQ3BuZyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjI6Imh0dHA6Ly9sb2NhbGhvc3Q6OTA5MC90cmFuc3BvcnRhdGlvbnN0YXR1c3BhY2thZ2UvcmVkZWxpdmVyaWVzIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6ODt9',1690084210);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (4,'test','test@gmail.com',NULL,'$2y$10$cOcoj.z2823bQIcUGTZnVeXw7gLpE50CSskmE2/TNcek.fEatfoou',NULL,NULL,NULL,NULL,'2023-07-10 05:49:25','2023-07-10 05:49:25'),(5,'こう','takagi@cybers.co.jp',NULL,'$2y$10$JXhSepqGjY49hWc67pUMxONs/sqeL5sQEbCO0p3PSugd4eaP1VNEK',NULL,NULL,NULL,NULL,'2023-07-10 13:32:04','2023-07-10 13:32:04'),(6,'kou','takagi@live.jp',NULL,'$2y$10$.0VIa557jqCf0MB8lKyA3OP8o5tlUI2KZnByQn9kkxYVNrObLAbC6',NULL,NULL,NULL,NULL,'2023-07-10 23:12:32','2023-07-10 23:12:32'),(7,'miyamae','miyamae@cybers.co.jp',NULL,'$2y$10$rEJHUiZV7.azKc467ZzTBeHdTq.g.7lhq9ZkT.Fhm7jedAa6qqcxC',NULL,NULL,NULL,NULL,'2023-07-11 03:43:13','2023-07-11 03:43:13'),(8,'Quang','nhatquang0982@gmail.com',NULL,'$2y$10$7/hPGkGuaxDGzyKP63q1MOhqXFb6QVFQMQDLlX42yON.lXb8GFZYC',NULL,NULL,NULL,NULL,'2023-07-22 20:50:09','2023-07-22 20:50:09');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'delivery_management_system'
--

--
-- Dumping routines for database 'delivery_management_system'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-07-23 10:50:47
