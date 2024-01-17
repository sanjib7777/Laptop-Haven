-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2024 at 03:32 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laptop`
--

-- --------------------------------------------------------

--
-- Table structure for table `ldetails`
--

CREATE TABLE `ldetails` (
  `SN` int(11) NOT NULL,
  `Laptop_name` text DEFAULT NULL,
  `Specification` text DEFAULT NULL,
  `Price` text DEFAULT NULL,
  `Image` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ldetails`
--

INSERT INTO `ldetails` (`SN`, `Laptop_name`, `Specification`, `Price`, `Image`) VALUES
(58, 'dell', '123412', '43,00', 0x70726f6475637430332e706e67),
(59, '2', 'sanjib shah', '1,200', 0x70726f6475637430382e706e67),
(60, 'acer', 'nabin', '1200000', 0x70726f6475637430372e706e67);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ldetails`
--
ALTER TABLE `ldetails`
  ADD PRIMARY KEY (`SN`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ldetails`
--
ALTER TABLE `ldetails`
  MODIFY `SN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
