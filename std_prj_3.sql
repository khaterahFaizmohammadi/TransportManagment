-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2019 at 06:49 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `std_prj_3`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `c_id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `cf_name` varchar(100) NOT NULL,
  `cl_name` varchar(100) NOT NULL,
  `c_email` varchar(100) NOT NULL,
  `c_mobile` varchar(100) NOT NULL,
  `nid` varchar(100) DEFAULT NULL,
  `w_start` date NOT NULL,
  `w_end` date NOT NULL,
  `payment_type` varchar(100) NOT NULL,
  `invoice_id` varchar(100) DEFAULT NULL,
  `c_address` varchar(400) DEFAULT NULL,
  `c_pass` varchar(30) NOT NULL,
  `extra` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `vehicle_id`, `cf_name`, `cl_name`, `c_email`, `c_mobile`, `nid`, `w_start`, `w_end`, `payment_type`, `invoice_id`, `c_address`, `c_pass`, `extra`) VALUES
(15, 2, 'ahmad', 'ahmadi', 'email@email.com', '009809', NULL, '2019-11-05', '2019-04-04', 'Cash', NULL, NULL, '1234', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `id` int(11) NOT NULL,
  `manufacturer_name` varchar(255) NOT NULL,
  `manufacturer_logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`id`, `manufacturer_name`, `manufacturer_logo`) VALUES
(18, 'BMW', ''),
(19, 'Bugatti', ''),
(20, 'Aston Martin', ''),
(21, 'Audi', ''),
(22, 'Company', ''),
(23, 'MMWW', '/5dc141e097435.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `models`
--

CREATE TABLE `models` (
  `id` int(11) NOT NULL,
  `manufacturer_id` int(11) NOT NULL,
  `model_name` varchar(255) NOT NULL,
  `model_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `models`
--

INSERT INTO `models` (`id`, `manufacturer_id`, `model_name`, `model_description`) VALUES
(10, 19, 'Test Model', 'Description About Model\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `su` int(11) DEFAULT '0',
  `type` varchar(15) NOT NULL,
  `position` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(40) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `birthday` date NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `image` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `su`, `type`, `position`, `email`, `password`, `first_name`, `last_name`, `gender`, `birthday`, `mobile`, `address`, `image`) VALUES
(6, 1, 'admin', 'Super Admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 'Baqir', 'Alizada', 'male', '2016-12-27', '0770', 'Herat Afghanistan', '/5dc14f03c38a8.jpg'),
(7, 1, 'employee', 'Employee Super', 'employee@employee.com', '1a1dc91c907325c69271ddf0c944bc72', 'EMPLOYEE', 'EDISON', 'male', '2015-11-30', '2323', 'qwsdasd', '<p>You did not select a file to upload.</p>'),
(13, 0, 'admin', 'employee', 'ali@ali.com', '1a1dc91c907325c69271ddf0c944bc72', 'ali', 'alizada', 'male', '2018-12-04', '0770185057', 'Herat-Afghanistan\r\nghor-af', '<p>You did not select a file to upload.</p>'),
(14, 0, 'admin', 'admin', 'baqir@email.com', '6f111a7f055809bc30e75f53977584df', 'baqir', 'alizada', 'male', '2332-03-04', '0770185057', 'Herat', '/5dc14daa115f9.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `vehicle_id` int(11) NOT NULL,
  `manufacturer_id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `category` varchar(30) NOT NULL,
  `buying_price` double NOT NULL,
  `selling_price` double DEFAULT NULL,
  `mileage` int(11) NOT NULL,
  `color` varchar(15) NOT NULL,
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sold_date` datetime DEFAULT NULL,
  `status` varchar(40) NOT NULL DEFAULT 'available',
  `registration_year` int(4) NOT NULL,
  `insurance_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `gear` varchar(15) NOT NULL,
  `doors` int(11) NOT NULL,
  `seats` int(11) NOT NULL,
  `tank` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `engine_no` int(11) NOT NULL,
  `chesis_no` int(11) NOT NULL,
  `featured` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`vehicle_id`, `manufacturer_id`, `model_id`, `category`, `buying_price`, `selling_price`, `mileage`, `color`, `add_date`, `sold_date`, `status`, `registration_year`, `insurance_id`, `user_id`, `gear`, `doors`, `seats`, `tank`, `image`, `engine_no`, `chesis_no`, `featured`) VALUES
(2, 18, 10, 'Subcompact', 12000100, 4000, 55, 'red', '2016-12-27 12:00:00', '2019-11-05 00:00:00', 'sold', 2010, 2147483647, 1, 'auto', 6, 2147483647, 25, '77303.jpg', 2147483647, 21231231, 1),
(5, 18, 10, 'Subcompact', 10000200, NULL, 25, 'black', '2016-12-27 12:00:00', NULL, 'available', 2010, 4545656, 1, 'auto', 87489796, 4, 25, 'bughatti.jpg', 2147483647, 21231231, 1),
(7, 19, 10, 'Subcompact', 11000100, NULL, 25, 'black', '2016-12-27 12:00:00', NULL, 'available', 2010, 4545656, 1, 'auto', 87489796, 4, 25, 'bughatti.jpg', 2147483647, 21231231, NULL),
(8, 20, 10, 'Compact', 10000100, NULL, 556, 'Yellow', '2016-12-28 12:00:00', NULL, 'available', 2012, 2147483647, 1, 'auto', 4, 4, 25, 'yellow-lamborghini-gallardo-Wallpaper.jpg', 2147483647, 2147483647, NULL),
(13, 18, 10, 'Subcompact', 200, NULL, 2000, 'green', '2019-11-03 19:30:00', NULL, 'available', 302903, 123, 6, 'auto', 3434, 234, 234, 'Untitle 1.png', 29234, 234234, 1),
(14, 18, 10, 'Subcompact', 344, NULL, 2000, 'green', '2019-11-03 19:30:00', NULL, 'available', 22332, 45, 6, 'auto', 45, 4234, 345, '', 29234, 234234, 0),
(15, 18, 10, 'Subcompact', 4000, NULL, 2000, 'green', '2019-11-03 19:30:00', NULL, 'available', 23423, 234, 6, 'auto', 2, 23, 234, '5dc0357d9605e.jpg', 29234, 234234, 0),
(16, 18, 10, 'Subcompact', 345, NULL, 34, 'green', '2019-11-03 19:30:00', NULL, 'available', 324, 435, 6, 'auto', 324, 213, 34, '/5dc03616be7df.png', 29234, 234234, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_id`),
  ADD UNIQUE KEY `v_id_2` (`vehicle_id`),
  ADD UNIQUE KEY `c_id` (`c_id`),
  ADD UNIQUE KEY `invoice_id` (`invoice_id`),
  ADD KEY `v_id` (`vehicle_id`),
  ADD KEY `c_id_2` (`c_id`);

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`vehicle_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `models`
--
ALTER TABLE `models`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `vehicle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `fk` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`vehicle_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
