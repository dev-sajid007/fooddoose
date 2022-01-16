-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2021 at 03:15 PM
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `users` (`id`, `name`, `email`, `address`, `email_verified_at`, `password`, `remember_token`, `role_id`, `user_type`, `photo`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Solayman Ali', 'ratonmsa@gmail.com', 'demo address', NULL, '$2y$10$iQ8UEHVAaaVGdB4MYBwV5e/KUeVa4N2ukRzbJ2Wgd/f6ZCescSwbW', 'xsmR9Bv1hkr6knQ37MaSaJ0aW2L6IJd5XCFW0LFLus9QFu02kAiGKvhtfyPf', 18, 'admin', NULL, 1, '2020-12-09 00:30:34', '2021-08-29 16:04:49'),
(8, 'Solayman Ali', 'admin@gmail.com', 'Dhaka bangladehs', NULL, '$2y$10$UcbSawMt2kYWgFBaCJqiPuOyRtTY7P27/bzr/PvF48sQadkyfWIse', NULL, 18, NULL, NULL, NULL, '2021-12-07 03:28:09', '2021-12-07 03:28:09');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
