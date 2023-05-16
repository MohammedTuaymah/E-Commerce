-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2023 at 02:51 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` text NOT NULL,
  `category_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_img`) VALUES
(10, 'electronics', '1682665532-electronics.jpeg'),
(11, 'Men Clothes', '1682665627-men_clothes.jpeg'),
(12, 'Women Clothes', '1682665726-Women_Clothes.jpeg'),
(14, 'toys', '1683188244-toys_banner.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(15) NOT NULL,
  `productCode` varchar(255) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `productDesc` varchar(255) NOT NULL,
  `Price` int(10) NOT NULL,
  `units` int(5) NOT NULL,
  `total` int(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `productCode`, `productName`, `productDesc`, `Price`, `units`, `total`, `email`, `username`, `date`) VALUES
(21, '8764', 'Leather_shirt', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam facere, omnis fugiat nostrum rerum corrupti alias libero consectetur praesentium dicta itaque obcaecati quo dolores ducimus! sam facere, omnis fugiat nostrum rerum corrupti alias liber', 3000, 1, 3000, 'nof@gmail.com', 'nof', '2023-05-10 12:29:16'),
(20, 'BOLT2', 'Cap', 'A sleek, tonal stitched cap for runners. The plain texture and unique design will help runners to concentrate more on running and less on their hair. The combbination of casual and formal look is just brilliant.', 200, 4, 800, 'nof@gmail.com', 'nof', '2023-05-02 10:45:12'),
(19, 'BOLT3', 'Sports Band', 'The Sports Band collection features highly polished stainless steel and space black stainless steel cases. The display is protected by sapphire crystal. And there is a choice of three different leather bands.', 1000, 1, 1000, 'nof@gmail.com', 'nof', '2023-05-02 10:45:03'),
(18, 'BOLT2', 'Cap', 'A sleek, tonal stitched cap for runners. The plain texture and unique design will help runners to concentrate more on running and less on their hair. The combbination of casual and formal look is just brilliant.', 200, 1, 200, 'nof@gmail.com', 'nof', '2023-05-02 10:26:05'),
(17, 'BOLT1', 'Sports Shoes', 'With a clean vamp, tonal stitch details throughout, and a unique formstripe finish, the all new sports shoes fits the needs of multiple running consumers by offering an athletic and a lifestyle look.', 5000, 1, 5000, 'nof@gmail.com', 'nof', '2023-05-02 10:26:05'),
(22, '8463', 'black headphone', '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facilis, eius dolorem. Incidunt in cupiditate blanditiis officiis deleniti odit labore nisi!</p>', 400, 1, 400, 'nof@gmail.com', 'nof', '2023-05-10 12:29:16'),
(23, '7621', 'Android Tablet', '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facilis, eius dolorem. Incidunt in cupiditate blanditiis officiis deleniti odit labore nisi!</p>', 1500, 1, 1500, 'nof@gmail.com', 'nof', '2023-05-10 12:29:50'),
(24, '5328', 'red t-shirt nike', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam facere, omnis fugiat nostrum rerum corrupti alias libero consectetur praesentium dicta itaque obcaecati quo dolores ducimus!</p>', 100, 1, 100, 'nof@gmail.com', 'nof', '2023-05-10 12:29:50');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `productCode` varchar(60) NOT NULL,
  `productName` varchar(60) NOT NULL,
  `productDesc` tinytext NOT NULL,
  `productImg` varchar(60) NOT NULL,
  `Quantity` int(5) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `IsTrend` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `productCode`, `productName`, `productDesc`, `productImg`, `Quantity`, `price`, `IsTrend`) VALUES
(5, 10, '7946', 'Pink HeadPhone', 'olor sit amet consectetur adipisicing elit. Facilis, eius dolorem. Incidunt in cupid', '1683186138-pink_headphone.jpg', 50, 300.00, 0),
(6, 10, '8463', 'black headphone', '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facilis, eius dolorem. Incidunt in cupiditate blanditiis officiis deleniti odit labore nisi!</p>', '1683186203-black_headphone.jpg', 199, 400.00, 0),
(7, 10, '7621', 'Android Tablet', '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facilis, eius dolorem. Incidunt in cupiditate blanditiis officiis deleniti odit labore nisi!</p>', '1683186241-Android Tablet.jpg', 39, 1500.00, 1),
(9, 10, '8745', 'iphone-14', '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Perferendis natus eius veniam laboriosam eveniet facilis! Explicabo consequuntur culpa ex architecto? Inventore corrupti sit iure architecto veritatis quo quas distinctio nihil, placeat, vel ea ', '1683186323-iphone-14.jpg', 0, 3500.00, 1),
(10, 10, '6446', 'CE2', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio deleniti quod alias ullam quibusdam natus nulla quae, fugit hic iusto beatae non eaque dolorem vero!</p>', '1683186365-CE2.jpg', 51, 500.00, 0),
(11, 10, '5473', 'samsung', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio deleniti quod alias ullam quibusdam natus nulla quae, fugit hic iusto beatae non eaque dolorem vero!</p>', '1683186394-samsung.png', 200, 500.00, 0),
(12, 10, '6541', 'apple ipad', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam facere, omnis fugiat nostrum rerum corrupti alias libero consectetur praesentium dicta itaque obcaecati quo dolores ducimus!</p>', '1683186611-apple_ipad.png', 200, 6000.00, 1),
(14, 11, '4332', 'Suit', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam facere, omnis fugiat nostrum rerum corrupti alias libero consectetur praesentium dicta itaque obcaecati quo dolores ducimus!</p>', '1683187084-Suit.jpg', 20, 4000.00, 0),
(15, 11, '8764', 'Leather_shirt', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam facere, omnis fugiat nostrum rerum corrupti alias libero consectetur praesentium dicta itaque obcaecati quo dolores ducimus! sam facere, omnis fugiat nostrum rerum corrupti alias liber', '1683187119-Leather_shirt.jpeg', 19, 3000.00, 0),
(16, 11, '5432', 'blue adidas t-shirt', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam facere, omnis fugiat nostrum rerum corrupti alias libero consectetur praesentium dicta itaque obcaecati quo dolores ducimus!</p>', '1683187195-blue adidas t-shirt.png', 100, 100.00, 0),
(17, 11, '6537', 'black_adidas_t-shirt', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam facere, omnis fugiat nostrum rerum corrupti alias libero consectetur praesentium dicta itaque obcaecati quo dolores ducimus!</p>', '1683187223-black_adidas_t-shirt.PNG', 20, 200.00, 0),
(18, 11, '5683', 'white_adidas_t-shirt', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam facere, omnis fugiat nostrum rerum corrupti alias libero consectetur praesentium dicta itaque obcaecati quo dolores ducimus!</p>', '1683187260-white_adidas_t-shirt.PNG', 75, 200.00, 0),
(19, 11, '5328', 'red t-shirt nike', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam facere, omnis fugiat nostrum rerum corrupti alias libero consectetur praesentium dicta itaque obcaecati quo dolores ducimus!</p>', '1683187287-red t-shirt nike.png', 19, 100.00, 0),
(20, 11, '0753', 'pr-adidas', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam facere, omnis fugiat nostrum rerum corrupti alias libero consectetur praesentium dicta itaque obcaecati quo dolores ducimus!</p>', '1683187319-pr-adidas.PNG', 20, 100.00, 1),
(21, 11, 't368', 'pr2-adidas', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam facere, omnis fugiat nostrum rerum corrupti alias libero consectetur praesentium dicta itaque obcaecati quo dolores ducimus!</p>', '1683187346-pr2-adidas.PNG', 200, 100.00, 0),
(22, 14, '6412', 'pink duck', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam facere, omnis fugiat nostrum rerum corrupti alias libero consectetur praesentium dicta itaque obcaecati quo dolores ducimus! Lorem ipsum dolor sit amet consectetur adipisicing elit. La', '1683188274-pink duck.jpeg', 20, 50.00, 0),
(23, 14, '3647', 'Soldier Games', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam facere, omnis fugiat nostrum rerum corrupti alias libero consectetur praesentium dicta itaque obcaecati quo dolores ducimus!</p>', '1683188297-Soldier Games.jpeg', 10, 200.00, 0),
(24, 14, '6447', 'rocket', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam facere, omnis fugiat nostrum rerum corrupti alias libero consectetur praesentium dicta itaque obcaecati quo dolores ducimus!</p>', '1683188324-rocket.jpeg', 40, 100.00, 1),
(25, 14, '6574', 'rabbit', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam facere, omnis fugiat nostrum rerum corrupti alias libero consectetur praesentium dicta itaque obcaecati quo dolores ducimus! Lorem ipsum dolor sit amet consectetur adipisicing elit. La', '1683188346-rabbit.jpeg', 5, 200.00, 0),
(26, 14, '4531', 'ball', 'ipsum dolor sit amet consectetur adipisicing elit. Laboriosam facere, omnis fugiat nostrum rerum corrupti alias libero consectetur praesentium dicta itaque obcaecati quo dolores ducimus!</p>', '1683188365-ball.jpeg', 58, 80.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `admin` text NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `admin`, `username`, `email`, `password`) VALUES
(1, '', 'mohamad mahmoud', '7mmood0@gmail.com', 'Aa@99990000'),
(2, '', 'Omar ahmed', 'asd@gmail.com', 'Aa@99990000'),
(3, '', 'Ali Mohammed', 'test@gmail.com', 'Gg@112233'),
(4, '', 'khaled hassan', 'khaled hassan@.com', '1234567'),
(5, '1', 'nof', 'nof@gmail.com', '$2y$10$wldAsgNMz/A48WPX8IkI8OWYA/4uzFLzxkrntZQvQLhYif9AVtTtG'),
(6, '0', 'musa', 'mo@mo.com', '$2y$10$zBhEDsdsb1FmJHbs/HlPe.utOAbbT73F9WviXeW0jbKeBis.U/lSy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `productName` (`productName`),
  ADD UNIQUE KEY `productCode` (`productCode`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`) USING HASH;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
