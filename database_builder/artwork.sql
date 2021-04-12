-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2021 at 04:31 AM
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
-- Table structure for table `artwork`
--

CREATE TABLE `artwork` (
  `ArtworkID` smallint(5) UNSIGNED NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Name` varchar(60) NOT NULL,
  `Artist` varchar(60) NOT NULL,
  `YearMade` int(11) DEFAULT NULL,
  `MovementName` varchar(50) DEFAULT NULL,
  `Price` varchar(60) DEFAULT NULL,
  `Type` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artwork`
--

INSERT INTO `artwork` (`ArtworkID`, `Image`, `Name`, `Artist`, `YearMade`, `MovementName`, `Price`, `Type`) VALUES
(1, 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/ec/Mona_Lisa%2C_by_Leonardo_da_Vinci%2C_from_C2RMF_retouched.jpg/300px-Mona_Lisa%2C_by_Leonardo_da_Vinci%2C_from_C2RMF_retouched.jpgg', 'Mona Lisa', 'Leonardo de Vinci', 1517, 'Renaissance', '$100 million', 'Painting'),
(2, 'https://www.vangoghgallery.com/img/starry_night_full.jpg', 'The Starry Night', 'Vincent Van Gogh', 1889, 'Post-Impressionism', '$100 million', 'Painting'),
(3, 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/0b/Sandro_Botticelli_-_La_nascita_di_Venere_-_Google_Art_Project_-_edited.jpg/400px-Sandro_Botticelli_-_La_nascita_di_Venere_-_Google_Art_Project_-_edited.jpg', 'The Birth of Venus', 'Sandro Botticelli', 1485, 'Renaissance', '$500 million', 'Painting'),
(4, 'https://upload.wikimedia.org/wikipedia/en/thumb/7/74/PicassoGuernica.jpg/350px-PicassoGuernica.jpg', 'Guernica', 'Pablo Picasso', 1937, 'Cubism', '$200 million', 'Painting'),
(5, 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/84/Michelangelo%27s_David_2015.jpg/250px-Michelangelo%27s_David_2015.jpg', 'David of Michelangelo', 'Michelangelo', 1504, 'Renaissance', '$65 million', 'Sculpture'),
(6, 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/22/Da_Vinci_Vitruve_Luc_Viatour.jpg/300px-Da_Vinci_Vitruve_Luc_Viatour.jpg', 'Vitruvian Man', 'Leonardo de Vinci', 1490, 'Renaissance', '$16 million', 'Drawing'),
(7, 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/dd/Marcel_Duchamp%2C_1917%2C_Fountain%2C_photograph_by_Alfred_Stieglitz.jpg/220px-Marcel_Duchamp%2C_1917%2C_Fountain%2C_photograph_by_Alfred_Stieglitz.jpg', 'Fountain', 'Marcel Duchamp', 1917, 'Fauvism', '$2 million', 'Sculpture'),
(8, 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a5/Tsunami_by_hokusai_19th_century.jpg/350px-Tsunami_by_hokusai_19th_century.jpg', 'The Great Wave off Kanagawa', 'Hokusai', 1831, 'Romanticism', '$77,500', 'Print'),
(9, 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6c/Michelangelo%27s_Pieta_5450_cut_out_black.jpg/275px-Michelangelo%27s_Pieta_5450_cut_out_black.jpg', 'The Pietà', 'Michelangelo', 1499, 'Renaissance', '$300 million', 'Sculpture'),
(10, 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/21/Leonardo_da_Vinci%2C_Study_for_the_Madonna_of_the_Cat_%28recto%29.jpg/260px-Leonardo_da_Vinci%2C_Study_for_the_Madonna_of_the_Cat_%28recto%29.jpg', 'Study of the Madonna and Child with a Cat', 'Leonardo de Vinci', 1478, 'Renaissance', 'Priceless', 'Drawing'),
(11, 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/7a/Banksy_Kissing_Policemen-cropped.jpg/300px-Banksy_Kissing_Policemen-cropped.jpg', 'Kissing Coppers', 'Banksy ', 2004, 'Contemporary Art', '$700,000', 'Graffiti');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artwork`
--
ALTER TABLE `artwork`
  ADD PRIMARY KEY (`ArtworkID`),
  ADD KEY `MovementName` (`MovementName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artwork`
--
ALTER TABLE `artwork`
  MODIFY `ArtworkID` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artwork`
--
ALTER TABLE `artwork`
  ADD CONSTRAINT `artwork_ibfk_1` FOREIGN KEY (`MovementName`) REFERENCES `movement` (`NAME`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
