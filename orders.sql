-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2024 at 05:43 AM
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
-- Database: `orders`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `TomotoBurgerQuantity` int(11) NOT NULL,
  `OnionBurgerQuantity` int(11) NOT NULL,
  `CheeseBurgerQuantity` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `province` varchar(255) NOT NULL,
  `tax_amount` decimal(10,2) NOT NULL,
  `total_price_with_tax` decimal(10,2) NOT NULL,
  `credit_card_number` varchar(255) NOT NULL,
  `expiry_month` varchar(255) NOT NULL,
  `expiry_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `TomotoBurgerQuantity`, `OnionBurgerQuantity`, `CheeseBurgerQuantity`, `total_price`, `province`, `tax_amount`, `total_price_with_tax`, `credit_card_number`, `expiry_month`, `expiry_year`) VALUES
(40, 'ARSHDEEP SINGH', 4, 0, 0, 20.00, 'ON', 2.60, 22.60, '1111-1111-1111-1111', 'JAN', '1020'),
(41, 'ARSHDEEP SINGH', 1, 4, 1, 42.00, 'ON', 5.46, 47.46, '1111-1111-1111-1111', 'JAN', '2026'),
(42, 'ARSHDEEP SINGH', 2, 1, 1, 26.00, 'ON', 3.38, 29.38, '1111-1111-1111-1111', 'JAN', '2026'),
(43, 'ARSHDEEP SINGH', 2, 2, 0, 24.00, 'ON', 3.12, 27.12, '1111-1111-1111-1111', 'JAN', '2022');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin_password', 'admin'),
(2, 'shop_manager', 'shop_manager', 'shop_manager'),
(11, 'Arsh', 'Arsh', 'shop_manager'),
(12, 'Karan', 'karan', 'shop_manager');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
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
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
