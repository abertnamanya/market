-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2017 at 02:20 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `market`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Fruits'),
(2, 'Greens'),
(3, 'Dry foods'),
(4, 'perishables '),
(5, 'Cow products'),
(6, 'Kitchen Products');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` int(11) NOT NULL,
  `location` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `location`) VALUES
(1, 'Kigogi'),
(2, 'Muwajari'),
(3, 'Bunyoyi'),
(4, 'Makaga'),
(5, 'Rushoroza'),
(6, 'Kabale Town');

-- --------------------------------------------------------

--
-- Table structure for table `markets`
--

CREATE TABLE `markets` (
  `market_id` int(11) NOT NULL,
  `market_name` varchar(100) DEFAULT NULL,
  `location_location_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `markets`
--

INSERT INTO `markets` (`market_id`, `market_name`, `location_location_id`) VALUES
(1, 'Kabale central Market', 6),
(2, 'Muyajari market', 2),
(3, 'Kigogi fruits market', 1),
(4, 'Makaga Market', 4),
(5, 'Bunyoyi Market', 3);

-- --------------------------------------------------------

--
-- Table structure for table `mobile_users`
--

CREATE TABLE `mobile_users` (
  `user_id` int(11) NOT NULL,
  `firstName` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `_when_added` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobile_users`
--

INSERT INTO `mobile_users` (`user_id`, `firstName`, `lastName`, `contact`, `password`, `_when_added`) VALUES
(1, 'Namanya', 'Abert', '0754938667', 'abert', '2017-06-06'),
(2, 'Muranga', 'james', '0782469964', 'james', '2017-06-30'),
(5, 'Namanya', 'Allan', '0783821645', 'allan', '2017-07-06');

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `price_id` int(11) NOT NULL,
  `product_product_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `units` varchar(50) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `market_market_id` int(11) DEFAULT NULL,
  `time_stamp` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`price_id`, `product_product_id`, `quantity`, `units`, `price`, `market_market_id`, `time_stamp`) VALUES
(1, 6, 1, 'Kgs', 2800, 1, '2017-06-26'),
(4, 1, 1, 'Kgs', 1300, 2, '2017-06-26'),
(8, 2, 1, 'Trays', 9000, 1, '2017-07-01'),
(9, 1, 1, 'Kgs', 1300, 1, '2017-07-01'),
(10, 3, 1, 'Litres', 900, 1, '2017-07-01'),
(11, 4, 1, 'Kgs', 2300, 1, '2017-07-01'),
(12, 5, 2, 'Numbers', 3500, 1, '2017-07-01'),
(13, 6, 1, 'Cups', 750, 1, '2017-07-01'),
(14, 4, 1, 'Kgs', 4000, 5, '2017-07-05');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `category_category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `category_category_id`) VALUES
(1, 'Tomatoes', 4),
(2, 'Eggs', 6),
(3, 'Milk', 5),
(4, 'Beans', 3),
(5, 'Apples', 1),
(6, 'Maize', 3),
(7, 'Cabbages', 2),
(8, 'Egg plants', 2),
(9, 'Cow butter', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `firstName` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstName`, `lastName`, `contact`, `username`, `password`) VALUES
(6, 'TIIBASIIMA', 'JOHNBOSCO', '0706427461', 'john', '123456'),
(7, 'SAMAJERI', ' ANNNET', '0701634636', 'ANNNET', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `markets`
--
ALTER TABLE `markets`
  ADD PRIMARY KEY (`market_id`),
  ADD KEY `location_location_id` (`location_location_id`);

--
-- Indexes for table `mobile_users`
--
ALTER TABLE `mobile_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`price_id`),
  ADD KEY `product_product_id` (`product_product_id`),
  ADD KEY `market_market_id` (`market_market_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_category_id` (`category_category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `markets`
--
ALTER TABLE `markets`
  MODIFY `market_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `mobile_users`
--
ALTER TABLE `mobile_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `price_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `markets`
--
ALTER TABLE `markets`
  ADD CONSTRAINT `markets_ibfk_1` FOREIGN KEY (`location_location_id`) REFERENCES `location` (`location_id`);

--
-- Constraints for table `prices`
--
ALTER TABLE `prices`
  ADD CONSTRAINT `prices_ibfk_1` FOREIGN KEY (`product_product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `prices_ibfk_2` FOREIGN KEY (`market_market_id`) REFERENCES `markets` (`market_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_category_id`) REFERENCES `categories` (`category_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
