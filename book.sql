-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 11, 2022 at 08:54 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `bookid` int(11) NOT NULL,
  `bookName` varchar(256) NOT NULL,
  `bookAbout` varchar(2000) NOT NULL,
  `bookGenre` varchar(256) NOT NULL,
  `bookImage` varchar(256) NOT NULL,
  `bookLocation` varchar(256) NOT NULL,
  `bookRating` decimal(10,1) NOT NULL,
  `bookPrice` int(11) NOT NULL,
  `bookAuthor` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `bookid`, `bookName`, `bookAbout`, `bookGenre`, `bookImage`, `bookLocation`, `bookRating`, `bookPrice`, `bookAuthor`) VALUES
(1, 1, 'Northern Lights', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec et ex egestas, ultricies nunc ut, scelerisque lorem. Cras laoreet lacus vel tellus semper semper. Quisque diam lorem, ultrices eget leo in, mattis dignissim elit. Donec semper ligula elit, scelerisque interdum arcu tincidunt non. Vivamus elementum consequat elit, sit amet dignissim mauris feugiat eu. Donec ac libero lacus. Phasellus aliquam urna sed congue vulputate. Maecenas sed diam eros. Proin bibendum turpis quis interdum interdum. Phasellus venenatis arcu sed volutpat maximus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vivamus tempor aliquam tellus, in volutpat ipsum condimentum quis. Nullam ut diam varius, blandit enim vitae, porttitor lectus.', 'Adventure', 'bookImages/hdm.jpg', 'bookPDF/resume.pdf', '4.2', 100, 'Soumit Das'),
(2, 2, 'Journey to the Center of the Earth', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec et ex egestas, ultricies nunc ut, scelerisque lorem. Cras laoreet lacus vel tellus semper semper. Quisque diam lorem, ultrices eget leo in, mattis dignissim elit. Donec semper ligula elit, scelerisque interdum arcu tincidunt non. Vivamus elementum consequat elit, sit amet dignissim mauris feugiat eu. Donec ac libero lacus. Phasellus aliquam urna sed congue vulputate. Maecenas sed diam eros. Proin bibendum turpis quis interdum interdum. Phasellus venenatis arcu sed volutpat maximus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vivamus tempor aliquam tellus, in volutpat ipsum condimentum quis. Nullam ut diam varius, blandit enim vitae, porttitor lectus.', 'Adventure', 'bookImages/jttce.jpg', 'bookPDF/resume.pdf', '3.2', 200, 'Soumit Das'),
(3, 3, 'His Dark Materials', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec et ex egestas, ultricies nunc ut, scelerisque lorem. Cras laoreet lacus vel tellus semper semper. Quisque diam lorem, ultrices eget leo in, mattis dignissim elit. Donec semper ligula elit, scelerisque interdum arcu tincidunt non. Vivamus elementum consequat elit, sit amet dignissim mauris feugiat eu. Donec ac libero lacus. Phasellus aliquam urna sed congue vulputate. Maecenas sed diam eros. Proin bibendum turpis quis interdum interdum. Phasellus venenatis arcu sed volutpat maximus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vivamus tempor aliquam tellus, in volutpat ipsum condimentum quis. Nullam ut diam varius, blandit enim vitae, porttitor lectus.', 'Adventure', 'bookImages/nl.jpg', 'bookPDF/resume.pdf', '1.2', 130, 'Soumit Das'),
(4, 4, 'Treasure Island', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec et ex egestas, ultricies nunc ut, scelerisque lorem. Cras laoreet lacus vel tellus semper semper. Quisque diam lorem, ultrices eget leo in, mattis dignissim elit. Donec semper ligula elit, scelerisque interdum arcu tincidunt non. Vivamus elementum consequat elit, sit amet dignissim mauris feugiat eu. Donec ac libero lacus. Phasellus aliquam urna sed congue vulputate. Maecenas sed diam eros. Proin bibendum turpis quis interdum interdum. Phasellus venenatis arcu sed volutpat maximus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vivamus tempor aliquam tellus, in volutpat ipsum condimentum quis. Nullam ut diam varius, blandit enim vitae, porttitor lectus.', 'Adventure', 'bookImages/treasure.jpg', 'bookPDF/resume.pdf', '2.3', 500, 'Soumit Das');

-- --------------------------------------------------------

--
-- Table structure for table `planPurchase`
--

CREATE TABLE `planPurchase` (
  `id` int(11) NOT NULL,
  `userid` varchar(256) NOT NULL,
  `planid` varchar(256) NOT NULL,
  `fromPlan` int(11) NOT NULL,
  `toPlan` int(11) NOT NULL,
  `razorpay_payment_id` varchar(256) DEFAULT NULL,
  `razorpay_order_id` varchar(256) DEFAULT NULL,
  `razorpay_signature` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `purchaseHistory`
--

CREATE TABLE `purchaseHistory` (
  `id` int(11) NOT NULL,
  `purchaseid` varchar(256) NOT NULL,
  `userid` varchar(256) NOT NULL,
  `bookid` varchar(256) NOT NULL,
  `fromDate` date NOT NULL,
  `toDate` date NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `link` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userid` varchar(256) NOT NULL,
  `type` int(11) NOT NULL DEFAULT 1,
  `firstName` varchar(256) NOT NULL,
  `lastName` varchar(256) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `plan` int(11) NOT NULL DEFAULT 1,
  `planStart` date DEFAULT NULL,
  `planEnd` date DEFAULT NULL,
  `used` int(11) NOT NULL DEFAULT 0,
  `limit` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userid`, `type`, `firstName`, `lastName`, `username`, `password`, `plan`, `planStart`, `planEnd`, `used`, `limit`) VALUES
(1, 'admin', 1, 'Soumit', 'Das', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, '2022-08-10', '2022-09-09', 0, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `planPurchase`
--
ALTER TABLE `planPurchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchaseHistory`
--
ALTER TABLE `purchaseHistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `planPurchase`
--
ALTER TABLE `planPurchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchaseHistory`
--
ALTER TABLE `purchaseHistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
