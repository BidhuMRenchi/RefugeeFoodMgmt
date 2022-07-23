-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 31, 2017 at 06:44 PM
-- Server version: 5.1.53
-- PHP Version: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `foodmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `foodreg`
--

CREATE TABLE IF NOT EXISTS `foodreg` (
  `fdid` int(11) NOT NULL AUTO_INCREMENT,
  `foodname` varchar(205) NOT NULL,
  `qtyleft` int(205) NOT NULL,
  `qtytaken` int(45) NOT NULL,
  `dateEntry` date NOT NULL,
  `footType_typeid` int(200) NOT NULL,
  PRIMARY KEY (`fdid`),
  KEY `fk_foodreg_footType` (`footType_typeid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `foodreg`
--

INSERT INTO `foodreg` (`fdid`, `foodname`, `qtyleft`, `qtytaken`, `dateEntry`, `footType_typeid`) VALUES
(1, 'posho', 188, 12, '2017-03-27', 1),
(3, 'oil', 204, 0, '2017-03-29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `foodtype`
--

CREATE TABLE IF NOT EXISTS `foodtype` (
  `typeid` int(200) NOT NULL AUTO_INCREMENT,
  `typename` varchar(205) NOT NULL,
  PRIMARY KEY (`typeid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `foodtype`
--

INSERT INTO `foodtype` (`typeid`, `typename`) VALUES
(1, 'floor');

-- --------------------------------------------------------

--
-- Table structure for table `nationality`
--

CREATE TABLE IF NOT EXISTS `nationality` (
  `nid` int(200) NOT NULL AUTO_INCREMENT,
  `nationcode` varchar(205) NOT NULL,
  `nationName` varchar(45) NOT NULL,
  PRIMARY KEY (`nid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `nationality`
--

INSERT INTO `nationality` (`nid`, `nationcode`, `nationName`) VALUES
(1, '+254', 'Kenya');

-- --------------------------------------------------------

--
-- Table structure for table `refugee`
--

CREATE TABLE IF NOT EXISTS `refugee` (
  `rfid` int(11) NOT NULL AUTO_INCREMENT,
  `Fname` varchar(205) NOT NULL,
  `Lname` varchar(205) NOT NULL,
  `sex` varchar(45) NOT NULL,
  `age` int(200) NOT NULL,
  `contact` int(200) NOT NULL,
  `dateEntry` date NOT NULL,
  `status` varchar(205) NOT NULL,
  `received` varchar(205) NOT NULL,
  `nationality_nid` int(200) NOT NULL,
  `refNo` varchar(205) NOT NULL,
  PRIMARY KEY (`rfid`),
  KEY `fk_Refugee_nationality` (`nationality_nid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `refugee`
--

INSERT INTO `refugee` (`rfid`, `Fname`, `Lname`, `sex`, `age`, `contact`, `dateEntry`, `status`, `received`, `nationality_nid`, `refNo`) VALUES
(1, 'nn', 'f', 'male', 0, 0, '2017-03-14', 'active', 'Null', 1, '24453655'),
(2, 'nn', 'f', 'male', 29, 2147483647, '2017-03-15', 'active', 'Null', 1, '24453655'),
(3, 'nnn', 'nn', 'female', 27, 658799, '2017-03-18', 'active', 'Null', 1, '245454'),
(4, 'f', 'f', 'male', 0, 0, '2017-02-08', 'active', 'Null', 1, 'f'),
(5, 'd', 'd', 'male', 0, 0, '2017-02-16', 'active', 'Null', 1, 'd'),
(6, 's', 'das', 'male', 22, 22, '2017-03-29', 'active', 'Null', 1, '435'),
(8, 'h', 'jh', 'male', 44, 758768, '2017-03-28', 'active', 'yes', 1, '44');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `staffid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(205) NOT NULL,
  `password` varchar(205) NOT NULL,
  `role` varchar(205) NOT NULL,
  PRIMARY KEY (`staffid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffid`, `username`, `password`, `role`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin'),
(2, 'fred', '31017a722665e4afce586950f42944a6d331dabf', 'field monitor');

-- --------------------------------------------------------

--
-- Table structure for table `takenfood`
--

CREATE TABLE IF NOT EXISTS `takenfood` (
  `tfid` int(11) NOT NULL AUTO_INCREMENT,
  `takenDate` date NOT NULL,
  `qty` int(205) NOT NULL,
  `foodreg_rfid` int(200) NOT NULL,
  `Refugee_rfid` int(200) NOT NULL,
  PRIMARY KEY (`tfid`),
  KEY `fk_takenFood_foodreg` (`foodreg_rfid`),
  KEY `fk_takenFood_Refugee` (`Refugee_rfid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `takenfood`
--

INSERT INTO `takenfood` (`tfid`, `takenDate`, `qty`, `foodreg_rfid`, `Refugee_rfid`) VALUES
(15, '2017-03-30', 4, 1, 44);
