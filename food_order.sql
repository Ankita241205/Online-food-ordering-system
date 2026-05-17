-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: May 09, 2026 at 03:14 PM
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
-- Database: `food_order`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `food` varchar(255) NOT NULL,
  `payment` varchar(50) NOT NULL,
  `status` varchar(50) DEFAULT 'Preparing'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ID`, `name`, `phone`, `address`, `food`, `payment`, `status`) VALUES
(1, 'Ankita', '456', 'Pune\r\n', 'Burger, Pasta', 'Pending', 'Out for Delivery'),
(2, 'Pranita ', '123', 'Nigdi', 'Pasta, Pizza', 'Pending', 'Delivered'),
(3, 'Rohit', '234', 'Bhosari', 'Pasta', 'Paid', 'Out for Delivery'),
(4, 'Aditya', '765', 'Nashik', 'Pasta, Burger, Pizza', 'Paid', 'Preparing'),
(5, 'Rahul', '864', 'Mumbai', 'Burger', 'COD', 'Preparing'),
(6, 'Rahul', '864', 'Mumbai', 'Pizza', 'Online', 'Preparing'),
(7, 'Akash', '879', 'Pune\r\n', 'Burger', 'COD', 'Out for Delivery'),
(8, 'Sameer', '123456', 'Chinchwad', 'Burger, Pasta, Pizza', 'Paid', 'Preparing'),
(14, 'Gauri', '746', 'Pune', 'Pizza (x1)', 'Paid', 'Delivered'),
(15, 'Gauri', '746', 'Pune', 'Pizza (x1)', 'Paid', 'Delivered');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
