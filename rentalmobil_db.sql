-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Agu 2021 pada 08.29
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentalmobil_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `driver`
--

CREATE TABLE `driver` (
  `id_driver` int(11) NOT NULL,
  `nama_driver` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `alamat_driver` varchar(128) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gambar_driver` varchar(128) NOT NULL,
  `status_driver` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `driver`
--

INSERT INTO `driver` (`id_driver`, `nama_driver`, `jenis_kelamin`, `alamat_driver`, `no_hp`, `email`, `gambar_driver`, `status_driver`) VALUES
(14, 'Ujang m', 'laki-laki', 'Perum. Megaregency blok FK-3 No. 17 Des. Sukaragam Kec. Serang Baru - Bekasi', '09211098879', 'ujang@gmail.com', 'catur.jpg', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id_kendaraan` int(11) NOT NULL,
  `nama_kendaraan` varchar(50) NOT NULL,
  `jenis_kendaraan` varchar(50) NOT NULL,
  `sheet` varchar(5) NOT NULL,
  `no_polisi` varchar(20) NOT NULL,
  `harga_sewa` varchar(20) NOT NULL,
  `tahun_pembuatan` date NOT NULL,
  `tgl_ganti_oli` date NOT NULL,
  `tgl_ganti_ban` date NOT NULL,
  `tgl_service` date NOT NULL,
  `tgl_bayar_pajak` date NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `status_kendaraan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kendaraan`
--

INSERT INTO `kendaraan` (`id_kendaraan`, `nama_kendaraan`, `jenis_kendaraan`, `sheet`, `no_polisi`, `harga_sewa`, `tahun_pembuatan`, `tgl_ganti_oli`, `tgl_ganti_ban`, `tgl_service`, `tgl_bayar_pajak`, `gambar`, `status_kendaraan`) VALUES
(9, 'KOSUB', 'bus', '60', 'F 988784 YZA', '3200000', '2010-06-30', '2021-12-30', '2021-12-31', '2021-12-30', '2022-05-31', 'kosub.jpg', 'siap'),
(10, 'Budiman', 'bus', '35', 'B 76886 TYH', '1200000', '2015-06-24', '2021-07-29', '2021-07-16', '2021-07-21', '2021-07-22', 'kosub1.jpg', 'siap');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kernek`
--

CREATE TABLE `kernek` (
  `id_kernek` int(11) NOT NULL,
  `nama_kernek` varchar(50) NOT NULL,
  `jenkel_kernek` varchar(15) NOT NULL,
  `alamat_kernek` varchar(128) NOT NULL,
  `tlp_kernek` varchar(20) NOT NULL,
  `status_kernek` varchar(10) NOT NULL,
  `gambar_kernek` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kernek`
--

INSERT INTO `kernek` (`id_kernek`, `nama_kernek`, `jenkel_kernek`, `alamat_kernek`, `tlp_kernek`, `status_kernek`, `gambar_kernek`) VALUES
(1, 'maman a', 'laki-laki', 'ccianjur', '097987', '1', 'bm2.jpg'),
(2, 'Pahruroji', 'laki-laki', 'Cikijing', '08787885657', '1', 'ctr.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemasukan`
--

CREATE TABLE `pemasukan` (
  `id_pemasukan` int(11) NOT NULL,
  `tgl_input` varchar(20) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `uang_muka` int(11) NOT NULL,
  `pelunasan` int(11) NOT NULL,
  `id_pelanggan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemasukan`
--

INSERT INTO `pemasukan` (`id_pemasukan`, `tgl_input`, `id_transaksi`, `uang_muka`, `pelunasan`, `id_pelanggan`) VALUES
(43, '2021-08-06', 49, 11000000, 0, 'KOSUB000049'),
(47, '2021-08-07', 51, 500000, 0, 'KOSUB000050');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_pengeluaran` int(11) NOT NULL,
  `tgl_input` varchar(20) NOT NULL,
  `keterangan` varchar(128) NOT NULL,
  `nominal` varchar(20) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_pengeluaran`, `tgl_input`, `keterangan`, `nominal`, `id_transaksi`, `id_user`) VALUES
(27, '2021-08-07', 'uang jalan, komisi kernek dan sopir', '300000', 49, 0),
(28, '2021-08-07', 'uang jalan, komisi kernek dan sopir', '350000', 51, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_pelanggan` varchar(20) NOT NULL,
  `tgl_transaksi` varchar(20) NOT NULL,
  `nama_pemesan` varchar(50) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `no_tlp` varchar(20) NOT NULL,
  `keperluan` varchar(128) NOT NULL,
  `jml_bus` int(11) NOT NULL,
  `bus_dikirim` varchar(128) NOT NULL,
  `tempat_tujuan` varchar(128) NOT NULL,
  `tgl_berangkat` varchar(20) NOT NULL,
  `jam` varchar(10) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `total_harga` int(11) NOT NULL,
  `uang_muka` int(11) NOT NULL,
  `sisa_pembayaran` int(11) NOT NULL,
  `pelunasan` int(11) NOT NULL,
  `uang_jalan` int(11) NOT NULL,
  `komisi_driver` int(11) NOT NULL,
  `komisi_kernek` int(11) NOT NULL,
  `nama_kernek` varchar(50) NOT NULL,
  `id_driver` int(11) NOT NULL,
  `id_kernek` int(11) NOT NULL,
  `id_kendaraan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pelanggan`, `tgl_transaksi`, `nama_pemesan`, `alamat`, `no_tlp`, `keperluan`, `jml_bus`, `bus_dikirim`, `tempat_tujuan`, `tgl_berangkat`, `jam`, `tgl_kembali`, `total_harga`, `uang_muka`, `sisa_pembayaran`, `pelunasan`, `uang_jalan`, `komisi_driver`, `komisi_kernek`, `nama_kernek`, `id_driver`, `id_kernek`, `id_kendaraan`, `id_user`, `status`) VALUES
(49, 'KOSUB000049', '06-08-2021 14:38:49', 'Wahidatul', 'Cilubang', '0979878', 'Wisata', 1, 'Kp. Jangari Cianjur', 'kawah putih bandung', '2021-08-07', '06:00', '2021-08-09', 12000000, 11000000, 1000000, 100000, 100000, 100000, 100000, '', 14, 1, 10, 0, 0),
(51, 'KOSUB000050', '07-08-2021 11:38:23', 'Imas', 'Cianjur', '087878', 'Wisata', 1, 'Kp Cikidang', 'Citambur', '2021-08-07', '09:00', '2021-08-08', 1000000, 500000, 500000, 0, 200000, 100000, 50000, '', 14, 2, 9, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(164) NOT NULL,
  `gambar` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `alamat`, `jenis_kelamin`, `email`, `no_hp`, `username`, `password`, `gambar`) VALUES
(6, 'admin', 'cileungsi', 'laki-laki', 'admin@gmail.com', '08766787766', 'admin', '$2y$10$Qc9VfuuQuc2U0lMXgpTBguyofDcvA9RaFVt1nZnd6H.FSP3TnPzkS', 'presentasi.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`id_driver`);

--
-- Indeks untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id_kendaraan`);

--
-- Indeks untuk tabel `kernek`
--
ALTER TABLE `kernek`
  ADD PRIMARY KEY (`id_kernek`);

--
-- Indeks untuk tabel `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD PRIMARY KEY (`id_pemasukan`);

--
-- Indeks untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `driver`
--
ALTER TABLE `driver`
  MODIFY `id_driver` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id_kendaraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `kernek`
--
ALTER TABLE `kernek`
  MODIFY `id_kernek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pemasukan`
--
ALTER TABLE `pemasukan`
  MODIFY `id_pemasukan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
