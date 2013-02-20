-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 19, 2013 at 09:35 PM
-- Server version: 5.5.29-0ubuntu0.12.04.1
-- PHP Version: 5.3.10-1ubuntu3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pictrader`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ImageList`
--

CREATE TABLE IF NOT EXISTS `tbl_ImageList` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NOT NULL DEFAULT '1',
  `ImageName` varchar(30) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `FS_location` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`),
  KEY `UserID` (`UserID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_ImageList`
--

INSERT INTO `tbl_ImageList` (`ID`, `UserID`, `ImageName`, `Date`, `FS_location`) VALUES
(1, 2, 'fapstation.jpg', '2013-02-20 01:36:13', '/Users/miguelbaquero/files/ced46fc8e4449cd45becb87bf7004e6885b90342.jpg'),
(2, 2, 'flammie.jpeg', '2013-02-20 02:34:27', '/Users/miguelbaquero/files/6316554ed183332c87199d6b599f79067ff6f3be.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_Users`
--

CREATE TABLE IF NOT EXISTS `tbl_Users` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `User` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Firstname` varchar(30) NOT NULL,
  `Lastname` varchar(30) NOT NULL,
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='User table' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_Users`
--

INSERT INTO `tbl_Users` (`ID`, `User`, `Password`, `Firstname`, `Lastname`) VALUES
(1, 'admin', '12345678', 'Phil', 'Anselmo'),
(2, 'rt', 'u', 'u', 'u');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_ImageList`
--
ALTER TABLE `tbl_ImageList`
  ADD CONSTRAINT `tbl_ImageList_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `tbl_Users` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
