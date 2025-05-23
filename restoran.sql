-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for restoran
CREATE DATABASE IF NOT EXISTS `restoran` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `restoran`;

-- Dumping structure for table restoran.makanan
CREATE TABLE IF NOT EXISTS `makanan` (
  `MakananID` int NOT NULL AUTO_INCREMENT,
  `NamaMakanan` varchar(255) NOT NULL,
  `Kategori` varchar(100) DEFAULT NULL,
  `HargaRataRata` decimal(8,2) DEFAULT NULL,
  PRIMARY KEY (`MakananID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table restoran.minuman
CREATE TABLE IF NOT EXISTS `minuman` (
  `MinumanID` int NOT NULL AUTO_INCREMENT,
  `NamaMinuman` varchar(255) NOT NULL,
  `Tipe` varchar(100) DEFAULT NULL,
  `HargaRataRata` decimal(8,2) DEFAULT NULL,
  PRIMARY KEY (`MinumanID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table restoran.restoran
CREATE TABLE IF NOT EXISTS `restoran` (
  `RestaurantID` int NOT NULL AUTO_INCREMENT,
  `NamaRestoran` varchar(255) NOT NULL,
  `JenisKuliner` varchar(100) DEFAULT NULL,
  `IDMakananUnggulan` int DEFAULT NULL,
  `IDMinumanUnggulan` int DEFAULT NULL,
  PRIMARY KEY (`RestaurantID`),
  KEY `FK_MakananUnggulan` (`IDMakananUnggulan`),
  KEY `FK_MinumanUnggulan` (`IDMinumanUnggulan`),
  CONSTRAINT `FK_MakananUnggulan` FOREIGN KEY (`IDMakananUnggulan`) REFERENCES `makanan` (`MakananID`) ON DELETE SET NULL,
  CONSTRAINT `FK_MinumanUnggulan` FOREIGN KEY (`IDMinumanUnggulan`) REFERENCES `minuman` (`MinumanID`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
