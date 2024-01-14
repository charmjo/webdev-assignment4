-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 03, 2023 at 06:10 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment3`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_level`
--

DROP TABLE IF EXISTS `access_level`;
CREATE TABLE IF NOT EXISTS `access_level` (
  `access_id` int NOT NULL AUTO_INCREMENT,
  `aclvl_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`access_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `access_level`
--

INSERT INTO `access_level` (`access_id`, `aclvl_name`) VALUES
(1, 'ADMIN'),
(2, 'SHOP MANAGER');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `ordered_by` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `credit_num` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `credit_month` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `credit_year` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtotal` double UNSIGNED NOT NULL,
  `sales_tax` double UNSIGNED NOT NULL,
  `grand_total` double UNSIGNED NOT NULL,
  `order_date` datetime NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `ordered_by`, `email`, `phone`, `postcode`, `city`, `address`, `credit_num`, `credit_month`, `credit_year`, `province`, `subtotal`, `sales_tax`, `grand_total`, `order_date`) VALUES
(9, 'John Doe', 'john@test.com', '1231231234', 'A1B2C3', 'Waterloo', '101 redfox grove', '1234-1234-1234-1234', 'JAN', '2030', 'ON', 32.5, 4.225, 36.725, '2023-11-29 20:36:09'),
(64, '', '', '', '', '', '', '', '', '', 'ON', 7.75, 1.0075, 8.7575, '2023-12-02 16:35:14'),
(65, 'John Doe', 'john@test.com', '1231231234', 'A1B2C3', 'Waterloo', '101 redfox grove', '1234-1234-1234-1234', 'JAN', '2045', 'ON', 36.5, 4.745, 41.245, '2023-12-02 21:44:01'),
(66, 'John Doe', 'john@test.com', '1234567890', 'a1b2c3', 'Waterloo', '101 redfox grove', '1234-1234-1234-1234', 'JAN', '2030', 'ON', 252.5, 32.825, 285.325, '2023-12-03 12:14:54'),
(67, 'John Doe', 'john@test.com', '1234567890', 'a1b2c3', 'Waterloo', '101 redfox grove', '1234-1234-1234-1234', 'JAN', '2030', 'ON', 72.5, 9.425, 81.925, '2023-12-03 12:18:33');

-- --------------------------------------------------------

--
-- Table structure for table `prod_ordered`
--

DROP TABLE IF EXISTS `prod_ordered`;
CREATE TABLE IF NOT EXISTS `prod_ordered` (
  `product_id` int DEFAULT NULL,
  `product_name` int DEFAULT NULL,
  `unit_price` int DEFAULT NULL,
  `product_qty` int DEFAULT NULL,
  `total_price` int DEFAULT NULL,
  `order_id` int DEFAULT NULL,
  KEY `FK_prod_ordered_orders` (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `fname` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_level` int NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`fname`, `lname`, `email`, `password`, `access_level`) VALUES
('Admin1', 'Admin1', 'admin1@admin.com', '$2y$10$9ai/idDMyIYmKVYFsc5m3OTVIdUUQA6eSaKW4HW.CTsh.PCy4KHrC', 1),
('charm', 'relator', 'charm@test.com', '$2y$10$.FH6Fy66t6VY.z9VDsVtMetWqbksJuEUC7w76s4oq8l1yTdEamR1C', 2),
('John', 'Doe', 'john@test.com', '$2y$10$NegK1.OdZ7IYmUP0lYuxMeZQPEus1ZnbrGMDcbEL1AUMM7qffCArG', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

DROP TABLE IF EXISTS `user_login`;
CREATE TABLE IF NOT EXISTS `user_login` (
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_logged_in` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
