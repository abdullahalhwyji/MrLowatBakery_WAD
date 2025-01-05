-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2025 at 06:12 PM
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
  `category` varchar(100) NOT NULL,
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

INSERT INTO `products` (`product_id`, `name`, `category`, `description`, `price`, `stock`, `image_url`, `created_at`, `updated_at`) VALUES
(1, 'Tiered Sponge Cake (Vanilla)', 'Cake', 'A beautifully layered sponge cake, perfect for any celebration.', 70.00, 38, 'tiered_sponge_cake.jpg', '2025-01-03 19:00:57', '2025-01-05 16:49:33'),
(2, 'Tiered Sponge Cake (Chocolate)', 'Cake', 'A beautifully layered sponge cake, perfect for any celebration.', 70.00, 41, 'tiered_sponge_cake.jpg', '2025-01-03 19:00:57', '2025-01-05 15:11:27'),
(3, 'Tiered Sponge Cake (Red Velvet)', 'Cake', 'A beautifully layered sponge cake, perfect for any celebration.', 70.00, 38, 'tiered_sponge_cake.jpg', '2025-01-03 19:00:57', '2025-01-05 16:21:29'),
(4, 'Tiered Sponge Cake (Pandan)', 'Cake', 'A beautifully layered sponge cake, perfect for any celebration.', 70.00, 21, 'tiered_sponge_cake.jpg', '2025-01-03 19:00:57', '2025-01-05 16:21:34'),
(5, 'Apam @ Moist Cake (Vanilla)', 'Cake', 'Soft, moist cake with a traditional touch.', 30.00, 28, 'apam_cake.jpg', '2025-01-03 19:00:57', '2025-01-05 16:21:39'),
(6, 'Apam @ Moist Cake (Chocolate)', 'Cake', 'Soft, moist cake with a traditional touch.', 30.00, 30, 'apam_cake.jpg', '2025-01-03 19:00:57', '2025-01-05 16:21:45'),
(7, 'Apam @ Moist Cake (Red Velvet)', 'Cake', 'Soft, moist cake with a traditional touch.', 30.00, 48, 'apam_cake.jpg', '2025-01-03 19:00:57', '2025-01-05 16:21:52'),
(8, 'Apam @ Moist Cake (Pandan)', 'Cake', 'Soft, moist cake with a traditional touch.', 30.00, 38, 'apam_cake.jpg', '2025-01-03 19:00:57', '2025-01-05 16:21:56'),
(9, 'Bite Size Cake (Vanilla)', 'Cake', 'Small, flavorful cakes for bite-sized enjoyment.', 35.00, 29, 'bite_size_cake.jpg', '2025-01-03 19:00:57', '2025-01-05 16:22:01'),
(10, 'Bite Size Cake (Chocolate)', 'Cake', 'Small, flavorful cakes for bite-sized enjoyment.', 35.00, 39, 'bite_size_cake.jpg', '2025-01-03 19:00:57', '2025-01-05 16:22:07'),
(11, 'Bite Size Cake (Red Velvet)', 'Cake', 'Small, flavorful cakes for bite-sized enjoyment.', 35.00, 28, 'bite_size_cake.jpg', '2025-01-03 19:00:57', '2025-01-05 16:22:13'),
(12, 'Bite Size Cake (Pandan)', 'Cake', 'Small, flavorful cakes for bite-sized enjoyment.', 35.00, 33, 'bite_size_cake.jpg', '2025-01-03 19:00:57', '2025-01-05 16:22:17'),
(13, 'Sponge Cake Simple Decoration (Vanilla)', 'Cake', 'Classic sponge cake with a simple and elegant decoration.', 42.00, 32, 'simple_sponge_cake.jpg', '2025-01-03 19:00:57', '2025-01-05 16:22:22'),
(14, 'Sponge Cake Simple Decoration (Chocolate)', 'Cake', 'Classic sponge cake with a simple and elegant decoration.', 42.00, 43, 'simple_sponge_cake.jpg', '2025-01-03 19:00:57', '2025-01-05 16:22:27'),
(15, 'Sponge Cake Simple Decoration (Red Velvet)', 'Cake', 'Classic sponge cake with a simple and elegant decoration.', 42.00, 37, 'simple_sponge_cake.jpg', '2025-01-03 19:00:57', '2025-01-05 16:22:31'),
(16, 'Sponge Cake Simple Decoration (Pandan)', 'Cake', 'Classic sponge cake with a simple and elegant decoration.', 42.00, 37, 'simple_sponge_cake.jpg', '2025-01-03 19:00:57', '2025-01-05 16:22:36'),
(17, 'Mini Cupcakes 16 pieces (Vanilla)', 'Cupcakes', 'Delicious cupcakes with amazing designs.', 30.00, 26, 'mini_cupcakes_16.jpg', '2025-01-03 19:01:08', '2025-01-05 16:22:41'),
(18, 'Mini Cupcakes 16 pieces (Chocolate)', 'Cupcakes', 'Delicious cupcakes with amazing designs.', 30.00, 28, 'mini_cupcakes_16.jpg', '2025-01-03 19:01:08', '2025-01-05 16:22:47'),
(19, 'Mini Cupcakes 16 pieces (Red Velvet)', 'Cupcakes', 'Delicious cupcakes with amazing designs.', 30.00, 41, 'mini_cupcakes_16.jpg', '2025-01-03 19:01:08', '2025-01-05 16:22:52'),
(20, 'Mini Cupcakes 16 pieces (Pandan)', 'Cupcakes', 'Delicious cupcakes with amazing designs.', 30.00, 43, 'mini_cupcakes_16.jpg', '2025-01-03 19:01:08', '2025-01-05 16:22:57'),
(21, 'Mini Size Cupcakes 25 pieces (Vanilla)', 'Cupcakes', 'Delicious cupcakes with amazing designs.', 40.00, 45, 'mini_cupcakes_25.jpg', '2025-01-03 19:01:08', '2025-01-05 16:23:03'),
(22, 'Mini Size Cupcakes 25 pieces (Chocolate)', 'Cupcakes', 'Delicious cupcakes with amazing designs.', 40.00, 43, 'mini_cupcakes_25.jpg', '2025-01-03 19:01:08', '2025-01-05 16:23:09'),
(23, 'Mini Size Cupcakes 25 pieces (Red Velvet)', 'Cupcakes', 'Delicious cupcakes with amazing designs.', 40.00, 31, 'mini_cupcakes_25.jpg', '2025-01-03 19:01:08', '2025-01-05 16:23:15'),
(24, 'Mini Size Cupcakes 25 pieces (Pandan)', 'Cupcakes', 'Delicious cupcakes with amazing designs.', 40.00, 37, 'mini_cupcakes_25.jpg', '2025-01-03 19:01:08', '2025-01-05 16:23:21'),
(25, 'Normal Cupcakes 16 pieces (Vanilla)', 'Cupcakes', 'Delicious cupcakes with amazing designs.', 48.00, 43, 'normal_cupcakes.jpg', '2025-01-03 19:01:08', '2025-01-05 16:23:27'),
(26, 'Normal Cupcakes 16 pieces (Chocolate)', 'Cupcakes', 'Delicious cupcakes with amazing designs.', 48.00, 26, 'normal_cupcakes.jpg', '2025-01-03 19:01:08', '2025-01-05 16:23:35'),
(27, 'Normal Cupcakes 16 pieces (Red Velvet)', 'Cupcakes', 'Delicious cupcakes with amazing designs.', 48.00, 39, 'normal_cupcakes.jpg', '2025-01-03 19:01:08', '2025-01-05 16:23:40'),
(28, 'Normal Cupcakes 16 pieces (Pandan)', 'Cupcakes', 'Delicious cupcakes with amazing designs.', 48.00, 39, 'normal_cupcakes.jpg', '2025-01-03 19:01:08', '2025-01-05 16:23:45'),
(29, 'Normal Size Cupcakes 25 pieces (Vanilla)', 'Cupcakes', 'Delicious cupcakes with amazing designs.', 60.80, 30, 'normal_cupcakes_25.jpg', '2025-01-03 19:01:08', '2025-01-05 16:23:50'),
(30, 'Normal Size Cupcakes 25 pieces (Chocolate)', 'Cupcakes', 'Delicious cupcakes with amazing designs.', 60.80, 40, 'normal_cupcakes_25.jpg', '2025-01-03 19:01:08', '2025-01-05 16:23:55'),
(31, 'Normal Size Cupcakes 25 pieces (Red Velvet)', 'Cupcakes', 'Delicious cupcakes with amazing designs.', 60.80, 34, 'normal_cupcakes_25.jpg', '2025-01-03 19:01:08', '2025-01-05 16:23:59'),
(32, 'Normal Size Cupcakes 25 pieces (Pandan)', 'Cupcakes', 'Delicious cupcakes with amazing designs.', 60.80, 29, 'normal_cupcakes_25.jpg', '2025-01-03 19:01:08', '2025-01-05 16:24:04'),
(33, 'Mini Cheese Tart (Original)', 'Tart', 'Choose your favorite flavor with different topping options.', 43.00, 22, 'mini_cheese_tart.jpg', '2025-01-03 19:01:18', '2025-01-05 16:24:09'),
(34, 'Mini Cheese Tart (Nutella)', 'Tart', 'Choose your favorite flavor with different topping options.', 43.00, 36, 'mini_cheese_tart.jpg', '2025-01-03 19:01:18', '2025-01-05 16:24:14'),
(35, 'Mini Cheese Tart (Cadbury)', 'Tart', 'Choose your favorite flavor with different topping options.', 43.00, 32, 'mini_cheese_tart.jpg', '2025-01-03 19:01:18', '2025-01-05 16:24:20'),
(36, 'Mini Cheese Tart (Mix and Match)', 'Tart', 'Choose your favorite flavor and mix and match different toppings.', 43.00, 35, 'mini_cheese_tart.jpg', '2025-01-03 19:01:18', '2025-01-05 16:24:31'),
(37, 'Giant Cheese Tart (6 inch - Original)', 'Tart', 'Includes mini tarts.', 58.00, 30, 'giant_cheese_tart.jpg', '2025-01-03 19:01:18', '2025-01-05 16:24:37'),
(38, 'Giant Cheese Tart (6 inch - Nutella)', 'Tart', 'Includes mini tarts.', 58.00, 24, 'giant_cheese_tart.jpg', '2025-01-03 19:01:18', '2025-01-05 16:24:42'),
(39, 'Giant Cheese Tart (7 inch - Cadbury)', 'Tart', 'Includes mini tarts.', 68.00, 39, 'giant_cheese_tart_7inch.jpg', '2025-01-03 19:01:18', '2025-01-05 16:24:48'),
(40, 'Giant Cheese Tart (7 inch - Original)', 'Tart', 'Includes mini tarts.', 68.00, 45, 'giant_cheese_tart_7inch.jpg', '2025-01-03 19:01:18', '2025-01-05 16:24:53'),
(41, '6 Inch Brownies (Chocolate)', 'Brownies', 'Various topping choices and can add on your own deco/topper.', 25.00, 30, 'brownies_6inch.jpg', '2025-01-03 19:01:24', '2025-01-05 16:25:00'),
(42, '6 Inch Brownies (Nutella)', 'Brownies', 'Various topping choices and can add on your own deco/topper.', 27.00, 24, 'brownies_6inch.jpg', '2025-01-03 19:01:24', '2025-01-05 16:25:08'),
(43, '6 Inch Brownies (Cream Cheese)', 'Brownies', 'Various topping choices and can add on your own deco/topper.', 30.00, 43, 'brownies_6inch.jpg', '2025-01-03 19:01:24', '2025-01-05 16:25:14'),
(44, '6 Inch Brownies (Nuts)', 'Brownies', 'Various topping choices and can add on your own deco/topper.', 32.00, 30, 'brownies_6inch.jpg', '2025-01-03 19:01:24', '2025-01-05 16:25:20'),
(45, '8 Inch Brownies (Chocolate)', 'Brownies', 'Various topping choices and can add on your own deco/topper.', 35.00, 33, 'brownies_8inch.jpg', '2025-01-03 19:01:24', '2025-01-05 16:25:26'),
(46, '8 Inch Brownies (Nutella)', 'Brownies', 'Various topping choices and can add on your own deco/topper.', 38.00, 24, 'brownies_8inch.jpg', '2025-01-03 19:01:24', '2025-01-05 16:25:31'),
(47, '8 Inch Brownies (Cream Cheese)', 'Brownies', 'Various topping choices and can add on your own deco/topper.', 45.00, 34, 'brownies_8inch.jpg', '2025-01-03 19:01:24', '2025-01-05 16:25:38'),
(48, '8 Inch Brownies (Nuts)', 'Brownies', 'Various topping choices and can add on your own deco/topper.', 48.00, 49, 'brownies_8inch.jpg', '2025-01-03 19:01:24', '2025-01-05 16:25:43'),
(49, 'Classic Burned Cheesecake', 'Burned Cheesecake', 'Rich and creamy cheesecake with a caramelized top.', 40.00, 31, 'burnt_cheesecake_6inch.jpg', '2025-01-03 19:01:33', '2025-01-05 16:25:48'),
(50, 'Custom Design Classic Burned Cheesecake', 'Burned Cheesecake', 'Design your own cheesecake with a caramelized top.', 55.00, 49, 'burnt_cheesecake_6inch.jpg', '2025-01-03 19:01:33', '2025-01-05 16:25:53'),
(51, 'Dessert Table Package A', 'Special Promotion', 'Combination of Mini Cheese Tart, Moist Cake, Burnt Cheesecake, and Mini Cupcakes at a discounted price.', 145.00, 41, 'promotionA.jpg', '2025-01-03 19:01:41', '2025-01-05 16:25:59'),
(52, 'Dessert Table Package B', 'Special Promotion', 'Combination of Sponge Cake, Mini Cheese Tart, Cream Puff, and Roti Sosej at a discounted price.', 175.00, 42, 'promotionB.jpg', '2025-01-03 19:01:41', '2025-01-05 16:26:04'),
(53, 'Dessert Table Package C', 'Special Promotion', 'Combination of Sponge Cake, Moist Cake, Cream Puff, and Cheese Tart at a discounted price.', 145.00, 35, 'promotionC.jpg', '2025-01-03 19:01:41', '2025-01-05 16:26:10'),
(54, 'Dessert Table Package D', 'Special Promotion', 'Combination of Bite-size Cake, Moist Cake, Burnt Cheesecake, and Mini Cupcakes at a discounted price.', 140.00, 30, 'promotionD.jpg', '2025-01-03 19:01:41', '2025-01-05 16:26:17'),
(55, 'Dessert Table Package E', 'Special Promotion', 'Combination of Mini Cheese Tart, Bite-size Cake, Cream Puff, and Fruit Tart at a discounted price.', 135.00, 27, 'promotionE.jpg', '2025-01-03 19:01:41', '2025-01-05 16:26:23'),
(56, 'Dessert Table Package F', 'Special Promotion', 'Combination of Sponge Cake, Moist Cake, Cream Puff, and Cheese Tart at a discounted price.', 125.00, 23, 'promotionF.jpg', '2025-01-03 19:01:41', '2025-01-05 16:26:28'),
(57, 'Dessert Table Package G', 'Special Promotion', 'Combination of Bite-size Cake, Moist Cake, Cream Puff, and Cheese Tart at a discounted price.', 117.00, 47, 'promotionG.jpg', '2025-01-03 19:01:41', '2025-01-05 16:26:35');

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
(1, 'Mr Lowat Bakery Admin', 'mrlowatbakery@gmail.com', '$2y$10$1azBcBvC28vu5gaJZx5RU.HH.AMoVDTL3yH9pUrxJkkvCY4.KonNa', 'Blok E, Intan Kampus Sarawak, Jln Datuk Mohammad Musa, Kampung Sigitin, 94300 Kota Samarahan, Sarawak', '0164025451', 'admin', '2024-12-20 02:15:30', '2025-01-05 13:57:31'),
(2, 'Kahar Bin Abu Yamin', 'kaharbechik00@gmail.com', '$2y$10$1azBcBvC28vu5gaJZx5RU.HH.AMoVDTL3yH9pUrxJkkvCY4.KonNa', 'Lot 45, Taman Samarindah, Kota Samarahan, Sarawak', '0128943215', 'member', '2024-12-25 06:20:00', '2025-01-05 13:57:36'),
(3, 'Elvis Anak Merikan', 'elvsmrk80@gmail.com', '$2y$10$1azBcBvC28vu5gaJZx5RU.HH.AMoVDTL3yH9pUrxJkkvCY4.KonNa', 'No. 55, Lorong Taman Berlian, Kota Samarahan, Sarawak', '0147896533', 'member', '2024-12-27 03:45:00', '2025-01-05 13:57:40'),
(4, 'Nabila Alyana Binti Hassan', 'alyanacty03@yahoo.com', '$2y$10$1azBcBvC28vu5gaJZx5RU.HH.AMoVDTL3yH9pUrxJkkvCY4.KonNa', 'Lot 12, Lor Uni Garden 12K, Kota Samarahan, Sarawak', '0134569874', 'member', '2025-01-01 08:00:00', '2025-01-05 13:57:44'),
(5, 'Aaron Anak Jaylang', 'aajaylang@gmail.com', '$2y$10$1azBcBvC28vu5gaJZx5RU.HH.AMoVDTL3yH9pUrxJkkvCY4.KonNa', 'Lot. 101, Lorong Muara Tuang Park 3, Kota Samarahan, Sarawak', '0151234567', 'member', '2025-01-02 00:30:00', '2025-01-05 13:57:47'),
(7, 'demo loni xsupo mulo', 'test@gmail.com', '$2y$10$1azBcBvC28vu5gaJZx5RU.HH.AMoVDTL3yH9pUrxJkkvCY4.KonNa', 'test la gapo2', '0109640790', 'member', '2025-01-05 13:57:06', '2025-01-05 14:33:13'),
(8, 'test2', 'test2@gmail.com', '$2y$10$KFanHE9A1dBO97hKOejYIOPDWZLMM7TO0IvKThNHzzxpmDWF9V02K', 'test2', '0109640790', 'member', '2025-01-05 13:59:08', '2025-01-05 13:59:08');

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
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
