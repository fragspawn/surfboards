-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2015 at 09:22 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `surfboards`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `CategoryID` int(11) NOT NULL,
  `CategoryLabel` varchar(256) NOT NULL,
  `CategoryDesc` text NOT NULL,
  `CategoryImage` varchar(256) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryID`, `CategoryLabel`, `CategoryDesc`, `CategoryImage`) VALUES
(1, 'Surfboards', 'Surfboards for beginners to advanced', 'category_01.jpg'),
(2, 'Wetsuits', 'Adult wetsuits for women and men', 'category_02.jpg'),
(3, 'Swimwear', 'Adult swimwear for women and men', 'category_03.jpg'),
(4, 'Accessories', 'Accessories for the surfing lifestyle', 'category_04.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `CustomerID` int(11) NOT NULL,
  `CustomerName` varchar(512) NOT NULL,
  `CustomerEmail` varchar(512) NOT NULL,
  `CustomerPhone` varchar(64) NOT NULL,
  `CustomerStreet` varchar(512) NOT NULL,
  `CustomerSuburb` varchar(256) NOT NULL,
  `CustomerCity` varchar(256) NOT NULL,
  `CustomerState` varchar(3) NOT NULL,
  `CustomerUName` varchar(16) NOT NULL,
  `CustomerPWord` varchar(64) NOT NULL,
  `CustomerPcode` varchar(4) NOT NULL,
  `IsAdmin` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerID`, `CustomerName`, `CustomerEmail`, `CustomerPhone`, `CustomerStreet`, `CustomerSuburb`, `CustomerCity`, `CustomerState`, `CustomerUName`, `CustomerPWord`, `CustomerPcode`, `IsAdmin`) VALUES
(1, 'admin', 'test@test.com', '3825 7865', '10 Little Street', 'Southbank', 'Brisbane', 'Qld', 'admin', '584/8.WnbtLH.', '4000', 1),
(6, 'qwer qwer', 'asdf@asdf.com', '123412341234', '1234 foobar st', 'Chermside', '', '', 'asdfasdf', '58hW3K.SSFY4A', '4056', 0);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
  `InvoiceID` int(11) NOT NULL,
  `InvoiceCustomerID` int(11) NOT NULL,
  `InvoiceDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`InvoiceID`, `InvoiceCustomerID`, `InvoiceDate`) VALUES
(4, 6, '2015-11-11 20:15:44');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_item`
--

CREATE TABLE IF NOT EXISTS `invoice_item` (
  `InvItemID` int(11) NOT NULL,
  `InvItemInvoiceID` int(11) NOT NULL,
  `InvItemItemID` int(11) NOT NULL,
  `InvItemQty` int(11) NOT NULL,
  `InvItemTotalPrice` float(10,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoice_item`
--

INSERT INTO `invoice_item` (`InvItemID`, `InvItemInvoiceID`, `InvItemItemID`, `InvItemQty`, `InvItemTotalPrice`) VALUES
(4, 4, 9, 2, 199.90),
(5, 4, 10, 1, 210.00);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `ItemID` int(11) NOT NULL,
  `ItemCategoryID` int(11) NOT NULL,
  `ItemName` varchar(256) NOT NULL,
  `ItemDesc` text NOT NULL,
  `ItemPrice` decimal(10,2) NOT NULL,
  `ItemImage` varchar(256) NOT NULL,
  `ItemLastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`ItemID`, `ItemCategoryID`, `ItemName`, `ItemDesc`, `ItemPrice`, `ItemImage`, `ItemLastUpdate`) VALUES
(1, 1, 'Chilli Peppa Surfboard', 'Enjoy a little piece of Chilli! A small wave surfboard that features clear colour. Fins included. This board has paddle power and stability for all levels of surfing. Suits beginner to advanced.', '850.00', 'product_01.jpg', '2015-10-19 05:48:07'),
(2, 1, 'Supa Fish Pro Surfboard', 'A hybrid surfboard constructed from the latest material and delivers unrivalled performance in the water. Features a clear coating. Fins not included. The moderate curve out the tail keeps the board responsive when driving off your boot foot. Suits beginner to advanced.', '920.00', 'product_02.jpg', '2015-10-19 05:52:48'),
(3, 1, 'Catch Surf Odysea Surfboard', 'A high performance surfboard with durable graphic slick bottom. White acrylic spray construction. Versatile for surfers who want to take their good wave performance to the next level. Suits beginner to intermediate.', '395.00', 'product_03.jpg', '2015-10-19 05:52:48'),
(4, 1, 'DHD Stab in the Dark Surfboard', 'Stab invited the best shapers in the world to create this surfboard. The moment you stand on it you will feel the quality. It is the ultimate surfboard. Features clear colour and optional fins. Suits beginner to advanced.', '860.00', 'product_04.jpg', '2015-10-19 05:53:41'),
(5, 2, 'Billabong Revolution Sport 2MM Wetsuit', 'Mens long sleeve black wetsuit. Back zip entry. Made from 80% nylon and 20% elastane. 2mm thickness.', '290.00', 'product_05.jpg', '2015-10-19 05:53:41'),
(6, 2, 'Quicksilver Modern Originals 2MM Wetsuit', 'Mens short sleeve blue/black wetsuit. Zipperless entry with shoulder strap. Made from 92% nylon/polyamide and 8% elastane. 2mm thickness.', '180.00', 'product_06.jpg', '2015-10-19 05:55:01'),
(7, 3, 'Captain Fin Co. Boardshort', 'Mens above the knee black boardshort. Tie at waist. Made from 100% polyester with a fitted waistband. Zip pocket on outside hem of right leg.', '69.95', 'product_07.jpg', '2015-10-19 05:55:01'),
(8, 3, 'Minkpink Moroccan Holiday Bikini', 'Ladies multi-coloured bikini. Made from 80 polyamide and 20% elastane. All-over Moroccan inspired print. Adjustable and removable straps included.', '90.00', 'product_08.jpg', '2015-10-19 05:56:16'),
(9, 4, 'Pendleton Oversized Beach Towel', 'A luxurious soft oversized beach towel. Summer inspired multi-coloured design. Made from 100% cotton. Looped on one side for superior absorption.', '99.95', 'product_09.jpg', '2015-10-19 05:56:16'),
(10, 4, 'Ray-Ban Aviator Sunglasses', 'Stylish aviator sunglasses in arista brown. Featuring a metal frame and stainless steel hinges with 100% UV protection. Case included.', '210.00', 'product_10.jpg', '2015-10-19 05:56:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`InvoiceID`), ADD KEY `InvoiceCustomerID` (`InvoiceCustomerID`);

--
-- Indexes for table `invoice_item`
--
ALTER TABLE `invoice_item`
  ADD PRIMARY KEY (`InvItemID`), ADD KEY `InvItemInvoiceID` (`InvItemInvoiceID`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`ItemID`), ADD KEY `ItemCategoryID` (`ItemCategoryID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `InvoiceID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `invoice_item`
--
ALTER TABLE `invoice_item`
  MODIFY `InvItemID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `ItemID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`InvoiceCustomerID`) REFERENCES `customer` (`CustomerID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invoice_item`
--
ALTER TABLE `invoice_item`
ADD CONSTRAINT `invoice_item_ibfk_1` FOREIGN KEY (`InvItemInvoiceID`) REFERENCES `invoice` (`InvoiceID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `invoice_item_ibfk_2` FOREIGN KEY (`InvItemItemID`) REFERENCES `item` (`ItemID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item`
--
ALTER TABLE `item`
ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`ItemCategoryID`) REFERENCES `category` (`CategoryID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
