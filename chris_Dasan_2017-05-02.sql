# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.17)
# Database: chris_Dasan
# Generation Time: 2017-05-02 08:47:54 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table banners
# ------------------------------------------------------------

DROP TABLE IF EXISTS `banners`;

CREATE TABLE `banners` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bgImg` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;

INSERT INTO `categories` (`id`, `name`, `description`, `order`, `created_at`, `updated_at`)
VALUES
	(1,'Toilet Rolls','Regular / Premium / Jumbo rolls imported from South Korea',1,'2017-05-02 12:52:44','2017-05-02 12:52:44'),
	(2,'Tissue Products','Hand Towel / Table Napkins / Facial Tissue / Travel Tissue / Wet Tissue / Wiper Towel imported from South Korea.\r\n\r\nAll products are in high in quality and eco-friendly.',2,'2017-05-02 12:54:20','2017-05-02 12:54:20'),
	(3,'Dispensers','Dispensers for :\r\n* Jumbo Rolls\r\n* Hand Towel\r\n* Napkins\r\n* Hand Cleaner\r\n\r\nPurchase dispensers with our products to get special deals!',3,'2017-05-02 12:55:43','2017-05-02 12:55:43'),
	(4,'Dishwash','We have dishwashing liquid in various sizes.\r\nAll products are imported and made in South Korea.',4,'2017-05-02 12:57:16','2017-05-02 12:57:16'),
	(5,'Handwash','Our hand cleaners are all eco-friendly and made in South Korea.',5,'2017-05-02 12:58:57','2017-05-02 12:58:57'),
	(6,'Cleaning','We have various types of cleaning products from disinfectant, bleach, degreaser, and etc.',6,'2017-05-02 13:00:14','2017-05-02 13:00:14'),
	(7,'Laundry','We have eco-friendly laundry products.',7,'2017-05-02 13:00:51','2017-05-02 13:00:51'),
	(8,'Coffee','We import instant coffee mixes from South Korea.\r\n\r\nOnce you try these, you can never go back!',8,'2017-05-02 14:05:26','2017-05-02 14:05:31'),
	(9,'New','We are importing various types of products from South Korea.\r\n\r\nHere are some items we have imported recently.',9,'2017-05-02 13:02:49','2017-05-02 14:05:40');

/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table comments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(146,'2014_10_12_000000_create_users_table',1),
	(147,'2014_10_12_100000_create_password_resets_table',1),
	(148,'2017_04_03_014616_create_categories_table',1),
	(149,'2017_04_03_015020_create_products_table',1),
	(150,'2017_04_03_015851_create_comments_table',1),
	(151,'2017_04_03_020115_create_ratings_table',1),
	(152,'2017_04_03_022401_create_banners_table',1);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `minimum` int(11) NOT NULL DEFAULT '1',
  `order` int(11) NOT NULL DEFAULT '0',
  `isTopProduct` tinyint(1) NOT NULL DEFAULT '0',
  `tpOrder` int(11) NOT NULL DEFAULT '0',
  `rating` int(11) NOT NULL DEFAULT '5',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `img`, `price`, `minimum`, `order`, `isTopProduct`, `tpOrder`, `rating`, `created_at`, `updated_at`)
VALUES
	(1,1,'Jumbo Rolls','16 rolls, 2 ply, 300 m\r\nEmbossed\r\nBiodegradable\r\nEco-friendly\r\nMade in Korea','jumboroll-228x228.png',91.99,1,1,1,0,5,'2017-05-02 13:05:58','2017-05-02 13:05:58'),
	(2,1,'Premium Toilet Paper','72 rolls, 3 ply, 30m\r\nJasmine fragrance\r\nPremium quality\r\nEco-friedndly\r\nMade in Korea','premiumToiletPaper-228x228.png',88.99,1,2,1,0,5,'2017-05-02 13:06:53','2017-05-02 13:06:53'),
	(3,1,'Regular Toilet Paper','90 rolls, 3 ply, 27m\r\nJasmine fragrance\r\nEco-friendly\r\nMade in Korea','toiletPaper-228x228.png',68.99,1,3,1,0,5,'2017-05-02 13:07:55','2017-05-02 13:07:55'),
	(4,2,'Hand Towel','5000 sheets per carton\r\n2 ply\r\n100% pulp\r\nV-folded\r\n200mm * 210mm\r\nSoft and high absorbsive\r\nEco-friendly\r\nMade in Korea','handtowel1-228x228.jpg',78.99,1,1,1,0,5,'2017-05-02 13:08:43','2017-05-02 13:08:43'),
	(5,2,'Table Napkin','6,000 sheets per carton\r\nPull-out table napkin\r\n100% pulp\r\nSize: 215mm x 105mm\r\nEmbossed\r\nEco-friendly\r\nMade in Korea','tablenapkin-228x228.png',48.99,1,2,1,0,5,'2017-05-02 13:09:52','2017-05-02 13:09:52'),
	(6,2,'Facial Tissue','3 packs, 280 sheets, 2 ply\r\n100% pulp\r\nEco-friendly\r\nMade in Korea','face tissue-228x228.png',14.99,1,3,0,0,5,'2017-05-02 13:10:54','2017-05-02 13:10:54'),
	(7,2,'Travel Tissue','56 sheets\r\n100% pulp\r\nSoft\r\nVery convenient for carrying in bags or cars\r\nGreat gift idea or promotion item for your business\r\nMade Korea','travel tissues-228x228.png',1.99,1,4,0,0,5,'2017-05-02 13:11:38','2017-05-02 13:11:38'),
	(8,2,'Wet Tissue','20 sheets\r\n100% natural\r\nContains aloe vera extract\r\nContains green tea extract\r\nLess irritation\r\nMade in Korea','nature tissue-228x228.png',1.99,1,5,0,0,5,'2017-05-02 13:12:30','2017-05-02 13:12:30'),
	(9,2,'Wiper Towel','152 sheets\r\n320 mm * 350 mm\r\nUsed for wiping kitchen table, dishes, windows, stainless steel, exercise equipment and etc.\r\nCan be reuseable\r\nGood absorption\r\nEco-friendly\r\nMade in Korea','R120x120[4]-228x228.jpg',51.99,1,6,0,0,5,'2017-05-02 13:22:18','2017-05-02 13:22:18'),
	(10,3,'Jumbo Roll Dispenser','Screws and a key included','jumborolldispenser-228x228.jpg',21.99,1,1,1,0,5,'2017-05-02 13:23:30','2017-05-02 13:23:30'),
	(11,3,'Hand Towel Dispenser','Screws included\r\nKeyless design','handtowelNEW-228x228.jpg',24.99,1,2,0,0,5,'2017-05-02 13:24:23','2017-05-02 13:25:27'),
	(12,3,'Napkin Dispenser','Size: 12 mm * 12.5 mm * 12.5 mm\r\nMaterial: Plastic\r\nHolds about 100 sheets of table napkin\r\nMade in Korea','tablenapkindispenser-228x228.jpg',5.99,5,3,0,0,5,'2017-05-02 13:25:04','2017-05-02 13:26:46'),
	(13,3,'Hand Cleaner Dispenser','For liquid type only','handcleanerdispenser-228x228.jpg',24.99,1,4,0,0,5,'2017-05-02 13:27:31','2017-05-02 13:27:31'),
	(14,4,'Dishwashing Liquid 13kg','13 kg\r\nEco-friendly \r\nContaining natural ingredients\r\nCooking untensils washed\r\nHand and skin protection ingredients\r\nMade in Korea','dishwashing liquid refill 13kg hq-228x228.jpg',34.99,1,1,0,0,5,'2017-05-02 13:29:27','2017-05-02 13:29:27'),
	(15,4,'Dishwashing Liquid Pump 1kg','100% natural\r\nEco-friendly\r\nMade in Korea','dishwashing liquid pump-228x228.jpg',7.99,1,2,1,0,5,'2017-05-02 13:30:10','2017-05-02 13:30:10'),
	(16,4,'Dishwashing Liquid Pouch 1kg','100% natural\r\nEco-friendly\r\nMade in Korea','dishwashing liquid refill pouch-228x228.jpg',6.99,1,4,0,0,5,'2017-05-02 13:31:53','2017-05-02 13:32:12'),
	(17,4,'Automatic Dishwashing Liquid','13 kg\r\nCommercial grade\r\nEco-friendly\r\nMade in Korea','automatic dishwashing liquid-228x228.jpg',45.99,1,4,0,0,5,'2017-05-02 13:33:40','2017-05-02 13:33:40'),
	(18,4,'Automatic Dishwashing Rinse','13 kg\r\nCommercial grade\r\nEco-friendly\r\nMade in Korea','automatic dishwashing rinse-228x228.jpg',45.99,1,5,0,0,5,'2017-05-02 13:41:21','2017-05-02 13:41:21'),
	(19,5,'Hand Cleaner','13 kg\r\nNatural fragrance\r\nEco-friendly\r\nMade in Korea','hand wash 13-228x228.jpg',51.99,1,1,1,0,5,'2017-05-02 13:42:05','2017-05-02 13:42:05'),
	(20,5,'Hand Cleaner Pump','380 ml\r\nPump type\r\nCan be refilled\r\nNatural fragrance\r\nEco-friendly\r\nMade in Korea','shairin-228x228.jpg',5.99,1,2,1,0,5,'2017-05-02 13:42:50','2017-05-02 13:42:50'),
	(21,6,'Disinfectant Cleaner','All Kleen Spice Disinfectant is an Economical Neutral Cleaner & Disinfectant with proven Germ Killing ability. Free rinsing with a long lasting fragrance, kills all bacteria at a concentration above 1:50. Excellent for use in Restrooms, toilets, changing rooms, hospitals and any other area where disinfection and deodorisation is required.\r\n\r\n* 5 L\r\n* 4 bottles per carton','Advance-All-Kleen-Spice-5L-P485-228x228.jpg',24.99,1,1,0,0,5,'2017-05-02 13:44:23','2017-05-02 13:44:23'),
	(22,6,'Liquid Bleach','* 5 L\r\nLiquid Bleach Disinfectant Cleaner suitable for a wide range of cleaning tasks. Excellent for use on Mould and Mildew. Suitable for brightening white fabrics only.','Advance-Liquid-Bleach-5L-P995-228x228.jpg',17.99,1,2,0,0,5,'2017-05-02 13:45:28','2017-05-02 13:45:28'),
	(23,6,'Masterstroke Spray & Wipe Multipurpose Cleaner','* 5 L\r\nMasterstroke is a spray and wipe cleaner that can be used on any hard surface. Cleans and leaves behind pleasant odour. Suitable for use on showers, walls, floor and greasy surfaces.','Advance-Masterstroke-5L-P285-228x228.jpg',29.99,1,3,0,0,5,'2017-05-02 13:47:19','2017-05-02 13:47:19'),
	(24,6,'Strike Force Degreaser','Strike Force Cleaner Degreaser – Industrial Strength Cleaner Degreaser. Strikeforce is an instant action heavy duty floor and general purpose cleaner and degreaser, formulated to attack the dirtiest industrial and institutional cleaning jobs with minimal surface scrubbing or manual effort. Its high-powered, super-concentrated formula dissolves and floats away grease, oil, fats, food spillage, nicotine stains, floor polishes and waxes. Can be applied as a spray and wipe or with a mop or scrubber. NZFSA Approved C31 (all animal product except dairy).\r\n\r\n*5 L','Advance-Strike-Force-5L-P1105-228x228.jpg',39.99,1,4,0,0,5,'2017-05-02 13:49:12','2017-05-02 13:49:12'),
	(25,6,'Ranger Heavy Duty Oven Grill Cleaner 5 L','Ranger Oven and Range Cleaner is excellent in removing tough baked on residue. It is suitable for use on ovens, grills and range hoods. For even better results, heat thece before application.\r\n\r\n* 5 L','Advance-Ranger-5L-P135-228x228.jpg',34.99,1,5,0,0,5,'2017-05-02 13:50:09','2017-05-02 13:50:09'),
	(26,7,'Laundry Powder','Can be used for both top and front loader washing machine\r\nCan be also used with cold water\r\nKills 99% germs\r\nContains natural baking soda\r\nEco-friendly\r\nMade in Korea','DETERGENT-228x228.jpg',27.99,1,1,0,0,5,'2017-05-02 13:51:59','2017-05-02 13:51:59'),
	(27,7,'Fabric Softner 2.1 kg','Natural fragrance\r\nSoftens clothes\r\nGentle on skin\r\nEco-friendly\r\nMade in Korea','fabricsoftner-228x228.jpg',6.99,1,2,0,0,5,'2017-05-02 13:52:34','2017-05-02 13:52:34'),
	(28,9,'Foot Pressure seesaw','- Cardio and exercises lower body.\r\n\r\n- Good for blood circulation\r\n\r\n- Increases and balances the daily health status\r\n\r\n- Decreases lethargy and nausea.\r\n\r\n- Made in korea','footseesaw-228x228.jpg',190.00,1,1,1,0,5,'2017-05-02 13:53:38','2017-05-02 13:53:38'),
	(29,9,'Moami - Pelvic press chair','Adjusts pelvic bone\r\nStrengthens waist\r\nPostpartum exercise\r\nMakes pretty hips and narrows pelvic bone\r\nThe wing of the chair gathers hips and legs\r\nCan be used as a general chair\r\nDimension : (W) 550mm x (L) 395mm x (H) 650mm\r\nDo not use over 80Kg\r\nMade in Korea ( A patent article  )','IMG_2024--웹-228x228.jpg',350.00,1,2,0,0,5,'2017-05-02 13:54:55','2017-05-02 13:54:55'),
	(30,8,'Mocha Mix Coffee','100 pcs\r\n12 g\r\nBest quality all in one coffee mix (including milk and sugar)\r\nSweetness can be adjusted by adding more or less water\r\nEasy preparation - only hot water needed','Mocha coffee mix-228x228.PNG',25.99,1,1,1,0,5,'2017-05-02 14:08:40','2017-05-02 14:16:14'),
	(31,8,'Mocha Mix Coffee (10pcs)','10 pcs\r\n12 g\r\nBest quality all in one coffee mix (including milk and sugar)\r\nSweetness can be adjusted by adding more or less water\r\nEasy preparation - only hot water needed','mocha10-228x228.PNG',6.99,1,2,0,0,5,'2017-05-02 15:35:07','2017-05-02 15:35:07');

/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ratings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ratings`;

CREATE TABLE `ratings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ratings` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `mobile` int(11) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isSubscribed` tinyint(1) NOT NULL DEFAULT '0',
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `first_name`, `last_name`, `address`, `phone`, `mobile`, `email`, `isSubscribed`, `isAdmin`, `password`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'Admin','Admin','185 Waihoehoe Road Drury Auckland',211543033,272460125,'admin@dasanholdings.com',0,1,'$2y$10$BG4KoVSAlw1X2.iKxXojDuW1y7wAyTve4yIN6M4EqJ8xOUEZxEeGq',NULL,'2017-05-02 12:51:33','2017-05-02 12:51:33');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
