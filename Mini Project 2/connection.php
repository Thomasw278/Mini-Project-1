<?php 
$conn = mysqli_connect("localhost", "root", "", "coba") or die ("Koneksi gagal");
?>

<!-- TABEL -->
    <!-- TABEL PERUSAHAAN BUAT LOGIN PERUSAHAAN -->
    <!-- 
    create table perusahaan (
        idPerusahaan int AUTO_INCREMENT PRIMARY KEY,
        namaPerusahaan varchar(60) not null,
        alamatPerusahaan varchar(60) not null, 
        industri varchar(20) not null,
        ukuranPerusahaan varchar(20) not null,
        logoPerusahaan BLOB
        );
    -->

    <!-- TABEL PENGGUNA BUAT LOGIN PENGGUNA -->
    <!-- 
    create table pengguna (
        idPengguna int AUTO_INCREMENT PRIMARY KEY,
        namaPengguna varchar(40) not null,
        email varchar(70) not null
        );	
    -->

    <!-- TABEL PEKERJAAN BUAT MAIN -->
    <!-- 
    create table pekerjaan (
        idPekerjaan int AUTO_INCREMENT PRIMARY KEY,
        idPerusahaan int,
        namaPekerjaan varchar(40) not null,
        kategoriPekerjaan varchar(20) not null,
        lokasi varchar(20) not null,
        jenisPekerjaan varchar(20) not null,
        gaji varchar(20) DEFAULT 'negosisasi',
        FOREIGN KEY (idPerusahaan) REFERENCES perusahaan(idPerusahaan)
        );	
    -->

    <!-- TABEL DETAILPEKERJAAN UNTUK BUAT DETAILPEKERJAAN -->
    <!-- 
    create table detailPekerjaan(
        idDetailPekerjaan int AUTO_INCREMENT PRIMARY KEY,
        idPekerjaan int,
        batasLamararan varchar(30)
        );
    -->

    <!-- TABEL TUGAS BUAT DETAILPEKERJAAN -->
    <!-- 
    create table tugas(
        idTugas int AUTO_INCREMENT PRIMARY KEY,
        idDetailPekerjaan int,
        tugas varchar(200),
        FOREIGN KEY (idDetailPekerjaan) REFERENCES detailPekerjaan(idDetailPekerjaan)
        );
    -->  

    <!-- TABEL SYARAT KUALIFIKASI BUAT DETAIL PEKERJAAN-->
    <!-- 
    create table syaratkualifikasi(
        idSyaratKualifikasi int AUTO_INCREMENT PRIMARY KEY,
        idDetailPekerjaan int,
        kualifikasi varchar(200),
        FOREIGN KEY (idDetailPekerjaan) REFERENCES detailPekerjaan(idDetailPekerjaan)
        );
    -->  

    <!-- TABEL FORM ISI BUAT LAMAR PEKERJAAN --> 
    <!--
    create table formPelamar (
        idPelamar int AUTO_INCREMENT PRIMARY KEY,
        namaDepan varchar(50) NOT null,
        namaBelakang varchar(50),
        tglLahir date NOT null,
        email varchar(50) not null,
        nomorHP int(13) not null,
        cv varchar(50) not null,
        portofolio varchar(50),
        suratLamaran varchar(50),
        );
    -->


<!-- COBA DATA -->
    <!-- 
    INSERT INTO `perusahaan` (`idPerusahaan`, `namaPerusahaan`, `alamatPerusahaan`, `industri`, `ukuranPerusahaan`, `logoPerusahaan`) VALUES (NULL, 'PT Colmitra Persada Indonesia', 'The Great Saladdin Square, Jl. Margonda Raya No.39, Depok', 'Kredit', '501-1000 Karyawan', NULL);
    INSERT INTO `perusahaan` (`idPerusahaan`, `namaPerusahaan`, `alamatPerusahaan`, `industri`, `ukuranPerusahaan`, `logoPerusahaan`) VALUES (NULL, 'Institut Teknologi dan Bisnis Nobel Indonesia', 'Jl. Sultan Alauddin No. 212, Makassar', 'Pendidikan', '51-200 Karyawan', NULL);


    INSERT INTO `pekerjaan` (`idPekerjaan`, `idPerusahaan`, `namaPekerjaan`, `kategoriPekerjaan`, `lokasi`, `jenisPekerjaan`, `gaji`) VALUES (NULL, '1', 'Desk Collection', 'Kredit', 'Depok', 'Full Time', '2-3 juta');
    INSERT INTO `pekerjaan` (`idPekerjaan`, `idPerusahaan`, `namaPekerjaan`, `kategoriPekerjaan`, `lokasi`, `jenisPekerjaan`, `gaji`) VALUES (NULL, '2', 'Dosen Teknik Industri', 'Pendidikan', 'Makassar', 'Full Time', 'Negosiasi');


    -->




