-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2024 at 07:32 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `orderdetails_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` varchar(10) NOT NULL,
  `order_qty` int(5) NOT NULL
) ;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`orderdetails_id`, `order_id`, `product_id`, `order_qty`) VALUES
(1, 1, 'AC-0003', 1),
(2, 1, 'SC-0001-03', 1),
(3, 2, 'AC-0001', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_info`
--

CREATE TABLE `order_info` (
  `order_id` int(11) NOT NULL,
  `cName` varchar(50) NOT NULL,
  `cNumber` int(20) NOT NULL,
  `cEmail` varchar(50) NOT NULL,
  `sName` varchar(50) NOT NULL,
  `sAddress` varchar(255) NOT NULL,
  `sCity` varchar(50) NOT NULL,
  `sCountry` varchar(50) NOT NULL,
  `sPostcode` varchar(20) NOT NULL,
  `payment_method` varchar(10) NOT NULL,
  `order_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) 

--
-- Dumping data for table `order_info`
--

INSERT INTO `order_info` (`order_id`, `cName`, `cNumber`, `cEmail`, `sName`, `sAddress`, `sCity`, `sCountry`, `sPostcode`, `payment_method`, `order_time`) VALUES
(1, 'CHAN Siu ming', 98765432, 'chan_siu_ming@gmail.com', 'CHAN Siu ming', 'Unit 1203, 12/F, Speed Building, Hung Hom, Kowloon', 'Hong Kong', 'China', '', 'Alipay', '2024-11-28 17:03:11'),
(2, 'LAW KING', 12345678, 'lawking@yahoo.com.hk', 'law king', 'G/F, 9, Nathan Road, TST, Kowloon', 'Hong Kong', '', '', 'Alipay', '2024-11-28 18:16:27');

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `product_id` varchar(10) NOT NULL,
  `product_type_id` int(3) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` decimal(7,2) NOT NULL
) 

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`product_id`, `product_type_id`, `product_name`, `product_price`) VALUES
('AC-0001', 3, 'XXX', 1000.00),
('AC-0002', 3, 'XXX', 2000.00),
('AC-0003', 3, 'XXX', 3000.00),
('AC-0004', 3, 'XXX', 4000.00),
('AC-0005', 3, 'XXX', 5000.00),
('SC-0001-01', 2, 'SIM card (Japan) (1 -Day)', 30.00),
('SC-0001-03', 2, 'SIM card (Japan) (3 -Day)', 55.00),
('SC-0001-05', 2, 'SIM card (Japan) (5 -Day)', 70.00),
('SC-0001-07', 2, 'SIM card (Japan) (7 -Day)', 85.00),
('SC-0002-01', 2, 'SIM card (Korea) (1 -Day)', 30.00),
('SC-0002-03', 2, 'SIM card (Korea) (3 -Day)', 55.00),
('SC-0002-05', 2, 'SIM card (Korea) (5 -Day)', 70.00),
('SC-0002-07', 2, 'SIM card (Korea) (7 -Day)', 85.00),
('SC-0003-01', 2, 'SIM card (Taiwan) (1 -Day)', 30.00),
('SC-0003-03', 2, 'SIM card (Taiwan) (3 -Day)', 55.00),
('SC-0003-05', 2, 'SIM card (Taiwan) (5 -Day)', 70.00),
('SC-0003-07', 2, 'SIM card (Taiwan) (7 -Day)', 85.00),
('SC-0004-01', 2, 'SIM card (Thailand) (1-Day)', 30.00),
('SC-0004-03', 2, 'SIM card (Thailand) (3 -Day)', 55.00),
('SC-0004-05', 2, 'SIM card (Thailand) (5 -Day)', 70.00),
('SC-0004-07', 2, 'SIM card (Thailand) (7 -Day)', 85.00),
('SC-0005-01', 2, 'SIM card (Singapore) (1 -Day)', 30.00),
('SC-0005-03', 2, 'SIM card (Singapore) (3 -Day)', 55.00),
('SC-0005-05', 2, 'SIM card (Singapore) (5 -Day)', 70.00),
('SC-0005-07', 2, 'SIM card (Singapore) (7 -Day)', 85.00),
('TP-0002', 1, 'XXX', 3000.00),
('TP-0003', 1, 'XXX', 4000.00),
('TP-0004', 1, 'XXX', 5000.00),
('TP-0005', 1, 'XXX', 6000.00),
('TS-0001', 1, 'XXXX', 3000.00);

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `product_type_id` int(3) NOT NULL,
  `product_type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`product_type_id`, `product_type`) VALUES
(1, 'Tour Services'),
(2, 'SIM Card'),
(3, 'Accessories');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`orderdetails_id`),
  ADD KEY `PRODUCT_INFO` (`product_id`),
  ADD KEY `ORDER_LINK` (`order_id`);

--
-- Indexes for table `order_info`
--
ALTER TABLE `order_info`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `MANAGE_PRODUCT_TYPE` (`product_type_id`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`product_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `orderdetails_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_info`
--
ALTER TABLE `order_info`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `product_type_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `ORDER_LINK` FOREIGN KEY (`order_id`) REFERENCES `order_info` (`order_id`),
  ADD CONSTRAINT `PRODUCT_INFO` FOREIGN KEY (`product_id`) REFERENCES `product_details` (`product_id`);

--
-- Constraints for table `product_details`
--
ALTER TABLE `product_details`
  ADD CONSTRAINT `MANAGE_PRODUCT_TYPE` FOREIGN KEY (`product_type_id`) REFERENCES `product_type` (`product_type_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;


SELECT order_details.order_id, product_details.product_id, product_details.product_price, order_details.order_qty, (product_details.product_price * order_details.order_qty) AS subtotal_price FROM product_details JOIN order_details ON product_details.product_id = order_details.product_id;
