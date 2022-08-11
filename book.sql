-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 11, 2022 at 07:54 PM
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
  `bookid` varchar(256) NOT NULL,
  `bookName` varchar(256) NOT NULL,
  `bookAbout` varchar(2000) NOT NULL,
  `bookGenre` varchar(256) NOT NULL,
  `bookImage` varchar(256) NOT NULL,
  `bookLocation` varchar(256) NOT NULL,
  `bookRating` decimal(10,1) NOT NULL,
  `bookPrice` int(11) NOT NULL,
  `bookAuthor` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `link` varchar(256) NOT NULL,
  `author` varchar(256) NOT NULL
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
(1, 'admin', 1, 'Soumit', 'Das', 'reader', '1de9b0a30075ae8c303eb420c103c320', 1, '2022-08-10', '2022-09-09', 5, 2),
(2, 'admin2', 2, 'Soumit', 'Das', 'author', '02bd92faa38aaa6cc0ea75e59937a1ef', 1, '2022-08-11', '2022-09-10', 0, 2);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
