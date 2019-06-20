-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2019 at 10:27 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `kode_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `harga_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `kode_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `harga_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`kode_barang`, `nama_barang`, `jumlah_barang`, `tanggal_masuk`, `harga_barang`) VALUES
('SYO0011B', 'Syo Black', 12, '2019-09-30', 180000),
('SYO01STB', 'Soraya Top IN black', 12, '2019-03-12', 188000),
('SYO02ADL', 'Azalia Dress Light', 12, '2019-03-13', 439000),
('SYO03EX', 'Syo Exclusive', 12, '2019-03-12', 279000),
('SYO04ADP', 'Aleza Dress', 12, '2019-03-14', 439000),
('SYO06GD', 'Graciella dress', 12, '2019-03-12', 439000),
('SYO07ALG', 'Anasya Light Grey', 12, '2019-03-14', 299000),
('SYO08GDBM', 'Graciella Dress Blur Mix', 12, '2019-03-15', 439000),
('SYOAMANDA', 'Amanda Top Green', 12, '2019-03-12', 198000),
('SYOEX053', 'Syo Scarves', 12, '2019-03-15', 279000),
('SYOEX68', 'SYO exclusive Series', 12, '2019-03-13', 239000);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_supplier`
--

CREATE TABLE `pembelian_supplier` (
  `kode_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `harga_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `kode_penjualan` varchar(11) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `tanggal_pembeian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`kode_penjualan`, `kode_barang`, `nama_barang`, `jumlah_barang`, `harga_barang`, `tanggal_pembeian`) VALUES
('00001', 'SYO01STB', 'Soraya Top In black', 1, 0, '0000-00-00'),
('00002', 'SYO02ADL', 'Azalia Dress Light', 2, 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `return_barang`
--

CREATE TABLE `return_barang` (
  `kode_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `keterangan_barang` text NOT NULL,
  `tanggal_pembelian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `return_barang`
--

INSERT INTO `return_barang` (`kode_barang`, `nama_barang`, `jumlah_barang`, `keterangan_barang`, `tanggal_pembelian`) VALUES
('SYO0001', 'Vlack DJ', 12, 'Barng MANAjsnkdbskdjd\r\ndfjfdhgd\r\ndfgnjdfsgs\r\ndfgnjfdbgjkdfsbdfbhdfjbg\r\ndfghdfjgsd\r\ndfjbvkjndfvkfdmga\r\ndfvndanvkad\r\ndvndkfnglkdfngiod\r\ndfnfdgndfni', '2019-06-14');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_actived` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_actived`, `date_created`) VALUES
(1, 'Rennola Azizah', 'administrator@gmail.com', 'default.png', '$2y$10$5kxPCILao27z3T74hHnXp.Y6aePTREOVel5yskIlY90f5I6f.b3W6', 1, 1, 1559230083),
(2, 'Rennola Azizah', 'gudang@gmail.com', 'default.png', '$2y$10$fA7oxxsA8J/UNvVdFupjIuLx4VzcpXNljpTYvv1KsL8f3jT98SD1q', 2, 1, 1559230099),
(3, 'Rennola Azizah', 'penjualan@gmail.com', 'default.png', '$2y$10$KtdA0lIpXk3aR9HMHHCuteNm5ESooxm6we4BFxNleea2WlGVq8aGO', 3, 1, 1559230123),
(4, 'Rennola Azizah', 'pelanggan@gmail.com', 'default.png', '$2y$10$vdLmm7FteKgooeqcrKy3nugROCbPakkgbnjZ3q7X0UaSrDwCDE6Y2', 4, 1, 1559230143);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 2, 3),
(6, 2, 4),
(7, 3, 3),
(8, 3, 4),
(9, 4, 3),
(10, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Beranda'),
(2, 'Admin'),
(3, 'Transaksi'),
(4, 'Laporan');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Gudang'),
(3, 'Penjualan'),
(4, 'Pelanggan');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Halaman Utama', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'Akun', 'admin/user', 'fas fa-fw fa-user', 1),
(3, 3, 'Barang Masuk', 't_barangmasuk', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Barang Keluar', 't_barangkeluar', 'fas fa-sw fa-folder', 1),
(5, 3, 'Penjualan', 't_penjualan', 'fas fa-fw fa-folder-open', 1),
(6, 3, 'Pengembalian', 't_pengembalian', 'fas fa-fw fa-user-tie', 1),
(8, 4, 'Barang Masuk', 'l_barangmasuk', 'fas fa-fw fa-user', 1),
(9, 4, 'Barang Keluar', 'l_barangkeluar', 'fas fa-fw fa-user-edit', 1),
(10, 4, 'Penjualan', 'l_penjualan', 'fas fa-sw fa-folder', 1),
(11, 4, 'Pembelian', 'l_pembelian', 'fas fa-fw fa-folder-open', 1),
(12, 4, 'Pengembalian', 'l_pengembalian', 'fas fa-fw fa-user-tie', 1),
(13, 4, 'Pembelian Supplier', 'l_pembeliansupplier', 'fas fa-fw fa-tachometer-alt', 1),
(14, 4, 'Struk Pembelian', 'l_strukpembelian', 'fas fa-fw fa-user-edit', 1),
(15, 3, 'Pembelian Supplier', 't_pembeliansupplier', 'fas fa-fw fa-tachometer-alt', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `pembelian_supplier`
--
ALTER TABLE `pembelian_supplier`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`kode_penjualan`,`kode_barang`),
  ADD KEY `kode_barang` (`kode_barang`);

--
-- Indexes for table `return_barang`
--
ALTER TABLE `return_barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD CONSTRAINT `barang_keluar_ibfk_1` FOREIGN KEY (`kode_barang`) REFERENCES `barang_masuk` (`kode_barang`);

--
-- Constraints for table `pembelian_supplier`
--
ALTER TABLE `pembelian_supplier`
  ADD CONSTRAINT `pembelian_supplier_ibfk_1` FOREIGN KEY (`kode_barang`) REFERENCES `barang_masuk` (`kode_barang`);

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`kode_barang`) REFERENCES `barang_masuk` (`kode_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
