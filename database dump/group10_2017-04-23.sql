# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: cs3380.rnet.missouri.edu (MySQL 5.5.5-10.1.20-MariaDB)
# Database: group10
# Generation Time: 2017-04-24 01:19:42 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table administrator
# ------------------------------------------------------------

DROP TABLE IF EXISTS `administrator`;

CREATE TABLE `administrator` (
  `user_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `job_title` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `administrator` WRITE;
/*!40000 ALTER TABLE `administrator` DISABLE KEYS */;

INSERT INTO `administrator` (`user_id`, `first_name`, `last_name`, `status`, `job_title`)
VALUES
	('admin@admin.com','Admin','Admin','Active','Data Checker'),
	('devincargill@missourirail.com','Devin','Cargill','Active','Web Developer'),
	('jebrobertson4@gmail.com','Jeb','Robertson','Test','Test'),
	('jy6vd@mail.missouri.edu','Jonathan','Yee','Active','Admin'),
	('scjc68@mail.missourirail.edu','Seth','John','Administrator','CO-Anchor'),
	('test123','test','123','123','123'),
	('testadmin@missourirail.com','Test','Admin','Active','Admin');

/*!40000 ALTER TABLE `administrator` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table authentication
# ------------------------------------------------------------

DROP TABLE IF EXISTS `authentication`;

CREATE TABLE `authentication` (
  `user_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `add_equipment` tinyint(1) NOT NULL,
  `add_conductor` tinyint(1) NOT NULL,
  `monitor_train` tinyint(1) NOT NULL,
  `add_train` tinyint(1) NOT NULL,
  `add_engineer` tinyint(1) NOT NULL,
  `reset_pass` tinyint(1) NOT NULL,
  `edit_user` tinyint(1) NOT NULL,
  `ssn` varchar(9) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`user_id`),
  KEY `ssn` (`ssn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `authentication` WRITE;
/*!40000 ALTER TABLE `authentication` DISABLE KEYS */;

INSERT INTO `authentication` (`user_id`, `password`, `add_equipment`, `add_conductor`, `monitor_train`, `add_train`, `add_engineer`, `reset_pass`, `edit_user`, `ssn`)
VALUES
	('admin@admin.com','$2y$10$UFfKVHUjiF6qToii/IzrteJCQGolJYZdv6nTlk/yZ6St09liGAEaa',1,1,1,1,1,1,1,'12345679'),
	('bob@bob.bob','$2y$10$15yNP2HCXvfhkiRcnRphVe45V.68Fuza3tTuP942HuOeT7RlC3psu',0,0,0,0,0,0,0,'808'),
	('bob@missourirail.com','$2y$10$59QEPxy1M4nRqiR27F71aezybY0x9AFpr2cFHXM.bxzPEhG6GgAyO',0,0,1,0,0,0,0,'123456789'),
	('davidauger@missourirail.com','$2y$10$sJIfzg1JVGaxzJNZhekAFeIUEItZuSmLmA.sUEznGl2xQNXLXGB8G',0,0,1,0,0,0,0,'123456789'),
	('deayqf','$2y$10$WbxmCVZIGVg22IciH.9RjeBBubHpORCUSm3OasoYUUzYJ3yiCQbr2',0,0,0,0,0,0,0,'0'),
	('devincargill@missourirail.com','$2y$10$ONob9H6imS8C6IjlyOjjMOHX0TCT6JU.hxtkrbAOSteLG8pQwQW72',1,1,1,1,1,1,1,'123456789'),
	('ericcargill@yahoo.com','$2y$10$NR5MlBfRMmBR4cCLbrxclOctrVwM.PW9yLAl/td7kB6LVoBHKJ2QS',0,0,0,0,0,0,0,'0'),
	('haydenhaddock@test.com','$2y$10$3x.M/3ACJd2deWF0pxcA6elsxosHch3EWU3cXnxpGlhWmeMU1hC02',0,0,0,0,0,0,0,'123456789'),
	('jebrobertson4@gmail.com','$2y$10$7/NNOTBK0Dj59.ABBfkEgOT7uWdZpkDHUyhxiDrYlgGnjm3FdFNgG',1,1,1,1,1,1,1,'123456789'),
	('jimmoose@test.com','$2y$10$6OGNEMuk891i8SLlMQBwseLr05EmXLkud779mLpmwO8PcQym79WHq',0,0,0,0,0,0,0,'123456789'),
	('jy6vd@mail.missouri.edu','$2y$10$Sma1UBk1lYWFaLvG5zt7juk8JzihdAn5pnpVz1wObBq0L3KikQSOq',1,1,1,1,1,1,1,'123456789'),
	('rickross@missourirail.com','$2y$10$bIhqT6oMnMABezbLK5g4O.RKywhev5Wew58suDFiSWuyEw7lAbYPa',0,0,1,0,0,0,0,'123456789'),
	('scjc68@mail.missourirail.edu','$2y$10$3G0zX76TczwN9pt16gVNz.w7CPpodY1bU3X0HPtYyUzuMONnCEDNO',1,1,1,1,1,1,1,'789456123'),
	('test@test.com','$2y$10$vgerQwLr4Vtprm45dbxuLurCoSIIWagfPQmGV1WCWpmBdnXGAjPOm',0,0,0,0,0,0,0,'123456789'),
	('testadmin@missourirail.com','$2y$10$cz6s.eCFH2Qsojt/657Tr.jbUaC7fCKS3RwTYQEbaCfsLNpVeglG.',1,1,1,1,1,1,1,'123456789'),
	('testconductor@missourirail.com','$2y$10$M6vJWYQE/eKgZkQCBrZ5QexCZzTJwJYSCmyAxEw1fAe8R6fpa7k76',0,0,1,0,0,0,0,'123456789'),
	('testcustomer@test.com','$2y$10$8dnf.K8twey.5D6ciQU2MO1LxeQ2dLhDJHkjPTXLqwGPVQFmKUjTy',0,0,0,0,0,0,0,'123456789'),
	('testcustomer2@test.com','$2y$10$s7fB7zjBZTr5hVW49vRDVeFIA9bnJnfSTXv6BLITCNkZO4GlTuy7K',0,0,0,0,0,0,0,'0'),
	('testengineer@missourirail.com','$2y$10$kHPpPYIBl/sySHkWzpUJYOHjwDQu77yT11LfmCV./QTQJQTKeeRXu',0,0,1,0,0,0,0,'123456789'),
	('testengineer2@missourirail.com','$2y$10$oiwchjTETkhd/5Xj9PxfP.8L7EdB6oXcDVUpVP0.rXhL03c4pynIy',0,0,1,0,0,0,0,'123456789');

/*!40000 ALTER TABLE `authentication` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table car
# ------------------------------------------------------------

DROP TABLE IF EXISTS `car`;

CREATE TABLE `car` (
  `serial_num` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `load_capacity` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` float DEFAULT NULL,
  `train_num` int(11) DEFAULT NULL,
  `customer_id` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`serial_num`),
  KEY `customer_id` (`customer_id`),
  KEY `train_num` (`train_num`),
  CONSTRAINT `car_ibfk_2` FOREIGN KEY (`train_num`) REFERENCES `train` (`train_num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `car` WRITE;
/*!40000 ALTER TABLE `car` DISABLE KEYS */;

INSERT INTO `car` (`serial_num`, `load_capacity`, `type`, `location`, `price`, `train_num`, `customer_id`)
VALUES
	('0001','65','passenger','Independence, MO',1.2,4,'jimmoose@test.com'),
	('0002','65','passenger','Columbia, MO',1.2,2,'testcustomer@test.com'),
	('0003','65','passenger','Columbia, MO',1.2,3,'0'),
	('0004','65','passenger','Independence, MO',1.2,4,'0'),
	('0005','65','passenger','Joplin, MO',1.2,5,'0'),
	('0006','65','passenger','Kansas City, MO',1.2,6,'0'),
	('0007','65','passenger','Sedalia, MO',1.2,7,'0'),
	('0008','65','passenger','Springfield, MO',1.2,8,'0'),
	('0009','65','passenger','Springfield, MO',1.2,9,'0'),
	('0010','65','passenger','St.Louis, MO',1.2,10,'0'),
	('0011','145','coal_cargo','Cape Girardeau, MO',0.4,1,'testcustomer@test.com'),
	('0012','145','coal_cargo','Columbia, MO',0.4,2,'0'),
	('0013','145','coal_cargo','Columbia, MO',0.4,3,'0'),
	('0014','145','coal_cargo','Independence, MO',0.4,4,'0'),
	('0015','145','coal_cargo','Joplin, MO',0.4,5,'0'),
	('0016','145','coal_cargo','Kansas City, MO',0.4,6,'0'),
	('0017','145','coal_cargo','Sedalia, MO',0.4,7,'0'),
	('0018','145','coal_cargo','Springfield, MO',0.4,8,'0'),
	('0019','145','coal_cargo','Springfield, MO',0.4,9,'0'),
	('0020','145','coal_cargo','St.Louis, MO',0.4,10,'0'),
	('0021','130','steel_cargo','Cape Girardeau, MO',0.4,1,'0'),
	('0022','130','steel_cargo','Columbia, MO',0.4,2,'0'),
	('0023','130','steel_cargo','Columbia, MO',0.4,3,'0'),
	('0024','130','steel_cargo','Independence',0.4,4,'0'),
	('0025','130','steel_cargo','Joplin, MO',0.4,5,'0'),
	('0026','130','steel_cargo','Kansas City, MO',0.4,6,'0'),
	('0027','130','steel_cargo','Sedalia, MO',0.4,7,'0'),
	('0028','130','steel_cargo','Springfield, MO',0.4,8,'0'),
	('0029','130','steel_cargo','Springfield, MO',0.4,9,'0'),
	('0030','130','steel_cargo','St.Louis, MO',0.4,10,'0'),
	('0031','110','product_cargo','Cape Girardeau, MO',0.65,1,'testcustomer2@test.com'),
	('0032','110','product_cargo','Columbia, MO',0.65,2,'testcustomer2@test.com'),
	('0033','110','product_cargo','Columbia, MO',0.65,3,'0'),
	('0034','110','product_cargo','Independence, MO',0.65,4,'0'),
	('0035','110','product_cargo','Joplin, MO',0.65,5,'0'),
	('0036','110','product_cargo','Kansas City, MO',0.65,6,'0'),
	('0037','110','product_cargo','Sedalia, MO',0.65,7,'0'),
	('0038','110','product_cargo','Springfield, MO',0.65,8,'0'),
	('0039','110','product_cargo','Springfield, MO',0.65,9,'0'),
	('0040','110','product_cargo','St.Louis, MO',0.65,10,'0'),
	('0041','65','passenger','Columbia, MO',1.2,2,'0'),
	('0042','120','steel_cargo','Joplin, MO',0.5,5,'jimmoose@test.com'),
	('0043','150','passenger','Columbia, MO',1.2,3,'testcustomer@test.com'),
	('0044','65','coal_cargo','Independence, MO',0.7,11,'haydenhaddock@test.com');

/*!40000 ALTER TABLE `car` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table city
# ------------------------------------------------------------

DROP TABLE IF EXISTS `city`;

CREATE TABLE `city` (
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `latitude` float(7,4) DEFAULT NULL,
  `longitude` float(7,4) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `city` WRITE;
/*!40000 ALTER TABLE `city` DISABLE KEYS */;

INSERT INTO `city` (`name`, `latitude`, `longitude`)
VALUES
	('Branson, MO',36.6437,93.2185),
	('Cape Girardeau, MO',37.3059,89.5181),
	('Columbia, MO',38.9517,92.3341),
	('Independence, MO',39.0911,94.4155),
	('Jefferson City, MO',38.5767,92.1735),
	('Joplin, MO',37.0842,94.5133),
	('Kansas City, MO',39.0997,94.5786),
	('Sedalia, MO',38.7045,93.2283),
	('Springfield, MO',37.2090,93.2923),
	('St.Louis, MO',38.6270,90.1994);

/*!40000 ALTER TABLE `city` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table company
# ------------------------------------------------------------

DROP TABLE IF EXISTS `company`;

CREATE TABLE `company` (
  `company_id` int(11) NOT NULL,
  `name` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_number` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `company` WRITE;
/*!40000 ALTER TABLE `company` DISABLE KEYS */;

INSERT INTO `company` (`company_id`, `name`, `address`, `email`, `phone_number`)
VALUES
	(1234,'American Railcar Industries','649 West Beverly Road, St.Louis, MO 63101','ARIMissouri.com',5738254338),
	(1235,'BlueBrier Company','978 Blue Heel Street, Kansas City, MO 64030','bluebrier.com',8749384758),
	(1236,'Nubular Inc.','414 West Chestnut Street, Columbia, MO 65201','nubular.net',9384627183),
	(1237,'Extact Industries','719 East Bay Drive, Jefferson City, MO 65043','extactind.com',1836583937),
	(1238,'Breno Co.','842 East Lattice Road, Joplin, MO 64801','brenoco.net',6453748888),
	(1239,'Steele Industries','649 Bank Late Street, Springfield, MO 65619','steeletheway.com',1172635222),
	(1240,'Fortune Inc.','264 North Park Avenue, Independence, MO 64015','findyourfortune.net',5837774463),
	(1241,'Sports Are Us','197 White Springs Road, Sedalia, MO 65301','sportsareus.com',5394852233),
	(1242,'Products and Sons','341 Hollar Avenue, Cape Girardeau, MO 63701','productsandsons.com',8172637744),
	(1243,'AmTrak','414 West Bank Street, Sedalia, MO 65301','amtrak@gmail.com',3125674321);

/*!40000 ALTER TABLE `company` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table conductor
# ------------------------------------------------------------

DROP TABLE IF EXISTS `conductor`;

CREATE TABLE `conductor` (
  `user_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `employee_rank` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `conductor` WRITE;
/*!40000 ALTER TABLE `conductor` DISABLE KEYS */;

INSERT INTO `conductor` (`user_id`, `first_name`, `last_name`, `status`, `employee_rank`)
VALUES
	('bob@missourirail.com','Bob','Early','Active','Senior'),
	('rickross@missourirail.com','Rick','Ross','Active','Junior'),
	('testconductor@missourirail.com','Test','Conductor','Active','Senior');

/*!40000 ALTER TABLE `conductor` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table customer
# ------------------------------------------------------------

DROP TABLE IF EXISTS `customer`;

CREATE TABLE `customer` (
  `email` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_number` int(11) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;

INSERT INTO `customer` (`email`, `first_name`, `last_name`, `phone_number`, `address`)
VALUES
	('bob@bob.bob','bob','bob',808,'bob'),
	('deayqf','David','Auger',2147483647,'12 blah'),
	('ericcargill@yahoo.com','Eric','Cargill',314567891,'St. Louis'),
	('haydenhaddock@test.com','Hayden','Haddock',1234567890,'Columbia'),
	('jimmoose@test.com','Jim','Moose',123456789,'Columbia'),
	('test@test.com','John','Smith',123456789,'Smith Lane'),
	('testcustomer@test.com','Test','Customer',123456789,'Test Lane'),
	('testcustomer2@test.com','Test','Customer2',517872341,'University of Missouri-Columbia');

/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table employee
# ------------------------------------------------------------

DROP TABLE IF EXISTS `employee`;

CREATE TABLE `employee` (
  `user_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `train_num` int(11) NOT NULL,
  `status` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `train_num` (`train_num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;

INSERT INTO `employee` (`user_id`, `first_name`, `last_name`, `train_num`, `status`)
VALUES
	('bob@missourirail.com','Bob','Early',11,'Active'),
	('davidauger@missourirail.com','David','Auger',3,'Active'),
	('rickross@missourirail.com','Rick','Ross',3,'Active'),
	('testconductor@missourirail.com','Testing','Conductor',4,'Active'),
	('testengineer@missourirail.com','testengineer@missourirail.com','Engineering',9,'Active'),
	('testengineer2@missourirail.com','Test','Engineer 2',11,'Active');

/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table engineer
# ------------------------------------------------------------

DROP TABLE IF EXISTS `engineer`;

CREATE TABLE `engineer` (
  `user_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `employee_rank` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hours_traveling` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `engineer` WRITE;
/*!40000 ALTER TABLE `engineer` DISABLE KEYS */;

INSERT INTO `engineer` (`user_id`, `first_name`, `last_name`, `status`, `employee_rank`, `hours_traveling`)
VALUES
	('davidauger@missourirail.com','David','Auger','Active','Senior',90),
	('testengineer@missourirail.com','testengineer@missourirail.com','Engineering','Active','Senior',70),
	('testengineer2@missourirail.com','Test','Engineer 2','Active','Junio',80);

/*!40000 ALTER TABLE `engineer` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table log
# ------------------------------------------------------------

DROP TABLE IF EXISTS `log`;

CREATE TABLE `log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `action` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`log_id`),
  KEY `ssn` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `log` WRITE;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;

INSERT INTO `log` (`log_id`, `ip_address`, `action`, `date_time`, `user_id`)
VALUES
	(1,'10.20.11.4','POSTED NEW USER','1970-01-01 00:00:01','devin'),
	(16,'192.236.100.27','form submission on /~GROUP10/views/adminlog.php','2017-04-06 20:59:53','devin'),
	(17,'192.236.100.27','form submission on /~GROUP10/views/login.php','2017-04-06 21:02:06','devin'),
	(18,'192.236.100.27','form submission on /~GROUP10/views/adminlog.php','2017-04-06 21:02:09','devin'),
	(19,'192.236.100.27','form submission on /~GROUP10/views/login.php','2017-04-06 21:03:18','Jeb'),
	(20,'192.236.100.27','form submission on /~GROUP10/views/login.php','2017-04-06 21:03:36','Seth'),
	(21,'192.236.100.27','form submission on /~GROUP10/views/login.php','2017-04-06 21:34:58','devin'),
	(22,'192.236.100.27','form submission on /~GROUP10/views/login.php','2017-04-06 22:29:21','devin'),
	(23,'192.236.100.27','form submission on /~GROUP10/views/login.php','2017-04-06 22:47:23','test'),
	(24,'192.236.100.27','form submission on /~GROUP10/views/login.php','2017-04-06 22:47:45','devin'),
	(25,'192.236.100.27','form submission on /~GROUP10/views/login.php','2017-04-06 22:50:18','test1'),
	(26,'192.236.100.27','login on /~GROUP10/views/login.php','2017-04-06 23:11:26','devin'),
	(27,'192.236.100.27','signup by user on /~GROUP10/views/signup.php','2017-04-06 23:13:41','test1'),
	(28,'192.236.100.27','login on /~GROUP10/views/login.php','2017-04-06 23:13:47','test1'),
	(29,'107.77.83.111','login on /~GROUP10/views/login.php','2017-04-08 20:27:39','devin'),
	(30,'10.7.22.156','signup by user on /~GROUP10/views/signup.php','2017-04-09 16:32:54','jy6vd'),
	(31,'10.7.22.156','login on /~GROUP10/views/login.php','2017-04-09 16:33:04','jy6vd'),
	(32,'10.7.130.120','signup by user on /~GROUP10/views/signup.php','2017-04-10 15:51:10','fjdfjdfd'),
	(33,'10.7.35.210','login on /~GROUP10/views/login.php','2017-04-10 15:51:22','devin'),
	(34,'10.7.35.210','login on /~GROUP10/views/login.php','2017-04-10 15:51:52','test'),
	(35,'10.7.21.193','login on /~GROUP10/views/login.php','2017-04-10 16:35:28','jy6vd'),
	(36,'107.77.85.115','login on /~GROUP10/views/login.php','2017-04-11 14:27:58','Jeb'),
	(37,'10.7.84.86','login on /~GROUP10/views/login.php','2017-04-11 17:32:32','test'),
	(38,'10.7.84.86','login on /~GROUP10/views/login.php','2017-04-11 17:36:15','devin'),
	(39,'10.7.84.86','login on /~GROUP10/login.php','2017-04-11 18:32:21','test'),
	(40,'10.7.84.86','login on /~GROUP10/login.php','2017-04-11 18:32:54','test'),
	(41,'10.7.84.86','signup by user on /~GROUP10/views/signup.php','2017-04-11 18:35:45','thunpisit@missourirail.com'),
	(42,'10.7.84.86','login on /~GROUP10/login.php','2017-04-11 18:36:11','thunpisit@missourirail.com'),
	(43,'192.236.100.27','signup by user on /~GROUP10/views/signup.php','2017-04-12 10:58:19','devin@missourirail.com'),
	(44,'192.236.100.27','login on /~GROUP10/views/login.php','2017-04-12 10:58:44','devin@missourirail.com'),
	(45,'107.77.83.15','login on /~GROUP10/views/login.php','2017-04-12 15:21:21','devin@missourirail.com'),
	(46,'192.236.100.27','login on /~GROUP10/views/login.php','2017-04-12 17:46:00','devin@missourirail.com'),
	(47,'10.7.35.175','signup by user on /~GROUP10/views/signup.php','2017-04-13 17:20:50','devincargill@missourirail.com'),
	(48,'10.7.35.175','login on /~GROUP10/views/login.php','2017-04-13 17:21:01','devincargill@missourirail.com'),
	(49,'10.7.35.175','login on /~GROUP10/login.php','2017-04-13 17:38:56','devincargill@missourirail.com'),
	(50,'10.7.35.175','login on /~GROUP10/login.php','2017-04-13 17:43:50','devincargill@missourirail.com'),
	(51,'10.7.35.175','login on /~GROUP10/login.php','2017-04-13 17:44:53','devincargill@missourirail.com'),
	(52,'10.7.35.175','login on /~GROUP10/login.php','2017-04-13 17:46:40','devincargill@missourirail.com'),
	(53,'10.7.21.203','signup by user on /~GROUP10/signup.php','2017-04-13 17:48:44','jy6vd'),
	(54,'10.7.21.203','signup by user on /~GROUP10/signup.php','2017-04-13 17:50:09','jy6vd@mail.missouri.edu'),
	(55,'10.7.21.203','login on /~GROUP10/login.php','2017-04-13 17:50:18','jy6vd@mail.missouri.edu'),
	(56,'192.236.100.27','login on /~GROUP10/login.php','2017-04-13 19:39:10','devincargill@missourirail.com'),
	(57,'192.236.100.27','login on /~GROUP10/login.php','2017-04-13 19:47:39','devincargill@missourirail.com'),
	(58,'192.236.100.27','login on /~GROUP10/login.php','2017-04-13 19:48:23','devincargill@missourirail.com'),
	(59,'192.236.100.27','login on /~GROUP10/login.php','2017-04-13 19:48:34','devincargill@missourirail.com'),
	(60,'192.236.100.27','login on /~GROUP10/login.php','2017-04-13 19:51:06','devincargill@missourirail.com'),
	(61,'107.77.89.85','login on /~GROUP10/login.php','2017-04-13 20:03:34','jy6vd@mail.missouri.edu'),
	(62,'192.236.100.27','login on /~GROUP10/login.php','2017-04-13 22:35:38','devincargill@missourirail.com'),
	(63,'192.236.100.27','login on /~GROUP10/login.php','2017-04-13 23:39:11','devin@missourirail.com'),
	(64,'107.77.83.15','login on /~GROUP10/login.php','2017-04-14 01:30:13','devin@missourirail.com'),
	(65,'192.236.100.27','login on /~GROUP10/login.php','2017-04-14 10:42:34','devincargill@missourirail.com'),
	(66,'173.31.198.199','login on /~GROUP10/login.php','2017-04-14 17:31:07','jy6vd@mail.missouri.edu'),
	(67,'192.236.100.27','login on /~GROUP10/login.php','2017-04-14 20:06:15','devincargill@missourirail.com'),
	(68,'173.31.198.199','login on /~GROUP10/login.php','2017-04-14 22:44:08','jy6vd@mail.missouri.edu'),
	(69,'108.169.209.217','login on /~GROUP10/login.php','2017-04-14 23:05:22','thunpisit@missourirail.com'),
	(70,'108.169.209.217','login on /~GROUP10/login.php','2017-04-14 23:11:42','thunpisit@missourirail.com'),
	(71,'108.169.209.217','signup by user on /~GROUP10/signup.php','2017-04-14 23:41:07','thunpisit.am@gmail.com'),
	(72,'108.169.209.217','signup by user on /~GROUP10/signup.php','2017-04-14 23:42:16','thunpisit.am@gmail.com'),
	(73,'108.169.209.217','login on /~GROUP10/login.php','2017-04-14 23:42:24','thunpisit.am@gmail.com'),
	(74,'108.169.209.217','login on /~GROUP10/login.php','2017-04-14 23:47:21','thunpisit@missourirail.com'),
	(75,'108.169.209.217','login on /~GROUP10/login.php','2017-04-15 00:13:51','thunpisit.am@gmail.com'),
	(76,'108.169.209.217','login on /~GROUP10/login.php','2017-04-15 00:17:11','thunpisit.am@gmail.com'),
	(77,'108.169.209.217','login on /~GROUP10/login.php','2017-04-15 00:17:45','thunpisit.am@gmail.com'),
	(78,'108.169.209.217','login on /~GROUP10/login.php','2017-04-15 00:24:13','thunpisit@missourirail.com'),
	(79,'108.169.209.217','login on /~GROUP10/login.php','2017-04-15 00:24:25','thunpisit.am@gmail.com'),
	(80,'108.169.209.217','login on /~GROUP10/login.php','2017-04-15 00:36:59','thunpisit.am@gmail.com'),
	(81,'108.169.209.217','login on /~GROUP10/login.php','2017-04-15 00:37:11','thunpisit@missourirail.com'),
	(82,'173.31.198.199','login on /~GROUP10/login.php','2017-04-15 01:50:01','jy6vd@mail.missouri.edu'),
	(83,'173.31.198.199','signup by user on /~GROUP10/signup.php','2017-04-15 01:56:57','jonathanyee156@gmail.com'),
	(84,'173.31.198.199','login on /~GROUP10/login.php','2017-04-15 01:57:21','jonathanyee156@gmail.com'),
	(85,'173.31.198.199','login on /~GROUP10/login.php','2017-04-15 01:57:42','jy6vd@mail.missouri.edu'),
	(86,'173.31.198.199','login on /~GROUP10/login.php','2017-04-15 02:02:07','jonathanyee156@gmail.com'),
	(87,'173.31.198.199','login on /~GROUP10/login.php','2017-04-15 02:02:17','jy6vd@mail.missouri.edu'),
	(88,'173.31.198.199','signup by user on /~GROUP10/signup.php','2017-04-15 02:05:13','jonathanyee157@yahoo.com'),
	(89,'173.31.198.199','login on /~GROUP10/login.php','2017-04-15 02:05:20','jonathanyee157@yahoo.com'),
	(90,'173.31.198.199','signup by user on /~GROUP10/signup.php','2017-04-15 02:06:55','jonyee46@yahoo.com'),
	(91,'173.31.198.199','login on /~GROUP10/login.php','2017-04-15 02:07:05','jonyee46@yahoo.com'),
	(92,'173.31.198.199','signup by user on /~GROUP10/signup.php','2017-04-15 02:08:52','xxhostilityxx@yahoo.com'),
	(93,'173.31.198.199','login on /~GROUP10/login.php','2017-04-15 02:08:59','xxhostilityxx@yahoo.com'),
	(94,'173.31.198.199','signup by user on /~GROUP10/signup.php','2017-04-15 02:11:02','asd'),
	(95,'173.31.198.199','signup by user on /~GROUP10/signup.php','2017-04-15 02:11:20','asd@mail.com'),
	(96,'173.31.198.199','login on /~GROUP10/login.php','2017-04-15 02:11:26','asd@mail.com'),
	(97,'173.31.198.199','signup by user on /~GROUP10/signup.php','2017-04-15 02:16:08','asdd@mail.com'),
	(98,'173.31.198.199','login on /~GROUP10/login.php','2017-04-15 02:16:16','asdd@mail.com'),
	(99,'173.31.198.199','signup by user on /~GROUP10/signup.php','2017-04-15 02:18:51','asddd@mail.com'),
	(100,'173.31.198.199','login on /~GROUP10/login.php','2017-04-15 02:18:58','asddd@mail.com'),
	(101,'173.31.198.199','login on /~GROUP10/login.php','2017-04-15 02:19:08','jy6vd@mail.missouri.edu'),
	(102,'173.31.198.199','signup by user on /~GROUP10/signup.php','2017-04-15 02:22:30','zxczxc@mail.com'),
	(103,'173.31.198.199','login on /~GROUP10/login.php','2017-04-15 02:22:37','zxczxc@mail.com'),
	(104,'108.169.209.216','login on /~GROUP10/login.php','2017-04-15 10:01:56','thunpisit.am@gmail.com'),
	(105,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 11:15:30','devincargill@missourirail.com'),
	(106,'108.169.209.216','login on /~GROUP10/login.php','2017-04-15 11:18:21','thunpisit.am@gmail.com'),
	(107,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 11:49:48','devincargill@missourirail.com'),
	(108,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 11:50:10','jy6vd@mail.missouri.edu'),
	(109,'192.236.100.27','signup by user on /~GROUP10/signup.php','2017-04-15 12:31:13','testconductor@missourirail.com'),
	(110,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 12:39:37','testconductor@missourirail.com'),
	(111,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 12:41:25','testconductor@missourirail.com'),
	(112,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 12:42:38','testconductor@missourirail.com'),
	(113,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 12:44:24','testconductor@missourirail.com'),
	(114,'192.236.100.27','signup by user on /~GROUP10/signup2.php','2017-04-15 12:50:59','testconductor@missourirail.com'),
	(115,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 12:51:10','testconductor@missourirail.com'),
	(116,'192.236.100.27','signup by user on /~GROUP10/signup2.php','2017-04-15 13:07:32','testconductor@missourirail.com'),
	(117,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 13:07:48','testconductor@missourirail.com'),
	(118,'192.236.100.27','signup by user on /~GROUP10/signup2.php','2017-04-15 13:09:20','testconductor@missourirail.com'),
	(119,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 13:09:27','testconductor@missourirail.com'),
	(120,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 13:13:04','devincargill@missourirail.com'),
	(121,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 13:13:12','testconductor@missourirail.com'),
	(122,'192.236.100.27','/~GROUP10/login.php','2017-04-15 13:25:26','testconductor@missourirail.com'),
	(123,'192.236.100.27','/~GROUP10/login.php','2017-04-15 13:25:57','testconductor@missourirail.com'),
	(124,'192.236.100.27','signup by user on /~GROUP10/signup2.php','2017-04-15 13:40:05','testconductor@missourirail.com'),
	(125,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:09:51','devincargill@missourirail.com'),
	(126,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:09:53','devincargill@missourirail.com'),
	(127,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:10:29','devincargill@missourirail.com'),
	(128,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:10:31','devincargill@missourirail.com'),
	(129,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:10:32','devincargill@missourirail.com'),
	(130,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:10:33','devincargill@missourirail.com'),
	(131,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:10:33','devincargill@missourirail.com'),
	(132,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:10:34','devincargill@missourirail.com'),
	(133,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:10:35','devincargill@missourirail.com'),
	(134,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:11:44','devincargill@missourirail.com'),
	(135,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:11:45','devincargill@missourirail.com'),
	(136,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:11:46','devincargill@missourirail.com'),
	(137,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:11:46','devincargill@missourirail.com'),
	(138,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:12:39','devincargill@missourirail.com'),
	(139,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:12:40','devincargill@missourirail.com'),
	(140,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:12:40','devincargill@missourirail.com'),
	(141,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:12:41','devincargill@missourirail.com'),
	(142,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:13:53','devincargill@missourirail.com'),
	(143,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:13:55','devincargill@missourirail.com'),
	(144,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:13:56','devincargill@missourirail.com'),
	(145,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:13:56','devincargill@missourirail.com'),
	(146,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:13:57','devincargill@missourirail.com'),
	(147,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:14:35','devincargill@missourirail.com'),
	(148,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:14:37','devincargill@missourirail.com'),
	(149,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:14:42','testconductor@missourirail.com'),
	(150,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:17:29','devincargill@missourirail.com'),
	(151,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:17:31','devincargill@missourirail.com'),
	(152,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:17:32','devincargill@missourirail.com'),
	(153,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:17:33','devincargill@missourirail.com'),
	(154,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:17:33','devincargill@missourirail.com'),
	(155,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:20:10','testconductor@missourirail.com'),
	(156,'108.169.209.201','/~GROUP10/login.php','2017-04-15 14:20:20','thunpisit.am@gmail.com'),
	(157,'108.169.209.201','/~GROUP10/login.php','2017-04-15 14:20:43','thunpisit.am@gmail.com'),
	(158,'108.169.209.201','/~GROUP10/login.php','2017-04-15 14:20:52','thunpisit.am@gmail.com'),
	(159,'108.169.209.201','/~GROUP10/login.php','2017-04-15 14:21:23','thunpisit.am@gmail.com'),
	(160,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:22:05','devincargill@missourirail.com'),
	(161,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:22:07','devincargill@missourirail.com'),
	(162,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:22:08','devincargill@missourirail.com'),
	(163,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:22:10','devincargill@missourirail.com'),
	(164,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:25:29','devincargill@missourirail.com'),
	(165,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:25:31','devincargill@missourirail.com'),
	(166,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:25:32','devincargill@missourirail.com'),
	(167,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:25:33','devincargill@missourirail.com'),
	(168,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:26:42','devincargill@missourirail.com'),
	(169,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:26:43','devincargill@missourirail.com'),
	(170,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:26:44','devincargill@missourirail.com'),
	(171,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:26:45','devincargill@missourirail.com'),
	(172,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:26:46','devincargill@missourirail.com'),
	(173,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:26:47','devincargill@missourirail.com'),
	(174,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:28:21','devincargill@missourirail.com'),
	(175,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:28:22','devincargill@missourirail.com'),
	(176,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:29:27','devincargill@missourirail.com'),
	(177,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:29:48','jy6vd@mail.missouri.edu'),
	(178,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:30:05','testconductor@missourirail.com'),
	(179,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:30:14','testconductor@missourirail.com'),
	(180,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:30:20','jy6vd@mail.missouri.edu'),
	(181,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:30:27','jy6vd@mail.missouri.edu'),
	(182,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:30:35','jy6vd@mail.missouri.edu'),
	(183,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:30:42','jy6vd@mail.missouri.edu'),
	(184,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:30:52','devincargill@missourirail.com'),
	(185,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:30:54','devincargill@missourirail.com'),
	(186,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:30:57','devincargill@missourirail.com'),
	(187,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:31:04','testconductor@missourirail.com'),
	(188,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:31:05','jy6vd@mail.missouri.edu'),
	(189,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:31:14','jy6vd@mail.missouri.edu'),
	(190,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:31:26','jy6vd@mail.missouri.edu'),
	(191,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:32:19','devincargill@missourirail.com'),
	(192,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:32:21','devincargill@missourirail.com'),
	(193,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:32:22','devincargill@missourirail.com'),
	(194,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:32:23','devincargill@missourirail.com'),
	(195,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:32:24','devincargill@missourirail.com'),
	(196,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:32:24','devincargill@missourirail.com'),
	(197,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:32:25','devincargill@missourirail.com'),
	(198,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:32:26','devincargill@missourirail.com'),
	(199,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:32:26','devincargill@missourirail.com'),
	(200,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:32:27','devincargill@missourirail.com'),
	(201,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:32:28','devincargill@missourirail.com'),
	(202,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:32:34','jy6vd@mail.missouri.edu'),
	(203,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:32:49','devincargill@missourirail.com'),
	(204,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:32:50','devincargill@missourirail.com'),
	(205,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:32:51','devincargill@missourirail.com'),
	(206,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:32:52','devincargill@missourirail.com'),
	(207,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:32:52','devincargill@missourirail.com'),
	(208,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:32:53','devincargill@missourirail.com'),
	(209,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:32:54','devincargill@missourirail.com'),
	(210,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:33:03','jy6vd@mail.missouri.edu'),
	(211,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:34:03','devincargill@missourirail.com'),
	(212,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:34:14','testconductor@missourirail.com'),
	(213,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:35:55','devincargill@missourirail.com'),
	(214,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:36:03','testconductor@missourirail.com'),
	(215,'192.236.100.27','/~GROUP10/login.php','2017-04-15 14:39:02','testconductor@missourirail.com'),
	(216,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 14:40:38','devincargill@missourirail.com'),
	(217,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 14:40:53','testconductor@missourirail.com'),
	(218,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 14:42:01','testconductor@missourirail.com'),
	(219,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 14:42:06','testconductor@missourirail.com'),
	(220,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 14:42:13','testconductor@missourirail.com'),
	(221,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 14:47:24','testconductor@missourirail.com'),
	(222,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 14:49:25','testconductor@missourirail.com'),
	(223,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 14:50:52','testconductor@missourirail.com'),
	(224,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 14:51:25','testconductor@missourirail.com'),
	(225,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 14:53:01','devincargill@missourirail.com'),
	(226,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 14:54:52','testconductor@missourirail.com'),
	(227,'108.169.209.201','login on /~GROUP10/login.php','2017-04-15 14:54:53','thunpisit.am@gmail.com'),
	(228,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 14:57:12','jonathanyee156@gmail.com'),
	(229,'108.169.209.201','login on /~GROUP10/login.php','2017-04-15 14:58:12','thunpisit@missourirail.com'),
	(230,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 15:03:23','jy6vd@mail.missouri.edu'),
	(231,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 15:04:39','jy6vd@mail.missouri.edu'),
	(232,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 15:08:09','testconductor@missourirail.com'),
	(233,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 15:59:19','jy6vd@mail.missouri.edu'),
	(234,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 15:59:57','jy6vd@mail.missouri.edu'),
	(235,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 16:07:17','jy6vd@mail.missouri.edu'),
	(236,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 16:41:40','devincargill@missourirail.com'),
	(237,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 16:42:00','testconductor@missourirail.com'),
	(238,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 17:22:04','devincargill@missourirail.com'),
	(239,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 17:25:57','testconductor@missourirail.com'),
	(240,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 17:34:27','testconductor@missourirail.com'),
	(241,'192.236.100.27','signup by user on /~GROUP10/signup.php','2017-04-15 18:10:07','testengineer@missourirail.com'),
	(242,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 18:10:28','testengineer@missourirail.com'),
	(243,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 18:30:30','testengineer@missourirail.com'),
	(244,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 18:36:00','testengineer@missourirail.com'),
	(245,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 18:46:33','testconductor@missourirail.com'),
	(246,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 18:47:02','testconductor@missourirail.com'),
	(247,'107.77.87.50','signup by user on /~GROUP10/signup.php','2017-04-15 18:47:14','jebrobertson4@gmail.com'),
	(248,'107.77.87.50','signup by user on /~GROUP10/signup.php','2017-04-15 18:48:04','testmail@best.com'),
	(249,'107.77.87.50','login on /~GROUP10/login.php','2017-04-15 18:48:40','jebrobertson4@gmail.com'),
	(250,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 18:50:14','devincargill@missourirail.com'),
	(251,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 18:50:19','devincargill@missourirail.com'),
	(252,'107.77.87.50','login on /~GROUP10/login.php','2017-04-15 18:50:21','jebrobertson4@gmail.com'),
	(253,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 18:50:34','testconductor@missourirail.com'),
	(254,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 18:53:40','testconductor@missourirail.com'),
	(255,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 18:54:22','testconductor@missourirail.com'),
	(256,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 18:54:43','testengineer@missourirail.com'),
	(257,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 18:54:47','devincargill@missourirail.com'),
	(258,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 18:56:53','testconductor@missourirail.com'),
	(259,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 18:59:29','testconductor@missourirail.com'),
	(260,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 19:00:06','testengineer@missourirail.com'),
	(261,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 19:00:22','devincargill@missourirail.com'),
	(262,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 19:00:29','devincargill@missourirail.com'),
	(263,'192.236.100.27','signup by user on /~GROUP10/signup.php','2017-04-15 19:08:04','jeffsessions'),
	(264,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 19:19:48','devincargill@missourirail.com'),
	(265,'192.236.100.27','signup by user on /~GROUP10/signup.php','2017-04-15 19:21:28','testcustomer@test.com'),
	(266,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 19:21:40','testcustomer@test.com'),
	(267,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 19:46:36','testcustomer@test.com'),
	(268,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 19:52:39','devincargill@missourirail.com'),
	(269,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 19:52:48','testcustomer@test.com'),
	(270,'108.169.209.201','login on /~GROUP10/login.php','2017-04-15 19:59:17','thunpisit.am@gmail.com'),
	(271,'108.169.209.201','login on /~GROUP10/login.php','2017-04-15 19:59:34','thunpisit@missourirail.com'),
	(272,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 20:01:07','devincargill@missourirail.com'),
	(273,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 20:01:20','testconductor@missourirail.com'),
	(274,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 20:01:34','testcustomer@test.com'),
	(275,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 21:10:49','devincargill@missourirail.com'),
	(276,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 21:11:11','testconductor@missourirail.com'),
	(277,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 21:11:20','testengineer@missourirail.com'),
	(278,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 21:11:29','testcustomer@test.com'),
	(279,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 21:13:48','devincargill@missourirail.com'),
	(280,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 21:54:34','devincargill@missourirail.com'),
	(281,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 21:54:43','testconductor@missourirail.com'),
	(282,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 21:54:56','testengineer@missourirail.com'),
	(283,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 21:55:06','testcustomer@test.com'),
	(284,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 21:57:00','testcustomer@test.com'),
	(285,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 21:57:20','devincargill@missourirail.com'),
	(286,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 22:09:25','testcustomer@test.com'),
	(287,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 22:09:54','testconductor@missourirail.com'),
	(288,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 22:10:13','testengineer@missourirail.com'),
	(289,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 22:10:21','devincargill@missourirail.com'),
	(290,'192.236.100.27','login on /~GROUP10/login.php','2017-04-15 22:13:03','testcustomer@test.com'),
	(291,'107.77.87.50','login on /~GROUP10/login.php','2017-04-16 00:21:24','jebrobertson4@gmail.com'),
	(292,'173.31.198.199','login on /~GROUP10/login.php','2017-04-16 00:37:28','jy6vd@mail.missouri.edu'),
	(293,'173.31.198.199','login on /~GROUP10/login.php','2017-04-16 00:37:58','testconductor@missourirail.com'),
	(294,'209.54.86.27','signup by user on /~GROUP10/signup.php','2017-04-16 13:13:04','lguerdan@yahoo.com'),
	(295,'192.236.100.27','login on /~GROUP10/login.php','2017-04-16 14:05:52','devincargill@missourirail.com'),
	(296,'192.236.100.27','login on /~GROUP10/login.php','2017-04-16 15:12:53','johnwilliams@williams.com'),
	(297,'192.236.100.27','login on /~GROUP10/login.php','2017-04-16 15:13:09','devincargill@missourirail.com'),
	(298,'192.236.100.27','signup by user on /~GROUP10/controller.php','2017-04-16 15:16:22','bigboy@bigboy.ninja'),
	(299,'192.236.100.27','login on /~GROUP10/login.php','2017-04-16 15:16:58','bigboy@bigboy.ninja'),
	(300,'192.236.100.27','login on /~GROUP10/login.php','2017-04-16 15:32:27','devincargill@missourirail.com'),
	(301,'108.169.209.237','login on /~GROUP10/login.php','2017-04-16 15:38:14','thunpisit.am@gmail.com'),
	(302,'192.236.100.27','login on /~GROUP10/login.php','2017-04-16 15:40:30','bigboy@bigboy.ninja'),
	(303,'192.236.100.27','login on /~GROUP10/login.php','2017-04-16 16:05:10','testconductor@missourirail.com'),
	(304,'192.236.100.27','login on /~GROUP10/login.php','2017-04-16 16:05:59','testengineer@missourirail.com'),
	(305,'192.236.100.27','login on /~GROUP10/login.php','2017-04-16 16:07:34','devincargill@missourirail.com'),
	(306,'192.236.100.27','login on /~GROUP10/login.php','2017-04-16 16:09:35','devincargill@missourirail.com'),
	(307,'192.236.100.27','login on /~GROUP10/login.php','2017-04-16 16:13:01','testengineer@missourirail.com'),
	(308,'192.236.100.27','login on /~GROUP10/login.php','2017-04-16 16:13:40','testconductor@missourirail.com'),
	(309,'192.236.100.27','login on /~GROUP10/login.php','2017-04-16 16:20:51','testengineer@missourirail.com'),
	(310,'192.236.100.27','login on /~GROUP10/login.php','2017-04-16 16:21:17','testcustomer@test.com'),
	(311,'192.236.100.27','login on /~GROUP10/login.php','2017-04-16 16:24:17','testconductor@missourirail.com'),
	(312,'192.236.100.27','login on /~GROUP10/login.php','2017-04-16 16:24:35','testcustomer@test.com'),
	(313,'192.236.100.27','login on /~GROUP10/login.php','2017-04-16 16:28:11','devincargill@missourirail.com'),
	(314,'192.236.100.27','login on /~GROUP10/login.php','2017-04-16 16:33:33','bigboy@bigboy.ninja'),
	(315,'192.236.100.27','login on /~GROUP10/login.php','2017-04-16 16:36:06','devincargill@missourirail.com'),
	(316,'192.236.100.27','login on /~GROUP10/login.php','2017-04-16 16:36:21','testconductor@missourirail.com'),
	(317,'192.236.100.27','login on /~GROUP10/login.php','2017-04-16 16:37:53','bigboy@bigboy.ninja'),
	(318,'192.236.100.27','login on /~GROUP10/login.php','2017-04-16 16:38:06','devincargill@missourirail.com'),
	(319,'192.236.100.27','login on /~GROUP10/login.php','2017-04-16 16:38:24','bigboy@bigboy.ninja'),
	(320,'192.236.100.27','login on /~GROUP10/login.php','2017-04-16 17:28:16','devincargill@missourirail.com'),
	(321,'192.236.100.27','signup by user on /~GROUP10/controller.php','2017-04-16 17:29:07','6969@email.com'),
	(322,'192.236.100.27','login on /~GROUP10/login.php','2017-04-16 17:29:23','6969@email.com'),
	(323,'192.236.100.27','login on /~GROUP10/login.php','2017-04-16 17:56:15','devincargill@missourirail.com'),
	(324,'192.236.100.27','login on /~GROUP10/login.php','2017-04-16 17:57:03','devincargill@missourirail.com'),
	(325,'192.236.100.27','login on /~GROUP10/login.php','2017-04-16 17:57:50','devincargill@missourirail.com'),
	(326,'192.236.100.27','login on /~GROUP10/login.php','2017-04-16 18:14:22','devincargill@missourirail.com'),
	(327,'192.236.100.27','login on /~GROUP10/login.php','2017-04-16 18:14:51','bigboy@bigboy.ninja'),
	(328,'192.236.100.27','login on /~GROUP10/login.php','2017-04-16 18:17:50','testcustomer@test.com'),
	(329,'192.236.100.27','login on /~GROUP10/login.php','2017-04-16 18:42:53','devincargill@missourirail.com'),
	(330,'192.236.100.27','login on /~GROUP10/login.php','2017-04-16 18:44:56','testcustomer@test.com'),
	(331,'10.7.35.160','login on /~GROUP10/login.php','2017-04-17 11:51:34','testcustomer@test.com'),
	(332,'192.236.100.27','login on /~GROUP10/login.php','2017-04-17 13:34:06','devincargill@missourirail.com'),
	(333,'10.7.85.206','login on /~GROUP10/login.php','2017-04-17 13:54:00','thunpisit.am@gmail.com'),
	(334,'192.236.100.27','login on /~GROUP10/login.php','2017-04-17 14:53:21','testcustomer@test.com'),
	(335,'192.236.100.27','login on /~GROUP10/login.php','2017-04-17 14:53:43','devincargill@missourirail.com'),
	(336,'192.236.100.27','login on /~GROUP10/login.php','2017-04-17 14:54:18','testcustomer@test.com'),
	(337,'192.236.100.27','login on /~GROUP10/login.php','2017-04-17 15:09:15','devincargill@missourirail.com'),
	(338,'192.236.100.27','signup by user on /~GROUP10/controller.php','2017-04-17 18:17:05','ericcargill'),
	(339,'192.236.100.27','login on /~GROUP10/login.php','2017-04-17 20:51:00','devincargill@missourirail.com'),
	(340,'192.236.100.27','signup by user on /~GROUP10/controller.php','2017-04-17 20:51:37','johnsmith@smith.com'),
	(341,'192.236.100.27','signup by user on /~GROUP10/controller.php','2017-04-17 20:56:15','zelda'),
	(342,'192.236.100.27','signup by user on /~GROUP10/controller.php','2017-04-17 20:58:34','hayden'),
	(343,'192.236.100.27','login on /~GROUP10/login.php','2017-04-17 21:29:31','devincargill@missourirail.com'),
	(344,'192.236.100.27','login on /~GROUP10/login.php','2017-04-17 21:39:52','testconductor@missourirail.com'),
	(345,'192.236.100.27','login on /~GROUP10/login.php','2017-04-17 21:40:08','testengineer@missourirail.com'),
	(346,'192.236.100.27','login on /~GROUP10/login.php','2017-04-17 21:40:21','testcustomer@test.com'),
	(347,'10.7.84.160','login on /~GROUP10/login.php','2017-04-18 09:37:15','thunpisit.am@gmail.com'),
	(348,'10.7.84.160','login on /~GROUP10/login.php','2017-04-18 09:38:04','thunpisit@missourirail.com'),
	(349,'10.7.84.160','login on /~GROUP10/login.php','2017-04-18 09:38:28','testcustomer@test.com'),
	(350,'192.236.100.27','login on /~GROUP10/login.php','2017-04-18 10:44:41','devincargill@missourirail.com'),
	(351,'192.236.100.27','signup by user on /~GROUP10/controller.php','2017-04-18 10:45:14','henrygentle@gentle.com'),
	(352,'192.236.100.27','signup by user on /~GROUP10/controller.php','2017-04-18 10:47:54','davidauger'),
	(353,'192.236.100.27','signup by user on /~GROUP10/controller.php','2017-04-18 10:51:03','griffinstiens@gmail.com'),
	(354,'192.236.100.27','signup by user on /~GROUP10/controller.php','2017-04-18 11:21:37','grantmiene@test.com'),
	(355,'192.236.100.27','signup by user on /~GROUP10/controller.php','2017-04-18 11:23:27','davidauger@test.com'),
	(356,'192.236.100.27','login on /~GROUP10/login.php','2017-04-18 12:09:37','testcustomer@test.com'),
	(357,'192.236.100.27','login on /~GROUP10/login.php','2017-04-18 12:11:04','devincargill@missourirail.com'),
	(358,'192.236.100.27','login on /~GROUP10/login.php','2017-04-18 13:20:16','grantmiene@test.com'),
	(359,'192.236.100.27','login on /~GROUP10/login.php','2017-04-18 13:20:26','devincargill@missourirail.com'),
	(360,'192.236.100.27','login on /~GROUP10/login.php','2017-04-18 13:21:10','grantmiene@test.com'),
	(361,'192.236.100.27','login on /~GROUP10/login.php','2017-04-18 13:21:27','devincargill@missourirail.com'),
	(362,'192.236.100.27','login on /~GROUP10/login.php','2017-04-18 13:22:00','grantmiene@test.com'),
	(363,'192.236.100.27','login on /~GROUP10/login.php','2017-04-18 13:22:15','testcustomer@test.com'),
	(364,'192.236.100.27','login on /~GROUP10/login.php','2017-04-18 13:22:20','devincargill@missourirail.com'),
	(365,'192.236.100.27','login on /~GROUP10/login.php','2017-04-18 13:23:10','grantmiene@test.com'),
	(366,'192.236.100.27','login on /~GROUP10/login.php','2017-04-18 13:23:17','devincargill@missourirail.com'),
	(367,'192.236.100.27','login on /~GROUP10/login.php','2017-04-18 13:35:26','grantmiene@test.com'),
	(368,'192.236.100.27','login on /~GROUP10/login.php','2017-04-18 13:35:38','devincargill@missourirail.com'),
	(369,'192.236.100.27','login on /~GROUP10/login.php','2017-04-18 13:46:57','grantmiene@test.com'),
	(370,'192.236.100.27','login on /~GROUP10/login.php','2017-04-18 13:47:10','devincargill@missourirail.com'),
	(371,'192.236.100.27','signup for  account on /~GROUP10/signup.php','2017-04-18 15:01:05','jimmoose@missourirail.com'),
	(372,'192.236.100.27','signup for administrator account on /~GROUP10/signup.php','2017-04-18 15:06:16','jimmoose@missourirail.com'),
	(373,'192.236.100.27','signup for administrator account on /~GROUP10/signup.php','2017-04-18 15:08:17','jimmoose@missourirail.com'),
	(374,'192.236.100.27','signup for administrator account on /~GROUP10/signup.php','2017-04-18 15:09:22','jimmoose@missourirail.com'),
	(375,'192.236.100.27','signup for administrator account on /~GROUP10/signup.php','2017-04-18 15:12:31','jimmoose@missourirail.com'),
	(376,'192.236.100.27','signup for administrator account on /~GROUP10/signup.php','2017-04-18 15:14:34','jimmoose@missourirail.com'),
	(377,'192.236.100.27','signup for conductor account on /~GROUP10/signup.php','2017-04-18 15:15:21','andrewmoorman@missourirail.com'),
	(378,'192.236.100.27','signup for engineer account on /~GROUP10/signup.php','2017-04-18 15:16:15','brianschmidt@missourirail.com'),
	(379,'192.236.100.27','signup for engineer account on /~GROUP10/signup.php','2017-04-18 15:17:45','brianschmidt@missourirail.com'),
	(380,'192.236.100.27','signup for customer account on /~GROUP10/signup.php','2017-04-18 15:18:31','mattklamm@test.com'),
	(381,'192.236.100.27','login on /~GROUP10/login.php','2017-04-18 15:18:55','mattklamm@test.com'),
	(382,'192.236.100.27','login on /~GROUP10/login.php','2017-04-18 15:43:51','devincargill@missourirail.com'),
	(383,'10.7.20.142','login on /~GROUP10/login.php','2017-04-18 16:54:30','jy6vd@mail.missouri.edu'),
	(384,'10.7.32.179','login on /~GROUP10/login.php','2017-04-18 16:55:37','devincargill@missourirail.com'),
	(385,'10.7.32.179','login on /~GROUP10/login.php','2017-04-18 16:58:26','testconductor@missourirail.com'),
	(386,'10.7.20.142','login on /~GROUP10/login.php','2017-04-18 16:59:26','jy6vd@mail.missouri.edu'),
	(387,'10.7.32.179','login on /~GROUP10/login.php','2017-04-18 16:59:39','testengineer@missourirail.com'),
	(388,'10.7.20.142','login on /~GROUP10/login.php','2017-04-18 16:59:44','jy6vd@mail.missouri.edu'),
	(389,'10.7.20.142','login on /~GROUP10/login.php','2017-04-18 16:59:49','jy6vd@mail.missouri.edu'),
	(390,'10.7.32.179','login on /~GROUP10/login.php','2017-04-18 17:00:22','testcustomer@test.com'),
	(391,'10.7.20.142','login on /~GROUP10/login.php','2017-04-18 17:01:14','jy6vd@mail.missouri.edu'),
	(392,'10.7.20.142','login on /~GROUP10/login.php','2017-04-18 17:02:21','jy6vd@mail.missouri.edu'),
	(393,'10.7.32.179','login on /~GROUP10/login.php','2017-04-18 17:02:44','devincargill@missourirail.com'),
	(394,'10.7.20.142','login on /~GROUP10/login.php','2017-04-18 17:02:48','jy6vd@mail.missouri.edu'),
	(395,'10.7.32.179','login on /~GROUP10/login.php','2017-04-18 17:02:52','devincargill@missourirail.com'),
	(396,'10.7.20.142','login on /~GROUP10/login.php','2017-04-18 17:04:32','jy6vd@mail.missouri.edu'),
	(397,'10.7.20.142','signup for administrator account on /~GROUP10/signup.php','2017-04-18 17:09:44','jy6vd@mail.missouri.edu'),
	(398,'10.7.20.142','login on /~GROUP10/login.php','2017-04-18 17:09:52','jy6vd@mail.missouri.edu'),
	(399,'10.7.32.179','signup for administrator account on /~GROUP10/signup.php','2017-04-18 17:09:53','devincargill@missourirail.com'),
	(400,'10.7.32.179','login on /~GROUP10/login.php','2017-04-18 17:10:00','devincargill@missourirail.com'),
	(401,'10.7.32.179','signup for conductor account on /~GROUP10/signup.php','2017-04-18 17:11:02','testconductor@missourirail.com'),
	(402,'10.7.32.179','login on /~GROUP10/login.php','2017-04-18 17:11:11','testconductor@missourirail.com'),
	(403,'10.7.32.179','signup for engineer account on /~GROUP10/signup.php','2017-04-18 17:11:54','testengineer@missourirail.com'),
	(404,'10.7.28.62','signup for administrator account on /~GROUP10/signup.php','2017-04-18 17:12:00','scjc68@mail.missourirail.edu'),
	(405,'10.7.32.179','login on /~GROUP10/login.php','2017-04-18 17:12:01','testengineer@missourirail.com'),
	(406,'10.7.20.142','login on /~GROUP10/login.php','2017-04-18 17:13:09','jy6vd@mail.missouri.edu'),
	(407,'10.7.20.142','login on /~GROUP10/login.php','2017-04-18 17:13:39','jy6vd@mail.missouri.edu'),
	(408,'10.7.32.179','signup for customer account on /~GROUP10/signup.php','2017-04-18 17:14:06','testcustomer@test.com'),
	(409,'10.7.32.179','login on /~GROUP10/login.php','2017-04-18 17:14:14','testcustomer@test.com'),
	(410,'10.7.20.142','login on /~GROUP10/login.php','2017-04-18 17:14:24','jy6vd@mail.missouri.edu'),
	(411,'10.7.28.62','login on /~GROUP10/login.php','2017-04-18 17:14:37','scjc68@mail.missourirail.edu'),
	(412,'10.7.20.142','login on /~GROUP10/login.php','2017-04-18 17:14:53','jy6vd@mail.missouri.edu'),
	(413,'10.7.32.179','signup for customer account on /~GROUP10/signup.php','2017-04-18 17:15:55','jimmoose@test.com'),
	(414,'10.7.32.179','login on /~GROUP10/login.php','2017-04-18 17:16:29','jimmoose@test.com'),
	(415,'107.77.89.79','signup for administrator account on /~GROUP10/signup.php','2017-04-18 17:18:54','jebrobertson4@gmail.com'),
	(416,'10.7.20.142','login on /~GROUP10/login.php','2017-04-18 17:25:06','jy6vd@mail.missouri.edu'),
	(417,'10.7.20.142','login on /~GROUP10/login.php','2017-04-18 17:25:14','jy6vd@mail.missouri.edu'),
	(418,'10.7.32.179','login on /~GROUP10/login.php','2017-04-18 17:38:58','devincargill@missourirail.com'),
	(419,'10.7.32.179','login on /~GROUP10/login.php','2017-04-18 17:39:55','testconductor@missourirail.com'),
	(420,'192.236.100.27','login on /~GROUP10/login.php','2017-04-19 00:55:01','devincargill@missourirail.com'),
	(421,'192.236.100.27','login on /~GROUP10/login.php','2017-04-19 00:59:06','testcustomer@test.com'),
	(422,'192.236.100.27','login on /~GROUP10/login.php','2017-04-19 01:08:35','testengineer@missourirail.com'),
	(423,'107.77.85.20','login on /~GROUP10/login.php','2017-04-19 15:54:57','devincargill@missourirail.com'),
	(424,'107.77.85.20','login on /~GROUP10/login.php','2017-04-19 15:55:14','devincargill@missourirail.com'),
	(425,'107.77.85.20','login on /~GROUP10/login.php','2017-04-19 15:55:56','devincargill@missourirail.com'),
	(426,'107.77.85.20','login on /~GROUP10/login.php','2017-04-19 15:56:40','testconductor@missourirail.com'),
	(427,'107.77.85.20','login on /~GROUP10/login.php','2017-04-19 15:59:28','devincargill@missourirail.com'),
	(428,'10.7.32.170','login on /~GROUP10/login.php','2017-04-19 15:59:44','devincargill@missourirail.com'),
	(429,'107.77.85.20','login on /~GROUP10/login.php','2017-04-19 16:01:31','devincargill@missourirail.com'),
	(430,'107.77.85.20','login on /~GROUP10/login.php','2017-04-19 16:03:09','testconductor@missourirail.com'),
	(431,'10.7.20.103','login on /~GROUP10/login.php','2017-04-19 19:12:40','jy6vd@mail.missouri.edu'),
	(432,'10.7.28.112','login on /~GROUP10/login.php','2017-04-20 13:57:14','scjc68@mail.missourirail.edu'),
	(433,'10.7.30.199','signup for customer account on /~GROUP10/signup.php','2017-04-20 16:11:40','iamatest.com'),
	(434,'10.7.30.199','signup for customer account on /~GROUP10/signup.php','2017-04-20 17:15:32','test@test.com'),
	(435,'10.7.30.199','login on /~GROUP10/login.php','2017-04-20 17:15:46','test@test.com'),
	(436,'10.7.30.199','login on /~GROUP10/login.php','2017-04-20 17:49:58','scjc68@mail.missourirail.edu'),
	(437,'107.77.111.75','login on /~jsr8d3/Database/Website/main/login.php','2017-04-21 14:40:18','jebrobertson4@gmail.com'),
	(438,'107.77.111.75','login on /~jsr8d3/Database/Website/main/login.php','2017-04-21 14:50:13','jebrobertson4@gmail.com'),
	(439,'107.77.111.75','login on /~jsr8d3/Database/Website/main/login.php','2017-04-21 14:57:35','test@test.com'),
	(440,'107.77.111.75','login on /~jsr8d3/Database/Website/main/login.php','2017-04-21 14:58:36','jebrobertson4@gmail.com'),
	(441,'107.77.111.75','login on /~GROUP10/login.php','2017-04-21 16:09:18','jebrobertson4@gmail.com'),
	(442,'69.29.93.202','login on /~jsr8d3/Database/Website/main/login.php','2017-04-21 17:43:46','jebrobertson4@gmail.com'),
	(443,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 10:23:37','devincargill@missourirail.com'),
	(444,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 10:27:55','testconductor@missourirail.com'),
	(445,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 10:40:04','devincargill@missourirail.com'),
	(446,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 10:42:42','devincargill@missourirail.com'),
	(447,'64.91.3.10','signup for administrator account on /~GROUP10/signup.php','2017-04-22 12:23:13','test123'),
	(448,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 13:25:42','devincargill@missourirail.com'),
	(449,'107.77.111.49','login on /~GROUP10/login.php','2017-04-22 15:01:53','jebrobertson4@gmail.com'),
	(450,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 15:03:32','devincargill@missourirail.com'),
	(451,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 15:18:16','devincargill@missourirail.com'),
	(452,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 15:23:02','devincargill@missourirail.com'),
	(453,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 15:23:22','devincargill@missourirail.com'),
	(454,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 15:26:01','devincargill@missourirail.com'),
	(455,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 15:26:16','devincargill@missourirail.com'),
	(456,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 15:34:20','testcustomer@test.com'),
	(457,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 15:37:48','testcustomer@test.com'),
	(458,'107.77.111.49','login on /~GROUP10/login.php','2017-04-22 15:38:14','test@test.com'),
	(459,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 15:43:18','testcustomer@test.com'),
	(460,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 15:54:08','testcustomer@test.com'),
	(461,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 15:54:30','testcustomer@test.com'),
	(462,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 15:56:30','testconductor@missourirail.com'),
	(463,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 15:56:45','testconductor@missourirail.com'),
	(464,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 15:58:30','devincargill@missourirail.com'),
	(465,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 15:58:41','devincargill@missourirail.com'),
	(466,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 15:58:47','devincargill@missourirail.com'),
	(467,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 15:58:55','testconductor@missourirail.com'),
	(468,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 16:00:19','testconductor@missourirail.com'),
	(469,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 16:00:32','testconductor@missourirail.com'),
	(470,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 16:00:41','testengineer@missourirail.com'),
	(471,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 16:02:08','testengineer@missourirail.com'),
	(472,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 16:02:18','testengineer@missourirail.com'),
	(473,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 16:02:42','testengineer@missourirail.com'),
	(474,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 16:02:53','testcustomer@test.com'),
	(475,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 16:03:30','devincargill@missourirail.com'),
	(476,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 16:03:54','devincargill@missourirail.com'),
	(477,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 16:06:11','devincargill@missourirail.com'),
	(478,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 16:21:18','devincargill@missourirail.com'),
	(479,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 16:33:56','devincargill@missourirail.com'),
	(480,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 16:35:39','devincargill@missourirail.com'),
	(481,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 16:36:01','testcustomer@test.com'),
	(482,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 16:36:13','testcustomer@test.com'),
	(483,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 16:36:35','testcustomer@test.com'),
	(484,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 16:39:15','testcustomer@test.com'),
	(485,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 16:39:22','devincargill@missourirail.com'),
	(486,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 16:40:08','test@test.com'),
	(487,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 16:40:14','devincargill@missourirail.com'),
	(488,'192.236.100.27','signup for customer account on /~GROUP10/controller.php','2017-04-22 16:50:57','ericcargill@yahoo.com'),
	(489,'192.236.100.27','signup for customer account on /~GROUP10/controller.php','2017-04-22 16:52:56','ericcargill@yahoo.com'),
	(490,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 16:53:30','ericcargill@yahoo.com'),
	(491,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 16:53:48','ericcargill@yahoo.com'),
	(492,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 16:53:58','devincargill@missourirail.com'),
	(493,'192.236.100.27','signup for customer account on /~GROUP10/signup.php','2017-04-22 16:55:54','haydenhaddock@test.com'),
	(494,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 16:56:07','haydenhaddock@test.com'),
	(495,'192.236.100.27','signup for customer account on /~GROUP10/signup.php','2017-04-22 17:03:58','haydenhaddock@test.com'),
	(496,'192.236.100.27','signup for customer account on /~GROUP10/signup.php','2017-04-22 17:05:46','haydenhaddock@test.com'),
	(497,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 17:05:55','haydenhaddock@test.com'),
	(498,'192.236.100.27','signup for conductor account on /~GROUP10/signup.php','2017-04-22 17:14:25','rickross@missourirail.com'),
	(499,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 17:14:47','rickross@missourirail.com'),
	(500,'192.236.100.27','signup for engineer account on /~GROUP10/signup.php','2017-04-22 17:15:29','davidauger@missourirail.com'),
	(501,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 17:15:42','davidauger@missourirail.com'),
	(502,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 17:15:56','davidauger@missourirail.com'),
	(503,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 17:27:37','devincargill@missourirail.com'),
	(504,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 17:43:09','testconductor@missourirail.com'),
	(505,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 17:43:15','testengineer@missourirail.com'),
	(506,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 17:43:21','testcustomer@test.com'),
	(507,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 17:43:45','devincargill@missourirail.com'),
	(508,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 17:43:50','testconductor@missourirail.com'),
	(509,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 17:43:57','testcustomer@test.com'),
	(510,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 17:44:02','testengineer@missourirail.com'),
	(511,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 17:49:35','devincargill@missourirail.com'),
	(512,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 17:52:15','devincargill@missourirail.com'),
	(513,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 18:18:08','devincargill@missourirail.com'),
	(514,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 19:27:05','devincargill@missourirail.com'),
	(515,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 19:29:08','devincargill@missourirail.com'),
	(516,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 19:34:59','devincargill@missourirail.com'),
	(517,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 19:35:09','devincargill@missourirail.com'),
	(518,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 19:35:19','devincargill@missourirail.com'),
	(519,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 19:35:36','devincargill@missourirail.com'),
	(520,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 19:36:31','devincargill@missourirail.com'),
	(521,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 19:37:55','devincargill@missourirail.com'),
	(522,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 19:38:01','devincargill@missourirail.com'),
	(523,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 19:38:28','devincargill@missourirail.com'),
	(524,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 21:54:15','jimmoose@test.com'),
	(525,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 21:54:28','devincargill@missourirail.com'),
	(526,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 21:55:03','testcustomer@test.com'),
	(527,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 21:55:54','devincargill@missourirail.com'),
	(528,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 23:22:58','testconductor@missourirail.com'),
	(529,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 23:24:14','testengineer@missourirail.com'),
	(530,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 23:24:23','testcustomer@test.com'),
	(531,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 23:26:00','devincargill@missourirail.com'),
	(532,'192.236.100.27','signup for conductor account on /~GROUP10/signup.php','2017-04-22 23:55:07','bob@missourirail.com'),
	(533,'192.236.100.27','login on /~GROUP10/login.php','2017-04-22 23:57:10','devincargill@missourirail.com'),
	(534,'107.77.111.49','signup for administrator account on /~GROUP10/signup.php','2017-04-22 23:57:30','admin@admin.com'),
	(535,'107.77.111.49','login on /~GROUP10/login.php','2017-04-22 23:57:46','admin@admin.com'),
	(536,'192.236.100.27','login on /~GROUP10/login.php','2017-04-23 01:46:11','devincargill@missourirail.com'),
	(537,'192.236.100.27','login on /~GROUP10/login.php','2017-04-23 11:52:07','devincargill@missourirail.com'),
	(538,'192.236.100.27','signup for administrator account on /~GROUP10/signup.php','2017-04-23 14:37:50','testadmin@missourirail.com'),
	(539,'192.236.100.27','login on /~GROUP10/login.php','2017-04-23 14:38:02','testadmin@missourirail.com'),
	(540,'192.236.100.27','login on /~GROUP10/login.php','2017-04-23 14:45:17','devincargill@missourirail.com'),
	(541,'192.236.100.27','signup for engineer account on /~GROUP10/signup.php','2017-04-23 15:00:57','testengineer2@missourirail.com'),
	(542,'192.236.100.27','login on /~GROUP10/login.php','2017-04-23 15:01:09','testengineer2@missourirail.com'),
	(543,'192.236.100.27','login on /~GROUP10/login.php','2017-04-23 15:02:09','devincargill@missourirail.com'),
	(544,'192.236.100.27','signup for customer account on /~GROUP10/controller.php','2017-04-23 16:41:53','testcustomer2@test.com'),
	(545,'192.236.100.27','login on /~GROUP10/login.php','2017-04-23 16:43:13','testcustomer2@test.com'),
	(546,'209.54.86.27','login on /~GROUP10/login.php','2017-04-23 16:44:03','testengineer@missourirail.com'),
	(547,'209.54.86.27','login on /~GROUP10/login.php','2017-04-23 16:44:32','testconductor@missourirail.com'),
	(548,'209.54.86.27','login on /~GROUP10/login.php','2017-04-23 16:44:53','testadmin@missourirail.com'),
	(549,'192.236.100.27','login on /~GROUP10/login.php','2017-04-23 16:48:11','testcustomer@test.com'),
	(550,'209.54.86.27','login on /~GROUP10/login.php','2017-04-23 16:50:40','testcustomer@test.com'),
	(551,'74.84.93.130','signup for customer account on /~GROUP10/signup.php','2017-04-23 16:53:48','bob@bob.bob'),
	(552,'74.84.93.130','login on /~GROUP10/login.php','2017-04-23 16:53:57','bob@bob.bob'),
	(553,'192.236.100.27','login on /~GROUP10/login.php','2017-04-23 16:56:15','testconductor@missourirail.com'),
	(554,'209.54.86.27','login on /~GROUP10/login.php','2017-04-23 17:15:47','testadmin@missourirail.com'),
	(555,'192.236.100.27','login on /~GROUP10/login.php','2017-04-23 17:20:57','testconductor@missourirail.com'),
	(556,'192.236.100.27','login on /~GROUP10/login.php','2017-04-23 17:21:06','testconductor@missourirail.com'),
	(557,'192.236.100.27','login on /~GROUP10/login.php','2017-04-23 17:21:24','devincargill@missourirail.com'),
	(558,'192.236.100.27','login on /~GROUP10/login.php','2017-04-23 17:21:58','testengineer@missourirail.com'),
	(559,'192.236.100.27','login on /~GROUP10/login.php','2017-04-23 17:23:17','devincargill@missourirail.com'),
	(560,'192.236.100.27','login on /~GROUP10/login.php','2017-04-23 17:24:13','testengineer2@missourirail.com'),
	(561,'192.236.100.27','login on /~GROUP10/login.php','2017-04-23 17:24:20','devincargill@missourirail.com'),
	(562,'192.236.100.27','login on /~GROUP10/login.php','2017-04-23 17:24:46','testengineer2@missourirail.com'),
	(563,'192.236.100.27','login on /~GROUP10/login.php','2017-04-23 17:27:40','testadmin@missourirail.com'),
	(564,'192.236.100.27','login on /~GROUP10/login.php','2017-04-23 17:28:58','testadmin@missourirail.com'),
	(565,'192.236.100.27','signup for customer account on /~GROUP10/controller.php','2017-04-23 17:29:41','deayqf'),
	(566,'209.54.86.27','login on /~GROUP10/login.php','2017-04-23 18:23:13','testengineer@missourirail.com'),
	(567,'209.54.86.27','login on /~GROUP10/login.php','2017-04-23 18:40:55','testconductor@missourirail.com'),
	(568,'192.236.100.27','login on /~GROUP10/login.php','2017-04-23 19:25:35','devincargill@missourirail.com'),
	(569,'209.54.86.27','login on /~GROUP10/login.php','2017-04-23 19:26:42','testengineer@missourirail.com'),
	(570,'209.54.86.27','login on /~GROUP10/login.php','2017-04-23 19:28:57','testengineer@missourirail.com'),
	(571,'209.54.86.27','login on /~GROUP10/login.php','2017-04-23 19:31:04','testconductor@missourirail.com'),
	(572,'192.236.100.27','login on /~GROUP10/login.php','2017-04-23 19:48:38','testconductor@missourirail.com'),
	(573,'192.236.100.27','login on /~GROUP10/login.php','2017-04-23 19:59:47','devincargill@missourirail.com'),
	(574,'192.236.100.27','login on /~GROUP10/login.php','2017-04-23 20:09:50','testconductor@missourirail.com'),
	(575,'192.236.100.27','login on /~GROUP10/login.php','2017-04-23 20:10:20','testengineer@missourirail.com');

/*!40000 ALTER TABLE `log` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table schedule
# ------------------------------------------------------------

DROP TABLE IF EXISTS `schedule`;

CREATE TABLE `schedule` (
  `depart_city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dest_city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `depart_time` time NOT NULL,
  `dest_time` time NOT NULL,
  `date` date DEFAULT NULL,
  `train_num` int(11) NOT NULL,
  PRIMARY KEY (`depart_city`,`depart_time`,`dest_city`,`dest_time`),
  KEY `train_num` (`train_num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `schedule` WRITE;
/*!40000 ALTER TABLE `schedule` DISABLE KEYS */;

INSERT INTO `schedule` (`depart_city`, `dest_city`, `depart_time`, `dest_time`, `date`, `train_num`)
VALUES
	('Cape Girardeau, MO','Jefferson City, MO','06:00:00','09:30:00','2017-04-21',1),
	('Columbia, MO','Joplin, MO','08:00:00','11:45:00','2017-04-26',2),
	('Columbia, MO','Independence, MO','10:00:00','11:45:00','2017-04-20',3),
	('Columbia, MO','Jefferson City, MO','10:00:00','10:30:00','0000-00-00',8),
	('Independence, MO','Cape Girardeau, MO','06:00:00','11:15:00','2017-04-27',4),
	('Independence, MO','Kansas City, MO','08:30:00','13:10:00','2017-04-29',11),
	('Jefferson City, MO','Independence, MO','08:00:00','10:00:00','2017-04-24',1),
	('Jefferson City, MO','Columbia, MO','09:50:00','10:45:00','2017-04-29',9),
	('Joplin, MO','Indpendence, MO','07:00:00','09:45:00','2017-05-01',5),
	('Kansas City, MO','Cape Girardeau, MO','06:00:00','11:15:00','2017-04-25',6),
	('Sedalia, MO','St.Louis, MO','07:00:00','10:00:00','2017-04-19',7),
	('Springfield, MO','Columbia, MO','08:00:00','11:00:00','2017-05-02',8),
	('Springfield, MO','Jefferson City, MO','08:00:00','10:30:00','2017-04-28',9),
	('St.Louis, MO','Kansas City, MO','07:00:00','10:45:00','2017-04-24',10);

/*!40000 ALTER TABLE `schedule` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table train
# ------------------------------------------------------------

DROP TABLE IF EXISTS `train`;

CREATE TABLE `train` (
  `train_num` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`train_num`),
  KEY `company_id` (`company_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `train` WRITE;
/*!40000 ALTER TABLE `train` DISABLE KEYS */;

INSERT INTO `train` (`train_num`, `company_id`)
VALUES
	(1,1234),
	(2,1235),
	(11,1235),
	(3,1236),
	(4,1237),
	(5,1238),
	(6,1239),
	(12,1239),
	(7,1240),
	(8,1241),
	(9,1242),
	(10,1243);

/*!40000 ALTER TABLE `train` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
