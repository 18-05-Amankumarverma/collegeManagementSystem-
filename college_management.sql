-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2024 at 09:30 PM
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
-- Database: `college_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `admin_name` char(30) NOT NULL,
  `admin_password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `admin_name`, `admin_password`) VALUES
(1, 'aman', 'aman@123');

-- --------------------------------------------------------

--
-- Table structure for table `file_upload`
--

CREATE TABLE `file_upload` (
  `file_uploader_name` varchar(30) NOT NULL,
  `file_uploader_email` varchar(40) NOT NULL,
  `file_upload_box` varchar(100) NOT NULL,
  `message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `file_upload`
--

INSERT INTO `file_upload` (`file_uploader_name`, `file_uploader_email`, `file_upload_box`, `message`) VALUES
('aman', 'akverma2017.jsr@gmail.com', 'Signature.jpeg', 'new file added'),
('aditya', 'aditya@gmail.com', 'laptopImageScreen-removebg-preview.png', 'image uploaded ');

-- --------------------------------------------------------

--
-- Table structure for table `student_login`
--

CREATE TABLE `student_login` (
  `id` int(30) NOT NULL,
  `username` char(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_login`
--

CREATE TABLE `teacher_login` (
  `id` int(30) NOT NULL,
  `teacher_name` char(30) NOT NULL,
  `teacher_password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher_login`
--

INSERT INTO `teacher_login` (`id`, `teacher_name`, `teacher_password`) VALUES
(2, 'aman', 'aman');

-- --------------------------------------------------------

--
-- Table structure for table `userloginrecord`
--

CREATE TABLE `userloginrecord` (
  `logedUserName` char(30) NOT NULL,
  `logedUserIp` varchar(150) NOT NULL,
  `logedUserLocation` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userloginrecord`
--

INSERT INTO `userloginrecord` (`logedUserName`, `logedUserIp`, `logedUserLocation`) VALUES
('aman', 'aman', 'bihar patna'),
('abhi', 'aman', 'Location: , , '),
('ajit', '::1', 'Location: Patna, Bihar, IN'),
('aman', '::1', 'Location: , , '),
('aman', '::1', 'Location: , , '),
('aman', '::1', 'Location: , , '),
('aman', '::1', 'Location: Patna, Bihar, IN'),
('aman', '::1', 'Location: Patna, Bihar, IN'),
('aman', '::1', 'Location: Patna, Bihar, IN'),
('aman', '::1', 'Location: Patna, Bihar, IN'),
('aman', '::1', 'Location: Patna, Bihar, IN'),
('aman', '::1', 'Location: Patna, Bihar, IN'),
('aman', '::1', 'Location: Patna, Bihar, IN'),
('aman', '::1', 'Location: Patna, Bihar, IN'),
('aman', '::1', 'Location: Patna, Bihar, IN'),
('aman', '::1', 'Location: Patna, Bihar, IN'),
('aman', '::1', 'Location: Patna, Bihar, IN'),
('aman', '::1', 'Location: Patna, Bihar, IN'),
('aman', '::1', 'Location: Patna, Bihar, IN'),
('aman', '::1', 'Location: Patna, Bihar, IN'),
('aman', '::1', 'Location: Patna, Bihar, IN'),
('aman', '::1', 'Location: Patna, Bihar, IN'),
('ravi sharma', '::1', 'Location: Patna, Bihar, IN'),
('ravi sharma', '::1', 'Location: Patna, Bihar, IN'),
('ravi sharma', '::1', 'Location: Patna, Bihar, IN'),
('aman', '::1', 'Location: Patna, Bihar, IN'),
('aman', '::1', 'Location: Patna, Bihar, IN'),
('aman', '::1', 'Location: , , '),
('aman', '::1', 'Location: , , '),
('aman', '::1', 'Location: Patna, Bihar, IN'),
('aman', '', 'Location: , , '),
('aman', '', 'Location: , , '),
('aman', '::1', 'Location: , , '),
('aman', '::1', 'Location: , , '),
('aman', '::1', 'Location: , , '),
('aman', '::1', 'Location: , , '),
('aman', '::1', 'Location: , , '),
('aman', '::1', 'Location: , , '),
('aman', '::1', 'Location: , , '),
('aman', '::1', 'Location: , , '),
('aman', '::1', 'Location: , , '),
('aman', '::1', 'Location: , , '),
('aman', '::1', 'Location: , , ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_login`
--
ALTER TABLE `student_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_login`
--
ALTER TABLE `teacher_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_login`
--
ALTER TABLE `student_login`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacher_login`
--
ALTER TABLE `teacher_login`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
