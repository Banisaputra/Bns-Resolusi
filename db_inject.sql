-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2022 at 11:37 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pkm`
--

-- --------------------------------------------------------

--
-- Table structure for table `akses_lab`
--

CREATE TABLE `akses_lab` (
  `id_akses` int(11) NOT NULL,
  `id_prodi` varchar(10) NOT NULL,
  `id_lab` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akses_lab`
--

INSERT INTO `akses_lab` (`id_akses`, `id_prodi`, `id_lab`) VALUES
(1, 'D600', 1),
(2, 'D600', 2),
(3, 'D600', 3),
(4, 'D100', 3);

-- --------------------------------------------------------

--
-- Table structure for table `lab`
--

CREATE TABLE `lab` (
  `id_lab` int(11) NOT NULL,
  `laboratorium` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lab`
--

INSERT INTO `lab` (`id_lab`, `laboratorium`) VALUES
(1, 'komputer'),
(2, 'ergonomi'),
(3, 'catia'),
(4, 'labmesin'),
(5, 'labelektro'),
(6, 'labsipil');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(3) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `level`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'teknisi'),
(4, 'superAdm');

-- --------------------------------------------------------

--
-- Table structure for table `mesin`
--

CREATE TABLE `mesin` (
  `id_mesin` varchar(10) NOT NULL,
  `nama_mesin` varchar(255) NOT NULL,
  `merk_mesin` varchar(20) NOT NULL,
  `kapasitas` varchar(10) NOT NULL,
  `id_prodi` varchar(10) NOT NULL,
  `id_lab` int(11) DEFAULT NULL,
  `tahun_pembuatan` int(4) NOT NULL,
  `periode_pakai` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mesin`
--

INSERT INTO `mesin` (`id_mesin`, `nama_mesin`, `merk_mesin`, `kapasitas`, `id_prodi`, `id_lab`, `tahun_pembuatan`, `periode_pakai`) VALUES
('MC001', 'Concrete Compression Machine Digital ', 'JNK-KAN', '13 Liter', 'D100', 4, 2017, 2017),
('MC002', 'Trainer Kit PLC', 'PLC Kit UMS', '13 Kg', 'D300', 5, 2016, 2018),
('MC003', 'Welding Machine', 'CT312 3 in 1 TIG MMA', '10,8 Kg', 'D200', 4, 2018, 2018),
('MC004', 'Theodolit', 'Topcon DT-205L (5 Se', '9.2 lbs (4', 'D100', 6, 2015, 2018),
('MC005', 'Digital Hydaulic Concrete Beam', 'CV. Teguh Primatama', '200 kg', 'D100', 6, 2019, 2021),
('MC006', '3D Printing', 'Anycubic', '8,3 Kg', 'D600', 1, 2020, 2022),
('MC007', 'BandSaw', 'OSCAR', '86 Kg', 'D400', 1, 2018, 2018),
('MC008', 'MitterSaw', 'Mollar MLR-MS 810', '7,5 Kg', 'D600', 1, 2017, 2018),
('MC009', 'Sepeda Statis', 'X2FIT Magnetic Bike ', '120 Kg', 'D600', 2, 2017, 2021),
('MC010', 'Kursi Antropometri', 'Solo Abadi', '120 Kg', 'D600', 2, 2021, 2021);

-- --------------------------------------------------------

--
-- Table structure for table `penggunaan`
--

CREATE TABLE `penggunaan` (
  `id` int(100) NOT NULL,
  `id_penggunaan` varchar(10) NOT NULL,
  `tgl_penggunaan` varchar(10) NOT NULL,
  `id_prodi` varchar(10) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `id_mesin` varchar(10) NOT NULL,
  `judul` varchar(20) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penggunaan`
--

INSERT INTO `penggunaan` (`id`, `id_penggunaan`, `tgl_penggunaan`, `id_prodi`, `id_user`, `id_mesin`, `judul`, `keterangan`) VALUES
(1, 'PU001', '2021-11-23', 'D200', 'US003', 'MC003', '1234', 'qwerty'),
(2, 'PU002', '2021-11-29', 'D100', 'US003', 'MC004', 'asdfg', '12345'),
(3, 'PU003', '2021-11-16', 'D100', 'US003', 'MC001', 'training', 'tahap 3'),
(4, 'PU004', '2021-11-22', 'D200', 'US003', 'MC003', 'aSSDGFHFDJG', 'saafhikJA'),
(5, 'PU005', '2021-11-19', 'D400', 'US003', 'MC003', 'training', 'tahap 3'),
(6, 'PU006', '2021-11-22', 'D100', 'US003', 'MC004', 'aSSDGFHFDJG', 'AsdDZXC'),
(7, 'PU007', '2021-11-28', 'D300', 'US003', 'MC005', 'aSSDGFHFDJG', 'coba aja'),
(8, 'PU008', '2021-11-30', 'D100', 'US003', 'MC005', 'lagiiyui', 'saafhikJA'),
(9, 'PU009', '2022-02-15', 'D200', 'US003', 'MC003', 'aSSDGFHFDJG', 'AsdDZXC'),
(10, 'PU010', '2022-02-18', 'D100', 'US003', 'MC001', 'kerja3', 'cfghjk'),
(11, 'PU011', '2022-02-20', 'D100', 'US003', 'MC004', 'aSSDGFHFDJG', 'coba aja'),
(12, 'PU012', '2022-02-23', 'D400', 'US003', 'MC004', 'training', 'tahap 3'),
(13, 'PU013', '2022-02-07', 'D400', 'US003', 'MC005', 'training', 'coba aja'),
(14, 'PU014', '2022-02-16', 'D100', 'US003', 'MC004', 'training', 'training oprasional'),
(15, 'PU015', '2022-02-14', 'D400', 'US003', 'MC005', 'kerja3', 'coba aja');

-- --------------------------------------------------------

--
-- Table structure for table `perawatan`
--

CREATE TABLE `perawatan` (
  `id_jadwal` varchar(10) NOT NULL,
  `tgl` varchar(10) NOT NULL,
  `id_prodi` varchar(10) NOT NULL,
  `id_mesin` varchar(10) NOT NULL,
  `id_teknisi` varchar(10) NOT NULL,
  `point_chek` varchar(30) NOT NULL,
  `tgl_jadwal` varchar(10) NOT NULL,
  `status` enum('Open','Closed','Waiting') NOT NULL DEFAULT 'Open'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perawatan`
--

INSERT INTO `perawatan` (`id_jadwal`, `tgl`, `id_prodi`, `id_mesin`, `id_teknisi`, `point_chek`, `tgl_jadwal`, `status`) VALUES
('SC001', '2017-12-13', 'D400', 'MC003', 'teknisi', 'Pengecekan Arus Listrik Kompon', '2017-12-13', 'Closed'),
('SC002', '2022-03-17', 'D500', 'MC008', '', 'Pembersihan Kotoran', '2022-03-17', 'Open'),
('SC003', '2022-03-18', 'D600', 'MC006', '', 'Pengecekan Arus Listrik Kompon', '2022-03-18', 'Open');

-- --------------------------------------------------------

--
-- Table structure for table `perbaikan`
--

CREATE TABLE `perbaikan` (
  `id_perbaikan` varchar(10) NOT NULL,
  `id_prodi` varchar(100) DEFAULT NULL,
  `tgl_buat` varchar(10) NOT NULL,
  `id_mesin` varchar(10) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `judul` varchar(30) NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  `id_teknisi1` varchar(10) NOT NULL,
  `status` enum('Open','Closed','Waiting') NOT NULL DEFAULT 'Open'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perbaikan`
--

INSERT INTO `perbaikan` (`id_perbaikan`, `id_prodi`, `tgl_buat`, `id_mesin`, `id_user`, `judul`, `keterangan`, `id_teknisi1`, `status`) VALUES
('TC001', 'D600', '2017-12-13', 'MC003', 'US001', 'Konsleting Arus Listrik', 'Keluar Asap dan bau gosong', 'teknisi', 'Closed'),
('TC002', 'D600', '2017-12-14', 'MC002', 'US001', 'Temperatur Over', 'Over heating pada Top Cover', 'US001', 'Closed'),
('TC003', 'D100', '2018-06-08', 'MC002', 'US001', 'Kabel Jumper Putus', '3 Buah', 'teknisi', 'Open'),
('TC004', 'D300', '2018-06-09', 'MC002', 'US001', 'Sensor Proximity Tidak Terdekt', '4 Buah', '', 'Open'),
('TC005', 'D600', '2018-06-08', 'MC002', 'US001', 'Arduino Rusak', 'Tidak Berjalan (1 Buah)', '', 'Open'),
('TC006', 'D400', '2018-06-08', 'MC002', 'US001', 'Mesin Mati', '-', '', 'Open'),
('TC007', 'D300', '2018-06-30', 'MC002', 'US001', 'Mesin Panas', '-', '', 'Open'),
('TC008', 'D100', '2018-07-07', 'MC004', 'US001', 'Keluar Oli', '-', '', 'Open'),
('TC009', 'D100', '2018-06-09', 'MC001', 'US001', '-', '-', '', 'Open'),
('TC010', 'D400', '2018-06-09', 'MC002', 'US001', '--', '-', '', 'Open'),
('TC011', 'D500', '2018-06-09', 'MC002', 'US001', '--', '--', '', 'Open'),
('TC012', 'D300', '2018-06-08', 'MC001', 'US001', 'Mesin Tidak dingin', '-', '', 'Open'),
('TC013', 'D500', '2018-09-03', 'MC002', 'US003', 'Tidak getar', '-', '', 'Open'),
('TC014', 'D400', '2021-11-24', 'MC002', 'US003', 'coba', 'coba aja', '', 'Open'),
('TC015', NULL, '2021-11-25', 'MC002', 'US003', 'lagi', 'lagi aja', '', 'Open'),
('TC019', NULL, '2021-11-02', 'MC003', 'US001', 'On weld listrik pd MCB PLN tri', 'Perbaikan berkala', '', 'Open'),
('TC020', 'D400', '2021-11-30', 'MC003', 'US001', 'Kabel ada yang terbuka', 'Membahayakan Bisa di tutup', '', 'Open'),
('TC021', 'D400', '2022-03-19', 'MC003', 'US003', 'aSSDGFHFDJG', 'AsdDZXC', '', 'Open');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` varchar(10) NOT NULL,
  `nama_prodi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `nama_prodi`) VALUES
('D100', 'Teknik Sipil'),
('D200', 'Teknik Mesin'),
('D300', 'Teknik Elektro'),
('D400', 'Arsitektur'),
('D500', 'Kimia'),
('D600', 'Teknik Industri');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(9) NOT NULL,
  `nama_user` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_prodi` varchar(10) NOT NULL,
  `level` enum('admin','user','teknisi','superAdm') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `password`, `id_prodi`, `level`) VALUES
('US001', 'Alfin Asfariza', 'alfin', 'D300', 'superAdm'),
('US002', 'Alvaro', 'alvaro', 'D600', 'teknisi'),
('US003', 'Rizal', 'rizal', 'D100', 'user'),
('US004', 'andre', 'andre', 'D200', 'teknisi'),
('US005', 'Agus', 'agus', 'D400', 'admin'),
('US006', 'putri', '1234', 'D500', 'user'),
('US007', 'anton', '1234', 'D500', 'admin'),
('US008', 'anita', '1234', 'D600', 'admin'),
('US009', 'jono', '1234', 'D200', 'admin'),
('US010', 'putra', '1234', 'D100', 'admin'),
('US011', 'anita2', '1234', 'D400', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akses_lab`
--
ALTER TABLE `akses_lab`
  ADD PRIMARY KEY (`id_akses`),
  ADD KEY `id_lab` (`id_lab`),
  ADD KEY `id_prodi` (`id_prodi`);

--
-- Indexes for table `lab`
--
ALTER TABLE `lab`
  ADD PRIMARY KEY (`id_lab`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `mesin`
--
ALTER TABLE `mesin`
  ADD PRIMARY KEY (`id_mesin`),
  ADD KEY `id_lab` (`id_lab`);

--
-- Indexes for table `penggunaan`
--
ALTER TABLE `penggunaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perawatan`
--
ALTER TABLE `perawatan`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `perbaikan`
--
ALTER TABLE `perbaikan`
  ADD PRIMARY KEY (`id_perbaikan`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_prodi` (`id_prodi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akses_lab`
--
ALTER TABLE `akses_lab`
  MODIFY `id_akses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lab`
--
ALTER TABLE `lab`
  MODIFY `id_lab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `penggunaan`
--
ALTER TABLE `penggunaan`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `akses_lab`
--
ALTER TABLE `akses_lab`
  ADD CONSTRAINT `akses_lab_ibfk_1` FOREIGN KEY (`id_lab`) REFERENCES `lab` (`id_lab`),
  ADD CONSTRAINT `akses_lab_ibfk_2` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`);

--
-- Constraints for table `mesin`
--
ALTER TABLE `mesin`
  ADD CONSTRAINT `mesin_ibfk_1` FOREIGN KEY (`id_lab`) REFERENCES `lab` (`id_lab`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
