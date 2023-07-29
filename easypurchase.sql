-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 20, 2023 at 04:37 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `easypurchase`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

DROP TABLE IF EXISTS `addresses`;
CREATE TABLE IF NOT EXISTS `addresses` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `product_id` bigint NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `product_id`, `country`, `state`, `city`, `pincode`, `full_address`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 'india', 'gujrat', 'surat', '395004', 'katargam', '2023-02-09 11:01:21', '2023-02-09 11:01:21'),
(2, 2, 2, 'america', 'kelifonia', 'kalifonia', '8754565', 'at calkifonia', '2023-02-09 11:18:52', '2023-02-09 11:18:52'),
(3, 2, 2, 'america', 'kelifonia', 'kalifonia', '8754565', 'at calkifonia', '2023-02-09 11:19:28', '2023-02-09 11:19:28'),
(4, 1, 2, 'india', 'gujrat', 'surat', '395004', 'at kataragam near parasploce chowki', '2023-02-14 11:03:18', '2023-02-14 11:03:18');

-- --------------------------------------------------------

--
-- Table structure for table `adlistings`
--

DROP TABLE IF EXISTS `adlistings`;
CREATE TABLE IF NOT EXISTS `adlistings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@yopmail.com', '$2y$10$wLeTPu9sU7/pbVV2Jv6LBO3LuSRHRnJMuhJr56GFDz1NRnItf6Opm', '2023-02-09 10:26:19', '2023-02-09 10:26:19');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int UNSIGNED DEFAULT NULL,
  `category_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `parent_id`, `category_slug`, `status`, `img`, `created_at`, `updated_at`) VALUES
(1, 'Storage', NULL, 'Storage', '1', '20230209160012.jpg', '2023-02-09 10:30:12', '2023-02-09 10:30:12'),
(2, 'EarPhone', NULL, 'EarPhone', '1', '20230209160053.jpg', '2023-02-09 10:30:53', '2023-02-09 10:30:53'),
(3, 'Watch', NULL, 'Watch', '1', '20230209160112.jpg', '2023-02-09 10:31:12', '2023-02-09 10:31:12'),
(4, 'computer', NULL, 'computer', '1', '20230209160322.jpg', '2023-02-09 10:33:22', '2023-02-09 10:33:22');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `category`, `message`, `created_at`, `updated_at`) VALUES
(1, 'sanjay', 'dhaval@yopmail.com', 'EarPhone', 'hyyyyyyyyy', '2023-02-09 11:26:22', '2023-02-09 11:26:22');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(12, '2014_10_12_000000_create_users_table', 2),
(2, '2021_11_25_101741_create_categories_table', 1),
(3, '2021_12_02_063910_create_sub_categories_table', 1),
(4, '2021_12_03_065230_create_products_table', 1),
(5, '2021_12_08_090808_create_admins_table', 1),
(6, '2022_01_21_062807_create_adlistings_table', 1),
(7, '2022_01_21_114718_create_registers_table', 1),
(8, '2022_10_27_141537_create_addresses_table', 1),
(9, '2022_10_27_141822_create_orders_table', 1),
(10, '2022_12_31_100456_create_contacts_table', 1),
(11, '2023_01_22_094234_create_user_details_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `product_id` bigint NOT NULL,
  `address_id` bigint NOT NULL,
  `order_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `address_id`, `order_date`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 1, '2023-02-09', '2023-02-09 11:01:21', '2023-02-09 11:01:21'),
(2, 2, 2, 2, '2023-02-09', '2023-02-09 11:18:52', '2023-02-09 11:18:52'),
(3, 2, 2, 3, '2023-02-09', '2023-02-09 11:19:28', '2023-02-09 11:19:28'),
(4, 1, 2, 4, '2023-02-14', '2023-02-14 11:03:18', '2023-02-14 11:03:18');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `username` int NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_category_id` int NOT NULL,
  `phone` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `status`, `username`, `description`, `price`, `category_id`, `sub_category_id`, `phone`, `img`, `created_at`, `updated_at`) VALUES
(1, 'Boat RockerZ', 1, 1, 'For this specific question OP has already run the migration and by the book if he wants to run the same migration again, then first he should rollback with php artisan migrate:rollback. This will undo the last migration/s.', '1435', '2', 3, '9009009009', '20230209161330.jpg', '2023-02-09 10:43:30', '2023-02-09 10:43:30'),
(2, 'MacBook Pro', 1, 1, 'APPLE 2020 Macbook Air M1 - (8 GB/256 GB SSD/Mac OS Big Sur) MGN63HN/A  (13.3 inch, Space Grey, 1.29 kg)', '350000', '4', 2, '1201201201', '20230209161616.webp', '2023-02-09 10:46:16', '2023-02-09 10:46:16'),
(3, 'boAt Wave Neo', 1, 1, 'boAt Wave Neo with 1.69 inch , 2.5D Curved Display & Multiple Sports Modes Smartwatch  (Blue Strap, Free Size)', '1499', '3', 1, '798456325', '20230209162324.webp', '2023-02-09 10:53:24', '2023-02-09 10:53:24');

-- --------------------------------------------------------

--
-- Table structure for table `registers`
--

DROP TABLE IF EXISTS `registers`;
CREATE TABLE IF NOT EXISTS `registers` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

DROP TABLE IF EXISTS `sub_categories`;
CREATE TABLE IF NOT EXISTS `sub_categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `subcategory_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `subcategory_name`, `category_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Smart Watch', '3', '1', '2023-02-09 10:34:39', '2023-02-09 11:24:15'),
(2, 'Laptop', '4', '1', '2023-02-09 10:34:49', '2023-02-09 10:34:49'),
(3, 'AirDops', '2', '1', '2023-02-09 10:35:02', '2023-02-09 10:35:02'),
(4, 'Pendrive', '1', '1', '2023-02-09 10:35:15', '2023-02-09 10:35:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_details` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_details`, `number`, `status`, `email`, `password`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'dhaval', NULL, NULL, '1', 'dhaval@yopmail.com', 'eyJpdiI6IjhMUU01VU55NW9aZnVQSGkyQTljSmc9PSIsInZhbHVlIjoiVVlPc3p5TmprQVJ1TXRzcnI5Vmhrdz09IiwibWFjIjoiNzM3NDRiYjFmNzQ0ZDVmYzFjYTYyMThjZWFmZDJmNjA0ODJkMTcxN2EyZTRjN2YyZTE1ODY1ZDEzYzdiYTE4YiIsInRhZyI6IiJ9', NULL, NULL, NULL, NULL),
(2, 'sanjay', NULL, NULL, '1', 'sanjay@yopmail.com', 'eyJpdiI6InFFYVBqVVhUNktpcksrNVQ5ak5LUXc9PSIsInZhbHVlIjoiSUxPYm92eElPWjJMVkU4MFgrSHNpZz09IiwibWFjIjoiMTFkYWQzNWZmOTdhZTcwZjUyNzRhYTE1OTRjNGEyOTA3MjU2MTQzMjMxOTY1YmZkMjhkNzcwYjM3MmFmNjc4NiIsInRhZyI6IiJ9', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

DROP TABLE IF EXISTS `user_details`;
CREATE TABLE IF NOT EXISTS `user_details` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `landmark` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
