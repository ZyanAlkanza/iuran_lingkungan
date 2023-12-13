-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2023 at 02:57 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iuranlingkungan`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_iuran` int(11) NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL,
  `keterangan` varchar(300) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_transaksi`, `id_iuran`, `bukti_pembayaran`, `keterangan`, `status`) VALUES
(52, 8, 'bukti-zyan24.png', '', 2),
(53, 8, 'bukti-azharee6.png', '', 1),
(55, 8, 'bukti-azharee7.png', '', 3),
(56, 8, 'bukti-zyan25.png', '', 1),
(59, 8, 'bukti-azharee8.png', '', 3),
(62, 8, 'bukti-azharee11.png', '', 3),
(63, 8, 'bukti5.jpg', '', 3),
(65, 8, 'bukti6.jpg', '', 2),
(66, 8, 'bukti7.jpg', '', 2),
(67, 10, 'bukti8.jpg', '', 2),
(68, 8, 'bukti-vickry4.png', '', 3),
(70, 8, 'bukti-azharee13.png', 'Mohon segera membayar iuran!', 2),
(71, 8, 'bukti-azharee12.png', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `iuran`
--

CREATE TABLE `iuran` (
  `id_iuran` int(11) NOT NULL,
  `jenis_iuran` varchar(50) NOT NULL,
  `biaya` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `iuran`
--

INSERT INTO `iuran` (`id_iuran`, `jenis_iuran`, `biaya`) VALUES
(8, 'Iuran Lingkungan', '200000');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role` int(1) NOT NULL,
  `jabatan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role`, `jabatan`) VALUES
(1, 'Ketua RT'),
(2, 'Bendahara RT'),
(3, 'Warga'),
(4, 'Ketua RW'),
(5, 'Bendahara RW');

-- --------------------------------------------------------

--
-- Table structure for table `rt`
--

CREATE TABLE `rt` (
  `rt` int(11) NOT NULL,
  `nama_rt` varchar(20) NOT NULL,
  `rw` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rt`
--

INSERT INTO `rt` (`rt`, `nama_rt`, `rw`) VALUES
(8, 'RT 08', 18),
(9, 'RT 09', 18);

-- --------------------------------------------------------

--
-- Table structure for table `rw`
--

CREATE TABLE `rw` (
  `rw` int(11) NOT NULL,
  `nama_rw` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rw`
--

INSERT INTO `rw` (`rw`, `nama_rw`) VALUES
(18, 'RW 018');

-- --------------------------------------------------------

--
-- Table structure for table `status_pembayaran`
--

CREATE TABLE `status_pembayaran` (
  `status` int(1) NOT NULL,
  `keterangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_pembayaran`
--

INSERT INTO `status_pembayaran` (`status`, `keterangan`) VALUES
(0, 'Proses Verifikasi'),
(1, 'Ditolak'),
(2, 'Belum Bayar'),
(3, 'Sudah Bayar');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_warga` int(11) NOT NULL,
  `atas_nama` varchar(150) NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `pembayaran_bulan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_warga`, `atas_nama`, `tanggal_pembayaran`, `pembayaran_bulan`) VALUES
(52, 1, 'Zyan Alkanza', '2022-01-18', 'Januari'),
(55, 2, 'Azharee', '2023-01-20', 'Januari'),
(56, 1, 'Zyan Alkanza', '2022-02-18', 'Februari'),
(59, 2, 'Azharee', '2023-02-19', 'Februari'),
(62, 2, 'Azhari N Fauzi', '2023-03-10', 'Maret'),
(63, 6, 'Theo', '2023-01-10', 'Januari'),
(65, 1, 'zyan', '2023-07-15', 'Juli'),
(66, 1, 'zyan', '2023-07-16', 'Desember'),
(67, 1, 'zyan', '2023-07-17', 'Januari'),
(68, 5, 'vickry', '2023-01-17', 'Januari'),
(70, 2, 'azhari', '2023-04-24', 'April'),
(71, 2, 'Azhari', '2023-05-01', 'Mei');

-- --------------------------------------------------------

--
-- Table structure for table `warga`
--

CREATE TABLE `warga` (
  `id_warga` int(11) NOT NULL,
  `nama_warga` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `blok_rumah` varchar(3) NOT NULL,
  `rt` int(11) NOT NULL,
  `rw` int(11) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `warga`
--

INSERT INTO `warga` (`id_warga`, `nama_warga`, `email`, `blok_rumah`, `rt`, `rw`, `telepon`, `password`, `role`) VALUES
(2, 'Azhari Nur Fauzi', 'azharee@gmail.com', 'H1', 9, 18, '081318888999', '$2y$10$W1LKFLLLHn88UXOBPpt1VudmXzro8fnYZ9OwodbGWQc858ZA6Z4V6', 3),
(3, 'Bendahara RT 09', 'bendahara9@gmail.com', 'D7', 9, 18, '089653534708', '$2y$10$1JjphNq3nab/lqhHpKKxB.T4Ol6Abx9l9ecMWlmPqCKoEyo1fjSEu', 2),
(4, 'Ketua RT 09', 'rt9@gmail.com', 'D7', 9, 18, '081813999000', '$2y$10$1j/XPAvaa6p7LeK0hDXoNeBY2gmExdxOV5707mpq1asH1TuV7TJqq', 1),
(5, 'Vickry Satria', 'vickry@gmail.com', 'A1', 8, 18, '081318888000', '$2y$10$7NiKVuw9eV4w6WDA8TrvXu.P1.5Gr5mIwOreGtYcvdFl2gPV4viQ2', 3),
(6, 'Theo Laksono', 'theo@gmail.com', 'B1', 8, 18, '081318888999', '$2y$10$HV84uBrhNSM6oE5y25AZ8eIT.xzL0PHz9J1pUdfiWL3ACM/LLdnkS', 3),
(7, 'Ketua RW', 'rw@gmail.com', 'D7', 9, 18, '085656999888', '$2y$10$g2DYXLtBazSG8ypmYv6QR.EelSR35j7Em6dim/XHeKW3z5Yev3PPi', 4),
(9, 'Ketua RT 08', 'rt8@gmail.com', 'D7', 8, 18, '081318999000', '$2y$10$muLW7mh3u0K/EV8FHtiCgOthTdP.7yUhKyn5hAU3WmFWZzaYlFeTy', 1),
(10, 'Bendahara RT 08', 'bendahara8@gmail.com', 'D7', 8, 18, '089653534708', '$2y$10$FZJnKXnNco0NdV1KiPUgWemgwNr/9ZT76ekBPfdwWPo3RZaIuHNou', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD KEY `id_iuran` (`id_iuran`),
  ADD KEY `id_transaksi` (`id_transaksi`) USING BTREE,
  ADD KEY `status` (`status`);

--
-- Indexes for table `iuran`
--
ALTER TABLE `iuran`
  ADD PRIMARY KEY (`id_iuran`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role`);

--
-- Indexes for table `rt`
--
ALTER TABLE `rt`
  ADD PRIMARY KEY (`rt`),
  ADD KEY `rw` (`rw`);

--
-- Indexes for table `rw`
--
ALTER TABLE `rw`
  ADD PRIMARY KEY (`rw`);

--
-- Indexes for table `status_pembayaran`
--
ALTER TABLE `status_pembayaran`
  ADD PRIMARY KEY (`status`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`) USING BTREE,
  ADD KEY `id_warga` (`id_warga`);

--
-- Indexes for table `warga`
--
ALTER TABLE `warga`
  ADD PRIMARY KEY (`id_warga`),
  ADD KEY `role` (`role`),
  ADD KEY `rt` (`rt`),
  ADD KEY `rw` (`rw`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `iuran`
--
ALTER TABLE `iuran`
  MODIFY `id_iuran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `warga`
--
ALTER TABLE `warga`
  MODIFY `id_warga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
