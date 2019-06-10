-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2019 at 03:25 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

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
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `generateCode` (OUT `id_hutang` VARCHAR(3))  NO SQL
BEGIN
	SELECT MAX(RIGHT(hutang.id_hutang,4)) AS id_hutang FROM hutang;
END$$

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

CREATE DEFINER=`root`@`localhost` PROCEDURE `jumlah_stok` (IN `name` VARCHAR(20))  NO SQL
BEGIN
	SELECT * FROM barang WHERE nama_barang = name;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tampildetailpesanan` (IN `no_pesanan` VARCHAR(12))  NO SQL
BEGIN
	SELECT p.id_detail_pesan, p.id_pesanan, b.nama_barang, p.qty, p.harga, p.subtotal FROM detail_pesanan AS p, barang AS b WHERE p.id_barang = b.id_barang && p.id_pesanan = no_pesanan;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tampilkode` (IN `kode` VARCHAR(30))  NO SQL
BEGIN
	SELECT * FROM merek WHERE merek = kode;
END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `cari_rata` () RETURNS INT(11) NO SQL
RETURN (SELECT * FROM barang WHERE stok<10)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(5) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah_stok` int(11) NOT NULL,
  `hrg_grosir1` int(11) DEFAULT NULL,
  `hrg_grosir2` int(11) DEFAULT NULL,
  `hrg_grosir3` int(11) DEFAULT NULL,
  `id_merek` varchar(4) DEFAULT NULL,
  `gambar` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `harga`, `jumlah_stok`, `hrg_grosir1`, `hrg_grosir2`, `hrg_grosir3`, `id_merek`, `gambar`) VALUES
('B0001', 'BELFOOD BS AYAM MINI', 14000, 28140, 13000, 13000, 13000, 'A002', ''),
('L0001', 'ILM Tempura', 10800, 49702, 9750, 9665, 9545, 'A001', ''),
('L0002', 'ILM Burger', 11300, 250, 10250, 10215, 9985, 'A001', ''),
('L0003', 'ILM SUKOI', 11300, 250, 10500, 10475, 10275, 'A001', ''),
('L0004', 'ILM PANDA', 11300, 340, 10500, 10475, 10275, 'A001', ''),
('L0005', 'ILM BINTANG', 11300, 240, 10000, 9905, 9725, 'A001', ''),
('L0006', 'ILM TUNA', 9800, 240, 8500, 8425, 8295, 'A001', ''),
('L0007', 'ILM NUGET ES KRIM', 9800, 240, 8750, 8700, 8500, 'A001', ''),
('L0008', 'ILM T NAGA', 9800, 240, 8750, 8700, 8500, 'A001', ''),
('L0009', 'ILM SCALLOP', 11300, 240, 10500, 10475, 10275, 'A001', ''),
('L0010', 'ILM BS MINI', 10800, 240, 9650, 9550, 11880, 'A001', ''),
('L0011', 'ILM PREM- BS ANEKA ', 12000, 240, 9000, 9000, 9000, 'A001', ''),
('S0001', 'SONICE NUGET 250', 11000, 240, 10500, 10500, 10500, 'A003', ''),
('T0001', 'SS TORA C ', 16000, 250, 14750, 14750, 14750, 'A004', '');

-- --------------------------------------------------------

--
-- Stand-in structure for view `detailbarang`
-- (See below for the actual view)
--
CREATE TABLE `detailbarang` (
`id_det_barang` int(11)
,`id_pegawai` varchar(5)
,`nama` varchar(30)
,`jabatan` enum('Owner','Admin','Kasir','Developer')
,`id_barang` varchar(5)
,`nama_barang` varchar(30)
,`jumlah_stok` int(11)
,`tanggal` datetime
,`stok` int(11)
,`keterangan` enum('Tambah','Update / Edit','Hapus')
);

-- --------------------------------------------------------

--
-- Table structure for table `detail_barang`
--

CREATE TABLE `detail_barang` (
  `id_det_barang` int(11) NOT NULL,
  `id_barang` varchar(5) DEFAULT NULL,
  `id_pegawai` varchar(5) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `keterangan` enum('Tambah','Update / Edit','Hapus') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_barang`
--

INSERT INTO `detail_barang` (`id_det_barang`, `id_barang`, `id_pegawai`, `tanggal`, `stok`, `keterangan`) VALUES
(2, 'L0001', '02', '2019-06-06 00:00:00', 10, 'Tambah'),
(3, 'L0001', '02', '0000-00-00 00:00:00', 10, 'Tambah'),
(4, 'L0001', '02', '0000-00-00 00:00:00', 10, 'Tambah'),
(5, 'L0001', '02', '2019-06-07 00:00:00', 10, 'Tambah'),
(6, 'L0001', '02', '2019-06-07 00:00:00', 100, 'Tambah'),
(7, 'L0001', '02', '2019-06-07 00:00:00', 8, 'Tambah'),
(8, 'L0001', '02', '2019-06-07 00:00:00', 90, 'Tambah'),
(9, 'L0007', '02', '2019-06-07 00:00:00', 2, 'Tambah');

--
-- Triggers `detail_barang`
--
DELIMITER $$
CREATE TRIGGER `tambahstok` AFTER INSERT ON `detail_barang` FOR EACH ROW BEGIN
	UPDATE barang SET jumlah_stok = jumlah_stok + New.stok;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `id_detail_pesan` int(11) NOT NULL,
  `id_pesanan` varchar(12) DEFAULT NULL,
  `id_barang` varchar(5) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`id_detail_pesan`, `id_pesanan`, `id_barang`, `qty`, `harga`, `subtotal`) VALUES
(9, '201905310001', 'B0001', 1, 13000, 13000),
(11, '201906020001', 'L0003', 120, 10500, 1260000),
(12, '201906030001', 'L0009', 1, 10500, 10500),
(14, '201906030002', 'L0001', 1, 9750, 9750),
(17, '201906030003', 'L0003', 750, 10500, 7875000),
(18, '201906040001', 'S0001', 1, 10500, 10500),
(19, '201906040002', 'B0001', 1, 13000, 13000),
(20, '201906040003', 'L0001', 1, 9750, 9750);

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail` int(11) NOT NULL,
  `id_transaksi` varchar(14) DEFAULT NULL,
  `id_barang` varchar(5) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail`, `id_transaksi`, `id_barang`, `qty`, `harga`, `subtotal`) VALUES
(1, 'JL1905-0400001', 'L0001', 100, 9750, 975),
(2, NULL, 'L0001', 1, 9750, 9),
(3, 'JL1906-0400001', 'L0001', 100, 9750, 975),
(4, 'JL1906-0400002', 'B0001', 100, 13000, 1);

--
-- Triggers `detail_transaksi`
--
DELIMITER $$
CREATE TRIGGER `penjualan` AFTER INSERT ON `detail_transaksi` FOR EACH ROW BEGIN
	UPDATE barang SET jumlah_stok = jumlah_stok - NEW.qty WHERE barang.id_barang = NEW.id_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `hutang`
--

CREATE TABLE `hutang` (
  `id_hutang` int(11) NOT NULL,
  `id_user` varchar(5) DEFAULT NULL,
  `total_hutang` int(11) DEFAULT NULL,
  `jatuh_tempo` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hutang`
--

INSERT INTO `hutang` (`id_hutang`, `id_user`, `total_hutang`, `jatuh_tempo`) VALUES
(1, '001', 0, '2019-05-22');

-- --------------------------------------------------------

--
-- Table structure for table `merek`
--

CREATE TABLE `merek` (
  `id_merek` varchar(4) NOT NULL,
  `merek` varchar(30) DEFAULT NULL,
  `kode_merek` varchar(4) DEFAULT NULL,
  `gambar` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merek`
--

INSERT INTO `merek` (`id_merek`, `merek`, `kode_merek`, `gambar`) VALUES
('A001', 'ILM', 'L', ''),
('A002', 'BELFOOD', 'B', ''),
('A003', 'SONICE', 'S', ''),
('A004', 'TORA', 'T', ''),
('A005', 'AYOMA', 'AY', 'A005.jpg'),
('A006', 'OKEY', 'K', 'A006.jpg'),
('A007', 'SUFIR', 'SF', ''),
('A008', 'SJM', 'JM', ''),
('A009', 'BAHRI', 'BR', ''),
('A010', 'CRISPY', 'CR', ''),
('A011', 'GOLDSTAR', 'GS', ''),
('A012', 'GEBOY', 'GB', ''),
('A013', 'LOLIGO', 'LL', 'A013.jpg'),
('A014', 'SERA OYE', 'SR', ''),
('A015', 'TOP', 'TP', ''),
('A016', 'VIGO', 'V', ''),
('A017', 'NIDIA', 'ND', 'A017.jpg'),
('A018', 'SUKANDA', 'SK', ''),
('A019', 'BWI', 'BW', ''),
('A020', 'BIMA', 'BM', ''),
('A021', 'CIKIWIKI', 'CW', 'A021.jpg'),
('A022', 'LAIN - LAIN', 'N', '');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` varchar(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jabatan` enum('Owner','Admin','Kasir','Developer') NOT NULL,
  `alamat` tinytext NOT NULL,
  `no_telepon` varchar(12) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama`, `jabatan`, `alamat`, `no_telepon`, `username`, `password`) VALUES
('01', 'Owner', 'Owner', 'Jember', '01234', 'root', 'root'),
('02', 'Warda', 'Admin', 'Jember', '012345678910', 'warda', 'admin'),
('03', 'Andi', 'Admin', 'Jember', '021345678901', 'andi', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` varchar(12) NOT NULL,
  `id_user` varchar(4) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `jenis_pembayaran` enum('Cash','Transfer') DEFAULT NULL,
  `jenis_pengiriman` enum('Ambil Sendiri','Kirim') DEFAULT NULL,
  `status_pesanan` enum('Menunggu Konfirmasi','Diproses','Dikemas','Dikirim','Diterima','Selesai','Dibatalkan') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_user`, `tanggal`, `total_harga`, `jenis_pembayaran`, `jenis_pengiriman`, `status_pesanan`) VALUES
('201905310001', '001', '2019-05-31 13:50:53', 13000, 'Cash', 'Ambil Sendiri', 'Selesai'),
('201906020001', '001', '2019-06-02 09:51:08', 1260000, 'Cash', 'Ambil Sendiri', 'Selesai'),
('201906030001', '001', '2019-06-03 09:40:29', 10500, 'Cash', 'Ambil Sendiri', 'Selesai'),
('201906030002', '001', '2019-06-03 10:50:57', 9750, 'Cash', 'Ambil Sendiri', 'Dibatalkan'),
('201906030003', '001', '2019-06-03 12:28:34', 7875000, 'Cash', 'Ambil Sendiri', 'Selesai'),
('201906040001', '001', '2019-06-04 18:59:04', 10500, 'Cash', 'Ambil Sendiri', 'Selesai'),
('201906040002', '001', '2019-06-04 19:08:21', 13000, 'Cash', 'Ambil Sendiri', 'Selesai'),
('201906040003', '001', '2019-06-04 19:10:40', 9750, 'Cash', 'Ambil Sendiri', 'Dibatalkan');

-- --------------------------------------------------------

--
-- Stand-in structure for view `tampilhutang`
-- (See below for the actual view)
--
CREATE TABLE `tampilhutang` (
`id_hutang` int(11)
,`id_user` varchar(5)
,`nama` varchar(30)
,`total_hutang` int(11)
,`jatuh_tempo` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `tampilpesanan`
-- (See below for the actual view)
--
CREATE TABLE `tampilpesanan` (
`id_pesanan` varchar(12)
,`id_user` varchar(4)
,`nama` varchar(30)
,`alamat` tinytext
,`no_telepon` varchar(12)
,`status` enum('agen','pelanggan biasa')
,`tanggal` datetime
,`total_harga` int(11)
,`jenis_pembayaran` enum('Cash','Transfer')
,`jenis_pengiriman` enum('Ambil Sendiri','Kirim')
,`status_pesanan` enum('Menunggu Konfirmasi','Diproses','Dikemas','Dikirim','Diterima','Selesai','Dibatalkan')
);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(14) NOT NULL,
  `id_user` varchar(4) DEFAULT NULL,
  `id_pegawai` varchar(5) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jatuh_tempo` date DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `bayar` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `jenis_pembayaran` enum('Cash','Transfer') DEFAULT NULL,
  `status_pembayaran` enum('Lunas','Belum Lunas') DEFAULT NULL,
  `no_rekening` varchar(20) DEFAULT NULL,
  `bukti_pembayaran` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_pegawai`, `tanggal`, `jatuh_tempo`, `total_harga`, `bayar`, `kembalian`, `jenis_pembayaran`, `status_pembayaran`, `no_rekening`, `bukti_pembayaran`) VALUES
('JL1905-0400001', '001', '03', '2019-05-29', '2019-06-05', 975000, 975000, 0, 'Cash', 'Lunas', NULL, ''),
('JL1906-0400001', '001', '03', '2019-06-02', '2019-06-09', 975000, 978000, 3000, 'Cash', 'Lunas', NULL, ''),
('JL1906-0400002', '001', '03', '2019-06-02', '2019-06-09', 1300000, 1300000, 0, 'Cash', 'Lunas', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(4) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` tinytext NOT NULL,
  `no_telepon` varchar(12) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `status` enum('agen','pelanggan biasa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `alamat`, `no_telepon`, `username`, `password`, `status`) VALUES
('001', 'Burhan', 'Jember', '01', 'burhan', '$2y$10$2Qh3tyOAatazEj3gE8FQDu5htrNGV.bmSASnommSE7Ryq1Ped9iCm', 'agen');

--
-- Triggers `user`
--
DELIMITER $$
CREATE TRIGGER `hutang_create` AFTER INSERT ON `user` FOR EACH ROW BEGIN
	INSERT INTO hutang(id_user,total_hutang,jatuh_tempo) VALUES(NEW.id_user,'0', NOW());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure for view `detailbarang`
--
DROP TABLE IF EXISTS `detailbarang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detailbarang`  AS  select `d`.`id_det_barang` AS `id_det_barang`,`p`.`id_pegawai` AS `id_pegawai`,`p`.`nama` AS `nama`,`p`.`jabatan` AS `jabatan`,`d`.`id_barang` AS `id_barang`,`b`.`nama_barang` AS `nama_barang`,`b`.`jumlah_stok` AS `jumlah_stok`,`d`.`tanggal` AS `tanggal`,`d`.`stok` AS `stok`,`d`.`keterangan` AS `keterangan` from ((`detail_barang` `d` join `pegawai` `p`) join `barang` `b`) where ((`d`.`id_barang` = `b`.`id_barang`) and (`d`.`id_pegawai` = `p`.`id_pegawai`)) ;

-- --------------------------------------------------------

--
-- Structure for view `tampilhutang`
--
DROP TABLE IF EXISTS `tampilhutang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tampilhutang`  AS  select `hutang`.`id_hutang` AS `id_hutang`,`hutang`.`id_user` AS `id_user`,`user`.`nama` AS `nama`,`hutang`.`total_hutang` AS `total_hutang`,`hutang`.`jatuh_tempo` AS `jatuh_tempo` from (`hutang` join `user`) where (`hutang`.`id_user` = `user`.`id_user`) ;

-- --------------------------------------------------------

--
-- Structure for view `tampilpesanan`
--
DROP TABLE IF EXISTS `tampilpesanan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tampilpesanan`  AS  select `p`.`id_pesanan` AS `id_pesanan`,`p`.`id_user` AS `id_user`,`u`.`nama` AS `nama`,`u`.`alamat` AS `alamat`,`u`.`no_telepon` AS `no_telepon`,`u`.`status` AS `status`,`p`.`tanggal` AS `tanggal`,`p`.`total_harga` AS `total_harga`,`p`.`jenis_pembayaran` AS `jenis_pembayaran`,`p`.`jenis_pengiriman` AS `jenis_pengiriman`,`p`.`status_pesanan` AS `status_pesanan` from (`pesanan` `p` join `user` `u`) where (`p`.`id_user` = `u`.`id_user`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_merek` (`id_merek`);

--
-- Indexes for table `detail_barang`
--
ALTER TABLE `detail_barang`
  ADD PRIMARY KEY (`id_det_barang`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`id_detail_pesan`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_pesanan` (`id_pesanan`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indexes for table `hutang`
--
ALTER TABLE `hutang`
  ADD PRIMARY KEY (`id_hutang`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `merek`
--
ALTER TABLE `merek`
  ADD PRIMARY KEY (`id_merek`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_barang`
--
ALTER TABLE `detail_barang`
  MODIFY `id_det_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  MODIFY `id_detail_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hutang`
--
ALTER TABLE `hutang`
  MODIFY `id_hutang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_merek`) REFERENCES `merek` (`id_merek`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_barang`
--
ALTER TABLE `detail_barang`
  ADD CONSTRAINT `detail_barang_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_barang_ibfk_2` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON UPDATE CASCADE;

--
-- Constraints for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD CONSTRAINT `detail_pesanan_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_pesanan_ibfk_3` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hutang`
--
ALTER TABLE `hutang`
  ADD CONSTRAINT `hutang_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_4` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
