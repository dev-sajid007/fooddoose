-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 16, 2021 at 04:43 AM
-- Server version: 10.3.25-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fooddoose_fooddoose_main_site`
--

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `merchant`
--
ALTER TABLE `merchant`
  ADD PRIMARY KEY (`merchant_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `merchant`
--
ALTER TABLE `merchant`
  MODIFY `merchant_id` bigint(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
