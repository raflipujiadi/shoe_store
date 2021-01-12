-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 12, 2021 at 03:30 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tk_sepatu`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

DROP TABLE IF EXISTS `tb_barang`;
CREATE TABLE IF NOT EXISTS `tb_barang` (
  `id_barang` int(11) DEFAULT NULL,
  `nama_barang` char(50) DEFAULT NULL,
  `jenis_barang` char(50) DEFAULT NULL,
  `img` char(50) DEFAULT NULL,
  `kode_spt` char(50) DEFAULT NULL,
  `quantity` int(5) NOT NULL,
  `price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `jenis_barang`, `img`, `kode_spt`, `quantity`, `price`) VALUES
(66, 'Converse', 'Sepatu', 'pexels-hoang-loc-2421374.jpg', '012', 5, 500000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_layanan`
--

DROP TABLE IF EXISTS `tb_layanan`;
CREATE TABLE IF NOT EXISTS `tb_layanan` (
  `nama_layanan` char(50) DEFAULT NULL,
  `img` char(50) DEFAULT NULL,
  `keterangan` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_penjualan`
--

DROP TABLE IF EXISTS `tb_penjualan`;
CREATE TABLE IF NOT EXISTS `tb_penjualan` (
  `tanggal` date DEFAULT NULL,
  `id_penjualan` int(11) DEFAULT NULL,
  `nama_barang` varchar(50) DEFAULT NULL,
  `harga_satuan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

DROP TABLE IF EXISTS `tb_transaksi`;
CREATE TABLE IF NOT EXISTS `tb_transaksi` (
  `id_transaksi` int(11) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `nama_konsumen` varchar(50) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga_satuan` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE IF NOT EXISTS `tb_user` (
  `id_user` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `level` char(50) DEFAULT NULL,
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `level`) VALUES
(3, 'admin', 'bac30f5ac887ccd5872f59e092ea2800', 'admin'),
(NULL, 'manager', '1d0258c2440a8d19e716292b231e3190', 'managers'),
(NULL, 'karyawan', '9e014682c94e0f2cc834bf7348bda428', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
