-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.16-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table occassions_pro_db.event_types
CREATE TABLE IF NOT EXISTS `event_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('0','1','2') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table occassions_pro_db.event_types: ~11 rows (approximately)
/*!40000 ALTER TABLE `event_types` DISABLE KEYS */;
INSERT INTO `event_types` (`id`, `title`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Birthday', 'Birthday', '1', '2017-04-23 09:10:09', '2017-04-23 09:10:09', NULL),
	(2, 'Wedding', 'Wedding', '1', '2017-04-23 09:10:09', '2017-04-23 09:10:09', NULL),
	(3, 'Corporate', 'Corporate', '1', '2017-04-23 09:10:09', '2017-04-23 09:10:09', NULL),
	(4, 'Anniversary', 'Anniversary', '1', '2017-04-23 09:10:09', '2017-04-23 09:10:09', NULL),
	(5, 'Holiday', 'Holiday', '1', '2017-04-23 09:10:09', '2017-04-23 09:10:09', NULL),
	(6, 'Concert', 'Concert', '1', '2017-04-23 09:10:09', '2017-04-23 09:10:09', NULL),
	(7, 'Graduation', 'Graduation', '1', '2017-04-23 09:10:09', '2017-04-23 09:10:09', NULL),
	(8, 'Prom/School Dance', 'Prom/School Dance', '1', '2017-04-23 09:10:09', '2017-04-23 09:10:09', NULL),
	(9, 'House Party', 'House Party', '1', '2017-04-23 09:10:09', '2017-04-23 09:10:09', NULL),
	(10, 'Religious', 'Religious', '1', '2017-04-23 09:10:09', '2017-04-23 09:10:09', NULL),
	(11, 'General Events (everything else)', 'General Events (everything else)', '1', '2017-04-23 09:10:09', '2017-04-23 09:10:09', NULL);
/*!40000 ALTER TABLE `event_types` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
