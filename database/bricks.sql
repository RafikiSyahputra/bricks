-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2024 at 05:41 AM
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
-- Database: `bricks`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id_cart` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `banyak` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id_cart`, `user_id`, `product_id`, `banyak`, `total`) VALUES
(21, 13, 9, 1, 35000);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `slug`) VALUES
(8, 'Karakter', 'karakter'),
(9, 'Bangunan', 'bangunan'),
(10, 'Tumbuhan', 'tumbuhan'),
(11, 'Buah-Buahan', 'buah-buahan');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_product` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `unit` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `descriptions` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `stock` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_product`, `product_name`, `unit`, `price`, `descriptions`, `category_id`, `stock`) VALUES
(9, 'Mario Bros', 1000, '35000', '<p>Setelah kamu berhasil merakitnya, jangan lupa untuk mencarikan tuan putrinya yaaa!!!!</p>\r\n', 8, '1'),
(10, 'Menara Eifel', 1000, '32000', '<p>Replika Menara Eifel dari Prancis Yang Melambangkan Keromantisan, Mungkin ada hal menarik selain itu?</p>\r\n', 9, '0'),
(11, 'Bunga Melati', 1000, '30000', '<p>&quot;Putih belum tentu putih, hitam belum tentu&nbsp;hitam&quot;</p>\r\n', 10, '23'),
(12, 'Buah', 1000, '30000', '<p>Bentuk Buah Aja Sih, Jangan Lupa Dipilih Ya</p>\r\n', 11, '17'),
(13, 'Taj Mahal', 1000, '35000', '<p>Menara Taj Mahal terletak di negara India. Mungkin agak kejauhan jika kamu mengunjungi kalau&nbsp;berjalan kaki, tetapi Hey kamu bisa memiliki Taj Mahal dengan harga 35000</p>\r\n', 9, '17'),
(14, 'Bunga Apa Ya?', 1000, '30000', '<p>Kasih tau admin ini bunga apa di whatsapp ya</p>\r\n', 10, '16'),
(15, 'Kastil Nuansa Jepang', 1000, '39000', '<p>Populasi Jepang yang kian menurun membuat kami menjual Bricks Kastil Nuansa Jepang dikarenakan kamulah yang akan merawat, menjaga, melestarikan kastil tersebut</p>\r\n', 9, '30'),
(16, 'hahahha', 1000, '90000', '<p>asdas</p>\r\n', 8, '23');

-- --------------------------------------------------------

--
-- Table structure for table `products_galleries`
--

CREATE TABLE `products_galleries` (
  `id_gallery` int(11) NOT NULL,
  `photos` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products_galleries`
--

INSERT INTO `products_galleries` (`id_gallery`, `photos`, `product_id`) VALUES
(0, '6643351965c7e.jpg', 9),
(0, '66433521ec0c1.jpg', 10),
(0, '6643352a7ed62.jpg', 11),
(0, '66433565850a1.jpg', 12),
(0, '6643365c45b91.jpg', 13),
(0, '664336636cc8d.jpg', 14),
(0, '6643372b40894.jpg', 15),
(0, '66439a201e08a.png', 16);

-- --------------------------------------------------------

--
-- Table structure for table `rekening_numbers`
--

CREATE TABLE `rekening_numbers` (
  `id_rekening` int(11) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `rekening_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rekening_numbers`
--

INSERT INTO `rekening_numbers` (`id_rekening`, `bank_name`, `number`, `rekening_name`) VALUES
(1, 'DANA', '082285724174', 'Rafiki Syahputra'),
(2, 'GOPAY', '082285724174', 'Rafiki Syahputra'),
(3, 'ShopeePay', '082285724174', 'Rafiki Syahputra');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id_transaction` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `rekening_id` int(11) NOT NULL,
  `transaction_status` varchar(255) NOT NULL,
  `weight_total` int(11) NOT NULL,
  `delivered` int(11) NOT NULL,
  `photo_transaction` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `time_arrived` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id_transaction`, `user_id`, `total_price`, `city`, `rekening_id`, `transaction_status`, `weight_total`, `delivered`, `photo_transaction`, `code`, `receiver`, `time_arrived`, `created_at`) VALUES
(6, 13, 40000, 'JAKARTA', 1, 'TERKIRIM', 1000, 0, '66431fe05f75d.png', 'BRICKS-33665', 'ajo', '2024-05-14 08:30:08', '2024-03-05 14:05:59'),
(7, 13, 32000, 'Pekanbaru', 1, 'BELUM KONFIRMASI', 1000, 0, '', 'BRICKS-46754', '', NULL, '2024-05-14 12:03:11'),
(8, 13, 96000, 'pekanbaru', 1, 'TERKONFIRMASI', 3000, 0, '66435c4b23497.jpg', 'BRICKS-8360', '', NULL, '2024-05-14 12:42:30'),
(9, 13, 192000, 'pekanbaru', 1, 'TERKONFIRMASI', 6000, 0, '66436fc813272.jpg', 'BRICKS-35718', '', NULL, '2024-05-14 14:05:42'),
(10, 13, 39000, 'jembut', 2, 'BELUM KONFIRMASI', 1000, 0, '', 'BRICKS-48332', '', NULL, '2024-05-14 16:55:04');

-- --------------------------------------------------------

--
-- Table structure for table `transactions_details`
--

CREATE TABLE `transactions_details` (
  `id_transaction_detail` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `banyak` int(11) NOT NULL,
  `code_product` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions_details`
--

INSERT INTO `transactions_details` (`id_transaction_detail`, `transaction_id`, `product_id`, `price`, `banyak`, `code_product`) VALUES
(1, 1, 4, 50000, 1, 'PRD-32819'),
(2, 2, 2, 35000, 1, 'PRD-52331'),
(3, 3, 7, 45000, 1, 'PRD-4749'),
(4, 3, 6, 60000, 1, 'PRD-4749'),
(5, 4, 7, 45000, 1, 'PRD-86345'),
(6, 5, 1, 40000, 1, 'PRD-17710'),
(7, 6, 1, 40000, 1, 'PRD-61230'),
(8, 7, 10, 32000, 1, 'PRD-82818'),
(9, 8, 10, 32000, 3, 'PRD-79155'),
(10, 9, 10, 32000, 6, 'PRD-40491'),
(11, 10, 15, 39000, 1, 'PRD-799');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `phone_number` varchar(255) NOT NULL,
  `postal_code` varchar(191) NOT NULL,
  `roles` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `name`, `email`, `password`, `address`, `phone_number`, `postal_code`, `roles`) VALUES
(1, 'Admin 1', 'admin@gmail.com', '$2y$10$yEPjFodYZ2UA70glIPEabuiHfVmBTRSbHheO8hmtM5wRFQ82GUOnC', '<p>Jl Manunggal</p>\r\n', '089618113392', '25125', 'ADMIN'),
(11, 'arip', 'arip@gmail.com', '$2y$10$9yKLkxOrHwvygg99V3Sd/.WqwRhcr9qMZ73/ZcbEuDK72nqr8nsZC', '<p>jl manunggal</p>\r\n', '01823123', '12341', 'USER'),
(13, 'rafiki', 'rafiki@gmail.com', '$2y$10$/ssDdiFvyAG4q9V0iTvTOODo/YjKDWRKJ1QMJa5peUNkS4AREoC.S', '<p>Jundul Atas</p>\r\n', '012312312', '28293', 'USER'),
(14, 'owner', 'owner@gmail.com', '$2y$10$zFB1MruEvAfGREa1RiPWUubxQwoesTsnBDuJDbUIzWGnVYS0lZI/O', NULL, '123142131', '', 'OWNER');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `products_galleries`
--
ALTER TABLE `products_galleries`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `rekening_numbers`
--
ALTER TABLE `rekening_numbers`
  ADD PRIMARY KEY (`id_rekening`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id_transaction`);

--
-- Indexes for table `transactions_details`
--
ALTER TABLE `transactions_details`
  ADD PRIMARY KEY (`id_transaction_detail`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products_galleries`
--
ALTER TABLE `products_galleries`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `rekening_numbers`
--
ALTER TABLE `rekening_numbers`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id_transaction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transactions_details`
--
ALTER TABLE `transactions_details`
  MODIFY `id_transaction_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
