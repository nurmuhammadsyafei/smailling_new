-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2021 at 11:11 AM
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
-- Table structure for table `approver`
--

CREATE TABLE `approver` (
  `id_approver` int(15) NOT NULL,
  `id_surat` varchar(15) NOT NULL,
  `npp` varchar(7) NOT NULL,
  `masukan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `approver`
--

INSERT INTO `approver` (`id_approver`, `id_surat`, `npp`, `masukan`) VALUES
(11, '1', '1234567', ''),
(12, '1', '', '');

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
(4, 'AVP', 'AVP'),
(5, 'ADGS', 'Admin DGS');

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
(6, 'SGV', 'Sales Goverment', 1),
(7, 'DSS', 'Direct Sales', 1);

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
(1, 'User Management', 'adm/user_mgt', 'fas fa-users', '11', 1, 1),
(4, 'Menu', 'adm/menu', 'fas fa-align-justify', '3', 1, 1),
(7, 'Access Grup', 'adm/access', 'fas fa-align-left', '5', 1, 1),
(101, 'Dashboard', 'adm/dash', 'fas fa-tachometer-alt', '1', 1, 1),
(105, 'Data Login', 'adm/log', 'fas fa-sign-in-alt', '19', 1, 1),
(2, 'Mailling', 'adm/pesan', 'far fa-paper-plane', '1', 1, 1),
(3, 'Usulan Surat', 'adm/pesan/us', 'fa fa-car', '1', 1, 1),
(5, 'My Team Mail', 'adm/pesan/myteam', 'fa fa-envelope', '1', 1, 1);

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
(5, 7),
(5, 101),
(5, 105),
(5, 0),
(2, 101),
(2, 2),
(2, 3),
(2, 5),
(3, 101),
(3, 2),
(3, 3),
(3, 5),
(1, 101),
(1, 2),
(1, 5),
(4, 1),
(4, 101),
(4, 2),
(4, 3),
(4, 5);

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
-- Table structure for table `otp`
--

CREATE TABLE `otp` (
  `id_otp` int(15) NOT NULL,
  `npp` varchar(10) NOT NULL,
  `otp` varchar(5) NOT NULL,
  `created_otp` datetime NOT NULL,
  `is_used` varchar(1) NOT NULL,
  `updated_otp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `otp`
--

INSERT INTO `otp` (`id_otp`, `npp`, `otp`, `created_otp`, `is_used`, `updated_otp`) VALUES
(1, 'P092043', '2999', '2021-01-10 12:38:12', '0', '0000-00-00 00:00:00'),
(2, 'P092043', '8696', '2021-01-10 12:39:53', '0', '0000-00-00 00:00:00'),
(3, 'P092043', '9129', '2021-01-10 12:42:03', '0', '0000-00-00 00:00:00'),
(4, 'P092043', '0221', '2021-01-10 12:50:34', '0', '0000-00-00 00:00:00'),
(5, 'P092043', '8098', '2021-01-10 12:54:39', '0', '0000-00-00 00:00:00'),
(6, 'P092043', '6573', '2021-01-10 14:00:20', '0', '0000-00-00 00:00:00'),
(7, 'P092043', '2559', '2021-01-10 14:00:42', '0', '0000-00-00 00:00:00'),
(8, 'P092043', '1545', '2021-01-10 14:04:56', '0', '0000-00-00 00:00:00'),
(9, 'P092043', '0431', '2021-01-10 14:06:24', '0', '0000-00-00 00:00:00'),
(10, 'P092043', '7583', '2021-01-10 14:06:43', '0', '0000-00-00 00:00:00'),
(11, 'P092043', '9817', '2021-01-10 14:06:58', '0', '0000-00-00 00:00:00'),
(12, 'P092043', '1622', '2021-01-10 14:07:35', '0', '0000-00-00 00:00:00'),
(13, 'P092043', '1210', '2021-01-10 14:07:46', '0', '0000-00-00 00:00:00'),
(14, 'P092043', '3092', '2021-01-10 14:07:52', '0', '0000-00-00 00:00:00'),
(15, 'P092043', '3862', '2021-01-10 14:08:35', '0', '0000-00-00 00:00:00'),
(16, 'P092043', '5354', '2021-01-10 14:10:36', '0', '0000-00-00 00:00:00'),
(17, 'P092043', '4560', '2021-01-10 14:15:59', '0', '0000-00-00 00:00:00'),
(18, 'P092043', '2930', '2021-01-10 14:17:19', '0', '0000-00-00 00:00:00'),
(19, 'P092043', '3318', '2021-01-10 14:24:56', '0', '0000-00-00 00:00:00'),
(20, 'P092043', '6722', '2021-01-10 14:26:29', '0', '0000-00-00 00:00:00'),
(21, 'P092043', '9243', '2021-01-10 14:27:02', '0', '0000-00-00 00:00:00'),
(22, 'P092043', '5769', '2021-01-10 14:27:33', '0', '0000-00-00 00:00:00'),
(23, 'P092043', '9228', '2021-01-10 14:28:03', '0', '0000-00-00 00:00:00'),
(24, 'P092043', '6365', '2021-01-10 14:29:09', '0', '0000-00-00 00:00:00'),
(25, 'P092043', '7206', '2021-01-10 14:33:36', '0', '0000-00-00 00:00:00'),
(26, 'P092043', '6564', '2021-01-10 14:34:53', '0', '0000-00-00 00:00:00'),
(27, 'P092043', '7660', '2021-01-10 14:51:28', '0', '0000-00-00 00:00:00'),
(28, 'P092043', '9608', '2021-01-10 14:52:17', '0', '0000-00-00 00:00:00'),
(29, 'P092043', '2037', '2021-01-11 09:36:38', '0', '0000-00-00 00:00:00'),
(30, 'P092043', '8410', '2021-01-11 10:47:45', '0', '0000-00-00 00:00:00'),
(31, 'P092043', '9835', '2021-01-11 11:11:24', '0', '0000-00-00 00:00:00'),
(32, 'P092043', '2760', '2021-01-11 11:12:46', '0', '0000-00-00 00:00:00'),
(33, 'P092043', '0260', '2021-01-11 11:22:04', '1', '2021-01-11 11:22:35'),
(34, 'P092043', '8962', '2021-01-11 11:23:11', '1', '2021-01-11 11:23:23'),
(35, 'P092043', '4595', '2021-01-11 11:24:57', '1', '2021-01-11 11:25:11'),
(36, 'P092043', '8210', '2021-01-11 11:26:11', '1', '2021-01-11 11:26:19'),
(37, 'P092043', '2267', '2021-01-11 11:27:00', '1', '2021-01-11 11:27:20'),
(38, 'P092043', '7254', '2021-01-11 11:27:36', '1', '2021-01-11 11:27:49'),
(39, 'P092043', '7204', '2021-01-11 15:16:16', '1', '2021-01-11 15:16:36'),
(40, 'P026296', '2620', '2021-01-11 15:21:30', '1', '2021-01-11 15:21:43'),
(41, '1111111', '7434', '2021-01-11 16:02:37', '0', '0000-00-00 00:00:00'),
(42, '1111111', '2222', '2021-01-11 16:02:58', '1', '2021-01-11 16:03:07'),
(43, 'P092043', '5930', '2021-01-12 09:29:46', '0', '0000-00-00 00:00:00'),
(44, 'P092043', '4071', '2021-01-12 09:31:02', '0', '0000-00-00 00:00:00'),
(45, 'P092043', '4586', '2021-01-12 09:32:25', '0', '0000-00-00 00:00:00'),
(46, 'P092043', '2917', '2021-01-12 09:32:37', '0', '0000-00-00 00:00:00'),
(47, 'P092043', '1174', '2021-01-12 10:00:55', '0', '0000-00-00 00:00:00'),
(48, 'P092043', '0178', '2021-01-12 10:01:24', '0', '0000-00-00 00:00:00'),
(49, 'P092043', '1960', '2021-01-12 10:52:00', '0', '0000-00-00 00:00:00'),
(50, 'P092043', '5349', '2021-01-12 10:55:51', '0', '0000-00-00 00:00:00'),
(51, 'P092043', '9505', '2021-01-12 11:02:25', '0', '0000-00-00 00:00:00'),
(52, 'P092043', '0072', '2021-01-12 11:14:27', '1', '2021-01-12 11:14:58'),
(53, 'P092043', '7921', '2021-01-12 14:34:30', '1', '2021-01-12 14:34:45'),
(54, 'P092043', '5225', '2021-01-13 14:32:35', '1', '2021-01-13 14:32:44'),
(55, 'P092043', '0691', '2021-01-13 23:54:08', '1', '2021-01-13 23:54:25'),
(56, 'P092043', '8208', '2021-01-14 08:23:47', '1', '2021-01-14 08:24:01'),
(57, 'ADMINKU', '9285', '2021-01-14 09:26:10', '1', '2021-01-14 09:26:25'),
(58, 'P092043', '3780', '2021-01-14 10:35:20', '1', '2021-01-14 10:35:48'),
(59, 'P092043', '1618', '2021-01-14 10:41:48', '1', '2021-01-14 10:41:55'),
(60, 'P092043', '5858', '2021-01-14 10:47:05', '1', '2021-01-14 10:47:21'),
(61, 'P092043', '6526', '2021-01-14 20:19:16', '1', '2021-01-14 20:19:23'),
(62, 'P092043', '2007', '2021-01-14 20:57:34', '1', '2021-01-14 20:57:39'),
(63, 'P092043', '4779', '2021-01-15 09:09:35', '1', '2021-01-15 09:09:41'),
(64, 'ADMINKU', '4397', '2021-01-15 13:33:13', '1', '2021-01-15 13:34:14'),
(65, '1234567', '4162', '2021-01-15 13:42:18', '1', '2021-01-15 13:42:26'),
(66, 'ADMINKU', '0758', '2021-01-15 14:12:43', '1', '2021-01-15 14:12:50'),
(67, 'P092043', '1078', '2021-01-15 14:13:26', '1', '2021-01-15 14:13:31'),
(68, 'ADMINKU', '3781', '2021-01-15 14:19:18', '1', '2021-01-15 14:19:24'),
(69, '1234567', '8778', '2021-01-15 14:56:35', '1', '2021-01-15 14:56:44'),
(70, 'OKTA123', '1117', '2021-01-15 15:41:23', '1', '2021-01-15 15:41:32'),
(71, 'DARMA12', '8440', '2021-01-15 15:58:01', '1', '2021-01-15 15:58:11'),
(72, 'P026296', '5123', '2021-01-15 16:02:38', '1', '2021-01-15 16:02:48'),
(73, 'ADMINKU', '0271', '2021-01-15 21:24:54', '1', '2021-01-15 21:25:06'),
(74, 'P092043', '0890', '2021-01-15 21:26:12', '1', '2021-01-15 21:30:25'),
(75, 'FADHLAN', '8724', '2021-01-15 22:15:50', '1', '2021-01-15 22:16:00'),
(76, '1234567', '8777', '2021-01-15 23:50:08', '1', '2021-01-15 23:50:27'),
(77, 'ADMINKU', '3762', '2021-01-15 23:50:53', '1', '2021-01-15 23:50:59'),
(78, 'DARMA12', '5877', '2021-01-15 23:58:34', '1', '2021-01-15 23:59:34'),
(79, 'ADMINKU', '5193', '2021-01-17 14:24:26', '0', '0000-00-00 00:00:00'),
(80, 'ADMINKU', '2587', '2021-01-17 14:27:12', '1', '2021-01-17 14:27:22'),
(81, 'P092043', '7741', '2021-01-17 14:27:44', '1', '2021-01-17 14:27:52'),
(82, 'P026296', '8206', '2021-01-17 14:28:08', '1', '2021-01-17 14:28:16'),
(83, 'P092043', '5982', '2021-01-17 20:24:08', '1', '2021-01-17 20:24:25'),
(84, 'P092043', '1701', '2021-01-17 20:24:51', '0', '0000-00-00 00:00:00'),
(85, 'P026296', '0662', '2021-01-17 20:25:43', '1', '2021-01-17 20:26:11'),
(86, 'P026296', '3649', '2021-01-17 20:48:11', '0', '0000-00-00 00:00:00'),
(87, 'P026296', '7702', '2021-01-17 20:48:11', '1', '2021-01-17 20:48:19'),
(88, 'P092043', '6413', '2021-01-17 20:52:17', '1', '2021-01-17 20:52:29'),
(89, 'P026296', '3416', '2021-01-18 11:45:23', '1', '2021-01-18 11:46:06'),
(90, 'P092043', '9859', '2021-01-18 11:47:18', '1', '2021-01-18 11:47:40'),
(91, '1234567', '9613', '2021-01-18 11:53:33', '1', '2021-01-18 11:53:57'),
(92, 'P026296', '0318', '2021-01-18 13:15:27', '1', '2021-01-18 13:16:24'),
(93, 'P092043', '5268', '2021-01-18 13:16:34', '1', '2021-01-18 13:17:00');

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
  `otp` varchar(5) NOT NULL,
  `last_login` datetime NOT NULL,
  `active` int(2) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `npp`, `nama`, `no_wa`, `id_kelompok`, `id_jabatan`, `otp`, `last_login`, `active`, `created_date`) VALUES
(15, 'P026296', 'Elreza Hardian', '6282258309804', 1, 2, '0318', '0000-00-00 00:00:00', 0, '2021-01-08 00:00:00'),
(14, 'P000000', 'Triana Rachmayanti', '628993772788', 1, 1, '', '0000-00-00 00:00:00', 0, '2021-01-08 00:00:00'),
(69, 'FADHLAN', 'M Fadhlan Satria', '6283875758003', 1, 3, '8724', '0000-00-00 00:00:00', 0, '2021-01-15 00:00:00'),
(64, 'P092043', 'Nur Muhammad Syafei', '6283875758003', 1, 1, '5268', '0000-00-00 00:00:00', 0, '2021-01-10 00:00:00'),
(65, 'adminku', 'Admin DGS', '6283875758003', 1, 5, '2587', '0000-00-00 00:00:00', 0, '2021-01-11 00:00:00'),
(66, '1234567', 'fei AVP', '6282258309804', 1, 4, '9613', '0000-00-00 00:00:00', 0, '2021-01-15 00:00:00'),
(67, 'OKTA123', 'Okta SCO', '6283875758003', 4, 1, '1117', '0000-00-00 00:00:00', 0, '2021-01-15 00:00:00'),
(68, 'DARMA12', 'Dharma SCO', '6282258309804', 4, 4, '5877', '0000-00-00 00:00:00', 0, '2021-01-15 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `id_surat` int(15) NOT NULL,
  `jenis_surat` varchar(20) NOT NULL,
  `nomor_surat` varchar(15) NOT NULL,
  `perihal_surat` varchar(255) NOT NULL,
  `isi_surat` text NOT NULL,
  `file_surat` text NOT NULL,
  `file_lampiran` text NOT NULL,
  `npp_pembuat` varchar(7) NOT NULL,
  `npp_approver` varchar(7) NOT NULL,
  `id_kelompok_pembuat` varchar(10) NOT NULL,
  `id_kelompok_tujuan` int(15) NOT NULL,
  `tahap_approve` varchar(2) NOT NULL,
  `disetujui_oleh` varchar(7) NOT NULL,
  `terbaca` varchar(2) NOT NULL,
  `tgl_buat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surat`
--

INSERT INTO `surat` (`id_surat`, `jenis_surat`, `nomor_surat`, `perihal_surat`, `isi_surat`, `file_surat`, `file_lampiran`, `npp_pembuat`, `npp_approver`, `id_kelompok_pembuat`, `id_kelompok_tujuan`, `tahap_approve`, `disetujui_oleh`, `terbaca`, `tgl_buat`) VALUES
(1, 'NOTIN', 'DGS/12.3/', 'notin', 'segera proses', 'P092043_210118021059.pdf', '', 'P092043', '', '1', 3, '', '', '0', '2021-01-18 14:10:59');

-- --------------------------------------------------------

--
-- Table structure for table `validator`
--

CREATE TABLE `validator` (
  `id_validator` int(15) NOT NULL,
  `id_surat` varchar(15) NOT NULL,
  `npp` varchar(7) NOT NULL,
  `masukan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approver`
--
ALTER TABLE `approver`
  ADD PRIMARY KEY (`id_approver`);

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
-- Indexes for table `otp`
--
ALTER TABLE `otp`
  ADD PRIMARY KEY (`id_otp`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `validator`
--
ALTER TABLE `validator`
  ADD PRIMARY KEY (`id_validator`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `approver`
--
ALTER TABLE `approver`
  MODIFY `id_approver` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_divisi` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `kelompok`
--
ALTER TABLE `kelompok`
  MODIFY `id_kelompok` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `otp`
--
ALTER TABLE `otp`
  MODIFY `id_otp` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `validator`
--
ALTER TABLE `validator`
  MODIFY `id_validator` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
