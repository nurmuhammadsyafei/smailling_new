-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jan 2021 pada 00.27
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Struktur dari tabel `divisi`
--

CREATE TABLE `divisi` (
  `id_divisi` int(15) NOT NULL,
  `nama_divisi` varchar(255) NOT NULL,
  `detail_divisi` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `nama_divisi`, `detail_divisi`) VALUES
(1, 'SLN', 'Penjualan Konsumer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(15) NOT NULL,
  `nama_jabatan` varchar(255) NOT NULL,
  `detail_jabatan` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`, `detail_jabatan`) VALUES
(1, 'Asisten / Admin', 'Asisten / Admin'),
(2, 'AMGR', 'Asisten Manager'),
(3, 'MGR', 'Manager'),
(4, 'AVP', 'AVP'),
(5, 'ADGS', 'Admin DGS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelompok`
--

CREATE TABLE `kelompok` (
  `id_kelompok` int(15) NOT NULL,
  `nama_kelompok` varchar(255) NOT NULL,
  `detail_kelompok` varchar(255) NOT NULL,
  `id_divisi` int(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelompok`
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
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `level_id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`level_id`, `nama`) VALUES
(1, 'Pemimpin'),
(2, 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
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
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id`, `nama`, `link`, `icon`, `sort`, `level`, `access`) VALUES
(1, 'User Management', 'adm/user_mgt', 'fa-dashboard', '11', 1, 1),
(4, 'Menu', 'adm/menu', 'fa-server', '3', 1, 1),
(7, 'Access Grup', 'adm/access', 'fa-file-text-o', '5', 1, 1),
(101, 'Dashboard', 'adm/dash', 'fa-dashboard', '1', 1, 1),
(105, 'Data Login', 'adm/log', 'fa-lock', '19', 1, 1),
(0, 'Mailling', 'adm/pesan', 'fa-envelope', '1', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_access`
--

CREATE TABLE `menu_access` (
  `id_grup` int(11) NOT NULL,
  `id_menu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `menu_access`
--

INSERT INTO `menu_access` (`id_grup`, `id_menu`) VALUES
(5, 1),
(5, 4),
(5, 7),
(5, 101),
(5, 105),
(5, 0),
(1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_grup`
--

CREATE TABLE `menu_grup` (
  `id_grup` int(11) NOT NULL,
  `nama_grup` varchar(50) NOT NULL,
  `desc_grup` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `menu_grup`
--

INSERT INTO `menu_grup` (`id_grup`, `nama_grup`, `desc_grup`) VALUES
(1, 'Admin SPO', 'Big Admin'),
(2, 'Admin SGV', 'adminsgv'),
(8, 'Tele', 'Monitoring'),
(9, 'Guest', 'View');

-- --------------------------------------------------------

--
-- Struktur dari tabel `otp`
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
-- Dumping data untuk tabel `otp`
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
(42, '1111111', '2222', '2021-01-11 16:02:58', '1', '2021-01-11 16:03:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
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
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `npp`, `nama`, `no_wa`, `id_kelompok`, `id_jabatan`, `otp`, `last_login`, `active`, `created_date`) VALUES
(59, '3323132', '3323132', '3323132', 2, 1, '', '0000-00-00 00:00:00', 0, '2021-01-09 00:00:00'),
(15, 'P026296', 'Elreza Hardian', '6282258309804', 1, 4, '2620', '0000-00-00 00:00:00', 0, '2021-01-08 00:00:00'),
(14, 'P000000', 'Triana Rachmayanti', '628993772788', 1, 1, '', '0000-00-00 00:00:00', 0, '2021-01-08 00:00:00'),
(61, '3323132', '3323132', '3323132', 1, 1, '', '0000-00-00 00:00:00', 0, '2021-01-09 00:00:00'),
(60, '3323132', '3323132', '3323132', 1, 1, '', '0000-00-00 00:00:00', 0, '2021-01-09 00:00:00'),
(58, '4234324', '23423', '3243243424', 1, 1, '', '0000-00-00 00:00:00', 0, '2021-01-09 00:00:00'),
(57, '4223432', '344224', '34243', 2, 1, '', '0000-00-00 00:00:00', 0, '2021-01-09 00:00:00'),
(56, '3221313', '32113123', '321213123', 2, 1, '', '0000-00-00 00:00:00', 0, '2021-01-09 00:00:00'),
(55, '4324432', '324432', '4322', 1, 1, '', '0000-00-00 00:00:00', 0, '2021-01-09 00:00:00'),
(64, 'P092043', 'Nur Muhammad Syafei', '6283875758003', 1, 1, '7204', '0000-00-00 00:00:00', 0, '2021-01-10 00:00:00'),
(65, '1111111', 'Admin DGS', '6283875758003', 1, 5, '2222', '0000-00-00 00:00:00', 0, '2021-01-11 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat`
--

CREATE TABLE `surat` (
  `id_surat` int(15) NOT NULL,
  `judul_surat` varchar(255) NOT NULL,
  `perihal_surat` varchar(255) NOT NULL,
  `npp_tujuan` varchar(7) NOT NULL,
  `id_kelompok_tujuan` int(15) NOT NULL,
  `tahap_approve` varchar(2) NOT NULL,
  `disetujui_oleh` varchar(7) NOT NULL,
  `terbaca` varchar(2) NOT NULL,
  `npp_pemilik` varchar(7) NOT NULL,
  `tgl_buat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `surat`
--

INSERT INTO `surat` (`id_surat`, `judul_surat`, `perihal_surat`, `npp_tujuan`, `id_kelompok_tujuan`, `tahap_approve`, `disetujui_oleh`, `terbaca`, `npp_pemilik`, `tgl_buat`) VALUES
(1, 'Tes Judul', 'Notin Rembers Dimas', 'P092043', 3, '0', '', '0', 'p026296', '2021-01-11 12:11:26'),
(2, 'Tes Judul 2', 'Notin Telkom Sigma', 'p092043', 3, '0', '', '0', 'p026296', '2021-01-11 12:14:51'),
(3, 'Tes Judul 2', 'Notin Telkom Sigma', 'p092043', 3, '0', '0', '0', '', '0000-00-00 00:00:00'),
(4, 'Tes Judul', 'Notin Rembers Dimas', 'P092043', 3, '0', '', '0', 'p026296', '2021-01-11 12:11:26'),
(5, 'Tes Judul', 'Notin Rembers Dimas', 'P092043', 3, '0', '', '0', 'p026296', '2021-01-11 12:11:26'),
(6, 'Tes Judul', 'Notin Rembers Dimas', 'P092043', 3, '0', '', '0', 'p026296', '2021-01-11 12:11:26'),
(7, 'Tes Judul', 'Notin Rembers Dimas', 'P092043', 3, '0', '', '0', 'p026296', '2021-01-11 12:11:26'),
(8, 'Tes Judul', 'Notin Rembers Dimas', 'P092043', 3, '0', '', '0', 'p026296', '2021-01-11 12:11:26'),
(9, 'Tes Judul', 'Notin Rembers Dimas', 'P092043', 3, '0', '', '0', 'p026296', '2021-01-11 12:11:26'),
(10, 'Tes Judul', 'Notin Rembers Dimas', 'P092043', 3, '0', '', '0', 'p026296', '2021-01-11 12:11:26'),
(11, 'Tes Judul', 'Notin Rembers Dimas', 'P092043', 3, '0', '', '0', 'p026296', '2021-01-11 12:11:26'),
(12, 'Tes Judul', 'Notin Rembers Dimas', 'P092043', 3, '0', '', '0', 'p026296', '2021-01-11 12:11:26'),
(13, 'Tes Judul', 'Notin Rembers Dimas', 'P092043', 3, '0', '', '0', 'p026296', '2021-01-11 12:11:26'),
(14, 'Tes Judul', 'Notin Rembers Dimas', 'P092043', 3, '0', '', '0', 'p026296', '2021-01-11 12:11:26'),
(15, 'Tes Judul', 'Notin Rembers Dimas', 'P092043', 3, '0', '', '0', 'p026296', '2021-01-11 12:11:26'),
(16, 'Tes Judul', 'Notin Rembers Dimas', 'P092043', 3, '0', '', '0', 'p026296', '2021-01-11 12:11:26');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `kelompok`
--
ALTER TABLE `kelompok`
  ADD PRIMARY KEY (`id_kelompok`);

--
-- Indeks untuk tabel `otp`
--
ALTER TABLE `otp`
  ADD PRIMARY KEY (`id_otp`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id_surat`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_divisi` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kelompok`
--
ALTER TABLE `kelompok`
  MODIFY `id_kelompok` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `otp`
--
ALTER TABLE `otp`
  MODIFY `id_otp` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT untuk tabel `surat`
--
ALTER TABLE `surat`
  MODIFY `id_surat` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
