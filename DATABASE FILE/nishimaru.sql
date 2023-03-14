-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2023 at 04:46 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nishimaru`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `pword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `pword`) VALUES
(9, 'Liam Johnson', 'liam', 'E10ADC3949BA59ABBE56E057F20F883E'),
(10, 'Ramsey', 'ramsey', 'E10ADC3949BA59ABBE56E057F20F883E'),
(12, 'Administrator', 'admin', 'E10ADC3949BA59ABBE56E057F20F883E');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(10, 'Sushi Nigiri', 'nigiri.jpg', 'Yes', 'Yes'),
(11, 'Sushi Rolls', 'rolls.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cust`
--

CREATE TABLE `tbl_cust` (
  `cust_id` int(11) NOT NULL,
  `cust_fname` varchar(255) NOT NULL,
  `cust_lname` varchar(255) NOT NULL,
  `cust_email` varchar(255) NOT NULL,
  `cust_uname` varchar(255) NOT NULL,
  `cust_pword` varchar(255) NOT NULL,
  `cust_phone` varchar(255) NOT NULL,
  `cust_street` varchar(255) NOT NULL,
  `cust_brgy` varchar(255) NOT NULL,
  `cust_city` varchar(255) NOT NULL,
  `cust_zip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cust`
--

INSERT INTO `tbl_cust` (`cust_id`, `cust_fname`, `cust_lname`, `cust_email`, `cust_uname`, `cust_pword`, `cust_phone`, `cust_street`, `cust_brgy`, `cust_city`, `cust_zip`) VALUES
(1, 'Joseph ', 'Wenceslao', 'jwenceslao@sskin.com', 'jwenceslao', '12345', '1234567890', 'Pablo Ocampo', 'Sr. Exit', 'Makati', '1702'),
(2, 'Joseph ', 'Wenceslao', 'jwenceslao@sskin.com', 'jwenceslao', '12345', '1234567890', 'Pablo Ocampo', 'Sr. Exit', 'Makati', '1702'),
(3, 'Bryce Stephen', 'Halnin', 'bsphalnin@asdasa', 'bsphalnin', '12345', '1234567890', 'Pablo', 'Ocampo', 'Makati', '1991');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(4, 'Tuna Maki Roll', 'Consists of tuna, cucumber, or avocado depending on the customer\'s request.', '250.00', 'tuna.png', 5, 'No', 'Yes'),
(5, 'Mixed Maki Set', 'Consists of tuna, salmon, squid, yellow tail, striped bass, cucumber, or avocado, depending on the customer\'s request. \r\n\r\n', '280.00', 'mixedmakiset.png', 4, 'No', 'Yes'),
(9, 'Salmon Maki Roll', 'Consists of salmon, cucumber, or avocado, depending on the customer\'s request. ', '250.00', 'salmon.png', 9, 'Yes', 'Yes'),
(10, 'Salmon and Tuna Maki Roll', 'Consists of tuna, salmon, cucumber, or avocado depending on the customer\'s request.', '250.00', 'salmonandtuna.png', 5, 'Yes', 'Yes'),
(11, 'Spicy Mixed Maki Roll', 'Consists of tuna, salmon, siracha, and mayonnaise. The level of spiciness depends on the customer\'s request. ', '250.00', 'spicy.png', 11, 'Yes', 'Yes'),
(12, 'Simple All-in Maki Set', '2 Salmon, 2 Tuna Maki Roll, 2 Rainbow Roll, and 2 Spicy Gunkan', '280.00', 'Food-Name-5104.png', 10, 'No', 'Yes'),
(13, 'Special All-in Maki Set', '5 Rainbow Roll, 2 Spicy Gunkan, and 1 Temari Sushi', '350.00', 'Food-Name-3033.png', 10, 'Yes', 'Yes'),
(14, 'Temari Sushi ', '5 Sushi Rice balls (Temari Sushi), includes sashimi. \r\n\r\nFresh fish depends on customer: \r\nSalmon \r\nTuna \r\nSquid \r\nYellowTail \r\nStriped Bass', '300.00', 'Food-Name-1131.png', 10, 'No', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(12, 'Salmon Maki Roll', '250.00', 1, '250.00', '2023-02-02 06:09:23', 'Ordered', 'cholo', '241234134', 'eboc@ggmial.com', 'house'),
(13, 'Salmon and Tuna Maki Roll', '250.00', 12, '3000.00', '2023-03-08 03:24:47', 'Ordered', 'Joseph', '12345', 'jwenceslao@sskin.com', 'asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_pword` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_pword`, `user_type`) VALUES
(1, 'jwenceslao', '12345', 'Customer'),
(2, 'jwenceslao', '12345', 'Customer'),
(3, 'bsphalnin', '12345', 'Customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cust`
--
ALTER TABLE `tbl_cust`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_cust`
--
ALTER TABLE `tbl_cust`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `tbl_user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_cust` (`cust_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;