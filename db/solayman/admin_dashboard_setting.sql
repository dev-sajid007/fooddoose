-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2021 at 09:52 PM
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
