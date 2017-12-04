-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2017 at 01:15 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `collegedb`
--
CREATE DATABASE IF NOT EXISTS `collegedb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `collegedb`;

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `select_trains` (OUT `a` INT)  NO SQL
SELECT * from trains$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--
-- Creation: Nov 27, 2017 at 03:11 PM
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `trainno` int(11) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `fromst` varchar(256) DEFAULT NULL,
  `tost` varchar(256) DEFAULT NULL,
  `days` varchar(256) DEFAULT NULL,
  `deptime` varchar(256) DEFAULT NULL,
  `arrival` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `schedule`:
--   `trainno`
--       `trains` -> `trainno`
--   `name`
--       `trains` -> `name`
--   `fromst`
--       `station` -> `sid`
--   `tost`
--       `station` -> `sid`
--

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `trainno`, `name`, `fromst`, `tost`, `days`, `deptime`, `arrival`) VALUES
(2, 11600, 'Shatabdhi Express', 'SBC', 'DLI', 'Everyday', '12:00', '6:00'),
(1, 12206, 'Janshtabdhi Express', 'SBC', 'UBL', 'Everyday', '6:00', '12:55');

-- --------------------------------------------------------

--
-- Table structure for table `station`
--
-- Creation: Nov 26, 2017 at 12:58 PM
--

CREATE TABLE `station` (
  `id` int(11) NOT NULL,
  `sid` varchar(5) NOT NULL,
  `sname` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `station`:
--

--
-- Dumping data for table `station`
--

INSERT INTO `station` (`id`, `sid`, `sname`) VALUES
(1, 'SBC', 'Bangalore JN'),
(2, 'UBL', 'Hubli JN'),
(3, 'HVR', 'Haveri'),
(4, 'GR', 'Gulbarga'),
(5, 'PUNE', 'Pune Jn\r\n'),
(6, 'HAS', 'Hassan'),
(7, 'MAJN', 'Mangalore Jn'),
(8, 'MYS', 'Mysore Jn'),
(9, 'SMET', 'Shimoga Jn'),
(10, 'DLI', 'Delhi Jn'),
(11, 'BCT', 'Mumbai Central'),
(12, 'CEN', 'Chennai Jn'),
(14, 'ADIC', 'Ahmadabad City'),
(15, 'HYB', 'Hyderabad Decan'),
(16, 'ST', 'Surat'),
(17, 'TLGP', 'Talguppa');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--
-- Creation: Nov 27, 2017 at 04:45 PM
--

CREATE TABLE `ticket` (
  `pnr` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `trainno` int(11) NOT NULL,
  `fromst` varchar(256) NOT NULL,
  `tost` varchar(256) NOT NULL,
  `deptime` varchar(256) NOT NULL,
  `arrival` varchar(256) NOT NULL,
  `coach` int(11) NOT NULL,
  `seatno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `ticket`:
--   `fromst`
--       `station` -> `sid`
--   `name`
--       `user` -> `name`
--   `trainno`
--       `trains` -> `trainno`
--   `deptime`
--       `schedule` -> `deptime`
--   `arrival`
--       `schedule` -> `arrival`
--   `tost`
--       `station` -> `sid`
--

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`pnr`, `name`, `trainno`, `fromst`, `tost`, `deptime`, `arrival`, `coach`, `seatno`) VALUES
(2105, 'Pavan Hegde', 12206, 'SBC', 'UBL', '6:00', '12:55', 1, 25),
(2107, 'Poorna Hegde', 11600, 'SBC', 'DLI', '12:00', '6:00', 3, 45),
(2108, 'Pavan Hegde', 11600, 'SBC', 'DLI', '12:00', '6:00', 32, 78),
(2109, 'User', 12206, 'SBC', 'UBL', '6:00', '12:55', 25, 48),
(2110, 'User', 12206, 'SBC', 'UBL', '6:00', '12:55', 67, 55),
(2111, 'User', 11600, 'SBC', 'DLI', '12:00', '6:00', 64, 565),
(2112, 'User', 12206, 'SBC', 'UBL', '6:00', '12:55', 55, 333),
(2114, 'Pavan Hegde', 12206, 'SBC', 'UBL', '6:00', '12:55', 23, 235);

--
-- Triggers `ticket`
--
DELIMITER $$
CREATE TRIGGER `seat_decrementer` AFTER INSERT ON `ticket` FOR EACH ROW UPDATE train_status
    SET seats = seats - 1
    WHERE train_status.trainno = new.trainno
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `trains`
--
-- Creation: Nov 26, 2017 at 01:25 PM
--

CREATE TABLE `trains` (
  `id` int(11) NOT NULL,
  `trainno` int(11) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `fromst` varchar(5) DEFAULT NULL,
  `tost` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `trains`:
--   `fromst`
--       `station` -> `sid`
--   `tost`
--       `station` -> `sid`
--

--
-- Dumping data for table `trains`
--

INSERT INTO `trains` (`id`, `trainno`, `name`, `type`, `fromst`, `tost`) VALUES
(1, 12206, 'Janshtabdhi Express', 'Shatabdhi', 'SBC', 'UBL'),
(2, 11600, 'Shatabdhi Express', 'Shatabdhi', 'SBC', 'DLI');

--
-- Triggers `trains`
--
DELIMITER $$
CREATE TRIGGER `train_num_check` BEFORE INSERT ON `trains` FOR EACH ROW BEGIN
          IF NEW.trainno < 12000 
          THEN
               SIGNAL SQLSTATE '45000'
                    SET MESSAGE_TEXT = 'Enter A Train Number Starting with 12 and the length should be 5.';
          END IF;
     END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `train_status`
--
-- Creation: Nov 27, 2017 at 03:02 PM
--

CREATE TABLE `train_status` (
  `id` int(11) NOT NULL,
  `trainno` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `available_date` varchar(256) NOT NULL,
  `seats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `train_status`:
--   `trainno`
--       `trains` -> `trainno`
--   `name`
--       `trains` -> `name`
--   `available_date`
--       `schedule` -> `days`
--

--
-- Dumping data for table `train_status`
--

INSERT INTO `train_status` (`id`, `trainno`, `name`, `available_date`, `seats`) VALUES
(5, 12206, 'Janshtabdhi Express', 'Everyday', 494),
(6, 11600, 'Shatabdhi Express', 'Everyday', 796);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--
-- Creation: Nov 27, 2017 at 01:18 PM
--

CREATE TABLE `user` (
  `seq` int(11) NOT NULL,
  `userid` varchar(256) NOT NULL,
  `name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `user`:
--

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`seq`, `userid`, `name`, `email`, `address`, `phone`, `password`) VALUES
(1, 'pavanrkadave', 'Pavan Hegde', 'pavanrkadave@gmail.com', 'Bangalore', '8277666156', '35772d5369602a93ebae25058d2bbe59'),
(2, 'poornakadave', 'Poorna Hegde', 'poorna.kadave@gmail.com', 'Bangalore', '9448883412', '5d41402abc4b2a76b9719d911017c592'),
(3, 'user', 'User', 'sadakjs@mail.com', 'Bsdas', '23', '81dc9bdb52d04dc20036dbd8313ed055'),
(4, 'pk', 'Pavan Hegde', 'pk@email.com', 'Bangalore', '8660400089', 'ee11cbb19052e40b07aac0ca060c23ee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`trainno`),
  ADD UNIQUE KEY `trainno_2` (`trainno`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `schedule_ibfk_4` (`tost`),
  ADD KEY `schedule_ibfk_3` (`fromst`) USING BTREE,
  ADD KEY `schedule_ibfk_2` (`name`) USING BTREE,
  ADD KEY `trainno` (`trainno`),
  ADD KEY `deptime` (`deptime`),
  ADD KEY `arrival` (`arrival`),
  ADD KEY `days` (`days`);

--
-- Indexes for table `station`
--
ALTER TABLE `station`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `sid` (`sid`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`pnr`),
  ADD KEY `name_fk_ticket` (`name`),
  ADD KEY `from_st_fk_ticket` (`fromst`),
  ADD KEY `to_st_fk_ticket` (`tost`),
  ADD KEY `trainno` (`trainno`),
  ADD KEY `arrival` (`arrival`),
  ADD KEY `ticket_ibfk_2` (`deptime`),
  ADD KEY `seatno` (`seatno`);

--
-- Indexes for table `trains`
--
ALTER TABLE `trains`
  ADD PRIMARY KEY (`id`,`trainno`) USING BTREE,
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `fromst` (`fromst`),
  ADD KEY `tost` (`tost`),
  ADD KEY `name` (`name`),
  ADD KEY `trainno` (`trainno`);

--
-- Indexes for table `train_status`
--
ALTER TABLE `train_status`
  ADD PRIMARY KEY (`id`,`trainno`),
  ADD KEY `train_status_ibfk_1` (`trainno`),
  ADD KEY `name` (`name`),
  ADD KEY `seats` (`seats`),
  ADD KEY `available_date` (`available_date`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`seq`,`userid`) USING BTREE,
  ADD KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `station`
--
ALTER TABLE `station`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `pnr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2115;

--
-- AUTO_INCREMENT for table `trains`
--
ALTER TABLE `trains`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `train_status`
--
ALTER TABLE `train_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `seq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`trainno`) REFERENCES `trains` (`trainno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schedule_ibfk_2` FOREIGN KEY (`name`) REFERENCES `trains` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schedule_ibfk_3` FOREIGN KEY (`fromst`) REFERENCES `station` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schedule_ibfk_4` FOREIGN KEY (`tost`) REFERENCES `station` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `from_st_fk_ticket` FOREIGN KEY (`fromst`) REFERENCES `station` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `name_fk_ticket` FOREIGN KEY (`name`) REFERENCES `user` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`trainno`) REFERENCES `trains` (`trainno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`deptime`) REFERENCES `schedule` (`deptime`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_ibfk_3` FOREIGN KEY (`arrival`) REFERENCES `schedule` (`arrival`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `to_st_fk_ticket` FOREIGN KEY (`tost`) REFERENCES `station` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trains`
--
ALTER TABLE `trains`
  ADD CONSTRAINT `trains_ibfk_1` FOREIGN KEY (`fromst`) REFERENCES `station` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trains_ibfk_2` FOREIGN KEY (`tost`) REFERENCES `station` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `train_status`
--
ALTER TABLE `train_status`
  ADD CONSTRAINT `train_status_ibfk_1` FOREIGN KEY (`trainno`) REFERENCES `trains` (`trainno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `train_status_ibfk_2` FOREIGN KEY (`name`) REFERENCES `trains` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `train_status_ibfk_3` FOREIGN KEY (`available_date`) REFERENCES `schedule` (`days`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
