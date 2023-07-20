CREATE DATABASE  IF NOT EXISTS `prtimes` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `prtimes`;
-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)
--
-- Host: 162.43.19.111    Database: prtimes
-- ------------------------------------------------------
-- Server version	8.0.32

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
INSERT INTO `redeliveries` VALUES (1,'d7470fae-3d98-46a9-9f0f-9d657450ca47','テスト案件あああああ','依頼者名 14','1050001','東京都 港区 虎ノ門','456','555-999','1500012','東京都 渋谷区 広尾',NULL,'999-9999','お名前 10','2023-07-09 00:00:00','2023/07/09（日）',1,'常温',1,123,'〇〇〇〇',4,'不在','123456789-999',11,'これはテストデータです。','2023-07-31',4,'19:00-21:00',NULL,'2023-07-11 10:41:48','2023-07-14 11:33:46'),(2,'0327a235-de28-4913-b361-6209fe7389d7','test',NULL,'1500012',NULL,NULL,NULL,'1500012',NULL,NULL,NULL,NULL,'2023-07-19 00:00:00','2023/07/19（水）',1,'常温',1,0,'a',1,'集荷','11',NULL,NULL,NULL,NULL,NULL,'2023-07-14 08:22:51','2023-07-11 22:35:38','2023-07-14 08:22:51'),(3,'124a54cc-f2c7-4dfc-b2e0-2ec6008b8720','あ',NULL,'1050004',NULL,NULL,NULL,'1050003',NULL,NULL,NULL,NULL,'2023-07-15 00:00:00','2023/07/15（土）',1,'常温',1,0,'あ',1,'集荷','111',NULL,NULL,NULL,NULL,NULL,'2023-07-14 06:49:38','2023-07-11 23:18:39','2023-07-14 06:49:38'),(4,'bceb3190-1fe8-4d27-993b-6d343fd746f7','あ',NULL,'1',NULL,NULL,NULL,'1',NULL,NULL,NULL,NULL,'2023-07-13 00:00:00','2023/07/13（木）',1,'常温',1,0,'1',1,'集荷','1',1,'1',NULL,NULL,NULL,'2023-07-14 06:47:00','2023-07-11 23:19:27','2023-07-14 06:47:00'),(5,'7d84843d-b5e6-4a8c-927e-2107f7a2a6bb','テスト',NULL,'1050004',NULL,NULL,NULL,'1050004',NULL,NULL,NULL,NULL,'2023-07-31 00:00:00','2023/07/31（月）',3,'冷凍',2,0,'宮前',1,'集荷','111-11111-1111',NULL,'テスト',NULL,NULL,NULL,'2023-07-14 06:50:43','2023-07-12 00:13:40','2023-07-14 06:50:43'),(6,'f8170140-2033-48d4-a710-efa1361df5b7',' Test',NULL,'2342342',NULL,NULL,NULL,'33333',NULL,NULL,NULL,NULL,'2023-07-26 00:00:00','2023/07/26（水）',2,'冷蔵',54,0,'12345',1,'集荷','4332342342',7,'fsdfaf','2023-07-26',4,'19:00-21:00','2023-07-14 06:50:14','2023-07-12 00:56:04','2023-07-14 06:50:14'),(7,'4cd1e63d-1f76-4d9f-95cc-7008d3e3148d','3424324','rwerqwerqw','2342342','Test 配送元1','Test 配送元2',NULL,'342432','Test 配送先1','Test 配送先2',NULL,'42342342','2023-07-20 00:00:00','2023/07/20（木）',1,'常温',54,242342,'5',2,'受付','rwew',2343424,'eqweq','2023-07-21',4,'19:00-21:00','2023-07-13 16:48:22','2023-07-12 21:53:59','2023-07-13 16:48:22'),(8,'48eb19c2-2ee7-4415-ab25-d498011b3b07','Test 13','依頼者名 14','2342342','Test 配送元1','Test 配送元2',NULL,'33333','Test 配送先1','Test 配送先2',NULL,'お名前 15','2023-07-14 00:00:00','2023/07/14（金）',3,'冷凍',54,242342,'ドライバー 16',9,'配達済み','荷物コード 17',123,'備考','2023-08-21',1,'09:00-12:00',NULL,'2023-07-12 23:04:13','2023-07-13 11:40:28'),(9,'f9bbc79e-9c90-4045-b9dc-e331ae0c38b6','1','2','1000004','東京都 千代田区 大手町','3','4','1000001','東京都 千代田区 千代田','5','6','7','2023-08-04 00:00:00','2023/08/04（金）',2,NULL,8,9,'10',1,NULL,'11',12,'13',NULL,NULL,NULL,'2023-07-14 11:37:27','2023-07-13 15:49:02','2023-07-14 11:37:27'),(10,'81aad69b-b92f-48d6-a553-bfcfec7fa052','12','23','1000001','東京都 千代田区 千代田','34','45','1000004','東京都 千代田区 大手町','56','67','78','2023-09-08 00:00:00','2023/09/08（金）',3,'冷凍',89,910,'1011',3,'保管','1112',1213,'1314',NULL,NULL,NULL,NULL,'2023-07-13 15:53:27','2023-07-13 22:57:39');
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
INSERT INTO `sessions` VALUES ('1e0ked9Ir3gU17pkvjuKoIVPUrArU1HBho5GjoMY',NULL,'128.1.41.5','','YTozOntzOjY6Il90b2tlbiI7czo0MDoiMW9VZ3ZCazBjTm5KakZFMnV2eldleG1VRnY3WlluWkpMcmpFMUplbyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHA6Ly8xNjIuNDMuMTkuMTExIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1689639433),('22T43WahxnUxNzKt855nV5UUTkDTUkzkGYdxvgec',NULL,'141.98.11.207','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.85 Safari/537.36 Edg/90.0.818.46','YToyOntzOjY6Il90b2tlbiI7czo0MDoiRjhZNWplT2xjakxrcWtZMmNwUkc0SG05cGhYTlNnODlKN1hjeVR5WSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1689620659),('29yKNYh1W8Ul83o73nnSoWKAJczSAHbxWlbtkrEe',NULL,'172.104.210.105','Mozilla/5.0 zgrab/0.x','YTozOntzOjY6Il90b2tlbiI7czo0MDoiTE5mRFBkMENLRExoM1RGTFA4Z0hsQnFxTEhMZndVSmtVaTA5WkVYbSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHA6Ly8xNjIuNDMuMTkuMTExIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1689646677),('2xcdZWxJJU4qilTxyW97giUd6DkOfstZ3tJvpr8i',NULL,'35.187.98.121','python-requests/2.31.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiejBXUjYxWW9LOWVCZUt5bFp5VlZ2akQ2dmNKZFRBVVNma2hsbWxRNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHA6Ly8xNjIuNDMuMTkuMTExIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1689647889),('7eHPZZgIfN8TRKUxwoFAcEqk0wiaLirQGAHEKHUr',NULL,'91.224.92.16','','YTozOntzOjY6Il90b2tlbiI7czo0MDoibGU5ZnlWYVVEenljNkNXZDBmbDNVQVN0blZoMENTam80em9MVnRJdiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHA6Ly8xNjIuNDMuMTkuMTExIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1689627370),('7ZzN1S2vSB1gmLHq9DRy0Gmpr83EaEs53eS72wZB',NULL,'106.146.0.234','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoid0k3aE1wWVlqczdyWmRyU0JyNkM5QmxWTDJJa0ZvVzVOaDNZVzNmbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xNjIuNDMuMTkuMTExL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1689637411),('9VVUzd9tKzYlhdcB2hbt1Jq7E5NhuSgbmmqeGr3h',NULL,'213.109.202.66','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoidGZLdmI4dUdqeldGVHNKeVhBSFBNRzhldXhib0FibGw5UzRRUm9CWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xNjIuNDMuMTkuMTExL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1689638381),('AxkdQVa3ssJyYr48739UZWaHkpFycLkWWJz7kN7j',NULL,'61.72.13.225','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiRWRTeHFEODFxd3JSdTFKTVhZMU14NFA1NlNWdEF6QXZuaVp1Rm1IeSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHA6Ly8xNjIuNDMuMTkuMTExIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1689645949),('bTkIIzp45PUGoyJlAZMhlnEizkdSqjhV4hRb5ZLO',NULL,'209.222.252.91','Java/1.8.0_362','YTozOntzOjY6Il90b2tlbiI7czo0MDoiSmc1T055enJXRnFmUWNmekNHM0tMOGlmbVVUZndYRk8zWXZ2aDVreSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xNjIuNDMuMTkuMTExL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1689659349),('DbFYFl3bZ1qGtcOShNm07k2v3rXLbSOZMpxerqd7',NULL,'190.137.180.58','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiR1Z0cFNmRlFVeHRrdzNOaXpiVTEzT3BjWmNTMGhXN3c3RmJPdWh6UiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHA6Ly8xNjIuNDMuMTkuMTExIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1689632151),('DJNuiQSuBJzXZIuNx7tghNi4o4Tk0JyRJwBU8Jxj',NULL,'213.109.202.66','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiYTBMTDlwSGVlWHNHd1ZiaFB1VW5tS2Nya3ltOHR3YWhpb2l4cU1ydyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTU2OiJodHRwOi8vMTYyLjQzLjE5LjExMS9pbmRleC5waHA/ZnVuY3Rpb249Y2FsbF91c2VyX2Z1bmNfYXJyYXkmcz0lMkZJbmRleCUyRiU1Q3RoaW5rJTVDYXBwJTJGaW52b2tlZnVuY3Rpb24mdmFycyU1QjAlNUQ9bWQ1JnZhcnMlNUIxJTVEJTVCMCU1RD1IZWxsb1RoaW5rUEhQMjEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1689633372),('EWcPV7QagZGColhaAW1Xhymnz1pTgoCAWOfATiVq',NULL,'52.141.92.47','Mozilla/5.0 (Linux; U; Android 4.4.2; en-US; HM NOTE 1W Build/KOT49H) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 UCBrowser/11.0.5.850 U3/0.8.0 Mobile Safari/534.30','YToyOntzOjY6Il90b2tlbiI7czo0MDoidmo2N3pzWW44SUNEYmFFT3ZyV3ZqaExrTXFlNmIxSXBkcW1UQW1jaiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1689628371),('fMG2UMprMh6pnc0QYFOq0wntuiKOXLIuBRxp4c7e',NULL,'213.109.202.66','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoibU9kbWppbDlzZlRqcHNwbk0xd2lnUDNsZDVyNERWU0hrSHBIdmh3WSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHA6Ly8xNjIuNDMuMTkuMTExIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1689651004),('fsdsnrHXHOAh48TTptQmuAyjUm29bHO4I1X2AMcq',NULL,'213.109.202.66','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiYU5ZS2Y1eFY2OTJXWWlWVHRVM2ZrdzJCWjA1cUZ6dzJ0V3BWVUxybSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xNjIuNDMuMTkuMTExL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1689651004),('g45FGWdlB5vfm7to4kvoooKNjkWHJRtGC92oMOjq',NULL,'213.109.202.66','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoianFpdlFKNHlPZno1MUZ1S1R1RlRaUkpkcEFVaE1IMUdROGNWM1FidiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTE6Imh0dHA6Ly8xNjIuNDMuMTkuMTExLz9YREVCVUdfU0VTU0lPTl9TVEFSVD1waHBzdG9ybSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1689638380),('gg3mxooS8RPEuK5pXAbrJ3QG4u1KFazTdi5uBbtO',NULL,'66.240.236.109','Mozilla/5.0 zgrab/0.x','YTozOntzOjY6Il90b2tlbiI7czo0MDoiaFl2VUs3VzkzMTdyZDZpYU9DSTlHR2ZxZ254alNhNW5lV3hYQ3E5eCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHA6Ly8xNjIuNDMuMTkuMTExIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1689653925),('hKZ8CCglCIZw41xkJ1LexNXqqGwfLdOqwZhhfQ5m',4,'180.60.5.130','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYkFHU2d2VWppTGx0aE42OU5mb0lKVGpScnBxMDdUWUpaZHJnYTU5VSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xNjIuNDMuMTkuMTExL3JlZGVsaXZlcmllcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjQ7fQ==',1689650372),('jdQ0IFTjSDN5K6mkLWjRbyBN15bEP1xHw1ZE8k2a',NULL,'213.109.202.66','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiMUk2QUdtRlA3WU9RQVlxYloydmhpUmZMYThCTlJPWmhvcjB0RENtTCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xNjIuNDMuMTkuMTExL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1689645795),('jFt7JipoianHnAphSfXQHzNfJuRsdQWwF7p3rYy8',NULL,'104.152.52.189','masscan/1.3 (https://github.com/robertdavidgraham/masscan)','YTozOntzOjY6Il90b2tlbiI7czo0MDoiYW5zNVlWZW94dkFDQkJHODdxZ0RzMVUyWko4TjU0ekNNb1lqUkFlcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly9sYXJhdmVsLmV4YW1wbGUubmV0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1689639890),('l4ni0g7tNQ858sumHF6a3J0AfRRQMNiUU7dl9EJi',NULL,'213.109.202.66','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoieFY0OEZpRjl3eVFlYmdyTFF0eXM5U2NkMUE3QzZyVlBkNHNaSUhLeiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xNjIuNDMuMTkuMTExL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1689636514),('lxwmY8J8PinKWNQBdkZYj3gKu1m13mbZaPGI2UJo',NULL,'141.98.11.207','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.85 Safari/537.36 Edg/90.0.818.46','YToyOntzOjY6Il90b2tlbiI7czo0MDoiN0duYnozSnlMUmhDU3lsTDVxMlllWFFpdlJTbzl0cXBvbzZQamh6ciI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1689626270),('LZn0Xm9y7mcbflmECHfGPN31tQ0votWZVlNpeuGO',NULL,'91.224.92.16','','YTozOntzOjY6Il90b2tlbiI7czo0MDoiUFJMYmREb21tMEIxMlE4ZGJ5d21CaXVQWmhmbTYxeGoxQkJFQTVJMSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHA6Ly8xNjIuNDMuMTkuMTExIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1689634098),('m2GSm0wnFpDiJarOcYbi4ErEophBXqQVxIKP7I4v',NULL,'185.233.19.161','','YTozOntzOjY6Il90b2tlbiI7czo0MDoiY1RsVTZTREFUYWhTTmhoYTBDMlpIblRLNUUzaDBmWUpHa2IyR3M2MSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHA6Ly8xNjIuNDMuMTkuMTExIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1689639626),('mRECLNBAOCwMu7T7oljj1fJFASndyK3rh11AY5fp',NULL,'66.175.213.4','Mozilla/5.0 (Macintosh; Intel Mac OS X 13_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiMmhwbG5nUGlsU0dYdnVwZm9ybTdGZm9JS25kQ0pucWg0dmpWdjBtdCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHA6Ly8xNjIuNDMuMTkuMTExIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1689646715),('mUeRf89tM0LedIRjIfEYuoIWLIA2M9CuCVKJDmi5',4,'180.60.5.130','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYTVSeEh0Q0t2QWIzNnlkeU9va204RGkyYXIyV1N3NGp3T05TNEhBcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xNjIuNDMuMTkuMTExL3JlZGVsaXZlcmllcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjQ7fQ==',1689659364),('N6hBmRoKn1gPDWxVbbeb02lrzRNWtBhfzjQxFVUg',NULL,'128.1.41.5','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_0) AppleWebKit/535.11 (KHTML, like Gecko) Chrome/17.0.963.56 Safari/535.11','YTozOntzOjY6Il90b2tlbiI7czo0MDoiR0ZRVmI0SVlETlNBZDZGNll3d1I5bFBTN3lCczJFUWZNSzYyRDd5dyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xNjIuNDMuMTkuMTExL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1689639442),('PVmBcDe1zs7YaaB2WENP34CS8rSEBRNqNj055mfz',NULL,'141.98.11.207','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.85 Safari/537.36 Edg/90.0.818.46','YToyOntzOjY6Il90b2tlbiI7czo0MDoiOVA4eXV3UjhLOTV6Z2YxQVRhUDI3OXRwa2tPeWFjeXJnU25pODlLZCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1689623171),('qspWxjzMXhjCGSqD9OdvsYdmfQJ93E8Yq7eexA7g',NULL,'213.109.202.66','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiOGo2cmVFeHJTS21mc2V1TkI5OGxnazA4dWk1eTlUMEU5NURpQjZQQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6OTM6Imh0dHA6Ly8xNjIuNDMuMTkuMTExLz9hPWZldGNoJmNvbnRlbnQ9JTNDcGhwJTNFZGllJTI4JTQwbWQ1JTI4SGVsbG9UaGlua0NNRiUyOSUyOSUzQyUyRnBocCUzRSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1689636513),('RRkhyU8sXzReHqiJ3WcPyLXeF15V9Y4hN5rKt87H',NULL,'1.75.212.9','Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiOTdTWTNrcXlveVp6V2lOZHJkeUdRQjBPMVJUb1RKdGgxREdiSVZYcyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NzA6Imh0dHA6Ly8xNjIuNDMuMTkuMTExL3JlZGVsaXZlcmllcy9kNzQ3MGZhZS0zZDk4LTQ2YTktOWYwZi05ZDY1NzQ1MGNhNDciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1689650380),('RyL2y8nLbE1799W9d3U6umiPyDlXVZb2ZLPOojH8',NULL,'209.222.252.91','Java/1.8.0_362','YTozOntzOjY6Il90b2tlbiI7czo0MDoiek5uUXp6blE1ZFRDMWtka1Q0VkpMQ3B1VU1zd3pZWUM2RVJpUmE1WSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHA6Ly8xNjIuNDMuMTkuMTExIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1689659348),('Sqh2KT4vqaphc3OJDgp1X3gno2L59n06NyOj4ZzA',NULL,'1.75.212.9','Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoicTB6aEZDT2kwZ3pJblRXZXZkdURlNUcwQU9qcVdxN2pScUxaVmpiaiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NzA6Imh0dHA6Ly8xNjIuNDMuMTkuMTExL3JlZGVsaXZlcmllcy9kNzQ3MGZhZS0zZDk4LTQ2YTktOWYwZi05ZDY1NzQ1MGNhNDciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1689659381),('SsnAp45SNAKr3hqAUg0XHOaylYqseFPshcnUauoZ',NULL,'213.109.202.66','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoibGtnT1hGR2JjcnRoWVJ4NXUzM2xZRTBrSUpObTMwTHM2VTNuNmlmWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xNjIuNDMuMTkuMTExL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1689633374),('tFWWcUU3nNHeiiumxPMt6xQo8TnwwJ7yToAEx2tN',NULL,'213.109.202.66','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiTkJJd3IydGJNbjBYRG1KZ1ZOZG5VZWNkdGtjUWxTMWdEVFVmbTdPZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHA6Ly8xNjIuNDMuMTkuMTExIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1689645794),('UfquWkCw98MrnNVgnNHgV26ca0Py83pOEylHh2oX',NULL,'106.146.48.227','Mozilla/5.0 (iPhone; CPU iPhone OS 16_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/114.0.5735.124 Mobile/15E148 Safari/604.1','YTozOntzOjY6Il90b2tlbiI7czo0MDoiQ1hyMXRjM3RqVlI4RFVKUHI0R2NTUDU1dExZUlVPN0ZkOXZJUGpxeCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xNjIuNDMuMTkuMTExL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1689635641),('v8mvh18MEYlVv1lbfH8lwKJys5wT2HZh6KJFTFAx',NULL,'103.110.33.235','Mozilla/5.0 zgrab/0.x','YTozOntzOjY6Il90b2tlbiI7czo0MDoiQnhBV2J3dUtLU2VjdXZka3NvejliMTVnampEaUhZSEFKZnhTVEVTMSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHA6Ly8xNjIuNDMuMTkuMTExIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1689625081),('vB9Zrk4yeTwtmMbyOVm5cIvzbgndcfiVsWk1BJZx',NULL,'91.224.92.16','','YTozOntzOjY6Il90b2tlbiI7czo0MDoiR0lmYklqQjlmYTJOaFZRUmozUVA4SmdrSHpXRTlySFZxRWkyTENqSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHA6Ly8xNjIuNDMuMTkuMTExIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1689623729),('ZIMjqi3F5BqNYwecuku5CKc0bUnoV0ZdnQfq5b3T',NULL,'205.210.31.128','Expanse, a Palo Alto Networks company, searches across the global IPv4 space multiple times per day to identify customers&#39; presences on the Internet. If you would like to be excluded from our scans, please send IP addresses/domains to: scaninfo@paloaltonetworks.com','YTozOntzOjY6Il90b2tlbiI7czo0MDoiV1NqYUkyZjJKRjRQczBjNXZYTlc2VHdiQTF1dUhiWmhMZXR1d1BzSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly9sYXJhdmVsLmV4YW1wbGUubmV0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1689644101);
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Quang Vo Nhat','nhatquang0982@gmail.com',NULL,'$2y$10$OjzsboOjbft2UqfikCUAbermkSeJDlFbHjauVXWXxaoYfd40QlpcK',NULL,NULL,NULL,'F3bZGGQnG71u0Ok1XEslg4Xs3QmIVZ8tvpXfMo9dKnPYkVaV64nXjDKLIEoL','2023-07-09 21:21:52','2023-07-09 21:21:52'),(2,'Test','quang.vo@tpptechnology.com',NULL,'$2y$10$E2tV3FvLG1.cq9UipDSt3..MlyGnCgmzKqDRaiFpRKftd8WtrqMSK',NULL,NULL,NULL,NULL,'2023-07-09 22:36:59','2023-07-09 22:36:59'),(3,'Test 1','quangcomnhom@gmail.com',NULL,'$2y$10$iKiT22cYG18OB7RZxxfx8ObCKYsj3MQQAdpRVU8aFLzoi4VkyxCE2',NULL,NULL,NULL,NULL,'2023-07-09 22:39:52','2023-07-09 22:39:52'),(4,'中井','hnk11101236@gmail.com',NULL,'$2y$10$cOcoj.z2823bQIcUGTZnVeXw7gLpE50CSskmE2/TNcek.fEatfoou',NULL,NULL,NULL,NULL,'2023-07-10 05:49:25','2023-07-10 05:49:25'),(5,'こう','takagi@cybers.co.jp',NULL,'$2y$10$JXhSepqGjY49hWc67pUMxONs/sqeL5sQEbCO0p3PSugd4eaP1VNEK',NULL,NULL,NULL,NULL,'2023-07-10 13:32:04','2023-07-10 13:32:04'),(6,'kou','takagi@live.jp',NULL,'$2y$10$.0VIa557jqCf0MB8lKyA3OP8o5tlUI2KZnByQn9kkxYVNrObLAbC6',NULL,NULL,NULL,NULL,'2023-07-10 23:12:32','2023-07-10 23:12:32'),(7,'miyamae','miyamae@cybers.co.jp',NULL,'$2y$10$rEJHUiZV7.azKc467ZzTBeHdTq.g.7lhq9ZkT.Fhm7jedAa6qqcxC',NULL,NULL,NULL,NULL,'2023-07-11 03:43:13','2023-07-11 03:43:13');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'prtimes'
--

--
-- Dumping routines for database 'prtimes'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-07-18 13:02:25
