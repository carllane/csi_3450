-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2021 at 03:58 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `movement`
--

CREATE TABLE `movement` (
  `NAME` varchar(45) NOT NULL,
  `StartYear` int(11) DEFAULT NULL,
  `EndYear` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movement`
--

INSERT INTO `movement` (`NAME`, `StartYear`, `EndYear`) VALUES
('Contemporary Art', 1970, 2021),
('Cubism', 1907, 1914),
('Fauvism', 1900, 1935),
('Impressionism', 1865, 1885),
('Post-Impressionism', 1885, 1910),
('Renaissance', 1400, 1600),
('Romanticism', 1780, 1850);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movement`
--
ALTER TABLE `movement`
  ADD PRIMARY KEY (`NAME`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
