<?php 
    session_start();
    require "connection.php";
    $pesan = "";
    if($_GET){
        $pesan = $_GET["pesan"];
    }

    if (isset($_SESSION['emailPengguna'])){
    header("Location: hbsLogin.php");
    exit();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['emailPengguna'] ?? '';
    $password = trim($_POST['passwordPengguna']) ?? '';

    $email = mysqli_real_escape_string($conn, $email);
    // Ambil email dan password pengguna
    $sql = "SELECT * FROM pengguna WHERE emailPengguna = '{$email}'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    
    // Ganti verifikasi password langsung
    if ($password === $user['passwordPengguna']) {
        $_SESSION['emailPengguna'] = $user['emailPengguna'];
        $_SESSION['passwordPengguna'] = $user['passwordPengguna'];
        $_SESSION['namaPengguna'] = $user['namaPengguna'];
        $_SESSION['idPengguna'] = $user['idPengguna'];
        setcookie("idPengguna", $user['idPengguna'], time()+300);
        header("Location: hbsLogin.php");
        exit();
        } else {
            $pesan = "❌ Password salah.";
        }
    } else {
        $pesan = "❌ Email tidak ditemukan.";
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
    <title> | Login User JEMKAR</title>
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
    <div class="bungkus">
        <form action="Loginuser.php" method="POST">
            <h1>Login</h1>
            <h2>FOR USER</h2>
            <div class="inputbox1">
                <input type="text" placeholder="Masukkan Nama" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="inputbox1">
                <input type="password" placeholder="Masukkan Password" id="password" required>
                <i class='bx  bx-lock' onclick="LiatPW(this)"></i>
            </div>

            <div class="checkingat1">
                <a href="Lupapassword.php">Lupa Password</a>
            </div>
           <button type="submit" class="tombol1">Login</button>

            <div class="daftarakun1">
                <p>Gak punya akun?? 
                    <a href="Registrasiuser.php">Daftar Disini</a>
                </p>
            </div>
        </form>
    </div>
     <br><br>
    <h4 class="pesan"><?= $pesan ?></h4>
    </main>
    <footer>
        <h2 class="copy">&copy; 2025 Jemput Karier</h2>
    </footer>
</body>
</html>