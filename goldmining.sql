-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 16, 2019 at 08:19 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `goldmining`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(15) NOT NULL,
  `Password` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `Username`, `Password`) VALUES
(1, 'Admin', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Client_id` varchar(50) NOT NULL,
  `FullName` varchar(50) NOT NULL,
  `Image` varchar(200) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `Username` varchar(15) NOT NULL,
  `Password` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `Client_id`, `FullName`, `Image`, `Email`, `Address`, `Phone`, `Username`, `Password`) VALUES
(1, '79076', 'Lateef Adewale', '817535.jpg', 'lateefmonsurudeen@gmail.com', 'Kust, Wudil', '07086970493', 'bolatito', 'bolatito'),
(2, '477160', 'Lateef Mansir', '959148.jpg', 'lateefmonsurudeen@yahoo.com', 'Wudil', '08086970493', 'Secretary', 'bola');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Message` varchar(2000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `contact`
--


-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` varchar(20) NOT NULL,
  `FullName` varchar(50) NOT NULL,
  `Image` varchar(200) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Username` varchar(15) NOT NULL,
  `Password` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `customer_id`, `FullName`, `Image`, `Email`, `Phone`, `Address`, `Username`, `Password`) VALUES
(1, 'Customer/52780', 'Lateef Mansir', '423764.jpg', 'yakubu@yahoo.com', '08073875540', 'Kust', 'bolatito', 'bola');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` varchar(20) NOT NULL,
  `FullName` varchar(50) NOT NULL,
  `DateEmployed` varchar(15) NOT NULL,
  `Image` varchar(200) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `Username` varchar(15) NOT NULL,
  `Password` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `emp_id`, `FullName`, `DateEmployed`, `Image`, `Email`, `Address`, `Phone`, `Username`, `Password`) VALUES
(1, 'Emp/Staff/85476', 'Lateef ', '2018-11-30', '412240.jpg', 'yakubu@yahoo.com', 'Kust', '09086970493', 'kolade', 'kolade');

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE IF NOT EXISTS `equipment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `EquipmentName` varchar(50) NOT NULL,
  `Image` varchar(200) NOT NULL,
  `ProductionIntroduction` varchar(2000) NOT NULL,
  `Capacity` varchar(50) NOT NULL,
  `Improvement` varchar(2000) NOT NULL,
  `TotalInNumber` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`id`, `EquipmentName`, `Image`, `ProductionIntroduction`, `Capacity`, `Improvement`, `TotalInNumber`) VALUES
(1, 'Lateef Mansir', '844090.jpg', 'A traditional and widely using vibrating screen', '20-300t/h', 'Elastic location limit part is made of Yantai Group wear-resistant rubber Adopting the new patent technology: a seat type vibrating screen lifting device, Patent No. 201120562516.7', 30),
(3, 'adewale', '40450.jpg', 'A traditional and widely using vibrating screen', '10-30t/h', 'Screen angle is adjustable Vibrating motor as vibration exciter, low energy consumption', 40);

-- --------------------------------------------------------

--
-- Table structure for table `inspection`
--

CREATE TABLE IF NOT EXISTS `inspection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Client_id` int(11) NOT NULL,
  `Total` int(11) NOT NULL,
  `GoodEquipment` int(11) NOT NULL,
  `BadEquipment` int(11) NOT NULL,
  `Date` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `inspection`
--

INSERT INTO `inspection` (`id`, `Client_id`, `Total`, `GoodEquipment`, `BadEquipment`, `Date`) VALUES
(1, 79076, 10, 5, 5, '2019-06-06');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `Client_id` varchar(50) NOT NULL,
  `Location` varchar(50) NOT NULL,
  `DateCommenced` varchar(15) NOT NULL,
  `DateCompleted` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`Client_id`, `Location`, `DateCommenced`, `DateCompleted`) VALUES
('79076', 'Kano', '12/06/2019', '20/07/2020');

-- --------------------------------------------------------

--
-- Table structure for table `requestequipment`
--

CREATE TABLE IF NOT EXISTS `requestequipment` (
  `Client_id` varchar(50) NOT NULL,
  `Location` varchar(50) NOT NULL,
  `Equipment1` varchar(40) NOT NULL,
  `Number1` int(11) NOT NULL,
  `Equipment2` varchar(40) NOT NULL,
  `Number2` int(11) NOT NULL,
  `Equipment3` varchar(40) NOT NULL,
  `Number3` int(11) NOT NULL,
  `Equipment4` varchar(40) NOT NULL,
  `Number4` int(11) NOT NULL,
  `Equipment5` varchar(40) NOT NULL,
  `Number5` int(11) NOT NULL,
  `Equipment6` varchar(40) NOT NULL,
  `Number6` int(11) NOT NULL,
  `Equipment7` varchar(40) NOT NULL,
  `Number7` int(11) NOT NULL,
  `Equipment8` varchar(40) NOT NULL,
  `Number8` int(11) NOT NULL,
  `Equipment9` varchar(40) NOT NULL,
  `Number9` int(11) NOT NULL,
  `Equipment10` varchar(40) NOT NULL,
  `Number10` int(11) NOT NULL,
  `Total` int(11) NOT NULL,
  `Status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requestequipment`
--

INSERT INTO `requestequipment` (`Client_id`, `Location`, `Equipment1`, `Number1`, `Equipment2`, `Number2`, `Equipment3`, `Number3`, `Equipment4`, `Number4`, `Equipment5`, `Number5`, `Equipment6`, `Number6`, `Equipment7`, `Number7`, `Equipment8`, `Number8`, `Equipment9`, `Number9`, `Equipment10`, `Number10`, `Total`, `Status`) VALUES
('79076', 'Kano', 'Jaw Saw', 10, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, 10, 'Approved');
