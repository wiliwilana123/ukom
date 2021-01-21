-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2021 at 04:10 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covid`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(5) NOT NULL,
  `nama_dokter` varchar(500) NOT NULL,
  `umur_dokter` varchar(500) NOT NULL,
  `alamat_dokter` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama_dokter`, `umur_dokter`, `alamat_dokter`) VALUES
(1, 'Wili Wilana', '21', 'Jl. Sudirman'),
(2, 'Alfa Nugraha', '24', 'Jl. Soekarno');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(5) NOT NULL,
  `nama_pasien` varchar(500) NOT NULL,
  `umur_pasien` varchar(500) NOT NULL,
  `alamat_pasien` varchar(500) NOT NULL,
  `kota_pasien` varchar(500) NOT NULL,
  `desa_pasien` varchar(500) NOT NULL,
  `riwayat_pasien` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama_pasien`, `umur_pasien`, `alamat_pasien`, `kota_pasien`, `desa_pasien`, `riwayat_pasien`) VALUES
(1, 'Kamil', '21', 'Jl. Cidangiang', 'Bogor', 'Tegallega', 'Demam'),
(2, 'Azka', '24', 'Jl. Mawar', 'Bogor', 'Bantarjati', 'Tifus'),
(3, 'Daffa', '22', 'Jl. Anggrek', 'Bogor', 'Bondongan', 'Sakit Jantung'),
(4, 'Ikmal', '23', 'Jl. Anggun', 'Bogor', 'Batutulis', 'Sakit Paru-paru');

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaan`
--

CREATE TABLE `pemeriksaan` (
  `id_pemeriksaan` int(5) NOT NULL,
  `id_pasien` int(5) NOT NULL,
  `id_dokter` int(5) NOT NULL,
  `hasil_pemeriksaan` varchar(500) NOT NULL,
  `treatment` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemeriksaan`
--

INSERT INTO `pemeriksaan` (`id_pemeriksaan`, `id_pasien`, `id_dokter`, `hasil_pemeriksaan`, `treatment`) VALUES
(1, 0, 0, 'Bersin, Flu', 'Isolasi Mandiri'),
(2, 0, 0, 'Sakit Kepala, Sesak Nafas', 'Dirawat');

-- --------------------------------------------------------

--
-- Table structure for table `rumahsakit`
--

CREATE TABLE `rumahsakit` (
  `id_rs` int(5) NOT NULL,
  `nama_rs` varchar(500) NOT NULL,
  `alamat_rs` varchar(500) NOT NULL,
  `id_dokter` int(5) NOT NULL,
  `id_pasien` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rumahsakit`
--

INSERT INTO `rumahsakit` (`id_rs`, `nama_rs`, `alamat_rs`, `id_dokter`, `id_pasien`) VALUES
(1, 'RS PMI Bogor', 'Bogor', 0, 0),
(2, 'RS Azra Bogor', 'Bogor', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `pemeriksaan`
--
ALTER TABLE `pemeriksaan`
  ADD PRIMARY KEY (`id_pemeriksaan`);

--
-- Indexes for table `rumahsakit`
--
ALTER TABLE `rumahsakit`
  ADD PRIMARY KEY (`id_rs`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pemeriksaan`
--
ALTER TABLE `pemeriksaan`
  MODIFY `id_pemeriksaan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rumahsakit`
--
ALTER TABLE `rumahsakit`
  MODIFY `id_rs` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
