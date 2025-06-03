-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jun 2025 pada 08.48
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
-- Database: `jemkar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailpekerjaan`
--

CREATE TABLE `detailpekerjaan` (
  `idDetailPekerjaan` int(11) NOT NULL,
  `idPekerjaan` int(11) DEFAULT NULL,
  `deskripsiPekerjaan` text DEFAULT NULL,
  `batasLamaran` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `formpelamar`
--

CREATE TABLE `formpelamar` (
  `idPelamar` int(11) NOT NULL,
  `idPengguna` int(11) NOT NULL,
  `idPekerjaan` int(11) NOT NULL,
  `idPerusahaan` int(11) NOT NULL,
  `namaDepan` varchar(50) NOT NULL,
  `namaBelakang` varchar(50) NOT NULL,
  `tglLahir` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `nomorHP` varchar(20) NOT NULL,
  `cv` varchar(50) NOT NULL,
  `portofolio` varchar(50) NOT NULL,
  `suratLamaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `idPekerjaan` int(11) NOT NULL,
  `idPerusahaan` int(11) DEFAULT NULL,
  `namaPekerjaan` varchar(40) NOT NULL,
  `kategoriPekerjaan` varchar(20) NOT NULL,
  `lokasi` varchar(20) NOT NULL,
  `jenisPekerjaan` varchar(20) NOT NULL,
  `gaji` varchar(20) DEFAULT 'negosisasi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `idPengguna` int(11) NOT NULL,
  `emailPengguna` varchar(70) NOT NULL,
  `namaPengguna` varchar(40) NOT NULL,
  `passwordPengguna` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `perusahaan`
--

CREATE TABLE `perusahaan` (
  `idPerusahaan` int(11) NOT NULL,
  `emailPerusahaan` varchar(255) NOT NULL,
  `namaPerusahaan` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `alamatPerusahaan` varchar(60) NOT NULL,
  `industri` varchar(20) NOT NULL,
  `ukuranPerusahaan` varchar(20) NOT NULL,
  `logoPerusahaan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `syaratkualifikasi`
--

CREATE TABLE `syaratkualifikasi` (
  `idSyaratKualifikasi` int(11) NOT NULL,
  `idDetailPekerjaan` int(11) DEFAULT NULL,
  `kualifikasi` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas`
--

CREATE TABLE `tugas` (
  `idTugas` int(11) NOT NULL,
  `idDetailPekerjaan` int(11) DEFAULT NULL,
  `tugas` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detailpekerjaan`
--
ALTER TABLE `detailpekerjaan`
  ADD PRIMARY KEY (`idDetailPekerjaan`),
  ADD KEY `fkdetailpekerjaan` (`idPekerjaan`);

--
-- Indeks untuk tabel `formpelamar`
--
ALTER TABLE `formpelamar`
  ADD PRIMARY KEY (`idPelamar`),
  ADD KEY `idPengguna` (`idPengguna`),
  ADD KEY `idPekerjaan` (`idPekerjaan`),
  ADD KEY `idPerusahaan` (`idPerusahaan`);

--
-- Indeks untuk tabel `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`idPekerjaan`),
  ADD KEY `idPerusahaan` (`idPerusahaan`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`idPengguna`);

--
-- Indeks untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`idPerusahaan`);

--
-- Indeks untuk tabel `syaratkualifikasi`
--
ALTER TABLE `syaratkualifikasi`
  ADD PRIMARY KEY (`idSyaratKualifikasi`),
  ADD KEY `fksyaratdetail` (`idDetailPekerjaan`);

--
-- Indeks untuk tabel `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`idTugas`),
  ADD KEY `fkdetailtugas` (`idDetailPekerjaan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detailpekerjaan`
--
ALTER TABLE `detailpekerjaan`
  MODIFY `idDetailPekerjaan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `formpelamar`
--
ALTER TABLE `formpelamar`
  MODIFY `idPelamar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `idPekerjaan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `idPengguna` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `idPerusahaan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `syaratkualifikasi`
--
ALTER TABLE `syaratkualifikasi`
  MODIFY `idSyaratKualifikasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tugas`
--
ALTER TABLE `tugas`
  MODIFY `idTugas` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detailpekerjaan`
--
ALTER TABLE `detailpekerjaan`
  ADD CONSTRAINT `detailpekerjaan_ibfk_1` FOREIGN KEY (`idPekerjaan`) REFERENCES `pekerjaan` (`idPekerjaan`),
  ADD CONSTRAINT `fkdetailpekerjaan` FOREIGN KEY (`idPekerjaan`) REFERENCES `pekerjaan` (`idPekerjaan`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `formpelamar`
--
ALTER TABLE `formpelamar`
  ADD CONSTRAINT `formpelamar_ibfk_1` FOREIGN KEY (`idPengguna`) REFERENCES `pengguna` (`idPengguna`),
  ADD CONSTRAINT `formpelamar_ibfk_2` FOREIGN KEY (`idPekerjaan`) REFERENCES `pekerjaan` (`idPekerjaan`),
  ADD CONSTRAINT `formpelamar_ibfk_3` FOREIGN KEY (`idPerusahaan`) REFERENCES `perusahaan` (`idPerusahaan`);

--
-- Ketidakleluasaan untuk tabel `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD CONSTRAINT `pekerjaan_ibfk_1` FOREIGN KEY (`idPerusahaan`) REFERENCES `perusahaan` (`idPerusahaan`);

--
-- Ketidakleluasaan untuk tabel `syaratkualifikasi`
--
ALTER TABLE `syaratkualifikasi`
  ADD CONSTRAINT `fksyaratdetail` FOREIGN KEY (`idDetailPekerjaan`) REFERENCES `detailpekerjaan` (`idDetailPekerjaan`) ON DELETE CASCADE,
  ADD CONSTRAINT `syaratkualifikasi_ibfk_1` FOREIGN KEY (`idDetailPekerjaan`) REFERENCES `detailpekerjaan` (`idDetailPekerjaan`);

--
-- Ketidakleluasaan untuk tabel `tugas`
--
ALTER TABLE `tugas`
  ADD CONSTRAINT `fkdetailtugas` FOREIGN KEY (`idDetailPekerjaan`) REFERENCES `detailpekerjaan` (`idDetailPekerjaan`) ON DELETE CASCADE,
  ADD CONSTRAINT `tugas_ibfk_1` FOREIGN KEY (`idDetailPekerjaan`) REFERENCES `detailpekerjaan` (`idDetailPekerjaan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
