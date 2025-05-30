<?php
    session_start();
    require "connection.php";

    if (!isset($_SESSION["username"]) || !isset($_SESSION["emailuser"])) {
    header("Location: login.php");
    exit();
    }elseif ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["idPekerjaan"])) {
    $idPekerjaan = $_POST["idPekerjaan"];
    }

    if($_GET){
        $idPekerjaan = $_GET["id"];
    }

    //BUat Ambil IDPENGGUNA : 
    $ambildata = "SELECT * FROM pengguna WHERE namaPengguna = '".$_SESSION["username"]."'";
    $hasilambil = mysqli_query($conn,$ambildata);
    while($row = mysqli_fetch_assoc($hasilambil)){
        $idPengguna = $row["idPengguna"];
    }

    //Buat Ambil Perusahaan dan Pekerja  ( Nama Perusahaan dan Nama Pekerjaaan ):
    $ambilpekerjaan = "SELECT * FROM pekerjaan WHERE idPekerjaan = '".$idPekerjaan."'";
    $hasilambilpekerjaan = mysqli_query($conn,$ambilpekerjaan);
    while($row1 = mysqli_fetch_assoc($hasilambilpekerjaan)){
        $Perusahaan = $row1["idPerusahaan"];
        $perkerjaanygdipilih = $row1["namaPekerjaan"];
    }

    //Buat Ambil Nama Perusahaan 
    $ambilnamaperusahaan = "SELECT * FROM perusahaan WHERE idPerusahaan = '".$Perusahaan."'";
    $hasilambilperusahaan = mysqli_query($conn,$ambilnamaperusahaan);
    while($row2 = mysqli_fetch_assoc($hasilambilperusahaan)){
        $namaperusahaan = $row2["namaPerusahaan"];
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        // $idPerusahaan = $_POST['id_perusahaan'];
        $namaDepan = $_POST['nama_depan'];
        $namaBelakang = $_POST['nama_belakang'];
        $tglLahir = $_POST['tanggal_lahir'];
        $email = $_POST['email'];
        $noHP = $_POST['nomor_hp'];
        function upFile($file, $tujuan){
            if(isset($_FILES[$file]) && $_FILES[$file]['error']===0){
                if($_FILES[$file]["size"] > 5 * 1024 * 1024) {

                    exit();
                }
                $fileName = basename($_FILES[$file]['name']);
                $targetPath = $tujuan . $fileName;
                move_uploaded_file($_FILES[$file]["tmp_name"], $targetPath);
                return $fileName;
            }
            return null;
        }
        $cv = upFile('cv', 'CV/');
        $portofolio = upFile('Portofolio', 'Portofolio/');
        $suratLamaran = upFile('surat_lamaran', 'SuratLamaran/');
        $sql = "INSERT INTO formpelamar (idPengguna,idPekerjaan,idPerusahaan,namaDepan,namaBelakang,tglLahir,email,nomorHP,cv,portofolio,suratLamaran) VALUES ('".$idPengguna."','".$idPekerjaan."','".$Perusahaan."','$namaDepan', '$namaBelakang', '$tglLahir', '$email', '$noHP', '$cv', '$portofolio', '$suratLamaran')";
        if(mysqli_query($conn, $sql)){
            header("Location: sukses.php");
        } else {
            echo "Gagal melamar pekerjaan";
        }
    }    
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="CSS/main.css">
    <title> | Formulir Pendaftaran Kerja JemKar</title>
    <link rel="icon" type="image/png" href="Asset/ICON.png">
    <script src="Script/Script.js"></script>
</head>
<body class="form">
    <header id="header_form">
        <div class = "icon_cont">
            <a href="main.php"><img src="Asset/JEMKAR.png" class = "icon"></a>
        </div>
        <div>
            <?php
                echo "<b><p class='head_nav'>Halo | " . htmlspecialchars($_SESSION['username']) . "</p></b>";
            ?>
        </div>
    </header>
    <div class = "headerbg_form"></div>

    <div id = "back_form" class = "back">
        <?php
            echo "<a href='detail.php?id=" . $idPekerjaan . "'><img src='Asset/back.png'>Kembali</a>";
        ?>
    </div>
    
    <main id = "main_form">
        <div class="form_daftar">
            <h2>Formulir Pendaftaran Kerja</h2>
            <h3><span id="1">J</span><span id="2">e</span><span id="3">m</span><span id="4">p</span><span id="5">u</span><span id="6">t</span> <span id="7">K</span><span id="8">a</span><span id="9">r</span></span><span id="10">i</span><span id="12">e</span><span id="11">r</span></h3>
            <h5  id="kamumelamar"><?php echo "Kamu Melamar di Perusahaan <span class='red'>".$namaperusahaan."</span> Sebagai <span class='red'>".$perkerjaanygdipilih."</span>";?></h5>
            <form action="form.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                <div class="form">
                    <label for="nama">Nama Lengkap *</label>
                    <div class="baris">
                        <input type="text" name="nama_depan" id="nama" placeholder="Nama Depan" required>
                        <input type="text" name="nama_belakang" id="nama" placeholder="Nama Belakang" required>
                    </div>
                </div>
                <div class="form">
                    <input type="hidden" name="idPekerjaan" value="<?php echo htmlspecialchars($idPekerjaan); ?>">
                    <input type="hidden" name="idPerusahaan" value="<?php echo htmlspecialchars($Perusahaan); ?>">
                </div>
                <div class="form">
                    <label for="tgllahir">Tanggal Lahir *</label>
                    <input type="date" name="tanggal_lahir" id="tgllahir" required>
                </div>

                <div class="form">
                    <label for="email">E-mail *</label>
                    <input type="email" name="email" id="email" placeholder="Masukkan email yang valid" value="<?php echo $_SESSION["emailuser"]; ?>">
                </div>

                <div class="form">
                    <label for="nohp">Nomor HP *</label>
                    <input type="text" name="nomor_hp" id="nohp" placeholder="contoh: 0812345678989" maxlength="13" required>
                </div>

                <div class="form">
                    <label for="cv">CV *</label>
                    <input type="file" name="cv" id="cv" accept=".pdf, .docx" required>
                </div>

                <div class="form">
                    <label for="portofolio">Portofolio</label>
                    <input type="file" name="Portofolio" id="Portofolio" accept=".pdf">
                </div>

                <div class="form">
                    <label for="lamaran" >Surat Lamaran</label>
                    <input type="file" name="surat_lamaran" id="lamaran">
                </div>

                <button type="submit" class="subButton">Kirim Lamaran</button>
            </form>
        </div>
    </main>
    <br>
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