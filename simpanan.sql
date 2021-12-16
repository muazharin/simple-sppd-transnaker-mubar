-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2021 at 05:38 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simpanan`
--

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'Kepala Dinas'),
(2, 'KABID. Hubungan Industrial dan Pengawasan Ketenaga Kerjaan'),
(3, 'KABID. Penempatan dan Pembinaan Pelatihan Tenaga Kerja'),
(4, 'KABID. Penyiapan Lahan Pemukiman Penempatan Transmigrasi'),
(5, 'KABID. Pembinaan Masyarakat Transmigrasi'),
(6, 'Kepala Seksi Penempatan, Pengembangan, Kesempatan Kerja dan Pengendalian Tenaga Kerja Asing'),
(7, 'Kepala Seksi Penyiapan Lahan Kawasan Transmigrasi'),
(8, 'Pengadministrasi Umum'),
(9, 'Analis Tenaga Kerja'),
(10, 'Pemeriksa Pembangunan Daerah Terpencil'),
(12, 'Staf Honorer');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id_log` int(11) NOT NULL,
  `level` varchar(25) NOT NULL,
  `date` datetime NOT NULL,
  `details` text NOT NULL,
  `user` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pangkat`
--

CREATE TABLE `pangkat` (
  `id_pangkat` int(11) NOT NULL,
  `nama_pangkat` varchar(100) NOT NULL,
  `golongan` enum('I','II','III','IV') NOT NULL,
  `ruang` enum('a','b','c','d','e') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pangkat`
--

INSERT INTO `pangkat` (`id_pangkat`, `nama_pangkat`, `golongan`, `ruang`) VALUES
(1, 'Juru Muda', 'I', 'a'),
(2, 'Juru Muda Tk. I', 'I', 'b'),
(3, 'Juru', 'I', 'c'),
(4, 'Juru Tk. I', 'I', 'd'),
(5, 'Pengatur Muda', 'II', 'a'),
(6, 'Pengukur Muda Tk. I', 'II', 'b'),
(7, 'Pengatur', 'II', 'c'),
(8, 'Pengatur Tk. I', 'II', 'd'),
(9, 'Penata Muda', 'III', 'a'),
(10, 'Penata Muda Tk. I', 'III', 'b'),
(11, 'Penata', 'III', 'c'),
(12, 'Penata Tk. I', 'III', 'd'),
(13, 'Pembina', 'IV', 'a'),
(14, 'Pembina Tk. I', 'IV', 'b'),
(15, 'Pembina Utama Muda', 'IV', 'c'),
(16, 'Pembina Utama', 'IV', 'e');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `pangkat` int(11) NOT NULL,
  `jabatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nip`, `nama_pegawai`, `pangkat`, `jabatan`) VALUES
(1, '196712311994011012', 'LA ODE NDIMAKA, S.TP., M.Si', 14, 2),
(2, '', 'HAIDIR', 0, 12),
(3, '', 'NIKETUT SUARDANI, SE', 0, 12);

-- --------------------------------------------------------

--
-- Table structure for table `pengikut`
--

CREATE TABLE `pengikut` (
  `id_pengikut` int(11) NOT NULL,
  `id_perjalanan` int(11) NOT NULL,
  `pengikut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengikut`
--

INSERT INTO `pengikut` (`id_pengikut`, `id_perjalanan`, `pengikut`) VALUES
(11, 6, 2),
(12, 6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `perjalanan`
--

CREATE TABLE `perjalanan` (
  `id_perjalanan` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `nomor` varchar(25) NOT NULL,
  `pegawai` int(11) NOT NULL,
  `keperluan` text NOT NULL,
  `tujuan` text NOT NULL,
  `angkutan` enum('Darat','Laut','Udara') NOT NULL,
  `tgl_berangkat` date NOT NULL,
  `tgl_kembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perjalanan`
--

INSERT INTO `perjalanan` (`id_perjalanan`, `no_urut`, `nomor`, `pegawai`, `keperluan`, `tujuan`, `angkutan`, `tgl_berangkat`, `tgl_kembali`) VALUES
(6, 1, '090/001/XII/2021', 1, 'Seminar', 'Jakarta', 'Udara', '2021-12-05', '2021-12-07');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `role` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `name`, `email`, `nohp`, `username`, `password`, `gender`, `role`) VALUES
(1, 'Administrator', 'admin@gmail.com', '082243309590', 'admin', '$2y$10$6FXODvwG8.C5hEVffHXOWe.3cyPBmB.HQFpN3HTYVeMvJgq5jj8ue', 'L', '0'),
(5, 'User 1', 'user1@gmail.com', '082243309590', 'user1', '$2y$10$tHWP.hvM56jIV7uS8d4uZeKsPeFLC6E1XRzSPfJC7XFjyxRoG1bHy', 'L', '1'),
(6, 'User 2', 'user2@gmail.com', '082243309590', 'user2', '$2y$10$Y.xslzoSfGp2SJ8i1HynU.dj/kb71gEY2AKR0cemtwhourfYKJyn.', 'P', '1'),
(7, 'Muazharin Alfan', 'alfanmuazharin@gmail.com', '082243309590', 'muazharin', '$2y$10$i/iK2FYsmdvev2lXKFt/DOgFr1EvLwF9OO22AvLy/j6qmb17Gq1Oq', 'L', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `pangkat`
--
ALTER TABLE `pangkat`
  ADD PRIMARY KEY (`id_pangkat`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `pengikut`
--
ALTER TABLE `pengikut`
  ADD PRIMARY KEY (`id_pengikut`);

--
-- Indexes for table `perjalanan`
--
ALTER TABLE `perjalanan`
  ADD PRIMARY KEY (`id_perjalanan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pangkat`
--
ALTER TABLE `pangkat`
  MODIFY `id_pangkat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengikut`
--
ALTER TABLE `pengikut`
  MODIFY `id_pengikut` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `perjalanan`
--
ALTER TABLE `perjalanan`
  MODIFY `id_perjalanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
