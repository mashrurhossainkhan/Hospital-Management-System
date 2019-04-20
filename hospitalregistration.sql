-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2019 at 04:54 AM
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
-- Table structure for table `hospitalregistration`
--

CREATE TABLE `hospitalregistration` (
  `Name` varchar(500) NOT NULL,
  `Password` varchar(500) NOT NULL,
  `Number` varchar(500) NOT NULL,
  `Email` varchar(500) NOT NULL,
  `HospitalName` varchar(500) NOT NULL,
  `Location` varchar(500) NOT NULL,
  `time1` varchar(500) NOT NULL,
  `time2` varchar(500) NOT NULL,
  `designation` varchar(500) NOT NULL,
  `AdminorDoctor` varchar(500) NOT NULL,
  `ID` int(11) NOT NULL,
  `Pic` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospitalregistration`
--

INSERT INTO `hospitalregistration` (`Name`, `Password`, `Number`, `Email`, `HospitalName`, `Location`, `time1`, `time2`, `designation`, `AdminorDoctor`, `ID`, `Pic`) VALUES
('gchhdhgf', '12345', '654654', 'mashrur', 'abc', 'fhfdghf', '', '', '', 'Admin', 1, ''),
('mim', 'abc', '04546456', 'mim', 'abcd', '', '3pm', '9pm', '', 'Doctor', 2, ''),
('fahim', '55555', '54654', 'fahim', 'abc', '', '11', '12', 'fdghdfgh', 'Doctor', 3, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hospitalregistration`
--
ALTER TABLE `hospitalregistration`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hospitalregistration`
--
ALTER TABLE `hospitalregistration`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
