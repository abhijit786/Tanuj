-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2018 at 07:34 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tanuj`
--

-- --------------------------------------------------------

--
-- Table structure for table `complete_details`
--

CREATE TABLE `complete_details` (
  `customer_id` int(11) NOT NULL,
  `total_can` int(10) DEFAULT NULL,
  `total_jar` int(10) DEFAULT NULL,
  `balance_can` int(10) DEFAULT NULL,
  `balance_jar` int(10) DEFAULT NULL,
  `total_amount` int(10) DEFAULT NULL,
  `total_paid` int(10) DEFAULT NULL,
  `total_discount` int(10) DEFAULT NULL,
  `balance_amount` int(10) DEFAULT NULL,
  `entry_date` datetime NOT NULL,
  `entry_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complete_details`
--

INSERT INTO `complete_details` (`customer_id`, `total_can`, `total_jar`, `balance_can`, `balance_jar`, `total_amount`, `total_paid`, `total_discount`, `balance_amount`, `entry_date`, `entry_by`) VALUES
(1, 0, 1120, -2800, -560, 116400, 0, 0, 0, '2018-10-26 09:22:52', 'puredrops');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_fn` varchar(100) NOT NULL,
  `customer_mn` varchar(100) NOT NULL,
  `customer_ln` varchar(100) NOT NULL,
  `customer_address` varchar(100) DEFAULT NULL,
  `customer_contact_number` int(10) DEFAULT NULL,
  `rate_per_can` int(10) DEFAULT NULL,
  `rate_per_jar` int(10) DEFAULT NULL,
  `customer_created_date` datetime DEFAULT NULL,
  `customer_created_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_fn`, `customer_mn`, `customer_ln`, `customer_address`, `customer_contact_number`, `rate_per_can`, `rate_per_jar`, `customer_created_date`, `customer_created_by`) VALUES
(1, 'Abhishek', 'Anant', 'Mahankal', 'sd', 0, 20, 30, '2018-10-25 20:48:34', 'puredrops'),
(2, 'Abhijeet', 'Anant', 'Mahankal', 'Plot no 90 RMS', 2147483647, 20, 30, '2018-10-25 22:14:56', 'puredrops');

-- --------------------------------------------------------

--
-- Table structure for table `daily_entry`
--

CREATE TABLE `daily_entry` (
  `customer_id` int(11) NOT NULL,
  `taken_can` int(4) DEFAULT NULL,
  `return_can` int(4) DEFAULT NULL,
  `taken_jar` int(4) DEFAULT NULL,
  `return_jar` int(4) DEFAULT NULL,
  `paid_amount` int(5) DEFAULT NULL,
  `discount` int(5) DEFAULT NULL,
  `taken_date` datetime NOT NULL,
  `entry_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daily_entry`
--

INSERT INTO `daily_entry` (`customer_id`, `taken_can`, `return_can`, `taken_jar`, `return_jar`, `paid_amount`, `discount`, `taken_date`, `entry_by`) VALUES
(1, 5585408, 12221952, 220269056, 12288, 16422400, 7864320, '2018-10-26 09:22:52', 'puredrops'),
(2, 0, 600, 240, 360, 0, 0, '2018-10-25 14:11:17', 'puredrops');

-- --------------------------------------------------------

--
-- Table structure for table `daily_entry_history`
--

CREATE TABLE `daily_entry_history` (
  `customer_id` int(11) NOT NULL,
  `taken_can` int(4) DEFAULT NULL,
  `return_can` int(4) DEFAULT NULL,
  `taken_jar` int(4) DEFAULT NULL,
  `return_jar` int(4) DEFAULT NULL,
  `paid_amount` int(5) DEFAULT NULL,
  `discount` int(5) DEFAULT NULL,
  `taken_date` datetime NOT NULL,
  `entry_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daily_entry_history`
--

INSERT INTO `daily_entry_history` (`customer_id`, `taken_can`, `return_can`, `taken_jar`, `return_jar`, `paid_amount`, `discount`, `taken_date`, `entry_by`) VALUES
(1, 0, 20, 0, 0, 0, 0, '2018-10-25 12:59:25', ''),
(1, 0, 20, 30, 0, 0, 0, '2018-10-25 12:59:31', ''),
(1, 0, 20, 30, 0, 20, 0, '2018-10-25 13:00:04', ''),
(1, 100, 60, 60, 0, 20, 0, '2018-10-25 13:12:05', ''),
(2, 0, 50, 20, 30, 0, 0, '2018-10-25 13:46:27', ''),
(2, 0, 50, 20, 30, 0, 0, '2018-10-25 13:47:38', 'puredrops'),
(1, 100, 120, 1000, 0, 40, 10, '2018-10-25 13:50:06', 'puredrops'),
(1, 200, 240, 1120, 0, 80, 10, '2018-10-25 13:51:02', 'puredrops'),
(1, 200, 240, 1120, 0, 80, 10, '2018-10-25 13:51:41', 'puredrops'),
(1, 0, 0, 3360, 0, 240, 30, '2018-10-25 13:52:44', 'puredrops'),
(1, 30, 720, 6720, 0, 480, 60, '2018-10-25 13:53:02', 'puredrops'),
(1, 630, 1440, 13440, 0, 960, 120, '2018-10-25 13:53:45', 'puredrops'),
(1, 100, 100, 26880, 0, 1920, 240, '2018-10-25 13:54:27', 'puredrops'),
(1, 1360, 2980, 53760, 0, 3840, 480, '2018-10-25 13:55:31', 'puredrops'),
(1, 2720, 5960, 107520, 0, 7680, 960, '2018-10-25 13:56:41', 'puredrops'),
(1, 3, 4, 5, 6, 676, 1920, '2018-10-25 13:57:23', 'puredrops'),
(1, 5443, 11924, 215045, 6, 16036, 3840, '2018-10-25 13:59:19', 'puredrops'),
(1, 23, 23, 123, 12, 3, 7680, '2018-10-25 14:00:26', 'puredrops'),
(1, 10909, 23871, 430213, 24, 32075, 15360, '2018-10-25 14:01:20', 'puredrops'),
(1, 21818, 47742, 860426, 48, 64150, 30720, '2018-10-25 14:01:54', 'puredrops'),
(1, 43636, 95484, 1720852, 96, 128300, 61440, '2018-10-25 14:08:04', 'puredrops'),
(2, 0, 100, 40, 60, 0, 0, '2018-10-25 14:08:41', 'puredrops'),
(1, 87272, 190968, 3441704, 192, 256600, 122880, '2018-10-25 14:08:44', 'puredrops'),
(1, 174544, 381936, 6883408, 384, 513200, 245760, '2018-10-25 14:09:26', 'puredrops'),
(1, 349088, 763872, 13766816, 768, 1026400, 491520, '2018-10-25 14:09:45', 'puredrops'),
(1, 698176, 1527744, 27533632, 1536, 2052800, 983040, '2018-10-25 14:11:10', 'puredrops'),
(2, 0, 200, 80, 120, 0, 0, '2018-10-25 14:11:15', 'puredrops'),
(2, 0, 200, 80, 120, 0, 0, '2018-10-25 14:11:17', 'puredrops'),
(1, 1396352, 3055488, 55067264, 3072, 4105600, 1966080, '2018-10-25 14:11:29', 'puredrops'),
(1, 0, 0, 0, 0, 0, 0, '2018-10-26 09:20:51', 'puredrops'),
(1, 2792704, 6110976, 110134528, 6144, 8211200, 3932160, '2018-10-26 09:22:52', 'puredrops');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `employee_fn` varchar(100) NOT NULL,
  `employee_mn` varchar(100) NOT NULL,
  `employee_ln` varchar(100) NOT NULL,
  `employee_contact_number` int(10) NOT NULL,
  `employee_address` varchar(100) NOT NULL,
  `employee_created_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `user_id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`user_id`, `role`, `username`, `password`, `created`) VALUES
(1, 'employee', 'puredrops', '21232f297a57a5a743894a0e4a801fc3', '2018-10-24 18:23:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complete_details`
--
ALTER TABLE `complete_details`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `daily_entry`
--
ALTER TABLE `daily_entry`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
