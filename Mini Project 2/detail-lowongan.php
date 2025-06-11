<?php
    session_start();
    require "connection.php";

    $idPekerjaan = isset($_GET['id']) ? $_GET['id'] : '';
    $idPerusahaan = isset($_SESSION['idPerusahaan']) ? $_SESSION['idPerusahaan'] : '';

    if ($idPekerjaan && $idPerusahaan) {
        $sqlDataUser = "SELECT formpelamar.namaDepan, formpelamar.namaBelakang, formpelamar.tglLahir, formpelamar.email, formpelamar.nomorHP, formpelamar.cv, formpelamar.portofolio, formpelamar.suratLamaran
                        FROM formpelamar INNER JOIN pekerjaan ON formpelamar.idPekerjaan = pekerjaan.idPekerjaan WHERE formpelamar.idPekerjaan = '$idPekerjaan' AND pekerjaan.idPerusahaan = '$idPerusahaan'";
        $_result = mysqli_query($conn, $sqlDataUser);
        if (mysqli_num_rows($_result) > 0) {
            while ($row = mysqli_fetch_assoc($_result)) {
                $namaLengkap = $row["namaDepan"] . " " . $row["namaBelakang"];
                $tglLahir = $row["tglLahir"];
                $email = $row["email"];
                $noHP = $row["nomorHP"];
                $CV = $row["cv"];
                $portofolio = $row["portofolio"];
                $suratLamaran = $row["suratLamaran"];
            }
        }
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="CSS/main.css">
    <title> | Jemput Karir</title>
    <link rel="icon" type="image/png" href="Asset/ICON.png">
</head>
<body class="detail">
    <header class="detailheader">
        <div class = "icon_cont">
            <a href="Dashboard_Company.php"><img src="Asset/JEMKAR.png" class = "icon"></a>
        </div>
        <div>
            <?php
                $query = "SELECT * FROM pekerjaan INNER JOIN perusahaan ON pekerjaan.idPerusahaan = perusahaan.idPerusahaan WHERE pekerjaan.idPekerjaan = '".$_GET["id"]."'";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result)){
                    $sqlcount = "SELECT COUNT(*) as total from formpelamar WHERE idPekerjaan = '".$row['idPekerjaan']."' and idPerusahaan = '".$_SESSION["idPerusahaan"]."'";
                    $hasilcount = mysqli_query($conn,$sqlcount);
                    while($row1 = mysqli_fetch_assoc($hasilcount)){
                        $total = $row1["total"];
                        $namapekerejaan = $row["namaPekerjaan"];
                    } 
                }
            ?>
        </div>
    </header>
    <div id = "headerbg"></div>
    <main id = "main_form">
        <div id = "back_detail" class="back">
            <a href="Dashboard_Company.php"><img src="Asset/back.png">Kembali</a>
        </div>
        <?php
            if ($total > 0) {
                echo "<div class = 'logodetail'>";
                    echo "<img src='" . htmlspecialchars($_SESSION["logo"]) . "''>";
                echo "</div>";
                echo "<h2 class='judulpelamar'>".$namapekerejaan."</h2>";
                echo "<table class='table-layout'>";
                    echo "<tr>";
                        echo "<td class='kiri'>";
                            echo "<div class='form_pelamar'><center><h2>Pelamar Pekerjaan</h2></center></div>";

                            $namaPelamar = "SELECT *, CONCAT(namaDepan, ' ', namaBelakang) AS namaLengkap 
                                            FROM formpelamar 
                                            WHERE idPekerjaan = '$idPekerjaan' AND idPerusahaan = '$idPerusahaan'";
                            $svNama = mysqli_query($conn, $namaPelamar);
                            while ($hasil = mysqli_fetch_assoc($svNama)) {
                                $nama = $hasil['namaLengkap'];
                                $tglLahirplmr = $hasil['tglLahir'];
                                $emailplmr = $hasil['email'];
                                $nomorHPplmr = $hasil['nomorHP'];
                                $cvplmr = $hasil['cv'];
                                $portofolioplmr = $hasil['portofolio'];
                                $suratLamaranplmr = $hasil['suratLamaran'];

                                echo "<div class='nama_pelamar' onclick='detailPelamar(this)'
                                    data-nama=\"$nama\"
                                    data-tgllahir=\"$tglLahirplmr\"
                                    data-email=\"$emailplmr\"
                                    data-nomorhp=\"$nomorHPplmr\"
                                    data-cv=\"$cvplmr\"
                                    data-portofolio=\"$portofolioplmr\"
                                    data-suratlamaran=\"$suratLamaranplmr\">
                                    <center><h2>$nama</h2></center>
                                </div>";
                            }
                        echo "</td>";
                        echo "<td class='kanan'>";
                            echo "<div class='pelamar-container'>";
                                echo "<div class='detail-pelamar'>";
                                    echo "<h3>Detail Pelamar</h3>";
                                    echo "<div id='detailContent'>Klik nama untuk lihat detail pelamar</div>";
                                    echo "<div class='btn-action' id='btnAction' style='display:none;'>";
                                        echo "<button class='terima'>Terima</button>";
                                        echo "<button class='abaikan'>Abaikan</button>";
                                    echo "</div>";
                                echo "</div>";
                            echo "</div>";
                        echo "</td>";
                    echo "</tr>";
                echo "</table>";
            } else {
                echo "<div class = 'logodetail'>";
                    echo "<img src='" . htmlspecialchars($_SESSION["logo"]) . "''>";
                echo "</div>";
                echo "<h2 class='judulpelamar'>".$namapekerejaan."</h2>";
                echo "<h1 id='kosong'><center>Belum Ada Pelamar</center></h1>";
            }
        ?>
    </main>
    <script src="Script/Script.js"></script>
</body>
</html>