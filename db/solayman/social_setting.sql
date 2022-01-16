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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `social_setting`
--
ALTER TABLE `social_setting`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `social_setting`
--
ALTER TABLE `social_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
