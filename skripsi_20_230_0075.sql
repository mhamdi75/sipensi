-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 20, 2024 at 02:07 PM
-- Server version: 10.2.44-MariaDB-cll-lve
-- PHP Version: 8.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abae9484_skripsi_20_230_0075`
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
(8, '1', 'a', '2023-10-29 12:11:22', '2023-10-29 12:11:22'),
(12, '2', 'B', '2023-10-29 13:39:44', '2023-10-29 13:39:44'),
(13, '3', 'Ani Setianingrum, S.Pd', '2024-01-12 10:11:02', '2024-01-12 10:11:02');

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
(1, 8, 1, '2023-10-29 12:11:22', '2023-10-29 12:11:22'),
(14, 12, 2, '2023-10-29 13:39:44', '2023-10-29 13:39:44'),
(15, 12, 3, '2023-10-29 13:39:44', '2023-10-29 13:39:44'),
(16, 12, 4, '2023-10-29 13:39:44', '2023-10-29 13:39:44'),
(17, 13, 2, '2024-01-12 10:11:02', '2024-01-12 10:11:02');

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
(4, 1, 3, '2023-10-29 14:30:50', '2023-10-29 14:30:50'),
(5, 14, 3, '2023-10-29 14:30:56', '2023-10-29 14:30:56'),
(8, 15, 3, '2023-11-01 14:07:02', '2023-11-01 14:07:02'),
(9, 14, 4, '2023-11-01 14:07:13', '2023-11-01 14:07:13'),
(10, 14, 5, '2023-11-01 14:07:19', '2023-11-01 14:07:19'),
(11, 16, 3, '2023-11-01 16:09:45', '2023-11-01 16:09:45'),
(12, 1, 7, '2024-01-19 22:33:08', '2024-01-19 22:33:08');

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
(1, 'UTS S1', '2023-10-31 14:20:00', '2023-10-31 14:20:00'),
(2, 'UAS S1', '2023-10-31 14:20:07', '2023-10-31 14:20:07'),
(3, 'UTS S2', '2023-10-31 14:20:13', '2023-10-31 14:20:13'),
(4, 'UAS S2', '2023-10-31 14:20:21', '2023-10-31 14:20:21'),
(5, 'TUGAS', '2023-10-31 14:20:28', '2023-10-31 14:20:28');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_sikap`
--

CREATE TABLE `kategori_sikap` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kategori_sikap`
--

INSERT INTO `kategori_sikap` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Jujur', '2023-12-09 16:11:15', '2023-12-09 16:11:15'),
(2, 'Tanggung Jawab', '2023-12-09 16:11:25', '2023-12-09 16:11:25'),
(3, 'Kerjasama', '2023-12-09 16:11:37', '2023-12-09 16:11:37'),
(4, 'Disiplin', '2023-12-09 16:11:44', '2023-12-09 16:11:49');

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
(3, 'IPA 1A', '2023-10-27 14:00:52', '2023-10-27 14:00:52'),
(4, 'IPA 1B', '2023-10-27 14:00:58', '2023-10-27 14:01:05'),
(5, 'IPA 1C', '2023-10-27 14:01:11', '2023-10-27 14:01:11'),
(6, 'IPS 1A', '2023-10-27 14:01:17', '2023-10-27 14:01:17'),
(7, 'IPA 2B', '2023-10-27 14:01:22', '2024-01-19 22:26:58'),
(8, 'IPS 1C', '2023-10-27 14:01:30', '2023-10-27 14:01:30'),
(9, 'IPA 2A', '2024-01-19 23:07:18', '2024-01-19 23:07:18');

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
(1, 'MATEMATIKA', '2023-10-27 14:22:30', '2023-10-27 14:22:30'),
(2, 'BAHASA INDONESIA', '2023-10-27 14:22:39', '2023-10-27 14:22:39'),
(3, 'BAHASA INGGRIS', '2023-10-27 14:22:56', '2023-10-27 14:23:28'),
(4, 'BAHASA JAWA', '2023-10-27 14:23:34', '2023-10-27 14:23:34'),
(5, 'IPA', '2023-10-27 14:23:39', '2023-10-27 14:23:39'),
(6, 'IPS', '2023-10-27 14:23:43', '2023-10-27 14:23:43'),
(7, 'PKN', '2023-10-27 14:23:48', '2023-10-27 14:23:48'),
(8, 'PENJAS ORKER', '2023-10-27 14:23:57', '2023-10-27 14:24:16'),
(9, 'FISIKA', '2023-10-27 14:24:09', '2023-10-27 14:24:09');

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
(30, '2023-10-26-014819', 'App\\Database\\Migrations\\Nilai', 'default', 'App', 1698298310, 1),
(31, '2023-10-26-014603', 'App\\Database\\Migrations\\KategoriSikap', 'default', 'App', 1698298309, 1),
(32, '2023-10-26-014819', 'App\\Database\\Migrations\\NilaiSikap', 'default', 'App', 1698298310, 1);

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
(1, 1, 5, 4, 90, 2, '2023-12-09 22:44:37', '2023-12-09 22:44:37'),
(2, 2, 5, 4, 90, 2, '2023-12-09 22:44:37', '2023-12-09 22:44:37'),
(3, 3, 5, 4, 90, 2, '2023-12-09 22:44:38', '2023-12-09 22:44:38'),
(4, 4, 5, 4, 90, 2, '2023-12-09 22:44:38', '2023-12-09 22:44:38'),
(5, 5, 5, 4, 90, 2, '2023-12-09 22:44:39', '2023-12-09 22:44:39'),
(6, 1, 3, 4, 89, 2, '2023-12-09 22:44:41', '2023-12-09 22:44:41'),
(7, 2, 3, 4, 89, 2, '2023-12-09 22:44:41', '2023-12-09 22:44:41'),
(8, 3, 3, 4, 89, 2, '2023-12-09 22:44:42', '2023-12-09 22:44:42'),
(9, 4, 3, 4, 89, 2, '2023-12-09 22:44:42', '2023-12-09 22:44:42'),
(10, 5, 3, 4, 89, 2, '2023-12-09 22:44:43', '2023-12-09 22:44:43'),
(11, 1, 4, 4, 98, 2, '2023-12-09 22:44:44', '2023-12-09 22:44:44'),
(12, 2, 4, 4, 98, 2, '2023-12-09 22:44:45', '2023-12-09 22:44:45'),
(13, 3, 4, 4, 98, 2, '2023-12-09 22:44:46', '2023-12-09 22:44:46'),
(14, 4, 4, 4, 98, 2, '2023-12-09 22:44:46', '2023-12-09 22:44:46'),
(15, 5, 4, 4, 98, 2, '2023-12-09 22:44:47', '2023-12-09 22:44:47'),
(16, 1, 5, 5, 90, 2, '2023-12-09 23:13:22', '2023-12-09 23:13:22'),
(17, 2, 5, 5, 90, 2, '2023-12-09 23:13:23', '2023-12-09 23:13:23'),
(18, 3, 5, 5, 90, 2, '2023-12-09 23:13:23', '2023-12-09 23:13:23'),
(19, 4, 5, 5, 90, 2, '2023-12-09 23:13:23', '2023-12-09 23:13:23'),
(20, 5, 5, 5, 90, 2, '2023-12-09 23:13:24', '2023-12-09 23:13:24'),
(21, 1, 3, 5, 98, 2, '2023-12-09 23:13:26', '2023-12-09 23:13:26'),
(22, 2, 3, 5, 98, 2, '2023-12-09 23:13:27', '2023-12-09 23:13:27'),
(23, 3, 3, 5, 88, 2, '2023-12-09 23:13:28', '2023-12-09 23:13:28'),
(24, 4, 3, 5, 99, 2, '2023-12-09 23:13:30', '2023-12-09 23:13:30'),
(25, 5, 3, 5, 90, 2, '2023-12-09 23:13:33', '2023-12-09 23:13:33'),
(26, 1, 4, 5, 89, 2, '2023-12-18 14:32:40', '2023-12-18 14:32:40'),
(27, 2, 4, 5, 89, 2, '2023-12-18 14:32:42', '2023-12-18 14:32:42'),
(28, 3, 4, 5, 88, 2, '2023-12-18 14:32:43', '2023-12-18 14:32:43'),
(29, 4, 4, 5, 88, 2, '2023-12-18 14:32:43', '2023-12-18 14:32:43'),
(30, 5, 4, 5, 89, 2, '2023-12-18 14:32:44', '2023-12-18 14:32:44'),
(31, 1, 5, 8, 89, 2, '2023-12-18 14:33:35', '2023-12-18 14:33:35'),
(32, 2, 5, 8, 89, 2, '2023-12-18 14:33:36', '2023-12-18 14:33:36'),
(33, 3, 5, 8, 89, 2, '2023-12-18 14:33:37', '2023-12-18 14:33:37'),
(34, 4, 5, 8, 89, 2, '2023-12-18 14:33:38', '2023-12-18 14:33:38'),
(35, 5, 5, 8, 88, 2, '2023-12-18 14:33:38', '2023-12-18 14:33:38'),
(36, 1, 3, 8, 89, 2, '2023-12-18 14:33:39', '2023-12-18 14:33:39'),
(37, 2, 3, 8, 89, 2, '2023-12-18 14:33:40', '2023-12-18 14:33:40'),
(38, 3, 3, 8, 89, 2, '2023-12-18 14:33:42', '2023-12-18 14:33:42'),
(39, 4, 3, 8, 88, 2, '2023-12-18 14:33:43', '2023-12-18 14:33:43'),
(40, 5, 3, 8, 89, 2, '2023-12-18 14:33:44', '2023-12-18 14:33:44'),
(41, 1, 4, 8, 88, 2, '2023-12-18 14:33:45', '2023-12-18 14:33:45'),
(42, 2, 4, 8, 88, 2, '2023-12-18 14:33:46', '2023-12-18 14:33:46'),
(43, 3, 4, 8, 88, 2, '2023-12-18 14:33:47', '2023-12-18 14:33:47'),
(44, 4, 4, 8, 89, 2, '2023-12-18 14:33:48', '2023-12-18 14:33:48'),
(45, 5, 4, 8, 88, 2, '2023-12-18 14:33:49', '2023-12-18 14:33:49'),
(46, 1, 5, 11, 89, 2, '2023-12-18 14:33:58', '2023-12-18 14:33:58'),
(47, 2, 5, 11, 89, 2, '2023-12-18 14:33:59', '2023-12-18 14:33:59'),
(48, 3, 5, 11, 88, 2, '2023-12-18 14:34:01', '2023-12-18 14:34:01'),
(49, 4, 5, 11, 87, 2, '2023-12-18 14:34:02', '2023-12-18 14:34:02'),
(50, 5, 5, 11, 88, 2, '2023-12-18 14:34:03', '2023-12-18 14:34:03'),
(51, 1, 3, 11, 87, 2, '2023-12-18 14:34:04', '2023-12-18 14:34:04'),
(52, 2, 3, 11, 87, 2, '2023-12-18 14:34:04', '2023-12-18 14:34:04'),
(53, 3, 3, 11, 88, 2, '2023-12-18 14:34:05', '2023-12-18 14:34:05'),
(54, 4, 3, 11, 87, 2, '2023-12-18 14:34:06', '2023-12-18 14:34:06'),
(55, 5, 3, 11, 89, 2, '2023-12-18 14:34:07', '2023-12-18 14:34:07'),
(56, 1, 4, 11, 88, 2, '2023-12-18 14:34:09', '2023-12-18 14:34:09'),
(57, 2, 4, 11, 87, 2, '2023-12-18 14:34:10', '2023-12-18 14:34:10'),
(58, 3, 4, 11, 89, 2, '2023-12-18 14:34:11', '2023-12-18 14:34:11'),
(59, 4, 4, 11, 89, 2, '2023-12-18 14:34:12', '2023-12-18 14:34:12'),
(60, 5, 4, 11, 88, 2, '2023-12-18 14:34:13', '2023-12-18 14:34:13'),
(61, 1, 6, 9, 95, 2, '2024-01-19 22:24:06', '2024-01-19 22:24:06'),
(62, 2, 6, 9, 98, 2, '2024-01-19 22:24:10', '2024-01-19 22:24:10'),
(63, 3, 6, 9, 78, 2, '2024-01-19 22:24:15', '2024-01-19 22:24:15'),
(64, 4, 6, 9, 89, 2, '2024-01-19 22:24:17', '2024-01-19 22:24:17'),
(65, 5, 6, 9, 100, 2, '2024-01-19 22:24:21', '2024-01-19 22:24:21');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_sikap`
--

CREATE TABLE `nilai_sikap` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori_sikap_id` bigint(20) NOT NULL,
  `tahun_ajaran_detail_id` bigint(20) NOT NULL,
  `nilai` smallint(3) NOT NULL,
  `status` tinyint(3) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nilai_sikap`
--

INSERT INTO `nilai_sikap` (`id`, `kategori_sikap_id`, `tahun_ajaran_detail_id`, `nilai`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 89, 2, '2023-12-09 22:56:23', '2023-12-09 22:56:27'),
(2, 2, 5, 89, 2, '2023-12-09 22:56:28', '2023-12-09 22:56:28'),
(3, 3, 5, 89, 2, '2023-12-09 22:56:28', '2023-12-09 22:56:28'),
(4, 4, 5, 89, 2, '2023-12-09 22:56:29', '2023-12-09 22:56:29'),
(5, 1, 3, 89, 2, '2023-12-09 22:56:29', '2023-12-09 22:56:29'),
(6, 2, 3, 89, 2, '2023-12-09 22:56:30', '2023-12-09 22:56:30'),
(7, 3, 3, 89, 2, '2023-12-09 22:56:30', '2023-12-09 22:56:30'),
(8, 4, 3, 89, 2, '2023-12-09 22:56:33', '2023-12-09 22:56:33'),
(9, 1, 4, 89, 2, '2023-12-09 22:56:34', '2023-12-09 22:56:34'),
(10, 2, 4, 89, 2, '2023-12-09 22:56:34', '2023-12-09 22:56:34'),
(11, 3, 4, 89, 2, '2023-12-09 22:56:35', '2023-12-09 22:56:35'),
(12, 4, 4, 89, 2, '2023-12-09 22:56:36', '2023-12-09 22:56:36'),
(13, 1, 6, 100, 2, '2024-01-19 22:25:23', '2024-01-19 22:25:23'),
(14, 2, 6, 85, 2, '2024-01-19 22:25:26', '2024-01-19 22:25:26'),
(15, 3, 6, 90, 2, '2024-01-19 22:25:29', '2024-01-19 22:25:29'),
(16, 4, 6, 90, 2, '2024-01-19 22:25:32', '2024-01-19 22:25:32');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kelas_id` bigint(20) DEFAULT NULL,
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

INSERT INTO `pengguna` (`id`, `kelas_id`, `username`, `password`, `nama`, `hak_akses`, `created_at`, `updated_at`) VALUES
(1, NULL, 'a', '$2y$10$VBxHwk3bASztnefwcx/EQ.BpTmlNx6ebLiU63JJtsMtL4152hABqi', 'Admin', 1, '2023-10-25 21:06:04', '2023-10-29 10:45:06'),
(5, NULL, '1', '$2y$10$C.2TWBPZNcL.psz0.R1L4Od8cFv6nLqSgsiEvrKAAp2qC1CznZHrC', 'a', 2, '2023-10-29 12:11:22', '2023-10-29 12:11:22'),
(9, NULL, '2', '$2y$10$NpHw7fNq9qJGiMkA4iTa0egaVTFhLN6BzxBwXzMiGeHepxnYVw9nS', 'B', 2, '2023-10-29 13:39:44', '2023-12-18 14:07:29'),
(11, NULL, '1402031', '$2y$10$o31OCHe20zJRduPWKnTE6edaTU00orWJ2d.qE9l.VrE68K1bvOD9q', 'SISWA B', 3, '2023-10-29 16:43:26', '2023-10-29 16:43:26'),
(14, NULL, '1402032', '$2y$10$1CRB94YIoH5Bpt521W2cP.PxzQegRGY79FslCtfB6x7ebfmHy4aFm', 'SISWA C', 3, '2023-10-29 16:58:46', '2023-10-29 16:58:46'),
(15, NULL, '1402030', '$2y$10$7EI0w6Y0qQpaTT5io0reJeEbj5.6fuEYfkPcgTVCoJzhHg1ilf65q', 'SISWA A', 3, '2023-10-29 18:42:56', '2023-12-18 14:10:16'),
(16, NULL, 'bk', '$2y$10$iu9ayr7aWZ7pwhKo0aHHhOAabky7K/0K.CIWaIwiY34r5hMttMaXG', 'GURU BK', 5, '2023-10-29 13:39:44', '2023-10-29 13:39:44'),
(17, NULL, 'as', '$2y$10$OHKaPmDELkitDhAikwfaxejd9cC.a/LVyAC9a/SCoSkYT4ZsU1HO.', 'Admin Super', 1, '2023-12-09 18:57:47', '2023-12-09 18:57:47'),
(20, NULL, 'kepsek', '$2y$10$XcjoEYhMrW/kK0dGHhhi4uY10lIlPWq4BZQUyUgNlsbaku41UWJzm', 'Kepala Sekolah', 4, '2023-12-09 19:03:41', '2023-12-09 19:03:41'),
(21, NULL, 'bk1', '$2y$10$Z0FDKEhlO3ZT0jAJt5WDj.0PF24noXA778DZ/mBNDCHG/TWZAwEK6', 'Guru BK 1', 5, '2023-12-09 19:06:37', '2023-12-09 19:06:37'),
(23, 3, 'walikelasipa1a', '$2y$10$R8YWVDircig.jFl6V272K.ASLQB9SdV9V8I1W3IvY3iB30aAEvw7W', 'Wali Kelas IPA 1A', 6, '2023-12-09 19:23:30', '2023-12-09 19:33:02'),
(24, NULL, '3', '$2y$10$DN3UVCvrkb30DpJmufvQieyzPWjfsBUcJajkKuNVBe58.yTJRuVoS', 'Ani Setianingrum, S.Pd', 2, '2024-01-12 10:11:02', '2024-01-12 10:11:02'),
(25, NULL, '1234', '$2y$10$M6OK7RB3xhDcHYVAg86UiOjWGrCV6kOMToJ8KZtH5jOrzFrIPDwiW', 'NAILA AZKA AMALIA', 3, '2024-01-12 10:14:44', '2024-01-12 10:14:44');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nis` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jk` varchar(255) NOT NULL,
  `status` tinyint(3) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nis`, `nama`, `jk`, `status`, `created_at`, `updated_at`) VALUES
(2, '1402031', 'SISWA B', 'l', 2, '2023-10-29 16:43:26', '2023-10-31 14:01:26'),
(5, '1402032', 'SISWA C', 'p', 2, '2023-10-29 16:58:46', '2023-10-31 14:01:26'),
(6, '1402030', 'SISWA A', 'l', 3, '2023-10-29 18:42:56', '2023-10-31 14:01:27'),
(7, '1234', 'NAILA AZKA AMALIA', 'p', 2, '2024-01-12 10:14:44', '2024-01-19 22:17:51');

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
(2, '2021 - 2022', 2, '2023-10-25 16:21:29', '2024-01-19 23:10:56'),
(3, '2022 - 2023', 1, '2023-10-25 17:12:17', '2024-01-19 23:10:56');

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
(3, 2, 3, 2, 1, '2023-10-29 18:17:24', '2024-01-19 23:08:43'),
(4, 2, 3, 5, 1, '2023-10-29 18:17:29', '2024-01-19 23:08:43'),
(5, 2, 3, 6, 1, '2023-10-29 18:43:08', '2024-01-19 23:08:43'),
(6, 2, 4, 7, 1, '2024-01-19 22:17:51', '2024-01-19 22:41:15');

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
-- Indexes for table `kategori_sikap`
--
ALTER TABLE `kategori_sikap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama` (`nama`);

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
-- Indexes for table `nilai_sikap`
--
ALTER TABLE `nilai_sikap`
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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama` (`nama`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `guru_mapel`
--
ALTER TABLE `guru_mapel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `guru_mapel_detail`
--
ALTER TABLE `guru_mapel_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kategori_nilai`
--
ALTER TABLE `kategori_nilai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kategori_sikap`
--
ALTER TABLE `kategori_sikap`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `nilai_sikap`
--
ALTER TABLE `nilai_sikap`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tahun_ajaran_detail`
--
ALTER TABLE `tahun_ajaran_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
