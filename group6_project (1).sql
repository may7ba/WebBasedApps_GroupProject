-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2015 at 06:14 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `group6_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(25) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`customer_id`),
  UNIQUE KEY `customer_name` (`customer_name`),
  KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `username`, `password`) VALUES
(1, 'Ananth', 'ananth', 'msis'),
(2, 'mayank', 'mayank', '1234'),
(4, 'Ankur Maloo', 'ankur', '1234'),
(7, 'Jorge Vargas', 'jorge', '1234'),
(8, 'Max ', 'Max', 'asdf');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE IF NOT EXISTS `offers` (
  `offer` varchar(1000) NOT NULL,
  `vendor_id` int(20) unsigned NOT NULL,
  KEY `vendor_id` (`vendor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`offer`, `vendor_id`) VALUES
('Saturday offer - 50% off on pizzas on using VISA checkout', 1),
('Buy one get Garlic Bread and coke free Hurry!', 3),
('"Limited offer" buy $25 gift card and get free Pizza! ', 2),
('Monday to thursday carryout only large 3 topping pizza for $7.99!', 2),
('Hurry get one large and medium  pizza for $12.99', 3),
('Buy one large pizza and coke for $ 7.99 \r\noffer valid till 12/11', 1),
('choose any two medium pizza for 6.99', 4),
('choose any one large,one medium and coke for $13.99 ', 4),
('Buy any Large pizza and get small pizza free', 5),
('Buy any pizza and get another pizza free for $20.99', 5);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE IF NOT EXISTS `review` (
  `review_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `comment` varchar(5000) NOT NULL,
  `review_date` varchar(20) NOT NULL,
  `rating` int(10) NOT NULL,
  `customer_id` int(10) unsigned NOT NULL,
  `vendor_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`review_id`),
  KEY `review_id` (`review_id`),
  KEY `customer_id` (`customer_id`),
  KEY `vendor_id` (`vendor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `comment`, `review_date`, `rating`, `customer_id`, `vendor_id`) VALUES
(1, 'Awesome pizza', '2015-12-06', 8, 1, 1),
(3, 'awesome cheese', '2015-12-10', 10, 2, 1),
(4, 'Awesome pizza!!', '2015-10-24', 9, 1, 2),
(7, 'affordable pizzas - great on the pocket!!', '2015-03-04', 10, 2, 3),
(8, 'good one!', '2015-08-09', 7, 1, 4),
(9, 'cheese quality was not good.', '2015-04-08', 5, 2, 4),
(10, 'the super large pizza is some size!!!', '2015-05-07', 9, 1, 5),
(11, 'the pepperoni pizza was very tasty.', '2015-08-07', 9, 4, 5),
(12, 'Nice treat at affordable price', '2015-12-08', 8, 2, 1),
(13, 'wonderful service!', '2015-12-01', 8, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE IF NOT EXISTS `vendor` (
  `vendor_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `vendor_name` varchar(20) NOT NULL,
  `description` varchar(5000) NOT NULL,
  PRIMARY KEY (`vendor_id`),
  KEY `vendor_id` (`vendor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vendor_id`, `vendor_name`, `description`) VALUES
(1, 'Pizza Hut', 'Pizza Hut is an American restaurant chain and international franchise, known for pizza and side dishes. It is now corporately known as Pizza Hut, Inc. and is a subsidiary of Yum! Brands, Inc., the world''s largest restaurant company.'),
(2, 'Dominoes Pizza', 'Domino''s Pizza, Inc. is an American restaurant chain and international franchise pizza delivery corporation. Domino''s is the second-largest pizza chain in the United States and the largest worldwide, with more than 10,000 corporate and franchised stores in 70 countries.'),
(3, 'Papa John''s Pizza', 'Papa John''s Pizza is an American restaurant company. It runs the third largest take-out and pizza delivery restaurant chain in the world, with headquarters in Jefferson town, Kentucky, a suburb of Louisville.'),
(4, 'Pie Pizzeria', 'The Pie has been affectionately referred to as "the best hidden secret in Salt Lake City".  This small restaurant, located in the basement underneath the University Pharmacy, is out of sight with only one sign hidden behind a wall on 200 South 1320 East.  But with good food and prices, "word of mouth" keeps THE PIE one of the busiest restaurants in the university area.'),
(5, 'Little Caesars Pizza', 'Little Caesars Pizza has been proudly serving delicious products for over 50 years. We use the finest ingredients. Our dough is made fresh each day, and we use 100 percent mozzarella and Muenster cheese. Our world famous pizza sauce contains a secret blend of spices that our customers love.');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `offers_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`vendor_id`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`vendor_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
