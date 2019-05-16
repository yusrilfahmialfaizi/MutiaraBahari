-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Bulan Mei 2019 pada 20.04
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sosis`
--

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getbarang` (OUT `jumlah_barang` INT(11))  NO SQL
BEGIN 
	SELECT COUNT(id_barang) INTO jumlah_barang FROM barang;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getStok` (IN `hrg` INT(11), IN `nama` VARCHAR(30))  NO SQL
BEGIN
	SELECT * FROM barang WHERE harga = hrg AND nama_barang =nama;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_barang` (INOUT `hrg` INT(11), OUT `jenis` INT(11))  NO SQL
BEGIN
	SELECT COUNT(id_barang) INTO jenis FROM barang WHERE harga = hrg;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tampilkode` (IN `kode` VARCHAR(30))  NO SQL
BEGIN
	SELECT * FROM merek WHERE merek = kode;
END$$

--
-- Fungsi
--
CREATE DEFINER=`root`@`localhost` FUNCTION `cari_rata` () RETURNS INT(11) NO SQL
RETURN (SELECT AVG(harga) FROM barang WHERE stok<150)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(5) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah_stok` int(11) NOT NULL,
  `hrg_grosir1` int(11) DEFAULT NULL,
  `hrg_grosir2` int(11) DEFAULT NULL,
  `hrg_grosir3` int(11) DEFAULT NULL,
  `id_merek` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `harga`, `jumlah_stok`, `hrg_grosir1`, `hrg_grosir2`, `hrg_grosir3`, `id_merek`) VALUES
('B0001', 'BELFOOD BS AYAM MINI', 14000, 2000, 13000, 13000, 13000, 'A2'),
('L0001', 'ILM Tempura', 10800, 0, 9750, 9665, 9545, 'A1'),
('L0002', 'ILM Burger', 11300, 0, 10250, 10215, 9985, 'A1'),
('S0001', 'SONICE NUGET 250', 11000, 0, 10500, 10500, 10500, 'A3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_barang`
--

CREATE TABLE `detail_barang` (
  `id_det_barang` varchar(5) NOT NULL,
  `id_barang` varchar(5) DEFAULT NULL,
  `id_pegawai` varchar(5) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `stok` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail` int(11) NOT NULL,
  `id_transaksi` varchar(14) DEFAULT NULL,
  `id_barang` varchar(5) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hutang`
--

CREATE TABLE `hutang` (
  `id_hutang` varchar(5) NOT NULL,
  `id_user` varchar(5) DEFAULT NULL,
  `total_hutang` int(11) DEFAULT NULL,
  `jatuh_tempo` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `merek`
--

CREATE TABLE `merek` (
  `id_merek` varchar(4) NOT NULL,
  `merek` varchar(30) DEFAULT NULL,
  `kode_merek` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `merek`
--

INSERT INTO `merek` (`id_merek`, `merek`, `kode_merek`) VALUES
('A1', 'ILM', 'L'),
('A2', 'Belfood', 'B'),
('A3', 'SONICE', 'S');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` varchar(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jabatan` enum('admin','owner') NOT NULL,
  `alamat` tinytext NOT NULL,
  `no_telepon` varchar(12) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama`, `jabatan`, `alamat`, `no_telepon`, `username`, `password`) VALUES
('CA001', 'Warda', 'admin', 'Jember', '012345678910', 'warda', 'admin'),
('CA002', 'Andi', 'admin', 'Jember', '021345678901', 'andi', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(14) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `id_pegawai` varchar(5) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jatuh_tempo` date DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `bayar` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `jenis_pembayaran` enum('Cash','Transfer') DEFAULT NULL,
  `status_pembayaran` enum('Lunas','Belum Lunas') DEFAULT NULL,
  `bukti_pembayaran` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(4) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` tinytext NOT NULL,
  `no_telepon` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `alamat`, `no_telepon`) VALUES
('001', 'Burhan', 'Jember', '012345679810');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_merek` (`id_merek`);

--
-- Indeks untuk tabel `detail_barang`
--
ALTER TABLE `detail_barang`
  ADD PRIMARY KEY (`id_det_barang`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indeks untuk tabel `hutang`
--
ALTER TABLE `hutang`
  ADD PRIMARY KEY (`id_hutang`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `merek`
--
ALTER TABLE `merek`
  ADD PRIMARY KEY (`id_merek`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_merek`) REFERENCES `merek` (`id_merek`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_barang`
--
ALTER TABLE `detail_barang`
  ADD CONSTRAINT `detail_barang_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_barang_ibfk_2` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `hutang`
--
ALTER TABLE `hutang`
  ADD CONSTRAINT `hutang_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
