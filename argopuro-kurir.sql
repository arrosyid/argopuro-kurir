-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Bulan Mei 2021 pada 03.51
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `argopuro-kurir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `awal_pesanan`
--

CREATE TABLE `awal_pesanan` (
  `id_pesanan` varchar(15) NOT NULL,
  `nm_pengirim` varchar(128) NOT NULL,
  `alamat_pengirim` varchar(255) NOT NULL,
  `no_HP_pengirim` varchar(13) NOT NULL,
  `ket_alamat_pengirim` varchar(255) NOT NULL,
  `bank` varchar(128) NOT NULL,
  `no_rek` varchar(15) NOT NULL,
  `atas_nama` varchar(255) NOT NULL,
  `nm_penerima` varchar(128) NOT NULL,
  `alamat_penerima` varchar(255) NOT NULL,
  `no_HP_penerima` varchar(13) NOT NULL,
  `ket_alamat_penerima` varchar(255) NOT NULL,
  `ket_barang` varchar(255) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `berat_barang` int(3) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `date_created` int(11) NOT NULL,
  `jenis_antar` varchar(2) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `awal_pesanan`
--

INSERT INTO `awal_pesanan` (`id_pesanan`, `nm_pengirim`, `alamat_pengirim`, `no_HP_pengirim`, `ket_alamat_pengirim`, `bank`, `no_rek`, `atas_nama`, `nm_penerima`, `alamat_penerima`, `no_HP_penerima`, `ket_alamat_penerima`, `ket_barang`, `harga_barang`, `berat_barang`, `ongkir`, `date_created`, `jenis_antar`, `status`) VALUES
('ARK607e5b1340e1', 'fadila', 'kebonsari', '', 'Tidak ada', '', '', '', 'lili', 'tawang alun', '', 'Tidak ada', 'buah', 30000, 1, 6500, 1618893801, 'E', 3),
('ARK607e5be95697', 'syabil olshop', 'talangsari', '', 'Tidak ada', '', '', '', 'sulistyowati', 'panti', '', 'Tidak ada', 'tas', 38000, 1, 6500, 1618893995, 'E', 3),
('ARK607e5f7324dd', 'nurul', 'tanggul', '', 'Tidak ada', '', '', '', 'nunki indriani', 'kebonsari', '', 'Tidak ada', 'hijab', 67000, 1, 6500, 1618894858, 'E', 4),
('ARK607e62921287', 'mulshop', 'jombang', '', 'Tidak ada', '', '', '', 'ita p', 'ajung', '', 'Tidak ada', 'case', 29000, 1, 6500, 1618895616, 'E', 3),
('ARK607e64843310', 'nabila', 'sukorambj', '', 'Tidak ada', '', '', '', 'sheila dina', 'ledokombo', '', 'Tidak ada', 'tas', 68000, 1, 6500, 1618906568, 'E', 3),
('ARK607e670ae61a', 'wahyu', 'mumbulsari', '', 'Tidak ada', '', '', '', 'riani', 'panti', '', 'Tidak ada', 'pakaian', 110000, 1, 6500, 1618903051, 'E', 3),
('ARK607e68a12046', 'chalimatus.', 'sukorambj', '', 'Tidak ada', '', '', '', 'dewi', 'ajung', '', 'Tidak ada', 'kosmetik', 50000, 1, 6500, 1618902572, 'E', 3),
('ARK607e6a3ec3ea', 'latifa', 'antirogo', '', 'Tidak ada', '', '', '', 'siti', 'ledokombo', '', 'Tidak ada', 'kosmetik', 100000, 1, 6500, 1618897690, 'E', 3),
('ARK607e83eb2514', 'ummah zaka', 'ledokombo', '', 'Tidak ada', '', '', '', 'indri', 'rambipuji', '', 'Tidak ada', 'pakaian', 133000, 1, 6500, 1618904282, 'E', 3),
('ARK607f8b601643', 'fathir', 'kalisat', '', 'Tidak ada', '', '', '', 'desi i', 'ajung', '', 'Tidak ada', 'pakaian', 132000, 1, 6500, 1618972471, 'E', 1),
('ARK607fa6f53305', 'nabila s', 'sukorambi', '', 'Tidak ada', '', '', '', 'nur yuni', 'semboro', '', 'Tidak ada', 'karpet', 150000, 2, 13000, 1618978823, 'E', 1),
('ARK607fa807d573', 'widay', 'umbulsari', '', 'Tidak ada', '', '', '', 'diana e', 'puger', '', 'Tidak ada', 'alat rumah tangga', 85000, 1, 6500, 1618979328, 'E', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerima`
--

CREATE TABLE `penerima` (
  `id_penerima` int(11) NOT NULL,
  `nm_penerima` varchar(128) NOT NULL,
  `alamat_penerima` varchar(255) NOT NULL,
  `no_HP_penerima` varchar(13) NOT NULL,
  `lokasi_penerima` varchar(255) NOT NULL,
  `ket_alamat_penerima` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengirim`
--

CREATE TABLE `pengirim` (
  `id_pengirim` int(11) NOT NULL,
  `nm_pengirim` varchar(128) NOT NULL,
  `alamat_pengirim` varchar(255) NOT NULL,
  `no_HP_pengirim` varchar(13) NOT NULL,
  `lokasi_pengirim` varchar(255) NOT NULL,
  `ket_alamat_pengirim` varchar(255) NOT NULL,
  `no_rek` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` varchar(15) NOT NULL,
  `id_penerima` int(11) NOT NULL,
  `id_pengirim` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `date_created` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `jenis_antar` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `token`
--

CREATE TABLE `token` (
  `id_token` int(11) NOT NULL,
  `token` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `token`
--

INSERT INTO `token` (`id_token`, `token`, `email`, `date_created`) VALUES
(5, '16050ba7acfdfe', 'usaylatul@gmail.com', 1615903354);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_create` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `picture`, `level`, `is_active`, `date_create`) VALUES
(4, 'admin', '$2y$10$zv2pQDNmOsL04wiFrk2kdONHPXx9dA1xmZWsRQEyROsddhomkf8gW', 'admin@mail.com', '', '2', 1, 1614258115);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `awal_pesanan`
--
ALTER TABLE `awal_pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
