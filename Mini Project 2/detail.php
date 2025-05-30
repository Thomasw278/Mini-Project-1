<?php
session_start();
require "connection.php";
if(isset($_SESSION['username'])) {
    $nama = $_SESSION["username"];
    if($_GET){
        $idpekerjaan = $_GET["id"];
        $query = "SELECT * FROM pekerjaan WHERE idPekerjaan = '".$idpekerjaan."'";
        $hasil = mysqli_query($conn,$query);
        while($row = mysqli_fetch_assoc($hasil)){
            $judul = $row["namaPekerjaan"];
            $kategori = $row["kategoriPekerjaan"];
            $jenis = $row["jenisPekerjaan"];
            $gaji = $row["gaji"];
        }
        $querydetail = "SELECT * FROM detailpekerjaan WHERE idPekerjaan = '".$idpekerjaan."'";
        $hasil1 = mysqli_query($conn,$querydetail);
        while($row1 = mysqli_fetch_assoc($hasil1)){
            // print_r($row1);
            $iddetailpekerjaan = $row1["idDetailPekerjaan"];
            $deskripsi = $row1["deskripsiPekerjaan"];
            $tanggal = $row1["batasLamaran"];
        }
        $querytugas = "SELECT * FROM tugas WHERE idDetailPekerjaan = '".$iddetailpekerjaan."'";
        $hasil2 = mysqli_query($conn,$querytugas);
        $daftartugas = array();
        while($row2 = mysqli_fetch_assoc($hasil2)){
            // print_r($row2);
            array_push($daftartugas, $row2["tugas"]);
        }
        $querykualifikasi = "SELECT * FROM syaratkualifikasi WHERE idDetailPekerjaan = '".$iddetailpekerjaan."'";
        $hasil3 = mysqli_query($conn,$querykualifikasi);
        $daftarsyarat = array();
        while($row3 = mysqli_fetch_assoc($hasil3)){
            array_push($daftarsyarat, $row3["kualifikasi"]);
        }
        $ambildataperusahaan = "SELECT * FROM perusahaan natural join pekerjaan WHERE pekerjaan.idPekerjaan = '".$idpekerjaan."'";
        $hasil4 = mysqli_query($conn,$ambildataperusahaan);
        while($row4 = mysqli_fetch_assoc($hasil4)){
            $pt = $row4["namaPerusahaan"];
            $logo = $row4["logoPerusahaan"];
            $lokasi = $row4["alamatPerusahaan"];
            $tipeindustri = $row4["industri"];
            $ukuran = $row4["ukuranPerusahaan"];
    }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="CSS/main.css">
    <title> | Jemput Karir</title>
    <link rel="icon" type="image/png" href="Asset/ICON.png">
</head>
<body class="form">
    <header>
        <div class = "icon_cont">
            <a href="main.php"><img src="Asset/JEMKAR.png" class = "icon"></a>
        </div>
        <div>
            <?php
            echo "<b><p class='head_nav'>Halo | " . htmlspecialchars($_SESSION['username']) . "</p></b>";
            ?>
        </div>
    </header>
    <div class = "headerbg"></div>

    <div id = "back_detail" class="back">
        <a href="main.php"><img src="Asset/back.png">Kembali</a>
    </div>

    <main id = "main_detail">
        <section id = "main_sec">
            <?php 
            
            ?>
            <section id = "brief_desc"> 
                <h1><?php echo $judul; ?></h1>
                <div class = "jobdes">
                    <div class = "jobdesc">                    
                        <h4 class = "jobdesc_title"><img src="Asset/kategori.png">Kategori</h4>
                        <p class = "jobdesc_desc"><?php echo $kategori ?></p>
                    </div>
                    <div class = "jobdesc">
                        <h4 class = "jobdesc_title"><img src="Asset/jam.png">Jenis Pekerjaan</h4>
                        <p class = "jobdesc_desc"><?php echo $jenis ?></p>
                    </div>
                    <div class = "jobdesc">                    
                        <h4 class = "jobdesc_title"><img src="Asset/gaji.png" id="jobdesc_icon4">Gaji</h4>
                        <p class = "jobdesc_desc"><?php echo $gaji ?></p>
                    </div>
                </div>
                <p id="lamar">
                    <?php
                        echo "<a href='form.php?id=" .$idpekerjaan. "'>Lamar Pekerjaan</a></p>";
                    ?>
                <br>
            </section>
            <section class = "job_description">
                <h2>Deskripsi Pekerjaan</h2>
                <p><?php echo $deskripsi; ?></p>
                <h3>Tugas</h3>
                <ul>
                    <?php
                    foreach($daftartugas as $tugas){
                        echo "<li>".htmlspecialchars($tugas)."</li>";
                    }
                    ?>
                </ul>
            </section>
            <section class = "job_description">
                <h2>Syarat & Kualifikasi </h2>
                <ul>
                    <?php 
                    foreach($daftarsyarat as $syarat){
                        echo "<li>".htmlspecialchars($syarat)."</li>";
                    }
                    ?>
                </ul>
            </section>
            <section class = "job_description">
                <h2>Tanggal Batas Lamaran</h2>
                <p><span>
                    <?php 
                        $Format = date("j F Y", strtotime($tanggal));
                        echo $Format; 
                    ?>
                </span></p>
            </section>
        </section>
        <aside id = "detail_aside">
            <?php 
                echo "<img src='".htmlspecialchars($logo)."' id='iconpt'>";
            ?>
            <div>
                <h3><?php echo $pt; ?></h2>
                <h4><img src="Asset/lokasi.png" id="detail_aside_icon3">Lokasi</h3>
                <p><?php echo $lokasi; ?></p>
                <h4><img src="Asset/industri.png" id="detail_aside_icon3">Industri</h3>
                <p><?php echo $tipeindustri; ?></p>
                <h4><img src="Asset/karyawan.png" id="detail_aside_icon3">Ukuran Perusahaan</h3>
                <p><?php echo $ukuran; ?></p>
            </div>
        </aside>
    </main>

    <footer>
        <div class="container">
            <div class="row">
                <div class="footer-col">
                    <h4>Perusahaan</h4>
                    <ul>
                        <li><a href="#">Tentang Kami</a></li>
                        <li><a href="#">Layanan</a></li>
                        <li><a href="#">privacy policy</a></li>
                        <li><a href="#"></a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Bantuan</h4>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Layanan Pengaduan</a></li>
                        <li><a href="#">Customer Service</a></li>
                        <li><a href="#"></a></a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Kontak</h4>
                    <ul>
                        <li><a href="#">Call Center</a></li>
                        <li><a href="#">Email</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Ikuti Kami</h4>
                    <div class="social-links">
                        <a href="#" class="social-linksa"><img src="Asset/ig.png" class="social-links-follow"></a>
                        <a href="#" class="social-linksa"><img src="Asset/Facebook.png"class="social-links-follow"></a>
                        <a href="#" class="social-linksa"><img src="Asset/Linkedin.png"class="social-links-follow"></a>
                        <a href="#" class="social-linksa"><img src="Asset/Tele.png"class="social-links-follow"></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>