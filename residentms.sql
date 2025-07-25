-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2025 at 09:53 AM
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
-- Database: `residentms`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`name`, `username`, `email`, `unit`, `password`, `type`) VALUES
('Admin01', 'admin01', 'admin@resident.com', '', 'admin0101', 'admin'),
('Anonymous', 'anon_user', 'anon@gmail.com', '2-1', 'anony', 'user'),
('Adam', 'adamboi', 'adam@gmail.com', '5-8', 'adamrox', 'user'),
('Chee Kai Han', 'ckh', 'ckh@gmail.com', '42-69', '123456', 'user'),
('Teh Chun Keat', 'tck', 'tck@gmail.com', '69-42', 'tck123', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `username` varchar(255) NOT NULL,
  `time` datetime NOT NULL,
  `report_type` varchar(255) NOT NULL,
  `report_info` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`username`, `time`, `report_type`, `report_info`) VALUES
('anon_user', '2025-07-25 02:18:29', 'Facilities', 'Toilet exploded'),
('anon_user', '2025-07-25 05:04:11', 'Residential', 'House exploded'),
('adamboi', '2025-07-25 06:28:27', 'Other', 'No toilet'),
('ckh', '2025-07-25 09:18:25', 'Staff', 'No do work');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
