-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 13, 2014 at 04:03 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

CREATE TABLE IF NOT EXISTS `Admin` (
`ID` int(11) NOT NULL,
  `AdminName` varchar(50) NOT NULL,
  `AdminPassword` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Admin`
--

INSERT INTO `Admin` (`ID`, `AdminName`, `AdminPassword`) VALUES
(1, 'Admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `Attendance`
--

CREATE TABLE IF NOT EXISTS `Attendance` (
`AttendanceID` int(50) NOT NULL,
  `Eid` int(11) NOT NULL,
  `AttendanceDate` datetime NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Attendance`
--

INSERT INTO `Attendance` (`AttendanceID`, `Eid`, `AttendanceDate`, `Date`) VALUES
(1, 6, '2014-12-13 02:34:04', '2014-12-13');

-- --------------------------------------------------------

--
-- Table structure for table `Employee`
--

CREATE TABLE IF NOT EXISTS `Employee` (
`Eid` int(15) NOT NULL,
  `Fname` varchar(20) NOT NULL,
  `Lname` varchar(20) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `EPassword` varchar(20) NOT NULL,
  `EMail` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Employee`
--

INSERT INTO `Employee` (`Eid`, `Fname`, `Lname`, `UserName`, `EPassword`, `EMail`) VALUES
(6, 'nabeel', 'aboalrob', 'nabeel', 'nabeel', 'n.xmix@hotmail.com'),
(8, 'Ahmad', 'Aboalrob', 'Ahmad', 'ahmad', 'ahmad@gmail.com'),
(9, 'Khalid', 'Kmail', 'k', 'k', 'khalid@gmail.com'),
(11, 'Doaa', 'Seriya', 'do3a2', 'dodo', 'doaseriya@gmail.com'),
(12, 'Islam', 'kabaha', 'islam', 'islam', 'islam@yahoo.com'),
(13, 'Haethama', 'Aboalrob', 'Haetham', 'haetham', 'haetham@hotmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `Goods`
--

CREATE TABLE IF NOT EXISTS `Goods` (
`GoodsID` int(11) NOT NULL,
  `GoodsName` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Goods`
--

INSERT INTO `Goods` (`GoodsID`, `GoodsName`) VALUES
(5, 'Cola'),
(6, 'Cucumber'),
(3, 'Milk'),
(4, 'Orange'),
(2, 'Tomato'),
(8, 'Uger');

-- --------------------------------------------------------

--
-- Table structure for table `GoodsRequests`
--

CREATE TABLE IF NOT EXISTS `GoodsRequests` (
`RequestID` int(11) NOT NULL,
  `GoodsName` varchar(20) NOT NULL,
  `GoodsQuantity` int(11) NOT NULL,
  `Unit` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Income`
--

CREATE TABLE IF NOT EXISTS `Income` (
  `Date` date NOT NULL,
  `Amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Mail`
--

CREATE TABLE IF NOT EXISTS `Mail` (
`MID` int(11) NOT NULL,
  `Sender` varchar(20) NOT NULL,
  `Resever` varchar(20) NOT NULL,
  `Subject` varchar(40) NOT NULL,
  `Text` longtext NOT NULL,
  `Status` tinytext NOT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Mail`
--

INSERT INTO `Mail` (`MID`, `Sender`, `Resever`, `Subject`, `Text`, `Status`, `Date`) VALUES
(1, 'Admin', 'waleed jamal', 'mnnm', 'uhjkhkhh', 'U', '2014-09-22 10:18:17'),
(2, 'nabeel aboalrob', 'waleed jamal', 'jdhhsjh', 'jdshjkdsds\r\n', 'U', '2014-09-22 11:12:05'),
(3, 'nabeel aboalrob', 'waleed jamal', 'asajkh', 'kkdjalsda', 'U', '2014-09-22 11:14:16'),
(9, 'nabeel aboalrob', 'waleed jamal', 'nsadn,asmn', 'snadm,asdn,asdnasd\r\nasdmasndm,asnda\r\nasmdnasm,dnas\r\nasdasndm,asnd\r\nsam,dnasm,dnas,md\r\nsmdnas,mdnas\r\nsm,dnas,mdnas\r\n', 'U', '2014-09-22 13:07:34'),
(28, 'nabeel aboalrob', 'Admin', 'GooD', 'Good Jop\r\n', 'U', '2014-09-24 13:48:57'),
(29, 'Doaa Seriya', 'Doaa Seriya', 'hellow to u', 'hooooo', 'U', '2014-09-28 22:38:54'),
(30, 'nabeel aboalrob', 'Admin', 'Bonjour', 'Dear Admin\r\n\r\nI Wanna Some Mony \r\n', 'U', '2014-09-29 14:19:16'),
(31, 'Admin', 'Islam kabaha', 'mm', 'minj', 'U', '2014-12-12 07:08:38'),
(32, 'nabeel aboalrob', 'nabeel aboalrob', 'HI', 'ajsa\r\n', 'U', '2014-12-12 09:05:20');

-- --------------------------------------------------------

--
-- Table structure for table `Menu`
--

CREATE TABLE IF NOT EXISTS `Menu` (
`ItemID` int(11) NOT NULL,
  `ItemName` varchar(15) NOT NULL,
  `ItemPrice` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Menu`
--

INSERT INTO `Menu` (`ItemID`, `ItemName`, `ItemPrice`) VALUES
(1, 'Pizza', 15);

-- --------------------------------------------------------

--
-- Table structure for table `Orders`
--

CREATE TABLE IF NOT EXISTS `Orders` (
`OrderID` int(11) NOT NULL,
  `ItemName` varchar(15) NOT NULL,
  `TableID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `OrderDate` datetime NOT NULL,
  `OrderStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Payments`
--

CREATE TABLE IF NOT EXISTS `Payments` (
`PaymentID` int(10) NOT NULL,
  `PaymentType` varchar(10) NOT NULL,
  `PaymentAmount` int(10) NOT NULL,
  `PaymentDate` date NOT NULL,
  `PaymentTime` time NOT NULL,
  `EID` int(11) NOT NULL,
  `EmployeeName` varchar(30) NOT NULL,
  `PaymentDiscription` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Payments`
--

INSERT INTO `Payments` (`PaymentID`, `PaymentType`, `PaymentAmount`, `PaymentDate`, `PaymentTime`, `EID`, `EmployeeName`, `PaymentDiscription`) VALUES
(1, 'EmployeeSa', 55, '2014-12-13', '14:33:10', 6, 'nabeel aboalrob', 'Salary');

-- --------------------------------------------------------

--
-- Table structure for table `Tables`
--

CREATE TABLE IF NOT EXISTS `Tables` (
  `TableID` int(11) NOT NULL,
  `Account` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Tables`
--

INSERT INTO `Tables` (`TableID`, `Account`) VALUES
(3, 0),
(2, 0),
(4, 0),
(5, 0),
(1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admin`
--
ALTER TABLE `Admin`
 ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `AdminName` (`AdminName`);

--
-- Indexes for table `Attendance`
--
ALTER TABLE `Attendance`
 ADD PRIMARY KEY (`AttendanceID`);

--
-- Indexes for table `Employee`
--
ALTER TABLE `Employee`
 ADD PRIMARY KEY (`Eid`), ADD UNIQUE KEY `UserName` (`UserName`);

--
-- Indexes for table `Goods`
--
ALTER TABLE `Goods`
 ADD PRIMARY KEY (`GoodsID`), ADD UNIQUE KEY `GoodsName` (`GoodsName`);

--
-- Indexes for table `GoodsRequests`
--
ALTER TABLE `GoodsRequests`
 ADD PRIMARY KEY (`RequestID`);

--
-- Indexes for table `Mail`
--
ALTER TABLE `Mail`
 ADD PRIMARY KEY (`MID`);

--
-- Indexes for table `Menu`
--
ALTER TABLE `Menu`
 ADD PRIMARY KEY (`ItemID`);

--
-- Indexes for table `Orders`
--
ALTER TABLE `Orders`
 ADD PRIMARY KEY (`OrderID`);

--
-- Indexes for table `Payments`
--
ALTER TABLE `Payments`
 ADD PRIMARY KEY (`PaymentID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Admin`
--
ALTER TABLE `Admin`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Attendance`
--
ALTER TABLE `Attendance`
MODIFY `AttendanceID` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Employee`
--
ALTER TABLE `Employee`
MODIFY `Eid` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `Goods`
--
ALTER TABLE `Goods`
MODIFY `GoodsID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `GoodsRequests`
--
ALTER TABLE `GoodsRequests`
MODIFY `RequestID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Mail`
--
ALTER TABLE `Mail`
MODIFY `MID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `Menu`
--
ALTER TABLE `Menu`
MODIFY `ItemID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Orders`
--
ALTER TABLE `Orders`
MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Payments`
--
ALTER TABLE `Payments`
MODIFY `PaymentID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
