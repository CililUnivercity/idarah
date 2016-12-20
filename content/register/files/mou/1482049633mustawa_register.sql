-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2016 at 04:50 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jisda_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `mustawa_register`
--

CREATE TABLE `mustawa_register` (
  `mustawa_register_id` int(10) NOT NULL,
  `mustawadata_id` int(10) NOT NULL,
  `payMoney` int(10) NOT NULL,
  `register_date` date NOT NULL,
  `reciet` int(10) NOT NULL,
  `st_id` int(10) NOT NULL,
  `learningGroup` int(5) NOT NULL,
  `learningStatus` int(2) NOT NULL,
  `year` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mustawa_register`
--
ALTER TABLE `mustawa_register`
  ADD PRIMARY KEY (`mustawa_register_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mustawa_register`
--
ALTER TABLE `mustawa_register`
  MODIFY `mustawa_register_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
