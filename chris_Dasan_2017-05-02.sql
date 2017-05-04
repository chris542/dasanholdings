-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 04, 2017 at 03:29 PM
-- Server version: 5.6.35-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chris_Doodle`
--
CREATE DATABASE IF NOT EXISTS `chris_Doodle` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `chris_Doodle`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` tinyint(4) NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `status`) VALUES
(1, 'Doodle', 'true'),
(2, 'Digital Paint', 'true'),
(3, 'Manga', 'true'),
(4, 'Concept Sketch', 'true'),
(5, 'Illustration', 'true'),
(6, 'Tutorial', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` tinyint(4) NOT NULL,
  `user_id` tinyint(4) NOT NULL,
  `date` datetime NOT NULL,
  `thread_id` tinyint(4) NOT NULL,
  `comments` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `user_id`, `date`, `thread_id`, `comments`) VALUES
(1, 6, '2016-12-19 12:12:31', 10, '!!!'),
(2, 6, '2016-12-19 13:25:00', 10, 'This is awesome!'),
(5, 2, '2016-12-19 13:46:19', 10, 'wow!'),
(6, 2, '2016-12-22 20:13:22', 1, 'Please everyone vote this post!!'),
(7, 5, '2016-12-22 20:18:22', 5, 'Awesome!'),
(8, 5, '2016-12-22 20:18:35', 4, 'haha'),
(9, 5, '2016-12-22 20:18:49', 6, 'Looks delicious! :D'),
(10, 6, '2017-01-05 14:46:06', 6, 'awesome!'),
(11, 3, '2017-01-11 12:17:51', 2, 'This is brilliant!'),
(12, 3, '2017-01-11 12:17:59', 9, 'Love it!'),
(13, 3, '2017-01-11 12:18:07', 6, 'Thank you guys~'),
(14, 3, '2017-01-11 12:18:23', 15, 'Cool!'),
(15, 3, '2017-01-11 12:18:39', 10, 'This is amazing!'),
(16, 2, '2017-01-11 12:19:01', 3, 'Nice!'),
(17, 2, '2017-01-11 12:19:15', 14, 'Did you draw this or is it a screenshot?'),
(18, 2, '2017-01-11 12:19:30', 16, 'Good depth of field!'),
(19, 2, '2017-01-11 12:19:38', 7, 'Niceeee'),
(20, 2, '2017-01-11 12:19:58', 17, 'I vote for this!! Go Go'),
(21, 3, '2017-01-11 14:14:52', 24, 'Wow thank you~'),
(22, 5, '2017-01-16 08:19:09', 10, 'Thanks guys'),
(23, 6, '2017-01-16 08:21:09', 25, 'Great job'),
(24, 6, '2017-01-16 08:57:39', 12, 'Heidi thats good work!'),
(25, 5, '2017-01-20 09:38:53', 13, 'haha! ha..'),
(26, 3, '2017-01-20 17:02:45', 4, 'Awesome!'),
(27, 14, '2017-01-25 14:59:44', 17, 'roar!'),
(28, 19, '2017-02-12 19:38:03', 8, 'nice threads');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `thread_ID` mediumint(9) NOT NULL,
  `category_ID` tinyint(4) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `user_ID` tinyint(4) NOT NULL,
  `status` varchar(10) NOT NULL,
  `votes` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`thread_ID`, `category_ID`, `title`, `image`, `description`, `user_ID`, `status`, `votes`) VALUES
(2, 5, 'Final project', '5_2_8f723a9a5885594f866874dbca3591b5.jpg', 'Hi all,\r\n\r\nI happen to finish this project for my gallery art show project.\r\n\r\nFeel free to vote me up!!\r\n\r\nPEACE!', 5, 'true', 5),
(3, 2, 'Good day', '4_2be4c25b2c1df622c65df758ab7c4122.jpg', 'No description', 4, 'true', 6),
(4, 4, 'Hmmmm', '4_3e9e61f18d9282469bd45d7d2b678aa3.jpg', 'This is sometimes what I do..\r\n\r\n\r\nHMMMmm...', 4, 'true', 4),
(5, 4, 'Cowboy', '6_9c5fdc37e9a0e297c586c9b84fd1f36a.jpg', 'Bang bang bangggg!!', 6, 'true', 6),
(6, 5, 'Hamburger', '3_19dc3d3f392a57378c55c32e3ef7574e.jpg', 'Yum!', 3, 'true', 6),
(7, 5, 'Digital Illustration!', '3_35bb5e57db0be6bf089e59be91bea099.jpg', 'Hi guys~\r\n\r\nplease vote my work!!', 3, 'true', 3),
(10, 4, '30min paint', '5_51eb7538ada08de3d42cbef209d05d81.jpg', 'Just a quick sketch\r\n\r\nTHANKS!', 5, 'true', 3),
(11, 1, '10 min doodle', '5_277bc2d3106fb56f4e46abbc2dba9eaa.jpg', 'Quck sketch', 5, 'true', 2),
(12, 3, 'A blue haired girl!!!!', '3_304a4ab832136eda3f39537c76318884.jpg', 'What do you guys think?\r\n\r\nIf you like this image!! please vote for this!!', 3, 'true', 7),
(15, 1, 'Series of backgrounds', '5_1451c48f4cd84e43dac27c27f8e36b8a.jpg', 'I hope you guys like it!', 5, 'true', 5),
(16, 1, '5 min doodling!', '5_5357842d632b26e0b4f762cd830a5b12.jpg', 'Just a doodle!', 5, 'true', 2),
(17, 5, 'Lion the Lion', '3_d6fc527cf7b8000cc45e97fc04f0dcec.jpg', 'Hi guys,\r\n\r\nJust finished my final design for Lionnnn\r\n\r\n\r\nThank you', 3, 'true', 3),
(18, 4, 'Concept Sketch', '4_69209dc08a7254c2732f48b070e7c1c8.jpg', 'Hi All,\r\n\r\nHope you all like it', 4, 'true', 4),
(19, 4, 'Womarrior', '4_bcae31b362c9aa4241c4a3dcd71175bf.jpg', 'hah!', 4, 'true', 5),
(21, 5, 'Girl with sunglasses', '6_a9e818115a12682a2a59ad3812376b94.jpg', 'It took a few hours to finish this but it&#39;s worth it!', 6, 'true', 2),
(22, 2, 'Speed painting', '4_Speed_paint_by_ZurdoM.jpg', 'I enjoyed it\r\nHope you enjoy it also', 4, 'true', 3),
(23, 6, 'Just a quick tip on eyes', '6_How-to-Draw-an-EYE-8.jpg', 'This is how I usually draw eyes for real-life drawing.\r\n\r\nHope to see how others draw too!\r\n\r\nYAY', 6, 'true', 2),
(24, 6, 'How to draw heads in different perspective', '6_how_to_draw_the_human_head_10.jpg', 'Just keep practicing!', 6, 'true', 3),
(25, 3, 'I love this girl', '5_Chitanda_Eru_by_TempestDH.png', 'YAY\r\n\r\nThis is my new painting i did over the holiday', 5, 'true', 2),
(26, 3, 'Cute Girl', '4_mirai_kuriyama_by_nebwei.png', 'This is a new cute girl i drew', 4, 'true', 1),
(27, 3, 'Fairy Tale sketch', '12_Fairy_Tail_-_Sting_The_White_Shadow_Dragon_by_Advance996.jpg', 'I just did this for fun', 12, 'true', 2),
(28, 5, 'foodie', '19_raspberry.jpg', 'its a raspberry', 19, 'true', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` tinyint(4) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `email` varchar(200) NOT NULL,
  `avatar` varchar(300) NOT NULL,
  `privilege` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `first_name`, `last_name`, `password`, `email`, `avatar`, `privilege`) VALUES
(1, 'admin', 'Admin', ':)', '$2y$10$cvIM/TPx5jMbhHpYfUK9ie2D6UkWJqiAuuiM5.cVuriYHzkJgRm.m', 'admin@doodle.com', 'default.jpg', 1),
(3, 'heidi', 'Heidi', 'Duxfield', '$2y$10$O61lXEdwPtKBWD4qsN.bqOTYRgptGWqyl64zGAnm98PlEIlXI92LG', 'heidi@gmail.com', 'heids.jpg', 0),
(4, 'kevin', 'Kevin', 'Dowd', '$2y$10$pyoI8vVTSKUWG9ZimNfASuhikj0OQ1lEAKzJkvNnNQYGnr84lccV.', 'kevin@gmail.com', 'slide1.jpg', 0),
(5, 'robert', 'Robert', 'La', '$2y$10$l72W0z.iQOab.i1fqMJeC.dgjYUgctYILnq0zFOm613sbdsyuO0KC', 'robby@gmail.com', 'robert.jpg', 0),
(6, 'chris', 'Chris', 'Kang', '$2y$10$fjATJCb48dEVFHE2BBUBKOjkpJdt0OAcCLDSOg.6/Mfn1R2WsrYS6', 'chris542@hotmail.com', '7E4400E9-C406-41C2-8F83-CF43E3258EB7.PNG', 0),
(12, 'jacob', 'Jacob', 'Han', '$2y$10$33q8zZ0yAD4Z1FlgWH.ZWeVeXjvKIigDLk2T.GGownjtFGJWjtsIG', 'jacob.han@gmail.com', 'default.jpg', 0),
(14, 'seagull', 'Seagull', 'Qwerty', '$2y$10$Aa.ij0tiSpVoeKk5kPjizO1ydv8s.7OvVVWPs4e9Z3Tt9/LXS6cF.', 'abc@123.com', 'javascript_logo.png', 1),
(16, 'thonihuang', 'Thoni', 'Huang', '$2y$10$/FLAqPUIsaO5OSAvD70dWO0gD9BenjjBuJZHkkLhUlpB3beZCm59O', 'thonihuang@yahoo.com', 'THONI.png', 0),
(19, 'seagull3', 'North', 'Shore', '$2y$10$xlg9Vun0PlKMobCJxnIHdeov5RB/NoeXuLGvQBMIB/GboBFaUKX3i', 'ns@abc.com', 'mrpittapit.jpg', 1),
(20, '1', 'Rob', 'Yo', '$2y$10$3.k.Bp/apVs.Yb8RW4TxhOvv.HvtjMO84PxTEtSkLvegT3G9sv6S2', 'sdf@sdf', 'default.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `thread_id` tinyint(4) NOT NULL,
  `user_id` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`thread_id`, `user_id`) VALUES
(2, 5),
(9, 2),
(11, 3),
(9, 3),
(5, 3),
(2, 3),
(6, 3),
(12, 3),
(13, 7),
(12, 6),
(10, 6),
(0, 2),
(4, 2),
(6, 2),
(5, 2),
(12, 2),
(4, 5),
(6, 5),
(8, 5),
(5, 4),
(4, 4),
(1, 4),
(3, 4),
(6, 4),
(2, 4),
(14, 5),
(15, 3),
(13, 3),
(16, 3),
(4, 3),
(8, 3),
(7, 3),
(17, 3),
(10, 3),
(16, 2),
(7, 2),
(15, 2),
(17, 2),
(18, 4),
(19, 4),
(13, 4),
(17, 4),
(9, 6),
(11, 6),
(18, 6),
(15, 6),
(20, 7),
(8, 7),
(14, 7),
(2, 7),
(19, 7),
(12, 7),
(21, 4),
(7, 4),
(12, 4),
(22, 4),
(24, 3),
(22, 3),
(1, 3),
(19, 3),
(23, 3),
(18, 3),
(3, 3),
(25, 6),
(2, 12),
(27, 12),
(12, 1),
(15, 1),
(3, 1),
(20, 1),
(14, 1),
(3, 6),
(6, 6),
(5, 6),
(28, 13),
(10, 5),
(13, 5),
(22, 5),
(5, 5),
(12, 5),
(18, 5),
(25, 5),
(15, 5),
(19, 5),
(24, 6),
(3, 15),
(6, 15),
(23, 6),
(21, 6),
(26, 19),
(27, 19),
(28, 19),
(24, 14),
(3, 14),
(5, 14),
(19, 14),
(28, 14);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`thread_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `thread_ID` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;--
-- Database: `chris_dasan`
--
CREATE DATABASE IF NOT EXISTS `chris_dasan` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `chris_dasan`;

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bgImg` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `description`, `bgImg`, `created_at`, `updated_at`) VALUES
(1, 'Eco Friendly', 'All of our products are Eco-Friendly products.', 'toiletTissueBG.jpeg', '2017-05-04 03:17:57', '2017-05-04 03:28:08'),
(2, 'Fastest Delivery Service', 'We will deliver your products within 2 days from your purchase!', 'delivery.jpeg', '2017-05-04 03:18:31', '2017-05-04 03:18:31'),
(3, 'High Quality Products', 'Our products are all in high quality but cheaper price!', 'banner.jpg', '2017-05-04 03:28:35', '2017-05-04 03:28:35');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Toilet Rolls', 'Regular / Premium / Jumbo rolls imported from South Korea', 1, '2017-05-02 00:52:44', '2017-05-02 00:52:44'),
(2, 'Tissue Products', 'Hand Towel / Table Napkins / Facial Tissue / Travel Tissue / Wet Tissue / Wiper Towel imported from South Korea.\r\n\r\nAll products are in high in quality and eco-friendly.', 2, '2017-05-02 00:54:20', '2017-05-02 00:54:20'),
(3, 'Dispensers', 'Dispensers for :\r\n* Jumbo Rolls\r\n* Hand Towel\r\n* Napkins\r\n* Hand Cleaner\r\n\r\nPurchase dispensers with our products to get special deals!', 3, '2017-05-02 00:55:43', '2017-05-02 00:55:43'),
(4, 'Dishwash', 'We have dishwashing liquid in various sizes.\r\nAll products are imported and made in South Korea.', 4, '2017-05-02 00:57:16', '2017-05-02 00:57:16'),
(5, 'Handwash', 'Our hand cleaners are all eco-friendly and made in South Korea.', 5, '2017-05-02 00:58:57', '2017-05-02 00:58:57'),
(6, 'Cleaning', 'We have various types of cleaning products from disinfectant, bleach, degreaser, and etc.', 6, '2017-05-02 01:00:14', '2017-05-02 01:00:14'),
(7, 'Laundry', 'We have eco-friendly laundry products.', 7, '2017-05-02 01:00:51', '2017-05-02 01:00:51'),
(8, 'New', 'We are importing various types of products from South Korea.\r\n\r\nHere are some items we have imported recently.', 8, '2017-05-02 01:02:49', '2017-05-02 01:02:49');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(146, '2014_10_12_000000_create_users_table', 1),
(147, '2014_10_12_100000_create_password_resets_table', 1),
(148, '2017_04_03_014616_create_categories_table', 1),
(149, '2017_04_03_015020_create_products_table', 1),
(150, '2017_04_03_015851_create_comments_table', 1),
(151, '2017_04_03_020115_create_ratings_table', 1),
(152, '2017_04_03_022401_create_banners_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `img`, `price`, `minimum`, `order`, `isTopProduct`, `tpOrder`, `rating`, `created_at`, `updated_at`) VALUES
(1, 1, 'Jumbo Rolls', '16 rolls, 2 ply, 300 m\r\nEmbossed\r\nBiodegradable\r\nEco-friendly\r\nMade in Korea', 'jumboroll-228x228.png', 91.99, 1, 1, 1, 0, 5, '2017-05-02 01:05:58', '2017-05-02 01:05:58'),
(2, 1, 'Premium Toilet Paper', '72 rolls, 3 ply, 30m\r\nJasmine fragrance\r\nPremium quality\r\nEco-friedndly\r\nMade in Korea', 'premiumToiletPaper-228x228.png', 88.99, 1, 2, 1, 0, 5, '2017-05-02 01:06:53', '2017-05-02 01:06:53'),
(3, 1, 'Regular Toilet Paper', '90 rolls, 3 ply, 27m\r\nJasmine fragrance\r\nEco-friendly\r\nMade in Korea', 'toiletPaper-228x228.png', 68.99, 1, 3, 1, 0, 5, '2017-05-02 01:07:55', '2017-05-02 01:07:55'),
(4, 2, 'Hand Towel', '5000 sheets per carton\r\n2 ply\r\n100% pulp\r\nV-folded\r\n200mm * 210mm\r\nSoft and high absorbsive\r\nEco-friendly\r\nMade in Korea', 'handtowel1-228x228.jpg', 78.99, 1, 1, 1, 0, 5, '2017-05-02 01:08:43', '2017-05-02 01:08:43'),
(5, 2, 'Table Napkin', '6,000 sheets per carton\r\nPull-out table napkin\r\n100% pulp\r\nSize: 215mm x 105mm\r\nEmbossed\r\nEco-friendly\r\nMade in Korea', 'tablenapkin-228x228.png', 48.99, 1, 2, 1, 0, 5, '2017-05-02 01:09:52', '2017-05-02 01:09:52'),
(6, 2, 'Facial Tissue', '3 packs, 280 sheets, 2 ply\r\n100% pulp\r\nEco-friendly\r\nMade in Korea', 'face tissue-228x228.png', 14.99, 1, 3, 0, 0, 5, '2017-05-02 01:10:54', '2017-05-02 01:10:54'),
(7, 2, 'Travel Tissue', '56 sheets\r\n100% pulp\r\nSoft\r\nVery convenient for carrying in bags or cars\r\nGreat gift idea or promotion item for your business\r\nMade Korea', 'travel tissues-228x228.png', 1.99, 1, 4, 0, 0, 5, '2017-05-02 01:11:38', '2017-05-02 01:11:38'),
(8, 2, 'Wet Tissue', '20 sheets\r\n100% natural\r\nContains aloe vera extract\r\nContains green tea extract\r\nLess irritation\r\nMade in Korea', 'nature tissue-228x228.png', 1.99, 1, 5, 0, 0, 5, '2017-05-02 01:12:30', '2017-05-02 01:12:30');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ratings` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `address`, `phone`, `mobile`, `email`, `isSubscribed`, `isAdmin`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin', '185 Waihoehoe Road Drury Auckland', 211543033, 272460125, 'admin@dasanholdings.com', 0, 1, '$2y$10$BG4KoVSAlw1X2.iKxXojDuW1y7wAyTve4yIN6M4EqJ8xOUEZxEeGq', NULL, '2017-05-02 00:51:33', '2017-05-02 00:51:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
