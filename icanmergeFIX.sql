-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jun 2022 pada 09.15
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `icanmerge`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Menyetujui lelang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 7),
(1, 8),
(1, 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'afnan@ican.com', 1, '2022-04-25 21:31:30', 0),
(2, '::1', 'avnanrahman@gmail.com', 2, '2022-04-25 21:36:55', 0),
(3, '::1', 'avnanrahman@gmail.com', 3, '2022-04-25 21:41:06', 1),
(4, '::1', 'afnancuk@gmail.com', 6, '2022-04-25 22:18:48', 0),
(5, '::1', 'avnanrahman@gmail.com', NULL, '2022-05-19 20:07:36', 0),
(6, '::1', 'avnanrahman@gmail.com', NULL, '2022-05-19 20:07:38', 0),
(7, '::1', 'afnancoy', NULL, '2022-05-19 20:07:41', 0),
(8, '::1', 'afnancoy', NULL, '2022-05-19 20:38:51', 0),
(9, '::1', 'afnancoy', NULL, '2022-05-19 20:38:57', 0),
(10, '::1', 'avnanrahman@gmail.com', 7, '2022-05-19 23:11:53', 1),
(11, '::1', 'avnanrahman@gmail.com', 7, '2022-05-19 23:20:45', 1),
(12, '::1', 'avnanrahman@gmail.com', 7, '2022-05-20 02:33:46', 1),
(13, '::1', 'avnanrahman@gmail.com', 7, '2022-05-20 19:02:53', 1),
(14, '::1', 'avnanrahman@gmail.com', 7, '2022-05-20 19:03:17', 1),
(15, '::1', 'avnanrahman@gmail.com', 7, '2022-05-20 19:13:36', 1),
(16, '::1', 'avnanrahman@gmail.com', 7, '2022-05-20 19:13:40', 1),
(17, '::1', 'avnanrahman@gmail.com', 7, '2022-05-20 20:10:40', 1),
(18, '::1', 'avnanrahman@gmail.com', 7, '2022-05-21 00:43:33', 1),
(19, '::1', 'avnanrahman@gmail.com', 7, '2022-05-21 00:47:00', 1),
(20, '::1', 'afnanuny@gmail.com', 8, '2022-05-21 01:28:28', 1),
(21, '::1', 'afnanuny@gmail.com', 8, '2022-06-03 10:08:19', 1),
(22, '::1', 'afnanuny@gmail.com', 8, '2022-06-03 11:01:13', 1),
(23, '::1', 'afnanuny@gmail.com', 8, '2022-06-03 11:06:56', 1),
(24, '::1', 'afnanuny@gmail.com', 8, '2022-06-03 11:13:42', 1),
(25, '::1', 'afnanuny@gmail.com', 8, '2022-06-03 11:23:26', 1),
(26, '::1', 'afnanuny@gmail.com', 8, '2022-06-04 08:44:08', 1),
(27, '::1', 'afnanuny@gmail.com', 8, '2022-06-06 04:22:38', 1),
(28, '::1', 'afnanuny@gmail.com', 8, '2022-06-06 12:44:29', 1),
(29, '::1', 'fathan@uny.ac.id', 9, '2022-06-06 12:46:18', 1),
(30, '::1', 'fathan@uny.ac.id', 9, '2022-06-06 12:46:33', 1),
(31, '::1', 'yudi@uny.ac.id', 10, '2022-06-06 12:49:15', 1),
(32, '::1', 'afnanuny@gmail.com', 8, '2022-06-06 23:59:09', 1),
(33, '::1', 'afnanuny@gmail.com', 8, '2022-06-07 05:53:17', 1),
(34, '::1', 'afnanuny@gmail.com', 8, '2022-06-07 08:16:14', 1),
(35, '::1', 'afnanuny@gmail.com', 8, '2022-06-07 11:20:53', 1),
(36, '::1', 'afnanuny@gmail.com', 8, '2022-06-08 01:45:45', 1),
(37, '::1', 'fathan@uny.ac.id', 9, '2022-06-08 04:14:50', 1),
(38, '::1', 'afnan', NULL, '2022-06-08 06:27:04', 0),
(39, '::1', 'Afnan', NULL, '2022-06-08 06:27:10', 0),
(40, '::1', 'fathanhidayatullah004@gmail.com', 11, '2022-06-08 06:28:54', 1),
(41, '::1', 'fathan', NULL, '2022-06-08 06:30:53', 0),
(42, '::1', 'fathan@uny.ac.id', 9, '2022-06-08 06:31:10', 1),
(43, '::1', 'afnanuny@gmail.com', 8, '2022-06-08 06:50:12', 1),
(44, '::1', 'fathan@uny.ac.id', 9, '2022-06-08 13:04:33', 1),
(45, '::1', 'fathan', NULL, '2022-06-09 01:31:31', 0),
(46, '::1', 'fathan@uny.ac.id', 9, '2022-06-09 01:31:40', 1),
(47, '::1', 'fathan@uny.ac.id', 9, '2022-06-09 04:58:14', 1),
(48, '::1', 'fathan@uny.ac.id', 9, '2022-06-09 14:04:40', 1),
(49, '::1', 'fathan@uny.ac.id', 9, '2022-06-21 09:42:50', 1),
(50, '::1', 'fathan@uny.ac.id', 9, '2022-06-23 04:09:10', 1),
(51, '::1', 'fathan@uny.ac.id', 9, '2022-06-23 04:53:05', 1),
(52, '::1', 'yudi@uny.ac.id', 10, '2022-06-23 07:22:58', 1),
(53, '::1', 'coba@gmail.com', 12, '2022-06-23 08:03:25', 1),
(54, '::1', 'afnanuny@gmail.com', 8, '2022-06-23 08:13:23', 1),
(55, '::1', 'afnanuny@gmail.com', 8, '2022-06-23 09:03:48', 1),
(56, '::1', 'afnanuny@gmail.com', 8, '2022-06-23 09:07:31', 1),
(57, '::1', 'afnanuny@gmail.com', 8, '2022-06-23 09:10:46', 1),
(58, '::1', 'afnanuny', NULL, '2022-06-23 09:11:24', 0),
(59, '::1', 'afnanuny@gmail.com', 8, '2022-06-23 09:11:35', 1),
(60, '::1', 'fathan@uny.ac.id', 9, '2022-06-23 09:11:51', 1),
(61, '::1', 'avnanrahman', NULL, '2022-06-23 09:12:41', 0),
(62, '::1', 'avnanrahman', NULL, '2022-06-23 09:12:51', 0),
(63, '::1', 'fathan@uny.ac.id', 9, '2022-06-23 09:12:59', 1),
(64, '::1', 'afnanuny@gmail.com', 8, '2022-06-23 09:13:10', 1),
(65, '::1', 'yudi@uny.ac.id', 10, '2022-06-23 10:11:15', 1),
(66, '::1', 'fathan@uny.ac.id', 9, '2022-06-23 10:12:25', 1),
(67, '::1', 'afnanuny@gmail.com', 8, '2022-06-23 10:28:54', 1),
(68, '::1', 'fathan@uny.ac.id', 9, '2022-06-23 10:40:30', 1),
(69, '::1', 'afnanuny@gmail.com', 8, '2022-06-23 11:18:11', 1),
(70, '::1', 'fathan@uny.ac.id', 9, '2022-06-23 11:26:35', 1),
(71, '::1', 'yudi@uny.ac.id', 10, '2022-06-23 11:26:54', 1),
(72, '::1', 'afnanuny@gmail.com', 8, '2022-06-23 11:28:05', 1),
(73, '::1', 'fathan', NULL, '2022-06-23 11:28:26', 0),
(74, '::1', 'fathan@uny.ac.id', 9, '2022-06-23 11:28:32', 1),
(75, '::1', 'yudi@uny.ac.id', 10, '2022-06-23 11:34:34', 1),
(76, '::1', 'fathan@uny.ac.id', 9, '2022-06-23 11:42:14', 1),
(77, '::1', 'fathan@uny.ac.id', 9, '2022-06-23 21:48:15', 1),
(78, '::1', 'fathan@uny.ac.id', 9, '2022-06-23 22:21:08', 1),
(79, '::1', 'afnan', NULL, '2022-06-24 02:11:08', 0),
(80, '::1', 'yudi@uny.ac.id', 10, '2022-06-24 02:11:14', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bid_log`
--

CREATE TABLE `bid_log` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `bid_order_id` int(20) NOT NULL,
  `last_bid` varchar(50) NOT NULL,
  `bid_log_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bid_log`
--

INSERT INTO `bid_log` (`user_id`, `bid_order_id`, `last_bid`, `bid_log_id`) VALUES
(9, 62784, '60000', 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bid_order`
--

CREATE TABLE `bid_order` (
  `bid_order_id` int(20) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_description` text NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `increment_in_price_per_bid` int(30) NOT NULL,
  `bid_start_time` datetime NOT NULL,
  `bid_end_time` datetime NOT NULL,
  `base_price` int(50) NOT NULL,
  `buy_it_now_price` int(50) NOT NULL,
  `current_bid` int(50) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `picture_product_id` int(11) NOT NULL,
  `is_sold` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bid_order`
--

INSERT INTO `bid_order` (`bid_order_id`, `product_name`, `product_description`, `user_id`, `increment_in_price_per_bid`, `bid_start_time`, `bid_end_time`, `base_price`, `buy_it_now_price`, `current_bid`, `is_active`, `picture_product_id`, `is_sold`) VALUES
(1255, 'White Betta Fish', 'Jenis : Betta Fish <br> \r\nWarna : Putih <br> \r\nBerat : 120g', 9, 20000, '2022-06-24 10:00:00', '2022-06-26 12:00:00', 30000, 300000, 30000, 1, 1233, 0),
(51235, 'Dark Blue Betta Fish', 'Jenis : Betta Fish <br> \r\nWarna : Biru Gelap <br> \r\nBerat : 200g', 10, 30000, '2022-06-24 10:00:00', '2022-06-26 12:00:00', 50000, 500000, 50000, 1, 55331, 0),
(62784, 'Blue Betta Fish', 'Jenis : Betta Fish <br> \r\nWarna : Biru Tua <br> Berat : 150g', 8, 10000, '2022-06-24 10:00:00', '2022-06-24 12:00:00', 20000, 200000, 60000, 1, 36053, 0),
(67213, 'Glowing Betta Fish', 'Jenis : Betta Fish <br> \r\nWarna : Cyan <br> \r\nBerat : 140g', 8, 15000, '2022-06-24 10:00:00', '2022-06-26 12:00:00', 30000, 300000, 30000, 0, 62312, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bid_transaction_log`
--

CREATE TABLE `bid_transaction_log` (
  `bid_transaction_log_id` int(20) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `transaction_id` int(20) NOT NULL,
  `total` int(40) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bid_transaction_log`
--

INSERT INTO `bid_transaction_log` (`bid_transaction_log_id`, `user_id`, `transaction_id`, `total`, `slug`) VALUES
(17, 9, 88827, 320000, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1650900321, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `quest_id` int(11) NOT NULL,
  `question` text DEFAULT NULL,
  `user_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pertanyaan`
--

INSERT INTO `pertanyaan` (`quest_id`, `question`, `user_id`) VALUES
(5, 'Apa iya?', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `picture_product`
--

CREATE TABLE `picture_product` (
  `picture_product_id` int(11) NOT NULL,
  `picture1` varchar(200) DEFAULT NULL,
  `picture2` varchar(200) DEFAULT NULL,
  `picture3` varchar(200) DEFAULT NULL,
  `picture4` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `picture_product`
--

INSERT INTO `picture_product` (`picture_product_id`, `picture1`, `picture2`, `picture3`, `picture4`) VALUES
(1233, 'fishProduct3.jpg', 'fishProduct2.jpg', 'fishProduct1.jpg', 'fishProduct4.jpg'),
(32849, '1656052432_17531c08e4a00dbf59d1.jpg', NULL, NULL, NULL),
(36053, 'fishProduct1.jpg', 'fishProduct2.jpg', 'fishProduct3.jpg', 'fishProduct4.jpg'),
(51649, '1656052724_2c2a38d06b5247c7b132.jpg', NULL, NULL, NULL),
(55331, 'fishProduct4.jpg', 'fishProduct2.jpg', 'fishProduct3.jpg', 'fishProduct1.jpg'),
(62312, 'fishProduct2.jpg', 'fishProduct1.jpg', 'fishProduct3.jpg', 'fishProduct4.jpg'),
(70821, '1656052769_58a64758e913d68f0acc.jpg', NULL, NULL, NULL),
(75879, '1656052487_376a4efa86d276e9e150.jpg', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `shipping_address`
--

CREATE TABLE `shipping_address` (
  `shipping_address_id` int(20) NOT NULL,
  `full_address` text NOT NULL,
  `city` varchar(40) NOT NULL,
  `zip_code` varchar(30) NOT NULL,
  `receiver` varchar(50) NOT NULL,
  `phone` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `shipping_address`
--

INSERT INTO `shipping_address` (`shipping_address_id`, `full_address`, `city`, `zip_code`, `receiver`, `phone`) VALUES
(1, 'Jalanin aja dulu', 'Cilacap', '54321', 'Afnan', '0892183923'),
(4910, '', 'KAB. BANTUL', '55187', 'fathan', '00909090'),
(7229, 'Bangunharjo', 'KAB. BANTUL', '55187', 'Afnan', '00909090'),
(10396, 'Bangunharjo', 'KAB. BANTUL', '55187', 'fathan', '00909090'),
(36377, 'Bangunharjo', 'KAB. BANTUL', '55187', 'Afnan', '00909090'),
(42132, 'Bangunharjo', 'KAB. BANTUL', '55187', 'fathan', '00909090'),
(49676, 'Bangunharjo', 'KAB. BANTUL', '55187', 'fathan', '00909090'),
(52509, 'Bangunharjo', 'KAB. BANTUL', '55187', 'fathan', '00909090'),
(62207, 'Bangunharjo', 'KAB. BANTUL', '55187', 'fathan', '00909090'),
(65343, 'Bangunharjo', 'KAB. BANTUL', '55187', 'fathan', '00909090'),
(66407, '', 'KAB. BANTUL', '55187', 'fathan', '00909090'),
(73342, 'Bangunharjo', 'KAB. BANTUL', '55187', 'fathan', '00909090'),
(78715, 'Bangunharjo', 'KAB. BANTUL', '55187', 'fathan', '00909090'),
(81998, '', 'KAB. BANTUL', '55187', 'fathan', '00909090'),
(84449, 'Bangunharjo', 'KAB. BANTUL', '55187', 'fathan', '00909090'),
(84995, 'Bangunharjo', 'KAB. BANTUL', '55187', 'fathan', '00909090'),
(86033, 'Bangunharjo', 'KAB. BANTUL', '55187', 'fathan', '00909090'),
(87244, 'Bangunharjo', 'KAB. BANTUL', '55187', 'Afnan', '00909090'),
(94187, 'Bangunharjo', 'KAB. BANTUL', '55187', 'fathan', '00909090');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(20) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `bid_order_id` int(20) NOT NULL,
  `picture_product_id` int(11) NOT NULL,
  `transaction_date` date NOT NULL,
  `shipping_address_id` int(20) NOT NULL,
  `shipping_price` int(30) NOT NULL,
  `total` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `user_id`, `bid_order_id`, `picture_product_id`, `transaction_date`, `shipping_address_id`, `shipping_price`, `total`) VALUES
(82288, 9, 67213, 0, '2022-06-24', 78715, 20000, 320000),
(88827, 9, 67213, 0, '2022-06-24', 52509, 20000, 320000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phone_number` bigint(11) NOT NULL,
  `is_seller` tinyint(1) NOT NULL,
  `balance` double NOT NULL,
  `profile` varchar(200) NOT NULL DEFAULT 'default.png',
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `fullname`, `date_of_birth`, `address`, `phone_number`, `is_seller`, `balance`, `profile`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 'afnancuk@gmail.com', 'afnanrahman', 'Afnan', NULL, '', 0, 0, 100000, '', '$2y$10$w94fTADFZyMrtBRyswwHuOoI3/2cNiEWeZmkzdihtIP/wPJzYJ8Fy', NULL, NULL, NULL, '0cf45051d8f8ab97d17a1adda58f7971', NULL, NULL, 1, 0, '2022-04-25 22:17:13', '2022-04-25 22:17:13', NULL),
(7, 'avnanrahman@gmail.com', 'avnanrahman', 'Afnan', NULL, '', 0, 0, 1000000, '', '$2y$10$PkRU542u/Yg5ieiKRI1yOOQd5DlUsOhmmCife/HyQNXh4Plot1ppK', NULL, NULL, NULL, '8d0d9bd3fb7e6bf17aba633773f08976', NULL, NULL, 1, 0, '2022-05-19 23:11:07', '2022-05-19 23:11:07', NULL),
(8, 'afnanuny@gmail.com', 'afnanuny', 'Afnan Ngathour Rahman', '2002-04-20', 'Jl Srandil RT 10 rw 10', 8576271632, 1, 70000, 'default.png', '$2y$10$jNkmD1HNSEmK0Xp0OG987eQGXwHhgKMvRjcWJApBmhGfcDtd/KYmm', NULL, NULL, NULL, '5942bd4fc9726c8f246e66793d9d0f17', NULL, NULL, 1, 0, '2022-05-21 01:27:52', '2022-06-23 11:21:27', NULL),
(9, 'fathan@uny.ac.id', 'fathan', 'Fathan Hidayatullah', '2002-04-07', 'Bangunharjo', 8895954173, 1, 2160000, '1654711848_e3d852e10f16c43546b6.jpg', '$2y$10$KDnKLZisEwj4Bf8Vk1VFfOU6jnrfcSJCbk6x94sKw8Mx5pz.C02yO', NULL, NULL, NULL, '062fb130b7a1bc853e9eac78b55e603f', NULL, NULL, 1, 0, '2022-06-06 12:45:34', '2022-06-24 02:07:26', NULL),
(10, 'yudi@uny.ac.id', 'yudi', 'Ananda Yudi', '2002-08-10', 'Moyudan', 8575123155, 0, 1000000, 'default.png', '$2y$10$KRHRXkbyRxDun1qjYHepRevM3.P2mV9yyFvLZY6NIJDQ5qypiTJEW', NULL, NULL, NULL, '52bdb3291d718c7afd0b1de4f18672ec', NULL, NULL, 1, 0, '2022-06-06 12:47:31', '2022-06-06 12:47:31', NULL),
(11, 'fathanhidayatullah004@gmail.com', 'fathanan', 'Fathan', NULL, NULL, 0, 0, 1000000, 'default.png', '$2y$10$JtDVORzlRKEyqjXN5.XhL.RxWfFY5t8Pqs1pONN7Q0hix3hQFtc8u', NULL, NULL, NULL, '92a8c264b9f705c6fe9692a35afc18d7', NULL, NULL, 1, 0, '2022-06-08 06:27:53', '2022-06-08 06:27:53', NULL),
(12, 'coba@gmail.com', 'coba', 'Coba User', '2004-06-23', 'Jalan Coba coba', 88917236789123, 0, 1000000, '1655989470_3bd95c1b6d91db14eece.png', '$2y$10$Phkolbm5AP8asF63a03a0Oa32ssRu38A5JrYdNy1/EbTns1PddklW', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-06-23 08:03:08', '2022-06-23 08:12:24', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indeks untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indeks untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indeks untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indeks untuk tabel `bid_log`
--
ALTER TABLE `bid_log`
  ADD PRIMARY KEY (`bid_log_id`),
  ADD KEY `id` (`user_id`),
  ADD KEY `FK_bid_order_id` (`bid_order_id`);

--
-- Indeks untuk tabel `bid_order`
--
ALTER TABLE `bid_order`
  ADD PRIMARY KEY (`bid_order_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `picture_product_id` (`picture_product_id`);

--
-- Indeks untuk tabel `bid_transaction_log`
--
ALTER TABLE `bid_transaction_log`
  ADD PRIMARY KEY (`bid_transaction_log_id`),
  ADD KEY `transaction_id` (`transaction_id`),
  ADD KEY `id` (`user_id`) USING BTREE;

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`quest_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `picture_product`
--
ALTER TABLE `picture_product`
  ADD PRIMARY KEY (`picture_product_id`);

--
-- Indeks untuk tabel `shipping_address`
--
ALTER TABLE `shipping_address`
  ADD PRIMARY KEY (`shipping_address_id`);

--
-- Indeks untuk tabel `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `bid_order_id` (`bid_order_id`),
  ADD KEY `shipping_address_id` (`shipping_address_id`),
  ADD KEY `FK_user` (`user_id`),
  ADD KEY `picture_product_id` (`picture_product_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `bid_log`
--
ALTER TABLE `bid_log`
  MODIFY `bid_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `bid_order`
--
ALTER TABLE `bid_order`
  MODIFY `bid_order_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82454;

--
-- AUTO_INCREMENT untuk tabel `bid_transaction_log`
--
ALTER TABLE `bid_transaction_log`
  MODIFY `bid_transaction_log_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `quest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `picture_product`
--
ALTER TABLE `picture_product`
  MODIFY `picture_product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89882;

--
-- AUTO_INCREMENT untuk tabel `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98326;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `bid_log`
--
ALTER TABLE `bid_log`
  ADD CONSTRAINT `FK_bid_order_id` FOREIGN KEY (`bid_order_id`) REFERENCES `bid_order` (`bid_order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bid_log_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `bid_order`
--
ALTER TABLE `bid_order`
  ADD CONSTRAINT `FK_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bid_order_ibfk_1` FOREIGN KEY (`picture_product_id`) REFERENCES `picture_product` (`picture_product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `bid_transaction_log`
--
ALTER TABLE `bid_transaction_log`
  ADD CONSTRAINT `FK_transaksi_id` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`transaction_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_user_tr` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD CONSTRAINT `FK_pertanyaan` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `FK_bid_order` FOREIGN KEY (`bid_order_id`) REFERENCES `bid_order` (`bid_order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`shipping_address_id`) REFERENCES `shipping_address` (`shipping_address_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
