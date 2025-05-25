<?php 
    require "connection.php";
    $pesan = "";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $emailpengguna = $_POST["email"];
        $password = $_POST["password"];
        $checkv1 = "SELECT * FROM pengguna where emailPengguna = '".$emailpengguna."'";
        $result = mysqli_query($conn,$checkv1);
        if(mysqli_num_rows($result) > 0){
            $queryv1 = "UPDATE pengguna SET passwordPengguna = '".$password."' WHERE emailPengguna = '".$emailpengguna."'";
            if(mysqli_query($conn,$queryv1)){
                $pesan = "Berhasil Mengganti Password User";
                header("location: Loginuser.php?pesan=".$pesan);
            } else {
                $pesan = "Gagal Mengganti Password User";
            }
        } else {
            $checkv2 = "SELECT * FROM perusahaan where emailPerusahaan = '".$emailpengguna."'";
            $results = mysqli_query($conn,$checkv2);
            if(mysqli_num_rows($results) > 0){
                $queryv2 = "UPDATE perusahaan SET password = '".$password."' WHERE emailPerusahaan = '".$emailpengguna."'";
                if(mysqli_query($conn,$queryv2)){
                    $pesan = "Berhasil Mengganti Password Perusahaan";
                    header("location: LoginPerusahaan.php?pesan=".$pesan);
                } else {
                    $pesan = "Gagal Mengganti Password User";
                }
            }else {
                $pesan = "Email Tidak Ditemukan";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> | Lupa Password Akun JEMKAR</title>
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
        <form action="Lupapassword.php" method="POST" onsubmit="return Validasi()">
            <h1>Lupa Password</h1>
            <div class="inputboxregis">
                <input type="email" placeholder="Masukkan Email" name="email" required>
                <i class='bx bx-envelope'></i>
            </div>
            <div class="inputboxregis">
                <input type="password" placeholder="Masukkan Password Baru" name="password" id="password" required>
                <i class='bx  bx-lock' onclick="LiatPW(this)"></i>
            </div>
            <div class="inputboxregis">
                <input type="password" placeholder="Konfirmasi Ulang Password Baru" id="pass2" required>
            </div>
            <div class="inputboxregis">
                <p id="pesan"><?= $pesan ?></p>
            </div>
           <button type="submit" class="tombol">Konfirmasi</button>
        </form>
    </div>
    </main>
    <footer>
        <h2 class="copy">&copy; 2025 Jemput Karier</h2>
    </footer>
</body>
</html>