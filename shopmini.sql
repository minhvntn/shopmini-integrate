-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2017 at 09:09 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopmini`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `username` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(3, 'user', '123');

-- --------------------------------------------------------

--
-- Table structure for table `ci_cookies`
--

CREATE TABLE `ci_cookies` (
  `id` int(11) NOT NULL,
  `cookie_id` varchar(255) DEFAULT NULL,
  `netid` varchar(255) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `orig_page_requested` varchar(120) DEFAULT NULL,
  `php_session_id` varchar(40) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `ProductID` int(10) NOT NULL,
  `Name` varchar(250) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Status` tinyint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`ProductID`, `Name`, `Status`) VALUES
(12, 'casxcxcx', 0),
(15, '3333333333333333', 0),
(16, 'dfdxxxxxxxxxxxxxxxxx', 0);

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `orderid` int(11) NOT NULL,
  `dateorder` date NOT NULL,
  `username` varchar(250) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `address` varchar(250) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(250) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `note` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`orderid`, `dateorder`, `username`, `phone`, `address`, `email`, `status`, `note`, `amount`) VALUES
(1, '2017-05-21', 'asdad', '21313', 'sadas', 'huylv.87@gmail.com', 0, '', 73905),
(2, '2017-05-20', 'xxxxxxxxxx', '23123213', 'xxxxaas', 'blacksky_gt@yahoo.comas', 0, 'assadasd', 74028),
(3, '0000-00-00', 'xcx', '234234', 'xcxc', 'asdasd@dasd.sds', 0, 'fdf', 74151),
(4, '2017-05-20', 'xcx', '23423423232323', 'xcxc', 'asdasd@dasd.sds', 0, 'fdf', 74151),
(5, '2017-05-21', 'xcx', '23423423232323', 'xcxc', 'asdasd@dasd.sds', 0, 'fdf', 74151),
(6, '2017-05-20', 'xcx', '23423423232323', 'xcxc', 'asdasd@dasd.sds', 0, 'fdf', 74151),
(7, '2017-05-20', 'conca', '123214', 'asdads', 'sdfsdfdsfoooooooooooooooooooooooooooooo@asd.asd', 0, 'asdsad', 74274),
(8, '2017-05-21', 'asda', '21313', 'asdad', 'huylv.87@gmail.com', 0, 'sdfdsfdsf', 234),
(9, '2017-05-21', 'minh', '12321313', 'asdas', 'miasndai@asdsa.asda', 0, 'asdwdasd', 936),
(10, '2017-05-21', 'cccccccccccc', '234324', '343', '2342@asd.asd', 0, '21323', 234),
(11, '2017-05-21', 'xxxxxxxxxx', 'assad', '12323', 'asdsa@asd.asd', 0, 'asdsd', 234),
(12, '2017-05-21', 'asdasda', '313', '1323', 'asdasd@dasd.sds', 0, 'sds', 234);

-- --------------------------------------------------------

--
-- Table structure for table `donhangchitiet`
--

CREATE TABLE `donhangchitiet` (
  `orderdetailid` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `donhangchitiet`
--

INSERT INTO `donhangchitiet` (`orderdetailid`, `orderid`, `name`, `price`, `quantity`) VALUES
(1, 7, 'asdasdccccccccccccccccccccccccccccccccc', 12312, 3),
(2, 7, 'asdadasdsssssssssssssssssssssssss', 12323, 3),
(3, 7, 'ttttt', 123, 3),
(4, 8, 'sdfdsf', 234, 1),
(5, 9, 'sdfdsf', 234, 4),
(6, 10, 'sdfdsf', 234, 1),
(7, 11, 'ASDSADasd', 234, 1),
(8, 12, 'ASDSADasd', 234, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `ItemID` int(10) NOT NULL,
  `ProductID` int(10) NOT NULL,
  `Name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ItemLogo` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ItemPhoto` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ItemThumbnail` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Price` double NOT NULL,
  `PriceAfterSale` double NOT NULL,
  `SalePercent` int(10) NOT NULL,
  `Quantity` int(10) NOT NULL,
  `SoleQuantity` int(10) NOT NULL,
  `OrderQuantity` int(10) NOT NULL,
  `Status` int(10) NOT NULL,
  `created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`ItemID`, `ProductID`, `Name`, `Description`, `ItemLogo`, `ItemPhoto`, `ItemThumbnail`, `Price`, `PriceAfterSale`, `SalePercent`, `Quantity`, `SoleQuantity`, `OrderQuantity`, `Status`, `created`) VALUES
(19, 15, 'ASDSADasd', 'sadas', '', 'moo2.png', '[]', 234, 234324, 20, 423, 0, 0, 0, 1495359434),
(20, 15, 'sdfdsf', 'sddf', '', '', '[]', 234, 234, 20, 3234, 0, 0, 0, 2017),
(21, 15, 'dfgfdg', 'dfgdf', '', 'plan.png', '[]', 324, 434, 20, 53, 0, 0, 0, 2017),
(22, 15, 'fdgdfgd', 'fgdfdg', '', '', '[\"rss.png\"]', 43, 433, 20, 22, 0, 0, 0, 2017);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `ci_cookies`
--
ALTER TABLE `ci_cookies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `donhangchitiet`
--
ALTER TABLE `donhangchitiet`
  ADD PRIMARY KEY (`orderdetailid`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`ItemID`),
  ADD KEY `sanpham_ibfk_1` (`ProductID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ci_cookies`
--
ALTER TABLE `ci_cookies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `ProductID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `donhangchitiet`
--
ALTER TABLE `donhangchitiet`
  MODIFY `orderdetailid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `ItemID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
