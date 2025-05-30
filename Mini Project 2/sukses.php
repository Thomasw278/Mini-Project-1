<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Formulir Pendaftaran Kerja | JemKar</title>
    <link rel="stylesheet" href="CSS/main.css">
</head>
<body id="body_sukses">
    <main id="main_sukses">
        <div class="sukses">
            <div class="sukses-card">
                <img src="Asset/Centang.png" alt="Berhasil" class="sukses-icon">
                <h1 class="sukses-title">Terima Kasih!</h1>
                <h3 class="nama-subtitle"><?php echo $_SESSION["username"]; ?></h3>
                <h3 class="sukses-subtitle">Lamaran Anda telah berhasil dikirim</h3>
                <p class="sukses-text">Tim kami akan segera memprosesnya. Silakan kembali ke <b>halaman utama</b> untuk informasi lainnya.</p>
                <a href='main.php'>
                    <button class="sukses-button">Kembali</button>
                </a>
            </div>
        </div>
    </main>
</body>
</html>