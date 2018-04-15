-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 15, 2018 at 08:14 PM
-- Server version: 5.7.19
-- PHP Version: 7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abc`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `employee_id` int(10) NOT NULL AUTO_INCREMENT,
  `login_id` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL,
  PRIMARY KEY (`employee_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `login_id`, `name`, `password`) VALUES
(1, 'ram', 'Ram', 'ram123'),
(2, 'shyam', 'Shyam', 'shyam123'),
(3, 'ghanshyam', 'Ghanshyam', 'ghanshyam123');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `item_id` int(10) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(25) NOT NULL,
  `rate` double NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `rate`) VALUES
(1, 'Tea', 10),
(2, 'Coffee', 10),
(3, 'Samosa', 15),
(4, 'Cake', 15);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
  `order_id` int(10) NOT NULL AUTO_INCREMENT,
  `item_sold` varchar(25) NOT NULL,
  `quantity` int(10) NOT NULL,
  `amount` float NOT NULL,
  `employee` varchar(50) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `item_sold`, `quantity`, `amount`, `employee`, `date`) VALUES
(1, 'Tea', 2, 20, 'Ghanshyam', '2018-04-14'),
(2, 'Samosa', 2, 30, 'Ghanshyam', '2018-04-14'),
(6, 'Tea', 3, 30, 'Ram', '2018-04-14'),
(5, 'Cake', 2, 30, 'Ghanshyam', '2018-04-14'),
(7, 'Cake', 1, 15, 'Ram', '2018-04-14'),
(8, 'Cake', 2, 30, 'Ram', '2018-04-14'),
(9, 'Coffee', 2, 20, 'Ram', '2018-04-14'),
(10, 'Samosa', 4, 60, 'Ram', '2018-04-14'),
(11, 'Coffee', 2, 20, 'Ram', '2018-04-15'),
(12, 'Tea', 3, 30, 'Ram', '2018-04-15'),
(13, 'Tea', 3, 30, 'Ram', '2018-04-15'),
(14, 'Samosa', 2, 30, 'Ram', '2018-04-20'),
(15, 'Tea', 2, 20, 'Ghanshyam', '2018-04-17'),
(16, 'Cake', 3, 45, 'Shyam', '2018-04-14'),
(17, 'Coffee', 2, 20, 'Shyam', '2018-04-21'),
(18, 'Samosa', 4, 60, 'Ghanshyam', '2018-04-16'),
(19, 'Cake', 2, 30, 'Ghanshyam', '2018-04-17');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
