-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2023 at 10:49 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uit_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brand_id` int(11) NOT NULL,
  `cartegory_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `cartegory_id`, `brand_name`) VALUES
(7, 1, 'UNOFF'),
(8, 3, 'DEMO');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cartegory`
--

CREATE TABLE `tbl_cartegory` (
  `cartegory_id` int(11) NOT NULL,
  `cartegory_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_cartegory`
--

INSERT INTO `tbl_cartegory` (`cartegory_id`, `cartegory_name`) VALUES
(1, 'Thiết bị điện tử'),
(2, 'Giáo trình'),
(3, 'Quần áo');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_giohang`
--

CREATE TABLE `tbl_giohang` (
  `id_cart` int(9) NOT NULL,
  `id_dh` int(9) NOT NULL,
  `id_product` int(9) NOT NULL,
  `soluong` int(9) NOT NULL,
  `dongia` varchar(50) NOT NULL DEFAULT '0',
  `name_product` varchar(50) DEFAULT NULL,
  `product_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_giohang`
--

INSERT INTO `tbl_giohang` (`id_cart`, `id_dh`, `id_product`, `soluong`, `dongia`, `name_product`, `product_img`) VALUES
(152, 124, 15, 1, '1.500.000', 'Áo MBAPPE', 'giaotrinh1.png'),
(155, 126, 11, 1, '1.500.000', 'Giáo trình Lập trình Web', 'giaotrinh2.png'),
(156, 126, 16, 1, '1.500.000', 'Tai nghe airpod ', 'airpod.png'),
(160, 130, 15, 1, '1.500.000', 'Giáo Trình Tư Tưởng Hồ Chí Minh', 'giaotrinh1.png'),
(162, 132, 16, 1, '1.500.000', 'Tai nghe Airpod', 'airpod.png'),
(163, 133, 18, 1, '14.000', 'Áo UIT', 'aouit.png'),
(164, 134, 15, 1, '1.500.000', 'Giáo Trình Tư Tưởng Hồ Chí Minh', 'giaotrinh1.png'),
(165, 135, 18, 1, '14.000', 'Áo UIT', 'aouit.png'),
(166, 136, 16, 1, '1.500.000', 'Tai nghe Airpod', 'airpod.png'),
(167, 137, 17, 1, '1.400.000', 'DEMO', 'color.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id_dh` int(9) NOT NULL,
  `madh` varchar(20) NOT NULL,
  `tongdonhang` double(10,0) DEFAULT 0,
  `pttt` varchar(25) NOT NULL,
  `user_id` int(5) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `tinhtrang` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id_dh`, `madh`, `tongdonhang`, `pttt`, `user_id`, `fullname`, `address`, `email`, `phone`, `tinhtrang`) VALUES
(134, 'UIT381606', 1300000, 'momoPayment', 16, 'phố', 'UIT ', 'test@gmail.com', '0869284482', 1),
(135, 'UIT456991', 0, 'momoPayment', 16, 'phố', 'UIT ', 'test@gmail.com', '0869284482', 1),
(136, 'UIT159167', 1300000, 'momoPayment', 16, 'phố', 'UIT ', 'test@gmail.com', '0869284482', 1),
(137, 'UIT478137', 1200000, 'momoPayment', 25, 'pho', 'uit', 'phampho1103@gmail.com', '0987654321', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `cartegory_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_price_new` varchar(255) NOT NULL,
  `product_desc` varchar(5000) NOT NULL,
  `product_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `cartegory_id`, `brand_id`, `product_price`, `product_price_new`, `product_desc`, `product_img`) VALUES
(11, 'Giáo Trình Lập trình Web', 1, 7, '1.500.000', '1.500.000', 'Giáo trình', 'giaotrinh2.png'),
(12, 'Balo UIT *Limited Version*', 1, 7, '1.500.000', '1.500.000', 'Balo UIT', 'balouit.png'),
(15, 'Giáo Trình Tư Tưởng Hồ Chí Minh', 1, 7, '1.500.000', '1.500.000', 'Giáo trình ', 'giaotrinh1.png'),
(16, 'Tai nghe Airpod', 1, 7, '1.500.000', '1.500.000', 'Airpod', 'airpod.png'),
(17, 'DEMO', 3, 8, '1.500.000', '1.400.000', 'DEMO SẢN PHẨM', 'color.jpg'),
(18, 'Áo UIT', 3, 8, '15.000', '14.000', 'Áo uit', 'aouit.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_img_desc`
--

CREATE TABLE `tbl_product_img_desc` (
  `product_id` int(11) NOT NULL,
  `product_img_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product_img_desc`
--

INSERT INTO `tbl_product_img_desc` (`product_id`, `product_img_desc`) VALUES
(15, 'giaotrinh1.png'),
(12, 'balouit.png'),
(17, 'color.jpg'),
(11, 'giaotrinh2.png'),
(16, 'airpod.png'),
(18, 'aouit.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` tinyint(1) DEFAULT 0,
  `fullname` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `role`, `fullname`, `address`, `age`, `phone`) VALUES
(15, '21522456', 'uit', '21522456@gmail.com', 1, 'ADMIN', ' HCM', 20, '0123456789'),
(16, 'phampho', '123456', 'test@gmail.com', 0, 'phố', 'UIT ', 21, '0869284482'),
(25, 'phamphotest', '123456', 'phampho1103@gmail.com', 0, 'pho', 'uit', 1, '0987654321');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `tbl_cartegory`
--
ALTER TABLE `tbl_cartegory`
  ADD PRIMARY KEY (`cartegory_id`);

--
-- Indexes for table `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id_dh`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_cartegory`
--
ALTER TABLE `tbl_cartegory`
  MODIFY `cartegory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  MODIFY `id_cart` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id_dh` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
