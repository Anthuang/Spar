-- phpMyAdmin SQL Dump
-- version 4.0.5
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 28, 2016 at 05:04 PM
-- Server version: 5.5.27
-- PHP Version: 5.5.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `SpartaHack16S`
--

-- --------------------------------------------------------

--
-- Table structure for table `Profile`
--

CREATE TABLE IF NOT EXISTS `Profile` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(32) NOT NULL,
  `Statement` varchar(64) NOT NULL,
  `Score` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `Profile`
--

INSERT INTO `Profile` (`ID`, `Name`, `Statement`, `Score`) VALUES
(1, 'Thomas Huang', 'Wow!', 3),
(2, 'Thomas Huang', 'Wow!!', 5),
(3, 'Thomas Huang', 'Wow!!!', 7),
(4, 'Thomas Huang', 'Wow!!!!', 9),
(5, 'Donald Trump', 'Cool', 2),
(6, 'Donald Trump', 'Nice', 1),
(7, 'Donald Trump', 'Bad', 4),
(8, 'Donald Trump', 'Dumb', 3),
(9, 'Donald Trump', 'Trash', 5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
