-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Agu 2020 pada 07.10
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `markir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_jenis_kendaraan`
--

CREATE TABLE `ref_jenis_kendaraan` (
  `id_ref_kendaraan` int(10) NOT NULL,
  `jenis_kendaraan` varchar(50) NOT NULL,
  `biaya_per_jam` int(11) NOT NULL DEFAULT 2000,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ref_jenis_kendaraan`
--

INSERT INTO `ref_jenis_kendaraan` (`id_ref_kendaraan`, `jenis_kendaraan`, `biaya_per_jam`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'SPD-MTR', 1000, '2020-08-12 21:23:48', '2020-08-12 21:23:48', NULL),
(2, 'MBL-MBL', 2000, '2020-08-12 21:23:48', '2020-08-12 21:23:48', NULL),
(3, 'TRUK', 5000, '2020-08-12 21:23:48', '2020-08-12 21:23:48', NULL),
(4, 'Bis', 2000, '2020-08-12 21:23:48', '2020-08-12 21:23:48', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_merk`
--

CREATE TABLE `ref_merk` (
  `id_merk` int(10) NOT NULL,
  `merk` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ref_merk`
--

INSERT INTO `ref_merk` (`id_merk`, `merk`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Honda', '2020-08-12 21:23:52', '2020-08-12 21:23:52', NULL),
(2, 'Yamaha', '2020-08-12 21:23:52', '2020-08-12 21:23:52', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_model_kendaraan`
--

CREATE TABLE `ref_model_kendaraan` (
  `id_model` int(10) NOT NULL,
  `model` varchar(50) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ref_model_kendaraan`
--

INSERT INTO `ref_model_kendaraan` (`id_model`, `model`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Metic', NULL, '2020-08-12 21:23:57', '2020-08-12 21:23:57'),
(4, 'Gigi', NULL, '2020-08-12 21:23:57', '2020-08-12 21:23:57'),
(5, 'Kopling', NULL, '2020-08-12 21:23:57', '2020-08-12 21:23:57');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `showdetailkendaraanparkir`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `showdetailkendaraanparkir` (
`id_parkir` int(10)
,`tgl_masuk` datetime
,`stat_parkir` enum('Parkir','Sudah')
,`lat` text
,`lng` text
,`id_kendaraan` int(10)
,`username` int(11)
,`noRegistrasi` varchar(50)
,`namaPemilik` varchar(50)
,`alamat` varchar(50)
,`seri` varchar(50)
,`warna` varchar(50)
,`foto` text
,`tahunPembuatan` int(11)
,`no_seri_alat` varchar(50)
,`status` enum('Y','N')
,`jenis_kendaraan` varchar(50)
,`biaya_per_jam` int(11)
,`nama` varchar(50)
,`no_hp` varchar(50)
,`email` varchar(50)
,`foto_jukir` text
,`model` varchar(50)
,`merk` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `showriwayatparkir`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `showriwayatparkir` (
`NamaJukir` varchar(50)
,`no_hp` varchar(50)
,`fotoJukir` text
,`tgl_keluar` timestamp
,`username` varchar(50)
,`IDJUKIR` int(11)
,`id_parkir` int(10)
,`jukir_masuk` int(11)
,`id_kendaraan` int(10)
,`tgl_masuk` datetime
,`stat_parkir` enum('Parkir','Sudah')
,`lat` text
,`lng` text
,`noRegistrasi` varchar(50)
,`namaPemilik` varchar(50)
,`alamat` varchar(50)
,`seri` varchar(50)
,`warna` varchar(50)
,`foto` text
,`tahunPembuatan` int(11)
,`jenis_kendaraan` varchar(50)
,`biaya_per_jam` int(11)
,`merk` varchar(50)
,`model` varchar(50)
,`biaya_parkir` varchar(50)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `username`, `password`, `nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, NULL, NULL, '2020-08-12 21:25:01', '2020-08-12 21:25:01', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_parkir`
--

CREATE TABLE `tb_parkir` (
  `id_parkir` int(10) NOT NULL,
  `id_kendaraan` int(10) NOT NULL,
  `jukir` int(11) NOT NULL,
  `tgl_masuk` datetime NOT NULL,
  `stat_parkir` enum('Parkir','Sudah') NOT NULL DEFAULT 'Parkir',
  `lat` text DEFAULT NULL,
  `lng` text DEFAULT NULL,
  `tgl_keluar` timestamp NULL DEFAULT NULL,
  `biaya_parkir` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_parkir`
--

INSERT INTO `tb_parkir` (`id_parkir`, `id_kendaraan`, `jukir`, `tgl_masuk`, `stat_parkir`, `lat`, `lng`, `tgl_keluar`, `biaya_parkir`, `created_at`, `updated_at`, `deleted_at`) VALUES
(35, 26, 8, '2020-08-13 05:09:24', 'Sudah', '-0.4830507258551666', '117.12564574459903', '2020-08-12 21:09:40', '0', '2020-08-12 21:23:39', '2020-08-12 21:23:39', NULL),
(36, 26, 7, '2020-08-13 05:10:14', 'Sudah', '-0.4828917162243908', '117.12641822079532', '2020-08-12 21:18:31', '0', '2020-08-12 21:23:39', '2020-08-12 21:23:39', NULL),
(37, 27, 7, '2020-08-13 05:19:26', 'Sudah', '-0.49370599021500333', '117.12813483456485', '2020-08-12 21:20:04', '0', '2020-08-12 21:23:39', '2020-08-12 21:23:39', NULL),
(38, 26, 7, '2020-08-26 00:37:13', 'Sudah', '-0.4852948897225653', '117.12534533718936', '2020-08-25 16:48:18', '0', '2020-08-25 16:37:13', '2020-08-25 16:48:18', NULL),
(39, 26, 7, '2020-08-26 00:48:26', 'Sudah', '-0.4844504236322594', '117.12714778164737', '2020-08-25 16:54:12', '0', '2020-08-25 16:48:26', '2020-08-25 16:54:12', NULL),
(40, 26, 7, '2020-08-26 00:54:19', 'Sudah', '-0.4844504236322594', '117.12714778164737', '2020-08-25 16:54:22', '0', '2020-08-25 16:54:19', '2020-08-25 16:54:22', NULL);

--
-- Trigger `tb_parkir`
--
DELIMITER $$
CREATE TRIGGER `autoSetStatKendaraan` AFTER INSERT ON `tb_parkir` FOR EACH ROW BEGIN
UPDATE user_kendaraan
SET user_kendaraan.stat_parkir = 'Y'
WHERE user_kendaraan.id_kendaraan = NEW.id_kendaraan;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tb_parkir_after_update` AFTER UPDATE ON `tb_parkir` FOR EACH ROW BEGIN
UPDATE user_kendaraan
SET user_kendaraan.stat_parkir = "N"
WHERE user_kendaraan.id_kendaraan = NEW.id_kendaraan;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_akun`
--

CREATE TABLE `user_akun` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_akun`
--

INSERT INTO `user_akun` (`id`, `username`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'ndahsnty_', '$2y$10$rBl1MTe4F2a32eiwbBKFQetAi5Ob0xQcIn8l1JMAWOQSBdMQ5FgZa', '2020-08-12 20:56:05', '2020-08-12 20:56:06', NULL),
(8, 'akishino', '$2y$10$8HyEPhvf496GdG5nKFlcwe6QEh75O/jyaFpHQ4u0Ozf/s9xiA3Wui', '2020-08-17 08:07:26', '2020-08-17 08:07:26', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_biodata`
--

CREATE TABLE `user_biodata` (
  `id_biodata` int(10) NOT NULL,
  `username` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `no_hp` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `foto` text DEFAULT 'none.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_biodata`
--

INSERT INTO `user_biodata` (`id_biodata`, `username`, `nama`, `tgl_lahir`, `no_hp`, `email`, `foto`) VALUES
(9, 4, 'Indah Noordiana Santyy', '2020-08-13', '085828949395', '', 'none.jpg'),
(11, 8, 'Eko Pujianto', NULL, '085828949395', NULL, 'CamScanner 08-10-2020 20.39.16_1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_jukir`
--

CREATE TABLE `user_jukir` (
  `id` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text DEFAULT NULL,
  `no_seri_alat` varchar(50) DEFAULT NULL,
  `status` enum('Y','N') DEFAULT 'N',
  `pendapatan_total` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_jukir`
--

INSERT INTO `user_jukir` (`id`, `id_admin`, `username`, `password`, `no_seri_alat`, `status`, `pendapatan_total`, `deleted_at`, `created_at`, `updated_at`) VALUES
(7, 1, 'akishino', '$2y$10$kwo0swdynhSZEpFtonA0bOaAVj04c0OkUhx6INMPg8iFgvMcP2Kkq', '080317', 'Y', NULL, '2020-08-12 12:43:31', '2020-08-12 21:24:10', '2020-08-25 16:38:25'),
(8, 1, 'ndahsnty_', '$2y$10$6HEe3M.qQCqmVmI62EVg3uMofNjCtKCKNGsFbhq4g3icHPzjCl6ri', NULL, 'Y', NULL, NULL, '2020-08-12 21:24:10', '2020-08-12 21:25:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_jukir_biodata`
--

CREATE TABLE `user_jukir_biodata` (
  `id` int(10) NOT NULL,
  `id_jukir` int(10) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `no_hp` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `foto` text DEFAULT 'none.jpg',
  `foto_ktp` text DEFAULT 'none.jpg',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_jukir_biodata`
--

INSERT INTO `user_jukir_biodata` (`id`, `id_jukir`, `nama`, `no_hp`, `email`, `foto`, `foto_ktp`, `deleted_at`) VALUES
(10, 7, 'Eko Pujianto', '085828949395', 'ekopujianto48@gmail.com', '1597261234.jpg', '1597261234.jpg', NULL),
(11, 8, 'Indah Noordiana Santy', '085828949395', NULL, '1597261699.jpg', '1597261699.jpg', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_jukir_riwayat`
--

CREATE TABLE `user_jukir_riwayat` (
  `id` int(11) NOT NULL,
  `id_jukir` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `status` enum('Pemasukan','Penarikan') DEFAULT 'Pemasukan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_kendaraan`
--

CREATE TABLE `user_kendaraan` (
  `id_kendaraan` int(10) NOT NULL,
  `username` int(11) NOT NULL,
  `jenis_kendaraan` int(11) NOT NULL,
  `noRegistrasi` varchar(50) DEFAULT NULL,
  `namaPemilik` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `merk` int(11) NOT NULL,
  `seri` varchar(50) NOT NULL,
  `model` int(11) DEFAULT NULL,
  `warna` varchar(50) DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `tahunPembuatan` int(11) DEFAULT NULL,
  `stat_parkir` enum('Y','N') DEFAULT 'N',
  `lat` text DEFAULT NULL,
  `lng` text DEFAULT NULL,
  `no_alat` text DEFAULT NULL,
  `lokasi_terakhir` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_kendaraan`
--

INSERT INTO `user_kendaraan` (`id_kendaraan`, `username`, `jenis_kendaraan`, `noRegistrasi`, `namaPemilik`, `alamat`, `merk`, `seri`, `model`, `warna`, `foto`, `tahunPembuatan`, `stat_parkir`, `lat`, `lng`, `no_alat`, `lokasi_terakhir`, `created_at`, `updated_at`, `deleted_at`) VALUES
(26, 4, 1, 'KT 5155 I', 'Eko Pujianto', 'Suryanata', 1, 'CBR', 1, 'Hitam', '1595231953.jpg', 2020, 'N', '-0.49105772657978014', '117.11749182919375', '1341492250', '2020-08-13 05:22:15', '2020-08-12 21:01:38', '2020-08-12 21:01:38', NULL),
(27, 4, 2, 'KT 878 E', 'Indah', 'suryanata', 1, 'CBR', 4, 'Kuning', 'honda-brio-front-angle-low-view-753743.jpg', 2009, 'N', NULL, NULL, NULL, NULL, '2020-08-12 21:19:15', '2020-08-12 21:19:15', NULL);

-- --------------------------------------------------------

--
-- Struktur untuk view `showdetailkendaraanparkir`
--
DROP TABLE IF EXISTS `showdetailkendaraanparkir`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `showdetailkendaraanparkir`  AS  select `tb_parkir`.`id_parkir` AS `id_parkir`,`tb_parkir`.`tgl_masuk` AS `tgl_masuk`,`tb_parkir`.`stat_parkir` AS `stat_parkir`,`tb_parkir`.`lat` AS `lat`,`tb_parkir`.`lng` AS `lng`,`user_kendaraan`.`id_kendaraan` AS `id_kendaraan`,`user_kendaraan`.`username` AS `username`,`user_kendaraan`.`noRegistrasi` AS `noRegistrasi`,`user_kendaraan`.`namaPemilik` AS `namaPemilik`,`user_kendaraan`.`alamat` AS `alamat`,`user_kendaraan`.`seri` AS `seri`,`user_kendaraan`.`warna` AS `warna`,`user_kendaraan`.`foto` AS `foto`,`user_kendaraan`.`tahunPembuatan` AS `tahunPembuatan`,`user_jukir`.`no_seri_alat` AS `no_seri_alat`,`user_jukir`.`status` AS `status`,`ref_jenis_kendaraan`.`jenis_kendaraan` AS `jenis_kendaraan`,`ref_jenis_kendaraan`.`biaya_per_jam` AS `biaya_per_jam`,`user_jukir_biodata`.`nama` AS `nama`,`user_jukir_biodata`.`no_hp` AS `no_hp`,`user_jukir_biodata`.`email` AS `email`,`user_jukir_biodata`.`foto` AS `foto_jukir`,`ref_model_kendaraan`.`model` AS `model`,`ref_merk`.`merk` AS `merk` from ((((((`tb_parkir` join `user_kendaraan`) join `user_jukir`) join `ref_jenis_kendaraan`) join `user_jukir_biodata`) join `ref_model_kendaraan`) join `ref_merk`) where `tb_parkir`.`id_kendaraan` = `user_kendaraan`.`id_kendaraan` and `tb_parkir`.`stat_parkir` = 'Parkir' and `user_jukir`.`id` = `tb_parkir`.`jukir` and `ref_jenis_kendaraan`.`id_ref_kendaraan` = `user_kendaraan`.`jenis_kendaraan` and `user_jukir`.`id` = `user_jukir_biodata`.`id_jukir` and `ref_merk`.`id_merk` = `user_kendaraan`.`merk` and `ref_model_kendaraan`.`id_model` = `user_kendaraan`.`model` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `showriwayatparkir`
--
DROP TABLE IF EXISTS `showriwayatparkir`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `showriwayatparkir`  AS  select `user_jukir_biodata`.`nama` AS `NamaJukir`,`user_jukir_biodata`.`no_hp` AS `no_hp`,`user_jukir_biodata`.`foto` AS `fotoJukir`,`tb_parkir`.`tgl_keluar` AS `tgl_keluar`,`user_akun`.`username` AS `username`,`user_akun`.`id` AS `IDJUKIR`,`tb_parkir`.`id_parkir` AS `id_parkir`,`tb_parkir`.`jukir` AS `jukir_masuk`,`tb_parkir`.`id_kendaraan` AS `id_kendaraan`,`tb_parkir`.`tgl_masuk` AS `tgl_masuk`,`tb_parkir`.`stat_parkir` AS `stat_parkir`,`tb_parkir`.`lat` AS `lat`,`tb_parkir`.`lng` AS `lng`,`user_kendaraan`.`noRegistrasi` AS `noRegistrasi`,`user_kendaraan`.`namaPemilik` AS `namaPemilik`,`user_kendaraan`.`alamat` AS `alamat`,`user_kendaraan`.`seri` AS `seri`,`user_kendaraan`.`warna` AS `warna`,`user_kendaraan`.`foto` AS `foto`,`user_kendaraan`.`tahunPembuatan` AS `tahunPembuatan`,`ref_jenis_kendaraan`.`jenis_kendaraan` AS `jenis_kendaraan`,`ref_jenis_kendaraan`.`biaya_per_jam` AS `biaya_per_jam`,`ref_merk`.`merk` AS `merk`,`ref_model_kendaraan`.`model` AS `model`,`tb_parkir`.`biaya_parkir` AS `biaya_parkir` from (((((((`ref_merk` join `ref_model_kendaraan`) join `user_akun`) join `user_kendaraan`) join `tb_parkir`) join `user_jukir`) join `user_jukir_biodata`) join `ref_jenis_kendaraan`) where `user_kendaraan`.`username` = `user_akun`.`id` and `user_kendaraan`.`id_kendaraan` = `tb_parkir`.`id_kendaraan` and `user_jukir`.`id` = `user_jukir_biodata`.`id_jukir` and `user_jukir`.`id` = `tb_parkir`.`jukir` and `user_kendaraan`.`merk` = `ref_merk`.`id_merk` and `user_kendaraan`.`model` = `ref_model_kendaraan`.`id_model` and `user_kendaraan`.`jenis_kendaraan` = `ref_jenis_kendaraan`.`id_ref_kendaraan` and `tb_parkir`.`stat_parkir` = 'Sudah' ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ref_jenis_kendaraan`
--
ALTER TABLE `ref_jenis_kendaraan`
  ADD PRIMARY KEY (`id_ref_kendaraan`);

--
-- Indeks untuk tabel `ref_merk`
--
ALTER TABLE `ref_merk`
  ADD PRIMARY KEY (`id_merk`);

--
-- Indeks untuk tabel `ref_model_kendaraan`
--
ALTER TABLE `ref_model_kendaraan`
  ADD PRIMARY KEY (`id_model`);

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_parkir`
--
ALTER TABLE `tb_parkir`
  ADD PRIMARY KEY (`id_parkir`) USING BTREE,
  ADD KEY `FK_tb_parkir_user_jukir` (`jukir`),
  ADD KEY `FK_tb_parkir_user_kendaraan` (`id_kendaraan`);

--
-- Indeks untuk tabel `user_akun`
--
ALTER TABLE `user_akun`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_biodata`
--
ALTER TABLE `user_biodata`
  ADD PRIMARY KEY (`id_biodata`),
  ADD KEY `FK_user_biodata_user_akun` (`username`);

--
-- Indeks untuk tabel `user_jukir`
--
ALTER TABLE `user_jukir`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_user_jukir_tb_admin` (`id_admin`);

--
-- Indeks untuk tabel `user_jukir_biodata`
--
ALTER TABLE `user_jukir_biodata`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_user_jukir_biodata_user_jukir` (`id_jukir`);

--
-- Indeks untuk tabel `user_jukir_riwayat`
--
ALTER TABLE `user_jukir_riwayat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_user_jukir_riwayat_user_jukir` (`id_jukir`);

--
-- Indeks untuk tabel `user_kendaraan`
--
ALTER TABLE `user_kendaraan`
  ADD PRIMARY KEY (`id_kendaraan`),
  ADD KEY `FK_user_kendaraan_ref_info_kendaraan` (`jenis_kendaraan`),
  ADD KEY `FK_user_kendaraan_ref_model_kendaraan` (`model`),
  ADD KEY `FK_user_kendaraan_ref_merk` (`merk`),
  ADD KEY `FK_user_kendaraan_user_akun` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `ref_jenis_kendaraan`
--
ALTER TABLE `ref_jenis_kendaraan`
  MODIFY `id_ref_kendaraan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `ref_merk`
--
ALTER TABLE `ref_merk`
  MODIFY `id_merk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `ref_model_kendaraan`
--
ALTER TABLE `ref_model_kendaraan`
  MODIFY `id_model` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_parkir`
--
ALTER TABLE `tb_parkir`
  MODIFY `id_parkir` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `user_akun`
--
ALTER TABLE `user_akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user_biodata`
--
ALTER TABLE `user_biodata`
  MODIFY `id_biodata` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user_jukir`
--
ALTER TABLE `user_jukir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user_jukir_biodata`
--
ALTER TABLE `user_jukir_biodata`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user_jukir_riwayat`
--
ALTER TABLE `user_jukir_riwayat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user_kendaraan`
--
ALTER TABLE `user_kendaraan`
  MODIFY `id_kendaraan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_parkir`
--
ALTER TABLE `tb_parkir`
  ADD CONSTRAINT `FK_tb_parkir_user_jukir` FOREIGN KEY (`jukir`) REFERENCES `user_jukir` (`id`),
  ADD CONSTRAINT `FK_tb_parkir_user_kendaraan` FOREIGN KEY (`id_kendaraan`) REFERENCES `user_kendaraan` (`id_kendaraan`);

--
-- Ketidakleluasaan untuk tabel `user_biodata`
--
ALTER TABLE `user_biodata`
  ADD CONSTRAINT `FK_user_biodata_user_akun` FOREIGN KEY (`username`) REFERENCES `user_akun` (`id`);

--
-- Ketidakleluasaan untuk tabel `user_jukir`
--
ALTER TABLE `user_jukir`
  ADD CONSTRAINT `FK_user_jukir_tb_admin` FOREIGN KEY (`id_admin`) REFERENCES `tb_admin` (`id`);

--
-- Ketidakleluasaan untuk tabel `user_jukir_biodata`
--
ALTER TABLE `user_jukir_biodata`
  ADD CONSTRAINT `FK_user_jukir_biodata_user_jukir` FOREIGN KEY (`id_jukir`) REFERENCES `user_jukir` (`id`);

--
-- Ketidakleluasaan untuk tabel `user_jukir_riwayat`
--
ALTER TABLE `user_jukir_riwayat`
  ADD CONSTRAINT `FK_user_jukir_riwayat_user_jukir` FOREIGN KEY (`id_jukir`) REFERENCES `user_jukir` (`id`);

--
-- Ketidakleluasaan untuk tabel `user_kendaraan`
--
ALTER TABLE `user_kendaraan`
  ADD CONSTRAINT `FK_user_kendaraan_ref_info_kendaraan` FOREIGN KEY (`jenis_kendaraan`) REFERENCES `ref_jenis_kendaraan` (`id_ref_kendaraan`),
  ADD CONSTRAINT `FK_user_kendaraan_ref_merk` FOREIGN KEY (`merk`) REFERENCES `ref_merk` (`id_merk`),
  ADD CONSTRAINT `FK_user_kendaraan_ref_model_kendaraan` FOREIGN KEY (`model`) REFERENCES `ref_model_kendaraan` (`id_model`),
  ADD CONSTRAINT `FK_user_kendaraan_user_akun` FOREIGN KEY (`username`) REFERENCES `user_akun` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
