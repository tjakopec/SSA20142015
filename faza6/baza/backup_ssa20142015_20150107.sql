-- MySQL dump 10.13  Distrib 5.6.14, for Win32 (x86)
--
-- Host: localhost    Database: ssa20142015
-- ------------------------------------------------------
-- Server version	5.6.14

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
-- Table structure for table `dojave`
--

DROP TABLE IF EXISTS `dojave`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dojave` (
  `sifra` int(11) NOT NULL AUTO_INCREMENT,
  `pas_id` int(11) NOT NULL,
  `korisnici_id` int(11) NOT NULL,
  `datum` datetime DEFAULT NULL,
  PRIMARY KEY (`sifra`),
  KEY `pas_id` (`pas_id`),
  KEY `korisnici_id` (`korisnici_id`),
  CONSTRAINT `dojave_ibfk_2` FOREIGN KEY (`korisnici_id`) REFERENCES `korisnici` (`sifra`),
  CONSTRAINT `dojave_ibfk_1` FOREIGN KEY (`pas_id`) REFERENCES `pas` (`sifra`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dojave`
--

LOCK TABLES `dojave` WRITE;
/*!40000 ALTER TABLE `dojave` DISABLE KEYS */;
INSERT INTO `dojave` VALUES (1,1,1,'2015-01-01 00:00:00'),(2,2,2,'2015-01-01 00:00:00'),(3,3,3,'2015-01-02 00:00:00');
/*!40000 ALTER TABLE `dojave` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `korisnici`
--

DROP TABLE IF EXISTS `korisnici`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `korisnici` (
  `sifra` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(300) DEFAULT NULL,
  `prezime` varchar(300) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `lozinka` varchar(300) DEFAULT NULL,
  `status_korisnika` int(11) NOT NULL,
  PRIMARY KEY (`sifra`),
  KEY `status_korisnika` (`status_korisnika`),
  CONSTRAINT `korisnici_ibfk_1` FOREIGN KEY (`status_korisnika`) REFERENCES `status_korisnika` (`sifra`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `korisnici`
--

LOCK TABLES `korisnici` WRITE;
/*!40000 ALTER TABLE `korisnici` DISABLE KEYS */;
INSERT INTO `korisnici` VALUES (1,'Ana','Anić','aanic@yahoo.com','eafcefa80133677897ca943ae81192ca',1),(2,NULL,NULL,'something@gmail.com','25f9e794323b453885f5181f1b624d0b',2),(3,'Pero','Perić','pero@gmail.com','9b722daf20e8992eeb6e32e5773cb5fb',3);
/*!40000 ALTER TABLE `korisnici` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `neobradene_dojave`
--

DROP TABLE IF EXISTS `neobradene_dojave`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `neobradene_dojave` (
  `sifra` int(11) NOT NULL AUTO_INCREMENT,
  `vrsta` varchar(10) NOT NULL,
  `poruka` text NOT NULL,
  `datum` datetime NOT NULL,
  `odobreno` tinyint(1) NOT NULL,
  PRIMARY KEY (`sifra`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `neobradene_dojave`
--

LOCK TABLES `neobradene_dojave` WRITE;
/*!40000 ALTER TABLE `neobradene_dojave` DISABLE KEYS */;
INSERT INTO `neobradene_dojave` VALUES (1,'pronaden','Karla,\r\nnježna ljepotica, plaha i nenametljiva...\r\nvaljda zato nitko nikada nije pitao za nju...\r\nniti joj poželio kumovati...\r\nKarla je rođena 2011. i od tada je u Azilu.','2015-01-07 10:08:27',1),(2,'pronaden','HITNO traži smještaj!\r\nIma svježe odrezan rep i ranu na nozi!\r\nNalazi se u Sarvašu, kod trgovine!\r\nKontakt: 0917247577','2015-01-07 10:09:17',1),(3,'izgubljen','Pomozite izgubljene vratiti kući,\r\nnapuštenima pronaći dom!\r\n1: Malena curica traži dom ili prijašnje skrbnike! Zna se ponasati u kući, traži van i ama baš ništa ne pokušava grickati iako je štene! Ako ju itko prepoznaje ili je cuo da je nekome odlutao psić molim da proslijedi nas kontakt,ali naravno i ako ju želiš udomiti br je 095 553 6393 ili 095 91 00091.\r\n2: \"na zelenom polju mladi muzijak neka vrsta pticara lovackoga psa\" Izgubljen?\r\n3: \"Luta po Dardi vjerojatno je pobjegao zbog petardi vidi se da je uhranjen i cist \"','2015-01-07 10:09:41',1),(4,'pronaden','voli, mazi, udomi...!\r\nPupi, malenu curicu veličine mace,\r\na toliko veliku da će vam cijelo srce zauzeti! \r\nostavljena je u šumi, gdje je pronašla grm kao zaklon.\r\ntako isfrasirana imala je sreće što ju je jedna djevojka uočila!\r\nkada je stigla kod nas bilo je \"ne diraj, grize!\"\r\nsada se u potpunosti opustila, i ne da se otjerati iz krila \r\nkada bi barem imala jedno za zauvijek... \r\nili kumu/kuma koji će joj azilske dane uljepšati!','2015-01-07 10:10:21',1),(5,'pronaden','E sad za kraj dana, dobro djelo u obliku klika!\r\nda izgubljeni nađu put kući, a neželjeni dom!\r\n1. U valpovu, kod srednje skole naden umiljati pas, ima ogrlicu, izgleda da se izgubio..\r\n2. Viđena na par mjesta u gradu, zadnje na Vijencu, nosi rozu ogrlicu.\r\nPrepoznaje ju netko?\r\n3. U Đakovu danas popodne je nestala mala curica, stara je 3,5 mjeseca. Broj na koji se možete javiti ako imate kakvu informaciju je 0922746535.\r\n4. Star je oko 8mj.. Odaziva se na ime Miki.. Nestao je na području Srijemske ulice, Osijek.. Jako je umiljat.. Ima taman nosić..092 155 5546\r\n5. Tri malena dečkića i njihova mama traže dom!\r\nJavite se na 095 9048 655, garant ćete se zaljubiti u njihove njuškice!','2015-01-07 10:11:14',0);
/*!40000 ALTER TABLE `neobradene_dojave` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `operater`
--

DROP TABLE IF EXISTS `operater`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `operater` (
  `sifra` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `lozinka` char(32) NOT NULL,
  `ime` varchar(50) NOT NULL,
  `prezime` varchar(50) NOT NULL,
  PRIMARY KEY (`sifra`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `operater`
--

LOCK TABLES `operater` WRITE;
/*!40000 ALTER TABLE `operater` DISABLE KEYS */;
INSERT INTO `operater` VALUES (1,'tjakopec@gmail.com','e358efa489f58062f10dd7316b65649e','Tomislav','Jakopec');
/*!40000 ALTER TABLE `operater` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pas`
--

DROP TABLE IF EXISTS `pas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pas` (
  `sifra` int(11) NOT NULL AUTO_INCREMENT,
  `status_psa` int(11) NOT NULL,
  `ime` varchar(300) DEFAULT NULL,
  `opis` varchar(300) DEFAULT NULL,
  `lokacija` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`sifra`),
  KEY `status_psa` (`status_psa`),
  CONSTRAINT `pas_ibfk_1` FOREIGN KEY (`status_psa`) REFERENCES `status_psa` (`sifra`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pas`
--

LOCK TABLES `pas` WRITE;
/*!40000 ALTER TABLE `pas` DISABLE KEYS */;
INSERT INTO `pas` VALUES (1,2,'Miki','štene hrvatskog ovčara','Retfala'),(2,2,'Flafi','crni mješanac','Filozofski fakultet Osijek'),(3,1,NULL,'mješanac njemačkog ovčara','Reisnerova 115');
/*!40000 ALTER TABLE `pas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status_korisnika`
--

DROP TABLE IF EXISTS `status_korisnika`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status_korisnika` (
  `sifra` int(11) NOT NULL AUTO_INCREMENT,
  `naziv_korisnika` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`sifra`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_korisnika`
--

LOCK TABLES `status_korisnika` WRITE;
/*!40000 ALTER TABLE `status_korisnika` DISABLE KEYS */;
INSERT INTO `status_korisnika` VALUES (1,'volonter'),(2,'anoniman korisnik'),(3,'korisnik');
/*!40000 ALTER TABLE `status_korisnika` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status_psa`
--

DROP TABLE IF EXISTS `status_psa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status_psa` (
  `sifra` int(11) NOT NULL AUTO_INCREMENT,
  `naziv_pas` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`sifra`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_psa`
--

LOCK TABLES `status_psa` WRITE;
/*!40000 ALTER TABLE `status_psa` DISABLE KEYS */;
INSERT INTO `status_psa` VALUES (1,'izgubljen'),(2,'pronađen');
/*!40000 ALTER TABLE `status_psa` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-01-07 11:11:28
