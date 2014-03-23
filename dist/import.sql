USE `xxxxxxxxx`;
-- MySQL dump 10.13  Distrib 5.5.35, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: promoshop
-- ------------------------------------------------------
-- Server version	5.5.35-0ubuntu0.12.04.2

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
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account`
--

LOCK TABLES `account` WRITE;
/*!40000 ALTER TABLE `account` DISABLE KEYS */;
INSERT INTO `account` VALUES (20,'fe.r.nandolachica@gmail.com','$6$b5D.2CPR$VZDpTv//JvAH1dyRbHMCZlaw9BeBSFKfZzgEFlvO92Q72J9RqMDkUULbE4Z0qxn365Epk7T22Vmh/e4Mkeibi/'),(21,'fernando@desarrollo.wion.es','$6$17sUEneg$U978tcitQt5.elBGHGRc1SyH0Y81RhbnQd9WhQGRi8s8XfGXF8MHj.9XvDqLX33mD1o94nGOaFLN0EHUNd7xK1'),(22,'f.ernandolachica@gmail.com','$6$2uVRfWWT$/6b40u80nNNGANLphvMeat4G/KsXLA.RyRNFlb8xTuqrK61kMzaNvvU09C5JE1y/M5s7oKCv8xctIfIym7I1j1'),(23,'f.e.r.nandolachica@gmail.com','$6$gH3YTqqB$5vQuWx9ikm/lIL7NBJry2q9lu.5glfNBu6xsKTPKNq/rmdY4vSkREyzCuOIREBehPr5qMOv1eJV.g5aDFhyvx0'),(24,'fernandolachic.a@gmail.com','$6$O1bzmD.O$TP7CRSE.3YUxo6z74sEvJWHeAtTph2OY8es3GpVZQ5W8LptETGqxEHo3vk0jmFbs8itzILRL60l5HeUf77wSf.');
/*!40000 ALTER TABLE `account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `centrocomercial`
--

DROP TABLE IF EXISTS `centrocomercial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `centrocomercial` (
  `idcentrocomercial` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(4000) CHARACTER SET latin1 DEFAULT NULL,
  `foto` varchar(4000) DEFAULT NULL,
  `latitud` decimal(30,20) DEFAULT NULL,
  `longitud` decimal(30,20) DEFAULT NULL,
  `direccion` varchar(4000) CHARACTER SET latin1 DEFAULT NULL,
  `poblacion` varchar(4000) CHARACTER SET latin1 DEFAULT NULL,
  `provincia` varchar(4000) CHARACTER SET latin1 DEFAULT NULL,
  `activo` varchar(1) CHARACTER SET latin1 DEFAULT 'Y',
  PRIMARY KEY (`idcentrocomercial`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `centrocomercial`
--

LOCK TABLES `centrocomercial` WRITE;
/*!40000 ALTER TABLE `centrocomercial` DISABLE KEYS */;
INSERT INTO `centrocomercial` VALUES (1,'CC Prueba 1','Centro comercial de prueba 1','',37.48920346199713000000,-5.97943492793945100000,'','','','Y'),(2,'CC Prueba 2','Centro comercial de prueba 2','',37.48664289376369000000,-5.93986740059710900000,'','','','Y'),(3,'CC Prueba 3','Centro comercial de prueba 3','',37.46127651533114000000,-6.01106360978701600000,'','','','Y');
/*!40000 ALTER TABLE `centrocomercial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `AuthItem`
--

DROP TABLE IF EXISTS `AuthItem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `AuthItem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `AuthItem`
--

LOCK TABLES `AuthItem` WRITE;
/*!40000 ALTER TABLE `AuthItem` DISABLE KEYS */;
INSERT INTO `AuthItem` VALUES ('Account.Account.*',1,NULL,NULL,'N;'),('Account.Account.Account',0,NULL,NULL,'N;'),('Account.Account.ChangeEmail',0,NULL,NULL,'N;'),('Account.Account.ChangePassword',0,NULL,NULL,'N;'),('Account.Account.CompleteChangeEmail',0,NULL,NULL,'N;'),('Account.Account.CompleteRegister',0,NULL,NULL,'N;'),('Account.Account.CompleteResetPassword',0,NULL,NULL,'N;'),('Account.Account.Desactivate',0,NULL,NULL,'N;'),('Account.Account.Login',0,NULL,NULL,'N;'),('Account.Account.Logout',0,NULL,NULL,'N;'),('Account.Account.Register',0,NULL,NULL,'N;'),('Account.Account.ResetPassword',0,NULL,NULL,'N;'),('Administrador',2,NULL,NULL,'N;'),('Canjeo.*',1,NULL,NULL,'N;'),('Canjeo.Admin',0,NULL,NULL,'N;'),('Canjeo.Create',0,NULL,NULL,'N;'),('Canjeo.Delete',0,NULL,NULL,'N;'),('Canjeo.Index',0,NULL,NULL,'N;'),('Canjeo.Update',0,NULL,NULL,'N;'),('Canjeo.View',0,NULL,NULL,'N;'),('Centrocomercial.*',1,NULL,NULL,'N;'),('Centrocomercial.Admin',0,NULL,NULL,'N;'),('Centrocomercial.Create',0,NULL,NULL,'N;'),('Centrocomercial.Delete',0,NULL,NULL,'N;'),('Centrocomercial.Index',0,NULL,NULL,'N;'),('Centrocomercial.Update',0,NULL,NULL,'N;'),('Centrocomercial.View',0,NULL,NULL,'N;'),('Logado',2,NULL,NULL,'N;'),('Oferta.*',1,NULL,NULL,'N;'),('Oferta.Admin',0,NULL,NULL,'N;'),('Oferta.Create',0,NULL,NULL,'N;'),('Oferta.Delete',0,NULL,NULL,'N;'),('Oferta.Index',0,NULL,NULL,'N;'),('Oferta.Update',0,NULL,NULL,'N;'),('Oferta.View',0,NULL,NULL,'N;'),('Particular.*',1,NULL,NULL,'N;'),('Particular.Admin',0,NULL,NULL,'N;'),('Particular.Create',0,NULL,NULL,'N;'),('Particular.Delete',0,NULL,NULL,'N;'),('Particular.Index',0,NULL,NULL,'N;'),('Particular.Update',0,NULL,NULL,'N;'),('Particular.View',0,NULL,NULL,'N;'),('SinLogin',2,NULL,NULL,'N;'),('Site.*',1,NULL,NULL,'N;'),('Site.Contact',0,NULL,NULL,'N;'),('Site.Error',0,NULL,NULL,'N;'),('Site.Index',0,NULL,NULL,'N;'),('Site.Login',0,NULL,NULL,'N;'),('Site.Logout',0,NULL,NULL,'N;'),('Tienda.*',1,NULL,NULL,'N;'),('Tienda.Admin',0,NULL,NULL,'N;'),('Tienda.Create',0,NULL,NULL,'N;'),('Tienda.Delete',0,NULL,NULL,'N;'),('Tienda.Index',0,NULL,NULL,'N;'),('Tienda.Update',0,NULL,NULL,'N;'),('Tienda.View',0,NULL,NULL,'N;');
/*!40000 ALTER TABLE `AuthItem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `AuthItemChild`
--

DROP TABLE IF EXISTS `AuthItemChild`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `AuthItemChild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `AuthItemChild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `AuthItemChild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `AuthItemChild`
--

LOCK TABLES `AuthItemChild` WRITE;
/*!40000 ALTER TABLE `AuthItemChild` DISABLE KEYS */;
/*!40000 ALTER TABLE `AuthItemChild` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Rights`
--

DROP TABLE IF EXISTS `Rights`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Rights` (
  `itemname` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  PRIMARY KEY (`itemname`),
  CONSTRAINT `Rights_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Rights`
--

LOCK TABLES `Rights` WRITE;
/*!40000 ALTER TABLE `Rights` DISABLE KEYS */;
/*!40000 ALTER TABLE `Rights` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oferta`
--

DROP TABLE IF EXISTS `oferta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oferta` (
  `idoferta` int(11) NOT NULL AUTO_INCREMENT,
  `idtienda` int(11) DEFAULT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(4000) DEFAULT NULL,
  `foto` varchar(4000) DEFAULT NULL,
  `numcanjeos` int(11) DEFAULT NULL,
  `fechadesde` varchar(4000) DEFAULT NULL,
  `fechahasta` varchar(4000) DEFAULT NULL,
  `precio` double(10,2) DEFAULT NULL,
  `codigocanjeo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idoferta`),
  KEY `fk_oferta_tienda` (`idtienda`),
  CONSTRAINT `fk_oferta_tienda` FOREIGN KEY (`idtienda`) REFERENCES `tienda` (`idtienda`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oferta`
--

LOCK TABLES `oferta` WRITE;
/*!40000 ALTER TABLE `oferta` DISABLE KEYS */;
INSERT INTO `oferta` VALUES (1,1,'Pimientos del padrón','Algunos pimientos pican y otros no','',3,'12/03/2014 21:39:04','0000-00-00 00:00:00',12.00,'');
/*!40000 ALTER TABLE `oferta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tienda`
--

DROP TABLE IF EXISTS `tienda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tienda` (
  `idtienda` int(11) NOT NULL AUTO_INCREMENT,
  `idcentrocomercial` int(11) DEFAULT NULL,
  `idaccount` int(11) DEFAULT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(4000) CHARACTER SET latin1 DEFAULT NULL,
  `foto` varchar(4000) DEFAULT NULL,
  `latitud` decimal(30,20) DEFAULT NULL,
  `longitud` decimal(30,20) DEFAULT NULL,
  `activo` varchar(1) CHARACTER SET latin1 DEFAULT 'Y',
  PRIMARY KEY (`idtienda`),
  KEY `fk_tienda_centrocomercial` (`idcentrocomercial`),
  KEY `fk_tienda_account` (`idaccount`),
  CONSTRAINT `fk_tienda_account` FOREIGN KEY (`idaccount`) REFERENCES `account` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tienda_centrocomercial` FOREIGN KEY (`idcentrocomercial`) REFERENCES `centrocomercial` (`idcentrocomercial`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tienda`
--

LOCK TABLES `tienda` WRITE;
/*!40000 ALTER TABLE `tienda` DISABLE KEYS */;
INSERT INTO `tienda` VALUES (1,1,NULL,'CC1 -- Tienda 1','','',37.48954323085169000000,-5.98006898252560900000,'Y'),(2,2,NULL,'CC2 -- Tienda 1','','',37.48631445000372000000,-5.93954556823121000000,'Y'),(3,1,NULL,'CC1 -- Tienda 2','','',37.48957728264303000000,-5.97951108305051100000,'Y'),(4,2,NULL,'CC2 -- Tienda 2','','',37.48651876934998000000,-5.93888038039551700000,'Y'),(5,1,NULL,'CC1 -- Tienda 3','','',37.48944107538448000000,-5.97893172590329400000,'Y'),(6,3,NULL,'CC3 -- Tienda 1','','',37.46113174029797000000,-6.01107433862307500000,'Y');
/*!40000 ALTER TABLE `tienda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `AuthAssignment`
--

DROP TABLE IF EXISTS `AuthAssignment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `AuthAssignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`),
  CONSTRAINT `AuthAssignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `AuthAssignment`
--

LOCK TABLES `AuthAssignment` WRITE;
/*!40000 ALTER TABLE `AuthAssignment` DISABLE KEYS */;
INSERT INTO `AuthAssignment` VALUES ('Administrador','21',NULL,'N;'),('Logado','22',NULL,'N;');
/*!40000 ALTER TABLE `AuthAssignment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `particular`
--

DROP TABLE IF EXISTS `particular`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `particular` (
  `idparticular` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `nacimiento` date DEFAULT NULL,
  `sexo` varchar(1) DEFAULT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idparticular`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `particular`
--

LOCK TABLES `particular` WRITE;
/*!40000 ALTER TABLE `particular` DISABLE KEYS */;
/*!40000 ALTER TABLE `particular` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `canjeo`
--

DROP TABLE IF EXISTS `canjeo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `canjeo` (
  `idcanjeo` int(11) NOT NULL AUTO_INCREMENT,
  `idoferta` int(11) DEFAULT NULL,
  `idparticular` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`idcanjeo`),
  KEY `fk_canjeo_oferta` (`idoferta`),
  KEY `fk_canjeo_particular` (`idparticular`),
  CONSTRAINT `fk_canjeo_oferta` FOREIGN KEY (`idoferta`) REFERENCES `oferta` (`idoferta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_canjeo_particular` FOREIGN KEY (`idparticular`) REFERENCES `particular` (`idparticular`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `canjeo`
--

LOCK TABLES `canjeo` WRITE;
/*!40000 ALTER TABLE `canjeo` DISABLE KEYS */;
/*!40000 ALTER TABLE `canjeo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `verification`
--

DROP TABLE IF EXISTS `verification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `verification` (
  `account_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `code` varchar(128) NOT NULL,
  `data` text,
  PRIMARY KEY (`account_id`,`type`),
  CONSTRAINT `FK_verification_account` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `verification`
--

LOCK TABLES `verification` WRITE;
/*!40000 ALTER TABLE `verification` DISABLE KEYS */;
INSERT INTO `verification` VALUES (20,1,'20a3b7d28d2f6c5a2d06b52c81022197',NULL),(21,1,'1c3d17cd1402da90b211090ac145af47',NULL),(21,3,'222830dfbcbc3f7acba2f17e112b1900',NULL),(22,1,'ef73fe41197cd723929049d1d5b5e41c',NULL),(24,1,'1386f942d450607f11bb0bba9b8a9e85',NULL);
/*!40000 ALTER TABLE `verification` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-03-13 21:40:24
