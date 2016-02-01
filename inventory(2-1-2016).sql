-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 01, 2016 at 09:48 AM
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
('KYB-001', '2016-01-31', 'Simbadda', 'Masih bagus', 'KYB'),
('LNX-001', '2016-01-12', 'Linux Ubuntu', '', 'LNX'),
('LNX-002', '2016-01-12', 'Linux Mint', '', 'LNX'),
('LNX-003', '2016-01-12', 'Linux OpenSuse', '', 'LNX'),
('LNX-004', '2016-01-12', 'Linux Debian', '', 'LNX'),
('LNX-005', '2016-01-12', 'Red Hat', '', 'LNX'),
('LNX-006', '2012-02-13', 'Admin', 'fjdwkfj', 'LNX'),
('MAC-001', '2016-01-16', 'OS X', 'fdkj', 'MAC'),
('MOS-001', '2016-01-31', 'Logitech', 'Masih bagus', 'MOS'),
('MTR-001', '2016-01-31', 'Samsung', '14 Inch', 'MTR'),
('WIN-001', '2016-01-12', 'Windows XP', '', 'WIN'),
('WIN-002', '2016-01-12', 'Windows 7', '', 'WIN'),
('WIN-003', '2016-01-12', 'Windows 8', '', 'WIN');

-- --------------------------------------------------------

--
-- Table structure for table `detail_rakitan`
--

CREATE TABLE `detail_rakitan` (
  `id` int(11) NOT NULL,
  `nama_unit` varchar(100) NOT NULL,
  `merek_type` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `kode_rakit` varchar(10) NOT NULL,
  `ket` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
('STR', 'Software');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kode_kategori` varchar(10) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL,
  `kode_divisi` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kode_kategori`, `nama_kategori`, `kode_divisi`) VALUES
('HWR-001', 'Specification computer', 'HWR'),
('HWR-002', 'Support Device', 'HWR'),
('STR-001', 'Operating System', 'STR');

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
('Lab-32', 'Lab ICT'),
('Lab-332', 'dsaas');

-- --------------------------------------------------------

--
-- Table structure for table `rakitan`
--

CREATE TABLE `rakitan` (
  `kode_rakit` varchar(10) NOT NULL,
  `tanggal_rakit` date NOT NULL,
  `pengguna` varchar(50) NOT NULL,
  `unit_health` int(3) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `workgroup` varchar(20) NOT NULL,
  `nama_komputer` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(7, 'not used', 100, 'WIN-001'),
(8, 'not used', 100, 'WIN-002'),
(9, 'not used', 100, 'WIN-003'),
(10, 'not used', 100, 'LNX-001'),
(11, 'not used', 100, 'LNX-002'),
(12, 'not used', 100, 'LNX-003'),
(13, 'not used', 100, 'LNX-004'),
(14, 'not used', 100, 'LNX-005'),
(16, 'not used', 100, 'MAC-001'),
(18, 'not used', 100, 'LNX-006'),
(19, 'not used', 100, 'KYB-001'),
(20, 'not used', 100, 'MOS-001'),
(21, 'not used', 100, 'MTR-001');

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
('HRD', 'Hard Disk', 'HWR-001'),
('KYB', 'Keyboard', 'HWR-002'),
('LAN', 'LAN', 'HWR-001'),
('LNX', 'Linux', 'STR-001'),
('MAC', 'Macintosh', 'STR-001'),
('MOS', 'Mouse', 'HWR-002'),
('MTR', 'Monitor', 'HWR-002'),
('PCR', 'Processor', 'HWR-001'),
('PTR', 'Printer', 'HWR-002'),
('RAM', 'RAM', 'HWR-001'),
('SCD', 'Sound Card', 'HWR-001'),
('SPR', 'Speaker', 'HWR-002'),
('VGA', 'VGA', 'HWR-001'),
('WIN', 'Windows', 'STR-001');

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
-- Indexes for table `detail_rakitan`
--
ALTER TABLE `detail_rakitan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`kode_divisi`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kode_kategori`),
  ADD KEY `kode_divisi` (`kode_divisi`);

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
-- Indexes for table `rakitan`
--
ALTER TABLE `rakitan`
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
-- AUTO_INCREMENT for table `detail_rakitan`
--
ALTER TABLE `detail_rakitan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `status_barang`
--
ALTER TABLE `status_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
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
-- Constraints for table `kategori`
--
ALTER TABLE `kategori`
  ADD CONSTRAINT `kategori_ibfk_1` FOREIGN KEY (`kode_divisi`) REFERENCES `divisi` (`kode_divisi`) ON DELETE CASCADE ON UPDATE CASCADE;

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
