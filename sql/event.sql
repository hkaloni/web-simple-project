-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2017 at 08:17 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `vdcid` int(11) DEFAULT NULL,
  `uname` varchar(20) DEFAULT NULL,
  `pname` varchar(20) DEFAULT NULL,
  `type` tinytext,
  `service` tinytext,
  `eventdate` date DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `dishes` int(11) DEFAULT NULL,
  `area` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `confirmed` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `vdcid`, `uname`, `pname`, `type`, `service`, `eventdate`, `duration`, `dishes`, `area`, `amount`, `confirmed`) VALUES
(23, 1, 'hkaloni', 'json', 'caterer', 'Johnson Foods', '2017-10-23', NULL, NULL, NULL, 47500, 0),
(24, 1, 'hkaloni', 'json', 'caterer', 'Johnson Foods', '2017-10-10', NULL, NULL, NULL, 28500, 0);

-- --------------------------------------------------------

--
-- Table structure for table `caterer`
--

CREATE TABLE `caterer` (
  `id` int(11) NOT NULL,
  `pname` varchar(20) DEFAULT NULL,
  `name` text,
  `address` text,
  `contact1` bigint(20) DEFAULT NULL,
  `contact2` bigint(20) DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `caterer`
--

INSERT INTO `caterer` (`id`, `pname`, `name`, `address`, `contact1`, `contact2`, `price`) VALUES
(1, 'json', 'Johnson Foods', 'JF, Shop 45, Sector 13, KoparKhairane', 9865741230, 897421360, 100);

-- --------------------------------------------------------

--
-- Table structure for table `decorator`
--

CREATE TABLE `decorator` (
  `id` int(11) NOT NULL,
  `pname` varchar(20) DEFAULT NULL,
  `name` text,
  `address` text,
  `contact1` bigint(20) DEFAULT NULL,
  `contact2` bigint(20) DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `uname` varchar(20) DEFAULT NULL,
  `pname` varchar(20) DEFAULT NULL,
  `type` tinytext,
  `service` tinytext,
  `eventdate` date DEFAULT NULL,
  `duration` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `providers`
--

CREATE TABLE `providers` (
  `name` text,
  `pname` varchar(20) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `pass` varchar(20) DEFAULT NULL,
  `contact1` bigint(20) DEFAULT NULL,
  `contact2` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `providers`
--

INSERT INTO `providers` (`name`, `pname`, `email`, `pass`, `contact1`, `contact2`) VALUES
('Johnson', 'json', 'json@johnson.com', '123456789', 9873216540, 9865741320);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uname` varchar(20) NOT NULL,
  `fname` varchar(20) DEFAULT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `pass` varchar(20) DEFAULT NULL,
  `contact` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uname`, `fname`, `lname`, `email`, `pass`, `contact`) VALUES
('hkaloni', 'Himanshu', 'Kaloni', 'kalonihmcp15@student.mes.ac.in', '123456789', '9004961022');

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE `venue` (
  `id` int(11) NOT NULL,
  `pname` varchar(20) DEFAULT NULL,
  `name` tinytext,
  `address` text,
  `landmark` tinytext,
  `price` int(11) DEFAULT NULL,
  `contact1` bigint(20) DEFAULT NULL,
  `contact2` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uname` (`uname`);

--
-- Indexes for table `caterer`
--
ALTER TABLE `caterer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uname` (`pname`);

--
-- Indexes for table `decorator`
--
ALTER TABLE `decorator`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uname` (`pname`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uname` (`uname`);

--
-- Indexes for table `providers`
--
ALTER TABLE `providers`
  ADD PRIMARY KEY (`pname`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uname`);

--
-- Indexes for table `venue`
--
ALTER TABLE `venue`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uname` (`pname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `caterer`
--
ALTER TABLE `caterer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `decorator`
--
ALTER TABLE `decorator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `venue`
--
ALTER TABLE `venue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`uname`) REFERENCES `users` (`uname`);

--
-- Constraints for table `caterer`
--
ALTER TABLE `caterer`
  ADD CONSTRAINT `caterer_ibfk_1` FOREIGN KEY (`pname`) REFERENCES `providers` (`pname`);

--
-- Constraints for table `decorator`
--
ALTER TABLE `decorator`
  ADD CONSTRAINT `decorator_ibfk_1` FOREIGN KEY (`pname`) REFERENCES `providers` (`pname`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`uname`) REFERENCES `users` (`uname`);

--
-- Constraints for table `venue`
--
ALTER TABLE `venue`
  ADD CONSTRAINT `venue_ibfk_1` FOREIGN KEY (`pname`) REFERENCES `providers` (`pname`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
