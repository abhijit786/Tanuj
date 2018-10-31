-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2018 at 05:32 PM
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
(1, 113, 103, 50, 25, 25120, 29000, 550, -4430, '2018-10-28 23:53:35', 'puredrops'),
(2, 0, 0, 0, 0, 0, 0, 0, 0, '2018-10-29 01:05:46', 'puredrops'),
(3, 12, 13, 2, 2, 37, 40, 75, -78, '2018-10-29 23:06:10', 'puredrops');

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
(1, 'Tanuj', 'Murlidkar', 'Kamde', 'z', 99, 40, 200, '2018-10-28 19:00:18', 'puredrops'),
(2, 'Abhijeet', 'Anant', 'Mahankal', 'Plotd jdsb8j0', 2147483647, 20, 30, '2018-10-28 19:41:25', 'puredrops'),
(3, 'Kawaldeep', 'K', 'Kashyap', 'hjwefbwjhxyz', 4564535, 2, 1, '2018-10-28 19:41:58', 'puredrops');

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
(1, 113, 63, 103, 78, 29000, 550, '2018-10-19 08:51:18', 'puredrops'),
(2, 7, 6, 13, 12, 40, 10, '2018-10-29 01:05:14', 'puredrops'),
(3, 12, 10, 13, 11, 40, 75, '2018-10-29 01:05:14', 'puredrops');

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
(1, 50, 20, 40, 15, 500, 110, '2018-10-28 11:30:20', 'puredrops'),
(1, 40, 30, 45, 50, 1000, 90, '2018-10-28 11:30:20', 'puredrops'),
(1, 20, 10, 15, 10, 2000, 300, '2018-10-28 11:30:20', 'puredrops'),
(1, 0, 0, 0, 0, 0, 0, '2018-10-28 11:30:20', 'puredrops'),
(1, 1, 1, 1, 1, 500, 20, '2018-10-30 06:51:18', 'puredrops'),
(1, 2, 2, 2, 2, 25000, 30, '2018-10-19 08:51:18', 'puredrops'),
(2, 1, 1, 2, 2, 0, 0, '2018-10-29 01:05:14', 'puredrops'),
(2, 6, 5, 11, 10, 40, 10, '2018-10-29 01:05:14', 'puredrops'),
(3, 12, 10, 13, 11, 40, 75, '2018-10-29 01:05:14', 'puredrops');

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
(2, 'admin', 'puredrops', '21232f297a57a5a743894a0e4a801fc3', '2018-10-30 14:14:38');

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
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
