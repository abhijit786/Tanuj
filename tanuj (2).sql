-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2018 at 09:52 PM
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
  `Name` varchar(255) NOT NULL,
  `total_can` int(10) DEFAULT NULL,
  `total_jar` int(10) DEFAULT NULL,
  `balance_can` int(10) DEFAULT NULL,
  `balance_jar` int(10) DEFAULT NULL,
  `total_amount` int(10) DEFAULT NULL,
  `total_paid` int(10) DEFAULT NULL,
  `total_discount` int(10) DEFAULT NULL,
  `balance_amount` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `customer_created_date` date DEFAULT NULL,
  `customer_created_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_fn`, `customer_mn`, `customer_ln`, `customer_address`, `customer_contact_number`, `rate_per_can`, `rate_per_jar`, `customer_created_date`, `customer_created_by`) VALUES
(2, 'abhijeet', 'anant', 'mahankal', 'plot no 90', 2147483647, 20, 30, '2018-10-24', 'admin'),
(4, 'Abhijeetvfdd', 'Krishnas', 'Mahankal', 'Plot no', 2147483647, 0, 90, '2018-10-24', 'puredrops');

-- --------------------------------------------------------

--
-- Table structure for table `daily_entry`
--

CREATE TABLE `daily_entry` (
  `customer_id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `taken_can` int(4) DEFAULT NULL,
  `return_can` int(4) DEFAULT NULL,
  `taken_jar` int(4) DEFAULT NULL,
  `return_jar` int(4) DEFAULT NULL,
  `paid_amount` int(5) DEFAULT NULL,
  `discount` int(5) DEFAULT NULL,
  `taken_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'admin', 'puredrops', '21232f297a57a5a743894a0e4a801fc3', '2018-10-24 18:23:45');

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
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
