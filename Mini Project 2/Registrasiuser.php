<?php 
    require "connection.php";
    $pesan = "";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $emailuser = $_POST["email"];
        $namauser = $_POST["nama"];
        $passuser = $_POST["password"];
        $check = "SELECT * FROM pengguna WHERE emailPengguna = '".$emailuser."'";
        $result = mysqli_query($conn,$check);
        if(mysqli_num_rows($result) > 0){
            $pesan = "Email Pengguna Sudah Terdaftar";
        } else {
            $query = "INSERT INTO pengguna (emailPengguna,namaPengguna,passwordPengguna) VALUES ('".$emailuser."', '".$namauser."', '".$passuser."')";
            if(mysqli_query($conn,$query)){
                header("location: Loginuser.php");
                exit();
            } else {
                $pesan = "Terjadi Kesalahan Register";
            }
        }
    } else {
        $pesan = "Gagal Request Cinta Kamu";
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
        <form action="Registrasiuser.php" method="POST" onsubmit="return Validasi()">
            <h1>Registrasi User</h1>
            <div class="inputboxregis">
                <input type="email" placeholder="Masukkan Email" name="email" id="email" required>
                <i class='bx bx-envelope'></i>
            </div>
            <div class="inputboxregis">
                <input type="text" placeholder="Masukkan Nama" name="nama" required>
                <i class='bx bx-user' ></i>
            </div>
            <div class="inputboxregis">
                <input type="password" placeholder="Masukkan Password" name="password" id="password" required>
                <i class='bx bxs-lock-alt' onclick="LiatPW(this)"></i>
            </div>
            <div class="inputboxregis">
                <input type="password" placeholder="Konfirmasi Ulang Password" id="pass2" required>
            </div>
            <div class="inputboxregis">
                <p id="pesan"><?= $pesan ?></p>
            </div>
           <button type="submit" class="tombol">Registrasi</button>
        </form>
    </div>
    </main>
    <footer>
        <h2 class="copy">&copy; 2025 Jemput Karier</h2>
    </footer>
</body>
</html>