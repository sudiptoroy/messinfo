-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2017 at 10:35 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mess_db_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `food_menu`
--

CREATE TABLE `food_menu` (
  `day` varchar(15) DEFAULT NULL,
  `mealitem` varchar(30) DEFAULT NULL,
  `mid` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messinformation`
--

CREATE TABLE `messinformation` (
  `mid` decimal(7,2) NOT NULL,
  `mname` decimal(7,2) DEFAULT NULL,
  `mlocation` decimal(7,2) DEFAULT NULL,
  `mcapacity` decimal(7,2) DEFAULT NULL,
  `mmealperday` decimal(7,2) DEFAULT NULL,
  `mhouserent` decimal(7,2) DEFAULT NULL,
  `melectricitybill` decimal(7,2) DEFAULT NULL,
  `mwaterbill` decimal(7,2) DEFAULT NULL,
  `mgasbill` decimal(7,2) DEFAULT NULL,
  `mdustbill` decimal(7,2) DEFAULT NULL,
  `mmaidebill` decimal(7,2) DEFAULT NULL,
  `minternetbill` decimal(7,2) DEFAULT NULL,
  `mhousekeeperbill` decimal(7,2) DEFAULT NULL,
  `mothers` decimal(7,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mess_meal`
--

CREATE TABLE `mess_meal` (
  `uid` varchar(20) DEFAULT NULL,
  `date` int(20) DEFAULT NULL,
  `month` int(20) DEFAULT NULL,
  `year` int(20) DEFAULT NULL,
  `mmealperday` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `monthly_mess_meal_cost`
--

CREATE TABLE `monthly_mess_meal_cost` (
  `mid` varchar(20) DEFAULT NULL,
  `month` int(20) DEFAULT NULL,
  `year` int(20) DEFAULT NULL,
  `mealcount` int(20) DEFAULT NULL,
  `mealrate` decimal(5,2) DEFAULT NULL,
  `totmealcount` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rent_and_other_cost`
--

CREATE TABLE `rent_and_other_cost` (
  `mid` varchar(20) DEFAULT NULL,
  `uid` varchar(20) DEFAULT NULL,
  `houserent` decimal(7,2) DEFAULT NULL,
  `melectricitybill` decimal(7,2) DEFAULT NULL,
  `mgasbill` decimal(7,2) DEFAULT NULL,
  `mwaterbill` decimal(7,2) DEFAULT NULL,
  `mdustbill` decimal(7,2) DEFAULT NULL,
  `mmaidebill` decimal(7,2) DEFAULT NULL,
  `minternetbill` decimal(7,2) DEFAULT NULL,
  `mhousekeeperbill` decimal(7,2) DEFAULT NULL,
  `mothers` decimal(7,2) DEFAULT NULL,
  `mealexpense` decimal(7,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `super_market_list`
--

CREATE TABLE `super_market_list` (
  `mid` varchar(20) DEFAULT NULL,
  `uid` varchar(20) DEFAULT NULL,
  `day` varchar(15) DEFAULT NULL,
  `date` int(20) DEFAULT NULL,
  `month` int(20) DEFAULT NULL,
  `year` int(20) DEFAULT NULL,
  `expense` decimal(7,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `uid` varchar(20) NOT NULL,
  `uname` varchar(20) DEFAULT NULL,
  `uemail` varchar(30) NOT NULL,
  `upassword` varchar(20) DEFAULT NULL,
  `uphone` varchar(30) DEFAULT NULL,
  `ulocation` varchar(50) DEFAULT NULL,
  `umess` varchar(30) DEFAULT NULL,
  `uadmin_check` varchar(20) DEFAULT NULL,
  `ugender` varchar(10) DEFAULT NULL,
  `ubirthdate` varchar(20) DEFAULT NULL,
  `umealcount` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messinformation`
--
ALTER TABLE `messinformation`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`uid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
