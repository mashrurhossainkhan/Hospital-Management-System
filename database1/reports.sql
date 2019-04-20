-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2019 at 04:56 AM
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
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `PatientName` varchar(550) NOT NULL,
  `PatientID` int(11) NOT NULL,
  `Report` varchar(700) NOT NULL,
  `DoctorName` varchar(500) NOT NULL,
  `ReferredDoctor` varchar(500) NOT NULL,
  `Files` varchar(300) NOT NULL,
  `medicines` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`PatientName`, `PatientID`, `Report`, `DoctorName`, `ReferredDoctor`, `Files`, `medicines`) VALUES
('dfsgdsfgsd', 2, 'dsfgdsfgsdfgsdfg', 'dim', '', '', ''),
('', 0, '', 'dim', '', '', ''),
('c bncvbn', 11, 'dghfdghdfghd fd hgdfg h', 'mashrur', 'gchhdhgf', '', ''),
('c bncvbn', 11, 'dghfdghdfghd fd hgdfg h', 'mashrur', 'gchhdhgf', '', ''),
('sdfsdf', 1, 'asdfa', 'sadfasd', 'mashrur', '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
