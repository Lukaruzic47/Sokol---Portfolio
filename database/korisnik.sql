-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 05, 2024 at 09:21 PM
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
-- Database: `auth_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

DROP TABLE IF EXISTS `korisnik`;
CREATE TABLE IF NOT EXISTS `korisnik` (
  `ID_Korisnika` int(11) NOT NULL AUTO_INCREMENT,
  `Korisnicko_ime` varchar(50) COLLATE utf8_croatian_ci NOT NULL,
  `Lozinka` varchar(255) COLLATE utf8_croatian_ci NOT NULL,
  `Ovlasti_korisnika` int(11) NOT NULL,
  PRIMARY KEY (`ID_Korisnika`),
  UNIQUE KEY `unique_username` (`Korisnicko_ime`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`ID_Korisnika`, `Korisnicko_ime`, `Lozinka`, `Ovlasti_korisnika`) VALUES
(1, 'TinJosipSokol', '$2y$12$MxmRF44s0GmFKbTPGHvtLO5Xpy7gaRqRT8E.ohKdS.C7wKGXv1cCK', 1),
(2, 'Luka Ružić', '$2y$15$.CXLGp2FwkfFWLTdDWkia.D9xu6.tKgSh3iojcXXWuaPE7fac4ItK', 1),
(4, 'Treci korisnik', '$2y$14$0gqWmf2yGMYap8fjHXx/0eOZRaEiZ64uYuXQLPp2vqkOUQVmQwH3W', 2),
(5, 'Cetvrti korisnik', '$2y$14$w8n8ki6HsqVgCO5xqxz1AeqhGcACGDJnRlNOzLMRSqqz1H8GC0BIu', 1),
(55, 'Lukaruzic471', '$2y$15$8R8XCm9RkaFd7Df/K1iX1eLfhISO3vDjrwKxVgi.VevJtLrMGZU/W', 1),
(54, 'Lukaruzic47', '$2y$15$IqGiHivu79obbNJVemRdJO9A5ILDuc.npYrpbNe2T1cIqLQ5JbLre', 1),
(53, 'TinJosipSokol2', '$2y$15$a3cRrjJCKWXrC.Bn1Fhnz.jN4WkR0J8xOoyfhxiuLn2R1GQnz9aKa', 1),
(52, 'NoviKorisnik', '$2y$15$8RLmByEBiyMF2Qw6oMGgcekEhA27FO94jM.YVfEUC.YT3WMwZn866', 1),
(51, 'LukaJedanDva', '$2y$15$IPOzhzKatKMwpbwaf5/qA.NlasEckuwih1/q68QGD9mwNi1qSHpsm', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
