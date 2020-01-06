-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 06 Jan 2020 pada 16.20
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pro_haris`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pasien`
--

CREATE TABLE IF NOT EXISTS `tbl_pasien` (
`no` int(11) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `nohp` varchar(100) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `umur_b` varchar(100) NOT NULL,
  `umur_h` varchar(100) NOT NULL,
  `tanggal_kms` varchar(100) NOT NULL,
  `berat_badan` varchar(100) NOT NULL,
  `keluhan` varchar(100) NOT NULL,
  `tindakan` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2321322 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pasien`
--

INSERT INTO `tbl_pasien` (`no`, `tanggal`, `nama`, `jk`, `alamat`, `nohp`, `kategori`, `umur_b`, `umur_h`, `tanggal_kms`, `berat_badan`, `keluhan`, `tindakan`) VALUES
(5, '2019-11-04', 'BACHTIAR FIRDAUS', 'LAKI - LAKI', 'PALAS AJI KECAMATAN PALAS LAMPUNG SELATAN', '087854544933', 'GANTENG', '23', '12', '2019-11-06', '20.2', 'susah', 'banget'),
(6, '2019-11-05', 'HARIS', 'LAKI - LAKI', 'PALAS AJI KECAMATAN PALAS LAMPUNG SELATAN', '087854544933', 'PRIIA TTAMPAN', '1', '', '2019-11-06', '20', 'SKRIPSI GA KELAR', 'NGALEN'),
(2321321, '2019-11-12', 'uni', 'PEREMPUAN', 'fefewfe', '4354354', 'favdcad', '45', '', '2019-11-12', '3.4', 'SUSAH', 'SAKIT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
`no` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(10000) NOT NULL,
  `nohp` varchar(12) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`no`, `user`, `password`, `nama`, `alamat`, `nohp`, `level`) VALUES
(3, 'admin', 'admin', 'daus1', 'daus', '09', 'ADMIN'),
(8, 'DAUS', 'GANTENG', 'DAUS', 'JKASJJKAK', '097878787', 'KMS'),
(9, 'HARIS', 'HARIS', 'HARIS', 'PALAS', '087854544933', 'KADER-PENDAFTARAN'),
(10, 'ha', 'ha', 'HA', '', '0938', 'KADER-PENDAFTARAN'),
(11, 'A', '', '', '', '', 'KMS'),
(12, 'KMS', 'KMS', 'IBU kms', 'DDGJKNGKJ', '0484733', 'KMS'),
(13, 'pendaftaran', 'pendaftaran', 'ibu pendaftaran', ' vsd vsdvs', '03822', 'KADER-PENDAFTARAN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_pasien`
--
ALTER TABLE `tbl_pasien`
 ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
 ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_pasien`
--
ALTER TABLE `tbl_pasien`
MODIFY `no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2321322;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
MODIFY `no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
