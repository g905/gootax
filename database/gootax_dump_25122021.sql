-- MariaDB dump 10.19  Distrib 10.6.5-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: guttax
-- ------------------------------------------------------
-- Server version	10.6.5-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cities`
--

LOCK TABLES `cities` WRITE;
/*!40000 ALTER TABLE `cities` DISABLE KEYS */;
INSERT INTO `cities` VALUES (1,'Ижевск','2021-12-21 21:45:38','2021-12-25 09:30:04','izevsk'),(2,'Kazan’','2021-12-21 22:02:40','2021-12-25 09:30:04','kazan'),(3,'Izhevsk','2021-12-22 22:56:23','2021-12-25 09:30:04','izhevsk'),(4,'Псков','2021-12-22 23:02:33','2021-12-25 10:19:52','pskov'),(5,'Пермь','2021-12-22 23:03:52','2021-12-25 10:07:31','perm'),(7,'Moscow','2021-12-22 23:05:49','2021-12-25 09:30:04','moscow'),(8,'Репьевка','2021-12-24 06:26:55','2021-12-25 09:30:04','repevka'),(9,'Чулым','2021-12-24 07:30:01','2021-12-25 09:30:04','culym'),(10,'Кондинское','2021-12-24 07:30:43','2021-12-25 09:30:04','kondinskoe'),(11,'Нарьян-Мар','2021-12-24 09:09:56','2021-12-25 09:30:04','naryan-mar'),(12,'Бавлены','2021-12-24 09:12:01','2021-12-25 09:30:04','bavleny'),(13,'Шебекино','2021-12-24 09:21:19','2021-12-25 09:30:04','sebekino'),(14,'Алабино','2021-12-24 10:49:52','2021-12-25 09:30:04','alabino'),(15,'Абан','2021-12-25 00:02:01','2021-12-25 09:30:04','aban'),(16,'Абаза','2021-12-25 00:26:30','2021-12-25 09:30:04','abaza'),(17,'Воронеж','2021-12-25 09:39:50','2021-12-25 09:39:50','voronez'),(18,'Москва','2021-12-25 10:11:00','2021-12-25 10:11:00','moskva');
/*!40000 ALTER TABLE `cities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
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
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2021_12_22_005223_create_cities_table',2),(6,'2021_12_22_005928_create_reviews_table',2),(8,'2021_12_23_080604_create_user_details_table',3),(9,'2021_12_24_145321_make_img_nullable',4),(12,'2021_12_25_132404_add_city_code',5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reviews` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_city` bigint(20) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(11) NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_author` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
INSERT INTO `reviews` VALUES (1,1,'Izhevsk review 1','text izhevsk',2,'',1,NULL,NULL),(2,1,'Izhevsk review 2','text textsdfsdfsd',3,'',1,NULL,NULL),(3,1,'Izhevsk review 1','text izhevsk',2,'',1,NULL,NULL),(4,2,'Kazan review 2','text textsdfsdfsd',3,'',1,NULL,NULL),(5,1,'sdf','sdfgh',1,'',3,'2021-12-23 00:49:37','2021-12-23 00:49:37'),(6,1,'dfg','qweqw',1,'',3,'2021-12-23 00:50:14','2021-12-23 00:50:14'),(7,1,'xcvq','we',1,'',3,'2021-12-23 00:50:30','2021-12-23 00:50:30'),(8,1,'Moscow','Great',1,'',3,'2021-12-23 00:50:48','2021-12-23 00:50:48'),(9,7,'sdf','dfh',1,'',3,'2021-12-23 00:55:45','2021-12-23 00:55:45'),(12,7,'We are in Moscow city','Varlamov sucks',1,'',3,'2021-12-23 00:57:18','2021-12-23 00:57:18'),(13,7,'Moscow again','Nice',1,'',3,'2021-12-23 01:05:56','2021-12-23 01:05:56'),(14,7,'Moscow is best','John Doe sucks',1,'',4,'2021-12-23 02:18:25','2021-12-23 02:18:25'),(15,7,'Moscow is best','John Doe sucks',1,'',4,'2021-12-23 02:18:25','2021-12-23 02:18:25'),(16,4,'Псковское порно','Весь город сплошное порно',1,'',4,'2021-12-23 04:32:22','2021-12-23 04:32:22'),(17,4,'Псков 2','Описание текст текст текст\r\nОписание текст текст текст\r\nОписание текст текст текстОписание текст текст текст',1,'',4,'2021-12-23 04:33:25','2021-12-23 04:33:25'),(18,5,'Перьм','Все время забываю где в Перми мягкий знак',1,'',4,'2021-12-23 04:34:40','2021-12-23 04:34:40'),(19,1,'Ижевск','Да.',1,'',4,'2021-12-23 05:03:29','2021-12-23 05:03:29'),(20,1,'Ижевск','четыре звезды',4,'',4,'2021-12-23 05:04:47','2021-12-23 05:04:47'),(21,17,'testae','hisfg',5,'',10,'2021-12-24 05:22:25','2021-12-25 09:45:27'),(25,9,'DSDF','dfgd',3,'',10,'2021-12-24 07:30:01','2021-12-24 07:30:01'),(26,10,'adsjfh`','lsklgksd',2,'',10,'2021-12-24 07:30:43','2021-12-24 07:30:43'),(28,12,'WWW','BBB',1,'',10,'2021-12-24 09:12:01','2021-12-24 09:12:01'),(29,13,'VVVqqq','dfg',1,'files/NSZvwLxXUKbbqWSckam0QoENcjRBsFwiYG1mDn9b.png',10,'2021-12-24 09:21:19','2021-12-25 00:24:28'),(30,14,'sdfgyyy','ghdfs',4,NULL,10,'2021-12-24 10:57:28','2021-12-25 00:25:09'),(32,15,'FFF','BBB',1,NULL,10,'2021-12-25 00:02:01','2021-12-25 00:02:01'),(33,15,'new','new',1,NULL,10,'2021-12-25 00:25:44','2021-12-25 00:25:44'),(34,16,'new','ddd',1,NULL,10,'2021-12-25 00:26:30','2021-12-25 00:26:30');
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_details`
--

DROP TABLE IF EXISTS `user_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_details`
--

LOCK TABLES `user_details` WRITE;
/*!40000 ALTER TABLE `user_details` DISABLE KEYS */;
INSERT INTO `user_details` VALUES (1,3,'john@doe.ru','+793483454323','Йохн Васильевич Дое',NULL,NULL),(2,4,'var@lamov.com','+78345349346','Илья Варламов',NULL,NULL),(3,1,'testte@lamov.com','+7834534456','Тестте Тестте',NULL,NULL),(4,10,'breakestra@yandex.ru','+79128577186','Жарников Егор Александрович',NULL,NULL);
/*!40000 ALTER TABLE `user_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Testte','test@test.te',NULL,'$2y$10$FbHVWrobnshnMPiDIF9/ruVADXf6Sof9hpVcG.dm4d/IyLSaRaDjO',NULL,'2021-12-22 17:34:46','2021-12-22 17:34:46'),(2,'Joe','joe@sdf.er',NULL,'$2y$10$Btgl7cDnPtYWEjOb30/TuO3CU8vyUzJEUINuwBoD7EbJ13h2EmX3m',NULL,'2021-12-23 00:13:13','2021-12-23 00:13:13'),(3,'John Doe','john@doe.com',NULL,'$2y$10$S/0amf0nO6V1noNeuM0Puum0FCjxw7Nzd8epWxWXkz1ReEUS4AFKO',NULL,'2021-12-23 00:19:18','2021-12-23 00:19:18'),(4,'Ilya Varlamov','var@lam.ov',NULL,'$2y$10$.lL8beb8U4DaRJD.RqeiF.ccHKYuakNWu1jpTa1OMXguFGSWN7jPi',NULL,'2021-12-23 02:17:20','2021-12-23 02:17:20'),(10,'mail','breakestra@yandex.ru','2021-12-23 08:55:48','$2y$10$BcmwU9/.3XnJ.GpmaKrCN.ZZDPHLnkkPYZuaNc9wTl8G9FjqjS9Rm',NULL,'2021-12-23 08:53:37','2021-12-23 08:55:48'),(11,'A','a@sdf.er',NULL,'$2y$10$Q7wDGX8tWjiUV7aUeOZMSewA/tiqSZ41A./0rKO26o5pGkrsfrDlC',NULL,'2021-12-24 08:31:00','2021-12-24 08:31:00'),(12,'asdf','sdf@sdf.rt',NULL,'$2y$10$1cThuzJs7h0.mG6NFPjZtu4tiFWqrj1PS.DgVWgvYjwsOUf00WnpW',NULL,'2021-12-24 08:31:32','2021-12-24 08:31:32');
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

-- Dump completed on 2021-12-25 19:14:24
