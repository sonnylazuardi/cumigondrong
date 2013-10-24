-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 24 Okt 2013 pada 11.56
-- Versi Server: 5.5.32
-- Versi PHP: 5.4.19

SET FOREIGN_KEY_CHECKS=0;
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

DROP TABLE IF EXISTS `account`;
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `nama`, `email`, `alamat`, `provinsi`, `kota`, `kodepos`, `telepon`) VALUES
(2, 'sonny', 'sonny', 'sonny', 'sonnylazuardi@gmail.com', 'jl onta no 8', 'jawa barat', 'bandung', '90123', '08123123123'),
(3, 'sonnylz', 'sonnylz123', 'sonny lazuardi', 'sonnylz@gmail.com', 'jalan onta no 8', 'jawa barat', 'bandung', '40123', '022933432');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

DROP TABLE IF EXISTS `barang`;
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

DROP TABLE IF EXISTS `kategori`;
CREATE TABLE IF NOT EXISTS `kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kredit`
--

DROP TABLE IF EXISTS `kredit`;
CREATE TABLE IF NOT EXISTS `kredit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_account` int(11) NOT NULL,
  `card_number` varchar(128) NOT NULL,
  `name_of_card` varchar(128) NOT NULL,
  `expired_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_account` int(11) NOT NULL,
  `id_kredit` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_item`
--

DROP TABLE IF EXISTS `order_item`;
CREATE TABLE IF NOT EXISTS `order_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_order` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tambahan` varchar(140) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
