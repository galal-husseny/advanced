-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2022 at 07:21 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `advanced`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(9,2) NOT NULL,
  `quantity` tinyint(3) NOT NULL,
  `image` varchar(50) NOT NULL DEFAULT 'default.jpg',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `quantity`, `image`, `created_at`, `updated_at`) VALUES
(2, 'mobile', '15000.00', 20, 'default.jpg', '2022-01-28 12:30:57', '2022-01-28 12:49:30'),
(3, 'laptop', '5000.00', 10, 'default.jpg', '2022-01-28 12:31:03', '2022-01-28 12:31:03'),
(4, 'laptop', '5000.00', 10, 'default.jpg', '2022-01-28 12:32:00', '2022-01-28 12:32:00'),
(5, 'laptop', '5000.00', 10, 'default.jpg', '2022-01-28 12:32:07', '2022-01-28 12:32:07'),
(6, 'laptop', '5000.00', 10, 'default.jpg', '2022-01-28 12:32:07', '2022-01-28 12:32:07'),
(7, 'laptop', '5000.00', 10, 'default.jpg', '2022-01-28 12:32:07', '2022-01-28 12:32:07'),
(8, 'laptop', '5000.00', 10, 'default.jpg', '2022-01-28 12:32:07', '2022-01-28 12:32:07'),
(9, 'laptop', '5000.00', 10, 'default.jpg', '2022-01-28 12:32:08', '2022-01-28 12:32:08'),
(11, 'laptop', '5000.00', 10, 'default.jpg', '2022-01-28 12:32:31', '2022-01-28 12:32:31'),
(12, 'laptop', '5000.00', 10, 'default.jpg', '2022-01-28 12:32:33', '2022-01-28 12:32:33'),
(13, 'laptop', '5000.00', 10, 'default.jpg', '2022-01-28 12:32:35', '2022-01-28 12:32:35'),
(14, 'laptop', '5000.00', 10, 'default.jpg', '2022-01-28 12:34:28', '2022-01-28 12:34:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
