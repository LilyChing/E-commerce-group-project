

CREATE DATABASE  `onlineshop` ;
USE `onlineshop`;

CREATE TABLE `product_type` (
  `product_type_id` int(3) NOT NULL AUTO_INCREMENT,
  `product_type` varchar(25) NOT NULL,
  PRIMARY KEY (product_type_id)
) ;

INSERT INTO `product_type` (`product_type_id`, `product_type`) VALUES
(1, 'Tour Services'),
(2, 'SIM Card'),
(3, 'Travel Accessories');


CREATE TABLE `product_details` (
  `product_id` int(5) NOT NULL PRIMARY KEY,
  `product_type_id` int(3) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` decimal(7,2) NOT NULL,
  `img_src` varchar(300) DEFAULT NULL,
  PRIMARY KEY (product_id),
  FOREIGN KEY (product_type_id) REFERENCES product_type(product_type_id)
) ;



CREATE TABLE `order_info` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
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
) ;


CREATE TABLE `order_details` (
  `orderdetails_id` int(11) NOT NULL PRIMARY KEY,
  `order_id` int(11) NOT NULL,
  `product_id` int(5) NOT NULL,
  `order_qty` int(5) NOT NULL,
  PRIMARY KEY (orderdetails_id)
) ;


ALTER TABLE `order_details`
  ADD CONSTRAINT `ORDER_LINK` FOREIGN KEY (`order_id`) REFERENCES `order_info` (`order_id`),
  ADD CONSTRAINT `PRODUCT_LINK` FOREIGN KEY (`product_id`) REFERENCES `product_details` (`product_id`) ;









INSERT INTO `product_details` (`product_id`, `product_type_id`, `product_name`, `product_price`, `img_src`) VALUES
(1001, 2, 'SIM Card - Singapore (1/3/5/7 Days)', 188.00, NULL),
(1002, 2, 'SIM Card - Italy (1/3/5/7 Days)', 188.00, NULL),
(1003, 2, 'SIM Card - Japan (1/3/5/7 Days)', 88.00, NULL),
(1004, 2, 'SIM Card - Korea (1/3/5/7 Days)', 88.00, NULL),
(1005, 2, 'SIM Card - Thai (1/3/5/7 Days)', 58.00, NULL),
(1011, 1, 'Singapore Tour (1/3/5/7 Days)', 8888.00, NULL),
(1012, 1, 'Italy Tour (1/3/5/7 Days)', 8888.00, NULL),
(1013, 1, 'Japan Tour (1/3/5/7 Days)', 4888.00, NULL),
(1014, 1, 'Korea Tour (1/3/5/7 Days)', 4888.00, NULL),
(1015, 1, 'Thai Tour (1/3/5/7 Days)', 5888.00, NULL),
(1021, 3, 'RIMOWA - Check-in L Suitcase ', 788.00, NULL),
(1022, 3, 'RIMOWA - Cabin Twist Suitcase ', 788.00, NULL),
(1023, 3, 'RIMOWA - Cabin Suitcase ', 788.00, NULL),
(1024, 3, 'Samsonite - Global TA Neck Pillow', 188.00, NULL),
(1025, 3, 'Samsonite - Zira (29\'/78cm) Suitcase', 588.00, NULL);


INSERT INTO `order_info` (`order_id`, `cName`, `cNumber`, `cEmail`, `sName`, `sAddress`, `sCity`, `sCountry`, `sPostcode`, `payment_method`, `order_time`) VALUES
(1, 'CHAN Siu ming', 98765432, 'chan_siu_ming@gmail.com', 'CHAN Siu ming', 'Unit 1203, 12/F, Speed Building, Hung Hom, Kowloon', 'Hong Kong', 'China', '', 'Alipay', '2024-11-28 17:03:11'),
(2, 'LAW KING', 12345678, 'lawking@yahoo.com.hk', 'law king', 'G/F, 9, Nathan Road, TST, Kowloon', 'Hong Kong', '', '', 'Alipay', '2024-11-28 18:16:27');


INSERT INTO `order_details` (`orderdetails_id`, `order_id`, `product_id`, `order_qty`) VALUES
(1, 1, 1023, 2),
(2, 1, 1001, 1),
(3, 2, 1003, 1);
