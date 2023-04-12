-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2023 at 07:47 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjualan1`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `jenis_barang` varchar(255) NOT NULL,
  `harga_satuan` int(25) NOT NULL,
  `stok_barang` int(11) NOT NULL,
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `jenis_barang`, `harga_satuan`, `stok_barang`, `foto`) VALUES
(1, 'Laptop Asus', 'Asus A12G', 450000, 60, 'asus1.png'),
(2, 'Laptop Asus', 'Asus B870', 570000, 48, 'asus2.png'),
(3, 'Laptop Asus', 'Asus A33x', 670000, 40, 'asus3.png'),
(4, 'Laptop Asus', 'Asus Bee 12', 550000, 0, 'asus4.png'),
(7, 'Laptop ROG', 'ROG 1832X', 1125000, 0, 'rog.png'),
(8, 'Laptop Acer', 'Acer 13C50', 780000, 110, 'acer1.png');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jmlh_barang` int(11) NOT NULL,
  `total_harga` int(25) NOT NULL,
  `status` enum('proses','verifikasi','ditolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tgl_transaksi`, `id_user`, `id_barang`, `jmlh_barang`, `total_harga`, `status`) VALUES
(68, '2023-04-12', 3, 1, 20, 9000000, 'proses'),
(69, '2023-04-12', 3, 2, 2, 1140000, 'proses');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `update_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_user`, `role`, `created_at`, `update_at`) VALUES
(2, 'Admin', '123', 'Fayi Muhadzdzib Super', 1, '2023-04-03', NULL),
(3, 'Customer', '123', 'Fayi Muhadzdzib', 2, '2023-04-03', NULL),
(6, 'customer', '', 'haikal', 0, '2023-04-13', '2023-04-13'),
(7, 'Customer', '', 'haikal', 0, '2023-04-13', '2023-04-13'),
(8, 'Customer', '123', 'haikal', 0, '2023-04-13', '2023-04-13'),
(9, 'Customer', '123', 'haikal', 0, '2023-04-13', '2023-04-13'),
(10, 'Customer', '123', 'kale', 0, '2023-04-13', '2023-04-13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
