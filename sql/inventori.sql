-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 07, 2015 at 03:23 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventori`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `kode_barang` varchar(6) NOT NULL,
  `tgl_beli` date NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `devisi`
--

CREATE TABLE IF NOT EXISTS `devisi` (
  `kode_devisi` int(3) NOT NULL,
  `nama_devisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rakitan_detail`
--

CREATE TABLE IF NOT EXISTS `rakitan_detail` (
  `id` int(11) NOT NULL,
  `kode_rakit` varchar(10) NOT NULL,
  `kode_barang` varchar(6) NOT NULL,
  `configurasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rakitan_header`
--

CREATE TABLE IF NOT EXISTS `rakitan_header` (
  `kode_rakit` varchar(10) NOT NULL,
  `tanggal_rakit` date NOT NULL,
  `pengguna` varchar(50) NOT NULL,
  `unit_health` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `status_barang`
--

CREATE TABLE IF NOT EXISTS `status_barang` (
  `status_stok` enum('used','not used') DEFAULT NULL,
  `kondisi_barang` int(3) NOT NULL,
  `kode_barang` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE IF NOT EXISTS `unit` (
  `kode_unit` int(3) NOT NULL,
  `nama_unit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `devisi`
--
ALTER TABLE `devisi`
  ADD PRIMARY KEY (`kode_devisi`);

--
-- Indexes for table `rakitan_detail`
--
ALTER TABLE `rakitan_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_rakit` (`kode_rakit`),
  ADD KEY `kode_barang` (`kode_barang`);

--
-- Indexes for table `rakitan_header`
--
ALTER TABLE `rakitan_header`
  ADD PRIMARY KEY (`kode_rakit`);

--
-- Indexes for table `status_barang`
--
ALTER TABLE `status_barang`
  ADD KEY `kode_barang` (`kode_barang`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`kode_unit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rakitan_detail`
--
ALTER TABLE `rakitan_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `rakitan_detail`
--
ALTER TABLE `rakitan_detail`
  ADD CONSTRAINT `rakitan_detail_ibfk_1` FOREIGN KEY (`kode_rakit`) REFERENCES `rakitan_header` (`kode_rakit`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rakitan_detail_ibfk_2` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `status_barang`
--
ALTER TABLE `status_barang`
  ADD CONSTRAINT `status_barang_ibfk_1` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
