-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2019 at 04:34 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `6702174050`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id` int(11) NOT NULL,
  `nip` varchar(11) NOT NULL,
  `kode` varchar(3) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama_depan` varchar(20) NOT NULL,
  `nama_belakang` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `lab` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `nip`, `kode`, `username`, `password`, `nama_depan`, `nama_belakang`, `email`, `lab`) VALUES
(1, '4050', 'FZY', 'akhmadfauzy', '1c95642e277f2fd4365e251526af851f', 'Akhmad', 'Fauzy', 'ak@fauzy.com', 3);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `nama_kelas` varchar(12) NOT NULL,
  `dosen_wali` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`, `dosen_wali`) VALUES
(1, 'D3TK-41-01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `laboratory`
--

CREATE TABLE `laboratory` (
  `id` int(11) NOT NULL,
  `kode` varchar(5) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laboratory`
--

INSERT INTO `laboratory` (`id`, `kode`, `nama`) VALUES
(2, 'A1', 'Kelas A1'),
(3, 'A2', 'Kelas A2'),
(4, 'B1', 'Database'),
(5, 'B2', 'Data Mining'),
(6, 'D3', 'Programming'),
(7, 'G2', 'Hardware'),
(8, 'E4', 'Elektronika'),
(9, 'A7', 'Multimedia'),
(10, 'D2', 'Software'),
(11, 'D5', 'Programming');

-- --------------------------------------------------------

--
-- Table structure for table `lak`
--

CREATE TABLE `lak` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama_depan` varchar(20) NOT NULL,
  `nama_belakang` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lak`
--

INSERT INTO `lak` (`id`, `username`, `password`, `nama_depan`, `nama_belakang`, `email`) VALUES
(1, 'lak', 'dec46145e2c5fa1e6a9edf0820566796', 'lak', 'lak', 'lak@lak.telkomuniversity.ac.id');

-- --------------------------------------------------------

--
-- Table structure for table `mhs`
--

CREATE TABLE `mhs` (
  `id` int(11) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama_depan` varchar(20) NOT NULL,
  `nama_belakang` varchar(20) NOT NULL,
  `kelas` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mhs`
--

INSERT INTO `mhs` (`id`, `nim`, `username`, `password`, `nama_depan`, `nama_belakang`, `kelas`, `email`) VALUES
(1, '6702170000', 'alfian', '64e495f6e069af07069da7ee2dcbe081', 'Alfian', 'Nasir', 1, 'alfian@ian.com');

-- --------------------------------------------------------

--
-- Table structure for table `penjadwalan`
--

CREATE TABLE `penjadwalan` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `ruang` int(11) NOT NULL,
  `kelas` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `idx` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjadwalan`
--

INSERT INTO `penjadwalan` (`id`, `tanggal`, `jam`, `ruang`, `kelas`, `status`, `idx`) VALUES
(1, '2019-05-07', '08:00:00', 2, 1, 'pending', 1),
(2, '2019-05-07', '09:00:00', 2, 1, 'pending', 1),
(3, '2019-05-07', '10:00:00', 2, 1, 'pending', 1),
(4, '2019-05-07', '08:00:00', 3, 1, 'pending', 2),
(5, '2019-05-07', '09:00:00', 3, 1, 'pending', 2),
(6, '2019-05-07', '10:00:00', 3, 1, 'pending', 2),
(7, '2019-05-07', '08:00:00', 7, 1, 'canceled', 3),
(8, '2019-05-07', '09:00:00', 7, 1, 'canceled', 3),
(9, '2019-05-07', '08:00:00', 8, 1, 'pending', 4),
(10, '2019-05-07', '09:00:00', 8, 1, 'pending', 4),
(11, '2019-05-07', '10:00:00', 8, 1, 'pending', 4),
(12, '2019-05-08', '08:00:00', 3, 1, 'approved', 5),
(13, '2019-05-08', '09:00:00', 3, 1, 'approved', 5),
(14, '2019-05-09', '08:00:00', 2, 1, 'declined', 6),
(15, '2019-05-09', '09:00:00', 2, 1, 'declined', 6),
(16, '2019-05-09', '10:00:00', 2, 1, 'declined', 6),
(17, '2019-05-09', '08:00:00', 2, 1, 'approved', 7),
(18, '2019-05-09', '09:00:00', 2, 1, 'approved', 7),
(19, '2019-05-09', '10:00:00', 2, 1, 'approved', 7),
(20, '2019-05-09', '08:00:00', 8, 1, 'declined', 8),
(21, '2019-05-09', '09:00:00', 8, 1, 'declined', 8),
(22, '2019-05-09', '10:00:00', 8, 1, 'declined', 8);

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `subject` int(11) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id`, `user`, `subject`, `pesan`) VALUES
(1, 1, 2, 'Kelasnya Nyaman'),
(2, 1, 3, 'Coba Pesan kedua'),
(3, 1, 2, ''),
(4, 1, 2, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `peminjam` int(11) NOT NULL,
  `ruangan` int(11) NOT NULL,
  `jam_masuk` time NOT NULL,
  `jumlah_jam` int(11) NOT NULL,
  `matakuliah` varchar(30) NOT NULL,
  `kode_dosen` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `kebutuhan` text,
  `bukti` varchar(255) DEFAULT NULL,
  `status` varchar(30) NOT NULL,
  `keterangan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `peminjam`, `ruangan`, `jam_masuk`, `jumlah_jam`, `matakuliah`, `kode_dosen`, `tanggal`, `kebutuhan`, `bukti`, `status`, `keterangan`) VALUES
(1, 1, 2, '08:00:00', 3, 'SS', 1, '2019-05-07', NULL, NULL, 'pending', 'kelas'),
(2, 1, 3, '08:00:00', 3, 'SS', 1, '2019-05-07', NULL, NULL, 'pending', 'kelas'),
(3, 1, 7, '08:00:00', 2, 'Sql', 1, '2019-05-07', '-', 'proyek1.sql', 'canceled', 'praktikum'),
(4, 1, 8, '08:00:00', 3, 'Mikro', 1, '2019-05-07', 'Osiloskop', 'H3H3.png', 'pending', 'praktikum'),
(5, 1, 3, '08:00:00', 2, 'Mikro', 1, '2019-05-08', NULL, NULL, 'approved', 'kelas'),
(6, 1, 2, '08:00:00', 3, 'Sql', 1, '2019-05-09', NULL, NULL, 'declined', 'kelas'),
(7, 1, 2, '08:00:00', 3, 'Sql', 1, '2019-05-09', '-', 'Upload Data.png', 'approved', 'praktikum'),
(8, 1, 8, '08:00:00', 3, 'Mikro', 1, '2019-05-09', '-', 'Blok Diagram.png', 'declined', 'praktikum');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`,`username`),
  ADD UNIQUE KEY `nip` (`nip`),
  ADD UNIQUE KEY `kode` (`kode`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `lab` (`lab`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dosen_wali` (`dosen_wali`);

--
-- Indexes for table `laboratory`
--
ALTER TABLE `laboratory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lak`
--
ALTER TABLE `lak`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `mhs`
--
ALTER TABLE `mhs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nim` (`nim`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `kelas` (`kelas`);

--
-- Indexes for table `penjadwalan`
--
ALTER TABLE `penjadwalan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ruang` (`ruang`),
  ADD KEY `kelas` (`kelas`),
  ADD KEY `status` (`status`),
  ADD KEY `idx` (`idx`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`),
  ADD KEY `subject` (`subject`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peminjam` (`peminjam`),
  ADD KEY `ruangan` (`ruangan`),
  ADD KEY `kode_dosen` (`kode_dosen`),
  ADD KEY `status` (`status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `laboratory`
--
ALTER TABLE `laboratory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `lak`
--
ALTER TABLE `lak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mhs`
--
ALTER TABLE `mhs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penjadwalan`
--
ALTER TABLE `penjadwalan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_ibfk_1` FOREIGN KEY (`lab`) REFERENCES `laboratory` (`id`);

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`dosen_wali`) REFERENCES `dosen` (`id`);

--
-- Constraints for table `mhs`
--
ALTER TABLE `mhs`
  ADD CONSTRAINT `mhs_ibfk_2` FOREIGN KEY (`kelas`) REFERENCES `kelas` (`id`);

--
-- Constraints for table `penjadwalan`
--
ALTER TABLE `penjadwalan`
  ADD CONSTRAINT `penjadwalan_ibfk_1` FOREIGN KEY (`kelas`) REFERENCES `kelas` (`id`),
  ADD CONSTRAINT `penjadwalan_ibfk_2` FOREIGN KEY (`ruang`) REFERENCES `laboratory` (`id`),
  ADD CONSTRAINT `penjadwalan_ibfk_3` FOREIGN KEY (`idx`) REFERENCES `transaksi` (`id`);

--
-- Constraints for table `pesan`
--
ALTER TABLE `pesan`
  ADD CONSTRAINT `pesan_ibfk_1` FOREIGN KEY (`subject`) REFERENCES `laboratory` (`id`),
  ADD CONSTRAINT `pesan_ibfk_2` FOREIGN KEY (`user`) REFERENCES `mhs` (`id`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`peminjam`) REFERENCES `mhs` (`id`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`ruangan`) REFERENCES `laboratory` (`id`),
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`kode_dosen`) REFERENCES `dosen` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
