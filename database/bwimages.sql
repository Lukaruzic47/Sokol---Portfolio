-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 12, 2024 at 10:55 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tjsportfolio_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bwimages`
--

DROP TABLE IF EXISTS `bwimages`;
CREATE TABLE IF NOT EXISTS `bwimages` (
  `BWImages_ID` int(11) NOT NULL AUTO_INCREMENT,
  `BW_name` varchar(100) COLLATE utf8mb4_croatian_ci NOT NULL,
  `BW_date` date NOT NULL,
  `BW_image` varchar(120) COLLATE utf8mb4_croatian_ci NOT NULL,
  `BW_TV_Column` int(11) NOT NULL,
  `BW_TV_no` int(11) NOT NULL,
  `BW_Desktop_Column` int(11) DEFAULT NULL,
  `BW_Desktop_no` int(11) NOT NULL,
  `BW_Tablet_Column` int(11) DEFAULT NULL,
  `BW_Tablet_no` int(11) NOT NULL,
  `BW_Mobile_no` int(11) NOT NULL,
  PRIMARY KEY (`BWImages_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=86 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_croatian_ci;

--
-- Dumping data for table `bwimages`
--

INSERT INTO `bwimages` (`BWImages_ID`, `BW_name`, `BW_date`, `BW_image`, `BW_TV_Column`, `BW_TV_no`, `BW_Desktop_Column`, `BW_Desktop_no`, `BW_Tablet_Column`, `BW_Tablet_no`, `BW_Mobile_no`) VALUES
(1, 'Slika 16', '2024-02-29', 'pexels-joão-cabral-3304855.jpg', 2, 3, 1, 5, 2, 7, 12),
(2, 'Slika 15', '2024-05-23', 'pexels-joão-cabral-3299386.jpg', 3, 4, 1, 3, 2, 9, 16),
(3, 'Slika 14', '2024-05-21', 'pexels-j-h-57905.jpg', 2, 6, 3, 6, 1, 8, 19),
(4, 'Slika 13', '2024-05-26', 'pexels-j-h-21323.jpg', 3, 5, 3, 5, 1, 7, 22),
(5, 'Slika 11', '2024-05-17', 'pexels-jeremy-bishop-2923591.jpg', 2, 4, 3, 2, 1, 2, 9),
(6, 'Slika 12', '2024-03-31', 'pexels-jessica-lewis-thepaintedsquare-1010519.jpg', 4, 2, 3, 7, 1, 6, 8),
(7, 'Slika 9', '2024-05-30', 'pexels-hidden-couple-3048527.jpg', 2, 1, 1, 6, 2, 11, 1),
(8, 'Slika 10', '2024-05-09', 'pexels-jan-kroon-1263221.jpg', 4, 1, 1, 7, 2, 8, 3),
(9, 'Slika 8', '2024-03-20', 'pexels-george-panteris-5432964.jpg', 1, 5, 2, 4, 2, 10, 15),
(10, 'Slika 7', '2024-05-04', 'pexels-dương-nhân-1529881.jpg', 4, 5, 2, 8, 2, 5, 21),
(11, 'Slika 5', '2024-05-06', 'pexels-behrouz-sasani-5816424.jpg', 3, 2, 2, 6, 1, 3, 11),
(12, 'Slika 6', '2024-05-21', 'pexels-bruno-scramgnon-596132.jpg', 1, 1, 3, 1, 1, 10, 7),
(13, 'Slika 2', '2024-05-13', 'pexels-alex-fu-1229102.jpg', 2, 5, 2, 1, 2, 6, 4),
(14, 'Slika 3', '2024-02-19', 'pexels-andrey-grushnikov-707676.jpg', 3, 1, 3, 4, 1, 9, 20),
(15, 'Slika 4', '2025-04-09', 'pexels-balamurugan-anbazhagan-763097.jpg', 4, 4, 1, 8, 2, 13, 18),
(16, 'Slika 1', '2024-05-05', 'pexels-alexander-krivitskiy-1572878.jpg', 1, 6, 1, 1, 1, 1, 2),
(17, 'Slika 17', '2024-03-31', 'pexels-matej-776336.jpg', 1, 2, 2, 2, 2, 1, 23),
(18, 'Slika 18', '2024-05-07', 'pexels-omar-alnahi-18496.jpg', 4, 3, 2, 5, 2, 12, 5),
(19, 'Slika 19', '2024-05-09', 'pexels-pixabay-60027.jpg', 3, 6, 1, 4, 1, 4, 14),
(20, 'Slika 20', '2019-06-03', 'pexels-pixabay-164357.jpg', 1, 4, 2, 3, 1, 11, 24),
(21, 'Slika 21', '2024-04-29', 'pexels-pixabay-248280.jpg', 4, 6, 3, 8, 2, 2, 6),
(22, 'Slika 22', '2024-05-08', 'pexels-pixabay-256453.jpg', 1, 3, 2, 7, 1, 5, 13),
(23, 'Slika 23', '2024-05-10', 'pexels-pixabay-276374.jpg', 2, 2, 3, 3, 2, 3, 10),
(24, 'Slika 24', '2024-05-01', 'pexels-tatiana-fet-1105766.jpg', 3, 3, 1, 2, 2, 4, 17);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
