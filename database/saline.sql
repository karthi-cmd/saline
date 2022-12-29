-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2022 at 12:30 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saline`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(512) NOT NULL,
  `password` varchar(1024) NOT NULL,
  `email` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`) VALUES
(1, 'sinehan', '$2y$15$4Bmj1PhJFskI8P6WAcQM0e0AtL8dAURYtbZZdOcpUwfVzyHIqlyhK', 'sinehan001@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(512) DEFAULT NULL,
  `firstname` varchar(512) DEFAULT NULL,
  `deviceid` varchar(512) NOT NULL,
  `location` varchar(512) DEFAULT NULL,
  `phone` varchar(512) DEFAULT NULL,
  `auth` varchar(512) DEFAULT NULL,
  `dpm` varchar(24) DEFAULT NULL,
  `password` varchar(512) DEFAULT NULL,
  `email` varchar(512) DEFAULT NULL,
  `authsuccess` varchar(32) DEFAULT NULL,
  `remain` varchar(48) DEFAULT NULL,
  `consume` varchar(48) DEFAULT NULL,
  `start` varchar(256) DEFAULT NULL,
  `end` varchar(256) DEFAULT NULL,
  `total` varchar(256) DEFAULT NULL,
  `status` varchar(1024) DEFAULT NULL,
  `cmnt` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `deviceid`, `location`, `phone`, `auth`, `dpm`, `password`, `email`, `authsuccess`, `remain`, `consume`, `start`, `end`, `total`, `status`, `cmnt`) VALUES
(1, 'sinehan.s', 'SINEHAN S', '153826', 'floor2bed-12', '987654321', 'ZFqeEejOiOmumze', '20', '$2y$10$tzWQzyn4Uf4TswTJu/FY3OFZAg/w464xSn6CUX7rriVelqK6.jjMW', 'sinehan001@gmail.com', 'success', '0', '5000', '2022-07-16 15:28', '2022-07-16 15:29', '0', 'Bottle is empty', 'Need to refill'),
(3, 'thinesh', 'Thinesh Babu KS', '61824', '42-bed', '1234567890', NULL, '123', '$2y$10$tzWQzyn4Uf4TswTJu/FY3OFZAg/w464xSn6CUX7rriVelqK6.jjMW', 'thineshbabu@gmail.com', NULL, '0', '0', NULL, NULL, NULL, NULL, NULL),
(4, 'Hari Krishna', 'Hari Krishna S', '12453', 'floor2,ward3,bed-123', '9999999', NULL, '120', '$2y$10$tzWQzyn4Uf4TswTJu/FY3OFZAg/w464xSn6CUX7rriVelqK6.jjMW', 'shkrish2014@gmail.com', NULL, '0', '0', NULL, NULL, NULL, NULL, NULL),
(6, 'admin', 'Admin', '15273', 'floor-5, ward-2', '987654321', '', '999', '$2y$10$tzWQzyn4Uf4TswTJu/FY3OFZAg/w464xSn6CUX7rriVelqK6.jjMW', NULL, 'success', '0', '0', NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
