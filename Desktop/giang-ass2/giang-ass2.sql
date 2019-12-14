-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2019 at 11:05 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `giang-ass2`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `trn_date` datetime NOT NULL,
  `submittedby` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `trn_date`, `submittedby`) VALUES
(2, 'Acohol', 'something you can drink                                        ', '2019-10-14 05:48:57', 'admin'),
(3, 'Fast Food', 'something like: fried chicken, french fries, onion rings, chicken nuggets, tacos, pizza, hot dogs, and ice cream                                                                                        ', '2019-10-14 11:36:59', 'admin'),
(4, 'Launch', 'for lunch                    ', '2019-10-14 20:15:06', 'admin'),
(5, 'Traditional', 'Traditional foods are foods and dishes that are passed through generations or which have been consumed many generations.', '2019-10-14 20:15:21', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `new_record`
--

CREATE TABLE `new_record` (
  `id` int(11) NOT NULL,
  `trn_date` datetime NOT NULL,
  `name` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `submittedby` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `new_record`
--

INSERT INTO `new_record` (`id`, `trn_date`, `name`, `age`, `submittedby`) VALUES
(1, '2019-10-02 09:37:42', '12', 21, 'abc'),
(2, '2019-10-07 11:15:00', 'giang', 20, 'abc');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `trn_date` datetime NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `submittedby` varchar(50) NOT NULL,
  `categoryId` int(11) NOT NULL DEFAULT 1,
  `image` varchar(300) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `trn_date`, `name`, `description`, `submittedby`, `categoryId`, `image`, `price`) VALUES
(4, '2019-10-14 11:28:27', 'bun cha', 'Bun cha hanoi', 'admin', 3, 'https://157212-453144-1-raikfcquaxqncofqfm.stackpathdns.com/wp-content/uploads/2019/01/bun-cha-31.jpg', 0),
(5, '2019-10-14 09:22:57', 'Luong kho', 'Luong kho bay', 'admin', 2, 'https://www.lic-ecogreen.com.vn/public/frontend/uploads/kceditor/images/an%20luong%20kho%20co%20beo%20khong.jpg', 0),
(8, '2019-10-14 11:37:18', 'Banh Mi', 'banh mi ha noi', 'admin', 3, 'https://www.happyfoodstube.com/wp-content/uploads/2018/08/vietnamese-sandwich-banh-mi-image-500x500.jpg', 0),
(9, '2019-10-14 12:02:25', 'Gao Lut', 'gao trang', 'admin', 4, 'https://cdn02.static-adayroi.com/0/2019/03/26/1553571799167_5459235.jpg', 0),
(14, '2019-10-14 12:05:12', 'Dau phu', 'tofu', 'admin', 4, 'https://deptuoi30.com/wp-content/uploads/2018/04/an-dau-phu-giam-can-6.png', 0),
(16, '2019-10-14 22:24:07', 'dsa', 'dfdas', 'admin', 4, 'adsf', 12),
(17, '2019-10-14 22:27:01', 'fdsa', 'fdsa', 'admin', 0, 'fdsa', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `trn_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `trn_date`) VALUES
(1, 'abc', 'abc@gmail.com', '202cb962ac59075b964b07152d234b70', '2019-10-02 09:17:37'),
(3, 'gia', 'gia@gmail.com', '202cb962ac59075b964b07152d234b70', '2019-10-08 15:47:16'),
(4, 'hoang', 'hoang@gmail.com', 'ac62ed7e7335ff1d1a725a1388b153ec', '2019-10-13 06:22:01'),
(5, 'user', 'user@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', '2019-10-13 09:21:18'),
(6, 'user', 'user@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', '2019-10-13 09:36:39'),
(7, 'test', 'test@gmail.com', 'e9f5713dec55d727bb35392cec6190ce', '2019-10-13 09:57:08'),
(8, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2019-10-13 10:00:47'),
(9, 'test', 'test@gmail.com', '098f6bcd4621d373cade4e832627b4f6', '2019-10-14 12:33:00'),
(10, 'test', 'test@gmail.com', '098f6bcd4621d373cade4e832627b4f6', '2019-10-14 22:01:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
