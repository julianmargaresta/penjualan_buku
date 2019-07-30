-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2018 at 12:59 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(100) DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `jabatan`, `username`, `password`) VALUES
(1, 'bidin', 'Admin', 'bidin', 'bidin');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `judul_buku` varchar(50) DEFAULT NULL,
  `harga` varchar(50) DEFAULT NULL,
  `deskripsi` text,
  `id_kategori` varchar(10) DEFAULT NULL,
  `gambar_buku` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul_buku`, `harga`, `deskripsi`, `id_kategori`, `gambar_buku`) VALUES
(1, 'trik jitu menghitung cepat dalam 1 detik joss', '3000', 'trik luar biasa jos', NULL, '1.jpg'),
(2, 'cara mudah membuat komputer sebiji kacang', '5000', 'komputer canggih', 'K', '2.jpg'),
(3, 'mencari teman dengan mudah', '2500', 'trik mencari teman', 'IPS', '4.jpg'),
(4, 'gudang baru joss', '300000', 'ini gudang baru jos', 'K', 'pin_gpio_microcontroller.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(10) NOT NULL,
  `nama_kategori` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
('IPA', 'Ilmu Pengetahuan Alam'),
('IPS', 'Ilmu Pengetahuan Sosial'),
('K', 'Komputer'),
('Mat', 'Matematika Jitu');

-- --------------------------------------------------------

--
-- Table structure for table `nota`
--

CREATE TABLE `nota` (
  `id_nota` int(11) NOT NULL,
  `id_peminjam` int(11) DEFAULT NULL,
  `tgl_deadline` date DEFAULT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `denda` int(11) DEFAULT NULL,
  `grandtotal` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `bukti` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nota`
--

INSERT INTO `nota` (`id_nota`, `id_peminjam`, `tgl_deadline`, `tgl_pinjam`, `tgl_kembali`, `denda`, `grandtotal`, `status`, `bukti`) VALUES
(9, 13, '2018-03-25', '2018-03-18', '0000-00-00', 0, 31500, 'Dikirim', ''),
(10, 13, '2018-03-25', '2018-03-18', '0000-00-00', 0, 26500, 'Confirmed', 'Koala9.jpg'),
(11, 13, '2018-03-26', '2018-03-19', '0000-00-00', 0, 50000, '', 'Lighthouse8.jpg'),
(12, 13, '2018-03-26', '2018-03-19', '0000-00-00', 0, 25500, 'Confirmed', 'Penguins1.jpg'),
(13, 13, '2018-03-27', '2018-03-20', '0000-00-00', 0, 15000, '', 'Desert12.jpg'),
(15, 13, '2018-03-28', '2018-03-21', '0000-00-00', 0, 5000, '', ''),
(16, 13, '2018-04-08', '2018-04-01', '0000-00-00', 0, 20000, '', 'alur_mvc.png'),
(17, 13, '2018-04-09', '2018-04-02', '0000-00-00', 0, 17500, '', 'erd.png'),
(18, 13, '2018-04-10', '2018-04-03', '0000-00-00', 0, 5000, '', 'alur_mvc1.png'),
(19, 13, '2018-04-13', '2018-04-06', '0000-00-00', 0, 21000, '', ''),
(20, 13, '2018-04-18', '2018-04-11', '0000-00-00', 0, 8000, '', 'pin_gpio_microcontroller.jpg'),
(21, 2, '2018-04-25', '2018-04-18', NULL, NULL, 1545000, 'Confirmed', '-'),
(22, 6, '2018-04-25', '2018-04-18', NULL, NULL, 1510000, 'Confirmed', '-'),
(23, 11, '2018-04-25', '2018-04-18', NULL, NULL, 1510000, 'Confirmed', '-'),
(24, 4, '2018-04-25', '2018-04-18', NULL, NULL, 1510000, 'Confirmed', '-'),
(25, 5, '2018-04-25', '2018-04-18', NULL, NULL, 1527500, 'Confirmed', '-'),
(26, 3, '2018-04-25', '2018-04-18', NULL, NULL, 35000, 'Confirmed', '-'),
(27, 13, '2018-04-25', '2018-04-18', NULL, NULL, 620000, 'Confirmed', '-'),
(28, 10, '2018-04-25', '2018-04-18', NULL, NULL, 1820000, 'Confirmed', '-'),
(29, 4, '2018-04-25', '2018-04-18', NULL, NULL, 1820000, 'Confirmed', '-'),
(30, 6, '2018-04-25', '2018-04-18', NULL, NULL, 1820000, 'Confirmed', '-'),
(31, 7, '2018-04-25', '2018-04-18', NULL, NULL, 1820000, 'Confirmed', '-'),
(32, 10, '2018-04-25', '2018-04-18', NULL, NULL, 1820000, 'Confirmed', '-'),
(33, 3, '2018-04-25', '2018-04-18', NULL, NULL, 2130000, 'Confirmed', '-');

-- --------------------------------------------------------

--
-- Table structure for table `peminjam`
--

CREATE TABLE `peminjam` (
  `id_peminjam` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` text,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjam`
--

INSERT INTO `peminjam` (`id_peminjam`, `nama`, `alamat`, `username`, `password`, `foto`) VALUES
(1, 'saipul', 'malang', '', '', NULL),
(2, 'lasmini', 'sby', '', '', NULL),
(3, 'windi', 'Malang', '', '', NULL),
(4, 'revansa', 'Lumajang', '', '', NULL),
(5, 'budi', 'surabaya', 'budi', '123', NULL),
(6, 'sugeng', 'malang', 'sugeng', '123', NULL),
(7, 'sugeng', 'malang', 'sugeng', '123', NULL),
(8, 'lasmna', 'jember', 'las', '123', NULL),
(9, 'lasmna', 'jember', 'las', 'ssss', NULL),
(10, 'Yoga', 'Kediri', 'yogacahya', '123', NULL),
(11, 'Yoga', 'ndi ae', 'aranggi', '123456', NULL),
(12, 'ok', 'ok', 'ok', 'ok', NULL),
(13, 'zainul Abidin', 'malang', 'coba', 'coba', 'Koala.jpg'),
(14, 'coba', 'coba', 'coba', 'coba', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_pinjam` int(11) NOT NULL,
  `id_nota` int(11) DEFAULT NULL,
  `id_buku` int(11) DEFAULT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_pinjam`, `id_nota`, `id_buku`, `jumlah`) VALUES
(13, 9, 3, 3),
(14, 9, 1, 2),
(15, 9, 2, 4),
(16, 10, 3, 9),
(17, 10, 1, 2),
(18, 11, 2, 6),
(19, 11, 3, 8),
(20, 12, 1, 9),
(21, 12, 3, 3),
(22, 13, 3, 2),
(23, 13, 1, 5),
(26, 15, 2, 1),
(27, 16, 2, 4),
(28, 17, 3, 7),
(29, 18, 2, 1),
(30, 19, 1, 3),
(31, 19, 3, 6),
(32, 20, 1, 4),
(33, 21, 2, 9),
(34, 21, 4, 5),
(35, 22, 2, 2),
(36, 22, 4, 5),
(37, 23, 2, 2),
(38, 23, 4, 5),
(39, 24, 2, 2),
(40, 24, 4, 5),
(41, 25, 4, 5),
(42, 25, 3, 7),
(43, 25, 2, 2),
(44, 26, 2, 4),
(45, 26, 3, 6),
(46, 27, 4, 2),
(47, 27, 2, 4),
(48, 28, 2, 4),
(49, 28, 4, 6),
(50, 29, 2, 4),
(51, 29, 4, 6),
(52, 30, 2, 4),
(53, 30, 4, 6),
(54, 31, 2, 4),
(55, 31, 4, 6),
(56, 32, 2, 4),
(57, 32, 4, 6),
(58, 33, 2, 5),
(59, 33, 4, 7),
(60, 33, 3, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id_nota`),
  ADD KEY `fk_peminjam` (`id_peminjam`);

--
-- Indexes for table `peminjam`
--
ALTER TABLE `peminjam`
  ADD PRIMARY KEY (`id_peminjam`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD KEY `fk_nota` (`id_nota`),
  ADD KEY `fk_buku` (`id_buku`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `nota`
--
ALTER TABLE `nota`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `peminjam`
--
ALTER TABLE `peminjam`
  MODIFY `id_peminjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Constraints for table `nota`
--
ALTER TABLE `nota`
  ADD CONSTRAINT `nota_ibfk_1` FOREIGN KEY (`id_peminjam`) REFERENCES `peminjam` (`id_peminjam`);

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_nota`) REFERENCES `nota` (`id_nota`),
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
