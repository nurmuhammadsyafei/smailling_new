-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2021 at 08:19 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `slntools_smailling`
--

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `id_divisi` int(15) NOT NULL,
  `nama_divisi` varchar(255) NOT NULL,
  `detail_divisi` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `nama_divisi`, `detail_divisi`) VALUES
(1, 'SLN', 'Penjualan Konsumer');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(15) NOT NULL,
  `nama_jabatan` varchar(255) NOT NULL,
  `detail_jabatan` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`, `detail_jabatan`) VALUES
(1, 'Asisten / Admin', 'Asisten / Admin'),
(2, 'AMGR', 'Asisten Manager'),
(3, 'MGR', 'Manager'),
(4, 'AVP', 'AVP');

-- --------------------------------------------------------

--
-- Table structure for table `kelompok`
--

CREATE TABLE `kelompok` (
  `id_kelompok` int(15) NOT NULL,
  `nama_kelompok` varchar(255) NOT NULL,
  `detail_kelompok` varchar(255) NOT NULL,
  `id_divisi` int(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelompok`
--

INSERT INTO `kelompok` (`id_kelompok`, `nama_kelompok`, `detail_kelompok`, `id_divisi`) VALUES
(1, 'DGS', 'Digital Sales', 1),
(2, 'SPO', 'Sales Planning', 1),
(3, 'SUP', 'Supporting', 1),
(4, 'SCO', 'Sales Company', 1),
(5, 'SMN', 'Sales Management', 1),
(6, 'SGV', 'Sales Goverment', 1);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `level_id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`level_id`, `nama`) VALUES
(1, 'Pemimpin'),
(2, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `link` varchar(100) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `sort` varchar(20) NOT NULL,
  `level` int(2) NOT NULL,
  `access` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `nama`, `link`, `icon`, `sort`, `level`, `access`) VALUES
(1, 'User Management', 'adm/user_management', 'fa-dashboard', '11', 1, 1),
(4, 'Menu', 'adm/menu', 'fa-server', '3', 1, 1),
(7, 'Access Grup', 'adm/access', 'fa-file-text-o', '5', 1, 1),
(101, 'Dashboard', 'adm/dashboard', 'fa-dashboard', '1', 1, 1),
(105, 'Data Login', 'adm/log', 'fa-lock', '19', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu_access`
--

CREATE TABLE `menu_access` (
  `id_grup` int(11) NOT NULL,
  `id_menu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_access`
--

INSERT INTO `menu_access` (`id_grup`, `id_menu`) VALUES
(5, 1),
(5, 4),
(3, 3),
(3, 4),
(3, 5),
(3, 8),
(3, 9),
(3, 10),
(10, 1),
(10, 4),
(10, 9),
(11, 1),
(11, 3),
(11, 9),
(11, 10),
(9, 101),
(9, 102),
(9, 104),
(2, 1),
(2, 101),
(2, 110),
(2, 112),
(2, 115),
(2, 117),
(2, 119),
(1, 1),
(1, 4),
(1, 7),
(1, 101),
(1, 105),
(1, 110),
(1, 112),
(1, 113),
(1, 115),
(1, 116),
(1, 117),
(1, 119),
(1, 0),
(8, 101),
(8, 113),
(8, 0);

-- --------------------------------------------------------

--
-- Table structure for table `menu_grup`
--

CREATE TABLE `menu_grup` (
  `id_grup` int(11) NOT NULL,
  `nama_grup` varchar(50) NOT NULL,
  `desc_grup` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_grup`
--

INSERT INTO `menu_grup` (`id_grup`, `nama_grup`, `desc_grup`) VALUES
(1, 'Admin SPO', 'Big Admin'),
(2, 'Admin SGV', 'adminsgv'),
(8, 'Tele', 'Monitoring'),
(9, 'Guest', 'View');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(15) NOT NULL,
  `npp` varchar(7) NOT NULL,
  `nama` text NOT NULL,
  `no_wa` varchar(25) NOT NULL,
  `id_kelompok` int(15) NOT NULL,
  `id_jabatan` int(15) NOT NULL,
  `password` text NOT NULL,
  `last_login` datetime NOT NULL,
  `active` int(2) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `npp`, `nama`, `no_wa`, `id_kelompok`, `id_jabatan`, `password`, `last_login`, `active`, `created_date`) VALUES
(37, 'P092043', 'Nur Muhammad Syafei', '6283875758003', 1, 1, '$2y$10$hM/wa2nVcqY4FQ1bfdhhJ.nZIVfodZwrVhw.DtnhlXdHUJxG3lLGO', '0000-00-00 00:00:00', 0, '2021-01-08 00:00:00'),
(15, 'P026296', 'Elreza Hardian', '62818760046', 1, 4, '$2y$10$XdXeavvWJCKMkaXyeVMQ4eSvkPb.1mX53ZBS4XhvYAeADUCyY9uIG', '0000-00-00 00:00:00', 0, '2021-01-08 00:00:00'),
(14, 'P000000', 'Triana Rachmayanti', '628993772788', 1, 1, '$2y$10$nwEK6LNlwKf.uxzedOysXeNNezSZzxzH7G.hR5fWwod/g0bgxp7ei', '0000-00-00 00:00:00', 0, '2021-01-08 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `kelompok`
--
ALTER TABLE `kelompok`
  ADD PRIMARY KEY (`id_kelompok`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_divisi` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kelompok`
--
ALTER TABLE `kelompok`
  MODIFY `id_kelompok` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
