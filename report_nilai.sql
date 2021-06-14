-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 14, 2021 at 06:10 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `report_nilai`
--

-- --------------------------------------------------------

--
-- Table structure for table `mhs`
--

CREATE TABLE `mhs` (
  `nim` varchar(10) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mhs`
--

INSERT INTO `mhs` (`nim`, `nama`, `alamat`) VALUES
('123040060', 'Satria Ardi Perdana', 'Perum Taman Cinangka A 17'),
('123040061', 'Ridwan Sanjaya', 'Perumahan Taman Cinangka 2'),
('123040062', 'Heni Arini', 'Bogor Kemang Residence'),
('123040065', 'Annisa Wulandari', 'DKI Jakarta'),
('123040066', 'Rahmat Arman', 'Bogor, Jawa Barat'),
('1911500123', 'Budi', 'Jakarta'),
('1911500456', 'Luhur', 'Bandung'),
('1912500789', 'Sakti', 'Jogjakarta');

-- --------------------------------------------------------

--
-- Table structure for table `mtk`
--

CREATE TABLE `mtk` (
  `kdmtk` varchar(5) NOT NULL,
  `namamtk` varchar(20) NOT NULL,
  `sks` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mtk`
--

INSERT INTO `mtk` (`kdmtk`, `namamtk`, `sks`) VALUES
('CS006', 'Networking', 3),
('DB001', 'Database', 2),
('K001', 'Pemrograman Web', 4),
('K002', 'Microservice', 4),
('K004', 'NoSQL Database', 4),
('K005', 'Keamanan Informasi', 4),
('PG001', 'Web Programming', 3);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `nim` varchar(10) NOT NULL,
  `kdmtk` varchar(5) NOT NULL,
  `absen` int(3) NOT NULL,
  `tugas` int(3) NOT NULL,
  `uts` int(3) NOT NULL,
  `uas` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`nim`, `kdmtk`, `absen`, `tugas`, `uts`, `uas`) VALUES
('123040060', 'K001', 100, 90, 85, 100),
('123040060', 'K002', 100, 90, 90, 100),
('123040061', 'K001', 100, 66, 80, 75),
('123040061', 'K002', 100, 90, 90, 90),
('123040062', 'K001', 100, 90, 60, 100),
('123040066', 'K001', 100, 98, 88, 90);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mhs`
--
ALTER TABLE `mhs`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `mtk`
--
ALTER TABLE `mtk`
  ADD PRIMARY KEY (`kdmtk`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`nim`,`kdmtk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
