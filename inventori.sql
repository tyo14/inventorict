-- phpMyAdmin SQL Dump
<<<<<<< HEAD
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 03 Nov 2015 pada 05.14
-- Versi Server: 5.6.26
-- PHP Version: 5.6.12
=======
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2015 at 11:53 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8
>>>>>>> 3b30cc9f0613087d0e245ea12ebb97e6d7f1afe3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
<<<<<<< HEAD
/*!40101 SET NAMES utf8mb4 */;
=======
/*!40101 SET NAMES utf8 */;
>>>>>>> 3b30cc9f0613087d0e245ea12ebb97e6d7f1afe3

--
-- Database: `inventori`
--

-- --------------------------------------------------------

--
<<<<<<< HEAD
-- Struktur dari tabel `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `Kode_Barang` varchar(6) NOT NULL,
  `Tgl_Beli` date NOT NULL,
  `Nama_Barang` varchar(50) NOT NULL,
  `Deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `devisi`
--

CREATE TABLE IF NOT EXISTS `devisi` (
  `Kode_Divisi` int(3) NOT NULL,
  `Nama_Devisi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rakitan_detail`
--

CREATE TABLE IF NOT EXISTS `rakitan_detail` (
  `ID` int(11) NOT NULL,
  `Kode_Rakit` varchar(10) NOT NULL,
  `Kode_Barang` varchar(6) NOT NULL,
  `Configurasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rakitan_header`
--

CREATE TABLE IF NOT EXISTS `rakitan_header` (
  `Kode_Rakit` varchar(10) NOT NULL,
  `Tgl_Rakit` date NOT NULL,
  `Pengguna` varchar(10) NOT NULL,
  `Unit_Health` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `registration`
=======
-- Table structure for table `registration`
>>>>>>> 3b30cc9f0613087d0e245ea12ebb97e6d7f1afe3
--

CREATE TABLE IF NOT EXISTS `registration` (
  `User_ID` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Full_Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
<<<<<<< HEAD
-- Dumping data untuk tabel `registration`
=======
-- Dumping data for table `registration`
>>>>>>> 3b30cc9f0613087d0e245ea12ebb97e6d7f1afe3
--

INSERT INTO `registration` (`User_ID`, `Password`, `Full_Name`) VALUES
('tyo', '26081995', 'Tyo');

<<<<<<< HEAD
-- --------------------------------------------------------

--
-- Struktur dari tabel `status_barang`
--

CREATE TABLE IF NOT EXISTS `status_barang` (
  `Status_Stok` enum('Used','Not Used') NOT NULL,
  `Kondisi_Barang` int(3) NOT NULL,
  `Kode_Barang` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `unit`
--

CREATE TABLE IF NOT EXISTS `unit` (
  `Kode_Unit` int(3) NOT NULL,
  `Nama_Unit` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

=======
>>>>>>> 3b30cc9f0613087d0e245ea12ebb97e6d7f1afe3
--
-- Indexes for dumped tables
--

--
<<<<<<< HEAD
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`Kode_Barang`);

--
-- Indexes for table `devisi`
--
ALTER TABLE `devisi`
  ADD PRIMARY KEY (`Kode_Divisi`);

--
-- Indexes for table `rakitan_detail`
--
ALTER TABLE `rakitan_detail`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `rakitan_header`
--
ALTER TABLE `rakitan_header`
  ADD PRIMARY KEY (`Kode_Rakit`);

--
=======
>>>>>>> 3b30cc9f0613087d0e245ea12ebb97e6d7f1afe3
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`User_ID`);

<<<<<<< HEAD
--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`Kode_Unit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rakitan_detail`
--
ALTER TABLE `rakitan_detail`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
=======
>>>>>>> 3b30cc9f0613087d0e245ea12ebb97e6d7f1afe3
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
