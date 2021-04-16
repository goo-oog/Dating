-- MySQL dump 10.13  Distrib 8.0.23, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: dating
-- ------------------------------------------------------
-- Server version	8.0.23

/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE = @@TIME_ZONE */;
/*!40103 SET TIME_ZONE = '+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS = @@UNIQUE_CHECKS, UNIQUE_CHECKS = 0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS = @@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS = 0 */;
/*!40101 SET @OLD_SQL_MODE = @@SQL_MODE, SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES = @@SQL_NOTES, SQL_NOTES = 0 */;

--
-- Table structure for table `males`
--

DROP TABLE IF EXISTS `males`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `males`
(
    `id`     mediumint unsigned NOT NULL AUTO_INCREMENT,
    `name`   varchar(255) COLLATE utf8mb4_0900_as_ci DEFAULT NULL,
    `gender` varchar(1) COLLATE utf8mb4_0900_as_ci   DEFAULT 'M',
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 101
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_0900_as_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `males`
--

LOCK TABLES `males` WRITE;
/*!40000 ALTER TABLE `males`
    DISABLE KEYS */;
INSERT INTO `males`
VALUES (6, 'Kessie', 'M'),
       (7, 'Laith', 'M'),
       (12, 'Boris', 'M'),
       (13, 'Kibo', 'M'),
       (16, 'Clarke', 'M'),
       (17, 'Kaseem', 'M'),
       (18, 'MacKenzie', 'M'),
       (19, 'Caleb', 'M'),
       (21, 'Caldwell', 'M'),
       (23, 'Grace', 'M'),
       (26, 'Palmer', 'M'),
       (27, 'Zeus', 'M'),
       (30, 'Gray', 'M'),
       (32, 'Grant', 'M'),
       (35, 'Quyn', 'M'),
       (37, 'Samuel', 'M'),
       (38, 'Dante', 'M'),
       (39, 'Scott', 'M'),
       (40, 'Vernon', 'M'),
       (41, 'Alexis', 'M'),
       (43, 'Cyrus', 'M'),
       (45, 'Eaton', 'M'),
       (46, 'Louis', 'M'),
       (47, 'Leroy', 'M'),
       (48, 'Norman', 'M'),
       (49, 'Stewart', 'M'),
       (50, 'Erich', 'M'),
       (51, 'Christopher', 'M'),
       (52, 'Bernard', 'M'),
       (53, 'Philip', 'M'),
       (54, 'Josiah', 'M'),
       (59, 'Thor', 'M'),
       (60, 'Victor', 'M'),
       (63, 'Fulton', 'M'),
       (68, 'Echo', 'M'),
       (72, 'Noel', 'M'),
       (75, 'Yuri', 'M'),
       (76, 'Norman', 'M'),
       (78, 'Jorden', 'M'),
       (79, 'Reuben', 'M'),
       (81, 'Winifred', 'M'),
       (82, 'Orlando', 'M'),
       (84, 'Mannix', 'M'),
       (85, 'Gareth', 'M'),
       (87, 'Noah', 'M'),
       (90, 'Kyle', 'M'),
       (94, 'Emerald', 'M'),
       (95, 'Barry', 'M'),
       (96, 'Jerry', 'M'),
       (98, 'Kevyn', 'M');
/*!40000 ALTER TABLE `males`
    ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE = @OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE = @OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS = @OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS = @OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES = @OLD_SQL_NOTES */;

-- Dump completed on 2021-04-15 16:03:46
