-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 09, 2026 at 12:35 PM
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
-- Database: `db_kasir`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `cabang` varchar(50) NOT NULL,
  `keluhan` text NOT NULL,
  `keterangan` text NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `nama`, `jenis_kelamin`, `cabang`, `keluhan`, `keterangan`, `foto`) VALUES
(1, 'Aska', 'Laki-laki', 'Cabang 1', 'Sistem Lemot', 'Lemoooottt', '1766894286_8779756758de47e5c369.png'),
(2, 'hgrav', 'Perempuan', 'Cabang 3', 'Sistem Lemot, Sistem Error', 'Errorrr', '1766894733_f518f74434ad8ca7d836.png'),
(3, 'Joko', 'Laki-laki', 'Cabang 2', 'Sistem Error', 'UAGdi s', '1766894842_7cdeddeabbd04bf15408.png'),
(4, 'Pandu', 'Perempuan', 'Cabang 2', 'Data Tidak Tersimpan', 'hagfua', '1766902811_06a6e868bd06ac6f3b1b.png'),
(5, 'Dimas', 'Laki-laki', 'Cabang 3', 'Sistem Lemot, Data Tidak Tersimpan', 'kaha', '1766902929_e34a5040f2a79187636f.png'),
(6, 'Lanjar', 'Perempuan', 'Cabang 2', 'Sistem Error, Data Tidak Tersimpan', 'hewrbuavw', '1767252323_05302ed670b8d65b9608.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jual`
--

CREATE TABLE `tbl_jual` (
  `id_jual` int NOT NULL,
  `no_faktur` varchar(15) DEFAULT NULL,
  `tgl_jual` date DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `grand_total` int DEFAULT NULL,
  `dibayar` int DEFAULT NULL,
  `kembalian` int DEFAULT NULL,
  `id_kasir` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int NOT NULL,
  `nama_kategori` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Makanan'),
(2, 'Minuman'),
(3, 'Roti'),
(4, 'Snack'),
(5, 'Sembako'),
(6, 'Kebersihan Badan'),
(7, 'Rumah Tangga');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `id_produk` int NOT NULL,
  `kode_produk` varchar(25) DEFAULT NULL,
  `nama_produk` varchar(150) DEFAULT NULL,
  `id_kategori` int DEFAULT NULL,
  `id_satuan` int DEFAULT NULL,
  `harga_beli` int DEFAULT NULL,
  `harga_jual` int DEFAULT NULL,
  `stok` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_produk`
--

INSERT INTO `tbl_produk` (`id_produk`, `kode_produk`, `nama_produk`, `id_kategori`, `id_satuan`, `harga_beli`, `harga_jual`, `stok`) VALUES
(1, 'P001', 'Indomie Goreng\r\n', 1, 1, 2500, 3000, 50),
(2, 'P002', 'Indomie Kuah Soto\r\n', 1, 1, 2500, 3000, 40),
(3, 'P003', 'Indomie Kari Ayam\r\n', 1, 1, 2500, 3000, 45),
(4, 'P004', 'Mi Sedaap Original\r\n', 1, 1, 2500, 3000, 30),
(5, 'P005', 'Aqua Botol 600ml\r\n', 2, 2, 4000, 5000, 30),
(6, 'P006', 'Teh Pucuk Harum 350ml\r\n', 2, 2, 3600, 4500, 25),
(7, 'P007', 'Coca-Cola Kaleng 330ml\r\n', 2, 2, 5200, 6500, 20),
(8, 'P008', 'Sprite Botol 390ml\r\n', 2, 2, 4800, 6000, 20),
(9, 'P009', 'Ultra Milk Coklat 250ml\r\n', 2, 2, 4800, 6000, 25),
(10, 'P010', 'Susu Indomilk UHT 1L\r\n', 2, 2, 9600, 12000, 15),
(11, 'P011', 'Kopi Good Day 3in1 Sachet\r\n', 2, 1, 1600, 2000, 100),
(12, 'P012', 'Milo Kotak 200ml\r\n', 2, 2, 4400, 5500, 30),
(13, 'P013', 'Roti Sari Roti Tawar\r\n', 3, 1, 12000, 15000, 15),
(14, 'P014', 'Roti O - Kacang\r\n', 3, 1, 8000, 10000, 20),
(15, 'P015', 'SilverQueen Coklat 65gr\r\n', 4, 3, 9600, 12000, 20),
(16, 'P016', 'KitKat Wafer 4 Fingers\r\n', 4, 1, 6500, 8000, 35),
(17, 'P017', 'Snickers Bar\r\n', 4, 4, 8400, 10500, 25),
(18, 'P018', 'Chitato BBQ 68gr\r\n', 4, 4, 6800, 8500, 30),
(19, 'P019', 'Lays Rumput Laut 55gr\r\n', 4, 4, 6000, 7500, 25),
(20, 'P020', 'Tango Wafer Coklat 130gr\r\n', 4, 4, 8000, 10000, 20),
(21, 'P021', 'Beng-Beng 20gr\r\n', 4, 3, 2000, 2500, 50),
(22, 'P022', 'Oreo Cream Sandwich 137gr\r\n', 4, 3, 7200, 9200, 30),
(23, 'P023', 'Pop Mie Kari Ayam\r\n', 1, 1, 4000, 5000, 40),
(24, 'P024', 'Mie Sedaap Soto Lamongan\r\n', 1, 1, 2800, 3500, 30),
(25, 'P025', 'Beras Ramos 5kg\r\n', 5, 3, 56000, 70000, 8),
(26, 'P026', 'Minyak Goreng Bimoli 1L\r\n', 5, 2, 14400, 18000, 10),
(27, 'P027', 'Gula Pasir Gulaku 1kg\r\n', 5, 3, 11200, 14000, 20),
(28, 'P028', 'Garam Dapur Kristal 500gr\r\n', 5, 3, 2000, 2500, 50),
(29, 'P029', 'Telur Ayam 1 Kg\r\n', 5, 3, 18400, 23000, 30),
(30, 'P030', 'Tepung Terigu Segitiga Biru 1kg\r\n', 5, 3, 9600, 12000, 20),
(31, 'P031', 'Susu Kental Manis Frisian Flag 370gr\r\n', 5, 3, 8800, 11000, 25),
(32, 'P032', 'Pasta Gigi Pepsodent 190gr\r\n', 6, 3, 9600, 12000, 25),
(33, 'P033', 'Sabun Lifebuoy 110gr\r\n', 6, 3, 3200, 4000, 35),
(34, 'P034', 'Shampo Sunsilk 170ml\r\n', 6, 3, 12400, 15500, 25),
(35, 'P035', 'Sabun Mandi Dove Beauty Bar\r\n', 6, 1, 4800, 6000, 30),
(36, 'P036', 'Deodorant Rexona Roll On\r\n', 6, 1, 14400, 18000, 30),
(37, 'P037', 'Sikat Gigi Kepala Empat\r\n', 6, 1, 4400, 5500, 30),
(38, 'P038', 'Pelembab Nivea 200ml\r\n', 6, 1, 16000, 20000, 35),
(39, 'P039', 'Tissue Magic Soft 150 sheets\r\n', 7, 1, 7200, 9000, 40),
(40, 'P040', 'Detergen Rinso 800gr\r\n', 7, 1, 12000, 15000, 20),
(41, 'P041', 'Pembersih Lantai So Klin 2L\r\n', 7, 1, 17600, 22000, 15),
(42, 'P042', 'Pewangi Pakaian Downy 900ml\r\n', 7, 1, 16000, 22000, 30),
(43, 'P043', 'Sapu Lidi\r\n', 7, 1, 5600, 7000, 35),
(44, 'P044', 'Ember Plastik 8L\r\n', 7, 1, 9600, 12000, 20),
(45, 'P045', 'Korek Api Gas\r\n', 7, 1, 400, 500, 100),
(46, 'P046', 'Lilin Darurat\r\n', 7, 1, 4000, 5000, 30),
(47, 'P047', 'Dodol', 1, 5, 12000, 15000, 10),
(48, 'P048', 'Aqua Botol 1L', 2, 1, 5000, 7000, 5),
(49, 'P049', 'Nescafe Ice Black', 2, 1, 6000, 7500, 8),
(50, 'P050', 'Garuda Rosta Pedas 90gr', 1, 1, 9000, 10000, 13);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rinci_jual`
--

CREATE TABLE `tbl_rinci_jual` (
  `id_rinci` int NOT NULL,
  `no_faktur` varchar(15) DEFAULT NULL,
  `kode_produk` varchar(25) DEFAULT NULL,
  `harga_jual` int DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `total_harga` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_satuan`
--

CREATE TABLE `tbl_satuan` (
  `id_satuan` int NOT NULL,
  `nama_satuan` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_satuan`
--

INSERT INTO `tbl_satuan` (`id_satuan`, `nama_satuan`) VALUES
(1, 'Pcs'),
(2, 'ml'),
(3, 'gr'),
(4, 'Lusin'),
(5, 'Box'),
(7, 'Kg'),
(9, 'Meter');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int NOT NULL,
  `nama_user` varchar(40) NOT NULL,
  `foto` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `level` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `foto`, `email`, `password`, `level`) VALUES
(11, 'Askadhani A', '1767924571_f79243c9696742ba0db7.jpeg', 'admin@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1),
(12, 'Pandu A', '1767924639_09423590d25811b6dff4.jpg', 'user1@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 2),
(13, 'Lanjar A', '1767924736_0bd95cb09000b67bb6fb.jpg', 'user2@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 2),
(15, 'Kamal Chusen', '1767925396_a52f7318662d1eb29285.jpg', 'admin2@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jual`
--
ALTER TABLE `tbl_jual`
  ADD PRIMARY KEY (`id_jual`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tbl_rinci_jual`
--
ALTER TABLE `tbl_rinci_jual`
  ADD PRIMARY KEY (`id_rinci`);

--
-- Indexes for table `tbl_satuan`
--
ALTER TABLE `tbl_satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_jual`
--
ALTER TABLE `tbl_jual`
  MODIFY `id_jual` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id_produk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `tbl_rinci_jual`
--
ALTER TABLE `tbl_rinci_jual`
  MODIFY `id_rinci` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_satuan`
--
ALTER TABLE `tbl_satuan`
  MODIFY `id_satuan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
