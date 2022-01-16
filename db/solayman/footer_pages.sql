-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2021 at 09:51 PM
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
(8, 'demo', 'demo', 'contact, privacy, policy', 'demo header', 'demo subtitle', 'demo <b>details</b>', 1, NULL, '2021-12-13 09:35:47', '2021-12-13 09:35:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `footer_pages`
--
ALTER TABLE `footer_pages`
  ADD PRIMARY KEY (`footer_page_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `footer_pages`
--
ALTER TABLE `footer_pages`
  MODIFY `footer_page_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
