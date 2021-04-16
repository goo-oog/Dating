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
-- Table structure for table `females`
--

DROP TABLE IF EXISTS `females`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `females` (
  `id` mediumint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_as_ci DEFAULT NULL,
  `gender` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_as_ci DEFAULT 'F',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=201 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_as_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `females`
--

LOCK TABLES `females` WRITE;
/*!40000 ALTER TABLE `females` DISABLE KEYS */;
INSERT INTO `females` VALUES (101,'Tallulah','F'),(106,'Piper','F'),(110,'Oprah','F'),(113,'Unity','F'),(117,'Sandra','F'),(118,'Ella','F'),(119,'Nerea','F'),(124,'Genevieve','F'),(125,'Xaviera','F'),(127,'MacKenzie','F'),(128,'Alyssa','F'),(130,'Alana','F'),(131,'Brynn','F'),(132,'Neve','F'),(134,'Phoebe','F'),(135,'Alea','F'),(137,'Myra','F'),(138,'Jasmine','F'),(139,'Jillian','F'),(142,'Idona','F'),(144,'Allegra','F'),(147,'Hayley','F'),(148,'Lani','F'),(150,'Raven','F'),(151,'Jena','F'),(153,'Amery','F'),(154,'Kelly','F'),(155,'Lunea','F'),(156,'Emerald','F'),(159,'Orli','F'),(160,'Germane','F'),(161,'Channing','F'),(162,'Rhonda','F'),(163,'Gail','F'),(164,'Dominique','F'),(170,'Wing','F'),(178,'Aurelia','F'),(179,'Rama','F'),(182,'Yvonne','F'),(183,'Amy','F'),(184,'Regina','F'),(185,'Anika','F'),(186,'Merrill','F'),(187,'Alana','F'),(188,'Reed','F'),(189,'Lunea','F'),(192,'Oren','F'),(197,'Lacey','F'),(199,'Kaitlin','F'),(200,'Thane','F');
/*!40000 ALTER TABLE `females` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-04-15 16:13:34
