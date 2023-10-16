-- MySQL dump 10.13  Distrib 8.0.34, for Linux (x86_64)
--
-- Host: localhost    Database: inventario
-- ------------------------------------------------------
-- Server version	8.0.34-0ubuntu0.22.04.1

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
-- Table structure for table `--cartuchos--`
--

DROP TABLE IF EXISTS `--cartuchos--`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `--cartuchos--` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Referencia` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Precio` decimal(20,2) DEFAULT '0.00',
  `Alta` tinyint(1) DEFAULT NULL,
  `Stock` int DEFAULT NULL,
  `CantEntrada` int DEFAULT NULL,
  `CantSalida` int DEFAULT NULL,
  PRIMARY KEY (`Id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `--cartuchos--`
--

LOCK TABLES `--cartuchos--` WRITE;
/*!40000 ALTER TABLE `--cartuchos--` DISABLE KEYS */;
/*!40000 ALTER TABLE `--cartuchos--` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `--equipos_copy--`
--

DROP TABLE IF EXISTS `--equipos_copy--`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `--equipos_copy--` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Tipo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Fabricante` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Modelo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `NumSerie` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `FechaAlta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `FechaBaja` date DEFAULT NULL,
  `Observaciones` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`Id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `--equipos_copy--`
--

LOCK TABLES `--equipos_copy--` WRITE;
/*!40000 ALTER TABLE `--equipos_copy--` DISABLE KEYS */;
INSERT INTO `--equipos_copy--` VALUES (1,'admingerenral.gmu.es','Ordenador','MSI','MS-B09611','MSB096FBS0103504','2021-05-19 00:00:00',NULL,NULL),(2,'adominguez.gmu.es','Ordenador','HP','HP ProDesk 400 G3 DM','8CG711262G','2021-05-19 00:00:00',NULL,NULL),(3,'ajimenez.gmu.es','Ordenador','HP','HP ProDesk 400 G3 DM','8CG710378R','2021-05-19 00:00:00',NULL,NULL),(4,'aplicencias.gmu.es','Ordenador','LENOVO','10T700BTSP','S4QX7329','2021-05-19 00:00:00',NULL,NULL),(5,'atellez.gmu.es','Ordenador','HP','HP ProDesk 400 G3 DM','8CG711262J','2021-05-19 00:00:00',NULL,NULL),(6,'atorrejon.gmu.es','Ordenador','HP','HP ProDesk 400 G4 DM','8CC904376X','2021-05-19 00:00:00',NULL,NULL),(7,'baldon.gmu.es','Ordenador','HP','HP ProDesk 400 G5 Desktop Mini','8CC9372750','2021-05-19 00:00:00',NULL,NULL),(8,'bsalvago.gmu.es','Ordenador','HP','HP ProDesk 400 G3 DM','8CG710378Z','2021-05-19 00:00:00',NULL,NULL),(9,'blopez.gmu.es','Ordenador','HP','HP ProDesk 400 G3 DM','8CG7103796','2021-05-19 00:00:00',NULL,NULL),(10,'dfernandez.gmu.es','Ordenador','HP','HP ProDesk 400 G5 Desktop Mini','8CC9390FQY','2021-05-19 00:00:00',NULL,NULL),(11,'ehernandez.gmu.es','Ordenador','HP','HP ProDesk 400 G5 Desktop Mini','8CC937274Y','2021-05-19 00:00:00',NULL,NULL),(12,'ereyes.gmu.es','Ordenador','HP','HP ProDesk 400 G5 Desktop Mini','8CC9384GY6','2021-05-19 00:00:00',NULL,NULL),(13,'eruiz.gmu.es','Ordenador','HP','HP ProDesk 400 G5 Desktop Mini','8CC9390FR0','2021-05-19 00:00:00',NULL,NULL),(14,'fjmartinez.gmu.es','Ordenador','HP','HP ProDesk 400 G3 DM','8CG710378Y','2021-05-19 00:00:00',NULL,NULL),(15,'fjrodriguez.gmu.es','Ordenador','HP','HP ProDesk 400 G5 Desktop Mini','8CC9390FR3','2021-05-19 00:00:00',NULL,NULL),(16,'fprieto.gmu.es','Ordenador','HP','HP ProDesk 400 G5 Desktop Mini','8CC9384GYG','2021-05-19 00:00:00',NULL,NULL),(17,'gerente.gmu.es','Ordenador','HP','HP ProDesk 400 G3 DM','8CG710378W','2021-05-19 00:00:00',NULL,NULL),(18,'ghermoso.gmu.es','Ordenador','HP','HP ProDesk 400 G4 DM','8CC9021994','2021-05-19 00:00:00',NULL,NULL),(19,'gmu03.gmusanlucar.es','Ordenador','Dell Inc.                ','OptiPlex GX620               ','6301W1J','2021-05-19 00:00:00',NULL,NULL),(20,'gsoler.gmu.es','Ordenador','HP','HP ProDesk 400 G5 Desktop Mini','8CC9390FR4','2021-05-19 00:00:00',NULL,NULL),(21,'gvalero.gmu.es','Ordenador','HP','HP ProDesk 400 G3 DM','8CG711262F','2021-05-19 00:00:00',NULL,NULL),(22,'info01.gmu.es','Ordenador','LENOVO','10T700BTSP','S4QX7405','2021-05-19 00:00:00',NULL,NULL),(23,'info02.gmu.es','Ordenador','LENOVO','10T700BTSP','S4QX7232','2021-05-19 00:00:00',NULL,NULL),(24,'jalistan.gmu.es','Ordenador','HP','HP ProDesk 400 G5 Desktop Mini','8CC9390FQX','2021-05-19 00:00:00',NULL,NULL),(25,'jmhernandez.gmu.es','Ordenador','HP','HP ProDesk 400 G5 Desktop Mini','8CC937274Q','2021-05-19 00:00:00',NULL,NULL),(26,'jmmacias.gmu.es','Ordenador','HP','HP ProDesk 400 G5 Desktop Mini','8CC9322HCH','2021-05-19 00:00:00',NULL,NULL),(27,'jmrodriguez.gmu.es','Ordenador','HP','HP ProDesk 400 G3 DM','8CG711262K','2021-05-19 00:00:00',NULL,NULL),(28,'jpozo.gmu.es','Ordenador','HP','HP ProDesk 400 G3 DM','8CG711262L','2021-05-19 00:00:00',NULL,NULL),(29,'jramirez.gmu.es','Ordenador','HP','HP ProDesk 400 G5 Desktop Mini','8CC9390FR1','2021-05-19 00:00:00',NULL,NULL),(30,'jrodriguez.gmu.es','Ordenador','HP','HP ProDesk 400 G3 DM','8CG711262B','2021-05-19 00:00:00',NULL,NULL),(31,'jsuarez.gmu.es','Ordenador','HP','HP ProDesk 400 G5 Desktop Mini','8CC9384GXY','2021-05-19 00:00:00',NULL,NULL),(32,'laptop-23kb2u29','Ordenador','HP','HP 340S G7 Notebook PC','5CD0151RDC','2021-05-19 00:00:00',NULL,NULL),(33,'malcantara.gmu.es','Ordenador','HP','HP ProDesk 400 G5 Desktop Mini','8CC9372751','2021-05-19 00:00:00',NULL,NULL),(34,'mcparejo.gmu.es','Ordenador','HP','HP ProDesk 400 G5 Desktop Mini','8CC9384GYB','2021-05-19 00:00:00',NULL,NULL),(35,'mcperez.gmu.es','Ordenador','HP','HP ProDesk 400 G5 Desktop Mini','8CC9341KZ3','2021-05-19 00:00:00',NULL,NULL),(36,'mcuadra.gmu.es','Ordenador','HP','HP ProDesk 400 G3 DM','8CG7103795','2021-05-19 00:00:00',NULL,NULL),(37,'miroldan.gmu.es','Ordenador','HP','HP ProDesk 400 G3 DM','8CG710378X','2021-05-19 00:00:00',NULL,NULL),(38,'mjsanchez.gmu.es','Ordenador','MSI','MS-B09611','MSB096G7S0102347','2021-05-19 00:00:00',NULL,NULL),(39,'mlopez.gmu.es','Ordenador','HP','HP ProDesk 400 G5 Desktop Mini','8CC9390FQZ','2021-05-19 00:00:00',NULL,NULL),(40,'mrbuzon.gmu.es','Ordenador','HP','HP ProDesk 400 G5 Desktop Mini','8CC9372743','2021-05-19 00:00:00',NULL,NULL),(41,'mreyes.gmu.es','Ordenador','HP','HP ProDesk 400 G5 Desktop Mini','8CC937274X','2021-05-19 00:00:00',NULL,NULL),(42,'mrodriguez.gmu.es','Ordenador','HP','HP ProDesk 400 G3 DM','8CG7103799','2021-05-19 00:00:00',NULL,NULL),(43,'ppozo.gmu.es','Ordenador','Intel','NUC7i5BNH','G6BN84900KGA','2021-05-19 00:00:00',NULL,NULL),(44,'practicas.gmu.es','Ordenador','HP','HP ProDesk 400 G3 DM','8CG710378Q','2021-05-19 00:00:00',NULL,NULL),(45,'practicaslic.gmu.es','Ordenador','Intel','NUC7i5BNH','G6BN84900LUH','2021-05-19 00:00:00',NULL,NULL),(46,'pres01.gmu.es','Ordenador','HP','HP ProDesk 400 G4 DM','8CC9021995','2021-05-19 00:00:00',NULL,NULL),(47,'rgonzalez.gmu.es','Ordenador','HP','HP ProDesk 400 G3 DM','8CG710378T','2021-05-19 00:00:00',NULL,NULL),(48,'rhumanes.gmusanlucar.es','Ordenador','HP','HP ProDesk 400 G3 DM','8CG710378V','2021-05-19 00:00:00',NULL,NULL),(49,'servernuevo','Ordenador','FUJITSU','PRIMERGY RX1330 M4','YMHV007466','2021-05-19 00:00:00',NULL,NULL),(50,'viv01b.gmu.es','Ordenador','HP','HP ProDesk 400 G5 Desktop Mini','8CC937274V','2021-05-19 00:00:00',NULL,NULL),(51,'vmartinez.gmu.es','Ordenador','HP','HP ProDesk 400 G5 Desktop Mini','8CC937274M','2021-05-19 00:00:00',NULL,NULL),(52,'vvidal.gmu.es','Ordenador','HP','HP ProDesk 400 G4 DM','8CC904374H','2021-05-19 00:00:00',NULL,NULL);
/*!40000 ALTER TABLE `--equipos_copy--` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `--impresoras--`
--

DROP TABLE IF EXISTS `--impresoras--`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `--impresoras--` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `IdEquipo` int DEFAULT NULL,
  `Propietario` varchar(255) NOT NULL,
  `Observaciones` varchar(400) DEFAULT NULL,
  `FechaVersion` date NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `IdEquipo` (`IdEquipo`),
  CONSTRAINT `--impresoras--_ibfk_1` FOREIGN KEY (`IdEquipo`) REFERENCES `1equipos` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `--impresoras--`
--

LOCK TABLES `--impresoras--` WRITE;
/*!40000 ALTER TABLE `--impresoras--` DISABLE KEYS */;
/*!40000 ALTER TABLE `--impresoras--` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `--ordenadores--`
--

DROP TABLE IF EXISTS `--ordenadores--`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `--ordenadores--` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `IdEquipo` int NOT NULL,
  `Propietario` varchar(255) NOT NULL,
  `Cpu` varchar(255) NOT NULL,
  `Memoria` varchar(255) NOT NULL,
  `Hdd1` varchar(255) NOT NULL,
  `Hdd2` varchar(255) DEFAULT '0',
  `Observaciones` varchar(400) DEFAULT NULL,
  `FechaVersion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`),
  KEY `IdEquipo` (`IdEquipo`),
  CONSTRAINT `--ordenadores--_ibfk_1` FOREIGN KEY (`IdEquipo`) REFERENCES `1equipos` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `--ordenadores--`
--

LOCK TABLES `--ordenadores--` WRITE;
/*!40000 ALTER TABLE `--ordenadores--` DISABLE KEYS */;
INSERT INTO `--ordenadores--` VALUES (1,1,'admingerenral.gmu.es','Intel(R) Core(TM) i5-5200U CPU @ 2.20GHz con 2 nucleos','6144','114470','0',NULL,'2021-05-20 00:00:00'),(2,2,'adominguez.gmu.es','Intel(R) Core(TM) i5-7500T CPU @ 2.70GHz con 4 nucleos','8192','476937','0',NULL,'2021-05-20 00:00:00'),(3,3,'ajimenez.gmu.es','Intel(R) Core(TM) i5-7500T CPU @ 2.70GHz con 4 nucleos','8192','476937','0',NULL,'2021-05-20 00:00:00'),(4,4,'aplicencias.gmu.es','Intel(R) Core(TM) i5-9400T CPU @ 1.80GHz con 6 nucleos','8192','244191','0',NULL,'2021-05-20 00:00:00'),(5,5,'atellez.gmu.es','Intel(R) Core(TM) i5-7500T CPU @ 2.70GHz con 4 nucleos','8192','476937','0',NULL,'2021-05-20 00:00:00'),(6,6,'atorrejon.gmu.es','Intel(R) Core(TM) i5-8500T CPU @ 2.10GHz con 6 nucleos','8192','238472','0',NULL,'2021-05-20 00:00:00'),(7,7,'baldon.gmu.es','Intel(R) Core(TM) i3-9100T CPU @ 3.10GHz con 4 nucleos','8192','244191','0',NULL,'2021-05-20 00:00:00'),(8,8,'baslvago.gmu.es','Intel(R) Core(TM) i5-7500T CPU @ 2.70GHz con 4 nucleos','8192','476937','0',NULL,'2021-05-20 00:00:00'),(9,9,'blopez.gmu.es','Intel(R) Core(TM) i5-7500T CPU @ 2.70GHz con 4 nucleos','8192','476937','0',NULL,'2021-05-20 00:00:00'),(10,10,'dfernandez.gmu.es','Intel(R) Core(TM) i3-9100T CPU @ 3.10GHz con 4 nucleos','8192','244191','0',NULL,'2021-05-20 00:00:00'),(11,11,'ehernandez.gmu.es','Intel(R) Core(TM) i3-9100T CPU @ 3.10GHz con 4 nucleos','8192','244191','0',NULL,'2021-05-20 00:00:00'),(12,12,'ereyes.gmu.es','Intel(R) Core(TM) i3-9100T CPU @ 3.10GHz con 4 nucleos','8192','244191','0',NULL,'2021-05-20 00:00:00'),(13,13,'eruiz.gmu.es','Intel(R) Core(TM) i3-9100T CPU @ 3.10GHz con 4 nucleos','8192','244191','0',NULL,'2021-05-20 00:00:00'),(14,14,'fjmartinez.gmu.es','Intel(R) Core(TM) i5-7500T CPU @ 2.70GHz con 4 nucleos','8192','476937','0',NULL,'2021-05-20 00:00:00'),(15,15,'fjrodriguez.gmu.es','Intel(R) Core(TM) i3-9100T CPU @ 3.10GHz con 4 nucleos','8192','244191','0',NULL,'2021-05-20 00:00:00'),(16,16,'fprieto.gmu.es','Intel(R) Core(TM) i3-9100T CPU @ 3.10GHz con 4 nucleos','8192','244191','0',NULL,'2021-05-20 00:00:00'),(17,17,'gerente.gmu.es','Intel(R) Core(TM) i5-7500T CPU @ 2.70GHz con 4 nucleos','8192','488382','0',NULL,'2021-05-20 00:00:00'),(18,18,'ghermoso.gmu.es','Intel(R) Core(TM) i5-8500T CPU @ 2.10GHz con 6 nucleos','8192','953867','0',NULL,'2021-05-20 00:00:00'),(19,19,'gmu03.gmusanlucar.es','Intel(R) Pentium(R) 4 CPU 3.00GHz con 0 nucleos','4096','476937','152586',NULL,'2021-05-20 00:00:00'),(20,20,'gsoler.gmu.es','Intel(R) Core(TM) i3-9100T CPU @ 3.10GHz con 4 nucleos','8192','244191','0',NULL,'2021-05-20 00:00:00'),(21,21,'gvalero.gmu.es','Intel(R) Core(TM) i5-7500T CPU @ 2.70GHz con 4 nucleos','8192','476937','0',NULL,'2021-05-20 00:00:00'),(22,22,'info01.gmu.es','Intel(R) Core(TM) i5-9400T CPU @ 1.80GHz con 6 nucleos','8192','476937','0',NULL,'2021-05-20 00:00:00'),(23,23,'info02.gmu.es','Intel(R) Core(TM) i5-9400T CPU @ 1.80GHz con 6 nucleos','8192','244191','0',NULL,'2021-05-20 00:00:00'),(24,24,'jalistan.gmu.es','Intel(R) Core(TM) i3-9100T CPU @ 3.10GHz con 4 nucleos','8192','244191','0',NULL,'2021-05-20 00:00:00'),(25,25,'jmhernandez.gmu.es','Intel(R) Core(TM) i3-9100T CPU @ 3.10GHz con 4 nucleos','8192','244191','0',NULL,'2021-05-20 00:00:00'),(26,26,'jmmacias.gmu.es','Intel(R) Core(TM) i3-9100T CPU @ 3.10GHz con 4 nucleos','8192','244191','0',NULL,'2021-05-20 00:00:00'),(27,27,'jmrodriguez.gmu.es','Intel(R) Core(TM) i5-7500T CPU @ 2.70GHz con 4 nucleos','8192','476937','0',NULL,'2021-05-20 00:00:00'),(28,28,'jpozo.gmu.es','Intel(R) Core(TM) i5-7500T CPU @ 2.70GHz con 4 nucleos','8192','476937','0',NULL,'2021-05-20 00:00:00'),(29,29,'jramirez.gmu.es','Intel(R) Core(TM) i3-9100T CPU @ 3.10GHz con 4 nucleos','8192','244191','0',NULL,'2021-05-20 00:00:00'),(30,30,'jrodriguez.gmu.es','Intel(R) Core(TM) i5-7500T CPU @ 2.70GHz con 4 nucleos','8192','476937','0',NULL,'2021-05-20 00:00:00'),(31,31,'jsuarez.gmu.es','Intel(R) Core(TM) i3-9100T CPU @ 3.10GHz con 4 nucleos','8192','244191','0',NULL,'2021-05-20 00:00:00'),(32,32,'laptop-23kb2u29','Intel(R) Core(TM) i7-1065G7 CPU @ 1.30GHz con 4 nucleos','8192','488382','0',NULL,'2021-05-20 00:00:00'),(33,33,'malcantara.gmu.es','Intel(R) Core(TM) i3-9100T CPU @ 3.10GHz con 4 nucleos','8192','244191','0',NULL,'2021-05-20 00:00:00'),(34,34,'mcparejo.gmu.es','Intel(R) Core(TM) i3-9100T CPU @ 3.10GHz con 4 nucleos','8192','244191','0',NULL,'2021-05-20 00:00:00'),(35,35,'mcperez.gmu.es','Intel(R) Core(TM) i3-9100T CPU @ 3.10GHz con 4 nucleos','8192','244191','0',NULL,'2021-05-20 00:00:00'),(36,36,'mcuadra.gmu.es','Intel(R) Core(TM) i5-7500T CPU @ 2.70GHz con 4 nucleos','8192','476937','0',NULL,'2021-05-20 00:00:00'),(37,37,'miroldan.gmu.es','Intel(R) Core(TM) i5-7500T CPU @ 2.70GHz con 4 nucleos','8192','476937','0',NULL,'2021-05-20 00:00:00'),(38,38,'mjsanchez.gmu.es','Intel(R) Core(TM) i3-5005U CPU @ 2.00GHz con 2 nucleos','8192','114470','0',NULL,'2021-05-20 00:00:00'),(39,39,'mlopez.gmu.es','Intel(R) Core(TM) i3-9100T CPU @ 3.10GHz con 4 nucleos','8192','244191','0',NULL,'2021-05-20 00:00:00'),(40,40,'mrbuzon.gmu.es','Intel(R) Core(TM) i3-9100T CPU @ 3.10GHz con 4 nucleos','8192','244191','0',NULL,'2021-05-20 00:00:00'),(41,41,'mreyes.gmu.es','Intel(R) Core(TM) i3-9100T CPU @ 3.10GHz con 4 nucleos','8192','244191','0',NULL,'2021-05-20 00:00:00'),(42,42,'mrodriguez.gmu.es','Intel(R) Core(TM) i5-7500T CPU @ 2.70GHz con 4 nucleos','8192','476937','0',NULL,'2021-05-20 00:00:00'),(43,43,'ppozo.gmu.es','Intel(R) Core(TM) i5-7260U CPU @ 2.20GHz con 2 nucleos','8192','953867','0',NULL,'2021-05-20 00:00:00'),(44,44,'practicas.gmu.es','Intel(R) Core(TM) i5-7500T CPU @ 2.70GHz con 4 nucleos','8192','244191','0',NULL,'2021-05-20 00:00:00'),(45,45,'practicaslic.gmu.es','Intel(R) Core(TM) i5-7260U CPU @ 2.20GHz con 2 nucleos','8192','953867','0',NULL,'2021-05-20 00:00:00'),(46,46,'pres01.gmu.es','Intel(R) Core(TM) i5-8500T CPU @ 2.10GHz con 6 nucleos','8192','476937','0',NULL,'2021-05-20 00:00:00'),(47,47,'rgonzalez.gmu.es','Intel(R) Core(TM) i5-7500T CPU @ 2.70GHz con 4 nucleos','8192','476937','953835',NULL,'2021-05-20 00:00:00'),(48,48,'rhumanes.gmusanlucar.es','Intel(R) Core(TM) i5-7500T CPU @ 2.70GHz con 4 nucleos','8192','476937','0',NULL,'2021-05-20 00:00:00'),(49,49,'servernuevo','Intel(R) Xeon(R) E-2126G CPU @ 3.30GHz con 6 nucleos','32768','456801','0',NULL,'2021-05-20 00:00:00'),(50,50,'viv01b.gmu.es','Intel(R) Core(TM) i3-9100T CPU @ 3.10GHz con 4 nucleos','8192','244191','0',NULL,'2021-05-20 00:00:00'),(51,51,'vmartinez.gmu.es','Intel(R) Core(TM) i3-9100T CPU @ 3.10GHz con 4 nucleos','8192','244191','0',NULL,'2021-05-20 00:00:00'),(52,52,'vvidal.gmu.es','Intel(R) Core(TM) i5-8500T CPU @ 2.10GHz con 6 nucleos','8192','953867','0',NULL,'2021-05-20 00:00:00'),(53,2,'Antonio Domínguez Gallego','Intel(R) Core(TM) i5-7500T CPU @ 2.70GHz con 4 nucleos','8192','476937','','','2021-05-21 00:00:00'),(54,3,'Agustín Jiménez Suárez','Intel(R) Core(TM) i5-7500T CPU @ 2.70GHz con 4 nucleos','8192','476937','','','2021-05-21 00:00:00'),(55,5,'Antonio Tellez Saenz','Intel(R) Core(TM) i5-5200U CPU @ 2.20GHz con 4 nucleos','8192','476937','','','2021-05-21 00:00:00'),(56,6,'Ana Maria Torrejon Camacho','Intel(R) Core(TM) i5-8500T CPU @ 2.10GHz con 6 nucleos','8192','238472','','','2021-05-21 00:00:00'),(57,7,'Baldomero Aldón Buzón','Intel(R) Core(TM) i3-9100T CPU @ 3.10GHz con 4 nucleos','8192','244191','','','2021-05-21 00:00:00'),(58,8,'Blanca Salvago Enríquez','Intel(R) Core(TM) i5-7500T CPU @ 2.70GHz con 4 nucleos','8192','476937','','','2021-05-21 00:00:00'),(59,9,'Beatriz López Silva','Intel(R) Core(TM) i5-7500T CPU @ 2.70GHz con 4 nucleos','8192','476937','','','2021-05-21 00:00:00'),(60,10,'Domingo Fernández Tubío','Intel(R) Core(TM) i3-9100T CPU @ 3.10GHz con 4 nucleos','8192','244191','','','2021-05-21 00:00:00'),(61,11,'Eugenia Hernández Parra','Intel(R) Core(TM) i3-9100T CPU @ 3.10GHz con 4 nucleos','8192','244191','','','2021-05-21 00:00:00'),(62,12,'Erika Reyes Barrios','Intel(R) Core(TM) i3-9100T CPU @ 3.10GHz con 4 nucleos','8192','244191','','','2021-05-21 00:00:00'),(63,13,'Estefanía Ruíz Lima','Intel(R) Core(TM) i3-9100T CPU @ 3.10GHz con 4 nucleos','8192','244191','','','2021-05-21 00:00:00'),(64,14,'Fco. Javier Martinez García','Intel(R) Core(TM) i5-7500T CPU @ 2.70GHz con 4 nucleos','8192','476937','','','2021-05-21 00:00:00'),(65,15,'Fco. Javier Rodríguez Ferreira','Intel(R) Core(TM) i3-9100T CPU @ 3.10GHz con 4 nucleos','8192','244191','','','2021-05-21 00:00:00'),(66,16,'Fco. Fermín Prieto Alcón','Intel(R) Core(TM) i3-9100T CPU @ 3.10GHz con 4 nucleos','8192','244191','','','2021-05-21 00:00:00'),(67,18,'Gloria Hermoso Mellado','Intel(R) Core(TM) i5-8500T CPU @ 2.10GHz con 6 nucleos','8192','953867','','','2021-05-21 00:00:00'),(68,20,'Gloria Soler Rabadán','Intel(R) Core(TM) i3-9100T CPU @ 3.10GHz con 4 nucleos','8192','244191','','','2021-05-21 00:00:00'),(69,21,'Gonzalo Valero Quintana','Intel(R) Core(TM) i5-7500T CPU @ 2.70GHz con 4 nucleos','8192','476937','','','2021-05-21 00:00:00'),(70,24,'Juan Antonio Listan Gumier','Intel(R) Core(TM) i3-9100T CPU @ 3.10GHz con 4 nucleos','8192','244191','','','2021-05-21 00:00:00'),(71,25,'José Maria Hernández Juez-Sarmiento','Intel(R) Core(TM) i3-9100T CPU @ 3.10GHz con 4 nucleos','8192','244191','','','2021-05-21 00:00:00'),(72,26,'José Manuel Macías Saborido','Intel(R) Core(TM) i3-9100T CPU @ 3.10GHz con 4 nucleos','8192','244191','','','2021-05-21 00:00:00'),(73,27,'José Manuel Rodríguez Vidal','Intel(R) Core(TM) i5-7500T CPU @ 2.70GHz con 4 nucleos','8192','476937','','','2021-05-21 00:00:00'),(74,29,'Javier Ramírez Bollullo','Intel(R) Core(TM) i3-9100T CPU @ 3.10GHz con 4 nucleos','8192','244191','','','2021-05-21 00:00:00'),(75,28,'José Pozo Cuevas','Intel(R) Core(TM) i5-7500T CPU @ 2.70GHz con 4 nucleos','8192','476937','','','2021-05-21 00:00:00'),(76,30,'Jesús Rodríguez Oliva','Intel(R) Core(TM) i5-7500T CPU @ 2.70GHz con 4 nucleos','8192','476937','','','2021-05-21 00:00:00'),(77,31,'Joaquina Suárez Ruíz','Intel(R) Core(TM) i3-9100T CPU @ 3.10GHz con 4 nucleos','8192','244191','','','2021-05-21 00:00:00'),(78,17,'Julio Garcia Martín','Intel(R) Core(TM) i5-7500T CPU @ 2.70GHz con 4 nucleos','8192','488382','','','2021-05-21 00:00:00'),(79,33,'Mercedes Alcántara Puerto','Intel(R) Core(TM) i3-9100T CPU @ 3.10GHz con 4 nucleos','8192','244191','','','2021-05-21 00:00:00'),(80,34,'Mª Carmen Parejo Camacho','Intel(R) Core(TM) i3-9100T CPU @ 3.10GHz con 4 nucleos','8192','244191','','','2021-05-21 00:00:00'),(81,35,'Mari Carmen Pérez Rodríguez','Intel(R) Core(TM) i3-9100T CPU @ 3.10GHz con 4 nucleos','8192','244191','','','2021-05-21 00:00:00'),(82,36,'Montserrat de la Cuadra Fdez. Gao','Intel(R) Core(TM) i5-7500T CPU @ 2.70GHz con 4 nucleos','8192','476937','','','2021-05-21 00:00:00'),(83,37,'Mabel Roldán Vendrell','Intel(R) Core(TM) i5-7500T CPU @ 2.70GHz con 4 nucleos','8192','476937','','','2021-05-21 00:00:00'),(84,38,'María José Sánchez Pérez','Intel(R) Core(TM) i3-5005U CPU @ 2.00GHz con 2 nucleos','8192','114470','','','2021-05-21 00:00:00'),(85,39,'Milagrosa López Fernandez','Intel(R) Core(TM) i3-9100T CPU @ 3.10GHz con 4 nucleos','8192','244191','','','2021-05-21 00:00:00'),(86,40,'Maria Rosario Buzón Gómez','Intel(R) Core(TM) i3-9100T CPU @ 3.10GHz con 4 nucleos','8192','244191','','','2021-05-21 00:00:00'),(87,41,'Milagrosa Reyes Barrios','Intel(R) Core(TM) i3-9100T CPU @ 3.10GHz con 4 nucleos','8192','244191','','','2021-05-21 00:00:00'),(88,42,'Manuel Rodriguez Victoria','Intel(R) Core(TM) i5-7500T CPU @ 2.70GHz con 4 nucleos','8192','476937','','','2021-05-21 00:00:00'),(89,43,'José Pozo Mellado','Intel(R) Core(TM) i5-7260U CPU @ 2.20GHz con 2 nucleos','8192','953867','','','2021-05-21 00:00:00'),(90,47,'Rafael González Calderón','Intel(R) Core(TM) i5-7500T CPU @ 2.70GHz con 4 nucleos','8192','476937','953835','','2021-05-21 00:00:00'),(91,48,'Rafael Humanes García','Intel(R) Core(TM) i5-7500T CPU @ 2.70GHz con 4 nucleos','8192','476937','','','2021-05-21 00:00:00'),(92,52,'Vanesa Vidal Bernal','Intel(R) Core(TM) i5-8500T CPU @ 2.10GHz con 6 nucleos','8192','953867','','','2021-05-21 00:00:00'),(93,51,'Virginia Martínez Anillo','Intel(R) Core(TM) i3-9100T CPU @ 3.10GHz con 4 nucleos','8192','244191','','','2021-05-21 00:00:00');
/*!40000 ALTER TABLE `--ordenadores--` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `1equipos`
--

DROP TABLE IF EXISTS `1equipos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `1equipos` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `IdTipo` int NOT NULL,
  `Fabricante` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Modelo` varchar(255) NOT NULL,
  `NumSerie` varchar(255) NOT NULL,
  `FechaAlta` date DEFAULT NULL,
  `FechaBaja` date DEFAULT NULL,
  `Observaciones` varchar(400) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_equipos_tipoequipos1` (`IdTipo`),
  CONSTRAINT `FK_equipos_tipoequipos1` FOREIGN KEY (`IdTipo`) REFERENCES `tipoequipos` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `1equipos`
--

LOCK TABLES `1equipos` WRITE;
/*!40000 ALTER TABLE `1equipos` DISABLE KEYS */;
INSERT INTO `1equipos` VALUES (1,1,'MSI','MS-B09611','MSB096FBS0103504','2022-06-20',NULL,NULL,NULL,NULL),(2,1,'HP','HP ProDesk 400 G3 DM','8CG711262G','2021-05-19','2022-04-06',NULL,NULL,NULL),(3,1,'HP','HP ProDesk 400 G3 DM','8CG710378R','2021-05-19',NULL,NULL,NULL,NULL),(4,1,'LENOVO','10T700BTSP','S4QX7329','2021-05-19',NULL,NULL,NULL,NULL),(5,1,'HP','HP ProDesk 400 G3 DM','8CG711262J','2021-05-19',NULL,NULL,NULL,NULL),(6,1,'HP','HP ProDesk 400 G4 DM','8CC904376X','2021-05-19',NULL,NULL,NULL,NULL),(7,1,'HP','HP ProDesk 400 G5 Desktop Mini','8CC9372750','2021-05-19',NULL,NULL,NULL,NULL),(8,1,'HP','HP ProDesk 400 G3 DM','8CG710378Z','2021-05-19',NULL,NULL,NULL,NULL),(9,1,'HP','HP ProDesk 400 G3 DM','8CG7103796','2021-05-19',NULL,NULL,NULL,NULL),(10,1,'HP','HP ProDesk 400 G5 Desktop Mini','8CC9390FQY','2021-05-19',NULL,NULL,NULL,NULL),(11,1,'HP','HP ProDesk 400 G5 Desktop Mini','8CC937274Y','2021-05-19',NULL,NULL,NULL,NULL),(12,1,'HP','HP ProDesk 400 G5 Desktop Mini','8CC9384GY6','2021-05-19',NULL,NULL,NULL,NULL),(13,1,'HP','HP ProDesk 400 G5 Desktop Mini','8CC9390FR0','2021-05-19',NULL,NULL,NULL,NULL),(14,1,'HP','HP ProDesk 400 G3 DM','8CG710378Y','2021-05-19',NULL,NULL,NULL,NULL),(15,1,'HP','HP ProDesk 400 G5 Desktop Mini','8CC9390FR3','2021-05-19',NULL,NULL,NULL,NULL),(16,1,'HP','HP ProDesk 400 G5 Desktop Mini','8CC9384GYG','2021-05-19',NULL,NULL,NULL,NULL),(17,1,'HP','HP ProDesk 400 G3 DM','8CG710378W','2021-05-19',NULL,NULL,NULL,NULL),(18,1,'HP','HP ProDesk 400 G4 DM','8CC9021994','2021-05-19',NULL,NULL,NULL,NULL),(19,1,'Dell Inc.                ','OptiPlex GX620               ','6301W1J','2021-05-19',NULL,NULL,NULL,NULL),(20,1,'HP','HP ProDesk 400 G5 Desktop Mini','8CC9390FR4','2021-05-19',NULL,NULL,NULL,NULL),(21,1,'HP','HP ProDesk 400 G3 DM','8CG711262F','2021-05-19',NULL,NULL,NULL,NULL),(22,1,'LENOVO','10T700BTSP','S4QX7405','2021-05-19',NULL,NULL,NULL,NULL),(23,1,'LENOVO','10T700BTSP','S4QX7232','2021-05-19',NULL,NULL,NULL,NULL),(24,1,'HP','HP ProDesk 400 G5 Desktop Mini','8CC9390FQX','2021-05-19',NULL,NULL,NULL,NULL),(25,1,'HP','HP ProDesk 400 G5 Desktop Mini','8CC937274Q','2021-05-19',NULL,NULL,NULL,NULL),(26,1,'HP','HP ProDesk 400 G5 Desktop Mini','8CC9322HCH','2021-05-19',NULL,NULL,NULL,NULL),(27,1,'HP','HP ProDesk 400 G3 DM','8CG711262K','2021-05-19',NULL,NULL,NULL,NULL),(28,1,'HP','HP ProDesk 400 G3 DM','8CG711262L','2021-05-19',NULL,NULL,NULL,NULL),(29,1,'HP','HP ProDesk 400 G5 Desktop Mini','8CC9390FR1','2021-05-19',NULL,NULL,NULL,NULL),(30,1,'HP','HP ProDesk 400 G3 DM','8CG711262B','2021-05-19',NULL,NULL,NULL,NULL),(31,1,'HP','HP ProDesk 400 G5 Desktop Mini','8CC9384GXY','2021-05-19',NULL,NULL,NULL,NULL),(32,1,'HP','HP 340S G7 Notebook PC','5CD0151RDC','2021-05-19',NULL,NULL,NULL,NULL),(33,1,'HP','HP ProDesk 400 G5 Desktop Mini','8CC9372751','2021-05-19',NULL,NULL,NULL,NULL),(34,1,'HP','HP ProDesk 400 G5 Desktop Mini','8CC9384GYB','2021-05-19',NULL,NULL,NULL,NULL),(35,1,'HP','HP ProDesk 400 G5 Desktop Mini','8CC9341KZ3','2021-05-19',NULL,NULL,NULL,NULL),(36,1,'HP','HP ProDesk 400 G3 DM','8CG7103795','2021-05-19',NULL,NULL,NULL,NULL),(37,1,'HP','HP ProDesk 400 G3 DM','8CG710378X','2021-05-19',NULL,NULL,NULL,NULL),(38,1,'MSI','MS-B09611','MSB096G7S0102347','2021-05-19',NULL,NULL,NULL,NULL),(39,1,'HP','HP ProDesk 400 G5 Desktop Mini','8CC9390FQZ','2021-03-16',NULL,NULL,NULL,NULL),(40,1,'HP','HP ProDesk 400 G5 Desktop Mini','8CC9372743','2021-05-19',NULL,NULL,NULL,NULL),(41,1,'HP','HP ProDesk 400 G5 Desktop Mini','8CC937274X','2021-05-19',NULL,NULL,NULL,NULL),(42,1,'HP','HP ProDesk 400 G3 DM','8CG7103799','2021-05-19',NULL,NULL,NULL,NULL),(43,1,'Intel','NUC7i5BNH','G6BN84900KGA','2021-05-19',NULL,NULL,NULL,NULL),(44,1,'HP','HP ProDesk 400 G3 DM','8CG710378Q','2021-05-19',NULL,NULL,NULL,NULL),(45,1,'Intel','NUC7i5BNH','G6BN84900LUH','2021-05-19',NULL,NULL,NULL,NULL),(46,1,'HP','HP ProDesk 400 G4 DM','8CC9021995','2021-05-19',NULL,NULL,NULL,NULL),(47,1,'HP','HP ProDesk 400 G3 DM','8CG710378T','2021-05-19',NULL,NULL,NULL,NULL),(48,1,'HP','HP ProDesk 400 G3 DM','8CG710378V','2021-05-19',NULL,NULL,NULL,NULL),(49,1,'FUJITSU','PRIMERGY RX1330 M4','YMHV007466','2021-05-19',NULL,NULL,NULL,NULL),(50,1,'HP','HP ProDesk 400 G5 Desktop Mini','8CC937274V','2021-05-19',NULL,NULL,NULL,NULL),(51,1,'HP','HP ProDesk 400 G5 Desktop Mini','8CC937274M','2021-05-19',NULL,NULL,NULL,NULL),(52,1,'HP','HP ProDesk 400 G4 DM','8CC904374H','2021-05-19',NULL,NULL,NULL,NULL),(65,1,'AMD','INVENTED-100','4815162342','2022-04-08',NULL,'Instancia de Prueba',NULL,NULL),(70,5,'BENQ','24\"','xxxx','2022-06-14',NULL,NULL,'2022-06-14 07:32:59','2022-06-14 07:32:59'),(71,5,'Philips','e-line','239854','2022-09-29',NULL,'Prueba','2022-09-29 09:45:58','2022-09-29 09:45:58'),(72,5,'Benq','L86','123478','2022-10-10',NULL,'Prueba','2022-10-10 04:04:51','2022-10-10 04:04:51');
/*!40000 ALTER TABLE `1equipos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `1usuarios`
--

DROP TABLE IF EXISTS `1usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `1usuarios` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) NOT NULL,
  `Usuario` varchar(255) NOT NULL,
  `Departamento` varchar(255) NOT NULL,
  `FechaAlta` date NOT NULL,
  `FechaBaja` date DEFAULT NULL,
  `Observaciones` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `1usuarios`
--

LOCK TABLES `1usuarios` WRITE;
/*!40000 ALTER TABLE `1usuarios` DISABLE KEYS */;
INSERT INTO `1usuarios` VALUES (2,'Agustín Jiménez Suárez','ajimenez.gmu.es','Vivienda','2021-05-19',NULL,NULL,NULL,NULL),(3,'Ana Maria Torrejon Camacho','atorrejon.gmu.es','Administración general','2021-05-19',NULL,NULL,NULL,NULL),(4,'Antonio Domínguez Gallego','adominguez.gmu.es','Edificación y disciplina','2021-05-19',NULL,NULL,NULL,NULL),(5,'Antonio Tellez Saenz','atellez.gmu.es','Planeamiento y gestion','2021-05-19',NULL,NULL,NULL,NULL),(6,'Baldomero Aldón Buzón','baldon.gmu.es','Administración general','2021-05-19',NULL,NULL,NULL,NULL),(7,'Beatriz López Silva','blopez.gmu.es','Proyectos y obras','2021-05-19',NULL,NULL,NULL,NULL),(8,'Blanca Salvago Enríquez','bsalvago.gmu.es','Edificación y disciplina','2021-05-19',NULL,NULL,NULL,NULL),(9,'Domingo Fernández Tubío','dfernandez.gmu.es','Asesoría jurídica','2021-05-19',NULL,NULL,NULL,NULL),(10,'Erika Reyes Barrios','ereyes.gmu.es','Intervencón','2021-05-19',NULL,NULL,NULL,NULL),(11,'Estefanía Ruíz Lima','eruiz.gmu.es','Tesorería','2021-05-19',NULL,NULL,NULL,NULL),(12,'Eugenia Hernández Parra','ehernandez.gmu.es','Asesoría jurídica','2021-05-19',NULL,NULL,NULL,NULL),(13,'Fco. Fermín Prieto Alcón','fprieto.gmu.es','Tesorería','2021-05-19',NULL,NULL,NULL,NULL),(14,'Fco. Javier Rodríguez Ferreira','fjrodriguez.gmu.es','Edificación y disciplina','2021-05-19',NULL,NULL,NULL,NULL),(15,'Fco. Javier Martinez García','fjmartinez.gmu.es','Planeamiento y gestion','2021-05-19',NULL,NULL,NULL,NULL),(16,'Gloria Hermoso Mellado','ghermoso.gmu.es','Asesoría jurídica','2021-05-19',NULL,NULL,NULL,NULL),(17,'Gloria Soler Rabadán','gsoler.gmu.es','Recursos humanos','2021-05-19',NULL,NULL,NULL,NULL),(18,'Gonzalo Valero Quintana','gvalero.gmu.es','Proyectos y obras','2021-05-19',NULL,NULL,NULL,NULL),(19,'Inmaculada Escobar Vazquez','iescobar.gmu.es','Intervencón','2021-05-19',NULL,NULL,NULL,NULL),(20,'Javier Ramírez Bollullo','jramirez.gmu.es','Administración general','2021-05-19',NULL,NULL,NULL,NULL),(21,'Jesús Rodríguez Oliva','jrodriguez.gmu.es','Proyectos y obras','2021-05-19',NULL,NULL,NULL,NULL),(22,'Joaquina Suárez Ruíz','jsuarez.gmu.es','Edificación y disciplina','2021-05-19',NULL,NULL,NULL,NULL),(23,'José Manuel Macías Saborido','jmmacias.gmu.es','Asesoría jurídica','2021-05-19',NULL,NULL,NULL,NULL),(24,'José Manuel Rodríguez Vidal','jmrodriguez.gmu.es','Edificación y disciplina','2021-05-19',NULL,NULL,NULL,NULL),(25,'José Maria Hernández Juez-Sarmiento','jmhernandez.gmu.es','Vivienda','2021-05-19',NULL,NULL,NULL,NULL),(26,'José Miguel Monge Jiménez','jmmonge.gmu.es','Administración general','2021-05-19',NULL,NULL,NULL,NULL),(27,'José Pozo Cuevas','jpozo.gmu.es','Proyectos y obras','2021-05-19',NULL,NULL,NULL,NULL),(28,'José Pozo Mellado','ppozo.gmu.es','Edificación y disciplina','2021-05-19',NULL,NULL,NULL,NULL),(29,'Juan Antonio Listan Gumier','jalistan.gmu.es','Administración general','2021-05-19',NULL,NULL,NULL,NULL),(30,'Mª Carmen Parejo Camacho','mcparejo.gmu.es','Administración general','2021-05-19',NULL,NULL,NULL,NULL),(31,'Mabel Roldán Vendrell','mroldan.gmu.es','Edificación y disciplina','2021-05-19',NULL,NULL,NULL,NULL),(32,'Manuel Rodriguez Victoria','mrodriguez.gmu.es','Planeamiento y gestion','2021-05-19',NULL,NULL,NULL,NULL),(33,'Mari Carmen Pérez Rodríguez','mcperez.gmu.es','Administración general','2021-05-19',NULL,NULL,NULL,NULL),(34,'María José Sánchez Pérez','mjsanchez.gmu.es','Administración general','2021-05-19',NULL,NULL,NULL,NULL),(35,'Maria Rosario Buzón Gómez','mrbuzon.gmu.es','Edificación y disciplina','2021-05-19',NULL,NULL,NULL,NULL),(36,'Mercedes Alcántara Puerto','malcantara.gmu.es','Edificación y disciplina','2021-05-19',NULL,NULL,NULL,NULL),(37,'Milagrosa Reyes Barrios','mreyes.gmu.es','Planeamiento y gestion','2021-05-19',NULL,NULL,NULL,NULL),(38,'Milagrosa López Fernandez','mlopez.gmu.es','Intervencón','2021-05-19',NULL,NULL,NULL,NULL),(39,'Montserrat de la Cuadra Fdez. Gao','mcuadra.gmu.es','Planeamiento y gestion','2021-05-19',NULL,NULL,NULL,NULL),(40,'Rafael González Calderón','rgonzalez.gmu.es','Proyectos y obras','2021-05-19',NULL,NULL,NULL,NULL),(41,'Rafael Humanes García','rhumanes.gmu.es','Proyectos y obras','2021-05-19',NULL,NULL,NULL,NULL),(42,'Vanesa Vidal Bernal','vvidal.gmu.es','Secretaria general','2021-05-19',NULL,NULL,NULL,NULL),(43,'Virginia Martínez Anillo','vmartinez.gmu.es','Edificación y disciplina','2021-05-19',NULL,NULL,NULL,NULL),(44,'Julio Garcia Martín','jgarcia.gmu.es','Presidencia','2021-05-19',NULL,NULL,NULL,NULL),(45,'Practicas','practicas.gmu.es','Informática','2022-03-21',NULL,NULL,NULL,NULL),(46,'Presidenta','presidenta.gmu.es','Presidencia','2022-03-21',NULL,NULL,NULL,NULL),(47,'Zoiro','correo@inventado.com','Jardinero','2022-04-09',NULL,NULL,NULL,NULL),(48,'No Asignado','sinasignar','Sin Asignar','2022-05-25',NULL,'',NULL,NULL),(49,'Red Pegatinas Licencias','redpegatinas@gmu.es','Licencias','2022-10-03',NULL,NULL,NULL,NULL),(50,'Red Plotter','redplotter@gmu.es','Proyectos y obras','2022-10-04',NULL,NULL,NULL,NULL),(51,'Red Vivienda','redvivienda@gmu.es','Vivienda','2022-10-04',NULL,NULL,NULL,NULL),(52,'Red Plotter Hp 500','redplotterhp500@gmu.es','Obras','2022-10-04',NULL,NULL,NULL,NULL),(53,'Red Ana','redana@gmu.es','Obras','2022-10-06',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `1usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documentos`
--

DROP TABLE IF EXISTS `documentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `documentos` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Tabla` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `IdRelacionado` int DEFAULT NULL,
  `Nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT '0',
  `Fichero` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT '0',
  `Observaciones` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=130 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documentos`
--

LOCK TABLES `documentos` WRITE;
/*!40000 ALTER TABLE `documentos` DISABLE KEYS */;
INSERT INTO `documentos` VALUES (64,'Software',9,'Licencia','/inventario/public/documentos/Software_64.pdf','Actualizada posteriormente a 43 Licencias','2022-11-23 11:02:34','2022-11-23 11:02:34'),(65,'Software',11,'Licencia','/inventario/public/documentos/Software_65.pdf',NULL,'2022-11-23 11:29:10','2022-11-23 11:29:10'),(70,'Software',14,'Factura','/inventario/public/documentos/Software_70.pdf',NULL,'2022-11-24 11:44:37','2022-11-24 11:44:37'),(71,'Software',14,'Activacion','/inventario/public/documentos/Software_71.pdf',NULL,'2022-11-24 11:44:52','2022-11-24 11:44:52'),(73,'Software',12,'Presupuesto','/inventario/public/documentos/Software_73.pdf',NULL,'2022-11-25 06:50:30','2022-11-25 06:50:30'),(74,'Software',13,'Presupuesto','/inventario/public/documentos/Software_74.pdf',NULL,'2022-11-25 07:02:07','2022-11-25 07:02:07'),(75,'Software',11,'Acceso al area de clientes','/inventario/public/documentos/Software_75.pdf',NULL,'2022-11-29 06:41:42','2022-11-29 06:41:42'),(76,'Software',11,'Más datos de la licencia','/inventario/public/documentos/Software_76.pdf',NULL,'2022-11-29 06:43:15','2022-11-29 06:43:15'),(77,'Software',15,'Presupuesto 2022','/inventario/public/documentos/Software_77.pdf',NULL,'2022-11-29 07:08:10','2022-11-29 07:08:10'),(78,'Ordenador',65,'Presupuesto','/inventario/public/documentos/Ordenador_78.pdf',NULL,'2022-11-30 06:58:18','2022-11-30 06:58:18'),(79,'Empleado',6,'Recibo móvil','/inventario/public/documentos/Empleado_79.pdf',NULL,'2022-12-02 11:09:02','2022-12-02 11:09:02'),(84,'Impresora',116,'Albaran','/inventario/public/documentos/Impresora_84.pdf',NULL,'2023-01-09 10:57:40','2023-01-09 10:57:40'),(85,'Ordenador',53,'Pliego técnico','/inventario/public/documentos/Ordenador_85.pdf',NULL,'2023-01-09 11:42:59','2023-01-09 11:42:59'),(88,'Impresora',113,'Presupuesto','/inventario/public/documentos/Impresora_88.pdf',NULL,'2023-01-12 10:30:34','2023-01-12 10:30:34'),(89,'Monitor',102,'Presupuesto','/inventario/public/documentos/Monitor_89.pdf',NULL,'2023-01-12 10:32:20','2023-01-12 10:32:20'),(90,'Monitor',126,'Presupuesto','/inventario/public/documentos/Monitor_90.pdf',NULL,'2023-01-12 10:32:43','2023-01-12 10:32:43'),(92,'Software',9,'Presupuesto 2023','/inventario/public/documentos/Software_92.pdf',NULL,'2023-01-13 10:13:08','2023-01-13 10:13:08'),(93,'Ordenador',53,'Presupuesto','/inventario/public/documentos/Ordenador_93.pdf','Incluye Qnap','2023-01-17 10:42:15','2023-01-17 10:42:15'),(94,'Ordenador',50,'Factura de compra','/inventario/public/documentos/Ordenador_94.pdf','Incluye ratón y Manos libres Logitech P710E','2023-01-17 12:00:22','2023-01-17 12:00:22'),(95,'Software',13,'Factura de compra','/inventario/public/documentos/Software_95.pdf',NULL,'2023-01-17 12:07:11','2023-01-17 12:07:11'),(96,'Software',12,'Factura de compra','/inventario/public/documentos/Software_96.pdf',NULL,'2023-01-17 12:07:29','2023-01-17 12:07:29'),(97,'Ordenador',53,'Factura de compra','/inventario/public/documentos/Ordenador_97.pdf',NULL,'2023-01-17 12:09:34','2023-01-17 12:09:34'),(98,'Impresora',102,'Factura de compra','/inventario/public/documentos/Impresora_98.pdf',NULL,'2023-01-17 12:18:40','2023-01-17 12:18:40'),(100,'Tablet',138,'Factura de compra','/inventario/public/documentos/Tablet_100.pdf',NULL,'2023-01-18 09:42:24','2023-01-18 09:42:24'),(101,'Software',9,'Licencia 2023','/inventario/public/documentos/Software_101.pdf',NULL,'2023-01-24 06:25:06','2023-01-24 06:25:06'),(102,'Ordenador',10,'Presupuesto','/inventario/public/documentos/Ordenador_102.pdf',NULL,'2023-01-30 06:21:40','2023-01-30 06:21:40'),(103,'Ordenador',1,'Presupuesto','/inventario/public/documentos/Ordenador_103.pdf',NULL,'2023-01-30 06:22:08','2023-01-30 06:22:08'),(104,'Ordenador',51,'Presupuesto','/inventario/public/documentos/Ordenador_104.pdf',NULL,'2023-01-30 06:22:28','2023-01-30 06:22:28'),(105,'Terminal',21,'Factura de compra','/inventario/public/documentos/Terminal_105.pdf',NULL,'2023-01-30 06:25:24','2023-01-30 06:25:24'),(106,'Terminal',22,'Factura de compra','/inventario/public/documentos/Terminal_106.pdf',NULL,'2023-01-30 06:25:48','2023-01-30 06:25:48'),(107,'Terminal',23,'Factura de compra','/inventario/public/documentos/Terminal_107.pdf',NULL,'2023-01-30 06:26:03','2023-01-30 06:26:03'),(108,'Terminal',24,'Factura de compra','/inventario/public/documentos/Terminal_108.pdf',NULL,'2023-01-30 06:26:16','2023-01-30 06:26:16'),(109,'Proveedor',2,'Contrato 2023','/inventario/public/documentos/Proveedor_109.pdf',NULL,'2023-01-30 06:36:16','2023-01-30 06:36:16'),(110,'Proveedor',2,'Pliego técnico 2023','/inventario/public/documentos/Proveedor_110.pdf',NULL,'2023-01-30 06:37:18','2023-01-30 06:37:18'),(111,'Ordenador',53,'Factura de compra disco SSD de 960G','/inventario/public/documentos/Ordenador_111.pdf',NULL,'2023-02-20 09:07:08','2023-02-20 09:07:08'),(112,'Ordenador',139,'Documentacion','/inventario/public/documentos/Ordenador_112.pdf',NULL,'2023-03-08 10:52:49','2023-03-08 10:52:49'),(113,'Proveedor',2,'Precios 2023 (Anexo II)','/inventario/public/documentos/Proveedor_113.pdf',NULL,'2023-05-02 07:13:28','2023-05-02 07:13:28'),(114,'Software',23,'Datos Producto','/inventario/public/documentos/Software_114.pdf','Numero de serie para activar','2023-05-19 05:00:36','2023-05-19 05:00:36'),(115,'Software',24,'Factura de compra','/inventario/public/documentos/Software_115.pdf',NULL,'2023-05-19 09:27:28','2023-05-19 09:27:28'),(116,'Software',23,'Presupuesto','/inventario/public/documentos/Software_116.pdf',NULL,'2023-05-19 09:37:15','2023-05-19 09:37:15'),(117,'Ordenador',10,'Factura','/inventario/public/documentos/Ordenador_117.pdf',NULL,'2023-06-26 09:51:44','2023-06-26 09:51:44'),(118,'Ordenador',1,'Factura','/inventario/public/documentos/Ordenador_118.pdf',NULL,'2023-06-26 09:52:09','2023-06-26 09:52:09'),(119,'Ordenador',51,'Factura','/inventario/public/documentos/Ordenador_119.pdf',NULL,'2023-06-26 09:52:28','2023-06-26 09:52:28'),(120,'Escaner',77,'Propuesta de gaso','/inventario/public/documentos/Escaner_120.pdf',NULL,'2023-06-26 09:53:33','2023-06-26 09:53:33'),(121,'Monitor',89,'Factura','/inventario/public/documentos/Monitor_121.pdf',NULL,'2023-06-26 09:54:27','2023-06-26 09:54:27'),(122,'Monitor',107,'Factura','/inventario/public/documentos/Monitor_122.pdf',NULL,'2023-06-26 09:54:54','2023-06-26 09:54:54'),(123,'Monitor',132,'Factura','/inventario/public/documentos/Monitor_123.pdf',NULL,'2023-06-26 09:55:09','2023-06-26 09:55:09'),(124,'Tablet',133,'Presupuesto','/inventario/public/documentos/Tablet_124.pdf',NULL,'2023-06-27 08:34:49','2023-06-27 08:34:49'),(125,'Tablet',134,'Presupuesto','/inventario/public/documentos/Tablet_125.pdf',NULL,'2023-06-27 08:36:12','2023-06-27 08:36:12'),(126,'Ordenador',141,'Albaran','/inventario/public/documentos/Ordenador_126.pdf',NULL,'2023-07-13 06:23:46','2023-07-13 06:23:46'),(127,'Ordenador',141,'Credenciales','/inventario/public/documentos/Ordenador_127.pdf',NULL,'2023-08-01 09:08:57','2023-08-01 09:08:57'),(128,'Software',27,'Credenciales','/inventario/public/documentos/Software_128.pdf',NULL,'2023-08-03 05:17:39','2023-08-03 05:17:39'),(129,'Terminal',35,'Recibo entrega','/inventario/public/documentos/Terminal_129.pdf',NULL,'2023-09-04 09:49:54','2023-09-04 09:49:54');
/*!40000 ALTER TABLE `documentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipos`
--

DROP TABLE IF EXISTS `equipos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `equipos` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `IdTipo` int NOT NULL,
  `NombreOrdenador` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Foto` blob,
  `Modelo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `NumSerie` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `FechaAlta` date DEFAULT '2022-01-01',
  `FechaBaja` date DEFAULT NULL,
  `Observaciones` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'Alta Masiva',
  `NInventario` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'E-000000' COMMENT 'Número de referencia en el inventario',
  `PrecioAdquisicion` decimal(20,2) NOT NULL,
  `Etiquetar` smallint DEFAULT '0',
  `Etiquetado` smallint DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_equipos_tipoequipos` (`IdTipo`) USING BTREE,
  CONSTRAINT `FK_equipos_tipoequipos` FOREIGN KEY (`IdTipo`) REFERENCES `tipoequipos` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=142 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipos`
--

LOCK TABLES `equipos` WRITE;
/*!40000 ALTER TABLE `equipos` DISABLE KEYS */;
INSERT INTO `equipos` VALUES (1,1,'PC_info01',NULL,'LENOVO 10T700BTSP','S4QX7405\r','2021-03-04',NULL,'','E-000001',845.45,1,1,NULL,NULL),(2,1,'PC_jsuarez',NULL,'HP ProDesk 400 G5 Desktop Mini','8CC9384GXY\r','2019-11-26',NULL,'','E-000002',599.00,0,1,NULL,NULL),(3,1,'PC_baldon',NULL,'HP ProDesk 400 G5 Desktop Mini','8CC9372750\r','2019-11-26',NULL,'','E-000003',599.00,1,1,NULL,NULL),(4,1,'PC_jmhernandez',NULL,'HP ProDesk 400 G5 Desktop Mini','8CC937274Q\r','2019-11-26',NULL,'','E-000004',599.00,1,1,NULL,NULL),(5,1,'PC_jalistan',NULL,'HP ProDesk 400 G5 Desktop Mini','8CC9390FQX\r','2019-11-26',NULL,'','E-000005',599.00,1,1,NULL,NULL),(6,1,'PC_atellez',NULL,'HP ProDesk 400 G3 DM','8CG711262J\r','2017-04-10',NULL,'Valor estimado','E-000006',600.00,1,1,NULL,NULL),(7,1,'PC_dfernandez',NULL,'HP ProDesk 400 G5 Desktop Mini','8CC9390FQY\r','2019-11-26',NULL,'','E-000007',599.00,1,1,NULL,NULL),(8,1,'PC_rgonzalez',NULL,'HP ProDesk 400 G3 DM','8CG710378T\r','2017-04-10',NULL,'Valor estimado','E-000008',600.00,1,1,NULL,NULL),(9,1,'PC_fprieto',NULL,'HP ProDesk 400 G5 Desktop Mini','8CC9384GYG\r','2019-11-26',NULL,'','E-000009',599.00,1,1,NULL,NULL),(10,1,'PC_aplicencias',NULL,'LENOVO 10T700BTSP','S4QX7329','2021-03-04',NULL,'','E-000010',845.45,1,1,NULL,NULL),(11,1,'PC_blopez',NULL,'HP ProDesk 400 G3 DM','8CG7103796\r','2017-04-10',NULL,'Valor estimado','E-000011',600.00,1,1,NULL,NULL),(12,1,'PC_iescobar',NULL,'HP ProDesk 400 G5 Desktop Mini','8CC9384GY5\r','2019-11-26',NULL,'','E-000012',599.00,1,1,NULL,NULL),(13,1,'PC_mjsanchez',NULL,'HP ProDesk 400 G3 DM','8CG710378W','2017-04-10',NULL,'Valor estimado.  Usuario jmmonge pass Rubi....','E-000013',600.00,1,1,NULL,NULL),(14,1,'PC_atorrejon',NULL,'HP ProDesk 400 G4 DM','8CC904376X\r','2019-04-12',NULL,'','E-000014',601.78,1,1,NULL,NULL),(15,1,'PC_miroldan',NULL,'HP ProDesk 400 G3 DM','8CG710378X\r','2017-04-10',NULL,'Valor estimado','E-000015',600.00,1,1,NULL,NULL),(16,1,'PC_malcantara',NULL,'HP ProDesk 400 G5 Desktop Mini','8CC9372751\r','2019-11-26',NULL,'','E-000016',599.00,1,1,NULL,NULL),(17,1,'PC_mcparejo',NULL,'HP ProDesk 400 G5 Desktop Mini','8CC9384GYB\r','2019-11-26',NULL,'','E-000017',599.00,1,1,NULL,NULL),(18,1,'PC_escaner',NULL,'HP ProDesk 400 G3 DM','8CG7103799\r','2017-04-10',NULL,'Valor estimado','E-000018',600.00,1,1,NULL,NULL),(19,1,'PC_jmmacias',NULL,'HP ProDesk 400 G5 Desktop Mini','8CC9322HCH\r','2019-11-26',NULL,'','E-000019',599.00,1,1,NULL,NULL),(20,1,'PC_jrodriguez',NULL,'HP ProDesk 400 G3 DM','8CG711262B\r','2017-04-10',NULL,'Valor estimado','E-000020',600.00,1,1,NULL,NULL),(21,1,'PC_gsoler',NULL,'HP ProDesk 400 G5 Desktop Mini','8CC9390FR4\r','2019-11-26',NULL,'','E-000021',599.00,1,1,NULL,NULL),(22,1,'PC_admingerenral',NULL,'MSI CO., LTD MS-B09611','MSB096FBS0103504','2022-01-01',NULL,'En el dpto de Vivienda donde estaba Joselito','E-000022',185.98,1,1,NULL,NULL),(23,1,'PC_secr01',NULL,'HP ProDesk 400 G5 Desktop Mini','8CC9384GY3\r','2019-11-26',NULL,'','E-000023',599.00,1,1,NULL,NULL),(24,1,'PC_ghermoso',NULL,'HP ProDesk 400 G4 DM','8CC9021994\r','2019-04-12',NULL,'','E-000024',601.78,1,1,NULL,NULL),(25,1,'PC_adominguez',NULL,'HP ProDesk 400 G3 DM','8CG711262G\r','2017-04-10',NULL,'Valor estimado','E-000025',600.00,1,1,NULL,NULL),(26,1,'PC_mcperez',NULL,'HP ProDesk 400 G5 Desktop Mini','8CC9341KZ3\r','2019-11-26',NULL,'','E-000026',599.00,1,1,NULL,NULL),(27,1,'PC_pres01',NULL,'HP ProDesk 400 G4 DM','8CC9021995\r','2019-04-12',NULL,'','E-000027',601.78,1,1,NULL,NULL),(28,1,'PC_jramirez',NULL,'HP ProDesk 400 G5 Desktop Mini','8CC9390FR1\r','2019-11-26',NULL,'','E-000028',599.00,1,1,NULL,NULL),(29,1,'PC_ppozo',NULL,'Intel(R) Client Systems NUC7i5BNH','G6BN84900KGA\r','2022-01-01',NULL,'Alta Masiva','E-000029',135.99,1,1,NULL,NULL),(30,1,'PC_bsalvago',NULL,'HP ProDesk 400 G3 DM','8CG710378Z\r','2017-04-10',NULL,'Valor estimado','E-000030',600.00,1,1,NULL,NULL),(31,1,'PC_jpozo',NULL,'HP ProDesk 400 G3 DM','8CG711262L\r','2017-04-10',NULL,'Valor estimado','E-000031',600.00,1,1,NULL,NULL),(32,1,'PC_gvalero',NULL,'HP ProDesk 400 G3 DM','8CG711262F\r','2017-04-10',NULL,'Valor estimado','E-000032',600.00,1,1,NULL,NULL),(33,1,'PC_ehernandez',NULL,'HP ProDesk 400 G5 Desktop Mini','8CC937274Y\r','2019-11-26',NULL,'','E-000033',599.00,1,1,NULL,NULL),(34,1,'PC_viv01b',NULL,'HP ProDesk 400 G5 Desktop Mini','8CC937274V','2019-11-26',NULL,'','E-000034',599.00,1,1,NULL,NULL),(35,1,'PC_libre',NULL,'MSI CO., LTD MS-B09611','MSB096G7S0102347','2022-01-01',NULL,'Alta Masiva.','E-000035',185.98,1,1,NULL,NULL),(36,1,'PC_eruiz',NULL,'HP ProDesk 400 G5 Desktop Mini','8CC9390FR0\r','2019-11-26',NULL,'','E-000036',599.00,1,1,NULL,NULL),(37,1,'PC_fjrodriguez',NULL,'HP ProDesk 400 G3 DM','8CG710378Q\r','2017-04-10',NULL,'Valor estimado','E-000037',600.00,1,1,NULL,NULL),(38,1,'PC_practicaslic',NULL,'Intel(R) Client Systems NUC7i5BNH','G6BN84900LUH','2022-01-01',NULL,'Alta Masiva','E-000038',0.00,1,1,NULL,NULL),(39,1,'PC_fjmartinez',NULL,'HP ProDesk 400 G3 DM','8CG710378V\r','2017-04-10',NULL,'Valor estimado','E-000039',600.00,1,1,NULL,NULL),(40,1,'PC_vmartinez',NULL,'HP ProDesk 400 G5 Desktop Mini','8CC937274M\r','2019-11-26',NULL,'','E-000040',599.00,1,1,NULL,NULL),(41,1,'PC_mrbuzon',NULL,'HP ProDesk 400 G5 Desktop Mini','8CC9372743\r','2019-11-26',NULL,'','E-000041',599.00,1,1,NULL,NULL),(42,1,'PC_jmrodriguez',NULL,'HP ProDesk 400 G3 DM','8CG711262K\r','2017-04-10',NULL,'Valor estimado','E-000042',600.00,1,1,NULL,NULL),(43,1,'PC_mcuadra',NULL,'HP ProDesk 400 G3 DM','8CG7103795\r','2017-04-10',NULL,'Valor estimado','E-000043',600.00,1,1,NULL,NULL),(44,1,'PC_ajimenez',NULL,'HP ProDesk 400 G3 DM','8CG710378R','2017-04-10',NULL,'Valor estimado','E-000044',600.00,1,1,NULL,NULL),(45,1,'PC_mrodriguez',NULL,'HP ProDesk 400 G3 DM','8CG710378Y\r','2017-04-10',NULL,'Valor estimado','E-000045',600.00,1,1,NULL,NULL),(46,1,'PC_mlopez',NULL,'HP ProDesk 400 G5 Desktop Mini','8CC9390FQZ\r','2019-11-26',NULL,'','E-000046',599.00,1,1,NULL,NULL),(47,1,'PC_ereyes',NULL,'HP ProDesk 400 G5 Desktop Mini','8CC9384GY6\r','2019-11-26',NULL,'','E-000047',599.00,1,1,NULL,NULL),(48,1,'PC_mreyes',NULL,'HP ProDesk 400 G5 Desktop Mini','8CC937274X\r','2019-11-26',NULL,'','E-000048',599.00,1,1,NULL,NULL),(49,1,'PC_vvidal',NULL,'HP ProDesk 400 G4 DM','8CC904374H\r','2019-04-12',NULL,'','E-000049',601.78,1,1,NULL,NULL),(50,1,'Portatil informatica',NULL,'HP 340S G7 Notebook PC','5CD0151RDC','2020-11-11','2020-11-11',NULL,'E-000050',1045.98,1,1,NULL,NULL),(51,1,'PC_info02',NULL,'LENOVO 10T700BTSP','S4QX7232','2021-03-04',NULL,'','E-000051',845.45,1,1,NULL,NULL),(52,1,'gmu03',NULL,'Dell Inc. OptiPlex GX620               ','6301W1J\r','2022-01-01',NULL,'Alta Masiva','E-000052',149.99,1,1,NULL,NULL),(53,1,'servernuevo',NULL,'FUJITSU PRIMERGY RX1330 M4','YMHV007466','2020-08-31',NULL,'Incluye licencia Windows 2019','E-000053',12126.76,1,1,NULL,NULL),(65,1,'Portatil Fsabio',NULL,'LG 17ZD90Q-G.ZX75B','209NZDC005514','2022-11-25',NULL,'Cuentas Fsabio-Bus...1000 y jmmonge-Ru...','E-000054',1498.74,1,1,'2022-11-30 06:56:11','2022-11-30 06:56:11'),(71,6,'Escaner',NULL,'Fujitsu ScanSnap IX500','AOPB096932','2014-12-31',NULL,'Era de Vivienda','E-000055',628.00,1,1,'2023-01-10 11:28:15','2023-01-10 11:28:15'),(72,6,'Escaner Licencias',NULL,'Fujitsu ScanSnap IX500','AOPBC03984','2015-08-31',NULL,NULL,'E-000056',628.00,1,1,'2023-01-10 11:50:53','2023-01-10 11:50:53'),(73,6,'Escaner Registro',NULL,'Fujitsu ScanSnap IX500','AWRHF07919','2017-05-31',NULL,NULL,'E-000057',628.00,1,1,'2023-01-10 12:01:15','2023-01-10 12:01:15'),(74,6,'Escaner AP Vivienda',NULL,'Fujitsu ScanSnap IX500','AWRHF69981','2018-08-31',NULL,NULL,'E-000058',628.00,1,1,'2023-01-10 12:07:22','2023-01-10 12:07:22'),(75,6,'Escaner de planos',NULL,'Contex SD4490','ME52A95001C','2015-01-01',NULL,'Escanea con manchas. La fecha de alta es inventada.','E-000059',6000.00,1,1,'2023-01-10 12:10:18','2023-01-10 12:10:18'),(76,1,'casa-jesus',NULL,'HP ProDesk 400 G5 Desktop Mini','8CC9384GY5','2019-11-26',NULL,'','E-000061',599.00,1,1,NULL,NULL),(77,6,'Escaner Archivo',NULL,'Fujitsu ScanSnap IX1500','C06H064831','2020-01-31',NULL,NULL,'E-000060',630.00,1,1,'2023-01-11 09:13:05','2023-01-11 09:13:05'),(78,5,'Monitor admingerenral',NULL,'HP E202','3CQ64733JT','2017-04-10',NULL,'20\" HDMI/VGA/DISPLAY PORT. Valor estimado','E-000061',115.00,1,1,'2023-01-12 07:03:39','2023-01-12 07:03:39'),(79,5,'Monitor adominguez',NULL,'BenQ GL2460','6CG05180SL0','2017-04-10',NULL,'24\" VGA/HDMI/DVI-D. Valor estimado','E-000062',150.00,1,1,'2023-01-12 07:05:29','2023-01-12 07:05:29'),(80,5,'Monitor ajimenezA',NULL,'BenQ GL2460','6CG05171SL0','2017-04-10',NULL,'24\" VGA/HDMI/DVI-D. Valor estimado','E-000063',150.00,1,1,'2023-01-12 07:08:34','2023-01-12 07:08:34'),(81,5,'Monitor aplicencias',NULL,'BenQ GL2460','6CG04561SL0','2017-04-10',NULL,'24\" VGA/HDMI/DVI-D. Valor estimado','E-000064',150.00,1,1,'2023-01-12 07:09:49','2023-01-12 07:09:49'),(82,5,'Monitor atellez',NULL,'BenQ GL2460','6CG04562SL0','2017-04-10',NULL,'24\" VGA/HDMI/DVI-D. Valor estimado','E-000065',150.00,1,1,'2023-01-12 07:10:36','2023-01-12 07:10:36'),(83,5,'Monitor atorrejon',NULL,'Philips 246V5','AU01711001059','2020-01-01',NULL,'24\" VGA/HDMI','E-000066',0.00,1,1,'2023-01-12 07:11:58','2023-01-12 07:11:58'),(84,5,'Monitor baldon',NULL,'BenQ GL2460','6CG04560SL0','2017-04-10',NULL,'24\" VGA/HDMI/DVI-D. Valor estimado','E-000067',150.00,1,1,'2023-01-12 07:13:01','2023-01-12 07:13:01'),(85,5,'Monitor blopez',NULL,'BenQ GL2460','6CG05176SL0','2017-04-10',NULL,'24\" VGA/HDMI/DVI-D. Valor estimado','E-000068',150.00,1,1,'2023-01-12 07:13:55','2023-01-12 07:13:55'),(86,5,'Monitor bsalvago',NULL,'LG 25UM58-P','701NTBK8K357','2017-04-10',NULL,'25\" Ultra wide 2X HDMI. Valor estimado','E-000069',200.00,1,1,'2023-01-12 07:15:52','2023-01-12 07:15:52'),(87,5,'Monitor jrodriguez',NULL,'BenQ GL2460','ETZAG01543SL0','2017-04-10',NULL,'24\" VGA/HDMI/DVI-D. NO FUNCIONA HDMI. Valor estimado','E-000070',150.00,1,1,'2023-01-12 07:18:38','2023-01-12 07:18:38'),(88,5,'Monitor dfernandez',NULL,'LG 25UM58-P','610NTDV21730','2017-04-10',NULL,'25\" Ultra wide 2X HDMI. Valor estimado','E-000071',200.00,1,1,'2023-01-12 07:19:32','2023-01-12 07:19:32'),(89,5,'Monitor ehernandez',NULL,'DELL E2221HN','FXHZD73','2021-03-04',NULL,'22\" VGA/HDMI','E-000072',150.00,1,1,'2023-01-12 07:21:51','2023-01-12 07:21:51'),(90,5,'Monitor ereyes',NULL,'HP 22f','3CM9360C9Q','2019-11-26',NULL,'22\" VGA/HDMI','E-000073',130.20,1,1,'2023-01-12 08:22:14','2023-01-12 08:22:14'),(91,5,'Monitor eruiz',NULL,'HP E202','3CQ7061Q0Z','2017-04-10',NULL,'20\" HDMI/VGA/DISPLAY PORT. Valor estimado','E-000074',115.00,1,1,'2023-01-12 08:23:57','2023-01-12 08:23:57'),(92,5,'Monitor escaner',NULL,'HP L1906','CNN63720K8','2020-01-01',NULL,'19\" 3X4 VGA','E-000075',0.00,1,1,'2023-01-12 08:25:21','2023-01-12 08:25:21'),(93,5,'Monitor fjmartinez',NULL,'BenQ GL2460','6CG04565SL0','2017-04-10',NULL,'24\" VGA/HDMI/DVI-D. Valor estimado','E-000076',150.00,1,1,'2023-01-12 08:26:16','2023-01-12 08:26:16'),(94,5,'Monitor fjrodriguez',NULL,'BenQ GL2460','6CG04558SL0','2017-04-10',NULL,'24\" VGA/HDMI/DVI-D. Valor estimado','E-000077',150.00,1,1,'2023-01-12 08:27:02','2023-01-12 08:27:02'),(95,5,'Monitor fprieto ',NULL,'HP 22f','3CM9360CGG','2019-11-26',NULL,'22\" VGA/HDMI','E-000078',130.20,1,1,'2023-01-12 08:28:09','2023-01-12 08:28:09'),(96,5,'Monitor gerente',NULL,'BenQ GL2460','FXFYD73','2017-04-10',NULL,'24\" VGA/HDMI/DVI-D. Valor estimado','E-000079',150.00,1,1,'2023-01-12 08:42:54','2023-01-12 08:42:54'),(97,5,'Monitor ghermoso',NULL,'HP P223','CNK84809KH','2019-04-12',NULL,'22\" VGA/DISPLAY PORT','E-000080',129.06,1,1,'2023-01-12 08:44:17','2023-01-12 08:44:17'),(98,5,'Monitor gsoler',NULL,'HP 22f','3CM9360C9M','2019-11-26',NULL,'22\" VGA/HDMI','E-000081',130.20,1,1,'2023-01-12 08:46:30','2023-01-12 08:46:30'),(99,5,'Monitor gvaleroA',NULL,'Philips 223V5L','ZV01707023748','2020-01-01',NULL,'22\" VGA/HDMI','E-000082',0.00,1,1,'2023-01-12 08:48:08','2023-01-12 08:48:08'),(100,5,'Monitor gvaleroB',NULL,'ACER V193HQV','LL60C00640F3','2020-01-01',NULL,'19\" VGA','E-000083',0.00,1,1,'2023-01-12 08:49:09','2023-01-12 08:49:09'),(101,5,'Monitor iescobar',NULL,'HP P223','CNK8451HZC','2019-04-12',NULL,'22\" VGA/DISPLAY PORT','E-000084',129.06,1,1,'2023-01-12 08:50:20','2023-01-12 08:50:20'),(102,5,'Monitor info01A',NULL,'AOC 27B2H','SKMN2HA000149','2022-08-12',NULL,'27\" VGA/HDMI','E-000085',190.00,1,1,'2023-01-12 08:53:06','2023-01-12 08:53:06'),(103,5,'Monitor info01B',NULL,'BenQ GL2460','6CG04564SL0','2017-04-10',NULL,'24\" VGA/HDMI/DVI-D. Valor estimado','E-000086',150.00,1,1,'2023-01-12 09:03:55','2023-01-12 09:03:55'),(104,5,'Monitor info02A',NULL,'Philips 246V5','ZV01843032560','2020-01-01',NULL,'24\" VGA/HDMI','E-000087',0.00,1,1,'2023-01-12 09:05:16','2023-01-12 09:05:16'),(105,5,'Monitor info02B',NULL,'HP E202','3CQ7061Q14','2017-04-10',NULL,'20\" HDMI/VGA/DISPLAY PORT. Valor estimado','E-000088',115.00,1,1,'2023-01-12 09:11:01','2023-01-12 09:11:01'),(106,5,'Monitor jalistan',NULL,'HP 22f','3CM9360C9H','2019-11-26',NULL,'22\" VGA/HDMI','E-000089',130.20,1,1,'2023-01-12 09:12:15','2023-01-12 09:12:15'),(107,5,'Monitor jmhernandez',NULL,'DELL E2221HN','FXDXD73','2021-03-04',NULL,'22\" VGA/HDMI','E-000090',150.00,1,1,'2023-01-12 09:13:11','2023-01-12 09:13:11'),(108,5,'Monitor jmmacias',NULL,'HP 22f','3CM9360C9S','2019-11-26',NULL,'22\" VGA/HDMI','E-000091',130.20,1,1,'2023-01-12 09:14:26','2023-01-12 09:14:26'),(109,5,'Monitor jmrodriguez',NULL,'BenQ GL2460','6CG05177SL0','2017-04-10',NULL,'24\" VGA/HDMI/DVI-D. Valor estimado','E-000092',150.00,1,1,'2023-01-12 09:15:34','2023-01-12 09:15:34'),(110,5,'Monitor jpozo',NULL,'BenQ GL2460','6CG05169SL0','2017-04-10',NULL,'24\" VGA/HDMI/DVI-D. Valor estimado','E-000093',150.00,1,1,'2023-01-12 09:16:10','2023-01-12 09:16:10'),(111,5,'Monitor jramirez',NULL,'BenQ GL2460','7CG06834SL0','2017-04-10',NULL,'24\" VGA/HDMI/DVI-D. Valor estimado','E-000094',150.00,1,1,'2023-01-12 09:16:45','2023-01-12 09:16:45'),(112,5,'Monitor casa-jesus',NULL,'AOC E2370S','ABKFC9A001266','2020-01-01',NULL,'24\" VGA/HDMI/DVI-D','E-000095',0.00,1,1,'2023-01-12 09:18:07','2023-01-12 09:18:07'),(113,5,'Monitor jsuarez',NULL,'HP 22f','3CM9360C9G','2019-11-26',NULL,'22\" VGA/HDMI','E-000096',130.20,1,1,'2023-01-12 09:18:49','2023-01-12 09:18:49'),(114,5,'Monitor malcantara',NULL,'HP 22f','3CM9360C9R','2019-11-26',NULL,'22\" VGA/HDMI','E-000097',130.20,1,1,'2023-01-12 09:19:27','2023-01-12 09:19:27'),(115,5,'Monitor mcparejo',NULL,'Philips 190CW','DL40942056126','2020-01-01',NULL,'19\" VGA','E-000098',0.00,1,1,'2023-01-12 09:20:40','2023-01-12 09:20:40'),(116,5,'Monitor mcperez',NULL,'HP 22f','3CM9360C9K','2019-11-26',NULL,'22\" VGA/HDMI','E-000099',130.20,1,1,'2023-01-12 09:21:20','2023-01-12 09:21:20'),(117,5,'Monitor mcuadra',NULL,'BenQ GL2460','6CG05170SL0','2017-04-10',NULL,'24\" VGA/HDMI/DVI-D. Valor estimado','E-000100',150.00,1,1,'2023-01-12 09:33:47','2023-01-12 09:33:47'),(118,5,'Monitor miroldan',NULL,'LG 25UM58-P','701NTRL8K358','2017-04-10',NULL,'25\" Ultra wide 2X HDMI. Valor estimado','E-000101',200.00,1,1,'2023-01-12 09:34:47','2023-01-12 09:34:47'),(119,5,'Monitor mjsanchez',NULL,'ACER KG221Q','83603226442','2020-01-01',NULL,'22\" VGA/HDMI','E-000102',0.00,1,1,'2023-01-12 09:36:28','2023-01-12 09:36:28'),(120,5,'Monitor mlopez',NULL,'BenQ GL2460','6CG04566SL0','2017-04-10',NULL,'24\" VGA/HDMI/DVI-D. Valor estimado','E-000103',150.00,1,1,'2023-01-12 09:37:05','2023-01-12 09:37:05'),(121,5,'Monitor mrbuzon',NULL,'HP 22f','3CM9360C99','2019-11-26',NULL,'22\" VGA/HDMI','E-000104',130.20,1,1,'2023-01-12 09:38:32','2023-01-12 09:38:32'),(122,5,'Monitor mreyes',NULL,'HP 22f','3CM9360C8T','2019-11-26',NULL,'22\" VGA/HDMI','E-000105',130.20,1,1,'2023-01-12 09:39:12','2023-01-12 09:39:12'),(123,5,'Monitor mrodriguez',NULL,'BenQ GL2460','7CG06587SL0','2017-04-10',NULL,'24\" VGA/HDMI/DVI-D. Valor estimado','E-000106',150.00,1,1,'2023-01-12 09:39:57','2023-01-12 09:39:57'),(124,5,'Monitor ppozo',NULL,'BenQ GL2460','6CG04557SL0','2017-04-10',NULL,'24\" VGA/HDMI/DVI-D. Valor estimado','E-000107',150.00,1,1,'2023-01-12 09:41:12','2023-01-12 09:41:12'),(125,5,'Monitor practicaslic',NULL,'LG Flatron W1934S','0','2020-01-01',NULL,'19\" VGA','E-000108',0.00,1,1,'2023-01-12 09:42:46','2023-01-12 09:42:46'),(126,5,'Monitor pres01',NULL,'AOC 27B2H','SKMN2HA000066','2022-08-12',NULL,'27\" VGA/HDMI','E-000109',190.00,1,1,'2023-01-12 09:43:23','2023-01-12 09:43:23'),(127,5,'Monitor rgonzalez',NULL,'BenQ GL2460','6CG05179SL0','2017-04-10',NULL,'24\" VGA/HDMI/DVI-D. Valor estimado','E-000110',150.00,1,1,'2023-01-12 09:44:03','2023-01-12 09:44:03'),(128,5,'Monitor Servidores',NULL,'HP P223','CNK8451H0Z','2019-04-12',NULL,'22\" VGA/DISPLAY PORT','E-000111',129.06,1,1,'2023-01-12 09:46:36','2023-01-12 09:46:36'),(129,5,'Monitor vmartinez',NULL,'ACER KG221Q','MMT8VEE00183607DC74201','2020-01-01',NULL,'22\" VGA/HDMI','E-000112',0.00,1,1,'2023-01-12 09:48:36','2023-01-12 09:48:36'),(130,5,'Monitor vvidal',NULL,'HP P223','CNK84809GY','2019-04-12',NULL,'22\" VGA/DISPLAY PORT','E-000113',129.06,1,1,'2023-01-12 09:49:38','2023-01-12 09:49:38'),(131,5,'Monitor secr01',NULL,'Philips 246V5','ZV01616010722','2020-01-01',NULL,'24\" VGA/HDMI','E-000114',0.00,1,1,'2023-01-12 09:51:38','2023-01-12 09:51:38'),(132,5,'Monitor Servicio Tecnico',NULL,'DELL E2221HN','CN-0DKV9T-FCC00-0AO-AM2U-A01','2021-03-04',NULL,'22\" VGA/HDMI','E-000115',150.00,1,1,'2023-01-12 09:55:10','2023-01-12 09:55:10'),(133,7,'Tablet Antonio Dominguez',NULL,'Lenovo TB-X606F','HPV1YULE(61)','2020-09-01',NULL,NULL,'E-000116',240.00,1,1,'2023-01-12 11:18:44','2023-01-12 11:18:44'),(134,7,'Tablet Jose Manuel',NULL,'Lenovo TB-X606F','HPV1YUL4(61)','2020-09-01',NULL,NULL,'E-000117',0.00,1,1,'2023-01-12 11:20:12','2023-01-12 11:20:12'),(135,5,'Monitor ajimenezB',NULL,'LG Flatron W1918S','809TPDT02970','2020-01-01',NULL,'19\" 3X4 VGA','E-000118',0.00,1,1,'2023-01-13 07:08:49','2023-01-13 07:08:49'),(136,5,'Monitor viv01',NULL,'LG Flatron W1934S','807TPGS19391','2020-01-01',NULL,'19\" VGA','E-000119',0.00,1,1,'2023-01-13 07:22:48','2023-01-13 07:22:48'),(137,5,'Monitor Atencion al publico',NULL,'Fujitsu LL3200T','YV3H075675','2020-01-01',NULL,'20\" VGA','E-000120',0.00,1,1,'2023-01-13 08:56:05','2023-01-13 08:56:05'),(138,7,'Tablet Registro',NULL,'SAMSUNG GALAXY TAB S6 LITE SM-P610','R52R50EAC5Y','2021-09-15',NULL,'10.4\"/128Gb','E-000121',373.89,1,1,'2023-01-18 09:39:51','2023-01-18 09:39:51'),(139,1,'PC_usoPublico',NULL,'Fujitsu Esprimo P2540','YKQB143555','2023-03-08',NULL,'Tiene instalado Lubuntu Nombre {Publico} 192.168.20.215','E-000122',0.00,1,1,'2023-03-08 09:17:19','2023-03-08 09:17:19'),(140,1,'Portatil informatica',NULL,'Acer Aspire E1-522','NXM81EB020348122096600','2010-01-01',NULL,NULL,'E-000123',600.00,1,1,'2023-06-23 04:41:00','2023-06-23 04:41:00'),(141,1,'Portatil presidencia',NULL,'HP 250 15.6 inch G9 Notebook PC','CND3011FFJ','2023-07-12',NULL,'Comprado a GSO.','E-000124',866.33,1,1,'2023-07-13 05:22:39','2023-07-13 05:22:39');
/*!40000 ALTER TABLE `equipos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `fotos`
--

DROP TABLE IF EXISTS `fotos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fotos` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `IdEquipo` int DEFAULT NULL,
  `Foto` blob,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `IdEquipo` (`IdEquipo`),
  CONSTRAINT `IdEquipo` FOREIGN KEY (`IdEquipo`) REFERENCES `equipos` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fotos`
--

LOCK TABLES `fotos` WRITE;
/*!40000 ALTER TABLE `fotos` DISABLE KEYS */;
/*!40000 ALTER TABLE `fotos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `i_consumibles`
--

DROP TABLE IF EXISTS `i_consumibles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `i_consumibles` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Modelo` varchar(50) NOT NULL DEFAULT '',
  `Referencia` varchar(50) NOT NULL DEFAULT '',
  `Paginas` int DEFAULT NULL,
  `Precio` decimal(10,2) NOT NULL DEFAULT '0.00',
  `Cantidad` smallint NOT NULL DEFAULT '0',
  `Stock` smallint NOT NULL DEFAULT '0',
  `Bajas` tinyint(1) NOT NULL DEFAULT '0',
  `Equivalencia` smallint NOT NULL DEFAULT '1' COMMENT 'Unidades por paquete',
  `Stockminimo` smallint NOT NULL DEFAULT '1',
  `Editado` smallint NOT NULL DEFAULT '0' COMMENT 'comporbar si esta editado',
  `Observaciones` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=143 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `i_consumibles`
--

LOCK TABLES `i_consumibles` WRITE;
/*!40000 ALTER TABLE `i_consumibles` DISABLE KEYS */;
INSERT INTO `i_consumibles` VALUES (33,'Negro HP DesignJet 500','10-c4844A (69ml)',NULL,47.83,0,1,0,1,1,1,NULL,NULL,NULL),(34,'Cian HP DesignJet 500','82-C4911 (69ml)',NULL,55.37,0,1,0,1,1,0,NULL,NULL,NULL),(35,'Magenta HP DesignJet 500','82-C4912 (69ml)',NULL,55.37,0,1,0,1,1,0,NULL,NULL,NULL),(36,'Amarillo HP DesignJet 500','82-C4913 (69ml)',NULL,55.37,0,1,0,1,1,0,NULL,NULL,NULL),(37,'Toner 1015','Q2612A',2500,68.00,0,2,0,1,2,0,NULL,NULL,NULL),(45,'Negro Laser 1320','Q5959A (49A)',NULL,90.91,0,0,0,1,0,0,NULL,NULL,NULL),(113,'Toner P1005 (35A)','CB435A',1500,59.00,0,1,0,1,0,0,NULL,NULL,NULL),(122,'Toner P1102','CE285A',1600,55.00,0,1,0,1,0,0,NULL,NULL,NULL),(123,'Negro Plotter T520','CZ133A',NULL,55.08,0,1,0,1,1,1,NULL,NULL,NULL),(124,'Cyan Plotter T520','CZ134A',NULL,65.29,0,4,0,3,3,0,NULL,NULL,NULL),(125,'Magenta Plotter T520','CZ135A',NULL,65.29,0,4,0,3,3,0,NULL,NULL,NULL),(126,'Amarillo Plotter T520','CZ136A',NULL,65.29,0,5,0,3,3,0,NULL,NULL,NULL),(127,'Toner M102a','CF2017A',NULL,65.30,1,0,0,1,1,0,NULL,NULL,NULL),(128,'Toner M203dn','CF230A',NULL,50.10,0,3,0,1,3,0,NULL,NULL,NULL),(133,'Tambor de imagen para M102A','CF219A',NULL,70.24,0,0,0,1,0,0,NULL,NULL,NULL),(134,'Tambor de imagen para M203DN','CF232A',NULL,78.51,0,1,0,1,0,0,NULL,NULL,NULL),(135,'Toner M110we','W1420A ',NULL,45.00,0,1,0,1,1,0,NULL,NULL,NULL),(137,'DK-11209','DK-11209',NULL,12.00,0,1,0,1,0,0,'Rollo de etiquetas autoadhesivas','2023-01-09 10:16:33','2023-01-09 10:16:33'),(138,'Cabezal negro HP 500','C4810A',NULL,56.00,0,0,0,1,0,0,NULL,'2023-08-09 07:57:30','2023-08-09 07:57:30'),(139,'Cabezal Cian HP 500','C4811A',NULL,81.81,0,1,0,1,0,0,NULL,'2023-08-09 07:57:30','2023-08-09 07:57:30'),(140,'Cabezal Magenta HP 500','C4812A',NULL,81.81,0,1,0,1,0,0,NULL,'2023-08-09 07:57:30','2023-08-09 07:57:30'),(141,'Cabezal Amarillo HP 500','C4813A',NULL,81.81,0,0,0,1,0,0,NULL,'2023-08-09 07:57:30','2023-08-09 07:57:30'),(142,'Kit cabezal HP 711','C1Q10A',NULL,266.20,0,0,0,1,0,0,NULL,'2023-09-15 09:36:46','2023-09-15 09:36:46');
/*!40000 ALTER TABLE `i_consumibles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `i_detallespedidos`
--

DROP TABLE IF EXISTS `i_detallespedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `i_detallespedidos` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `IdPedido` int NOT NULL,
  `IdConsumible` int NOT NULL,
  `Cantidad` smallint NOT NULL,
  `CantidadRecibida` smallint DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `IdPedido` (`IdPedido`),
  KEY `IdConsumible` (`IdConsumible`),
  CONSTRAINT `FK_i_detallespedidos_i_consumibles` FOREIGN KEY (`IdConsumible`) REFERENCES `i_consumibles` (`Id`),
  CONSTRAINT `FK_i_detallespedidos_i_pedidos` FOREIGN KEY (`IdPedido`) REFERENCES `i_pedidos` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=190 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `i_detallespedidos`
--

LOCK TABLES `i_detallespedidos` WRITE;
/*!40000 ALTER TABLE `i_detallespedidos` DISABLE KEYS */;
INSERT INTO `i_detallespedidos` VALUES (171,111,37,0,0,'2023-02-02 10:47:56','2023-02-02 10:47:56'),(172,111,124,0,0,'2023-02-02 10:47:56','2023-02-02 10:47:56'),(173,111,125,0,0,'2023-02-02 10:47:56','2023-02-02 10:47:56'),(174,111,126,0,0,'2023-02-02 10:47:56','2023-02-02 10:47:56'),(175,111,127,0,0,'2023-02-02 10:47:56','2023-02-02 10:47:56'),(176,111,128,0,0,'2023-02-02 10:47:56','2023-02-02 10:47:56'),(177,111,135,0,0,'2023-02-02 10:47:56','2023-02-02 10:47:56'),(178,112,127,0,0,'2023-04-04 05:03:43','2023-04-04 05:03:43'),(179,112,128,0,0,'2023-04-04 05:03:43','2023-04-04 05:03:43'),(180,112,135,0,0,'2023-04-04 05:03:43','2023-04-04 05:03:43'),(181,113,122,0,0,'2023-07-05 09:05:16','2023-07-05 09:05:16'),(182,113,126,0,0,'2023-07-05 09:05:16','2023-07-05 09:05:16'),(183,113,127,0,0,'2023-07-05 09:05:16','2023-07-05 09:05:16'),(184,113,135,0,0,'2023-07-05 09:05:16','2023-07-05 09:05:16'),(185,114,35,0,0,'2023-09-05 08:00:27','2023-09-05 08:00:27'),(186,114,37,0,0,'2023-09-05 08:00:27','2023-09-05 08:00:27'),(187,114,139,0,0,'2023-09-05 08:00:27','2023-09-05 08:00:27'),(188,114,140,0,0,'2023-09-05 08:00:27','2023-09-05 08:00:27'),(189,115,142,0,0,'2023-09-15 09:46:56','2023-09-15 09:46:56');
/*!40000 ALTER TABLE `i_detallespedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `i_impresoras`
--

DROP TABLE IF EXISTS `i_impresoras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `i_impresoras` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `IdModImpresora` int NOT NULL,
  `IdUsuario` int NOT NULL,
  `IdTipo` int NOT NULL DEFAULT '2',
  `NumSerie` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `NInventario` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'I-000000' COMMENT 'I-000000',
  `Observaciones` varchar(400) DEFAULT NULL,
  `PrecioAdquisicion` decimal(20,2) NOT NULL,
  `Etiquetar` smallint DEFAULT '0',
  `Etiquetado` smallint DEFAULT '0',
  `FechaAlta` date DEFAULT NULL,
  `FechaBaja` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `IdUsuario` (`IdUsuario`),
  KEY `idmodimpresora` (`IdModImpresora`) USING BTREE,
  KEY `IdTipo` (`IdTipo`),
  CONSTRAINT `FK_I-impresoras_I-modeloimpresoras` FOREIGN KEY (`IdModImpresora`) REFERENCES `i_modeloimpresoras` (`Id`),
  CONSTRAINT `FK_i_impresoras_tipos` FOREIGN KEY (`IdTipo`) REFERENCES `tipos` (`Id`),
  CONSTRAINT `FK_i_impresoras_usuarios` FOREIGN KEY (`IdUsuario`) REFERENCES `usuarios` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `i_impresoras`
--

LOCK TABLES `i_impresoras` WRITE;
/*!40000 ALTER TABLE `i_impresoras` DISABLE KEYS */;
INSERT INTO `i_impresoras` VALUES (51,34,6,2,'CNDW51BGN6','I-000001','Comprada a Sainte (Alfonso Romero)',99.99,1,1,'2005-02-07',NULL,NULL,NULL),(71,45,13,2,'CNC1X29061','I-000002','Comprada a Sainte',112.99,1,1,'2007-01-01',NULL,NULL,NULL),(75,47,37,2,'Q5912A','I-000003',NULL,130.99,1,1,'2022-01-01',NULL,NULL,NULL),(79,30,11,2,'Q2462A','I-000004','Era la mia',80.99,1,1,'2021-07-01',NULL,NULL,NULL),(88,50,56,2,'VNC6G35720','I-000005','Era de Joaquin',120.98,1,1,'2022-01-01',NULL,NULL,NULL),(93,53,8,2,'VNC3S02945','I-000006','Comprada a Sainte',150.99,1,1,'2010-07-01',NULL,NULL,NULL),(96,55,55,2,'CN5CR7M0BN','I-000007','(Plotter) Modelo de producto CQ893A',75.99,1,1,'2016-04-01',NULL,NULL,NULL),(97,56,34,2,'VNC3B07797','I-000008','Comprada a Oficinas de Jerez',89.99,1,1,'2016-10-01',NULL,NULL,NULL),(98,57,19,2,'VNC3B05973','I-000009','Comprada a PcComponentes',180.00,1,1,'2017-01-01',NULL,NULL,NULL),(100,57,3,2,'VNC3B235557','I-000010','Comprada a PcComponentes',180.00,1,1,'2017-08-01',NULL,NULL,NULL),(101,57,55,2,'VMC3R00718','I-000011','(Pegatinas Licencias) Comprada a Canon',180.00,1,1,'2017-10-01',NULL,NULL,NULL),(102,57,2,2,'VNC3B63745','I-000012','(Vivienda) Comprada a Sainte',180.00,1,1,'2019-11-28',NULL,NULL,NULL),(103,54,55,2,'CV4CR7M2BN','I-000013','(Plotter) Era del ayuntamiento',0.00,1,1,'2022-01-01',NULL,NULL,NULL),(113,60,38,2,'VNC3J16849','I-000014','COMPRADA A SAINTE / Registrada en Hp con jmmonge1@hotmail.com - Rubinos22.',155.00,1,1,'2022-11-17',NULL,'2022-11-17 07:21:05','2022-11-17 07:21:05'),(116,70,26,2,'E79847J2G348093','I-000015','Impresora de etiquetas',110.40,1,1,'2023-01-09',NULL,'2023-01-09 10:29:54','2023-01-09 10:29:54');
/*!40000 ALTER TABLE `i_impresoras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `i_mantenimientoimpresoras`
--

DROP TABLE IF EXISTS `i_mantenimientoimpresoras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `i_mantenimientoimpresoras` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `IdImpresora` int NOT NULL,
  `IdConsumible` int NOT NULL,
  `Fecha` date NOT NULL,
  `Observaciones` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_mantenimientoimpresoras_consumibles` (`IdConsumible`),
  KEY `FK_i_mantenimientoimpresoras_i_impresoras` (`IdImpresora`),
  CONSTRAINT `FK_i_mantenimientoimpresoras_i_impresoras` FOREIGN KEY (`IdImpresora`) REFERENCES `i_impresoras` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_mantenimientoimpresoras_consumibles` FOREIGN KEY (`IdConsumible`) REFERENCES `i_consumibles` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `i_mantenimientoimpresoras`
--

LOCK TABLES `i_mantenimientoimpresoras` WRITE;
/*!40000 ALTER TABLE `i_mantenimientoimpresoras` DISABLE KEYS */;
INSERT INTO `i_mantenimientoimpresoras` VALUES (22,100,128,'2022-11-11',NULL,'2022-11-11 11:24:04','2022-11-11 11:24:04'),(23,98,128,'2022-11-11',NULL,'2022-11-11 11:24:35','2022-11-11 11:24:35'),(24,98,134,'2022-11-10',NULL,'2022-11-11 11:24:45','2022-11-11 11:24:45'),(25,75,37,'2023-01-09',NULL,'2023-01-09 10:05:45','2023-01-09 10:05:45'),(27,96,126,'2023-01-16',NULL,'2023-01-16 06:36:39','2023-01-16 06:36:39'),(28,96,125,'2023-01-18',NULL,'2023-01-18 06:54:47','2023-01-18 06:54:47'),(30,96,124,'2023-01-18',NULL,'2023-01-18 07:08:39','2023-01-18 07:08:39'),(31,100,128,'2023-01-25',NULL,'2023-01-25 10:29:21','2023-01-25 10:29:21'),(32,97,127,'2023-02-07',NULL,'2023-02-07 11:53:11','2023-02-07 11:53:11'),(33,113,135,'2023-02-07',NULL,'2023-02-07 11:54:01','2023-02-07 11:54:01'),(34,75,37,'2023-02-15',NULL,'2023-02-17 06:09:27','2023-02-17 06:09:27'),(35,93,122,'2023-03-08',NULL,'2023-03-08 06:25:12','2023-03-08 06:25:12'),(36,113,135,'2023-04-11',NULL,'2023-04-11 04:20:46','2023-04-11 04:20:46'),(38,96,126,'2023-04-12',NULL,'2023-04-12 07:09:13','2023-04-12 07:09:13'),(39,75,37,'2023-04-21',NULL,'2023-04-21 06:45:54','2023-04-21 06:45:54'),(40,97,127,'2023-05-08',NULL,'2023-05-08 06:22:51','2023-05-08 06:22:51'),(41,96,123,'2023-06-07',NULL,'2023-06-07 06:58:16','2023-06-07 06:58:16'),(42,96,123,'2023-06-07',NULL,'2023-06-07 07:00:40','2023-06-07 07:00:40'),(43,96,126,'2023-06-20',NULL,'2023-06-20 07:36:13','2023-06-20 07:36:13'),(44,113,135,'2023-07-10',NULL,'2023-07-10 06:37:09','2023-07-10 06:37:09'),(45,103,33,'2023-08-09',NULL,'2023-08-09 07:02:36','2023-08-09 07:02:36'),(46,103,35,'2023-08-09',NULL,'2023-08-09 07:03:29','2023-08-09 07:03:29'),(47,103,138,'2023-08-09',NULL,'2023-08-09 08:00:15','2023-08-09 08:00:15'),(48,96,125,'2023-08-28',NULL,'2023-09-05 07:46:16','2023-09-05 07:46:16'),(49,75,37,'2023-08-28',NULL,'2023-09-05 07:47:43','2023-09-05 07:47:43'),(50,51,45,'2023-09-12',NULL,'2023-09-12 04:44:53','2023-09-12 04:44:53'),(51,96,142,'2023-09-18',NULL,'2023-09-19 05:00:54','2023-09-19 05:00:54'),(52,97,127,'2023-09-25',NULL,'2023-09-25 07:01:58','2023-09-25 07:01:58');
/*!40000 ALTER TABLE `i_mantenimientoimpresoras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `i_modeloimpresoras`
--

DROP TABLE IF EXISTS `i_modeloimpresoras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `i_modeloimpresoras` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Marca` varchar(50) DEFAULT NULL,
  `Modelo` varchar(50) DEFAULT NULL,
  `Observaciones` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `i_modeloimpresoras`
--

LOCK TABLES `i_modeloimpresoras` WRITE;
/*!40000 ALTER TABLE `i_modeloimpresoras` DISABLE KEYS */;
INSERT INTO `i_modeloimpresoras` VALUES (30,'HP','LaserJet 1015','Láser (1P) Q2462A',NULL,NULL),(34,'HP','LaserJet 1320','Láser Monocromo',NULL,NULL),(45,'HP','LaserJet 1018','Laserjet A4',NULL,NULL),(47,'HP','LaserJet 1022','Láser',NULL,NULL),(50,'HP','LaserJet P1005','Láser CB140A',NULL,NULL),(53,'HP','LaserJet Pro P1102','Láser',NULL,NULL),(54,'HP','DesignJet 500','Plotter A1 Inyección',NULL,NULL),(55,'HP','DesignJet T520','Plotter A0',NULL,NULL),(56,'HP','LaserJet Pro M102a','Láser Mono',NULL,NULL),(57,'HP','LaserJet Pro M203dn','Láser Mono red',NULL,NULL),(60,'HP','LaserJet M110we','Láser A4','2022-11-17 08:16:30',NULL),(70,'Brother','QL-600B','Impresora de etiquetas','2023-01-09 10:09:44','2023-01-09 10:09:44');
/*!40000 ALTER TABLE `i_modeloimpresoras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `i_pedidos`
--

DROP TABLE IF EXISTS `i_pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `i_pedidos` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `IdProveedor` int NOT NULL,
  `Fecha` date NOT NULL,
  `Importe` decimal(10,2) NOT NULL DEFAULT '0.00',
  `Finalizado` tinyint(1) NOT NULL DEFAULT '0',
  `Documento` blob NOT NULL,
  `DocumentoSinValorar` blob NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `IdProveedor` (`IdProveedor`),
  CONSTRAINT `FK_I-pedidos_I-proveedores` FOREIGN KEY (`IdProveedor`) REFERENCES `i_proveedores` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `i_pedidos`
--

LOCK TABLES `i_pedidos` WRITE;
/*!40000 ALTER TABLE `i_pedidos` DISABLE KEYS */;
INSERT INTO `i_pedidos` VALUES (111,2,'2023-02-02',438.94,1,_binary '/inventario/public/documentos/02-02-2023 11:47:56pedidos.pdf',_binary '/inventario/public/documentos/02-02-2023 11:47:56pedidossinvalorar.pdf','2023-02-02 10:47:56','2023-02-02 10:47:56'),(112,2,'2023-04-04',129.14,1,_binary '/inventario/public/documentos/04-04-2023 07:03:43pedidos.pdf',_binary '/inventario/public/documentos/04-04-2023 07:03:43pedidossinvalorar.pdf','2023-04-04 05:03:43','2023-04-04 05:03:43'),(113,2,'2023-07-05',293.45,1,_binary '/inventario/public/documentos/05-07-2023 11.05.16pedidos.pdf',_binary '/inventario/public/documentos/05-07-2023 11.05.16pedidossinvalorar.pdf','2023-07-05 09:05:16','2023-07-05 09:05:16'),(114,2,'2023-09-05',305.59,1,_binary '/inventario/public/documentos/05-09-2023 10.00.27pedidos.pdf',_binary '/inventario/public/documentos/05-09-2023 10.00.27pedidossinvalorar.pdf','2023-09-05 08:00:27','2023-09-05 08:00:27'),(115,2,'2023-09-05',283.45,1,_binary '/inventario/public/documentos/15-09-2023 11.46.56pedidos.pdf',_binary '/inventario/public/documentos/15-09-2023 11.46.56pedidossinvalorar.pdf','2023-09-15 09:46:56','2023-09-15 09:46:56');
/*!40000 ALTER TABLE `i_pedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `i_proveedores`
--

DROP TABLE IF EXISTS `i_proveedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `i_proveedores` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Telefono` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Correo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Cif` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `FechaAlta` date DEFAULT NULL COMMENT 'Solo para contratos',
  `FechaBaja` date DEFAULT NULL COMMENT 'Solo para contratos',
  `Contrato` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Observaciones` varchar(400) DEFAULT NULL,
  `Descuento` decimal(4,2) DEFAULT '0.00',
  `Iva` decimal(4,2) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `i_proveedores`
--

LOCK TABLES `i_proveedores` WRITE;
/*!40000 ALTER TABLE `i_proveedores` DISABLE KEYS */;
INSERT INTO `i_proveedores` VALUES (1,'Lucas Rojas SL','957684337','mobiliario@lucasrojas.com','B-14930903','2022-11-01','2022-12-31',NULL,NULL,12.00,21.00,NULL,NULL),(2,'Comercial de suministros para la informática, SL','915 19 38 62 / 677 921 793','csi@csiinformatica.net','B-28475002','2023-01-01',NULL,'Consumibles','5000 eu.',12.00,21.00,'2023-01-30 06:32:40','2023-01-30 06:32:40'),(4,'prueba','3455','a@gmail.com','r-34','2022-11-13','2022-11-14',NULL,NULL,11.00,21.00,'2022-11-15 10:33:08','2022-11-15 10:33:08'),(5,'Ontinet','962913348','ventas@protegerse.com',NULL,'2013-01-01',NULL,NULL,'Proveedor de ESET',0.00,21.00,'2022-11-23 10:55:56','2022-11-23 10:55:56'),(6,'Cad&Lan','Silvia Perez 615 35 58 91','silvia.perez@cadlan.com',NULL,'2000-01-01',NULL,NULL,NULL,0.00,21.00,'2022-11-23 11:25:02','2022-11-23 11:25:02'),(9,'GSO','Gema 685915192','gemagomez@canoncadiz.net',NULL,'2022-11-23',NULL,NULL,NULL,NULL,NULL,'2022-11-23 11:58:57','2022-11-23 11:58:57'),(10,'Al-top','933400573','al-top@al-top@com','A59524165','2017-05-19',NULL,NULL,'Proveedor programa topografía',NULL,21.00,'2022-11-24 09:59:28','2022-11-24 09:59:28'),(11,'No determinado',NULL,NULL,NULL,'2022-11-24',NULL,NULL,NULL,NULL,NULL,'2022-11-24 11:55:47','2022-11-24 11:55:47'),(12,'Grupo Solutia','Carlos Cabezudo 636405715 / 955111155','ccabezudo@gruposolutia.com',NULL,'2022-08-12',NULL,NULL,'Proveedor Veeam Backup',NULL,NULL,'2022-11-29 07:06:09','2022-11-29 07:06:09'),(14,'Nitro',NULL,NULL,NULL,'2023-03-11',NULL,NULL,'Comprado en la pagina web de Nitro https://store.gonitro.com',NULL,NULL,'2023-05-19 04:57:41','2023-05-19 04:57:41'),(15,'WonderShare',NULL,NULL,NULL,'2023-05-19',NULL,NULL,'Tienda online',NULL,NULL,'2023-05-19 08:59:36','2023-05-19 08:59:36'),(16,'Ayuntamiento',NULL,NULL,NULL,'2023-05-24',NULL,NULL,NULL,NULL,NULL,'2023-05-24 10:08:06','2023-05-24 10:08:06'),(17,'Sainte','956385373','sainte@sainte.com.es','B11492246','2005-01-01',NULL,NULL,NULL,NULL,NULL,'2023-06-27 08:32:24','2023-06-27 08:32:24'),(18,'Graitec (2acad)','902 570 325','renovaciones@graitec.com',NULL,'2020-01-01',NULL,NULL,'La delegación de Sevilla es 2acad',NULL,NULL,'2023-08-11 04:56:20','2023-08-11 04:56:20');
/*!40000 ALTER TABLE `i_proveedores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `i_recepcionpedidos`
--

DROP TABLE IF EXISTS `i_recepcionpedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `i_recepcionpedidos` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `IdPedido` int NOT NULL,
  `Albaran` blob,
  `Fecha` date NOT NULL,
  `Observaciones` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `IdPedido` (`IdPedido`),
  CONSTRAINT `FK_i_recepcionpedidos_i_pedidos` FOREIGN KEY (`IdPedido`) REFERENCES `i_pedidos` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `i_recepcionpedidos`
--

LOCK TABLES `i_recepcionpedidos` WRITE;
/*!40000 ALTER TABLE `i_recepcionpedidos` DISABLE KEYS */;
INSERT INTO `i_recepcionpedidos` VALUES (69,111,_binary '/inventario/public/documentos/07-02-2023 12:39:52albaran.pdf','2023-02-07',NULL,'2023-02-07 11:39:52','2023-02-07 11:39:52'),(71,112,_binary '/inventario/public/documentos/11-04-2023 06:19:04albaran.pdf','2023-04-11',NULL,'2023-04-11 04:19:04','2023-04-11 04:19:04'),(73,113,_binary '/inventario/public/documentos/10-07-2023 06.25.58albaran.pdf','2023-07-10','Falta la tinta amarilla y envían el toner 36A por error','2023-07-10 04:25:58','2023-07-10 04:25:58'),(74,114,_binary '/inventario/public/documentos/11-09-2023 10.57.23albaran.pdf','2023-09-11','Falta el cabezal cyan. El ultimo cartucho lo pedí por correo, no está en el pedido original.','2023-09-11 08:57:23','2023-09-11 08:57:23'),(76,114,_binary '/inventario/public/documentos/15-09-2023 11.33.01albaran.pdf','2023-09-15','Cabezal Cyan faltante compatible. Ya no hay originales.','2023-09-15 09:33:01','2023-09-15 09:33:01'),(77,115,_binary '/inventario/public/documentos/15-09-2023albaran.pdf','2023-09-15',NULL,'2023-09-15 09:47:38','2023-09-15 09:47:38');
/*!40000 ALTER TABLE `i_recepcionpedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `i_relacionconsumibles`
--

DROP TABLE IF EXISTS `i_relacionconsumibles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `i_relacionconsumibles` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `IdModelo` int NOT NULL,
  `IdConsumible` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK__modeloimpresoras` (`IdModelo`),
  KEY `FK__consumibles` (`IdConsumible`),
  CONSTRAINT `FK__consumibles` FOREIGN KEY (`IdConsumible`) REFERENCES `i_consumibles` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK__modeloimpresoras` FOREIGN KEY (`IdModelo`) REFERENCES `i_modeloimpresoras` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=147 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `i_relacionconsumibles`
--

LOCK TABLES `i_relacionconsumibles` WRITE;
/*!40000 ALTER TABLE `i_relacionconsumibles` DISABLE KEYS */;
INSERT INTO `i_relacionconsumibles` VALUES (51,30,37,NULL,NULL),(60,34,45,NULL,NULL),(94,45,37,NULL,NULL),(97,47,37,NULL,NULL),(105,50,113,NULL,NULL),(114,53,122,NULL,NULL),(115,54,33,NULL,NULL),(116,54,34,NULL,NULL),(117,54,35,NULL,NULL),(118,54,36,NULL,NULL),(119,55,123,NULL,NULL),(120,55,124,NULL,NULL),(121,55,125,NULL,NULL),(122,55,126,NULL,NULL),(123,56,127,NULL,NULL),(124,57,128,NULL,NULL),(133,56,133,NULL,NULL),(134,57,134,NULL,NULL),(135,60,135,NULL,NULL),(141,70,137,'2023-01-09 10:17:16','2023-01-09 10:17:16'),(142,54,138,NULL,NULL),(143,54,139,NULL,NULL),(144,54,140,NULL,NULL),(145,54,141,NULL,NULL),(146,55,142,NULL,NULL);
/*!40000 ALTER TABLE `i_relacionconsumibles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lineas`
--

DROP TABLE IF EXISTS `lineas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lineas` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Numero` varchar(255) NOT NULL,
  `Extension` varchar(255) DEFAULT NULL,
  `Pin` varchar(10) DEFAULT NULL,
  `Puk1` varchar(255) DEFAULT NULL,
  `Puk2` varchar(255) DEFAULT NULL,
  `NumTarjeta` varchar(255) DEFAULT NULL,
  `FechaAlta` date NOT NULL,
  `FechaBaja` date DEFAULT NULL,
  `NInventario` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'L-000000' COMMENT 'L-000000',
  `Observaciones` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lineas`
--

LOCK TABLES `lineas` WRITE;
/*!40000 ALTER TABLE `lineas` DISABLE KEYS */;
INSERT INTO `lineas` VALUES (1,'618321055','6049','7060','428625581','48817798','8934071700054418182','2006-12-01',NULL,'L-000001','CORP19 - Perfil 7 - 2 (con datos) - Limite consumo 90',NULL,NULL),(2,'628263314','6932','8889','23605957','83821498','214072430302741','2005-03-31',NULL,'L-000002','Sin datos - Perfil corporativo 3-2 Limite consumo 0',NULL,NULL),(3,'628360600','6643','7907','79446448',NULL,'71700054418141','2022-03-07',NULL,'L-000003','Del ayuntamiento',NULL,NULL),(4,'690249714','6911','1714','10205621',NULL,'072700055424410','2021-05-24',NULL,'L-000004','Del ayuntamiento',NULL,NULL),(5,'689184925','6090','3333','29543400','41685036','8934075700046437668','2011-04-29',NULL,'L-000005','CORP19 - Perfil 7 - (2 con datos) - Limite consumo 90',NULL,NULL),(7,'679984652','6923','1710','7149594','18665651','8934072600003898006','2004-08-09',NULL,'L-000007','Sin datos - Perfil corporativo 3-2 Limite consumo 0',NULL,NULL),(8,'669400735','6677','2669','11318489','13012279','8934076700019908678','2000-10-27',NULL,'L-000008','22/03/2023 CORP 12G-LIMITE CONSUMO 150€ ANTES-- CORP19 - Perfil 7 - (2 con datos) - Limite consumo 90',NULL,NULL),(9,'699962773','6633','9153','95698792','46091145','8934075700046437791','2000-10-16',NULL,'L-000009','CORP19 - Perfil 7 - (2 con datos) - Limite consumo 90',NULL,NULL),(10,'686982376','6034','0531','48712948',NULL,'8934075700046437742','2005-11-30',NULL,'L-000010','Sin datos - Perfil corporativo 3-2 Limite consumo 0. La tarjeta se sustituye por esta el 24/01/2023 por deterioro de la anterior.',NULL,NULL),(12,'628263356','6931',NULL,'88266211','17393423','8934076700051284368','2005-03-31',NULL,'L-000012','Sin datos - Perfil corporativo 3-2 Limite consumo 0',NULL,NULL),(13,'686982750','6036','6635','15777350','16594919','8934072100120902310','2005-11-30',NULL,'L-000013','Sin datos - Perfil corporativo 3-2 Limite consumo 0 (dar de baja)',NULL,NULL),(15,'616282830','6924',NULL,'26405053','37999199','8934075700046437734','2004-08-09',NULL,'L-000015','CORP19 - Perfil 7 - 2 (con datos) - Limite consumo 90',NULL,NULL),(16,'699962772','6622','3333','59806451','79957894','8934075700046437809','2000-10-16',NULL,'L-000016','CORP12GB - Perfil 7 - (2 con datos) - Limite consumo 150',NULL,NULL),(18,'650967657','6008','3870','88769830','83616706','8934071700054418133','2022-03-23','2022-12-15','L-000018','Sustitucion1',NULL,NULL),(19,'650807096','6011','1712','42844746','77906326','8934071700054418174','2022-03-23',NULL,'L-000019','Sustitucion2',NULL,NULL),(20,'639251886','6032','8692','75871675','90573373','8934072700054352505','2022-03-23',NULL,'L-000020','Sustitucion3',NULL,NULL),(21,'660453619','6037','0242','83893276','77458195','8934072700054352612','2022-03-23',NULL,'L-000021','Sustitucion4',NULL,NULL),(39,'676550060','6101',NULL,'10275458','86819710','8934075700046437767','2006-09-01',NULL,'L-000022','CORP19 - Perfil 7 - (2 con datos) - Limite consumo 90','2022-12-02 07:04:23','2022-12-02 07:04:23'),(41,'628262864','6930','5422','52689113','62746985','8934075700046437759','2005-03-31',NULL,'L-000023','CORP19 - Perfil 5 - 1 (sin restricciones) - Limite consumo 90','2022-12-02 08:37:51','2022-12-02 08:37:51'),(42,'606614891','6777','2147','29645827',NULL,'71700054418190','2016-05-03',NULL,'L-000024','Del ayuntamiento','2022-12-02 09:02:02','2022-12-02 09:02:02'),(43,'699394962','6311','3799','94901095','4333710','8934074193001610795','2000-10-27',NULL,'L-000025','Sin datos - Perfil corporativo 3-2 Limite consumo 60 (Javier Ruiz)','2022-12-02 09:11:24','2022-12-02 09:11:24'),(44,'689373224','6133','1909','88955906',NULL,'076700104856080','2023-04-17',NULL,'L-000026','Para la central de alarma del castillito. Alta gestionada por el Ayuntamiento','2023-04-18 07:19:33','2023-04-18 07:19:33');
/*!40000 ALTER TABLE `lineas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mantenimientoequipos`
--

DROP TABLE IF EXISTS `mantenimientoequipos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mantenimientoequipos` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `IdEquipo` int DEFAULT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Caracteristicas` varchar(50) DEFAULT NULL,
  `Fabricante` varchar(50) DEFAULT NULL,
  `NumSerie` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `FechaAlta` date DEFAULT NULL,
  `FechaBaja` date DEFAULT NULL,
  `Observaciones` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_mantenimientoequipos_equipos` (`IdEquipo`),
  CONSTRAINT `FK_mantenimientoequipos_equipos` FOREIGN KEY (`IdEquipo`) REFERENCES `equipos` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=189 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mantenimientoequipos`
--

LOCK TABLES `mantenimientoequipos` WRITE;
/*!40000 ALTER TABLE `mantenimientoequipos` DISABLE KEYS */;
INSERT INTO `mantenimientoequipos` VALUES (1,32,'Intel(R) Core(TM) i5-7500T CPU @ 2.70GHz','7ª Generación','Intel',NULL,'2017-04-10',NULL,NULL,NULL,NULL),(2,23,'Intel(R) Core(TM) i3-9100T CPU @ 3.10GHz','9ª Generación','Intel',NULL,'2019-11-26',NULL,NULL,NULL,NULL),(3,51,'Intel(R) Core(TM) i5-9400T CPU @ 1.80GHz','9ª Generación','Intel',NULL,'2021-03-04',NULL,NULL,NULL,NULL),(4,1,'Intel(R) Core(TM) i5-9400T CPU @ 1.80GHz','9ª Generación','Intel',NULL,'2021-03-04',NULL,NULL,NULL,NULL),(5,24,'Intel(R) Core(TM) i5-8500T CPU @ 2.10GHz','8ª Generación','Intel',NULL,'2019-04-12',NULL,NULL,NULL,NULL),(6,25,'Intel(R) Core(TM) i5-7500T CPU @ 2.70GHz','7ª Generación','Intel',NULL,'2017-04-10',NULL,NULL,NULL,NULL),(7,8,'Intel(R) Core(TM) i5-7500T CPU @ 2.70GHz','7ª Generación','Intel',NULL,'2017-04-10',NULL,NULL,NULL,NULL),(8,37,'Intel(R) Core(TM) i5-7500T CPU @ 2.70GHz','7ª Generación','Intel',NULL,'2017-04-10',NULL,NULL,NULL,NULL),(9,52,'Intel(R) Pentium(R) 4 CPU 3.00GHz',NULL,'Intel',NULL,'2022-01-01',NULL,NULL,NULL,NULL),(10,52,'Intel(R) Pentium(R) 4 CPU 3.00GHz',NULL,'Intel',NULL,'2022-01-01',NULL,NULL,NULL,NULL),(11,16,'Intel(R) Core(TM) i3-9100T CPU @ 3.10GHz','9ª Generación','Intel',NULL,'2019-11-26',NULL,NULL,NULL,NULL),(12,48,'Intel(R) Core(TM) i3-9100T CPU @ 3.10GHz','9ª Generación','Intel',NULL,'2019-11-26',NULL,NULL,NULL,NULL),(13,43,'Intel(R) Core(TM) i5-7500T CPU @ 2.70GHz','7ª Generación','Intel',NULL,'2017-04-10',NULL,NULL,NULL,NULL),(14,46,'Intel(R) Core(TM) i3-9100T CPU @ 3.10GHz','9ª Generación','Intel',NULL,'2019-11-26',NULL,NULL,NULL,NULL),(15,12,'Intel(R) Core(TM) i3-9100T CPU @ 3.10GHz','9ª Generación','Intel',NULL,'2019-11-26',NULL,NULL,NULL,NULL),(16,19,'Intel(R) Core(TM) i3-9100T CPU @ 3.10GHz','9ª Generación','Intel',NULL,'2019-11-26',NULL,NULL,NULL,NULL),(17,36,'Intel(R) Core(TM) i3-9100T CPU @ 3.10GHz','9ª Generación','Intel',NULL,'2019-11-26',NULL,NULL,NULL,NULL),(18,20,'Intel(R) Core(TM) i5-7500T CPU @ 2.70GHz','7ª Generación','Intel',NULL,'2017-04-10',NULL,NULL,NULL,NULL),(19,10,'Intel(R) Core(TM) i5-9400T CPU @ 1.80GHz','9ª Generación','Intel',NULL,'2021-03-04',NULL,NULL,NULL,NULL),(20,26,'Intel(R) Core(TM) i3-9100T CPU @ 3.10GHz','9ª Generación','Intel',NULL,'2019-11-26',NULL,NULL,NULL,NULL),(21,17,'Intel(R) Core(TM) i3-9100T CPU @ 3.10GHz','9ª Generación','Intel',NULL,'2019-11-26',NULL,NULL,NULL,NULL),(22,2,'Intel(R) Core(TM) i3-9100T CPU @ 3.10GHz','9ª Generación','Intel',NULL,'2019-11-26',NULL,NULL,NULL,NULL),(23,28,'Intel(R) Core(TM) i3-9100T CPU @ 3.10GHz','9ª Generación','Intel',NULL,'2019-11-26',NULL,NULL,NULL,NULL),(24,31,'Intel(R) Core(TM) i5-7500T CPU @ 2.70GHz','7ª Generación','Intel',NULL,'2017-04-10',NULL,NULL,NULL,NULL),(25,14,'Intel(R) Core(TM) i5-8500T CPU @ 2.10GHz','8ª Generación','Intel',NULL,'2019-04-12',NULL,NULL,NULL,NULL),(26,33,'Intel(R) Core(TM) i3-9100T CPU @ 3.10GHz','9ª Generacion','Intel',NULL,'2019-11-26',NULL,NULL,NULL,NULL),(27,7,'Intel(R) Core(TM) i3-9100T CPU @ 3.10GHz','9ª Generacion','Intel',NULL,'2019-11-26',NULL,NULL,NULL,NULL),(28,13,'Intel(R) Core(TM) i5-7500T CPU @ 2.70GHz','7ª Generacion','Intel',NULL,'2017-04-10',NULL,NULL,NULL,NULL),(29,11,'Intel(R) Core(TM) i5-7500T CPU @ 2.70GHz','7ª Generacion','Intel',NULL,'2017-04-10',NULL,NULL,NULL,NULL),(30,40,'Intel(R) Core(TM) i3-9100T CPU @ 3.10GHz','9ª Generacion','Intel',NULL,'2019-11-26',NULL,NULL,NULL,NULL),(31,50,'Intel(R) Core(TM) i7-1065G7 CPU @ 1.30GHz','10ª Generacion','Intel',NULL,'2020-11-11',NULL,NULL,NULL,NULL),(32,44,'Core(TM) i5-7500T CPU @ 2.70GHz','7ª Generacion','Intel',NULL,'2017-04-10',NULL,NULL,NULL,NULL),(33,41,'Intel(R) Core(TM) i3-9100T CPU @ 3.10GHz','9ª Generacion','Intel',NULL,'2019-11-26',NULL,NULL,NULL,NULL),(34,42,'Intel(R) Core(TM) i5-7500T CPU @ 2.70GHz','7ª Generacion','Intel',NULL,'2017-04-10',NULL,NULL,NULL,NULL),(35,30,'Intel(R) Core(TM) i5-7500T CPU @ 2.70GHz','7ª Generacion','Intel',NULL,'2017-04-10',NULL,NULL,NULL,NULL),(36,38,'Intel(R) Core(TM) i5-7260U CPU @ 2.20GHz','7ª Generacion','Intel',NULL,'2022-01-01',NULL,NULL,NULL,NULL),(37,6,'Intel(R) Core(TM) i5-7500T CPU @ 2.70GHz','7ª Generacion','Intel',NULL,'2017-04-10',NULL,NULL,NULL,NULL),(38,9,'Intel(R) Core(TM) i3-9100T CPU @ 3.10GHz','9ª Generacion','Intel',NULL,'2019-11-26',NULL,NULL,NULL,NULL),(39,47,'Intel(R) Core(TM) i3-9100T CPU @ 3.10GHz','9ª Generacion','Intel',NULL,'2019-11-26',NULL,NULL,NULL,NULL),(40,35,'Intel(R) Core(TM) i3-5005U CPU @ 2.00GHz','5ª Generacion','Intel',NULL,'2022-01-01',NULL,NULL,NULL,NULL),(41,4,'Intel(R) Core(TM) i3-9100T CPU @ 3.10GHz','9ª Generacion','Intel',NULL,'2019-11-26',NULL,NULL,NULL,NULL),(42,29,'Intel(R) Core(TM) i5-7260U CPU @ 2.20GHz','7ª Generacion','Intel',NULL,'2022-01-01',NULL,NULL,NULL,NULL),(43,22,'Intel(R) Core(TM) i5-5200U CPU @ 2.20GHz','5ª Generacion','Intel',NULL,'2022-01-01',NULL,NULL,NULL,NULL),(44,21,'Intel(R) Core(TM) i3-9100T CPU @ 3.10GHz','9ª Generacion','Intel',NULL,'2019-11-26',NULL,NULL,NULL,NULL),(45,15,'Intel(R) Core(TM) i5-7500T CPU @ 2.70GHz','7ª Generacion','Intel',NULL,'2017-04-10',NULL,NULL,NULL,NULL),(46,27,'Intel(R) Core(TM) i5-8500T CPU @ 2.10GHz','8ª Generacion','Intel',NULL,'2019-04-12',NULL,NULL,NULL,NULL),(47,5,'Intel(R) Core(TM) i3-9100T CPU @ 3.10GHz','9ª Generacion','Intel',NULL,'2019-11-26',NULL,NULL,NULL,NULL),(48,45,'Intel(R) Core(TM) i5-7500T CPU @ 2.70GHz','7ª Generacion','Intel',NULL,'2017-04-10',NULL,NULL,NULL,NULL),(49,34,'Intel(R) Core(TM) i3-9100T CPU @ 3.10GHz','9ª Generacion','Intel',NULL,'2019-11-26',NULL,NULL,NULL,NULL),(50,53,'Intel(R) Xeon(R) E-2126G CPU @ 3.30GHz','Procesador','Intel',NULL,'2020-08-31',NULL,NULL,NULL,NULL),(51,39,'Intel(R) Core(TM) i5-7500T CPU @ 2.70GHz','7ª Generacion','Intel',NULL,'2017-04-10',NULL,NULL,NULL,NULL),(52,49,'Intel(R) Core(TM) i5-8500T CPU @ 2.10GHz','8ª Generacion','Intel',NULL,'2019-04-12',NULL,NULL,NULL,NULL),(53,18,'Intel(R) Core(TM) i5-7500T CPU @ 2.70GHz','7ª Generacion','Intel',NULL,'2017-04-10',NULL,NULL,NULL,NULL),(54,3,'Intel(R) Core(TM) i3-9100T CPU @ 3.10GHz','9ª Generacion','Intel',NULL,'2019-11-26',NULL,NULL,NULL,NULL),(55,1,'SAMSUNG SSD 970 EVO Plus 500GB','Unidad de disco físico','Samsung',NULL,'2021-03-04',NULL,NULL,NULL,NULL),(56,13,'Apacer AS350 512GB','Unidad de disco físico',NULL,NULL,'2017-04-10',NULL,NULL,NULL,NULL),(57,26,'KBG30ZMV256G TOSHIBA','256GB Unidad de disco físico','ToShiba',NULL,'2019-11-26',NULL,NULL,NULL,NULL),(58,53,'HL-DT-ST DVDRAM GUD0N SCSI CdRom Device','Unidad de CD-ROM',NULL,NULL,'2020-08-31',NULL,NULL,NULL,NULL),(59,53,'LSI MegaSR SCSI Disk Device','2 x 480GB Unidad de disco físico en RAID 1','MICRON','201227292211 Y 201227292207','2020-08-31',NULL,'Son dos discos montados en Espejo',NULL,NULL),(60,52,'Unidad de disquete','Unidad de disquete',NULL,NULL,'2022-01-01',NULL,NULL,NULL,NULL),(61,52,'SONY DVD-ROM DDU1615','Unidad de CD-ROM','Sony',NULL,'2022-01-01',NULL,NULL,NULL,NULL),(62,52,'ST3160023AS','SSD 160 GB',NULL,NULL,'2022-01-01',NULL,NULL,NULL,NULL),(63,52,'Hitachi HDS721050CLA362','SSD 500 GB',NULL,NULL,'2022-01-01',NULL,NULL,NULL,NULL),(64,27,'SAMSUNG MZVLB256HBHQ-000L7','256GB Unidad de disco físico','Samsung',NULL,'2019-04-12',NULL,NULL,NULL,NULL),(65,40,'KBG30ZMV256G TOSHIBA','256GB Unidad de disco físico','Toshiba',NULL,'2019-11-26',NULL,NULL,NULL,NULL),(66,2,'KBG30ZMV256G TOSHIBA','256GB Unidad de disco físico','Toshiba',NULL,'2019-11-26',NULL,NULL,NULL,NULL),(67,14,'KINGSTON SA2000M8250G','256GB Unidad de disco físico','KINGSTON',NULL,'2019-04-12',NULL,NULL,NULL,NULL),(68,28,'MTFDHBA256TCK-1AS1AABHA','256GB Unidad de disco físico','Micron',NULL,'2019-11-26',NULL,NULL,NULL,NULL),(69,41,'KBG30ZMV256G TOSHIBA','256GB Unidad de disco físico','Toshiba',NULL,'2019-11-26',NULL,NULL,NULL,NULL),(70,3,'KBG30ZMV256G TOSHIBA','256GB Unidad de disco físico','Toshiba',NULL,'2019-11-26',NULL,NULL,NULL,NULL),(71,15,'CT250P2SSD8','256GB Unidad de disco físico','Crucial',NULL,'2017-04-10',NULL,NULL,NULL,NULL),(72,29,'CT250P2SSD8','256GB Unidad de disco físico','Crucial',NULL,'2022-01-01',NULL,NULL,NULL,NULL),(73,42,'CT250P2SSD8','256GB Unidad de disco físico','Crucial',NULL,'2017-04-10',NULL,NULL,NULL,NULL),(74,4,'KBG30ZMV256G TOSHIBA','256GB Unidad de disco físico','Toshiba',NULL,'2019-11-26',NULL,NULL,NULL,NULL),(75,16,'KBG30ZMV256G TOSHIBA','256GB Unidad de disco físico','Toshiba',NULL,'2019-11-26',NULL,NULL,NULL,NULL),(76,30,'CT250P2SSD8','256GB Unidad de disco físico','Crucial',NULL,'2017-04-10',NULL,NULL,NULL,NULL),(77,43,'CT500P2SSD8','512GB Unidad de disco físico','Crucial',NULL,'2017-04-10',NULL,NULL,NULL,NULL),(78,5,'MTFDHBA256TCK-1AS1AABHA','256GB Unidad de disco físico','Micron',NULL,'2019-11-26',NULL,NULL,NULL,NULL),(79,17,'KBG30ZMV256G TOSHIBA','256GB Unidad de disco físico','Toshiba',NULL,'2019-11-26',NULL,NULL,NULL,NULL),(80,31,'CT500P2SSD8','512GB Unidad de disco físico','Crucial',NULL,'2017-04-10',NULL,NULL,NULL,NULL),(81,44,'CT250P2SSD8','256GB Unidad de disco físico','Crucial',NULL,'2017-04-10',NULL,NULL,NULL,NULL),(82,6,'CT500P2SSD8','512GB Unidad de disco físico','Crucial',NULL,'2017-04-10',NULL,NULL,NULL,NULL),(83,18,'HL-DT-ST CD-RW GCE-8525B USB Device','Unidad de CD-ROM',NULL,NULL,'2017-04-10',NULL,NULL,NULL,NULL),(84,18,'CT250P2SSD8','256GB Unidad de disco físico','Crucial',NULL,'2017-04-10',NULL,NULL,NULL,NULL),(85,32,'CT250P2SSD8','256GB Unidad de disco físico','Crucial',NULL,'2017-04-10',NULL,NULL,NULL,NULL),(86,45,'CT500P2SSD8','512GB Unidad de disco físico','Crucial',NULL,'2017-04-10',NULL,NULL,NULL,NULL),(87,7,'MTFDHBA256TCK-1AS1AABHA','256GB Unidad de disco físico','Micron',NULL,'2019-11-26',NULL,NULL,NULL,NULL),(88,19,'KBG30ZMV256G TOSHIBA','256GB Unidad de disco físico','Toshiba',NULL,'2019-11-26',NULL,NULL,NULL,NULL),(89,33,'KBG30ZMV256G TOSHIBA','256GB Unidad de disco físico','Toshiba',NULL,'2019-11-26',NULL,NULL,NULL,NULL),(90,46,'MTFDHBA256TCK-1AS1AABHA','256GB Unidad de disco físico','Micron',NULL,'2019-11-26',NULL,NULL,NULL,NULL),(91,8,'CT250P2SSD8','256GB Unidad de disco físico','Crucial',NULL,'2017-04-10',NULL,NULL,NULL,NULL),(92,8,'WD My Passport 259F USB Device','1TB Unidad de disco físico',NULL,NULL,'2017-04-10',NULL,NULL,NULL,NULL),(93,20,'CT500P2SSD8','512GB Unidad de disco físico','Crucial',NULL,'2017-04-10',NULL,NULL,NULL,NULL),(94,34,'KBG30ZMV256G TOSHIBA','256GB Unidad de disco físico','Toshiba',NULL,'2019-11-26',NULL,NULL,NULL,NULL),(95,47,'KBG30ZMV256G TOSHIBA','256GB Unidad de disco físico','Toshiba',NULL,'2019-11-26',NULL,NULL,NULL,NULL),(96,9,'KBG30ZMV256G TOSHIBA','256GB Unidad de disco físico','Toshiba',NULL,'2019-11-26',NULL,NULL,NULL,NULL),(97,21,'MTFDHBA256TCK-1AS1AABHA','256GB Unidad de disco físico','Micron',NULL,'2019-11-26',NULL,NULL,NULL,NULL),(98,35,'DVD RW USB Device','Unidad de CD-ROM',NULL,NULL,'2022-01-01',NULL,NULL,NULL,NULL),(99,35,'KINGSTON SMS200S3120G','120GB Unidad de disco físico','KINGSTON',NULL,'2022-01-01',NULL,NULL,NULL,NULL),(100,48,'KBG30ZMV256G TOSHIBA','256GB Unidad de disco físico','Toshiba',NULL,'2019-11-26',NULL,NULL,NULL,NULL),(101,10,'SAMSUNG MZVLB256HBHQ-000L7','256GB Unidad de disco físico','Samsung',NULL,'2021-03-04',NULL,NULL,NULL,NULL),(102,22,'KINGSTON SMS200S3120G','120GB Unidad de disco físico','KINGSTON',NULL,'2022-01-01',NULL,NULL,NULL,NULL),(103,36,'MTFDHBA256TCK-1AS1AABHA','256GB Unidad de disco físico','Micron',NULL,'2019-11-26',NULL,NULL,NULL,NULL),(104,49,'CT500P2SSD8','512GB Unidad de disco físico','Crucial',NULL,'2019-04-12',NULL,NULL,NULL,NULL),(105,11,'WDC  WDS500G2B0A-00SM50','512GB Unidad de disco físico',NULL,NULL,'2017-04-10',NULL,NULL,NULL,NULL),(106,50,'HD SAMSUNG MZVLQ512HALU-000H1','512GB Unidad de disco físico','Samsung',NULL,'2020-11-11',NULL,NULL,NULL,NULL),(107,23,'KBG30ZMV256G TOSHIBA','256GB Unidad de disco físico','Toshiba',NULL,'2019-11-26',NULL,NULL,NULL,NULL),(108,37,'MTFDHBA256TCK-1AS1AABHA','256GB Unidad de disco físico','Micron',NULL,'2017-04-10',NULL,NULL,NULL,NULL),(109,24,'SAMSUNG MZVLB256HBHQ-000L7','256GB Unidad de disco físico','Samsung',NULL,'2019-04-12',NULL,NULL,NULL,NULL),(110,38,'WDC  WDS250G2B0B-00YS70','256GB Unidad de disco físico',NULL,NULL,'2022-01-01',NULL,NULL,NULL,NULL),(111,51,'CT250P2SSD8','256GB Unidad de disco físico','Crucial',NULL,'2021-03-04',NULL,NULL,NULL,NULL),(112,12,'KBG30ZMV256G TOSHIBA','256GB Unidad de disco físico','Toshiba',NULL,'2019-11-26',NULL,NULL,NULL,NULL),(113,25,'HGST HTS725050A7E630','512GB Unidad de disco físico',NULL,NULL,'2017-04-10',NULL,NULL,NULL,NULL),(114,25,'CT250P2SSD8','256GB Unidad de disco físico','Crucial',NULL,'2017-04-10',NULL,NULL,NULL,NULL),(115,39,'CT500P2SSD8','512GB Unidad de disco físico','Crucial',NULL,'2017-04-10',NULL,NULL,NULL,NULL),(118,65,'Core(TM) I7-1260P CPU @2.10GHz','12ª Generación','Intel',NULL,'2022-11-25',NULL,NULL,'2022-11-30 07:18:54','2022-11-30 07:18:54'),(119,65,'RAM','16Gb',NULL,NULL,'2022-11-25',NULL,NULL,'2022-11-30 07:20:36','2022-11-30 07:20:36'),(120,65,'HD SSD MZVL2512HCJQ-00B00','512Gb','Samsung',NULL,'2022-11-25',NULL,NULL,'2022-11-30 07:22:40','2022-11-30 07:22:40'),(121,1,'RAM','16 GB',NULL,NULL,'2021-03-04',NULL,NULL,NULL,NULL),(122,2,'RAM','8 GB',NULL,NULL,'2019-11-26',NULL,NULL,NULL,NULL),(123,3,'RAM','8 GB',NULL,NULL,'2019-11-26',NULL,NULL,NULL,NULL),(124,4,'RAM','8 GB',NULL,NULL,'2019-11-26',NULL,NULL,NULL,NULL),(125,5,'RAM','8 GB',NULL,NULL,'2019-11-26',NULL,NULL,NULL,NULL),(126,6,'RAM','8 GB',NULL,NULL,'2017-04-10',NULL,NULL,NULL,NULL),(127,7,'RAM','8 GB',NULL,NULL,'2019-11-26',NULL,NULL,NULL,NULL),(128,8,'RAM','8 GB',NULL,NULL,'2017-04-10',NULL,NULL,NULL,NULL),(129,9,'RAM','8 GB',NULL,NULL,'2019-11-26',NULL,NULL,NULL,NULL),(130,10,'RAM','8 GB',NULL,NULL,'2021-03-04',NULL,NULL,NULL,NULL),(131,11,'RAM','8 GB',NULL,NULL,'2017-04-10',NULL,NULL,NULL,NULL),(132,12,'RAM','8 GB',NULL,NULL,'2019-11-26',NULL,NULL,NULL,NULL),(133,13,'RAM','8 GB',NULL,NULL,'2017-04-10',NULL,NULL,NULL,NULL),(134,14,'RAM','8 GB',NULL,NULL,'2019-04-12',NULL,NULL,NULL,NULL),(135,15,'RAM','8 GB',NULL,NULL,'2017-04-10',NULL,NULL,NULL,NULL),(137,16,'RAM','8 GB',NULL,NULL,'2019-11-26',NULL,NULL,NULL,NULL),(138,17,'RAM','8 GB',NULL,NULL,'2019-11-26',NULL,NULL,NULL,NULL),(139,18,'RAM','8 GB',NULL,NULL,'2017-04-10',NULL,NULL,NULL,NULL),(140,19,'RAM','8 GB',NULL,NULL,'2019-11-26',NULL,NULL,NULL,NULL),(141,20,'RAM','8 GB',NULL,NULL,'2017-04-10',NULL,NULL,NULL,NULL),(142,21,'RAM','8 GB',NULL,NULL,'2019-11-26',NULL,NULL,NULL,NULL),(143,22,'RAM','8 GB',NULL,NULL,'2022-01-01',NULL,NULL,NULL,NULL),(144,23,'RAM','8 GB',NULL,NULL,'2019-11-26',NULL,NULL,NULL,NULL),(145,24,'RAM','8 GB',NULL,NULL,'2019-04-12',NULL,NULL,NULL,NULL),(146,25,'RAM','8 GB',NULL,NULL,'2017-04-10',NULL,NULL,NULL,NULL),(147,26,'RAM','8 GB',NULL,NULL,'2019-11-26',NULL,NULL,NULL,NULL),(148,27,'RAM','8 GB',NULL,NULL,'2019-04-12',NULL,NULL,NULL,NULL),(149,28,'RAM','8 GB',NULL,NULL,'2019-11-26',NULL,NULL,NULL,NULL),(150,29,'RAM','8 GB',NULL,NULL,'2022-01-01',NULL,NULL,NULL,NULL),(151,30,'RAM','8 GB',NULL,NULL,'2017-04-10',NULL,NULL,NULL,NULL),(152,31,'RAM','8 GB',NULL,NULL,'2017-04-10',NULL,NULL,NULL,NULL),(153,32,'RAM','8 GB',NULL,NULL,'2017-04-10',NULL,NULL,NULL,NULL),(154,33,'RAM','8 GB',NULL,NULL,'2019-11-26',NULL,NULL,NULL,NULL),(155,34,'RAM','8 GB',NULL,NULL,'2019-11-26',NULL,NULL,NULL,NULL),(156,35,'RAM','8 GB',NULL,NULL,'2022-01-01',NULL,NULL,NULL,NULL),(157,36,'RAM','8 GB',NULL,NULL,'2019-11-26',NULL,NULL,NULL,NULL),(158,37,'RAM','8 GB',NULL,NULL,'2017-04-10',NULL,NULL,NULL,NULL),(159,51,'RAM','8 GB',NULL,NULL,'2021-03-04',NULL,NULL,NULL,NULL),(160,39,'RAM','8 GB',NULL,NULL,'2017-04-10',NULL,NULL,NULL,NULL),(161,40,'RAM','8 GB',NULL,NULL,'2019-11-26',NULL,NULL,NULL,NULL),(162,41,'RAM','8 GB',NULL,NULL,'2019-11-26',NULL,NULL,NULL,NULL),(163,42,'RAM','8 GB',NULL,NULL,'2017-04-10',NULL,NULL,NULL,NULL),(164,43,'RAM','8 GB',NULL,NULL,'2017-04-10',NULL,NULL,NULL,NULL),(165,44,'RAM','8 GB',NULL,NULL,'2017-04-10',NULL,NULL,NULL,NULL),(166,45,'RAM','8 GB',NULL,NULL,'2017-04-10',NULL,NULL,NULL,NULL),(167,46,'RAM','8 GB',NULL,NULL,'2019-11-26',NULL,NULL,NULL,NULL),(168,47,'RAM','8 GB',NULL,NULL,'2019-11-26',NULL,NULL,NULL,NULL),(169,48,'RAM','8 GB',NULL,NULL,'2019-11-26',NULL,NULL,NULL,NULL),(170,49,'RAM','8 GB',NULL,NULL,'2019-04-12',NULL,NULL,NULL,NULL),(171,50,'RAM','8 GB',NULL,NULL,'2020-11-11',NULL,NULL,NULL,NULL),(172,38,'RAM','8 GB',NULL,NULL,'2022-01-01',NULL,NULL,NULL,NULL),(173,52,'RAM','8 GB',NULL,NULL,'2022-01-01',NULL,NULL,NULL,NULL),(174,53,'RAM','32 GB',NULL,NULL,'2020-08-31',NULL,NULL,NULL,NULL),(175,76,'Intel(R) Core(TM) i3-9100T CPU @ 3.10GHz','9ª Generacion','Intel',NULL,'2019-11-26',NULL,NULL,'2023-01-11 09:01:28','2023-01-11 09:01:28'),(176,76,'KBG30ZMV256G','250GB','TOSHIBA',NULL,'2019-11-26',NULL,NULL,'2023-01-11 09:02:55','2023-01-11 09:02:55'),(177,76,'RAM','8GB',NULL,NULL,'2019-11-26',NULL,NULL,'2023-01-11 09:03:20','2023-01-11 09:03:20'),(178,53,'Disco duro','SSD 960Gb / MZ7LH960HAJR-00005','SAMSUNG','S45NNA0T130283','2023-02-16',NULL,'Comprado a Seringe. Se monta en un volumen a parte para la máquina virtual del Portal del empleado.','2023-02-20 09:05:43','2023-02-20 09:05:43'),(179,139,'Memoria','4G',NULL,NULL,'2023-03-08',NULL,NULL,'2023-03-08 09:27:22','2023-03-08 09:27:22'),(180,139,'HD','160G Mecánico','Seagate',NULL,'2023-03-08',NULL,NULL,'2023-03-08 09:27:52','2023-03-08 09:27:52'),(181,139,'Pentium Dual-Core E5400','2,70GHz, 2 cores','Intel',NULL,'2023-03-08',NULL,NULL,'2023-03-08 10:02:33','2023-03-08 10:02:33'),(182,87,'Inidencia','No le funciona el puerto HDMI',NULL,NULL,'2023-06-05',NULL,'VGA si va','2023-06-05 06:37:16','2023-06-05 06:37:16'),(183,140,'AMD A6-5200 APU','2000MHz 4 cores','AMD',NULL,'2010-01-01',NULL,NULL,'2023-06-23 04:43:52','2023-06-23 04:43:52'),(184,140,'WDC WDS100T2B0A-00SM50','1T SATA','Western digital','204210A00346','2010-01-01',NULL,NULL,'2023-06-23 04:44:42','2023-06-23 04:44:42'),(185,140,'RAM','16G (2x8G) DDR3',NULL,NULL,'2010-01-01',NULL,NULL,'2023-06-23 04:45:31','2023-06-23 04:45:31'),(186,141,'Core(TM) i5-1235U 1300 MHz','12ª Generación','Intel',NULL,'2023-07-12',NULL,NULL,'2023-07-13 06:19:36','2023-07-13 06:19:36'),(187,141,'RAM','16G (2 x 8G)',NULL,NULL,'2023-07-12',NULL,NULL,'2023-07-13 06:20:26','2023-07-13 06:20:26'),(188,141,'HD WD PC SN740 SDDPNQD-512G-1006','500G NMVe','Western digital','E823_8FA6_BF53_0001_001B_448B_4EBB_A22E','2023-07-12',NULL,NULL,'2023-07-13 06:22:06','2023-07-13 06:22:06');
/*!40000 ALTER TABLE `mantenimientoequipos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
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
-- Table structure for table `relacionequipos`
--

DROP TABLE IF EXISTS `relacionequipos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `relacionequipos` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `IdEquipo` int DEFAULT NULL,
  `IdUsuario` int DEFAULT NULL,
  `FechaAlta` date DEFAULT NULL,
  `FechaBaja` date DEFAULT NULL,
  `Observaciones` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Id`) USING BTREE,
  KEY `FK_relacionequipos_equipos` (`IdEquipo`) USING BTREE,
  KEY `FK_relacionequipos_usuarios` (`IdUsuario`) USING BTREE,
  CONSTRAINT `FK_relacionequipos_equipos` FOREIGN KEY (`IdEquipo`) REFERENCES `equipos` (`Id`),
  CONSTRAINT `FK_relacionequipos_usuarios` FOREIGN KEY (`IdUsuario`) REFERENCES `usuarios` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=432 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `relacionequipos`
--

LOCK TABLES `relacionequipos` WRITE;
/*!40000 ALTER TABLE `relacionequipos` DISABLE KEYS */;
INSERT INTO `relacionequipos` VALUES (1,1,26,'2021-03-04',NULL,NULL,NULL,NULL),(2,2,22,'2019-11-26',NULL,NULL,NULL,NULL),(3,3,6,'2019-11-26',NULL,NULL,NULL,NULL),(4,4,25,'2019-11-26',NULL,NULL,NULL,NULL),(5,5,29,'2019-11-26',NULL,NULL,NULL,NULL),(6,6,5,'2017-04-10',NULL,NULL,NULL,NULL),(7,7,9,'2019-11-26',NULL,NULL,NULL,NULL),(8,8,40,'2017-04-10',NULL,NULL,NULL,NULL),(9,9,13,'2019-11-26',NULL,NULL,NULL,NULL),(10,10,55,'2021-03-04',NULL,NULL,NULL,NULL),(11,11,7,'2017-04-10',NULL,NULL,NULL,NULL),(12,12,19,'2019-11-26',NULL,NULL,NULL,NULL),(14,14,3,'2019-04-12',NULL,NULL,NULL,NULL),(15,15,31,'2017-04-10',NULL,NULL,NULL,NULL),(16,16,36,'2019-11-26',NULL,NULL,NULL,NULL),(17,17,30,'2019-11-26',NULL,NULL,NULL,NULL),(18,18,55,'2017-04-10',NULL,NULL,NULL,NULL),(19,19,23,'2019-11-26',NULL,NULL,NULL,NULL),(20,20,21,'2017-04-10',NULL,NULL,NULL,NULL),(21,21,17,'2019-11-26',NULL,NULL,NULL,NULL),(23,23,44,'2019-11-26',NULL,NULL,NULL,NULL),(24,24,16,'2019-04-12',NULL,NULL,NULL,NULL),(25,25,4,'2017-04-10',NULL,NULL,NULL,NULL),(26,26,33,'2019-11-26',NULL,NULL,NULL,NULL),(27,27,56,'2019-04-12',NULL,NULL,NULL,NULL),(28,28,20,'2019-11-26',NULL,NULL,NULL,NULL),(29,29,28,'2022-01-01',NULL,NULL,NULL,NULL),(30,30,8,'2017-04-10',NULL,NULL,NULL,NULL),(31,31,27,'2017-04-10',NULL,NULL,NULL,NULL),(32,32,18,'2017-04-10',NULL,NULL,NULL,NULL),(33,33,12,'2019-11-26',NULL,NULL,NULL,NULL),(34,34,2,'2019-11-26',NULL,NULL,NULL,NULL),(35,35,34,'2022-01-01','2023-02-21',NULL,NULL,NULL),(36,36,11,'2019-11-26',NULL,NULL,NULL,NULL),(37,37,14,'2017-04-10',NULL,NULL,NULL,NULL),(38,38,57,'2022-01-01',NULL,NULL,NULL,NULL),(39,39,15,'2017-04-10','2023-06-22',NULL,NULL,NULL),(40,40,43,'2019-11-26',NULL,NULL,NULL,NULL),(41,41,35,'2019-11-26',NULL,NULL,NULL,NULL),(42,42,24,'2017-04-10',NULL,NULL,NULL,NULL),(43,43,39,'2017-04-10',NULL,NULL,NULL,NULL),(44,44,2,'2017-04-10',NULL,NULL,NULL,NULL),(45,45,32,'2017-04-10',NULL,NULL,NULL,NULL),(46,46,38,'2019-11-26',NULL,NULL,NULL,NULL),(47,47,10,'2019-11-26',NULL,NULL,NULL,NULL),(48,48,37,'2019-11-26',NULL,NULL,NULL,NULL),(49,49,42,'2019-04-12',NULL,NULL,NULL,NULL),(50,50,26,'2020-11-11',NULL,NULL,NULL,NULL),(51,51,57,'2021-03-04',NULL,NULL,NULL,NULL),(52,52,55,'2022-01-01',NULL,NULL,NULL,NULL),(53,53,55,'2020-08-31',NULL,NULL,NULL,NULL),(249,65,56,'2022-11-25','2023-06-19','Félix Sabio','2022-11-30 06:58:52','2022-11-30 06:58:52'),(284,22,55,'2021-01-01',NULL,'En el dpto de Vivienda donde estaba Joselito','2022-12-21 06:47:12','2022-12-21 06:47:12'),(289,72,38,'2014-12-31',NULL,NULL,NULL,NULL),(291,73,34,'2014-12-31',NULL,NULL,NULL,NULL),(293,74,2,'2018-07-31',NULL,NULL,'2023-01-10 12:07:57','2023-01-10 12:07:57'),(295,75,55,'2015-01-01',NULL,NULL,'2023-01-10 12:11:23','2023-01-10 12:11:23'),(297,76,21,'2019-11-26',NULL,'Está en su casa para teletrabajar','2023-01-11 08:59:30','2023-01-11 08:59:30'),(299,77,4,'2020-01-31',NULL,NULL,'2023-01-11 09:13:46','2023-01-11 09:13:46'),(318,96,0,'2017-04-10',NULL,NULL,NULL,NULL),(355,126,56,'2022-08-12',NULL,NULL,'2023-01-12 10:01:24','2023-01-12 10:01:24'),(356,102,26,'2022-08-12',NULL,NULL,'2023-01-12 10:02:13','2023-01-12 10:02:13'),(357,78,55,'2017-04-10',NULL,NULL,'2023-01-12 10:37:36','2023-01-12 10:37:36'),(358,79,4,'2017-04-10',NULL,NULL,'2023-01-12 10:38:27','2023-01-12 10:38:27'),(359,80,2,'2017-04-10',NULL,NULL,'2023-01-12 10:38:45','2023-01-12 10:38:45'),(360,82,5,'2017-04-10',NULL,NULL,'2023-01-12 10:40:26','2023-01-12 10:40:26'),(361,83,3,'2020-01-01',NULL,NULL,'2023-01-12 10:51:45','2023-01-12 10:51:45'),(362,84,6,'2017-04-10',NULL,NULL,'2023-01-12 10:52:20','2023-01-12 10:52:20'),(363,85,7,'2017-04-10',NULL,NULL,'2023-01-12 10:52:46','2023-01-12 10:52:46'),(364,86,8,'2017-04-10',NULL,NULL,'2023-01-12 10:53:08','2023-01-12 10:53:08'),(365,87,21,'2017-04-10',NULL,NULL,'2023-01-12 10:53:33','2023-01-12 10:53:33'),(366,88,9,'2017-04-10',NULL,NULL,'2023-01-12 10:54:09','2023-01-12 10:54:09'),(367,89,12,'2021-03-04',NULL,NULL,'2023-01-12 10:54:24','2023-01-12 10:54:24'),(368,90,10,'2019-11-26',NULL,NULL,'2023-01-12 10:54:41','2023-01-12 10:54:41'),(369,91,11,'2017-04-10',NULL,NULL,'2023-01-12 10:54:56','2023-01-12 10:54:56'),(370,92,55,'2020-01-01',NULL,NULL,'2023-01-12 10:55:15','2023-01-12 10:55:15'),(371,93,15,'2017-04-10',NULL,NULL,'2023-01-12 10:55:38','2023-01-12 10:55:38'),(372,94,14,'2017-04-10',NULL,NULL,'2023-01-12 10:56:11','2023-01-12 10:56:11'),(373,95,13,'2019-11-26',NULL,NULL,'2023-01-12 10:56:33','2023-01-12 10:56:33'),(374,97,16,'2019-04-12',NULL,NULL,'2023-01-12 10:57:09','2023-01-12 10:57:09'),(375,98,17,'2019-11-26',NULL,NULL,'2023-01-12 10:57:31','2023-01-12 10:57:31'),(376,99,18,'2020-01-01',NULL,NULL,'2023-01-12 10:57:51','2023-01-12 10:57:51'),(377,100,18,'2020-01-01',NULL,NULL,'2023-01-12 10:58:09','2023-01-12 10:58:09'),(378,101,19,'2019-04-12',NULL,NULL,'2023-01-12 10:58:26','2023-01-12 10:58:26'),(379,103,26,'2017-04-10',NULL,NULL,'2023-01-12 10:58:50','2023-01-12 10:58:50'),(380,104,57,'2020-01-01',NULL,NULL,'2023-01-12 10:59:16','2023-01-12 10:59:16'),(381,105,57,'2017-04-10',NULL,NULL,'2023-01-12 10:59:34','2023-01-12 10:59:34'),(382,106,29,'2019-11-26',NULL,NULL,'2023-01-12 10:59:52','2023-01-12 10:59:52'),(383,107,25,'2021-03-04',NULL,NULL,'2023-01-12 11:00:10','2023-01-12 11:00:10'),(384,108,23,'2019-11-26',NULL,NULL,'2023-01-12 11:00:37','2023-01-12 11:00:37'),(385,109,24,'2017-04-10',NULL,NULL,'2023-01-12 11:01:02','2023-01-12 11:01:02'),(386,113,22,'2019-11-26',NULL,NULL,'2023-01-12 11:01:20','2023-01-12 11:01:20'),(387,110,27,'2017-04-10',NULL,NULL,'2023-01-12 11:01:44','2023-01-12 11:01:44'),(388,111,20,'2017-04-10',NULL,NULL,'2023-01-12 11:01:59','2023-01-12 11:01:59'),(389,112,21,'2020-01-01',NULL,NULL,'2023-01-12 11:02:17','2023-01-12 11:02:17'),(390,114,36,'2019-11-26',NULL,NULL,'2023-01-12 11:02:38','2023-01-12 11:02:38'),(391,115,30,'2020-01-01',NULL,NULL,'2023-01-12 11:02:55','2023-01-12 11:02:55'),(392,116,33,'2019-11-26',NULL,NULL,'2023-01-12 11:03:13','2023-01-12 11:03:13'),(393,117,39,'2017-04-10',NULL,NULL,'2023-01-12 11:03:41','2023-01-12 11:03:41'),(394,118,31,'2017-04-10',NULL,NULL,'2023-01-12 11:03:57','2023-01-12 11:03:57'),(395,119,34,'2020-01-01',NULL,NULL,'2023-01-12 11:04:13','2023-01-12 11:04:13'),(396,120,38,'2017-04-10',NULL,NULL,'2023-01-12 11:04:28','2023-01-12 11:04:28'),(397,121,35,'2019-11-26',NULL,NULL,'2023-01-12 11:05:03','2023-01-12 11:05:03'),(398,122,37,'2019-11-26',NULL,NULL,'2023-01-12 11:05:18','2023-01-12 11:05:18'),(399,123,32,'2017-04-10',NULL,NULL,'2023-01-12 11:05:50','2023-01-12 11:05:50'),(400,124,28,'2017-04-10',NULL,NULL,'2023-01-12 11:06:11','2023-01-12 11:06:11'),(401,125,57,'2020-01-01',NULL,NULL,'2023-01-12 11:06:32','2023-01-12 11:06:32'),(402,127,40,'2017-04-10',NULL,NULL,'2023-01-12 11:06:53','2023-01-12 11:06:53'),(403,131,44,'2020-01-01',NULL,NULL,'2023-01-12 11:07:12','2023-01-12 11:07:12'),(404,132,55,'2021-03-04',NULL,NULL,'2023-01-12 11:07:30','2023-01-12 11:07:30'),(405,128,55,'2019-04-12',NULL,NULL,'2023-01-12 11:07:47','2023-01-12 11:07:47'),(406,129,43,'2020-01-01',NULL,NULL,'2023-01-12 11:08:05','2023-01-12 11:08:05'),(407,130,42,'2019-04-12',NULL,NULL,'2023-01-12 11:08:23','2023-01-12 11:08:23'),(408,81,55,'2017-04-10',NULL,NULL,'2023-01-12 11:15:10','2023-01-12 11:15:10'),(411,133,4,'2020-09-01',NULL,NULL,'2023-01-12 11:20:40','2023-01-12 11:20:40'),(412,134,24,'2020-09-01',NULL,NULL,'2023-01-12 11:21:00','2023-01-12 11:21:00'),(414,135,2,'2020-01-01',NULL,NULL,'2023-01-13 07:09:27','2023-01-13 07:09:27'),(416,136,2,'2020-01-01',NULL,NULL,'2023-01-13 07:23:09','2023-01-13 07:23:09'),(418,137,55,'2020-01-01',NULL,NULL,'2023-01-13 08:56:26','2023-01-13 08:56:26'),(420,138,34,'2021-09-15',NULL,NULL,'2023-01-18 09:40:24','2023-01-18 09:40:24'),(421,13,34,'2023-02-21',NULL,'Era del Gerente. Hago una instalación nueva y se lo configuro porque el suyo (E-000035) Iba muy lento','2023-02-21 09:30:06','2023-02-21 09:30:06'),(422,35,0,'2023-02-21',NULL,NULL,NULL,NULL),(424,139,55,'2023-03-08',NULL,NULL,'2023-03-08 09:19:34','2023-03-08 09:19:34'),(425,65,56,'2023-06-19',NULL,'SE LO QUEDA FELIX PARA SU USO COMO DELEGADO DE BONANZA','2023-06-19 07:03:50','2023-06-19 07:03:50'),(426,39,0,'2023-06-22',NULL,NULL,NULL,NULL),(428,140,26,'2010-01-01',NULL,NULL,'2023-06-23 04:43:14','2023-06-23 04:43:14'),(429,71,29,'2023-07-13',NULL,NULL,'2023-07-13 04:03:16','2023-07-13 04:03:16'),(431,141,56,'2023-07-12',NULL,NULL,'2023-07-13 06:33:54','2023-07-13 06:33:54');
/*!40000 ALTER TABLE `relacionequipos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `relacionlineas`
--

DROP TABLE IF EXISTS `relacionlineas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `relacionlineas` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `IdLinea` int DEFAULT NULL,
  `IdUsuario` int DEFAULT NULL,
  `FechaAlta` date DEFAULT NULL,
  `FechaBaja` date DEFAULT NULL,
  `Observaciones` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_relacionlineas_lineas` (`IdLinea`),
  KEY `FK_relacionlineas_usuarios` (`IdUsuario`),
  CONSTRAINT `FK_relacionlineas_lineas` FOREIGN KEY (`IdLinea`) REFERENCES `lineas` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_relacionlineas_usuarios` FOREIGN KEY (`IdUsuario`) REFERENCES `usuarios` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `relacionlineas`
--

LOCK TABLES `relacionlineas` WRITE;
/*!40000 ALTER TABLE `relacionlineas` DISABLE KEYS */;
INSERT INTO `relacionlineas` VALUES (2,9,24,'2000-10-16',NULL,NULL,'2022-05-06 05:06:55','2022-05-06 05:06:55'),(4,3,4,'2022-05-25','2023-02-10',NULL,NULL,NULL),(5,5,18,'2011-04-29',NULL,NULL,NULL,NULL),(8,7,14,'2004-08-09',NULL,NULL,NULL,NULL),(9,8,21,'2000-10-27',NULL,NULL,NULL,NULL),(10,10,25,'2005-11-30','2022-11-15',NULL,NULL,NULL),(12,12,29,'2005-03-31',NULL,NULL,NULL,NULL),(15,15,40,'2004-08-09',NULL,NULL,NULL,NULL),(18,18,0,'2022-03-23',NULL,NULL,NULL,NULL),(19,19,0,'2022-03-23',NULL,NULL,NULL,NULL),(20,20,0,'2022-03-23',NULL,NULL,NULL,NULL),(31,2,3,'2005-03-31',NULL,NULL,NULL,NULL),(46,16,25,'2022-10-15',NULL,NULL,'2022-11-28 12:10:26','2022-11-28 12:10:26'),(48,1,2,'2006-12-01',NULL,NULL,'2022-12-01 12:09:37','2022-12-01 12:09:37'),(49,4,11,'2020-01-01',NULL,NULL,'2022-12-02 06:21:13','2022-12-02 06:21:13'),(50,13,30,'2005-11-30',NULL,NULL,'2022-12-02 06:24:25','2022-12-02 06:24:25'),(53,39,15,'2022-01-01',NULL,'Para usarla con la estación topográfica','2022-12-02 07:05:40','2022-12-02 07:05:40'),(54,10,6,'2022-12-02','2023-02-10',NULL,NULL,NULL),(55,41,26,'2005-03-31',NULL,NULL,NULL,NULL),(56,42,2,'2016-05-03',NULL,'Para whatsapp dto de Vivienda',NULL,NULL),(57,43,0,'2000-10-27',NULL,'Era de Javier Ruiz Arana',NULL,NULL),(67,3,6,'2023-02-10',NULL,'La utiliza en un terminal propio porque no tengo ningún smartphone disponible','2023-01-30 09:42:22','2023-01-30 09:42:22'),(68,10,0,'2023-02-10',NULL,NULL,'2023-02-10 11:09:28','2023-02-10 11:09:28'),(69,44,0,'2023-04-17',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `relacionlineas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `relacionterminales`
--

DROP TABLE IF EXISTS `relacionterminales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `relacionterminales` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `IdTerminal` int DEFAULT NULL,
  `IdUsuario` int DEFAULT '48',
  `FechaAlta` date DEFAULT '2022-05-31',
  `FechaBaja` date DEFAULT NULL,
  `Observaciones` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_relaciontelefonos_terminales` (`IdTerminal`) USING BTREE,
  KEY `FK_relacionterminales_usuarios` (`IdUsuario`) USING BTREE,
  CONSTRAINT `FK_relaciontelefonos_terminales` FOREIGN KEY (`IdTerminal`) REFERENCES `terminales` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_relacionterminales_usuarios` FOREIGN KEY (`IdUsuario`) REFERENCES `usuarios` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `relacionterminales`
--

LOCK TABLES `relacionterminales` WRITE;
/*!40000 ALTER TABLE `relacionterminales` DISABLE KEYS */;
INSERT INTO `relacionterminales` VALUES (12,5,18,'2011-04-29',NULL,NULL,'2022-05-05 07:39:36','2022-05-05 07:39:36'),(15,19,41,'2008-04-09','2022-11-28','Baja por jubilación','2022-05-05 07:45:43','2022-05-05 07:45:43'),(48,7,3,'2005-03-31',NULL,NULL,NULL,NULL),(51,21,0,'2022-03-10',NULL,NULL,NULL,NULL),(52,22,0,'2022-03-10',NULL,NULL,NULL,NULL),(53,23,0,'2022-03-10',NULL,NULL,NULL,NULL),(62,8,21,'2000-10-27',NULL,NULL,NULL,NULL),(63,10,14,'2004-08-09',NULL,NULL,NULL,NULL),(64,11,15,'2022-05-31',NULL,NULL,NULL,NULL),(66,6,25,'2005-11-30','2022-11-15',NULL,NULL,NULL),(70,16,26,'2005-03-31',NULL,NULL,NULL,NULL),(82,3,2,'2006-12-01',NULL,NULL,'2022-10-19 07:56:25','2022-10-19 07:56:25'),(84,15,40,'2004-08-09',NULL,NULL,'2022-10-20 04:46:00','2022-10-20 04:46:00'),(85,4,24,'2000-10-16',NULL,NULL,'2022-10-25 06:31:29','2022-10-25 06:31:29'),(97,19,25,'2022-11-28',NULL,NULL,'2022-11-28 12:00:38','2022-11-28 12:00:38'),(106,2,2,'2022-11-28',NULL,NULL,'2022-11-28 12:08:54','2022-11-28 12:08:54'),(107,6,6,'2022-12-02','2023-02-10',NULL,NULL,NULL),(109,32,29,'2005-03-31',NULL,NULL,NULL,NULL),(115,6,0,'2023-02-10',NULL,NULL,'2023-02-10 11:13:41','2023-02-10 11:13:41'),(117,35,11,'2023-09-04',NULL,NULL,'2023-09-04 09:40:19','2023-09-04 09:40:19');
/*!40000 ALTER TABLE `relacionterminales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `s_distribuidores`
--

DROP TABLE IF EXISTS `s_distribuidores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `s_distribuidores` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `Email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Telefono` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Alta` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `s_distribuidores`
--

LOCK TABLES `s_distribuidores` WRITE;
/*!40000 ALTER TABLE `s_distribuidores` DISABLE KEYS */;
INSERT INTO `s_distribuidores` VALUES (1,'officedistribuidor','office@gmail.com','643212121',0),(2,'autocadDistribuidor','autocad@gmail.com','754343434',0),(3,'caducadodistribuidor','caducado@gmail.com','765090908',0);
/*!40000 ALTER TABLE `s_distribuidores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `s_relacionequipossoftwares`
--

DROP TABLE IF EXISTS `s_relacionequipossoftwares`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `s_relacionequipossoftwares` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `IdEquipo` int NOT NULL,
  `IdSoftware` int NOT NULL,
  `FechaAlta` date DEFAULT NULL,
  `FechaBaja` date DEFAULT NULL,
  `Observaciones` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `IdEquipo` (`IdEquipo`),
  KEY `IdSoftware` (`IdSoftware`),
  CONSTRAINT `FK_s_relacionequipossoftware_s_softwares` FOREIGN KEY (`IdSoftware`) REFERENCES `s_softwares` (`Id`),
  CONSTRAINT `FK_s_relacionequipossoftwares_equipos` FOREIGN KEY (`IdEquipo`) REFERENCES `equipos` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=128 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `s_relacionequipossoftwares`
--

LOCK TABLES `s_relacionequipossoftwares` WRITE;
/*!40000 ALTER TABLE `s_relacionequipossoftwares` DISABLE KEYS */;
INSERT INTO `s_relacionequipossoftwares` VALUES (13,22,9,NULL,NULL,NULL,'2022-11-23 11:09:00','2022-11-23 11:09:00'),(14,46,9,NULL,NULL,NULL,'2022-11-23 11:10:38','2022-11-23 11:10:38'),(15,8,9,NULL,NULL,NULL,'2022-11-23 11:11:19','2022-11-23 11:11:19'),(16,34,9,NULL,NULL,NULL,'2022-11-23 11:20:00','2022-11-23 11:20:00'),(17,47,9,NULL,NULL,NULL,'2022-11-23 11:20:24','2022-11-23 11:20:24'),(18,9,9,NULL,NULL,NULL,'2022-11-23 11:20:36','2022-11-23 11:20:36'),(19,21,9,NULL,NULL,NULL,'2022-11-23 11:21:07','2022-11-23 11:21:07'),(20,35,9,NULL,NULL,NULL,'2022-11-23 11:21:17','2022-11-23 11:21:17'),(21,48,9,NULL,NULL,NULL,'2022-11-23 11:41:23','2022-11-23 11:41:23'),(22,10,9,NULL,NULL,NULL,'2022-11-23 11:41:33','2022-11-23 11:41:33'),(23,33,9,NULL,NULL,NULL,'2022-11-23 11:41:43','2022-11-23 11:41:43'),(24,49,9,NULL,NULL,NULL,'2022-11-23 11:41:55','2022-11-23 11:41:55'),(25,11,9,NULL,NULL,NULL,'2022-11-23 11:42:03','2022-11-23 11:42:03'),(26,23,9,NULL,NULL,NULL,'2022-11-23 11:42:12','2022-11-23 11:42:12'),(27,37,9,NULL,NULL,NULL,'2022-11-23 11:42:22','2022-11-23 11:42:22'),(28,24,9,NULL,NULL,NULL,'2022-11-23 11:42:30','2022-11-23 11:42:30'),(29,25,9,NULL,NULL,NULL,'2022-11-23 11:42:40','2022-11-23 11:42:40'),(30,39,9,NULL,NULL,NULL,'2022-11-23 11:42:52','2022-11-23 11:42:52'),(31,36,9,NULL,NULL,NULL,'2022-11-23 11:43:00','2022-11-23 11:43:00'),(32,30,9,NULL,NULL,NULL,'2022-11-23 11:44:56','2022-11-23 11:44:56'),(33,2,9,NULL,NULL,NULL,'2022-11-23 11:45:08','2022-11-23 11:45:08'),(34,41,9,NULL,NULL,NULL,'2022-11-23 11:45:19','2022-11-23 11:45:19'),(35,3,9,NULL,NULL,NULL,'2022-11-23 11:45:32','2022-11-23 11:45:32'),(36,15,9,NULL,NULL,NULL,'2022-11-23 11:45:41','2022-11-23 11:45:41'),(37,29,9,NULL,NULL,NULL,'2022-11-23 11:45:51','2022-11-23 11:45:51'),(38,42,9,NULL,NULL,NULL,'2022-11-23 11:45:58','2022-11-23 11:45:58'),(39,4,9,NULL,NULL,NULL,'2022-11-23 11:46:07','2022-11-23 11:46:07'),(40,16,9,NULL,NULL,NULL,'2022-11-23 11:46:17','2022-11-23 11:46:17'),(41,40,9,NULL,NULL,NULL,'2022-11-23 11:46:24','2022-11-23 11:46:24'),(42,5,9,NULL,NULL,NULL,'2022-11-23 11:46:45','2022-11-23 11:46:45'),(43,17,9,NULL,NULL,NULL,'2022-11-23 11:46:54','2022-11-23 11:46:54'),(44,31,9,NULL,NULL,NULL,'2022-11-23 11:47:03','2022-11-23 11:47:03'),(45,6,9,NULL,NULL,NULL,'2022-11-23 11:47:12','2022-11-23 11:47:12'),(46,18,9,NULL,NULL,NULL,'2022-11-23 11:47:21','2022-11-23 11:47:21'),(47,45,9,NULL,NULL,NULL,'2022-11-23 11:47:30','2022-11-23 11:47:30'),(48,7,9,NULL,NULL,NULL,'2022-11-23 11:47:36','2022-11-23 11:47:36'),(49,19,9,NULL,NULL,NULL,'2022-11-23 11:47:46','2022-11-23 11:47:46'),(50,1,10,NULL,NULL,NULL,'2022-11-23 11:48:38','2022-11-23 11:48:38'),(51,27,10,NULL,NULL,NULL,'2022-11-23 11:48:48','2022-11-23 11:48:48'),(52,14,10,NULL,NULL,NULL,'2022-11-23 11:48:59','2022-11-23 11:48:59'),(53,43,10,NULL,NULL,NULL,'2022-11-23 11:49:07','2022-11-23 11:49:07'),(54,44,10,NULL,NULL,NULL,'2022-11-23 11:49:13','2022-11-23 11:49:13'),(55,32,10,NULL,NULL,NULL,'2022-11-23 11:49:23','2022-11-23 11:49:23'),(56,20,10,NULL,NULL,NULL,'2022-11-23 11:49:31','2022-11-23 11:49:31'),(57,50,10,NULL,NULL,NULL,'2022-11-23 11:49:40','2022-11-23 11:49:40'),(58,38,10,NULL,NULL,NULL,'2022-11-23 11:49:51','2022-11-23 11:49:51'),(59,12,10,NULL,NULL,NULL,'2022-11-23 11:49:59','2022-11-23 11:49:59'),(60,65,10,NULL,NULL,NULL,'2022-11-30 07:09:34','2022-11-30 07:09:34'),(63,65,16,NULL,NULL,NULL,'2022-11-30 08:12:48','2022-11-30 08:12:48'),(65,53,19,NULL,NULL,NULL,'2022-11-30 10:08:06','2022-11-30 10:08:06'),(66,22,17,NULL,NULL,NULL,'2022-11-30 10:08:55','2022-11-30 10:08:55'),(67,25,17,NULL,NULL,NULL,'2022-11-30 10:09:04','2022-11-30 10:09:04'),(68,44,17,NULL,NULL,NULL,'2022-11-30 10:09:12','2022-11-30 10:09:12'),(69,10,17,NULL,NULL,NULL,'2022-11-30 10:09:21','2022-11-30 10:09:21'),(70,6,17,NULL,NULL,NULL,'2022-11-30 10:09:40','2022-11-30 10:09:40'),(71,14,17,NULL,NULL,NULL,'2022-11-30 10:09:50','2022-11-30 10:09:50'),(72,3,17,NULL,NULL,NULL,'2022-11-30 10:09:57','2022-11-30 10:09:57'),(73,11,17,NULL,NULL,NULL,'2022-11-30 10:10:05','2022-11-30 10:10:05'),(74,30,17,NULL,NULL,NULL,'2022-11-30 10:10:13','2022-11-30 10:10:13'),(75,33,17,NULL,NULL,NULL,'2022-11-30 10:10:41','2022-11-30 10:10:41'),(76,47,17,NULL,NULL,NULL,'2022-11-30 10:10:51','2022-11-30 10:10:51'),(77,39,17,NULL,NULL,NULL,'2022-11-30 10:11:04','2022-11-30 10:11:04'),(78,37,17,NULL,NULL,NULL,'2022-11-30 10:11:17','2022-11-30 10:11:17'),(79,9,17,NULL,NULL,NULL,'2022-11-30 10:11:26','2022-11-30 10:11:26'),(80,13,17,NULL,NULL,NULL,'2022-11-30 10:11:50','2022-11-30 10:11:50'),(82,32,17,NULL,NULL,NULL,'2022-11-30 10:12:11','2022-11-30 10:12:11'),(83,12,17,NULL,NULL,NULL,'2022-11-30 10:12:22','2022-11-30 10:12:22'),(84,5,17,NULL,NULL,NULL,'2022-11-30 10:12:32','2022-11-30 10:12:32'),(85,19,17,NULL,NULL,NULL,'2022-11-30 10:12:43','2022-11-30 10:12:43'),(86,42,17,NULL,NULL,NULL,'2022-11-30 10:12:51','2022-11-30 10:12:51'),(87,31,17,NULL,NULL,NULL,'2022-11-30 10:13:00','2022-11-30 10:13:00'),(88,28,17,NULL,NULL,NULL,'2022-11-30 10:13:12','2022-11-30 10:13:12'),(89,20,17,NULL,NULL,NULL,'2022-11-30 10:13:22','2022-11-30 10:13:22'),(90,2,17,NULL,NULL,NULL,'2022-11-30 10:13:30','2022-11-30 10:13:30'),(91,16,17,NULL,NULL,NULL,'2022-11-30 10:13:39','2022-11-30 10:13:39'),(92,26,17,NULL,NULL,NULL,'2022-11-30 10:13:55','2022-11-30 10:13:55'),(93,43,17,NULL,NULL,NULL,'2022-11-30 10:14:03','2022-11-30 10:14:03'),(94,15,17,NULL,NULL,NULL,'2022-11-30 10:14:12','2022-11-30 10:14:12'),(95,35,17,NULL,NULL,NULL,'2022-11-30 10:14:20','2022-11-30 10:14:20'),(96,46,17,NULL,NULL,NULL,'2022-11-30 10:14:30','2022-11-30 10:14:30'),(97,41,17,NULL,NULL,NULL,'2022-11-30 10:14:37','2022-11-30 10:14:37'),(98,48,17,NULL,NULL,NULL,'2022-11-30 10:14:49','2022-11-30 10:14:49'),(99,45,17,NULL,NULL,NULL,'2022-11-30 10:15:01','2022-11-30 10:15:01'),(100,29,17,NULL,NULL,NULL,'2022-11-30 10:15:10','2022-11-30 10:15:10'),(101,27,17,NULL,NULL,NULL,'2022-11-30 10:15:21','2022-11-30 10:15:21'),(102,8,17,NULL,NULL,NULL,'2022-11-30 10:15:31','2022-11-30 10:15:31'),(103,23,17,NULL,NULL,NULL,'2022-11-30 10:15:41','2022-11-30 10:15:41'),(104,34,17,NULL,NULL,NULL,'2022-11-30 10:16:12','2022-11-30 10:16:12'),(105,40,17,NULL,NULL,NULL,'2022-11-30 10:16:20','2022-11-30 10:16:20'),(106,49,17,NULL,NULL,NULL,'2022-11-30 10:16:30','2022-11-30 10:16:30'),(107,7,18,NULL,NULL,NULL,'2022-11-30 10:17:45','2022-11-30 10:17:45'),(108,36,18,NULL,NULL,NULL,'2022-11-30 10:18:05','2022-11-30 10:18:05'),(109,18,18,NULL,NULL,NULL,'2022-11-30 10:18:19','2022-11-30 10:18:19'),(110,24,18,NULL,NULL,NULL,'2022-11-30 10:18:31','2022-11-30 10:18:31'),(111,1,18,NULL,NULL,NULL,'2022-11-30 10:18:52','2022-11-30 10:18:52'),(112,38,18,NULL,NULL,NULL,'2022-11-30 10:19:01','2022-11-30 10:19:01'),(113,4,18,NULL,NULL,NULL,'2022-11-30 10:19:17','2022-11-30 10:19:17'),(114,17,18,NULL,NULL,NULL,'2022-11-30 10:19:28','2022-11-30 10:19:28'),(115,50,18,NULL,NULL,NULL,'2022-11-30 10:19:53','2022-11-30 10:19:53'),(116,51,18,NULL,NULL,NULL,'2022-11-30 10:20:05','2022-11-30 10:20:05'),(117,52,20,NULL,NULL,NULL,'2022-11-30 10:20:29','2022-11-30 10:20:29'),(118,76,10,NULL,NULL,NULL,'2023-01-11 09:04:56','2023-01-11 09:04:56'),(119,76,18,NULL,NULL,NULL,'2023-01-11 09:05:43','2023-01-11 09:05:43'),(120,38,24,NULL,NULL,NULL,'2023-05-19 09:01:04','2023-05-19 09:01:04'),(121,21,18,NULL,NULL,NULL,'2023-05-24 07:21:05','2023-05-24 07:21:05'),(124,140,17,'2010-01-01',NULL,NULL,'2023-06-23 04:45:50','2023-06-23 04:45:50'),(125,140,10,'2010-01-01',NULL,NULL,'2023-06-23 04:46:09','2023-06-23 04:46:09'),(126,141,18,'2023-07-12',NULL,'3W7W2-NHGHY-YXBPM-FGDW6','2023-07-13 06:22:26','2023-07-13 06:22:26'),(127,141,10,'2023-07-12',NULL,NULL,'2023-07-13 06:22:37','2023-07-13 06:22:37');
/*!40000 ALTER TABLE `s_relacionequipossoftwares` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `s_relacionusuariossoftwares`
--

DROP TABLE IF EXISTS `s_relacionusuariossoftwares`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `s_relacionusuariossoftwares` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `IdUsuario` int NOT NULL,
  `IdSoftware` int NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `IdSoftware` (`IdSoftware`),
  KEY `IdUsuario` (`IdUsuario`),
  CONSTRAINT `FK__s_software` FOREIGN KEY (`IdSoftware`) REFERENCES `s_softwares` (`Id`),
  CONSTRAINT `FK_s_relacionusuariossoftwares_usuarios` FOREIGN KEY (`IdUsuario`) REFERENCES `usuarios` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `s_relacionusuariossoftwares`
--

LOCK TABLES `s_relacionusuariossoftwares` WRITE;
/*!40000 ALTER TABLE `s_relacionusuariossoftwares` DISABLE KEYS */;
INSERT INTO `s_relacionusuariossoftwares` VALUES (30,2,11,'2022-11-23 11:53:16','2022-11-23 11:53:16'),(31,21,11,'2022-11-23 11:53:24','2022-11-23 11:53:24'),(32,18,11,'2022-11-23 11:53:31','2022-11-23 11:53:31'),(33,26,12,'2022-11-23 12:03:02','2022-11-23 12:03:02'),(35,21,13,'2022-11-23 12:07:59','2022-11-23 12:07:59'),(36,18,13,'2022-11-23 12:08:06','2022-11-23 12:08:06'),(37,40,13,'2022-11-23 12:08:15','2022-11-23 12:08:15'),(38,15,14,'2022-11-24 11:44:09','2022-11-24 11:44:09'),(39,55,15,'2022-11-29 07:11:30','2022-11-29 07:11:30'),(49,38,23,'2023-05-19 04:59:14','2023-05-19 04:59:14'),(50,4,7,'2023-05-19 09:10:13','2023-05-19 09:10:13'),(51,2,7,'2023-05-30 07:22:33','2023-05-30 07:22:33'),(52,15,22,'2023-06-19 09:02:36','2023-06-19 09:02:36'),(53,24,7,'2023-06-22 07:28:40','2023-06-22 07:28:40'),(54,56,27,'2023-07-05 04:08:26','2023-07-05 04:08:26'),(55,56,7,'2023-07-13 06:25:26','2023-07-13 06:25:26');
/*!40000 ALTER TABLE `s_relacionusuariossoftwares` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `s_softwares`
--

DROP TABLE IF EXISTS `s_softwares`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `s_softwares` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `IdProveedor` int NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Cantidad` smallint NOT NULL DEFAULT '0',
  `Tipo` varchar(50) DEFAULT NULL,
  `Documento` blob,
  `FechaAlta` date DEFAULT NULL,
  `FechaBaja` date DEFAULT NULL,
  `Alta` tinyint(1) NOT NULL DEFAULT '0',
  `Observaciones` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `PrecioAdquisicion` decimal(20,2) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `IdDistribuidor` (`IdProveedor`) USING BTREE,
  CONSTRAINT `FK_s_softwares_i_proveedores` FOREIGN KEY (`IdProveedor`) REFERENCES `i_proveedores` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `s_softwares`
--

LOCK TABLES `s_softwares` WRITE;
/*!40000 ALTER TABLE `s_softwares` DISABLE KEYS */;
INSERT INTO `s_softwares` VALUES (6,11,'Office 2003',3,'Perpetua',NULL,'2022-11-15',NULL,0,NULL,NULL,NULL,0.00),(7,18,'AutoCad LT',4,'Anual',NULL,'2022-11-15',NULL,0,'Usuario para LT autocad@gmusanlucar.es #Banos8. con el punto',NULL,NULL,0.00),(8,1,'pruebabaja',2,'Perpetua',NULL,'2022-11-14','2022-11-14',0,NULL,'2022-11-15 08:39:01','2022-11-15 08:39:01',0.00),(9,5,'Eset Endpoint antivirus',43,'Anual',NULL,'2022-02-04',NULL,0,NULL,'2022-11-23 11:00:43','2022-11-23 11:00:43',0.00),(10,5,'Eset Endpoint Security Total',26,'Anual',NULL,'2022-10-05',NULL,0,NULL,'2022-11-23 11:13:12','2022-11-23 11:13:12',0.00),(11,6,'Presto 2022',3,'Perpetua',NULL,'2022-11-30',NULL,0,'Con soporte anual','2022-11-23 11:28:42','2022-11-23 11:28:42',0.00),(12,9,'OfficeProPlus 2019 OLP NL Gov',1,'Perpetua',NULL,'2021-06-23',NULL,0,'642,79','2022-11-23 11:59:59','2022-11-23 11:59:59',642.79),(13,9,'OfficeStd 2019 OLP NL Gov',4,'Perpetua',NULL,'2021-06-23',NULL,0,'471,57','2022-11-23 12:00:31','2022-11-23 12:00:31',0.00),(14,10,'MDT Profesional v.7.5 + Topografia',1,'Perpetua',NULL,'2017-05-19',NULL,0,'Programa de topografía','2022-11-24 11:43:58','2022-11-24 11:43:58',0.00),(15,12,'Veeam Backup',2,'Anual',NULL,'2022-08-31',NULL,0,'Precio Adquisicion 2.052,6','2022-11-29 07:07:40','2022-11-29 07:07:40',0.00),(16,9,'Windows 11 home',1,'Perpetua',NULL,'2022-11-25',NULL,0,'Para el portatil de Fsabio (PYBMY-N8DW8-X32GQ-CB33M-3GPKG)','2022-11-30 08:09:11','2022-11-30 08:09:11',0.00),(17,11,'Windows 10 pro',100,'Perpetua',NULL,'2017-04-10',NULL,0,'Comprados junto a los equipos','2022-11-30 09:52:27','2022-11-30 09:52:27',0.00),(18,11,'Windows 11 pro',100,'Perpetua',NULL,'2020-11-11',NULL,0,NULL,'2022-11-30 10:02:53','2022-11-30 10:02:53',0.00),(19,11,'Windows Server 2019 Standard',2,'Perpetua',NULL,'2020-08-31',NULL,0,NULL,'2022-11-30 10:03:51','2022-11-30 10:03:51',0.00),(20,11,'Windows Server 2003 Standard',1,'Perpetua',NULL,'2003-01-01',NULL,0,NULL,'2022-11-30 10:04:40','2022-11-30 10:04:40',0.00),(22,18,'Autocad MAP',1,'Anual',NULL,'2022-11-15',NULL,0,'Usuario  autocad2@gmusanlucar.es #Banos8. con el punto','2023-03-09 10:36:25','2023-03-09 10:36:25',0.00),(23,14,'Nitro',2,'Perpetua',NULL,'2022-03-17',NULL,0,'Numero de Serie para activar 504900337566529455','2023-05-19 04:59:01','2023-05-19 04:59:01',392.02),(24,15,'Wondershare PdfElement profesional',1,'Perpetua',NULL,'2022-05-09',NULL,0,'usuario ppozo@gmusanlucar.es pass pepito','2023-05-19 09:00:46','2023-05-19 09:00:46',143.99),(25,16,'NeuShield Data Sentinel Bussines',50,'Perpetua',NULL,'2023-05-22',NULL,0,'Antiransomware suministrado por el Ayto. Contraseña de desinstalación Sanlucar2008. Lo despliego con la GPO Install_NeuShell','2023-05-24 10:11:10','2023-05-24 10:11:10',NULL),(26,16,'Microclaudia',50,'Perpetua',NULL,'2023-01-02',NULL,0,'Agente anti ransomware. Lo despliego con la GPO Install_microclaudia','2023-05-25 09:41:41','2023-05-25 09:41:41',NULL),(27,16,'Office 365',1,'Anual',NULL,'2023-07-04',NULL,0,'Licencia para Mónica González propiedad del Ayuntamiento.','2023-07-05 04:08:05','2023-07-05 04:08:05',NULL);
/*!40000 ALTER TABLE `s_softwares` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `terminales`
--

DROP TABLE IF EXISTS `terminales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `terminales` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `IdTipo` int NOT NULL DEFAULT '1',
  `Marca` varchar(255) NOT NULL,
  `Modelo` varchar(255) NOT NULL,
  `NumSerie` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Imei` varchar(255) NOT NULL,
  `FormatoTarjeta` varchar(10) DEFAULT NULL,
  `Cuenta` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `FechaAlta` date DEFAULT NULL,
  `FechaBaja` date DEFAULT NULL,
  `Observaciones` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `FechaVersion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `NInventario` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'T-000000' COMMENT 'T-000000',
  `PrecioAdquisicion` decimal(20,2) NOT NULL,
  `Etiquetar` smallint DEFAULT '0',
  `Etiquetado` smallint DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `IdTipo` (`IdTipo`),
  CONSTRAINT `FK_terminales_tipos` FOREIGN KEY (`IdTipo`) REFERENCES `tipos` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `terminales`
--

LOCK TABLES `terminales` WRITE;
/*!40000 ALTER TABLE `terminales` DISABLE KEYS */;
INSERT INTO `terminales` VALUES (2,1,'Alcatel','3088X',NULL,'355938101421537','Nano SIM','vivienda.gmu@gmail.com (vivienda2014)','2018-01-01',NULL,'Del ayuntamiento (Smartphone sin pantalla tactil)','2021-05-23 22:00:00','T-000002',0.00,1,1,NULL,NULL),(3,1,'Huawei','P Smart (FIG-LX1)',NULL,'869012035884167','Nano SIM',NULL,'2006-12-01',NULL,'Es propiedad de Agustín','2021-05-23 22:00:00','T-000003',0.00,1,1,NULL,NULL),(4,1,'Huawei','P Smart (FIG-LX1)',NULL,'869012035884449','Nano SIM',NULL,'2000-10-16',NULL,'Falta cuenta','2021-05-23 22:00:00','T-000004',0.00,0,0,NULL,NULL),(5,1,'Huawei','P Smart FIG-LX1',NULL,'869012035890933','Nano SIM',NULL,'2011-04-29',NULL,NULL,'2021-05-23 22:00:00','T-000005',0.00,0,0,NULL,NULL),(6,1,'ZTE','F320',NULL,'867063021790258','Mini SIM',NULL,'2005-11-30',NULL,'','2021-05-23 22:00:00','T-000006',0.00,0,0,NULL,NULL),(7,1,'Nokia','C5',NULL,'356989048757565','Mini SIM',NULL,'2005-03-31',NULL,'','2021-05-23 22:00:00','T-000007',0.00,0,0,NULL,NULL),(8,1,'Huawei','FIG-LX1',NULL,'869012035890974','Nano SIM',NULL,'2000-10-27',NULL,'Falta cuenta','2021-05-23 22:00:00','T-000008',0.00,0,0,NULL,NULL),(10,1,'ZTE','F320',NULL,'867063021222146','Mini SIM',NULL,'2004-08-09',NULL,NULL,'2021-05-23 22:00:00','T-000010',0.00,0,0,NULL,NULL),(11,1,'Trimble','TDC600',NULL,'354036100106083',NULL,NULL,'2020-12-17',NULL,'Colector de datos para GPS','2021-05-23 22:00:00','T-000011',10837.73,0,0,NULL,NULL),(15,1,'Huawei','FIG-LX1',NULL,'869012035890289',NULL,NULL,'2004-08-09',NULL,'','2021-05-23 22:00:00','T-000015',0.00,0,0,NULL,NULL),(16,1,'Xiaomi','Redmi 7','de94684a','867688043535909',NULL,'gmusanlucar@gmail.com','2005-03-31',NULL,'','2021-05-23 22:00:00','T-000016',0.00,1,1,NULL,NULL),(19,1,'Xiaomi','Redmi 9AT','29250/60ZQ0938','869165047152591/80','micro SIMM',NULL,'2000-10-16',NULL,'','2021-06-01 22:00:00','T-000018',0.00,0,0,NULL,NULL),(21,1,'Motorola','FW200L','2109es028798','352361072191513','SIMM',NULL,'2022-03-10',NULL,'Fijo GSM (ok)','2022-04-04 06:34:58','T-000019',35.99,0,0,NULL,NULL),(22,1,'Motorola','FW200L','2109ES028801','352361072176514','SIMM',NULL,'2022-03-10',NULL,'Fijo GSM (ok)','2022-04-04 07:04:48','T-000020',35.99,0,0,NULL,NULL),(23,1,'Motorola','FW200L','2109ES028797','352361072176084','SIMM',NULL,'2022-03-10',NULL,'Fijo GSM (ok)','2022-04-04 07:27:00','T-000021',35.99,0,0,NULL,NULL),(24,1,'Motorola','FW200L','2109ES028792','352361072176555','SIMM',NULL,'2022-03-10',NULL,'Fijo GSM','2022-04-04 07:28:15','T-000022',35.99,0,0,NULL,NULL),(32,1,'Alcatel','Onetouch 2045X',NULL,'359159080751218',NULL,NULL,'2005-03-31',NULL,NULL,'2022-12-07 09:34:45','T-000023',0.00,0,0,'2022-12-07 08:34:45','2022-12-07 08:34:45'),(35,1,'Huawei','P smart (FIG-LX1)','HBEDU18820001123','869012035884449','nano sim','tesoreriagmuanlucar@gmail.com #Gmusanlucar8','2023-09-04',NULL,'Era mio. Tiene la pantalla rota en una esquina.','2023-09-04 11:39:58','T-000024',0.00,1,1,'2023-09-04 09:39:58','2023-09-04 09:39:58');
/*!40000 ALTER TABLE `terminales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipodocumentos`
--

DROP TABLE IF EXISTS `tipodocumentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipodocumentos` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Asociado` int DEFAULT NULL,
  `Identificador` int DEFAULT NULL,
  `Denominacion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipodocumentos`
--

LOCK TABLES `tipodocumentos` WRITE;
/*!40000 ALTER TABLE `tipodocumentos` DISABLE KEYS */;
INSERT INTO `tipodocumentos` VALUES (1,NULL,NULL,'Licencia'),(2,NULL,NULL,'Factura');
/*!40000 ALTER TABLE `tipodocumentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipoequipos`
--

DROP TABLE IF EXISTS `tipoequipos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipoequipos` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Denominacion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipoequipos`
--

LOCK TABLES `tipoequipos` WRITE;
/*!40000 ALTER TABLE `tipoequipos` DISABLE KEYS */;
INSERT INTO `tipoequipos` VALUES (1,'Ordenador'),(5,'Monitor'),(6,'Escaner'),(7,'Tablet');
/*!40000 ALTER TABLE `tipoequipos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipos`
--

DROP TABLE IF EXISTS `tipos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipos` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Denominación` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipos`
--

LOCK TABLES `tipos` WRITE;
/*!40000 ALTER TABLE `tipos` DISABLE KEYS */;
INSERT INTO `tipos` VALUES (1,'Terminal'),(2,'Impresora');
/*!40000 ALTER TABLE `tipos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Practicas','practicasinf@gmusanlucar.es','2022-12-02 10:39:13','$2y$10$e/TlZ2u6EeaIqjpvVUDti.fDbOgx3psoOHXCjAZJ7MORj7ixyGGnO',NULL,'2022-12-02 08:03:52','2022-12-02 08:03:52'),(2,'Jmmonge','jmmonge@gmusanlucar.es','2022-12-02 10:39:09','$2y$10$V0lcx3LoqlVk7eKaEw5e8utXpHJ.tNrK1sB/ocnS1rl1w3MbRyK/2','r3UEoXcKePoftK1nyxA7r4w0fqi2iceQCk0rw8Ip8I0qtvttm9KCnmya9JR1','2022-12-02 09:33:37','2022-12-02 09:33:37');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Usuario` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Departamento` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `FechaAlta` date NOT NULL,
  `FechaBaja` date DEFAULT NULL,
  `Observaciones` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (0,'Sin asignar','sinasignar.gmu.es','Ninguno','2021-05-19',NULL,NULL,NULL,NULL),(2,'Agustín Jiménez Suárez','ajimenez.gmu.es','Vivienda','2011-11-03',NULL,NULL,NULL,NULL),(3,'Ana Maria Torrejon Camacho','atorrejon.gmu.es','Administración general','2003-01-20',NULL,NULL,NULL,NULL),(4,'Antonio Domínguez Gallego','adominguez.gmu.es','Edificación y disciplina','1998-02-01',NULL,NULL,NULL,NULL),(5,'Antonio Tellez Saenz','atellez.gmu.es','Planeamiento y gestion','2002-04-01',NULL,NULL,NULL,NULL),(6,'Baldomero Aldón Buzón','baldon.gmu.es','Administración general','2000-02-09',NULL,NULL,NULL,NULL),(7,'Beatriz López Silva','blopez.gmu.es','Proyectos y obras','1998-04-01',NULL,NULL,NULL,NULL),(8,'Blanca Salvago Enríquez','bsalvago.gmu.es','Edificación y disciplina','1998-03-11',NULL,NULL,NULL,NULL),(9,'Domingo Fernández Tubío','dfernandez.gmu.es','Asesoría jurídica','1998-02-01',NULL,NULL,NULL,NULL),(10,'Erika Reyes Barrios','ereyes.gmu.es','Intervención','1999-04-19',NULL,NULL,NULL,NULL),(11,'Estefanía Ruíz Lima','eruiz.gmu.es','Tesorería','1999-02-08',NULL,NULL,NULL,NULL),(12,'Eugenia Hernández Parra','ehernandez.gmu.es','Asesoría jurídica','2003-11-17',NULL,NULL,NULL,NULL),(13,'Fco. Fermín Prieto Alcón','fprieto.gmu.es','Tesorería','1998-02-25',NULL,NULL,NULL,NULL),(14,'Fco. Javier Rodríguez Ferreira','fjrodriguez.gmu.es','Edificación y disciplina','2003-11-03',NULL,NULL,NULL,NULL),(15,'Fco. Javier Martinez García','fjmartinez.gmu.es','Planeamiento y gestion','2004-09-15',NULL,NULL,NULL,NULL),(16,'Gloria Hermoso Mellado','ghermoso.gmu.es','Asesoría jurídica','2004-01-13',NULL,NULL,NULL,NULL),(17,'Gloria Soler Rabadán','gsoler.gmu.es','Recursos humanos','1999-04-19',NULL,NULL,NULL,NULL),(18,'Gonzalo Valero Quintana','gvalero.gmu.es','Proyectos y obras','1998-11-09',NULL,NULL,NULL,NULL),(19,'Inmaculada Escobar Vazquez','iescobar.gmu.es','Intervención','1998-02-01',NULL,NULL,NULL,NULL),(20,'Javier Ramírez Bollullo','jramirez.gmu.es','Administración general','2003-12-02',NULL,NULL,NULL,NULL),(21,'Jesús Rodríguez Oliva','jrodriguez.gmu.es','Proyectos y obras','1998-02-01',NULL,NULL,NULL,NULL),(22,'Joaquina Suárez Ruíz','jsuarez.gmu.es','Edificación y disciplina','2000-01-14',NULL,NULL,NULL,NULL),(23,'José Manuel Macías Saborido','jmmacias.gmu.es','Asesoría jurídica','2000-02-01',NULL,NULL,NULL,NULL),(24,'José Manuel Rodríguez Vidal','jmrodriguez.gmu.es','Edificación y disciplina','1998-02-01',NULL,NULL,NULL,NULL),(25,'José Maria Hernández Juez-Sarmiento','jmhernandez.gmu.es','Vivienda','1998-04-07',NULL,NULL,NULL,NULL),(26,'José Miguel Monge Jiménez','jmmonge.gmu.es','Administración general','2000-02-16',NULL,NULL,NULL,NULL),(27,'José Pozo Cuevas','jpozo.gmu.es','Proyectos y obras','1998-04-01',NULL,NULL,NULL,NULL),(28,'José Pozo Mellado','ppozo.gmu.es','Edificación y disciplina','1998-04-22',NULL,NULL,NULL,NULL),(29,'Juan Antonio Listan Gumier','jalistan.gmu.es','Administración general','2004-07-05',NULL,NULL,NULL,NULL),(30,'Mª Carmen Parejo Camacho','mcparejo.gmu.es','Administración general','2003-12-16',NULL,NULL,NULL,NULL),(31,'Mabel Roldán Vendrell','mroldan.gmu.es','Edificación y disciplina','1998-01-24',NULL,NULL,NULL,NULL),(32,'Manuel Rodriguez Victoria','mrodriguez.gmu.es','Planeamiento y gestion','2003-11-10',NULL,NULL,NULL,NULL),(33,'Mari Carmen Pérez Rodríguez','mcperez.gmu.es','Administración general','2000-02-09',NULL,NULL,NULL,NULL),(34,'María José Sánchez Pérez','mjsanchez.gmu.es','Administración general','2000-11-20',NULL,NULL,NULL,NULL),(35,'Maria Rosario Buzón Gómez','mrbuzon.gmu.es','Edificación y disciplina','2000-07-01',NULL,NULL,NULL,NULL),(36,'Mercedes Alcántara Puerto','malcantara.gmu.es','Edificación y disciplina','1998-04-07',NULL,NULL,NULL,NULL),(37,'Milagrosa Reyes Barrios','mreyes.gmu.es','Planeamiento y gestion','1998-02-01',NULL,NULL,NULL,NULL),(38,'Milagrosa López Fernandez','mlopez.gmu.es','Intervención','1995-11-16',NULL,NULL,NULL,NULL),(39,'Montserrat de la Cuadra Fdez. Gao','mcuadra.gmu.es','Planeamiento y gestion','2003-11-10',NULL,NULL,NULL,NULL),(40,'Rafael González Calderón','rgonzalez.gmu.es','Proyectos y obras','1996-04-15',NULL,NULL,NULL,NULL),(41,'Rafael Humanes García','rhumanes.gmu.es','Proyectos y obras','1998-02-01',NULL,NULL,NULL,NULL),(42,'Vanesa Vidal Bernal','vvidal.gmu.es','Secretaria general','2003-11-10',NULL,NULL,NULL,NULL),(43,'Virginia Martínez Anillo','vmartinez.gmu.es','Edificación y disciplina','1998-02-01',NULL,NULL,NULL,NULL),(44,'Victor Barbero Dieguez','vbarbero.gmu.es','Secretaria general','2017-01-01',NULL,NULL,NULL,NULL),(55,'Red','Red.gmu.es','Ninguno','2000-01-01',NULL,NULL,NULL,NULL),(56,'Presidencia','presidencia.gmu.es','Presidencia','2000-01-01',NULL,NULL,NULL,NULL),(57,'Practicas','practicas.gmu.es','Ninguno','2000-01-01',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-05  0:23:23
