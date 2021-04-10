-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2021 at 03:52 AM
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
-- Database: `gallerydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tour`
--

CREATE TABLE `tour` (
  `GuideID` smallint(5) UNSIGNED NOT NULL,
  `DateTime` datetime NOT NULL,
  `SpotsLeft` tinyint(3) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tour`
--

INSERT INTO `tour` (`GuideID`, `DateTime`, `SpotsLeft`) VALUES
(2, '2021-04-21 16:00:00', 30),
(3, '2022-05-03 11:30:00', 50),
(1, '2021-07-30 10:15:00', 20),
(2, '2021-12-09 12:30:00', 40),

(3, '2022-09-29 11:45:00', 10),
(3, '2022-09-11 15:15:00', 25),
(1, '2021-08-27 17:45:00', 35),
(2, '2021-11-21 11:15:00', 15),
(1, '2021-05-21 09:00:00', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tour`
--
ALTER TABLE `tour`
  ADD PRIMARY KEY (`GuideID`,`DateTime`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tour`
--
ALTER TABLE `tour`
  ADD CONSTRAINT `tour_ibfk_1` FOREIGN KEY (`GuideID`) REFERENCES `guide` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
