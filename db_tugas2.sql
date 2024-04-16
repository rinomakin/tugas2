-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2024 at 02:24 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tugas2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_dosen`
--

CREATE TABLE `tb_dosen` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_dosen`
--

INSERT INTO `tb_dosen` (`id`, `nama`, `nik`, `email`, `jenis_kelamin`, `tanggal_lahir`, `alamat`, `foto`) VALUES
(1, 'pak Risald', '2525162717117', 'risald@gmail.com', 'Laki-laki', '1999-04-21', 'kepang ekaak', 'png-transparent-logo-mother-child-care.png'),
(3, 'aguseco', '17272662166', 'aguseco@gmail.com', 'Laki-laki', '2200-02-21', 'kefa', '5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_matakuliah`
--

CREATE TABLE `tb_matakuliah` (
  `kode_mk` varchar(10) NOT NULL,
  `nama_mk` varchar(50) NOT NULL,
  `sks` int(11) NOT NULL,
  `semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_matakuliah`
--

INSERT INTO `tb_matakuliah` (`kode_mk`, `nama_mk`, `sks`, `semester`) VALUES
('112233444', 'website', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_mhs`
--

CREATE TABLE `tb_mhs` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_mhs`
--

INSERT INTO `tb_mhs` (`id`, `nama`, `nim`, `email`, `jenis_kelamin`, `tanggal_lahir`, `alamat`, `foto`) VALUES
(1, 'rinomakin', '2102030303', 'rinomakin@gmail.com', 'Laki-laki', '2222-02-21', 'kefamenanu', 'images.png'),
(5, 'rinomakin', '21022003', 'rinomudamakin@gmail.com', 'Laki-laki', '2003-02-21', 'flores timur', '2.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nik` (`nik`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tb_matakuliah`
--
ALTER TABLE `tb_matakuliah`
  ADD PRIMARY KEY (`kode_mk`);

--
-- Indexes for table `tb_mhs`
--
ALTER TABLE `tb_mhs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nim` (`nim`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_mhs`
--
ALTER TABLE `tb_mhs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
