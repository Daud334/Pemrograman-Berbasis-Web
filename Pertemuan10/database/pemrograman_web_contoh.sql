-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 25, 2026 at 09:28 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pemrograman_web_contoh`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `ID` int NOT NULL,
  `Judul` varchar(255) DEFAULT NULL,
  `Penulis` varchar(255) DEFAULT NULL,
  `Tahun_Terbit` int DEFAULT NULL,
  `Harga` decimal(10,2) DEFAULT NULL,
  `Stok` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`ID`, `Judul`, `Penulis`, `Tahun_Terbit`, `Harga`, `Stok`) VALUES
(2, 'Bumi Manusia', 'Pramoedya Ananta Toer', 1980, '89000.00', 12),
(3, 'Sapiens: Riwayat Singkat Umat Manusia', 'Yuval Noah Harari', 2014, '120000.00', 8),
(4, 'Filosofi Teras', 'Henry Manampiring', 2018, '76000.00', 15),
(5, 'Laut Bercerita', 'Leila S. Chudori', 2017, '98000.00', 3),
(8, 'Atomic Habits', 'James Clear', 2018, '85000.00', 12);

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `Pesanan_ID` int NOT NULL,
  `Buku_ID` int NOT NULL,
  `Kuantitas` int DEFAULT NULL,
  `Harga_Per_Satuan` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `ID` int NOT NULL,
  `Nama` varchar(255) DEFAULT NULL,
  `Alamat` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Telepon` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `ID` int NOT NULL,
  `Tanggal_Pesanan` date DEFAULT NULL,
  `Pelanggan_ID` int DEFAULT NULL,
  `Total_Harga` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`Pesanan_ID`,`Buku_ID`),
  ADD KEY `Buku_ID` (`Buku_ID`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Pelanggan_ID` (`Pelanggan_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD CONSTRAINT `detail_pesanan_ibfk_1` FOREIGN KEY (`Pesanan_ID`) REFERENCES `pesanan` (`ID`),
  ADD CONSTRAINT `detail_pesanan_ibfk_2` FOREIGN KEY (`Buku_ID`) REFERENCES `buku` (`ID`);

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`Pelanggan_ID`) REFERENCES `pelanggan` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
