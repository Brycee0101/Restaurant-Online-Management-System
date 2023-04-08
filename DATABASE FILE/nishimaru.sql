-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2023 at 11:28 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `pword`) VALUES
(9, 'Liam Johnson', 'liam', '12345'),
(10, 'Ramsey', 'ramsey', '12345'),
(12, 'Administrator', 'admin', ''),
(13, 'Halnin', 'admin2', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(11) NOT NULL,
  `cart_food` varchar(255) DEFAULT NULL,
  `cart_price` decimal(10,2) DEFAULT NULL,
  `cart_qty` int(11) DEFAULT NULL,
  `cart_total` decimal(10,2) DEFAULT NULL,
  `cart_custfname` varchar(255) NOT NULL,
  `cart_custlname` varchar(255) NOT NULL,
  `cart_contact` bigint(20) DEFAULT NULL,
  `cart_email` varchar(255) DEFAULT NULL,
  `cart_address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_cust`
--

INSERT INTO `tbl_cust` (`cust_id`, `cust_fname`, `cust_lname`, `cust_email`, `cust_uname`, `cust_pword`, `cust_phone`, `cust_street`, `cust_brgy`, `cust_city`, `cust_zip`) VALUES
(1, 'Joseph ', 'Wenceslao', 'jwenceslao@sskin.com', 'jwenceslao', '12345', '1234567890', 'Pablo Ocampo', 'Sr. Exit', 'Makati', '1702'),
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(4, 'Tuna Maki Roll', 'Consists of tuna, cucumber, or avocado depending on the customer request.', '250.00', 'tuna.png', 10, 'No', 'Yes'),
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
  `order_id` int(10) UNSIGNED NOT NULL,
  `order_food` varchar(150) NOT NULL,
  `order_price` decimal(10,2) NOT NULL,
  `order_qty` int(11) NOT NULL,
  `order_total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `order_status` varchar(50) NOT NULL,
  `order_custfname` varchar(255) NOT NULL,
  `order_custlname` varchar(255) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `order_food`, `order_price`, `order_qty`, `order_total`, `order_date`, `order_status`, `order_custfname`, `order_custlname`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(12, 'Salmon Maki Roll', '250.00', 1, '250.00', '2023-02-02 06:09:23', 'Ordered', 'Bryce Stephen', 'Halnin', '241234134', 'eboc@ggmial.com', 'house'),
(13, 'Salmon and Tuna Maki Roll', '250.00', 12, '3000.00', '2023-03-08 03:24:47', 'Ordered', 'Joseph', '', '12345', 'jwenceslao@sskin.com', 'asdasd'),
(16, 'Mixed Maki Set', '280.00', 1, '280.00', '2023-04-07 10:46:44', 'Ordered', 'Bryce Stephen', 'Halnin', '1234567890', 'bsphalnin@asdasa', 'Pablo, Ocampo, Makati 1991'),
(18, 'Mixed Maki Set', '280.00', 1, '280.00', '2023-04-07 11:13:40', 'Ordered', 'Bryce Stephen', 'Halnin', '1234567890', 'bsphalnin@asdasa', 'Pablo, Ocampo, Makati 1991'),
(35, 'Tuna Maki Roll', '250.00', 1, '250.00', '2023-04-07 11:43:10', 'Ordered', 'Joseph ', 'Wenceslao', '1234567890', 'jwenceslao@sskin.com', 'Pablo Ocampo, Sr. Exit, Makati 1702'),
(36, 'Mixed Maki Set', '280.00', 1, '280.00', '2023-04-07 11:55:18', 'On Delivery', 'Joseph ', 'Wenceslao', '1234567890', 'jwenceslao@sskin.com', 'Pablo Ocampo, Sr. Exit, Makati 1702'),
(37, 'Mixed Maki Set', '280.00', 1, '280.00', '2023-04-07 11:55:49', 'Cancelled', 'Joseph ', 'Wenceslao', '1234567890', 'jwenceslao@sskin.com', 'Pablo Ocampo, Sr. Exit, Makati 1702'),
(38, 'Mixed Maki Set', '280.00', 1, '280.00', '2023-04-07 12:57:52', 'Delivered', 'Bryce Stephen', 'Halnin', '1234567890', 'bsphalnin@asdasa', 'Pablo, Ocampo, Makati 1991');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_pword` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_pword`, `user_type`) VALUES
(1, 'jwenceslao', '12345', 'Customer'),
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
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`);

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
  ADD PRIMARY KEY (`order_id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

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
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
