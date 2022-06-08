-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 08, 2022 at 12:28 AM
-- Server version: 10.3.22-MariaDB-log
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ujian`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `terverifikasi` enum('Y','N') NOT NULL DEFAULT 'N',
  `password` varchar(50) NOT NULL,
  `peran` varchar(50) NOT NULL DEFAULT 'mahasiswa',
  `nim` varchar(10) DEFAULT NULL,
  `program_studi` varchar(45) DEFAULT NULL,
  `nama` varchar(45) NOT NULL,
  `tempat_lahir` varchar(45) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(2) NOT NULL,
  `agama` varchar(45) NOT NULL,
  `alamat` varchar(45) NOT NULL,
  `kota` varchar(45) NOT NULL,
  `provinsi` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `email`, `terverifikasi`, `password`, `peran`, `nim`, `program_studi`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `alamat`, `kota`, `provinsi`) VALUES
(28, 'muhammad.gafriel@gmail.com', 'Y', 'a3dcb4d229de6fde0db5686dee47145d', 'mahasiswa', '111', 'teknik informatika', 'muhammad gafriel alfarizhi', 'balikpapan', '2014-11-29', 'L', 'islam', 'asd', 'Balikpapan', 'kalimantan timur'),
(30, 'rickinjuah@gmail.com', 'Y', 'a3dcb4d229de6fde0db5686dee47145d', 'dosen', 'asd', 'teknik informatika', 'Ricki Njuah', 'samarinda', '2020-11-30', 'P', 'islam', 'sad', 'samarinda', 'kalimantan timur'),
(31, 'someone@gmail.com', 'N', 'a3dcb4d229de6fde0db5686dee47145d', 'mahasiswa', '123123123', 'Something', 'Some One', 'somewhere', '1997-08-13', 'L', 'islam', 'somewhere', 'somewhere', 'somewhere');

-- --------------------------------------------------------

--
-- Table structure for table `mengikuti`
--

CREATE TABLE `mengikuti` (
  `id` int(11) NOT NULL,
  `mahasiswa_id` int(11) NOT NULL,
  `ujian_id` int(11) NOT NULL,
  `hari_ujian` date DEFAULT NULL,
  `jam_ujian` time DEFAULT NULL,
  `kelas` varchar(45) DEFAULT NULL,
  `nilai_angka` int(11) DEFAULT NULL,
  `nilai_huruf` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mengikuti`
--

INSERT INTO `mengikuti` (`id`, `mahasiswa_id`, `ujian_id`, `hari_ujian`, `jam_ujian`, `kelas`, `nilai_angka`, `nilai_huruf`) VALUES
(7, 31, 8, '2021-12-23', '01:13:33', '5g', 100, 'A'),
(8, 28, 8, '2022-06-07', '01:47:12', '4A', 50, 'E');

-- --------------------------------------------------------

--
-- Table structure for table `ujian`
--

CREATE TABLE `ujian` (
  `id` int(11) NOT NULL,
  `mata_ujian` varchar(10) NOT NULL,
  `nama_ujian` varchar(45) NOT NULL,
  `program_studi` varchar(45) NOT NULL,
  `sks` varchar(45) NOT NULL,
  `biaya_ujian` int(11) NOT NULL,
  `dosen` varchar(255) NOT NULL,
  `kode_ujian` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ujian`
--

INSERT INTO `ujian` (`id`, `mata_ujian`, `nama_ujian`, `program_studi`, `sks`, `biaya_ujian`, `dosen`, `kode_ujian`) VALUES
(6, 'OS 2', 'Post-Test', 'teknik informatika', '2', 200000, 'Ricki Njuah', 'pbo-001'),
(8, 'PBO 1', 'Test', 'teknik informatika', '4', 1, 'Ricki Njuah', 'f6d-947');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `nim` (`nim`);

--
-- Indexes for table `mengikuti`
--
ALTER TABLE `mengikuti`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mahasiswa_id` (`mahasiswa_id`),
  ADD KEY `ujian_id` (`ujian_id`);

--
-- Indexes for table `ujian`
--
ALTER TABLE `ujian`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_ujian` (`kode_ujian`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `mengikuti`
--
ALTER TABLE `mengikuti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ujian`
--
ALTER TABLE `ujian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
