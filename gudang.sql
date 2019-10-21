-- MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
--
-- Host: localhost    Database: gudang
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (2,'Makanan'),(3,'Minuman');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ci_sessions`
--

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
INSERT INTO `ci_sessions` VALUES ('08a6486385c0e4f0f1a210efc936232bf4c7c3c4','::1',1571473600,'__ci_last_regenerate|i:1571473338;'),('1052c2c44e3ce6c4e538ea286db408f6cc5c025d','::1',1571468339,'__ci_last_regenerate|i:1571468157;'),('25adf18edfd74ac689af061f2239b39e0f1265a9','::1',1571470384,'__ci_last_regenerate|i:1571470141;'),('29ee5921bf02c6eeb706f1dca53d0ea4a3d72ac9','::1',1571622928,'__ci_last_regenerate|i:1571622928;'),('2ed6591c8fc368f37a51130dbdca85603af7333b','::1',1571473333,'__ci_last_regenerate|i:1571473036;'),('2feac22867f347cb630cea2b6eafe39e56d5bbba','::1',1571470768,'__ci_last_regenerate|i:1571470469;'),('56f11b049c810bcad22833e0f07a83a9682015b4','::1',1571467118,'__ci_last_regenerate|i:1571466875;'),('58eb3ae7e822c9dd67f84e95f409c162029b74c1','::1',1571473035,'__ci_last_regenerate|i:1571472735;'),('6d03dc5f07e8681c40774c799c36ea06a02a5480','::1',1571471332,'__ci_last_regenerate|i:1571471107;'),('9f2aac3b1436f23c4db4c2a4a36c634c0c540ca2','::1',1571472541,'__ci_last_regenerate|i:1571472258;'),('a1d2949a98070d9da3c28ea0eda75e0baf4195a0','::1',1571623828,'__ci_last_regenerate|i:1571623662;'),('a88b5bfeaec917edb5fcd4c70c35291576a435ba','::1',1571467595,'__ci_last_regenerate|i:1571467298;'),('acf6c5629d53d08b709d1f510423f9d5079689e1','::1',1571625608,'__ci_last_regenerate|i:1571625438;'),('be14ccf4c0d29d0d7f19ec225f2ad6c16a427a67','::1',1571471025,'__ci_last_regenerate|i:1571470771;'),('d840fedfa8d4fe9642f712f0b346092d22cdd614','::1',1571624991,'__ci_last_regenerate|i:1571624929;'),('da53c72b3586feffc6be24a02cb9f6fe6593e55d','::1',1571469145,'__ci_last_regenerate|i:1571468874;'),('eb4740aed84fa150f7a8aac3a7e0f837c2e04567','::1',1571624539,'__ci_last_regenerate|i:1571624536;'),('f764ec2aefce8e367fbccf2b7834c0377fb98a1b','::1',1571623495,'__ci_last_regenerate|i:1571623243;'),('fc74a3c3693e413c79798937b804f624341e3a6f','::1',1571468089,'__ci_last_regenerate|i:1571467839;'),('ffa2206b0ce9c570921b86023318e8caf50b9c11','::1',1571623180,'__ci_last_regenerate|i:1571622929;');
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `stock` varchar(100) DEFAULT NULL,
  `deskripsi` varchar(100) DEFAULT NULL,
  `category_id` varchar(100) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (2,'RIZQI SYAH PUTRA','5','makanan enakk','3');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'gudang'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-10-21  9:40:45
