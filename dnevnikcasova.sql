-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2022 at 08:01 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dnevnikcasova`
--

-- --------------------------------------------------------

--
-- Table structure for table `nastavnik`
--

CREATE TABLE `nastavnik` (
  `nastavnikId` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nastavnik`
--

INSERT INTO `nastavnik` (`nastavnikId`, `username`, `password`) VALUES
(1, 'andjelam', 'andjelam'),
(2, 'nadazec', 'nadazec'),
(3, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `privatnicas`
--

CREATE TABLE `privatnicas` (
  `privatnicasID` int(11) NOT NULL,
  `naziv` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `opis` text COLLATE utf8_unicode_ci NOT NULL,
  `predavac` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `privatnicas`
--

INSERT INTO `privatnicas` (`privatnicasID`, `naziv`, `opis`, `predavac`) VALUES
(1, 'Matematika', 'Matemaika za osnovu i sredjnu skolu. Grupe za slusanje su po dvoje troje.', 1),
(2, 'HemijaPrakt', 'Rad u laboratoriji i izvodjenje eksperimenata.', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nastavnik`
--
ALTER TABLE `nastavnik`
  ADD PRIMARY KEY (`nastavnikId`);

--
-- Indexes for table `privatnicas`
--
ALTER TABLE `privatnicas`
  ADD PRIMARY KEY (`privatnicasID`),
  ADD KEY `privatnicas_ibfk_1` (`predavac`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nastavnik`
--
ALTER TABLE `nastavnik`
  MODIFY `nastavnikId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `privatnicas`
--
ALTER TABLE `privatnicas`
  MODIFY `privatnicasID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `privatnicas`
--
ALTER TABLE `privatnicas`
  ADD CONSTRAINT `privatnicas_ibfk_1` FOREIGN KEY (`predavac`) REFERENCES `nastavnik` (`nastavnikId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
