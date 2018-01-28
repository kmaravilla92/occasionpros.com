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

-- Dumping structure for table occassions_pro_db.notifications
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notifiable_id` int(10) unsigned NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_id_notifiable_type_index` (`notifiable_id`,`notifiable_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table occassions_pro_db.notifications: ~8 rows (approximately)
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
INSERT INTO `notifications` (`id`, `type`, `notifiable_id`, `notifiable_type`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
	('18ccc2f3-6456-4c66-96c5-ee56be2f0766', 'App\\Notifications\\ProSelectedForAnEvent', 28, 'App\\User', '{"excerpt":"You\'ve been hired in Tess Parker\'s event Dinah my dear! I shall ever see su","message":"You\'ve been hired in <b>Tess Parker<\\/b>\'s event <b>Dinah my dear! I shall ever see such a tiny golden key, and when she got.<\\/b>."}', NULL, '2017-05-20 20:42:56', '2017-05-20 20:42:56'),
	('24116478-47a3-4ebf-a5f1-029fc13f9684', 'App\\Notifications\\ProPostedABid', 18, 'App\\User', '{"excerpt":" posted a new bid on your event Like a tea-tray in the middle of her voice,","message":"<b><\\/b> posted a new bid on your event <b>Like a tea-tray in the middle of her voice, and see that she wanted much.<\\/b>."}', NULL, '2017-05-20 20:41:47', '2017-05-20 20:41:47'),
	('27cd45a4-3241-4f31-8e27-457567efc655', 'App\\Notifications\\ProSelectedForAnEvent', 28, 'App\\User', '{"excerpt":"You\'ve been hired in","message":"You\'ve been hired in <b>Tess Parker<\\/b>\'s event <b>Prizes!\' Alice had no pictures or conversations in it, and on it in her.<\\/b>."}', NULL, '2017-05-13 05:28:37', '2017-05-13 05:28:37'),
	('54f0fb04-3a22-474a-adcc-523aac35bb37', 'App\\Notifications\\EventConfirmedByOP', 1, 'App\\User', '{"excerpt":"Your event Cheshire Cat sitting on a bough of a well--\' \'What did they live","message":"Your event <b>Cheshire Cat sitting on a bough of a well--\' \'What did they live on?\'.<\\/b> has been approved by OP."}', NULL, '2017-05-15 16:44:02', '2017-05-15 16:44:02'),
	('61b5d3bc-1ca0-42d3-bf96-8d569af9f403', 'App\\Notifications\\ProSelectedForAnEvent', 3, 'App\\User', '{"excerpt":"You\'ve been hired in Tess Parker\'s event Mock Turtle; \'but it seems to like","message":"You\'ve been hired in <b>Tess Parker<\\/b>\'s event <b>Mock Turtle; \'but it seems to like her, down here, that I should say what.<\\/b>."}', NULL, '2017-05-15 09:35:40', '2017-05-15 09:35:40'),
	('6b514840-fb46-4877-b4ae-1f1802e8898d', 'App\\Notifications\\ProSelectedForAnEvent', 28, 'App\\User', '{"excerpt":"You\'ve been hired in <b>Tess Parker<\\/b>\'s event <b>Prizes!\' Alice had no pictures or conversations in it, and on it in her.<\\/b>.","message":"You\'ve been hired in <b>Tess Parker<\\/b>\'s event <b>Prizes!\' Alice had no pictures or conversations in it, and on it in her.<\\/b>."}', NULL, '2017-05-13 05:28:04', '2017-05-13 05:28:04'),
	('72cbe364-1e8c-47a9-8d7c-d5cfa3ee30f6', 'App\\Notifications\\ProSelectedForAnEvent', 3, 'App\\User', '{"excerpt":"You\'ve been hired in Tess Parker\'s event Mock Turtle; \'but it seems to like","message":"You\'ve been hired in <b>Tess Parker<\\/b>\'s event <b>Mock Turtle; \'but it seems to like her, down here, that I should say what.<\\/b>."}', NULL, '2017-05-15 09:35:20', '2017-05-15 09:35:20'),
	('9aa1354a-53ff-4c67-9b29-ca75161466b5', 'App\\Notifications\\ProSelectedForAnEvent', 28, 'App\\User', '{"excerpt":"You\'ve been hired in Tess Parker\'s event Prizes!\' Alice had no pictures or ","message":"You\'ve been hired in <b>Tess Parker<\\/b>\'s event <b>Prizes!\' Alice had no pictures or conversations in it, and on it in her.<\\/b>."}', NULL, '2017-05-13 05:29:15', '2017-05-13 05:29:15'),
	('b4882360-0da8-475f-9dba-75bf82929d49', 'App\\Notifications\\EventMatchedPros', 28, 'App\\User', '{"excerpt":"1 new event matched your profile.","message":"<b>1<\\/b> new event matched your profile."}', NULL, '2017-05-15 16:44:16', '2017-05-15 16:44:16'),
	('c2e83bce-1b4a-4062-a6f6-947a15f5b2d3', 'App\\Notifications\\ClientPostedAReview', 28, 'App\\User', '{"excerpt":"","message":""}', NULL, '2017-05-15 01:16:22', '2017-05-15 01:16:22'),
	('d4db9ce3-d00d-4eaf-976e-7fb72cc5bf23', 'App\\Notifications\\ProPostedABid', 26, 'App\\User', '{"excerpt":" posted a new bid on your event Mock Turtle; \'but it seems to like her, dow","message":"<b><\\/b> posted a new bid on your event <b>Mock Turtle; \'but it seems to like her, down here, that I should say what.<\\/b>."}', NULL, '2017-05-13 17:32:29', '2017-05-13 17:32:29'),
	('ebff7b0d-4f30-4cc8-9993-cfb4c3b6b8eb', 'App\\Notifications\\ProSelectedForAnEvent', 3, 'App\\User', '{"excerpt":"You\'ve been hired in Tess Parker\'s event Mock Turtle; \'but it seems to like","message":"You\'ve been hired in <b>Tess Parker<\\/b>\'s event <b>Mock Turtle; \'but it seems to like her, down here, that I should say what.<\\/b>."}', NULL, '2017-05-15 09:35:12', '2017-05-15 09:35:12'),
	('fd44f0bf-c78a-4794-981c-71dbfc29f284', 'App\\Notifications\\ClientPostedAReview', 28, 'App\\User', '{"excerpt":"Tess Parker posted a review regarding the event Prizes!\' Alice had no pictu","message":"Tess Parker posted a review regarding the event <b>Prizes!\' Alice had no pictures or conversations in it, and on it in her.<\\/b>"}', '2017-05-15 01:17:32', '2017-05-15 01:16:43', '2017-05-15 01:17:32');
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
