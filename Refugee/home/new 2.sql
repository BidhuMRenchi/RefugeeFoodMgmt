-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 10, 2017 at 01:33 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

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
  `fid` int(11) NOT NULL AUTO_INCREMENT,
  `foodname` varchar(205) NOT NULL,
  `qtyleft` int(205) NOT NULL,
  `qtytaken` int(45) NOT NULL,
  `dateEntry` date NOT NULL,
  `footType_typeid` int(200) NOT NULL,
  PRIMARY KEY (`rfid`),
  KEY `fk_foodreg_footType` (`footType_typeid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `foodreg`
--

INSERT INTO `foodreg` (`rfid`, `foodname`, `qtyleft`, `qtytaken`, `dateEntry`, `footType_typeid`) VALUES
(1, 'Maize floor', 200, 0, '2017-03-10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `foottype`
--

CREATE TABLE IF NOT EXISTS `foottype` (
  `typeid` int(200) NOT NULL AUTO_INCREMENT,
  `typename` varchar(205) NOT NULL,
  `description` varchar(200) NOT NULL,
  PRIMARY KEY (`typeid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `foottype`
--

INSERT INTO `foottype` (`typeid`, `typename`, `description`) VALUES
(1, 'floor', 'white plain');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `refugee`
--

INSERT INTO `refugee` (`rfid`, `Fname`, `Lname`, `sex`, `age`, `contact`, `dateEntry`, `status`, `received`, `nationality_nid`, `refNo`) VALUES
(9, 'keith', 'Rinual', 'female', 14, 558578, '2017-03-09', 'active', 'Null', 1, 'RF04899'),
(10, 'keshi', 'keshi', 'male', 20, 48755233, '2017-03-09', 'active', 'Null', 1, 'RT90'),
(11, 'Habyarimana', 'Habya', 'male', 30, 569887403, '2017-03-09', 'active', 'Null', 1, 'RFR0348');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `takenfood`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `Fname` varchar(205) NOT NULL,
  `Lname` varchar(205) NOT NULL,
  `sex` varchar(45) NOT NULL,
  `age` int(200) NOT NULL,
  `username` varchar(205) NOT NULL,
  `password` varchar(205) NOT NULL,
  `role` varchar(205) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `Fname`, `Lname`, `sex`, `age`, `username`, `password`, `role`) VALUES
(1, 'neville', 'neville', 'm', 20, 'neville', '6504ab7c5083d5070fa8749cea625821ca8a6c66', 'Admin');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `foodreg`
--
ALTER TABLE `foodreg`
  ADD CONSTRAINT `fk_foodreg_footType` FOREIGN KEY (`footType_typeid`) REFERENCES `foottype` (`typeid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `refugee`
--
ALTER TABLE `refugee`
  ADD CONSTRAINT `fk_Refugee_nationality` FOREIGN KEY (`nationality_nid`) REFERENCES `nationality` (`nid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `takenfood`
--
ALTER TABLE `takenfood`
  ADD CONSTRAINT `fk_takenFood_foodreg` FOREIGN KEY (`foodreg_rfid`) REFERENCES `foodreg` (`rfid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_takenFood_Refugee` FOREIGN KEY (`Refugee_rfid`) REFERENCES `refugee` (`rfid`) ON DELETE CASCADE ON UPDATE CASCADE;
