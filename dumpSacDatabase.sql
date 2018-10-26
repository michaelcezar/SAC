CREATE DATABASE  IF NOT EXISTS `sac` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `sac`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: sac
-- ------------------------------------------------------
-- Server version	5.7.21-log

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
-- Table structure for table `chamados`
--

DROP TABLE IF EXISTS `chamados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chamados` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_pedido` int(10) unsigned DEFAULT NULL,
  `titulo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observacoes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `chamados_id_pedido_foreign` (`id_pedido`),
  CONSTRAINT `chamados_id_pedido_foreign` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chamados`
--

LOCK TABLES `chamados` WRITE;
/*!40000 ALTER TABLE `chamados` DISABLE KEYS */;
INSERT INTO `chamados` VALUES (1,1,'Problema no computador','Não liga ao apertar o botão','2018-10-26 21:58:05','2018-10-26 21:58:05'),(2,2,'Problema no computador','Não carrega nada','2018-10-26 21:58:05','2018-10-26 21:58:05'),(3,3,'Problema no notebook','Só funciona na tomada','2018-10-26 21:58:05','2018-10-26 21:58:05'),(4,4,'Problema no celular','Desliga sozinho','2018-10-26 21:58:05','2018-10-26 21:58:05'),(5,5,'Tablet travou','Não abre nada, tudo travado','2018-10-26 21:58:05','2018-10-26 21:58:05'),(6,6,'Monitor quebrou','Imagem escura e super aquecimento','2018-10-26 21:58:05','2018-10-26 21:58:05'),(7,7,'Não imprime','Impressora imprime paginas em branco','2018-10-26 21:58:05','2018-10-26 21:58:05'),(8,8,'Tecla sumiu','Perdeu a tecla enter, usuário disse que não foi ele','2018-10-26 21:58:05','2018-10-26 21:58:05'),(9,9,'Som muito baixo','Não é possível escutar nada','2018-10-26 21:58:05','2018-10-26 21:58:05'),(10,10,'Som muito alto','Incomoda todo mundo','2018-10-26 21:58:05','2018-10-26 21:58:05');
/*!40000 ALTER TABLE `chamados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (1,'José','teste1@emailteste.com','2018-10-26 21:58:04','2018-10-26 21:58:04'),(2,'Maria','teste2@emailteste.com','2018-10-26 21:58:04','2018-10-26 21:58:04'),(3,'João','teste3@emailteste.com','2018-10-26 21:58:04','2018-10-26 21:58:04'),(4,'Gabriel','teste4@emailteste.com','2018-10-26 21:58:04','2018-10-26 21:58:04'),(5,'Matheus','teste5@emailteste.com','2018-10-26 21:58:04','2018-10-26 21:58:04'),(6,'Pedro','teste6@emailteste.com','2018-10-26 21:58:04','2018-10-26 21:58:04'),(7,'Paulo','teste7@emailteste.com','2018-10-26 21:58:04','2018-10-26 21:58:04'),(8,'Marcos','teste8@emailteste.com','2018-10-26 21:58:04','2018-10-26 21:58:04'),(9,'Tiago','teste9@emailteste.com','2018-10-26 21:58:04','2018-10-26 21:58:04'),(10,'Tadeu','teste10@emailteste.com','2018-10-26 21:58:04','2018-10-26 21:58:04');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2018_10_26_042545_create_clientes_table',1),(2,'2018_10_26_042706_create_pedidos_table',1),(3,'2018_10_26_042743_create_chamados_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedidos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_cliente` int(10) unsigned DEFAULT NULL,
  `item` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pedidos_id_cliente_foreign` (`id_cliente`),
  CONSTRAINT `pedidos_id_cliente_foreign` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos`
--

LOCK TABLES `pedidos` WRITE;
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
INSERT INTO `pedidos` VALUES (1,1,'Computador','2018-10-26 21:58:04','2018-10-26 21:58:04'),(2,2,'Computador','2018-10-26 21:58:04','2018-10-26 21:58:04'),(3,2,'Notebook','2018-10-26 21:58:04','2018-10-26 21:58:04'),(4,3,'Celular','2018-10-26 21:58:05','2018-10-26 21:58:05'),(5,7,'Tablet','2018-10-26 21:58:05','2018-10-26 21:58:05'),(6,9,'Monitor','2018-10-26 21:58:05','2018-10-26 21:58:05'),(7,10,'Impressora','2018-10-26 21:58:05','2018-10-26 21:58:05'),(8,6,'Teclado','2018-10-26 21:58:05','2018-10-26 21:58:05'),(9,8,'Telefone','2018-10-26 21:58:05','2018-10-26 21:58:05'),(10,3,'Radio','2018-10-26 21:58:05','2018-10-26 21:58:05');
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-10-26 15:59:06
