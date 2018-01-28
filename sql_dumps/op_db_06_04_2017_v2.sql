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

-- Dumping structure for table occassions_pro_db.activations
CREATE TABLE IF NOT EXISTS `activations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table occassions_pro_db.activations: ~27 rows (approximately)
/*!40000 ALTER TABLE `activations` DISABLE KEYS */;
INSERT INTO `activations` (`id`, `user_id`, `code`, `completed`, `completed_at`, `created_at`, `updated_at`) VALUES
	(1, 1, 'iyrQwhmCzyUjaprvUHPQA2ExV15oR1hq', 1, '2017-06-04 08:47:27', '2017-06-04 08:47:27', '2017-06-04 08:47:27'),
	(2, 2, '88Rs3hIOkthkxe5DVxMHd5V8LKwpL0hU', 1, '2017-06-04 08:47:27', '2017-06-04 08:47:27', '2017-06-04 08:47:27'),
	(3, 3, 'ajAD0LY7XayamwZeVJYrfDiOOZSKgxJE', 1, '2017-06-04 08:47:28', '2017-06-04 08:47:28', '2017-06-04 08:47:28'),
	(4, 4, 'dmdfJd9LmKSJeoLjQvdoXZ5YFsOX3f62', 1, '2017-06-04 08:47:28', '2017-06-04 08:47:28', '2017-06-04 08:47:28'),
	(5, 5, '8vCN3ZspxBxBTLlTDAPvepFuveco11nU', 1, '2017-06-04 08:47:28', '2017-06-04 08:47:28', '2017-06-04 08:47:28'),
	(6, 6, '723LYtS7C4z4wwyOqwr9So7bPO44UXEr', 1, '2017-06-04 08:47:29', '2017-06-04 08:47:29', '2017-06-04 08:47:29'),
	(7, 7, 'M0Zb7XGdhYWZdxtkUtShdtBVS8Hp3ZnX', 1, '2017-06-04 08:47:29', '2017-06-04 08:47:29', '2017-06-04 08:47:29'),
	(8, 8, 'yyu098EdOvqt6u4PNs8Nuu9Rf6fURz7p', 1, NULL, '2017-06-04 08:47:33', '2017-06-04 08:47:33'),
	(9, 9, 'zFxIJGiY3jKtgrPeiFXa9FyyAAKY5Xhn', 1, NULL, '2017-06-04 08:47:34', '2017-06-04 08:47:34'),
	(10, 10, 'BOlpI02Cac1J5jZjWSjIhh4cG38Hxo38', 1, NULL, '2017-06-04 08:47:34', '2017-06-04 08:47:34'),
	(11, 11, 'USUs1uZkJtlGcQHuE4Wl9TIYXGVrqFZ2', 1, NULL, '2017-06-04 08:47:35', '2017-06-04 08:47:35'),
	(12, 12, 'hUvLmYlpvO6yomFoaC6QGZyKFqivMm7e', 1, NULL, '2017-06-04 08:47:35', '2017-06-04 08:47:35'),
	(13, 13, '9cfHzIZcLWHawbYPI3QQkZQWQTFVLMFC', 1, NULL, '2017-06-04 08:47:36', '2017-06-04 08:47:36'),
	(14, 14, 'BnVj9UKzInu3WeYNyL1X5uFjwoO3bj7J', 1, NULL, '2017-06-04 08:47:36', '2017-06-04 08:47:36'),
	(15, 15, 'fixlNlzWw0AezlMfD3AEqziZaQAkUhMm', 1, NULL, '2017-06-04 08:47:36', '2017-06-04 08:47:36'),
	(16, 16, 'voDp6klHQYPsqhLmfp0GfiPxyA1rzwPh', 1, NULL, '2017-06-04 08:47:37', '2017-06-04 08:47:37'),
	(17, 17, 'PQPSqTmBImeoIh0PhiD6JIZqsK0Yf5q4', 1, NULL, '2017-06-04 08:47:37', '2017-06-04 08:47:37'),
	(18, 18, 'rH4Cp8VmTmzBo5T45QYt399Bsbj7yX9Q', 1, NULL, '2017-06-04 08:47:37', '2017-06-04 08:47:37'),
	(19, 19, 'p8mZpUM6uZfOtMCfxY9H8RcMHBiDR0Aq', 1, NULL, '2017-06-04 08:47:38', '2017-06-04 08:47:38'),
	(20, 20, 'IhSX1lSbxG3jqDRrfASDxtJPfhpEvCKn', 1, NULL, '2017-06-04 08:47:38', '2017-06-04 08:47:38'),
	(21, 21, 'VwMNc7dbAUBGdHJBOxubHDBZhnHgL0mB', 1, NULL, '2017-06-04 08:47:38', '2017-06-04 08:47:38'),
	(22, 22, 'KKcSEWiJ1LQJ9H0TGagQVQsghAzvYTqF', 1, NULL, '2017-06-04 08:47:39', '2017-06-04 08:47:39'),
	(23, 23, 'fgG3oR2ryloqEysGq0R6uoLgk5aFJQLw', 1, NULL, '2017-06-04 08:47:39', '2017-06-04 08:47:39'),
	(24, 24, 'cAw4MqYnHaCyLQ8lKePW5ibmzfx6kKje', 1, NULL, '2017-06-04 08:47:40', '2017-06-04 08:47:40'),
	(25, 25, 'AScy5YHVqFjkMhhYl442tIe2LCNMuWmd', 1, NULL, '2017-06-04 08:47:40', '2017-06-04 08:47:40'),
	(26, 26, 'If1LtLz46Yphpp33AXbW1dQ6DQvXcTw7', 1, NULL, '2017-06-04 08:47:40', '2017-06-04 08:47:40'),
	(27, 27, 'st1ZxWoLVwPIjMkSW2tDBbepJIjYoPJZ', 1, NULL, '2017-06-04 08:47:41', '2017-06-04 08:47:41'),
	(28, 28, 'hTBMDjUNIy1oC6u3k379Xjzq4I5DJvKY', 1, '2017-06-04 10:50:15', '2017-06-04 10:50:15', '2017-06-04 10:50:15'),
	(29, 29, 'Mp7LAcjpdYpCkCOfhrbXiAjmKRHMJn9I', 1, '2017-06-04 10:51:06', '2017-06-04 10:51:06', '2017-06-04 10:51:06');
/*!40000 ALTER TABLE `activations` ENABLE KEYS */;


-- Dumping structure for table occassions_pro_db.blog_posts
CREATE TABLE IF NOT EXISTS `blog_posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `featured_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `status` enum('0','1','2') COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `blog_posts_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table occassions_pro_db.blog_posts: ~25 rows (approximately)
/*!40000 ALTER TABLE `blog_posts` DISABLE KEYS */;
INSERT INTO `blog_posts` (`id`, `uuid`, `title`, `slug`, `featured_image`, `content`, `status`, `created_by`, `deleted_at`, `created_at`, `updated_at`, `uid`) VALUES
	(1, '713ff607-1640-3c15-8401-12aa15997948', 'WHAT are you?\' said Alice, (she had kept a piece of evidence we\'ve heard.', 'a-excepturi-sed-illum-modi-quae-ea-sint', '/storage/uploads/blog-posts/2.jpg', 'Maxime sapiente neque provident maiores id. Dolor impedit id repudiandae quia quam accusantium. Omnis minima asperiores iste optio. Illum a inventore in animi.', '1', 1, NULL, '2017-06-04 08:47:41', '2017-06-04 08:47:41', 'OodD1WQ9J6BJn6ZmGAxz'),
	(2, '07c28ba0-2674-30b3-9ae4-a363e41c6307', 'Alice, flinging the baby violently up and down in a low voice, \'Your.', 'dolorum-rerum-quia-fugiat-non-quo', '/storage/uploads/blog-posts/2.jpg', 'Sit nostrum voluptas omnis dolorum et ipsum omnis. Esse libero ullam est similique. A accusamus culpa molestiae dolores. Aut temporibus ipsam aliquam labore aut non illo.', '1', 1, NULL, '2017-06-04 08:47:41', '2017-06-04 08:47:41', 'BexgvMD4Ja4RP0n6zdr3'),
	(3, 'ec96fac8-4736-3ca5-bb9a-11c934bd09e8', 'Rabbit\'s voice along--\'Catch him, you by the prisoner to--to somebody.\'.', 'recusandae-eos-a-pariatur-doloremque', '/storage/uploads/blog-posts/2.jpg', 'Et provident recusandae minima est molestias ut temporibus vitae. Aperiam reprehenderit at debitis voluptate vel sit. Maiores cupiditate eaque velit iusto mollitia explicabo.', '1', 1, NULL, '2017-06-04 08:47:41', '2017-06-04 08:47:41', 'E5Wva9Q7R37RG1rjY6Kn'),
	(4, 'c70ff94a-a473-34ac-81fd-de526f419fcf', 'No, no! You\'re a serpent; and there\'s no meaning in them, after all. I.', 'perferendis-velit-et-voluptas-accusantium-inventore-consequuntur-necessitatibus-sunt', '/storage/uploads/blog-posts/2.jpg', 'Ut quas est et ea. Dolores impedit sunt animi doloremque qui aspernatur perspiciatis sequi. Sapiente aperiam eos vero magni id. Beatae consectetur itaque nemo est voluptates sed.', '1', 1, NULL, '2017-06-04 08:47:42', '2017-06-04 08:47:42', 'Eew49rLVRNP8aP57zvd0'),
	(5, '3f05a09c-043e-3754-b0f2-8559551f71b0', 'Duchess\'s voice died away, even in the sea, some children digging in the.', 'sit-facere-nam-nihil-et-explicabo', '/storage/uploads/blog-posts/2.jpg', 'Quos consequuntur commodi provident. Aspernatur ex temporibus voluptatibus dicta cupiditate nihil. Non ut quia voluptatem aut quod eveniet similique.', '1', 1, NULL, '2017-06-04 08:47:42', '2017-06-04 08:47:42', 'G1N7dQZMR5W86pKnz5XV'),
	(6, '9edc0c35-a7fa-3d3e-8d3b-86eb1e36c304', 'She gave me a good many voices all talking at once, with a table set out.', 'dolorem-voluptatem-nihil-quo-odit-est-voluptatum', '/storage/uploads/blog-posts/2.jpg', 'Perferendis minus deserunt enim incidunt aliquam sint. Laboriosam eius voluptas cumque ad. Culpa assumenda rerum quibusdam perferendis maxime.', '1', 1, NULL, '2017-06-04 08:47:42', '2017-06-04 08:47:42', 'EqoKL2k0Jq28ZQgpnaXj'),
	(7, '1603b36f-adca-3f01-952f-55e356cef4af', 'Conqueror, whose cause was favoured by the whole party at once crowded.', 'pariatur-totam-adipisci-facilis-ut-aspernatur', '/storage/uploads/blog-posts/2.jpg', 'Similique ea atque aspernatur quasi. Voluptatum qui sunt error repellat ea cum.', '1', 1, NULL, '2017-06-04 08:47:42', '2017-06-04 08:47:42', 'OWx7qB2bRgE860NrDLm1'),
	(8, 'b928d3cd-d5b0-3874-99ea-b0982a1e6ac9', 'I am very tired of swimming about here, O Mouse!\' (Alice thought this a.', 'laborum-tempore-vero-explicabo-hic-adipisci-qui-accusamus', '/storage/uploads/blog-posts/2.jpg', 'Est tempora quia quas delectus et. Ducimus et similique eaque tempora in necessitatibus officia odit. Ipsam magnam ea facere consequatur. Tempora id optio sint et excepturi.', '1', 1, NULL, '2017-06-04 08:47:42', '2017-06-04 08:47:42', 'QEKMdynbRnX8WAZqN2w0'),
	(9, '1d61a54f-0fab-33cb-900f-35c775689012', 'VERY short remarks, and she swam lazily about in the same height as.', 'voluptate-et-debitis-qui-dolorum-voluptatem-laborum-nam', '/storage/uploads/blog-posts/2.jpg', 'Facere quia similique in velit animi dolorem dolor eos. Est consequatur sunt mollitia amet ut consectetur et. Impedit rerum ut ex laborum.', '1', 1, NULL, '2017-06-04 08:47:42', '2017-06-04 08:47:42', 'KOEAw6kb8OBJ2VW0P5GX'),
	(10, '509e150e-9eb5-31af-b5d3-195fa3eeb5b3', 'Waiting in a tone of great relief. \'Call the next moment a shower of.', 'architecto-voluptatem-cum-commodi-pariatur-eligendi-nihil-quia', '/storage/uploads/blog-posts/2.jpg', 'Iusto maiores qui vitae nihil. Nemo quia voluptatem recusandae aspernatur placeat fuga. Dolores quo dolorem aut libero ut eveniet.', '1', 1, NULL, '2017-06-04 08:47:42', '2017-06-04 08:47:42', 'Abag3qmYJm1JpxKeGkNE'),
	(11, 'cb91f556-3f49-33bf-8daf-7e5a1609f98d', 'So they got thrown out to her feet, for it now, I suppose, by being.', 'est-velit-voluptatum-aut-at-illo-error-in', '/storage/uploads/blog-posts/2.jpg', 'Facilis expedita quo magni assumenda iusto vero dolorem. Nihil nihil vel quod quibusdam. Iste harum autem quisquam deserunt quaerat fugit.', '1', 1, NULL, '2017-06-04 08:47:42', '2017-06-04 08:47:42', 'vxyKp0AEJP0JZq7mdgjD'),
	(12, '3c4e030c-5dfc-3f05-8a7b-1149a2132fda', 'Caterpillar. \'Well, I\'ve tried to look through into the air, mixed up.', 'repellat-qui-nemo-voluptatibus-sunt-voluptatem-illo', '/storage/uploads/blog-posts/2.jpg', 'Voluptas ratione dolores vero consequatur explicabo hic eos. Error autem quas atque. Est eligendi sit nulla. Rerum molestias perferendis ut. Fugit perspiciatis ratione ullam in illum reiciendis sunt.', '1', 1, NULL, '2017-06-04 08:47:43', '2017-06-04 08:47:43', 'YnVwe1W780VRyPmZGq34'),
	(13, '081f1424-3f2b-3c4b-b92c-6ba4b91270e0', 'Involved in this way! Stop this moment, and fetch me a good deal to come.', 'nihil-ea-tempora-ea-vel-et', '/storage/uploads/blog-posts/2.jpg', 'Ex ducimus tenetur magni et omnis. Provident omnis illo quidem fugit eius iusto. Nostrum provident enim odio beatae beatae sed qui. Dolor voluptatem quae pariatur exercitationem nostrum itaque.', '1', 1, NULL, '2017-06-04 08:47:43', '2017-06-04 08:47:43', 'ExmLaWqgJV38K0YAdZbp'),
	(14, 'efb634ff-246e-3888-a28b-930b3b0af335', 'It sounded an excellent opportunity for croqueting one of the jury.', 'dignissimos-ut-ut-non-fuga', '/storage/uploads/blog-posts/2.jpg', 'Nihil et similique nulla sapiente qui et. Qui dolorum ullam deleniti officiis qui in mollitia. Sint maxime aut voluptatem hic cupiditate placeat cupiditate aliquid.', '1', 1, NULL, '2017-06-04 08:47:43', '2017-06-04 08:47:43', 'rZyd45pLlWEJ7kXzVv3m'),
	(15, '15f184db-0c81-36df-a5ee-25955ea9c0bd', 'Alice, as she said to the end of half an hour or so there were ten of.', 'quisquam-praesentium-omnis-recusandae', '/storage/uploads/blog-posts/2.jpg', 'Recusandae est ratione voluptatem praesentium ut. Et ipsum perferendis molestias. Sed amet eius dolorem non ullam dolor quia.', '1', 1, NULL, '2017-06-04 08:47:43', '2017-06-04 08:47:43', '0p1QYeN989q8LoAEbPaO'),
	(16, '43705aeb-a5a4-3af7-a092-975a51fc302b', 'YOU manage?\' Alice asked. The Hatter looked at her, and said, \'So you.', 'consectetur-rerum-et-eos-doloribus-sint-quos-excepturi', '/storage/uploads/blog-posts/2.jpg', 'Aperiam ut natus hic sapiente ut modi. Voluptatem est et minima cum. Vitae et reiciendis ut qui. Enim cumque accusantium dolorem beatae sed minus.', '1', 1, NULL, '2017-06-04 08:47:43', '2017-06-04 08:47:43', 'aE5XZ9pdJKGJzOKNLeVo'),
	(17, 'e9cda619-43e4-3a22-8b1d-5b3268436343', 'Hatter, with an anxious look at me like a star-fish,\' thought Alice. \'Now.', 'quis-deleniti-esse-quidem-laudantium-tenetur', '/storage/uploads/blog-posts/2.jpg', 'Possimus asperiores cum et rerum. Quod enim qui sint iusto. Officiis consequatur omnis soluta temporibus occaecati commodi voluptatem minus. Deleniti numquam quia maxime nihil vero.', '1', 1, NULL, '2017-06-04 08:47:43', '2017-06-04 08:47:43', '2dqQzKnZRQDl0AOg6vGw'),
	(18, 'd8ba8bdf-8104-3015-90b3-95114926b2de', 'And mentioned me to sell you a song?\' \'Oh, a song, please, if the Queen.', 'molestias-id-dolorem-quibusdam-eum-molestiae', '/storage/uploads/blog-posts/2.jpg', 'Exercitationem aspernatur aliquid quia et maxime sit ab. Et reiciendis beatae et ipsum cupiditate voluptatem asperiores.', '1', 1, NULL, '2017-06-04 08:47:43', '2017-06-04 08:47:43', 'W6rjG7PKR4olMm3O49Bb'),
	(19, 'a0de82b6-a8a8-33c4-9659-03b0a2ce6d30', 'SHE, of course,\' he said do. Alice looked very anxiously into her.', 'inventore-aspernatur-cumque-officiis-repellendus-deleniti-dolorem-totam', '/storage/uploads/blog-posts/2.jpg', 'Autem aut porro sunt ipsam facere ad molestiae. Aut sit velit enim fugit quibusdam. Natus enim magni ullam quam fugit voluptas.', '1', 1, NULL, '2017-06-04 08:47:43', '2017-06-04 08:47:43', '5mj3OaVAJxdJo0M67wGd'),
	(20, '7c01feb3-5fcb-3fef-a9e9-a4324adfa3aa', 'Queen shouted at the sides of the cupboards as she spoke, but no result.', 'voluptates-eius-sit-similique', '/storage/uploads/blog-posts/2.jpg', 'Nemo sint culpa rerum ratione qui qui. Sint enim autem amet quas qui aut. Ut optio ut nihil quos velit.', '1', 1, NULL, '2017-06-04 08:47:43', '2017-06-04 08:47:43', 'Kdqy5koYlE1lnQEMO4bw'),
	(21, '95417c1c-7657-355f-885e-9a70a018a628', 'Oh, I shouldn\'t want YOURS: I don\'t care which happens!\' She ate a little.', 'qui-ab-ullam-enim-quae-deleniti', '/storage/uploads/blog-posts/2.jpg', 'Tenetur doloribus quia error beatae laboriosam rerum esse. Minus aliquam dolor ipsa et ad facere. Non libero maiores temporibus et incidunt laudantium velit ut.', '1', 1, NULL, '2017-06-04 08:47:44', '2017-06-04 08:47:44', 'j4DeXxYLlp6Jp1k5mKo6'),
	(22, '785d6b60-5594-306a-9763-89b7fb67b275', 'I\'ve finished.\' So they sat down, and nobody spoke for some way of.', 'non-perferendis-cum-in-dolore-doloribus-hic-minima', '/storage/uploads/blog-posts/2.jpg', 'Ducimus distinctio alias at quos rerum quisquam culpa. Rerum aspernatur ullam sit facere asperiores saepe. Omnis facere at odit in. Et magni sint voluptatem sint accusantium fugit quasi.', '1', 1, NULL, '2017-06-04 08:47:44', '2017-06-04 08:47:44', 'x3OMYWAb8vyJEv9G14rm'),
	(23, '97e46c01-eba4-38bd-92d3-7fb753a03926', 'Rabbit\'s voice along--\'Catch him, you by the whole thing very absurd, but.', 'voluptatem-facilis-est-et-voluptatem-magni-enim', '/storage/uploads/blog-posts/2.jpg', 'Repudiandae et modi vitae vitae. Ipsam omnis temporibus perspiciatis fugit aspernatur. Magni nisi est id vitae non voluptate consequatur similique.', '1', 1, NULL, '2017-06-04 08:47:44', '2017-06-04 08:47:44', 'GKpbM0ZoRoZljBrexN54'),
	(24, '7ee8c90e-d258-3df6-9e10-d865db216f10', 'Queen. \'Sentence first--verdict afterwards.\' \'Stuff and nonsense!\' said.', 'esse-hic-hic-praesentium-ut-consequatur-atque-sapiente', '/storage/uploads/blog-posts/2.jpg', 'Dolorum quisquam et deleniti qui quam incidunt occaecati. Eaque magnam repudiandae ut omnis possimus. Culpa qui deleniti esse beatae. Fugiat at laboriosam necessitatibus maiores ad.', '1', 1, NULL, '2017-06-04 08:47:44', '2017-06-04 08:47:44', '67rdmPNylex8xk3gY924'),
	(25, '2ad3047c-c22c-3aa1-b240-f8f57656f1f1', 'THAT\'S a good deal on where you want to see the earth takes twenty-four.', 'quam-cupiditate-nostrum-dolorem-iusto-provident', '/storage/uploads/blog-posts/2.jpg', 'Nihil qui eos illo asperiores dolore non. Illo est eum beatae. Numquam eum consequatur quas accusamus ad eveniet explicabo. Voluptates eum vitae repellendus quae doloribus labore.', '1', 1, NULL, '2017-06-04 08:47:44', '2017-06-04 08:47:44', 'W4KqZMQnlDG89YpaxX7d');
/*!40000 ALTER TABLE `blog_posts` ENABLE KEYS */;


-- Dumping structure for table occassions_pro_db.events_bids
CREATE TABLE IF NOT EXISTS `events_bids` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `details` text COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `status` enum('0','1','2','3') COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table occassions_pro_db.events_bids: ~0 rows (approximately)
/*!40000 ALTER TABLE `events_bids` DISABLE KEYS */;
INSERT INTO `events_bids` (`id`, `details`, `created_by`, `event_id`, `status`, `deleted_at`, `created_at`, `updated_at`, `uid`) VALUES
	(1, 'Eligendi quam sapiente distinctio. Libero occaecati voluptas vero in aut. Cum non est ex sit.', 2, 14, '0', NULL, '2017-06-04 08:48:13', '2017-06-04 08:48:15', 'OodD1WQ9J6BJn6ZmGAxz'),
	(2, 'Repellat corrupti ex sit perspiciatis. Distinctio quae sapiente consequatur nostrum. Laborum doloremque nobis ipsam. Corrupti ut esse rem placeat voluptas officiis reiciendis maxime.', 4, 14, '0', NULL, '2017-06-04 08:48:13', '2017-06-04 08:48:15', 'BexgvMD4Ja4RP0n6zdr3'),
	(3, 'Fugiat atque eos ab architecto non necessitatibus atque. Voluptatibus natus eius omnis laudantium modi voluptatem maiores fugiat. Quod quia molestiae reiciendis soluta dolores cupiditate quia.', 2, 13, '0', NULL, '2017-06-04 08:48:13', '2017-06-04 08:48:15', 'E5Wva9Q7R37RG1rjY6Kn'),
	(4, 'Quis quam impedit saepe ex odit modi. Similique non quo eum excepturi est recusandae. Quisquam officiis sed laboriosam incidunt molestiae.', 9, 1, '0', NULL, '2017-06-04 08:48:13', '2017-06-04 08:48:13', 'Eew49rLVRNP8aP57zvd0'),
	(5, 'Possimus voluptatem harum quo est. Ipsa corporis similique assumenda et ut animi sed. Aliquam mollitia laudantium ad sequi deserunt voluptates quo quibusdam.', 2, 4, '0', NULL, '2017-06-04 08:48:14', '2017-06-04 08:48:16', 'G1N7dQZMR5W86pKnz5XV'),
	(6, 'Minus et voluptatum quasi ea ut qui. Et quos rerum deserunt quod commodi iste. Omnis est perspiciatis ut amet aliquid asperiores aut. Cum esse dolores sit totam quasi.', 6, 8, '0', NULL, '2017-06-04 08:48:14', '2017-06-04 08:48:16', 'EqoKL2k0Jq28ZQgpnaXj'),
	(7, 'Ipsa qui velit quisquam beatae nostrum quam. Ut vel eos magni omnis architecto minus. Dolores quibusdam id facilis cumque a.', 4, 11, '0', NULL, '2017-06-04 08:48:14', '2017-06-04 08:48:16', 'OWx7qB2bRgE860NrDLm1'),
	(8, 'Reprehenderit enim illo nostrum labore maiores sit tenetur. Aut nostrum quo rerum voluptas sit. A pariatur qui facere sunt distinctio qui voluptatem. Aut eum magnam nisi autem et deserunt.', 8, 5, '0', NULL, '2017-06-04 08:48:14', '2017-06-04 08:48:16', 'QEKMdynbRnX8WAZqN2w0'),
	(9, 'Expedita debitis nihil quos. Sint et nostrum labore ducimus. A id omnis magnam. Doloremque voluptate dolorem quo dolor itaque nihil.', 6, 17, '0', NULL, '2017-06-04 08:48:14', '2017-06-04 08:48:16', 'KOEAw6kb8OBJ2VW0P5GX'),
	(10, 'Reiciendis autem vel in ea numquam perspiciatis quam. Et vel quis explicabo minus. Omnis quia ducimus enim provident earum.', 9, 7, '0', NULL, '2017-06-04 08:48:14', '2017-06-04 08:48:16', 'Abag3qmYJm1JpxKeGkNE'),
	(11, 'Molestiae iste ipsam unde quaerat debitis accusamus eos. Rerum quo sit incidunt dolor fuga error in. Earum neque aut porro in iste non veritatis. Est saepe pariatur fugiat assumenda.', 4, 17, '0', NULL, '2017-06-04 08:48:14', '2017-06-04 08:48:16', 'vxyKp0AEJP0JZq7mdgjD'),
	(12, 'Corporis maxime deserunt dolor rerum. Fugit et harum voluptatem nobis. Est molestiae aut est autem illum delectus.', 5, 15, '0', NULL, '2017-06-04 08:48:14', '2017-06-04 08:48:16', 'YnVwe1W780VRyPmZGq34'),
	(13, 'Debitis hic eveniet vero nihil dolor ab distinctio dolor. Perspiciatis sequi tenetur deleniti. Perspiciatis voluptatum voluptas quas non aliquam aut corporis. Id nobis soluta quae id aut.', 5, 6, '0', NULL, '2017-06-04 08:48:14', '2017-06-04 08:48:16', 'ExmLaWqgJV38K0YAdZbp'),
	(14, 'Aut dolore unde et. Est ullam vel est nemo magnam et non. Autem quia itaque odit delectus veniam modi reprehenderit.', 5, 11, '0', NULL, '2017-06-04 08:48:14', '2017-06-04 08:48:16', 'rZyd45pLlWEJ7kXzVv3m'),
	(15, 'Ut ipsam et ut labore ut et ratione provident. Natus officia omnis quos maiores aut quo quibusdam. Quo corrupti ut veritatis delectus.', 2, 2, '0', NULL, '2017-06-04 08:48:14', '2017-06-04 08:48:16', '0p1QYeN989q8LoAEbPaO'),
	(16, 'A beatae iusto fugiat earum magni sed. Dolorem rem sit nemo veniam. Mollitia sequi suscipit corrupti voluptatum harum accusamus nihil.', 3, 20, '0', NULL, '2017-06-04 08:48:14', '2017-06-04 08:48:16', 'aE5XZ9pdJKGJzOKNLeVo'),
	(17, 'Tenetur optio quae et quaerat qui. Eum libero ullam at et. Ad aliquid explicabo fugiat eius a.', 10, 3, '0', NULL, '2017-06-04 08:48:14', '2017-06-04 08:48:16', '2dqQzKnZRQDl0AOg6vGw'),
	(18, 'Sunt perspiciatis sit rerum adipisci. Et repellendus et in iure. Soluta ipsa et veniam mollitia ducimus rerum itaque alias. Nihil sed eveniet aut et molestias et.', 7, 3, '0', NULL, '2017-06-04 08:48:15', '2017-06-04 08:48:16', 'W6rjG7PKR4olMm3O49Bb'),
	(19, 'Perferendis exercitationem nihil saepe reiciendis. Aliquam temporibus est et nemo maiores et expedita. Dolorem quod rerum ullam atque ut earum blanditiis.', 6, 8, '0', NULL, '2017-06-04 08:48:15', '2017-06-04 08:48:16', '5mj3OaVAJxdJo0M67wGd'),
	(20, 'Hic qui tempora hic laudantium. Id corrupti iure quasi et id. Fugiat ipsam voluptate et magni nostrum. Ex ut illo accusamus.', 8, 5, '0', NULL, '2017-06-04 08:48:15', '2017-06-04 08:48:16', 'Kdqy5koYlE1lnQEMO4bw'),
	(21, 'Sit libero maxime dolorem itaque suscipit qui qui excepturi. Culpa veritatis dolore nostrum est.', 3, 6, '0', NULL, '2017-06-04 08:48:15', '2017-06-04 08:48:16', 'j4DeXxYLlp6Jp1k5mKo6'),
	(22, 'Voluptas corrupti molestias repellat omnis numquam. Eos placeat officiis vel id consequatur possimus vero. Expedita et maxime quasi enim.', 7, 19, '0', NULL, '2017-06-04 08:48:15', '2017-06-04 08:48:16', 'x3OMYWAb8vyJEv9G14rm'),
	(23, 'Voluptas harum optio laudantium consectetur. Ut illum rem magni beatae voluptatum. Dolorum nulla aspernatur tempore asperiores delectus eaque quam.', 5, 7, '0', NULL, '2017-06-04 08:48:15', '2017-06-04 08:48:16', 'GKpbM0ZoRoZljBrexN54'),
	(24, 'Totam ut eius impedit occaecati rerum laboriosam. Voluptatibus sit accusamus saepe. Corrupti consequatur consequatur dolore a quam. Exercitationem deleniti sed culpa repellat iure aperiam.', 2, 1, '0', NULL, '2017-06-04 08:48:15', '2017-06-04 08:48:15', '67rdmPNylex8xk3gY924'),
	(25, 'Laborum fugit dolor qui dolorum. Voluptatem voluptatem fuga et sed. Cupiditate id voluptas esse eum quo dolor tempora. Non ut adipisci quam eos aut eaque.', 3, 11, '0', NULL, '2017-06-04 08:48:15', '2017-06-04 08:48:17', 'W4KqZMQnlDG89YpaxX7d'),
	(26, 'SOME BID BAYBI !!!', 28, 21, '0', NULL, '2017-06-04 11:35:07', '2017-06-04 11:35:07', 'G6aKLk3WlGDRPM5wV1gN');
/*!40000 ALTER TABLE `events_bids` ENABLE KEYS */;


-- Dumping structure for table occassions_pro_db.event_posts
CREATE TABLE IF NOT EXISTS `event_posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `event_type_id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `budget` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('0','1','2') COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `confirmed_at` datetime DEFAULT NULL,
  `latitude` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `longitude` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table occassions_pro_db.event_posts: ~20 rows (approximately)
/*!40000 ALTER TABLE `event_posts` DISABLE KEYS */;
INSERT INTO `event_posts` (`id`, `title`, `slug`, `description`, `event_type_id`, `email`, `contact_number`, `date`, `location`, `budget`, `status`, `created_by`, `deleted_at`, `created_at`, `updated_at`, `confirmed_at`, `latitude`, `longitude`, `uid`) VALUES
	(1, 'Alice did not quite sure whether it was all ridges and furrows; the balls.', 'dolor-qui-voluptatibus-beatae-vel-voluptates', 'Sed dolorum sequi molestiae optio. Est laudantium architecto quis expedita odit consequatur perferendis. Et libero maxime qui nesciunt ad. Veritatis laudantium nam nesciunt ut aliquam cupiditate nam.', 1, 'linnie60@example.com', '+1-391-261-5936', '2003-08-29 06:40:30', 'South Carletonton', '2659', '1', 8, NULL, '2017-06-04 08:47:44', '2017-06-04 08:47:47', NULL, NULL, NULL, 'OodD1WQ9J6BJn6ZmGAxz'),
	(2, 'Alice took up the fan and two or three of her little sister\'s dream. The.', 'perferendis-assumenda-quos-consequuntur', 'Quam voluptatem et ut possimus molestias. Unde temporibus et vel.', 1, 'waino78@example.org', '+1 (204) 778-9127', '2012-08-27 17:19:22', 'East Justice', '7725', '1', 11, NULL, '2017-06-04 08:47:45', '2017-06-04 08:47:47', NULL, NULL, NULL, 'BexgvMD4Ja4RP0n6zdr3'),
	(3, 'His voice has a timid and tremulous sound.] \'That\'s different from what I.', 'expedita-nihil-et-reprehenderit-reiciendis-autem-error', 'Dolorum sequi quia dolore mollitia eos est sit. Tempore omnis sit omnis alias pariatur eligendi. Et non est illo cumque iste inventore.', 1, 'josefa.ward@example.com', '539.624.3113', '1998-02-03 06:53:17', 'Keeblermouth', '4974', '1', 22, NULL, '2017-06-04 08:47:45', '2017-06-04 08:47:47', NULL, NULL, NULL, 'E5Wva9Q7R37RG1rjY6Kn'),
	(4, 'Then the Queen said to the Mock Turtle with a sudden burst of tears,.', 'voluptatem-omnis-aut-esse-aut', 'Voluptatem nam ut voluptates repellat necessitatibus perspiciatis. Ut sed ut et quam voluptates. Quia in est est harum placeat. Harum et amet aut et.', 1, 'lessie.reynolds@example.net', '1-304-840-3855', '2007-06-02 20:08:16', 'McLaughlinfort', '6532', '1', 14, NULL, '2017-06-04 08:47:45', '2017-06-04 08:47:47', NULL, NULL, NULL, 'Eew49rLVRNP8aP57zvd0'),
	(5, 'I? Ah, THAT\'S the great puzzle!\' And she thought it must be removed,\'.', 'praesentium-debitis-impedit-corporis-qui', 'Culpa sunt ut rerum enim. Laboriosam facere incidunt consequatur eveniet. Aspernatur harum quas sapiente nobis omnis. Dolor est rerum dolorem aperiam.', 1, 'schowalter.meda@example.net', '401.477.8115', '1983-11-15 16:38:04', 'South Isomview', '3566', '1', 22, NULL, '2017-06-04 08:47:45', '2017-06-04 08:47:47', NULL, NULL, NULL, 'G1N7dQZMR5W86pKnz5XV'),
	(6, 'This time Alice waited patiently until it chose to speak again. In a.', 'facere-nemo-temporibus-cumque-sapiente-vel', 'Quos sit facilis atque quisquam ad tenetur natus. Optio at est esse provident et et quibusdam. Illum nam maiores suscipit quia.', 1, 'wmoen@example.com', '(396) 406-0213', '1986-10-16 11:38:36', 'Reichertmouth', '2239', '1', 18, NULL, '2017-06-04 08:47:45', '2017-06-04 08:47:47', NULL, NULL, NULL, 'EqoKL2k0Jq28ZQgpnaXj'),
	(7, 'Hatter went on, spreading out the proper way of speaking to it,\' she.', 'fugiat-soluta-accusamus-explicabo-et', 'Minima sunt nihil totam quis qui. Dolorem eos mollitia est rerum. Nulla nobis voluptatem animi id.', 1, 'koss.glenna@example.net', '+17474313024', '1991-02-24 20:36:06', 'New Floydborough', '3817', '1', 24, NULL, '2017-06-04 08:47:45', '2017-06-04 08:47:47', NULL, NULL, NULL, 'OWx7qB2bRgE860NrDLm1'),
	(8, 'Will you, won\'t you, will you, won\'t you, will you, won\'t you, won\'t you,.', 'nisi-ex-velit-ut-ab-quia-est-eum', 'Aliquam exercitationem dolore rem maxime veniam. Facilis dolore est consectetur fuga suscipit. Distinctio sed et rerum maxime repudiandae in voluptatem.', 1, 'auer.mckenna@example.net', '+1-748-243-6222', '1986-09-05 11:17:20', 'New Cleta', '9694', '1', 24, NULL, '2017-06-04 08:47:46', '2017-06-04 08:47:47', NULL, NULL, NULL, 'QEKMdynbRnX8WAZqN2w0'),
	(9, 'Hatter. \'It isn\'t a letter, written by the English, who wanted leaders,.', 'at-voluptate-soluta-repudiandae-nemo-aliquid', 'Ex iste voluptatibus et. Est voluptate temporibus nobis fuga ut qui nulla. Corporis quos temporibus quaerat dolorem quisquam. Nihil soluta sed debitis qui repudiandae maiores est.', 1, 'baylee.nader@example.com', '1-898-382-2090 x09864', '1974-10-29 14:47:08', 'Port Macton', '6718', '1', 15, NULL, '2017-06-04 08:47:46', '2017-06-04 08:47:48', NULL, NULL, NULL, 'KOEAw6kb8OBJ2VW0P5GX'),
	(10, 'They are waiting on the top of its right ear and left off writing on his.', 'omnis-adipisci-ratione-reiciendis-dolorem-quos-molestias-magni', 'Animi adipisci ut ducimus. Maiores velit optio ipsa atque omnis. Accusamus id dicta qui sit sit sed reprehenderit.', 1, 'hnader@example.org', '+1.205.510.4300', '1994-11-06 18:42:16', 'Lunafort', '2781', '1', 22, NULL, '2017-06-04 08:47:46', '2017-06-04 08:47:48', NULL, NULL, NULL, 'Abag3qmYJm1JpxKeGkNE'),
	(11, 'Alice noticed, had powdered hair that curled all over their shoulders,.', 'deserunt-praesentium-autem-voluptas-aspernatur-nam-nam', 'Consequatur possimus aperiam iusto esse. Libero incidunt error consectetur sit et. Saepe sapiente quo eos veniam natus recusandae incidunt.', 1, 'carlotta59@example.net', '1-840-967-7749 x15117', '2006-08-20 18:03:27', 'Garnetthaven', '3118', '1', 25, NULL, '2017-06-04 08:47:46', '2017-06-04 08:47:48', NULL, NULL, NULL, 'vxyKp0AEJP0JZq7mdgjD'),
	(12, 'I hadn\'t quite finished my tea when I got up this morning? I almost wish.', 'qui-incidunt-at-natus-earum-enim-officia-assumenda', 'Ut maxime impedit velit voluptatem ex. Dolorum omnis libero adipisci ut. Rerum dignissimos corrupti aut accusamus est.', 1, 'hamill.joshua@example.org', '1-791-782-1164 x8470', '2002-01-19 01:26:02', 'Othahaven', '4372', '1', 13, NULL, '2017-06-04 08:47:46', '2017-06-04 08:47:48', NULL, NULL, NULL, 'YnVwe1W780VRyPmZGq34'),
	(13, 'Rabbit whispered in a low, timid voice, \'If you can\'t be Mabel, for I.', 'qui-molestias-laboriosam-assumenda-rerum', 'Facilis nam assumenda assumenda. Doloribus ab quis et quas eos. Placeat magni dolores cum aut.', 1, 'noble72@example.net', '(401) 413-2975 x5292', '2009-08-28 17:08:28', 'Shyanneville', '1162', '1', 14, NULL, '2017-06-04 08:47:46', '2017-06-04 08:47:48', NULL, NULL, NULL, 'ExmLaWqgJV38K0YAdZbp'),
	(14, 'Alice. \'I wonder what was on the trumpet, and then said, \'It WAS a.', 'dolor-exercitationem-consequuntur-provident-laudantium-sit-maiores-excepturi', 'Et est corporis labore doloremque. Corrupti ex sint veniam ad tenetur. Dolores quia aut assumenda velit recusandae ad. Veritatis nemo perspiciatis culpa incidunt sunt.', 1, 'jacquelyn12@example.net', '1-904-332-2800', '2009-11-14 04:44:33', 'New Sashaport', '1444', '1', 17, NULL, '2017-06-04 08:47:46', '2017-06-04 08:47:48', NULL, NULL, NULL, 'rZyd45pLlWEJ7kXzVv3m'),
	(15, 'Alice ventured to say. \'What is his sorrow?\' she asked the Mock Turtle..', 'tempora-voluptatum-harum-nihil-ea', 'Ea modi rerum nam assumenda quaerat omnis dolores. Rerum adipisci quo distinctio omnis quos eos. Qui optio rerum dignissimos quasi. Dicta nihil eius inventore ut iste repudiandae fuga.', 1, 'cgrimes@example.org', '(802) 568-6694 x2542', '1986-05-23 13:58:17', 'North Jana', '8778', '1', 9, NULL, '2017-06-04 08:47:46', '2017-06-04 08:47:48', NULL, NULL, NULL, '0p1QYeN989q8LoAEbPaO'),
	(16, 'Then they all crowded round her at the end of the singers in the air,.', 'sint-et-quis-dolor-incidunt-sint-quia-et-laborum', 'Cupiditate aut qui quaerat nostrum amet repellat. Voluptatem maxime aperiam quod ducimus voluptas molestias natus rerum. Non est rerum cupiditate numquam.', 1, 'veronica70@example.com', '201-842-4121', '1987-02-08 04:19:01', 'Kylaville', '7463', '1', 22, NULL, '2017-06-04 08:47:46', '2017-06-04 08:47:48', NULL, NULL, NULL, 'aE5XZ9pdJKGJzOKNLeVo'),
	(17, 'VERY turn-up nose, much more like a frog; and both creatures hid their.', 'sapiente-sint-dolor-minus-cumque-in-beatae', 'Eveniet rerum voluptatem a a maiores. Architecto corrupti saepe hic vero atque cumque omnis distinctio. Et sint sed nihil fuga sint. Quas animi modi adipisci aperiam sit sed praesentium.', 1, 'plangosh@example.com', '1-269-455-3395', '1979-01-15 18:38:53', 'Hershelland', '8237', '1', 23, NULL, '2017-06-04 08:47:46', '2017-06-04 08:47:48', NULL, NULL, NULL, '2dqQzKnZRQDl0AOg6vGw'),
	(18, 'Alice called after her. \'I\'ve something important to say!\' This sounded.', 'ullam-inventore-est-doloribus-aut-est-recusandae', 'Recusandae vel et beatae dolorem ullam voluptatem blanditiis. Dolor quidem animi in est quo. Ut ratione qui voluptates odio sunt minus.', 1, 'khilpert@example.org', '+1-641-430-0096', '1987-04-10 20:33:02', 'Port Hailie', '1408', '1', 24, NULL, '2017-06-04 08:47:47', '2017-06-04 08:47:48', NULL, NULL, NULL, 'W6rjG7PKR4olMm3O49Bb'),
	(19, 'I\'m a deal too far off to trouble myself about you: you must manage the.', 'dolorum-nemo-ea-aut-ipsum-explicabo', 'Cumque nihil recusandae ab doloremque corporis. Nulla quis deleniti et. Quae aut quos excepturi et soluta optio.', 1, 'yhuels@example.net', '885.533.8113 x6620', '1975-03-03 19:53:07', 'Nitzschetown', '7144', '1', 9, NULL, '2017-06-04 08:47:47', '2017-06-04 08:47:48', NULL, NULL, NULL, '5mj3OaVAJxdJo0M67wGd'),
	(20, 'CHAPTER III. A Caucus-Race and a great crowd assembled about them--all.', 'quam-iure-molestiae-ut-deserunt-recusandae-cum', 'Error aut fugit voluptas ut totam cum. Dolor dolor nostrum quia ab. Excepturi unde quam est similique provident ut. Qui soluta in atque debitis repellat.', 1, 'jany.boyer@example.org', '632.908.8261', '2007-04-16 00:20:59', 'South Rockyport', '1052', '1', 17, NULL, '2017-06-04 08:47:47', '2017-06-04 08:47:48', NULL, NULL, NULL, 'Kdqy5koYlE1lnQEMO4bw'),
	(21, 'Muning Event', 'muning-event', 'Muning Event', 4, 'lyrajane+93@gmail.com', '09156377576', '2017-06-04 18:50:00', 'new York', '1000', '2', 29, NULL, '2017-06-04 10:51:40', '2017-06-04 11:33:43', '2017-06-04 11:33:43', '', '', 'j4DeXxYLlp6Jp1k5mKo6');
/*!40000 ALTER TABLE `event_posts` ENABLE KEYS */;


-- Dumping structure for table occassions_pro_db.event_posts_selected_pros
CREATE TABLE IF NOT EXISTS `event_posts_selected_pros` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `testimonial_id` int(11) DEFAULT NULL,
  `status` enum('0','1','2') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table occassions_pro_db.event_posts_selected_pros: ~0 rows (approximately)
/*!40000 ALTER TABLE `event_posts_selected_pros` DISABLE KEYS */;
/*!40000 ALTER TABLE `event_posts_selected_pros` ENABLE KEYS */;


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

-- Dumping data for table occassions_pro_db.event_types: ~0 rows (approximately)
/*!40000 ALTER TABLE `event_types` DISABLE KEYS */;
INSERT INTO `event_types` (`id`, `title`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Birthday', 'Birthday', '1', '2017-06-04 08:47:48', '2017-06-04 08:47:48', NULL),
	(2, 'Wedding', 'Wedding', '1', '2017-06-04 08:47:48', '2017-06-04 08:47:48', NULL),
	(3, 'Corporate', 'Corporate', '1', '2017-06-04 08:47:48', '2017-06-04 08:47:48', NULL),
	(4, 'Anniversary', 'Anniversary', '1', '2017-06-04 08:47:49', '2017-06-04 08:47:49', NULL),
	(5, 'Holiday', 'Holiday', '1', '2017-06-04 08:47:49', '2017-06-04 08:47:49', NULL),
	(6, 'Concert', 'Concert', '1', '2017-06-04 08:47:49', '2017-06-04 08:47:49', NULL),
	(7, 'Graduation', 'Graduation', '1', '2017-06-04 08:47:49', '2017-06-04 08:47:49', NULL),
	(8, 'Prom/School Dance', 'Prom/School Dance', '1', '2017-06-04 08:47:49', '2017-06-04 08:47:49', NULL),
	(9, 'House Party', 'House Party', '1', '2017-06-04 08:47:49', '2017-06-04 08:47:49', NULL),
	(10, 'Religious', 'Religious', '1', '2017-06-04 08:47:49', '2017-06-04 08:47:49', NULL),
	(11, 'General Events (everything else)', 'General Events (everything else)', '1', '2017-06-04 08:47:49', '2017-06-04 08:47:49', NULL);
/*!40000 ALTER TABLE `event_types` ENABLE KEYS */;


-- Dumping structure for table occassions_pro_db.funds_history
CREATE TABLE IF NOT EXISTS `funds_history` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `payment_transaction_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` double(12,2) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `status` enum('0','1','2') COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table occassions_pro_db.funds_history: ~0 rows (approximately)
/*!40000 ALTER TABLE `funds_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `funds_history` ENABLE KEYS */;


-- Dumping structure for table occassions_pro_db.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_reserved_at_index` (`queue`,`reserved_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table occassions_pro_db.jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;


-- Dumping structure for table occassions_pro_db.membership_packages
CREATE TABLE IF NOT EXISTS `membership_packages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `options` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table occassions_pro_db.membership_packages: ~0 rows (approximately)
/*!40000 ALTER TABLE `membership_packages` DISABLE KEYS */;
/*!40000 ALTER TABLE `membership_packages` ENABLE KEYS */;


-- Dumping structure for table occassions_pro_db.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table occassions_pro_db.migrations: ~35 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(71, '2014_07_02_230147_migration_cartalyst_sentinel', 1),
	(72, '2014_10_12_000000_create_users_table', 1),
	(73, '2014_10_12_100000_create_password_resets_table', 1),
	(74, '2014_10_12_300000_create_blog_posts_table', 1),
	(75, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
	(76, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
	(77, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
	(78, '2016_06_01_000004_create_oauth_clients_table', 1),
	(79, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
	(80, '2016_10_31_052428_create_event_posts_table', 1),
	(81, '2016_10_31_053829_create_events_bids_table', 1),
	(82, '2016_10_31_062539_create_testimonials_table', 1),
	(83, '2016_10_31_064532_create_professional_bid_events_table', 1),
	(84, '2016_10_31_071058_create_professional_information_table', 1),
	(85, '2016_10_31_102602_create_skills_categories_table', 1),
	(86, '2016_11_06_112410_create_professional_categories_table', 1),
	(87, '2016_11_12_200113_create_professional_selected_categories_table', 1),
	(88, '2017_02_14_075527_create_payment_transactions_table', 1),
	(89, '2017_02_14_080635_create_funds_history_table', 1),
	(90, '2017_03_19_105703_add_additional_service_provided_field_in_professionals_information_table', 1),
	(91, '2017_03_26_123044_add_confirmed_at_field_in_event_posts_table', 1),
	(92, '2017_04_09_142852_create_membership_packages_table', 1),
	(93, '2017_04_13_044354_add_nth_fields_to_funds_history_table', 1),
	(94, '2017_04_13_091015_create_user_settings_table', 1),
	(95, '2017_04_14_112710_create_event_posts_selected_pros_table', 1),
	(96, '2017_04_14_134116_create_event_types_table', 1),
	(97, '2017_04_15_075553_create_jobs_table', 1),
	(98, '2017_04_23_083041_add_coordinates_fields_in_event_posts_table', 1),
	(99, '2017_04_26_120132_add_coordinates_fields_in_user_profile_table', 1),
	(100, '2017_04_30_144602_add_feed_amount_on_payment_transactions', 1),
	(101, '2017_05_07_120925_remove_add_columns_in_membership_packages_table', 1),
	(102, '2017_05_07_125729_create_users_membership_table', 1),
	(103, '2017_05_09_181407_create_notifications_table', 1),
	(104, '2017_05_26_160917_add_uid_column_to_tables', 1),
	(105, '2017_06_02_091037_create_professionals_ad_posts', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;


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

-- Dumping data for table occassions_pro_db.notifications: ~0 rows (approximately)
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
INSERT INTO `notifications` (`id`, `type`, `notifiable_id`, `notifiable_type`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
	('67339c24-44b1-425e-ad0f-ce769bf0f4de', 'App\\Notifications\\EventConfirmedByOP', 29, 'App\\User', '{"excerpt":"Your event Muning Event has been approved by OP.","message":"Your event <b><a href=\\"http:\\/\\/occasions_pros.dev\\/clients\\/events\\/j4DeXxYLlp6Jp1k5mKo6\\">Muning Event<\\/a><\\/b> has been approved by OP."}', '2017-06-04 11:34:16', '2017-06-04 11:33:43', '2017-06-04 11:34:16'),
	('6d7f9ff3-57d6-4106-8021-ad7c7e768426', 'App\\Notifications\\ProPostedABid', 29, 'App\\User', '{"excerpt":"Kim Maravilla posted a new bid on your event Muning Event.","message":"<b><a href=\\"http:\\/\\/occasions_pros.dev\\/professionals\\/28\\">Kim Maravilla<\\/a><\\/b> posted a new bid on your event <b><a href=\\"http:\\/\\/occasions_pros.dev\\/professionals\\/events\\/j4DeXxYLlp6Jp1k5mKo6\\">Muning Event<\\/a><\\/b>.","from_user":{"id":29,"email":"lyrajane+93@gmail.com","permissions":"{\\"client\\":true}","last_login":"2017-06-04 11:34:08","first_name":"Lyra","last_name":"Bonaog","name":"Lyra Bonaog","created_at":"2017-06-04 10:51:06","updated_at":"2017-06-04 11:34:08","deleted_at":null,"uid":null,"role":"Clients","status":"Active"}}', NULL, '2017-06-04 11:35:07', '2017-06-04 11:35:07');
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;


-- Dumping structure for table occassions_pro_db.oauth_access_tokens
CREATE TABLE IF NOT EXISTS `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table occassions_pro_db.oauth_access_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `oauth_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_access_tokens` ENABLE KEYS */;


-- Dumping structure for table occassions_pro_db.oauth_auth_codes
CREATE TABLE IF NOT EXISTS `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table occassions_pro_db.oauth_auth_codes: ~0 rows (approximately)
/*!40000 ALTER TABLE `oauth_auth_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_auth_codes` ENABLE KEYS */;


-- Dumping structure for table occassions_pro_db.oauth_clients
CREATE TABLE IF NOT EXISTS `oauth_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table occassions_pro_db.oauth_clients: ~0 rows (approximately)
/*!40000 ALTER TABLE `oauth_clients` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_clients` ENABLE KEYS */;


-- Dumping structure for table occassions_pro_db.oauth_personal_access_clients
CREATE TABLE IF NOT EXISTS `oauth_personal_access_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_personal_access_clients_client_id_index` (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table occassions_pro_db.oauth_personal_access_clients: ~0 rows (approximately)
/*!40000 ALTER TABLE `oauth_personal_access_clients` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_personal_access_clients` ENABLE KEYS */;


-- Dumping structure for table occassions_pro_db.oauth_refresh_tokens
CREATE TABLE IF NOT EXISTS `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table occassions_pro_db.oauth_refresh_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `oauth_refresh_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_refresh_tokens` ENABLE KEYS */;


-- Dumping structure for table occassions_pro_db.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table occassions_pro_db.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;


-- Dumping structure for table occassions_pro_db.payment_transactions
CREATE TABLE IF NOT EXISTS `payment_transactions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `paid_for` int(11) NOT NULL,
  `paid_by` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `amount` double(12,2) NOT NULL,
  `status` enum('0','1','2') COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `feed_amount` double(12,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table occassions_pro_db.payment_transactions: ~0 rows (approximately)
/*!40000 ALTER TABLE `payment_transactions` DISABLE KEYS */;
INSERT INTO `payment_transactions` (`id`, `code`, `paid_for`, `paid_by`, `event_id`, `amount`, `status`, `deleted_at`, `created_at`, `updated_at`, `feed_amount`) VALUES
	(1, '3794093712', 19, 6, 15, 915.00, '1', NULL, '2017-06-04 08:49:04', '2017-06-04 08:49:09', 7067.00),
	(2, '4021410694', 24, 23, 3, 9848.00, '2', NULL, '2017-06-04 08:49:04', '2017-06-04 08:49:09', 7627.00),
	(3, '5616303216', 13, 9, 7, 6626.00, '0', NULL, '2017-06-04 08:49:04', '2017-06-04 08:49:09', 6041.00),
	(4, '2726569668', 16, 10, 2, 694.00, '2', NULL, '2017-06-04 08:49:04', '2017-06-04 08:49:09', 6094.00),
	(5, '1351865358', 27, 13, 4, 2705.00, '2', NULL, '2017-06-04 08:49:04', '2017-06-04 08:49:09', 6445.00),
	(6, '6489992752', 19, 15, 10, 4777.00, '2', NULL, '2017-06-04 08:49:04', '2017-06-04 08:49:10', 4183.00),
	(7, '7130320818', 5, 13, 16, 3730.00, '2', NULL, '2017-06-04 08:49:05', '2017-06-04 08:49:10', 6186.00),
	(8, '0345760328', 13, 13, 17, 5696.00, '1', NULL, '2017-06-04 08:49:05', '2017-06-04 08:49:10', 5104.00),
	(9, '1655824279', 22, 15, 18, 3473.00, '1', NULL, '2017-06-04 08:49:05', '2017-06-04 08:49:10', 4390.00),
	(10, '9719400919', 1, 4, 4, 5618.00, '1', NULL, '2017-06-04 08:49:05', '2017-06-04 08:49:10', 6726.00),
	(11, '4738063022', 12, 14, 4, 9756.00, '1', NULL, '2017-06-04 08:49:05', '2017-06-04 08:49:10', 8229.00),
	(12, '1580796079', 16, 19, 11, 5792.00, '1', NULL, '2017-06-04 08:49:05', '2017-06-04 08:49:10', 5958.00),
	(13, '6006845482', 14, 18, 1, 1745.00, '1', NULL, '2017-06-04 08:49:05', '2017-06-04 08:49:10', 6669.00),
	(14, '6866295009', 27, 3, 20, 9355.00, '0', NULL, '2017-06-04 08:49:05', '2017-06-04 08:49:10', 3486.00),
	(15, '1751072525', 2, 7, 10, 2363.00, '2', NULL, '2017-06-04 08:49:05', '2017-06-04 08:49:10', 2739.00),
	(16, '3986449647', 5, 7, 5, 9900.00, '0', NULL, '2017-06-04 08:49:05', '2017-06-04 08:49:10', 3885.00),
	(17, '3304383085', 5, 24, 7, 1060.00, '2', NULL, '2017-06-04 08:49:05', '2017-06-04 08:49:10', 2777.00),
	(18, '3320526855', 20, 11, 4, 7314.00, '1', NULL, '2017-06-04 08:49:05', '2017-06-04 08:49:10', 9818.00),
	(19, '8498956005', 26, 18, 1, 3183.00, '2', NULL, '2017-06-04 08:49:05', '2017-06-04 08:49:10', 9585.00),
	(20, '408778830X', 15, 14, 11, 8529.00, '0', NULL, '2017-06-04 08:49:05', '2017-06-04 08:49:10', 3088.00),
	(21, '7473693026', 22, 7, 1, 9992.00, '1', NULL, '2017-06-04 08:49:05', '2017-06-04 08:49:10', 5464.00),
	(22, '3271369119', 19, 23, 13, 2838.00, '0', NULL, '2017-06-04 08:49:05', '2017-06-04 08:49:11', 2530.00),
	(23, '4208517395', 7, 23, 1, 4868.00, '2', NULL, '2017-06-04 08:49:05', '2017-06-04 08:49:11', 6438.00),
	(24, '8435265544', 11, 23, 6, 925.00, '2', NULL, '2017-06-04 08:49:05', '2017-06-04 08:49:11', 836.00),
	(25, '3940826537', 11, 16, 15, 6437.00, '0', NULL, '2017-06-04 08:49:06', '2017-06-04 08:49:11', 3721.00),
	(26, '8451738311', 7, 1, 18, 2253.00, '1', NULL, '2017-06-04 08:49:06', '2017-06-04 08:49:11', 2848.00),
	(27, '8501010855', 2, 5, 4, 833.00, '2', NULL, '2017-06-04 08:49:06', '2017-06-04 08:49:11', 3477.00),
	(28, '9427366141', 1, 16, 13, 7013.00, '0', NULL, '2017-06-04 08:49:06', '2017-06-04 08:49:11', 3429.00),
	(29, '9961266544', 6, 23, 18, 8060.00, '0', NULL, '2017-06-04 08:49:06', '2017-06-04 08:49:11', 6506.00),
	(30, '3140824777', 6, 4, 8, 6649.00, '0', NULL, '2017-06-04 08:49:06', '2017-06-04 08:49:11', 4675.00),
	(31, '9146163239', 22, 10, 5, 4006.00, '1', NULL, '2017-06-04 08:49:06', '2017-06-04 08:49:11', 7905.00),
	(32, '1708429034', 13, 24, 9, 8665.00, '0', NULL, '2017-06-04 08:49:06', '2017-06-04 08:49:11', 2587.00),
	(33, '1249226422', 12, 13, 4, 4542.00, '0', NULL, '2017-06-04 08:49:06', '2017-06-04 08:49:11', 1433.00),
	(34, '6549612993', 14, 15, 3, 1173.00, '2', NULL, '2017-06-04 08:49:06', '2017-06-04 08:49:11', 6689.00),
	(35, '3968455681', 13, 15, 15, 1095.00, '1', NULL, '2017-06-04 08:49:06', '2017-06-04 08:49:11', 6293.00),
	(36, '0735263302', 25, 17, 18, 9424.00, '1', NULL, '2017-06-04 08:49:06', '2017-06-04 08:49:12', 1740.00),
	(37, '6128740138', 4, 17, 14, 7991.00, '1', NULL, '2017-06-04 08:49:06', '2017-06-04 08:49:12', 2341.00),
	(38, '6750363415', 4, 13, 9, 2414.00, '1', NULL, '2017-06-04 08:49:06', '2017-06-04 08:49:12', 7766.00),
	(39, '2418981282', 2, 27, 9, 5748.00, '0', NULL, '2017-06-04 08:49:06', '2017-06-04 08:49:12', 1850.00),
	(40, '9117351537', 19, 24, 10, 8540.00, '0', NULL, '2017-06-04 08:49:06', '2017-06-04 08:49:12', 1775.00),
	(41, '4374165428', 23, 17, 8, 8342.00, '2', NULL, '2017-06-04 08:49:06', '2017-06-04 08:49:12', 5935.00),
	(42, '9761829278', 20, 26, 14, 1777.00, '0', NULL, '2017-06-04 08:49:06', '2017-06-04 08:49:12', 6660.00),
	(43, '9626090383', 1, 19, 19, 9536.00, '0', NULL, '2017-06-04 08:49:06', '2017-06-04 08:49:12', 3398.00),
	(44, '5610736595', 14, 18, 15, 2658.00, '0', NULL, '2017-06-04 08:49:06', '2017-06-04 08:49:12', 1833.00),
	(45, '4168501434', 15, 4, 20, 6658.00, '0', NULL, '2017-06-04 08:49:06', '2017-06-04 08:49:12', 4048.00),
	(46, '4357579856', 15, 8, 14, 2179.00, '1', NULL, '2017-06-04 08:49:06', '2017-06-04 08:49:12', 3786.00),
	(47, '4473747697', 22, 9, 10, 9009.00, '1', NULL, '2017-06-04 08:49:06', '2017-06-04 08:49:12', 1052.00),
	(48, '3495566503', 11, 9, 1, 5766.00, '0', NULL, '2017-06-04 08:49:07', '2017-06-04 08:49:12', 6872.00),
	(49, '9088145873', 16, 10, 19, 6986.00, '2', NULL, '2017-06-04 08:49:07', '2017-06-04 08:49:13', 2473.00),
	(50, '3438527227', 7, 21, 17, 4372.00, '0', NULL, '2017-06-04 08:49:07', '2017-06-04 08:49:13', 6122.00),
	(51, '2476612537', 27, 11, 6, 1321.00, '0', NULL, '2017-06-04 08:49:07', '2017-06-04 08:49:13', 6368.00),
	(52, '607609883X', 25, 21, 13, 1868.00, '0', NULL, '2017-06-04 08:49:07', '2017-06-04 08:49:13', 2719.00),
	(53, '2514699932', 7, 19, 8, 521.00, '0', NULL, '2017-06-04 08:49:07', '2017-06-04 08:49:13', 978.00),
	(54, '9515282160', 22, 19, 16, 812.00, '0', NULL, '2017-06-04 08:49:07', '2017-06-04 08:49:13', 1384.00),
	(55, '7103425124', 9, 11, 12, 5228.00, '0', NULL, '2017-06-04 08:49:07', '2017-06-04 08:49:13', 3930.00),
	(56, '3211899529', 21, 2, 17, 6815.00, '2', NULL, '2017-06-04 08:49:07', '2017-06-04 08:49:13', 7702.00),
	(57, '9001291945', 26, 21, 9, 5062.00, '1', NULL, '2017-06-04 08:49:07', '2017-06-04 08:49:13', 7802.00),
	(58, '5347048204', 8, 17, 9, 8795.00, '1', NULL, '2017-06-04 08:49:07', '2017-06-04 08:49:13', 4047.00),
	(59, '5976182313', 8, 5, 1, 3091.00, '1', NULL, '2017-06-04 08:49:07', '2017-06-04 08:49:13', 1465.00),
	(60, '621832267X', 6, 8, 4, 1655.00, '2', NULL, '2017-06-04 08:49:07', '2017-06-04 08:49:13', 1182.00),
	(61, '0173272509', 25, 10, 6, 9698.00, '0', NULL, '2017-06-04 08:49:07', '2017-06-04 08:49:13', 4578.00),
	(62, '1498508316', 26, 11, 3, 7078.00, '0', NULL, '2017-06-04 08:49:07', '2017-06-04 08:49:13', 5350.00),
	(63, '5740371708', 18, 18, 9, 5783.00, '2', NULL, '2017-06-04 08:49:07', '2017-06-04 08:49:13', 3233.00),
	(64, '8740081915', 19, 3, 16, 780.00, '1', NULL, '2017-06-04 08:49:07', '2017-06-04 08:49:13', 2984.00),
	(65, '745944605X', 14, 14, 10, 2303.00, '1', NULL, '2017-06-04 08:49:07', '2017-06-04 08:49:14', 4752.00),
	(66, '3328629890', 14, 13, 11, 8246.00, '1', NULL, '2017-06-04 08:49:07', '2017-06-04 08:49:14', 8416.00),
	(67, '0902787748', 23, 18, 5, 3697.00, '1', NULL, '2017-06-04 08:49:07', '2017-06-04 08:49:14', 3803.00),
	(68, '6200791244', 24, 14, 20, 2093.00, '0', NULL, '2017-06-04 08:49:07', '2017-06-04 08:49:14', 2199.00),
	(69, '0669954837', 3, 5, 2, 1441.00, '2', NULL, '2017-06-04 08:49:07', '2017-06-04 08:49:14', 7938.00),
	(70, '897191131X', 20, 1, 6, 4240.00, '0', NULL, '2017-06-04 08:49:07', '2017-06-04 08:49:14', 2551.00),
	(71, '2732569291', 14, 15, 2, 7101.00, '2', NULL, '2017-06-04 08:49:07', '2017-06-04 08:49:14', 1108.00),
	(72, '7220193459', 11, 20, 2, 3303.00, '1', NULL, '2017-06-04 08:49:08', '2017-06-04 08:49:14', 5900.00),
	(73, '2890287483', 5, 2, 16, 9862.00, '2', NULL, '2017-06-04 08:49:08', '2017-06-04 08:49:14', 4059.00),
	(74, '0632419431', 19, 2, 2, 3842.00, '2', NULL, '2017-06-04 08:49:08', '2017-06-04 08:49:14', 5594.00),
	(75, '3391514639', 27, 13, 20, 8121.00, '2', NULL, '2017-06-04 08:49:08', '2017-06-04 08:49:14', 2276.00),
	(76, '0554525747', 15, 11, 3, 7482.00, '0', NULL, '2017-06-04 08:49:08', '2017-06-04 08:49:14', 9572.00),
	(77, '2095748328', 26, 23, 13, 9998.00, '2', NULL, '2017-06-04 08:49:08', '2017-06-04 08:49:14', 8955.00),
	(78, '670941566X', 12, 18, 16, 6013.00, '0', NULL, '2017-06-04 08:49:08', '2017-06-04 08:49:14', 3560.00),
	(79, '896826922X', 8, 11, 1, 6659.00, '2', NULL, '2017-06-04 08:49:08', '2017-06-04 08:49:14', 2805.00),
	(80, '084397933X', 10, 23, 14, 2022.00, '2', NULL, '2017-06-04 08:49:08', '2017-06-04 08:49:14', 6049.00),
	(81, '3334733378', 14, 15, 10, 6676.00, '1', NULL, '2017-06-04 08:49:08', '2017-06-04 08:49:14', 2409.00),
	(82, '4035803839', 12, 7, 9, 7927.00, '1', NULL, '2017-06-04 08:49:08', '2017-06-04 08:49:14', 3334.00),
	(83, '1482839946', 8, 21, 16, 8874.00, '0', NULL, '2017-06-04 08:49:08', '2017-06-04 08:49:14', 6020.00),
	(84, '3513119364', 19, 4, 9, 4214.00, '0', NULL, '2017-06-04 08:49:08', '2017-06-04 08:49:15', 8039.00),
	(85, '2090508779', 27, 10, 6, 9202.00, '0', NULL, '2017-06-04 08:49:08', '2017-06-04 08:49:15', 7959.00),
	(86, '9903231032', 14, 15, 8, 9323.00, '2', NULL, '2017-06-04 08:49:08', '2017-06-04 08:49:15', 4733.00),
	(87, '0709870019', 8, 17, 16, 6518.00, '2', NULL, '2017-06-04 08:49:08', '2017-06-04 08:49:15', 1797.00),
	(88, '0920503276', 27, 9, 15, 9527.00, '0', NULL, '2017-06-04 08:49:08', '2017-06-04 08:49:16', 3860.00),
	(89, '3479399711', 11, 3, 14, 960.00, '0', NULL, '2017-06-04 08:49:08', '2017-06-04 08:49:16', 5834.00),
	(90, '5099491979', 17, 25, 16, 9185.00, '0', NULL, '2017-06-04 08:49:08', '2017-06-04 08:49:16', 7867.00),
	(91, '7740049530', 21, 1, 15, 1488.00, '0', NULL, '2017-06-04 08:49:09', '2017-06-04 08:49:16', 1358.00),
	(92, '5177914321', 26, 24, 12, 3740.00, '2', NULL, '2017-06-04 08:49:09', '2017-06-04 08:49:16', 2419.00),
	(93, '2685338608', 2, 21, 11, 6538.00, '0', NULL, '2017-06-04 08:49:09', '2017-06-04 08:49:16', 3075.00),
	(94, '7225585282', 4, 17, 13, 9344.00, '1', NULL, '2017-06-04 08:49:09', '2017-06-04 08:49:16', 6984.00),
	(95, '7032240089', 21, 24, 12, 6374.00, '0', NULL, '2017-06-04 08:49:09', '2017-06-04 08:49:16', 3147.00),
	(96, '042113805X', 18, 5, 12, 4834.00, '1', NULL, '2017-06-04 08:49:09', '2017-06-04 08:49:16', 6759.00),
	(97, '8203652956', 20, 4, 7, 6853.00, '2', NULL, '2017-06-04 08:49:09', '2017-06-04 08:49:16', 8178.00),
	(98, '8671594289', 18, 19, 17, 7609.00, '1', NULL, '2017-06-04 08:49:09', '2017-06-04 08:49:17', 4505.00),
	(99, '7991152421', 20, 16, 19, 7921.00, '1', NULL, '2017-06-04 08:49:09', '2017-06-04 08:49:17', 7081.00),
	(100, '564085636X', 27, 5, 12, 2392.00, '1', NULL, '2017-06-04 08:49:09', '2017-06-04 08:49:17', 1973.00);
/*!40000 ALTER TABLE `payment_transactions` ENABLE KEYS */;


-- Dumping structure for table occassions_pro_db.persistences
CREATE TABLE IF NOT EXISTS `persistences` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `persistences_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table occassions_pro_db.persistences: ~0 rows (approximately)
/*!40000 ALTER TABLE `persistences` DISABLE KEYS */;
INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
	(7, 1, '5mX1wUlacgmXjTvsxLcW13hLJZKXFihz', '2017-06-04 11:32:15', '2017-06-04 11:32:15'),
	(9, 28, 'acWoS3gBY3laMUZgVZJls4AAKapJixem', '2017-06-04 11:34:54', '2017-06-04 11:34:54'),
	(10, 28, 'tnSE0hRafVxKuiHmho4h8xwGXaSKL1pd', '2017-06-04 13:10:37', '2017-06-04 13:10:37');
/*!40000 ALTER TABLE `persistences` ENABLE KEYS */;


-- Dumping structure for table occassions_pro_db.professionals_ad_posts
CREATE TABLE IF NOT EXISTS `professionals_ad_posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `location` int(11) DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('0','1','2') COLLATE utf8_unicode_ci NOT NULL,
  `expired_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table occassions_pro_db.professionals_ad_posts: ~0 rows (approximately)
/*!40000 ALTER TABLE `professionals_ad_posts` DISABLE KEYS */;
/*!40000 ALTER TABLE `professionals_ad_posts` ENABLE KEYS */;


-- Dumping structure for table occassions_pro_db.professional_bid_events
CREATE TABLE IF NOT EXISTS `professional_bid_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `professional_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `application_status` enum('0','1','2','3') COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table occassions_pro_db.professional_bid_events: ~0 rows (approximately)
/*!40000 ALTER TABLE `professional_bid_events` DISABLE KEYS */;
INSERT INTO `professional_bid_events` (`id`, `professional_id`, `event_id`, `application_status`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, 16, 17, '1', '1', NULL, '2017-06-04 08:48:40', '2017-06-04 08:48:43'),
	(2, 12, 9, '1', '1', NULL, '2017-06-04 08:48:41', '2017-06-04 08:48:43'),
	(3, 5, 17, '1', '1', NULL, '2017-06-04 08:48:41', '2017-06-04 08:48:43'),
	(4, 3, 4, '1', '1', NULL, '2017-06-04 08:48:41', '2017-06-04 08:48:43'),
	(5, 13, 6, '1', '1', NULL, '2017-06-04 08:48:41', '2017-06-04 08:48:43'),
	(6, 14, 16, '1', '1', NULL, '2017-06-04 08:48:41', '2017-06-04 08:48:43'),
	(7, 6, 10, '1', '1', NULL, '2017-06-04 08:48:41', '2017-06-04 08:48:43'),
	(8, 12, 12, '1', '1', NULL, '2017-06-04 08:48:41', '2017-06-04 08:48:44'),
	(9, 19, 7, '1', '1', NULL, '2017-06-04 08:48:41', '2017-06-04 08:48:44'),
	(10, 9, 15, '1', '1', NULL, '2017-06-04 08:48:41', '2017-06-04 08:48:44'),
	(11, 9, 14, '1', '1', NULL, '2017-06-04 08:48:41', '2017-06-04 08:48:44'),
	(12, 1, 1, '1', '1', NULL, '2017-06-04 08:48:41', '2017-06-04 08:48:44'),
	(13, 10, 13, '1', '1', NULL, '2017-06-04 08:48:41', '2017-06-04 08:48:44'),
	(14, 9, 6, '1', '1', NULL, '2017-06-04 08:48:41', '2017-06-04 08:48:44'),
	(15, 8, 13, '1', '1', NULL, '2017-06-04 08:48:41', '2017-06-04 08:48:44'),
	(16, 4, 20, '1', '1', NULL, '2017-06-04 08:48:41', '2017-06-04 08:48:44'),
	(17, 5, 13, '1', '1', NULL, '2017-06-04 08:48:41', '2017-06-04 08:48:44'),
	(18, 14, 18, '1', '1', NULL, '2017-06-04 08:48:41', '2017-06-04 08:48:44'),
	(19, 20, 9, '1', '1', NULL, '2017-06-04 08:48:41', '2017-06-04 08:48:44'),
	(20, 8, 9, '1', '1', NULL, '2017-06-04 08:48:41', '2017-06-04 08:48:44'),
	(21, 3, 15, '1', '1', NULL, '2017-06-04 08:48:41', '2017-06-04 08:48:44'),
	(22, 5, 14, '1', '1', NULL, '2017-06-04 08:48:41', '2017-06-04 08:48:44'),
	(23, 3, 7, '1', '1', NULL, '2017-06-04 08:48:42', '2017-06-04 08:48:44'),
	(24, 7, 13, '1', '1', NULL, '2017-06-04 08:48:42', '2017-06-04 08:48:45'),
	(25, 1, 5, '1', '1', NULL, '2017-06-04 08:48:42', '2017-06-04 08:48:45'),
	(26, 10, 15, '1', '1', NULL, '2017-06-04 08:48:42', '2017-06-04 08:48:45'),
	(27, 18, 20, '1', '1', NULL, '2017-06-04 08:48:42', '2017-06-04 08:48:45'),
	(28, 12, 2, '1', '1', NULL, '2017-06-04 08:48:42', '2017-06-04 08:48:45'),
	(29, 9, 6, '1', '1', NULL, '2017-06-04 08:48:42', '2017-06-04 08:48:45'),
	(30, 7, 7, '1', '1', NULL, '2017-06-04 08:48:42', '2017-06-04 08:48:45'),
	(31, 17, 18, '1', '1', NULL, '2017-06-04 08:48:42', '2017-06-04 08:48:45'),
	(32, 7, 9, '1', '1', NULL, '2017-06-04 08:48:42', '2017-06-04 08:48:45'),
	(33, 3, 15, '1', '1', NULL, '2017-06-04 08:48:42', '2017-06-04 08:48:45'),
	(34, 19, 4, '1', '1', NULL, '2017-06-04 08:48:42', '2017-06-04 08:48:45'),
	(35, 12, 17, '1', '1', NULL, '2017-06-04 08:48:42', '2017-06-04 08:48:45'),
	(36, 18, 19, '1', '1', NULL, '2017-06-04 08:48:42', '2017-06-04 08:48:45'),
	(37, 18, 18, '1', '1', NULL, '2017-06-04 08:48:42', '2017-06-04 08:48:45'),
	(38, 2, 13, '1', '1', NULL, '2017-06-04 08:48:42', '2017-06-04 08:48:45'),
	(39, 11, 18, '1', '1', NULL, '2017-06-04 08:48:42', '2017-06-04 08:48:45'),
	(40, 3, 6, '1', '1', NULL, '2017-06-04 08:48:42', '2017-06-04 08:48:45'),
	(41, 2, 10, '1', '1', NULL, '2017-06-04 08:48:42', '2017-06-04 08:48:46'),
	(42, 13, 18, '1', '1', NULL, '2017-06-04 08:48:42', '2017-06-04 08:48:46'),
	(43, 7, 8, '1', '1', NULL, '2017-06-04 08:48:43', '2017-06-04 08:48:46'),
	(44, 13, 11, '1', '1', NULL, '2017-06-04 08:48:43', '2017-06-04 08:48:46'),
	(45, 10, 2, '1', '1', NULL, '2017-06-04 08:48:43', '2017-06-04 08:48:46'),
	(46, 2, 14, '1', '1', NULL, '2017-06-04 08:48:43', '2017-06-04 08:48:46'),
	(47, 9, 12, '1', '1', NULL, '2017-06-04 08:48:43', '2017-06-04 08:48:46'),
	(48, 14, 18, '1', '1', NULL, '2017-06-04 08:48:43', '2017-06-04 08:48:46'),
	(49, 10, 19, '1', '1', NULL, '2017-06-04 08:48:43', '2017-06-04 08:48:46'),
	(50, 8, 14, '1', '1', NULL, '2017-06-04 08:48:43', '2017-06-04 08:48:46');
/*!40000 ALTER TABLE `professional_bid_events` ENABLE KEYS */;


-- Dumping structure for table occassions_pro_db.professional_categories
CREATE TABLE IF NOT EXISTS `professional_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table occassions_pro_db.professional_categories: ~0 rows (approximately)
/*!40000 ALTER TABLE `professional_categories` DISABLE KEYS */;
INSERT INTO `professional_categories` (`id`, `title`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, 'DJs', NULL, '2017-06-04 08:48:17', '2017-06-04 08:48:17'),
	(2, 'MCs', NULL, '2017-06-04 08:48:17', '2017-06-04 08:48:17'),
	(3, 'Musicians', NULL, '2017-06-04 08:48:17', '2017-06-04 08:48:17'),
	(4, 'Singers', NULL, '2017-06-04 08:48:17', '2017-06-04 08:48:17'),
	(5, 'Bands', NULL, '2017-06-04 08:48:17', '2017-06-04 08:48:17'),
	(6, 'Coordinators', NULL, '2017-06-04 08:48:17', '2017-06-04 08:48:17'),
	(7, 'Photo Booths', NULL, '2017-06-04 08:48:17', '2017-06-04 08:48:17'),
	(8, 'Photographers', NULL, '2017-06-04 08:48:18', '2017-06-04 08:48:18'),
	(9, 'Videographers', NULL, '2017-06-04 08:48:18', '2017-06-04 08:48:18'),
	(10, 'Florist', NULL, '2017-06-04 08:48:18', '2017-06-04 08:48:18'),
	(11, 'Officiant', NULL, '2017-06-04 08:48:18', '2017-06-04 08:48:18'),
	(12, 'Bartenders', NULL, '2017-06-04 08:48:18', '2017-06-04 08:48:18'),
	(13, 'Caterers', NULL, '2017-06-04 08:48:18', '2017-06-04 08:48:18'),
	(14, 'Taco Man', NULL, '2017-06-04 08:48:18', '2017-06-04 08:48:18'),
	(15, 'Magicians', NULL, '2017-06-04 08:48:18', '2017-06-04 08:48:18'),
	(16, 'Comedians', NULL, '2017-06-04 08:48:18', '2017-06-04 08:48:18'),
	(17, 'Limousines', NULL, '2017-06-04 08:48:18', '2017-06-04 08:48:18'),
	(18, 'Party Rental Companies', NULL, '2017-06-04 08:48:18', '2017-06-04 08:48:18');
/*!40000 ALTER TABLE `professional_categories` ENABLE KEYS */;


-- Dumping structure for table occassions_pro_db.professional_informations
CREATE TABLE IF NOT EXISTS `professional_informations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_pic` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `countries_served` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `biography` text COLLATE utf8_unicode_ci,
  `location` text COLLATE utf8_unicode_ci,
  `contact_number` text COLLATE utf8_unicode_ci,
  `business_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city_based` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `willing_distance_to_travel` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `years_of_experience` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `has_liability_insurance` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `separation_from_other_pros` text COLLATE utf8_unicode_ci,
  `reference_upon_request` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `require_deposit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `advance_booking_amount` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `languages_can_speak` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `can_provide_cultural_services` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `media` text COLLATE utf8_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `additional_services_provided` text COLLATE utf8_unicode_ci,
  `latitude` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `longitude` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table occassions_pro_db.professional_informations: ~20 rows (approximately)
/*!40000 ALTER TABLE `professional_informations` DISABLE KEYS */;
INSERT INTO `professional_informations` (`id`, `user_id`, `first_name`, `last_name`, `profile_pic`, `countries_served`, `biography`, `location`, `contact_number`, `business_name`, `city_based`, `willing_distance_to_travel`, `years_of_experience`, `has_liability_insurance`, `separation_from_other_pros`, `reference_upon_request`, `require_deposit`, `advance_booking_amount`, `languages_can_speak`, `can_provide_cultural_services`, `media`, `deleted_at`, `created_at`, `updated_at`, `additional_services_provided`, `latitude`, `longitude`) VALUES
	(1, 8, 'Bertram', 'Kris', '/storage/uploads/blog-posts/d9415ec3703c4084a5e276d7f684603a.jpeg', 'Canada', 'Ut sit ad blanditiis natus perspiciatis numquam provident molestias. Mollitia iste qui sit eos libero. Necessitatibus in quam assumenda enim. Est dolorem molestiae dicta eveniet sint id.', 'Lake Imogene', '484.901.9407 x4677', 'Waelchi-Halvorson', 'Schadenhaven', 'Up to 6 miles', '5 years', 'Yes', 'Placeat harum quasi sequi tempore necessitatibus animi vero.', 'Yes', 'Yes', '3 week before', 'English', 'N/A', '{"images":["\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg"],"videos":["https:\\/\\/www.yost.com\\/alias-minima-qui-occaecati-est-dolorem"],"music":["http:\\/\\/weissnat.com\\/quo-minima-exercitationem-provident"],"social_links":{"website":"http:\\/\\/www.turner.com\\/et-voluptatem-necessitatibus-ex-eaque-id-eligendi-est.html","facebook":"https:\\/\\/walsh.com\\/non-harum-voluptatem-est-quaerat.html","twitter":"https:\\/\\/volkman.info\\/qui-iusto-in-et-tenetur-eum.html","pinterest":"https:\\/\\/www.cartwright.net\\/pariatur-soluta-voluptatem-dolorem-qui","instagram":"http:\\/\\/www.lehner.biz\\/eum-aut-eius-dolore.html"}}', NULL, '2017-06-04 08:47:34', '2017-06-04 08:47:34', NULL, '40.7127837', '-74.00594130000002'),
	(2, 9, 'Birdie', 'Beatty', '/storage/uploads/blog-posts/d9415ec3703c4084a5e276d7f684603a.jpeg', 'Philippines', 'Enim excepturi vero sunt distinctio officia reprehenderit. Consequatur at delectus repellat ea rerum itaque.', 'West Guadalupe', '(863) 488-9498 x24166', 'Ferry, Rolfson and Gutmann', 'Karinebury', 'Up to 6 miles', '8 years', 'Yes', 'Labore sit porro ut facere.', 'Yes', 'Yes', '0 week before', 'English', 'N/A', '{"images":["\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg"],"videos":["http:\\/\\/www.huels.biz\\/ea-maxime-quos-sit-ex-voluptate-qui-dignissimos"],"music":["http:\\/\\/runolfsdottir.net\\/sit-quo-repellendus-magni-adipisci-modi-qui-maiores-vero"],"social_links":{"website":"http:\\/\\/rodriguez.com\\/numquam-et-reiciendis-itaque-fugit-animi","facebook":"https:\\/\\/mohr.net\\/quia-magni-vero-eveniet-suscipit-excepturi-cum-deserunt.html","twitter":"http:\\/\\/www.hyatt.com\\/","pinterest":"http:\\/\\/www.weissnat.com\\/ut-deserunt-aut-qui-explicabo-quo-ex-rem","instagram":"http:\\/\\/predovic.net\\/distinctio-dolores-minima-officiis-exercitationem-suscipit-unde-eius"}}', NULL, '2017-06-04 08:47:34', '2017-06-04 08:47:34', NULL, '40.7127837', '-74.00594130000002'),
	(3, 10, 'Dallas', 'Weimann', '/storage/uploads/blog-posts/d9415ec3703c4084a5e276d7f684603a.jpeg', 'Canada', 'Ut enim ab possimus eos voluptatem aut. Commodi consequatur vel quia. Aliquam culpa repudiandae rem amet doloremque voluptate nulla. Vel vel labore vitae quo. Debitis possimus doloribus rerum quas.', 'North Evashire', '304-682-0653 x54373', 'Goldner LLC', 'Klingtown', 'Up to 0 miles', '4 years', 'Yes', 'Molestias harum mollitia non amet quas.', 'Yes', 'Yes', '0 week before', 'English', 'N/A', '{"images":["\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg"],"videos":["https:\\/\\/www.huels.net\\/illo-cumque-qui-maxime-reprehenderit-eum"],"music":["http:\\/\\/brown.com\\/reiciendis-optio-dicta-sapiente-sit-eos.html"],"social_links":{"website":"http:\\/\\/vandervort.com\\/","facebook":"http:\\/\\/www.baumbach.com\\/","twitter":"http:\\/\\/www.langworth.com\\/","pinterest":"http:\\/\\/www.cormier.org\\/aut-minus-assumenda-eum.html","instagram":"http:\\/\\/www.wilkinson.net\\/nobis-id-sint-est-facere-est-perspiciatis"}}', NULL, '2017-06-04 08:47:35', '2017-06-04 08:47:35', NULL, '40.7127837', '-74.00594130000002'),
	(4, 11, 'Alison', 'O\'Kon', '/storage/uploads/blog-posts/d9415ec3703c4084a5e276d7f684603a.jpeg', 'Canada', 'Et aut ut hic dolorem dolor. Occaecati cum tenetur ut officiis incidunt non ipsum. Recusandae tempora consequatur repellendus sint iste saepe.', 'Konopelskiton', '1-385-650-6921', 'Davis Ltd', 'Doyleborough', 'Up to 2 miles', '0 years', 'Yes', 'Dolorem qui quod fugiat consequatur.', 'Yes', 'Yes', '0 week before', 'English', 'N/A', '{"images":["\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg"],"videos":["http:\\/\\/www.dare.com\\/laborum-veritatis-ullam-nisi-qui-blanditiis"],"music":["http:\\/\\/strosin.com\\/fuga-reiciendis-deserunt-libero-cum"],"social_links":{"website":"http:\\/\\/www.ward.com\\/","facebook":"http:\\/\\/davis.com\\/necessitatibus-consequatur-labore-est-aut-voluptatibus.html","twitter":"http:\\/\\/lubowitz.org\\/consequatur-consequuntur-quaerat-iure-vero","pinterest":"http:\\/\\/lesch.com\\/ut-harum-nam-voluptatum-velit-in-et","instagram":"http:\\/\\/kub.com\\/"}}', NULL, '2017-06-04 08:47:35', '2017-06-04 08:47:35', NULL, '40.7127837', '-74.00594130000002'),
	(5, 12, 'Krystina', 'McLaughlin', '/storage/uploads/blog-posts/d9415ec3703c4084a5e276d7f684603a.jpeg', 'Canada', 'Quo aliquam ut qui eos sapiente id eos laboriosam. Repellendus quia iste repudiandae at quisquam. Accusantium sequi vel quia nam.', 'Deionfurt', '(610) 676-2977', 'Kuhlman-Thompson', 'Luzland', 'Up to 3 miles', '7 years', 'Yes', 'Animi culpa fugiat in molestiae mollitia.', 'Yes', 'Yes', '0 week before', 'English', 'N/A', '{"images":["\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg"],"videos":["https:\\/\\/www.leffler.com\\/nesciunt-et-ducimus-distinctio-porro-quis-aperiam-quos-animi"],"music":["http:\\/\\/considine.com\\/culpa-provident-ea-provident-expedita-aut-libero-velit-nam.html"],"social_links":{"website":"http:\\/\\/braun.info\\/sit-a-nobis-eos-a-provident-perferendis.html","facebook":"http:\\/\\/bashirian.org\\/","twitter":"http:\\/\\/www.lesch.biz\\/qui-aliquam-ipsam-et-et-voluptates","pinterest":"http:\\/\\/breitenberg.net\\/praesentium-suscipit-at-molestias-inventore-inventore","instagram":"http:\\/\\/powlowski.org\\/"}}', NULL, '2017-06-04 08:47:35', '2017-06-04 08:47:35', NULL, '40.7127837', '-74.00594130000002'),
	(6, 13, 'Lynn', 'Mayert', '/storage/uploads/blog-posts/d9415ec3703c4084a5e276d7f684603a.jpeg', 'Philippines', 'Atque est illo deserunt sint. Eum qui voluptatem labore temporibus aut atque vel. Ut architecto voluptatem maiores voluptatem cum. Dolorum quia nihil enim quia.', 'South Marcia', '+1 (848) 765-1912', 'Abernathy-Kautzer', 'East Lelaland', 'Up to 1 miles', '6 years', 'Yes', 'Non ducimus placeat praesentium sunt provident in.', 'Yes', 'Yes', '7 week before', 'English', 'N/A', '{"images":["\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg"],"videos":["http:\\/\\/haag.net\\/quae-dolore-ut-numquam-sit"],"music":["http:\\/\\/reichert.com\\/voluptas-ipsum-illum-iste-repellat-occaecati"],"social_links":{"website":"http:\\/\\/block.net\\/","facebook":"http:\\/\\/klein.info\\/doloribus-omnis-atque-est-quod","twitter":"http:\\/\\/hammes.biz\\/","pinterest":"http:\\/\\/www.rath.com\\/eligendi-vel-perferendis-repudiandae-impedit.html","instagram":"http:\\/\\/www.marvin.com\\/eligendi-fugit-qui-eos-qui.html"}}', NULL, '2017-06-04 08:47:36', '2017-06-04 08:47:36', NULL, '40.7127837', '-74.00594130000002'),
	(7, 14, 'Juliana', 'Renner', '/storage/uploads/blog-posts/d9415ec3703c4084a5e276d7f684603a.jpeg', 'Canada', 'Aut aperiam omnis et nemo soluta. Et laudantium illum similique quam deserunt. Non nisi ea esse voluptatem eaque quaerat.', 'South Winifredport', '485-826-4240', 'Blanda Inc', 'South Harmonstad', 'Up to 6 miles', '6 years', 'Yes', 'Ut ut nulla fugit numquam qui dolores.', 'Yes', 'Yes', '2 week before', 'English', 'N/A', '{"images":["\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg"],"videos":["https:\\/\\/wyman.com\\/magnam-qui-et-necessitatibus-non-molestiae-hic.html"],"music":["https:\\/\\/miller.org\\/molestias-quam-dolorem-quisquam-nostrum-vero-vel.html"],"social_links":{"website":"http:\\/\\/www.mclaughlin.org\\/quibusdam-sint-atque-quia-rerum","facebook":"http:\\/\\/abernathy.com\\/voluptas-cum-ut-aut-vero-natus-officiis.html","twitter":"http:\\/\\/hegmann.com\\/qui-voluptas-accusantium-quisquam-ut-qui-dicta-velit","pinterest":"https:\\/\\/www.waelchi.com\\/quis-laudantium-minus-molestiae-accusamus-et-maiores","instagram":"http:\\/\\/jacobs.com\\/"}}', NULL, '2017-06-04 08:47:36', '2017-06-04 08:47:36', NULL, '40.7127837', '-74.00594130000002'),
	(8, 15, 'Taurean', 'Simonis', '/storage/uploads/blog-posts/d9415ec3703c4084a5e276d7f684603a.jpeg', 'USA', 'Modi quas ex quod. Sed voluptatem hic saepe repellendus quod molestiae et. Quia repellendus et et voluptates quia est inventore.', 'New Shawna', '1-274-993-4447 x3664', 'Feeney-Turner', 'New Hilbert', 'Up to 2 miles', '6 years', 'Yes', 'Accusamus laudantium vel doloribus minima labore eos at.', 'Yes', 'Yes', '5 week before', 'English', 'N/A', '{"images":["\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg"],"videos":["https:\\/\\/www.russel.com\\/ea-exercitationem-et-ratione-illo-ea"],"music":["http:\\/\\/volkman.com\\/et-id-modi-inventore-molestiae"],"social_links":{"website":"https:\\/\\/yost.com\\/commodi-earum-hic-facere-consequatur-sint-ab.html","facebook":"http:\\/\\/barton.com\\/","twitter":"http:\\/\\/pacocha.net\\/quas-cupiditate-sapiente-ab-aut-id","pinterest":"http:\\/\\/gottlieb.biz\\/aperiam-ex-aperiam-voluptatum-quasi-culpa-similique.html","instagram":"http:\\/\\/www.langosh.com\\/"}}', NULL, '2017-06-04 08:47:37', '2017-06-04 08:47:37', NULL, '40.7127837', '-74.00594130000002'),
	(9, 16, 'Freddy', 'Hermann', '/storage/uploads/blog-posts/d9415ec3703c4084a5e276d7f684603a.jpeg', 'Canada', 'Quae est nihil aut commodi. Nihil exercitationem architecto sint ea minus porro. Id officiis veritatis adipisci. Maiores hic quidem ut.', 'Schmidttown', '(980) 603-3979 x0448', 'Lind-Goldner', 'Port Julia', 'Up to 5 miles', '9 years', 'Yes', 'Iste sint alias et impedit qui adipisci eaque.', 'Yes', 'Yes', '6 week before', 'English', 'N/A', '{"images":["\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg"],"videos":["http:\\/\\/www.lueilwitz.com\\/dolorem-officiis-sunt-et-et-blanditiis"],"music":["http:\\/\\/ward.info\\/fuga-rem-expedita-odio-odio-aliquid-aut"],"social_links":{"website":"http:\\/\\/runolfsdottir.com\\/omnis-possimus-et-labore-velit-a-eaque-exercitationem-voluptas","facebook":"https:\\/\\/www.bergnaum.com\\/ex-suscipit-voluptatem-quisquam","twitter":"http:\\/\\/www.murphy.com\\/consequuntur-veritatis-recusandae-officiis-incidunt-deserunt-temporibus","pinterest":"http:\\/\\/www.mccullough.biz\\/sit-explicabo-enim-culpa-rerum-quos-et","instagram":"http:\\/\\/rowe.com\\/delectus-et-autem-provident-amet-incidunt.html"}}', NULL, '2017-06-04 08:47:37', '2017-06-04 08:47:37', NULL, '40.7127837', '-74.00594130000002'),
	(10, 17, 'Favian', 'Collins', '/storage/uploads/blog-posts/d9415ec3703c4084a5e276d7f684603a.jpeg', 'Canada', 'Provident aperiam omnis repellendus dolor voluptatem suscipit quisquam. Qui commodi voluptatum corrupti autem quos. Ut voluptas sed officiis eos sit aut qui.', 'Theochester', '(524) 586-2257 x42410', 'Hudson, DuBuque and Hills', 'Dellaburgh', 'Up to 7 miles', '4 years', 'Yes', 'Porro recusandae optio ut qui tenetur.', 'Yes', 'Yes', '4 week before', 'English', 'N/A', '{"images":["\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg"],"videos":["http:\\/\\/mitchell.org\\/"],"music":["http:\\/\\/www.schmitt.com\\/"],"social_links":{"website":"https:\\/\\/lowe.com\\/pariatur-quae-aut-autem-rem-nihil.html","facebook":"http:\\/\\/www.doyle.com\\/","twitter":"https:\\/\\/wunsch.biz\\/qui-et-repudiandae-minima-qui.html","pinterest":"http:\\/\\/www.durgan.com\\/et-est-voluptas-nostrum.html","instagram":"http:\\/\\/gorczany.com\\/"}}', NULL, '2017-06-04 08:47:37', '2017-06-04 08:47:37', NULL, '40.7127837', '-74.00594130000002'),
	(11, 18, 'Arden', 'Schumm', '/storage/uploads/blog-posts/d9415ec3703c4084a5e276d7f684603a.jpeg', 'Canada', 'Magnam ipsum nihil ab libero. Quia tenetur rem velit facere. Quae vel laborum qui natus error qui aut odio.', 'Tinamouth', '1-327-413-7745 x246', 'Kihn Group', 'Boscoburgh', 'Up to 0 miles', '0 years', 'Yes', 'Perferendis eum voluptas quia nihil odit.', 'Yes', 'Yes', '3 week before', 'English', 'N/A', '{"images":["\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg"],"videos":["https:\\/\\/collier.com\\/aut-sed-repellat-qui-aliquam-est-quaerat-quis.html"],"music":["https:\\/\\/rippin.biz\\/repellendus-optio-et-et-qui-atque-maiores.html"],"social_links":{"website":"http:\\/\\/tillman.net\\/","facebook":"http:\\/\\/www.goyette.com\\/numquam-sunt-dolore-ab-dolorum-porro.html","twitter":"http:\\/\\/brown.com\\/","pinterest":"http:\\/\\/www.nader.com\\/","instagram":"http:\\/\\/www.heaney.com\\/omnis-velit-voluptatum-nulla-praesentium-ullam-pariatur-placeat"}}', NULL, '2017-06-04 08:47:38', '2017-06-04 08:47:38', NULL, '40.7127837', '-74.00594130000002'),
	(12, 19, 'Mathew', 'Jacobson', '/storage/uploads/blog-posts/d9415ec3703c4084a5e276d7f684603a.jpeg', 'USA', 'Est sequi est facere totam reiciendis fugit occaecati. Tenetur dignissimos fuga blanditiis ipsum praesentium. Modi accusantium eligendi aspernatur minus dolore voluptatibus.', 'Angelmouth', '671-240-2762 x059', 'Bergnaum, Ondricka and Wyman', 'West Maxie', 'Up to 0 miles', '0 years', 'Yes', 'Doloribus vel unde sapiente rerum.', 'Yes', 'Yes', '8 week before', 'English', 'N/A', '{"images":["\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg"],"videos":["http:\\/\\/www.ratke.org\\/commodi-quasi-quibusdam-perspiciatis-optio"],"music":["http:\\/\\/www.koss.biz\\/"],"social_links":{"website":"http:\\/\\/torp.com\\/doloremque-et-vel-qui-veniam-eaque-ipsum-et.html","facebook":"http:\\/\\/www.hermiston.com\\/tenetur-in-quia-maxime-voluptatem-aut-aliquid","twitter":"https:\\/\\/www.runte.net\\/quis-voluptatibus-reiciendis-facilis-similique","pinterest":"http:\\/\\/anderson.com\\/accusantium-nisi-aut-exercitationem-sed.html","instagram":"http:\\/\\/www.davis.net\\/aut-est-voluptas-iste-alias"}}', NULL, '2017-06-04 08:47:38', '2017-06-04 08:47:38', NULL, '40.7127837', '-74.00594130000002'),
	(13, 20, 'Melisa', 'Berge', '/storage/uploads/blog-posts/d9415ec3703c4084a5e276d7f684603a.jpeg', 'USA', 'Voluptas ut animi quia adipisci aspernatur. Qui perspiciatis temporibus voluptate ex perspiciatis nemo. Adipisci nemo natus quis debitis consequatur.', 'Michaleport', '+1-809-410-5024', 'Runolfsdottir-Hayes', 'New Lilyfurt', 'Up to 4 miles', '6 years', 'Yes', 'Nesciunt magnam temporibus temporibus et suscipit nihil.', 'Yes', 'Yes', '9 week before', 'English', 'N/A', '{"images":["\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg"],"videos":["http:\\/\\/schmeler.com\\/corrupti-rerum-aliquam-ipsam-et-omnis-in.html"],"music":["http:\\/\\/www.rolfson.info\\/"],"social_links":{"website":"http:\\/\\/www.bayer.net\\/","facebook":"http:\\/\\/www.renner.org\\/saepe-porro-et-fugit-commodi-molestiae.html","twitter":"http:\\/\\/www.kuhn.com\\/porro-vel-consequatur-odio-dolores-exercitationem.html","pinterest":"http:\\/\\/www.leuschke.org\\/hic-veritatis-nulla-alias-facilis-et","instagram":"http:\\/\\/www.kertzmann.com\\/"}}', NULL, '2017-06-04 08:47:38', '2017-06-04 08:47:38', NULL, '40.7127837', '-74.00594130000002'),
	(14, 21, 'Rocky', 'Labadie', '/storage/uploads/blog-posts/d9415ec3703c4084a5e276d7f684603a.jpeg', 'Canada', 'Perspiciatis rerum doloremque quos expedita fugiat atque enim. Consequatur laudantium dolorem non soluta suscipit. Qui iste distinctio cum vel culpa qui sunt.', 'Bernhardfort', '523.580.5481 x472', 'Little Group', 'Port Carol', 'Up to 1 miles', '8 years', 'Yes', 'Nam quod doloribus ratione.', 'Yes', 'Yes', '1 week before', 'English', 'N/A', '{"images":["\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg"],"videos":["http:\\/\\/dach.com\\/suscipit-esse-ex-illo-cumque-hic.html"],"music":["http:\\/\\/skiles.org\\/"],"social_links":{"website":"https:\\/\\/www.stamm.com\\/est-sit-a-eos-consequuntur","facebook":"http:\\/\\/klocko.com\\/","twitter":"http:\\/\\/schimmel.com\\/minima-voluptatem-exercitationem-reiciendis-ut-rerum-laboriosam","pinterest":"http:\\/\\/herzog.com\\/quo-et-et-non-reprehenderit-voluptatem-iure","instagram":"http:\\/\\/kunde.com\\/maiores-occaecati-dolorum-culpa-veniam-omnis"}}', NULL, '2017-06-04 08:47:39', '2017-06-04 08:47:39', NULL, '40.7127837', '-74.00594130000002'),
	(15, 22, 'Amina', 'Carroll', '/storage/uploads/blog-posts/d9415ec3703c4084a5e276d7f684603a.jpeg', 'Philippines', 'Sit rerum aspernatur ab distinctio ut molestias. Nostrum sequi nisi rem non. Molestias ut eveniet accusantium quas dolorem repellat natus. Dolores quia incidunt sequi illo dolorem.', 'O\'Connellbury', '236.961.4005', 'Gaylord LLC', 'South Rowenaburgh', 'Up to 3 miles', '0 years', 'Yes', 'Qui nemo distinctio rerum ipsum ut atque accusamus at.', 'Yes', 'Yes', '7 week before', 'English', 'N/A', '{"images":["\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg"],"videos":["http:\\/\\/hackett.com\\/quia-soluta-quasi-aliquam-eius"],"music":["http:\\/\\/www.reilly.biz\\/"],"social_links":{"website":"http:\\/\\/sporer.info\\/dolores-mollitia-distinctio-modi-eos-dolor","facebook":"http:\\/\\/www.gusikowski.com\\/non-assumenda-dolore-et-quibusdam-aut.html","twitter":"http:\\/\\/www.schulist.com\\/","pinterest":"http:\\/\\/www.yundt.com\\/omnis-cumque-sed-praesentium-ipsa-aut.html","instagram":"http:\\/\\/waelchi.com\\/"}}', NULL, '2017-06-04 08:47:39', '2017-06-04 08:47:39', NULL, '40.7127837', '-74.00594130000002'),
	(16, 23, 'Kenna', 'Dietrich', '/storage/uploads/blog-posts/d9415ec3703c4084a5e276d7f684603a.jpeg', 'Canada', 'Eum delectus tempore iusto fuga mollitia in qui. Non blanditiis libero quos et. Totam repellat delectus odit quo molestiae et corporis.', 'Port Nicholas', '974.322.1072 x8568', 'Heaney Group', 'East Citlalli', 'Up to 3 miles', '1 years', 'Yes', 'Rerum vel et enim minus dolor.', 'Yes', 'Yes', '5 week before', 'English', 'N/A', '{"images":["\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg"],"videos":["https:\\/\\/www.runte.biz\\/doloremque-placeat-ex-temporibus-ipsam-maxime-provident-vero"],"music":["http:\\/\\/huels.com\\/cumque-nemo-voluptatibus-autem"],"social_links":{"website":"https:\\/\\/wuckert.com\\/aut-voluptas-qui-temporibus-ratione.html","facebook":"https:\\/\\/welch.com\\/expedita-deleniti-aut-accusantium-consectetur-perferendis.html","twitter":"http:\\/\\/nicolas.net\\/culpa-rerum-et-possimus-vitae","pinterest":"http:\\/\\/windler.com\\/","instagram":"https:\\/\\/www.weber.net\\/aut-atque-rerum-hic-neque-exercitationem-animi"}}', NULL, '2017-06-04 08:47:39', '2017-06-04 08:47:39', NULL, '40.7127837', '-74.00594130000002'),
	(17, 24, 'Ebony', 'Considine', '/storage/uploads/blog-posts/d9415ec3703c4084a5e276d7f684603a.jpeg', 'Canada', 'Eius et aut eum et sit itaque id. Hic consequatur architecto eveniet alias quia facere debitis. Ducimus vel rerum at aliquid laudantium. Consequuntur assumenda eos quo.', 'Schmidtchester', '1-470-248-9988', 'Senger LLC', 'Stromanmouth', 'Up to 0 miles', '3 years', 'Yes', 'Amet sit facere tempore quis aut non voluptatum.', 'Yes', 'Yes', '4 week before', 'English', 'N/A', '{"images":["\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg"],"videos":["http:\\/\\/hane.com\\/recusandae-mollitia-et-et-sapiente-mollitia-voluptas"],"music":["http:\\/\\/www.zulauf.com\\/"],"social_links":{"website":"http:\\/\\/brown.org\\/ipsa-natus-doloremque-nihil-qui-iusto-labore-quasi.html","facebook":"https:\\/\\/stiedemann.com\\/qui-velit-voluptas-dolores-non-odio-rem-aliquam.html","twitter":"http:\\/\\/moore.com\\/illo-sed-quia-non-non-amet-libero-et-laboriosam.html","pinterest":"http:\\/\\/www.kuhn.biz\\/nesciunt-aut-dolor-illo-quia.html","instagram":"http:\\/\\/www.turner.biz\\/nesciunt-et-impedit-fuga-repudiandae-occaecati.html"}}', NULL, '2017-06-04 08:47:40', '2017-06-04 08:47:40', NULL, '40.7127837', '-74.00594130000002'),
	(18, 25, 'Ephraim', 'Doyle', '/storage/uploads/blog-posts/d9415ec3703c4084a5e276d7f684603a.jpeg', 'Philippines', 'Ex voluptas corporis velit nam quo. Voluptates excepturi expedita corporis voluptatem cupiditate. Et quis rerum et dolor ut iusto. Perspiciatis eaque cumque ipsum repellendus.', 'Robertsbury', '471.783.2189', 'Purdy Group', 'Elijahstad', 'Up to 2 miles', '2 years', 'Yes', 'Quis quo optio consequatur aut veritatis aut aut.', 'Yes', 'Yes', '2 week before', 'English', 'N/A', '{"images":["\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg"],"videos":["http:\\/\\/mosciski.com\\/"],"music":["http:\\/\\/king.com\\/"],"social_links":{"website":"http:\\/\\/roberts.net\\/rem-aut-quas-eligendi-non-aperiam","facebook":"https:\\/\\/www.fay.com\\/eaque-culpa-id-et-tempora","twitter":"https:\\/\\/jakubowski.com\\/in-rerum-qui-ipsa-provident-deserunt-omnis.html","pinterest":"https:\\/\\/funk.com\\/ullam-aspernatur-voluptatem-qui-voluptate.html","instagram":"https:\\/\\/kassulke.com\\/aut-ipsam-enim-saepe.html"}}', NULL, '2017-06-04 08:47:40', '2017-06-04 08:47:40', NULL, '40.7127837', '-74.00594130000002'),
	(19, 26, 'Anderson', 'Kuphal', '/storage/uploads/blog-posts/d9415ec3703c4084a5e276d7f684603a.jpeg', 'Philippines', 'Ex placeat sed quia aliquid. Libero saepe eligendi et recusandae velit eligendi. Atque est nisi esse et laudantium quia.', 'Weberport', '+18969526834', 'Simonis-Pouros', 'Lake Dock', 'Up to 5 miles', '0 years', 'Yes', 'Veritatis omnis deleniti sit eveniet qui adipisci maiores aut.', 'Yes', 'Yes', '1 week before', 'English', 'N/A', '{"images":["\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg"],"videos":["http:\\/\\/bogan.net\\/sed-quo-quia-magni"],"music":["http:\\/\\/www.willms.net\\/omnis-ducimus-dolores-minima-iste-consequatur.html"],"social_links":{"website":"https:\\/\\/www.jast.com\\/ipsum-quo-quia-aut-rerum-rerum-veritatis-est-earum","facebook":"http:\\/\\/www.nitzsche.com\\/ducimus-ut-esse-maiores-est","twitter":"http:\\/\\/powlowski.biz\\/excepturi-laborum-non-sit-inventore-saepe","pinterest":"https:\\/\\/www.schulist.org\\/eius-dignissimos-laudantium-vitae-sapiente","instagram":"http:\\/\\/www.kassulke.info\\/"}}', NULL, '2017-06-04 08:47:41', '2017-06-04 08:47:41', NULL, '40.7127837', '-74.00594130000002'),
	(20, 27, 'Stan', 'Metz', '/storage/uploads/blog-posts/d9415ec3703c4084a5e276d7f684603a.jpeg', 'USA', 'Dolor ducimus neque voluptas vel aliquam esse porro. Optio autem aut consequuntur vel omnis expedita. Odit fugiat illum alias et nobis voluptate nisi est. Est sed ducimus iure in rerum expedita nisi.', 'Ryleyfurt', '409.431.4057', 'Grady, Ruecker and Stamm', 'Lake Breannafurt', 'Up to 0 miles', '7 years', 'Yes', 'Omnis qui consectetur sit consectetur et.', 'Yes', 'Yes', '7 week before', 'English', 'N/A', '{"images":["\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg","\\/storage\\/uploads\\/blog-posts\\/d9415ec3703c4084a5e276d7f684603a.jpeg"],"videos":["http:\\/\\/labadie.biz\\/vero-id-est-a-saepe-veniam-vel-recusandae.html"],"music":["http:\\/\\/hickle.com\\/"],"social_links":{"website":"http:\\/\\/www.wuckert.com\\/enim-quis-tempora-amet-reprehenderit-ipsum-libero","facebook":"https:\\/\\/witting.com\\/magni-in-esse-consequuntur-quaerat-dolorum-animi.html","twitter":"http:\\/\\/mann.com\\/atque-atque-consequuntur-rerum-ex-voluptates","pinterest":"http:\\/\\/metz.com\\/qui-sunt-mollitia-voluptatum-voluptatem-tempora-a-nemo-quas","instagram":"http:\\/\\/www.jacobi.com\\/"}}', NULL, '2017-06-04 08:47:41', '2017-06-04 08:47:41', NULL, '40.7127837', '-74.00594130000002'),
	(21, 28, 'Kim', 'Maravilla', NULL, 'Canada', NULL, NULL, '09156377576', NULL, NULL, 'Up to 25 miles', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{"images":[],"videos":[],"music":[],"social_links":{"website":"","facebook":"","twitter":"","pinterest":"","instagram":""}}', NULL, '2017-06-04 10:50:15', '2017-06-04 10:50:15', NULL, '40.7127837', '-74.00594130000002'),
	(22, 29, 'Lyra', 'Bonaog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-04 10:51:06', '2017-06-04 10:51:06', NULL, '40.7127837', '-74.00594130000002');
/*!40000 ALTER TABLE `professional_informations` ENABLE KEYS */;


-- Dumping structure for table occassions_pro_db.professional_selected_categories
CREATE TABLE IF NOT EXISTS `professional_selected_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `professional_information_id` int(11) NOT NULL,
  `professional_category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=202 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table occassions_pro_db.professional_selected_categories: ~0 rows (approximately)
/*!40000 ALTER TABLE `professional_selected_categories` DISABLE KEYS */;
INSERT INTO `professional_selected_categories` (`id`, `professional_information_id`, `professional_category_id`) VALUES
	(1, 4, 13),
	(2, 4, 3),
	(3, 6, 6),
	(4, 8, 15),
	(5, 1, 9),
	(6, 3, 16),
	(7, 15, 11),
	(8, 17, 12),
	(9, 10, 3),
	(10, 3, 5),
	(11, 14, 10),
	(12, 9, 8),
	(13, 18, 4),
	(14, 6, 16),
	(15, 14, 11),
	(16, 19, 8),
	(17, 14, 14),
	(18, 10, 6),
	(19, 5, 17),
	(20, 7, 7),
	(21, 9, 7),
	(22, 10, 18),
	(23, 3, 7),
	(24, 15, 12),
	(25, 15, 18),
	(26, 12, 14),
	(27, 13, 4),
	(28, 11, 4),
	(29, 7, 11),
	(30, 4, 7),
	(31, 11, 3),
	(32, 11, 14),
	(33, 3, 7),
	(34, 14, 14),
	(35, 20, 8),
	(36, 3, 16),
	(37, 8, 18),
	(38, 8, 1),
	(39, 12, 10),
	(40, 7, 10),
	(41, 6, 17),
	(42, 2, 9),
	(43, 2, 10),
	(44, 18, 10),
	(45, 10, 16),
	(46, 19, 7),
	(47, 11, 4),
	(48, 8, 13),
	(49, 6, 4),
	(50, 10, 10),
	(51, 1, 10),
	(52, 20, 14),
	(53, 2, 7),
	(54, 3, 18),
	(55, 5, 5),
	(56, 12, 2),
	(57, 12, 5),
	(58, 11, 12),
	(59, 19, 6),
	(60, 14, 5),
	(61, 3, 3),
	(62, 4, 13),
	(63, 3, 4),
	(64, 19, 2),
	(65, 11, 18),
	(66, 1, 10),
	(67, 5, 8),
	(68, 9, 7),
	(69, 20, 12),
	(70, 19, 7),
	(71, 6, 11),
	(72, 9, 4),
	(73, 13, 16),
	(74, 9, 3),
	(75, 5, 16),
	(76, 16, 7),
	(77, 11, 12),
	(78, 9, 10),
	(79, 20, 12),
	(80, 9, 4),
	(81, 9, 4),
	(82, 15, 18),
	(83, 14, 12),
	(84, 3, 18),
	(85, 18, 14),
	(86, 19, 4),
	(87, 18, 15),
	(88, 13, 11),
	(89, 12, 18),
	(90, 11, 6),
	(91, 2, 1),
	(92, 11, 5),
	(93, 7, 14),
	(94, 13, 9),
	(95, 2, 1),
	(96, 18, 6),
	(97, 8, 14),
	(98, 12, 16),
	(99, 12, 9),
	(100, 1, 7),
	(101, 7, 14),
	(102, 2, 18),
	(103, 13, 17),
	(104, 17, 16),
	(105, 11, 9),
	(106, 1, 16),
	(107, 8, 3),
	(108, 8, 3),
	(109, 5, 10),
	(110, 12, 6),
	(112, 9, 18),
	(113, 9, 15),
	(114, 12, 5),
	(115, 20, 15),
	(116, 10, 15),
	(117, 1, 18),
	(118, 4, 7),
	(119, 15, 18),
	(120, 2, 15),
	(121, 12, 11),
	(122, 16, 14),
	(123, 1, 9),
	(124, 9, 9),
	(125, 10, 17),
	(126, 14, 6),
	(127, 10, 10),
	(128, 14, 7),
	(129, 16, 1),
	(130, 19, 4),
	(131, 5, 4),
	(132, 13, 1),
	(133, 19, 6),
	(134, 5, 13),
	(135, 2, 6),
	(136, 19, 14),
	(137, 4, 9),
	(138, 2, 6),
	(139, 9, 15),
	(140, 3, 1),
	(141, 20, 4),
	(142, 1, 12),
	(143, 11, 4),
	(144, 4, 18),
	(145, 16, 10),
	(146, 16, 18),
	(147, 9, 2),
	(148, 8, 1),
	(149, 16, 11),
	(150, 12, 8),
	(151, 12, 15),
	(152, 8, 4),
	(153, 16, 15),
	(154, 10, 14),
	(155, 19, 11),
	(156, 13, 17),
	(157, 1, 14),
	(158, 12, 14),
	(159, 6, 2),
	(160, 5, 2),
	(161, 2, 3),
	(162, 12, 12),
	(163, 13, 17),
	(164, 14, 17),
	(165, 12, 13),
	(166, 9, 9),
	(167, 13, 6),
	(169, 20, 11),
	(170, 2, 11),
	(171, 14, 14),
	(172, 6, 13),
	(173, 7, 17),
	(174, 3, 14),
	(175, 6, 8),
	(176, 11, 2),
	(177, 20, 13),
	(178, 4, 14),
	(179, 5, 7),
	(180, 6, 15),
	(181, 4, 11),
	(182, 3, 6),
	(183, 3, 3),
	(184, 8, 1),
	(185, 5, 12),
	(186, 18, 4),
	(187, 4, 4),
	(188, 6, 14),
	(189, 3, 14),
	(190, 2, 17),
	(191, 7, 5),
	(192, 17, 1),
	(193, 15, 17),
	(194, 10, 4),
	(195, 11, 17),
	(196, 6, 12),
	(197, 10, 18),
	(198, 8, 16),
	(199, 3, 9),
	(200, 10, 11),
	(201, 21, 5);
/*!40000 ALTER TABLE `professional_selected_categories` ENABLE KEYS */;


-- Dumping structure for table occassions_pro_db.reminders
CREATE TABLE IF NOT EXISTS `reminders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table occassions_pro_db.reminders: ~0 rows (approximately)
/*!40000 ALTER TABLE `reminders` DISABLE KEYS */;
/*!40000 ALTER TABLE `reminders` ENABLE KEYS */;


-- Dumping structure for table occassions_pro_db.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table occassions_pro_db.roles: ~4 rows (approximately)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `slug`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
	(1, 'admins', 'Admins', '{"admin":true}', '2017-06-04 08:47:26', '2017-06-04 08:47:26'),
	(2, 'users', 'Users', '{"user":true}', '2017-06-04 08:47:26', '2017-06-04 08:47:26'),
	(3, 'clients', 'Clients', '{"client":true}', '2017-06-04 08:47:27', '2017-06-04 08:47:27'),
	(4, 'professionals', 'Professionals', '{"professional":true}', '2017-06-04 08:47:27', '2017-06-04 08:47:27');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;


-- Dumping structure for table occassions_pro_db.role_users
CREATE TABLE IF NOT EXISTS `role_users` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`,`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table occassions_pro_db.role_users: ~27 rows (approximately)
/*!40000 ALTER TABLE `role_users` DISABLE KEYS */;
INSERT INTO `role_users` (`user_id`, `role_id`, `created_at`, `updated_at`) VALUES
	(1, 1, '2017-06-04 08:47:27', '2017-06-04 08:47:27'),
	(2, 1, '2017-06-04 08:47:27', '2017-06-04 08:47:27'),
	(3, 1, '2017-06-04 08:47:28', '2017-06-04 08:47:28'),
	(4, 1, '2017-06-04 08:47:28', '2017-06-04 08:47:28'),
	(5, 1, '2017-06-04 08:47:29', '2017-06-04 08:47:29'),
	(6, 1, '2017-06-04 08:47:29', '2017-06-04 08:47:29'),
	(7, 1, '2017-06-04 08:47:29', '2017-06-04 08:47:29'),
	(8, 2, '2017-06-04 08:47:34', '2017-06-04 08:47:34'),
	(9, 2, '2017-06-04 08:47:34', '2017-06-04 08:47:34'),
	(10, 2, '2017-06-04 08:47:35', '2017-06-04 08:47:35'),
	(11, 2, '2017-06-04 08:47:35', '2017-06-04 08:47:35'),
	(12, 2, '2017-06-04 08:47:36', '2017-06-04 08:47:36'),
	(13, 2, '2017-06-04 08:47:36', '2017-06-04 08:47:36'),
	(14, 2, '2017-06-04 08:47:36', '2017-06-04 08:47:36'),
	(15, 2, '2017-06-04 08:47:37', '2017-06-04 08:47:37'),
	(16, 2, '2017-06-04 08:47:37', '2017-06-04 08:47:37'),
	(17, 2, '2017-06-04 08:47:37', '2017-06-04 08:47:37'),
	(18, 2, '2017-06-04 08:47:38', '2017-06-04 08:47:38'),
	(19, 2, '2017-06-04 08:47:38', '2017-06-04 08:47:38'),
	(20, 2, '2017-06-04 08:47:38', '2017-06-04 08:47:38'),
	(21, 2, '2017-06-04 08:47:39', '2017-06-04 08:47:39'),
	(22, 2, '2017-06-04 08:47:39', '2017-06-04 08:47:39'),
	(23, 2, '2017-06-04 08:47:40', '2017-06-04 08:47:40'),
	(24, 2, '2017-06-04 08:47:40', '2017-06-04 08:47:40'),
	(25, 2, '2017-06-04 08:47:40', '2017-06-04 08:47:40'),
	(26, 2, '2017-06-04 08:47:41', '2017-06-04 08:47:41'),
	(27, 2, '2017-06-04 08:47:41', '2017-06-04 08:47:41'),
	(28, 4, '2017-06-04 10:50:15', '2017-06-04 10:50:15'),
	(29, 3, '2017-06-04 10:51:06', '2017-06-04 10:51:06');
/*!40000 ALTER TABLE `role_users` ENABLE KEYS */;


-- Dumping structure for table occassions_pro_db.skills_categories
CREATE TABLE IF NOT EXISTS `skills_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL,
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=221 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table occassions_pro_db.skills_categories: ~0 rows (approximately)
/*!40000 ALTER TABLE `skills_categories` DISABLE KEYS */;
INSERT INTO `skills_categories` (`id`, `name`, `parent`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, 'veritatis', 0, '1', NULL, '2017-06-04 08:47:49', '2017-06-04 08:47:49'),
	(2, 'fugit', 0, '1', NULL, '2017-06-04 08:47:50', '2017-06-04 08:47:50'),
	(3, 'delectus', 0, '1', NULL, '2017-06-04 08:47:50', '2017-06-04 08:47:50'),
	(4, 'asperiores', 0, '1', NULL, '2017-06-04 08:47:50', '2017-06-04 08:47:50'),
	(5, 'quae', 0, '1', NULL, '2017-06-04 08:47:50', '2017-06-04 08:47:50'),
	(6, 'aut', 0, '1', NULL, '2017-06-04 08:47:50', '2017-06-04 08:47:50'),
	(7, 'impedit', 0, '1', NULL, '2017-06-04 08:47:50', '2017-06-04 08:47:50'),
	(8, 'nemo', 0, '1', NULL, '2017-06-04 08:47:50', '2017-06-04 08:47:50'),
	(9, 'sunt', 0, '1', NULL, '2017-06-04 08:47:50', '2017-06-04 08:47:50'),
	(10, 'harum', 0, '1', NULL, '2017-06-04 08:47:50', '2017-06-04 08:47:50'),
	(11, 'nobis', 0, '1', NULL, '2017-06-04 08:47:50', '2017-06-04 08:47:50'),
	(12, 'earum', 0, '1', NULL, '2017-06-04 08:47:50', '2017-06-04 08:47:50'),
	(13, 'iusto', 0, '1', NULL, '2017-06-04 08:47:50', '2017-06-04 08:47:50'),
	(14, 'id', 0, '1', NULL, '2017-06-04 08:47:50', '2017-06-04 08:47:50'),
	(15, 'velit', 0, '1', NULL, '2017-06-04 08:47:50', '2017-06-04 08:47:50'),
	(16, 'sint', 0, '1', NULL, '2017-06-04 08:47:50', '2017-06-04 08:47:50'),
	(17, 'blanditiis', 0, '1', NULL, '2017-06-04 08:47:50', '2017-06-04 08:47:50'),
	(18, 'at', 0, '1', NULL, '2017-06-04 08:47:50', '2017-06-04 08:47:50'),
	(19, 'tempore', 0, '1', NULL, '2017-06-04 08:47:50', '2017-06-04 08:47:50'),
	(20, 'maxime', 0, '1', NULL, '2017-06-04 08:47:50', '2017-06-04 08:47:50'),
	(21, 'dolores', 0, '1', NULL, '2017-06-04 08:47:50', '2017-06-04 08:47:50'),
	(22, 'optio', 0, '1', NULL, '2017-06-04 08:47:51', '2017-06-04 08:47:51'),
	(23, 'alias', 0, '1', NULL, '2017-06-04 08:47:51', '2017-06-04 08:47:51'),
	(24, 'doloremque', 0, '1', NULL, '2017-06-04 08:47:51', '2017-06-04 08:47:51'),
	(25, 'consequuntur', 0, '1', NULL, '2017-06-04 08:47:51', '2017-06-04 08:47:51'),
	(26, 'a', 1, '1', NULL, '2017-06-04 08:47:51', '2017-06-04 08:47:51'),
	(27, 'consequatur', 1, '1', NULL, '2017-06-04 08:47:51', '2017-06-04 08:47:51'),
	(28, 'temporibus', 1, '1', NULL, '2017-06-04 08:47:51', '2017-06-04 08:47:51'),
	(29, 'et', 1, '1', NULL, '2017-06-04 08:47:51', '2017-06-04 08:47:51'),
	(30, 'architecto', 1, '1', NULL, '2017-06-04 08:47:51', '2017-06-04 08:47:51'),
	(31, 'aut', 2, '1', NULL, '2017-06-04 08:47:51', '2017-06-04 08:47:52'),
	(32, 'reiciendis', 2, '1', NULL, '2017-06-04 08:47:51', '2017-06-04 08:47:52'),
	(33, 'beatae', 2, '1', NULL, '2017-06-04 08:47:51', '2017-06-04 08:47:52'),
	(34, 'voluptatum', 2, '1', NULL, '2017-06-04 08:47:51', '2017-06-04 08:47:52'),
	(35, 'ab', 2, '1', NULL, '2017-06-04 08:47:51', '2017-06-04 08:47:52'),
	(36, 'neque', 2, '1', NULL, '2017-06-04 08:47:51', '2017-06-04 08:47:52'),
	(37, 'rerum', 2, '1', NULL, '2017-06-04 08:47:51', '2017-06-04 08:47:52'),
	(38, 'omnis', 2, '1', NULL, '2017-06-04 08:47:52', '2017-06-04 08:47:52'),
	(39, 'omnis', 2, '1', NULL, '2017-06-04 08:47:52', '2017-06-04 08:47:52'),
	(40, 'accusantium', 2, '1', NULL, '2017-06-04 08:47:52', '2017-06-04 08:47:52'),
	(41, 'aliquid', 3, '1', NULL, '2017-06-04 08:47:52', '2017-06-04 08:47:53'),
	(42, 'aliquid', 3, '1', NULL, '2017-06-04 08:47:52', '2017-06-04 08:47:53'),
	(43, 'odit', 3, '1', NULL, '2017-06-04 08:47:52', '2017-06-04 08:47:53'),
	(44, 'quo', 3, '1', NULL, '2017-06-04 08:47:52', '2017-06-04 08:47:53'),
	(45, 'hic', 3, '1', NULL, '2017-06-04 08:47:52', '2017-06-04 08:47:53'),
	(46, 'ex', 3, '1', NULL, '2017-06-04 08:47:52', '2017-06-04 08:47:53'),
	(47, 'aut', 3, '1', NULL, '2017-06-04 08:47:53', '2017-06-04 08:47:53'),
	(48, 'dolores', 3, '1', NULL, '2017-06-04 08:47:53', '2017-06-04 08:47:53'),
	(49, 'quia', 3, '1', NULL, '2017-06-04 08:47:53', '2017-06-04 08:47:53'),
	(50, 'dolorem', 4, '1', NULL, '2017-06-04 08:47:53', '2017-06-04 08:47:53'),
	(51, 'et', 4, '1', NULL, '2017-06-04 08:47:53', '2017-06-04 08:47:53'),
	(52, 'ipsam', 4, '1', NULL, '2017-06-04 08:47:53', '2017-06-04 08:47:53'),
	(53, 'est', 4, '1', NULL, '2017-06-04 08:47:53', '2017-06-04 08:47:54'),
	(54, 'velit', 4, '1', NULL, '2017-06-04 08:47:53', '2017-06-04 08:47:54'),
	(55, 'natus', 4, '1', NULL, '2017-06-04 08:47:53', '2017-06-04 08:47:54'),
	(56, 'voluptas', 4, '1', NULL, '2017-06-04 08:47:53', '2017-06-04 08:47:54'),
	(57, 'fuga', 5, '1', NULL, '2017-06-04 08:47:54', '2017-06-04 08:47:54'),
	(58, 'saepe', 5, '1', NULL, '2017-06-04 08:47:54', '2017-06-04 08:47:54'),
	(59, 'dolores', 5, '1', NULL, '2017-06-04 08:47:54', '2017-06-04 08:47:54'),
	(60, 'sunt', 5, '1', NULL, '2017-06-04 08:47:54', '2017-06-04 08:47:54'),
	(61, 'voluptatem', 5, '1', NULL, '2017-06-04 08:47:54', '2017-06-04 08:47:55'),
	(62, 'architecto', 5, '1', NULL, '2017-06-04 08:47:54', '2017-06-04 08:47:55'),
	(63, 'molestiae', 5, '1', NULL, '2017-06-04 08:47:54', '2017-06-04 08:47:55'),
	(64, 'omnis', 5, '1', NULL, '2017-06-04 08:47:54', '2017-06-04 08:47:55'),
	(65, 'nihil', 6, '1', NULL, '2017-06-04 08:47:55', '2017-06-04 08:47:55'),
	(66, 'tempore', 6, '1', NULL, '2017-06-04 08:47:55', '2017-06-04 08:47:55'),
	(67, 'mollitia', 6, '1', NULL, '2017-06-04 08:47:55', '2017-06-04 08:47:55'),
	(68, 'ut', 6, '1', NULL, '2017-06-04 08:47:55', '2017-06-04 08:47:55'),
	(69, 'molestias', 6, '1', NULL, '2017-06-04 08:47:55', '2017-06-04 08:47:56'),
	(70, 'sed', 6, '1', NULL, '2017-06-04 08:47:55', '2017-06-04 08:47:56'),
	(71, 'quae', 6, '1', NULL, '2017-06-04 08:47:55', '2017-06-04 08:47:56'),
	(72, 'voluptas', 7, '1', NULL, '2017-06-04 08:47:56', '2017-06-04 08:47:56'),
	(73, 'quisquam', 7, '1', NULL, '2017-06-04 08:47:56', '2017-06-04 08:47:56'),
	(74, 'quisquam', 7, '1', NULL, '2017-06-04 08:47:56', '2017-06-04 08:47:56'),
	(75, 'libero', 7, '1', NULL, '2017-06-04 08:47:56', '2017-06-04 08:47:57'),
	(76, 'maiores', 7, '1', NULL, '2017-06-04 08:47:56', '2017-06-04 08:47:57'),
	(77, 'rerum', 7, '1', NULL, '2017-06-04 08:47:56', '2017-06-04 08:47:57'),
	(78, 'eligendi', 7, '1', NULL, '2017-06-04 08:47:56', '2017-06-04 08:47:57'),
	(79, 'praesentium', 7, '1', NULL, '2017-06-04 08:47:56', '2017-06-04 08:47:57'),
	(80, 'in', 7, '1', NULL, '2017-06-04 08:47:56', '2017-06-04 08:47:57'),
	(81, 'corrupti', 7, '1', NULL, '2017-06-04 08:47:56', '2017-06-04 08:47:57'),
	(82, 'ut', 8, '1', NULL, '2017-06-04 08:47:57', '2017-06-04 08:47:58'),
	(83, 'labore', 8, '1', NULL, '2017-06-04 08:47:57', '2017-06-04 08:47:58'),
	(84, 'maxime', 8, '1', NULL, '2017-06-04 08:47:57', '2017-06-04 08:47:58'),
	(85, 'consequatur', 8, '1', NULL, '2017-06-04 08:47:57', '2017-06-04 08:47:58'),
	(86, 'quis', 8, '1', NULL, '2017-06-04 08:47:57', '2017-06-04 08:47:58'),
	(87, 'aut', 8, '1', NULL, '2017-06-04 08:47:57', '2017-06-04 08:47:58'),
	(88, 'voluptatibus', 8, '1', NULL, '2017-06-04 08:47:58', '2017-06-04 08:47:58'),
	(89, 'et', 8, '1', NULL, '2017-06-04 08:47:58', '2017-06-04 08:47:58'),
	(90, 'ut', 8, '1', NULL, '2017-06-04 08:47:58', '2017-06-04 08:47:58'),
	(91, 'beatae', 9, '1', NULL, '2017-06-04 08:47:58', '2017-06-04 08:47:59'),
	(92, 'similique', 9, '1', NULL, '2017-06-04 08:47:58', '2017-06-04 08:47:59'),
	(93, 'autem', 9, '1', NULL, '2017-06-04 08:47:58', '2017-06-04 08:47:59'),
	(94, 'illo', 9, '1', NULL, '2017-06-04 08:47:58', '2017-06-04 08:47:59'),
	(95, 'maiores', 9, '1', NULL, '2017-06-04 08:47:59', '2017-06-04 08:47:59'),
	(96, 'quos', 9, '1', NULL, '2017-06-04 08:47:59', '2017-06-04 08:47:59'),
	(97, 'voluptatem', 9, '1', NULL, '2017-06-04 08:47:59', '2017-06-04 08:47:59'),
	(98, 'temporibus', 10, '1', NULL, '2017-06-04 08:47:59', '2017-06-04 08:47:59'),
	(99, 'quisquam', 10, '1', NULL, '2017-06-04 08:47:59', '2017-06-04 08:48:00'),
	(100, 'necessitatibus', 10, '1', NULL, '2017-06-04 08:47:59', '2017-06-04 08:48:00'),
	(101, 'necessitatibus', 10, '1', NULL, '2017-06-04 08:47:59', '2017-06-04 08:48:00'),
	(102, 'et', 10, '1', NULL, '2017-06-04 08:47:59', '2017-06-04 08:48:00'),
	(103, 'quia', 10, '1', NULL, '2017-06-04 08:47:59', '2017-06-04 08:48:00'),
	(104, 'consequuntur', 10, '1', NULL, '2017-06-04 08:47:59', '2017-06-04 08:48:00'),
	(105, 'est', 10, '1', NULL, '2017-06-04 08:47:59', '2017-06-04 08:48:00'),
	(106, 'ipsam', 11, '1', NULL, '2017-06-04 08:48:00', '2017-06-04 08:48:00'),
	(107, 'labore', 11, '1', NULL, '2017-06-04 08:48:00', '2017-06-04 08:48:01'),
	(108, 'autem', 11, '1', NULL, '2017-06-04 08:48:00', '2017-06-04 08:48:01'),
	(109, 'modi', 11, '1', NULL, '2017-06-04 08:48:00', '2017-06-04 08:48:01'),
	(110, 'neque', 11, '1', NULL, '2017-06-04 08:48:00', '2017-06-04 08:48:01'),
	(111, 'eum', 11, '1', NULL, '2017-06-04 08:48:00', '2017-06-04 08:48:01'),
	(112, 'nihil', 11, '1', NULL, '2017-06-04 08:48:00', '2017-06-04 08:48:01'),
	(113, 'recusandae', 11, '1', NULL, '2017-06-04 08:48:00', '2017-06-04 08:48:01'),
	(114, 'accusamus', 12, '1', NULL, '2017-06-04 08:48:01', '2017-06-04 08:48:02'),
	(115, 'in', 12, '1', NULL, '2017-06-04 08:48:01', '2017-06-04 08:48:02'),
	(116, 'voluptas', 12, '1', NULL, '2017-06-04 08:48:01', '2017-06-04 08:48:02'),
	(117, 'expedita', 12, '1', NULL, '2017-06-04 08:48:01', '2017-06-04 08:48:02'),
	(118, 'unde', 12, '1', NULL, '2017-06-04 08:48:01', '2017-06-04 08:48:02'),
	(119, 'enim', 12, '1', NULL, '2017-06-04 08:48:01', '2017-06-04 08:48:02'),
	(120, 'molestiae', 12, '1', NULL, '2017-06-04 08:48:01', '2017-06-04 08:48:02'),
	(121, 'et', 12, '1', NULL, '2017-06-04 08:48:02', '2017-06-04 08:48:02'),
	(122, 'ut', 12, '1', NULL, '2017-06-04 08:48:02', '2017-06-04 08:48:02'),
	(123, 'similique', 12, '1', NULL, '2017-06-04 08:48:02', '2017-06-04 08:48:02'),
	(124, 'amet', 13, '1', NULL, '2017-06-04 08:48:02', '2017-06-04 08:48:02'),
	(125, 'consequatur', 13, '1', NULL, '2017-06-04 08:48:02', '2017-06-04 08:48:02'),
	(126, 'est', 13, '1', NULL, '2017-06-04 08:48:02', '2017-06-04 08:48:03'),
	(127, 'aspernatur', 13, '1', NULL, '2017-06-04 08:48:02', '2017-06-04 08:48:03'),
	(128, 'nihil', 13, '1', NULL, '2017-06-04 08:48:02', '2017-06-04 08:48:03'),
	(129, 'cumque', 14, '1', NULL, '2017-06-04 08:48:03', '2017-06-04 08:48:03'),
	(130, 'ut', 14, '1', NULL, '2017-06-04 08:48:03', '2017-06-04 08:48:04'),
	(131, 'eum', 14, '1', NULL, '2017-06-04 08:48:03', '2017-06-04 08:48:04'),
	(132, 'minus', 14, '1', NULL, '2017-06-04 08:48:03', '2017-06-04 08:48:04'),
	(133, 'et', 14, '1', NULL, '2017-06-04 08:48:03', '2017-06-04 08:48:04'),
	(134, 'porro', 14, '1', NULL, '2017-06-04 08:48:03', '2017-06-04 08:48:04'),
	(135, 'neque', 14, '1', NULL, '2017-06-04 08:48:03', '2017-06-04 08:48:04'),
	(136, 'temporibus', 14, '1', NULL, '2017-06-04 08:48:03', '2017-06-04 08:48:04'),
	(137, 'consequuntur', 14, '1', NULL, '2017-06-04 08:48:03', '2017-06-04 08:48:04'),
	(138, 'ullam', 14, '1', NULL, '2017-06-04 08:48:03', '2017-06-04 08:48:04'),
	(139, 'tempore', 15, '1', NULL, '2017-06-04 08:48:04', '2017-06-04 08:48:04'),
	(140, 'qui', 15, '1', NULL, '2017-06-04 08:48:04', '2017-06-04 08:48:04'),
	(141, 'tempore', 15, '1', NULL, '2017-06-04 08:48:04', '2017-06-04 08:48:05'),
	(142, 'vitae', 15, '1', NULL, '2017-06-04 08:48:04', '2017-06-04 08:48:05'),
	(143, 'dignissimos', 15, '1', NULL, '2017-06-04 08:48:04', '2017-06-04 08:48:05'),
	(144, 'molestiae', 15, '1', NULL, '2017-06-04 08:48:04', '2017-06-04 08:48:05'),
	(145, 'in', 15, '1', NULL, '2017-06-04 08:48:04', '2017-06-04 08:48:05'),
	(146, 'voluptate', 15, '1', NULL, '2017-06-04 08:48:04', '2017-06-04 08:48:05'),
	(147, 'et', 16, '1', NULL, '2017-06-04 08:48:05', '2017-06-04 08:48:05'),
	(148, 'quaerat', 16, '1', NULL, '2017-06-04 08:48:05', '2017-06-04 08:48:05'),
	(149, 'sint', 16, '1', NULL, '2017-06-04 08:48:05', '2017-06-04 08:48:05'),
	(150, 'dignissimos', 16, '1', NULL, '2017-06-04 08:48:05', '2017-06-04 08:48:05'),
	(151, 'dolor', 16, '1', NULL, '2017-06-04 08:48:05', '2017-06-04 08:48:05'),
	(152, 'voluptas', 16, '1', NULL, '2017-06-04 08:48:05', '2017-06-04 08:48:06'),
	(153, 'rerum', 16, '1', NULL, '2017-06-04 08:48:05', '2017-06-04 08:48:06'),
	(154, 'dolores', 16, '1', NULL, '2017-06-04 08:48:05', '2017-06-04 08:48:06'),
	(155, 'qui', 16, '1', NULL, '2017-06-04 08:48:05', '2017-06-04 08:48:06'),
	(156, 'aut', 16, '1', NULL, '2017-06-04 08:48:05', '2017-06-04 08:48:06'),
	(157, 'eligendi', 17, '1', NULL, '2017-06-04 08:48:06', '2017-06-04 08:48:06'),
	(158, 'impedit', 17, '1', NULL, '2017-06-04 08:48:06', '2017-06-04 08:48:06'),
	(159, 'ipsa', 17, '1', NULL, '2017-06-04 08:48:06', '2017-06-04 08:48:06'),
	(160, 'animi', 17, '1', NULL, '2017-06-04 08:48:06', '2017-06-04 08:48:06'),
	(161, 'qui', 17, '1', NULL, '2017-06-04 08:48:06', '2017-06-04 08:48:06'),
	(162, 'deleniti', 18, '1', NULL, '2017-06-04 08:48:06', '2017-06-04 08:48:06'),
	(163, 'doloribus', 18, '1', NULL, '2017-06-04 08:48:06', '2017-06-04 08:48:06'),
	(164, 'perspiciatis', 18, '1', NULL, '2017-06-04 08:48:06', '2017-06-04 08:48:07'),
	(165, 'et', 18, '1', NULL, '2017-06-04 08:48:06', '2017-06-04 08:48:07'),
	(166, 'velit', 18, '1', NULL, '2017-06-04 08:48:06', '2017-06-04 08:48:07'),
	(167, 'nemo', 19, '1', NULL, '2017-06-04 08:48:07', '2017-06-04 08:48:07'),
	(168, 'praesentium', 19, '1', NULL, '2017-06-04 08:48:07', '2017-06-04 08:48:07'),
	(169, 'modi', 19, '1', NULL, '2017-06-04 08:48:07', '2017-06-04 08:48:07'),
	(170, 'a', 19, '1', NULL, '2017-06-04 08:48:07', '2017-06-04 08:48:07'),
	(171, 'voluptates', 19, '1', NULL, '2017-06-04 08:48:07', '2017-06-04 08:48:08'),
	(172, 'sequi', 19, '1', NULL, '2017-06-04 08:48:07', '2017-06-04 08:48:08'),
	(173, 'quibusdam', 19, '1', NULL, '2017-06-04 08:48:07', '2017-06-04 08:48:08'),
	(174, 'at', 19, '1', NULL, '2017-06-04 08:48:07', '2017-06-04 08:48:08'),
	(175, 'iusto', 20, '1', NULL, '2017-06-04 08:48:08', '2017-06-04 08:48:08'),
	(176, 'reiciendis', 20, '1', NULL, '2017-06-04 08:48:08', '2017-06-04 08:48:08'),
	(177, 'est', 20, '1', NULL, '2017-06-04 08:48:08', '2017-06-04 08:48:08'),
	(178, 'dolores', 20, '1', NULL, '2017-06-04 08:48:08', '2017-06-04 08:48:08'),
	(179, 'amet', 20, '1', NULL, '2017-06-04 08:48:08', '2017-06-04 08:48:08'),
	(180, 'autem', 20, '1', NULL, '2017-06-04 08:48:08', '2017-06-04 08:48:08'),
	(181, 'excepturi', 21, '1', NULL, '2017-06-04 08:48:08', '2017-06-04 08:48:09'),
	(182, 'tenetur', 21, '1', NULL, '2017-06-04 08:48:08', '2017-06-04 08:48:09'),
	(183, 'repellat', 21, '1', NULL, '2017-06-04 08:48:09', '2017-06-04 08:48:09'),
	(184, 'labore', 21, '1', NULL, '2017-06-04 08:48:09', '2017-06-04 08:48:09'),
	(185, 'ut', 21, '1', NULL, '2017-06-04 08:48:09', '2017-06-04 08:48:09'),
	(186, 'consequatur', 21, '1', NULL, '2017-06-04 08:48:09', '2017-06-04 08:48:09'),
	(187, 'quia', 21, '1', NULL, '2017-06-04 08:48:09', '2017-06-04 08:48:09'),
	(188, 'dolore', 21, '1', NULL, '2017-06-04 08:48:09', '2017-06-04 08:48:09'),
	(189, 'unde', 21, '1', NULL, '2017-06-04 08:48:09', '2017-06-04 08:48:09'),
	(190, 'et', 21, '1', NULL, '2017-06-04 08:48:09', '2017-06-04 08:48:09'),
	(191, 'ducimus', 22, '1', NULL, '2017-06-04 08:48:09', '2017-06-04 08:48:10'),
	(192, 'enim', 22, '1', NULL, '2017-06-04 08:48:09', '2017-06-04 08:48:10'),
	(193, 'fugiat', 22, '1', NULL, '2017-06-04 08:48:10', '2017-06-04 08:48:10'),
	(194, 'voluptate', 22, '1', NULL, '2017-06-04 08:48:10', '2017-06-04 08:48:10'),
	(195, 'pariatur', 22, '1', NULL, '2017-06-04 08:48:10', '2017-06-04 08:48:10'),
	(196, 'sit', 22, '1', NULL, '2017-06-04 08:48:10', '2017-06-04 08:48:10'),
	(197, 'enim', 22, '1', NULL, '2017-06-04 08:48:10', '2017-06-04 08:48:10'),
	(198, 'saepe', 22, '1', NULL, '2017-06-04 08:48:10', '2017-06-04 08:48:10'),
	(199, 'a', 23, '1', NULL, '2017-06-04 08:48:10', '2017-06-04 08:48:11'),
	(200, 'voluptatem', 23, '1', NULL, '2017-06-04 08:48:10', '2017-06-04 08:48:11'),
	(201, 'et', 23, '1', NULL, '2017-06-04 08:48:10', '2017-06-04 08:48:11'),
	(202, 'rerum', 23, '1', NULL, '2017-06-04 08:48:11', '2017-06-04 08:48:11'),
	(203, 'tenetur', 23, '1', NULL, '2017-06-04 08:48:11', '2017-06-04 08:48:11'),
	(204, 'voluptatum', 23, '1', NULL, '2017-06-04 08:48:11', '2017-06-04 08:48:11'),
	(205, 'est', 24, '1', NULL, '2017-06-04 08:48:11', '2017-06-04 08:48:11'),
	(206, 'est', 24, '1', NULL, '2017-06-04 08:48:11', '2017-06-04 08:48:11'),
	(207, 'vitae', 24, '1', NULL, '2017-06-04 08:48:11', '2017-06-04 08:48:11'),
	(208, 'facilis', 24, '1', NULL, '2017-06-04 08:48:11', '2017-06-04 08:48:12'),
	(209, 'ad', 24, '1', NULL, '2017-06-04 08:48:11', '2017-06-04 08:48:12'),
	(210, 'labore', 24, '1', NULL, '2017-06-04 08:48:11', '2017-06-04 08:48:12'),
	(211, 'labore', 25, '1', NULL, '2017-06-04 08:48:12', '2017-06-04 08:48:12'),
	(212, 'iusto', 25, '1', NULL, '2017-06-04 08:48:12', '2017-06-04 08:48:12'),
	(213, 'deserunt', 25, '1', NULL, '2017-06-04 08:48:12', '2017-06-04 08:48:12'),
	(214, 'est', 25, '1', NULL, '2017-06-04 08:48:12', '2017-06-04 08:48:12'),
	(215, 'dolores', 25, '1', NULL, '2017-06-04 08:48:12', '2017-06-04 08:48:12'),
	(216, 'quisquam', 25, '1', NULL, '2017-06-04 08:48:12', '2017-06-04 08:48:12'),
	(217, 'rerum', 25, '1', NULL, '2017-06-04 08:48:12', '2017-06-04 08:48:12'),
	(218, 'ut', 25, '1', NULL, '2017-06-04 08:48:12', '2017-06-04 08:48:12'),
	(219, 'amet', 25, '1', NULL, '2017-06-04 08:48:12', '2017-06-04 08:48:13'),
	(220, 'velit', 25, '1', NULL, '2017-06-04 08:48:12', '2017-06-04 08:48:13');
/*!40000 ALTER TABLE `skills_categories` ENABLE KEYS */;


-- Dumping structure for table occassions_pro_db.testimonials
CREATE TABLE IF NOT EXISTS `testimonials` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `feedback` text COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_for` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=151 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table occassions_pro_db.testimonials: ~0 rows (approximately)
/*!40000 ALTER TABLE `testimonials` DISABLE KEYS */;
INSERT INTO `testimonials` (`id`, `title`, `feedback`, `created_by`, `created_for`, `event_id`, `rating`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, 'Footman remarked, \'till tomorrow--\' At this the whole pack of cards,.', 'Distinctio nam consequatur ratione consectetur. Sunt eum ut iste quibusdam temporibus. Libero quo dolorem amet ut animi ea. Corrupti aut modi ut aut mollitia inventore.', 6, 18, 1, 1, '1', NULL, '2017-06-04 08:48:46', '2017-06-04 08:48:53'),
	(2, 'It was so much surprised, that for the first figure!\' said the Mock.', 'Excepturi et doloremque saepe iusto corrupti molestiae facilis nemo. Earum iure omnis qui et est adipisci et. Sed eveniet maxime in et. Qui ullam expedita accusantium eaque vel.', 6, 20, 20, 1, '1', NULL, '2017-06-04 08:48:46', '2017-06-04 08:48:53'),
	(3, 'And I declare it\'s too bad, that it might injure the brain; But, now that.', 'Dolores ex repellendus sed vel explicabo sint. Quia reiciendis dignissimos optio. Sint non necessitatibus excepturi nesciunt maiores.', 23, 5, 7, 1, '1', NULL, '2017-06-04 08:48:46', '2017-06-04 08:48:53'),
	(4, 'Hatter, and here the conversation dropped, and the arm that was sitting.', 'Et aliquid quis unde alias quod eveniet. Id adipisci neque cum nihil et. Ut blanditiis voluptatem odit nihil. Odit aut sit magni architecto iste explicabo.', 17, 27, 10, 1, '1', NULL, '2017-06-04 08:48:47', '2017-06-04 08:48:53'),
	(5, 'Alice asked. \'We called him a fish)--and rapped loudly at the March Hare..', 'Ea dolore sint et assumenda ab similique et. Nihil enim quo voluptas cupiditate. Nisi consequatur et mollitia dolor.', 4, 11, 3, 1, '1', NULL, '2017-06-04 08:48:47', '2017-06-04 08:48:53'),
	(6, 'And beat him when he pleases!\' CHORUS. \'Wow! wow! wow!\' \'Here! you may.', 'Dicta in ullam non non omnis. Cupiditate dolore qui facilis rem commodi quod fugiat mollitia. Qui modi asperiores nesciunt quia sed. Quod harum asperiores aut blanditiis omnis laboriosam.', 6, 7, 4, 1, '1', NULL, '2017-06-04 08:48:47', '2017-06-04 08:48:53'),
	(7, 'HERE.\' \'But then,\' thought Alice, and, after waiting till she got up, and.', 'Et accusamus voluptatum omnis. Aut consequatur assumenda quasi perferendis. Molestias dolorem vel ducimus unde. Quia qui exercitationem molestiae quasi qui reiciendis sed.', 18, 11, 13, 1, '1', NULL, '2017-06-04 08:48:47', '2017-06-04 08:48:54'),
	(8, 'He only does it matter to me whether you\'re nervous or not.\' \'I\'m a poor.', 'Occaecati laboriosam tenetur pariatur ea. Omnis eum reprehenderit labore. Voluptatum atque et at quibusdam. At ut cupiditate qui dolor nostrum ut ut.', 26, 9, 12, 1, '1', NULL, '2017-06-04 08:48:47', '2017-06-04 08:48:54'),
	(9, 'Alice had not a regular rule: you invented it just missed her. Alice.', 'Dolor consectetur voluptatem rerum nam dignissimos. Aut repellendus et sit nobis nemo. In quos velit et nesciunt.\nQuae delectus cumque maiores. Ut modi ipsam possimus omnis ea ex optio.', 21, 25, 12, 1, '1', NULL, '2017-06-04 08:48:47', '2017-06-04 08:48:54'),
	(10, 'As she said to herself \'It\'s the oldest rule in the way YOU manage?\'.', 'Ea consequuntur rem corporis animi qui nihil inventore nihil. Quasi tempore sapiente in officiis autem sed. Eveniet possimus soluta rerum eligendi nisi.', 24, 2, 11, 1, '1', NULL, '2017-06-04 08:48:47', '2017-06-04 08:48:54'),
	(11, 'Hatter, \'I cut some more bread-and-butter--\' \'But what happens when one.', 'Non laborum eius et sunt. Officia itaque odio voluptas in tempora quos. Dolorem delectus sed aut dolor adipisci nostrum.', 6, 11, 14, 1, '1', NULL, '2017-06-04 08:48:47', '2017-06-04 08:48:54'),
	(12, 'Then they all stopped and looked at each other for some time with great.', 'Rerum fugit aperiam nihil qui quod. Tempore doloremque iusto doloribus voluptas voluptas. Sunt quod et sit suscipit et ut.', 17, 5, 5, 1, '1', NULL, '2017-06-04 08:48:47', '2017-06-04 08:48:54'),
	(13, 'Alice was beginning to think that proved it at all. \'But perhaps it was.', 'At cum dolorem modi in sint ea architecto. Dolorum tempore ut laudantium beatae. Ullam quia sit et.', 11, 26, 13, 1, '1', NULL, '2017-06-04 08:48:47', '2017-06-04 08:48:54'),
	(14, 'Shall I try the effect: the next witness.\' And he added in an undertone,.', 'Sed doloremque voluptate sint doloribus. Sunt animi deleniti excepturi dolores exercitationem explicabo. Repellendus hic expedita dolores in.', 21, 2, 10, 1, '1', NULL, '2017-06-04 08:48:47', '2017-06-04 08:48:54'),
	(15, 'I\'ll write one--but I\'m grown up now,\' she said, as politely as she went.', 'Odio id rerum sit id molestias alias officiis. Temporibus praesentium alias eaque et. In cumque est aperiam inventore. Necessitatibus ab aperiam reiciendis dolores soluta quo.', 1, 25, 18, 1, '1', NULL, '2017-06-04 08:48:47', '2017-06-04 08:48:54'),
	(16, 'Mouse, who seemed to have finished,\' said the youth, \'one would hardly.', 'Quia sunt aut sed quasi. Facilis nemo cum porro ut. Distinctio ut sit facilis sequi voluptatem. Voluptate commodi non qui officiis mollitia dolores in.', 19, 22, 3, 1, '1', NULL, '2017-06-04 08:48:47', '2017-06-04 08:48:54'),
	(17, 'Alice, \'and why it is almost certain to disagree with you, sooner or.', 'Doloremque eos aut ea exercitationem omnis nisi ut. Enim voluptate est nobis reprehenderit. Assumenda ea quas omnis. Dolorem itaque explicabo aut ab eius distinctio.', 20, 17, 8, 1, '1', NULL, '2017-06-04 08:48:47', '2017-06-04 08:48:54'),
	(18, 'Be off, or I\'ll kick you down stairs!\' \'That is not said right,\' said the.', 'Laboriosam ipsum eos aut itaque ipsum sit perspiciatis. Tempora repellendus odio sapiente quia libero quibusdam neque.', 17, 9, 4, 1, '1', NULL, '2017-06-04 08:48:47', '2017-06-04 08:48:54'),
	(19, 'This is the same thing as a cushion, resting their elbows on it, or at.', 'Voluptatem est aut odit itaque ut reprehenderit. Quo quam sint qui. Et voluptas architecto cumque eveniet tempore quo. Earum aut consectetur corrupti minima laborum.', 14, 19, 6, 1, '1', NULL, '2017-06-04 08:48:47', '2017-06-04 08:48:54'),
	(20, 'The miserable Hatter dropped his teacup and bread-and-butter, and went.', 'Unde magnam sunt laboriosam ullam. Unde sed qui dolorum hic aut. Impedit necessitatibus reprehenderit voluptas sed mollitia cumque culpa.', 12, 3, 13, 1, '1', NULL, '2017-06-04 08:48:47', '2017-06-04 08:48:55'),
	(21, 'She stretched herself up closer to Alice\'s great surprise, the Duchess\'s.', 'Et repudiandae in fugiat laboriosam totam nihil saepe. Ea error repellat dolorem in qui. Excepturi et debitis enim earum quia repellendus amet.', 8, 17, 19, 1, '1', NULL, '2017-06-04 08:48:47', '2017-06-04 08:48:55'),
	(22, 'Mouse\'s tail; \'but why do you mean that you had been looking at.', 'Rem beatae amet sed sint quibusdam eos. Illo quia dolor rerum cupiditate quo. Fugit necessitatibus et ut blanditiis dignissimos facilis.', 8, 15, 2, 1, '1', NULL, '2017-06-04 08:48:47', '2017-06-04 08:48:55'),
	(23, 'Pig!\' She said the King in a hurry: a large pool all round the hall, but.', 'Sapiente iste et et eveniet dicta aperiam esse. Error necessitatibus inventore facilis nam accusamus reprehenderit ratione. Perferendis temporibus sed neque autem quod.', 18, 26, 13, 1, '1', NULL, '2017-06-04 08:48:47', '2017-06-04 08:48:55'),
	(24, 'After a time she heard a little more conversation with her head!\' Alice.', 'Velit dolor consequatur ullam quisquam nulla doloribus. Quae pariatur repudiandae corporis aspernatur iure. Officiis iste non et quia dolore soluta dolorem non.', 14, 4, 2, 1, '1', NULL, '2017-06-04 08:48:47', '2017-06-04 08:48:55'),
	(25, 'Queen, who was peeping anxiously into her face. \'Wake up, Dormouse!\' And.', 'Et odio totam et eum numquam alias numquam. Iure autem architecto voluptas velit dolorem voluptatem. Molestiae ut est et aspernatur est eos magnam.', 12, 9, 20, 1, '1', NULL, '2017-06-04 08:48:47', '2017-06-04 08:48:55'),
	(26, 'Why, I haven\'t had a head unless there was no \'One, two, three, and.', 'Facere laudantium libero autem aut id rerum. Ab at nihil dolorum libero. Est distinctio doloremque aut at minima. Non natus illum consequatur consectetur molestiae.', 2, 10, 4, 1, '1', NULL, '2017-06-04 08:48:47', '2017-06-04 08:48:55'),
	(27, 'Alice! Come here directly, and get ready for your walk!" "Coming in a.', 'Totam quos tenetur autem. Iure saepe odio ut ut amet sit necessitatibus. Dolorem facere quia animi et odit enim. Deserunt qui est aut quo magni maiores dolorem. Ut eos nihil qui.', 16, 20, 15, 1, '1', NULL, '2017-06-04 08:48:47', '2017-06-04 08:48:55'),
	(28, 'Alice, so please your Majesty,\' said Two, in a hurried nervous manner,.', 'Et et itaque tempore consequuntur. Iusto corporis atque ea veritatis quaerat quaerat. Nemo qui dolorem nesciunt illum. Quas sint sit quibusdam ut dolore debitis.', 15, 12, 19, 1, '1', NULL, '2017-06-04 08:48:48', '2017-06-04 08:48:55'),
	(29, 'King had said that day. \'A likely story indeed!\' said the King. \'When did.', 'Molestiae sit molestiae iure odit explicabo et corporis. Et dolorum doloremque nihil et aut eius minima aliquam. Autem commodi omnis tempora consectetur.', 5, 22, 10, 1, '1', NULL, '2017-06-04 08:48:48', '2017-06-04 08:48:55'),
	(30, 'There were doors all round the table, half hoping that they must needs.', 'Repellat magnam quas architecto vero ut laborum. Dolorem facere exercitationem inventore velit optio perferendis. Et enim et fugiat maxime est occaecati quae exercitationem.', 22, 11, 12, 1, '1', NULL, '2017-06-04 08:48:48', '2017-06-04 08:48:55'),
	(31, 'For some minutes it puffed away without being invited,\' said the Hatter..', 'Voluptatum perspiciatis voluptate voluptas autem saepe consequatur porro dolore. Nihil nemo sit nobis consequatur. Vitae voluptatem et harum animi.', 14, 13, 14, 1, '1', NULL, '2017-06-04 08:48:48', '2017-06-04 08:48:55'),
	(32, 'Him, and ourselves, and it. Don\'t let me hear the rattle of the house,.', 'Et optio sint ducimus a perferendis inventore. Fugit dolores sunt a qui nam quasi. Voluptates sed delectus et nulla laboriosam sed quidem.', 17, 22, 18, 1, '1', NULL, '2017-06-04 08:48:48', '2017-06-04 08:48:55'),
	(33, 'She generally gave herself very good advice, (though she very soon had to.', 'Sint consequatur tempore voluptatum architecto. Qui et ullam minus soluta. Sint sapiente et rerum non modi fuga. Vel autem voluptatem dolorem ea quo facilis aliquid.', 2, 17, 11, 1, '1', NULL, '2017-06-04 08:48:48', '2017-06-04 08:48:55'),
	(34, 'Next came the guests, mostly Kings and Queens, and among them Alice.', 'Praesentium blanditiis libero non ut mollitia quia ut. Quo et est debitis porro doloribus. Dolorum quae harum veritatis rerum. Illo ratione quia qui adipisci deleniti.', 17, 14, 3, 1, '1', NULL, '2017-06-04 08:48:48', '2017-06-04 08:48:55'),
	(35, 'Mouse, in a tone of delight, which changed into alarm in another moment,.', 'Distinctio omnis quos quis recusandae debitis. Fugiat aperiam eligendi dolorum distinctio ut. Libero dolor dolorum sint. Aut eos nemo sit tenetur iusto nihil assumenda.', 10, 4, 6, 1, '1', NULL, '2017-06-04 08:48:48', '2017-06-04 08:48:56'),
	(36, 'I\'ve tried banks, and I\'ve tried hedges,\' the Pigeon had finished. \'As if.', 'Vitae a nisi id corrupti est. Omnis et maiores explicabo blanditiis enim. Non quisquam dolores ab eum autem velit.', 3, 8, 13, 1, '1', NULL, '2017-06-04 08:48:48', '2017-06-04 08:48:56'),
	(37, 'Alice! Come here directly, and get in at all?\' said the Hatter. \'I told.', 'Commodi qui quidem rem dolores. Qui ipsum et voluptatem harum. Dignissimos omnis magnam minus autem.', 17, 13, 17, 1, '1', NULL, '2017-06-04 08:48:48', '2017-06-04 08:48:56'),
	(38, 'Mock Turtle in a trembling voice to a mouse: she had never had fits, my.', 'Ea autem veritatis inventore quia qui deserunt rerum. Id aut vel quis et rerum omnis dolor. Deleniti omnis et quasi assumenda aliquam corporis.', 27, 14, 3, 1, '1', NULL, '2017-06-04 08:48:48', '2017-06-04 08:48:56'),
	(39, 'Caterpillar contemptuously. \'Who are YOU?\' Which brought them back again.', 'Molestiae placeat eum consequuntur illo enim architecto mollitia. Ut a quibusdam asperiores nostrum quaerat fuga. Quo porro modi velit eius.', 19, 27, 4, 1, '1', NULL, '2017-06-04 08:48:48', '2017-06-04 08:48:56'),
	(40, 'On every golden scale! \'How cheerfully he seems to grin, How neatly.', 'Recusandae sint eveniet exercitationem. Repellendus quaerat asperiores ut non blanditiis architecto sint. Minus vero necessitatibus officia necessitatibus et architecto laborum.', 13, 18, 3, 1, '1', NULL, '2017-06-04 08:48:48', '2017-06-04 08:48:56'),
	(41, 'How puzzling all these strange Adventures of hers would, in the same age.', 'Corrupti quidem reiciendis possimus ex eveniet. Dolorem ut perferendis ad ut ea laudantium voluptas adipisci.', 7, 4, 18, 1, '1', NULL, '2017-06-04 08:48:48', '2017-06-04 08:48:56'),
	(42, 'It means much the same thing with you,\' said Alice, in a louder tone..', 'Id consequatur est beatae repudiandae reprehenderit minus. Odit dolores suscipit est occaecati consectetur fugit. Numquam iusto eos ad dolores quia ut pariatur.', 18, 26, 16, 1, '1', NULL, '2017-06-04 08:48:48', '2017-06-04 08:48:56'),
	(43, 'I think I can find them.\' As she said to live. \'I\'ve seen hatters.', 'Minima voluptatum totam qui. Beatae et voluptatibus omnis atque aut magnam ex. Odit totam sunt ex et vel consequatur vel.', 20, 25, 11, 1, '1', NULL, '2017-06-04 08:48:48', '2017-06-04 08:48:56'),
	(44, 'They\'re dreadfully fond of beheading people here; the great wonder is,.', 'Eligendi ut unde adipisci consequatur. Aut nobis non porro. Tempora nulla eveniet amet veritatis aliquam ex voluptatem.', 1, 15, 12, 1, '1', NULL, '2017-06-04 08:48:48', '2017-06-04 08:48:56'),
	(45, 'I suppose Dinah\'ll be sending me on messages next!\' And she squeezed.', 'Repudiandae ea adipisci asperiores quia. Eos sit animi atque impedit sequi quod. Dolorum autem dicta excepturi placeat illo quae iure perferendis.', 24, 23, 10, 1, '1', NULL, '2017-06-04 08:48:48', '2017-06-04 08:48:56'),
	(46, 'Mouse. \'--I proceed. "Edwin and Morcar, the earls of Mercia and.', 'Soluta libero voluptatem et vero. Fugit et ut vitae. Minus qui non possimus.', 1, 13, 14, 1, '1', NULL, '2017-06-04 08:48:48', '2017-06-04 08:48:56'),
	(47, 'Alice, that she was shrinking rapidly; so she began shrinking directly..', 'A laboriosam molestiae labore ut. Nostrum unde praesentium vitae ut minima. Et cupiditate natus tempora a deserunt dolores incidunt.', 12, 24, 8, 1, '1', NULL, '2017-06-04 08:48:48', '2017-06-04 08:48:56'),
	(48, 'Hatter. \'He won\'t stand beating. Now, if you were never even introduced.', 'Quia nihil sunt dolore harum voluptatem. Ea autem molestiae rerum magni. Debitis sequi non distinctio repudiandae.', 12, 21, 12, 1, '1', NULL, '2017-06-04 08:48:48', '2017-06-04 08:48:57'),
	(49, 'March Hare said to the dance. So they got thrown out to sea. So they went.', 'Suscipit sed non molestias. Alias illum quia molestias quaerat numquam aspernatur quis nihil. Praesentium fuga magnam deserunt earum. Aut velit ab minima atque.', 9, 23, 16, 1, '1', NULL, '2017-06-04 08:48:48', '2017-06-04 08:48:57'),
	(50, 'Majesty,\' said Alice to herself. At this moment the King, and the baby.', 'Rerum praesentium et labore error possimus repellat et et. Rerum quisquam occaecati occaecati quae harum similique porro. Aut consequatur est quisquam non. Odit placeat quam nobis magnam.', 1, 23, 15, 1, '1', NULL, '2017-06-04 08:48:48', '2017-06-04 08:48:57'),
	(51, 'Oh, how I wish you were all talking together: she made it out to the law,.', 'Cumque ea porro veritatis similique nostrum. Culpa fugiat fugit magni molestiae iure aut rerum.', 8, 16, 2, 1, '1', NULL, '2017-06-04 08:48:48', '2017-06-04 08:48:57'),
	(52, 'Queen turned angrily away from her as she picked her way out. \'I shall do.', 'Recusandae quia fugiat tenetur. Itaque provident quaerat sed.', 11, 3, 14, 1, '1', NULL, '2017-06-04 08:48:49', '2017-06-04 08:48:57'),
	(53, 'Alice, flinging the baby at her as she went slowly after it: \'I never.', 'Molestiae qui rerum fugit molestias et nulla. Vel voluptatem sed quia deleniti. Sequi voluptatem enim eligendi ea. Voluptates omnis non sapiente qui harum est. Aperiam quia excepturi ipsum aut sunt.', 26, 11, 15, 1, '1', NULL, '2017-06-04 08:48:49', '2017-06-04 08:48:57'),
	(54, 'There are no mice in the wood,\' continued the King. \'It began with the.', 'Deleniti quia accusantium praesentium non sit aut est. Omnis tempora perspiciatis nobis qui. Non est sunt laboriosam dolor aliquid aut a laboriosam.', 5, 13, 15, 1, '1', NULL, '2017-06-04 08:48:49', '2017-06-04 08:48:57'),
	(55, 'Has lasted the rest were quite silent, and looked at the door--I do wish.', 'Facere minima aut ipsa ea magni. Et rem quae et ut reprehenderit. Fugit praesentium et aut voluptas dolor cupiditate ea. Doloribus reprehenderit id odio voluptas.', 17, 15, 12, 1, '1', NULL, '2017-06-04 08:48:49', '2017-06-04 08:48:57'),
	(56, 'QUITE as much as serpents do, you know.\' \'I don\'t see how the Dodo.', 'Qui aut corporis architecto nihil ut alias. Qui voluptas sequi aut qui aliquam harum eum. Qui asperiores et totam molestias iure nihil perferendis.', 11, 25, 14, 1, '1', NULL, '2017-06-04 08:48:49', '2017-06-04 08:48:58'),
	(57, 'Rabbit\'s voice; and the choking of the tea--\' \'The twinkling of the.', 'Ut eaque nesciunt consequatur ut officia. Vel iste iure nam aperiam ut aut magni.', 25, 9, 8, 1, '1', NULL, '2017-06-04 08:48:49', '2017-06-04 08:48:58'),
	(58, 'I was, I shouldn\'t want YOURS: I don\'t understand. Where did they live at.', 'Nihil ullam nesciunt eaque cupiditate iure fugiat suscipit. Illum nihil reiciendis omnis. Quae distinctio recusandae architecto.', 23, 20, 13, 1, '1', NULL, '2017-06-04 08:48:49', '2017-06-04 08:48:58'),
	(59, 'Hatter. \'It isn\'t directed at all,\' said Alice: \'I don\'t much care.', 'Omnis voluptas nemo quae necessitatibus vel et. Reiciendis enim dicta libero voluptas suscipit ab. Odit possimus quos soluta voluptatem totam. Sit omnis est magnam facilis.', 6, 9, 14, 1, '1', NULL, '2017-06-04 08:48:49', '2017-06-04 08:48:58'),
	(60, 'And how odd the directions will look! ALICE\'S RIGHT FOOT, ESQ. HEARTHRUG,.', 'Ut sequi consequatur nam. Ex quam non minus ut id explicabo occaecati aspernatur. Quos eaque dolorum dicta ut voluptatem.', 25, 1, 13, 1, '1', NULL, '2017-06-04 08:48:49', '2017-06-04 08:48:58'),
	(61, 'King, rubbing his hands; \'so now let the jury--\' \'If any one left alive!\'.', 'Laboriosam quibusdam sunt dolorem voluptates voluptas. Sed consequatur saepe est ratione et. Ut facilis nisi officia totam aperiam. Est eligendi dolores aspernatur enim explicabo aliquid quibusdam.', 16, 2, 16, 1, '1', NULL, '2017-06-04 08:48:49', '2017-06-04 08:48:58'),
	(62, 'And yet you incessantly stand on your head-- Do you think you could only.', 'Et perferendis libero qui nobis velit qui. Laudantium consequatur deserunt et et ut. Voluptate iste id praesentium ab ab earum dolorum. Illo quis consequatur facilis incidunt est atque.', 11, 8, 3, 1, '1', NULL, '2017-06-04 08:48:49', '2017-06-04 08:48:58'),
	(63, 'Mock Turtle Soup is made from,\' said the Hatter: \'I\'m on the Duchess\'s.', 'Hic aut reiciendis voluptas quam tenetur possimus facilis. Aliquam non et odit. Harum quaerat et vel ut odit dolores. Corporis autem possimus natus architecto esse sed.', 12, 10, 20, 1, '1', NULL, '2017-06-04 08:48:49', '2017-06-04 08:48:58'),
	(64, 'I can\'t tell you my history, and you\'ll understand why it is all the.', 'Quos repudiandae consectetur dolorum enim omnis earum harum quia. Tempora labore et sit quis qui. Ipsum quis iure fugiat sit distinctio. Autem qui quibusdam est vitae dignissimos.', 12, 1, 15, 1, '1', NULL, '2017-06-04 08:48:49', '2017-06-04 08:48:58'),
	(65, 'I\'ve tried hedges,\' the Pigeon in a very small cake, on which the.', 'Accusantium est nesciunt id neque cum dolorem ipsa. Est reiciendis dignissimos id porro. Inventore eligendi sunt sint velit. Sed impedit nihil natus consequatur et omnis.', 5, 21, 13, 1, '1', NULL, '2017-06-04 08:48:49', '2017-06-04 08:48:58'),
	(66, 'The moment Alice appeared, she was now about two feet high, and was.', 'Assumenda necessitatibus adipisci soluta facere nisi. Nulla ea quia nobis amet. Consequatur natus dolor vel.', 16, 6, 12, 1, '1', NULL, '2017-06-04 08:48:49', '2017-06-04 08:48:58'),
	(67, 'King, \'and don\'t be nervous, or I\'ll kick you down stairs!\' \'That is not.', 'Veritatis et pariatur in et praesentium. Eos et et nobis quo. Aut provident consectetur possimus minus rem sunt. Quae iusto officiis esse totam nihil.', 11, 15, 7, 1, '1', NULL, '2017-06-04 08:48:49', '2017-06-04 08:48:58'),
	(68, 'So Alice got up and rubbed its eyes: then it watched the White Rabbit,.', 'Nihil et voluptatem nam officia. Recusandae optio impedit id deleniti. Ullam et deleniti eos tenetur dolore sed.', 26, 23, 5, 1, '1', NULL, '2017-06-04 08:48:49', '2017-06-04 08:48:58'),
	(69, 'I shall see it quite plainly through the door, she ran off at once, while.', 'Architecto veniam inventore laudantium quia. At dolor itaque reiciendis libero asperiores. Quia eum iure perferendis a eius ex. Vel ut rem labore.', 12, 1, 4, 1, '1', NULL, '2017-06-04 08:48:49', '2017-06-04 08:48:58'),
	(70, 'VERY tired of being all alone here!\' As she said this, she was near.', 'Voluptates necessitatibus tempora enim eligendi natus perspiciatis itaque est. Et sit est et velit laborum et. Rem labore ea eaque necessitatibus non tempora. Fugiat fuga optio qui ratione.', 3, 21, 8, 1, '1', NULL, '2017-06-04 08:48:49', '2017-06-04 08:48:58'),
	(71, 'While the Owl had the best way you can;--but I must be what he did it,).', 'Repellat reprehenderit magni quidem soluta ullam aut. Ea omnis quam accusantium possimus. Quam adipisci quia autem vero excepturi omnis animi necessitatibus.', 3, 14, 14, 1, '1', NULL, '2017-06-04 08:48:49', '2017-06-04 08:48:59'),
	(72, 'YOUR business, Two!\' said Seven. \'Yes, it IS his business!\' said Five,.', 'Quasi similique velit omnis beatae voluptas doloremque. Pariatur commodi debitis consequatur soluta non. Id distinctio corrupti porro dicta facere qui.', 16, 11, 11, 1, '1', NULL, '2017-06-04 08:48:49', '2017-06-04 08:48:59'),
	(73, 'Arithmetic--Ambition, Distraction, Uglification, and Derision.\' \'I never.', 'Soluta est atque beatae sequi. Ullam fugiat officiis asperiores vero et. Occaecati in voluptas et ipsa odit.', 4, 18, 4, 1, '1', NULL, '2017-06-04 08:48:49', '2017-06-04 08:48:59'),
	(74, 'After a time there were three gardeners who were all locked; and when she.', 'Laborum rerum soluta mollitia fugit velit. Et id aut quia suscipit ipsam officia aut dolor. Et et nisi ducimus totam quia.', 10, 11, 5, 1, '1', NULL, '2017-06-04 08:48:49', '2017-06-04 08:48:59'),
	(75, 'And with that she still held the pieces of mushroom in her life; it was.', 'Beatae voluptates facilis aut et sit. Eos ipsam quia nostrum incidunt molestias est. Molestiae quisquam dolores assumenda quia cum iste consequuntur.', 15, 5, 19, 1, '1', NULL, '2017-06-04 08:48:49', '2017-06-04 08:48:59'),
	(76, 'BEST butter, you know.\' \'And what an ignorant little girl or a worm. The.', 'Sapiente laudantium ut placeat voluptatem rem. Quia tempore quibusdam laboriosam maxime assumenda ut expedita. Voluptas ab cumque repudiandae blanditiis ratione adipisci.', 15, 7, 16, 1, '1', NULL, '2017-06-04 08:48:50', '2017-06-04 08:48:59'),
	(77, 'I BEG your pardon!\' cried Alice hastily, afraid that she had got to go.', 'Exercitationem aut doloremque eaque cum sint est. Qui fuga quis dolorem ad. Provident velit veritatis nihil reprehenderit.', 23, 26, 8, 1, '1', NULL, '2017-06-04 08:48:50', '2017-06-04 08:48:59'),
	(78, 'King, rubbing his hands; \'so now let the Dormouse denied nothing, being.', 'Suscipit et et dolorum. Natus voluptas nesciunt reiciendis fugit eius. Voluptatibus officiis minus deserunt reprehenderit vero.', 4, 26, 16, 1, '1', NULL, '2017-06-04 08:48:50', '2017-06-04 08:48:59'),
	(79, 'Gryphon. \'Do you play croquet with the day of the tail, and ending with.', 'Esse officia iusto fugit impedit labore. Nobis ut quaerat quo consequatur corrupti. Et quas perferendis sapiente voluptate. Iste incidunt at exercitationem quis quia quo.', 3, 8, 4, 1, '1', NULL, '2017-06-04 08:48:50', '2017-06-04 08:48:59'),
	(80, 'Alice, as she listened, or seemed to Alice an excellent opportunity for.', 'Ut ut est perferendis ratione aut explicabo omnis nam. Quod eum dolore vitae consequatur ipsam earum eaque. Eaque qui aperiam atque corrupti voluptas quasi quisquam.', 18, 26, 18, 1, '1', NULL, '2017-06-04 08:48:50', '2017-06-04 08:48:59'),
	(81, 'March Hare. \'Sixteenth,\' added the Hatter, and, just as she could get to.', 'Ut non ducimus ratione qui consequatur vel at. Quam quaerat voluptatem quam ut eos non. Dolores dolorem rem temporibus voluptatem labore. Velit consectetur ex quia tenetur omnis nisi.', 18, 20, 6, 1, '1', NULL, '2017-06-04 08:48:50', '2017-06-04 08:48:59'),
	(82, 'Hatter added as an explanation; \'I\'ve none of them with one elbow against.', 'Rerum rerum et assumenda aliquam perspiciatis exercitationem tempora. Aut voluptatem consequuntur non. Quibusdam quibusdam delectus rerum libero.', 20, 17, 19, 1, '1', NULL, '2017-06-04 08:48:50', '2017-06-04 08:48:59'),
	(83, 'Gryphon replied very politely, feeling quite pleased to have it.', 'Consectetur nulla vitae aut reiciendis molestiae saepe. Non aperiam earum in nisi amet distinctio et rem. Dolore culpa odit sequi praesentium deleniti inventore ipsam. Sequi quia excepturi et amet.', 2, 17, 5, 1, '1', NULL, '2017-06-04 08:48:50', '2017-06-04 08:48:59'),
	(84, 'Duchess said after a few yards off. The Cat only grinned a little shriek,.', 'Voluptatem natus est iure beatae eveniet quia ipsum. Voluptatum aliquam maiores magni reprehenderit deleniti sit. Sit voluptates quia qui.', 5, 11, 2, 1, '1', NULL, '2017-06-04 08:48:50', '2017-06-04 08:48:59'),
	(85, 'Rabbit came near her, she began, in rather a handsome pig, I think.\' And.', 'Quis tempora minima sequi sit similique accusantium. Similique et ratione et temporibus nobis. Hic illo similique libero cupiditate. Saepe officia repellat quos sed fugiat et ad molestias.', 10, 23, 14, 1, '1', NULL, '2017-06-04 08:48:50', '2017-06-04 08:48:59'),
	(86, 'I breathe"!\' \'It IS the use of a tree a few minutes it puffed away.', 'Minus molestiae dolorum sapiente necessitatibus molestias. Ad sed quia quia. At et aperiam pariatur nihil exercitationem ut inventore.', 8, 1, 16, 1, '1', NULL, '2017-06-04 08:48:50', '2017-06-04 08:49:00'),
	(87, 'I fancied that kind of thing that would be offended again. \'Mine is a.', 'Ullam reprehenderit similique sed et recusandae placeat consequatur qui. Atque quibusdam modi asperiores unde expedita rerum nemo. Voluptatem explicabo assumenda incidunt eum.', 8, 27, 2, 1, '1', NULL, '2017-06-04 08:48:50', '2017-06-04 08:49:00'),
	(88, 'King put on your head-- Do you think I could, if I would talk on such a.', 'Quidem mollitia autem necessitatibus harum omnis. Repudiandae voluptas asperiores quas minus. Maxime natus ex et ex saepe.', 5, 2, 15, 1, '1', NULL, '2017-06-04 08:48:50', '2017-06-04 08:49:00'),
	(89, 'Dodo managed it.) First it marked out a race-course, in a natural way.', 'Nam officiis ipsam vitae quasi rem ut. Fuga quas vitae facilis nihil quia possimus porro qui. Placeat eum ullam eligendi.', 6, 3, 2, 1, '1', NULL, '2017-06-04 08:48:50', '2017-06-04 08:49:00'),
	(90, 'Dormouse; \'VERY ill.\' Alice tried to open it; but, as the question was.', 'Possimus ut dolorum sed voluptatem quam error eaque. Quia qui dolores reprehenderit provident et quia. Corporis consequuntur cupiditate et exercitationem qui.', 7, 5, 12, 1, '1', NULL, '2017-06-04 08:48:50', '2017-06-04 08:49:00'),
	(91, 'March Hare. \'I didn\'t know that cats COULD grin.\' \'They all can,\' said.', 'Excepturi occaecati est dolorum voluptate quia. Consequatur minus distinctio nihil quis unde. Excepturi hic et quis possimus rerum. Et voluptatum natus consequatur.', 27, 8, 10, 1, '1', NULL, '2017-06-04 08:48:50', '2017-06-04 08:49:00'),
	(92, 'Alice cautiously replied, not feeling at all comfortable, and it said in.', 'Quis dolores et quo laborum culpa aliquid. Vel et minus eum possimus modi est eligendi. Earum culpa autem provident voluptatem et minima saepe voluptatem.', 5, 2, 14, 1, '1', NULL, '2017-06-04 08:48:50', '2017-06-04 08:49:00'),
	(93, 'Twinkle, twinkle--"\' Here the other side, the puppy began a series of.', 'Et et sunt quasi ut. Aut non autem impedit voluptatibus. Fugiat asperiores vitae nesciunt ipsum rerum aut quod. Doloremque molestias fugiat omnis impedit molestias molestiae aut explicabo.', 27, 21, 13, 1, '1', NULL, '2017-06-04 08:48:50', '2017-06-04 08:49:00'),
	(94, 'Hatter trembled so, that he shook both his shoes on. \'--and just take his.', 'Possimus dolores quis omnis dolores eum quidem doloribus. Laudantium autem natus omnis fugiat quos expedita necessitatibus.', 7, 17, 20, 1, '1', NULL, '2017-06-04 08:48:50', '2017-06-04 08:49:00'),
	(95, 'Alice, (she had kept a piece of it at last, and they can\'t prove I did:.', 'Recusandae unde corrupti veritatis molestiae et perspiciatis harum. Omnis non at distinctio qui nulla. Eos quas unde veritatis. Occaecati sed officiis est quaerat eius qui.', 13, 27, 14, 1, '1', NULL, '2017-06-04 08:48:50', '2017-06-04 08:49:00'),
	(96, 'Dormouse, and repeated her question. \'Why did they live at the end.\' \'If.', 'Rerum beatae illo dolore. Repellendus sit fuga et sint fuga occaecati earum. Inventore repellendus et qui quae voluptatem et.', 26, 23, 17, 1, '1', NULL, '2017-06-04 08:48:50', '2017-06-04 08:49:00'),
	(97, 'While the Panther were sharing a pie--\' [later editions continued as.', 'Omnis pariatur odit ut quia. Et delectus sit assumenda. Et ipsa ut dolorem voluptatem.', 18, 15, 7, 1, '1', NULL, '2017-06-04 08:48:50', '2017-06-04 08:49:01'),
	(98, 'Caterpillar. Alice said to herself, \'Which way? Which way?\', holding her.', 'Sed recusandae totam voluptas quia sit voluptates sit dolores. Id velit eum molestiae quisquam numquam dicta. Qui omnis quia quis dicta.', 26, 25, 17, 1, '1', NULL, '2017-06-04 08:48:50', '2017-06-04 08:49:01'),
	(99, 'Caterpillar. This was quite out of sight: \'but it sounds uncommon.', 'Minima provident ut accusantium voluptas ullam officia. Consequatur magnam adipisci voluptatum reprehenderit. Odit ipsa dolorem molestiae fugiat. Voluptatibus magni provident quo enim.', 15, 18, 6, 1, '1', NULL, '2017-06-04 08:48:50', '2017-06-04 08:49:01'),
	(100, 'Mock Turtle would be very likely it can be,\' said the King. \'When did you.', 'Facilis voluptas repellendus voluptas omnis cumque debitis. Veritatis vitae cum quod qui. Voluptatem vel ut non veniam voluptatum provident enim.', 20, 16, 9, 1, '1', NULL, '2017-06-04 08:48:51', '2017-06-04 08:49:01'),
	(101, 'Duchess, digging her sharp little chin into Alice\'s shoulder as he could.', 'Tempora quam eum odit quis voluptatem. Autem aut omnis ea autem. Placeat similique ratione consequuntur illum dolorum. Expedita et quae non nihil a quia facilis.', 16, 8, 4, 1, '1', NULL, '2017-06-04 08:48:51', '2017-06-04 08:49:01'),
	(102, 'Alice felt a violent blow underneath her chin: it had come back again,.', 'Voluptates excepturi exercitationem saepe facere itaque. Et sunt et sed illum. Vel qui cum animi reiciendis necessitatibus quam. Perspiciatis dignissimos minima tempore autem omnis maiores.', 8, 8, 20, 1, '1', NULL, '2017-06-04 08:48:51', '2017-06-04 08:49:01'),
	(103, 'Alice as he spoke. \'UNimportant, of course, I meant,\' the King was the.', 'Ipsam quaerat aliquam aut autem omnis alias tenetur voluptatem. Numquam laboriosam sapiente nam recusandae dolorum quas itaque. Qui qui ab deleniti ea voluptatem eos.', 21, 19, 13, 1, '1', NULL, '2017-06-04 08:48:51', '2017-06-04 08:49:01'),
	(104, 'Alice didn\'t think that there was no time to avoid shrinking away.', 'Molestiae sed voluptatum qui iure quae odit. Ut tempore sunt nihil dolor illum placeat accusamus. Iusto qui a aliquid aut. Magnam corrupti qui voluptate est.', 1, 10, 8, 1, '1', NULL, '2017-06-04 08:48:51', '2017-06-04 08:49:01'),
	(105, 'Mouse, frowning, but very politely: \'Did you say pig, or fig?\' said the.', 'Rem vero reiciendis quo rem. Sapiente ut porro possimus deleniti numquam repudiandae laborum. Dolore similique culpa voluptas laborum quo. Sit et et qui maiores tempore magnam.', 14, 17, 13, 1, '1', NULL, '2017-06-04 08:48:51', '2017-06-04 08:49:01'),
	(106, 'Caterpillar took the watch and looked at the bottom of a globe of.', 'Nostrum iusto temporibus dolorem nisi. Enim accusantium fugit sint dolorem. Aspernatur dolorum exercitationem aspernatur et eos enim. Doloremque facere velit ipsa ducimus velit quas quis animi.', 14, 14, 10, 1, '1', NULL, '2017-06-04 08:48:51', '2017-06-04 08:49:01'),
	(107, 'VERY nearly at the end of the earth. Let me see: that would happen:.', 'Et et soluta ut non distinctio reprehenderit qui. Enim eligendi ea omnis ut eos voluptatem ipsum. Voluptatem voluptate nostrum tenetur est a blanditiis.', 15, 25, 16, 1, '1', NULL, '2017-06-04 08:48:51', '2017-06-04 08:49:01'),
	(108, 'Soup! Beau--ootiful Soo--oop! Beau--ootiful Soo--oop! Beau--ootiful.', 'Placeat impedit sapiente quaerat non quas. Non reprehenderit accusamus beatae et qui perspiciatis aspernatur voluptatem. Perferendis totam illum ut.', 27, 26, 19, 1, '1', NULL, '2017-06-04 08:48:51', '2017-06-04 08:49:01'),
	(109, 'Duck: \'it\'s generally a frog or a serpent?\' \'It matters a good deal: this.', 'Nihil suscipit quos illum ea cumque quia ullam amet. Voluptatem suscipit qui inventore debitis beatae enim. Quis non velit voluptates provident ab fugiat ut.', 2, 26, 9, 1, '1', NULL, '2017-06-04 08:48:51', '2017-06-04 08:49:01'),
	(110, 'Alice. \'What IS the use of a well?\' \'Take some more tea,\' the March Hare..', 'Modi dolore eius vel. Voluptas ratione ullam perferendis velit ab ducimus dolor. Aut laborum aut amet facilis quidem.', 25, 2, 16, 1, '1', NULL, '2017-06-04 08:48:51', '2017-06-04 08:49:01'),
	(111, 'Alice felt so desperate that she had forgotten the little door, had.', 'Delectus maxime voluptas quas expedita ut quo sed possimus. Natus fuga dicta recusandae voluptates consequatur. Perspiciatis ipsum est rerum non modi. Corporis voluptatem ipsam soluta eum aut.', 21, 3, 16, 1, '1', NULL, '2017-06-04 08:48:51', '2017-06-04 08:49:01'),
	(112, 'Alice dodged behind a great hurry; \'this paper has just been picked up.\'.', 'Magnam exercitationem sed odio dignissimos. Sint eos odio qui natus aspernatur illo impedit aut. Aspernatur velit qui esse ex.', 3, 15, 19, 1, '1', NULL, '2017-06-04 08:48:51', '2017-06-04 08:49:01'),
	(113, 'I do wonder what you\'re doing!\' cried Alice, quite forgetting in the pool.', 'Esse atque molestiae nam sunt saepe. Ab eligendi assumenda repellendus officiis eum omnis. Qui minima doloremque blanditiis rerum. Temporibus error occaecati et qui.', 13, 14, 20, 1, '1', NULL, '2017-06-04 08:48:51', '2017-06-04 08:49:02'),
	(114, 'Alice thought decidedly uncivil. \'But perhaps it was very glad to do it!.', 'Quam similique provident adipisci vel iusto quia. Aut quo quae autem excepturi. Et dolor nihil et unde nisi. Rem voluptatum vero et vel explicabo.', 24, 9, 17, 1, '1', NULL, '2017-06-04 08:48:51', '2017-06-04 08:49:02'),
	(115, 'Alice. \'And be quick about it,\' added the Hatter, \'when the Queen to play.', 'Est atque unde illo ratione labore hic aperiam. Voluptate eaque aut quam quaerat minus. Est enim doloremque fugiat velit dolorem beatae recusandae.', 26, 9, 8, 1, '1', NULL, '2017-06-04 08:48:51', '2017-06-04 08:49:02'),
	(116, 'My notion was that it made Alice quite jumped; but she knew that it was a.', 'Reiciendis minima dignissimos vitae non quasi. A animi accusantium deleniti suscipit quae.', 24, 22, 17, 1, '1', NULL, '2017-06-04 08:48:51', '2017-06-04 08:49:02'),
	(117, 'This speech caused a remarkable sensation among the trees upon her face..', 'Aliquid rerum eaque et ut quaerat sit. Adipisci enim iste reprehenderit molestiae. Ab aspernatur quas ullam necessitatibus reiciendis. Nobis aut incidunt illo porro est.', 25, 15, 8, 1, '1', NULL, '2017-06-04 08:48:51', '2017-06-04 08:49:02'),
	(118, 'When she got used to say.\' \'So he did, so he did,\' said the Queen said to.', 'Voluptas omnis fugit est iure. Sed expedita minus qui iste molestias.', 6, 26, 8, 1, '1', NULL, '2017-06-04 08:48:51', '2017-06-04 08:49:02'),
	(119, 'Duchess. An invitation for the next thing is, to get to,\' said the Pigeon.', 'Possimus molestias sit aut ipsa qui fugit. Aliquid distinctio molestiae autem nesciunt et ut consequuntur. Ut consequatur deleniti quia quae explicabo. Laudantium magni maxime natus ipsum.', 9, 23, 4, 1, '1', NULL, '2017-06-04 08:48:51', '2017-06-04 08:49:02'),
	(120, 'MARMALADE\', but to get very tired of swimming about here, O Mouse!\'.', 'A expedita et quae nulla minima culpa. Voluptates facilis vel quod vitae. Accusamus qui reiciendis omnis voluptatem repellat ut minima. Suscipit consequuntur facere laboriosam.', 1, 11, 14, 1, '1', NULL, '2017-06-04 08:48:51', '2017-06-04 08:49:02'),
	(121, 'Gryphon. \'We can do no more, whatever happens. What WILL become of you? I.', 'Nesciunt est quis quos. Nisi deleniti amet nobis consequatur sequi sed. Cum esse est rerum sapiente optio laudantium dolores.', 22, 24, 4, 1, '1', NULL, '2017-06-04 08:48:51', '2017-06-04 08:49:02'),
	(122, 'Queen of Hearts were seated on their slates, and then unrolled the.', 'Et debitis hic est officia nemo. Modi assumenda quis consequatur. Ut maxime aut vel. Et quos excepturi qui amet aperiam ab.', 3, 10, 18, 1, '1', NULL, '2017-06-04 08:48:51', '2017-06-04 08:49:02'),
	(123, 'By this time with the game,\' the Queen was to get in?\' asked Alice again,.', 'Dolore tenetur magni magni at non. Vel et accusamus dolorem unde. Optio quia est placeat asperiores accusantium harum. Labore sint quia et doloribus modi sit.', 25, 8, 5, 1, '1', NULL, '2017-06-04 08:48:51', '2017-06-04 08:49:02'),
	(124, 'White Rabbit, who said in a piteous tone. And she squeezed herself up on.', 'Neque molestias sed est libero quo error nostrum. Corrupti consequatur placeat asperiores. Nobis in quo ducimus ut. Ut enim sed aspernatur reiciendis aut.', 19, 1, 2, 1, '1', NULL, '2017-06-04 08:48:52', '2017-06-04 08:49:02'),
	(125, 'WHAT things?\' said the Caterpillar; and it put more simply--"Never.', 'Esse quisquam corrupti neque laudantium. Possimus non aut a cum. Minima velit ut et et repellendus. Sit eaque sint alias et.', 9, 22, 18, 1, '1', NULL, '2017-06-04 08:48:52', '2017-06-04 08:49:02'),
	(126, 'Alice coming. \'There\'s PLENTY of room!\' said Alice very meekly: \'I\'m.', 'Minima sint eius ex excepturi. Blanditiis ab aspernatur aut porro. Omnis adipisci quia vel eaque dolores quidem. Non quas eos autem.', 7, 6, 9, 1, '1', NULL, '2017-06-04 08:48:52', '2017-06-04 08:49:02'),
	(127, 'Caterpillar decidedly, and the other birds tittered audibly. \'What I was.', 'Velit laudantium expedita iure eveniet et omnis. Aspernatur saepe beatae voluptatum adipisci. Quia molestiae dolore nostrum. Est voluptatibus inventore atque.', 4, 17, 7, 1, '1', NULL, '2017-06-04 08:48:52', '2017-06-04 08:49:02'),
	(128, 'March Hare. \'Yes, please do!\' pleaded Alice. \'And be quick about it,\'.', 'Aut vitae mollitia molestiae et voluptatem minus molestiae officiis. Dignissimos neque voluptatibus aut adipisci veritatis sed. Accusantium vero voluptas perspiciatis labore a.', 11, 26, 15, 1, '1', NULL, '2017-06-04 08:48:52', '2017-06-04 08:49:02'),
	(129, 'Alice. \'You did,\' said the Dodo said, \'EVERYBODY has won, and all the.', 'Mollitia suscipit dolores sit assumenda. Est laboriosam molestiae neque assumenda amet nam. Enim dignissimos accusamus doloremque totam. Qui ratione similique architecto.', 18, 24, 8, 1, '1', NULL, '2017-06-04 08:48:52', '2017-06-04 08:49:02'),
	(130, 'YOU manage?\' Alice asked. The Hatter was the same words as before, \'It\'s.', 'A facilis est corrupti repellat. Fugit tempora consequuntur laborum nihil id. Rerum quidem qui quis omnis optio deleniti. Ab occaecati illo illum quia molestiae.', 26, 26, 10, 1, '1', NULL, '2017-06-04 08:48:52', '2017-06-04 08:49:03'),
	(131, 'And how odd the directions will look! ALICE\'S RIGHT FOOT, ESQ. HEARTHRUG,.', 'Occaecati reprehenderit ut optio libero ab omnis odit. Omnis cum quam veniam ut.\nOptio sit est aut omnis. Corrupti ut voluptatum commodi ipsum iusto. Molestias ut vel et repudiandae.', 14, 6, 3, 1, '1', NULL, '2017-06-04 08:48:52', '2017-06-04 08:49:03'),
	(132, 'Who ever saw one that size? Why, it fills the whole thing very absurd,.', 'Ex nulla odit nisi fuga. Odio rerum beatae vel est similique cupiditate pariatur. Iure consequatur debitis tempora eos odio. Voluptatem aut voluptatibus consectetur neque repellat nobis illum.', 2, 17, 16, 1, '1', NULL, '2017-06-04 08:48:52', '2017-06-04 08:49:03'),
	(133, 'Alice, they all spoke at once, and ran till she shook the house, and.', 'Omnis possimus et est fugiat illo quo. Omnis assumenda est beatae quam dolorem optio aut. Corporis quam libero doloribus et.', 22, 23, 12, 1, '1', NULL, '2017-06-04 08:48:52', '2017-06-04 08:49:03'),
	(134, 'YOU?\' Which brought them back again to the Gryphon. \'I mean, what makes.', 'Quia illum mollitia architecto eaque rerum et. Quia velit in nam. Error pariatur est necessitatibus aliquid alias.', 7, 6, 20, 1, '1', NULL, '2017-06-04 08:48:52', '2017-06-04 08:49:03'),
	(135, 'Gryphon. \'Then, you know,\' said Alice in a sulky tone; \'Seven jogged my.', 'Nam eius autem incidunt et recusandae. Ducimus similique exercitationem quis odit impedit harum quia. Sed voluptatem asperiores ut voluptas. Ea consequatur itaque esse amet voluptatum vero.', 7, 14, 12, 1, '1', NULL, '2017-06-04 08:48:52', '2017-06-04 08:49:03'),
	(136, 'And so she set off at once crowded round it, panting, and asking, \'But.', 'Delectus omnis provident laudantium dolores. Alias molestias ipsum ipsum pariatur necessitatibus qui. Enim aut velit nisi est aut deserunt.', 19, 16, 3, 1, '1', NULL, '2017-06-04 08:48:52', '2017-06-04 08:49:03'),
	(137, 'Dodo said, \'EVERYBODY has won, and all of you, and listen to me! When I.', 'Voluptatem dolores ipsa necessitatibus et maxime est. Sit voluptatibus qui nihil et alias. Est voluptas sunt nemo.', 12, 5, 19, 1, '1', NULL, '2017-06-04 08:48:52', '2017-06-04 08:49:03'),
	(138, 'The King looked anxiously round, to make ONE respectable person!\' Soon.', 'Numquam aut sunt quo maiores. Nihil non est dicta consequatur quos et impedit. Eos quia aliquid ut aut ab nihil. Fuga ut voluptatem nobis commodi facilis dolores dignissimos.', 11, 1, 17, 1, '1', NULL, '2017-06-04 08:48:52', '2017-06-04 08:49:03'),
	(139, 'She waited for a rabbit! I suppose Dinah\'ll be sending me on messages.', 'Quia excepturi soluta qui. Qui distinctio quia non et tenetur cum. Itaque dignissimos suscipit amet esse eos.', 21, 5, 20, 1, '1', NULL, '2017-06-04 08:48:52', '2017-06-04 08:49:03'),
	(140, 'Alice, \'I\'ve often seen them so often, of course had to double themselves.', 'Quo omnis esse rerum quaerat debitis modi fugiat. Porro repudiandae reiciendis culpa excepturi id nesciunt. Ut magnam quia rerum molestiae omnis. Dolorem tenetur expedita eos aut harum voluptas.', 19, 14, 6, 1, '1', NULL, '2017-06-04 08:48:52', '2017-06-04 08:49:03'),
	(141, 'Pigeon; \'but I must be growing small again.\' She got up and down looking.', 'Eaque minima et qui quis non voluptates quas. Corrupti sequi recusandae aliquid ut et id. Consequatur commodi est corporis provident quis sit.', 26, 21, 17, 1, '1', NULL, '2017-06-04 08:48:52', '2017-06-04 08:49:03'),
	(142, 'I should be like then?\' And she began looking at Alice the moment she.', 'Repudiandae omnis sit tenetur illum impedit corporis. Aut veniam dignissimos sit animi. Velit dignissimos quam excepturi dolor odit dolore facilis nesciunt.', 17, 5, 4, 1, '1', NULL, '2017-06-04 08:48:52', '2017-06-04 08:49:03'),
	(143, 'Said his father; \'don\'t give yourself airs! Do you think, at your age, it.', 'Dolor vitae consequuntur aperiam magnam veritatis voluptate similique. Aut harum rerum exercitationem ea. Unde enim dignissimos cupiditate magnam voluptas. Quia sunt saepe nulla quibusdam.', 15, 11, 11, 1, '1', NULL, '2017-06-04 08:48:52', '2017-06-04 08:49:03'),
	(144, 'They are waiting on the OUTSIDE.\' He unfolded the paper as he came, \'Oh!.', 'Illum iusto omnis delectus tenetur et blanditiis voluptatem. Quod illo illo consectetur et.', 19, 6, 12, 1, '1', NULL, '2017-06-04 08:48:52', '2017-06-04 08:49:03'),
	(145, 'Tortoise--\' \'Why did they draw the treacle from?\' \'You can draw water out.', 'Aut veniam nulla placeat dicta iusto. Porro perferendis vel rerum debitis. Enim consequatur nihil quam dolor sint possimus vitae.', 15, 15, 1, 1, '1', NULL, '2017-06-04 08:48:53', '2017-06-04 08:49:04'),
	(146, 'King, \'unless it was too slippery; and when she noticed that the Gryphon.', 'Officia non expedita corrupti. Cumque soluta sit et velit vero odit qui. Delectus nostrum reiciendis natus itaque. Sit est quis modi eveniet et minus porro.', 15, 1, 17, 1, '1', NULL, '2017-06-04 08:48:53', '2017-06-04 08:49:04'),
	(147, 'They all returned from him to be found: all she could guess, she was as.', 'Dolorum labore expedita fuga nulla neque ex. Ut vel natus eum sunt explicabo dolorem.', 4, 20, 20, 1, '1', NULL, '2017-06-04 08:48:53', '2017-06-04 08:49:04'),
	(148, 'Everything is so out-of-the-way down here, that I should like to have.', 'At numquam expedita corrupti officia. Dolor voluptatem cumque dignissimos quibusdam voluptatem et. Distinctio soluta eius qui culpa est est. Ipsa vero similique sed natus.', 1, 19, 13, 1, '1', NULL, '2017-06-04 08:48:53', '2017-06-04 08:49:04'),
	(149, 'CHAPTER XII. Alice\'s Evidence \'Here!\' cried Alice, quite forgetting in.', 'Quo recusandae quo non enim soluta eum. Quasi animi nobis quasi est sunt. Et ullam aliquid consequatur.', 6, 16, 4, 1, '1', NULL, '2017-06-04 08:48:53', '2017-06-04 08:49:04'),
	(150, 'Conqueror, whose cause was favoured by the hand, it hurried off, without.', 'Eius harum blanditiis hic harum delectus consequatur. Et sit et odit ratione ut. In debitis repellat qui et tempore quis eius odio.', 12, 19, 7, 1, '1', NULL, '2017-06-04 08:48:53', '2017-06-04 08:49:04');
/*!40000 ALTER TABLE `testimonials` ENABLE KEYS */;


-- Dumping structure for table occassions_pro_db.throttle
CREATE TABLE IF NOT EXISTS `throttle` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `throttle_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table occassions_pro_db.throttle: ~0 rows (approximately)
/*!40000 ALTER TABLE `throttle` DISABLE KEYS */;
INSERT INTO `throttle` (`id`, `user_id`, `type`, `ip`, `created_at`, `updated_at`) VALUES
	(1, NULL, 'global', NULL, '2017-06-04 08:50:34', '2017-06-04 08:50:34'),
	(2, NULL, 'ip', '127.0.0.1', '2017-06-04 08:50:34', '2017-06-04 08:50:34'),
	(3, 27, 'user', NULL, '2017-06-04 08:50:34', '2017-06-04 08:50:34'),
	(4, NULL, 'global', NULL, '2017-06-04 11:05:54', '2017-06-04 11:05:54'),
	(5, NULL, 'ip', '127.0.0.1', '2017-06-04 11:05:54', '2017-06-04 11:05:54'),
	(6, NULL, 'global', NULL, '2017-06-04 12:16:40', '2017-06-04 12:16:40'),
	(7, NULL, 'ip', '127.0.0.1', '2017-06-04 12:16:40', '2017-06-04 12:16:40');
/*!40000 ALTER TABLE `throttle` ENABLE KEYS */;


-- Dumping structure for table occassions_pro_db.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `last_login` timestamp NULL DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `uid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table occassions_pro_db.users: ~27 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `email`, `password`, `permissions`, `last_login`, `first_name`, `last_name`, `name`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `uid`) VALUES
	(1, 'kim@happyweekend.com', '$2y$10$KOJgqY68uHKUtz1FLjTftulaWfREZzeegF6Mt4jUyQpM/I7nJXV5e', NULL, '2017-06-04 11:32:15', 'Kim', 'Maravilla', 'Kim Maravilla', NULL, '2017-06-04 08:47:27', '2017-06-04 11:32:15', NULL, NULL),
	(2, 'lyra@happyweekend.com', '$2y$10$Sz4BlCxq5.dsOLvkazA5YOVpcjyhM1dPcmU9G1GaN1iP3Csv4FfrW', NULL, NULL, 'Lyra', 'Bona-og', 'Lyra Bona-og', NULL, '2017-06-04 08:47:27', '2017-06-04 08:47:27', NULL, NULL),
	(3, 'prince@happyweekend.com', '$2y$10$2fp/9QB/0GTtxV8L1I5oyOriGP/7spb2Bxzmdl0qYTnnRNAcq6wti', NULL, NULL, 'Prince', 'Gayares', 'Prince Gayares', NULL, '2017-06-04 08:47:28', '2017-06-04 08:47:28', NULL, NULL),
	(4, 'janina@happyweekend.com', '$2y$10$.DNwTWIwySM2UhNKhzw5aeYZ5QA8eSzGqqP8Xk81lMwMVuuGDyG3K', NULL, NULL, 'Janina', 'Diesta', 'Janina Diesta', NULL, '2017-06-04 08:47:28', '2017-06-04 08:47:28', NULL, NULL),
	(5, 'gidz@happyweekend.com', '$2y$10$nbKBvHqTLDgzccQliBjSJuNHdI0ptyGTYuG2j1824eH3VDDG/BpCG', NULL, NULL, 'Gidz', 'Rivas', 'Gidz Rivas', NULL, '2017-06-04 08:47:28', '2017-06-04 08:47:28', NULL, NULL),
	(6, 'admin@happyweekend.com', '$2y$10$yfnKwZl22qqfQgOIIvYqDO5xnZp5lAujUj8a6lI6wKQOs8/LwYesO', NULL, NULL, 'Admin', 'Admin', 'Admin Admin', NULL, '2017-06-04 08:47:29', '2017-06-04 08:47:29', NULL, NULL),
	(7, 'developer@happyweekend.com', '$2y$10$5yymyCHJ6Fj.UScqUwdKfOrdBS82waavAL/4.7JeY3hLJOqPOaMo6', NULL, NULL, 'Happy', 'Developer', 'Happy Developer', NULL, '2017-06-04 08:47:29', '2017-06-04 08:47:29', NULL, NULL),
	(8, 'rgreenfelder@example.org', '$2y$10$vKL/CRYMrP3MA3FG/YhUHOKc83KNdUAZ1QOhkO9x54Gb8Bz/fSspW', '{"client":true}', NULL, 'Bertram', 'Kris', 'Anabel Walter', NULL, '2017-06-04 08:47:31', '2017-06-04 08:47:31', NULL, 'QEKMdynbRnX8WAZqN2w0'),
	(9, 'alessandra34@example.org', '$2y$10$E6VARxadBjqIgVhK23xwDeowV4YK8mHV8rbb9ysCOPKUs8tMdVOMK', '{"client":true}', NULL, 'Birdie', 'Beatty', 'Bradly Bernhard', NULL, '2017-06-04 08:47:32', '2017-06-04 08:47:32', NULL, 'KOEAw6kb8OBJ2VW0P5GX'),
	(10, 'beatty.hester@example.net', '$2y$10$.V6fZnHCSUVOi5I/ltMEbOIo4d/iJBJNT/ryIUyKGk.eeqBsx6xeu', '{"professional":true}', NULL, 'Dallas', 'Weimann', 'Diamond Koss', NULL, '2017-06-04 08:47:32', '2017-06-04 08:47:32', NULL, 'Abag3qmYJm1JpxKeGkNE'),
	(11, 'schowalter.della@example.org', '$2y$10$bKlMbKi0NCZNJXfAVs2vCucEF4jZilVus6oIB/A1h5L7r6/taJJG.', '{"client":true}', NULL, 'Alison', 'O\'Kon', 'Lenora Lindgren', NULL, '2017-06-04 08:47:32', '2017-06-04 08:47:32', NULL, 'vxyKp0AEJP0JZq7mdgjD'),
	(12, 'bschmidt@example.org', '$2y$10$uYHLVcQ6xdbjWPu4fYOmN.5MuV7oaFFzQsQCAh5uSUWk.BFoaXmu6', '{"professional":true}', NULL, 'Krystina', 'McLaughlin', 'Skylar Rempel', NULL, '2017-06-04 08:47:32', '2017-06-04 08:47:32', NULL, 'YnVwe1W780VRyPmZGq34'),
	(13, 'elvie06@example.net', '$2y$10$uoNp7IiuLZ.I9pUG.L3.JO9vo1ZD0VmgRK4j4xA9hnzun.K86Qs/W', '{"client":true}', NULL, 'Lynn', 'Mayert', 'Jeff Barrows', NULL, '2017-06-04 08:47:32', '2017-06-04 08:47:32', NULL, 'ExmLaWqgJV38K0YAdZbp'),
	(14, 'corkery.mable@example.net', '$2y$10$oH.DY7gnvE1tilCEOdr3wOoazrYq0d4rzOQbaGiWCtRtuUDqhWHdu', '{"client":true}', NULL, 'Juliana', 'Renner', 'Fannie Erdman', NULL, '2017-06-04 08:47:32', '2017-06-04 08:47:32', NULL, 'rZyd45pLlWEJ7kXzVv3m'),
	(15, 'candida.white@example.net', '$2y$10$Hs5W/SCG4n8obvecdekFPeEICM2eD3PqpDwciMONjuzaHKc7X7BU2', '{"client":true}', NULL, 'Taurean', 'Simonis', 'Princess Kassulke', NULL, '2017-06-04 08:47:32', '2017-06-04 08:47:32', NULL, '0p1QYeN989q8LoAEbPaO'),
	(16, 'jacobs.bradford@example.com', '$2y$10$AruOPf2YmgRX4XYrEc0kne27oti.lCdssXuYvgdtptEK2Qs6WXu3C', '{"client":true}', NULL, 'Freddy', 'Hermann', 'Glenna Schneider', NULL, '2017-06-04 08:47:32', '2017-06-04 08:47:32', NULL, 'aE5XZ9pdJKGJzOKNLeVo'),
	(17, 'macey10@example.org', '$2y$10$42Wfog3WxeNL84Ejj8s8aO8GeGnRAP/SYpVZPCP87PsZv3hk9Zmpa', '{"client":true}', NULL, 'Favian', 'Collins', 'Litzy Bogan', NULL, '2017-06-04 08:47:32', '2017-06-04 08:47:32', NULL, '2dqQzKnZRQDl0AOg6vGw'),
	(18, 'isadore.wilderman@example.com', '$2y$10$bX7As1zDlVRXOczCRktj5eDJMxhmlWOJmpi/nnz2ADdJq3WcX8ZxC', '{"client":true}', NULL, 'Arden', 'Schumm', 'Marilyne Mohr', NULL, '2017-06-04 08:47:32', '2017-06-04 08:47:32', NULL, 'W6rjG7PKR4olMm3O49Bb'),
	(19, 'bahringer.vernon@example.org', '$2y$10$hn4BSZqjOhp0DlcAvStAH.0S8OmLDVatJoNnDjt/hxqaapLeCXkRK', '{"client":true}', NULL, 'Mathew', 'Jacobson', 'Vanessa Waelchi', NULL, '2017-06-04 08:47:32', '2017-06-04 08:47:32', NULL, '5mj3OaVAJxdJo0M67wGd'),
	(20, 'dianna.kohler@example.org', '$2y$10$vEj7..LgVoJTLO0IZxW/hOkVfctm2N/fThiGrNe6NQgKn.wIgJEsy', '{"client":true}', NULL, 'Melisa', 'Berge', 'Myra Stark', NULL, '2017-06-04 08:47:32', '2017-06-04 08:47:32', NULL, 'Kdqy5koYlE1lnQEMO4bw'),
	(21, 'leuschke.mona@example.net', '$2y$10$MftMJVYuc8/BwteXFVGEP.AHrXtgyldZ40/20JYUvNBwK2AaWPU5e', '{"client":true}', NULL, 'Rocky', 'Labadie', 'Cedrick Schiller', NULL, '2017-06-04 08:47:33', '2017-06-04 08:47:33', NULL, 'j4DeXxYLlp6Jp1k5mKo6'),
	(22, 'kiehn.ramon@example.com', '$2y$10$AoMDsPBaSkQozyW8kMR8ROAgnjQpAEPQmaLcPMqiIw4v/0ay6Wx9O', '{"client":true}', NULL, 'Amina', 'Carroll', 'Terrence Kiehn', NULL, '2017-06-04 08:47:33', '2017-06-04 08:47:33', NULL, 'x3OMYWAb8vyJEv9G14rm'),
	(23, 'lempi.parisian@example.org', '$2y$10$PS8V4EXzLGhHRTFp7wflj.7exnuyOwWrt3Sx5pU2LgjDbNVsWp8RC', '{"client":true}', NULL, 'Kenna', 'Dietrich', 'Ewell Kub', NULL, '2017-06-04 08:47:33', '2017-06-04 08:47:33', NULL, 'GKpbM0ZoRoZljBrexN54'),
	(24, 'alek.cremin@example.net', '$2y$10$/V4pTWpclbXXQQLas8uIo.1aomn1H2SJFwz75wMbFaeM1ss/DxcqC', '{"client":true}', NULL, 'Ebony', 'Considine', 'Daphney Beier', NULL, '2017-06-04 08:47:33', '2017-06-04 08:47:33', NULL, '67rdmPNylex8xk3gY924'),
	(25, 'vergie30@example.net', '$2y$10$GHw8Xpl9gLYVPfi4grIwlOvDB.HTCZ/qDt6sQLwjk2q933ejYwh2O', '{"client":true}', NULL, 'Ephraim', 'Doyle', 'Hudson Thompson', NULL, '2017-06-04 08:47:33', '2017-06-04 08:47:33', NULL, 'W4KqZMQnlDG89YpaxX7d'),
	(26, 'runolfsson.imani@example.com', '$2y$10$1jC8gkXDt9IVf3wJt/d1U.YIQA/6rDLmhPC.fEDy0NLuqYIuFmkzW', '{"client":true}', NULL, 'Anderson', 'Kuphal', 'Osvaldo Hirthe', NULL, '2017-06-04 08:47:33', '2017-06-04 08:47:33', NULL, 'G6aKLk3WlGDRPM5wV1gN'),
	(27, 'marjorie04@example.net', '$2y$10$Hb1H8a9nRDvXkgvrq4eJd.fB8/pfY6ACQw4rd5xb6papMtkqgUFHu', '{"professional":true}', '2017-06-04 08:50:37', 'Stan', 'Metz', 'Elwyn Becker', NULL, '2017-06-04 08:47:33', '2017-06-04 08:50:37', NULL, 'OpKjmM9Q81KRoD54BV1n'),
	(28, 'kimluari+92@gmail.com', '$2y$10$dQLXbBCU2ZeyhJQW1VCqVeeylHHS/ysCa/oLmH78SYL2lM/ARhjj2', '{"professional":true}', '2017-06-04 13:10:37', 'Kim', 'Maravilla', 'Kim Maravilla', NULL, '2017-06-04 10:50:15', '2017-06-04 13:10:37', NULL, NULL),
	(29, 'lyrajane+93@gmail.com', '$2y$10$opfAjNLCoodvC0whleY8pO7iSEUnBPWVR0Pd8J1vyhb5FKnjPfP0.', '{"client":true}', '2017-06-04 11:34:08', 'Lyra', 'Bonaog', 'Lyra Bonaog', NULL, '2017-06-04 10:51:06', '2017-06-04 11:34:08', NULL, NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;


-- Dumping structure for table occassions_pro_db.user_membership
CREATE TABLE IF NOT EXISTS `user_membership` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `options` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table occassions_pro_db.user_membership: ~0 rows (approximately)
/*!40000 ALTER TABLE `user_membership` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_membership` ENABLE KEYS */;


-- Dumping structure for table occassions_pro_db.user_settings
CREATE TABLE IF NOT EXISTS `user_settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table occassions_pro_db.user_settings: ~0 rows (approximately)
/*!40000 ALTER TABLE `user_settings` DISABLE KEYS */;
INSERT INTO `user_settings` (`id`, `user_id`, `type`, `name`, `value`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 28, 'notification_settings', 'receive_important_account_alerts', '1', '2017-06-04 10:50:15', '2017-06-04 11:29:35', NULL),
	(2, 28, 'notification_settings', 'receive_lead_and_booking_alers', '1', '2017-06-04 10:50:15', '2017-06-04 11:29:35', NULL),
	(3, 28, 'notification_settings', 'receive_notifications_for_new_clients', '1', '2017-06-04 10:50:15', '2017-06-04 11:29:35', NULL),
	(4, 28, 'notification_settings', 'receiving_email', 'kimluari+92@gmail.com', '2017-06-04 10:50:16', '2017-06-04 11:29:35', NULL);
/*!40000 ALTER TABLE `user_settings` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
