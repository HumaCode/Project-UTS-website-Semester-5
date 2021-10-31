-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Okt 2021 pada 14.31
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_uts`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nm_depan` varchar(125) NOT NULL,
  `nm_belakang` varchar(125) NOT NULL,
  `username` varchar(125) NOT NULL,
  `email` varchar(125) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `role` enum('Admin','Petugas') NOT NULL,
  `date_created` int(11) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nm_depan`, `nm_belakang`, `username`, `email`, `password`, `foto`, `role`, `date_created`, `is_active`) VALUES
(1, 'Humaidi', 'Zakaria', 'admin', 'admin@gmail.com', '$2y$10$24baFadGsmkbOccdiW.aEOtBssGKsneZyQZ4et8LMYiBV6DoUZhl2', 'default.svg', 'Admin', 1635681309, 1),
(2, 'user', 'satu', 'user1', 'user@user.com', '$2y$10$saWXVBdT4IAHeikWDKQo1.lweuPi83CSpt36Nn70Bu0CTaioYPBRa', 'default.svg', 'Petugas', 1635682034, 1),
(3, 'User', 'Dua', 'user2', 'user2@gmail.com', '$2y$10$Nylklm2kS9/MjbQZGD0/yO5iBXiPvDKs8eJXQotlS3cH3maBMidEy', 'default.svg', 'Petugas', 1635682080, 1),
(4, 'User', 'Tiga', 'user3', 'user3@gmail.com', '$2y$10$wosy/8TptYNxbKqjHtBh4OmhXm3VJ80RgJZioGdDyy7LIzvvth9MG', 'default.svg', 'Petugas', 1635682108, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
