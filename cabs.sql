-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2016 at 05:59 PM
-- Server version: 5.6.17-log
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+05:30";
SET GLOBAL event_scheduler = ON;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `workshop`
--

-- --------------------------------------------------------
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  -- `userid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`mobile`)
  -- UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ;
--
-- Table structure for table `rides`
--

CREATE TABLE IF NOT EXISTS `rides` (
  `ride_no` bigint(10) NOT NULL AUTO_INCREMENT,
  `source` varchar(100) NOT NULL,
  `postid` varchar(100) NOT NULL,
  `timestamp1` timestamp NOT NULL,
  `mobile` int(10) NOT NULL,
  PRIMARY KEY (`ride_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;

-- --------------------------------------------------------
--
-- Constraints for dumped tables
--

--
-- Constraints for table `drivers`
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `drivers` (
  `name` varchar(50) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `car_no` varchar(10) NOT NULL,
  `avail` int(2) NOT NULL,
  PRIMARY KEY (`car_no`)
  -- UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ;
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
