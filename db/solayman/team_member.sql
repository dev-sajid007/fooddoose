-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2021 at 09:50 PM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `team_member`
--
ALTER TABLE `team_member`
  ADD PRIMARY KEY (`team_member_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `team_member`
--
ALTER TABLE `team_member`
  MODIFY `team_member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
