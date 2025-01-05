-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2025 at 08:35 PM
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
-- Database: `mrlowatbakery`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `delivery_method` enum('selfpickup','delivery') NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `order_status` enum('pending','completed','cancelled') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `delivery_method`, `total_price`, `order_status`, `created_at`) VALUES
(1, 1, 'delivery', 70.00, 'completed', '2024-12-21 03:15:30'),
(2, 2, 'selfpickup', 30.00, 'completed', '2024-12-25 07:20:00'),
(3, 3, 'delivery', 35.00, 'completed', '2024-12-27 04:45:00'),
(4, 4, 'selfpickup', 42.00, 'cancelled', '2025-01-01 09:00:00'),
(5, 5, 'delivery', 60.80, 'completed', '2025-01-02 01:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_item_id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(1, 1, 1, 1, 70.00),
(2, 2, 5, 1, 30.00),
(3, 3, 10, 2, 70.00),
(4, 4, 14, 1, 42.00),
(5, 5, 17, 1, 60.80);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) DEFAULT 0,
  `image_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `description`, `price`, `stock`, `image_url`, `created_at`, `updated_at`) VALUES
(1, 'Tiered Sponge Cake (Vanilla)', 'A beautifully layered sponge cake, perfect for any celebration.', 70.00, 38, 'images/tiered_sponge_cake.jpg', '2025-01-03 19:00:57', '2025-01-03 19:00:57'),
(2, 'Tiered Sponge Cake (Chocolate)', 'A beautifully layered sponge cake, perfect for any celebration.', 70.00, 41, 'images/tiered_sponge_cake.jpg', '2025-01-03 19:00:57', '2025-01-03 19:00:57'),
(3, 'Tiered Sponge Cake (Red Velvet)', 'A beautifully layered sponge cake, perfect for any celebration.', 70.00, 38, 'images/tiered_sponge_cake.jpg', '2025-01-03 19:00:57', '2025-01-03 19:00:57'),
(4, 'Tiered Sponge Cake (Pandan)', 'A beautifully layered sponge cake, perfect for any celebration.', 70.00, 21, 'images/tiered_sponge_cake.jpg', '2025-01-03 19:00:57', '2025-01-03 19:00:57'),
(5, 'Apam @ Moist Cake (Vanilla)', 'Soft, moist cake with a traditional touch.', 30.00, 28, 'images/apam_cake.jpg', '2025-01-03 19:00:57', '2025-01-03 19:00:57'),
(6, 'Apam @ Moist Cake (Chocolate)', 'Soft, moist cake with a traditional touch.', 30.00, 30, 'images/apam_cake.jpg', '2025-01-03 19:00:57', '2025-01-03 19:00:57'),
(7, 'Apam @ Moist Cake (Red Velvet)', 'Soft, moist cake with a traditional touch.', 30.00, 48, 'images/apam_cake.jpg', '2025-01-03 19:00:57', '2025-01-03 19:00:57'),
(8, 'Apam @ Moist Cake (Pandan)', 'Soft, moist cake with a traditional touch.', 30.00, 38, 'images/apam_cake.jpg', '2025-01-03 19:00:57', '2025-01-03 19:00:57'),
(9, 'Bite Size Cake (Vanilla)', 'Small, flavorful cakes for bite-sized enjoyment.', 35.00, 29, 'images/bite_size_cake.jpg', '2025-01-03 19:00:57', '2025-01-03 19:00:57'),
(10, 'Bite Size Cake (Chocolate)', 'Small, flavorful cakes for bite-sized enjoyment.', 35.00, 39, 'images/bite_size_cake.jpg', '2025-01-03 19:00:57', '2025-01-03 19:00:57'),
(11, 'Bite Size Cake (Red Velvet)', 'Small, flavorful cakes for bite-sized enjoyment.', 35.00, 28, 'images/bite_size_cake.jpg', '2025-01-03 19:00:57', '2025-01-03 19:00:57'),
(12, 'Bite Size Cake (Pandan)', 'Small, flavorful cakes for bite-sized enjoyment.', 35.00, 33, 'images/bite_size_cake.jpg', '2025-01-03 19:00:57', '2025-01-03 19:00:57'),
(13, 'Sponge Cake Simple Decoration (Vanilla)', 'Classic sponge cake with a simple and elegant decoration.', 42.00, 32, 'images/simple_sponge_cake.jpg', '2025-01-03 19:00:57', '2025-01-03 19:00:57'),
(14, 'Sponge Cake Simple Decoration (Chocolate)', 'Classic sponge cake with a simple and elegant decoration.', 42.00, 43, 'images/simple_sponge_cake.jpg', '2025-01-03 19:00:57', '2025-01-03 19:00:57'),
(15, 'Sponge Cake Simple Decoration (Red Velvet)', 'Classic sponge cake with a simple and elegant decoration.', 42.00, 37, 'images/simple_sponge_cake.jpg', '2025-01-03 19:00:57', '2025-01-03 19:00:57'),
(16, 'Sponge Cake Simple Decoration (Pandan)', 'Classic sponge cake with a simple and elegant decoration.', 42.00, 37, 'images/simple_sponge_cake.jpg', '2025-01-03 19:00:57', '2025-01-03 19:00:57'),
(17, 'Mini Cupcakes 16 pieces (Vanilla)', 'Delicious cupcakes with amazing designs.', 30.00, 26, 'images/mini_cupcakes_16.jpg', '2025-01-03 19:01:08', '2025-01-03 19:01:08'),
(18, 'Mini Cupcakes 16 pieces (Chocolate)', 'Delicious cupcakes with amazing designs.', 30.00, 28, 'images/mini_cupcakes_16.jpg', '2025-01-03 19:01:08', '2025-01-03 19:01:08'),
(19, 'Mini Cupcakes 16 pieces (Red Velvet)', 'Delicious cupcakes with amazing designs.', 30.00, 41, 'images/mini_cupcakes_16.jpg', '2025-01-03 19:01:08', '2025-01-03 19:01:08'),
(20, 'Mini Cupcakes 16 pieces (Pandan)', 'Delicious cupcakes with amazing designs.', 30.00, 43, 'images/mini_cupcakes_16.jpg', '2025-01-03 19:01:08', '2025-01-03 19:01:08'),
(21, 'Mini Size Cupcakes 25 pieces (Vanilla)', 'Delicious cupcakes with amazing designs.', 40.00, 45, 'images/mini_cupcakes_25.jpg', '2025-01-03 19:01:08', '2025-01-03 19:01:08'),
(22, 'Mini Size Cupcakes 25 pieces (Chocolate)', 'Delicious cupcakes with amazing designs.', 40.00, 43, 'images/mini_cupcakes_25.jpg', '2025-01-03 19:01:08', '2025-01-03 19:01:08'),
(23, 'Mini Size Cupcakes 25 pieces (Red Velvet)', 'Delicious cupcakes with amazing designs.', 40.00, 31, 'images/mini_cupcakes_25.jpg', '2025-01-03 19:01:08', '2025-01-03 19:01:08'),
(24, 'Mini Size Cupcakes 25 pieces (Pandan)', 'Delicious cupcakes with amazing designs.', 40.00, 37, 'images/mini_cupcakes_25.jpg', '2025-01-03 19:01:08', '2025-01-03 19:01:08'),
(25, 'Normal Cupcakes 16 pieces (Vanilla)', 'Delicious cupcakes with amazing designs.', 48.00, 43, 'images/normal_cupcakes.jpg', '2025-01-03 19:01:08', '2025-01-03 19:01:08'),
(26, 'Normal Cupcakes 16 pieces (Chocolate)', 'Delicious cupcakes with amazing designs.', 48.00, 26, 'images/normal_cupcakes.jpg', '2025-01-03 19:01:08', '2025-01-03 19:01:08'),
(27, 'Normal Cupcakes 16 pieces (Red Velvet)', 'Delicious cupcakes with amazing designs.', 48.00, 39, 'images/normal_cupcakes.jpg', '2025-01-03 19:01:08', '2025-01-03 19:01:08'),
(28, 'Normal Cupcakes 16 pieces (Pandan)', 'Delicious cupcakes with amazing designs.', 48.00, 39, 'images/normal_cupcakes.jpg', '2025-01-03 19:01:08', '2025-01-03 19:01:08'),
(29, 'Normal Size Cupcakes 25 pieces (Vanilla)', 'Delicious cupcakes with amazing designs.', 60.80, 30, 'images/normal_cupcakes_25.jpg', '2025-01-03 19:01:08', '2025-01-03 19:01:08'),
(30, 'Normal Size Cupcakes 25 pieces (Chocolate)', 'Delicious cupcakes with amazing designs.', 60.80, 40, 'images/normal_cupcakes_25.jpg', '2025-01-03 19:01:08', '2025-01-03 19:01:08'),
(31, 'Normal Size Cupcakes 25 pieces (Red Velvet)', 'Delicious cupcakes with amazing designs.', 60.80, 34, 'images/normal_cupcakes_25.jpg', '2025-01-03 19:01:08', '2025-01-03 19:01:08'),
(32, 'Normal Size Cupcakes 25 pieces (Pandan)', 'Delicious cupcakes with amazing designs.', 60.80, 29, 'images/normal_cupcakes_25.jpg', '2025-01-03 19:01:08', '2025-01-03 19:01:08'),
(33, 'Mini Cheese Tart (Original)', 'Choose your favorite flavor with different topping options.', 43.00, 22, 'images/mini_cheese_tart.jpg', '2025-01-03 19:01:18', '2025-01-03 19:01:18'),
(34, 'Mini Cheese Tart (Nutella)', 'Choose your favorite flavor with different topping options.', 43.00, 36, 'images/mini_cheese_tart.jpg', '2025-01-03 19:01:18', '2025-01-03 19:01:18'),
(35, 'Mini Cheese Tart (Cadbury)', 'Choose your favorite flavor with different topping options.', 43.00, 32, 'images/mini_cheese_tart.jpg', '2025-01-03 19:01:18', '2025-01-03 19:01:18'),
(36, 'Mini Cheese Tart (Mix and Match)', 'Choose your favorite flavor and mix and match different toppings.', 43.00, 35, 'images/mini_cheese_tart.jpg', '2025-01-03 19:01:18', '2025-01-03 19:01:18'),
(37, 'Giant Cheese Tart (6 inch - Original)', 'Includes mini tarts.', 58.00, 30, 'images/giant_cheese_tart.jpg', '2025-01-03 19:01:18', '2025-01-03 19:01:18'),
(38, 'Giant Cheese Tart (6 inch - Nutella)', 'Includes mini tarts.', 58.00, 24, 'images/giant_cheese_tart.jpg', '2025-01-03 19:01:18', '2025-01-03 19:01:18'),
(39, 'Giant Cheese Tart (7 inch - Cadbury)', 'Includes mini tarts.', 68.00, 39, 'images/giant_cheese_tart_7inch.jpg', '2025-01-03 19:01:18', '2025-01-03 19:01:18'),
(40, 'Giant Cheese Tart (7 inch - Original)', 'Includes mini tarts.', 68.00, 45, 'images/giant_cheese_tart_7inch.jpg', '2025-01-03 19:01:18', '2025-01-03 19:01:18'),
(41, '6 Inch Brownies (Chocolate)', 'Various topping choices and can add on your own deco/topper.', 25.00, 30, 'images/brownies_6inch.jpg', '2025-01-03 19:01:24', '2025-01-03 19:01:24'),
(42, '6 Inch Brownies (Nutella)', 'Various topping choices and can add on your own deco/topper.', 27.00, 24, 'images/brownies_6inch.jpg', '2025-01-03 19:01:24', '2025-01-03 19:01:24'),
(43, '6 Inch Brownies (Cream Cheese)', 'Various topping choices and can add on your own deco/topper.', 30.00, 43, 'images/brownies_6inch.jpg', '2025-01-03 19:01:24', '2025-01-03 19:01:24'),
(44, '6 Inch Brownies (Nuts)', 'Various topping choices and can add on your own deco/topper.', 32.00, 30, 'images/brownies_6inch.jpg', '2025-01-03 19:01:24', '2025-01-03 19:01:24'),
(45, '8 Inch Brownies (Chocolate)', 'Various topping choices and can add on your own deco/topper.', 35.00, 33, 'images/brownies_8inch.jpg', '2025-01-03 19:01:24', '2025-01-03 19:01:24'),
(46, '8 Inch Brownies (Nutella)', 'Various topping choices and can add on your own deco/topper.', 38.00, 24, 'images/brownies_8inch.jpg', '2025-01-03 19:01:24', '2025-01-03 19:01:24'),
(47, '8 Inch Brownies (Cream Cheese)', 'Various topping choices and can add on your own deco/topper.', 45.00, 34, 'images/brownies_8inch.jpg', '2025-01-03 19:01:24', '2025-01-03 19:01:24'),
(48, '8 Inch Brownies (Nuts)', 'Various topping choices and can add on your own deco/topper.', 48.00, 49, 'images/brownies_8inch.jpg', '2025-01-03 19:01:24', '2025-01-03 19:01:24'),
(49, 'Classic Burned Cheesecake', 'Rich and creamy cheesecake with a caramelized top.', 40.00, 31, 'images/burnt_cheesecake_6inch.jpg', '2025-01-03 19:01:33', '2025-01-03 19:01:33'),
(50, 'Custom Design Classic Burned Cheesecake', 'Design your own cheesecake with a caramelized top.', 55.00, 49, 'images/burnt_cheesecake_6inch.jpg', '2025-01-03 19:01:33', '2025-01-03 19:01:33'),
(51, 'Dessert Table Package A', 'Combination of Mini Cheese Tart, Moist Cake, Burnt Cheesecake, and Mini Cupcakes at a discounted price.', 145.00, 41, 'images/promotionA.jpg', '2025-01-03 19:01:41', '2025-01-03 19:01:41'),
(52, 'Dessert Table Package B', 'Combination of Sponge Cake, Mini Cheese Tart, Cream Puff, and Roti Sosej at a discounted price.', 175.00, 42, 'images/promotionB.jpg', '2025-01-03 19:01:41', '2025-01-03 19:01:41'),
(53, 'Dessert Table Package C', 'Combination of Sponge Cake, Moist Cake, Cream Puff, and Cheese Tart at a discounted price.', 145.00, 35, 'images/promotionC.jpg', '2025-01-03 19:01:41', '2025-01-03 19:01:41'),
(54, 'Dessert Table Package D', 'Combination of Bite-size Cake, Moist Cake, Burnt Cheesecake, and Mini Cupcakes at a discounted price.', 140.00, 30, 'images/promotionD.jpg', '2025-01-03 19:01:41', '2025-01-03 19:01:41'),
(55, 'Dessert Table Package E', 'Combination of Mini Cheese Tart, Bite-size Cake, Cream Puff, and Fruit Tart at a discounted price.', 135.00, 27, 'images/promotionE.jpg', '2025-01-03 19:01:41', '2025-01-03 19:01:41'),
(56, 'Dessert Table Package F', 'Combination of Sponge Cake, Moist Cake, Cream Puff, and Cheese Tart at a discounted price.', 125.00, 23, 'images/promotionF.jpg', '2025-01-03 19:01:41', '2025-01-03 19:01:41'),
(57, 'Dessert Table Package G', 'Combination of Bite-size Cake, Moist Cake, Cream Puff, and Cheese Tart at a discounted price.', 117.00, 47, 'images/promotionG.jpg', '2025-01-03 19:01:41', '2025-01-03 19:01:41');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `payment_method` enum('debit_card','e_wallet','qr_pay') NOT NULL,
  `payment_status` enum('success','failure','pending') DEFAULT 'pending',
  `transaction_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `order_id`, `payment_method`, `payment_status`, `transaction_date`) VALUES
(1, 1, 'debit_card', 'success', '2024-12-21 04:45:30'),
(2, 2, 'e_wallet', 'success', '2024-12-25 08:30:00'),
(3, 3, 'qr_pay', 'success', '2024-12-27 06:15:00'),
(4, 4, 'debit_card', 'failure', '2025-01-01 10:30:00'),
(5, 5, 'e_wallet', 'pending', '2025-01-02 02:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `role` enum('member','admin') NOT NULL DEFAULT 'member',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `address`, `tel`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Mr Lowat Bakery Admin', 'mrlowatbakery@gmail.com', 'LwtBker?2019@', 'Blok E, Intan Kampus Sarawak, Jln Datuk Mohammad Musa, Kampung Sigitin, 94300 Kota Samarahan, Sarawak', '0164025451', 'admin', '2024-12-20 02:15:30', '2025-01-03 19:29:39'),
(2, 'Kahar Bin Abu Yamin', 'kaharbechik00@gmail.com', 'Khr!Bck23', 'Lot 45, Taman Samarindah, Kota Samarahan, Sarawak', '0128943215', 'member', '2024-12-25 06:20:00', '2024-12-22 01:45:50'),
(3, 'Elvis Anak Merikan', 'elvsmrk80@gmail.com', 'Elv!smR12', 'No. 55, Lorong Taman Berlian, Kota Samarahan, Sarawak', '0147896533', 'member', '2024-12-27 03:45:00', '2024-12-28 05:30:10'),
(4, 'Nabila Alyana Binti Hassan', 'alyanacty03@yahoo.com', 'N4bilaH@55', 'Lot 12, Lor Uni Garden 12K, Kota Samarahan, Sarawak', '0134569874', 'member', '2025-01-01 08:00:00', '2025-01-03 19:34:00'),
(5, 'Aaron Anak Jaylang', 'aajaylang@gmail.com', 'A@ron!23#Lang', 'Lot. 101, Lorong Muara Tuang Park 3, Kota Samarahan, Sarawak', '0151234567', 'member', '2025-01-02 00:30:00', '2025-01-03 19:34:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `idx_order_status` (`order_status`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
