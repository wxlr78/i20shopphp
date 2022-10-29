CREATE DATABASE  IF NOT EXISTS `i20shopdb` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `i20shopdb`;
-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)
--
-- Host: localhost    Database: i20shopdb
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
-- Table structure for table `image`
--

DROP TABLE IF EXISTS `image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `image` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Link` varchar(30) NOT NULL,
  `Alt` varchar(30) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Link` (`Link`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image`
--

LOCK TABLES `image` WRITE;
/*!40000 ALTER TABLE `image` DISABLE KEYS */;
INSERT INTO `image` VALUES (1,'sneakersAdidasAnn.jpg','Кроссовки Adidas анонс'),(2,'sneakersNikeAnn.jpg','Кроссовки Nike анонс'),(3,'sneakersPumaAnn.jpg','Кроссовки Puma анонс'),(4,'shortsAdidasAnn.jpg','Шорты Adidas анонс'),(5,'shortsNikeAnn.jpg','Шорты Nike анонс'),(6,'shortsPumaAnn.jpg','Шорты Puma анонс'),(7,'shirtAdidasAnn.jpg','Футболка Adidas анонс'),(8,'shirtNikeAnn.jpg','Футболка Nike анонс'),(9,'shirtPumaAnn.jpg','Футболка Puma анонс'),(10,'windbreakerAdidasAnn.jpg','Ветровка Adidas анонс'),(11,'windbreakerNikeAnn.jpg','Ветровка Nike анонс'),(12,'windbreakerPumaAnn.jpg','Ветровка Puma анонс'),(13,'sneakersAdidasAdd.jpg','Кроссовки Adidas доп'),(14,'sneakersNikeAdd.jpg','Кроссовки Nike доп'),(15,'sneakersPumaAdd.jpg','Кроссовки Puma доп'),(16,'shortsAdidasAdd.jpg','Шорты Adidas доп'),(17,'shortsNikeAdd.jpg','Шорты Nike доп'),(18,'shortsPumaAdd.jpg','Шорты Puma доп'),(19,'shirtAdidasAdd.jpg','Футболка Adidas доп'),(20,'shirtNikeAdd.jpg','Футболка Nike доп'),(21,'shirtPumaAdd.jpg','Футболка Puma доп'),(22,'windbreakerAdidasAdd.jpg','Ветровка Adidas доп'),(23,'windbreakerNikeAdd.jpg','Ветровка Nike доп'),(24,'windbreakerPumaAdd.jpg','Ветровка Puma доп');
/*!40000 ALTER TABLE `image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Title` varchar(30) NOT NULL,
  `Short_description` varchar(300) NOT NULL,
  `Is_active` tinyint(1) NOT NULL,
  `Old_price` double NOT NULL,
  `Current_price` double NOT NULL,
  `Promo_price` double NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Title` (`Title`),
  UNIQUE KEY `Title_2` (`Title`,`Short_description`,`Is_active`,`Old_price`,`Current_price`,`Promo_price`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (10,'Ветровка Adidas','Очень хорошая ветровка Adidas',1,1200,1100,1000),(11,'Ветровка Nike','Очень хорошая ветровка Nike',1,1200,1100,1000),(12,'Ветровка Puma','Очень хорошая ветровка Puma',1,1200,1100,1000),(16,'Ветровка2 Nike','Очень хорошая ветровка2 Nike',1,1200,1100,1000),(20,'Ветровка3 Nike','Очень хорошая ветровка3 Nike',1,1200,1100,1000),(24,'Ветровка4 Nike','Очень хорошая ветровка4 Nike',1,1200,1100,1000),(28,'Ветровка5 Nike','Очень хорошая ветровка5 Nike',1,1200,1100,1000),(1,'Кроссовки Adidas','Очень хорошие кроссовки Adidas',0,10000,9000,8000),(2,'Кроссовки Nike','Очень хорошие кроссовки Nike',1,10000,9000,8000),(3,'Кроссовки Puma','Очень хорошие кроссовки Puma',1,10000,9000,8000),(13,'Кроссовки2 Nike','Очень хорошие кроссовки2 Nike',1,10000,9000,8000),(17,'Кроссовки3 Nike','Очень хорошие кроссовки3 Nike',1,10000,9000,8000),(21,'Кроссовки4 Nike','Очень хорошие кроссовки4 Nike',1,10000,9000,8000),(25,'Кроссовки5 Nike','Очень хорошие кроссовки5 Nike',1,10000,9000,8000),(7,'Футболка Adidas','Очень хорошая футболка Adidas',1,1100,1000,900),(8,'Футболка Nike','Очень хорошая футболка Nike',1,1100,1000,900),(9,'Футболка Puma','Очень хорошая футболка Puma',0,1100,1000,900),(15,'Футболка2 Nike','Очень хорошая футболка2 Nike',1,1100,1000,900),(19,'Футболка3 Nike','Очень хорошая футболка3 Nike',1,1100,1000,900),(23,'Футболка4 Nike','Очень хорошая футболка4 Nike',1,1100,1000,900),(27,'Футболка5 Nike','Очень хорошая футболка5 Nike',1,1100,1000,900),(4,'Шорты Adidas','Очень хорошие шорты Adidas',1,1000,900,800),(5,'Шорты Nike','Очень хорошие шорты Nike',0,1000,900,800),(6,'Шорты Puma','Очень хорошие шорты Puma',1,1000,900,800),(14,'Шорты2 Nike','Очень хорошие шорты2 Nike',1,1000,900,800),(18,'Шорты3 Nike','Очень хорошие шорты3 Nike',1,1000,900,800),(22,'Шорты4 Nike','Очень хорошие шорты4 Nike',1,1000,900,800),(26,'Шорты5 Nike','Очень хорошие шорты5 Nike',1,1000,900,800);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_image_additional`
--

DROP TABLE IF EXISTS `product_image_additional`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_image_additional` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Product_id` int NOT NULL,
  `Image_id` int NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Product_id` (`Product_id`,`Image_id`),
  KEY `Image_id` (`Image_id`),
  CONSTRAINT `product_image_additional_ibfk_1` FOREIGN KEY (`Product_id`) REFERENCES `product` (`Id`),
  CONSTRAINT `product_image_additional_ibfk_2` FOREIGN KEY (`Image_id`) REFERENCES `image` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_image_additional`
--

LOCK TABLES `product_image_additional` WRITE;
/*!40000 ALTER TABLE `product_image_additional` DISABLE KEYS */;
INSERT INTO `product_image_additional` VALUES (1,1,13),(2,2,14),(3,3,15),(4,4,16),(5,5,17),(6,6,18),(7,7,19),(8,8,20),(9,9,21),(10,10,22),(11,11,23),(12,12,24),(13,13,14),(14,14,17),(15,15,20),(16,16,23),(17,17,14),(18,18,17),(19,19,20),(20,20,23),(21,21,14),(22,22,17),(23,23,20),(24,24,23),(25,25,14),(26,26,17),(27,27,20),(28,28,23);
/*!40000 ALTER TABLE `product_image_additional` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_image_main`
--

DROP TABLE IF EXISTS `product_image_main`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_image_main` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Product_id` int NOT NULL,
  `Image_id` int NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Product_id` (`Product_id`),
  UNIQUE KEY `Product_id_2` (`Product_id`,`Image_id`),
  UNIQUE KEY `Product_id_3` (`Product_id`),
  KEY `Image_id` (`Image_id`),
  CONSTRAINT `product_image_main_ibfk_1` FOREIGN KEY (`Product_id`) REFERENCES `product` (`Id`),
  CONSTRAINT `product_image_main_ibfk_2` FOREIGN KEY (`Image_id`) REFERENCES `image` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_image_main`
--

LOCK TABLES `product_image_main` WRITE;
/*!40000 ALTER TABLE `product_image_main` DISABLE KEYS */;
INSERT INTO `product_image_main` VALUES (1,1,1),(2,2,2),(3,3,3),(4,4,4),(5,5,5),(6,6,6),(7,7,7),(8,8,8),(9,9,9),(10,10,10),(11,11,11),(12,12,12),(13,13,2),(14,14,5),(15,15,8),(16,16,11),(17,17,2),(18,18,5),(19,19,8),(20,20,11),(21,21,2),(22,22,5),(23,23,8),(24,24,11),(25,25,2),(26,26,5),(27,27,8),(28,28,11);
/*!40000 ALTER TABLE `product_image_main` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `section`
--

DROP TABLE IF EXISTS `section`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `section` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Title` varchar(30) NOT NULL,
  `Short_description` varchar(300) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Title` (`Title`),
  UNIQUE KEY `Title_2` (`Title`,`Short_description`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `section`
--

LOCK TABLES `section` WRITE;
/*!40000 ALTER TABLE `section` DISABLE KEYS */;
INSERT INTO `section` VALUES (1,'Adidas','Очень хорошие вещи Adidas'),(2,'Nike','Очень хорошие вещи Nike'),(3,'Puma','Очень хорошие вещи Puma'),(7,'Ветровки','Очень хорошие ветровки'),(4,'Кроссовки','Очень хорошие кроссовки'),(8,'Пустая категория','Пустая категория'),(6,'Футболки','Очень хорошие футболки'),(5,'Шорты','Очень хорошие шорты');
/*!40000 ALTER TABLE `section` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `section_product_additional`
--

DROP TABLE IF EXISTS `section_product_additional`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `section_product_additional` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Section_id` int NOT NULL,
  `Product_id` int NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Section_id` (`Section_id`,`Product_id`),
  KEY `Product_id` (`Product_id`),
  CONSTRAINT `section_product_additional_ibfk_1` FOREIGN KEY (`Section_id`) REFERENCES `section` (`Id`),
  CONSTRAINT `section_product_additional_ibfk_2` FOREIGN KEY (`Product_id`) REFERENCES `product` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `section_product_additional`
--

LOCK TABLES `section_product_additional` WRITE;
/*!40000 ALTER TABLE `section_product_additional` DISABLE KEYS */;
INSERT INTO `section_product_additional` VALUES (1,4,1),(2,4,2),(3,4,3),(13,4,13),(17,4,17),(21,4,21),(25,4,25),(4,5,4),(5,5,5),(6,5,6),(14,5,14),(18,5,18),(22,5,22),(26,5,26),(7,6,7),(8,6,8),(9,6,9),(15,6,15),(19,6,19),(23,6,23),(27,6,27),(10,7,10),(11,7,11),(12,7,12),(16,7,16),(20,7,20),(24,7,24),(28,7,28);
/*!40000 ALTER TABLE `section_product_additional` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `section_product_main`
--

DROP TABLE IF EXISTS `section_product_main`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `section_product_main` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Section_id` int NOT NULL,
  `Product_id` int NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Product_id` (`Product_id`),
  UNIQUE KEY `Section_id` (`Section_id`,`Product_id`),
  UNIQUE KEY `Product_id_2` (`Product_id`),
  CONSTRAINT `section_product_main_ibfk_1` FOREIGN KEY (`Section_id`) REFERENCES `section` (`Id`),
  CONSTRAINT `section_product_main_ibfk_2` FOREIGN KEY (`Product_id`) REFERENCES `product` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `section_product_main`
--

LOCK TABLES `section_product_main` WRITE;
/*!40000 ALTER TABLE `section_product_main` DISABLE KEYS */;
INSERT INTO `section_product_main` VALUES (1,1,1),(4,1,4),(7,1,7),(10,1,10),(2,2,2),(5,2,5),(8,2,8),(11,2,11),(13,2,13),(14,2,14),(15,2,15),(16,2,16),(17,2,17),(18,2,18),(19,2,19),(20,2,20),(21,2,21),(22,2,22),(23,2,23),(24,2,24),(25,2,25),(26,2,26),(27,2,27),(28,2,28),(3,3,3),(6,3,6),(9,3,9),(12,3,12);
/*!40000 ALTER TABLE `section_product_main` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-10-29  0:21:37
