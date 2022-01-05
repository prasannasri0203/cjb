-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 05, 2021 at 10:53 AM
-- Server version: 5.7.35-0ubuntu0.18.04.1
-- PHP Version: 7.3.29-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cjb`
--

-- --------------------------------------------------------

--
-- Table structure for table `address_book`
--

CREATE TABLE `address_book` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sname` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '2' COMMENT '2= Customer',
  `city_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pscode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `primary` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0= others 1= primary'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `address_book`
--

INSERT INTO `address_book` (`id`, `fname`, `sname`, `address1`, `address2`, `type`, `city_name`, `pscode`, `country`, `phone`, `created_at`, `updated_at`, `user_id`, `primary`) VALUES
(1, NULL, NULL, 'QA TEST', NULL, '1', 'Chennai', '658003', 'Indoa', 846085343, '2021-08-05 11:39:36', '2021-08-05 11:39:36', 321, '0'),
(2, NULL, NULL, 'eegfsedgfs', 'goiu', '1', 'Madhya Pradesh', '605020', '654', 9003303914, '2021-08-05 16:10:14', '2021-08-05 16:10:14', 187, '0');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci,
  `email` text COLLATE utf8mb4_unicode_ci,
  `phone_number` int(11) DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_logs`
--

CREATE TABLE `admin_logs` (
  `id` bigint(20) NOT NULL,
  `admin_access_key` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_logs`
--

INSERT INTO `admin_logs` (`id`, `admin_access_key`, `created_at`, `updated_at`) VALUES
(1, 'VyR069kzmNpyfSih746h', '2021-08-05 14:45:35', '2021-08-05 14:45:35'),
(2, 'yK2GnCm4Vhf2Fa9heC5r', '2021-08-05 14:50:36', '2021-08-05 14:50:36');

-- --------------------------------------------------------

--
-- Table structure for table `artist_category`
--

CREATE TABLE `artist_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `describe_category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_keyword` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_search_keyword` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `artist_category`
--

INSERT INTO `artist_category` (`id`, `user_id`, `category_name`, `describe_category`, `category_keyword`, `category_search_keyword`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, '321', 'T', 'QA Teddy', NULL, NULL, '1', '2021-08-05 11:09:36', '2021-08-05 11:09:36'),
(2, '321', 'QA Teddy', 'Wow super product', NULL, NULL, '1', '2021-08-05 11:13:47', '2021-08-05 11:13:47');

-- --------------------------------------------------------

--
-- Table structure for table `artist_gallery`
--

CREATE TABLE `artist_gallery` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `title` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(4095) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `artist_gallery`
--

INSERT INTO `artist_gallery` (`id`, `user_id`, `title`, `description`, `link`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 195, 'Test', NULL, 'https://www.youtube.com/embed/rUWxSEwctFU', 1, NULL, '2021-03-23 16:26:57', '2021-03-23 16:26:57'),
(2, 208, 'Manual testing', NULL, 'https://youtu.be/QJqNYhiHysM', 1, NULL, '2021-05-27 10:55:31', '2021-05-27 10:55:31'),
(3, 197, 'qayt', NULL, 'https://www.youtube.com/watch?v=d5LFvG8zpds', 1, NULL, '2021-05-28 13:35:23', '2021-05-28 13:35:23'),
(4, 197, 'afsdvs', NULL, 'https://www.youtube.com/watch?v=jX3aHRNAkPs&list=PLZnxqowr6IKjAKo3wmBBgjUgfFejvqho_', -1, '2021-05-28 15:21:52', '2021-05-28 15:21:40', '2021-05-28 15:21:40'),
(5, 208, 'Ecommerce', NULL, 'https://youtu.be/nxSDHBdsWqA', 1, NULL, '2021-05-31 12:07:48', '2021-05-31 12:07:48'),
(6, 304, 'TESting video', NULL, 'https://www.youtube.com/watch?v=LtybBfbjE_8', 1, NULL, '2021-08-02 12:52:26', '2021-08-02 12:52:26');

-- --------------------------------------------------------

--
-- Table structure for table `artist_merchandise_products`
--

CREATE TABLE `artist_merchandise_products` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `artist_merchandise_products`
--

INSERT INTO `artist_merchandise_products` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 321, 1, '2021-08-05 11:07:43', '2021-08-05 11:07:43');

-- --------------------------------------------------------

--
-- Table structure for table `artist_themes`
--

CREATE TABLE `artist_themes` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `banner_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_layer_colour` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cart_colour` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `font_family` varchar(127) COLLATE utf8mb4_unicode_ci NOT NULL,
  `font_size` tinyint(4) NOT NULL,
  `font_colour` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theme_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `artist_themes`
--

INSERT INTO `artist_themes` (`id`, `user_id`, `banner_image`, `content_layer_colour`, `cart_colour`, `font_family`, `font_size`, `font_colour`, `theme_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 1, NULL, NULL),
(92, 125, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 0, NULL, NULL),
(93, 126, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 1, NULL, NULL),
(94, 128, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 1, NULL, NULL),
(95, 129, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 0, NULL, NULL),
(96, 130, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 0, NULL, NULL),
(97, 131, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 1, NULL, NULL),
(98, 132, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 0, NULL, NULL),
(99, 133, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 0, NULL, NULL),
(100, 134, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 1, NULL, NULL),
(101, 135, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 1, NULL, NULL),
(102, 136, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 0, NULL, NULL),
(103, 137, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 1, NULL, NULL),
(104, 138, 'artistbg.png', '#598595', '#2081a3', 'Rubik-Light', 15, 'red', NULL, 0, NULL, '2020-12-17 15:32:07'),
(105, 139, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 0, NULL, NULL),
(106, 140, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 1, NULL, NULL),
(107, 141, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 1, NULL, NULL),
(108, 142, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 1, NULL, NULL),
(109, 143, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 0, NULL, NULL),
(110, 144, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 0, NULL, NULL),
(111, 145, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 0, NULL, NULL),
(112, 146, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 1, NULL, NULL),
(113, 147, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 1, NULL, NULL),
(114, 148, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 0, NULL, NULL),
(115, 149, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 0, NULL, NULL),
(116, 150, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 1, NULL, NULL),
(117, 151, '0000151-photo-1483706600674-e0c87d3fe85b.jpg', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', 6, 1, NULL, '2021-03-04 10:23:55'),
(118, 152, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 1, NULL, NULL),
(119, 153, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 0, NULL, NULL),
(120, 154, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 1, NULL, NULL),
(121, 155, '0000155-0ba3d60362c7e6d256cfc1f37156bad9.jpg', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 0, NULL, '2020-12-30 11:32:06'),
(122, 156, '0000156-download.jfif', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 0, NULL, '2021-01-22 13:14:49'),
(123, 157, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 1, NULL, NULL),
(124, 160, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 0, NULL, NULL),
(125, 161, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 1, NULL, NULL),
(126, 162, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 0, NULL, NULL),
(127, 164, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 0, NULL, NULL),
(128, 165, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 0, NULL, NULL),
(129, 169, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 0, NULL, NULL),
(130, 170, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 0, NULL, NULL),
(131, 170, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 0, NULL, NULL),
(132, 171, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 0, NULL, NULL),
(133, 172, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 0, NULL, NULL),
(134, 173, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 0, NULL, NULL),
(135, 174, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 0, NULL, NULL),
(136, 175, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 0, NULL, NULL),
(137, 176, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 0, NULL, NULL),
(138, 177, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 0, NULL, NULL),
(139, 178, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', 4, 1, NULL, '2021-03-08 14:53:06'),
(140, 179, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 0, NULL, NULL),
(141, 181, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 0, NULL, NULL),
(142, 182, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', 2, 1, NULL, '2021-03-18 12:04:59'),
(143, 183, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 0, NULL, NULL),
(144, 184, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 0, NULL, NULL),
(145, 185, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 1, NULL, NULL),
(146, 186, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 0, NULL, NULL),
(147, 187, '0000187-logo.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', 5, 1, NULL, '2021-05-20 15:48:17'),
(148, 188, '0000188-nagvis.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', 3, 1, NULL, '2021-03-15 15:23:04'),
(149, 189, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 1, NULL, NULL),
(150, 190, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 1, NULL, NULL),
(151, 195, 'artistbg.png', '#00afef', NULL, 'Rubik-Light', 15, NULL, 4, 1, '2021-04-07 16:54:37', '2021-04-07 16:54:51'),
(152, 197, '0000187-logo.png', '#00afef', '#ed1277', 'Rubik-Light', 15, NULL, 1, 1, '2021-04-12 11:40:06', '2021-05-05 10:23:49'),
(153, 217, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 0, NULL, NULL),
(154, 218, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 0, NULL, NULL),
(155, 219, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 0, NULL, NULL),
(156, 220, '0000220-technology-banner-design-with-light-effects-vector.jpg', '#00afef', '#ed1277', 'Times+New+Roman', 16, '#130f0f', 5, 1, NULL, '2021-06-23 18:01:59'),
(157, 222, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 0, NULL, NULL),
(158, 224, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 0, NULL, NULL),
(159, 208, '0000208-technology-banner-design-with-light-effects-vector.jpg', NULL, NULL, 'Rubik-Light', 15, NULL, 1, 1, '2021-07-08 11:27:35', '2021-07-08 11:27:35'),
(160, 201, 'artistbg.png', NULL, NULL, 'Rubik-Light', 15, NULL, 2, 1, '2021-07-08 15:19:17', '2021-07-08 15:19:17'),
(161, 254, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 0, NULL, NULL),
(162, 259, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 1, NULL, NULL),
(163, 260, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 1, NULL, NULL),
(164, 262, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 1, NULL, NULL),
(165, 265, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 0, NULL, NULL),
(166, 265, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 1, NULL, NULL),
(167, 301, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 0, NULL, NULL),
(168, 304, '0000304-View shop - About me.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', 1, 1, NULL, '2021-08-02 12:58:13'),
(169, 304, '0000304-View shop - About me.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', 1, 1, NULL, '2021-08-02 12:58:13'),
(170, 305, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 0, NULL, NULL),
(171, 309, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 0, NULL, NULL),
(172, 309, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 1, NULL, NULL),
(173, 321, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 0, NULL, NULL),
(174, 321, 'artistbg.png', '#00afef', '#ed1277', 'Rubik-Light', 15, '#130f0f', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_file_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `user_id`, `image_file_name`, `name`, `status`, `created_at`, `updated_at`) VALUES
(20, NULL, '1431122947.jpg', 'Banner1', '0', '2020-10-10 12:15:04', '2020-10-21 09:07:13'),
(38, NULL, '85192115.jpg', 'view', '0', '2020-12-30 15:51:41', '2021-03-08 08:31:28'),
(39, NULL, '455223410.jpg', 'tee', '0', '2020-12-30 15:53:24', '2021-03-08 08:31:33'),
(40, NULL, '191339349.png', 'home banner', '0', '2021-03-08 08:30:25', '2021-03-08 12:55:22'),
(41, NULL, '862892868.png', 'home banner', '0', '2021-03-08 12:54:58', '2021-05-19 11:25:29'),
(42, NULL, '464121034.png', 'Home Banner', '1', '2021-05-19 11:25:53', '2021-05-19 11:25:53');

-- --------------------------------------------------------

--
-- Table structure for table `cart_item_management`
--

CREATE TABLE `cart_item_management` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cart_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merchandise_product_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `placed_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 - Pending, 2 - Placed, 3 - Cancelled',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart_item_management`
--

INSERT INTO `cart_item_management` (`id`, `cart_id`, `customer_id`, `merchandise_product_id`, `quantity`, `placed_date`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', '321', '4', 1, '2021-08-05', 2, '2021-08-05 11:39:07', '2021-08-05 11:40:10', NULL),
(2, '2', '321', '4', 1, '2021-08-05', 2, '2021-08-05 14:45:49', '2021-08-05 14:46:34', NULL),
(3, '3', '187', '4', 1, '2021-08-05', 2, '2021-08-05 16:09:33', '2021-08-05 16:10:28', NULL),
(4, '4', '187', '4', 1, '2021-08-05', 1, '2021-08-05 16:11:05', '2021-08-05 16:11:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart_management`
--

CREATE TABLE `cart_management` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `packing_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `placed_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `completed_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancelled_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `print_price` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 - Pending, 2 - Placed, 3 - Completed, 4 - Cancelled',
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart_management`
--

INSERT INTO `cart_management` (`id`, `customer_id`, `packing_id`, `shipping_price`, `created_time`, `placed_time`, `completed_time`, `cancelled_time`, `notes`, `print_price`, `status`, `ip_address`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '321', '4', '100', '2021-08-05', NULL, '2021-08-05', NULL, '', '0', 3, '192.168.4.1', '2021-08-05 11:15:16', '2021-08-05 11:40:10', NULL),
(2, '321', '3', '100', '2021-08-05', NULL, '2021-08-05', NULL, '', '0', 3, '192.168.4.1', '2021-08-05 14:45:49', '2021-08-05 14:46:34', NULL),
(3, '187', '3', '100', '2021-08-05', NULL, '2021-08-05', NULL, '', '0', 3, '192.168.4.1', '2021-08-05 16:09:32', '2021-08-05 16:10:28', NULL),
(4, '187', '3', '100', '2021-08-05', NULL, NULL, NULL, '', '0', 1, '192.168.4.1', '2021-08-05 16:11:05', '2021-08-05 16:11:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color_val` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size_val` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `category_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `category_name`, `color_val`, `size_val`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`, `category_image`) VALUES
(1, 0, 'QA', '[\"Red\",\"Blue\",\"Green\",\"Orange\",\"Purple\",\"Pink\"]', '[\"XL\",\"L\",\"S\",\"M\",\"XS\",\"XXL\"]', '0', NULL, NULL, '2021-08-05 10:54:22', '2021-08-05 10:54:22', NULL, '1471513920.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cjb_themes`
--

CREATE TABLE `cjb_themes` (
  `id` int(10) UNSIGNED NOT NULL,
  `theme_name` varchar(255) NOT NULL,
  `dark_color` varchar(255) NOT NULL,
  `light_color` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Active, 0-In-active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cjb_themes`
--

INSERT INTO `cjb_themes` (`id`, `theme_name`, `dark_color`, `light_color`, `status`) VALUES
(1, 'Default', '#ed1277', '#00AFEF', 1),
(2, 'Sunflower', '#fd6726', '#6a9d98', 1),
(3, 'Black-and-Lime', '#10ce48', '#515151', 1),
(4, 'Greeney', '#8cc822', '#5b7a7d', 1),
(5, 'Sunset-Sky', '#fe6625', '#6a9d98', 1),
(6, 'Plum-Purple', '#8b5469', '#bc9188', 1),
(7, 'Bluest', '#57b1e3', '#6293b1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('help','ideas','others') COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`id`, `type`, `name`, `slug`, `content`, `images`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'help', 'Returns', 'returns', '<p>This is where information about returns will be noted</p>', '[\"Capture2.JPG\"]', '2020-08-25 12:53:12', '2020-10-14 12:33:20', '2020-10-14 12:33:20'),
(2, 'ideas', 'Creating a brand', 'creatinbrand', '<p>here is where we write ideas</p>', '[\"284277879.jpg\"]', '2020-08-25 12:58:39', '2021-06-03 10:48:10', NULL),
(3, 'ideas', 'Hats hats hats', 'hats-hats-hats', '<p>hats</p>', '[\"892084141.jpg\"]', '2020-08-25 13:04:12', '2021-06-03 14:04:23', NULL),
(4, 'ideas', 'Phone phone', 'phone-phone', '<p>phone covers are awesome</p>', '[\"61063533.png\"]', '2020-08-25 13:08:05', '2021-06-03 14:07:29', NULL),
(5, 'others', 'Terms & Conditions', 'terms-conditions', '<p>A Privacy Policy is Required by the Law For individuals to feel comfortable sharing their personal information on the internet, there should be some sort of legal responsibility on businesses to protect that data and keep the users informed about the status and health of their information. Countries around the world have realized the need to protect their citizens&amp;#39; data and privacy. Businesses and websites that collect and/or process customer information are required to publish and abide by a Privacy Policy agreement. A majority of countries have already enacted laws to protect their users&amp;#39; data security and privacy. These laws require businesses to obtain explicit consent from users whose data they will store or process.</p>', '[\"1671676907.jpg\"]', '2020-08-25 13:10:22', '2021-06-03 10:49:09', NULL),
(6, 'ideas', 'tester', 'tester', '<p>sfsfsdf sd sd d</p>', '[\"103000546D-1.jpg\"]', '2020-08-26 12:24:10', '2021-03-10 13:12:32', '2021-03-10 13:12:32'),
(7, 'ideas', '1', '1', '<p>Testing the Ideas</p>', '[\"download (3).jpg\"]', '2020-08-27 08:25:45', '2020-12-30 14:27:07', '2020-12-30 14:27:07'),
(8, 'others', 'Privacy & Cookies', 'privacy-cookies', '<h3>&nbsp;</h3>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3>A Privacy Policy is Required by the Law</h3>\r\n\r\n<p>For individuals to feel comfortable sharing their personal information on the internet, there should be some sort of legal responsibility on businesses to protect that data and keep the users informed about the status and health of their information.</p>\r\n\r\n<p>Countries around the world have realized the need to protect their citizens&#39; data and privacy. Businesses and websites that collect and/or process customer information are required to publish and abide by a Privacy Policy agreement.</p>\r\n\r\n<p>A majority of countries have already enacted laws to protect their users&#39; data security and privacy. These laws require businesses to obtain explicit consent from users whose data they will store or process.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>A few of these laws include the following:</p>\r\n\r\n<ul>\r\n	<li><a href=\"https://www.privacypolicies.com/blog/caloppa/\">CalOPPA</a>&nbsp;in the USA</li>\r\n	<li><a href=\"https://www.privacypolicies.com/blog/gdpr/\">GDPR</a>&nbsp;in the EU</li>\r\n	<li><a href=\"https://www.privacypolicies.com/blog/pipeda/\">PIPEDA</a>&nbsp;in Canada</li>\r\n</ul>\r\n\r\n<p>For a business or a website that collects and processes user information in a certain region or country, it is&nbsp;<strong>very important</strong>&nbsp;to have complete knowledge of the data and privacy protection laws enforced in that region and the region your customers and end users are in. Non-compliance with these laws can result in hefty fines or even prosecution against the violator.</p>\r\n\r\n<p>In some cases, businesses have to follow laws specific to states or regulations specific to industries.</p>\r\n\r\n<p>For example, here&#39;s how&nbsp;<a href=\"https://www.gm.com/california-privacy.html\">General Motors</a>&nbsp;complies with CalOPPA in the US by including a California-specific section in its Privacy Policy:</p>', '[\"1302050776.jpg\"]', '2020-09-18 18:59:35', '2021-06-03 11:03:05', NULL),
(9, 'ideas', 'Who\'s it for', 'who\'s-it-for', '<p><em>An About Us page helps your company make a good first impression, and is critical for building customer trust and loyalty. An About Us page should make sure to cover basic information about the store and its founders, explain the company&#39;s purpose and how it differs from the competition, and encourage discussion and interaction. Here are some free templates, samples, and example About Us pages to help your ecommerce store stand out from the crowd.</em></p>\r\n\r\n<p>When it comes to personalizing your online store, nothing is more effective than an About Us page. This is a quick summary of your company&#39;s history and purpose, and should provide a clear overview of the company&#39;s brand story. A great About Us page can help tell your brand story, establish customer loyalty, and turn your bland ecommerce store into an well-loved brand icon. Most importantly, it will give your customers a reason to shop from your brand.</p>\r\n\r\n<p>In this post, we&#39;ll give you&nbsp;<strong>three different ways to create a professional about us page</strong>&nbsp;for your online store, blog, or other website - use our&nbsp;<a href=\"https://www.volusion.com/tools/about-us-generator/\" target=\"_blank\">about us page generator</a>, use the fill-in-the-blank about us template below, or create your own custom page using the about us examples within this article.</p>', '[\"858275113.png\"]', '2020-09-23 10:24:45', '2021-06-03 14:08:33', NULL),
(10, 'ideas', 'How does it work', 'how-does-it-work', '<p>One of my favorites is Heroku...<br />\r\nhttp://www.heroku.com/how</p>\r\n\r\n<p>It&#39;s my favorite because it explains the technology to non-technical people in a way that they can clearly understand the value of their technology; however, it also goes into the more technical details/specifics for the geeks. Also, they made it fun with the interactivity.</p>\r\n\r\n<p>Since this question was first posted, I was actually in the process of revamping the http://phpfog.com site. We just posted a new version of our &quot;how it works&quot; page. (https://phpfog.com/platform). We also added another page which walks you through the benefits (not features) of using our service (https://phpfog.com/why).<br />\r\n<br />\r\n&nbsp;</p>\r\n\r\n<p><a href=\"https://www.hotjar.com/tour\" target=\"_blank\">Hotjar</a>&nbsp;have a truly excellent product tour page, which I keep returning to for reference. Here&rsquo;s why:</p>\r\n\r\n<ol>\r\n	<li>It breaks down their product to a series of simple, coherent features</li>\r\n	<li>Terrific, informative screenshots (it helps that their product is very well designed)</li>\r\n	<li>Each strip offers a live demo or sample of each feature</li>\r\n	<li>You can browse through different elements of each feature in every strip. Meaning, the screenshots are interactive.</li>\r\n	<li>They communicate benefits really well</li>\r\n</ol>\r\n\r\n<p>This is a rare How it Works page, in that it is thoroughly informative and really shows you the nooks and corners of the product.</p>', '[\"344629892.png\"]', '2020-09-23 10:41:29', '2021-06-03 13:42:29', NULL),
(12, 'help', 'Shipping and returns', 'xxx', '<p>Most of our products are eligible for return and refund for domestic orders. There are some items that are Made to order which are not eligible for returns. The return and exchange policy for every product is clearly mentioned on the product page. Please note that international orders are not eligible for returns or exchanges.</p>\r\n\r\n<p>If the product is eligible for return, you may write to us at&nbsp;<a href=\"https://www.nykaafashion.com/shipping-and-return-policy.html#\">support@nykaafashion.com</a>&nbsp;within 7 days of delivery to request return and refund. Only products which are unused, unworn, unwashed, undamaged, with all its labels and tags completely intact, in original packaging and eligible for return only can be returned.</p>\r\n\r\n<p>How are returns processed?</p>\r\n\r\n<p>Once you request to return a product via email or phone, a pick up is organised for the item. Our courier partners will come to pick up the item within 5-7 business days after your return request has been received. This item is then brought back to our warehouse where it is checked by our quality control team. Once the product passes the quality control, a refund is initiated.</p>\r\n\r\n<p>Can I cancel my order?</p>\r\n\r\n<p>You can cancel your order within 24 hours of order. Please email us at&nbsp;<a href=\"https://www.nykaafashion.com/shipping-and-return-policy.html#\">support@nykaafashion</a>&nbsp;to request a cancellation. You will not be able to cancel the order by yourself on the website.</p>\r\n\r\n<p>**Nykaa Fashion reserves the right to cancel any order without pre-confirming the customer at any time and may verify any order before shipping the same to the customer that may include having a verbal or written confirmation from the customer.</p>', '[\"download (6).jpg\"]', '2020-09-23 10:59:10', '2020-12-30 14:25:55', '2020-12-30 14:25:55'),
(19, 'ideas', '1', 'qa-test', '<p>QA TEST</p>', '[\"png.png\"]', '2021-02-24 18:10:32', '2021-02-24 18:10:52', '2021-02-24 18:10:52'),
(20, 'ideas', 'General info', 'here-you-can-get-general-information ', '<p>Here you can get general information. More info about the product&nbsp;</p>', '[\"758529080.jpg\"]', '2021-03-10 15:37:44', '2021-06-03 14:09:04', NULL),
(21, 'ideas', 'QA Test', 'qa-test', '<p>Testing purpose</p>', '[\"761920906.png\"]', '2021-03-15 13:00:56', '2021-03-15 13:07:12', '2021-03-15 13:07:12'),
(22, 'help', 'QA Test 1', '15965', '<p>Hello</p>', '[\"616084547.png\"]', '2021-03-15 13:04:49', '2021-03-15 13:07:06', '2021-03-15 13:07:06'),
(24, 'ideas', 'Manual testing', 'test', '<h1>Manual Testing</h1>\r\n\r\n<p>Manual testing is a software testing process in which test cases are executed manually without using any automated tool. All test cases executed by the tester manually according to the end user&#39;s perspective. It ensures whether the application is working, as mentioned in the requirement document or not. Test cases are planned and implemented to complete almost 100 percent of the software application. Test case reports are also generated manually.</p>\r\n\r\n<p>Manual Testing is one of the most fundamental testing processes as it can find both visible and hidden defects of the software. The difference between expected output and output, given by the software, is defined as a defect. The developer fixed the defects and handed it to the tester for retesting.</p>\r\n\r\n<p>Manual testing is mandatory for every newly developed software before automated testing. This testing requires great efforts and time, but it gives the surety of bug-free software. Manual Testing requires knowledge of manual testing techniques but not of any automated testing tool.</p>\r\n\r\n<h1>Manual Testing</h1>\r\n\r\n<p>Manual testing is a software testing process in which test cases are executed manually without using any automated tool. All test cases executed by the tester manually according to the end user&#39;s perspective. It ensures whether the application is working, as mentioned in the requirement document or not. Test cases are planned and implemented to complete almost 100 percent of the software application. Test case reports are also generated manually.</p>\r\n\r\n<p>Manual Testing is one of the most fundamental testing processes as it can find both visible and hidden defects of the software. The difference between expected output and output, given by the software, is defined as a defect. The developer fixed the defects and handed it to the tester for retesting.</p>\r\n\r\n<p>Manual testing is mandatory for every newly developed software before automated testing. This testing requires great efforts and time, but it gives the surety of bug-free software. Manual Testing requires knowledge of manual testing techniques but not of any automated testing tool.</p>\r\n\r\n<h1>Manual Testing</h1>\r\n\r\n<p>Manual testing is a software testing process in which test cases are executed manually without using any automated tool. All test cases executed by the tester manually according to the end user&#39;s perspective. It ensures whether the application is working, as mentioned in the requirement document or not. Test cases are planned and implemented to complete almost 100 percent of the software application. Test case reports are also generated manually.</p>\r\n\r\n<p>Manual Testing is one of the most fundamental testing processes as it can find both visible and hidden defects of the software. The difference between expected output and output, given by the software, is defined as a defect. The developer fixed the defects and handed it to the tester for retesting.</p>\r\n\r\n<p>Manual testing is mandatory for every newly developed software before automated testing. This testing requires great efforts and time, but it gives the surety of bug-free software. Manual Testing requires knowledge of manual testing techniques but not of any automated testing tool.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', '[\"10336054.jpg\"]', '2021-03-15 13:44:35', '2021-06-03 14:09:22', NULL),
(25, 'ideas', 'design', 'design', '<p>design</p>', '[\"809769785.png\"]', '2021-03-16 18:30:29', '2021-06-03 14:09:38', NULL),
(26, 'help', 'testingg', 'tesst', '<p>Hello</p>', '[\"984348692.jpg\"]', '2021-03-16 18:43:18', '2021-06-02 19:55:17', NULL),
(29, 'help', 'QA Test', 'qa-test', '<p>QA Test</p>', '[\"495525255.jpg\"]', '2021-05-28 18:14:49', '2021-06-04 11:53:10', NULL),
(30, 'others', 'QAtest', 'testing', '<p>HEllo</p>', '[\"1757549537.jpeg\"]', '2020-09-23 10:24:45', '2021-06-02 20:03:02', NULL),
(31, 'help', 'ddd', 'ddd', '<p>ddd</p>', '[\"960912019.jpeg\"]', '2021-05-28 18:23:00', '2021-06-04 11:52:29', NULL),
(32, 'others', 'ddsa', 'dsads', '<p>dsasa</p>', '[\"10cd1e3a52a7e948f4f96b4cabd40ab0.jpg\"]', '2021-05-28 18:33:39', '2021-05-28 18:33:39', NULL),
(33, 'help', 'dddss', 'dddss', '<p>dddd</p>', '[\"135438481.png\"]', '2021-05-28 18:35:21', '2021-06-04 11:54:30', NULL),
(34, 'ideas', 'testing123', '12345', '<p>Testing this.</p>', '[\"png.jpg\"]', '2021-05-31 10:54:15', '2021-05-31 10:54:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `commenter_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commenter_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guest_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guest_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commentable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentable_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '1',
  `child_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `commenter_id`, `commenter_type`, `guest_name`, `guest_email`, `commentable_type`, `commentable_id`, `comment`, `approved`, `child_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '1', 'App\\User', NULL, NULL, 'App\\FaultReturn', '3', 'sdds', 1, NULL, NULL, '2021-07-20 16:35:15', '2021-07-20 16:35:15'),
(4, '1', 'App\\User', NULL, NULL, 'App\\FaultReturn', '14', 'dsvs', 1, NULL, NULL, '2021-07-20 17:16:50', '2021-07-20 17:16:50'),
(5, '1', 'App\\User', NULL, NULL, 'App\\FaultReturn', '15', 'test', 1, NULL, NULL, '2021-07-20 16:38:28', '2021-07-20 16:38:28'),
(6, '1', 'App\\User', NULL, NULL, 'App\\FaultReturn', '16', 'dscds', 1, NULL, NULL, '2021-07-20 17:17:17', '2021-07-20 17:17:17'),
(7, '1', 'App\\User', NULL, NULL, 'App\\FaultReturn', '17', 'Waiting', 1, NULL, NULL, '2021-07-20 18:08:38', '2021-07-20 18:08:38'),
(8, '259', 'App\\User', NULL, NULL, 'App\\FaultReturn', '18', 'sdcfsd', 1, NULL, NULL, '2021-07-26 19:30:03', '2021-07-26 19:30:03'),
(9, '1', 'App\\User', NULL, NULL, 'App\\FaultReturn', '20', 'Processing', 1, NULL, NULL, '2021-08-02 10:05:46', '2021-08-02 10:05:46'),
(10, '301', 'App\\User', NULL, NULL, 'App\\FaultReturn', '20', 'Reurn', 1, NULL, NULL, '2021-08-02 10:06:49', '2021-08-02 10:06:49');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `countrycode` char(3) NOT NULL,
  `countryname` varchar(200) NOT NULL,
  `code` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`countrycode`, `countryname`, `code`) VALUES
('ABW', 'Aruba', 'AW'),
('AFG', 'Afghanistan', 'AF'),
('AGO', 'Angola', 'AO'),
('AIA', 'Anguilla', 'AI'),
('ALA', 'Åland', 'AX'),
('ALB', 'Albania', 'AL'),
('AND', 'Andorra', 'AD'),
('ARE', 'United Arab Emirates', 'AE'),
('ARG', 'Argentina', 'AR'),
('ARM', 'Armenia', 'AM'),
('ASM', 'American Samoa', 'AS'),
('ATA', 'Antarctica', 'AQ'),
('ATF', 'French Southern Territories', 'TF'),
('ATG', 'Antigua and Barbuda', 'AG'),
('AUS', 'Australia', 'AU'),
('AUT', 'Austria', 'AT'),
('AZE', 'Azerbaijan', 'AZ'),
('BDI', 'Burundi', 'BI'),
('BEL', 'Belgium', 'BE'),
('BEN', 'Benin', 'BJ'),
('BES', 'Bonaire', 'BQ'),
('BFA', 'Burkina Faso', 'BF'),
('BGD', 'Bangladesh', 'BD'),
('BGR', 'Bulgaria', 'BG'),
('BHR', 'Bahrain', 'BH'),
('BHS', 'Bahamas', 'BS'),
('BIH', 'Bosnia and Herzegovina', 'BA'),
('BLM', 'Saint Barthélemy', 'BL'),
('BLR', 'Belarus', 'BY'),
('BLZ', 'Belize', 'BZ'),
('BMU', 'Bermuda', 'BM'),
('BOL', 'Bolivia', 'BO'),
('BRA', 'Brazil', 'BR'),
('BRB', 'Barbados', 'BB'),
('BRN', 'Brunei', 'BN'),
('BTN', 'Bhutan', 'BT'),
('BVT', 'Bouvet Island', 'BV'),
('BWA', 'Botswana', 'BW'),
('CAF', 'Central African Republic', 'CF'),
('CAN', 'Canada', 'CA'),
('CCK', 'Cocos [Keeling] Islands', 'CC'),
('CHE', 'Switzerland', 'CH'),
('CHL', 'Chile', 'CL'),
('CHN', 'China', 'CN'),
('CIV', 'Ivory Coast', 'CI'),
('CMR', 'Cameroon', 'CM'),
('COD', 'Democratic Republic of the Congo', 'CD'),
('COG', 'Republic of the Congo', 'CG'),
('COK', 'Cook Islands', 'CK'),
('COL', 'Colombia', 'CO'),
('COM', 'Comoros', 'KM'),
('CPV', 'Cape Verde', 'CV'),
('CRI', 'Costa Rica', 'CR'),
('CUB', 'Cuba', 'CU'),
('CUW', 'Curacao', 'CW'),
('CXR', 'Christmas Island', 'CX'),
('CYM', 'Cayman Islands', 'KY'),
('CYP', 'Cyprus', 'CY'),
('CZE', 'Czech Republic', 'CZ'),
('DEU', 'Germany', 'DE'),
('DJI', 'Djibouti', 'DJ'),
('DMA', 'Dominica', 'DM'),
('DNK', 'Denmark', 'DK'),
('DOM', 'Dominican Republic', 'DO'),
('DZA', 'Algeria', 'DZ'),
('ECU', 'Ecuador', 'EC'),
('EGY', 'Egypt', 'EG'),
('ERI', 'Eritrea', 'ER'),
('ESH', 'Western Sahara', 'EH'),
('ESP', 'Spain', 'ES'),
('EST', 'Estonia', 'EE'),
('ETH', 'Ethiopia', 'ET'),
('FIN', 'Finland', 'FI'),
('FJI', 'Fiji', 'FJ'),
('FLK', 'Falkland Islands', 'FK'),
('FRA', 'France', 'FR'),
('FRO', 'Faroe Islands', 'FO'),
('FSM', 'Micronesia', 'FM'),
('GAB', 'Gabon', 'GA'),
('GBR', 'United Kingdom', 'GB'),
('GEO', 'Georgia', 'GE'),
('GGY', 'Guernsey', 'GG'),
('GHA', 'Ghana', 'GH'),
('GIB', 'Gibraltar', 'GI'),
('GIN', 'Guinea', 'GN'),
('GLP', 'Guadeloupe', 'GP'),
('GMB', 'Gambia', 'GM'),
('GNB', 'Guinea-Bissau', 'GW'),
('GNQ', 'Equatorial Guinea', 'GQ'),
('GRC', 'Greece', 'GR'),
('GRD', 'Grenada', 'GD'),
('GRL', 'Greenland', 'GL'),
('GTM', 'Guatemala', 'GT'),
('GUF', 'French Guiana', 'GF'),
('GUM', 'Guam', 'GU'),
('GUY', 'Guyana', 'GY'),
('HKG', 'Hong Kong', 'HK'),
('HMD', 'Heard Island and McDonald Islands', 'HM'),
('HND', 'Honduras', 'HN'),
('HRV', 'Croatia', 'HR'),
('HTI', 'Haiti', 'HT'),
('HUN', 'Hungary', 'HU'),
('IDN', 'Indonesia', 'ID'),
('IMN', 'Isle of Man', 'IM'),
('IND', 'India', 'IN'),
('IOT', 'British Indian Ocean Territory', 'IO'),
('IRL', 'Ireland', 'IE'),
('IRN', 'Iran', 'IR'),
('IRQ', 'Iraq', 'IQ'),
('ISL', 'Iceland', 'IS'),
('ISR', 'Israel', 'IL'),
('ITA', 'Italy', 'IT'),
('JAM', 'Jamaica', 'JM'),
('JEY', 'Jersey', 'JE'),
('JOR', 'Jordan', 'JO'),
('JPN', 'Japan', 'JP'),
('KAZ', 'Kazakhstan', 'KZ'),
('KEN', 'Kenya', 'KE'),
('KGZ', 'Kyrgyzstan', 'KG'),
('KHM', 'Cambodia', 'KH'),
('KIR', 'Kiribati', 'KI'),
('KNA', 'Saint Kitts and Nevis', 'KN'),
('KOR', 'South Korea', 'KR'),
('KWT', 'Kuwait', 'KW'),
('LAO', 'Laos', 'LA'),
('LBN', 'Lebanon', 'LB'),
('LBR', 'Liberia', 'LR'),
('LBY', 'Libya', 'LY'),
('LCA', 'Saint Lucia', 'LC'),
('LIE', 'Liechtenstein', 'LI'),
('LKA', 'Sri Lanka', 'LK'),
('LSO', 'Lesotho', 'LS'),
('LTU', 'Lithuania', 'LT'),
('LUX', 'Luxembourg', 'LU'),
('LVA', 'Latvia', 'LV'),
('MAC', 'Macao', 'MO'),
('MAF', 'Saint Martin', 'MF'),
('MAR', 'Morocco', 'MA'),
('MCO', 'Monaco', 'MC'),
('MDA', 'Moldova', 'MD'),
('MDG', 'Madagascar', 'MG'),
('MDV', 'Maldives', 'MV'),
('MEX', 'Mexico', 'MX'),
('MHL', 'Marshall Islands', 'MH'),
('MKD', 'Macedonia', 'MK'),
('MLI', 'Mali', 'ML'),
('MLT', 'Malta', 'MT'),
('MMR', 'Myanmar [Burma]', 'MM'),
('MNE', 'Montenegro', 'ME'),
('MNG', 'Mongolia', 'MN'),
('MNP', 'Northern Mariana Islands', 'MP'),
('MOZ', 'Mozambique', 'MZ'),
('MRT', 'Mauritania', 'MR'),
('MSR', 'Montserrat', 'MS'),
('MTQ', 'Martinique', 'MQ'),
('MUS', 'Mauritius', 'MU'),
('MWI', 'Malawi', 'MW'),
('MYS', 'Malaysia', 'MY'),
('MYT', 'Mayotte', 'YT'),
('NAM', 'Namibia', 'NA'),
('NCL', 'New Caledonia', 'NC'),
('NER', 'Niger', 'NE'),
('NFK', 'Norfolk Island', 'NF'),
('NGA', 'Nigeria', 'NG'),
('NIC', 'Nicaragua', 'NI'),
('NIU', 'Niue', 'NU'),
('NLD', 'Netherlands', 'NL'),
('NOR', 'Norway', 'NO'),
('NPL', 'Nepal', 'NP'),
('NRU', 'Nauru', 'NR'),
('NZL', 'New Zealand', 'NZ'),
('OMN', 'Oman', 'OM'),
('PAK', 'Pakistan', 'PK'),
('PAN', 'Panama', 'PA'),
('PCN', 'Pitcairn Islands', 'PN'),
('PER', 'Peru', 'PE'),
('PHL', 'Philippines', 'PH'),
('PLW', 'Palau', 'PW'),
('PNG', 'Papua New Guinea', 'PG'),
('POL', 'Poland', 'PL'),
('PRI', 'Puerto Rico', 'PR'),
('PRK', 'North Korea', 'KP'),
('PRT', 'Portugal', 'PT'),
('PRY', 'Paraguay', 'PY'),
('PSE', 'Palestine', 'PS'),
('PYF', 'French Polynesia', 'PF'),
('QAT', 'Qatar', 'QA'),
('REU', 'Réunion', 'RE'),
('ROU', 'Romania', 'RO'),
('RUS', 'Russia', 'RU'),
('RWA', 'Rwanda', 'RW'),
('SAU', 'Saudi Arabia', 'SA'),
('SDN', 'Sudan', 'SD'),
('SEN', 'Senegal', 'SN'),
('SGP', 'Singapore', 'SG'),
('SGS', 'South Georgia and the South Sandwich Islands', 'GS'),
('SHN', 'Saint Helena', 'SH'),
('SJM', 'Svalbard and Jan Mayen', 'SJ'),
('SLB', 'Solomon Islands', 'SB'),
('SLE', 'Sierra Leone', 'SL'),
('SLV', 'El Salvador', 'SV'),
('SMR', 'San Marino', 'SM'),
('SOM', 'Somalia', 'SO'),
('SPM', 'Saint Pierre and Miquelon', 'PM'),
('SRB', 'Serbia', 'RS'),
('SSD', 'South Sudan', 'SS'),
('STP', 'São Tomé and Príncipe', 'ST'),
('SUR', 'Suriname', 'SR'),
('SVK', 'Slovakia', 'SK'),
('SVN', 'Slovenia', 'SI'),
('SWE', 'Sweden', 'SE'),
('SWZ', 'Swaziland', 'SZ'),
('SXM', 'Sint Maarten', 'SX'),
('SYC', 'Seychelles', 'SC'),
('SYR', 'Syria', 'SY'),
('TCA', 'Turks and Caicos Islands', 'TC'),
('TCD', 'Chad', 'TD'),
('TGO', 'Togo', 'TG'),
('THA', 'Thailand', 'TH'),
('TJK', 'Tajikistan', 'TJ'),
('TKL', 'Tokelau', 'TK'),
('TKM', 'Turkmenistan', 'TM'),
('TLS', 'East Timor', 'TL'),
('TON', 'Tonga', 'TO'),
('TTO', 'Trinidad and Tobago', 'TT'),
('TUN', 'Tunisia', 'TN'),
('TUR', 'Turkey', 'TR'),
('TUV', 'Tuvalu', 'TV'),
('TWN', 'Taiwan', 'TW'),
('TZA', 'Tanzania', 'TZ'),
('UGA', 'Uganda', 'UG'),
('UKR', 'Ukraine', 'UA'),
('UMI', 'U.S. Minor Outlying Islands', 'UM'),
('URY', 'Uruguay', 'UY'),
('USA', 'United States', 'US'),
('UZB', 'Uzbekistan', 'UZ'),
('VAT', 'Vatican City', 'VA'),
('VCT', 'Saint Vincent and the Grenadines', 'VC'),
('VEN', 'Venezuela', 'VE'),
('VGB', 'British Virgin Islands', 'VG'),
('VIR', 'U.S. Virgin Islands', 'VI'),
('VNM', 'Vietnam', 'VN'),
('VUT', 'Vanuatu', 'VU'),
('WLF', 'Wallis and Futuna', 'WF'),
('WSM', 'Samoa', 'WS'),
('XKX', 'Kosovo', 'XK'),
('YEM', 'Yemen', 'YE'),
('ZAF', 'South Africa', 'ZA'),
('ZMB', 'Zambia', 'ZM'),
('ZWE', 'Zimbabwe', 'ZW');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `format` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exchange_rate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `code`, `symbol`, `format`, `exchange_rate`, `active`, `created_at`, `updated_at`) VALUES
(1, 'US Dollar', 'USD', '$', '$1,0.00', '1', 0, '2020-07-13 21:39:22', '2020-07-13 22:00:00'),
(2, 'Pound Sterling', 'GBP', '£', '£1,0.00', '0.798232', 0, '2020-07-13 21:39:22', '2020-07-13 22:00:00'),
(3, 'Canadian Dollar', 'CAD', '$', '$1,0.00', '1.362834', 0, '2020-07-13 21:39:22', '2020-07-13 22:00:00'),
(4, 'Australian Dollar', 'AUD', '$', '$1,0.00', '1.439996', 0, '2020-07-13 21:39:22', '2020-07-13 22:00:00'),
(5, 'Swedish Krona', 'SEK', 'kr', '1 0,00 kr', '9.171383', 0, '2020-07-13 21:39:22', '2020-07-13 22:00:00'),
(6, 'Indian Rupee', 'INR', '₹', '1,0.00₹', '75.399493', 0, '2020-07-13 21:39:22', '2020-07-13 22:00:00'),
(7, 'China Yuan Renminbi', 'CNY', '¥', '¥1,0.00', '6.9957', 0, '2020-07-13 21:39:22', '2020-07-13 22:00:00'),
(8, 'Euro', 'EUR', '€', '1.0,00 €', '0.880977', 0, '2020-07-13 21:39:22', '2020-07-13 22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_and_packing`
--

CREATE TABLE `delivery_and_packing` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_value` bigint(20) NOT NULL,
  `delivery_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `delivery_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `delivery_desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_and_packing`
--

INSERT INTO `delivery_and_packing` (`id`, `type`, `delivery_name`, `delivery_key`, `delivery_value`, `delivery_status`, `delivery_created`, `delivery_updated`, `delivery_desc`, `deleted_at`) VALUES
(1, '1', 'Standard', 'delivery-standard', 100, '1', '2020-06-08 07:08:16', '2020-10-14 04:19:05', 'standard delivery', NULL),
(2, '1', 'Fixed', 'delivery-fixed', 20, '1', '2020-06-08 07:08:16', '2020-06-08 08:25:33', 'fixed delivery', '2020-06-08 02:55:33'),
(3, '2', 'Carton', 'packing-carton', 5, '1', '2020-06-08 07:08:16', '2021-01-22 08:36:41', 'Better Packing Carton', NULL),
(4, '2', 'Rain Proof', 'packing-rain_proof', 15, '1', '2020-06-08 07:08:16', '2020-06-08 07:08:16', 'Better Packing Rain Proof', NULL),
(5, '1', 'With In City', 'delivery-with_in_city', 10, '1', '2020-06-08 08:11:53', '2020-06-09 08:04:13', 'We delivery with in city limit', NULL),
(6, '1', 'polo', '1245', 101, '0', '2020-12-30 11:14:31', '2020-12-30 11:14:31', 'safe', NULL),
(7, '2', 'asian', '1245', 101, '0', '2020-12-30 11:19:08', '2020-12-30 11:19:08', 'safe', NULL),
(8, '1', 'polo', '1245', 101, '0', '2020-12-30 11:19:22', '2020-12-30 11:19:22', 'safe', NULL),
(9, '2', 'testing package', 'none', 800, '0', '2021-01-11 04:57:04', '2021-01-11 04:57:04', 'Testing the Revenue package', NULL),
(10, '2', 'tesst', 'none', 111, '0', '2021-01-11 05:25:11', '2021-01-11 05:25:11', 'teset', NULL),
(11, '2', 'tesst', 'none', 111, '0', '2021-01-11 05:25:30', '2021-01-11 05:25:30', 'test', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `emoji`
--

CREATE TABLE `emoji` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0= Admin , 1= Artist , 2= Customer',
  `image_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commision` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0=pending , 1= Active , 2= inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emoji`
--

INSERT INTO `emoji` (`id`, `user_id`, `user_type`, `image_name`, `file`, `commision`, `status`, `created_at`, `updated_at`) VALUES
(1, 321, '1', 'Eye', 'IMG_1628142089.jpg', '1', '1', '2021-08-05 11:11:29', '2021-08-05 11:11:29');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `read_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `reply_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `replay_message` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `question` varchar(2047) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `title`, `question`, `answer`, `keywords`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Review and retrun', 'sed ut percipiatis unde omnis iste natus error?', '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facere suscipit, ab asperiores ex harum magnam, possimus voluptates ratione quam placeat excepturi obcaecati tempore similique sapiente quod rem mollitia aliquam.\r\n                                        Explicabo?.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facere suscipit, ab asperiores ex harum magnam, possimus voluptates ratione quam placeat excepturi obcaecati tempore similique sapiente quod rem\r\n                                        mollitia aliquam. Explicabo?.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facere suscipit, ab asperiores ex harum magnam, possimus voluptates ratione quam placeat excepturi obcaecati tempore similique\r\n                                        sapiente quod rem mollitia aliquam. Explicabo?.Lorem ipsum, dolor sit amet consectetur adipisicing elit.\r\n                                    </p>\r\n                                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facere suscipit, ab asperiores ex harum magnam, possimus voluptates ratione quam placeat excepturi obcaecati tempore similique sapiente quod rem mollitia aliquam.\r\n                                        Explicabo?.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facere suscipit, ab asperiores ex harum magnam, possimus voluptates ratione quam placeat excepturi obcaecati tempore similique sapiente quod rem\r\n                                        mollitia aliquam. Explicabo?.\r\n                                    </p>', NULL, NULL, '2020-03-18 17:57:49', '2020-03-18 17:59:45', NULL),
(2, 'Review and retrun1', 'sed ut percipiatis unde omnis iste natus error?', '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facere suscipit, ab asperiores ex harum magnam, possimus voluptates ratione quam placeat excepturi obcaecati tempore similique sapiente quod rem mollitia aliquam. Explicabo?.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facere suscipit, ab asperiores ex harum magnam, possimus voluptates ratione quam placeat excepturi obcaecati tempore similique sapiente quod remmollitia aliquam. Explicabo?.Lorem ipsum, dolor sit amet consectetur adipisicing elit. <strong>Facere suscipit,</strong> ab asperiores ex harum magnam, possimus voluptates ratione quam placeat excepturi obcaecati tempore similique sapiente quod rem mollitia aliquam. Explicabo?.Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>\r\n\r\n<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facere suscipit, ab asperiores ex harum magnam, possimus voluptates ratione quam placeat excepturi obcaecati tempore similique sapiente quod rem mollitia aliquam. Explicabo?.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facere suscipit, ab asperiores ex harum magnam, possimus voluptates ratione quam placeat excepturi obcaecati tempore similique sapiente quod remmollitia aliquam. Explicabo?.</p>', NULL, NULL, '2020-03-18 18:43:07', '2020-03-18 18:43:37', NULL),
(3, 'Review and retrun2', 'What are the different payment methods that you accept?', '<p>We could simply list the various available options like PayPal, credit cards, and more.</p>', NULL, NULL, '2020-05-28 19:27:11', '2020-05-28 19:27:11', NULL),
(4, 'Review and retrun3', 'How can I clear the historic data?', '<p>If our tool had a simple reset button somewhere on the dashboard, we would choose to give simple instructions to reach that button.</p>\r\n\r\n<p>However, if the method of clearing the data were not so straightforward, we would prefer linking to a support article that handled the topic.</p>', NULL, NULL, '2020-05-28 19:28:18', '2020-05-28 19:28:18', NULL),
(5, 'Offers', 'Why do you need access to my Google Analytics account?', '<p>In our case, we could tell the users available  that we needed the access to connect our tool with the user&rsquo;s site&rsquo;s historic data. Further, to reassure our users, we could state that we never tracked any personally identifiable information.</p>', NULL, NULL, '2020-05-28 19:30:14', '2020-05-28 19:30:14', NULL),
(6, 'Offers1', 'What is your return policy?', '<p><em>We allow returns of all items within 30 days of your order date. Just send us an email with your order number and we will send you a return label</em></p>', NULL, NULL, '2020-05-28 19:56:26', '2020-05-28 19:56:26', NULL),
(7, 'Offers2', 'Do you test on animals?', '<p><em>&nbsp;Animal testing is dfg an issue ff that we have considered deeply in our mission statement and business practices. We are part of the Leaping Bunny Certification programme, the gold standard for cruelty-free certification&hellip; &larr; boring, not a clear answer.</em></p>', NULL, NULL, '2020-05-28 19:57:12', '2020-05-28 19:57:12', NULL),
(8, 'Offers3', 'HOW CAN I CHANGE MY SHIPPING ADDRESS?', '<p>By default, the lasft ff used shipping address will be saved into to your Sample Store account. When you are checking out your order, the default shipping address will be displayed and you have the option to amend it if you need to.</p>', NULL, NULL, '2020-05-28 20:01:22', '2020-05-28 20:01:22', NULL),
(9, 'Order delivery', 'HOW DO I ACTIVATE MY ACCOUNT?', '<p>The instructions ff to activate your account will be sent to your email once you have submitted the registration form. If you did not receive this email, your email service provider&rsquo;s mailing software may be blocking it. You can try checking your junk / spam folder or contact us at help@samplestore.com</p>', NULL, NULL, '2020-05-28 20:02:31', '2020-05-28 20:02:31', NULL),
(10, 'Order deliveryd', 'WHAT DO YOU MEAN BY POINTS? HOW DO I EARN IT?', '<p>Because you are important to us, we want to know what you think about the products. As an added value, every time you rate the products you earn points which go straight to your account. 1 point are added to your account for every review that you give. You will need those points in order to redeem the sample products. So keep rating the products to keep earning points!</p>', NULL, NULL, '2020-05-28 20:03:20', '2020-10-08 13:23:14', NULL),
(11, 'Late delivery', 'HOW CAN I USE MY REMAINING ACCOUNT CREDITS?', '<p>We are in the process of removing the option to pay for your orders by &lsquo;Account Credits&rsquo;. If you have remaining credits in your account, it will be used to pay for your next checkout. If there are insufficient credits, the system will direct you automatically to pay the balance via Paypal.</p>', NULL, NULL, '2020-05-28 20:04:28', '2020-05-28 20:04:28', NULL),
(12, 'Order delivery1', 'WHY MUST I MAKE PAYMENT IMMEDIATELY AT CHECKOUT?', '<p>Sample ordering is on &lsquo;first-come-first-served&rsquo; basis. To ensure that you get your desired samples, it is recommended that you make your payment within 60 minutes of checking out</p>', NULL, NULL, '2020-05-28 20:09:02', '2020-05-28 20:09:02', NULL),
(13, 'New release', 'HOW MANY FREE SAMPLES CAN I REDEEM?', '<p>Due to the limited quantity, each member&#39;s account is only entitled to 1 unique free sample. You can check out up to 4 free samples in each checkout.</p>', NULL, NULL, '2020-05-28 20:10:02', '2020-05-28 20:10:02', NULL),
(14, 'New release1', 'Can we Return the Product available', '<p>Yestest</p>', NULL, NULL, '2020-08-25 01:56:01', '2020-10-30 08:46:57', NULL),
(15, 'available ', 'available ', '<p>available </p>', NULL, NULL, '2020-10-08 13:20:55', '2020-10-08 13:20:55', NULL),
(16, 'Kiruchi', 'ewedw', '<p>qdwafwfsefafeafg 3 3 w34 wt</p>', NULL, NULL, '2020-10-09 12:53:04', '2020-10-09 12:53:04', NULL),
(17, 'Can i able to get the product before the Delivery time', 'Can i able to get the product before the Delivery time', '<p>Yes&nbsp;</p>', NULL, NULL, '2020-10-14 06:47:37', '2020-10-14 06:47:37', NULL),
(18, 'Can  i able to return After 10days', 'Can  i able to return After 10days', '<p>yes</p>', NULL, NULL, '2020-12-15 14:46:16', '2020-12-15 14:46:16', NULL),
(19, 'How do i deactivate my account', 'How do i deactivate my account', '<p>xxx</p>', NULL, NULL, '2020-12-30 14:25:27', '2020-12-30 14:25:43', '2020-12-30 14:25:43');

-- --------------------------------------------------------

--
-- Table structure for table `faults_image`
--

CREATE TABLE `faults_image` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fault_id` int(11) DEFAULT NULL,
  `fault_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faults_returns`
--

CREATE TABLE `faults_returns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `order_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `assign_staff_id` int(11) DEFAULT NULL,
  `remarks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faults_returns_history`
--

CREATE TABLE `faults_returns_history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fault_id` int(11) DEFAULT NULL,
  `remarks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('pending','processing','completed') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `featured_videos`
--

CREATE TABLE `featured_videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `video_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_link` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `type` enum('Home','Help','Category') COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `merchandise_master`
--

CREATE TABLE `merchandise_master` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `artist_id` int(11) DEFAULT NULL,
  `creation_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `merchandise_master`
--

INSERT INTO `merchandise_master` (`id`, `product_id`, `artist_id`, `creation_name`, `created_at`) VALUES
(1, 1, 321, 'T', '2021-08-05 11:09:36'),
(2, 1, 321, 'T', '2021-08-05 11:09:39'),
(3, 1, 321, 'QA Teddy', '2021-08-05 11:13:47'),
(4, 1, 321, 'QA Teddy', '2021-08-05 11:13:48');

-- --------------------------------------------------------

--
-- Table structure for table `merchandise_products`
--

CREATE TABLE `merchandise_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_variant_id` bigint(20) UNSIGNED DEFAULT NULL,
  `artist_id` bigint(20) UNSIGNED NOT NULL,
  `artist_category_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merchandise_master_id` int(11) DEFAULT NULL,
  `name_creation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `merchandise_product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `artist_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actual_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=Active; 0=Inactive',
  `approved_by` bigint(20) DEFAULT NULL,
  `approved_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `merchandise_products`
--

INSERT INTO `merchandise_products` (`id`, `product_id`, `product_variant_id`, `artist_id`, `artist_category_id`, `merchandise_master_id`, `name_creation`, `merchandise_product_name`, `product_price`, `artist_price`, `actual_price`, `image`, `status`, `approved_by`, `approved_at`, `deleted_at`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 321, '1', 1, 'Teddy', 'Toys', '250', '50', NULL, NULL, 1, NULL, NULL, '2021-08-05 11:10:11', 321, 321, '2021-08-05 11:09:36', '2021-08-05 11:10:11'),
(2, 1, 3, 321, '1', 2, 'Teddy', 'Toys', '250', '50', NULL, NULL, 1, NULL, NULL, '2021-08-05 11:10:14', 321, 321, '2021-08-05 11:09:39', '2021-08-05 11:10:14'),
(3, 1, 1, 321, '2', 3, 'Teddy', 'Toys', '250', '50', NULL, NULL, 1, NULL, NULL, NULL, 321, 321, '2021-08-05 11:13:47', '2021-08-05 11:13:47'),
(4, 1, 1, 321, '2', 4, 'Teddy', 'Toys', '250', '50', NULL, NULL, 1, NULL, NULL, NULL, 321, 321, '2021-08-05 11:13:48', '2021-08-05 11:13:48');

-- --------------------------------------------------------

--
-- Table structure for table `merchandise_product_files`
--

CREATE TABLE `merchandise_product_files` (
  `id` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `merch_product_id` bigint(20) NOT NULL,
  `product_variant_id` bigint(20) NOT NULL,
  `type` enum('image','layer') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `merchandise_product_files`
--

INSERT INTO `merchandise_product_files` (`id`, `product_id`, `merch_product_id`, `product_variant_id`, `type`, `image`, `file`, `created_at`, `updated_at`) VALUES
('0Mpf35QuCsHWCErw1Y6dPZESaERxpCpv', 1, 1, 3, 'layer', '56d92b77cc0fe790195c4165407943dc.png', '56d92b77cc0fe790195c4165407943dc.pdf', '2021-08-05 11:09:41', '2021-08-05 11:09:41'),
('8wjwVY4u55kAwzpRntTwjIuy2HIybXxw', 1, 3, 1, 'layer', '92d9a2ad89728d4c9736b176cda80003.png', '92d9a2ad89728d4c9736b176cda80003.pdf', '2021-08-05 11:13:47', '2021-08-05 11:13:47'),
('Ma1XCCkUYBB8ZOOtXliDqes9RSfuqVS5', 1, 1, 3, 'layer', '13100a85a8793c8490efc4e6cd46eff8.png', '13100a85a8793c8490efc4e6cd46eff8.pdf', '2021-08-05 11:09:44', '2021-08-05 11:09:44'),
('QRQSB6coOy4quKPzU3DCBypqfs2YiwbS', 1, 1, 3, 'layer', 'd9bde616340ac2088517a8a2c45d94af.png', 'd9bde616340ac2088517a8a2c45d94af.pdf', '2021-08-05 11:09:39', '2021-08-05 11:09:39'),
('tl18s4bK0D8avc5KyElSe27HTx1vfIoO', 1, 1, 3, 'layer', 'abe5a2510764dc68ace54c12ae72cf3c.png', 'abe5a2510764dc68ace54c12ae72cf3c.pdf', '2021-08-05 11:09:52', '2021-08-05 11:09:52');

-- --------------------------------------------------------

--
-- Table structure for table `merchandise_product_images`
--

CREATE TABLE `merchandise_product_images` (
  `id` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `merch_product_id` bigint(20) NOT NULL,
  `product_variant_id` bigint(20) NOT NULL,
  `type` enum('image','layer') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort` int(64) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `merchandise_product_images`
--

INSERT INTO `merchandise_product_images` (`id`, `product_id`, `merch_product_id`, `product_variant_id`, `type`, `image`, `file`, `sort`, `created_at`, `updated_at`) VALUES
('KQRPhZ4wD9n8qiJvytyIleUkVbiI0k8C', 1, 4, 1, 'image', '5ee6b3fde530e9761be8be59aa399e67.png', '5ee6b3fde530e9761be8be59aa399e67.pdf', 0, '2021-08-05 11:13:48', '2021-08-05 11:13:48');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(38, '2014_10_12_000000_create_users_table', 1),
(39, '2014_10_12_100000_create_password_resets_table', 1),
(40, '2019_09_30_073511_create_suppliers_table', 1),
(41, '2019_09_30_085159_create_admins_table', 1),
(42, '2019_10_01_115755_create_categories_table', 1),
(43, '2019_10_04_124237_create_faqs_table', 1),
(44, '2019_10_07_075217_create_products_table', 1),
(45, '2019_10_07_085349_create_product_variants_table', 1),
(46, '2019_10_07_114745_create_cms_table', 1),
(47, '2019_10_11_063915_create_preset_collections_table', 1),
(48, '2019_10_11_065503_create_product_collections_table', 1),
(49, '2019_10_16_120005_create_featured_videos_table', 1),
(50, '2019_10_18_065825_create_permission_tables', 1),
(51, '2019_11_19_102936_create_enquiry_table', 1),
(52, '2019_11_29_062047_create_revenue_sharing_table', 1),
(53, '2019_11_29_092905_add_deletestatus_field_to_revenue_sharing_table', 1),
(54, '2019_12_11_115856_add_facebook_id_field_to_users_table', 1),
(55, '2019_12_11_120902_add_twitter_id_field_to_users_table', 1),
(56, '2019_12_12_115538_add_width_field_to_products_table', 1),
(57, '2019_12_12_115638_add_height_field_to_products_table', 1),
(58, '2019_12_12_121539_add_height_field_to_product_variants_table', 1),
(59, '2019_12_12_121619_add_width_field_to_product_variants_table', 1),
(60, '2019_12_12_121733_add_top_field_to_product_variants_table', 1),
(61, '2019_12_12_121826_add_left_field_to_product_variants_table', 1),
(62, '2019_12_19_121938_add_deleted_at_field_to_users_table', 1),
(63, '2019_12_19_122345_add_deleted_at_field_to_roles_table', 1),
(64, '2019_12_19_124519_add_deleted_at_field_to_suppliers_table', 1),
(65, '2019_12_19_131622_add_deleted_at_field_to_categories_table', 1),
(66, '2019_12_19_142735_add_deleted_at_field_to_faqs_table', 1),
(67, '2019_12_19_143814_add_deleted_at_field_to_cms_table', 1),
(68, '2019_12_20_065217_add_deleted_at_field_to_preset_collections_table', 1),
(69, '2019_12_20_065258_add_deleted_at_field_to_product_collections_table', 1),
(70, '2019_12_20_085055_add_deleted_at_field_to_products_table', 1),
(71, '2019_12_20_091136_add_deleted_at_field_to_featured_videos_table', 1),
(72, '2019_12_27_114356_create_notifications_table', 1),
(73, '2020_01_06_061500_create_merchandise_products_table', 1),
(74, '2020_01_09_142624_create_merchandise_product_details_table', 1),
(75, '2020_05_05_175247_create_products_table', 2),
(76, '2020_05_06_122852_create_product_options_table', 2),
(77, '2020_05_06_142852_create_product_option_values_table', 2),
(78, '2020_05_06_162852_create_product_variants_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(10, 'App\\User', 4),
(10, 'App\\User', 21),
(1, 'App\\User', 45),
(11, 'App\\User', 81),
(10, 'App\\User', 101),
(10, 'App\\User', 127),
(10, 'App\\User', 158),
(11, 'App\\User', 180);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('2a6c98a9-bda0-4a59-a5f2-a89493c71da8', 'App\\Notifications\\MyOrderNotification', 'App\\User', 1, '{\"id\":1,\"url\":\"admin\\/order_view\\/1\"}', NULL, '2021-08-05 11:39:42', '2021-08-05 11:39:42'),
('35db8fda-c567-49b4-95a0-d1b553565f2f', 'App\\Notifications\\MyOrderNotification', 'App\\User', 1, '{\"id\":3,\"url\":\"admin\\/order_view\\/3\"}', NULL, '2021-08-05 16:10:19', '2021-08-05 16:10:19'),
('46af7b49-711c-4a7d-a2e6-e281e0c43f95', 'App\\Notifications\\MyOrderNotification', 'App\\User', 1, '{\"id\":3,\"url\":\"admin\\/order_view\\/3\"}', NULL, '2021-08-05 16:10:28', '2021-08-05 16:10:28'),
('4e247ad3-fddf-4289-962f-6e1a9690c481', 'App\\Notifications\\MyOrderNotification', 'App\\User', 1, '{\"id\":2,\"url\":\"admin\\/order_view\\/2\"}', NULL, '2021-08-05 14:46:06', '2021-08-05 14:46:06'),
('57e041c6-10a3-4e27-a0ff-2a991b484bb5', 'App\\Notifications\\MyOrderNotification', 'App\\User', 1, '{\"id\":1,\"url\":\"admin\\/order_view\\/1\"}', NULL, '2021-08-05 11:40:10', '2021-08-05 11:40:10'),
('7ddab80e-9c1c-45ff-b4e6-d8a966298b72', 'App\\Notifications\\MyOrderNotification', 'App\\User', 1, '{\"id\":2,\"url\":\"admin\\/order_view\\/2\"}', NULL, '2021-08-05 14:46:34', '2021-08-05 14:46:34');

-- --------------------------------------------------------

--
-- Table structure for table `order_customer_address_management`
--

CREATE TABLE `order_customer_address_management` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `delivery_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zipcode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `landmark` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_primary` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 - Yes, 0 - No',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 - Active, 0 - Deactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_customer_address_management`
--

INSERT INTO `order_customer_address_management` (`id`, `delivery_name`, `customer_id`, `no`, `street_1`, `street_2`, `region`, `country`, `zipcode`, `contact_no`, `landmark`, `is_primary`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Sudalai', '321', '71', 'QA TEST', NULL, 'Chennai', 'Indoa', '658003', '0846085343', NULL, 0, 1, '2021-08-05 11:39:36', '2021-08-05 11:39:36', NULL),
(2, 'prasanna', '187', 'prasanna', 'eegfsedgfs', 'goiu', 'Madhya Pradesh', '654', '605020', '9003303914', NULL, 0, 1, '2021-08-05 16:10:14', '2021-08-05 16:10:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merchandise_product_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `artist_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `artist_percent` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `artist_revenue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `affiliate_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `affiliate_percent` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `affiliate_revenue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_percent` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_revenue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 - Pending, 2 - Completed, 3 - Cancelled, 4 - Return',
  `customer_id` int(64) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`id`, `order_id`, `merchandise_product_id`, `supplier_id`, `product_price`, `product_quantity`, `artist_id`, `artist_percent`, `artist_revenue`, `affiliate_id`, `affiliate_percent`, `affiliate_revenue`, `admin_percent`, `admin_revenue`, `status`, `customer_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '1', '4', '27', '250', '1', '321', '10', '25', '0', '10', '25', '10', '25', 1, 321, NULL, '2021-08-05 11:39:42', '2021-08-05 11:39:42'),
(2, '2', '4', '27', '250', '1', '321', '10', '25', '0', '10', '25', '10', '25', 1, 321, NULL, '2021-08-05 14:46:06', '2021-08-05 14:46:06'),
(3, '3', '4', '27', '250', '1', '321', '10', '25', '0', '10', '25', '10', '25', 1, 187, NULL, '2021-08-05 16:10:19', '2021-08-05 16:10:19');

-- --------------------------------------------------------

--
-- Table structure for table `order_management`
--

CREATE TABLE `order_management` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cart_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_ref_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_address_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_item_count` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `packing_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `packing_amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_total` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_total` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_total` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_total` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grand_total` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `artist_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `artist_percent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `artist_revenue` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `affiliate_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `affiliate_percent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `affiliate_revenue` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_percent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_revenue` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_api_response` text COLLATE utf8mb4_unicode_ci,
  `notes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 - Pending, 2 - Completed, 3 - Cancelled, 4 - Return',
  `return_status` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `release_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_management`
--

INSERT INTO `order_management` (`id`, `order_id`, `cart_id`, `order_ref_number`, `customer_id`, `billing_address_id`, `shipping_address_id`, `payment_type`, `shipping_item_count`, `packing_name`, `packing_amount`, `delivery_amount`, `sub_total`, `tax_total`, `discount_total`, `shipping_total`, `grand_total`, `artist_id`, `artist_percent`, `artist_revenue`, `affiliate_id`, `affiliate_percent`, `affiliate_revenue`, `admin_percent`, `admin_revenue`, `order_api_response`, `notes`, `status`, `return_status`, `release_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '#ORDER20210000001', '1', 'ch_1JKzmPBgoBYViK1lNTUGz2ug', '321', '1', '1', '1', '1', 'Rain Proof', '15', '100', '250', '0', '0', '0', '365', '321', '10', '25', '0', '10', '25', '10', '25', '{\"id\":\"ch_1JKzmPBgoBYViK1lNTUGz2ug\",\"object\":\"charge\",\"amount\":36500,\"amount_captured\":36500,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"application_fee_amount\":null,\"balance_transaction\":\"txn_1JKzmQBgoBYViK1liOVd2EXW\",\"billing_details\":{\"address\":{\"city\":null,\"country\":null,\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"email\":null,\"name\":null,\"phone\":null},\"calculated_statement_descriptor\":\"Stripe\",\"captured\":true,\"created\":1628143809,\"currency\":\"inr\",\"customer\":null,\"description\":\"#ORDER20210000001\",\"destination\":null,\"dispute\":null,\"disputed\":false,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":[],\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"risk_score\":20,\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"payment_intent\":null,\"payment_method\":\"card_1JKzmOBgoBYViK1lpJvMAU0c\",\"payment_method_details\":{\"card\":{\"brand\":\"visa\",\"checks\":{\"address_line1_check\":null,\"address_postal_code_check\":null,\"cvc_check\":\"pass\"},\"country\":\"US\",\"exp_month\":7,\"exp_year\":2024,\"fingerprint\":\"kIxy2QdHefNBlv5R\",\"funding\":\"credit\",\"installments\":null,\"last4\":\"4242\",\"network\":\"visa\",\"three_d_secure\":null,\"wallet\":null},\"type\":\"card\"},\"receipt_email\":null,\"receipt_number\":null,\"receipt_url\":\"https:\\/\\/pay.stripe.com\\/receipts\\/acct_1GuxWGBgoBYViK1l\\/ch_1JKzmPBgoBYViK1lNTUGz2ug\\/rcpt_JyxhzcKtLJtBZuIIDtFpodZFdZ3P9X9\",\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_1JKzmPBgoBYViK1lNTUGz2ug\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1JKzmOBgoBYViK1lpJvMAU0c\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":null,\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":7,\"exp_year\":2024,\"fingerprint\":\"kIxy2QdHefNBlv5R\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":null,\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}', '', 2, '0', NULL, '2021-08-05 11:39:42', '2021-08-05 11:40:22', NULL),
(2, '#ORDER20210000002', '2', 'ch_1JL2gnBgoBYViK1lvYBNfsHs', '321', '1', '1', '1', '1', 'Carton', '5', '100', '250', '0', '0', '0', '355', '321', '10', '25', '0', '10', '25', '10', '25', '{\"id\":\"ch_1JL2gnBgoBYViK1lvYBNfsHs\",\"object\":\"charge\",\"amount\":35500,\"amount_captured\":35500,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"application_fee_amount\":null,\"balance_transaction\":\"txn_1JL2goBgoBYViK1l5yFqrE1x\",\"billing_details\":{\"address\":{\"city\":null,\"country\":null,\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"email\":null,\"name\":null,\"phone\":null},\"calculated_statement_descriptor\":\"Stripe\",\"captured\":true,\"created\":1628154993,\"currency\":\"inr\",\"customer\":null,\"description\":\"#ORDER20210000002\",\"destination\":null,\"dispute\":null,\"disputed\":false,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":[],\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"risk_score\":39,\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"payment_intent\":null,\"payment_method\":\"card_1JL2gmBgoBYViK1lB4Am6tsn\",\"payment_method_details\":{\"card\":{\"brand\":\"visa\",\"checks\":{\"address_line1_check\":null,\"address_postal_code_check\":null,\"cvc_check\":\"pass\"},\"country\":\"US\",\"exp_month\":3,\"exp_year\":2024,\"fingerprint\":\"kIxy2QdHefNBlv5R\",\"funding\":\"credit\",\"installments\":null,\"last4\":\"4242\",\"network\":\"visa\",\"three_d_secure\":null,\"wallet\":null},\"type\":\"card\"},\"receipt_email\":null,\"receipt_number\":null,\"receipt_url\":\"https:\\/\\/pay.stripe.com\\/receipts\\/acct_1GuxWGBgoBYViK1l\\/ch_1JL2gnBgoBYViK1lvYBNfsHs\\/rcpt_Jz0icECWsSbdxTfIhr5S1PjoEvP8zMr\",\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_1JL2gnBgoBYViK1lvYBNfsHs\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1JL2gmBgoBYViK1lB4Am6tsn\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":null,\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":3,\"exp_year\":2024,\"fingerprint\":\"kIxy2QdHefNBlv5R\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":null,\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}', '', 2, '0', NULL, '2021-08-05 14:46:06', '2021-08-05 14:46:46', NULL),
(3, '#ORDER20210000003', '3', 'ch_1JL3zzBgoBYViK1lbrOvUdaS', '187', '2', '2', '1', '1', 'Carton', '5', '100', '250', '0', '0', '0', '355', '321', '10', '25', '0', '10', '25', '10', '25', '{\"id\":\"ch_1JL3zzBgoBYViK1lbrOvUdaS\",\"object\":\"charge\",\"amount\":35500,\"amount_captured\":35500,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"application_fee_amount\":null,\"balance_transaction\":\"txn_1JL400BgoBYViK1lrLsrV5iX\",\"billing_details\":{\"address\":{\"city\":null,\"country\":null,\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"email\":null,\"name\":null,\"phone\":null},\"calculated_statement_descriptor\":\"Stripe\",\"captured\":true,\"created\":1628160027,\"currency\":\"inr\",\"customer\":null,\"description\":\"#ORDER20210000003\",\"destination\":null,\"dispute\":null,\"disputed\":false,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":[],\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"risk_score\":27,\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"payment_intent\":null,\"payment_method\":\"card_1JL3zzBgoBYViK1lm5ZVSVy8\",\"payment_method_details\":{\"card\":{\"brand\":\"visa\",\"checks\":{\"address_line1_check\":null,\"address_postal_code_check\":null,\"cvc_check\":\"pass\"},\"country\":\"US\",\"exp_month\":9,\"exp_year\":2024,\"fingerprint\":\"kIxy2QdHefNBlv5R\",\"funding\":\"credit\",\"installments\":null,\"last4\":\"4242\",\"network\":\"visa\",\"three_d_secure\":null,\"wallet\":null},\"type\":\"card\"},\"receipt_email\":null,\"receipt_number\":null,\"receipt_url\":\"https:\\/\\/pay.stripe.com\\/receipts\\/acct_1GuxWGBgoBYViK1l\\/ch_1JL3zzBgoBYViK1lbrOvUdaS\\/rcpt_Jz24Nntk7Aa7Fxlv2LISxel1cOOj90G\",\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_1JL3zzBgoBYViK1lbrOvUdaS\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1JL3zzBgoBYViK1lm5ZVSVy8\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":null,\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":9,\"exp_year\":2024,\"fingerprint\":\"kIxy2QdHefNBlv5R\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":null,\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}', '', 2, '0', NULL, '2021-08-05 16:10:19', '2021-08-05 16:10:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_status_label`
--

CREATE TABLE `order_status_label` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_status_label` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_status_label`
--

INSERT INTO `order_status_label` (`id`, `order_status_label`, `created_at`, `updated_at`) VALUES
(1, 'Ready To Ship', NULL, NULL),
(2, 'Shipped', NULL, NULL),
(3, 'Arrived Hub', NULL, NULL),
(4, 'Out for Delivery', NULL, NULL),
(5, 'Deliverd', NULL, NULL),
(6, 'Cancelled', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', '2019-10-17 20:40:06', '2019-10-17 20:40:06'),
(2, 'role-create', 'web', '2019-10-17 20:40:06', '2019-10-17 20:40:06'),
(3, 'role-edit', 'web', '2019-10-17 20:40:06', '2019-10-17 20:40:06'),
(4, 'role-delete', 'web', '2019-10-17 20:40:06', '2019-10-17 20:40:06'),
(5, 'user-list', 'web', '2019-10-17 20:40:06', '2019-10-17 20:40:06'),
(6, 'user-create', 'web', '2019-10-17 20:40:07', '2019-10-17 20:40:07'),
(7, 'user-edit', 'web', '2019-10-17 20:40:07', '2019-10-17 20:40:07'),
(8, 'user-delete', 'web', '2019-10-17 20:40:07', '2019-10-17 20:40:07'),
(9, 'supplier-list', 'web', '2019-10-17 20:40:08', '2019-10-17 20:40:08'),
(10, 'supplier-create', 'web', '2019-10-17 20:40:08', '2019-10-17 20:40:08'),
(11, 'supplier-edit', 'web', '2019-10-17 20:40:08', '2019-10-17 20:40:08'),
(12, 'supplier-delete', 'web', '2019-10-17 20:40:08', '2019-10-17 20:40:08'),
(13, 'category-list', 'web', '2019-10-17 20:40:08', '2019-10-17 20:40:08'),
(14, 'category-create', 'web', '2019-10-17 20:40:08', '2019-10-17 20:40:08'),
(15, 'category-edit', 'web', '2019-10-17 20:40:08', '2019-10-17 20:40:08'),
(16, 'category-delete', 'web', '2019-10-17 20:40:08', '2019-10-17 20:40:08'),
(17, 'faq-list', 'web', '2019-10-17 20:40:08', '2019-10-17 20:40:08'),
(18, 'faq-create', 'web', '2019-10-17 20:40:09', '2019-10-17 20:40:09'),
(19, 'faq-edit', 'web', '2019-10-17 20:40:09', '2019-10-17 20:40:09'),
(20, 'faq-delete', 'web', '2019-10-17 20:40:09', '2019-10-17 20:40:09'),
(21, 'cms-list', 'web', '2019-10-17 20:40:09', '2019-10-17 20:40:09'),
(22, 'cms-create', 'web', '2019-10-17 20:40:09', '2019-10-17 20:40:09'),
(23, 'cms-edit', 'web', '2019-10-17 20:40:09', '2019-10-17 20:40:09'),
(24, 'cms-delete', 'web', '2019-10-17 20:40:09', '2019-10-17 20:40:09'),
(25, 'videos-list', 'web', '2019-10-17 20:40:09', '2019-10-17 20:40:09'),
(26, 'videos-create', 'web', '2019-10-17 20:40:09', '2019-10-17 20:40:09'),
(27, 'videos-delete', 'web', '2019-10-17 20:40:09', '2019-10-17 20:40:09'),
(28, 'preset-list', 'web', '2019-10-17 20:40:09', '2019-10-17 20:40:09'),
(29, 'preset-create', 'web', '2019-10-17 20:40:10', '2019-10-17 20:40:10'),
(30, 'preset-edit', 'web', '2019-10-17 20:40:10', '2019-10-17 20:40:10'),
(31, 'preset-delete', 'web', '2019-10-17 20:40:10', '2019-10-17 20:40:10'),
(32, 'artist-list', 'web', '2019-10-17 20:40:06', '2019-10-17 20:40:06'),
(33, 'artist-create', 'web', '2019-10-17 20:40:07', '2019-10-17 20:40:07'),
(34, 'artist-edit', 'web', '2019-10-17 20:40:07', '2019-10-17 20:40:07'),
(35, 'artist-delete', 'web', '2019-10-17 20:40:07', '2019-10-17 20:40:07'),
(36, 'customer-list', 'web', '2019-10-17 20:40:06', '2019-10-17 20:40:06'),
(37, 'customer-create', 'web', '2019-10-17 20:40:07', '2019-10-17 20:40:07'),
(38, 'customer-edit', 'web', '2019-10-17 20:40:07', '2019-10-17 20:40:07'),
(39, 'customer-delete', 'web', '2019-10-17 20:40:07', '2019-10-17 20:40:07'),
(40, 'enquiry-list', 'web', '2019-10-17 20:40:06', '2019-10-17 20:40:06'),
(43, 'enquiry-delete', 'web', '2019-10-17 20:40:07', '2019-10-17 20:40:07'),
(44, 'revenue-list', 'web', '2019-10-17 20:40:06', '2019-10-17 20:40:06'),
(45, 'revenue-create', 'web', '2019-10-17 20:40:07', '2019-10-17 20:40:07'),
(46, 'revenue-edit', 'web', '2019-10-17 20:40:07', '2019-10-17 20:40:07'),
(47, 'revenue-delete', 'web', '2019-10-17 20:40:07', '2019-10-17 20:40:07'),
(48, 'product-list', 'web', '2019-10-17 20:40:06', '2019-10-17 20:40:06'),
(49, 'product-create', 'web', '2019-10-17 20:40:07', '2019-10-17 20:40:07'),
(50, 'product-edit', 'web', '2019-10-17 20:40:07', '2019-10-17 20:40:07'),
(51, 'product-delete', 'web', '2019-10-17 20:40:07', '2019-10-17 20:40:07'),
(52, 'fault-list', 'web', '2019-10-17 20:40:07', '2019-10-17 20:40:07'),
(53, 'fault-view', 'web', '2019-10-17 20:40:07', '2019-10-17 20:40:07'),
(54, 'fault-assign', 'web', '2019-10-17 20:40:07', '2019-10-17 20:40:07'),
(55, 'fault-status', 'web', '2019-10-17 20:40:07', '2019-10-17 20:40:07'),
(56, 'emoji-list', 'web', '2020-07-08 06:50:47', '2020-07-08 06:50:47'),
(57, 'emoji-create', 'web', '2020-07-08 06:50:47', '2020-07-08 06:50:47'),
(58, 'emoji-delete', 'web', '2020-07-08 06:50:47', '2020-07-08 06:50:47'),
(59, 'emoji-edit', 'web', '2020-07-08 06:50:47', '2020-07-08 06:50:47'),
(60, 'order-list', 'web', '2020-07-08 06:50:47', '2020-07-08 06:50:47'),
(61, 'order-create', 'web', '2020-07-08 06:50:47', '2020-07-08 06:50:47'),
(62, 'order-delete', 'web', '2020-07-08 06:50:47', '2020-07-08 06:50:47'),
(63, 'order-edit', 'web', '2020-07-08 06:50:47', '2020-07-08 06:50:47');

-- --------------------------------------------------------

--
-- Table structure for table `preset_collections`
--

CREATE TABLE `preset_collections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `collection_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `preset_collections`
--

INSERT INTO `preset_collections` (`id`, `collection_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'New Collection', '2021-03-18 11:42:40', '2021-03-18 11:42:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `print_types`
--

CREATE TABLE `print_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `print_type_name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `print_types`
--

INSERT INTO `print_types` (`id`, `print_type_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'embroidery', '0', '2020-09-17 10:38:46', '2020-09-17 10:39:14'),
(2, 'embroiderydg', '0', '2020-09-17 10:47:19', '2020-09-17 10:48:38'),
(3, 'Stickers', '0', '2020-09-17 10:48:49', '2021-01-22 11:16:10'),
(4, 'buttonstest', '1', '2020-09-17 11:11:42', '2021-05-21 15:48:47'),
(5, 'Button', '0', '2020-09-22 15:55:46', '2021-01-11 08:57:01'),
(7, 'smiely', '1', '2020-12-30 15:51:00', '2021-03-17 12:59:09'),
(9, 'testing', '1', '2021-01-22 11:15:42', '2021-01-22 11:15:42'),
(10, 'QA', '0', '2021-04-07 10:17:29', '2021-04-07 10:17:35'),
(12, 'testing23', '0', '2021-08-05 13:49:15', '2021-08-05 13:49:46'),
(13, 'dfdsf', '0', '2021-08-05 13:49:21', '2021-08-05 13:49:45'),
(14, 'ds', '0', '2021-08-05 13:49:29', '2021-08-05 13:49:44'),
(15, 'dscds', '0', '2021-08-05 13:49:34', '2021-08-05 13:49:43'),
(16, 'dfcds', '0', '2021-08-05 13:49:39', '2021-08-05 13:49:41');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_description` text COLLATE utf8mb4_unicode_ci,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `tax` decimal(8,2) DEFAULT NULL,
  `shipping_cost` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `supplier_id` bigint(20) UNSIGNED DEFAULT NULL,
  `reference_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `print_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `print_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved_additional_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved_additional_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desgin_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `sub_category_id`, `product_name`, `product_description`, `product_image`, `width`, `height`, `tax`, `shipping_cost`, `status`, `supplier_id`, `reference_number`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`, `print_type`, `print_price`, `approved_additional_type`, `approved_additional_price`, `desgin_type`) VALUES
(1, 1, NULL, 'QA Toys', 'This is a product description', NULL, 400, 600, '5.00', 100, 1, 27, '101', 1, 1, NULL, '2021-08-05 11:02:07', '2021-08-05 11:02:07', 'a:1:{i:0;s:1:\"7\";}', 'a:1:{i:0;N;}', NULL, NULL, NULL),
(2, 1, NULL, 'product 2', 'This is a product description', NULL, 500, 300, '5.00', 234, 1, 21, '9003303914', 1, 1, NULL, '2021-08-05 13:42:09', '2021-08-05 13:42:09', 'a:1:{i:0;s:1:\"4\";}', 'a:1:{i:0;N;}', NULL, NULL, NULL),
(3, 1, NULL, 'product3', 'This is a product description', NULL, 500, 300, '5.00', 345, 1, 21, '9003303918', 1, 1, NULL, '2021-08-05 13:44:38', '2021-08-05 13:44:38', 'N;', 'N;', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_collections`
--

CREATE TABLE `product_collections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `preset_collection_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_collections`
--

INSERT INTO `product_collections` (`id`, `product_id`, `preset_collection_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 97, 1, '2021-03-18 08:12:40', '2021-03-18 08:12:40', NULL),
(4, 95, 1, '2021-03-23 12:32:19', '2021-03-23 12:32:19', NULL),
(5, 102, 1, '2021-03-23 12:32:19', '2021-03-23 12:32:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `product_variant_id` bigint(20) NOT NULL,
  `image` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `sort` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `product_variant_id`, `image`, `status`, `sort`, `created_at`, `updated_at`) VALUES
('2F4VCEYAU6aTdBoKynebKtbep9DWubYG', 1, 3, '1476005256.jpg', 1, '1', '2021-08-05 11:02:07', '2021-08-05 11:02:07'),
('2YPQYYtvEqdFcJy42KV2xdpqQDMJS95Z', 1, 1, '2061051373.jpg', 1, '1', '2021-08-05 11:02:07', '2021-08-05 11:02:07'),
('B7AJ2P45UPghBq0umG30WgigxGu3ThTC', 1, 1, '961732873.jpg', 1, '1', '2021-08-05 11:02:07', '2021-08-05 11:02:07'),
('CXY0DabrfvcSVWrjX5JgPQHqzi00pqs0', 1, 3, '2061051373.jpg', 1, '1', '2021-08-05 11:02:07', '2021-08-05 11:02:07'),
('JTDU9legmAeLldkiYhUhcxVLOAGT2k1c', 1, 2, '961732873.jpg', 1, '1', '2021-08-05 11:02:07', '2021-08-05 11:02:07'),
('KLV0dv436zVh7FfZe5rMdG2Tyz9tVHJr', 1, 1, '1476005256.jpg', 1, '1', '2021-08-05 11:02:07', '2021-08-05 11:02:07'),
('ko1Ib3CBL1F42bo37E4leUjzBofpnnox', 1, 2, '2061051373.jpg', 1, '1', '2021-08-05 11:02:07', '2021-08-05 11:02:07'),
('Kv8sfAYdYjd9DzA5p3Gs4QIk3zumVOp2', 2, 4, '979687917.jpeg', 1, '1', '2021-08-05 13:42:09', '2021-08-05 13:42:09'),
('np0otyjOeFo3VAiyqrys55zXiEUkU1rl', 3, 5, '845981794.jpeg', 1, '1', '2021-08-05 13:44:38', '2021-08-05 13:44:38'),
('TS9IK5rMChQAT2wrcdNykoz8HydXJHto', 1, 2, '1476005256.jpg', 1, '1', '2021-08-05 11:02:07', '2021-08-05 11:02:07'),
('wm7Iaqb8O4UT95nrFm5L7nXOdNlEgYLd', 1, 3, '961732873.jpg', 1, '1', '2021-08-05 11:02:07', '2021-08-05 11:02:07');

-- --------------------------------------------------------

--
-- Table structure for table `product_options`
--

CREATE TABLE `product_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_options`
--

INSERT INTO `product_options` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'size', '2020-05-07 12:06:59', '2020-05-07 12:06:59'),
(2, 'colour', '2020-05-07 12:06:59', '2020-05-07 12:06:59');

-- --------------------------------------------------------

--
-- Table structure for table `product_option_values`
--

CREATE TABLE `product_option_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_option_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_option_values`
--

INSERT INTO `product_option_values` (`id`, `product_option_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'XL', '2020-05-07 13:06:14', '2020-05-07 13:06:14'),
(2, 2, 'Red', '2020-05-07 13:06:14', '2020-05-07 13:06:14'),
(3, 1, 'L', '2020-05-08 06:56:14', '2020-05-08 06:58:12'),
(4, 2, 'Blue', '2020-05-08 07:45:14', '2020-05-08 07:48:38'),
(5, 1, 'S', '2020-05-07 13:06:14', '2020-05-07 13:06:14'),
(6, 1, 'M', '2020-05-07 13:06:14', '2020-05-07 13:06:14'),
(7, 1, 'XS', '2020-05-07 13:06:14', '2020-05-07 13:06:14'),
(8, 1, 'XXL', '2020-05-07 13:06:14', '2020-05-07 13:06:14'),
(9, 2, 'Green', '2020-05-08 07:45:14', '2020-05-08 07:48:38'),
(10, 2, 'Orange', '2020-05-08 07:45:14', '2020-05-08 07:48:38'),
(11, 2, 'Purple', '2020-05-08 07:45:14', '2020-05-08 07:48:38'),
(12, 2, 'Pink', '2020-05-08 07:45:14', '2020-05-08 07:48:38');

-- --------------------------------------------------------

--
-- Table structure for table `product_promo_images`
--

CREATE TABLE `product_promo_images` (
  `id` int(11) NOT NULL,
  `product_id` int(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT '1',
  `sort` varchar(255) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product_variants`
--

CREATE TABLE `product_variants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `variant_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_id` bigint(20) UNSIGNED DEFAULT NULL,
  `value_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sku` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attributes` varchar(4096) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `quantites` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `print_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `print_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_variants`
--

INSERT INTO `product_variants` (`id`, `product_id`, `variant_name`, `option_id`, `value_id`, `sku`, `attributes`, `product_image`, `price`, `quantites`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`, `print_type`, `print_price`) VALUES
(1, 1, 'Toys', NULL, NULL, NULL, '[\"XL\",\"Red\"]', NULL, 200.00, '297', 1, 1, 1, NULL, NULL, NULL, 'a:1:{i:0;s:1:\"7\";}', 'a:1:{i:0;N;}'),
(2, 1, 'Toys', NULL, NULL, NULL, '[\"L\",\"Blue\"]', NULL, 200.00, '300', 1, 1, 1, NULL, NULL, NULL, 'a:1:{i:0;s:1:\"7\";}', 'a:1:{i:0;N;}'),
(3, 1, 'Toys', NULL, NULL, NULL, '[\"S\",\"Green\"]', NULL, 200.00, '300', 1, 1, 1, NULL, NULL, NULL, 'a:1:{i:0;s:1:\"7\";}', 'a:1:{i:0;N;}'),
(4, 2, 'product123', NULL, NULL, NULL, '[\"XL\",\"Red\"]', NULL, 400.00, '100', 1, 1, 1, NULL, NULL, NULL, 'a:1:{i:0;s:1:\"4\";}', 'a:1:{i:0;N;}'),
(5, 3, 'product987', NULL, NULL, NULL, '[\"XL\",\"Red\"]', NULL, 500.00, '200', 1, 1, 1, NULL, NULL, NULL, 'N;', 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `refferal`
--

CREATE TABLE `refferal` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `reg_id` int(11) DEFAULT NULL,
  `user_email` varchar(225) DEFAULT NULL,
  `description` varchar(225) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `revenue_sharing`
--

CREATE TABLE `revenue_sharing` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `setting_name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `setting_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `setting_value` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `affiliates_rates` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `artists_design_rates` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setting_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `setting_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `setting_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `setting_desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `revenue_sharing`
--

INSERT INTO `revenue_sharing` (`id`, `setting_name`, `setting_key`, `setting_value`, `affiliates_rates`, `artists_design_rates`, `setting_status`, `setting_created`, `setting_updated`, `setting_desc`, `deleted_at`) VALUES
(1, 'CJB Share', 'admin-default-commission', '10', NULL, NULL, '1', '2020-03-13 08:41:02', '2021-03-19 16:46:41', 'This is the admin default commission value.', NULL),
(2, 'Artist Default share', 'artist-default-commission', '10', NULL, NULL, '1', '2020-03-13 08:41:02', '2021-03-19 16:46:49', 'This is the artist default commission value.', NULL),
(3, 'Affiliate Default Share', 'affiliate-default-commission', '10', '10', '10', '1', '2020-03-13 06:41:02', '2021-03-19 16:47:04', 'This is the artist default commission value.', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_rating` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_review` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `review_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Super Admin', 'web', '2019-10-18 02:09:30', '2019-10-18 02:09:30', NULL),
(10, 'Super visor QA', 'web', '2020-08-25 04:47:50', '2020-08-31 03:34:22', NULL),
(11, 'Administrator', 'web', '2020-11-24 13:51:28', '2020-11-24 13:51:28', NULL),
(18, 'alpha', 'web', '2020-12-30 14:09:36', '2020-12-30 14:09:36', NULL),
(19, 'beta', 'web', '2020-12-30 14:09:49', '2020-12-30 14:09:49', NULL),
(21, 'Roles', 'web', '2020-12-30 14:10:23', '2021-01-11 08:22:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 10),
(2, 10),
(3, 10),
(4, 10),
(5, 10),
(6, 10),
(7, 10),
(8, 10),
(9, 10),
(10, 10),
(11, 10),
(12, 10),
(13, 10),
(14, 10),
(15, 10),
(16, 10),
(17, 10),
(18, 10),
(19, 10),
(20, 10),
(25, 10),
(26, 10),
(27, 10),
(32, 10),
(33, 10),
(34, 10),
(35, 10),
(36, 10),
(37, 10),
(38, 10),
(39, 10),
(48, 10),
(49, 10),
(50, 10),
(51, 10),
(52, 10),
(53, 10),
(54, 10),
(55, 10),
(56, 10),
(57, 10),
(58, 10),
(59, 10),
(60, 10),
(61, 10),
(62, 10),
(63, 10),
(1, 11),
(2, 11),
(3, 11),
(4, 11),
(5, 11),
(6, 11),
(7, 11),
(8, 11),
(9, 11),
(10, 11),
(11, 11),
(12, 11),
(13, 11),
(14, 11),
(15, 11),
(16, 11),
(17, 11),
(18, 11),
(19, 11),
(20, 11),
(21, 11),
(22, 11),
(23, 11),
(24, 11),
(25, 11),
(26, 11),
(27, 11),
(28, 11),
(29, 11),
(30, 11),
(31, 11),
(32, 11),
(33, 11),
(34, 11),
(35, 11),
(36, 11),
(37, 11),
(38, 11),
(39, 11),
(40, 11),
(43, 11),
(44, 11),
(45, 11),
(46, 11),
(47, 11),
(48, 11),
(49, 11),
(50, 11),
(51, 11),
(52, 11),
(53, 11),
(54, 11),
(55, 11),
(56, 11),
(57, 11),
(58, 11),
(59, 11),
(60, 11),
(61, 11),
(62, 11),
(63, 11),
(1, 18),
(2, 18),
(3, 18),
(4, 18),
(5, 18),
(6, 18),
(7, 18),
(8, 18),
(9, 18),
(10, 18),
(11, 18),
(12, 18),
(13, 18),
(14, 18),
(15, 18),
(16, 18),
(17, 18),
(18, 18),
(19, 18),
(20, 18),
(21, 18),
(22, 18),
(23, 18),
(24, 18),
(25, 18),
(26, 18),
(27, 18),
(28, 18),
(29, 18),
(30, 18),
(31, 18),
(32, 18),
(33, 18),
(34, 18),
(35, 18),
(36, 18),
(37, 18),
(38, 18),
(39, 18),
(40, 18),
(43, 18),
(44, 18),
(45, 18),
(46, 18),
(47, 18),
(48, 18),
(49, 18),
(50, 18),
(51, 18),
(52, 18),
(53, 18),
(54, 18),
(55, 18),
(56, 18),
(57, 18),
(58, 18),
(59, 18),
(60, 18),
(61, 18),
(62, 18),
(63, 18),
(1, 19),
(3, 19),
(4, 19),
(5, 19),
(6, 19),
(7, 19),
(8, 19),
(9, 19),
(11, 19),
(12, 19),
(13, 19),
(14, 19),
(15, 19),
(16, 19),
(17, 19),
(18, 19),
(19, 19),
(20, 19),
(21, 19),
(22, 19),
(23, 19),
(24, 19),
(25, 19),
(26, 19),
(27, 19),
(28, 19),
(29, 19),
(30, 19),
(31, 19),
(32, 19),
(33, 19),
(34, 19),
(35, 19),
(36, 19),
(37, 19),
(38, 19),
(39, 19),
(40, 19),
(43, 19),
(44, 19),
(45, 19),
(46, 19),
(47, 19),
(48, 19),
(49, 19),
(50, 19),
(51, 19),
(52, 19),
(53, 19),
(54, 19),
(55, 19),
(56, 19),
(57, 19),
(58, 19),
(59, 19),
(60, 19),
(61, 19),
(62, 19),
(63, 19),
(1, 21),
(2, 21),
(3, 21),
(4, 21),
(5, 21),
(6, 21),
(7, 21),
(8, 21),
(9, 21),
(10, 21),
(11, 21),
(12, 21),
(13, 21),
(14, 21),
(15, 21),
(16, 21),
(17, 21),
(18, 21),
(19, 21),
(20, 21),
(21, 21),
(22, 21),
(23, 21),
(24, 21),
(25, 21),
(26, 21),
(27, 21),
(28, 21),
(29, 21),
(30, 21),
(31, 21),
(32, 21),
(33, 21),
(34, 21),
(35, 21),
(36, 21),
(37, 21),
(38, 21),
(39, 21),
(40, 21),
(43, 21),
(44, 21),
(45, 21),
(46, 21),
(47, 21),
(48, 21),
(49, 21),
(50, 21),
(51, 21),
(52, 21),
(53, 21),
(54, 21),
(55, 21),
(56, 21),
(57, 21),
(58, 21),
(59, 21),
(60, 21),
(61, 21),
(62, 21),
(63, 21);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_info`
--

CREATE TABLE `shipping_info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci,
  `email` text COLLATE utf8mb4_unicode_ci,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `margin` double(8,2) DEFAULT NULL,
  `primary_conduct` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `general_notes` longtext COLLATE utf8mb4_unicode_ci,
  `payment_terms` longtext COLLATE utf8mb4_unicode_ci,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `email`, `phone_number`, `address`, `status`, `margin`, `primary_conduct`, `position`, `general_notes`, `payment_terms`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(21, 'prasanna sri', 'prasannasricse@outlook.com', '+446369611123', 'test description\r\ntest description', '0', NULL, '5858878678', 'qwwq', 'wwddd', 'ddd', NULL, NULL, '2021-04-21 13:13:44', '2021-08-03 17:53:17', NULL),
(27, 'sudalai', 'hsudalaiselvam55@outlook.com', '8233657388', 'Greams road,chennai.', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-05 10:47:31', '2021-08-05 10:47:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tracking_history`
--

CREATE TABLE `tracking_history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shipping_info_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_company` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tracking_num` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comments` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_status_id` int(11) NOT NULL DEFAULT '1',
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(4) DEFAULT NULL COMMENT '1=Artist;2=Customer;',
  `contact_number` bigint(20) DEFAULT NULL,
  `gender` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `address_1` text COLLATE utf8mb4_unicode_ci,
  `address_2` text COLLATE utf8mb4_unicode_ci,
  `city` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_code` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  `currency` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1=Active;0=Inactive;',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `facebook_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `about_me` text COLLATE utf8mb4_unicode_ci,
  `about_stats` text COLLATE utf8mb4_unicode_ci,
  `about_desc` text COLLATE utf8mb4_unicode_ci,
  `facebook_link` varchar(2047) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_link` varchar(2047) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_link` varchar(2047) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pinterest_link` varchar(2047) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_own_shop` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_mail` int(11) DEFAULT NULL,
  `marketing_mail` int(11) DEFAULT NULL,
  `bank_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` bigint(20) DEFAULT NULL,
  `account_holder_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `type`, `contact_number`, `gender`, `dob`, `address_1`, `address_2`, `city`, `state`, `country`, `post_code`, `profile_image`, `language`, `currency`, `status`, `remember_token`, `created_at`, `updated_at`, `facebook_id`, `twitter_id`, `deleted_at`, `about_me`, `about_stats`, `about_desc`, `facebook_link`, `twitter_link`, `instagram_link`, `pinterest_link`, `is_own_shop`, `account_mail`, `marketing_mail`, `bank_name`, `sort_code`, `account_number`, `account_holder_name`) VALUES
(1, 'admin Colan', 'admin', 'Colan', 'admin@example.com', NULL, '$2y$10$602Yd3yD3Qn7NKhTrik35u.G4tAkeevHBQHyHmsQhhspzuujcJD46', 0, NULL, 'male', '1997-05-05', NULL, NULL, NULL, NULL, NULL, NULL, '17624358.jpg', 'en', NULL, 1, NULL, '2019-12-15 20:33:59', '2021-08-02 13:53:47', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(178, 'sheik', 'sheik', 'colan', 'sheikmarch@yopmail.com', NULL, '$2y$10$FYoFACsKUCraTn2D7RkJLuvpdaK/xt8OT.CiTVrNom4rwG2dXseW.', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'en', NULL, 0, NULL, '2021-03-08 13:03:04', '2021-07-21 12:49:25', NULL, NULL, NULL, '<p>Test&nbsp;</p>', '<p>Test</p>', '<p>test</p>', NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL),
(187, 'AlexGordon', 'Alex', 'Gordon', 'alexandergordon@hotmail.com', NULL, '$2y$10$BxrRY0TVEIDR3ALxbzNctuPJ3QSkqjF93Gr0a6Gfax3USqecB7P8.', 1, 447809522444, NULL, NULL, '2 Corby Close', NULL, 'St Albans', NULL, NULL, 'AL2 3BB', '1618584540.png', 'en', NULL, 1, NULL, '2021-03-15 14:44:20', '2021-04-16 17:20:02', NULL, NULL, NULL, '<p>rger</p>', '<p>ertge</p>', '<p>ertgeg</p>', 'https://www.facebook.com/', NULL, NULL, NULL, '1', 1, NULL, 'barclays', '20-22-22', 3286921692137686, 'a gorodn'),
(201, 'sheikmay', 'Sheik', 'Colan', 'sheikmay@yopmail.com', NULL, '$2y$10$JNmPd11ReC/TGn6dgS/qgeV5TuuGhlmTlsLUXpRiRyO3SJvIEBw2e', 1, 8968575323, NULL, '0000-00-00', 'eegfsedgfs', 'goiu', 'Ambernath', NULL, NULL, '605020', NULL, 'en', NULL, 1, NULL, '2021-05-13 22:27:08', '2021-05-20 17:12:12', NULL, NULL, NULL, NULL, NULL, NULL, 'ttttttt', NULL, NULL, NULL, '1', NULL, NULL, 'fg', 'fgf', 5435324543543, 'yy'),
(214, 'sheiknew', 'sheik', 'new', 'sheik106@yopmail.com', NULL, '$2y$10$OGakFYQQYyAkQgFr8U8vLeR9MEKxvD/UqTzMHc2oWHOxkU2NgB2DK', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'en', NULL, 1, NULL, '2021-06-10 12:56:36', '2021-06-10 12:56:36', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL),
(232, 'prasannatest sri', 'prasannatest', 'sri', 'prasannasricse@gmail.com', NULL, 'eyJpdiI6IkdlQTd1eXNIUWdVU2NVZVpyZnFTVGc9PSIsInZhbHVlIjoiQkNqRVlJdlIwR3BNTXBUQnBhWThCZz09IiwibWFjIjoiZDlhMDgwZjg2MDM5MDhhNzVkYjIwNmY3MWRhMWNlODU5ODg5ZWY1ZGU0NTMyOWVjNDBlOWNiZGFmYTA3MzY1MCJ9', 1, 9003303934, 'male', '2021-06-07', 'eegfsedgfs', NULL, 'Madurai', 'Tamil Nadu', 'India', NULL, '/profile/809769785.png', 'en', NULL, 0, NULL, '2021-07-02 12:04:42', '2021-07-02 12:04:42', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(260, 'prasannasritest', 'prasannattttt', 'sri', 'prasannasricse@outlook.com', NULL, '$2y$10$0kVTYt3/Ig4hM7xbOeRXH.wRY3.dww50q.EwEU6NybfZHKOTPMPzW', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'en', NULL, 1, NULL, '2021-07-26 19:01:03', '2021-08-03 17:15:23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL),
(321, 'sudalaiartist1', 'sudalaiartist', '1', 'hsudalaiselvam55@outlook.com', NULL, '$2y$10$.VxTtjFrnKO4eBWcCrI4UOA/.S4CZGQAdmSfDvGt4PWNhUOB5RKPq', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'en', NULL, 1, NULL, '2021-08-05 11:07:13', '2021-08-05 11:07:13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merch_product_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `like` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address_book`
--
ALTER TABLE `address_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_logs`
--
ALTER TABLE `admin_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artist_category`
--
ALTER TABLE `artist_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artist_gallery`
--
ALTER TABLE `artist_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artist_merchandise_products`
--
ALTER TABLE `artist_merchandise_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artist_themes`
--
ALTER TABLE `artist_themes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `cart_item_management`
--
ALTER TABLE `cart_item_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_management`
--
ALTER TABLE `cart_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_created_by_foreign` (`created_by`),
  ADD KEY `categories_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `cjb_themes`
--
ALTER TABLE `cjb_themes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_commenter_id_commenter_type_index` (`commenter_id`,`commenter_type`),
  ADD KEY `comments_commentable_type_commentable_id_index` (`commentable_type`,`commentable_id`),
  ADD KEY `comments_child_id_foreign` (`child_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`countrycode`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `currencies_code_index` (`code`);

--
-- Indexes for table `delivery_and_packing`
--
ALTER TABLE `delivery_and_packing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emoji`
--
ALTER TABLE `emoji`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faults_image`
--
ALTER TABLE `faults_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faults_returns`
--
ALTER TABLE `faults_returns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faults_returns_history`
--
ALTER TABLE `faults_returns_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `featured_videos`
--
ALTER TABLE `featured_videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `featured_videos_created_by_foreign` (`created_by`),
  ADD KEY `featured_videos_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `merchandise_master`
--
ALTER TABLE `merchandise_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merchandise_products`
--
ALTER TABLE `merchandise_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `merchandise_products_product_id_foreign` (`product_id`),
  ADD KEY `merchandise_products_product_variant_id_foreign` (`product_variant_id`),
  ADD KEY `merchandise_products_artist_id_foreign` (`artist_id`);

--
-- Indexes for table `merchandise_product_files`
--
ALTER TABLE `merchandise_product_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merchandise_product_images`
--
ALTER TABLE `merchandise_product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `order_customer_address_management`
--
ALTER TABLE `order_customer_address_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_management`
--
ALTER TABLE `order_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status_label`
--
ALTER TABLE `order_status_label`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `preset_collections`
--
ALTER TABLE `preset_collections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `print_types`
--
ALTER TABLE `print_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_supplier_id_foreign` (`supplier_id`),
  ADD KEY `products_created_by_foreign` (`created_by`),
  ADD KEY `products_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `product_collections`
--
ALTER TABLE `product_collections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_options`
--
ALTER TABLE `product_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_option_values`
--
ALTER TABLE `product_option_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_option_values_product_option_id_foreign` (`product_option_id`);

--
-- Indexes for table `product_promo_images`
--
ALTER TABLE `product_promo_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_variants_sku_unique` (`sku`),
  ADD KEY `product_variants_product_id_foreign` (`product_id`),
  ADD KEY `product_variants_option_id_foreign` (`option_id`),
  ADD KEY `product_variants_value_id_foreign` (`value_id`);

--
-- Indexes for table `refferal`
--
ALTER TABLE `refferal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `revenue_sharing`
--
ALTER TABLE `revenue_sharing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `shipping_info`
--
ALTER TABLE `shipping_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `suppliers_created_by_foreign` (`created_by`),
  ADD KEY `suppliers_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `tracking_history`
--
ALTER TABLE `tracking_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_name_unique` (`name`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address_book`
--
ALTER TABLE `address_book`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_logs`
--
ALTER TABLE `admin_logs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `artist_category`
--
ALTER TABLE `artist_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `artist_gallery`
--
ALTER TABLE `artist_gallery`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `artist_merchandise_products`
--
ALTER TABLE `artist_merchandise_products`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `artist_themes`
--
ALTER TABLE `artist_themes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `cart_item_management`
--
ALTER TABLE `cart_item_management`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart_management`
--
ALTER TABLE `cart_management`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cjb_themes`
--
ALTER TABLE `cjb_themes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `delivery_and_packing`
--
ALTER TABLE `delivery_and_packing`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `emoji`
--
ALTER TABLE `emoji`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `faults_image`
--
ALTER TABLE `faults_image`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faults_returns`
--
ALTER TABLE `faults_returns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faults_returns_history`
--
ALTER TABLE `faults_returns_history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `featured_videos`
--
ALTER TABLE `featured_videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `merchandise_master`
--
ALTER TABLE `merchandise_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `merchandise_products`
--
ALTER TABLE `merchandise_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `order_customer_address_management`
--
ALTER TABLE `order_customer_address_management`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_management`
--
ALTER TABLE `order_management`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_status_label`
--
ALTER TABLE `order_status_label`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `preset_collections`
--
ALTER TABLE `preset_collections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `print_types`
--
ALTER TABLE `print_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_collections`
--
ALTER TABLE `product_collections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_options`
--
ALTER TABLE `product_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_option_values`
--
ALTER TABLE `product_option_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_promo_images`
--
ALTER TABLE `product_promo_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `refferal`
--
ALTER TABLE `refferal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `revenue_sharing`
--
ALTER TABLE `revenue_sharing`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `shipping_info`
--
ALTER TABLE `shipping_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tracking_history`
--
ALTER TABLE `tracking_history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=322;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `categories_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_child_id_foreign` FOREIGN KEY (`child_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `featured_videos`
--
ALTER TABLE `featured_videos`
  ADD CONSTRAINT `featured_videos_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `featured_videos_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `merchandise_products`
--
ALTER TABLE `merchandise_products`
  ADD CONSTRAINT `merchandise_products_artist_id_foreign` FOREIGN KEY (`artist_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `merchandise_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `merchandise_products_product_variant_id_foreign` FOREIGN KEY (`product_variant_id`) REFERENCES `product_variants` (`id`);

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`);

--
-- Constraints for table `product_option_values`
--
ALTER TABLE `product_option_values`
  ADD CONSTRAINT `product_option_values_product_option_id_foreign` FOREIGN KEY (`product_option_id`) REFERENCES `product_options` (`id`);

--
-- Constraints for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD CONSTRAINT `product_variants_option_id_foreign` FOREIGN KEY (`option_id`) REFERENCES `product_options` (`id`),
  ADD CONSTRAINT `product_variants_value_id_foreign` FOREIGN KEY (`value_id`) REFERENCES `product_option_values` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD CONSTRAINT `suppliers_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `suppliers_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
