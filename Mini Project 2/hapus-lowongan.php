<?php
session_start();
require "connection.php";
    if (!isset($_SESSION['usernamePerusahaan'])) {
        header("Location: PilihanLogin.php?pesan=Kamu Belum Login");
        exit();
    }

    if (isset($_GET['id'])) {
        $idPekerjaan = $_GET['id'];
        $idPerusahaan = $_SESSION['idPerusahaan'];
        echo "IDPekerjaan : ";
        echo $idPekerjaan."<br>";
        echo "IDPerusahaan : ";
        echo $idPerusahaan;
        } else {
            header("location: Dashboard_Company.php");
            exit();
        }

        //Cek
        $cekisi = "SELECT COUNT(*) as total FROM formpelamar WHERE idPekerjaan = '".$idPekerjaan."' AND idPerusahaan = '".$idPerusahaan."'";
        $hasil = mysqli_query($conn,$cekisi);
        while($row = mysqli_fetch_assoc($hasil)){
            $data = $row["total"];
        }
        echo "<br>";
        echo "Jumlah Pelamar: ".$data;

        if($data > 0){
            $pesan = "Tidak Dapat Menghapus Lowongan karena Sudah Terisi";
            header("location: Dashboard_Company.php?pesan=".$pesan);
        } else {
            $sqldeletedetail = "DELETE FROM detailpekerjaan WHERE idPekerjaan = '".$idPekerjaan."'";
            mysqli_query($conn, $sqldeletedetail);
            $sqldelete = "DELETE FROM pekerjaan WHERE idPekerjaan  = '".$idPekerjaan."' AND idPerusahaan = '".$idPerusahaan."'";
            if(mysqli_query($conn,$sqldelete)){
                $pesan = "Berhasil Hapus Lowongan Pekerjaan";
                header("location: Dashboard_Company.php?pesan=".$pesan);
            } else {
                echo "Gagal Menghapus";
            }
        }
?>