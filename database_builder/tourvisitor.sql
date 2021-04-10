-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2021 at 03:54 AM
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
-- Table structure for table `tourvisitor`
--

CREATE TABLE `tourvisitor` (
  `TourGuideID` smallint(5) UNSIGNED NOT NULL,
  `TourDateTime` datetime NOT NULL,
  `VisitorID` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tourvisitor`
--
ALTER TABLE `tourvisitor`
  ADD PRIMARY KEY (`TourGuideID`,`TourDateTime`,`VisitorID`),
  ADD KEY `VisitorID` (`VisitorID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tourvisitor`
--
ALTER TABLE `tourvisitor`
  ADD CONSTRAINT `tourvisitor_ibfk_1` FOREIGN KEY (`VisitorID`) REFERENCES `visitor` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tourvisitor_ibfk_2` FOREIGN KEY (`TourGuideID`,`TourDateTime`) REFERENCES `tour` (`GuideID`, `DateTime`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
