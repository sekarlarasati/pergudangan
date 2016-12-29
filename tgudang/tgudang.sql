-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2016 at 02:10 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tgudang`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_keluar` int(20) NOT NULL,
  `tgl` date NOT NULL,
  `kode_barang` int(40) NOT NULL,
  `jumlah` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_keluar`
--

INSERT INTO `barang_keluar` (`id_keluar`, `tgl`, `kode_barang`, `jumlah`) VALUES
(1, '2016-12-29', 3, 6),
(2, '2016-12-30', 3, 89);

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_masuk` int(20) NOT NULL,
  `tgl` date NOT NULL,
  `kode_barang` varchar(30) NOT NULL,
  `jumlah` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_masuk`, `tgl`, `kode_barang`, `jumlah`) VALUES
(1, '2016-12-28', '3', '5'),
(2, '2016-12-28', '3', '100'),
(3, '2016-12-28', '3', '100'),
(4, '2016-12-28', '3', '100'),
(5, '2016-12-29', '3', '1'),
(6, '2016-12-29', '3', '400'),
(7, '1970-01-01', '3', '5'),
(8, '1970-01-01', '3', '6');

-- --------------------------------------------------------

--
-- Table structure for table `data_barang`
--

CREATE TABLE `data_barang` (
  `kode_barang` int(20) NOT NULL,
  `nama_barang` varchar(40) NOT NULL,
  `jenis_barang` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_barang`
--

INSERT INTO `data_barang` (`kode_barang`, `nama_barang`, `jenis_barang`) VALUES
(3, 'teh manis maknyos', 'dingin'),
(4, 'plastik', 'dingin');

-- --------------------------------------------------------

--
-- Table structure for table `data_perencanaan`
--

CREATE TABLE `data_perencanaan` (
  `id_rencana` int(10) NOT NULL,
  `tgl` date NOT NULL,
  `kode_barang` varchar(20) NOT NULL,
  `rata` varchar(20) NOT NULL,
  `periode` varchar(20) NOT NULL,
  `lead` varchar(20) NOT NULL,
  `safety` varchar(20) NOT NULL,
  `tersedia` varchar(20) NOT NULL,
  `order` varchar(20) NOT NULL,
  `eoq` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_persediaan`
--

CREATE TABLE `data_persediaan` (
  `kode_barang` varchar(40) NOT NULL,
  `stok_awal` varchar(10) NOT NULL DEFAULT '0',
  `masuk` varchar(10) NOT NULL DEFAULT '0',
  `keluar` varchar(10) NOT NULL DEFAULT '0',
  `stok_akhir` varchar(10) NOT NULL DEFAULT '0',
  `rata_keluar` varchar(10) NOT NULL DEFAULT '0',
  `safety_stok` varchar(10) NOT NULL DEFAULT '0',
  `stok_tersedia` varchar(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_persediaan`
--

INSERT INTO `data_persediaan` (`kode_barang`, `stok_awal`, `masuk`, `keluar`, `stok_akhir`, `rata_keluar`, `safety_stok`, `stok_tersedia`) VALUES
('3', '5', '717', '95', '0', '0', '0', '622');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `username` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `login_hash` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`username`, `password`, `login_hash`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'administrator'),
('gudang', '202446dd1d6028084426867365b0c7a1', 'gudang'),
('pimpinan', '90973652b88fe07d05a4304f0a945de8', 'pimpinan'),
('sekretaris', 'ce1023b227de5c34b98c470cda4699bb', 'sekretaris');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_keluar`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_masuk`);

--
-- Indexes for table `data_barang`
--
ALTER TABLE `data_barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `data_perencanaan`
--
ALTER TABLE `data_perencanaan`
  ADD PRIMARY KEY (`id_rencana`);

--
-- Indexes for table `data_persediaan`
--
ALTER TABLE `data_persediaan`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id_keluar` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id_masuk` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `data_barang`
--
ALTER TABLE `data_barang`
  MODIFY `kode_barang` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `data_perencanaan`
--
ALTER TABLE `data_perencanaan`
  MODIFY `id_rencana` int(10) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
