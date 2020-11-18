-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2020 at 05:01 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newsletter`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_newsletter`
--

CREATE TABLE `ci_newsletter` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `message` text NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ci_newsletter`
--

INSERT INTO `ci_newsletter` (`id`, `title`, `message`, `created_at`) VALUES
(1, 'test', 'test message', '2020-11-16');

-- --------------------------------------------------------

--
-- Table structure for table `ci_subscriber`
--

CREATE TABLE `ci_subscriber` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_subscriber`
--

INSERT INTO `ci_subscriber` (`id`, `name`, `email`) VALUES
(1, 'asma', 'asma@gmail.com'),
(2, 'test', 'test@gmail.com'),
(3, 'aaquib', 'aaquib@gmail.com'),
(44, 'hh', 'hhmansuri@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_newsletter`
--
ALTER TABLE `ci_newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_subscriber`
--
ALTER TABLE `ci_subscriber`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ci_newsletter`
--
ALTER TABLE `ci_newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ci_subscriber`
--
ALTER TABLE `ci_subscriber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
