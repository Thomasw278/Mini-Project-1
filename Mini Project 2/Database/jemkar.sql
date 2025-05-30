-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Bulan Mei 2025 pada 18.48
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

--
-- Dumping data untuk tabel `detailpekerjaan`
--

INSERT INTO `detailpekerjaan` (`idDetailPekerjaan`, `idPekerjaan`, `deskripsiPekerjaan`, `batasLamaran`) VALUES
(2, 2, 'Beresiko dan Harus Virgin', '2025-06-06'),
(3, 3, 'UKDW, sebagai salah satu perguruan tinggi Kristen terkemuka di Indonesia yang telah berdiri sejak 1962, dikenal dengan komitmennya pada pendidikan yang berlandaskan kasih, keadilan, dan transformasi sosial. Sementara itu, PPPK Petra, yang menaungi lebih dari 38 unit sekolah dari tingkat TK hingga SMA sejak 1951 di Surabaya, telah menjadi rujukan pendidikan Kristen berkualitas di Indonesia Timur dan telah melahirkan ribuan lulusan berprestasi yang menghidupi iman dalam karya mereka.\r\nDalam acara ini, UKDW dipimpin oleh Rektor, Dr.-Ing. Wiyatiningsih, S.T., M.T., didampingi oleh Kepala Marketing Veronica Tiara, S.Kom., CPS, Staf Kerjasama Dalam Negeri Christina Angelina, S.I.Kom, dan Staf Promosi Hugo Christ, S.M.', '2025-05-30'),
(4, 4, 'Bersama tumbuh dan berkembang dengan UKDW', '2025-06-07'),
(5, 5, 'Perusahaan Sederhana dengan Gaji yang Fantastis tapi dengan resiko Organ dalammu akan hilang', '2025-05-30');

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

--
-- Dumping data untuk tabel `formpelamar`
--

INSERT INTO `formpelamar` (`idPelamar`, `idPengguna`, `idPekerjaan`, `idPerusahaan`, `namaDepan`, `namaBelakang`, `tglLahir`, `email`, `nomorHP`, `cv`, `portofolio`, `suratLamaran`) VALUES
(1, 1, 2, 2, 'Briggita Aprillia', 'Kuntari', '2025-05-31', 'aprilkuntari@gmail.com', '085747201855', 'bab14.pdf', '', ''),
(2, 2, 4, 3, 'Sugeng', 'Manalu', '2025-06-06', 'Sugeng@gmail.com', '07124124', 'Aktivitas Kelas JS2 (1).pdf', '', '');

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

--
-- Dumping data untuk tabel `pekerjaan`
--

INSERT INTO `pekerjaan` (`idPekerjaan`, `idPerusahaan`, `namaPekerjaan`, `kategoriPekerjaan`, `lokasi`, `jenisPekerjaan`, `gaji`) VALUES
(2, 2, 'Ternak Komodo Terbang', 'Pelayanan', 'Kyai Langeng', 'Full Time', '1 Miliyar'),
(3, 3, 'Dosen Bioteknologi', 'Pengajaran', 'Yogyakarta', 'Full TIme', '8 - 10 Juta'),
(4, 3, 'Dosen Fakultas Teknologi Informasi', 'Pengajaran', 'Yogyakarta', 'Full Time', '15-20 Juta'),
(5, 2, 'Ternak Kelelawar', 'Beresiko', 'PGRI', 'Full Time', '10 Trilliun');

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

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`idPengguna`, `emailPengguna`, `namaPengguna`, `passwordPengguna`) VALUES
(1, 'aprilkuntari@gmail.com', 'April Kuntari', 'cantik123'),
(2, 'Sugeng@gmail.com', 'Sugeng Manalu', 'halohalo');

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

--
-- Dumping data untuk tabel `perusahaan`
--

INSERT INTO `perusahaan` (`idPerusahaan`, `emailPerusahaan`, `namaPerusahaan`, `password`, `alamatPerusahaan`, `industri`, `ukuranPerusahaan`, `logoPerusahaan`) VALUES
(2, 'ptternakbiawak@gmail.com', 'PT Ternak Biawak', 'halohalo', 'Jalan Magelang KM 50 Muntilan', 'Pendidikan', '500 karyawan', 'LogoPerusahaan/PT Ternak Biawak.jpg'),
(3, 'UKDW@gmail.com', 'PT UKDW', 'ukdw2025', 'Jalan KH Wahidin Sudirohusodo', 'Pendidikan', '100 karyawan', 'LogoPerusahaan/PT UKDW.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `syaratkualifikasi`
--

CREATE TABLE `syaratkualifikasi` (
  `idSyaratKualifikasi` int(11) NOT NULL,
  `idDetailPekerjaan` int(11) DEFAULT NULL,
  `kualifikasi` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `syaratkualifikasi`
--

INSERT INTO `syaratkualifikasi` (`idSyaratKualifikasi`, `idDetailPekerjaan`, `kualifikasi`) VALUES
(3, 2, 'Virgin'),
(4, 2, '18 - 35 Tahun'),
(5, 3, 'Usia 18 - 35 Tahun'),
(6, 3, 'Bersedia Mengajar anak-anak soleh'),
(7, 3, 'berani tampil beda'),
(8, 4, 'usia 18 -25 Tahun'),
(9, 4, 'Bersedia hidup dalam tekanan'),
(10, 5, 'Usia 18 - 35 Tahun'),
(11, 5, 'Diusahakan Wanita');

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
-- Dumping data untuk tabel `tugas`
--

INSERT INTO `tugas` (`idTugas`, `idDetailPekerjaan`, `tugas`) VALUES
(4, 2, 'Merawat Komodo'),
(5, 2, 'Membelikan makanan bos Thom'),
(6, 3, 'Praktikum Memperkosa'),
(7, 3, 'Praktikum Membedah Manusia dan Binatang'),
(8, 3, 'Praktikum dan Mengajar dikelas Bitoteknologi'),
(9, 4, 'Mengelola Database'),
(10, 4, 'Mengajar Pemrograman'),
(11, 5, 'Mengelola Kelelawar'),
(12, 5, 'Memberi Makan Kelelawar Terbang dan Jalan');

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
  MODIFY `idDetailPekerjaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `formpelamar`
--
ALTER TABLE `formpelamar`
  MODIFY `idPelamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `idPekerjaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `idPengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `idPerusahaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `syaratkualifikasi`
--
ALTER TABLE `syaratkualifikasi`
  MODIFY `idSyaratKualifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tugas`
--
ALTER TABLE `tugas`
  MODIFY `idTugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detailpekerjaan`
--
ALTER TABLE `detailpekerjaan`
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
  ADD CONSTRAINT `fksyaratdetail` FOREIGN KEY (`idDetailPekerjaan`) REFERENCES `detailpekerjaan` (`idDetailPekerjaan`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tugas`
--
ALTER TABLE `tugas`
  ADD CONSTRAINT `fkdetailtugas` FOREIGN KEY (`idDetailPekerjaan`) REFERENCES `detailpekerjaan` (`idDetailPekerjaan`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
