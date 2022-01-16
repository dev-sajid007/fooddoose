-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 16, 2021 at 04:44 AM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedule_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_id` bigint(100) NOT NULL AUTO_INCREMENT COMMENT '1 open, 2 close', AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
