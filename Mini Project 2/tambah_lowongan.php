<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title> | Tambah Lowongan - Jemput Karier</title>
    <link rel="stylesheet" href="CSS/main.css" />
</head>
<body class="formtambah-body">
    <div class="form-container">
        <form action="" method="POST" class="formtambah">
            <label for="namaPekerjaan">Nama Pekerjaan</label>
            <input type="text" id="namaPekerjaan" name="namaPekerjaan" required />
            <label for="kategoriPekerjaan">Kategori Pekerjaan</label>
            <input type="text" id="kategoriPekerjaan" name="kategoriPekerjaan" required />
            <label for="jenisPekerjaan">Jenis Pekerjaan</label>
            <input type="text" name="jenisPekerjaan" id="jenisPekerjaan" required />
            <label for="gaji">Gaji</label>
            <input
                type="text"
                id="gaji"
                name="gaji"
                placeholder="Contoh: 5 juta"
            />
            <label for="detailPekerjaan">Detail Pekerjaan (pisahkan dengan koma)</label>
            <textarea
                id="detailPekerjaan"
                name="detailPekerjaan"
                placeholder="Contoh: Mengelola database, Membuat laporan, Berkomunikasi dengan tim"
                required
            ></textarea>
            <label for="batasLamaran">Batas Lamaran</label>
            <input type="date" id="batasLamaran" name="batasLamaran" required />
            <button type="submit">Tambah Lowongan</button>
        </form>
    </div>
</body>
</html>
