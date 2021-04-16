-- MySQL dump 10.13  Distrib 8.0.23, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: dating
-- ------------------------------------------------------
-- Server version	8.0.23

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
-- Table structure for table `hashes`
--

DROP TABLE IF EXISTS `hashes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hashes` (
  `userid` int DEFAULT NULL,
  `hash` varchar(127) COLLATE utf8mb4_0900_as_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_as_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hashes`
--

LOCK TABLES `hashes` WRITE;
/*!40000 ALTER TABLE `hashes` DISABLE KEYS */;
INSERT INTO `hashes` VALUES (555,'q387cryiqwycbuiqewbcouqw'),(12,'1111111111111'),(201,'$2y$10$vpqcZgG2Kn/KLHbv0iLmUO4w6q6.QUPu33AJ2.Xb5VHXRnRcu9Wt.'),(202,'$2y$10$kLVNh.yC9lmh0LOrgUPmY.GG.h3FGJokAt4se/HCj/X.4Th3ZVsLy'),(203,'$2y$10$g94uZTSxrIh/htAugNV0P.As5JK4fOGIfK75GfjycfgLF7V/gIRPq');
/*!40000 ALTER TABLE `hashes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `likes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userid` int DEFAULT NULL,
  `liked_by` int DEFAULT NULL,
  `disliked_by` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_as_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `likes`
--

LOCK TABLES `likes` WRITE;
/*!40000 ALTER TABLE `likes` DISABLE KEYS */;
INSERT INTO `likes` VALUES (1,98,101,NULL),(2,96,NULL,106),(3,95,110,113),(4,96,117,113),(5,87,101,NULL),(6,12,NULL,101);
/*!40000 ALTER TABLE `likes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `photos`
--

DROP TABLE IF EXISTS `photos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `photos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userid` int DEFAULT NULL,
  `filename` varchar(255) COLLATE utf8mb4_0900_as_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_as_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photos`
--

LOCK TABLES `photos` WRITE;
/*!40000 ALTER TABLE `photos` DISABLE KEYS */;
/*!40000 ALTER TABLE `photos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(31) COLLATE utf8mb4_0900_as_ci DEFAULT NULL,
  `gender` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_as_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=204 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_as_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (6,'Kessie','M'),(7,'Laith','M'),(12,'Boris','M'),(13,'Kibo','M'),(16,'Clarke','M'),(17,'Kaseem','M'),(18,'MacKenzie','M'),(19,'Caleb','M'),(21,'Caldwell','M'),(23,'Grace','M'),(26,'Palmer','M'),(27,'Zeus','M'),(30,'Gray','M'),(32,'Grant','M'),(35,'Quyn','M'),(37,'Samuel','M'),(38,'Dante','M'),(39,'Scott','M'),(40,'Vernon','M'),(41,'Alexis','M'),(43,'Cyrus','M'),(45,'Eaton','M'),(46,'Louis','M'),(47,'Leroy','M'),(48,'Norman','M'),(49,'Stewart','M'),(50,'Erich','M'),(51,'Christopher','M'),(52,'Bernard','M'),(53,'Philip','M'),(54,'Josiah','M'),(59,'Thor','M'),(60,'Victor','M'),(63,'Fulton','M'),(68,'Echo','M'),(72,'Noel','M'),(75,'Yuri','M'),(76,'Norman','M'),(78,'Jorden','M'),(79,'Reuben','M'),(81,'Winifred','M'),(82,'Orlando','M'),(84,'Mannix','M'),(85,'Gareth','M'),(87,'Noah','M'),(90,'Kyle','M'),(94,'Emerald','M'),(95,'Barry','M'),(96,'Jerry','M'),(98,'Kevyn','M'),(101,'Tallulah','F'),(106,'Piper','F'),(110,'Oprah','F'),(113,'Unity','F'),(117,'Sandra','F'),(118,'Ella','F'),(119,'Nerea','F'),(124,'Genevieve','F'),(125,'Xaviera','F'),(127,'MacKenzie','F'),(128,'Alyssa','F'),(130,'Alana','F'),(131,'Brynn','F'),(132,'Neve','F'),(134,'Phoebe','F'),(135,'Alea','F'),(137,'Myra','F'),(138,'Jasmine','F'),(139,'Jillian','F'),(142,'Idona','F'),(144,'Allegra','F'),(147,'Hayley','F'),(148,'Lani','F'),(150,'Raven','F'),(151,'Jena','F'),(153,'Amery','F'),(154,'Kelly','F'),(155,'Lunea','F'),(156,'Emerald','F'),(159,'Orli','F'),(160,'Germane','F'),(161,'Channing','F'),(162,'Rhonda','F'),(163,'Gail','F'),(164,'Dominique','F'),(170,'Wing','F'),(178,'Aurelia','F'),(179,'Rama','F'),(182,'Yvonne','F'),(183,'Amy','F'),(184,'Regina','F'),(185,'Anika','F'),(186,'Merrill','F'),(187,'Alana','F'),(188,'Reed','F'),(189,'Lunea','F'),(192,'Oren','F'),(197,'Lacey','F'),(199,'Kaitlin','F'),(200,'Thane','F'),(203,'Gints','M');
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

-- Dump completed on 2021-04-16 21:16:51
