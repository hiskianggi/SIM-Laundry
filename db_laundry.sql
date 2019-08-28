-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2019 at 02:44 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `jasa`
--

CREATE TABLE `jasa` (
  `kode_jasa` varchar(10) NOT NULL,
  `nama_jasa` varchar(15) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jasa`
--

INSERT INTO `jasa` (`kode_jasa`, `nama_jasa`, `harga`) VALUES
('JS001', 'Extra Setrika', 25000),
('JS002', 'Laundry Kiloan', 15000),
('JS003', 'Pewangi Luxuri', 30000),
('JS004', 'Paket Komplit', 70000);

-- --------------------------------------------------------

--
-- Table structure for table `orderan`
--

CREATE TABLE `orderan` (
  `nomer_order` varchar(10) NOT NULL,
  `tanggal_order` varchar(25) NOT NULL,
  `tgl_rencana_selesai` varchar(25) NOT NULL,
  `berat_cucian` varchar(18) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `status_cucian` varchar(25) NOT NULL,
  `kode_pelanggan` varchar(10) NOT NULL,
  `kode_petugas` varchar(10) NOT NULL,
  `kode_jasa` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderan`
--

INSERT INTO `orderan` (`nomer_order`, `tanggal_order`, `tgl_rencana_selesai`, `berat_cucian`, `total_harga`, `status_cucian`, `kode_pelanggan`, `kode_petugas`, `kode_jasa`) VALUES
('LDR001', '2018-12-04', '2018-12-07', '4', 100000, 'Sudah Diambil', 'PLG001', 'PTG001', 'JS001'),
('LDR002', '2018-12-04', '2018-12-08', '8', 200000, 'Sudah Diambil', '-', 'PTG001', 'JS001'),
('LDR003', '2018-12-04', '2018-12-07', '3', 75000, 'Sudah Diambil', '-', 'PTG001', 'JS001'),
('LDR004', '2018-12-04', '2018-12-06', '92', 2760000, 'Sudah Diambil', 'PLG004', 'PTG001', 'JS003'),
('LDR005', '2018-12-04', '2018-12-07', '57', 855000, 'Sudah Diambil', 'PLG007', 'PTG001', 'JS002'),
('LDR006', '2018-12-04', '2018-12-08', '90', 2250000, 'Belum Diambil', 'PLG001', 'PTG003', 'JS001'),
('LDR007', '2018-12-04', '2018-12-10', '89', 6230000, 'Sudah Diambil', 'PLG003', 'PTG003', 'JS004'),
('LDR008', '2018-12-04', '2018-12-07', '95', 1425000, 'Sudah Diambil', 'PLG007', 'PTG003', 'JS002'),
('LDR009', '2018-12-04', '2018-12-07', '67', 1675000, 'Sudah Diambil', 'PLG001', 'PTG003', 'JS001'),
('LDR010', '2018-12-04', '2018-12-07', '36', 1080000, 'Belum Diambil', 'PLG001', 'PTG003', 'JS003'),
('LDR011', '2018-12-04', '2018-12-07', '5', 125000, 'Sudah Diambil', 'PLG001', 'PTG001', 'JS001'),
('LDR012', '2018-12-05', '2018-12-06', '4', 100000, 'Sudah Diambil', 'PLG006', 'PTG001', 'JS001'),
('LDR013', '2018-12-05', '2018-12-13', '63', 1575000, 'Sudah Diambil', 'PLG001', 'PTG001', 'JS001'),
('LDR014', '2018-12-05', '2018-12-07', '25', 625000, 'Sudah Diambil', 'PLG001', 'PTG001', 'JS001'),
('LDR015', '2018-12-05', '2018-11-08', '67', 1675000, 'Sudah Diambil', 'PLG007', 'PTG001', 'JS001'),
('LDR016', '2018-12-05', '2018-12-07', '324', 8100000, 'Belum Diambil', 'PLG005', 'PTG001', 'JS001'),
('LDR017', '2018-12-05', '2018-12-07', '4', 60000, 'Sudah Diambil', 'PLG007', 'PTG001', 'JS002'),
('LDR018', '2018-12-05', '2018-12-06', '8', 560000, 'Sudah Diambil', 'PLG003', 'PTG001', 'JS004'),
('LDR019', '2018-12-05', '2018-12-06', '68', 4760000, 'Sudah Diambil', 'PLG003', 'PTG001', 'JS004'),
('LDR020', '2018-12-06', '2018-12-07', '67', 2010000, 'Sudah Diambil', 'PLG003', 'PTG001', 'JS003'),
('LDR021', '2018-12-06', '2018-12-07', '8', 240000, 'Belum Diambil', 'PLG006', 'PTG001', 'JS003'),
('LDR022', '2018-12-07', '2018-12-08', '5', 150000, 'Sudah Diambil', 'PLG004', 'PTG001', 'JS003'),
('LDR023', '2018-12-07', '2018-12-08', '80', 2400000, 'Sudah Diambil', 'PLG005', 'PTG001', 'JS003'),
('LDR024', '2018-12-07', '2018-12-13', '3', 45000, 'Belum Diambil', 'PLG002', 'PTG001', 'JS002'),
('LDR025', '2018-12-07', '2018-12-13', '3', 45000, 'Belum Diambil', 'PLG002', 'PTG001', 'JS002'),
('LDR026', '2018-12-07', '2018-12-13', '3', 45000, 'Sudah Diambil', '-', 'PTG001', 'JS002'),
('LDR027', '2018-12-10', '2018-12-15', '20', 300000, 'Sudah Diambil', 'PLG005', 'PTG001', 'JS002'),
('LDR028', '2018-12-11', '2018-12-14', '6', 180000, 'Sudah Diambil', 'PLG002', 'PTG001', 'JS003'),
('LDR029', '2018-12-12', '2018-12-13', '78', 1170000, 'Belum Diambil', 'PLG002', 'PTG001', 'JS002'),
('LDR030', '2018-12-12', '2018-12-14', '8', 560000, 'Sudah Diambil', 'PLG003', 'PTG001', 'JS004'),
('LDR031', '2018-12-13', '2018-12-22', '200000', 2147483647, 'Sudah Diambil', 'PLG004', 'PTG001', 'JS003'),
('LDR032', '2018-12-13', '2018-12-14', '17', 510000, 'Sudah Diambil', 'PLG003', 'PTG001', 'JS003'),
('LDR033', '2018-12-13', '2018-12-14', '23', 690000, 'Sudah Diambil', 'PLG006', 'PTG001', 'JS003'),
('LDR034', '2018-12-14', '2018-12-26', '6', 420000, 'Belum Diambil', 'PLG003', 'PTG001', 'JS004'),
('LDR035', '2018-12-14', '2018-12-26', '6', 420000, 'Belum Diambil', 'PLG003', 'PTG001', 'JS004'),
('LDR036', '2018-12-14', '2018-12-22', '2', 50000, 'Belum Diambil', '-', 'PTG001', 'JS001'),
('LDR037', '2018-12-14', '2018-12-15', '20', 1400000, 'Belum Diambil', 'PLG005', 'PTG001', 'JS004'),
('LDR038', '2018-12-14', '2018-12-15', '20', 1400000, 'Belum Diambil', 'PLG005', 'PTG001', 'JS004'),
('LDR039', '2018-12-14', '2018-12-21', '3', 45000, 'Belum Diambil', 'PLG004', 'PTG001', 'JS002'),
('LDR040', '2018-12-17', '2018-12-14', '20', 600000, 'Belum Diambil', 'PLG005', 'PTG001', 'JS003'),
('LDR041', '2018-12-17', '2018-12-20', '2', 140000, 'Belum Diambil', 'PLG006', 'PTG001', 'JS004'),
('LDR042', '2018-12-17', '2018-12-20', '2', 140000, 'Belum Diambil', 'PLG006', 'PTG001', 'JS004'),
('LDR043', '2018-12-18', '2018-12-19', '2', 30000, 'Sudah Diambil', 'PLG005', 'PTG001', 'JS002'),
('LDR044', '2018-12-18', '2018-12-21', '2', 30000, 'Belum Diambil', 'PLG008', 'PTG001', 'JS002'),
('LDR045', '2019-02-25', '2019-02-07', '2', 60000, 'Belum Diambil', 'PLG006', 'PTG002', 'JS003');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `kode_pelanggan` varchar(10) NOT NULL,
  `nama_pelanggan` varchar(25) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `status_pelanggan` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`kode_pelanggan`, `nama_pelanggan`, `alamat`, `no_telp`, `status_pelanggan`) VALUES
('-', '- (Tidak Pelanggan) -', '-', '-', '-'),
('PLG003', 'Imroatul Kamila', 'Bumiharjo', '083474859574', 'Tidak Aktif'),
('PLG004', 'Aminuddin Shofi Ashari', 'Jlegong', '092689373627', 'Aktif'),
('PLG005', 'Hiskia Anggi Puji Pratama', 'Bandungharjo', '081234567890', 'Aktif'),
('PLG006', 'Hana Tri Mahardika', 'Tunahan Perning', '085867058510', 'Tidak Aktif'),
('PLG007', 'M Kamaluddin', 'Blingoh', '028383932829', 'Tidak Aktif'),
('PLG008', 'Nor Hidayatul Ulfa', 'Kelet', '085929473728', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `kode_ptg` varchar(10) NOT NULL,
  `nama_ptg` varchar(30) NOT NULL,
  `password_ptg` varchar(50) NOT NULL,
  `status` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`kode_ptg`, `nama_ptg`, `password_ptg`, `status`) VALUES
('PTG001', 'Hiskia', 'a412ba79e6bcd018c48faf00f057c0bb', 'Admin'),
('PTG002', 'Anggi', '3b69025e5c1d8b3486e6c03f7a3e2241', 'Admin'),
('PTG003', 'Pratama', '3b69025e5c1d8b3486e6c03f7a3e2241', 'Manager'),
('PTG004', 'Puji', '3b69025e5c1d8b3486e6c03f7a3e2241', 'Kasir');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `no_transaksi` varchar(10) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembali` int(11) NOT NULL,
  `kode_ptg` varchar(10) NOT NULL,
  `nomer_order` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`no_transaksi`, `tgl_transaksi`, `bayar`, `kembali`, `kode_ptg`, `nomer_order`) VALUES
('TRN001', '2018-12-04', 100000, 0, 'PTG001', 'LDR001'),
('TRN002', '2018-12-04', 1000000, 900000, 'PTG001', 'LDR001'),
('TRN003', '2018-12-04', 900000, 45000, 'PTG003', 'LDR005'),
('TRN004', '2018-12-04', 150000, 25000, 'PTG001', 'LDR011'),
('TRN005', '2018-12-04', 200000, 100000, 'PTG001', 'LDR009'),
('TRN006', '2018-12-05', 7000000, 770000, 'PTG001', 'LDR007'),
('TRN007', '2018-12-05', 7000000, 770000, 'PTG001', 'LDR007'),
('TRN008', '2018-12-05', 70000, 10000, 'PTG001', 'LDR017'),
('TRN009', '2018-12-05', 250000, 50000, 'PTG001', 'LDR002'),
('TRN010', '2018-12-05', 120000, 20000, 'PTG001', 'LDR001'),
('TRN011', '2018-12-05', 300000, 100000, 'PTG001', 'LDR002'),
('TRN012', '2018-12-05', 100000, 25000, 'PTG002', 'LDR003'),
('TRN013', '2018-12-05', 1500000, 75000, 'PTG001', 'LDR008'),
('TRN014', '2018-12-05', 100000, 0, 'PTG001', 'LDR001'),
('TRN015', '2018-12-05', 2000000, 325000, 'PTG001', 'ldr015'),
('TRN016', '2018-12-05', 2000000, 425000, 'PTG001', 'ldr013'),
('TRN017', '2018-12-05', 100000, 0, 'PTG001', 'LDR001'),
('TRN018', '2018-12-05', 300000, 225000, 'PTG001', 'LDR003'),
('TRN019', '2018-12-05', 600000, 500000, 'PTG001', 'LDR001'),
('TRN020', '2018-12-05', 200000, 100000, 'PTG001', 'LDR005'),
('TRN021', '2018-12-05', 3000000, 240000, 'PTG001', 'LDR004'),
('TRN022', '2018-12-05', 5000000, 240000, 'PTG001', 'LDR019'),
('TRN023', '2018-12-06', 8998989, 8438989, 'PTG001', 'LDR018'),
('TRN024', '2018-12-06', 150000, 25000, 'PTG001', 'LDR011'),
('TRN025', '2018-12-06', 2100000, 90000, 'PTG001', 'LDR020'),
('TRN026', '2018-12-07', 15000, -1410000, 'PTG001', 'LDR01'),
('TRN027', '2018-12-07', 150000, 0, 'PTG001', 'LDR022'),
('TRN028', '2018-12-10', 2000000, 1145000, 'PTG001', 'LDR005'),
('TRN029', '2018-12-11', 3000000, 240000, 'PTG001', 'LDR004'),
('TRN030', '2018-12-12', 200000, 20000, 'PTG001', 'LDR028'),
('TRN031', '2018-12-13', 2147483647, 52516353, 'PTG001', 'LDR031'),
('TRN032', '2018-12-13', 2000000, 1145000, 'PTG001', 'LDR005'),
('TRN033', '2018-12-13', 520000, 10000, 'PTG001', 'LDR032'),
('TRN034', '2018-12-13', 7000000, 6375000, 'PTG001', 'LDR014'),
('TRN035', '2018-12-13', 2000000, 1310000, 'PTG001', 'LDR033'),
('TRN036', '2018-12-14', 200000, 155000, 'PTG001', 'LDR026'),
('TRN037', '2018-12-14', 200, -2399800, 'PTG001', 'LDR023'),
('TRN038', '2018-12-14', 222222, 122222, 'PTG001', 'LDR012'),
('TRN039', '2018-12-17', 300000, 0, 'PTG001', 'LDR027'),
('TRN040', '2018-12-18', 600000, 40000, 'PTG001', 'LDR030'),
('TRN041', '2018-12-18', 30000, 0, 'PTG001', 'LDR043');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jasa`
--
ALTER TABLE `jasa`
  ADD PRIMARY KEY (`kode_jasa`);

--
-- Indexes for table `orderan`
--
ALTER TABLE `orderan`
  ADD PRIMARY KEY (`nomer_order`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`kode_pelanggan`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`kode_ptg`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`no_transaksi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
