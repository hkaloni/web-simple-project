-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2017 at 07:23 AM
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
-- Table structure for table `caterer`
--

CREATE TABLE `caterer` (
  `id` int(11) NOT NULL,
  `uname` varchar(20) DEFAULT NULL,
  `name` text,
  `address` text,
  `contact1` bigint(20) DEFAULT NULL,
  `contact2` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `caterer`
--

INSERT INTO `caterer` (`id`, `uname`, `name`, `address`, `contact1`, `contact2`) VALUES
(1, 'a', 'a', 'a', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `decorator`
--

CREATE TABLE `decorator` (
  `id` int(11) NOT NULL,
  `uname` varchar(20) DEFAULT NULL,
  `name` text,
  `address` text,
  `contact1` bigint(20) DEFAULT NULL,
  `contact2` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `decorator`
--

INSERT INTO `decorator` (`id`, `uname`, `name`, `address`, `contact1`, `contact2`) VALUES
(6, 'a', 'a', 'a', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `providers`
--

CREATE TABLE `providers` (
  `name` text,
  `uname` varchar(20) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `pass` varchar(20) DEFAULT NULL,
  `contact1` bigint(20) DEFAULT NULL,
  `contact2` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `providers`
--

INSERT INTO `providers` (`name`, `uname`, `email`, `pass`, `contact1`, `contact2`) VALUES
('a', 'a', 'as@gh.nb', 'a', 785, 459);

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
('a', 'a', 'a', 'as@df.lm', 'a', '896');

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE `venue` (
  `id` int(11) NOT NULL,
  `uname` varchar(20) DEFAULT NULL,
  `name` tinytext,
  `address` text,
  `landmark` tinytext,
  `contact1` bigint(20) DEFAULT NULL,
  `contact2` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `venue`
--

INSERT INTO `venue` (`id`, `uname`, `name`, `address`, `landmark`, `contact1`, `contact2`) VALUES
(1, NULL, 'vb', 'as', 'as', 89, 89),
(2, NULL, 'vbq', 'asw', 'asw', 891, 892),
(3, NULL, 'ip', 'iu', 'ii', 88, NULL),
(4, 'a', 'a', 'a', 'a', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `caterer`
--
ALTER TABLE `caterer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uname` (`uname`);

--
-- Indexes for table `decorator`
--
ALTER TABLE `decorator`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uname` (`uname`);

--
-- Indexes for table `providers`
--
ALTER TABLE `providers`
  ADD PRIMARY KEY (`uname`);

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
  ADD KEY `uname` (`uname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `caterer`
--
ALTER TABLE `caterer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `decorator`
--
ALTER TABLE `decorator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `venue`
--
ALTER TABLE `venue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `caterer`
--
ALTER TABLE `caterer`
  ADD CONSTRAINT `caterer_ibfk_1` FOREIGN KEY (`uname`) REFERENCES `providers` (`uname`);

--
-- Constraints for table `decorator`
--
ALTER TABLE `decorator`
  ADD CONSTRAINT `decorator_ibfk_1` FOREIGN KEY (`uname`) REFERENCES `providers` (`uname`);

--
-- Constraints for table `venue`
--
ALTER TABLE `venue`
  ADD CONSTRAINT `venue_ibfk_1` FOREIGN KEY (`uname`) REFERENCES `providers` (`uname`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
