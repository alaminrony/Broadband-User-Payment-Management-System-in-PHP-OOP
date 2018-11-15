-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 05, 2018 at 08:35 AM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_broadband`
--

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `month_id` int(11) NOT NULL AUTO_INCREMENT,
  `month_name` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `packeg_price` varchar(255) NOT NULL,
  `amount` int(255) NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`month_id`)
) ENGINE=MyISAM AUTO_INCREMENT=182 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`month_id`, `month_name`, `date`, `user_id`, `user_name`, `packeg_price`, `amount`, `comment`) VALUES
(172, 'July', '2018-08-13 00:27:55', 64, 'Rony', '500/=', 400, '\r\n                                  '),
(171, 'July', '2018-08-13 00:27:50', 64, 'Rony', '500/=', 300, '\r\n                                  '),
(170, 'October', '2018-08-13 00:27:44', 64, 'Rony', '500/=', 500, '\r\n                                  '),
(168, 'August', '2018-08-13 00:27:35', 64, 'Rony', '500/=', 400, 'bikash a payment korse                   '),
(181, 'April', '2018-09-09 23:48:53', 68, 'salam rakha', '800/=', 500, 'hh\r\n                                  '),
(180, 'January', '2018-09-09 23:25:37', 70, 'shuvo', '500/=', 500, 'f\r\n                                  ');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

DROP TABLE IF EXISTS `user_info`;
CREATE TABLE IF NOT EXISTS `user_info` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `price` int(50) NOT NULL,
  `box_num` varchar(255) NOT NULL,
  `under_by` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `user_name`, `address`, `phone`, `price`, `box_num`, `under_by`) VALUES
(64, 'Rony', '60/4/A, Dholpur', '01912168339', 500, '70', 'shuvo'),
(65, 'jony', '60/4/A, Dholpur', '01912168339', 800, '73', 'shuvo'),
(67, 'salam', '60/4/A, Dholpur,dhaka,1204', '01912168339', 500, '73', 'shuvo'),
(68, 'salam rakha', 'hasnabad', '01912168339', 800, '73', 'shuvo'),
(69, 'rony', '60/4/A, Dholpur', '01912168339', 500, '73', 'shuvo'),
(70, 'shuvo', '60/4/A, Dholpur', '01912168339', 500, '73', 'shuvo');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
