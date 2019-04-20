-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2019 at 04:53 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospitalmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `PatientName` varchar(500) NOT NULL,
  `ID` varchar(500) NOT NULL,
  `PhoneNumber` varchar(500) NOT NULL,
  `Email` varchar(500) NOT NULL,
  `DoctorPayment` varchar(500) NOT NULL,
  `MedicineCost` varchar(500) NOT NULL,
  `CabinCost` varchar(500) NOT NULL,
  `OTCost` varchar(500) NOT NULL,
  `IcuCost` varchar(500) NOT NULL,
  `TestCost` varchar(500) NOT NULL,
  `Others` varchar(500) NOT NULL,
  `CarCost` varchar(500) NOT NULL,
  `AdminName` varchar(500) NOT NULL,
  `HospitalName` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`PatientName`, `ID`, `PhoneNumber`, `Email`, `DoctorPayment`, `MedicineCost`, `CabinCost`, `OTCost`, `IcuCost`, `TestCost`, `Others`, `CarCost`, `AdminName`, `HospitalName`) VALUES
('ertd', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('dsfgds', '2', '', '', '', '', '', '', '', '', '', '', '', ''),
('dfgdfg', '3', '233', 'sdfg', '', '', '', '', '', '', '', '', '', ''),
('dfgdfg', '3', '233', 'sdfg', '', '', '', '', '', '', '', '', '', ''),
('fdgdfs', '3', '433453', 'dfhd', '1212', '121', '', '', '', '', '', '', '', ''),
('styrey', '44', '5655', 'fgjf', '6fj', 'fgjfg', 'hjfgjh', 'fgjfgj', 'fgj', 'fgjhf', 'ghjfg', 'jhfghj', '', ''),
('gjyhgf', '4', '67', 'fjk', 'ghk', 'ghjkgh', 'kghk', 'ghjk', 'ghjkghjkgh', 'kghk', 'jkghkgh', 'kghkhk', 'mashrur', ''),
('gjyhgf', '4', '67', 'fjk', 'ghk', 'ghjkgh', 'kghk', 'ghjk', 'ghjkghjkgh', 'kghk', 'jkghkgh', 'kghkhk', 'mashrur', 'abc');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
