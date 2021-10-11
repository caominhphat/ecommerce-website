-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2021 at 11:26 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `caophatemarket`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminEmail` varchar(150) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminPass` varchar(255) NOT NULL,
  `level` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminEmail`, `adminUser`, `adminPass`, `level`) VALUES
(1, 'caominhphat', 'caophat@gmail.com', 'phatadmin', 'e10adc3949ba59abbe56e057f20f883e', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandId` int(11) UNSIGNED NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandId`, `brandName`) VALUES
(3, 'Samsung'),
(4, 'Apple'),
(5, 'Oppo'),
(8, 'Huawei'),
(15, 'Dell'),
(18, 'Sony'),
(20, 'JBL'),
(21, 'Nikon'),
(22, 'Xiaomi'),
(23, 'MSI');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `sId` varchar(255) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartId`, `productId`, `sId`, `productName`, `price`, `quantity`, `image`) VALUES
(558, 72, '7ntgf3g0imhln1ejf1hasppq2j', 'Iphone 12 Pro Max ', '15000000', 1, 'dd983bcc4b.jpg'),
(559, 40, '7ntgf3g0imhln1ejf1hasppq2j', 'Nova 2i ', '2500000', 1, '07e2d62106.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catId` int(11) UNSIGNED NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`) VALUES
(23, 'Máy ảnh'),
(24, 'Điện Thoại'),
(25, 'Speaker'),
(26, 'Laptop'),
(28, 'Màn hình máy tính'),
(30, 'Thiết bị điện tử gia dụng');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_comment`
--

INSERT INTO `tbl_comment` (`id`, `product_id`, `customer_id`, `comment`, `status`) VALUES
(75, 67, 21, 'This is awesome!', 1),
(76, 67, 21, 'hello', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `address`, `phone`, `email`, `password`) VALUES
(21, 'Cao Tien Dat', '123', '0938650355', 'truongtruclinh23@gmail.com', '123456Aa!');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `ProductName` varchar(255) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date_order` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `productId`, `ProductName`, `customer_id`, `quantity`, `price`, `image`, `date_order`, `status`) VALUES
(198, 69, 'Huawei Nova 5T ', 21, 3, '4950000', '9bacc7eb0c.jpg', '2021-08-02 03:55:49', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `catId` int(11) UNSIGNED NOT NULL,
  `brandId` int(11) UNSIGNED NOT NULL,
  `product_desc` text NOT NULL,
  `type` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `catId`, `brandId`, `product_desc`, `type`, `price`, `image`) VALUES
(39, 'SS Galaxy A15 ', 24, 3, '<p>New 100%, Full box</p>', 1, '4500000', 'd8f92b62ea.jpg'),
(40, 'Nova 2i ', 24, 8, '<p>New 100%, Full box</p>', 1, '2500000', '07e2d62106.jpg'),
(41, 'HW Y9 ', 24, 8, '<p>Arrival</p>', 1, '3000000', '2561af9c44.jpg'),
(42, 'Galaxy Note 20 ', 24, 3, '<p>New 100%</p>', 0, '1500000', 'bc7946ce10.jpg'),
(43, 'Dell Vosto ', 26, 15, '<p>New 100%, Nguy&ecirc;n Seal</p>', 1, '10000000', 'f4ebaca6aa.png'),
(44, 'Dell Inspriron ', 26, 15, '<p>New 100%</p>', 1, '9000000', 'c6fb0433ca.jpg'),
(45, 'Oppo A15 ', 24, 5, '<p>New 100%, Hot deal</p>', 1, '4500000', '962d0d9b79.jpg'),
(46, 'JBL 215 ', 25, 20, '<p>Full box, hot deal</p>', 0, '2000000', '78d8316fe4.jpg'),
(47, 'JBL Bluetooth Go 3  ', 25, 20, '<p>Like new 99%</p>', 1, '4000000', '6adb033a27.jpg'),
(48, ' Oppo A3S ', 24, 5, '<p>New arrival</p>', 1, '7500000', 'd58d54648f.jpg'),
(49, 'JBL Extreme 2 ', 25, 20, '<p>Hot deal</p>', 0, '500000', '0705528595.png'),
(50, 'SS LCD Gaming ', 28, 3, '<p>Full box</p>', 0, '5000000', '31391ba8d7.jpg'),
(51, 'Ipad Air 2 ', 24, 4, '<p>Like new 99%, hot deal</p>', 1, '6000000', '4a806c3410.jpg'),
(52, 'Airpod 2 ', 25, 4, '<p>New 100%</p>', 0, '2000000', 'f7b3a06b0c.jpg'),
(53, 'Dell Gaming X20 ', 28, 15, '<p>Like new 99%, full box</p>', 0, '9000000', '2c51c471e7.jpg'),
(54, 'Nikon E30 ', 23, 21, '<p>New Arrival</p>', 0, '1500000', '689f4baa6d.jpg'),
(55, 'Sony Flash X2 ', 23, 18, '<p>Full box 100%</p>', 1, '9000000', '84fe2d8cc2.png'),
(56, 'Xiaomi Air 2 SE ', 25, 22, '<p>Like new 99%, full box</p>', 1, '1000000', '50bec1556e.jpg'),
(57, 'Xiaomi Mi 11 ', 24, 22, '<p>Hot deal</p>', 0, '7500000', '4a106725ed.jpg'),
(58, 'Sạc không dây Xiaomi E20 ', 30, 22, '<p>New 100%</p>', 0, '500000', '737468d2cd.jpg'),
(60, 'Nikon Coolpix  ', 23, 21, '<p>New 100%, hot deal</p>', 0, '3500000', '4016623b28.jpg'),
(61, 'Nikon J7', 23, 21, '<p>Like new 99%</p>', 1, '5500000', 'be240f45c9.jpeg'),
(62, 'Nikon J5 ', 23, 21, '<p>New 100%</p>', 0, '7500000', '907ea2dd67.jpg'),
(63, 'JBL Partybox X100 ', 25, 20, '<p>Hot deal</p>', 1, '9000000', '0dc3716737.jpg'),
(64, 'Sony Bluetooth XB10 ', 25, 18, '<p>Like new 99%</p>', 0, '500000', 'b03a37e03d.jpg'),
(65, 'Sony ZX310AP ', 25, 18, '<p>Hot deal</p>', 0, '7500000', '6ee7cadb21.jpg'),
(67, 'Dell Latitude X3600 ', 26, 15, '<p>Like new 99%</p>', 0, '9000000', '79eb54c273.jpg'),
(68, 'Huawei T10S ', 24, 8, '<p>Hot deal&nbsp;</p>', 1, '8000000', '9f54bf622e.jpg'),
(69, 'Huawei Nova 5T ', 24, 8, '<p>Like new 99%</p>', 0, '1500000', '9bacc7eb0c.jpg'),
(70, 'Oppo A95 5G ', 24, 5, '<p>Hot deal</p>', 1, '5000000', 'a76ae9369c.jpg'),
(71, 'Oppo Reno5 Pro ', 24, 5, '<p>New 100%</p>', 0, '2000000', 'ea08c71ce2.jpg'),
(72, 'Iphone 12 Pro Max ', 24, 4, '<p>Hot deal</p>', 1, '15000000', 'dd983bcc4b.jpg'),
(74, 'Laptop Gaming MSI 2020 ', 26, 23, '<p>New Arrival</p>', 1, '3000000', 'e116da01cc.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wishlist`
--

CREATE TABLE `tbl_wishlist` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_wishlist`
--

INSERT INTO `tbl_wishlist` (`id`, `customer_id`, `productId`, `productName`, `price`, `image`) VALUES
(31, 21, 67, 'Dell Latitude X3600 ', '9000000', '79eb54c273.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartId`),
  ADD KEY `cart` (`productId`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cmt_1` (`product_id`),
  ADD KEY `cmt_2` (`customer_id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_pro` (`productId`),
  ADD KEY `order_cus` (`customer_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productId`),
  ADD KEY `product_brand` (`brandId`),
  ADD KEY `product_cat` (`catId`);

--
-- Indexes for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_pro_1` (`customer_id`),
  ADD KEY `order_pro_2` (`productId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=560;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD CONSTRAINT `cart` FOREIGN KEY (`productId`) REFERENCES `tbl_product` (`productId`);

--
-- Constraints for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD CONSTRAINT `cmt_1` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`productId`),
  ADD CONSTRAINT `cmt_2` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customer` (`id`);

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `order_cus` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customer` (`id`),
  ADD CONSTRAINT `order_pro` FOREIGN KEY (`productId`) REFERENCES `tbl_product` (`productId`);

--
-- Constraints for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `product_brand` FOREIGN KEY (`brandId`) REFERENCES `tbl_brand` (`brandId`),
  ADD CONSTRAINT `product_cat` FOREIGN KEY (`catId`) REFERENCES `tbl_category` (`catId`),
  ADD CONSTRAINT `product_cate` FOREIGN KEY (`brandId`) REFERENCES `tbl_brand` (`brandId`);

--
-- Constraints for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD CONSTRAINT `order_pro_1` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customer` (`id`),
  ADD CONSTRAINT `order_pro_2` FOREIGN KEY (`productId`) REFERENCES `tbl_product` (`productId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
