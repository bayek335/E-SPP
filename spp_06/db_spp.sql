-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Feb 2021 pada 18.05
-- Versi server: 10.1.34-MariaDB
-- Versi PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(10) NOT NULL,
  `kompetensi_keahlian` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `nama_kelas`, `kompetensi_keahlian`) VALUES
(2, 'XIIRPL1', 'Rekayasa Perangkat Lunak'),
(3, 'XEI2', 'Teknik Elektronik Industri'),
(5, 'XIEI1', 'Teknik Elektronik Industri'),
(7, 'XIIRPL2', 'Rekayasa Perangkat Lunak'),
(8, 'XIITKR1', 'Teknik Kendaraan Ringan'),
(15, 'XIITKJ1', 'Teknik Komputer dan Jaringan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `nisn` char(10) NOT NULL,
  `tgl_bayar` datetime NOT NULL,
  `bulan_dibayar` varchar(16) NOT NULL,
  `tahun_bayar` varchar(4) NOT NULL,
  `id_spp` int(11) NOT NULL,
  `jml_bayar` int(11) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id_pembayaran`, `id_petugas`, `nisn`, `tgl_bayar`, `bulan_dibayar`, `tahun_bayar`, `id_spp`, `jml_bayar`, `status`) VALUES
(61, 5, '1332', '2021-02-28 08:30:13', 'Januari', '2021', 3, 120000, 'Lunas'),
(62, 5, '1332', '2021-02-28 08:35:49', 'Februari', '2021', 3, 120000, 'Lunas'),
(63, 5, '1332', '2021-02-28 08:44:55', 'Maret', '2021', 3, 120000, 'Lunas'),
(64, 12, '1332', '2021-02-28 06:05:31', 'April', '2021', 3, 120000, 'Lunas'),
(65, 0, '1332', '0000-00-00 00:00:00', 'Mei', '', 3, 0, 'Belum Bayar'),
(66, 0, '1332', '0000-00-00 00:00:00', 'Juni', '', 3, 0, 'Belum Bayar'),
(67, 0, '1332', '0000-00-00 00:00:00', 'Juli', '', 3, 0, 'Belum Bayar'),
(68, 0, '1332', '0000-00-00 00:00:00', 'Agustus', '', 3, 0, 'Belum Bayar'),
(69, 0, '1332', '0000-00-00 00:00:00', 'September', '', 3, 0, 'Belum Bayar'),
(70, 0, '1332', '0000-00-00 00:00:00', 'Oktober', '', 3, 0, 'Belum Bayar'),
(71, 0, '1332', '0000-00-00 00:00:00', 'November', '', 3, 0, 'Belum Bayar'),
(72, 0, '1332', '0000-00-00 00:00:00', 'Desember', '', 3, 0, 'Belum Bayar'),
(73, 5, '1123', '2021-02-28 03:50:36', 'Januari', '2021', 2, 120000, 'Lunas'),
(74, 5, '1123', '2021-02-28 08:23:47', 'Februari', '2021', 2, 120000, 'Lunas'),
(75, 0, '1123', '0000-00-00 00:00:00', 'Maret', '', 2, 0, 'Belum Bayar'),
(76, 0, '1123', '0000-00-00 00:00:00', 'April', '', 2, 0, 'Belum Bayar'),
(77, 0, '1123', '0000-00-00 00:00:00', 'Mei', '', 2, 0, 'Belum Bayar'),
(78, 0, '1123', '0000-00-00 00:00:00', 'Juni', '', 2, 0, 'Belum Bayar'),
(79, 0, '1123', '0000-00-00 00:00:00', 'Juli', '', 2, 0, 'Belum Bayar'),
(80, 0, '1123', '0000-00-00 00:00:00', 'Agustus', '', 2, 0, 'Belum Bayar'),
(81, 0, '1123', '0000-00-00 00:00:00', 'September', '', 2, 0, 'Belum Bayar'),
(82, 0, '1123', '0000-00-00 00:00:00', 'Oktober', '', 2, 0, 'Belum Bayar'),
(83, 0, '1123', '0000-00-00 00:00:00', 'November', '', 2, 0, 'Belum Bayar'),
(84, 0, '1123', '0000-00-00 00:00:00', 'Desember', '', 2, 0, 'Belum Bayar'),
(85, 0, '1223', '0000-00-00 00:00:00', 'Januari', '', 3, 0, 'Belum Bayar'),
(86, 0, '1223', '0000-00-00 00:00:00', 'Februari', '', 3, 0, 'Belum Bayar'),
(87, 0, '1223', '0000-00-00 00:00:00', 'Maret', '', 3, 0, 'Belum Bayar'),
(88, 0, '1223', '0000-00-00 00:00:00', 'April', '', 3, 0, 'Belum Bayar'),
(89, 0, '1223', '0000-00-00 00:00:00', 'Mei', '', 3, 0, 'Belum Bayar'),
(90, 0, '1223', '0000-00-00 00:00:00', 'Juni', '', 3, 0, 'Belum Bayar'),
(91, 0, '1223', '0000-00-00 00:00:00', 'Juli', '', 3, 0, 'Belum Bayar'),
(92, 0, '1223', '0000-00-00 00:00:00', 'Agustus', '', 3, 0, 'Belum Bayar'),
(93, 0, '1223', '0000-00-00 00:00:00', 'September', '', 3, 0, 'Belum Bayar'),
(94, 0, '1223', '0000-00-00 00:00:00', 'Oktober', '', 3, 0, 'Belum Bayar'),
(95, 0, '1223', '0000-00-00 00:00:00', 'November', '', 3, 0, 'Belum Bayar'),
(96, 0, '1223', '0000-00-00 00:00:00', 'Desember', '', 3, 0, 'Belum Bayar'),
(97, 0, '13232', '0000-00-00 00:00:00', 'Januari', '', 2, 0, 'Belum Bayar'),
(98, 0, '13232', '0000-00-00 00:00:00', 'Februari', '', 2, 0, 'Belum Bayar'),
(99, 0, '13232', '0000-00-00 00:00:00', 'Maret', '', 2, 0, 'Belum Bayar'),
(100, 0, '13232', '0000-00-00 00:00:00', 'April', '', 2, 0, 'Belum Bayar'),
(101, 0, '13232', '0000-00-00 00:00:00', 'Mei', '', 2, 0, 'Belum Bayar'),
(102, 0, '13232', '0000-00-00 00:00:00', 'Juni', '', 2, 0, 'Belum Bayar'),
(103, 0, '13232', '0000-00-00 00:00:00', 'Juli', '', 2, 0, 'Belum Bayar'),
(104, 0, '13232', '0000-00-00 00:00:00', 'Agustus', '', 2, 0, 'Belum Bayar'),
(105, 0, '13232', '0000-00-00 00:00:00', 'September', '', 2, 0, 'Belum Bayar'),
(106, 0, '13232', '0000-00-00 00:00:00', 'Oktober', '', 2, 0, 'Belum Bayar'),
(107, 0, '13232', '0000-00-00 00:00:00', 'November', '', 2, 0, 'Belum Bayar'),
(108, 0, '13232', '0000-00-00 00:00:00', 'Desember', '', 2, 0, 'Belum Bayar'),
(109, 0, '123453', '0000-00-00 00:00:00', 'Januari', '', 3, 0, 'Belum Bayar'),
(110, 0, '123453', '0000-00-00 00:00:00', 'Februari', '', 3, 0, 'Belum Bayar'),
(111, 0, '123453', '0000-00-00 00:00:00', 'Maret', '', 3, 0, 'Belum Bayar'),
(112, 0, '123453', '0000-00-00 00:00:00', 'April', '', 3, 0, 'Belum Bayar'),
(113, 0, '123453', '0000-00-00 00:00:00', 'Mei', '', 3, 0, 'Belum Bayar'),
(114, 0, '123453', '0000-00-00 00:00:00', 'Juni', '', 3, 0, 'Belum Bayar'),
(115, 0, '123453', '0000-00-00 00:00:00', 'Juli', '', 3, 0, 'Belum Bayar'),
(116, 0, '123453', '0000-00-00 00:00:00', 'Agustus', '', 3, 0, 'Belum Bayar'),
(117, 0, '123453', '0000-00-00 00:00:00', 'September', '', 3, 0, 'Belum Bayar'),
(118, 0, '123453', '0000-00-00 00:00:00', 'Oktober', '', 3, 0, 'Belum Bayar'),
(119, 0, '123453', '0000-00-00 00:00:00', 'November', '', 3, 0, 'Belum Bayar'),
(120, 0, '123453', '0000-00-00 00:00:00', 'Desember', '', 3, 0, 'Belum Bayar'),
(121, 5, '112321', '2021-01-27 06:55:15', 'Januari', '2021', 3, 150000, 'Lunas'),
(122, 0, '112321', '0000-00-00 00:00:00', 'Februari', '', 3, 0, 'Belum Bayar'),
(123, 0, '112321', '0000-00-00 00:00:00', 'Maret', '', 3, 0, 'Belum Bayar'),
(124, 0, '112321', '0000-00-00 00:00:00', 'April', '', 3, 0, 'Belum Bayar'),
(125, 0, '112321', '0000-00-00 00:00:00', 'Mei', '', 3, 0, 'Belum Bayar'),
(126, 0, '112321', '0000-00-00 00:00:00', 'Juni', '', 3, 0, 'Belum Bayar'),
(127, 0, '112321', '0000-00-00 00:00:00', 'Juli', '', 3, 0, 'Belum Bayar'),
(128, 0, '112321', '0000-00-00 00:00:00', 'Agustus', '', 3, 0, 'Belum Bayar'),
(129, 0, '112321', '0000-00-00 00:00:00', 'September', '', 3, 0, 'Belum Bayar'),
(130, 0, '112321', '0000-00-00 00:00:00', 'Oktober', '', 3, 0, 'Belum Bayar'),
(131, 0, '112321', '0000-00-00 00:00:00', 'November', '', 3, 0, 'Belum Bayar'),
(132, 0, '112321', '0000-00-00 00:00:00', 'Desember', '', 3, 0, 'Belum Bayar'),
(133, 5, '122123', '2021-02-28 11:43:28', 'Januari', '2021', 3, 120000, 'Lunas'),
(134, 5, '122123', '2021-02-28 01:56:42', 'Februari', '2021', 3, 120000, 'Lunas'),
(135, 0, '122123', '0000-00-00 00:00:00', 'Maret', '', 3, 0, 'Belum Bayar'),
(136, 0, '122123', '0000-00-00 00:00:00', 'April', '', 3, 0, 'Belum Bayar'),
(137, 0, '122123', '0000-00-00 00:00:00', 'Mei', '', 3, 0, 'Belum Bayar'),
(138, 0, '122123', '0000-00-00 00:00:00', 'Juni', '', 3, 0, 'Belum Bayar'),
(139, 0, '122123', '0000-00-00 00:00:00', 'Juli', '', 3, 0, 'Belum Bayar'),
(140, 0, '122123', '0000-00-00 00:00:00', 'Agustus', '', 3, 0, 'Belum Bayar'),
(141, 0, '122123', '0000-00-00 00:00:00', 'September', '', 3, 0, 'Belum Bayar'),
(142, 0, '122123', '0000-00-00 00:00:00', 'Oktober', '', 3, 0, 'Belum Bayar'),
(143, 0, '122123', '0000-00-00 00:00:00', 'November', '', 3, 0, 'Belum Bayar'),
(144, 0, '122123', '0000-00-00 00:00:00', 'Desember', '', 3, 0, 'Belum Bayar'),
(145, 5, '123231', '2021-01-28 08:49:23', 'Januari', '2021', 3, 120000, 'Lunas'),
(146, 12, '123231', '2021-02-28 08:52:06', 'Februari', '2021', 3, 120000, 'Lunas'),
(147, 0, '123231', '0000-00-00 00:00:00', 'Maret', '', 3, 0, 'Belum Bayar'),
(148, 0, '123231', '0000-00-00 00:00:00', 'April', '', 3, 0, 'Belum Bayar'),
(149, 0, '123231', '0000-00-00 00:00:00', 'Mei', '', 3, 0, 'Belum Bayar'),
(150, 0, '123231', '0000-00-00 00:00:00', 'Juni', '', 3, 0, 'Belum Bayar'),
(151, 0, '123231', '0000-00-00 00:00:00', 'Juli', '', 3, 0, 'Belum Bayar'),
(152, 0, '123231', '0000-00-00 00:00:00', 'Agustus', '', 3, 0, 'Belum Bayar'),
(153, 0, '123231', '0000-00-00 00:00:00', 'September', '', 3, 0, 'Belum Bayar'),
(154, 0, '123231', '0000-00-00 00:00:00', 'Oktober', '', 3, 0, 'Belum Bayar'),
(155, 0, '123231', '0000-00-00 00:00:00', 'November', '', 3, 0, 'Belum Bayar'),
(156, 0, '123231', '0000-00-00 00:00:00', 'Desember', '', 3, 0, 'Belum Bayar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_pengguna` varchar(25) NOT NULL,
  `kata_sandi` varchar(126) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `level` enum('admin','petugas','siswa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_petugas`
--

INSERT INTO `tb_petugas` (`id_petugas`, `nama_pengguna`, `kata_sandi`, `nama`, `level`) VALUES
(5, 'admin', '$2y$10$66FjEyFIMeRRDCbFV8TA9utH7t1WgKkbmnbCfyhYPy1VMLHQvRcE6', 'Sunarto', 'admin'),
(10, 'siswa', '$2y$10$QxhiVQR954h2XP2sUoFK7udNhSdT2plxHYgplOqY5/XR3sBIK/FES', 'Pamungkas', 'siswa'),
(12, 'petugas', '$2y$10$VjtBQP18Vz0.Tg730mqD0.WBzp6m.Pv.jwdCha6/YOvbkg2Jciidi', 'Marno', 'petugas'),
(13, 'xiirpl106', '$2y$10$Z.0kfUFf.CFOUAo9IEWLoexShqDY63HXH/An667kdvhg/VgNnCMU2', 'Bayu Pamungkas', 'siswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `nisn` char(10) NOT NULL,
  `nis` char(8) NOT NULL,
  `nama_siswa` varchar(35) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `id_spp` int(11) NOT NULL,
  `status_siswa` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`nisn`, `nis`, `nama_siswa`, `id_kelas`, `alamat`, `no_telp`, `id_spp`, `status_siswa`) VALUES
('1123', '1123', 'Marni Sumarni', 7, 'mlg', '088767', 2, 'siswa'),
('122123', '122123', 'Sangkuriang Baru', 3, 'malang', '087859', 3, 'siswa'),
('1223', '1223', 'Maman Surahman', 7, 'ghg', '0909', 3, 'siswa'),
('123231', '12321', 'Sangkuriang', 8, 'aceh', '087856953', 3, 'siswa'),
('123453', '123453', 'Ujang Subandi', 5, 'mlg', '+628', 3, 'siswa'),
('13232', '13232', 'Ujang Sumajang', 3, 'lmjg', '088787', 2, 'siswa'),
('1332', '1332', 'Ifaf Fafih', 8, 'bdg', '088787', 3, 'siswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_spp`
--

CREATE TABLE `tb_spp` (
  `id_spp` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `keterangan` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_spp`
--

INSERT INTO `tb_spp` (`id_spp`, `tahun`, `nominal`, `keterangan`) VALUES
(2, 20202021, 120000, 'Keringanan'),
(3, 20212022, 120000, 'Keringanan'),
(4, 20202021, 150000, 'Penuh');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tanggungan`
--

CREATE TABLE `tb_tanggungan` (
  `id_tanggungan` int(11) NOT NULL,
  `nisn` int(11) NOT NULL,
  `id_spp` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `jml_tanggungan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD UNIQUE KEY `nama_kelas` (`nama_kelas`);

--
-- Indeks untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_petugas` (`id_petugas`),
  ADD KEY `nisn` (`nisn`),
  ADD KEY `id_spp` (`id_spp`);

--
-- Indeks untuk tabel `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`nisn`),
  ADD UNIQUE KEY `nis` (`nis`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_spp` (`id_spp`);

--
-- Indeks untuk tabel `tb_spp`
--
ALTER TABLE `tb_spp`
  ADD PRIMARY KEY (`id_spp`);

--
-- Indeks untuk tabel `tb_tanggungan`
--
ALTER TABLE `tb_tanggungan`
  ADD PRIMARY KEY (`id_tanggungan`),
  ADD UNIQUE KEY `nisn` (`nisn`),
  ADD KEY `id_spp` (`id_spp`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT untuk tabel `tb_petugas`
--
ALTER TABLE `tb_petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tb_spp`
--
ALTER TABLE `tb_spp`
  MODIFY `id_spp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_tanggungan`
--
ALTER TABLE `tb_tanggungan`
  MODIFY `id_tanggungan` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
