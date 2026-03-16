-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2026 at 02:44 PM
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
-- Database: `perpustakaan_digital`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `penulis` varchar(100) DEFAULT NULL,
  `penerbit` varchar(100) DEFAULT NULL,
  `tahun_terbit` year(4) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `file_buku` varchar(255) DEFAULT NULL,
  `barcode` varchar(100) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul`, `penulis`, `penerbit`, `tahun_terbit`, `deskripsi`, `cover`, `file_buku`, `barcode`, `id_kategori`, `created_at`) VALUES
(1, 'Belajar PHP dari Nol', 'Budi Santoso', 'Informatika', '2023', 'Panduan belajar PHP dari dasar sampai mahir', 'php.jpg', 'php.pdf', '111222333', 1, '2026-03-15 13:40:22'),
(2, 'Dasar Javascript', 'Andi Wijaya', 'Erlangga', '2022', 'Belajar Javascript modern untuk pemula', 'js.jpg', 'js.pdf', '444555666', 1, '2026-03-15 13:40:22'),
(3, 'Belajar MySQL Database', 'Rudi Hartono', 'Informatika', '2021', 'Panduan membuat database MySQL lengkap', 'mysql.jpg', 'mysql.pdf', '777888999', 1, '2026-03-15 13:40:22'),
(4, 'Petualangan Dunia', 'Siti Aminah', 'Gramedia', '2020', 'Novel petualangan seru menjelajahi dunia', 'novel.jpg', 'novel.pdf', '123456789', 2, '2026-03-15 13:40:22');

-- --------------------------------------------------------

--
-- Table structure for table `buku_tersimpan`
--

CREATE TABLE `buku_tersimpan` (
  `id_simpan` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_buku` int(11) DEFAULT NULL,
  `tanggal_simpan` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku_tersimpan`
--

INSERT INTO `buku_tersimpan` (`id_simpan`, `id_user`, `id_buku`, `tanggal_simpan`) VALUES
(1, 2, 1, '2026-03-15 13:40:22'),
(2, 2, 3, '2026-03-15 13:40:22');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Teknologi'),
(2, 'Novel'),
(3, 'Pendidikan'),
(4, 'Komik'),
(5, 'Sejarah'),
(6, 'Bisnis');

-- --------------------------------------------------------

--
-- Table structure for table `rating_buku`
--

CREATE TABLE `rating_buku` (
  `id_rating` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_buku` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL CHECK (`rating` between 1 and 5),
  `komentar` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rating_buku`
--

INSERT INTO `rating_buku` (`id_rating`, `id_user`, `id_buku`, `rating`, `komentar`, `created_at`) VALUES
(1, 2, 1, 5, 'Buku sangat bagus untuk belajar PHP', '2026-03-15 13:40:22'),
(2, 2, 3, 4, 'Materinya mudah dipahami', '2026-03-15 13:40:22');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_baca`
--

CREATE TABLE `riwayat_baca` (
  `id_riwayat` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_buku` int(11) DEFAULT NULL,
  `halaman_terakhir` int(11) DEFAULT 1,
  `waktu_baca` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `riwayat_baca`
--

INSERT INTO `riwayat_baca` (`id_riwayat`, `id_user`, `id_buku`, `halaman_terakhir`, `waktu_baca`) VALUES
(1, 2, 1, 15, '2026-03-15 13:40:22'),
(2, 2, 3, 8, '2026-03-15 13:40:22');

-- --------------------------------------------------------

--
-- Table structure for table `scan_barcode`
--

CREATE TABLE `scan_barcode` (
  `id_scan` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `barcode` varchar(100) DEFAULT NULL,
  `waktu_scan` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings_user`
--

CREATE TABLE `settings_user` (
  `id_setting` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `bahasa` varchar(50) DEFAULT 'Indonesia',
  `mode_tampilan` enum('light','dark') DEFAULT 'light'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings_user`
--

INSERT INTO `settings_user` (`id_setting`, `id_user`, `bahasa`, `mode_tampilan`) VALUES
(1, 2, 'Indonesia', 'light');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `email`, `password`, `foto`, `deskripsi`, `role`, `created_at`) VALUES
(1, 'admin', 'admin@email.com', '123456', NULL, NULL, 'admin', '2026-03-15 13:40:22'),
(2, 'aji', 'aji@email.com', '123456', NULL, NULL, 'user', '2026-03-15 13:40:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `buku_tersimpan`
--
ALTER TABLE `buku_tersimpan`
  ADD PRIMARY KEY (`id_simpan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `rating_buku`
--
ALTER TABLE `rating_buku`
  ADD PRIMARY KEY (`id_rating`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `riwayat_baca`
--
ALTER TABLE `riwayat_baca`
  ADD PRIMARY KEY (`id_riwayat`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `scan_barcode`
--
ALTER TABLE `scan_barcode`
  ADD PRIMARY KEY (`id_scan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `settings_user`
--
ALTER TABLE `settings_user`
  ADD PRIMARY KEY (`id_setting`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `buku_tersimpan`
--
ALTER TABLE `buku_tersimpan`
  MODIFY `id_simpan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rating_buku`
--
ALTER TABLE `rating_buku`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `riwayat_baca`
--
ALTER TABLE `riwayat_baca`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `scan_barcode`
--
ALTER TABLE `scan_barcode`
  MODIFY `id_scan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings_user`
--
ALTER TABLE `settings_user`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Constraints for table `buku_tersimpan`
--
ALTER TABLE `buku_tersimpan`
  ADD CONSTRAINT `buku_tersimpan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE,
  ADD CONSTRAINT `buku_tersimpan_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE CASCADE;

--
-- Constraints for table `rating_buku`
--
ALTER TABLE `rating_buku`
  ADD CONSTRAINT `rating_buku_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `rating_buku_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`);

--
-- Constraints for table `riwayat_baca`
--
ALTER TABLE `riwayat_baca`
  ADD CONSTRAINT `riwayat_baca_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `riwayat_baca_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`);

--
-- Constraints for table `scan_barcode`
--
ALTER TABLE `scan_barcode`
  ADD CONSTRAINT `scan_barcode_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `settings_user`
--
ALTER TABLE `settings_user`
  ADD CONSTRAINT `settings_user_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
