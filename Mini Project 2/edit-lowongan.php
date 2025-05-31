<?php 
    session_start();
    require "connection.php";
    if($_GET){
        $idPekerjaan = $_GET["id"];
        $sql = "SELECT * FROM pekerjaan WHERE idPekerjaan = '".$idPekerjaan."'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        $oldnamaPekerjaan = $row["namaPekerjaan"];
        $oldkategoriPekerjaan = $row["kategoriPekerjaan"];
        $oldjenisPekerjaan = $row["jenisPekerjaan"];
        $oldgaji = $row["gaji"];
        $oldLokasi = $row["lokasi"];


        $sqldetail = "SELECT * FROM detailpekerjaan WHERE idPekerjaan = '".$idPekerjaan."'";
        $result2 = mysqli_query($conn,$sqldetail);
        $row2 = mysqli_fetch_assoc($result2);
        $oldDeskripsi = $row2["deskripsiPekerjaan"];
        $oldbatasLamaran = $row2["batasLamaran"];
        $idDetail = $row2["idDetailPekerjaan"];

        $oldTugas = '';
        $sqlTugas = "SELECT tugas FROM tugas WHERE idDetailPekerjaan = '".$idDetail."'";
        $resultTugas = mysqli_query($conn, $sqlTugas);
        $tugasArr = array();
        while ($row = mysqli_fetch_assoc($resultTugas)) {
            array_push($tugasArr,$row["tugas"]);
        }
        $oldTugas = implode(", ", $tugasArr);
        
        
        $oldSyarat= '';
        $sqlSyaratkual = "SELECT kualifikasi FROM syaratkualifikasi WHERE idDetailPekerjaan = '".$idDetail."'";
        $resultSyarat = mysqli_query($conn, $sqlSyaratkual);
        $Syaratarr = array();
        while ($row = mysqli_fetch_assoc($resultSyarat)) {
            array_push($Syaratarr,$row["kualifikasi"]);
        }
        // print_r($Syaratarr);
        $oldSyarat = implode(", ", $Syaratarr);

    }
    if($_POST){
        $idDetail = isset($_POST["idDetail"]) ? $_POST["idDetail"] : null;
        $idPekerjaan = $_POST["idPekerjaan"];
        $namaPekerjaan = $_POST["namaPekerjaan"];
        $kategoriPekerjaan = $_POST["kategoriPekerjaan"];
        $jenisPekerjaan = $_POST["jenisPekerjaan"];
        $lokasiPekerjaan = $_POST["lokasiPekerjaan"];
        $gaji = $_POST["gaji"];
        $batasLamaran = $_POST["batasLamaran"];
        $deskripsi = $_POST["deskripsiPekerjaan"];
        $tugas = $_POST["tugasPekerjaan"];
        $syaratkualifikasi = $_POST["SyaratPekerjaan"];

        //updt pekerjaan
        $sqlupdatepekerjaan = "UPDATE pekerjaan SET namaPekerjaan = '$namaPekerjaan',kategoriPekerjaan = '$kategoriPekerjaan',jenisPekerjaan = '$jenisPekerjaan',lokasi = '$lokasiPekerjaan',gaji = '$gaji' WHERE idPekerjaan = '$idPekerjaan'";
        mysqli_query($conn,$sqlupdatepekerjaan);

        //updt detailPekerjaan
        $sqlUpdateDetail = "UPDATE detailpekerjaan SET deskripsiPekerjaan = '$deskripsi',batasLamaran = '$batasLamaran' WHERE idDetailPekerjaan = '$idDetail'";

        //Sek marake bingung sek mecah seko list ben dadi string nek seumpama didelete disek dadi ko ngene
        $deletetugas = "DELETE FROM tugas WHERE idDetailPekerjaan = '$idDetail'";
        $deletesyarat = "DELETE FROM syaratkualifikasi WHERE idDetailPekerjaan = '$idDetail'";
        mysqli_query($conn, $deletetugas);
        mysqli_query($conn, $deletesyarat);

        $syaratList = explode(",",$syaratkualifikasi);
        foreach ($syaratList as $syarat) {
            $syarat = trim($syarat);
            if (!empty($syarat)) {
                $sqlSyarat = "INSERT INTO syaratkualifikasi (idDetailPekerjaan, kualifikasi) VALUES ('$idDetail', '$syarat')";
                mysqli_query($conn, $sqlSyarat);
            }
        }

        $tugasList = explode(",", $_POST["tugasPekerjaan"]);
        foreach ($tugasList as $tugas) {
            $tugas = trim($tugas);
            if (!empty($tugas)) {
                $sqlTugas = "INSERT INTO tugas (idDetailPekerjaan, tugas) VALUES ('$idDetail', '$tugas')";
                mysqli_query($conn, $sqlTugas);
    }
} 
        $pesan = "berhasil Update Data Pekerjaan";
        header("location: Dashboard_Company.php?pesan=".$pesan);

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
        <form action="edit-lowongan.php" method="POST" class="formtambah">
            <input type="hidden" name="idPekerjaan" value="<?php echo $idPekerjaan?>">
            <input type="hidden" name="idDetail" value="<?php echo $idDetail ?>">
            <label for="namaPekerjaan">Nama Pekerjaan</label>
            <input type="text" id="namaPekerjaan" name="namaPekerjaan" placeholder="Nama Pekerjaan" required value="<?php  echo $oldnamaPekerjaan; ?>" />
            <label for="kategoriPekerjaan">Kategori Pekerjaan</label>
            <input type="text" id="kategoriPekerjaan" name="kategoriPekerjaan" placeholder="Kategori Pekerjaan" required / value="<?php echo $oldkategoriPekerjaan; ?>">
            <label for="jenisPekerjaan">Jenis Pekerjaan</label>
            <input type="text" name="jenisPekerjaan" id="jenisPekerjaan" placeholder="Jenis Pekerjaan" required value="<?php echo $oldjenisPekerjaan; ?>" />
            <label for="lokasiPekerjaan">Lokasi</label>
            <input type="text" name="lokasiPekerjaan" id="lokasiPekerjaan" placeholder="Lokasi Pekerjaan" required value="<?php echo $oldLokasi ?>" />
            <label for="gaji">Gaji</label>
            <input type="text" id="gaji" name="gaji" placeholder="Contoh: 5 juta" required value="<?php echo $oldgaji; ?>"/>
            <label for="batasLamaran">Batas Lamaran</label>
            <input type="date" id="batasLamaran" name="batasLamaran" required value="<?php echo $oldbatasLamaran; ?>" />
            <label for="deskripsiPekerjaan">Deskripsi Singkat Mengenai Perusahaan</label>
            <textarea name="deskripsiPekerjaan" id="deskripsiPekerjaan" placeholder="Deskripsi Singkat Terkait Perusahaan" required><?php echo $oldDeskripsi; ?></textarea>
            <label for="tugasPekerjaan">Tugas Diperusahaan (pisahkan dengan koma)</label>
            <textarea id="tugasPekerjaan" name="tugasPekerjaan" placeholder="Contoh: Mengelola database, Membuat laporan, Berkomunikasi dengan tim" required
            ><?php echo $oldTugas; ?></textarea>
            <label for="SyaratPekerjaan">Syarat dan Kualifikasi (pisahkan dengan koma)</label>
            <textarea id="SyaratPekerjaan" name="SyaratPekerjaan" placeholder="Contoh: Usia 18-35 Tahun, Fresh Graduate Dipersilahkan" required
            ><?php echo $oldSyarat; ?></textarea>
            <button type="submit">Edit Lowongan</button>
        </form>
    </div>
</body>
</html>