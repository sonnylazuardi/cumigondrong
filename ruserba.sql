-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 27 Okt 2013 pada 19.02
-- Versi Server: 5.5.27
-- Versi PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

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
  `auth_key` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `nama`, `email`, `alamat`, `provinsi`, `kota`, `kodepos`, `telepon`, `auth_key`) VALUES
(2, 'sonny', 'sonny', 'sonny lazuardi hermawan', 'sonnylazuardi@gmail.com', 'jl onta no 8 antapani', 'jawa barat', 'bandung', '90123', '08123123123', 'af7b49edd270ef450221d7fe19b1b890');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `id_kategori`, `nama`, `harga`, `gambar`, `stok`, `keterangan`) VALUES
(1, 1, 'Valentine Red Dress', 530000, '1.jpg', 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent elit lorem, scelerisque sed sapien non, vestibulum venenatis nisi. Nullam in arcu eleifend nunc volutpat venenatis a sed massa. Nullam eget congue eros. Donec tincidunt dui arcu. Aliquam erat volutpat.<br/>Vivamus ullamcorper massa facilisis orci sodales imperdiet. Suspendisse aliquet sodales eros, sit amet tincidunt eros pulvinar et. Etiam id nibh enim. Nullam turpis enim, lacinia a dictum vitae, posuere non risus. Maecenas interdum augue eget nisl consectetur, in rhoncus ligula eleifend.<br/>Nullam non ligula consequat, consequat dolor et, vulputate nisl. Nunc varius mollis enim, euismod posuere quam malesuada at. '),
(2, 1, 'Black Lace Cocktail Dress', 550000, '2.jpg', 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent elit lorem, scelerisque sed sapien non, vestibulum venenatis nisi. Nullam in arcu eleifend nunc volutpat venenatis a sed massa. Nullam eget congue eros. Donec tincidunt dui arcu. Aliquam erat volutpat.<br/>Vivamus ullamcorper massa facilisis orci sodales imperdiet. Suspendisse aliquet sodales eros, sit amet tincidunt eros pulvinar et. Etiam id nibh enim. Nullam turpis enim, lacinia a dictum vitae, posuere non risus. Maecenas interdum augue eget nisl consectetur, in rhoncus ligula eleifend.<br/>Nullam non ligula consequat, consequat dolor et, vulputate nisl. Nunc varius mollis enim, euismod posuere quam malesuada at. '),
(3, 1, 'Black Strapless Dress ', 420000, '3.jpg', 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent elit lorem, scelerisque sed sapien non, vestibulum venenatis nisi. Nullam in arcu eleifend nunc volutpat venenatis a sed massa. Nullam eget congue eros. Donec tincidunt dui arcu. Aliquam erat volutpat.<br/>Vivamus ullamcorper massa facilisis orci sodales imperdiet. Suspendisse aliquet sodales eros, sit amet tincidunt eros pulvinar et. Etiam id nibh enim. Nullam turpis enim, lacinia a dictum vitae, posuere non risus. Maecenas interdum augue eget nisl consectetur, in rhoncus ligula eleifend.<br/>Nullam non ligula consequat, consequat dolor et, vulputate nisl. Nunc varius mollis enim, euismod posuere quam malesuada at. '),
(4, 1, 'Red Velvet Mini Dress', 600000, '4.jpg', 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent elit lorem, scelerisque sed sapien non, vestibulum venenatis nisi. Nullam in arcu eleifend nunc volutpat venenatis a sed massa. Nullam eget congue eros. Donec tincidunt dui arcu. Aliquam erat volutpat.<br/>Vivamus ullamcorper massa facilisis orci sodales imperdiet. Suspendisse aliquet sodales eros, sit amet tincidunt eros pulvinar et. Etiam id nibh enim. Nullam turpis enim, lacinia a dictum vitae, posuere non risus. Maecenas interdum augue eget nisl consectetur, in rhoncus ligula eleifend.<br/>Nullam non ligula consequat, consequat dolor et, vulputate nisl. Nunc varius mollis enim, euismod posuere quam malesuada at. '),
(5, 1, 'Black Dotted Dress', 380000, '5.jpg', 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent elit lorem, scelerisque sed sapien non, vestibulum venenatis nisi. Nullam in arcu eleifend nunc volutpat venenatis a sed massa. Nullam eget congue eros. Donec tincidunt dui arcu. Aliquam erat volutpat.<br/>Vivamus ullamcorper massa facilisis orci sodales imperdiet. Suspendisse aliquet sodales eros, sit amet tincidunt eros pulvinar et. Etiam id nibh enim. Nullam turpis enim, lacinia a dictum vitae, posuere non risus. Maecenas interdum augue eget nisl consectetur, in rhoncus ligula eleifend.<br/>Nullam non ligula consequat, consequat dolor et, vulputate nisl. Nunc varius mollis enim, euismod posuere quam malesuada at. '),
(6, 1, 'Slim Suit Dress', 350000, '6.jpg', 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent elit lorem, scelerisque sed sapien non, vestibulum venenatis nisi. Nullam in arcu eleifend nunc volutpat venenatis a sed massa. Nullam eget congue eros. Donec tincidunt dui arcu. Aliquam erat volutpat.<br/>Vivamus ullamcorper massa facilisis orci sodales imperdiet. Suspendisse aliquet sodales eros, sit amet tincidunt eros pulvinar et. Etiam id nibh enim. Nullam turpis enim, lacinia a dictum vitae, posuere non risus. Maecenas interdum augue eget nisl consectetur, in rhoncus ligula eleifend.<br/>Nullam non ligula consequat, consequat dolor et, vulputate nisl. Nunc varius mollis enim, euismod posuere quam malesuada at. '),
(7, 1, 'Valentino Grey Dress', 420000, '7.jpg', 12, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent elit lorem, scelerisque sed sapien non, vestibulum venenatis nisi. Nullam in arcu eleifend nunc volutpat venenatis a sed massa. Nullam eget congue eros. Donec tincidunt dui arcu. Aliquam erat volutpat.<br/>Vivamus ullamcorper massa facilisis orci sodales imperdiet. Suspendisse aliquet sodales eros, sit amet tincidunt eros pulvinar et. Etiam id nibh enim. Nullam turpis enim, lacinia a dictum vitae, posuere non risus. Maecenas interdum augue eget nisl consectetur, in rhoncus ligula eleifend.<br/>Nullam non ligula consequat, consequat dolor et, vulputate nisl. Nunc varius mollis enim, euismod posuere quam malesuada at. '),
(8, 1, 'St. Gabrielle Red Party Dress', 890000, '8.jpg', 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent elit lorem, scelerisque sed sapien non, vestibulum venenatis nisi. Nullam in arcu eleifend nunc volutpat venenatis a sed massa. Nullam eget congue eros. Donec tincidunt dui arcu. Aliquam erat volutpat.<br/>Vivamus ullamcorper massa facilisis orci sodales imperdiet. Suspendisse aliquet sodales eros, sit amet tincidunt eros pulvinar et. Etiam id nibh enim. Nullam turpis enim, lacinia a dictum vitae, posuere non risus. Maecenas interdum augue eget nisl consectetur, in rhoncus ligula eleifend.<br/>Nullam non ligula consequat, consequat dolor et, vulputate nisl. Nunc varius mollis enim, euismod posuere quam malesuada at. '),
(9, 1, 'Fringe Black Mini Dress', 560000, '9.jpg', 11, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent elit lorem, scelerisque sed sapien non, vestibulum venenatis nisi. Nullam in arcu eleifend nunc volutpat venenatis a sed massa. Nullam eget congue eros. Donec tincidunt dui arcu. Aliquam erat volutpat.<br/>Vivamus ullamcorper massa facilisis orci sodales imperdiet. Suspendisse aliquet sodales eros, sit amet tincidunt eros pulvinar et. Etiam id nibh enim. Nullam turpis enim, lacinia a dictum vitae, posuere non risus. Maecenas interdum augue eget nisl consectetur, in rhoncus ligula eleifend.<br/>Nullam non ligula consequat, consequat dolor et, vulputate nisl. Nunc varius mollis enim, euismod posuere quam malesuada at. '),
(10, 1, 'Gold Shiny Sequined Dress', 480000, '10.gif', 12, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent elit lorem, scelerisque sed sapien non, vestibulum venenatis nisi. Nullam in arcu eleifend nunc volutpat venenatis a sed massa. Nullam eget congue eros. Donec tincidunt dui arcu. Aliquam erat volutpat.<br/>Vivamus ullamcorper massa facilisis orci sodales imperdiet. Suspendisse aliquet sodales eros, sit amet tincidunt eros pulvinar et. Etiam id nibh enim. Nullam turpis enim, lacinia a dictum vitae, posuere non risus. Maecenas interdum augue eget nisl consectetur, in rhoncus ligula eleifend.<br/>Nullam non ligula consequat, consequat dolor et, vulputate nisl. Nunc varius mollis enim, euismod posuere quam malesuada at. '),
(11, 1, 'Silver Shiny Sequined Dress', 480000, '11.jpg', 13, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent elit lorem, scelerisque sed sapien non, vestibulum venenatis nisi. Nullam in arcu eleifend nunc volutpat venenatis a sed massa. Nullam eget congue eros. Donec tincidunt dui arcu. Aliquam erat volutpat.<br/>Vivamus ullamcorper massa facilisis orci sodales imperdiet. Suspendisse aliquet sodales eros, sit amet tincidunt eros pulvinar et. Etiam id nibh enim. Nullam turpis enim, lacinia a dictum vitae, posuere non risus. Maecenas interdum augue eget nisl consectetur, in rhoncus ligula eleifend.<br/>Nullam non ligula consequat, consequat dolor et, vulputate nisl. Nunc varius mollis enim, euismod posuere quam malesuada at. '),
(12, 1, 'Short V-Neck Black Dress ', 520000, '12.jpg', 14, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent elit lorem, scelerisque sed sapien non, vestibulum venenatis nisi. Nullam in arcu eleifend nunc volutpat venenatis a sed massa. Nullam eget congue eros. Donec tincidunt dui arcu. Aliquam erat volutpat.<br/>Vivamus ullamcorper massa facilisis orci sodales imperdiet. Suspendisse aliquet sodales eros, sit amet tincidunt eros pulvinar et. Etiam id nibh enim. Nullam turpis enim, lacinia a dictum vitae, posuere non risus. Maecenas interdum augue eget nisl consectetur, in rhoncus ligula eleifend.<br/>Nullam non ligula consequat, consequat dolor et, vulputate nisl. Nunc varius mollis enim, euismod posuere quam malesuada at. '),
(13, 1, 'Fitted Short Sleeveless Dress', 430000, '13.jpg', 12, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent elit lorem, scelerisque sed sapien non, vestibulum venenatis nisi. Nullam in arcu eleifend nunc volutpat venenatis a sed massa. Nullam eget congue eros. Donec tincidunt dui arcu. Aliquam erat volutpat.<br/>Vivamus ullamcorper massa facilisis orci sodales imperdiet. Suspendisse aliquet sodales eros, sit amet tincidunt eros pulvinar et. Etiam id nibh enim. Nullam turpis enim, lacinia a dictum vitae, posuere non risus. Maecenas interdum augue eget nisl consectetur, in rhoncus ligula eleifend.<br/>Nullam non ligula consequat, consequat dolor et, vulputate nisl. Nunc varius mollis enim, euismod posuere quam malesuada at. '),
(14, 1, 'Short V-Neck Black Dress ', 350000, '14.jpg', 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent elit lorem, scelerisque sed sapien non, vestibulum venenatis nisi. Nullam in arcu eleifend nunc volutpat venenatis a sed massa. Nullam eget congue eros. Donec tincidunt dui arcu. Aliquam erat volutpat.<br/>Vivamus ullamcorper massa facilisis orci sodales imperdiet. Suspendisse aliquet sodales eros, sit amet tincidunt eros pulvinar et. Etiam id nibh enim. Nullam turpis enim, lacinia a dictum vitae, posuere non risus. Maecenas interdum augue eget nisl consectetur, in rhoncus ligula eleifend.<br/>Nullam non ligula consequat, consequat dolor et, vulputate nisl. Nunc varius mollis enim, euismod posuere quam malesuada at. '),
(15, 1, 'Jump One Blue Dress', 380000, '15.jpg', 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent elit lorem, scelerisque sed sapien non, vestibulum venenatis nisi. Nullam in arcu eleifend nunc volutpat venenatis a sed massa. Nullam eget congue eros. Donec tincidunt dui arcu. Aliquam erat volutpat.<br/>Vivamus ullamcorper massa facilisis orci sodales imperdiet. Suspendisse aliquet sodales eros, sit amet tincidunt eros pulvinar et. Etiam id nibh enim. Nullam turpis enim, lacinia a dictum vitae, posuere non risus. Maecenas interdum augue eget nisl consectetur, in rhoncus ligula eleifend.<br/>Nullam non ligula consequat, consequat dolor et, vulputate nisl. Nunc varius mollis enim, euismod posuere quam malesuada at. '),
(16, 2, 'Stefania Red Heels', 500000, '16.jpg', 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent elit lorem, scelerisque sed sapien non, vestibulum venenatis nisi. Nullam in arcu eleifend nunc volutpat venenatis a sed massa. Nullam eget congue eros. Donec tincidunt dui arcu. Aliquam erat volutpat.<br/>Vivamus ullamcorper massa facilisis orci sodales imperdiet. Suspendisse aliquet sodales eros, sit amet tincidunt eros pulvinar et. Etiam id nibh enim. Nullam turpis enim, lacinia a dictum vitae, posuere non risus. Maecenas interdum augue eget nisl consectetur, in rhoncus ligula eleifend.<br/>Nullam non ligula consequat, consequat dolor et, vulputate nisl. Nunc varius mollis enim, euismod posuere quam malesuada at. '),
(17, 2, 'Valentia Black Heels', 470000, '17.jpg', 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent elit lorem, scelerisque sed sapien non, vestibulum venenatis nisi. Nullam in arcu eleifend nunc volutpat venenatis a sed massa. Nullam eget congue eros. Donec tincidunt dui arcu. Aliquam erat volutpat.<br/>Vivamus ullamcorper massa facilisis orci sodales imperdiet. Suspendisse aliquet sodales eros, sit amet tincidunt eros pulvinar et. Etiam id nibh enim. Nullam turpis enim, lacinia a dictum vitae, posuere non risus. Maecenas interdum augue eget nisl consectetur, in rhoncus ligula eleifend.<br/>Nullam non ligula consequat, consequat dolor et, vulputate nisl. Nunc varius mollis enim, euismod posuere quam malesuada at. '),
(18, 2, 'Chaterine Purple Wedges', 650000, '18.jpg', 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent elit lorem, scelerisque sed sapien non, vestibulum venenatis nisi. Nullam in arcu eleifend nunc volutpat venenatis a sed massa. Nullam eget congue eros. Donec tincidunt dui arcu. Aliquam erat volutpat.<br/>Vivamus ullamcorper massa facilisis orci sodales imperdiet. Suspendisse aliquet sodales eros, sit amet tincidunt eros pulvinar et. Etiam id nibh enim. Nullam turpis enim, lacinia a dictum vitae, posuere non risus. Maecenas interdum augue eget nisl consectetur, in rhoncus ligula eleifend.<br/>Nullam non ligula consequat, consequat dolor et, vulputate nisl. Nunc varius mollis enim, euismod posuere quam malesuada at. '),
(19, 2, 'Monica Purple Heels', 550000, '19.jpg', 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent elit lorem, scelerisque sed sapien non, vestibulum venenatis nisi. Nullam in arcu eleifend nunc volutpat venenatis a sed massa. Nullam eget congue eros. Donec tincidunt dui arcu. Aliquam erat volutpat.<br/>Vivamus ullamcorper massa facilisis orci sodales imperdiet. Suspendisse aliquet sodales eros, sit amet tincidunt eros pulvinar et. Etiam id nibh enim. Nullam turpis enim, lacinia a dictum vitae, posuere non risus. Maecenas interdum augue eget nisl consectetur, in rhoncus ligula eleifend.<br/>Nullam non ligula consequat, consequat dolor et, vulputate nisl. Nunc varius mollis enim, euismod posuere quam malesuada at. '),
(20, 2, 'White Cristal Heels', 700000, '20.jpg', 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent elit lorem, scelerisque sed sapien non, vestibulum venenatis nisi. Nullam in arcu eleifend nunc volutpat venenatis a sed massa. Nullam eget congue eros. Donec tincidunt dui arcu. Aliquam erat volutpat.<br/>Vivamus ullamcorper massa facilisis orci sodales imperdiet. Suspendisse aliquet sodales eros, sit amet tincidunt eros pulvinar et. Etiam id nibh enim. Nullam turpis enim, lacinia a dictum vitae, posuere non risus. Maecenas interdum augue eget nisl consectetur, in rhoncus ligula eleifend.<br/>Nullam non ligula consequat, consequat dolor et, vulputate nisl. Nunc varius mollis enim, euismod posuere quam malesuada at. '),
(21, 2, 'White Vine Heels', 500000, '21.jpg', 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent elit lorem, scelerisque sed sapien non, vestibulum venenatis nisi. Nullam in arcu eleifend nunc volutpat venenatis a sed massa. Nullam eget congue eros. Donec tincidunt dui arcu. Aliquam erat volutpat.<br/>Vivamus ullamcorper massa facilisis orci sodales imperdiet. Suspendisse aliquet sodales eros, sit amet tincidunt eros pulvinar et. Etiam id nibh enim. Nullam turpis enim, lacinia a dictum vitae, posuere non risus. Maecenas interdum augue eget nisl consectetur, in rhoncus ligula eleifend.<br/>Nullam non ligula consequat, consequat dolor et, vulputate nisl. Nunc varius mollis enim, euismod posuere quam malesuada at. '),
(22, 2, 'Olivia Heels', 480000, '22.jpg', 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent elit lorem, scelerisque sed sapien non, vestibulum venenatis nisi. Nullam in arcu eleifend nunc volutpat venenatis a sed massa. Nullam eget congue eros. Donec tincidunt dui arcu. Aliquam erat volutpat.<br/>Vivamus ullamcorper massa facilisis orci sodales imperdiet. Suspendisse aliquet sodales eros, sit amet tincidunt eros pulvinar et. Etiam id nibh enim. Nullam turpis enim, lacinia a dictum vitae, posuere non risus. Maecenas interdum augue eget nisl consectetur, in rhoncus ligula eleifend.<br/>Nullam non ligula consequat, consequat dolor et, vulputate nisl. Nunc varius mollis enim, euismod posuere quam malesuada at. '),
(23, 2, 'Amelia Heels', 420000, '23.jpg', 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent elit lorem, scelerisque sed sapien non, vestibulum venenatis nisi. Nullam in arcu eleifend nunc volutpat venenatis a sed massa. Nullam eget congue eros. Donec tincidunt dui arcu. Aliquam erat volutpat.<br/>Vivamus ullamcorper massa facilisis orci sodales imperdiet. Suspendisse aliquet sodales eros, sit amet tincidunt eros pulvinar et. Etiam id nibh enim. Nullam turpis enim, lacinia a dictum vitae, posuere non risus. Maecenas interdum augue eget nisl consectetur, in rhoncus ligula eleifend.<br/>Nullam non ligula consequat, consequat dolor et, vulputate nisl. Nunc varius mollis enim, euismod posuere quam malesuada at. '),
(24, 2, 'Elvin Dark Heels', 380000, '24.jpg', 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent elit lorem, scelerisque sed sapien non, vestibulum venenatis nisi. Nullam in arcu eleifend nunc volutpat venenatis a sed massa. Nullam eget congue eros. Donec tincidunt dui arcu. Aliquam erat volutpat.<br/>Vivamus ullamcorper massa facilisis orci sodales imperdiet. Suspendisse aliquet sodales eros, sit amet tincidunt eros pulvinar et. Etiam id nibh enim. Nullam turpis enim, lacinia a dictum vitae, posuere non risus. Maecenas interdum augue eget nisl consectetur, in rhoncus ligula eleifend.<br/>Nullam non ligula consequat, consequat dolor et, vulputate nisl. Nunc varius mollis enim, euismod posuere quam malesuada at. '),
(25, 2, 'Nicole Kidman Heels', 430000, '25.jpg', 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent elit lorem, scelerisque sed sapien non, vestibulum venenatis nisi. Nullam in arcu eleifend nunc volutpat venenatis a sed massa. Nullam eget congue eros. Donec tincidunt dui arcu. Aliquam erat volutpat.<br/>Vivamus ullamcorper massa facilisis orci sodales imperdiet. Suspendisse aliquet sodales eros, sit amet tincidunt eros pulvinar et. Etiam id nibh enim. Nullam turpis enim, lacinia a dictum vitae, posuere non risus. Maecenas interdum augue eget nisl consectetur, in rhoncus ligula eleifend.<br/>Nullam non ligula consequat, consequat dolor et, vulputate nisl. Nunc varius mollis enim, euismod posuere quam malesuada at. '),
(26, 2, 'Sara Jay Heels', 360000, '26.jpg', 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent elit lorem, scelerisque sed sapien non, vestibulum venenatis nisi. Nullam in arcu eleifend nunc volutpat venenatis a sed massa. Nullam eget congue eros. Donec tincidunt dui arcu. Aliquam erat volutpat.<br/>Vivamus ullamcorper massa facilisis orci sodales imperdiet. Suspendisse aliquet sodales eros, sit amet tincidunt eros pulvinar et. Etiam id nibh enim. Nullam turpis enim, lacinia a dictum vitae, posuere non risus. Maecenas interdum augue eget nisl consectetur, in rhoncus ligula eleifend.<br/>Nullam non ligula consequat, consequat dolor et, vulputate nisl. Nunc varius mollis enim, euismod posuere quam malesuada at. '),
(27, 2, 'Charina Orange Heels', 400000, '27.png', 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent elit lorem, scelerisque sed sapien non, vestibulum venenatis nisi. Nullam in arcu eleifend nunc volutpat venenatis a sed massa. Nullam eget congue eros. Donec tincidunt dui arcu. Aliquam erat volutpat.<br/>Vivamus ullamcorper massa facilisis orci sodales imperdiet. Suspendisse aliquet sodales eros, sit amet tincidunt eros pulvinar et. Etiam id nibh enim. Nullam turpis enim, lacinia a dictum vitae, posuere non risus. Maecenas interdum augue eget nisl consectetur, in rhoncus ligula eleifend.<br/>Nullam non ligula consequat, consequat dolor et, vulputate nisl. Nunc varius mollis enim, euismod posuere quam malesuada at. '),
(28, 2, 'Francisca Cream Heels', 450000, '28.jpg', 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent elit lorem, scelerisque sed sapien non, vestibulum venenatis nisi. Nullam in arcu eleifend nunc volutpat venenatis a sed massa. Nullam eget congue eros. Donec tincidunt dui arcu. Aliquam erat volutpat.<br/>Vivamus ullamcorper massa facilisis orci sodales imperdiet. Suspendisse aliquet sodales eros, sit amet tincidunt eros pulvinar et. Etiam id nibh enim. Nullam turpis enim, lacinia a dictum vitae, posuere non risus. Maecenas interdum augue eget nisl consectetur, in rhoncus ligula eleifend.<br/>Nullam non ligula consequat, consequat dolor et, vulputate nisl. Nunc varius mollis enim, euismod posuere quam malesuada at. '),
(29, 2, 'Cambodia Pink Heels', 550000, '29.jpg', 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent elit lorem, scelerisque sed sapien non, vestibulum venenatis nisi. Nullam in arcu eleifend nunc volutpat venenatis a sed massa. Nullam eget congue eros. Donec tincidunt dui arcu. Aliquam erat volutpat.<br/>Vivamus ullamcorper massa facilisis orci sodales imperdiet. Suspendisse aliquet sodales eros, sit amet tincidunt eros pulvinar et. Etiam id nibh enim. Nullam turpis enim, lacinia a dictum vitae, posuere non risus. Maecenas interdum augue eget nisl consectetur, in rhoncus ligula eleifend.<br/>Nullam non ligula consequat, consequat dolor et, vulputate nisl. Nunc varius mollis enim, euismod posuere quam malesuada at. '),
(30, 2, 'Mrs. Smith Heels', 440000, '30.jpg', 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent elit lorem, scelerisque sed sapien non, vestibulum venenatis nisi. Nullam in arcu eleifend nunc volutpat venenatis a sed massa. Nullam eget congue eros. Donec tincidunt dui arcu. Aliquam erat volutpat.<br/>Vivamus ullamcorper massa facilisis orci sodales imperdiet. Suspendisse aliquet sodales eros, sit amet tincidunt eros pulvinar et. Etiam id nibh enim. Nullam turpis enim, lacinia a dictum vitae, posuere non risus. Maecenas interdum augue eget nisl consectetur, in rhoncus ligula eleifend.<br/>Nullam non ligula consequat, consequat dolor et, vulputate nisl. Nunc varius mollis enim, euismod posuere quam malesuada at. ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `sub_deskripsi` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`, `gambar`, `deskripsi`, `sub_deskripsi`) VALUES
(1, 'Ladies Dress', 'man.jpg', 'makanan sehat', 'beras, singkong, dll'),
(2, 'Ladies Shoes', 'woman.jpg', '', ''),
(3, 'Man Shirt', 'unisex.jpg', '', ''),
(5, 'Man Shoes', 'heels.jpg', 'Raihlah awan setinggi mungkin', 'Kurang tinggi? Pegang aja bulan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kredit`
--

CREATE TABLE IF NOT EXISTS `kredit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_account` int(11) NOT NULL,
  `card_number` varchar(128) NOT NULL,
  `name_of_card` varchar(128) NOT NULL,
  `expired_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `account_kredit` (`id_account`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `kredit`
--

INSERT INTO `kredit` (`id`, `id_account`, `card_number`, `name_of_card`, `expired_date`) VALUES
(5, 2, '01213123', 'sonny lazuardi hermawan', '2013-10-27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_account` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_card` (`id_account`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_item`
--

CREATE TABLE IF NOT EXISTS `order_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_order` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tambahan` varchar(140) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_item` (`id_order`),
  KEY `barang_item` (`id_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kredit`
--
ALTER TABLE `kredit`
  ADD CONSTRAINT `account_kredit` FOREIGN KEY (`id_account`) REFERENCES `account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_card` FOREIGN KEY (`id_account`) REFERENCES `account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `barang_item` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_item` FOREIGN KEY (`id_order`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;