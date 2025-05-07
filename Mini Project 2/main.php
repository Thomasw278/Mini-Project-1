<?php 
require "connection.php"
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
            <a href="main.html"><img src="Asset/JEMKAR.png" class = "icon"></a>
        </div>
        <div>
            <a href="#scroll" class = "head_nav">Cari Kerja</a>
            <a href="PilihanLogin.html" class = "head_nav">Registrasi / login</a>
        </div>
    </header>
    <div class = "headerbg"></div>
        <div class="sb">
            <div class="filter">
                <select name="kategori" class="scrollfilt">
                    <option value="0">Kategori</option>
                    <?php
                    $sql = "SELECT kategoriPekerjaan, jenisPekerjaan, gaji, namaPerusahaan from pekerjaan natural join perusahaan";
                    $result = mysqli_query($conn, $sql);
                    $i = 0;
                    $list = array();
                    while ($row = mysqli_fetch_assoc($result)){
                        if (!in_array($row['kategoriPekerjaan'], $list)){
                            array_push($list, $row['kategoriPekerjaan']);
                            echo "<option value=".$i++.">".$row['kategoriPekerjaan']."</option>";
                        }
                    }
                    ?>
                </select>
                                
                <select name="jenisPekerjaan" class="scrollfilt">
                    <option value="0">Jenis Pekerjaan</option>
                    <?php
                    $result = mysqli_query($conn, $sql);
                    $i = 0;
                    $list = array();
                    while ($row = mysqli_fetch_assoc($result)){
                        if (!in_array($row['jenisPekerjaan'], $list)){
                            array_push($list, $row['jenisPekerjaan']);
                            echo "<option value=".$i++.">".$row['jenisPekerjaan']."</option>";
                        }
                    }
                    ?>
                </select>
                    
                <select name="gaji" class="scrollfilt">
                    <option value="0">Gaji</option>
                    <?php
                    $result = mysqli_query($conn, $sql);
                    $i = 0;
                    $list = array();
                    while ($row = mysqli_fetch_assoc($result)){
                        if (!in_array($row['gaji'], $list)){
                            array_push($list, $row['gaji']);
                            echo "<option value=".$i++.">".$row['gaji']."</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            
            <div class="serbar" name = "searchbar">
                <p><input type="text" class = "searchbar_input" name = "searchbar" placeholder="Cari..."></p>
                <a href="#"><img src="Asset/search-removebg-preview.png" class="searchbar_magnify"></a>
            </div>  
        </div>         
    </div>  
    
        
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
                // $sql = "SELECT * FROM pekerjaan";
                // $result = mysqli_query($conn, $sql);
                $sql = "SELECT namaPekerjaan, kategoriPekerjaan, jenisPekerjaan, gaji,
                namaPerusahaan FROM pekerjaan natural join perusahaan";
                $result = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_assoc($result)){
                    echo "<section>";
                        echo "<div class = 'main_jobtitle'>";
                            echo "<div class = 'divpt'>";
                                echo "<img src='https://colmitra.com/wp-content/uploads/2023/09/logo-colmitra-persada-indonesia.jpg' class='pt'>";
                            echo "</div>";
                            echo "<h2><a href='detail.html'>".$row['namaPekerjaan']."</a></h2>";
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

                
                
                ?>
            
            <section>
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
            </section>
    
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