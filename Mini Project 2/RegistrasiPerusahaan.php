<?php 
    require "connection.php";
    $pesan = "";
    $valid = ["jpg","png","jpeg"];
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_FILES["logo"]["name"])){
            $filetype = strtolower(pathinfo($_FILES["logo"]["name"],PATHINFO_EXTENSION));
            if($_FILES["logo"]["size"] < 4000000){
                if(!in_array($filetype,$valid)){
                    $pesan = "File Harus Berbentuk JPG / PNG / JPEG";
                } else {
                    $check = "SELECT * FROM perusahaan WHERE emailPerusahaan = '".$_POST["email"]."'";
                    $result = mysqli_query($conn,$check);
                    if(mysqli_num_rows($result) > 0){
                        $pesan = "Email Sudah Terdaftar";
                    } else {
                    $uploadfile = "LogoPerusahaan/".$_POST["nama"].'.'.$filetype;
                    $query = "INSERT INTO perusahaan (emailPerusahaan,namaPerusahaan,password,alamatPerusahaan,industri,ukuranPerusahaan,logoPerusahaan) VALUES ('".$_POST["email"]."','".$_POST["nama"]."','".$_POST["password"]."','".$_POST["alamat"]."','".$_POST["kategori"]."','".$_POST["jumlah_karyawan"]." karyawan','".$uploadfile."')";
                    $simpan = move_uploaded_file($_FILES["logo"]["tmp_name"], $uploadfile);
                    if(mysqli_query($conn,$query)){
                        $pesan = "Berhasil Membuat Akun Perusahaan";
                        header("location: LoginPerusahaan.php?pesan=".$pesan);
                    } else {
                        $pesan = "Gagal Membuat Akun Perusahaan";
                    }
                    }
                }
            } else {
                $pesan = "Ukuran Gambar Maksimal 4 MB";
            }
        }
    } else {
        $pesan = "";
    }
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> | Registrasi Akun JEMKAR</title>
    <link rel="stylesheet" href="CSS/Login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" type="image/png" href="Asset/ICON.png">
    <script src="Script/Script.js"></script>
</head>
<body>
    <header>
        <a href="main.php">
            <img src="Asset/JEMKARV1.png" class="logo">
        </a>
    </header>
<main>
    <div class="bungkusregis">
        <form action="RegistrasiPerusahaan.php" method="POST" onsubmit="return ValidasiCompany()" enctype="multipart/form-data">
            <h1>Registrasi Perusahaan</h1>
            <div class="inputboxregis1">
                <input type="email" placeholder="Masukkan Email Perusahaan" name="email" id="email" required>
                <i class='bx bx-envelope'></i>
            </div>
            <div class="inputboxregis1">
                <input type="text" placeholder="Masukkan Nama Perusahaan" name="nama" required>
                <i class='bx bx-user'></i>
            </div>
            <div class="inputboxregis1">
                <input type="password" placeholder="Masukkan Password" name="password" id="password" required>
                <i class='bx  bx-lock' onclick="LiatPW(this)"></i>
            </div>
            <div class="inputboxregis1">
                <input type="text" placeholder="Masukkan Alamat Perusahaan" name="alamat" required>
                <i class='bx bx-briefcase'></i> 
            </div>
            <div class="inputboxregis1">
                <input type="text" placeholder="Kategori Industri" name="kategori" required>
                <i class='bx bx-group'></i> 
            </div>
            <div class="inputboxregis1">
                <input type="number" placeholder="Jumlah Karyawan Yang Dapat Ditampung" name="jumlah_karyawan" required min=1>
            </div>
            <div class="inputboxregis1">
                <label for="logo">Logo Perusahaan<br></label>
                <input type="file" placeholder="Logo Perusahaan" name="logo" accept=".jpg, .jpeg, .png" required>
            </div>
            <div class="inputboxregis">
                <p id="pesan"><?= $pesan ?></p>
            </div>
           <button type="submit" class="tombol">Registrasi</button>
        </form>
    </div>

    <footer>
        <h2 class="copy">&copy; 2025 Jemput Karier</h2>
    </footer>
</body>
</html>