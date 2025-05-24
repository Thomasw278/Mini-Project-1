<?php 
    require "connection.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        // $idPerusahaan = $_POST['id_perusahaan'];
        $namaDepan = $_POST['nama_depan'];
        $namaBelakang = $_POST['nama_belakang'];
        $tglLahir = $_POST['tanggal_lahir'];
        $email = $_POST['email'];
        $noHP = $_POST['nomor_hp'];
        function upFile($file, $tujuan){
            if(isset($_FILES[$file]) && $_FILES[$file]['error']===0){
                $fileName = basename($_FILES[$file]['name']);
                $targetPath = $tujuan . $fileName;
                return $fileName;
            }
            return null;
        }
        $cv = upFile('cv', 'uploads/');
        $portofolio = upFile('Portofolio', 'uploads/');
        $suratLamaran = upFile('surat_lamaran', 'uploads/');
        $sql = "INSERT INTO formpelamar (namaDepan, namaBelakang, tglLahir, email, nomorHP, cv, portofolio, suratLamaran)
                VALUES ('$namaDepan', '$namaBelakang', '$tglLahir', '$email', '$noHP', '$cv', '$portofolio', '$suratLamaran')";
        if(mysqli_query($conn, $sql)){
            header("Location: sukses.html");
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
</head>
<body class="form">
    <header>
        <div class = "icon_cont">
            <a href="main.php"><img src="Asset/JEMKAR.png" class = "icon"></a>
        </div>
        <div>
            <a href="PilihanLogin.html" class = "head_nav">Registrasi / login</a>
        </div>
    </header>
    <div class = "headerbg"></div>

    <div id = "back_form" class = "back">
        <a href="detail.html"><img src="Asset/back.png">Kembali</a>
    </div>
    
    <main id = "main_form">
        <div class="form_daftar">
            <h2>Formulir Pendaftaran Kerja</h2>
            <h3><span id="1">J</span><span id="2">e</span><span id="3">m</span><span id="4">p</span><span id="5">u</span><span id="6">t</span> <span id="7">K</span><span id="8">a</span><span id="9">r</span></span><span id="10">i</span><span id="12">e</span><span id="11">r</span></h3>
            <form method="POST" action="form.php" enctype="multipart/form-data">
                <div class="form">
                    <label>Nama Lengkap *</label>
                    <div class="baris">
                        <input type="text" name="nama_depan" id="" placeholder="Nama Depan" required>
                        <input type="text" name="nama_belakang" id="" placeholder="Nama Belakang">
                    </div>
                </div>

                <div class="form">
                    <label>Tanggal Lahir *</label>
                    <input type="date" name="tanggal_lahir" id="" required>
                </div>

                <div class="form">
                    <label>E-mail *</label>
                    <input type="email" name="email" id="" placeholder="Masukkan email yang valid" required>
                </div>

                <div class="form">
                    <label>Nomor HP *</label>
                    <input type="text" name="nomor_hp" id="" placeholder="contoh: 0812345678989" maxlength="13" required>
                </div>

                <div class="form">
                    <label>CV *</label>
                    <input type="file" name="cv" id="" accept=".pdf, .docx" required >
                </div>

                <div class="form">
                    <label>Portofolio</label>
                    <input type="file" name="Portofolio" id="" accept=".pdf">
                </div>

                <div class="form">
                    <label>Surat Lamaran</label>
                    <input type="file" name="surat_lamaran" id="">
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