-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2024 at 03:57 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dkpkub_banten`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `kode_user` int(11) NOT NULL,
  `nama_user` varchar(10) NOT NULL,
  `password_user` varchar(33) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`kode_user`, `nama_user`, `password_user`) VALUES
(1, 'adminkub', 'b636d06b517a1912678cbfdfff3baa71'),
(3, 'adminkub', '0d9365a993f3e18a484af2041c8eb66a');

-- --------------------------------------------------------

--
-- Table structure for table `sensus`
--

CREATE TABLE `sensus` (
  `id` int(11) NOT NULL,
  `kab_kota` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kub` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_kub` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ketua` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notelp` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_anggota` int(150) NOT NULL,
  `aktifnon` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kusuka` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `npwp` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `akte_notaris` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sertifikat_ahu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nib_oss` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas_kub` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_kabkota` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_prvo` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_kkp` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `belum` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verif` tinyint(2) NOT NULL DEFAULT 0 COMMENT '0=Not Verified, 1= Verified'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sensus`
--

INSERT INTO `sensus` (`id`, `kab_kota`, `nama_kub`, `alamat_kub`, `ketua`, `notelp`, `jumlah_anggota`, `aktifnon`, `kusuka`, `npwp`, `akte_notaris`, `sertifikat_ahu`, `nib_oss`, `kelas_kub`, `b_kabkota`, `b_prvo`, `b_kkp`, `belum`, `verif`) VALUES
(52, 'Kota Serang', 'SINAR LAUT SATU KOTA SERANG ', 'KP. PEKAPURAN RT/RW 004/001 KEL.  BANTEN, KEC. KASEMEN KOTA SERANG', 'WARSIDI', '085780085843', 12, 'Aktif', '65f3e2d05af76.jpg', '65f7cb9826de9.jpg', '65f7cb982713c.jpg', '65f7cb982734b.jpg', '65f7cb9827547.jpg', 'Pemula', '-', '-', 'STIMULUS JARING RAMPUS 5 PCS KKP RI DESEMBER 2020', '-', 1),
(54, '', 'lahhssss', 'aku sayang kamu tapi gk jadi', '', '083804268203', 0, '', '66570fc6a9290.pdf', '65f3c3ad98194.', '65f3c3ad98195.', '65f3c3ad98196.', '65f3c3ad98197.', '', '', '', '', '', 1),
(55, '', '', '', '', '085780085843', 0, '', '66571926e6c83.jpeg', '65f3c8b963f1a.', '65f3c8b963f1b.', '65f3c8b963f1c.', '65f3c8b963f1d.', '', '', '', '', '', 1),
(59, 'Kota Cilegon', 'aku sayng amu', 'di serang serangaj\r\n', 'dengan say sendiri', '098738739', 12, '', '665806cf5fd3b.png', '665806cf60025.png', '665806cf60325.png', '665806cf62e50.png', '665806cf6314b.png', 'Pemula', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `verif_code` text NOT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `verif_code`, `is_verified`) VALUES
(17, 'anjingimut', '$2y$10$9l1QtoAmNRPdILO2T5a99e5KvWlemSShBA.d34INwh8g9yu8w8mie', 'irsfadill11@gmail.com', '8871b2707d82994997d7e8a5f28b540f', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`kode_user`);

--
-- Indexes for table `sensus`
--
ALTER TABLE `sensus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `kode_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sensus`
--
ALTER TABLE `sensus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
