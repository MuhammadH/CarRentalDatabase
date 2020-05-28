-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 29, 2020 at 02:18 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `CAR_RENTALS_HUSSAIN`
--

-- --------------------------------------------------------

--
-- Table structure for table `COMPACT`
--

CREATE TABLE `COMPACT` (
  `Vobj` int(11) NOT NULL,
  `wr` int(11) DEFAULT 40,
  `dr` int(11) DEFAULT 25
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `COMPACT`
--

INSERT INTO `COMPACT` (`Vobj`, `wr`, `dr`) VALUES
(2, 40, 25),
(8, 40, 25),
(14, 40, 25);

-- --------------------------------------------------------

--
-- Table structure for table `CUSTOMER`
--

CREATE TABLE `CUSTOMER` (
  `Cid` int(11) NOT NULL,
  `Finitial` char(1) DEFAULT NULL,
  `Lname` varchar(20) DEFAULT NULL,
  `Phone` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `CUSTOMER`
--

INSERT INTO `CUSTOMER` (`Cid`, `Finitial`, `Lname`, `Phone`) VALUES
(1, 'D', 'Porkman', '111-111-1111'),
(2, 'F', 'Dilman', '111-123-1132'),
(3, 'Q', 'Robport', '111-131-1132'),
(4, 'H', 'Hilman', '111-111-1562'),
(5, 'A', 'Tilbur', '111-111-2222'),
(6, 'B', 'Bobson', '111-161-1132'),
(7, 'G', 'Asmin', '111-111-1199'),
(8, 'L', 'Big', '111-111-1133'),
(9, 'A', 'Beefman', '161-111-1632'),
(10, 'Z', 'Top', '111-171-1132');

-- --------------------------------------------------------

--
-- Table structure for table `DAILY`
--

CREATE TABLE `DAILY` (
  `Robj` int(11) NOT NULL,
  `NoOfDays` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `LARGE`
--

CREATE TABLE `LARGE` (
  `Vobj` int(11) NOT NULL,
  `wr` int(11) DEFAULT 95,
  `dr` int(11) DEFAULT 17
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `LARGE`
--

INSERT INTO `LARGE` (`Vobj`, `wr`, `dr`) VALUES
(4, 95, 17),
(10, 95, 17),
(16, 95, 17),
(20, 95, 17);

-- --------------------------------------------------------

--
-- Table structure for table `MEDIUM`
--

CREATE TABLE `MEDIUM` (
  `Vobj` int(11) NOT NULL,
  `wr` int(11) DEFAULT 75,
  `dr` int(11) DEFAULT 30
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `MEDIUM`
--

INSERT INTO `MEDIUM` (`Vobj`, `wr`, `dr`) VALUES
(3, 75, 30),
(9, 75, 30),
(15, 75, 30),
(19, 75, 30);

-- --------------------------------------------------------

--
-- Table structure for table `RENTAL`
--

CREATE TABLE `RENTAL` (
  `Rid` int(11) NOT NULL,
  `StartDate` date NOT NULL,
  `RetDate` date DEFAULT NULL,
  `AmtDue` int(11) DEFAULT NULL,
  `Cus` int(11) NOT NULL,
  `Veh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `SUV`
--

CREATE TABLE `SUV` (
  `Vobj` int(11) NOT NULL,
  `wr` int(11) DEFAULT 145,
  `dr` int(11) DEFAULT 52
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `SUV`
--

INSERT INTO `SUV` (`Vobj`, `wr`, `dr`) VALUES
(5, 145, 52),
(11, 145, 52),
(17, 145, 52);

-- --------------------------------------------------------

--
-- Table structure for table `TRUCK`
--

CREATE TABLE `TRUCK` (
  `Vobj` int(11) NOT NULL,
  `wr` int(11) DEFAULT 167,
  `dr` int(11) DEFAULT 39
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `TRUCK`
--

INSERT INTO `TRUCK` (`Vobj`, `wr`, `dr`) VALUES
(6, 167, 39),
(12, 167, 39),
(18, 167, 39);

-- --------------------------------------------------------

--
-- Table structure for table `VAN`
--

CREATE TABLE `VAN` (
  `Vobj` int(11) NOT NULL,
  `wr` int(11) DEFAULT 50,
  `dr` int(11) DEFAULT 10
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `VAN`
--

INSERT INTO `VAN` (`Vobj`, `wr`, `dr`) VALUES
(1, 50, 10),
(7, 50, 10),
(13, 50, 10);

-- --------------------------------------------------------

--
-- Table structure for table `VEHICLE`
--

CREATE TABLE `VEHICLE` (
  `Vid` int(11) NOT NULL,
  `Year` int(11) DEFAULT NULL,
  `Model` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `VEHICLE`
--

INSERT INTO `VEHICLE` (`Vid`, `Year`, `Model`) VALUES
(1, 1999, 'Ford'),
(2, 2018, 'Ford'),
(3, 2000, 'Honda'),
(4, 2012, 'Honda'),
(5, 2000, 'Acura'),
(6, 2009, 'Acura'),
(7, 2010, 'Acura'),
(8, 2011, 'Acura'),
(9, 2013, 'Honda'),
(10, 2005, 'Toyota'),
(11, 2015, 'Toyota'),
(12, 2016, 'Toyota'),
(13, 2017, 'Toyota'),
(14, 2007, 'KIA'),
(15, 2008, 'KIA'),
(16, 2009, 'KIA'),
(17, 2007, 'Dodge'),
(18, 2017, 'Dodge'),
(19, 2018, 'Dodge'),
(20, 2019, 'Dodge');

-- --------------------------------------------------------

--
-- Table structure for table `WEEKLY`
--

CREATE TABLE `WEEKLY` (
  `Robj` int(11) NOT NULL,
  `NoOfWeeks` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `COMPACT`
--
ALTER TABLE `COMPACT`
  ADD KEY `Vobj` (`Vobj`);

--
-- Indexes for table `CUSTOMER`
--
ALTER TABLE `CUSTOMER`
  ADD PRIMARY KEY (`Cid`);

--
-- Indexes for table `DAILY`
--
ALTER TABLE `DAILY`
  ADD KEY `Robj` (`Robj`);

--
-- Indexes for table `LARGE`
--
ALTER TABLE `LARGE`
  ADD KEY `Vobj` (`Vobj`);

--
-- Indexes for table `MEDIUM`
--
ALTER TABLE `MEDIUM`
  ADD KEY `Vobj` (`Vobj`);

--
-- Indexes for table `RENTAL`
--
ALTER TABLE `RENTAL`
  ADD PRIMARY KEY (`Rid`),
  ADD KEY `Cus` (`Cus`),
  ADD KEY `Veh` (`Veh`);

--
-- Indexes for table `SUV`
--
ALTER TABLE `SUV`
  ADD KEY `Vobj` (`Vobj`);

--
-- Indexes for table `TRUCK`
--
ALTER TABLE `TRUCK`
  ADD KEY `Vobj` (`Vobj`);

--
-- Indexes for table `VAN`
--
ALTER TABLE `VAN`
  ADD KEY `Vobj` (`Vobj`);

--
-- Indexes for table `VEHICLE`
--
ALTER TABLE `VEHICLE`
  ADD PRIMARY KEY (`Vid`);

--
-- Indexes for table `WEEKLY`
--
ALTER TABLE `WEEKLY`
  ADD KEY `Robj` (`Robj`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `CUSTOMER`
--
ALTER TABLE `CUSTOMER`
  MODIFY `Cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `RENTAL`
--
ALTER TABLE `RENTAL`
  MODIFY `Rid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `VEHICLE`
--
ALTER TABLE `VEHICLE`
  MODIFY `Vid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `COMPACT`
--
ALTER TABLE `COMPACT`
  ADD CONSTRAINT `COMPACT_ibfk_1` FOREIGN KEY (`Vobj`) REFERENCES `VEHICLE` (`Vid`);

--
-- Constraints for table `DAILY`
--
ALTER TABLE `DAILY`
  ADD CONSTRAINT `DAILY_ibfk_1` FOREIGN KEY (`Robj`) REFERENCES `RENTAL` (`Rid`);

--
-- Constraints for table `LARGE`
--
ALTER TABLE `LARGE`
  ADD CONSTRAINT `LARGE_ibfk_1` FOREIGN KEY (`Vobj`) REFERENCES `VEHICLE` (`Vid`);

--
-- Constraints for table `MEDIUM`
--
ALTER TABLE `MEDIUM`
  ADD CONSTRAINT `MEDIUM_ibfk_1` FOREIGN KEY (`Vobj`) REFERENCES `VEHICLE` (`Vid`);

--
-- Constraints for table `RENTAL`
--
ALTER TABLE `RENTAL`
  ADD CONSTRAINT `RENTAL_ibfk_1` FOREIGN KEY (`Cus`) REFERENCES `CUSTOMER` (`Cid`),
  ADD CONSTRAINT `RENTAL_ibfk_2` FOREIGN KEY (`Veh`) REFERENCES `VEHICLE` (`Vid`);

--
-- Constraints for table `SUV`
--
ALTER TABLE `SUV`
  ADD CONSTRAINT `SUV_ibfk_1` FOREIGN KEY (`Vobj`) REFERENCES `VEHICLE` (`Vid`);

--
-- Constraints for table `TRUCK`
--
ALTER TABLE `TRUCK`
  ADD CONSTRAINT `TRUCK_ibfk_1` FOREIGN KEY (`Vobj`) REFERENCES `VEHICLE` (`Vid`);

--
-- Constraints for table `VAN`
--
ALTER TABLE `VAN`
  ADD CONSTRAINT `VAN_ibfk_1` FOREIGN KEY (`Vobj`) REFERENCES `VEHICLE` (`Vid`);

--
-- Constraints for table `WEEKLY`
--
ALTER TABLE `WEEKLY`
  ADD CONSTRAINT `WEEKLY_ibfk_1` FOREIGN KEY (`Robj`) REFERENCES `RENTAL` (`Rid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
