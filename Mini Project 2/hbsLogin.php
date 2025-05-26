<?php 
session_start();
require "connection.php";
if (!isset($_SESSION['username'])) {
    $pesan = "Kamu Belum Login";
    header("Location: Loginuser.php?pesan=".$pesan);
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="CSS/main.css">
    <title> | Jemput Karir</title>
    <link rel="icon" type="image/png" href="Asset/ICON.png">
</head>
<body>
    <header>
        <div class = "icon_cont">
            <a href="main.php"><img src="Asset/JEMKAR.png" class = "icon"></a>
        </div>
        <div>
            <?php
                if(isset($_SESSION["username"])){
                    echo "<b><p class='head_nav'>Hello | " . htmlspecialchars($_SESSION['username']) . "</p></b>";
                    echo "<a href='#scroll' class='head_nav'>Cari Kerja</a>";
                    echo "<a href='logOut.php' class='head_nav'>Logout</a>";
                } else {
                    echo "<b><p class='head_nav'>Hello | Guest</p></b>";
                    echo "<a href='#scroll' class='head_nav'>Cari Kerja</a>";
                    echo "<a href='PilihanLogin.php' class='head_nav'>Registrasi / Login</a>";
                }
            ?>
        </div>
    </header>
    <div id = "headerbg"></div>

    <form action = "hbsLogin.php" method = "GET">
        <div class="sb">
            <select name="kategoriPekerjaan">
                <option value="">Semua Kategori</option>
                <?php
                $sql = "SELECT kategoriPekerjaan, jenisPekerjaan, gaji, namaPerusahaan from pekerjaan natural join perusahaan";
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
        
            
            <div id="serbar" name = "searchbar">
                <p><input type="text" id = "searchbar_input" name = "searchbar" placeholder="Cari..."></p>
                <button type = "submit"><img src="Asset/search-removebg-preview.png" id="searchbar_magnify"></button>
            </div>  
        </div>  
    </form>      
    
        
    <main id = "main_main">
            <section id = getstart>
                <div>
                    <h1 class="title1">Langkah Mudah Menuju Pekerjaan Impian Anda</h1> 
                    <h2 class="title2">Bersama Jemput Karier</h1>    
                    <h3 class="title3">Temukan, Lamar, Sukses!</h3>
                </div>
                    <img src="Asset/kerja.png" class = "orangKerja">
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

                if (!empty($_GET['searchbar'])){
                    if (!empty($tambah)){
                        $tambah .= " AND namaPekerjaan LIKE '%".$_GET['searchbar']."%'";
                    }
                    else{
                        $tambah .= "namaPekerjaan LIKE '%".$_GET['searchbar']."%'";
                    }
                }

                $sql = "SELECT idPekerjaan, namaPekerjaan, kategoriPekerjaan, jenisPekerjaan, gaji,
                namaPerusahaan FROM pekerjaan natural join perusahaan";
                
                if (!empty($tambah)){
                    $sql .= " WHERE ".$tambah."";
                }
                
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)){
                    echo "<section>";
                        echo "<div class = 'main_jobtitle'>";
                            echo "<div class = 'divpt'>";
                                echo "<img src='https://colmitra.com/wp-content/uploads/2023/09/logo-colmitra-persada-indonesia.jpg' class='pt'>";
                            echo "</div>";
                            echo "<h2><a href='detail.php?id=".$row['idPekerjaan']."'>".$row['namaPekerjaan']."</a></h2>";
                        echo "</div>";
                        echo "<div class = 'main_jobdesc'>";
                            echo "<p>".$row['namaPerusahaan']."</p>";
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
                                    echo "<span class = 'jobdesc_detail_detail'><img src='Asset/gaji.png'>Gaji</span>";
                                    echo "<p>".$row['gaji']."</p>";
                                echo "</div>";
                            echo "</div>";
                        echo "</div>";
                    echo "</section>";
                }
                $tambah = "";
                ?>
            
            <!-- <section>
                <div class = "main_jobtitle">
                    <div class = "divpt">
                        <img src="https://asset.loker.id/img/2023/02/images-1-150x150.png" class="pt">
                    </div>
                    <h2><a href="detail.html">Dosen Teknik Industri</a></h2>
                </div>
                <div class = "main_jobdesc">
                    <p>Institut Teknologi dan Bisnis Nobel Indonesia</p>
                    <div class = "jobdesc_cont">
                        <div class="jobdesc_detail">
                            <span class = "jobdesc_detail_detail"><img src="Asset/kategori.png">Kategori</span>
                            <p>Pendidikan</p>
                        </div>
                        <div class = "jobdesc_detail">
                            <span class = "jobdesc_detail_detail"><img src="Asset/jam.png">Jenis Pekerjaan</span>
                            <p>Full Time</p>
                        </div>
                        <div class = "jobdesc_detail">
                            <span class = "jobdesc_detail_detail"><img src="Asset/gaji.png">Gaji</span>
                            <p>Negosiasi</p>
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div class = "main_jobtitle">
                    <div class = "divpt">
                        <img src="https://www.smart-tbk.com/wp-content/themes/gar-mdi/assets/img/smart-logo.svg" class="pt">
                    </div>
                    <h2><a href="detail.html">Accounting Officer</a></h2>
                </div>
                <div class = "main_jobdesc">
                    <p>PT SMART, Tbk</p>
                    <div class = "jobdesc_cont">
                        <div class="jobdesc_detail">
                            <span class = "jobdesc_detail_detail"><img src="Asset/kategori.png">Kategori</span>
                            <p>Akuntansi</p>
                        </div>
                        <div class = "jobdesc_detail">
                            <span class = "jobdesc_detail_detail"><img src="Asset/jam.png">Jenis Pekerjaan</span>
                            <p>Full Time</p>
                        </div>
                        <div class = "jobdesc_detail">
                            <span class = "jobdesc_detail_detail"><img src="Asset/gaji.png">Gaji</span>
                            <p>Negosiasi</p>
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div class = "main_jobtitle">
                    <div class = "divpt">
                        <img src="https://asset.loker.id/img/2016/10/LOGO-RLS-150x150.jpg" class="pt">
                    </div>
                    <h2><a href="detail.html">IT Support</a></h2>
                </div>
                <div class = "main_jobdesc">
                    <p>PT. RAJAWALI LINTAS SAMUDERA</p>
                    <div class = "jobdesc_cont">
                        <div class="jobdesc_detail">
                            <span class = "jobdesc_detail_detail"><img src="Asset/kategori.png">Kategori</span>
                            <p>Teknologi Informasi</p>
                        </div>
                        <div class = "jobdesc_detail">
                            <span class = "jobdesc_detail_detail"><img src="Asset/jam.png">Jenis Pekerjaan</span>
                            <p>Full Time</p>
                        </div>
                        <div class = "jobdesc_detail">
                            <span class = "jobdesc_detail_detail"><img src="Asset/gaji.png">Gaji</span>
                            <p>Rp. 5-6 Juta</p>
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div class = "main_jobtitle">
                    <div class = "divpt">
                        <img src="https://asset.loker.id/img/2021/08/059CD4B3-63C1-4AF9-AB3E-811F88992DF9-150x150.jpeg" class="pt">
                    </div>
                    <h2><a href="detail.html">Junior Baker</a></h2>
                </div>
                <div class = "main_jobdesc">
                    <p>Scones Alley</p>
                    <div class = "jobdesc_cont">
                        <div class="jobdesc_detail">
                            <span class = "jobdesc_detail_detail"><img src="Asset/kategori.png">Kategori</span>
                            <p>Pastry</p>
                        </div>
                        <div class = "jobdesc_detail">
                            <span class = "jobdesc_detail_detail"><img src="Asset/jam.png">Jenis Pekerjaan</span>
                            <p>Part Time</p>
                        </div>
                        <div class = "jobdesc_detail">
                            <span class = "jobdesc_detail_detail"><img src="Asset/gaji.png">Gaji</span>
                            <p>Rp. 2-3 Juta</p>
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div class = "main_jobtitle">
                    <div class = "divpt">
                        <img src="https://asset.loker.id/img/2022/06/JKN-150x150.jpg" class="pt">
                    </div>
                    <h2><a href="detail.html">Perawat</a></h2>
                </div>
                <div class = "main_jobdesc">
                    <p>Klinik Kurnia Mega Mas</p>
                    <div class = "jobdesc_cont">
                        <div class="jobdesc_detail">
                            <span class = "jobdesc_detail_detail"><img src="Asset/kategori.png">Kategori</span>
                            <p>Kesehatan</p>
                        </div>
                        <div class = "jobdesc_detail">
                            <span class = "jobdesc_detail_detail"><img src="Asset/jam.png">Jenis Pekerjaan</span>
                            <p>Part Time</p>
                        </div>
                        <div class = "jobdesc_detail">
                            <span class = "jobdesc_detail_detail"><img src="Asset/gaji.png">Gaji</span>
                            <p>Negosiasi</p>
                        </div>
                    </div>
                </div>
            </section> -->
    
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