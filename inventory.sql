-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 10, 2016 at 06:48 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `app`
--

CREATE TABLE `app` (
  `kode_app` varchar(10) NOT NULL,
  `nama_app` varchar(30) NOT NULL,
  `deskripsi` text,
  `bit` int(10) NOT NULL,
  `kode_kategoriapp` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app`
--

INSERT INTO `app` (`kode_app`, `nama_app`, `deskripsi`, `bit`, `kode_kategoriapp`) VALUES
('BWS-001', 'Mozilla Firefox', 'Versi 48.1', 32, 'BWS'),
('BWS-002', 'Google Chrome', 'Versi 40.031.20', 32, 'BWS');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kode_barang` varchar(10) NOT NULL,
  `tgl_beli` date NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `deskripsi` text,
  `kode_unit` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kode_barang`, `tgl_beli`, `nama_barang`, `deskripsi`, `kode_unit`) VALUES
('HRD-001', '2016-01-07', 'Seagate', '160 GB', 'HRD'),
('LAN-001', '2016-01-07', 'On Board', 'Realtek PCIe GBE Family Controller', 'LAN'),
('PCR-001', '2016-01-07', 'Intel (R)', 'Core (TM) 2 Duo 2.80 GHz', 'PCR'),
('RAM-001', '2016-01-07', 'V-GEN', '2 GB', 'RAM'),
('SDC-001', '2016-01-07', 'On Board', 'Realtek HD Audio Output', 'SDC'),
('VGA-001', '2016-01-07', 'NVIDIA Ge Force 8400 GS', '512 MB', 'VGA');

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `kode_divisi` varchar(3) NOT NULL,
  `nama_divisi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`kode_divisi`, `nama_divisi`) VALUES
('HWR', 'Hardware'),
('SFR', 'Software');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kode_kategori` varchar(10) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kode_kategori`, `nama_kategori`) VALUES
('HWR-001', 'Specification Computer'),
('HWR-002', 'Support Device'),
('SFR-001', 'Operating Systems'),
('SFR-002', 'Software Application');

-- --------------------------------------------------------

--
-- Table structure for table `kategoriapp`
--

CREATE TABLE `kategoriapp` (
  `kode_kategoriapp` varchar(3) NOT NULL,
  `nama_kategoriapp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategoriapp`
--

INSERT INTO `kategoriapp` (`kode_kategoriapp`, `nama_kategoriapp`) VALUES
('BWS', 'Browser'),
('DSG', 'Design'),
('OFF', 'Office');

-- --------------------------------------------------------

--
-- Table structure for table `laboratorium`
--

CREATE TABLE `laboratorium` (
  `kode_lab` varchar(10) NOT NULL,
  `nama_lab` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laboratorium`
--

INSERT INTO `laboratorium` (`kode_lab`, `nama_lab`) VALUES
('Lab-32', 'Lab ICT');

-- --------------------------------------------------------

--
-- Table structure for table `status_barang`
--

CREATE TABLE `status_barang` (
  `id` int(11) NOT NULL,
  `status_stok` enum('used','not used') DEFAULT NULL,
  `kondisi_barang` int(3) NOT NULL,
  `kode_barang` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_barang`
--

INSERT INTO `status_barang` (`id`, `status_stok`, `kondisi_barang`, `kode_barang`) VALUES
(1, 'not used', 100, 'RAM-001'),
(2, 'not used', 100, 'HRD-001'),
(3, 'not used', 100, 'PCR-001'),
(4, 'not used', 100, 'VGA-001'),
(5, 'not used', 100, 'LAN-001'),
(6, 'not used', 100, 'SDC-001');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `kode_unit` varchar(3) NOT NULL,
  `nama_unit` varchar(25) NOT NULL,
  `kode_kategori` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`kode_unit`, `nama_unit`, `kode_kategori`) VALUES
('CDR', 'CD-ROM', 'HWR-001'),
('DSG', 'Design', 'SFR-002'),
('HRD', 'Hardisk', 'HWR-001'),
('KYB', 'Keyboard', 'HWR-002'),
('LAN', 'LAN', 'HWR-001'),
('LNX', 'Linux', 'SFR-001'),
('MLT', 'Multimedia', 'SFR-002'),
('MOS', 'Mouse', 'HWR-002'),
('MTR', 'Monitor', 'HWR-002'),
('OFF', 'Office', 'SFR-002'),
('PCR', 'Processor', 'HWR-001'),
('PTR', 'Printer', 'HWR-002'),
('RAM', 'RAM', 'HWR-001'),
('SDC', 'Sound Card', 'HWR-001'),
('SPR', 'Speaker', 'HWR-002'),
('VGA', 'VGA', 'HWR-001'),
('WIN', 'Windows', 'SFR-001');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama_pengguna` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `deskripsi` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama_pengguna`, `username`, `password`, `email`, `status`, `deskripsi`) VALUES
(1, 'Administrator', 'admin820', 'b727c0d347b0079c3c8e062b53c92d89', 'master@web.com', 'admin', 'Feel free to try more !');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app`
--
ALTER TABLE `app`
  ADD PRIMARY KEY (`kode_app`),
  ADD KEY `kode_unit` (`kode_kategoriapp`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`),
  ADD KEY `kode_unit` (`kode_unit`);

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`kode_divisi`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kode_kategori`);

--
-- Indexes for table `kategoriapp`
--
ALTER TABLE `kategoriapp`
  ADD PRIMARY KEY (`kode_kategoriapp`);

--
-- Indexes for table `laboratorium`
--
ALTER TABLE `laboratorium`
  ADD PRIMARY KEY (`kode_lab`);

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
  ADD PRIMARY KEY (`kode_unit`),
  ADD KEY `kode_kategori` (`kode_kategori`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `status_barang`
--
ALTER TABLE `status_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `app`
--
ALTER TABLE `app`
  ADD CONSTRAINT `app_ibfk_1` FOREIGN KEY (`kode_kategoriapp`) REFERENCES `kategoriapp` (`kode_kategoriapp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`kode_unit`) REFERENCES `unit` (`kode_unit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `status_barang`
--
ALTER TABLE `status_barang`
  ADD CONSTRAINT `status_barang_ibfk_1` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `unit`
--
ALTER TABLE `unit`
  ADD CONSTRAINT `unit_ibfk_1` FOREIGN KEY (`kode_kategori`) REFERENCES `kategori` (`kode_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
