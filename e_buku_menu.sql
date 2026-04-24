-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jan 2026 pada 16.31
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_buku_menu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `extra_menu`
--

CREATE TABLE `extra_menu` (
  `idproduk` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `extra_menu`
--

INSERT INTO `extra_menu` (`idproduk`, `nama`, `harga`) VALUES
(9, 'es', 1000),
(9, 'hangat', 0),
(8, 'tempe', 1500),
(7, 'sambel goreng', 0), 
(7, 'tahu', 1000),
(6, 'sambal goreng', 0),
(6, 'sambal terasi', 0),
(6, 'tahu', 1000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `idproduk` int(11) NOT NULL,
  `namaproduk` varchar(100) NOT NULL,
  `hargaproduk` int(11) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `kategori` enum('Makanan','Minuman') NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`idproduk`, `namaproduk`, `hargaproduk`, `deskripsi`, `foto`, `kategori`, `createdat`) VALUES
(6, 'Nasi paket ayam goreng', 10000, 'nasi + ayam', '1680998059.jpg', 'Makanan', '2023-04-08 21:34:45'),
(7, 'Nasi paket ayam bakar', 15000, 'nasi + ayam + lalapan', '1680998052.jpg', 'Makanan', '2023-04-08 21:35:20'),
(8, 'Nasi paket ayam geprek', 20000, 'nasi + ayam + lalapan + sambel', '1680998044.jpg', 'Makanan', '2023-04-08 21:35:50'),
(9, 'Teh Manis', 3000, 'teh manis', 'sorin-popa-F6zJEnVv6to-unsplash.jpg', 'Minuman', '2023-04-08 21:36:29'),
(14, 'nasi', 5000, 'nasi', '1680998036.jpg', 'Makanan', '2023-04-08 23:42:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `qrcode`
--

CREATE TABLE `qrcode` (
  `idqrcode` int(11) NOT NULL,
  `url` varchar(50) NOT NULL,
  `qrname` varchar(50) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `qrcode`
--

INSERT INTO `qrcode` (`idqrcode`, `url`, `qrname`, `createdat`) VALUES
(3, 'http://localhost/ebukumenu', '1680986488.png', '2023-04-08 20:41:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullName` text DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_login` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `fullName`, `username`, `password`, `created_at`, `last_login`) VALUES
(2, 'korik', 'korik123@gmail.com', '$2y$10$lF1hXYDbOsnGh2c6OQGlmu1I9tS6aTbzZLdI1yeUacuwH.8.Wn8QG', '2026-01-04 08:59:16', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`idproduk`);

--
-- Indeks untuk tabel `qrcode`
--
ALTER TABLE `qrcode`
  ADD PRIMARY KEY (`idqrcode`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `idproduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `qrcode`
--
ALTER TABLE `qrcode`
  MODIFY `idqrcode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
