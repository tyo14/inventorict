-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 03, 2016 at 02:27 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

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

CREATE TABLE `barang` (
  `kode_barang` varchar(14) NOT NULL,
  `tgl_beli` date NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `deskripsi` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kode_barang`, `tgl_beli`, `nama_barang`, `deskripsi`) VALUES
('KYB-001', '2015-12-25', 'Keyboard Votre', 'df'),
('KYB-002', '2015-12-22', 'Keyboard ACER', ''),
('MTR-001', '2015-12-25', 'Monitor LG', ''),
('MTR-002', '2015-12-26', 'Monitor ASUS', 'Komplit');

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `kode_divisi` varchar(3) NOT NULL,
  `nama_divisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`kode_divisi`, `nama_divisi`) VALUES
('HWR', 'Hardware'),
('JRG', 'Jaringan');

-- --------------------------------------------------------

--
-- Table structure for table `rakitan_detail`
--

CREATE TABLE `rakitan_detail` (
  `id` int(11) NOT NULL,
  `kode_rakit` varchar(10) NOT NULL,
  `kode_barang` varchar(14) NOT NULL,
  `konfigurasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rakitan_detail`
--

INSERT INTO `rakitan_detail` (`id`, `kode_rakit`, `kode_barang`, `konfigurasi`) VALUES
(3, 'JRG-001', 'MTR-002', 'On The GO'),
(4, 'JRG-001', 'KYB-002', 'Selesai'),
(5, 'HWR-001', 'KYB-002', 'coba'),
(6, 'JRG-002', 'MTR-002', 'ASUS'),
(7, 'JRG-002', 'MTR-001', 'LG'),
(8, 'JRG-003', 'MTR-002', ''),
(9, 'JRG-003', 'KYB-002', 'Keren nih'),
(10, 'JRG-003', 'KYB-001', 'Keyboar Votre'),
(11, 'JRG-003', 'MTR-001', 'Monitor LG'),
(12, 'JRG-003', 'KYB-001', 'banyak yang butuh'),
(13, 'JRG-003', 'MTR-001', 'koko'),
(14, 'JRG-002', 'KYB-002', 'check'),
(15, 'JRG-002', 'KYB-001', 'key'),
(16, 'JRG-001', 'KYB-001', 'keyboard 1'),
(17, 'JRG-001', 'KYB-002', 'keyboard 2'),
(18, 'JRG-001', 'MTR-001', 'mos LG'),
(21, 'JRG-004', 'KYB-001', 'Votre'),
(22, 'JRG-004', 'KYB-002', 'ACER'),
(23, 'JRG-004', 'MTR-002', 'ASUS'),
(24, 'JRG-004', 'MTR-001', 'LG');

-- --------------------------------------------------------

--
-- Table structure for table `rakitan_header`
--

CREATE TABLE `rakitan_header` (
  `kode_rakit` varchar(10) NOT NULL,
  `tanggal_rakit` date NOT NULL,
  `pengguna` varchar(50) NOT NULL,
  `unit_health` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rakitan_header`
--

INSERT INTO `rakitan_header` (`kode_rakit`, `tanggal_rakit`, `pengguna`, `unit_health`) VALUES
('HWR-001', '2016-01-02', 'Admin12', 80),
('JRG-001', '2015-12-28', 'Admin', 80),
('JRG-002', '2016-02-03', 'Cyber', 90),
('JRG-003', '2016-02-01', 'Admin Cool', 90),
('JRG-004', '2016-01-04', 'Gunawan', 80);

-- --------------------------------------------------------

--
-- Table structure for table `status_barang`
--

CREATE TABLE `status_barang` (
  `id` int(11) NOT NULL,
  `status_stok` enum('used','not used') DEFAULT NULL,
  `kondisi_barang` int(3) NOT NULL,
  `kode_barang` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_barang`
--

INSERT INTO `status_barang` (`id`, `status_stok`, `kondisi_barang`, `kode_barang`) VALUES
(1, 'not used', 50, 'KYB-001'),
(2, 'not used', 10, 'KYB-002'),
(3, 'used', 80, 'MTR-001'),
(4, 'used', 100, 'MTR-002');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `kode_unit` varchar(3) NOT NULL,
  `nama_unit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`kode_unit`, `nama_unit`) VALUES
('KYB', 'Keyboard1'),
('MTR', 'Monitor');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama_pengguna` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `deskripsi` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama_pengguna`, `username`, `password`, `email`, `status`, `deskripsi`) VALUES
(1, 'Administrator', 'admin820', 'b727c0d347b0079c3c8e062b53c92d89', 'admin@gmail.com', 'admin', 'Feel free to try more !');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`kode_divisi`);

--
-- Indexes for table `rakitan_detail`
--
ALTER TABLE `rakitan_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_barang` (`kode_barang`),
  ADD KEY `kode_rakit` (`kode_rakit`);

--
-- Indexes for table `rakitan_header`
--
ALTER TABLE `rakitan_header`
  ADD PRIMARY KEY (`kode_rakit`);

--
-- Indexes for table `status_barang`
--
ALTER TABLE `status_barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_barang` (`kode_barang`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`kode_unit`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rakitan_detail`
--
ALTER TABLE `rakitan_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `status_barang`
--
ALTER TABLE `status_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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