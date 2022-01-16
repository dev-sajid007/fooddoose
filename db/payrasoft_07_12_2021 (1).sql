-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2021 at 08:32 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `payrasoft_07_12_2021`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `about_us_id` int(11) NOT NULL,
  `header` varchar(150) DEFAULT NULL,
  `sub_header` varchar(150) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `photo` varchar(200) DEFAULT 'photo.jpg',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`about_us_id`, `header`, `sub_header`, `description`, `photo`, `updated_at`) VALUES
(1, 'short header', 'sub short header', '<b>description </b>about<b> us</b>', '1639418099user.jpg', '2021-12-13 11:56:20'),
(1, 'short header', 'sub short header', '<b>description </b>about<b> us</b>', '1623006220about.jpg', '2021-09-16 07:38:04');

-- --------------------------------------------------------

--
-- Table structure for table `admin_dashboard_setting`
--

CREATE TABLE `admin_dashboard_setting` (
  `admin_dashboard_id` int(50) NOT NULL DEFAULT 1,
  `title` varchar(100) DEFAULT NULL,
  `dashboard_name` varchar(100) DEFAULT NULL,
  `short_char_title` varchar(100) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `footer_greeting` varchar(100) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_dashboard_setting`
--

INSERT INTO `admin_dashboard_setting` (`admin_dashboard_id`, `title`, `dashboard_name`, `short_char_title`, `logo`, `favicon`, `footer_greeting`, `updated_at`) VALUES
(1, 'আচারওয়ালা', 'আচারওয়ালা', 'AW', '0015.jpg', 'favicon-icon-29.jpg', 'মানসম্মত পন্য বা উচ্চ মানের পন্যের সবচেয়ে বড় সুবিধা হল ক্রেতাকে সহজেই নিজের করে নেয়া যায়', '2021-08-16 17:36:26'),
(1, 'Mohanagar Parcel', 'Mohanagar Parcel', 'MR', '0015.jpg', 'favicon-icon-29.jpg', 'মানসম্মত পন্য বা উচ্চ মানের পন্যের সবচেয়ে বড় সুবিধা হল ক্রেতাকে সহজেই নিজের করে নেয়া যায়', '2021-11-27 10:02:18');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `contact_us_id` bigint(200) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`contact_us_id`, `name`, `email`, `subject`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(14, 'Solayman Ali', 'ratonmsa@gmail.com', NULL, '017662120', NULL, '2021-03-26 05:05:40', '2021-03-26 05:05:40'),
(15, 'MUSHFIQUR RAHMAN', 'siam2mrs@gmail.com', NULL, '01631003552', NULL, '2021-04-09 01:53:14', '2021-04-09 01:53:14'),
(16, 'Israt Jahan hema', 'isratjahanhema.bd@gmail.com', NULL, '01760838248', NULL, '2021-04-22 18:49:39', '2021-04-22 18:49:39'),
(17, 'Kamrun nahar', 'naharict16@gmail.com', NULL, '01765271471', NULL, '2021-04-23 05:41:30', '2021-04-23 05:41:30'),
(18, 'Mst.Shohida Khatun', 'shohidakhatun3333@gmail.com', NULL, '01768815795', NULL, '2021-04-23 23:13:19', '2021-08-12 14:44:13'),
(19, 'demo name', 'debwashis01@gmail.com', 'demo', '01766212029', 'demo message', '2021-08-17 10:28:13', '2021-08-17 10:28:13'),
(20, 'aveenir_pisobbd', 'ratonmsa@gmail.com', 'demo', '01766212029', 'demo', '2021-08-17 10:28:45', '2021-08-17 10:28:45'),
(21, 'solayman', 'ratonmsa@gmail.com', 'demo subject', '01766212029', 'no comment', '2021-09-11 12:39:15', '2021-09-16 07:47:48'),
(22, 'solayman ', 'ratonmsa@gmail.com', 'demo subject', '01766212029', 'no comment', '2021-09-11 12:39:53', '2021-09-11 12:39:53');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `last_name` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8 NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8 DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `name`, `email`, `phone`, `email_verified_at`, `password`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(77, NULL, NULL, 'Solayman Ali', 'ratonmsa@gmail.com', '017662120', NULL, '$2y$10$tSLPuqNZewWd8wwFqOPVXuPqIIXnjOQ9Fmtf71QveoI1xHfK8UtMC', 'Aviram Babupara', 'm9hvBUTcaOix9ZCuMnsaFMBTz7z5vFlf7uhEJRHkwYTcL21gJ17C4wKjMaqM', '2021-06-27 07:02:37', '2021-06-27 23:56:45'),
(78, NULL, NULL, 'Traveloguebd COM', 'traveloguebd.com@gmail.com', NULL, NULL, NULL, NULL, '0m2b0VWnkCcjmhkrc9fhFyMWePnRJlY9duDa8E2Sa7RiczuLGVk8LlFmHI2x', '2021-06-28 15:55:12', '2021-06-28 15:55:12'),
(79, NULL, NULL, 'Debwashis Borman', 'debb.du@gmail.com', NULL, NULL, NULL, NULL, '7BvvWsXqLXizmeVEtFEXG42DZ7efr6P2fJwwQTGGBNN1oO10SU2FBC2Ewgkw', '2021-06-28 18:01:37', '2021-06-28 18:01:37'),
(80, NULL, NULL, 'Arup Raha', 'debwashis.du@gmail.com', NULL, NULL, NULL, NULL, '1DLjbTBciRe0JFYbADQWRBeOmiQmE0Jzw20ORwecIDF6U0qqBf5r9J5litTI', '2021-07-01 01:46:22', '2021-07-01 01:46:22'),
(81, NULL, NULL, 'Debwashis', 'debwashis.web@gmail.com', '+8801643411303', NULL, NULL, 'Jagannath Hall', 'Ty2FjCYC3WvoYPcYTzCATZdjE0pENaAAkDNm1Em2vlqpDotgkRlfxazT8csc', '2021-07-03 02:02:00', '2021-07-03 02:03:47'),
(82, NULL, NULL, 'Debwashis', 'admindemo@protonmail.com', NULL, NULL, '$2y$10$NYJHulUuL8DT7.iae5p3F.VfC/PouhPmwRy9JjygoI5sTEoADPpL6', NULL, NULL, '2021-07-06 21:32:53', '2021-07-12 06:12:21'),
(83, NULL, NULL, 'Firoz AL Mamoon Gora', 'ffirozmamoon@gmail.com', NULL, NULL, NULL, NULL, 'VME7lrUpKeQGCaqXk0pqJzRWyMFZvupaKl8hDBnIRSQNz0kPE4KdG93cDDy4', '2021-07-14 19:49:34', '2021-07-14 19:49:34'),
(84, NULL, NULL, 'Linda Putnam', 'vnvsvrmmcd_1617583064@tfbnw.net', NULL, NULL, NULL, NULL, 'JTNYAuiabrkInFwibOORUBBmoiRo11X8lSVbNaEjqhQijlZBahuiNKYHOvbw', '2021-07-27 10:43:38', '2021-07-27 10:43:38'),
(85, NULL, NULL, 'Alexander Yangson', 'fvmmxxcium_1616065522@tfbnw.net', NULL, NULL, NULL, NULL, 'Ve7trBenJuKwMkhGpbHBn0AvaqFOaxt0RkBCZjkPnLL1loZ64ZKQPyoYa26J', '2021-07-27 11:51:47', '2021-07-27 11:51:47'),
(86, NULL, NULL, 'Amizan Daniel', 'geogatedproject237@gmail.com', NULL, NULL, NULL, NULL, '7oS6Zosg0ZOOZSpe7v0FEheuHqrED82VuhbKVHZgSQHakcFC0nrTDYnXgYTv', '2021-07-27 12:42:14', '2021-07-27 12:42:14'),
(87, NULL, NULL, 'Debwashis', 'debwashis001@gmail.com', NULL, NULL, NULL, NULL, 'nN0iVm321JcvFae7d086GNij1Rhi0F8fdEboyrP0S57kXQWxW6kOc8lr3O0B', '2021-10-02 21:29:10', '2021-10-02 21:29:10'),
(88, NULL, NULL, 'Debwashis Borman', 'debwashis01@gmail.com', NULL, NULL, NULL, NULL, 'h11GbXxCFEiiu9ULatAQtiTMCIHQFvoCcgF0EyW6XOxSo8ZKUhVAadk48E6K', '2021-11-12 18:10:34', '2021-11-12 18:10:34'),
(89, 'solayman', 'ali 26 a', 'solayman ali 26 a', 'ratonmsa26@gmail.com', '01766212029', NULL, '$2y$10$jIb505HT0wWZTQTF8u0bgO8Q.zzVmVlsMldet.BtZ9vNxtegLvQXm', NULL, NULL, '2021-12-02 10:32:43', '2021-12-02 11:40:34'),
(90, 'solayman dummy', 'ali 26 a', 'solayman dummy ali 26 a', 'ratonmsa28@gmail.com', '01766212029', NULL, '$2y$10$qGqJJ7PKHOTnju71sEW7SOrxmKp7Ypl.CyZh6ZtOpkYmwk362mJ1a', NULL, NULL, '2021-12-02 18:16:42', '2021-12-02 18:24:01'),
(91, 'solayman', 'ali 26 91', 'solayman ali 26 91', 'ratonmsa29@gmail.com', '01766212029', NULL, '$2y$10$fARM2uBZm7Q1To4XuaUaTOnadnvX713eIGq325EJFtQh1.3H4lpzi', NULL, NULL, '2021-12-04 05:50:18', '2021-12-04 05:56:09');

-- --------------------------------------------------------

--
-- Table structure for table `customer_verify`
--

CREATE TABLE `customer_verify` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 NOT NULL,
  `verify_code` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_verify`
--

INSERT INTO `customer_verify` (`id`, `name`, `phone`, `email`, `address`, `verify_code`, `created_at`, `updated_at`) VALUES
(75, 'Solayman Ali', '01766212029', 'ratonmsa@gmail.com', 'Robertsongong Alamnager, Rangpur', 4583, '2021-08-17 11:56:51', '2021-08-17 11:56:51'),
(76, 'moinul', '01832895125', 'parves1325@gamil.com', 'jatrabari', 9480, '2021-08-24 01:49:44', '2021-08-24 01:49:44'),
(77, 'moinul', '01832895125', 'parves25274@gmail.com', 'jatrabari', 4703, '2021-08-24 01:51:31', '2021-08-24 01:51:31'),
(78, 'moinul', '01832895125', 'parves25274@gamil.com', 'jatrabari', 3662, '2021-08-24 01:54:39', '2021-08-24 01:54:39');

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `expense_id` bigint(20) NOT NULL,
  `purpose` varchar(255) DEFAULT NULL,
  `vendor` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `expense_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`expense_id`, `purpose`, `vendor`, `description`, `amount`, `expense_date`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(5, 'fghfgch', 'gfhfgh', 'hkgh,gh', '100.00', '2021-12-14', '2021-12-14 09:21:00', '2021-12-14 15:21:00', NULL, NULL),
(6, 'fghfgch', 'gfhfgh', 'gsdfg', '100.00', '2021-12-14', '2021-12-14 09:28:57', '2021-12-14 15:28:57', NULL, NULL),
(7, 'rtdgU', 'hfcghU', 'fghfcghU', '3000.00', '2021-12-23', '2021-12-14 10:10:46', '2021-12-15 01:10:01', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `footer_pages`
--

CREATE TABLE `footer_pages` (
  `footer_page_id` int(100) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `slug` varchar(200) DEFAULT NULL,
  `meta_tags` varchar(200) DEFAULT NULL,
  `header` varchar(200) DEFAULT NULL,
  `sub_header` varchar(200) NOT NULL,
  `description` text DEFAULT NULL,
  `position` tinyint(2) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `footer_pages`
--

INSERT INTO `footer_pages` (`footer_page_id`, `title`, `slug`, `meta_tags`, `header`, `sub_header`, `description`, `position`, `deleted_at`, `created_at`, `updated_at`) VALUES
(4, 'privacy and policy', 'privacy-and-policy', 'contact, privacy, policy', 'We’ll be back soon!', 'privacy and policy sub header page', '<p></p>description<p></p>', 1, NULL, '2021-03-22 12:59:23', '2021-12-13 08:02:29'),
(7, 'টার্ম এন্ড কন্ডিশন', 'টার্ম-এন্ড-কন্ডিশন', 'contact, privacy, policy', 'We’ll be back soon!', 'privacy and policy sub header page', '<p></p><p></p>description<p></p><p></p><p><br></p><p>hello how are you?</p><p></p>', 2, NULL, '2021-03-22 18:33:31', '2021-12-13 14:20:44'),
(8, 'demo', 'demo', 'contact, privacy, policy', 'demo header', 'demo subtitle', 'demo <b>details</b>', 1, NULL, '2021-12-13 09:35:47', '2021-12-14 03:34:52');

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `income_id` bigint(20) NOT NULL,
  `way` varchar(255) DEFAULT NULL,
  `vendor` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `income_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`income_id`, `way`, `vendor`, `description`, `amount`, `income_date`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(4, 'fghfhU', 'gfhfghU', 'dfsdgsgU', '4000.00', '2021-12-17', '2021-12-14 08:33:30', '2021-12-15 03:01:38', NULL, NULL),
(5, 'fgfgu', 'fhdfhu', 'ygugigi', '300.00', '2021-12-14', '2021-12-14 09:19:06', '2021-12-15 02:47:21', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(17, 'default', '{\"uuid\":\"22fc2be3-0a4c-4e46-9ce5-c0a12ab4fcc6\",\"displayName\":\"App\\\\Notifications\\\\OrderNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":13:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:1;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:35:\\\"App\\\\Notifications\\\\OrderNotification\\\":9:{s:2:\\\"id\\\";s:36:\\\"86338725-b952-4224-a00a-2d3459a4567e\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";O:13:\\\"Carbon\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2021-09-30 13:35:28.662977\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:10:\\\"Asia\\/Dhaka\\\";}s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:8:\\\"database\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";r:15;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1632987328, 1632987320),
(18, 'default', '{\"uuid\":\"5f284345-1b05-4b90-a9a0-bf69136ff368\",\"displayName\":\"App\\\\Notifications\\\\OrderNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":13:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:1;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:35:\\\"App\\\\Notifications\\\\OrderNotification\\\":9:{s:2:\\\"id\\\";s:36:\\\"86338725-b952-4224-a00a-2d3459a4567e\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";O:13:\\\"Carbon\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2021-09-30 13:35:28.662977\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:10:\\\"Asia\\/Dhaka\\\";}s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";r:15;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1632987328, 1632987320),
(19, 'default', '{\"uuid\":\"099431ef-1faf-45e0-a2f7-c23fcc58eda9\",\"displayName\":\"App\\\\Notifications\\\\OrderNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":13:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:1;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:35:\\\"App\\\\Notifications\\\\OrderNotification\\\":9:{s:2:\\\"id\\\";s:36:\\\"23c7cff0-b9ce-45d2-9e0c-8e870749a16c\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";O:13:\\\"Carbon\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2021-09-30 22:01:25.983006\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:10:\\\"Asia\\/Dhaka\\\";}s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:8:\\\"database\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";r:15;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1633017685, 1633017678),
(20, 'default', '{\"uuid\":\"80221a3d-3b87-4fa1-a76a-30767ec8f634\",\"displayName\":\"App\\\\Notifications\\\\OrderNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":13:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:1;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:35:\\\"App\\\\Notifications\\\\OrderNotification\\\":9:{s:2:\\\"id\\\";s:36:\\\"23c7cff0-b9ce-45d2-9e0c-8e870749a16c\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";O:13:\\\"Carbon\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2021-09-30 22:01:25.983006\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:10:\\\"Asia\\/Dhaka\\\";}s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";r:15;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1633017685, 1633017678),
(21, 'default', '{\"uuid\":\"adf726a1-3854-4412-af38-ae1ab95f2c3a\",\"displayName\":\"App\\\\Notifications\\\\OrderNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":13:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:1;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:35:\\\"App\\\\Notifications\\\\OrderNotification\\\":9:{s:2:\\\"id\\\";s:36:\\\"35983c03-1cd9-449f-8446-e6e8e63f2655\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";O:13:\\\"Carbon\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2021-10-03 20:32:37.509552\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:10:\\\"Asia\\/Dhaka\\\";}s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:8:\\\"database\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";r:15;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1633271557, 1633271550),
(22, 'default', '{\"uuid\":\"f1aa6977-6773-4022-9eec-2a4e79179e6a\",\"displayName\":\"App\\\\Notifications\\\\OrderNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":13:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:1;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:35:\\\"App\\\\Notifications\\\\OrderNotification\\\":9:{s:2:\\\"id\\\";s:36:\\\"35983c03-1cd9-449f-8446-e6e8e63f2655\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";O:13:\\\"Carbon\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2021-10-03 20:32:37.509552\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:10:\\\"Asia\\/Dhaka\\\";}s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";r:15;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1633271557, 1633271550),
(23, 'default', '{\"uuid\":\"94e64101-4c8d-43fc-a725-0c7ab79657f3\",\"displayName\":\"App\\\\Notifications\\\\OrderNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":13:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:1;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:35:\\\"App\\\\Notifications\\\\OrderNotification\\\":9:{s:2:\\\"id\\\";s:36:\\\"19742bc4-7e42-4f51-9757-36778b0c21ca\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";O:13:\\\"Carbon\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2021-10-04 23:08:00.217166\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:10:\\\"Asia\\/Dhaka\\\";}s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:8:\\\"database\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";r:15;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1633367280, 1633367272),
(24, 'default', '{\"uuid\":\"7497f14a-ca62-4e2b-97c3-a841783b9237\",\"displayName\":\"App\\\\Notifications\\\\OrderNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":13:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:1;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:35:\\\"App\\\\Notifications\\\\OrderNotification\\\":9:{s:2:\\\"id\\\";s:36:\\\"19742bc4-7e42-4f51-9757-36778b0c21ca\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";O:13:\\\"Carbon\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2021-10-04 23:08:00.217166\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:10:\\\"Asia\\/Dhaka\\\";}s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";r:15;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1633367280, 1633367272),
(25, 'default', '{\"uuid\":\"2d798956-4de5-49b8-87c1-6cbd98f68479\",\"displayName\":\"App\\\\Notifications\\\\OrderNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":13:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:1;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:35:\\\"App\\\\Notifications\\\\OrderNotification\\\":9:{s:2:\\\"id\\\";s:36:\\\"f317aeb1-72b2-402b-a50b-53bfd94132b1\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";O:13:\\\"Carbon\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2021-10-06 00:18:36.324006\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:10:\\\"Asia\\/Dhaka\\\";}s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:8:\\\"database\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";r:15;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1633457916, 1633457908),
(26, 'default', '{\"uuid\":\"c02a8b5e-ec62-4e08-8d0a-0709f846a959\",\"displayName\":\"App\\\\Notifications\\\\OrderNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":13:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:1;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:35:\\\"App\\\\Notifications\\\\OrderNotification\\\":9:{s:2:\\\"id\\\";s:36:\\\"f317aeb1-72b2-402b-a50b-53bfd94132b1\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";O:13:\\\"Carbon\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2021-10-06 00:18:36.324006\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:10:\\\"Asia\\/Dhaka\\\";}s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";r:15;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1633457916, 1633457908),
(27, 'default', '{\"uuid\":\"c5aa1b56-52c3-4ba7-abe6-0e41cbd140f4\",\"displayName\":\"App\\\\Notifications\\\\OrderNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":13:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:1;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:35:\\\"App\\\\Notifications\\\\OrderNotification\\\":9:{s:2:\\\"id\\\";s:36:\\\"f8efdeaa-2d9d-473b-a3d0-54414aa2d664\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";O:13:\\\"Carbon\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2021-10-06 10:02:20.466087\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:10:\\\"Asia\\/Dhaka\\\";}s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:8:\\\"database\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";r:15;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1633492940, 1633492930),
(28, 'default', '{\"uuid\":\"61988f84-fdd6-48b3-b1e5-8a963962dc67\",\"displayName\":\"App\\\\Notifications\\\\OrderNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":13:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:1;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:35:\\\"App\\\\Notifications\\\\OrderNotification\\\":9:{s:2:\\\"id\\\";s:36:\\\"f8efdeaa-2d9d-473b-a3d0-54414aa2d664\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";O:13:\\\"Carbon\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2021-10-06 10:02:20.466087\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:10:\\\"Asia\\/Dhaka\\\";}s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";r:15;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1633492940, 1633492930),
(29, 'default', '{\"uuid\":\"fe18ca27-c88e-462d-9770-03155bce1251\",\"displayName\":\"App\\\\Notifications\\\\OrderNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":13:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:1;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:35:\\\"App\\\\Notifications\\\\OrderNotification\\\":9:{s:2:\\\"id\\\";s:36:\\\"42db0f0b-2ac5-4cc2-819d-8ba7e93610fa\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";O:13:\\\"Carbon\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2021-10-06 23:35:55.510184\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:10:\\\"Asia\\/Dhaka\\\";}s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:8:\\\"database\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";r:15;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1633541755, 1633541748),
(30, 'default', '{\"uuid\":\"532e9ca6-91cb-4944-9f7b-7c524a4577f3\",\"displayName\":\"App\\\\Notifications\\\\OrderNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":13:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:1;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:35:\\\"App\\\\Notifications\\\\OrderNotification\\\":9:{s:2:\\\"id\\\";s:36:\\\"42db0f0b-2ac5-4cc2-819d-8ba7e93610fa\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";O:13:\\\"Carbon\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2021-10-06 23:35:55.510184\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:10:\\\"Asia\\/Dhaka\\\";}s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";r:15;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1633541755, 1633541748),
(31, 'default', '{\"uuid\":\"6faa697e-fa3d-46a4-a4c0-8601db6acf78\",\"displayName\":\"App\\\\Notifications\\\\OrderNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":13:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:1;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:35:\\\"App\\\\Notifications\\\\OrderNotification\\\":9:{s:2:\\\"id\\\";s:36:\\\"d5845263-3a53-4ac4-82ad-d8cc200f12e4\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";O:13:\\\"Carbon\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2021-10-07 15:20:45.523274\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:10:\\\"Asia\\/Dhaka\\\";}s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:8:\\\"database\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";r:15;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1633598445, 1633598435),
(32, 'default', '{\"uuid\":\"5b51da0c-fe1a-448b-a40c-70528e9e4da4\",\"displayName\":\"App\\\\Notifications\\\\OrderNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":13:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:1;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:35:\\\"App\\\\Notifications\\\\OrderNotification\\\":9:{s:2:\\\"id\\\";s:36:\\\"d5845263-3a53-4ac4-82ad-d8cc200f12e4\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";O:13:\\\"Carbon\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2021-10-07 15:20:45.523274\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:10:\\\"Asia\\/Dhaka\\\";}s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";r:15;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1633598445, 1633598435);

-- --------------------------------------------------------

--
-- Table structure for table `merchant`
--

CREATE TABLE `merchant` (
  `merchant_id` bigint(100) UNSIGNED NOT NULL,
  `user_id` bigint(100) DEFAULT NULL,
  `marchant_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1 approved, 0 pending, 2 banned',
  `business_name` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `bkash_number` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `rocket_number` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `nagad_number` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `bank_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `account_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `account_number` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `payment_method` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `merchant`
--

INSERT INTO `merchant` (`merchant_id`, `user_id`, `marchant_status`, `business_name`, `bkash_number`, `rocket_number`, `nagad_number`, `bank_name`, `account_name`, `account_number`, `payment_method`, `created_at`, `updated_at`) VALUES
(89, 19, 0, 'demo', '01766212029', '01766212029', '01766212029', 'demo', 'solayman', '45455', 'bkash', '2021-12-15 15:42:32', '2021-12-15 15:42:32'),
(90, 20, 0, 'demo', '01766212029', '01766212029', '01766212029', 'demo', 'solayman', '45455', 'bkash', '2021-12-15 15:45:27', '2021-12-15 15:45:27');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_12_07_113457_create_about_us_table', 0),
(6, '2021_12_07_113457_create_accounts_table', 0),
(7, '2021_12_07_113457_create_admin_dashboard_setting_table', 0),
(8, '2021_12_07_113457_create_admins_table', 0),
(9, '2021_12_07_113457_create_contact_us_table', 0),
(10, '2021_12_07_113457_create_customers_table', 0),
(11, '2021_12_07_113457_create_failed_jobs_table', 0),
(12, '2021_12_07_113457_create_footer_pages_table', 0),
(13, '2021_12_07_113457_create_jobs_table', 0),
(14, '2021_12_07_113457_create_notifications_table', 0),
(15, '2021_12_07_113457_create_password_resets_table', 0),
(16, '2021_12_07_113457_create_personal_access_tokens_table', 0),
(17, '2021_12_07_113457_create_roles_table', 0),
(18, '2021_12_07_113457_create_slider_table', 0),
(19, '2021_12_07_113457_create_social_setting_table', 0),
(20, '2021_12_07_113457_create_subscribe_now_table', 0),
(21, '2021_12_07_113457_create_users_table', 0),
(22, '2021_12_16_062111_create_about_us_table', 0),
(23, '2021_12_16_062111_create_admin_dashboard_setting_table', 0),
(24, '2021_12_16_062111_create_contact_us_table', 0),
(25, '2021_12_16_062111_create_customer_verify_table', 0),
(26, '2021_12_16_062111_create_customers_table', 0),
(27, '2021_12_16_062111_create_expense_table', 0),
(28, '2021_12_16_062111_create_failed_jobs_table', 0),
(29, '2021_12_16_062111_create_footer_pages_table', 0),
(30, '2021_12_16_062111_create_income_table', 0),
(31, '2021_12_16_062111_create_jobs_table', 0),
(32, '2021_12_16_062111_create_merchant_table', 0),
(33, '2021_12_16_062111_create_notifications_table', 0),
(34, '2021_12_16_062111_create_password_resets_table', 0),
(35, '2021_12_16_062111_create_personal_access_tokens_table', 0),
(36, '2021_12_16_062111_create_restaurant_table', 0),
(37, '2021_12_16_062111_create_roles_table', 0),
(38, '2021_12_16_062111_create_schedule_table', 0),
(39, '2021_12_16_062111_create_shop_settings_table', 0),
(40, '2021_12_16_062111_create_slider_table', 0),
(41, '2021_12_16_062111_create_social_setting_table', 0),
(42, '2021_12_16_062111_create_subscribe_now_table', 0),
(43, '2021_12_16_062111_create_team_member_table', 0),
(44, '2021_12_16_062111_create_users_table', 0);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
('04f1f2eb-a596-4854-bb46-1bf45637eb9c', 'App\\Notifications\\OrderNotification', 'App\\User', 1, '{\"message\":\"New order notification\",\"marchant_id\":27,\"marchant_name\":\"Solayman Ali\"}', NULL, '2021-11-29 10:24:30', '2021-11-29 10:24:30'),
('07ed7cbb-b2b3-46c0-a6bb-bee87061fd60', 'App\\Notifications\\SupportNotification', 'App\\User', 1, '{\"marchant_id\":27,\"marchant_name\":\"Solayman Ali\"}', NULL, '2021-11-29 10:30:01', '2021-11-29 10:30:01'),
('16c68cf8-fcae-450f-8c58-c4c59145dd6d', 'App\\Notifications\\SupportNotification', 'App\\User', 6, '{\"marchant_id\":27,\"marchant_name\":\"Solayman Ali\"}', NULL, '2021-11-27 11:45:34', '2021-11-27 11:45:34'),
('1e5cc404-e29f-444e-ae44-82c727fc8cc0', 'App\\Notifications\\PaymentNotification', 'App\\User', 6, '{\"total_amount\":17665,\"marchant_id\":27,\"marchant_name\":\"Solayman Ali\",\"requested_amount\":\"10000\",\"payment_method\":\"Cash\"}', NULL, '2021-11-29 10:27:49', '2021-11-29 10:27:49'),
('2030f1b4-dfd0-4029-8d5a-093829cc9447', 'App\\Notifications\\PaymentNotification', 'App\\User', 1, '{\"total_amount\":17665,\"marchant_id\":27,\"marchant_name\":\"Solayman Ali\",\"requested_amount\":\"10000\",\"payment_method\":\"Cash\"}', NULL, '2021-11-29 10:27:49', '2021-11-29 10:27:49'),
('479f79a7-acbe-412f-9112-94e45bed0c16', 'App\\Notifications\\PaymentNotification', 'App\\User', 3, '{\"total_amount\":17665,\"marchant_id\":27,\"marchant_name\":\"Solayman Ali\",\"requested_amount\":\"10000\",\"payment_method\":\"Cash\"}', NULL, '2021-11-29 10:27:49', '2021-11-29 10:27:49'),
('491cab26-b234-4146-b5aa-d9a486129f9b', 'App\\Notifications\\OrderNotification', 'App\\User', 10, '{\"message\":\"New order notification\",\"marchant_id\":27,\"marchant_name\":\"Solayman Ali\"}', NULL, '2021-11-29 10:24:31', '2021-11-29 10:24:31'),
('4ddc0b15-a0b2-4f63-a45a-ad87415930c0', 'App\\Notifications\\SupportNotification', 'App\\User', 1, '{\"marchant_id\":27,\"marchant_name\":\"Solayman Ali\"}', '2021-11-27 11:59:06', '2021-11-27 11:45:33', '2021-11-27 11:45:33'),
('65bb80de-f683-4e34-8ec5-363ef20a89db', 'App\\Notifications\\SupportNotification', 'App\\User', 6, '{\"marchant_id\":27,\"marchant_name\":\"Solayman Ali\"}', NULL, '2021-11-29 10:30:01', '2021-11-29 10:30:01'),
('6898429c-f773-4da0-b2f1-b693a3751c36', 'App\\Notifications\\SupportNotification', 'App\\User', 10, '{\"marchant_id\":27,\"marchant_name\":\"Solayman Ali\"}', NULL, '2021-11-29 10:30:01', '2021-11-29 10:30:01'),
('6f893de5-8976-4557-93ce-fcd0794822d5', 'App\\Notifications\\OrderNotification', 'App\\User', 3, '{\"message\":\"New order notification\",\"marchant_id\":27,\"marchant_name\":\"Solayman Ali\"}', NULL, '2021-11-29 10:24:31', '2021-11-29 10:24:31'),
('848cb6e5-8009-41b1-8a5f-f77e3a86a5d0', 'App\\Notifications\\PaymentNotification', 'App\\User', 10, '{\"total_amount\":17665,\"marchant_id\":27,\"marchant_name\":\"Solayman Ali\",\"requested_amount\":\"10000\",\"payment_method\":\"Cash\"}', NULL, '2021-11-29 10:27:49', '2021-11-29 10:27:49'),
('8969793a-4518-4dbc-ae8c-74d392376f26', 'App\\Notifications\\SupportNotification', 'App\\User', 10, '{\"marchant_id\":27,\"marchant_name\":\"Solayman Ali\"}', NULL, '2021-11-27 11:45:34', '2021-11-27 11:45:34'),
('b0a5efae-d55a-441a-9e04-ecf34e47c431', 'App\\Notifications\\SupportNotification', 'App\\User', 3, '{\"marchant_id\":27,\"marchant_name\":\"Solayman Ali\"}', NULL, '2021-11-27 11:45:34', '2021-11-27 11:45:34'),
('c1bb47d4-a955-4da5-8b3a-91928dd3b037', 'App\\Notifications\\SupportNotification', 'App\\User', 3, '{\"marchant_id\":27,\"marchant_name\":\"Solayman Ali\"}', NULL, '2021-11-29 10:30:01', '2021-11-29 10:30:01'),
('fa0eec25-6bd6-4fb4-865e-aa79de5ef616', 'App\\Notifications\\OrderNotification', 'App\\User', 6, '{\"message\":\"New order notification\",\"marchant_id\":27,\"marchant_name\":\"Solayman Ali\"}', NULL, '2021-11-29 10:24:31', '2021-11-29 10:24:31');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `restaurant_id` bigint(100) NOT NULL,
  `merchant_id` bigint(20) DEFAULT NULL,
  `restaurant_name` varchar(100) NOT NULL,
  `restaurant_code` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `tin` int(100) NOT NULL,
  `since` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '1 active, 2 not active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`restaurant_id`, `merchant_id`, `restaurant_name`, `restaurant_code`, `address`, `tin`, `since`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(90, 90, 'demo name', '5464', 'address', 4545, NULL, 1, '2021-12-15 15:45:27', '2021-12-15 15:45:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(191) NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `name`, `section`) VALUES
(16, 'Manager', 'orders , website_section , website_slider , website_footer_page , website_homepage_category , website_about_us , website_social_links , create_role , role_managment , manage_staff'),
(17, 'Moderator', 'orders , add_product , blog_category , website_setting , website_homepage_category , website_about_us , subscribe_us , HRM_Sector'),
(18, 'Staff', 'orders , manage_product , create_role , role_managment'),
(19, 'new role', 'orders , manage_product , blog_sector , blog_post , blog_category , website_section , website_setting , website_about_us , frontend_request , email_template , manage_customers , role_managment');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schedule_id` bigint(100) NOT NULL COMMENT '1 open, 2 close',
  `restaurant_id` int(100) NOT NULL,
  `sunday` varchar(100) DEFAULT NULL COMMENT '1 active, 2 inactive',
  `monday` varchar(100) DEFAULT NULL COMMENT '1 active, 2 inactive',
  `tuesday` varchar(100) DEFAULT NULL COMMENT '1 active, 2 inactive',
  `wednesday` varchar(100) DEFAULT NULL COMMENT '1 active, 2 inactive',
  `thursday` varchar(100) DEFAULT NULL COMMENT '1 active, 2 inactive',
  `friday` varchar(100) DEFAULT NULL COMMENT '1 active, 2 inactive',
  `saturday` varchar(100) DEFAULT NULL COMMENT '1 active, 2 inactive',
  `shop_open` time DEFAULT NULL,
  `shop_close` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`schedule_id`, `restaurant_id`, `sunday`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `shop_open`, `shop_close`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 90, '1', NULL, NULL, '1', '1', NULL, NULL, '03:50:00', '03:49:00', '2021-12-15 15:45:27', '2021-12-15 15:45:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shop_settings`
--

CREATE TABLE `shop_settings` (
  `ShopID` bigint(44) NOT NULL,
  `ShopName` varchar(100) CHARACTER SET utf8 NOT NULL,
  `BannerName` text CHARACTER SET utf8 DEFAULT NULL,
  `Heading` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Email_2` varchar(255) DEFAULT NULL,
  `Phone` varchar(44) CHARACTER SET utf8 DEFAULT NULL,
  `Phone_2` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `app_link` varchar(191) DEFAULT NULL,
  `Address` text CHARACTER SET utf8 DEFAULT NULL,
  `Website` text DEFAULT NULL,
  `company_details` text CHARACTER SET utf8 DEFAULT NULL,
  `Image` varchar(66) CHARACTER SET utf8 DEFAULT 'logo.png',
  `banner` varchar(191) CHARACTER SET utf8 NOT NULL DEFAULT 'banner.jpg',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop_settings`
--

INSERT INTO `shop_settings` (`ShopID`, `ShopName`, `BannerName`, `Heading`, `Email`, `Email_2`, `Phone`, `Phone_2`, `app_link`, `Address`, `Website`, `company_details`, `Image`, `banner`, `created_at`, `updated_at`) VALUES
(1, 'FoodDoes', NULL, 'বাংলা হেডিং', 'rrashadullahaq@gmail.com', 'info@fooddoose.com', '01406666014', '01680488034', 'https://play.google.com/foodoose', 'ঢাকা, বাংলাদেশ', 'https://www.google.com', '<b><i>Mirpur</i>, <i>Dhaka </i></b>', 'logo.png', 'food-banner.jpg', '2020-08-04 11:22:59', '2021-12-15 05:59:48'),
(2, 'english shop', NULL, 'no heading', 'info@tubaglobal.com', 'm.sohel@tubaglobal.com', '017000000', '1521440437', 'https://play.google.com', 'dhaka bangladesh', 'https://www.google.com', 'TUBA Global Export-Import Marketing Limited is an entry level participant with huge potential that focuses on export of fruits, vegitables, wheats, corn, olive oil, sunflower oil, suger, frozen edible items, chemicals, marbles, medical equipements etc', 'logo.png', 'food-banner.jpg', '2020-08-04 11:22:59', '2021-07-14 23:03:47');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(100) NOT NULL,
  `slider_details` varchar(200) DEFAULT NULL,
  `slider_link` varchar(200) DEFAULT NULL,
  `slider_image` varchar(150) DEFAULT 'slider_image.jpg',
  `slider_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 deactive 1 active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slider_id`, `slider_details`, `slider_link`, `slider_image`, `slider_status`, `created_at`, `updated_at`) VALUES
(3, 'Slider Details', NULL, '1639426456.jpg', 1, '2021-08-13 03:02:35', '2021-08-13 03:02:35'),
(4, 'fasfas', NULL, '1628827069.jpg', 1, '2021-08-13 03:02:35', '2021-08-13 03:02:35');

-- --------------------------------------------------------

--
-- Table structure for table `social_setting`
--

CREATE TABLE `social_setting` (
  `id` int(11) NOT NULL,
  `name` varchar(191) CHARACTER SET utf8 NOT NULL,
  `link` varchar(191) NOT NULL,
  `icon` varchar(191) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `social_setting`
--

INSERT INTO `social_setting` (`id`, `name`, `link`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(16, 'Facebook', 'https://www.facebook.com/Urban-Era-106198531107811', 'fab fa-facebook-f', 1, '2021-03-11 17:56:21', '2020-11-02 04:16:13'),
(19, 'Twitter', 'https://twitter.com/Urbaneraltd', 'fab fa-twitter', 1, '2021-03-11 17:56:56', '2020-11-03 08:34:16'),
(20, 'Instagram', 'https://www.instagram.com/urbaneraltd/', 'fab fa-instagram', 0, '2021-03-11 17:57:13', '2020-11-03 08:35:10'),
(21, 'Linkedin', 'https://www.linkedin.com/in/urban-era-7a73ba1ba/', 'fab fa-linkedin-in', 1, '2021-03-11 18:01:53', '2020-11-03 08:35:54');

-- --------------------------------------------------------

--
-- Table structure for table `subscribe_now`
--

CREATE TABLE `subscribe_now` (
  `subscribe_now_id` bigint(100) NOT NULL,
  `customer_id` int(100) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subscribe_now`
--

INSERT INTO `subscribe_now` (`subscribe_now_id`, `customer_id`, `email`, `created_at`, `updated_at`) VALUES
(1, 27, 'ratonmsa@gmail.com', '2021-03-19 00:00:21', '2021-08-12 15:12:01'),
(2, NULL, 'ratonmsa43@gmail.com', '2021-08-18 18:13:35', '2021-08-18 18:13:35'),
(3, NULL, 'ratonmsa1@gmail.com', '2021-08-18 18:15:43', '2021-08-18 18:15:43'),
(4, NULL, 'kunze.carter@example.org', '2021-08-18 18:18:56', '2021-08-18 18:18:56'),
(5, NULL, 'ratonmsa@gmail.com', '2021-08-18 19:48:14', '2021-08-18 19:48:14'),
(6, NULL, 'ratonmsa@gmail.com', '2021-08-18 19:48:21', '2021-08-18 19:48:21');

-- --------------------------------------------------------

--
-- Table structure for table `team_member`
--

CREATE TABLE `team_member` (
  `team_member_id` int(11) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `facebook` varchar(200) DEFAULT NULL,
  `linkdin` varchar(200) DEFAULT NULL,
  `twitter` varchar(200) DEFAULT NULL,
  `team_member_image` varchar(200) DEFAULT 'image.jpg',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `team_member`
--

INSERT INTO `team_member` (`team_member_id`, `name`, `details`, `position`, `phone`, `email`, `facebook`, `linkdin`, `twitter`, `team_member_image`, `created_at`, `updated_at`) VALUES
(5, 'Demo team members', 'some details about team member 1', 'CEO', '017662120', 'ratonmsa@gmail.com', NULL, NULL, NULL, '1623004738.png', '2021-06-06 18:38:58', '2021-06-06 18:38:58'),
(6, 'Solayman Ali', 'details', 'demo position', '017662120', 'ratonmsa@gmail.com', 'facebook.com', 'linkdin.com', 'twitter.com', '1628746460.jpg', '2021-06-06 18:49:32', '2021-12-13 14:33:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8 DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(100) DEFAULT NULL,
  `user_type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'admin, merchant, rider',
  `photo` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '1 approve, 2 pending,3 banned',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `email_verified_at`, `password`, `remember_token`, `role_id`, `user_type`, `photo`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Solayman Ali', 'ratonmsa0@gmail.com', '01768815795', 'demo address', NULL, '$2y$10$iQ8UEHVAaaVGdB4MYBwV5e/KUeVa4N2ukRzbJ2Wgd/f6ZCescSwbW', 'aqq1c9qwOICOfQHtwJHIgVGtA58iHEvZfqvFtOWwcrYkftb3eBL08TDR8WYc', 18, 'admin', '20211215190969614339_461240217805834_3730829745466638336_n.jpg', 1, '2020-12-09 00:30:34', '2021-12-15 13:09:43'),
(8, 'Solayman Ali', 'admin@gmail.com', NULL, 'Dhaka bangladehs', NULL, '$2y$10$kJxdvFYeQJLpDJ2SAN4c3udqetSNSdzoA/EXgICb3ThpmVcoD6mJO', NULL, 18, 'admin', NULL, 1, '2021-12-07 03:28:09', '2021-12-15 00:14:14'),
(20, 'demo', 'ratonmsa@gmail.com', '01766212029', 'demo', NULL, '$2y$10$omwywlEKWEkcA246QG7SdO91jg3Z6TChyqdb2oyCE/DZqZuH4pThG', NULL, NULL, 'merchant', NULL, 1, '2021-12-15 15:45:26', '2021-12-15 15:45:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`expense_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `footer_pages`
--
ALTER TABLE `footer_pages`
  ADD PRIMARY KEY (`footer_page_id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`income_id`);

--
-- Indexes for table `merchant`
--
ALTER TABLE `merchant`
  ADD PRIMARY KEY (`merchant_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`restaurant_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `shop_settings`
--
ALTER TABLE `shop_settings`
  ADD PRIMARY KEY (`ShopID`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `social_setting`
--
ALTER TABLE `social_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribe_now`
--
ALTER TABLE `subscribe_now`
  ADD PRIMARY KEY (`subscribe_now_id`);

--
-- Indexes for table `team_member`
--
ALTER TABLE `team_member`
  ADD PRIMARY KEY (`team_member_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `accounts_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `expense_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `footer_pages`
--
ALTER TABLE `footer_pages`
  MODIFY `footer_page_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `income_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `merchant`
--
ALTER TABLE `merchant`
  MODIFY `merchant_id` bigint(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `restaurant_id` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_id` bigint(100) NOT NULL AUTO_INCREMENT COMMENT '1 open, 2 close', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shop_settings`
--
ALTER TABLE `shop_settings`
  MODIFY `ShopID` bigint(44) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `social_setting`
--
ALTER TABLE `social_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `subscribe_now`
--
ALTER TABLE `subscribe_now`
  MODIFY `subscribe_now_id` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `team_member`
--
ALTER TABLE `team_member`
  MODIFY `team_member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
