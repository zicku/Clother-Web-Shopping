-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2025 at 02:30 AM
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
-- Database: `db_youthvibe`
--

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `id_barang` int(50) NOT NULL,
  `harga` int(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `tanggal_pembayaran` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `nama_user`, `id_barang`, `harga`, `status`, `tanggal_pembayaran`) VALUES
(4, 'user', 12, 0, 'Sudah Bayar', '2025-08-12'),
(5, 'user2', 12, 0, 'Pending', '2025-08-12'),
(6, 'user10', 12, 1000000, 'Pending', '2025-07-28'),
(15, 'diana', 0, 1000000, 'Belum Dibayar', '2025-08-12'),
(16, 'diana', 9, 1000000, 'Sudah Dibayar', '2025-08-08'),
(18, 'yuyu', 15, 250000, 'Belum Dibayar', '2025-08-09');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_penerima` varchar(100) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `jumlah` int(11) NOT NULL,
  `catatan` text DEFAULT NULL,
  `tanggal_pesan` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_user`, `id_produk`, `nama_penerima`, `alamat_pengiriman`, `jumlah`, `catatan`, `tanggal_pesan`) VALUES
(1, 8, 10, 'lisa', 'jl. hongdae', 1, '', '2025-08-08 04:44:41'),
(2, 8, 13, 'yuyun', 'jl.merdeka', 1, '', '2025-08-08 04:48:32'),
(3, 8, 13, 'yuyun', 'jl.merdeka', 1, '', '2025-08-08 04:50:20'),
(4, 8, 13, 'ui', 'jl.soul', 3, '', '2025-08-08 04:51:37'),
(5, 8, 9, 'yuyu', 'j.merdeka', 1, '', '2025-08-08 04:52:15'),
(6, 8, 12, 'pipi', 'jl.tengkorak', 1, '', '2025-08-08 04:52:57'),
(7, 8, 12, 'diana', 'jl.usa', 1, '', '2025-08-08 04:53:36'),
(8, 11, 12, 'olip', 'shibuya', 1, '', '2025-08-08 18:01:27'),
(9, 11, 15, 'yuyu', 'jl.soul', 1, '', '2025-08-09 06:25:04');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_barang` int(100) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga_barang` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `stok` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_barang`, `nama_barang`, `harga_barang`, `image`, `deskripsi`, `stok`) VALUES
(8, 'KD.A1', '500000', 'model1.png', 'adadasa', 1),
(9, 'KD.B', '500000', 'model2.png', 'blue shirt ', 7),
(10, 'blouse cream ', '250000', 'model4.png', 'cream blouse , ready all size', 4),
(12, 'black casual top', '300000', 'model10.png', 'premium qualitys', 5),
(13, 'Ligh Blue Shirt', '350000', 'model11.png', 'cute shirt', 5),
(14, 'Strip Blue shirt', '450000', 'model14.png', 'ready size : m,l,XS', 10),
(15, 'yellow Strip Shirt', '450000', 'model6.png', 'Ready Size : M,L,XL', 10),
(16, 'Wine Shirt cutte', '600000', 'model7.png', 'Summer Editon ', 2),
(17, 'white Shirt', '200000', 'model3.png', 'Ready size : M,L,Xl', 12),
(18, 'Casual Shirt', '150000', 'model8.png', 'ready size: M,L,XL', 10);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email`, `password`, `username`) VALUES
(1, 'admin@gmail.com', 'admin123', 'admin'),
(2, 'admin2@gmail.com', 'admin1234', 'admin2'),
(3, 'admin3@gmai.com', 'admin1234', 'admin3'),
(4, 'user2@gmail.com', '123', 'user2'),
(5, 'admin5@gmail.com', '1234', 'admin5'),
(6, 'user3@gmail.com', 'user123', 'user3'),
(7, 'user3@gmail.com', 'user123', 'user3'),
(8, 'user@gmail.com', 'user123', 'user'),
(9, 'admin3@gmail.com', 'admin3123', 'admin3'),
(10, 'admin6@gmail.com', 'admin123', 'admin6'),
(11, 'user44@gmail.com', '123', 'user44'),
(12, 'admin11@gmail.com', '123', 'admin11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_barang` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `product` (`id_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
