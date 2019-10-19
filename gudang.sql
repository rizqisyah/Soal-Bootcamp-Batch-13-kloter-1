-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Okt 2019 pada 10.26
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gudang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` varchar(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
('1', 'Alat Mandi'),
('2', 'Minuman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('08a6486385c0e4f0f1a210efc936232bf4c7c3c4', '::1', 1571473531, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313437333333383b),
('1052c2c44e3ce6c4e538ea286db408f6cc5c025d', '::1', 1571468339, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313436383135373b),
('25adf18edfd74ac689af061f2239b39e0f1265a9', '::1', 1571470384, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313437303134313b),
('2ed6591c8fc368f37a51130dbdca85603af7333b', '::1', 1571473333, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313437333033363b),
('2feac22867f347cb630cea2b6eafe39e56d5bbba', '::1', 1571470768, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313437303436393b),
('56f11b049c810bcad22833e0f07a83a9682015b4', '::1', 1571467118, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313436363837353b),
('58eb3ae7e822c9dd67f84e95f409c162029b74c1', '::1', 1571473035, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313437323733353b),
('6d03dc5f07e8681c40774c799c36ea06a02a5480', '::1', 1571471332, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313437313130373b),
('9f2aac3b1436f23c4db4c2a4a36c634c0c540ca2', '::1', 1571472541, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313437323235383b),
('a88b5bfeaec917edb5fcd4c70c35291576a435ba', '::1', 1571467595, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313436373239383b),
('be14ccf4c0d29d0d7f19ec225f2ad6c16a427a67', '::1', 1571471025, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313437303737313b),
('da53c72b3586feffc6be24a02cb9f6fe6593e55d', '::1', 1571469145, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313436383837343b),
('fc74a3c3693e413c79798937b804f624341e3a6f', '::1', 1571468089, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313436373833393b);

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` varchar(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `stock` varchar(100) DEFAULT NULL,
  `deskripsi` varchar(100) DEFAULT NULL,
  `category_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `name`, `stock`, `deskripsi`, `category_id`) VALUES
('1', 'Shampo', '3', 'Barang Bagus', '2');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `idx_category` (`id`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
