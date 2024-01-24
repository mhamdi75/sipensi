-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2023 at 11:01 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi_20_230_0075`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nip` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `nip`, `nama`, `created_at`, `updated_at`) VALUES
(8, '1', 'a', '2023-10-29 19:11:22', '2023-10-29 19:11:22'),
(12, '2', 'B', '2023-10-29 20:39:44', '2023-10-29 20:39:44');

-- --------------------------------------------------------

--
-- Table structure for table `guru_mapel`
--

CREATE TABLE `guru_mapel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `guru_id` bigint(20) NOT NULL,
  `mapel_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `guru_mapel`
--

INSERT INTO `guru_mapel` (`id`, `guru_id`, `mapel_id`, `created_at`, `updated_at`) VALUES
(1, 8, 1, '2023-10-29 19:11:22', '2023-10-29 19:11:22'),
(14, 12, 2, '2023-10-29 20:39:44', '2023-10-29 20:39:44'),
(15, 12, 3, '2023-10-29 20:39:44', '2023-10-29 20:39:44'),
(16, 12, 4, '2023-10-29 20:39:44', '2023-10-29 20:39:44');

-- --------------------------------------------------------

--
-- Table structure for table `guru_mapel_detail`
--

CREATE TABLE `guru_mapel_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `guru_mapel_id` bigint(20) NOT NULL,
  `kelas_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `guru_mapel_detail`
--

INSERT INTO `guru_mapel_detail` (`id`, `guru_mapel_id`, `kelas_id`, `created_at`, `updated_at`) VALUES
(4, 1, 3, '2023-10-29 21:30:50', '2023-10-29 21:30:50'),
(5, 14, 3, '2023-10-29 21:30:56', '2023-10-29 21:30:56'),
(8, 15, 3, '2023-11-01 21:07:02', '2023-11-01 21:07:02'),
(9, 14, 4, '2023-11-01 21:07:13', '2023-11-01 21:07:13'),
(10, 14, 5, '2023-11-01 21:07:19', '2023-11-01 21:07:19'),
(11, 16, 3, '2023-11-01 23:09:45', '2023-11-01 23:09:45');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_nilai`
--

CREATE TABLE `kategori_nilai` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kategori_nilai`
--

INSERT INTO `kategori_nilai` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'UTS S1', '2023-10-31 21:20:00', '2023-10-31 21:20:00'),
(2, 'UAS S1', '2023-10-31 21:20:07', '2023-10-31 21:20:07'),
(3, 'UTS S2', '2023-10-31 21:20:13', '2023-10-31 21:20:13'),
(4, 'UAS S2', '2023-10-31 21:20:21', '2023-10-31 21:20:21'),
(5, 'TUGAS', '2023-10-31 21:20:28', '2023-10-31 21:20:28');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(3, 'IPA 1A', '2023-10-27 21:00:52', '2023-10-27 21:00:52'),
(4, 'IPA 1B', '2023-10-27 21:00:58', '2023-10-27 21:01:05'),
(5, 'IPA 1C', '2023-10-27 21:01:11', '2023-10-27 21:01:11'),
(6, 'IPS 1A', '2023-10-27 21:01:17', '2023-10-27 21:01:17'),
(7, 'IPS 1B', '2023-10-27 21:01:22', '2023-10-27 21:01:22'),
(8, 'IPS 1C', '2023-10-27 21:01:30', '2023-10-27 21:01:30');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'MATEMATIKA', '2023-10-27 21:22:30', '2023-10-27 21:22:30'),
(2, 'BAHASA INDONESIA', '2023-10-27 21:22:39', '2023-10-27 21:22:39'),
(3, 'BAHASA INGGRIS', '2023-10-27 21:22:56', '2023-10-27 21:23:28'),
(4, 'BAHASA JAWA', '2023-10-27 21:23:34', '2023-10-27 21:23:34'),
(5, 'IPA', '2023-10-27 21:23:39', '2023-10-27 21:23:39'),
(6, 'IPS', '2023-10-27 21:23:43', '2023-10-27 21:23:43'),
(7, 'PKN', '2023-10-27 21:23:48', '2023-10-27 21:23:48'),
(8, 'PENJAS ORKER', '2023-10-27 21:23:57', '2023-10-27 21:24:16'),
(9, 'FISIKA', '2023-10-27 21:24:09', '2023-10-27 21:24:09');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(21, '2023-10-26-012552', 'App\\Database\\Migrations\\Pengguna', 'default', 'App', 1698298308, 1),
(22, '2023-10-26-014442', 'App\\Database\\Migrations\\Kelas', 'default', 'App', 1698298308, 1),
(23, '2023-10-26-014452', 'App\\Database\\Migrations\\Guru', 'default', 'App', 1698298308, 1),
(24, '2023-10-26-014510', 'App\\Database\\Migrations\\Mapel', 'default', 'App', 1698298308, 1),
(25, '2023-10-26-014518', 'App\\Database\\Migrations\\TahunAjaran', 'default', 'App', 1698298309, 1),
(26, '2023-10-26-014554', 'App\\Database\\Migrations\\Siswa', 'default', 'App', 1698298309, 1),
(27, '2023-10-26-014603', 'App\\Database\\Migrations\\KategoriNilai', 'default', 'App', 1698298309, 1),
(28, '2023-10-26-014757', 'App\\Database\\Migrations\\GuruMapel', 'default', 'App', 1698298309, 1),
(29, '2023-10-26-014810', 'App\\Database\\Migrations\\TahunAjaranDetail', 'default', 'App', 1698298309, 1),
(30, '2023-10-26-014819', 'App\\Database\\Migrations\\Nilai', 'default', 'App', 1698298310, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori_nilai_id` bigint(20) NOT NULL,
  `tahun_ajaran_detail_id` bigint(20) NOT NULL,
  `guru_mapel_detail_id` bigint(20) NOT NULL,
  `nilai` smallint(3) NOT NULL,
  `status` tinyint(3) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id`, `kategori_nilai_id`, `tahun_ajaran_detail_id`, `guru_mapel_detail_id`, `nilai`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 5, 85, 2, '2023-11-01 22:25:17', '2023-11-01 22:51:31'),
(2, 2, 3, 5, 85, 2, '2023-11-01 22:25:19', '2023-11-01 22:51:34'),
(3, 3, 3, 5, 75, 2, '2023-11-01 22:25:22', '2023-11-01 22:50:30'),
(4, 4, 3, 5, 80, 2, '2023-11-01 22:50:36', '2023-11-01 22:50:36'),
(5, 5, 3, 5, 90, 2, '2023-11-01 22:50:38', '2023-11-01 22:50:38'),
(7, 2, 4, 5, 90, 2, '2023-11-01 22:50:41', '2023-11-01 22:50:41'),
(8, 3, 4, 5, 95, 2, '2023-11-01 22:50:44', '2023-11-01 22:50:44'),
(9, 4, 4, 5, 99, 2, '2023-11-01 22:50:45', '2023-11-01 22:50:45'),
(10, 5, 4, 5, 85, 2, '2023-11-01 22:50:47', '2023-11-01 22:50:47'),
(11, 1, 5, 5, 75, 2, '2023-11-01 22:50:48', '2023-11-01 22:50:48'),
(12, 2, 5, 5, 82, 2, '2023-11-01 22:50:49', '2023-11-01 22:50:49'),
(13, 3, 5, 5, 92, 2, '2023-11-01 22:50:50', '2023-11-01 22:50:50'),
(14, 4, 5, 5, 85, 2, '2023-11-01 22:50:52', '2023-11-01 22:50:52'),
(15, 5, 5, 5, 80, 2, '2023-11-01 22:50:54', '2023-11-01 22:50:54'),
(16, 1, 5, 8, 85, 1, '2023-11-01 23:09:11', '2023-11-01 23:09:11'),
(17, 2, 5, 8, 85, 1, '2023-11-01 23:09:12', '2023-11-01 23:09:12'),
(18, 3, 5, 8, 85, 1, '2023-11-01 23:09:14', '2023-11-01 23:09:14'),
(19, 4, 5, 8, 85, 1, '2023-11-01 23:09:15', '2023-11-01 23:09:15'),
(20, 5, 5, 8, 85, 1, '2023-11-01 23:09:15', '2023-11-01 23:09:15'),
(21, 1, 3, 8, 85, 1, '2023-11-01 23:09:16', '2023-11-01 23:09:16'),
(22, 2, 3, 8, 85, 1, '2023-11-01 23:09:16', '2023-11-01 23:09:16'),
(23, 3, 3, 8, 85, 1, '2023-11-01 23:09:17', '2023-11-01 23:09:17'),
(24, 4, 3, 8, 85, 1, '2023-11-01 23:09:17', '2023-11-01 23:09:17'),
(25, 5, 3, 8, 85, 1, '2023-11-01 23:09:18', '2023-11-01 23:09:18'),
(26, 1, 4, 8, 85, 1, '2023-11-01 23:09:19', '2023-11-01 23:09:19'),
(27, 2, 4, 8, 85, 1, '2023-11-01 23:09:19', '2023-11-01 23:09:19'),
(28, 3, 4, 8, 85, 1, '2023-11-01 23:09:20', '2023-11-01 23:09:20'),
(29, 4, 4, 8, 85, 1, '2023-11-01 23:09:20', '2023-11-01 23:09:20'),
(30, 5, 4, 8, 85, 1, '2023-11-01 23:09:22', '2023-11-01 23:09:22'),
(31, 1, 5, 11, 70, 1, '2023-11-01 23:09:53', '2023-11-01 23:09:53'),
(32, 2, 5, 11, 71, 1, '2023-11-01 23:09:54', '2023-11-01 23:09:54'),
(33, 3, 5, 11, 78, 1, '2023-11-01 23:09:54', '2023-11-01 23:09:54'),
(34, 4, 5, 11, 78, 1, '2023-11-01 23:09:55', '2023-11-01 23:09:57'),
(35, 5, 5, 11, 78, 1, '2023-11-01 23:09:58', '2023-11-01 23:09:58'),
(36, 1, 3, 11, 87, 1, '2023-11-01 23:09:59', '2023-11-01 23:09:59'),
(37, 2, 3, 11, 87, 1, '2023-11-01 23:09:59', '2023-11-01 23:09:59'),
(38, 3, 3, 11, 87, 1, '2023-11-01 23:10:00', '2023-11-01 23:10:00'),
(39, 4, 3, 11, 87, 1, '2023-11-01 23:10:00', '2023-11-01 23:10:00'),
(40, 5, 3, 11, 87, 1, '2023-11-01 23:10:01', '2023-11-01 23:10:01'),
(41, 1, 4, 11, 85, 1, '2023-11-01 23:10:02', '2023-11-01 23:10:02'),
(42, 2, 4, 11, 85, 1, '2023-11-01 23:10:03', '2023-11-01 23:10:03'),
(43, 3, 4, 11, 85, 1, '2023-11-01 23:10:03', '2023-11-01 23:10:03'),
(44, 4, 4, 11, 85, 1, '2023-11-01 23:10:04', '2023-11-01 23:10:04'),
(45, 5, 4, 11, 85, 1, '2023-11-01 23:10:06', '2023-11-01 23:10:06'),
(46, 1, 5, 4, 89, 1, '2023-11-02 00:10:20', '2023-11-02 00:10:20'),
(47, 2, 5, 4, 89, 1, '2023-11-02 00:10:21', '2023-11-02 00:10:21'),
(48, 3, 5, 4, 89, 1, '2023-11-02 00:10:21', '2023-11-02 00:10:21'),
(49, 4, 5, 4, 89, 1, '2023-11-02 00:10:22', '2023-11-02 00:10:22'),
(50, 5, 5, 4, 89, 1, '2023-11-02 00:10:23', '2023-11-02 00:10:23'),
(51, 1, 3, 4, 90, 1, '2023-11-02 00:10:24', '2023-11-02 00:10:24'),
(52, 2, 3, 4, 90, 1, '2023-11-02 00:10:25', '2023-11-02 00:10:25'),
(53, 3, 3, 4, 90, 1, '2023-11-02 00:10:25', '2023-11-02 00:10:25'),
(54, 4, 3, 4, 90, 1, '2023-11-02 00:10:26', '2023-11-02 00:10:26'),
(55, 5, 3, 4, 90, 1, '2023-11-02 00:10:27', '2023-11-02 00:10:27'),
(56, 1, 4, 4, 85, 1, '2023-11-02 00:10:31', '2023-11-02 00:10:31'),
(57, 2, 4, 4, 85, 1, '2023-11-02 00:10:31', '2023-11-02 00:10:31'),
(58, 3, 4, 4, 85, 1, '2023-11-02 00:10:32', '2023-11-02 00:10:32'),
(59, 4, 4, 4, 85, 1, '2023-11-02 00:10:32', '2023-11-02 00:10:32'),
(60, 5, 4, 4, 85, 1, '2023-11-02 00:10:34', '2023-11-02 00:10:34'),
(61, 1, 4, 5, 90, 2, '2023-11-06 01:38:00', '2023-11-06 01:38:00');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `hak_akses` tinyint(3) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `username`, `password`, `nama`, `hak_akses`, `created_at`, `updated_at`) VALUES
(1, 'a', '$2y$10$VBxHwk3bASztnefwcx/EQ.BpTmlNx6ebLiU63JJtsMtL4152hABqi', 'Admin', 1, '2023-10-26 04:06:04', '2023-10-29 17:45:06'),
(5, '1', '$2y$10$C.2TWBPZNcL.psz0.R1L4Od8cFv6nLqSgsiEvrKAAp2qC1CznZHrC', 'a', 2, '2023-10-29 19:11:22', '2023-10-29 19:11:22'),
(9, '2', '$2y$10$AHwRScQQgN8ZN4hcHqzlfOmx9AFnbDCZkZrZVP3eYpOt9.zBZrDRe', 'B', 2, '2023-10-29 20:39:44', '2023-10-29 20:39:44'),
(11, '1402031', '$2y$10$o31OCHe20zJRduPWKnTE6edaTU00orWJ2d.qE9l.VrE68K1bvOD9q', 'SISWA B', 3, '2023-10-29 23:43:26', '2023-10-29 23:43:26'),
(14, '1402032', '$2y$10$1CRB94YIoH5Bpt521W2cP.PxzQegRGY79FslCtfB6x7ebfmHy4aFm', 'SISWA C', 3, '2023-10-29 23:58:46', '2023-10-29 23:58:46'),
(15, '1402030', '$2y$10$1i.4Wzpau9sr/YY7mMs2fOxmEXYNWheo7IeztjjOAh/eeuFspwh.i', 'SISWA A', 3, '2023-10-30 01:42:56', '2023-10-30 01:42:56');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nis` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `status` tinyint(3) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nis`, `nama`, `status`, `created_at`, `updated_at`) VALUES
(2, '1402031', 'SISWA B', 2, '2023-10-29 23:43:26', '2023-10-31 21:01:26'),
(5, '1402032', 'SISWA C', 2, '2023-10-29 23:58:46', '2023-10-31 21:01:26'),
(6, '1402030', 'SISWA A', 2, '2023-10-30 01:42:56', '2023-10-31 21:01:27');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `status` tinyint(3) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id`, `nama`, `status`, `created_at`, `updated_at`) VALUES
(2, '2021 - 2022', 1, '2023-10-25 23:21:29', '2023-11-02 00:17:20'),
(3, '2022 - 2023', 2, '2023-10-26 00:12:17', '2023-11-02 00:17:20');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajaran_detail`
--

CREATE TABLE `tahun_ajaran_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tahun_ajaran_id` bigint(20) NOT NULL,
  `kelas_id` bigint(20) NOT NULL,
  `siswa_id` bigint(20) NOT NULL,
  `status` tinyint(3) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tahun_ajaran_detail`
--

INSERT INTO `tahun_ajaran_detail` (`id`, `tahun_ajaran_id`, `kelas_id`, `siswa_id`, `status`, `created_at`, `updated_at`) VALUES
(3, 2, 3, 2, 1, '2023-10-30 01:17:24', '2023-10-31 21:11:10'),
(4, 2, 3, 5, 1, '2023-10-30 01:17:29', '2023-10-31 21:11:10'),
(5, 2, 3, 6, 1, '2023-10-30 01:43:08', '2023-10-31 21:11:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nip` (`nip`);

--
-- Indexes for table `guru_mapel`
--
ALTER TABLE `guru_mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guru_mapel_detail`
--
ALTER TABLE `guru_mapel_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_nilai`
--
ALTER TABLE `kategori_nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nis` (`nis`);

--
-- Indexes for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tahun_ajaran_detail`
--
ALTER TABLE `tahun_ajaran_detail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `guru_mapel`
--
ALTER TABLE `guru_mapel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `guru_mapel_detail`
--
ALTER TABLE `guru_mapel_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kategori_nilai`
--
ALTER TABLE `kategori_nilai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tahun_ajaran_detail`
--
ALTER TABLE `tahun_ajaran_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
