<?php 
    session_start();
    require "connection.php";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    //Pekerjaan
    $insertpekerjaan = "INSERT INTO pekerjaan (idPerusahaan,namaPekerjaan,kategoriPekerjaan,lokasi,jenisPekerjaan,gaji) VALUES ('".$_SESSION["idPerusahaan"]."', '".$_POST["namaPekerjaan"]."','".$_POST["kategoriPekerjaan"]."', 
    '".$_POST["lokasiPekerjaan"]."','".$_POST["jenisPekerjaan"]."','".$_POST["gaji"]."')";
    mysqli_query($conn,$insertpekerjaan);

    //Buat ngambil ID Terakhir Yang Diinsert Dari DB karena Auto_Increment
    $idpekerja = mysqli_insert_id($conn);

    //Detail Pekerjaan
    $insertdetail = "INSERT INTO detailpekerjaan (idPekerjaan,deskripsiPekerjaan,batasLamaran) VALUES ('".$idpekerja."','".$_POST["deskripsiPekerjaan"]."','".$_POST["batasLamaran"]."')";
    mysqli_query($conn,$insertdetail);
    $idDetail = mysqli_insert_id($conn);

    //Syarat Kualifikasi
    $syaratList = explode(",", $_POST["SyaratPekerjaan"]);
    foreach ($syaratList as $syarat) {
        $syarat = trim($syarat);
        if (!empty($syarat)) {
            $sqlSyarat = "INSERT INTO syaratkualifikasi (idDetailPekerjaan, kualifikasi) VALUES ('$idDetail', '$syarat')";
            mysqli_query($conn, $sqlSyarat);
        }
    }

    //Tugas
    $tugasList = explode(",", $_POST["tugasPekerjaan"]);
    foreach ($tugasList as $tugas) {
        $tugas = trim($tugas);
        if (!empty($tugas)) {
            $insertTugas = "INSERT INTO tugas (idDetailPekerjaan,tugas) VALUES ('".$idDetail."', '".$tugas."')";
            mysqli_query($conn, $insertTugas);
        }
    }
    header("location: Dashboard_Company.php");
    }

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title> | Tambah Lowongan - Jemput Karier</title>
    <link rel="stylesheet" href="CSS/main.css" />
</head>
<body class="formtambah-body">
    <div class="form-container">
        <form action="tambah_lowongan.php" method="POST" class="formtambah">
            <label for="namaPekerjaan">Nama Pekerjaan</label>
            <input type="text" id="namaPekerjaan" name="namaPekerjaan" placeholder="Nama Pekerjaan" required />
            <label for="kategoriPekerjaan">Kategori Pekerjaan</label>
            <input type="text" id="kategoriPekerjaan" name="kategoriPekerjaan" placeholder="Kategori Pekerjaan" required />
            <label for="jenisPekerjaan">Jenis Pekerjaan</label>
            <input type="text" name="jenisPekerjaan" id="jenisPekerjaan" placeholder="Jenis Pekerjaan" required />
            <label for="lokasiPekerjaan">Lokasi</label>
            <input type="text" name="lokasiPekerjaan" id="lokasiPekerjaan" placeholder="Lokasi Pekerjaan" required/>
            <label for="gaji">Gaji</label>
            <input type="text" id="gaji" name="gaji" placeholder="Contoh: 5 juta"
            />
            <label for="batasLamaran">Batas Lamaran</label>
            <input type="date" id="batasLamaran" name="batasLamaran" required />
            <label for="deskripsiPekerjaan">Deskripsi Singkat Mengenai Perusahaan</label>
            <textarea name="deskripsiPekerjaan" id="deskripsiPekerjaan" placeholder="Deskripsi Singkat Terkait Perusahaan" required></textarea>
            <label for="tugasPekerjaan">Tugas Diperusahaan (pisahkan dengan koma)</label>
            <textarea id="tugasPekerjaan" name="tugasPekerjaan" placeholder="Contoh: Mengelola database, Membuat laporan, Berkomunikasi dengan tim" required
            ></textarea>
            <label for="SyaratPekerjaan">Syarat dan Kualifikasi (pisahkan dengan koma)</label>
            <textarea id="SyaratPekerjaan" name="SyaratPekerjaan" placeholder="Contoh: Usia 18-35 Tahun, Fresh Graduate Dipersilahkan" required
            ></textarea>
            <button type="submit">Tambah Lowongan</button>
        </form>
    </div>
</body>
</html>
