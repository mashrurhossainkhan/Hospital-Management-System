-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2019 at 04:55 AM
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
-- Table structure for table `patientappointment`
--

CREATE TABLE `patientappointment` (
  `Name` varchar(500) NOT NULL,
  `Number` varchar(500) NOT NULL,
  `Email` varchar(500) NOT NULL,
  `AssignDoctor` varchar(500) NOT NULL,
  `HospitalName` varchar(500) NOT NULL,
  `DepartmentName` varchar(500) NOT NULL,
  `Pic` varchar(500) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patientappointment`
--

INSERT INTO `patientappointment` (`Name`, `Number`, `Email`, `AssignDoctor`, `HospitalName`, `DepartmentName`, `Pic`, `ID`) VALUES
('dfgdfg', '', 'gikghjk', 'fghjgfj', 'abc', 'fgjhfgjh', '', 1),
('Elma', 'bolbe na', 'sumsum@gmail.com', 'kkkk', 'abc', 'adfasdf', '', 2),
('fghd', '', 'vjhngj', 'fgjfgj', 'abcd', 'fgjgfjh', '', 3),
('fghd', '', 'vjhngj', 'fgjfgj', 'abcd', 'fgjgfjh', '', 4),
('jhfgj', '', 'hjghj', 'fgjhfg', 'abc', 'fgjhfgj', '', 5),
('jhfgj', '', 'hjghj', 'fgjhfg', 'abc', 'fgjhfgj', '', 6),
('hdfg', '', 'dfgh', 'mim', 'abcd', 'dfhdfgh', '', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patientappointment`
--
ALTER TABLE `patientappointment`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patientappointment`
--
ALTER TABLE `patientappointment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
