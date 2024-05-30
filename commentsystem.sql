-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2024 at 09:31 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `commentsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment_tb`
--

CREATE TABLE `comment_tb` (
  `id` int(30) NOT NULL,
  `commenterName` varchar(30) NOT NULL,
  `message` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment_tb`
--

INSERT INTO `comment_tb` (`id`, `commenterName`, `message`) VALUES
(28, 'ravi kumar', 'best blog'),
(29, 'Aman', 'good blog'),
(30, 'prince kumar', 'this blog is awsome'),
(31, 'anu', 'awasome'),
(32, 'esha', 'this blog is best for ai '),
(33, 'ayush', 'who is writer'),
(34, 'sameer', 'hi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment_tb`
--
ALTER TABLE `comment_tb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment_tb`
--
ALTER TABLE `comment_tb`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
