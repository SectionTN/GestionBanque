-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 18, 2024 at 03:43 PM
-- Server version: 11.3.2-MariaDB
-- PHP Version: 8.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `BD1920`
--

-- --------------------------------------------------------

--
-- Table structure for table `agence`
--

CREATE TABLE `agence` (
  `code` varchar(6) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `tel` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agence`
--

INSERT INTO `agence` (`code`, `adresse`, `tel`) VALUES
('DJB055', 'Rue Mohamed Ali Djerba', '74555666'),
('GAB033', 'Rue de la solidarité Gabes', '76333222'),
('TUN001', 'Rue de la république Tunisie', '71888999');

-- --------------------------------------------------------

--
-- Table structure for table `compte`
--

CREATE TABLE `compte` (
  `numero` varchar(8) NOT NULL,
  `cin` varchar(8) NOT NULL,
  `type` enum('E','C') NOT NULL,
  `solde` decimal(10,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `compte`
--

INSERT INTO `compte` (`numero`, `cin`, `type`, `solde`) VALUES
('29837173', '12197137', 'C', 15.000),
('55063898', '12345678', 'E', 150.140),
('abc/1920', '19201920', 'C', 250.350);

-- --------------------------------------------------------

--
-- Table structure for table `operation`
--

CREATE TABLE `operation` (
  `code` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `numero` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dateOp` datetime NOT NULL,
  `nature` varchar(1) NOT NULL,
  `montant` decimal(10,3) NOT NULL
) ;

--
-- Dumping data for table `operation`
--

INSERT INTO `operation` (`code`, `numero`, `dateOp`, `nature`, `montant`) VALUES
('DJB055', 'abc/1920', '2024-05-18 13:17:36', 'D', 150.000),
('DJB055', 'abc/1920', '2024-05-18 13:17:54', 'R', 400.000),
('GAB033', 'abc/1920', '2024-05-18 15:05:54', 'D', 150.000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agence`
--
ALTER TABLE `agence`
  ADD PRIMARY KEY (`code`),
  ADD UNIQUE KEY `tel` (`tel`),
  ADD KEY `code` (`code`);

--
-- Indexes for table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`numero`),
  ADD KEY `numero` (`numero`);

--
-- Indexes for table `operation`
--
ALTER TABLE `operation`
  ADD PRIMARY KEY (`code`,`numero`,`dateOp`),
  ADD KEY `code` (`code`,`numero`),
  ADD KEY `numero` (`numero`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `operation`
--
ALTER TABLE `operation`
  ADD CONSTRAINT `operation_ibfk_1` FOREIGN KEY (`code`) REFERENCES `agence` (`code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `operation_ibfk_2` FOREIGN KEY (`numero`) REFERENCES `compte` (`numero`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
