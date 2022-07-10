-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Host: sql8.freesqldatabase.com
-- Generation Time: Jul 10, 2022 at 12:16 AM
-- Server version: 5.5.62-0ubuntu0.14.04.1
-- PHP Version: 7.0.33-0ubuntu0.16.04.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sql8504061`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`, `image`, `email`) VALUES
(1, 'admin', '123456', '1.png', 'admin@admin.com');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `room_number` int(11) DEFAULT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `name`, `email`, `room_number`, `message`) VALUES
(18, 'Ddddd', 'hookshamosiba201555@gmail.com', 11, 'dddddddddddddddddd'),
(19, 'ddddddddddddd', 'hookshamosibsadsad201555@gmail.com', 10, 'ddddddddddd'),
(20, 'ddddddddddddd', 'hookshamosibsadsad201555@gmail.com', 10, 'ddddddddddd'),
(21, 'm', 'm@gmail.com', 11, 'fffffffffffffffffffff'),
(22, 'm', 'm@gmail.com', 12, 'dwadasdasd');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `name`, `price`, `image`, `quantity`, `user_id`) VALUES
(139, '', 0, '', 0, 5),
(140, '', 0, '', 0, 5),
(145, '', 0, '', 0, 5),
(146, '', 0, '', 0, 5),
(156, 'as', 6, 'food-6.png', 2, NULL),
(157, 'sss', 8, 'food-3.png', 25, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`) VALUES
(1, 'hot drinks'),
(2, 'cold drinks'),
(3, 'fresh drinks'),
(423, 'ffffffffffff'),
(424, 'dddddddddd'),
(425, 'ddddddddddsdas');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `ext` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_users` int(11) DEFAULT NULL,
  `order_status` varchar(20) NOT NULL,
  `id_room` int(11) DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `ext`, `created_at`, `id_users`, `order_status`, `id_room`, `date`) VALUES
(873, 0, '2022-07-09 07:50:24', 28, '', 8, '2022-07-09'),
(874, 0, '2022-07-09 07:51:50', 28, '', 9, '2022-07-09'),
(875, 0, '2022-07-09 07:52:25', 28, '', 8, '2022-07-09'),
(876, 50, '2022-07-10 01:29:33', 42, 'done', 9, '0000-00-00'),
(877, 20, '2022-07-10 01:33:13', 42, 'done', 11, '0000-00-00'),
(878, 0, '2022-07-10 01:34:48', 42, 'done', 11, '0000-00-00'),
(879, 500, '2022-07-10 01:37:57', 42, 'done', 11, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `order_online`
--

CREATE TABLE `order_online` (
  `id` int(255) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pin_code` int(10) NOT NULL,
  `total_products` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_online`
--

INSERT INTO `order_online` (`id`, `name`, `number`, `email`, `method`, `flat`, `street`, `city`, `state`, `country`, `pin_code`, `total_products`, `total_price`) VALUES
(1, 'Mohamed Shahin', '01206283071', 'hookshamosiba201555@gmail.com', 'cash on delivery', 'Ù…ØµØ±, Ø§Ù„Ø·ÙŠØ¨Ø© /Ø§Ù„Ø²Ù‚Ø§Ø²ÙŠÙ‚/Ø§Ù„Ø´Ø±Ù‚ÙŠØ©', 'Ø§Ù„Ø·ÙŠØ¨Ø© /Ø§Ù„Ø²Ù‚Ø§Ø²ÙŠÙ‚/Ø§Ù„Ø´Ø±Ù‚ÙŠØ©', 'Ø§Ù„Ø²Ù‚Ø§Ø²ÙŠÙ‚', 'Ø§Ù„Ø´Ø±Ù‚ÙŠØ©', 'Egypt', 44746, ' () ,  () ', '0'),
(2, 'Mohamed Shahin', '01206283071', 'hookshamosiba201555@gmail.com', 'cash on delivery', 'Ù…ØµØ±, Ø§Ù„Ø·ÙŠØ¨Ø© /Ø§Ù„Ø²Ù‚Ø§Ø²ÙŠÙ‚/Ø§Ù„Ø´Ø±Ù‚ÙŠØ©', 'Ø§Ù„Ø·ÙŠØ¨Ø© /Ø§Ù„Ø²Ù‚Ø§Ø²ÙŠÙ‚/Ø§Ù„Ø´Ø±Ù‚ÙŠØ©', 'Ø§Ù„Ø²Ù‚Ø§Ø²ÙŠÙ‚', 'Ø§Ù„Ø´Ø±Ù‚ÙŠØ©', 'Egypt', 44746, ' () ,  () ', '0'),
(3, 'mohamed samir', '01206283071', 'hookshamosiba201555@gmail.com', 'paypal', 'zagazig, zagazig', 'zagazig', 'zagazig', 'Ash Sharqiyah', 'Egypt', 44511, 'coffe (44) , tea (1) ', '890'),
(4, 'Mohamed samir', '01206283071', 'hookshamosiba201555@gmail.com', 'cash on delivery', 'Sharqia/Zagazig', 'Ø§Ù„Ø·ÙŠØ¨Ø© /Ø§Ù„Ø²Ù‚Ø§Ø²ÙŠÙ‚/Ø§Ù„Ø´Ø±Ù‚ÙŠØ©', 'zagazig', 'Al Sharqia', 'Egypt', 44511, 'coffe (44) , tea (1) ', '890'),
(5, 'Mohamed samir', '01206283071', 'hookshamosiba201555@gmail.com', 'cash on delivery', 'Sharqia/Zagazig', 'Ø§Ù„Ø·ÙŠØ¨Ø© /Ø§Ù„Ø²Ù‚Ø§Ø²ÙŠÙ‚/Ø§Ù„Ø´Ø±Ù‚ÙŠØ©', 'zagazig', 'Al Sharqia', 'Egypt', 44511, 'coffe (44) , tea (1) ', '890'),
(6, 'Mohamed Shahin', '01206283071', 'hookshamosiba201555@gmail.com', 'cash on delivery', 'Ù…ØµØ±, Ø§Ù„Ø·ÙŠØ¨Ø© /Ø§Ù„Ø²Ù‚Ø§Ø²ÙŠÙ‚/Ø§Ù„Ø´Ø±Ù‚ÙŠØ©', 'Ø§Ù„Ø·ÙŠØ¨Ø© /Ø§Ù„Ø²Ù‚Ø§Ø²ÙŠÙ‚/Ø§Ù„Ø´Ø±Ù‚ÙŠØ©', 'Ø§Ù„Ø²Ù‚Ø§Ø²ÙŠÙ‚', 'Ø§Ù„Ø´Ø±Ù‚ÙŠØ©', 'Egypt', 44746, 'coffe (44) , tea (1) ', '890'),
(7, 'Mohamed Shahin', '01206283071', 'hookshamosiba201555@gmail.com', 'cash on delivery', 'Ù…ØµØ±, Ø§Ù„Ø·ÙŠØ¨Ø© /Ø§Ù„Ø²Ù‚Ø§Ø²ÙŠÙ‚/Ø§Ù„Ø´Ø±Ù‚ÙŠØ©', 'Ø§Ù„Ø·ÙŠØ¨Ø© /Ø§Ù„Ø²Ù‚Ø§Ø²ÙŠÙ‚/Ø§Ù„Ø´Ø±Ù‚ÙŠØ©', 'Ø§Ù„Ø²Ù‚Ø§Ø²ÙŠÙ‚', 'Ø§Ù„Ø´Ø±Ù‚ÙŠØ©', 'Egypt', 44746, 'coffe (44) , tea (1) ', '890'),
(8, 'Mohamed Shahin', '01206283071', 'hookshamosiba201555@gmail.com', 'paypal', 'Ù…ØµØ±, Ø§Ù„Ø·ÙŠØ¨Ø© /Ø§Ù„Ø²Ù‚Ø§Ø²ÙŠÙ‚/Ø§Ù„Ø´Ø±Ù‚ÙŠØ©', 'Ø§Ù„Ø·ÙŠØ¨Ø© /Ø§Ù„Ø²Ù‚Ø§Ø²ÙŠÙ‚/Ø§Ù„Ø´Ø±Ù‚ÙŠØ©', 'Ø§Ù„Ø²Ù‚Ø§Ø²ÙŠÙ‚', 'Ø§Ù„Ø´Ø±Ù‚ÙŠØ©', 'Egypt', 44746, 'coffe (34) , tea (1) , dddddd (1) ', '698'),
(9, 'mohamed samir', '01206283071', 'hookshamosiba201555@gmail.com', 'credit cart', 'zagazig, zagazig', 'zagazig', 'zagazig', 'Ash Sharqiyah', 'Egypt', 44511, 'tea (1) , coffe (1) , dddddd (1) ', '38'),
(10, 'Mohamed Shahin', '01206283071', 'hookshamosiba201555@gmail.com', 'cash on delivery', 'Ù…ØµØ±, Ø§Ù„Ø·ÙŠØ¨Ø© /Ø§Ù„Ø²Ù‚Ø§Ø²ÙŠÙ‚/Ø§Ù„Ø´Ø±Ù‚ÙŠØ©', 'Ø§Ù„Ø·ÙŠØ¨Ø© /Ø§Ù„Ø²Ù‚Ø§Ø²ÙŠÙ‚/Ø§Ù„Ø´Ø±Ù‚ÙŠØ©', 'Ø§Ù„Ø²Ù‚Ø§Ø²ÙŠÙ‚', 'Ø§Ù„Ø´Ø±Ù‚ÙŠØ©', 'Egypt', 44746, 'tea (1) , coffe (1) , dddddd (1) ', '38'),
(11, 'Mohamed Shahin', '01206283071', 'hookshamosiba201555@gmail.com', 'cash on delivery', 'Ù…ØµØ±, Ø§Ù„Ø·ÙŠØ¨Ø© /Ø§Ù„Ø²Ù‚Ø§Ø²ÙŠÙ‚/Ø§Ù„Ø´Ø±Ù‚ÙŠØ©', 'Ø§Ù„Ø·ÙŠØ¨Ø© /Ø§Ù„Ø²Ù‚Ø§Ø²ÙŠÙ‚/Ø§Ù„Ø´Ø±Ù‚ÙŠØ©', 'Ø§Ù„Ø²Ù‚Ø§Ø²ÙŠÙ‚', 'Ø§Ù„Ø´Ø±Ù‚ÙŠØ©', 'Egypt', 44746, 'tea (1) , coffe (1) , dddddd (1) ', '38'),
(12, 'Mohamed Samir Mohamed Ali', '01025495205', 'hookshamosiba201555@gmail.com', 'cash on delivery', 'Sharqia/Zagazig', 'Ø§Ù„Ø·ÙŠØ¨Ø© /Ø§Ù„Ø²Ù‚Ø§Ø²ÙŠÙ‚/Ø§Ù„Ø´Ø±Ù‚ÙŠØ©', 'zagazig', 'SHR', 'Egypt', 44511, 'tea (4) , coffe (1) , dddddd (3) ', '84'),
(13, 'Mohamed Samir Mohamed Ali', '01025495205', 'hookshamosiba201555@gmail.com', 'cash on delivery', 'Sharqia/Zagazig', 'Ø§Ù„Ø·ÙŠØ¨Ø© /Ø§Ù„Ø²Ù‚Ø§Ø²ÙŠÙ‚/Ø§Ù„Ø´Ø±Ù‚ÙŠØ©', 'zagazig', 'Al Sharqia', 'Egypt', 44511, 'tea (4) , coffe (1) , dddddd (3) ', '84'),
(14, '', '', '', '', '', '', '', '', '', 0, 'dddddd (3) ', '24'),
(15, '', '', '', '', '', '', '', '', '', 0, 'dddddd (3) ', '24'),
(16, '', '', '', '', '', '', '', '', '', 0, 'dddddd (3) ', '24'),
(17, '', '', '', '', '', '', '', '', '', 0, 'dddddd (3) ', '24'),
(18, '', '', '', '', '', '', '', '', '', 0, 'dddddd (3) ', '24'),
(19, '', '', '', '', '', '', '', '', '', 0, 'dddddd (3) ', '24'),
(20, '', '', '', '', '', '', '', '', '', 0, 'dddddd (3) ', '24'),
(21, '', '', '', '', '', '', '', '', '', 0, 'dddddd (3) ', '24'),
(22, '', '', '', '', '', '', '', '', '', 0, 'dddddd (3) ', '24');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `id_categories` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `id_categories`) VALUES
(139, 'tea', 10, 'food-5.png', 1),
(140, 'coffe', 20, 'food-1.png', 1),
(145, 'as', 6, 'food-6.png', 423),
(146, 'sss', 8, 'food-3.png', 2);

-- --------------------------------------------------------

--
-- Table structure for table `product_orders`
--

CREATE TABLE `product_orders` (
  `id_products` int(11) NOT NULL DEFAULT '0',
  `id_orders` int(11) NOT NULL DEFAULT '0',
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_orders`
--

INSERT INTO `product_orders` (`id_products`, `id_orders`, `quantity`) VALUES
(139, 873, 3),
(139, 874, 6),
(139, 875, 10),
(139, 876, 0),
(140, 873, 2),
(140, 874, 6),
(140, 875, 10),
(140, 876, 0);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `comment`, `image`) VALUES
(1, 'ahmed', 'I tried this coffee and it was really delicious', '11.jpg'),
(2, 'mariem', 'It\'s the best coffee ever', '22.jpg'),
(3, 'samir', 'Delicious coffee, I recommend it to everyone', '33.jpg'),
(4, 'fatema', 'Makes me so awake', '44.jpg'),
(5, 'omar', 'The service is very good', '55.jpg'),
(6, 'asmaa', 'good coffee and good people', '66.jpg'),
(7, 'john', 'It\'s delicious coffee', '77.jpg'),
(8, 'maria', 'I drink this coffee daily', '88.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `room_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `room_number`) VALUES
(8, 1),
(9, 2),
(10, 3),
(11, 4),
(12, 5),
(13, 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `code` mediumint(50) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `image`, `code`, `status`) VALUES
(28, 'm', 'msdfsdf', 'asda', 'asdasd', 54654, 'adasd'),
(42, 'mohamed', 'emhmd205@gmail.com', '$2y$10$lyB5S.AersoN1uGmoeb/qOY76VjN3xr7ZnqKltIIEWpTbAdJx0zP.', '', 0, 'verified');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room` (`room_number`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_users_users` (`id_users`),
  ADD KEY `room` (`id_room`);

--
-- Indexes for table `order_online`
--
ALTER TABLE `order_online`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_cat` (`id_categories`);

--
-- Indexes for table `product_orders`
--
ALTER TABLE `product_orders`
  ADD PRIMARY KEY (`id_products`,`id_orders`),
  ADD KEY `id_orders` (`id_orders`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=426;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=880;
--
-- AUTO_INCREMENT for table `order_online`
--
ALTER TABLE `order_online`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `users` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `room` FOREIGN KEY (`id_room`) REFERENCES `room` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_cat` FOREIGN KEY (`id_categories`) REFERENCES `categories` (`id`);

--
-- Constraints for table `product_orders`
--
ALTER TABLE `product_orders`
  ADD CONSTRAINT `product_orders_ibfk_1` FOREIGN KEY (`id_products`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `orders` FOREIGN KEY (`id_orders`) REFERENCES `orders` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
