-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2024 at 11:30 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pelatihan`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `harga_barang` int(15) NOT NULL,
  `stock_barang` int(15) NOT NULL,
  `gambar_barang` varchar(50) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama_barang`, `harga_barang`, `stock_barang`, `gambar_barang`, `created`) VALUES
(1, 'mouse', 100, 1, '', '2024-05-20');

-- --------------------------------------------------------

--
-- Table structure for table `gelombang`
--

CREATE TABLE `gelombang` (
  `id` int(11) NOT NULL,
  `nama_gelombang` varchar(15) NOT NULL,
  `aktif` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gelombang`
--

INSERT INTO `gelombang` (`id`, `nama_gelombang`, `aktif`, `created_at`, `updated_at`) VALUES
(1, 'gelombang 1', 0, '2024-06-19 02:25:33', '2024-06-19 06:54:55'),
(2, 'gelombang 2', 0, '2024-06-19 02:25:33', '2024-06-19 07:05:56'),
(4, 'Gelombang 3', 1, '2024-06-19 04:04:48', '2024-06-19 07:06:01');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int(11) NOT NULL,
  `nama_jurusan` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id`, `nama_jurusan`, `created_at`, `updated_at`) VALUES
(10, 'Tata Boga', '2024-05-16 02:07:21', '2024-05-16 02:07:21'),
(11, 'Tata Graha', '2024-05-16 02:07:29', '2024-05-16 02:07:29'),
(12, 'Teknik Pendingin', '2024-05-16 02:07:38', '2024-05-16 02:07:38'),
(13, 'Teknik Komputer', '2024-05-16 02:07:57', '2024-05-16 02:07:57'),
(14, 'Bahasa Inggris', '2024-05-16 02:08:12', '2024-05-16 02:08:12'),
(15, 'Desain Grafis', '2024-05-16 02:08:27', '2024-05-16 02:08:27'),
(16, 'Jaringan Komputer', '2024-05-16 02:08:39', '2024-05-16 02:08:39'),
(17, 'Operator Komputer', '2024-05-16 02:08:49', '2024-05-16 02:08:49'),
(18, 'Teknik Sepeda Motor', '2024-05-16 02:09:00', '2024-05-16 02:09:00'),
(19, 'Web Programming', '2024-05-16 02:09:12', '2024-05-16 02:09:12'),
(20, 'Content Creator', '2024-05-16 02:09:20', '2024-05-16 02:09:20'),
(21, 'Make Up Artist', '2024-05-16 02:09:32', '2024-05-16 02:09:32'),
(22, 'Bahasa Korea', '2024-05-16 02:09:45', '2024-05-16 02:09:45'),
(23, 'Video Editor', '2024-05-16 02:09:54', '2024-05-16 02:09:54'),
(24, 'Barista', '2024-05-16 02:10:02', '2024-05-16 02:10:02');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `level` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `level`, `created_at`, `updated_at`) VALUES
(1, 'Kepala', '2024-05-15 04:20:25', '2024-05-15 04:20:25'),
(6, 'Instruktur', '2024-05-15 04:34:10', '2024-05-15 04:34:10'),
(7, 'Kajur', '2024-05-15 05:06:52', '2024-05-15 05:06:52'),
(8, 'Kastpel', '2024-05-15 05:06:55', '2024-05-15 05:06:55'),
(9, 'admin', '2024-06-19 02:32:41', '2024-06-19 02:32:41');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id` int(11) NOT NULL,
  `id_jurusan` int(50) NOT NULL,
  `id_gelombang` int(11) NOT NULL,
  `nik` varchar(18) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `pendidikan` varchar(20) NOT NULL,
  `gelombang` int(5) NOT NULL,
  `tahun_pelatihan` varchar(5) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `uptaded_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id`, `id_jurusan`, `id_gelombang`, `nik`, `name`, `email`, `phone`, `gender`, `alamat`, `pendidikan`, `gelombang`, `tahun_pelatihan`, `status`, `deleted`, `created_at`, `uptaded_at`) VALUES
(8, 20, 0, '123', '', 'septyantowijaya@gmail.com', '008129488613', 'perempuan', 'kamjet1', 'SMA', 1, '2024', 1, 0, '2024-05-16 03:26:34', '2024-05-16 03:26:34'),
(9, 20, 0, '321', '', 'septyantowijaya2@gmail.com', '00000', 'perempuan', 'kamjet2', 'SMA', 1, '2024', NULL, 0, '2024-05-16 03:26:34', '2024-05-16 03:26:34'),
(10, 20, 0, '55555', '', 'septyantowijaya3@gmail.com', '00000', 'perempuan', 'kamjet3', 'SMA', 1, '2024', 2, 0, '2024-05-16 03:26:34', '2024-05-16 03:26:34'),
(11, 19, 0, '123', '', 'septyantowijaya@gmail.com', '081294888613', 'perempuan', 'kamjet', 'SMA', 1, '2024', 3, 0, '2024-05-16 03:26:34', '2024-05-16 03:26:34'),
(12, 19, 0, '321', '', 'septyantowijaya2@gmail.com', '222222222', 'perempuan', 'kamjet2', 'SMA', 1, '2024', 1, 0, '2024-05-16 03:26:34', '2024-05-16 03:26:34'),
(13, 19, 0, '333', '', 'septyantowijaya3@gmail.com', '3333333333333', 'perempuan', 'kamjet3', 'SMA', 1, '2024', 2, 0, '2024-05-16 03:26:34', '2024-05-16 03:26:34'),
(14, 23, 0, '1111111', '', 'septyantowijaya@gmail.com', '1111', 'perempuan', 'kamjet1', 'SMA', 1, '2024', 3, 0, '2024-05-16 03:26:34', '2024-05-16 03:26:34'),
(15, 23, 0, '2222222', '', 'septyantowijaya2@gmail.com', '222222', 'perempuan', 'kamjet2', 'SMA', 1, '2024', 3, 0, '2024-05-16 03:26:34', '2024-05-16 03:26:34'),
(16, 23, 0, '3333333', '', 'septyantowijaya3@gmail.com', '3333333', 'perempuan', 'kamjet3', 'SMA', 1, '2024', 2, 0, '2024-05-16 03:26:34', '2024-05-16 03:26:34'),
(18, 13, 0, '111111111111', '1wdaawdawdawdawd', 'septyantowijaya11111111111@gmail.com', '1111111111111', 'perempuan', 'kamjet3111111111111111111', 'SMA', 1, '2024', NULL, 0, '2024-05-16 03:26:34', '2024-05-16 03:26:34'),
(19, 13, 0, '111111111111', '1wdaawdawdawdawd', 'septyantowijaya11111111111@gmail.com', '08888888888', 'perempuan', 'kamjet3111111111111111111', 'SMA', 1, '2024', NULL, 0, '2024-05-16 03:26:34', '2024-05-16 03:26:34'),
(20, 24, 0, '12312', 'adhan', 'exp@gmail.com', '123', 'laki-laki', 'rr', 'rr', 0, '2024', NULL, 0, '2024-06-19 06:53:49', '2024-06-19 06:53:49'),
(21, 24, 2, '12312', 'ramdfhan', 'susi@gmail.com', '1', 'laki-laki', 'sga', '34f', 0, '2024', NULL, 0, '2024-06-19 06:55:49', '2024-06-19 06:55:49'),
(22, 24, 2, '111', 'ccc', 'ccc@gmaui.dfg', '1414', 'perempuan', 'dsf', 'SDF', 0, '2024', NULL, 0, '2024-06-19 06:57:42', '2024-06-19 06:57:42'),
(23, 24, 0, '12312', 'adhan', 'admin@gmail.com', '2143', 'laki-laki', '234DFS', 'DSF', 0, '2024', NULL, 0, '2024-06-19 06:58:58', '2024-06-19 06:58:58'),
(24, 12, 4, '1111111111111', 'Bintang Ramdhan', 'adhan2@gmail.com', '111111111', 'laki-laki', 'aaaaaaa', 'aaaaaaaaaa', 0, '2024', NULL, 0, '2024-06-19 07:07:52', '2024-06-19 07:07:52');

-- --------------------------------------------------------

--
-- Table structure for table `quest`
--

CREATE TABLE `quest` (
  `id` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `nama_pertanyaan` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quest`
--

INSERT INTO `quest` (`id`, `id_jurusan`, `nama_pertanyaan`, `created_at`, `updated_at`) VALUES
(25, 12, 'pertanyaan teknik Pendingin', '2024-05-17 05:48:21', NULL),
(66, 19, 'septyannt', '2024-05-17 08:06:00', '2024-05-17 08:06:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_brg` int(11) NOT NULL,
  `nama_brg` varchar(100) NOT NULL,
  `harga_brg` int(15) NOT NULL,
  `stock_brg` int(15) NOT NULL,
  `gbr_brg` varchar(50) NOT NULL,
  `tgl_publish` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_brg`, `nama_brg`, `harga_brg`, `stock_brg`, `gbr_brg`, `tgl_publish`) VALUES
(2, 'flowers', 999, 9, '', '0000-00-00'),
(3, 'flowers', 999, 9, '', '0000-00-00'),
(4, 'sdfgdfg', 35, 345, 'brg-1716255690.jpg', '2024-05-21'),
(5, 'mouse', 11111, 1, 'brg-1716255757.jpg', '2024-05-21'),
(6, 'PPKD', 100000, 100, 'brg-1716869200.jpg', '2024-05-28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_level`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(48, 1, 'septyannt', 'septyantowijaya@gmail.com', '4d9012b4a77a9524d675dad27c3276ab5705e5e8', '2024-05-16 01:22:18', '2024-05-16 01:22:18'),
(49, 1, 'septyannt', 'admin@gmail.com', 'admin', '2024-05-16 01:22:18', '2024-05-16 01:22:18'),
(50, 8, 'septyannt', 'udin@gmail.com', '4d9012b4a77a9524d675dad27c3276ab5705e5e8', '2024-05-16 02:42:04', '2024-05-16 02:42:04'),
(54, 8, '123', '123@gmail.com', '123', '2024-05-28 06:31:47', '2024-05-28 06:31:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gelombang`
--
ALTER TABLE `gelombang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quest`
--
ALTER TABLE `quest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_brg`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gelombang`
--
ALTER TABLE `gelombang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `quest`
--
ALTER TABLE `quest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_brg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
