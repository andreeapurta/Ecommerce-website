-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2020 at 08:47 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) COLLATE utf8_romanian_ci NOT NULL,
  `adminUser` varchar(255) COLLATE utf8_romanian_ci NOT NULL,
  `adminEmail` varchar(255) COLLATE utf8_romanian_ci NOT NULL,
  `adminPass` varchar(32) COLLATE utf8_romanian_ci NOT NULL,
  `level` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `adminName`, `adminUser`, `adminEmail`, `adminPass`, `level`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '63a9f0ea7bb98050796b649e85481845', 0),
(3, 'Andreea', 'andreea', 'admin@mysite.com', '63a9f0ea7bb98050796b649e85481845', 0);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) COLLATE utf8_romanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brandId`, `brandName`) VALUES
(3, 'M&amp;N'),
(4, 'Haribbo'),
(5, 'DinDon'),
(6, 'Sugarpova'),
(7, 'Tin Tin');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartId` int(11) NOT NULL,
  `sessionId` varchar(255) COLLATE utf8_romanian_ci NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) COLLATE utf8_romanian_ci NOT NULL,
  `price` float(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_romanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartId`, `sessionId`, `productId`, `productName`, `price`, `quantity`, `image`) VALUES
(58, '8i7q63uqnnvsbg5rlbdjve2n84', 12, 'Rom Chocolate Buns', 15.87, 1, 'upload/e6d5d3862e.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) COLLATE utf8_romanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catId`, `catName`) VALUES
(1, 'Candy'),
(2, 'Jelly'),
(3, 'Lolly'),
(4, 'TWIZZLERS'),
(5, 'Cotton Candy'),
(8, 'Chewing gum'),
(10, 'Chocolate'),
(11, 'Macarons'),
(12, 'Donuts'),
(13, 'Retro Sweets'),
(14, 'Chew Sweets'),
(15, 'Prajitura');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_romanian_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_romanian_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_romanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `description`) VALUES
(1, 'Ana ', 'ana@gmail.com', 'dfgdsgds'),
(2, 'Ana ', 'ana@gmail.com', 'dfgdsgds');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_romanian_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_romanian_ci NOT NULL,
  `city` varchar(50) COLLATE utf8_romanian_ci NOT NULL,
  `country` varchar(50) COLLATE utf8_romanian_ci NOT NULL,
  `zip` varchar(20) COLLATE utf8_romanian_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_romanian_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_romanian_ci NOT NULL,
  `pass` varchar(40) COLLATE utf8_romanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `address`, `city`, `country`, `zip`, `phone`, `email`, `pass`) VALUES
(6, 'Ana Maria Aftenie', 'Fratii Buzesti bl 10', 'Sibiu', 'Romania', '552302', '0798833343', 'ana@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(7, 'Florescu Andrei', 'Henrieta', 'Sibiu', 'Sibiu', '222222', '078646631', 'flori@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(8, 'Andreea', 'Fratii Buzesti', 'Sibiu', 'Sibiu', '55533', '072487776', 'andreea@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) COLLATE utf8_romanian_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) COLLATE utf8_romanian_ci NOT NULL,
  `orderDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customerId`, `productId`, `productName`, `quantity`, `price`, `image`, `orderDate`) VALUES
(1, 6, 6, 'Bean Boozled', 1, 40.40, 'upload/a2503f3863.png', '2020-05-26 10:36:12'),
(2, 6, 5, 'Belly Beans', 3, 7.80, 'upload/9f99b1aa0f.jpg', '2020-05-26 10:36:12'),
(3, 6, 8, 'Sugarpova tennis candy', 1, 4.99, 'upload/d23a449943.jpg', '2020-05-26 10:36:12'),
(4, 6, 13, 'Chocolate Balls', 1, 9.13, 'upload/5d17d0aacc.jpg', '2020-05-26 10:36:12'),
(5, 6, 12, 'Rom Chocolate Buns', 1, 15.87, 'upload/e6d5d3862e.jpg', '2020-05-26 10:36:12'),
(6, 6, 12, 'Rom Chocolate Buns', 2, 15.87, 'upload/e6d5d3862e.jpg', '2020-05-26 10:36:12'),
(7, 6, 5, 'Belly Beans', 3, 7.80, 'upload/9f99b1aa0f.jpg', '2020-05-26 10:36:12'),
(8, 6, 12, 'Rom Chocolate Buns', 1, 15.87, 'upload/e6d5d3862e.jpg', '2020-05-26 10:36:12'),
(9, 6, 11, 'Pink Stawberry Macarons', 1, 10.99, 'upload/e5a94737d8.jpg', '2020-05-26 10:36:12'),
(10, 6, 6, 'Bean Boozled', 2, 40.40, 'upload/a2503f3863.png', '2020-05-26 10:36:12'),
(11, 6, 11, 'Pink Stawberry Macarons', 2, 10.99, 'upload/e5a94737d8.jpg', '2020-05-26 10:36:12'),
(12, 6, 10, 'Vanilla Macarons', 1, 11.44, 'upload/b2877308ac.jpg', '2020-05-26 10:36:12'),
(13, 6, 13, 'Chocolate Balls', 1, 9.13, 'upload/5d17d0aacc.jpg', '2020-05-26 10:36:12'),
(14, 6, 6, 'Bean Boozled', 1, 40.40, 'upload/a2503f3863.png', '2020-05-26 10:36:12'),
(15, 6, 12, 'Rom Chocolate Buns', 3, 15.87, 'upload/e6d5d3862e.jpg', '2020-05-26 10:36:12'),
(16, 6, 3, ' World of Sweets Lolly Master Spiral', 1, 56.85, 'upload/04558dc39e.png', '2020-05-26 10:52:06'),
(17, 6, 1, 'Ju-c Tick Tock jelly', 2, 10.00, 'upload/8cdfa88ab1.jpg', '2020-05-26 22:35:02'),
(18, 6, 6, 'Bean Boozled', 3, 40.40, 'upload/a2503f3863.png', '2020-05-26 23:02:42'),
(19, 6, 2, 'Sour Jelly', 1, 40.00, 'upload/d2d208e5de.jpg', '2020-05-27 07:21:19'),
(20, 6, 1, 'Ju-c Tick Tock jelly', 1, 10.00, 'upload/8cdfa88ab1.jpg', '2020-05-27 19:26:48'),
(21, 6, 12, 'Rom Chocolate Buns', 1, 15.87, 'upload/e6d5d3862e.jpg', '2020-05-27 19:26:48'),
(22, 6, 6, 'Bean Boozled', 1, 40.40, 'upload/a2503f3863.png', '2020-05-27 19:26:48'),
(23, 6, 8, 'Sugarpova tennis candy', 1, 4.99, 'upload/d23a449943.jpg', '2020-05-27 19:26:48'),
(24, 6, 2, 'Sour Jelly', 4, 40.00, 'upload/d2d208e5de.jpg', '2020-05-27 20:58:12'),
(25, 6, 1, 'Ju-c Tick Tock jelly', 1, 10.00, 'upload/8cdfa88ab1.jpg', '2020-05-27 20:58:12'),
(26, 6, 1, 'Ju-c Tick Tock jelly', 1, 10.00, 'upload/8cdfa88ab1.jpg', '2020-05-27 21:47:49'),
(27, 6, 6, 'Bean Boozled', 1, 40.40, 'upload/a2503f3863.png', '2020-05-27 21:54:18'),
(28, 6, 13, 'Chocolate Balls', 1, 9.13, 'upload/5d17d0aacc.jpg', '2020-05-27 21:55:18'),
(29, 6, 3, ' World of Sweets Lolly Master Spiral', 4, 56.85, 'upload/04558dc39e.png', '2020-05-27 23:15:46'),
(30, 6, 5, 'Belly Beans', 1, 7.80, 'upload/9f99b1aa0f.jpg', '2020-05-28 05:43:41'),
(31, 6, 1, 'Ju-c Tick Tock jelly', 2, 10.00, 'upload/8cdfa88ab1.jpg', '2020-05-28 06:20:21');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productId` int(11) NOT NULL,
  `productName` varchar(255) COLLATE utf8_romanian_ci NOT NULL,
  `catId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `description` text COLLATE utf8_romanian_ci NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) COLLATE utf8_romanian_ci NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `productName`, `catId`, `brandId`, `description`, `price`, `image`, `type`) VALUES
(1, 'Ju-c Tick Tock jelly', 2, 5, 'Mauris condimentum dui in semper pulvinar. Fusce eget augue quis ex tincidunt eleifend. Quisque erat tellus, pellentesque id venenatis in, finibus vel tellus. In malesuada elementum ante, nec ultricies nisi aliquet non. In at elit sit amet mauris tempor iaculis sed auctor mauris. Donec enim risus, pellentesque non ex et, volutpat condimentum sem.\r\n\r\nVivamus posuere orci in leo suscipit, id varius dolor congue. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus at purus ut ante semper aliquet. Mauris euismod non tellus et porta. Nam elementum consequat volutpat. Nulla scelerisque rutrum dui, quis condimentum purus luctus vitae. Etiam diam lacus, lacinia eu venenatis a, facilisis a dui. Donec auctor turpis eu fermentum mollis.\r\n                            ', 10.00, 'upload/8cdfa88ab1.jpg', 0),
(2, 'Sour Jelly', 2, 3, 'Integer nec tellus eget purus interdum tincidunt in non mi. Etiam posuere gravida maximus. Curabitur ultricies viverra elit, vel ornare ex laoreet quis. Curabitur id consectetur eros. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aliquam rutrum nisl magna, vel tristique nisi ultricies sit amet. Vestibulum augue ipsum, vulputate ut facilisis in, eleifend id dui. Maecenas sed arcu vulputate enim egestas tincidunt at a diam. Ut id tortor suscipit, ultrices augue commodo, tristique magna. Cras magna diam, tincidunt at efficitur in, lobortis sit amet urna. In lacus elit, eleifend at quam nec, vulputate porttitor dolor. Mauris eu congue eros. Nam feugiat, lorem non euismod euismod, nisi orci imperdiet arcu, non porttitor dolor massa quis purus. Vestibulum varius nibh eget auctor pharetra. Integer molestie leo pharetra nunc tempor condimentum.\r\n                            ', 40.00, 'upload/d2d208e5de.jpg', 0),
(3, ' World of Sweets Lolly Master Spiral', 3, 3, 'Proin tempus sapien ex, pretium vehicula quam consectetur non. Donec vitae augue finibus, eleifend nisl nec, venenatis felis. Aliquam id elit placerat, aliquam tortor ac, dignissim sem. Ut vitae ipsum sed enim efficitur molestie. Nunc augue nisl, tincidunt vel vehicula id, commodo nec orci. Donec non ipsum sit amet enim euismod molestie egestas at lectus. Praesent dignissim, magna ac suscipit semper, purus sapien finibus enim, sed imperdiet magna sem id augue. Cras elementum ex vitae lacus consequat pharetra. Nam fermentum, ante non porta egestas, leo ipsum bibendum dui, et dignissim diam odio at metus. Donec urna lectus, porttitor quis ante quis, rutrum tincidunt libero. Nam eget consectetur sem.\r\n\r\n \r\n                            \r\n                            ', 56.85, 'upload/04558dc39e.png', 0),
(5, 'Belly Beans', 1, 5, 'Cras at congue urna, ut tincidunt ex. Sed in justo id sem auctor pretium sed vitae augue. Interdum et malesuada fames ac ante ipsum primis in faucibus. Curabitur fringilla, mi non varius finibus, ipsum tortor vestibulum libero, et semper diam nunc id mauris. Donec sed lacinia purus, ut bibendum nulla. Curabitur ac arcu eget quam malesuada mattis quis nec risus. Phasellus dictum lectus porttitor est dictum, nec dapibus tortor elementum. Mauris erat est, imperdiet gravida dui vel, semper finibus nulla. Sed in nibh viverra, luctus magna eu, tempus tellus.\r\n\r\n\r\nCras at congue urna, ut tincidunt ex. Sed in justo id sem auctor pretium sed vitae augue. Interdum et malesuada fames ac ante ipsum primis in faucibus. Curabitur fringilla, mi non varius finibus, ipsum tortor vestibulum libero, et semper diam nunc id mauris. Donec sed lacinia purus, ut bibendum nulla. Curabitur ac arcu eget quam malesuada mattis quis nec risus. Phasellus dictum lectus porttitor est dictum, nec dapibus tortor elementum. Mauris erat est, imperdiet gravida dui vel, semper finibus nulla. Sed in nibh viverra, luctus magna eu, tempus tellus.\r\n\r\n', 7.80, 'upload/9f99b1aa0f.jpg', 0),
(6, 'Bean Boozled', 2, 4, 'KOIJIOOOOOOOOOOOOOOOOOO\r\n                            ', 40.40, 'upload/a2503f3863.png', 0),
(7, 'Jelly Mix', 2, 3, 'Suspendisse porttitor neque et nunc lacinia, sed pharetra nibh interdum. Donec nec cursus dui, eget suscipit risus. Nulla facilisi. Sed in erat sit amet velit fringilla rhoncus. Praesent aliquam risus urna, nec placerat elit vulputate at. Proin egestas pulvinar aliquet. Sed porttitor odio lobortis lectus egestas, scelerisque dapibus mi consectetur. Praesent eget vestibulum tellus. In a lacinia nisi. Sed nec leo magna.', 7.20, 'upload/b0b8699e7d.jpg', 1),
(8, 'Sugarpova tennis candy', 1, 6, 'Nulla vel luctus orci. Vivamus fermentum odio ac fermentum cursus. Phasellus sodales finibus augue ac malesuada. Aliquam et enim eu erat egestas dignissim. Pellentesque consequat arcu mi, quis placerat mi malesuada nec. Vivamus ultrices, enim ut posuere egestas, lorem dolor consequat justo, a condimentum lacus lectus in libero. Nunc pharetra viverra diam quis elementum. Phasellus vulputate quam est. Proin tincidunt, libero a efficitur cursus, neque nunc mattis neque, id convallis leo mauris ut augue. Sed tristique et felis id tempus. Morbi nec lorem magna. Mauris condimentum ante a ante luctus, eu iaculis sem feugiat. Sed eu dolor sed ipsum dignissim suscipit et at orci. Ut ut consectetur sem. Suspendisse volutpat tincidunt ante, nec mollis massa viverra sed.', 4.99, 'upload/d23a449943.jpg', 0),
(9, 'Haribbo', 0, 4, 'Nulla vel luctus orci. Vivamus fermentum odio ac fermentum cursus. Phasellus sodales finibus augue ac malesuada. Aliquam et enim eu erat egestas dignissim. Pellentesque consequat arcu mi, quis placerat mi malesuada nec. Vivamus ultrices, enim ut posuere egestas, lorem dolor consequat justo, a condimentum lacus lectus in libero. Nunc pharetra viverra diam quis elementum. Phasellus vulputate quam est. Proin tincidunt, libero a efficitur cursus, neque nunc mattis neque, id convallis leo mauris ut augue. Sed tristique et felis id tempus. Morbi nec lorem magna. Mauris condimentum ante a ante luctus, eu iaculis sem feugiat. Sed eu dolor sed ipsum dignissim suscipit et at orci. Ut ut consectetur sem. Suspendisse volutpat tincidunt ante, nec mollis massa viverra sed.', 5.70, 'upload/5cde6cf897.jpg', 1),
(10, 'Vanilla Macarons', 11, 7, 'Nulla vel luctus orci. Vivamus fermentum odio ac fermentum cursus. Phasellus sodales finibus augue ac malesuada. Aliquam et enim eu erat egestas dignissim. Pellentesque consequat arcu mi, quis placerat mi malesuada nec. Vivamus ultrices, enim ut posuere egestas, lorem dolor consequat justo, a condimentum lacus lectus in libero. Nunc pharetra viverra diam quis elementum. Phasellus vulputate quam est. Proin tincidunt, libero a efficitur cursus, neque nunc mattis neque, id convallis leo mauris ut augue. Sed tristique et felis id tempus. Morbi nec lorem magna. Mauris condimentum ante a ante luctus, eu iaculis sem feugiat. Sed eu dolor sed ipsum dignissim suscipit et at orci. Ut ut consectetur sem. Suspendisse volutpat tincidunt ante, nec mollis massa viverra sed.\r\n                            ', 11.44, 'upload/b2877308ac.jpg', 1),
(11, 'Pink Stawberry Macarons', 11, 7, 'Nulla vel luctus orci. Vivamus fermentum odio ac fermentum cursus. Phasellus sodales finibus augue ac malesuada. Aliquam et enim eu erat egestas dignissim. Pellentesque consequat arcu mi, quis placerat mi malesuada nec. Vivamus ultrices, enim ut posuere egestas, lorem dolor consequat justo, a condimentum lacus lectus in libero. Nunc pharetra viverra diam quis elementum. Phasellus vulputate quam est. Proin tincidunt, libero a efficitur cursus, neque nunc mattis neque, id convallis leo mauris ut augue. Sed tristique et felis id tempus. Morbi nec lorem magna. Mauris condimentum ante a ante luctus, eu iaculis sem feugiat. Sed eu dolor sed ipsum dignissim suscipit et at orci. Ut ut consectetur sem. Suspendisse volutpat tincidunt ante, nec mollis massa viverra sed.\r\n                            \r\n                            \r\n                            ', 10.99, 'upload/e5a94737d8.jpg', 1),
(12, 'Rom Chocolate Buns', 10, 7, 'Nulla vel luctus orci. Vivamus fermentum odio ac fermentum cursus. Phasellus sodales finibus augue ac malesuada. Aliquam et enim eu erat egestas dignissim. Pellentesque consequat arcu mi, quis placerat mi malesuada nec. Vivamus ultrices, enim ut posuere egestas, lorem dolor consequat justo, a condimentum lacus lectus in libero. Nunc pharetra viverra diam quis elementum. Phasellus vulputate quam est. Proin tincidunt, libero a efficitur cursus, neque nunc mattis neque, id convallis leo mauris ut augue. Sed tristique et felis id tempus. Morbi nec lorem magna. Mauris condimentum ante a ante luctus, eu iaculis sem feugiat. Sed eu dolor sed ipsum dignissim suscipit et at orci. Ut ut consectetur sem. Suspendisse volutpat tincidunt ante, nec mollis massa viverra sed.\r\n                            ', 15.87, 'upload/e6d5d3862e.jpg', 1),
(13, 'Chocolate Balls', 10, 7, 'Nulla vel luctus orci. Vivamus fermentum odio ac fermentum cursus. Phasellus sodales finibus augue ac malesuada. Aliquam et enim eu erat egestas dignissim. Pellentesque consequat arcu mi, quis placerat mi malesuada nec. Vivamus ultrices, enim ut posuere egestas, lorem dolor consequat justo, a condimentum lacus lectus in libero. Nunc pharetra viverra diam quis elementum. Phasellus vulputate quam est. Proin tincidunt, libero a efficitur cursus, neque nunc mattis neque, id convallis leo mauris ut augue. Sed tristique et felis id tempus. Morbi nec lorem magna. Mauris condimentum ante a ante luctus, eu iaculis sem feugiat. Sed eu dolor sed ipsum dignissim suscipit et at orci. Ut ut consectetur sem. Suspendisse volutpat tincidunt ante, nec mollis massa viverra sed.\r\n                            \r\n                            \r\n                            ', 9.13, 'upload/5d17d0aacc.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
