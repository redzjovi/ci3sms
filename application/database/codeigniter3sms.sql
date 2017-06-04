-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2017 at 08:06 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codeigniter3sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

DROP TABLE IF EXISTS `pelanggan`;
CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nomor_telepon` varchar(20) NOT NULL,
  `nomor_handphone` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `nomor_telepon`, `nomor_handphone`, `alamat`, `email`) VALUES
(1, 'Nama 1', '123', '1234', 'Alamat 1', 'email1@email.com'),
(2, 'Nama 2', '123', '1234', 'Alamat 2', 'email2@email.com'),
(3, 'Nama 3', '123', '1234', 'Alamat 3', 'email3@email.com'),
(4, 'Nama 4', '123', '1234', 'Alamat 4', 'email4@email.com'),
(5, 'Nama 5', '123', '1234', 'Alamat 5', 'email5@email.com'),
(6, 'Nama 6', '123', '1234', 'Alamat 6', 'email6@email.com'),
(7, 'Nama 7', '123', '1234', 'Alamat 7', 'email7@email.com'),
(8, 'Nama 8', '123', '1234', 'Alamat 8', 'email8@email.com'),
(9, 'Nama 9', '123', '1234', 'Alamat 9', 'email9@email.com'),
(10, 'Nama 10', '123', '1234', 'Alamat 10', 'email10@email.com'),
(11, 'Nama 11', '123', '1234', 'Alamat 11', 'email11@email.com'),
(12, 'Nama 12', '123', '1234', 'Alamat 12', 'email12@email.com'),
(13, 'Nama 13', '123', '1234', 'Alamat 13', 'email13@email.com'),
(14, 'Nama 14', '123', '1234', 'Alamat 14', 'email14@email.com'),
(15, 'Nama 15', '123', '1234', 'Alamat 15', 'email15@email.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
