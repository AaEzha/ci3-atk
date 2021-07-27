-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 27, 2021 at 06:03 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pusyantek`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `barang_id` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jenis_barang_id` int(11) NOT NULL,
  `satuan_id` int(11) NOT NULL,
  `gambar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`barang_id`, `nama_barang`, `jenis_barang_id`, `satuan_id`, `gambar`) VALUES
(1, 'Binder Clip 105', 1010301003, 8, 'gambar-210414-c0026d1d53.jpg'),
(3, 'Binder Clip 155', 1010301003, 5, 'gambar-210414-399c67b31a.jpg'),
(16, 'Paper Clip No 5', 1010301003, 8, 'gambar-210414-7f8291102c.jpg'),
(23, 'Staples Max HD 10', 1010301003, 5, 'gambar-210414-bb53ed66e8.jpg'),
(27, 'Stabilo Boss', 1010301001, 5, 'gambar-210414-a1f69cc0d9.jpg'),
(31, 'Trigonal Clip 1', 1010301003, 8, 'gambar-210414-02106cfb90.jpg'),
(39, 'Nota Kontan', 1010301001, 7, 'gambar-210414-7304fae60a.jpg'),
(58, 'Lakban Coklat', 1010301010, 9, 'gambar-210414-5623910bb2.jpg'),
(63, 'Tape Dispenser Lion No 50', 1010301010, 5, 'gambar-210414-3be8b22f5b.jpg'),
(66, 'Spidol Whiteboard Snowman', 1010301001, 5, 'gambar-210414-14181651b6.jpg'),
(68, 'Ballpoint Meja', 1010301001, 5, 'gambar-210414-f8fdd09be8.jpg'),
(76, 'Kertas Sampul Coklat', 1010302002, 10, 'gambar-210414-03d7a14f72.jpg'),
(81, 'Tom & Jerry 121', 1010302002, 6, 'gambar-210414-eaa4c2b25c.jpg'),
(86, 'Kertas Folio Bergaris', 1010302002, 10, 'gambar-210414-61f496080d.jpg'),
(92, 'Rautan Pensil', 1010301001, 5, 'gambar-210414-441923689f.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_barang`
--

CREATE TABLE `jenis_barang` (
  `jenis_barang_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_barang`
--

INSERT INTO `jenis_barang` (`jenis_barang_id`, `name`, `created`, `updated`) VALUES
(1010301001, 'Alat Tulis', '2020-08-19 09:46:09', NULL),
(1010301003, 'Penjepit Kertas', '2020-08-19 10:18:02', NULL),
(1010301004, 'Penghapus/Korektor', '2020-08-25 13:39:55', NULL),
(1010301005, 'Buku Tulis', '2020-08-28 14:50:57', NULL),
(1010301006, 'Ordner dan Map', '2020-08-31 12:21:37', NULL),
(1010301007, 'Penggaris', '2020-09-17 10:08:05', NULL),
(1010301008, 'Cutter', '2020-09-17 10:08:19', NULL),
(1010301009, 'Pita Mesin Tik Brother', '2020-09-17 10:08:37', NULL),
(1010301010, 'Alat Perekat', '2020-09-17 10:08:55', NULL),
(1010301013, 'Isi Staples', '2020-09-17 10:09:18', NULL),
(1010302002, 'Berbagai Kertas', '2020-09-17 10:09:46', NULL),
(1010303999, 'Bahan Cetak Lainnya', '2020-09-17 10:10:40', NULL),
(1010304001, 'CD/DVD', '2020-09-17 10:11:09', NULL),
(1010304002, 'Computer File/Tempat Disket', '2020-09-17 10:11:43', NULL),
(1010304004, 'Tinta/Tonner Printer', '2020-09-17 10:12:11', NULL),
(1010304006, 'USB/Flashdisk', '2020-09-17 10:12:36', NULL),
(1010304999, 'Bahan Komputer Lainnya', '2020-09-17 10:12:54', NULL),
(1010305006, 'Alat Pengikat', '2020-09-17 10:13:16', NULL),
(1010306010, 'Batu Baterai', '2020-10-02 08:00:42', NULL),
(1010399999, 'Alat/Bahan u/ kegiatan Lainnya', '2020-09-17 10:14:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `satuan_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`satuan_id`, `name`, `created`, `updated`) VALUES
(5, 'Buah', '2020-08-24 10:18:31', NULL),
(6, 'Pax', '2020-08-24 10:20:27', NULL),
(7, 'Buku', '2020-08-28 14:53:11', NULL),
(8, 'Dus', '2020-09-17 10:06:11', NULL),
(9, 'Roll', '2020-09-17 10:06:24', NULL),
(10, 'Lembar', '2020-09-17 10:06:33', NULL),
(11, 'Rim', '2020-09-17 10:06:41', NULL),
(12, 'Keping', '2020-09-17 10:06:52', NULL),
(13, 'Box', '2020-09-17 10:07:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `transaksi_id` int(100) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `jumlah` int(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `jenis_barang_id` int(11) NOT NULL,
  `satuan_id` int(11) NOT NULL,
  `created` date NOT NULL,
  `updated` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`transaksi_id`, `nama`, `nama_barang`, `barang_id`, `jumlah`, `user_id`, `jenis_barang_id`, `satuan_id`, `created`, `updated`) VALUES
(168, 'Anisa', 'Staples Max HD 10', 23, 1, 22, 1010301003, 5, '2021-04-14', NULL),
(169, 'Anisa', 'Stabilo Boss', 27, 2, 22, 1010301001, 5, '2021-04-14', NULL),
(170, 'Anisa', 'Ballpoint Meja', 68, 1, 22, 1010301001, 5, '2021-04-14', NULL),
(171, 'alif', 'Ballpoint Meja', 68, 1, 28, 1010301001, 5, '2021-04-14', NULL),
(172, 'alif', 'Kertas Folio Bergaris', 86, 5, 28, 1010302002, 10, '2021-04-14', NULL),
(173, 'Anisa', 'Binder Clip 155', 3, 1, 22, 1010301003, 5, '2021-04-16', NULL),
(174, 'Anisa', 'Ballpoint Meja', 68, 2, 22, 1010301001, 5, '2021-04-16', NULL),
(175, 'alif', 'Ballpoint Meja', 68, 3, 28, 1010301001, 5, '2021-04-19', NULL),
(176, 'Anisa', 'Nota Kontan', 39, 2, 22, 1010301001, 7, '2021-05-25', NULL),
(177, 'alif', 'Ballpoint Meja', 68, 2, 28, 1010301001, 5, '2021-06-16', NULL),
(178, 'alif', 'Kertas Folio Bergaris', 86, 5, 28, 1010302002, 10, '2021-06-16', NULL),
(179, 'ahmad  doni', 'Tape Dispenser Lion No 50', 63, 1, 31, 1010301010, 5, '2021-06-16', NULL),
(180, 'ahmad  doni', 'Spidol Whiteboard Snowman', 66, 2, 31, 1010301001, 5, '2021-06-16', NULL),
(181, 'Anisa', 'Kertas Sampul Coklat', 76, 1, 22, 1010302002, 10, '2021-06-18', NULL),
(182, 'Anisa', 'Stabilo Boss', 27, 2, 22, 1010301001, 5, '2021-06-18', NULL),
(183, 'Anisa', 'Spidol Whiteboard Snowman', 66, 4, 22, 1010301001, 5, '2021-06-18', NULL),
(184, 'Anisa', 'Ballpoint Meja', 68, 1, 22, 1010301001, 5, '2021-06-18', NULL),
(185, 'Anisa', 'Ballpoint Meja', 68, 1, 22, 1010301001, 5, '2021-06-18', NULL),
(186, 'Anisa', 'Spidol Whiteboard Snowman', 66, 2, 22, 1010301001, 5, '2021-06-18', NULL),
(187, 'Anisa', 'Nota Kontan', 39, 1, 22, 1010301001, 7, '2021-06-19', NULL),
(188, 'Anisa', 'Nota Kontan', 39, 3, 22, 1010301001, 7, '2021-06-19', NULL),
(189, 'Anisa', 'Binder Clip 155', 3, 1, 22, 1010301003, 5, '2021-06-19', NULL),
(190, 'Anisa', 'Stabilo Boss', 27, 1, 22, 1010301001, 5, '2021-07-08', NULL),
(191, 'Anisa', 'Kertas Folio Bergaris', 86, 1, 22, 1010302002, 10, '2021-07-10', NULL),
(192, 'Anisa', 'Binder Clip 155', 3, 1, 22, 1010301003, 5, '2021-07-14', NULL),
(193, 'Anisa', 'Staples Max HD 10', 23, 1, 22, 1010301003, 5, '2021-07-14', NULL),
(194, 'Anisa', 'Stabilo Boss', 27, 1, 22, 1010301001, 5, '2021-07-14', NULL),
(195, 'Anisa', 'Rautan Pensil', 92, 1, 22, 1010301001, 5, '2021-07-14', NULL),
(196, 'Anisa', 'Kertas Sampul Coklat', 76, 1, 22, 1010302002, 10, '2021-07-14', NULL),
(197, 'Anisa', 'Kertas Sampul Coklat', 76, 1, 22, 1010302002, 10, '2021-07-14', NULL),
(198, 'Anisa', 'Tape Dispenser Lion No 50', 63, 1, 22, 1010301010, 5, '2021-07-14', NULL),
(199, 'alif', 'Binder Clip 155', 3, 1, 28, 1010301003, 5, '2021-07-15', NULL),
(200, 'alif', 'Ballpoint Meja', 68, 1, 28, 1010301001, 5, '2021-07-15', NULL),
(201, 'ahmad  doni', 'Tape Dispenser Lion No 50', 63, 1, 31, 1010301010, 5, '2021-07-16', NULL),
(202, 'ahmad  doni', 'Staples Max HD 10', 23, 1, 31, 1010301003, 5, '2021-07-22', NULL),
(203, 'ahmad  doni', 'Tape Dispenser Lion No 50', 63, 1, 31, 1010301010, 5, '2021-07-22', NULL),
(204, 'ahmad  doni', 'Staples Max HD 10', 23, 1, 31, 1010301003, 5, '2021-07-22', NULL),
(205, 'ahmad  doni', 'Tape Dispenser Lion No 50', 63, 1, 31, 1010301010, 5, '2021-07-22', NULL),
(206, 'ahmad  doni', 'Kertas Sampul Coklat', 76, 1, 31, 1010302002, 10, '2021-07-22', NULL),
(207, 'ahmad  doni', 'Nota Kontan', 39, 1, 31, 1010301001, 7, '2021-07-22', NULL),
(208, 'ahmad  doni', 'Tape Dispenser Lion No 50', 63, 1, 31, 1010301010, 5, '2021-07-22', NULL),
(209, 'ahmad  doni', 'Staples Max HD 10', 23, 1, 31, 1010301003, 5, '2021-07-22', NULL),
(210, 'ahmad  doni', 'Binder Clip 155', 3, 1, 31, 1010301003, 5, '2021-07-22', NULL),
(211, 'ahmad  doni', 'Tape Dispenser Lion No 50', 63, 1, 31, 1010301010, 5, '2021-07-22', NULL),
(212, 'ahmad  doni', 'Stabilo Boss', 27, 1, 31, 1010301001, 5, '2021-07-22', NULL),
(213, 'ahmad  doni', 'Kertas Folio Bergaris', 86, 1, 31, 1010302002, 10, '2021-07-22', NULL),
(214, 'ahmad  doni', 'Trigonal Clip 1', 31, 1, 31, 1010301003, 8, '2021-07-22', NULL),
(215, 'alif', 'Tape Dispenser Lion No 50', 63, 1, 28, 1010301010, 5, '2021-07-23', NULL),
(216, 'alif', 'Spidol Whiteboard Snowman', 66, 1, 28, 1010301001, 5, '2021-07-23', NULL),
(217, 'alif', 'Ballpoint Meja', 68, 1, 28, 1010301001, 5, '2021-07-23', NULL),
(218, 'alif', 'Ballpoint Meja', 68, 1, 28, 1010301001, 5, '2021-07-23', NULL),
(219, 'ahmad  doni', 'Spidol Whiteboard Snowman', 66, 1, 31, 1010301001, 5, '2021-07-23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `divisi` varchar(100) DEFAULT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `name`, `divisi`, `level`) VALUES
(22, 'anisa', '8cb2237d0679ca88db6464eac60da96345513964', 'Anisa', 'Manajemen Pemasaran', 2),
(27, 'anisaawe', '601f1889667efaebb33b8c12572835da3f027f78', 'Anisaawe', NULL, 1),
(28, 'alif123', '48058e0c99bf7d689ce71c360699a14ce2f99774', 'alif', 'Manajemen Proyek', 2),
(31, 'donni', '3acd0be86de7dcccdbf91b20f94a68cea535922d', 'ahmad  doni', 'Manajemen Kontrak dan Lisensi', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`barang_id`),
  ADD KEY `jenis_barang_id` (`jenis_barang_id`),
  ADD KEY `satuan_id` (`satuan_id`);

--
-- Indexes for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD PRIMARY KEY (`jenis_barang_id`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`satuan_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`transaksi_id`),
  ADD KEY `satuan_id` (`satuan_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `jenis_barang_id` (`jenis_barang_id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `satuan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `transaksi_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`jenis_barang_id`) REFERENCES `jenis_barang` (`jenis_barang_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_ibfk_3` FOREIGN KEY (`satuan_id`) REFERENCES `satuan` (`satuan_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`satuan_id`) REFERENCES `satuan` (`satuan_id`),
  ADD CONSTRAINT `transaksi_ibfk_5` FOREIGN KEY (`jenis_barang_id`) REFERENCES `jenis_barang` (`jenis_barang_id`),
  ADD CONSTRAINT `transaksi_ibfk_6` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_7` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`barang_id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
