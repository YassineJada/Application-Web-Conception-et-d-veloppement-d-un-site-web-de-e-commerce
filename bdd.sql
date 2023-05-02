-- MySQL dump 10.13  Distrib 8.0.22, for Win64 (x86_64)
--
-- Host: localhost    Database: ecommestg
-- ------------------------------------------------------
-- Server version	8.0.22

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
-- Table structure for table `administration`
--

DROP TABLE IF EXISTS `administration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `administration` (
  `user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `FullNom` varchar(50) NOT NULL,
  `type` varchar(45) NOT NULL,
  UNIQUE KEY `user` (`user`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administration`
--

LOCK TABLES `administration` WRITE;
/*!40000 ALTER TABLE `administration` DISABLE KEYS */;
INSERT INTO `administration` VALUES ('admin','toor','younss@youns.com','younss bouch','super'),('samiratwila','azertyu','samira@gmail.com','samira','normal'),('younss','password','amigo@youns.com','alamie bouch',''),('younssbouche','younss123@','youssbouche@gmail.com','younesbouche','super');
/*!40000 ALTER TABLE `administration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catégorie`
--

DROP TABLE IF EXISTS `catégorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `catégorie` (
  `Ncatégorie` varchar(50) NOT NULL,
  `desci` varchar(50) NOT NULL,
  `cimage` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Ncatégorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catégorie`
--

LOCK TABLES `catégorie` WRITE;
/*!40000 ALTER TABLE `catégorie` DISABLE KEYS */;
INSERT INTO `catégorie` VALUES ('Clothes','Clothes Catégorie','../img/categories/Clothes.jpg'),('electronique','Bla bla ','img/categories/electronique.jpg'),('Food','Food catégories','../img/categories/Food.jpg'),('vegetable','vegetable','img/categories/vegetable.jpg');
/*!40000 ALTER TABLE `catégorie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `commande`
--

DROP TABLE IF EXISTS `commande`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `commande` (
  `numcomand` int NOT NULL,
  `prodpid` int NOT NULL,
  `cdate` date NOT NULL,
  `time` varchar(45) NOT NULL,
  `pquantité` float NOT NULL,
  `prix` float NOT NULL,
  `cstatus` varchar(50) NOT NULL DEFAULT 'en attendre',
  `Cfullnome` varchar(50) NOT NULL,
  `Ville` varchar(45) NOT NULL,
  `Cadress` varchar(50) NOT NULL,
  `Zipcode` int DEFAULT NULL,
  `cPmode` varchar(50) NOT NULL,
  `Cphone` varchar(50) NOT NULL,
  `CIN` varchar(50) NOT NULL,
  `cemail` varchar(50) NOT NULL,
  KEY `cPmode` (`cPmode`),
  KEY `prodpid` (`prodpid`),
  CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`cPmode`) REFERENCES `paimentmode` (`pmode`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `commande_ibfk_2` FOREIGN KEY (`prodpid`) REFERENCES `produit` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commande`
--

LOCK TABLES `commande` WRITE;
/*!40000 ALTER TABLE `commande` DISABLE KEYS */;
INSERT INTO `commande` VALUES (1327791623,50,'2021-06-15','01:56:42',20,93,'En Attendre','Amine Laaguidi','Houara','Rue salam ER',900876,'COD','+213498596007','JL12SD','jada@yahooo.com'),(1691288373,47,'2021-06-15','09:06:19',1,20,'Expédié','Younes','AGADIR','Rue salam ER',35000,'COD','343434555543','JT90340','younssjadz@indi.com'),(1098332002,54,'2021-06-15','09:26:00',3,55.8,'Expédié','Younes Bocubouk','Agadir','Rue nahda ta9adom',83380,'COD','+2123948839348','JLC2322','Younss@yahoo.com'),(1276790572,47,'2021-06-15','09:26:56',4,80,'Expédié','Mohamed Ait hassou','Casablanca','Casa wlah ma3rft finn',35000,'COD','+23210992837','JC189582','Amine@yahoo.com'),(1507462771,49,'2021-06-15','09:28:42',1,50,'annulé','Sofiane El Kaceem','agadir','Rue slam',83350,'COD','+232102993029','AGAdir','Sofian@yahoo.com'),(1507462771,51,'2021-06-15','09:28:42',2,234,'annulé','Sofiane El Kaceem','agadir','Rue slam',83350,'COD','+232102993029','AGAdir','Sofian@yahoo.com'),(802182294,51,'2021-06-15','09:31:34',1,117,'annulé','Amine laaguidi','Agadir','Rue salam ER',80000,'COD','+21256789876','JC189582','Aithassou@gmail.Com'),(413394700,49,'2021-06-15','09:50:14',1,50,'retour','yassin jada','Casa','Rue salam ER',83350,'COD','+213498596007','JL12123','Amine@yahoo.com'),(413394700,47,'2021-06-15','09:50:14',5,100,'retour','yassin jada','Casa','Rue salam ER',83350,'COD','+213498596007','JL12123','Amine@yahoo.com'),(1858322356,54,'2021-06-16','01:03:13',1,18.6,'retour','younes bouchbouk','AGADIR','Rue salam ER',35000,'COD','+212 680439281','JC189582','Amine@yahoo.com'),(1103066592,49,'2021-06-17','12:34:02',1,50,'En Attendre','Mohamed Ait hassou','AGADIREE','Reu nahda Lampard',600000988,'COD','+328377848473','JT90340','Amine@yahoo.com'),(209351821,54,'2021-06-19','11:20:22',1,18.6,'Expédié','Mohamed Ait hassou','AGADIREE','Reu nahda Lampard',600,'COD','+328377848473','JT90340','Amine@gmail.com'),(1036085856,54,'2021-06-20','11:43:23',4,74.4,'retour','Mohamed Ait hassou','AGADIREE','Reu nahda Lampard',600000988,'COD','+328377848473','JT90340','Amine@gmail.com'),(2021583390,67,'2021-06-22','10:57:27',1,255,'retour','Mohamed Ait','AGADIREE','Reu nahda Lampard',600000988,'COD','+328377848473','JT90330','Amine@gmail.com'),(2021583390,47,'2021-06-22','10:57:27',2.5,50,'retour','Mohamed Ait','AGADIREE','Reu nahda Lampard',600000988,'COD','+328377848473','JT90330','Amine@gmail.com'),(2021583390,65,'2021-06-22','10:57:27',3,351,'retour','Mohamed Ait','AGADIREE','Reu nahda Lampard',600000988,'COD','+328377848473','JT90330','Amine@gmail.com'),(2057307345,49,'2021-06-22','11:23:55',3,139.5,'retour','Mohamed Ait','AGADIREE','Reu nahda Lampard',600,'COD','+328377848473','JT90330','Amine@gmail.com');
/*!40000 ALTER TABLE `commande` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paimentmode`
--

DROP TABLE IF EXISTS `paimentmode`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `paimentmode` (
  `pmode` varchar(50) NOT NULL,
  PRIMARY KEY (`pmode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paimentmode`
--

LOCK TABLES `paimentmode` WRITE;
/*!40000 ALTER TABLE `paimentmode` DISABLE KEYS */;
INSERT INTO `paimentmode` VALUES ('COD'),('Paypal');
/*!40000 ALTER TABLE `paimentmode` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prodimages`
--

DROP TABLE IF EXISTS `prodimages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `prodimages` (
  `pid` int NOT NULL,
  `imgpath` varchar(50) NOT NULL,
  `img2` varchar(45) DEFAULT NULL,
  `img3` varchar(45) DEFAULT NULL,
  UNIQUE KEY `imgpath` (`imgpath`),
  KEY `produit_ibfk_1` (`pid`),
  CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `produit` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prodimages`
--

LOCK TABLES `prodimages` WRITE;
/*!40000 ALTER TABLE `prodimages` DISABLE KEYS */;
INSERT INTO `prodimages` VALUES (47,'img/produits/471.jpg','img/produits/472.jpg','img/produits/473.jpg'),(49,'img/produits/491.jpg','img/produits/492.jpg','img/produits/493.jpg'),(50,'img/produits/501.jpg','img/produits/502.jpg','img/produits/503.jpg'),(51,'img/produits/511.jpg','img/produits/512.jpg','img/produits/513.jpg'),(54,'img/produits/541.jpg','img/produits/542.jpg','img/produits/543.jpg'),(62,'img/produits/621.jpg','img/produits/622.jpg','img/produits/623.jpg'),(64,'img/produits/641.jpg','img/produits/642.jpg','img/produits/643.jpg'),(65,'img/produits/651.jpg','img/produits/652.jpg','img/produits/653.jpg'),(66,'img/produits/661.jpg','img/produits/662.jpg','img/produits/663.jpg'),(67,'img/produits/671.jpg','img/produits/672.jpg','img/produits/673.jpg'),(68,'img/produits/681.jpg','img/produits/682.jpg','img/produits/683.jpg'),(69,'img/produits/691.jpg','img/produits/692.jpg','img/produits/693.jpg');
/*!40000 ALTER TABLE `prodimages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produit`
--

DROP TABLE IF EXISTS `produit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `produit` (
  `pid` int NOT NULL AUTO_INCREMENT,
  `ptitre` varchar(300) NOT NULL,
  `pcategorie` varchar(50) NOT NULL,
  `quantité` float NOT NULL DEFAULT '0',
  `discount` float NOT NULL DEFAULT '0',
  `prixV` float NOT NULL,
  `prixA` float NOT NULL,
  `ptype` varchar(50) NOT NULL,
  `desci` varchar(500) DEFAULT NULL,
  `tva` float DEFAULT '0',
  PRIMARY KEY (`pid`,`ptitre`),
  UNIQUE KEY `ptitre` (`ptitre`),
  KEY `produiitfk1` (`pcategorie`),
  KEY `typeprud_idx` (`ptype`),
  CONSTRAINT `Fk_produittype` FOREIGN KEY (`ptype`) REFERENCES `typeproduite` (`ntype`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `produiitfk1` FOREIGN KEY (`pcategorie`) REFERENCES `catégorie` (`Ncatégorie`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produit`
--

LOCK TABLES `produit` WRITE;
/*!40000 ALTER TABLE `produit` DISABLE KEYS */;
INSERT INTO `produit` VALUES (47,'carotte fraîche','vegetable',9,0,20,5,'poder','qsdsqd',0),(49,'pomme de terre fraîche','vegetable',20,7,50,30,'poder','sdfdsfdsfdsf',4),(50,'chou-fleur frais','vegetable',50,7,18,10,'poder','qsdsqd',6),(51,'petits pois frais','vegetable',40,22,150,100,'poder','dsqfdsfdsf',12),(54,'Celry stakjs ','vegetable',16,7,20,10,'poder','qsdsqd',6),(62,'ZAFUL Chemise Rayée Imprimée Boutonnée Avec Poche - Bleu Xxl','Clothes',5,99,60,20,'physical','amklksdf',4),(64,'Chemise Rayée Imprimée Demi-Boutonné ','Clothes',50,10,22,5,'physical','qsdsqd',6),(65,'Chemise Rayée à Ourlet Courbe','Clothes',80,22,150,60,'physical','dsqfdsfdsf',12),(66,'ZAFUL T-shirt Rose Brodée à Manches Courtes ','Clothes',44,0,55,20,'physical','sdfdsfdsfdsf',3),(67,'Short Cargo Lettre Imprimée En Blocs De C','Clothes',50,15,300,150,'physical','sdfdsfdsfdsf',10),(68,'Salopette Déchirée Zippée en Couleur Unie e','Clothes',50,20,150,50,'physical','sdfdsfdsfdsf',13),(69,'ZAFUL T-shirt Caractère Chinois Curture Graphique Dragon - Noir S','Clothes',50,10,300,100,'physical','sdfdsfdsfdsf',19);
/*!40000 ALTER TABLE `produit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tclient`
--

DROP TABLE IF EXISTS `tclient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tclient` (
  `cuser` varchar(100) NOT NULL,
  `cpassword` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `nomc` varchar(50) DEFAULT NULL,
  `adress` varchar(100) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `codepostal` varchar(50) DEFAULT NULL,
  `cin` varchar(50) DEFAULT NULL,
  `tele` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`cuser`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tclient`
--

LOCK TABLES `tclient` WRITE;
/*!40000 ALTER TABLE `tclient` DISABLE KEYS */;
INSERT INTO `tclient` VALUES ('lutherupton','azert@@','Amine@gmail.com','Mohamed Ait','Reu nahda Lampard','AGADIREE','600','JT90330','+328377848473'),('omarkader','omare1123','younss.india@mail.com','Omarsalmo','Rue salam','agadir','83359','JC231123','+32993849938'),('soufianeelkaceem','sosososo','sofianeza@gmail.com','sofiane','Rue sssas','Agadir','83350','JC34393984','0654588473'),('YounesBouchbe','Amigoamigo','younss@gmail.com','Younes Bocubouk','Rue nahde ','Agdire','6599584','JC343543','43495958493');
/*!40000 ALTER TABLE `tclient` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typeproduite`
--

DROP TABLE IF EXISTS `typeproduite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `typeproduite` (
  `ntype` varchar(50) NOT NULL,
  `unite` varchar(10) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`ntype`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typeproduite`
--

LOCK TABLES `typeproduite` WRITE;
/*!40000 ALTER TABLE `typeproduite` DISABLE KEYS */;
INSERT INTO `typeproduite` VALUES ('M','M','M test'),('physical','pièce','Produite kaytba3 b pyassa'),('poder','kg','Produite kaytba3 b kilogramme');
/*!40000 ALTER TABLE `typeproduite` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-06-23  1:12:04
