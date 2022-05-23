-- MySQL dump 10.13  Distrib 8.0.29, for Win64 (x86_64)
--
-- Host: localhost    Database: itabarato
-- ------------------------------------------------------
-- Server version	8.0.29

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
-- Table structure for table `administrator`
--

DROP TABLE IF EXISTS `administrator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `administrator` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Name` text,
  `LastName` text,
  `PhoneNumber` varchar(15) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `Image` varchar(150) DEFAULT NULL,
  `IdAdress` int DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Id_UNIQUE` (`Id`),
  KEY `IdAdressA_idx` (`IdAdress`),
  CONSTRAINT `IdAdressA` FOREIGN KEY (`IdAdress`) REFERENCES `adress` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrator`
--

LOCK TABLES `administrator` WRITE;
/*!40000 ALTER TABLE `administrator` DISABLE KEYS */;
INSERT INTO `administrator` VALUES (1,'Juan','Ponce Nevado','4493467636','Juan1@gmail.com','hola123','https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png',1),(2,'Maximo ','Palomares Perez','4442514621','max2@gmail.com','hola123','https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png',2),(3,'Adora','Aguilera Barberá','4496582253','adora3@gmail.com','hola123','https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png',3),(4,'Pancho Tomas','Barberá Gutierrez','4496532586','pancho4@gmail.com','hola123','https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png',4),(5,'Lupe','Lerma Flores','4496581452','lupe5@gmail.com','hola123','https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png',5),(6,'Adela','Cespedes Rueda','4498857858','adela6@gmail.com','hola123','https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png',6),(7,'Cruz','Bilbao Dueñas','4495686586','cruz7@gmail.com','hola123','https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png',7),(8,'Angelina','Flores Montes','4498585556','angelina8@gmail.com','hola123','https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png',8),(9,'Bibiana','Paredes Palomino','4498123131','bibiana9@gmail.com','hola123','https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png',9),(10,'Maria Jose','Brnal Paredes','4496565356','maria10@gmail.com','hola123','https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png',10),(11,'Vinicio','Almansa Ortuño','4497775756','vini11@gmail.com','hola123','https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png',11),(12,'Luisa','Rueda Madrid','4492213536','luisa12@gmail.com','hola123','https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png',12),(13,'Evangelina','Flores Ramirez','4496662626','evangelina13@gmail.com','hola123','https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png',13),(14,'Candelaria','Pedrero Murillo','4491112321','candelaria14@gmail.com','hola123','https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png',14),(15,'Eleuterio','Vigil Palomino','4495552525','elu15@gmail.com','hola123','https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png',15),(16,'Severanio','Ojeda Palau','4491515145','severiano16@gmail.com','hola123','https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png',16),(17,'Nidia','Murcia Alamano','4493323536','nidia17@gmail.com','hola123','https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png',17),(18,'Nuria','Narvaez Arce','4497778485','nuria18@gmail.com','hola123','https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png',18),(19,'Leticia','Conesa Bartolome','4493258526','leticia19@gmail.com','hola123','https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png',19),(20,'Parajeo','Reyes Alamo','4498887756','parejo20@gmail.com','hola123','https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png',20);
/*!40000 ALTER TABLE `administrator` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `adress`
--

DROP TABLE IF EXISTS `adress`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adress` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Street` varchar(80) DEFAULT NULL,
  `PostalCode` int DEFAULT NULL,
  `Suburb` varchar(80) DEFAULT NULL,
  `HouseNumber` int DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Id_UNIQUE` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adress`
--

LOCK TABLES `adress` WRITE;
/*!40000 ALTER TABLE `adress` DISABLE KEYS */;
INSERT INTO `adress` VALUES (1,'Diagonal Alfil',20299,'Lomas del Ajedrez',136,'Aguascalientes'),(2,'AV. Convencion PTE',20070,'San Marcos',503,'Aguascalientes'),(3,'Ayuntamiento',20240,'La Salud',613,'Aguascalientes'),(4,'Jose Maria Chavez',20000,'Zona Centro',1215,'Aguascalientes'),(5,'Naranjo',20303,'El Progreso',123,'Aguascalientes'),(6,'De la Estrategia',20299,'Diagonal Alfil',189,'Aguascalientes'),(7,'Alpino',20289,'Municipio libre',178,'Aguascalientes'),(8,'Heroe Militar',20289,'Municipio Libre',134,'Aguascalientes'),(9,'Prosperidad',20289,'Municipio Libre',156,'Aguascalientes'),(10,'Malaga',20678,'La España',134,'Aguascalientes'),(11,'Galicia',20678,'La España',209,'Aguascalientes'),(12,'Aaragon',20678,'La España',307,'Aguascalientes'),(13,'Madrid',20678,'La España',403,'Aguascalientes'),(14,'Hacienda Jaltomate',20988,'Haciendas de Aguascalientes',390,'Aguascalientes'),(15,'Hacienda Jaltomate',20988,'Haciendas de Aguascalientes',405,'Aguascalientes'),(16,'Hacienda Nueva',20988,'Haciendas de Aguascalientes',123,'Aguascalientes'),(17,'Hacienda Milpillas',20988,'Haciendas de Aguascalientes',450,'Aguascalientes'),(18,'Munguia',20034,'Morelos II',304,'Aguascalientes'),(19,'Herrera',20034,'Morelos II',502,'Aguascalientes'),(20,'Sixto Verduzco',20034,'Morelos II',405,'Aguascalientes'),(21,'Valerio Trujano',20034,'Morelos II',136,'Aguascalientes');
/*!40000 ALTER TABLE `adress` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cart` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `IdProduct` int DEFAULT NULL,
  `IdUser` int DEFAULT NULL,
  `IdStatus` int DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Id_UNIQUE` (`Id`),
  KEY `IdUserC_idx` (`IdUser`),
  KEY `IdProduct_idx` (`IdProduct`),
  KEY `IdStatus_idx` (`IdStatus`),
  CONSTRAINT `IdProductC` FOREIGN KEY (`IdProduct`) REFERENCES `product` (`Id`),
  CONSTRAINT `IdStatusC` FOREIGN KEY (`IdStatus`) REFERENCES `status` (`Id`),
  CONSTRAINT `IdUserC` FOREIGN KEY (`IdUser`) REFERENCES `user` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT INTO `cart` VALUES (1,1,1,4),(2,2,2,4),(3,2,2,4),(4,3,3,4),(5,4,5,4),(6,4,4,4),(7,5,6,4),(8,2,7,4),(9,5,6,4),(10,2,7,4),(11,6,8,4),(12,7,9,4),(13,4,10,4),(14,7,11,4),(15,8,12,4),(16,9,20,4),(17,7,2,4),(18,10,1,4),(19,11,3,4),(20,11,2,4);
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Id_UNIQUE` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Portatiles'),(2,'Ordenadores'),(3,'Impresoras'),(4,'Monitores'),(5,'Ratones'),(6,'Teclados'),(7,'Celulares'),(8,'Tablets'),(9,'Ausifonos'),(10,'Camaras'),(11,'Microfonos'),(12,'Accesorios'),(13,'Otros'),(14,'Smartwatch');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `commentarie`
--

DROP TABLE IF EXISTS `commentarie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `commentarie` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Commentarie` varchar(500) DEFAULT NULL,
  `Date` varchar(45) DEFAULT NULL,
  `Rate` int DEFAULT NULL,
  `IdUser` int DEFAULT NULL,
  `IdProduct` int DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Id_UNIQUE` (`Id`),
  KEY `IdUserCo_idx` (`IdUser`),
  KEY `IdProduct_idx` (`IdProduct`),
  CONSTRAINT `IdProductCo` FOREIGN KEY (`IdProduct`) REFERENCES `product` (`Id`),
  CONSTRAINT `IdUserCo` FOREIGN KEY (`IdUser`) REFERENCES `user` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commentarie`
--

LOCK TABLES `commentarie` WRITE;
/*!40000 ALTER TABLE `commentarie` DISABLE KEYS */;
INSERT INTO `commentarie` VALUES (1,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum','2022-01-11',5,1,1),(2,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum','2022-01-11',5,1,2),(3,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum','2022-01-11',5,2,3),(4,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum','2022-01-11',2,1,4),(5,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum','2022-01-11',2,3,3),(6,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum','2022-01-11',2,4,2),(7,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum','2022-01-11',4,2,1),(8,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum','2022-01-11',3,5,4),(9,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum','2022-01-11',1,4,4),(10,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum','2022-01-11',4,5,5),(11,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum','2022-01-11',4,5,1),(12,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum','2022-01-11',4,16,5),(13,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum','2022-01-11',5,17,6),(14,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum','2022-01-11',1,1,1),(15,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum','2022-01-11',5,2,6),(16,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum','2022-01-11',3,20,6),(17,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum','2022-01-11',5,2,7),(18,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum','2022-01-11',3,4,1),(19,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum','2022-01-11',5,5,6),(20,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum','2022-01-11',5,6,1);
/*!40000 ALTER TABLE `commentarie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paymentmethod`
--

DROP TABLE IF EXISTS `paymentmethod`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `paymentmethod` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Name` tinytext,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Id_UNIQUE` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paymentmethod`
--

LOCK TABLES `paymentmethod` WRITE;
/*!40000 ALTER TABLE `paymentmethod` DISABLE KEYS */;
INSERT INTO `paymentmethod` VALUES (1,'Paypal'),(2,'Tarjeta'),(3,'Efectivo'),(4,'Google Pay');
/*!40000 ALTER TABLE `paymentmethod` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) DEFAULT NULL,
  `Description` varchar(500) DEFAULT NULL,
  `Price` int NOT NULL,
  `Stock` int(10) unsigned zerofill DEFAULT NULL,
  `Image` varchar(150) DEFAULT NULL,
  `IdCategory` int DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Id_UNIQUE` (`Id`),
  KEY `IdCategory_idx` (`IdCategory`),
  CONSTRAINT `IdCategory` FOREIGN KEY (`IdCategory`) REFERENCES `category` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=167 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'Epson EcoTank ET-14000 Impresora A3 Color ','Te presentamos la EcoTank ET-1400 de Epson, una impresora A3+ a un precio competitivo y sin complicaciones para oficinas pequeñas y domésticas. Incluye miles de páginas de tinta y ofrece el coste por página A3 más bajo del mercado1. Esta impresora A3+ EcoTank ofrece grandes rendimientos a un coste muy bajo gracias a sus depósitos de tinta de gran capacidad. Sin complicaciones ni imprevistos, el modelo ET-14000 no sólo resulta económico, sino también muy fácil de mantener.',5000,0000000002,'https://img.freepik.com/vector-gratis/coleccion-aparatos-electronicos_1294-17.jpg?1?w=2000',3),(2,'HP Officejet Pro X451DW Duplex+WiFi ','Aumente la eficiencia de los grupos de trabajo con esta impresora inalámbrica de alta productividad, y nueva generación. Imprima en color con calidad profesional y hasta el doble de velocidad[1] reduciendo a la mitad el coste por página de impresoras láser [2] usando la Tecnología HP PageWide.',3000,0000000004,'https://img.freepik.com/vector-gratis/coleccion-aparatos-electronicos_1294-17.jpg?1?w=2000',3),(3,'HP LaserJet Pro M252DW Láser Dúplex Color WiFi','Te presentamos en PcComponentes la LaserJet Pro M252DW de HP, una impresora láser a color con función dúplex y tecnología WiFi. Estas impresoras están creadas para funcionar con el tóner químicamente más avanzado: los nuevos cartuchos de tóner Original HP con JetIntelligence. Esta impresora compacta ha sido diseñada para responder a las necesidades de tu empresa en crecimiento.',2500,0000000005,'https://img.freepik.com/vector-gratis/coleccion-aparatos-electronicos_1294-17.jpg?1?w=2000',3),(4,'Canon Pixma iX6850 A3 WiFi','Esta impresora A3+ para oficina de alto rendimiento ofrece conectividad Wi-Fi y Ethernet, además de impresión desde dispositivos móviles. Los 5 depósitos de tinta independientes ofrecen de forma eficaz documentos empresariales y fotografías de calidad excelente.',5000,0000000007,'https://img.freepik.com/vector-gratis/coleccion-aparatos-electronicos_1294-17.jpg?1?w=2000',3),(5,'Canon Pixma iP7250 Impresora WiFi','Impresora fotográfica de alto rendimiento con 5 tintas individuales, conectividad Wi-Fi e impresión desde smartphone. Diseño de perfil bajo con dos bandejas de papel completamente integradas, impresión a doble cara automática y Direct Disc Print.',5000,0000000005,'https://img.freepik.com/vector-gratis/coleccion-aparatos-electronicos_1294-17.jpg?1?w=2000',3),(6,'PcCom BattleBox VR NVIDIA i7-6700K/16GB/2TB+500GB SSD/GTX980Ti ','La nueva línea de Pcs de sobremesa para trabajos audiovisuales, creado tras un amplio trabajo de investigación para ofrecer el mayor rendimiento y optimización para nuestros clientes. Ensamblados por nuestros expertos de montaje, los nuevos PcCom ofrecen un rendimiento increíble, con máxima velocidad, capacidad de ampliación y un amplio abanico de posibilidades dentro de la gama, en la que podrás elegir el producto óptimo según las necesidades y el tipo de Pc que estas buscando.',1000,0000000002,'https://img.freepik.com/vector-gratis/coleccion-aparatos-electronicos_1294-17.jpg?1?w=2000',2),(7,'PcCom Gaming RedDragon Hero Plus i7-6700K/16GB/2TB+SSD250GB/GTX 980Ti','La nueva línea de Pcs de sobremesa con componentes para juegos creada tras un amplio trabajo de investigación para ofrecer el mayor rendimiento y optimización en el juego para nuestros clientes. Ensamblados por nuestros expertos de montaje, los nuevos PcCom ofrecen un rendimiento increíble, con máxima velocidad, capacidad de ampliación y un amplio abanico de posibilidades dentro de la gama, en la que podrá elegir el producto óptimo según las necesidades y el tipo de Pc que está buscando. ',17890,0000000000,'https://img.freepik.com/vector-gratis/coleccion-aparatos-electronicos_1294-17.jpg?1?w=2000',2),(8,'Asus ROG G20AJ i7-4790/16GB/GTX760/1TB+128SSD','El ROG G20 está diseñado para dominar el segmento de sobremesas gaming compactos, y ya ha sido aclamado por la crítica internacional recibiendo los premios Best Choice of the Year y Golden Awards en la Computex 2014. El G20 presenta una compacta carcasa de 12,5 litros de volumen que incorpora un procesador Intel® Core? i7 de 4.ª generación y una gráfica NVIDIA® GeForce® GTX 780 .',13500,0000000004,'https://img.freepik.com/vector-gratis/coleccion-aparatos-electronicos_1294-17.jpg?1?w=2000',2),(9,'PcCom Gaming Bronze Ultra i3-6100/8GB/SSD 120GB + 1TB/GTX 960 ','La nueva línea de Pcs de sobremesa para juegos creada tras un amplio trabajo de investigación para ofrecer el mayor rendimiento y optimización en el juego para nuestros clientes. Ensamblados por nuestros expertos de montaje, los nuevos PcCom ofrecen un rendimiento increíble, con máxima velocidad, capacidad de ampliación y un amplio abanico de posibilidades dentro de la gama, en la que podrás elegir el producto óptimo según las necesidades y el tipo de Pc que estas buscando. ',20525,0000000001,'https://img.freepik.com/vector-gratis/coleccion-aparatos-electronicos_1294-17.jpg?1?w=2000',2),(10,'MSI Vortex G65 6QF(SLI)-048ES Intel i7-6700K/64GB/1TB+512SSD/2xGTX980','Procesador Intel® Core i7-6700K (2.53 GHz, 3 MB)',4399,0000000004,'https://img.freepik.com/vector-gratis/coleccion-aparatos-electronicos_1294-17.jpg?1?w=2000',2),(11,'Acer Predator XZ350CU 35 2K LED Curvo','Te presentamos uno de los mejores monitores Gaming del mercado. El Acer XZ350CU es un monitor Curvo con tecnología LED de 35\" que te ofrece una impresionante imagen con resolución 2K y con un tiempo de respuesta rápido de tán solo 4ms',8490,0000000001,'https://img.freepik.com/vector-gratis/coleccion-aparatos-electronicos_1294-17.jpg?1?w=2000',4),(12,'BenQ BL3201PT LED 32 Ultra HD 4K','Te presentamos el monitor BenQ BL3201PT Ultra HD 4K, el primer monitor 32\" 4K creado para diseñadores.',8990,0000000002,'https://img.freepik.com/vector-gratis/coleccion-aparatos-electronicos_1294-17.jpg?1?w=2000',4),(13,'LG 34UC98-W 34 LED Curvo','Te presentamos el 34UC98-W de LG, un monitor de 34\" curvo con retroiluminación LED y resolución 3440 x 1440 QHD',5870,0000000004,'https://img.freepik.com/vector-gratis/coleccion-aparatos-electronicos_1294-17.jpg?1?w=2000',4),(14,'Dell UltraSharp S2715H 27 LED','Manténgase conectado. Disfrute del entretenimiento. ºSumérjase en la claridad y el increíble audio de la pantalla panorámica con un monitor multimedia fiable que se conecta sin problemas a las opciones de entretenimiento que más le gustan.',2500,0000000002,'https://img.freepik.com/vector-gratis/coleccion-aparatos-electronicos_1294-17.jpg?1?w=2000',4),(15,'BenQ XL2730Z 27 LED 144Hz QHD','El monitor gaming de próxima generación XL2730Z está diseñado para sacar lo mejor de cada jugador. Los nuevos procedimientos se han establecido para mejorar la experiencia de juego más fluida y rápida con la incorporación de características de movimiento y de juego rápido perfectos en el nuevo XL2730Z. La combinación impecable de resolución QHD, frecuencia de actualización de 144Hz, el tiempo de respuesta de 1 ms GTG y tecnología.',6000,0000000004,'https://img.freepik.com/vector-gratis/coleccion-aparatos-electronicos_1294-17.jpg?1?w=2000',4),(16,'Acer Aspire E5-573 Intel Core i3-4005U/4GB/500GB/15.6','Este portátil barato Acer E5-573 disfruta de unas características especialmente diseñadas para satisfacer todas tus necesidades profesionales y personales.',20000,0000000000,'https://img.freepik.com/vector-gratis/coleccion-aparatos-electronicos_1294-17.jpg?1?w=2000',1),(17,'Acer Aspire E5-573G-501Z i5-5200U/8GB/128GB SSD/15.6','Este portátil barato Acer E5-573 disfruta de unas características especialmente diseñadas para satisfacer todas tus necesidades profesionales y personales.',8000,0000000001,'https://img.freepik.com/vector-gratis/coleccion-aparatos-electronicos_1294-17.jpg?1?w=2000',1),(18,'MSI WT72 6QM-646ES Xeon E3-1505M V5/32GB/1TB+256SSD/M5000M/17.3','Te presentamos el WorkStation WT72 6QM-646ES de MSI, un WorkStation para los más exigentes en su trabajo. Con un procesador Intel Xeon E3, 32GB de RAM y 1TB + 256GB SSD de disco duro y una tarjeta Quadro M5000M de 8GB. Esta workstation cuenta con certificación ISV para AutoCAD, SolidWorks y PTC Creo.',5599,0000000010,'https://img.freepik.com/vector-gratis/coleccion-aparatos-electronicos_1294-17.jpg?1?w=2000',1),(19,'MSI GS70 2PE-013ES i7-4700MQ/8GB/1TB+128 SSD/GTX870M/17.3','MSI GS70 2PE-0613 ES es un nuevo modelo de la serie de ordenadores portátiles MSI que ya incorporan la última generación de procesadores , pensados para el mundo gamer.',1465,0000000002,'https://img.freepik.com/vector-gratis/coleccion-aparatos-electronicos_1294-17.jpg?1?w=2000',1),(20,'HP Envy 15-K202NS i7-5500U/8GB/1TB/GTX 850M/15.6','HP ENVY con funciones completas está optimizado para la última experiencia de Windows 8.1 para mantenerse activo todo el día. Disfruta de un ordenador con un potente procesador i7, 8GB de memoria RAM para sacarle el mejor rendimiento y para que no te preocupes por el almacenamiento de tus datos, un disco duro integrado de 1TB.podrás disfrutar de tus juegos favoritos gracias a su gráfica Nvidia GTX850M con 4GB dedicados exclusivamente para que seas el ganador en todas tus partidas.',5201,0000000007,'https://img.freepik.com/vector-gratis/coleccion-aparatos-electronicos_1294-17.jpg?1?w=2000',1);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sale`
--

DROP TABLE IF EXISTS `sale`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sale` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Date` date NOT NULL,
  `Total` int NOT NULL,
  `IdPaymentMethod` int DEFAULT NULL,
  `IdStatus` int DEFAULT NULL,
  `IdUser` int DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Id_UNIQUE` (`Id`),
  KEY `IdUser_idx` (`IdUser`),
  KEY `IdStatus_idx` (`IdStatus`),
  KEY `IdPaymentMethod_idx` (`IdPaymentMethod`),
  CONSTRAINT `IdPaymentMethod` FOREIGN KEY (`IdPaymentMethod`) REFERENCES `paymentmethod` (`Id`),
  CONSTRAINT `IdStatus` FOREIGN KEY (`IdStatus`) REFERENCES `status` (`Id`),
  CONSTRAINT `IdUserS` FOREIGN KEY (`IdUser`) REFERENCES `user` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sale`
--

LOCK TABLES `sale` WRITE;
/*!40000 ALTER TABLE `sale` DISABLE KEYS */;
INSERT INTO `sale` VALUES (1,'2022-01-22',10000,1,1,1),(2,'2022-01-10',20000,1,1,20),(3,'2022-01-11',40000,1,1,2),(4,'2022-01-12',5000,1,1,3),(5,'2022-01-13',5000,1,1,4),(6,'2022-01-14',5000,1,1,5),(7,'2022-01-15',20000,1,1,6),(8,'2022-01-16',5201,1,1,7),(9,'2022-01-17',6000,3,6,8),(10,'2022-01-18',3000,3,6,9),(11,'2022-01-01',3000,3,6,10),(12,'2022-01-02',2500,3,6,11),(13,'2022-01-03',10000,3,6,13),(14,'2022-01-04',5000,3,6,12),(15,'2022-01-05',5000,3,6,14),(16,'2022-01-06',5000,2,7,15),(17,'2022-01-07',5000,2,6,16),(18,'2022-01-08',15000,2,7,17),(19,'2022-01-09',6000,2,3,18),(20,'2022-01-19',20000,2,3,19);
/*!40000 ALTER TABLE `sale` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `saledetail`
--

DROP TABLE IF EXISTS `saledetail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `saledetail` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Price` int DEFAULT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Amount` int DEFAULT NULL,
  `Image` varchar(150) DEFAULT NULL,
  `IdSale` int DEFAULT NULL,
  `IdProduct` int DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Id_UNIQUE` (`Id`),
  KEY `IdSale_idx` (`IdSale`),
  KEY `IdProduct_idx` (`IdProduct`),
  CONSTRAINT `IdProduct` FOREIGN KEY (`IdProduct`) REFERENCES `product` (`Id`),
  CONSTRAINT `IdSale` FOREIGN KEY (`IdSale`) REFERENCES `sale` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `saledetail`
--

LOCK TABLES `saledetail` WRITE;
/*!40000 ALTER TABLE `saledetail` DISABLE KEYS */;
INSERT INTO `saledetail` VALUES (1,5000,'Epson EcoTank ET-14000 Impresora A3 Color ',2,'https://img.freepik.com/vector-gratis/coleccion-aparatos-electronicos_1294-17.jpg?1?w=2000',1,1),(2,5000,'Canon Pixma iX6850 A3 WiFi',4,'https://img.freepik.com/vector-gratis/coleccion-aparatos-electronicos_1294-17.jpg?1?w=2000',2,4),(3,20000,'Acer Aspire E5-573 Intel Core i3-4005U/4GB/500GB/15.6',2,'https://img.freepik.com/vector-gratis/coleccion-aparatos-electronicos_1294-17.jpg?1?w=2000',3,19),(4,2500,'Dell UltraSharp S2715H 27 LED',2,'https://img.freepik.com/vector-gratis/coleccion-aparatos-electronicos_1294-17.jpg?1?w=2000',4,10),(5,5000,'Epson EcoTank ET-14000 Impresora A3 Color ',1,'https://img.freepik.com/vector-gratis/coleccion-aparatos-electronicos_1294-17.jpg?1?w=2000',5,1),(6,2500,'Dell UltraSharp S2715H 27 LED',2,'https://img.freepik.com/vector-gratis/coleccion-aparatos-electronicos_1294-17.jpg?1?w=2000',6,14),(7,20000,'Acer Aspire E5-573 Intel Core i3-4005U/4GB/500GB/15.6',1,'https://img.freepik.com/vector-gratis/coleccion-aparatos-electronicos_1294-17.jpg?1?w=2000',7,16),(8,5201,'HP Envy 15-K202NS i7-5500U/8GB/1TB/GTX 850M/15.6',1,'https://img.freepik.com/vector-gratis/coleccion-aparatos-electronicos_1294-17.jpg?1?w=2000',8,20),(9,6000,'BenQ XL2730Z 27 LED 144Hz QHD',1,'https://img.freepik.com/vector-gratis/coleccion-aparatos-electronicos_1294-17.jpg?1?w=2000',9,15),(10,3000,'HP Officejet Pro X451DW Duplex+WiFi ',1,'https://img.freepik.com/vector-gratis/coleccion-aparatos-electronicos_1294-17.jpg?1?w=2000',10,2),(11,3000,'HP Officejet Pro X451DW Duplex+WiFi ',1,'https://img.freepik.com/vector-gratis/coleccion-aparatos-electronicos_1294-17.jpg?1?w=2000',11,2),(12,2500,'HP LaserJet Pro M252DW Láser Dúplex Color WiFi',1,'https://img.freepik.com/vector-gratis/coleccion-aparatos-electronicos_1294-17.jpg?1?w=2000',12,3),(13,5000,'Epson EcoTank ET-14000 Impresora A3 Color ',2,'https://img.freepik.com/vector-gratis/coleccion-aparatos-electronicos_1294-17.jpg?1?w=2000',13,1),(14,5000,'Canon Pixma iX6850 A3 WiFi',1,'https://img.freepik.com/vector-gratis/coleccion-aparatos-electronicos_1294-17.jpg?1?w=2000',14,4),(15,5000,'Epson EcoTank ET-14000 Impresora A3 Color ',1,'https://img.freepik.com/vector-gratis/coleccion-aparatos-electronicos_1294-17.jpg?1?w=2000',15,1),(16,5000,'Canon Pixma iX6850 A3 WiFi',1,'https://img.freepik.com/vector-gratis/coleccion-aparatos-electronicos_1294-17.jpg?1?w=2000',16,4),(17,5000,'Canon Pixma iX6850 A3 WiFi',1,'https://img.freepik.com/vector-gratis/coleccion-aparatos-electronicos_1294-17.jpg?1?w=2000',17,4),(18,5000,'Epson EcoTank ET-14000 Impresora A3 Color ',3,'https://img.freepik.com/vector-gratis/coleccion-aparatos-electronicos_1294-17.jpg?1?w=2000',18,1),(19,1000,'PcCom BattleBox VR NVIDIA i7-6700K/16GB/2TB+500GB SSD/GTX980Ti ',3,'https://img.freepik.com/vector-gratis/coleccion-aparatos-electronicos_1294-17.jpg?1?w=2000',19,6),(20,5000,'Epson EcoTank ET-14000 Impresora A3 Color ',4,'https://img.freepik.com/vector-gratis/coleccion-aparatos-electronicos_1294-17.jpg?1?w=2000',20,1);
/*!40000 ALTER TABLE `saledetail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `status` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Id_UNIQUE` (`Id`),
  UNIQUE KEY `Name_UNIQUE` (`Name`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (5,'Cancelado'),(3,'En camino'),(1,'En proceso'),(6,'Entregado'),(2,'Enviado'),(4,'Guardado'),(7,'Rembolso');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Name` text,
  `LastName` text,
  `PhoneNumber` varchar(15) DEFAULT NULL,
  `CardNumber` varchar(16) DEFAULT NULL,
  `Image` varchar(150) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Id_UNIQUE` (`Id`),
  UNIQUE KEY `Email_UNIQUE` (`Email`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Luisiana','Checa Trillo','4493568941','1234567812348765','https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png','seiyaquafrouquoi-5453@yopmail.com','usuario12345'),(2,'Anna','Abascal Pinedo','4496582341','1234567891236578','https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png','fovatraulauppei-5823@yopmail.com','usuario12345'),(3,'Vidal','Gutiérrez Ribas','4496518637','','https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png','douppuquinneipru-3698@yopmail.com','usuario12345'),(4,'Lupe',' Marti Arnal','4496513270','','https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png','heucouxommeke-8066@yopmail.com','usuario12345'),(5,'Reyna','Espejo Arco','4496302158','1234567891236578','https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png','trurafreudeita-5508@yopmail.com','usuario12345'),(6,'Benito','Gimeno Porras','4490085740','1234567891236578','https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png','nuprutrubuzi-9528@yopmail.com','usuario12345'),(7,'Monica','Arco Donoso','4492103568','1234567891236578','https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png','queubrunnohita-9165@yopmail.com','usuario12345'),(8,'Carmelita','Carbonell Alegria','4496320157','','https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png','kogrepraxadeu-1181@yopmail.com','usuario12345'),(9,'Fortunato','Lamas Dalmau','4496532015','1234567891236578','https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png','sauweukazoufru-5939@yopmail.com','usuario12345'),(10,'Nereida','Cal Ferrándiz','4490000230','','https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png','quefrafoiffoiku-4414@yopmail.com','usuario12345'),(11,'Harold','Martorell Iglesias','4496230125','1234567891236578','https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png','poxovefutu-4865@yopmail.com','usuario12345'),(12,'Rosario','Guerrero Pastor','4492103002','1234567891236578','https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png','pessugeuzaxo-4318@yopmail.com','usuario12345'),(13,'Florenciano','Gámez Morell','4492102130','1234567891236578','https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png','wannauppettebre-8643@yopmail.com','usuario12345'),(14,'Martin','Aramburu Mancebo','4492300115','','https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png','bepaujeppeiru-2262@yopmail.com','usuario12345'),(15,'Nico Eusebio','Calvet Chico','4498653021','1234567891236578','https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png','prazehauwodda-6748@yopmail.com','usuario12345'),(16,'Amancio','Velasco Vila','4496320187','1234567891236578','https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png','triwoinniwefi-3587@yopmail.com','usuario12345'),(17,'Nuria','Cabrera Roig','4496301002','','https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png','tauttiniyausi-2957@yopmail.com','usuario12345'),(18,'Lucio','Rodriguez Corominas','4496301120','1234567891236578','https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png','dunacauprafau-8446@yopmail.com','usuario12345'),(19,'Juliana','Español Mármol','4496320015','','https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png','kabrotriveiyei-2402@yopmail.com','usuario12345'),(20,'Adan','Jódar Quero','4498630215','','https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png','yecripauffeirou-3054@yopmail.com','usuario12345');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `useradress`
--

DROP TABLE IF EXISTS `useradress`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `useradress` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `IdUser` int NOT NULL,
  `IdAdress` int NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Id_UNIQUE` (`Id`),
  KEY `IdUser_idx` (`IdUser`),
  KEY `IdAdress_idx` (`IdAdress`),
  CONSTRAINT `IdAdress` FOREIGN KEY (`IdAdress`) REFERENCES `adress` (`Id`),
  CONSTRAINT `IdUser` FOREIGN KEY (`IdUser`) REFERENCES `user` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `useradress`
--

LOCK TABLES `useradress` WRITE;
/*!40000 ALTER TABLE `useradress` DISABLE KEYS */;
INSERT INTO `useradress` VALUES (1,1,1),(2,2,2),(3,3,3),(4,4,4),(5,5,5),(6,6,6),(7,7,7),(8,8,8),(9,9,9),(10,10,10),(11,11,11),(12,12,12),(13,13,13),(14,14,14),(15,15,15),(16,16,16),(17,17,17),(18,18,18),(19,19,19),(20,20,20);
/*!40000 ALTER TABLE `useradress` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-22 21:23:29
