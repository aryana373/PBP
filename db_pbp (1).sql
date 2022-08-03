-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2022 at 08:02 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pbp`
--

-- --------------------------------------------------------

--
-- Table structure for table `operator`
--

CREATE TABLE `operator` (
  `id_user` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `nama` text NOT NULL,
  `password` varchar(50) NOT NULL,
  `jenis_user` varchar(15) NOT NULL,
  `unit` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `operator`
--

INSERT INTO `operator` (`id_user`, `username`, `nama`, `password`, `jenis_user`, `unit`) VALUES
(1, 'kim', 'Kadek Aryana Dwi Putra,S.Kom.,M.A', 'fb1eaf2bd9f2a7013602be235c305e7a', 'admin', 'Admin '),
(2, 'fisip', 'Admin FISIP', '6ce566b74c3d4a9320ea15804dbb6e87', 'user', 'FISIP UNUD'),
(3, 'fmipa', 'Admin FMIPA', '640a10b73e5d19e72f5589be18d642f2', 'user', 'FMIPA UNUD');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bantu_pilih`
--

CREATE TABLE `tb_bantu_pilih` (
  `id_pilih` int(11) NOT NULL,
  `buku_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `jumlah_terpilih` int(11) NOT NULL,
  `status_terpilih` int(11) NOT NULL,
  `periode` int(11) NOT NULL,
  `total_harga_terpilih` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_bantu_pilih`
--

INSERT INTO `tb_bantu_pilih` (`id_pilih`, `buku_id`, `user_id`, `jumlah_terpilih`, `status_terpilih`, `periode`, `total_harga_terpilih`) VALUES
(44, 120, 2, 5, 0, 1, 225000),
(45, 118, 2, 2, 0, 1, 100000),
(46, 117, 2, 3, 0, 1, 105000),
(49, 118, 3, 3, 0, 1, 150000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id_buku` int(11) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `pengarang` text NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `tgl_input` date NOT NULL,
  `tahun` int(11) NOT NULL,
  `penerbit` text NOT NULL,
  `bahasa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`id_buku`, `judul`, `pengarang`, `harga`, `jumlah`, `total_harga`, `status`, `tgl_input`, `tahun`, `penerbit`, `bahasa`) VALUES
(115, 'Metode Penelitian Kualitatif', 'Sugiyono', 40000, 0, 0, 2, '2022-07-31', 2017, 'Alfabeta', 'Indonesia'),
(116, 'Kultur Jaringan : Teori dan Praktek', 'Dwi Hapsono', 45000, 0, 0, 2, '2022-07-31', 2019, 'ANDI', 'Indonesia'),
(117, 'Pengantar Kepemimpinan: Teori dan Praktek', 'Peter G. Northouse', 35000, 3, 105000, 2, '2022-07-31', 2018, 'ANDI', 'Indonesia'),
(118, 'Manajemen Layanan Khusus di Sekolah', 'Wildan Zulkarnain', 50000, 5, 250000, 2, '2022-07-31', 2018, 'Bumi Aksara', 'Indonesia'),
(119, 'Gizi Kesehatan Masyarakat', 'Michael J. Gibney', 70000, 0, 0, 1, '2022-07-31', 2020, 'EGC', 'Indonesia'),
(120, 'Menguasai Statistik dengan SPSS 25', 'Singgih Santoso', 45000, 5, 225000, 2, '2022-07-31', 2019, 'Singgih Santoso', 'Indonesia'),
(122, 'Menguasai Statistik dengan SPSS 25', 'Singgih Santoso', 45000, 0, 0, 1, '2022-07-31', 2019, 'Singgih Santoso', 'Indonesia');

-- --------------------------------------------------------

--
-- Table structure for table `tb_curr_tahapan`
--

CREATE TABLE `tb_curr_tahapan` (
  `id` int(11) NOT NULL,
  `tahapan` int(11) NOT NULL,
  `periode` int(11) NOT NULL,
  `tgl_selesai_input` date NOT NULL,
  `anggaran` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_curr_tahapan`
--

INSERT INTO `tb_curr_tahapan` (`id`, `tahapan`, `periode`, `tgl_selesai_input`, `anggaran`) VALUES
(1, 0, 0, '2022-08-31', 200000000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_status`
--

CREATE TABLE `tb_status` (
  `id_status` int(11) NOT NULL,
  `nama_status` varchar(12) NOT NULL,
  `Keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_bantu_pilih`
--
ALTER TABLE `tb_bantu_pilih`
  ADD PRIMARY KEY (`id_pilih`);

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `tb_curr_tahapan`
--
ALTER TABLE `tb_curr_tahapan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`id_status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `operator`
--
ALTER TABLE `operator`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_bantu_pilih`
--
ALTER TABLE `tb_bantu_pilih`
  MODIFY `id_pilih` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `tb_curr_tahapan`
--
ALTER TABLE `tb_curr_tahapan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_status`
--
ALTER TABLE `tb_status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
