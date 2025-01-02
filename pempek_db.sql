-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jan 2025 pada 05.57
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pempek_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `ip_address` varchar(50) DEFAULT NULL,
  `attempt_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `email`, `ip_address`, `attempt_time`) VALUES
(50, '', '::1', '2024-11-27 08:05:05'),
(51, '', '::1', '2024-11-27 08:05:09'),
(52, '', '::1', '2024-11-27 08:05:09'),
(53, '', '::1', '2024-11-27 08:05:10'),
(56, '', '::1', '2024-11-27 08:19:31'),
(57, '', '::1', '2024-11-27 08:19:34'),
(58, '', '::1', '2024-11-27 08:19:35'),
(59, '', '::1', '2024-11-27 08:19:36'),
(60, '', '::1', '2024-11-27 08:19:43'),
(61, '', '::1', '2024-11-27 08:19:59'),
(62, '', '::1', '2024-11-27 08:20:31'),
(63, 'aryaagung0034@gmail.com', '::1', '2024-11-27 08:22:04'),
(93, 'aryaa@gmail.com', '::1', '2024-11-28 06:38:21'),
(94, 'aryaa@gmail.com', '::1', '2024-11-28 06:38:21'),
(95, 'aryaa@gmail.com', '::1', '2024-11-28 06:38:22'),
(96, 'user123@gmail.com', '::1', '2024-11-28 07:48:36'),
(97, 'user123@gmail.com', '::1', '2024-11-28 07:48:37'),
(98, 'user123@gmail.com', '::1', '2024-11-28 07:48:37'),
(99, 'user123@gmail.com', '::1', '2024-11-28 07:48:41'),
(100, 'user123@gmail.com', '::1', '2024-11-28 07:48:42'),
(101, 'user123@gmail.com', '::1', '2024-11-28 07:48:42'),
(102, 'user123@gmail.com', '::1', '2024-11-28 07:48:46'),
(103, 'user123@gmail.com', '::1', '2024-11-28 07:48:58'),
(104, 'user123@gmail.com', '::1', '2024-11-28 07:48:59'),
(105, 'user123@gmail.com', '::1', '2024-11-28 07:48:59'),
(106, 'user123@gmail.com', '::1', '2024-11-28 07:49:03'),
(107, 'user123@gmail.com', '::1', '2024-11-28 07:49:15'),
(108, 'user123@gmail.com', '::1', '2024-11-28 07:49:16'),
(109, 'user123@gmail.com', '::1', '2024-11-28 07:49:16'),
(110, 'user123@gmail.com', '::1', '2024-11-28 07:49:34'),
(111, 'user123@gmail.com', '::1', '2024-11-28 07:49:39'),
(112, 'user123@gmail.com', '::1', '2024-11-28 07:49:40'),
(113, 'user123@gmail.com', '::1', '2024-11-28 07:49:40'),
(114, 'user123@gmail.com', '::1', '2024-11-28 07:50:50'),
(115, 'user123@gmail.com', '::1', '2024-11-28 07:50:51'),
(116, 'user123@gmail.com', '::1', '2024-11-28 07:50:51'),
(117, 'user123@gmail.com', '::1', '2024-11-28 07:50:55'),
(121, '2200018456@webmail.uad.ac.id', '::1', '2024-11-28 08:44:30'),
(122, '2200018456@webmail.uad.ac.id', '::1', '2024-11-28 08:44:34'),
(123, '2200018456@webmail.uad.ac.id', '::1', '2024-11-28 08:44:35'),
(124, 'agung@gmail.com', '::1', '2024-11-28 12:34:01'),
(125, 'agung@gmail.com', '::1', '2024-11-28 12:35:34'),
(126, 'agung@gmail.com', '::1', '2024-11-28 12:35:35'),
(128, 'testuser@gmail.com', '::1', '2024-12-25 16:39:15'),
(130, 'aryaagun04@gmail.com', '::1', '2024-12-27 08:29:24'),
(131, 'aryaagun04@gmail.com', '::1', '2024-12-27 08:29:32'),
(132, 'aryaagun04@gmail.com', '::1', '2024-12-27 08:29:57'),
(134, 'aryaagun04@gmail.com', '::1', '2024-12-27 10:14:00'),
(135, 'aryaagun04@gmail.com', '::1', '2024-12-27 10:14:19'),
(137, '004@Gmail.com', '::1', '2025-01-01 10:28:51'),
(138, '004@gmail.com', '::1', '2025-01-01 10:29:16'),
(139, '004@gmail.com', '::1', '2025-01-01 10:29:26'),
(140, 'konz@gmail.com', '::1', '2025-01-01 10:31:17'),
(141, 'konz@gmail.com', '::1', '2025-01-01 10:31:33'),
(142, 'konz@gmail.com', '::1', '2025-01-01 10:32:27'),
(143, 'konztanto@gmail.com', '::1', '2025-01-01 10:34:03'),
(144, 'konztanto@gmail.com', '::1', '2025-01-01 10:34:15'),
(145, 'konztanto@gmail.com', '::1', '2025-01-01 10:34:45'),
(147, 'konztant@gmail.com', '::1', '2025-01-01 10:54:48'),
(148, 'Konzol04@gmail.com', '::1', '2025-01-01 10:55:42'),
(149, 'Konzol04@gmail.com', '::1', '2025-01-01 10:55:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `total_biaya` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `email`, `created_at`, `total_biaya`) VALUES
(2, 'arya@gmail.com', '2025-01-01 09:51:43', 15000.00),
(3, 'arya@gmail.com', '2025-01-01 09:53:25', 45000.00),
(4, '004@Gmail.com', '2025-01-01 10:10:01', 33000.00),
(5, 'konztant@gmail.com', '2025-01-01 10:37:32', 63000.00),
(6, 'konzol@gmail.com', '2025-01-01 11:02:06', 112000.00),
(7, 'konzol@gmail.com', '2025-01-01 11:03:51', 15000.00),
(8, 'konzol@gmail.com', '2025-01-01 11:11:43', 195000.00),
(9, 'konzol@gmail.com', '2025-01-01 11:13:42', 289000.00),
(10, 'konzol@gmail.com', '2025-01-01 11:25:47', 0.00),
(11, 'konzol@gmail.com', '2025-01-01 11:26:39', 42000.00),
(12, 'konzol@gmail.com', '2025-01-01 11:49:38', 170000.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `src` varchar(100) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `src`, `product_name`, `price`, `quantity`) VALUES
(1, 2, 'https://img.freepik.com/free-photo/top-view-delicious-breakfast-meal-assortment_23-2148829500.jpg?t=', 'Pempek Kapal Selam', 15000.00, 1),
(2, 3, 'https://img.freepik.com/free-photo/top-view-delicious-breakfast-meal-assortment_23-2148829500.jpg?t=', 'Pempek Kapal Selam', 15000.00, 1),
(3, 3, 'https://img.freepik.com/free-photo/top-view-delicious-breakfast-meal-assortment_23-2148829500.jpg?t=', 'Pempek Kapal Selam', 15000.00, 1),
(4, 3, 'https://img.freepik.com/free-photo/top-view-delicious-breakfast-meal-assortment_23-2148829500.jpg?t=', 'Pempek Kapal Selam', 15000.00, 1),
(5, 4, 'https://img.freepik.com/free-photo/sliced-pirozhki-peppers-board-marble-table_114579-84001.jpg?t=st=', 'Pempek Kulit', 13000.00, 1),
(6, 4, 'https://img.freepik.com/free-photo/boiled-eggs-stir-fried-with-tamarind-sauce_1150-22260.jpg?t=st=17', 'Pempek Adaan', 10000.00, 1),
(7, 4, 'https://img.freepik.com/free-photo/boiled-eggs-stir-fried-with-tamarind-sauce_1150-22260.jpg?t=st=17', 'Pempek Adaan', 10000.00, 1),
(8, 5, 'https://img.freepik.com/free-photo/boiled-eggs-stir-fried-with-tamarind-sauce_1150-22260.jpg?t=st=17', 'Pempek Adaan', 10000.00, 1),
(9, 5, 'https://img.freepik.com/free-photo/flat-lay-delicious-brazilian-food-arrangement-with-copy-space_23-', 'Pempek Tahu', 11000.00, 1),
(10, 5, 'https://i.pinimg.com/736x/d3/38/97/d33897a61ff84685ae6885e67054606d.jpg', 'Paket Pempek Ikan', 14000.00, 1),
(11, 5, 'https://img.freepik.com/free-photo/deep-fried-fhicken-roll-white-wooden-surface_1150-43596.jpg?t=st=', 'Paket Pempek Dose', 13000.00, 1),
(12, 5, 'https://img.freepik.com/free-photo/top-view-sweet-delicious-halva-yummy-eastern-sweet-dessert-inside', 'Cuko Sambal Merah', 15000.00, 1),
(13, 6, 'https://img.freepik.com/free-photo/boiled-eggs-stir-fried-with-tamarind-sauce_1150-22260.jpg?t=st=17', 'Pempek Adaan', 10000.00, 2),
(14, 6, 'https://img.freepik.com/free-photo/boiled-eggs-stir-fried-with-tamarind-sauce_1150-22260.jpg?t=st=17', 'Pempek Adaan', 10000.00, 1),
(15, 6, 'https://img.freepik.com/free-photo/boiled-eggs-stir-fried-with-tamarind-sauce_1150-22260.jpg?t=st=17', 'Pempek Adaan', 10000.00, 1),
(16, 6, 'https://img.freepik.com/free-photo/boiled-eggs-stir-fried-with-tamarind-sauce_1150-22260.jpg?t=st=17', 'Pempek Adaan', 10000.00, 1),
(17, 6, 'https://img.freepik.com/free-photo/top-view-delicious-breakfast-meal-assortment_23-2148829500.jpg?t=', 'Pempek Kapal Selam', 15000.00, 1),
(18, 6, 'https://img.freepik.com/free-photo/top-view-delicious-breakfast-meal-assortment_23-2148829500.jpg?t=', 'Pempek Kapal Selam', 15000.00, 1),
(19, 6, 'https://img.freepik.com/free-photo/deep-fried-fish-ball-dark-surface_1150-43602.jpg', 'Pempek Lenjer', 12000.00, 1),
(20, 6, 'https://img.freepik.com/free-photo/boiled-eggs-stir-fried-with-tamarind-sauce_1150-22260.jpg?t=st=17', 'Pempek Adaan', 10000.00, 1),
(21, 6, 'https://img.freepik.com/free-photo/boiled-eggs-stir-fried-with-tamarind-sauce_1150-22260.jpg?t=st=17', 'Pempek Adaan', 10000.00, 1),
(22, 7, 'https://img.freepik.com/free-photo/top-view-delicious-breakfast-meal-assortment_23-2148829500.jpg?t=', 'Pempek Kapal Selam', 15000.00, 1),
(23, 8, 'https://img.freepik.com/free-photo/top-view-delicious-breakfast-meal-assortment_23-2148829500.jpg?t=', 'Pempek Kapal Selam', 15000.00, 3),
(24, 8, 'https://img.freepik.com/free-photo/top-view-delicious-breakfast-meal-assortment_23-2148829500.jpg?t=', 'Pempek Kapal Selam', 15000.00, 3),
(25, 8, 'https://img.freepik.com/free-photo/top-view-delicious-breakfast-meal-assortment_23-2148829500.jpg?t=', 'Pempek Kapal Selam', 15000.00, 1),
(26, 8, 'https://img.freepik.com/free-photo/top-view-delicious-breakfast-meal-assortment_23-2148829500.jpg?t=', 'Pempek Kapal Selam', 15000.00, 1),
(27, 8, 'https://img.freepik.com/free-photo/top-view-delicious-breakfast-meal-assortment_23-2148829500.jpg?t=', 'Pempek Kapal Selam', 15000.00, 1),
(28, 8, 'https://img.freepik.com/free-photo/top-view-delicious-breakfast-meal-assortment_23-2148829500.jpg?t=', 'Pempek Kapal Selam', 15000.00, 1),
(29, 8, 'https://img.freepik.com/free-photo/top-view-delicious-breakfast-meal-assortment_23-2148829500.jpg?t=', 'Pempek Kapal Selam', 15000.00, 1),
(30, 8, 'https://img.freepik.com/free-photo/top-view-delicious-breakfast-meal-assortment_23-2148829500.jpg?t=', 'Pempek Kapal Selam', 15000.00, 1),
(31, 8, 'https://img.freepik.com/free-photo/top-view-delicious-breakfast-meal-assortment_23-2148829500.jpg?t=', 'Pempek Kapal Selam', 15000.00, 1),
(32, 9, 'https://img.freepik.com/free-photo/top-view-delicious-breakfast-meal-assortment_23-2148829500.jpg?t=', 'Pempek Kapal Selam', 15000.00, 1),
(33, 9, 'https://img.freepik.com/free-photo/top-view-delicious-breakfast-meal-assortment_23-2148829500.jpg?t=', 'Pempek Kapal Selam', 15000.00, 1),
(34, 9, 'https://img.freepik.com/free-photo/top-view-delicious-breakfast-meal-assortment_23-2148829500.jpg?t=', 'Pempek Kapal Selam', 15000.00, 1),
(35, 9, 'https://img.freepik.com/free-photo/boiled-eggs-stir-fried-with-tamarind-sauce_1150-22260.jpg?t=st=17', 'Pempek Adaan', 10000.00, 1),
(36, 9, 'https://img.freepik.com/free-photo/flat-lay-delicious-brazilian-food-arrangement-with-copy-space_23-', 'Pempek Tahu', 11000.00, 1),
(37, 9, 'https://img.freepik.com/free-photo/flat-lay-delicious-brazilian-food-arrangement-with-copy-space_23-', 'Pempek Tahu', 11000.00, 1),
(38, 9, 'https://img.freepik.com/free-photo/flat-lay-delicious-brazilian-food-arrangement-with-copy-space_23-', 'Pempek Tahu', 11000.00, 1),
(39, 9, 'https://img.freepik.com/free-photo/boiled-eggs-stir-fried-with-tamarind-sauce_1150-22260.jpg?t=st=17', 'Pempek Adaan', 10000.00, 1),
(40, 9, 'https://img.freepik.com/free-photo/boiled-eggs-stir-fried-with-tamarind-sauce_1150-22260.jpg?t=st=17', 'Pempek Adaan', 10000.00, 1),
(41, 9, 'https://img.freepik.com/free-photo/boiled-eggs-stir-fried-with-tamarind-sauce_1150-22260.jpg?t=st=17', 'Pempek Adaan', 10000.00, 1),
(42, 9, 'https://img.freepik.com/free-photo/boiled-eggs-stir-fried-with-tamarind-sauce_1150-22260.jpg?t=st=17', 'Pempek Adaan', 10000.00, 1),
(43, 9, 'https://img.freepik.com/free-photo/boiled-eggs-stir-fried-with-tamarind-sauce_1150-22260.jpg?t=st=17', 'Pempek Adaan', 10000.00, 1),
(44, 9, 'https://img.freepik.com/free-photo/boiled-eggs-stir-fried-with-tamarind-sauce_1150-22260.jpg?t=st=17', 'Pempek Adaan', 10000.00, 1),
(45, 9, 'https://img.freepik.com/free-photo/boiled-eggs-stir-fried-with-tamarind-sauce_1150-22260.jpg?t=st=17', 'Pempek Adaan', 10000.00, 1),
(46, 9, 'https://img.freepik.com/free-photo/boiled-eggs-stir-fried-with-tamarind-sauce_1150-22260.jpg?t=st=17', 'Pempek Adaan', 10000.00, 1),
(47, 9, 'https://img.freepik.com/free-photo/flat-lay-delicious-brazilian-food-arrangement-with-copy-space_23-', 'Pempek Tahu', 11000.00, 1),
(48, 9, 'https://img.freepik.com/free-photo/flat-lay-delicious-brazilian-food-arrangement-with-copy-space_23-', 'Pempek Tahu', 11000.00, 1),
(49, 9, 'https://img.freepik.com/free-photo/flat-lay-delicious-brazilian-food-arrangement-with-copy-space_23-', 'Pempek Tahu', 11000.00, 1),
(50, 9, 'https://img.freepik.com/free-photo/flat-lay-delicious-brazilian-food-arrangement-with-copy-space_23-', 'Pempek Tahu', 11000.00, 1),
(51, 9, 'https://img.freepik.com/free-photo/flat-lay-delicious-brazilian-food-arrangement-with-copy-space_23-', 'Pempek Tahu', 11000.00, 1),
(52, 9, 'https://img.freepik.com/free-photo/flat-lay-delicious-brazilian-food-arrangement-with-copy-space_23-', 'Pempek Tahu', 11000.00, 1),
(53, 9, 'https://img.freepik.com/free-photo/flat-lay-delicious-brazilian-food-arrangement-with-copy-space_23-', 'Pempek Tahu', 11000.00, 1),
(54, 9, 'https://img.freepik.com/free-photo/flat-lay-delicious-brazilian-food-arrangement-with-copy-space_23-', 'Pempek Tahu', 11000.00, 1),
(55, 9, 'https://img.freepik.com/free-photo/flat-lay-delicious-brazilian-food-arrangement-with-copy-space_23-', 'Pempek Tahu', 11000.00, 1),
(56, 9, 'https://img.freepik.com/free-photo/flat-lay-delicious-brazilian-food-arrangement-with-copy-space_23-', 'Pempek Tahu', 11000.00, 1),
(57, 9, 'https://img.freepik.com/free-photo/flat-lay-delicious-brazilian-food-arrangement-with-copy-space_23-', 'Pempek Tahu', 11000.00, 1),
(58, 10, 'https://img.freepik.com/free-photo/top-view-delicious-breakfast-meal-assortment_23-2148829500.jpg?t=', 'Pempek Kapal Selam', 15000.00, 1),
(59, 11, 'https://img.freepik.com/free-photo/deep-fried-fish-ball-dark-surface_1150-43602.jpg', 'Pempek Lenjer', 12000.00, 1),
(60, 11, 'https://img.freepik.com/free-photo/top-view-delicious-breakfast-meal-assortment_23-2148829500.jpg?t=', 'Pempek Kapal Selam', 15000.00, 1),
(61, 11, 'https://img.freepik.com/free-photo/top-view-delicious-breakfast-meal-assortment_23-2148829500.jpg?t=', 'Pempek Kapal Selam', 15000.00, 1),
(62, 12, 'https://img.freepik.com/free-photo/top-view-delicious-breakfast-meal-assortment_23-2148829500.jpg?t=', 'Pempek Kapal Selam', 15000.00, 1),
(63, 12, 'https://img.freepik.com/free-photo/top-view-delicious-breakfast-meal-assortment_23-2148829500.jpg?t=', 'Pempek Kapal Selam', 15000.00, 1),
(64, 12, 'https://img.freepik.com/free-photo/top-view-delicious-breakfast-meal-assortment_23-2148829500.jpg?t=', 'Pempek Kapal Selam', 15000.00, 1),
(65, 12, 'https://img.freepik.com/free-photo/mix-sauces-strawberry-jam-condensed-milk-honey-top-view_141793-44', 'Cuko Authentic', 16000.00, 1),
(66, 12, 'https://i.pinimg.com/736x/d3/38/97/d33897a61ff84685ae6885e67054606d.jpg', 'Paket Pempek Ikan', 14000.00, 1),
(67, 12, 'https://img.freepik.com/free-photo/top-view-delicious-breakfast-meal-assortment_23-2148829500.jpg?t=', 'Pempek Kapal Selam', 15000.00, 1),
(68, 12, 'https://img.freepik.com/free-photo/flat-lay-delicious-brazilian-food-arrangement-with-copy-space_23-', 'Pempek Tahu', 11000.00, 1),
(69, 12, 'https://img.freepik.com/free-photo/flat-lay-delicious-brazilian-food-arrangement-with-copy-space_23-', 'Pempek Tahu', 11000.00, 2),
(70, 12, 'https://img.freepik.com/free-photo/deep-fried-fish-ball-dark-surface_1150-43602.jpg', 'Pempek Lenjer', 12000.00, 1),
(71, 12, 'https://img.freepik.com/free-photo/boiled-eggs-stir-fried-with-tamarind-sauce_1150-22260.jpg?t=st=17', 'Pempek Adaan', 10000.00, 2),
(72, 12, 'https://img.freepik.com/free-photo/top-view-sweet-delicious-halva-yummy-eastern-sweet-dessert-inside', 'Cuko Sambal Merah', 15000.00, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama_lengkap`, `email`, `password`, `no_hp`, `tanggal_lahir`, `alamat`, `created_at`) VALUES
(1, 'user123', 'user123@gmail.com', '$2y$10$loLGwhQ.j1no4.0nVYaO1.qWPkMIH.0VYyqGag26.D8hVPDzsdfb.', '081915042899', '2003-02-28', '', '2024-11-27 23:00:27'),
(2, 'argarga', '2200018456@webmail.uad.ac.id', '$2y$10$n6q2Vp8nTXc/VwaCg1V2e.Fal3dmRai3blPGGpN6MXsx4kvq6TtAK', '081915042899', '2008-07-28', 'aweergrqg', '2024-11-28 01:05:15'),
(3, 'Arya Agung Wicaksono', 'agung@gmail.com', '$2y$10$VLWyiS1Nhs.ArVYjYgFN8uYpMxP.MRmr4ez91gKK.9TT9kkBInppK', '081915042899', '1994-11-28', '', '2024-11-28 05:25:14'),
(4, 'arya agung wicaksono', 'aryaagung004@gmail.com', '$2y$10$YMOYVO8nF4K9lDYIY7gh3u3aCgEDu38lqvU1.HdyyDFlsg9zVj4Lm', '0819463789', '2000-02-19', '', '2024-12-19 08:29:00'),
(5, 'k', 'aryaagun04@gmail.com', '$2y$10$ElISnsYtyiSYvtTnxsEmQ.jU9Q5vfZrU.aplslDlEA4tpcYEOFmFG', '081915042899', '2005-02-27', 'Mulungan kulon Sendangadi, Mlati, Sleman, Yogykarta', '2024-12-27 01:27:48'),
(6, 'konz', 'konz@gmail.com', '$2y$10$2XXnvQApzNdQEhFWDGsCqedD/GVn.XMD1yz9V/Ug5mL3jiFIByjHO', '081915042899', '2005-03-27', 'Mulungan kulon Sendangadi, Mlati, Sleman, Yogykarta', '2024-12-27 02:28:18'),
(7, 'Konstanta', 'konztanta@gmail.com', '$2y$10$0IBbH.iGm0YQ8P4uXRTBiOwEobfasI3nX1sd93KhNXlMztSN3enRS', '081915042899', '1999-02-27', 'Mulungan kulon Sendangadi, Mlati, Sleman, Yogykarta', '2024-12-27 04:06:24'),
(8, 'Arya Agung Wicaksono', '004@Gmail.com', '$2y$10$vjjgk19MbjAVfwHtJWJxC.oXDAsLumZ21VlkruFKhvW2idCodvwPy', '081915042899', '2005-06-01', 'Mulungan kulon Sendangadi, Mlati, Sleman, Yogykarta', '2024-12-31 23:48:43'),
(9, 'konz', 'konztanto@gmail.com', '$2y$10$zCevqsAcwLHnFUZzqETr3OCyiVArSSocRmStbY.pULgnE9xroeWjC', '081915042899', '2003-07-01', 'Mulungan kulon Sendangadi, Mlati, Sleman, Yogykarta', '2025-01-01 03:31:09'),
(10, 'konz', 'konztant@gmail.com', '$2y$10$dP3nAe/VL10zy4r4ySPD2OBs42u6.G2NswAbbjzehsFcz6oCD.Zku', '081915042899', '2003-03-01', 'Mulungan kulon Sendangadi, Mlati, Sleman, Yogykarta', '2025-01-01 03:35:26'),
(11, 'konz', 'konzol@gmail.com', '$2y$10$WFoOpfXVXIqS.wqXTYok8.y6wh1e7w8l3vcztCICocOhHTbPlri7i', '081915042899', '2005-03-01', 'Mulungan kulon Sendangadi, Mlati, Sleman, Yogykarta', '2025-01-01 03:55:28');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
