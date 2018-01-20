-- --------------------------------------------------------
-- Poslužitelj:                  127.0.0.1
-- Server version:               10.1.28-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Verzija:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for todoapp
DROP DATABASE IF EXISTS `todoapp`;
CREATE DATABASE IF NOT EXISTS `todoapp` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `todoapp`;

-- Dumping structure for table todoapp.korisnik
DROP TABLE IF EXISTS `korisnik`;
CREATE TABLE IF NOT EXISTS `korisnik` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ime` varchar(30) NOT NULL,
  `prezime` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `lozinka` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `datum_registracije` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `zadnji_login` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table todoapp.task
DROP TABLE IF EXISTS `task`;
CREATE TABLE IF NOT EXISTS `task` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `naziv_taska` varchar(30) NOT NULL,
  `prioritet` enum('low','normal','high') NOT NULL,
  `rok` date NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'nije zavrseno',
  `todoID` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `todoID` (`todoID`),
  CONSTRAINT `task_ibfk_1` FOREIGN KEY (`todoID`) REFERENCES `todo` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=138 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table todoapp.todo
DROP TABLE IF EXISTS `todo`;
CREATE TABLE IF NOT EXISTS `todo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `naziv_liste` varchar(30) NOT NULL,
  `datum_izrade` datetime NOT NULL,
  `IDkorisnika` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDkorisnika` (`IDkorisnika`),
  CONSTRAINT `todo_ibfk_1` FOREIGN KEY (`IDkorisnika`) REFERENCES `korisnik` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
