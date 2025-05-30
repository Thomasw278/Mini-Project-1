<?php
    session_start();
    require "connection.php";
    if (!isset($_SESSION['usernamePerusahaan'])) {
        $pesan = "Kamu Belum Login";
        header("Location: PilihanLogin.php?pesan=".$pesan);
        exit();
    }
    if($_GET){
        $pesan = $_GET["pesan"];
    } else {
        $pesan = "";
    }
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="CSS/main.css">
    <title> | Dashboard Company Jemput Karir</title>
    <link rel="icon" type="image/png" href="Asset/ICON.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    <header>
        <div class = "icon_cont">
            <a href="Dashboard_Company.php"><img src="Asset/JEMKAR.png" class = "icon"></a>
        </div>
        <div>
            <?php
                if(isset($_SESSION["usernamePerusahaan"])){
                    echo "<b><p class='head_nav'>" . htmlspecialchars($_SESSION['usernamePerusahaan']) . "</p></b>";
                    echo "<a href='logOut.php' class='head_nav'>Logout</a>";
                } else {
                    echo "<b><p class='head_nav'>Halo | Guest</p></b>";
                    echo "<a href='PilihanLogin.php' class='head_nav'>Registrasi / Login</a>";
                }   
            ?>
        </div>
    </header>
    <div id = "headerbg"></div>
    <form action = "Dashboard_Company.php" method = "GET">
        <div class="sb">
            <select name="kategoriPekerjaan">
                <option value="">Semua Kategori</option>
                <?php
                $sql = "SELECT kategoriPekerjaan, jenisPekerjaan, gaji, namaPerusahaan,lokasi from pekerjaan natural join perusahaan";
                $result = mysqli_query($conn, $sql);
                $i = 0;
                $list = array();
                while ($row = mysqli_fetch_assoc($result)){
                    if (!in_array($row['kategoriPekerjaan'], $list)){
                        array_push($list, $row['kategoriPekerjaan']);
                        echo "<option value='".$row['kategoriPekerjaan']."'>".$row['kategoriPekerjaan']."</option>";
                    }
                }
                ?>
            </select>
            <select name="jenisPekerjaan">
                <option value="">Semua Jenis Pekerjaan</option>
                <?php
                $result = mysqli_query($conn, $sql);
                $i = 0;
                $list = array();
                while ($row = mysqli_fetch_assoc($result)){
                    if (!in_array($row['jenisPekerjaan'], $list)){
                        array_push($list, $row['jenisPekerjaan']);
                        echo "<option value='".$row['jenisPekerjaan']."'>".$row['jenisPekerjaan']."</option>";
                    }
                }
                ?>
            </select>
                
            <select name="gaji">
                <option value="">Semua Gaji</option>
                <?php
                $result = mysqli_query($conn, $sql);
                $i = 0;
                $list = array();
                while ($row = mysqli_fetch_assoc($result)){
                    if (!in_array($row['gaji'], $list)){
                        array_push($list, $row['gaji']);
                        echo "<option value='".$row['gaji']."'>".$row['gaji']."</option>";
                    }
                }
                ?>
            </select>

            <select name="lokasi">
                <option value="">Lokasi</option>
                <?php
                $result = mysqli_query($conn, $sql);
                $i = 0;
                $list = array();
                while ($row = mysqli_fetch_assoc($result)){
                    if (!in_array($row['lokasi'], $list)){
                        array_push($list, $row['lokasi']);
                        echo "<option value='".$row['lokasi']."'>".$row['lokasi']."</option>";
                    }
                }
                ?>
            </select>
        
            
            <div id="serbar" name = "searchbar">
                <p><input type="text" id = "searchbar_input" name = "searchbar" placeholder="Cari..."></p>
                <button type = "submit"><img src="Asset/search-removebg-preview.png" id="searchbar_magnify"></button>
            </div>  
        </div>  
    </form>      
    
        
    <main id = "main_main">
            <section id="getstartdas">
                <div class="welcome-text">
                  <h1 class="title1p"><i class="fas fa-building"></i> &nbsp Selamat Datang Perusahaan</h1>
                  <h2 class="title2p"><?php echo $_SESSION["usernamePerusahaan"]; ?></h2>
                  <a href="tambah_lowongan.php" class="btn-lowongan">Tambah Lowongan</a>
                  <p id="pesandasbor"><?php echo $pesan; ?></p>
                </div>

                <?php 
                  echo "<img src='" . htmlspecialchars($_SESSION["logo"]) . "' class='perusahaan'>";
                ?>
            </section>

        <div class = "container_loker" id="scroll">
                <?php 
                $tambah = "";
                if (!empty($_GET['kategoriPekerjaan'])){
                    $tambah .= "kategoriPekerjaan = '".$_GET['kategoriPekerjaan']."'";
                }

                if (!empty($_GET['jenisPekerjaan'])){
                    if (!empty($tambah)){
                        $tambah .= " AND jenisPekerjaan = '".$_GET['jenisPekerjaan']."'";
                    }
                    else{
                        $tambah .= "jenisPekerjaan = '".$_GET['jenisPekerjaan']."'";
                    }
                }

                if (!empty($_GET['gaji'])){
                    if (!empty($tambah)){
                        $tambah .= " AND gaji = '".$_GET['gaji']."'";
                    }
                    else{
                        $tambah .= "gaji = '".$_GET['gaji']."'";
                    }
                }

                if (!empty($_GET['lokasi'])){
                    if (!empty($tambah)){
                        $tambah .= " AND lokasi = '".$_GET['lokasi']."'";
                    }
                    else{
                        $tambah .= "lokasi = '".$_GET['lokasi']."'";
                    }
                }

                if (!empty($_GET['searchbar'])){
                    if (!empty($tambah)){
                        $tambah .= " AND namaPekerjaan LIKE '%".$_GET['searchbar']."%'";
                    }
                    else{
                        $tambah .= "namaPekerjaan LIKE '%".$_GET['searchbar']."%'";
                    }
                }
                $query = "SELECT * FROM pekerjaan INNER JOIN perusahaan ON pekerjaan.idPerusahaan = perusahaan.idPerusahaan WHERE pekerjaan.idPerusahaan = '".$_SESSION["idPerusahaan"]."'";
                if (!empty($tambah)){
                    $query .= " AND ".$tambah;
                }
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result)){
                    echo "<section>";
                        echo "<div class = 'main_jobtitle'>";
                            echo "<div class = 'divpt'>";
                                echo "<img src='" . htmlspecialchars($_SESSION["logo"]) . "' class='pt'>";
                            echo "</div>";
                            echo "<h2>".$row['namaPekerjaan']."</a></h2>";
                        echo "</div>";
                        echo "<div class = 'main_jobdesc'>";
                            echo "<p>".$row['namaPerusahaan']."</p>";
                            //Hitung Total Pelamar Pekerjaan
                            $sqlcount = "SELECT COUNT(*) as total from formpelamar WHERE idPekerjaan = '".$row['idPekerjaan']."' and idPerusahaan = '".$_SESSION["idPerusahaan"]."'";
                            $hasilcount = mysqli_query($conn,$sqlcount);
                            while($row1 = mysqli_fetch_assoc($hasilcount)){
                                $total = $row1["total"];
                            }
                            echo "<p>Jumlah Pelamar Adalah : <b>".$total."</b></p>";
                            echo "<div class = 'jobdesc_cont'>";
                                echo "<div class='jobdesc_detail'>";
                                    echo "<span class = 'jobdesc_detail_detail'><img src='Asset/kategori.png'>Kategori</span>";
                                    echo "<p>".$row['kategoriPekerjaan']."</p>";
                                echo "</div>";
                                echo "<div class = 'jobdesc_detail'>";
                                    echo "<span class = 'jobdesc_detail_detail'><img src='Asset/jam.png'>Jenis Pekerjaan</span>";
                                    echo "<p>".$row['jenisPekerjaan']."</p>";
                                echo "</div>";
                                echo "<div class = 'jobdesc_detail'>";
                                    echo "<span class = 'jobdesc_detail_detail'><img src='Asset/jam.png'>Lokasi</span>";
                                    echo "<p>".$row['lokasi']."</p>";
                                echo "</div>";
                                echo "<div class = 'jobdesc_detail'>";
                                    echo "<span class = 'jobdesc_detail_detail'><img src='Asset/gaji.png'>Gaji</span>";
                                    echo "<p>".$row['gaji']."</p>";
                                echo "</div>";
                                echo "</div>";
                                echo "<div class='job-actions'>";
                                    echo "<a href='edit-lowongan.php?id=".$row['idPekerjaan']."' class='btn-edit'>Edit</a>";
                                    echo "<a href='hapus-lowongan.php?id=".$row['idPekerjaan']."' onclick=\"return confirm('Yakin ingin menghapus lowongan ini?')\" class='btn-delete'>Hapus</a>";
                                echo "</div>";
                        echo "</div>";
                    echo "</section>";
                }
                $tambah = "";
                ?>
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