-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2024 at 03:42 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `khateebazar_monetizebd12`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `advert_type` tinyint(4) NOT NULL,
  `advert_size` tinyint(4) NOT NULL,
  `title` varchar(191) NOT NULL,
  `val1` varchar(191) DEFAULT NULL,
  `val2` varchar(191) DEFAULT NULL,
  `link` text DEFAULT NULL,
  `hit` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertisements`
--

INSERT INTO `advertisements` (`id`, `advert_type`, `advert_size`, `title`, `val1`, `val2`, `link`, `hit`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Quisquam officiis ob', 'advert145961.png', NULL, 'Consequat Delectus', 0, 1, '2021-02-28 02:09:50', '2021-02-28 02:17:33'),
(2, 2, 2, 'Consectetur perspic', NULL, 'Nulla dolore perfere', NULL, 0, 1, '2021-02-28 02:17:45', '2021-02-28 02:18:00');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_name` varchar(191) NOT NULL,
  `note` varchar(191) NOT NULL,
  `bank_image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `payment_name`, `note`, `bank_image`, `created_at`, `updated_at`) VALUES
(1, 'Cash', 'Give me tk Office', '1716526203.png', NULL, '2024-05-23 22:50:03');

-- --------------------------------------------------------

--
-- Table structure for table `basic_settings`
--

CREATE TABLE `basic_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `meta_tag` text NOT NULL,
  `description` text NOT NULL,
  `footer` varchar(191) NOT NULL,
  `copy` varchar(191) NOT NULL,
  `faq` varchar(191) NOT NULL,
  `about` blob NOT NULL,
  `privacy` blob NOT NULL,
  `terms` blob NOT NULL,
  `currency` varchar(10) DEFAULT 'TK',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `basic_settings`
--

INSERT INTO `basic_settings` (`id`, `title`, `phone`, `email`, `address`, `meta_tag`, `description`, `footer`, `copy`, `faq`, `about`, `privacy`, `terms`, `currency`, `created_at`, `updated_at`) VALUES
(1, 'AdminLte3 Laravel 9', '0120012200', 'admin@gmail.com', 'ZCZXC', 'cms', 'lorem', 'footer', '<h5>CopyRights @ <a href=\"http://appllys.com\">SF </a>Technology</h5>', 'nothing', 0x61626f7574, 0x5072697661637920557064617465, 0x5465726d7320416e6420436f6e646974696f6e, 'TK', NULL, '2024-04-28 10:21:13');

-- --------------------------------------------------------

--
-- Table structure for table `bkashes`
--

CREATE TABLE `bkashes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_name` varchar(191) NOT NULL,
  `bkash_image` varchar(191) NOT NULL,
  `transaction_id` varchar(191) NOT NULL,
  `note` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bkashes`
--

INSERT INTO `bkashes` (`id`, `payment_name`, `bkash_image`, `transaction_id`, `note`, `created_at`, `updated_at`) VALUES
(6, 'Bkash', '1716524436.png', '01727204284', 'please send money', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `expense_catagories`
--

CREATE TABLE `expense_catagories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expense_catagories`
--

INSERT INTO `expense_catagories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'tea', '2024-06-10 09:03:40', NULL),
(2, 'rent', '2024-06-10 09:05:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` longtext NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Long established fact that a reader will be distracted by the readable', 'i am man howdk sa  f sfsdfksafjds f sadfndf dslfns  fdsfkdasjfa snfasdklf dsfhasdf a dfkadsjfklasdjfa sdf nfasdkf asdlkf akdfjasd klfjas askdfj akfasfad d  aksdfjaldsfjasdlfasdjfdsajf;laksdfjasdkfjasdklfasj;f ', 1, '2021-02-26 00:18:36', '2021-02-26 07:18:50');

-- --------------------------------------------------------

--
-- Table structure for table `keks`
--

CREATE TABLE `keks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `details` varchar(191) NOT NULL,
  `location` varchar(191) NOT NULL,
  `mobile` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `date` varchar(191) NOT NULL,
  `kekdelivarytime` varchar(191) NOT NULL,
  `kekerSongga` varchar(191) NOT NULL,
  `pound` varchar(191) NOT NULL,
  `sepname` varchar(191) NOT NULL,
  `kekerUprName` varchar(191) NOT NULL,
  `delivaryCharge` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `keks`
--

INSERT INTO `keks` (`id`, `name`, `details`, `location`, `mobile`, `email`, `date`, `kekdelivarytime`, `kekerSongga`, `pound`, `sepname`, `kekerUprName`, `delivaryCharge`, `created_at`, `updated_at`) VALUES
(2, 'Paloma Salinas', 'Laboris ut quae dolo', 'হোসেনপুর', 'Cupidatat in nihil c', 'ruha@mailinator.com', '2010-12-13', 'সকাল 5 টার আগে', 'Unde non consequuntu', '3 পাউন্ড', '2', 'Marsden Reed', '50', '2024-04-28 09:15:58', NULL),
(3, 'Reagan Gentry', 'Elit eos reprehende', 'তাড়াইল', '24354', 'catalo@mailinator.com', '1984-05-27', 'সকাল ১০ টার আগে', 'Tempora facilis duis', '4 পাউন্ড', '2', 'Tasha Boyer', '150', '2024-04-28 09:23:31', NULL),
(4, 'Tyler Weber', 'Nemo vel eos tempor', 'অন্যান্য', 'Laborum Quas nisi e', 'ciqe@mailinator.com', '1983-09-27', 'সকাল 5 টার আগে', 'Aut aut ex sint id', '5 পাউন্ড', '4', 'Nomlanga Flowers', '150', '2024-04-28 09:26:39', NULL),
(5, 'Hoyt Chandler', 'Numquam sed similiqu', 'পাকুন্দিয়া', 'Mollitia culpa perf', 'hysaxu@mailinator.com', '1988-03-30', 'যে কোন সময়', 'Sed consequuntur sun', '4 পাউন্ড', '1', 'Cadman Cote', '50', '2024-04-28 10:14:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2021_01_20_084958_create_permission_tables', 1),
(4, '2014_10_12_100000_create_password_resets_table', 2),
(5, '2021_01_20_103250_create_basic_settings_table', 3),
(6, '2021_02_25_131854_create_sliders_table', 4),
(7, '2021_02_25_160852_create_socials_table', 5),
(8, '2021_02_26_055724_create_faqs_table', 6),
(9, '2021_02_28_052435_create_advertisements_table', 7),
(10, '2023_11_09_023152_create_packages_table', 8),
(11, '2023_11_16_004856_create_orders_table', 9),
(12, '2024_03_24_164520_create_bkashes_table', 10),
(13, '2024_03_24_164543_create_nagads_table', 10),
(14, '2024_03_24_164601_create_banks_table', 10),
(15, '2024_04_27_154626_create_keks_table', 11),
(17, '2024_05_24_053049_create_transactions_table', 12),
(18, '2024_05_24_154235_create_expense_catagories_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(4, 'App\\User', 1),
(4, 'App\\User', 10),
(5, 'App\\User', 7),
(5, 'App\\User', 12);

-- --------------------------------------------------------

--
-- Table structure for table `nagads`
--

CREATE TABLE `nagads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_name` varchar(191) NOT NULL,
  `nagad_image` varchar(191) NOT NULL,
  `transaction_id` varchar(191) NOT NULL,
  `note` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nagads`
--

INSERT INTO `nagads` (`id`, `payment_name`, `nagad_image`, `transaction_id`, `note`, `created_at`, `updated_at`) VALUES
(1, 'Nagad', '1716524526.png', '01727204284', 'please send money', NULL, '2024-05-23 22:22:06');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `package_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(20) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `discount` double(8,2) NOT NULL DEFAULT 0.00,
  `status` varchar(23) NOT NULL DEFAULT 'unpaid',
  `transaction_id` varchar(191) DEFAULT NULL,
  `payment_method` varchar(191) DEFAULT NULL,
  `payment_ref_id` varchar(191) DEFAULT NULL,
  `page_url` varchar(255) DEFAULT NULL,
  `post_url` varchar(255) DEFAULT NULL,
  `platform` varchar(255) DEFAULT NULL,
  `address2` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `slip_image` varchar(255) DEFAULT NULL,
  `payment_status` varchar(255) DEFAULT 'panding',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `package_id`, `order_id`, `total_amount`, `discount`, `status`, `transaction_id`, `payment_method`, `payment_ref_id`, `page_url`, `post_url`, `platform`, `address2`, `image`, `slip_image`, `payment_status`, `created_at`, `updated_at`, `name`, `phone`, `email`, `address`) VALUES
(1, 12, 16, '240524161212', 996, 0.00, 'unpaid', '017654556', 'bkash', NULL, 'jufiqyt@mailinator.com', 'Omnis qui natus alia', 'xywamoxu@mailinator.com', 'Ut dolore sint sint', NULL, NULL, 'panding', '2024-05-24 00:08:54', '2024-05-24 00:11:13', '', '', '', ''),
(2, 12, 1, '2405241121', 9, 0.00, 'unpaid', NULL, NULL, NULL, 'rr', 'rr', 'rr', 'rr', 'nagod.png', NULL, 'panding', '2024-05-24 03:30:11', '2024-05-24 03:30:11', '', '', '', ''),
(3, 12, 1, '2405241121', 9, 0.00, 'delivered', '5295', 'Cash', NULL, 'rr', 'rr', 'rr', 'rr', 'nagod.png', NULL, 'panding', '2024-05-24 03:43:27', '2024-05-24 05:29:14', '', '', '', ''),
(4, 12, 1, '2405241121', 9, 0.00, 'confirm', '498', 'bkash', NULL, 'rr', 'rr', 'rr', 'rr', 'nagod.png', NULL, 'panding', '2024-05-24 03:48:15', '2024-05-24 05:29:10', '', '', '', ''),
(5, 12, 1, '2405241124', 9, 0.00, 'unpaid', 'cvbhfg', 'bkash', NULL, 'g', 'g', 'asdf', 'asdf', 'nagod.png', NULL, 'panding', '2024-05-24 03:50:44', '2024-05-24 03:50:51', '', '', '', ''),
(6, 12, 1, '2405241125', 9, 0.00, 'unpaid', 'sdfg', 'bkash', NULL, 'dfg', 'dfg', 'sdfg', 'sdfg', '5846.png', NULL, 'panding', '2024-05-24 03:58:27', '2024-05-24 03:58:36', '', '', '', ''),
(7, 12, 1, '2405241126', 9, 0.00, 'unpaid', 'fasd56', 'bkash', NULL, 'test', 'test', 'test', 'tese', '2494.png', NULL, 'panding', '2024-05-24 04:44:32', '2024-05-24 04:44:40', '', '', '', ''),
(8, 12, 1, '2405241127', 9, 0.00, 'unpaid', 'gsdfg', 'bkash', NULL, 'tt', 'ttt', 'ttt', '01748', '15201.png', NULL, 'panding', '2024-05-24 04:46:24', '2024-05-24 04:51:09', '', '', '', ''),
(9, 12, 1, '2405241128', 9, 0.00, 'unpaid', 'fasdf', 'bkash', NULL, 'asdf', 'asdf', 'asdf', 'asdff', '11329.png', NULL, 'panding', '2024-05-24 05:01:54', '2024-05-24 05:04:16', '', '', '', ''),
(10, 12, 1, '2405241129', 9, 0.00, 'unpaid', 'asdf', 'nagad', NULL, 'dfg', 'sdfg', 'sdfg', 'sdfg', '17843.png', NULL, 'panding', '2024-05-24 05:07:31', '2024-05-24 05:07:38', '', '', '', ''),
(11, 12, 1, '24052411210', 9, 0.00, 'unpaid', 'gsdfg', 'Cash', NULL, 'sdfg', 'sdfg', 'sdfg', 'sdfg', '19030.png', NULL, 'confirm', '2024-05-24 05:08:23', '2024-05-24 10:40:52', '', '', '', ''),
(12, 12, 1, '24052411211', 9, 0.00, 'delivered', '123456779', 'bkash', NULL, 'tweel', 'Rangpur poly tech', 'tazkul', '01315732214', '2597.jpg', NULL, 'panding', '2024-05-24 05:15:16', '2024-05-24 05:29:21', '', '', '', ''),
(13, 12, 1, '24052411212', 9, 0.00, 'Processing', 'asdf', 'bkash', NULL, 'class', 'institure', 'parent name', 'parent mobile', '13495.png', NULL, 'panding', '2024-05-24 05:25:04', '2024-05-24 05:29:04', 'Toriqul Islam', '01727204284', 'toriqulislam2720@gmail.com', 'Dhaka'),
(14, 12, 1, '24052411213', 9, 0.00, 'unpaid', '011455455', 'bkash', NULL, 'tes', 'tes', 'tes', 'tes', '12931.png', NULL, 'panding', '2024-05-24 07:14:29', '2024-05-24 07:16:01', 'Toriqul Islam', '01727204284', 'toriqulislam2720@gmail.com', 'Dhaka'),
(15, 12, 1, '24052411214', 9, 0.00, 'unpaid', 'jio', 'bkash', NULL, 'ryt', 'sdfg', 'sdfg', 'sdfg', '16505.png', NULL, 'panding', '2024-05-24 07:22:17', '2024-05-24 07:22:24', 'Toriqul Islam', '01727204284', 'toriqulislam2720@gmail.com', 'Dhaka'),
(16, 12, 1, '24052411215', 9, 0.00, 'unpaid', NULL, NULL, NULL, 'rr', 'ff', 'sd', 'dd', '11116.png', NULL, 'panding', '2024-05-24 08:40:02', '2024-05-24 08:40:02', 'Toriqul Islam', '01727204284', 'toriqulislam2720@gmail.com', 'Dhaka'),
(17, 12, 1, '24052411216', 9995, 0.00, 'unpaid', 'xdfgh', 'bkash', NULL, 'test', 'test', 'test', 'test', '4618.png', NULL, 'panding', '2024-05-24 08:48:10', '2024-05-24 08:48:18', 'Toriqul Islam', '01727204284', 'toriqulislam2720@gmail.com', 'Dhaka'),
(18, 1, 1, '2405241117', 9995, 0.00, 'unpaid', NULL, NULL, NULL, NULL, 'tt', NULL, 'yyy', NULL, NULL, 'panding', '2024-05-24 11:03:39', '2024-05-24 11:03:39', 'Abir Ahmed', '+8801834186970', 'admin@gmail.com', 'House-24, Flat-9B, Level-9, BRAC/Union Bank Branch Building,'),
(19, 1, 1, '2405241118', 9995, 0.00, 'unpaid', NULL, NULL, NULL, 'ff', 'ff', NULL, 'ff', NULL, NULL, 'panding', '2024-05-24 11:05:04', '2024-05-24 11:05:04', 'Abir Ahmed', '+8801834186970', 'admin@gmail.com', 'House-24, Flat-9B, Level-9, BRAC/Union Bank Branch Building,'),
(20, 1, 1, '2405241118', 9995, 0.00, 'unpaid', NULL, NULL, NULL, 'ff', 'ff', NULL, 'ff', NULL, NULL, 'panding', '2024-05-24 11:05:25', '2024-05-24 11:05:25', 'Abir Ahmed', '+8801834186970', 'admin@gmail.com', 'House-24, Flat-9B, Level-9, BRAC/Union Bank Branch Building,'),
(21, 1, 1, '2405241120', 9995, 0.00, 'unpaid', 'sdfgsdf', 'bkash', NULL, 'gtt', 'ttt', 'ttt', 'tt', NULL, NULL, 'panding', '2024-05-24 11:05:51', '2024-05-24 11:05:57', 'Abir Ahmed', '+8801834186970', 'admin@gmail.com', 'House-24, Flat-9B, Level-9, BRAC/Union Bank Branch Build');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `short_title` varchar(100) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `price` double(8,2) NOT NULL,
  `discount_percent` varchar(20) NOT NULL DEFAULT '0',
  `final_price` double(8,2) NOT NULL,
  `feature` longtext NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1 is active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `batch` varchar(255) NOT NULL,
  `course_duration` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `user_id`, `short_title`, `course_name`, `price`, `discount_percent`, `final_price`, `feature`, `status`, `created_at`, `updated_at`, `batch`, `course_duration`) VALUES
(1, 1, 'ALL SSC student', 'SSC', 10000.00, '5', 9995.00, '[\"Bangla\",\"English\",\"Math\",\"Physic\",\"camistry\"]', 1, '2024-05-23 23:23:20', '2024-05-23 23:23:20', '[\"0\"]', 'three month');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@gmail.com', '$2y$10$O.9Dt5UUC/MPJmj27xZFBOI12jv2SGQvVbrLOaN9K0nv3eK9KDja6', '2021-01-21 05:52:21');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `guard_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'create', 'web', '2021-01-20 03:23:50', '2021-01-20 03:23:50'),
(2, 'edit', 'web', '2021-01-20 03:23:50', '2021-01-20 03:23:50'),
(3, 'store', 'web', '2021-01-20 03:23:50', '2021-01-20 03:23:50'),
(4, 'show', 'web', '2021-01-20 03:23:51', '2021-01-20 03:23:51'),
(5, 'write', 'web', '2021-01-20 03:23:51', '2021-01-20 03:23:51'),
(6, 'delete', 'web', '2021-01-20 03:23:51', '2023-10-23 23:07:08');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `guard_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(4, 'admin', 'web', '2021-01-20 04:05:01', '2021-01-20 04:05:01'),
(5, 'customer', 'web', '2023-10-23 20:37:49', '2023-11-15 17:59:32');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 4),
(1, 5),
(2, 4),
(2, 5),
(3, 4),
(3, 5),
(4, 4),
(4, 5),
(5, 4),
(5, 5),
(6, 4);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(120) NOT NULL,
  `image` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `image`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Culpa dolor perspicgg', 'slider-74.jpg', '<p>dfasdfasdfasdf</p>', 0, '2021-02-25 09:22:15', '2021-02-25 23:50:28'),
(2, 'Cupiditate ea suscip', 'slider-41.png', NULL, 1, '2021-02-25 09:49:34', '2021-02-25 09:49:34'),
(3, 'Accusantium aliquam', 'slider-24.jpg', NULL, 0, '2021-02-28 01:57:09', '2021-02-28 01:57:09');

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(65) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `link` varchar(150) NOT NULL,
  `code` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `title`, `slug`, `link`, `code`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Facebook', 'facebook', 'https://www.facebook.com/mehede.mhm', '<i class=\"fa fa-facebook\"></i>', 1, '2021-02-25 23:38:54', '2021-02-25 23:55:40'),
(2, 'Twitter', 'twitter', 'https://www.twitter.com/mehede.mhm', '<i class=\"fa fa-twitter\"></i>', 1, '2021-02-25 23:54:51', '2021-02-25 23:54:51');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `credit` int(11) NOT NULL DEFAULT 0,
  `debit` int(11) NOT NULL DEFAULT 0,
  `type` varchar(250) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `order_id`, `credit`, `debit`, `type`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 9, 9000, 0, NULL, NULL, '2024-05-24 05:04:16', NULL),
(2, 10, 9, 0, NULL, NULL, '2024-05-24 05:07:39', NULL),
(3, 11, 9, 0, NULL, NULL, '2024-05-24 05:08:32', NULL),
(4, 12, 9, 0, NULL, NULL, '2024-05-24 05:15:27', NULL),
(5, 13, 9, 0, NULL, NULL, '2024-05-24 05:25:11', NULL),
(6, 14, 9, 0, NULL, NULL, '2024-05-24 07:16:01', NULL),
(7, 15, 0, 2, NULL, NULL, '2024-05-24 07:22:24', NULL),
(8, 17, 9995, 0, NULL, NULL, '2024-05-24 08:48:18', NULL),
(9, NULL, 0, 38, 'withdraw', NULL, '2024-05-24 09:23:13', NULL),
(10, NULL, 0, 1000, 'withdraw', NULL, '2024-05-24 09:23:43', NULL),
(11, NULL, 0, 100, 'expense', 1, '2024-05-24 10:17:08', NULL),
(12, NULL, 0, 100, 'expense', 1, '2024-05-24 10:17:50', NULL),
(13, 21, 9995, 0, NULL, NULL, '2024-05-24 11:05:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `google_id` int(11) DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `image` varchar(191) DEFAULT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(191) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `google_id`, `name`, `image`, `phone`, `email`, `address`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Abir Ahmed', '13603.png', '+8801834186970', 'admin@gmail.com', 'House-24, Flat-9B, Level-9, BRAC/Union Bank Branch Build', NULL, '$2y$10$oxLzFrVPCy1NcRVc7YAnZulSsdY0XtqWWRbbcsdvyKxDFmTUSjh7e', NULL, '2021-01-20 04:05:01', '2024-05-24 11:05:51'),
(7, NULL, 'Kabab', NULL, '01784993287', 'mhmtry100@gmail.com', NULL, NULL, '$2y$10$oxLzFrVPCy1NcRVc7YAnZulSsdY0XtqWWRbbcsdvyKxDFmTUSjh7e', NULL, '2021-01-21 09:52:59', '2021-01-21 09:52:59'),
(8, NULL, 'Beef', NULL, '01717361632', 'mehede@gmail.com', NULL, NULL, '$2y$10$QACWHyE6qFfceacnV6MAteeYWeqhXQhWNOiEvbvMK4/oK1mEE4CiS', NULL, '2021-01-21 11:30:25', '2021-01-21 11:30:25'),
(9, NULL, 'Kabab', NULL, '01784993287', 'ddd@gmail.com', NULL, NULL, '$2y$10$6KAwQjwgQC/WF5CR1DYYeelZt1PE8ia9jPQdpeEwjpdruCNNvw5Wa', NULL, '2021-01-21 12:26:46', '2021-01-21 12:26:46'),
(10, NULL, 'Neve Alexander', NULL, '+1 (191) 739-4122', 'sybifege@mailinator.com', NULL, NULL, '$2y$10$8o2g8SjXGS6Zo6OUboEiq.eMI0quc8V.fgZhdWoDUNU46lRdnZnna', NULL, '2021-02-25 01:47:54', '2021-02-25 01:47:54'),
(11, NULL, 'Abir Ahmed', NULL, '+8801834186970', 'abir@gmail.com', 'House-24, Flat-9B, Level-9, BRAC/Union Bank Branch Building,', NULL, '$2y$10$QAtv991GSdH8wnpdB/SOh./KBXD9XRiT4RTQLDcarR6m9C2PH17q2', NULL, '2023-11-16 17:46:40', '2023-11-16 17:47:24'),
(12, NULL, 'Toriqul Islam', NULL, '01727204284', 'toriqulislam2720@gmail.com', 'Dhaka', NULL, '$2y$10$U44ffFaXStfhzlZz5Y.PCuQDuiwlGy7yBhwpVU8vACGsst6M8FfBW', NULL, '2024-03-20 23:59:41', '2024-05-24 05:15:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `basic_settings`
--
ALTER TABLE `basic_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bkashes`
--
ALTER TABLE `bkashes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_catagories`
--
ALTER TABLE `expense_catagories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keks`
--
ALTER TABLE `keks`
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
-- Indexes for table `nagads`
--
ALTER TABLE `nagads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
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
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
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
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `basic_settings`
--
ALTER TABLE `basic_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bkashes`
--
ALTER TABLE `bkashes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `expense_catagories`
--
ALTER TABLE `expense_catagories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `keks`
--
ALTER TABLE `keks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `nagads`
--
ALTER TABLE `nagads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

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
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
