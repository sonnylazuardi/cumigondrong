-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 23 Okt 2013 pada 11.06
-- Versi Server: 5.5.32
-- Versi PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `ruserba`
--
CREATE DATABASE IF NOT EXISTS `ruserba` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ruserba`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `provinsi` varchar(128) NOT NULL,
  `kota` varchar(128) NOT NULL,
  `kodepos` varchar(128) NOT NULL,
  `telepon` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `nama`, `email`, `alamat`, `provinsi`, `kota`, `kodepos`, `telepon`) VALUES
(2, 'sonny', 'sonny', 'sonny', 'sonnylazuardi@gmail.com', 'jl onta no 8', 'jawa barat', 'bandung', '90123', '08123123123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(128) DEFAULT NULL,
  `stok` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `id_kategori`, `nama`, `harga`, `gambar`, `stok`, `keterangan`) VALUES
(1, 1, 'Kulkas', 12000, 'kulkas.jpg', 5, 'kulkas dingin'),
(2, 1, 'Meja', 30000, 'meja.jpg', 3, 'meja kriya'),
(3, 1, 'Kursi', 4000, 'kursi.jpg', 2, 'kursi kayu'),
(4, 2, 'Setrika', 4000, 'setrika.jpg', 1, 'setrika listrik'),
(5, 0, 'Baju', 0, 'baju.jpg', 0, 'baju'),
(6, 0, 'Celana', 0, 'celana.jpg', 0, 'celana');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
