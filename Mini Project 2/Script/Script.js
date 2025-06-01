function LiatPW(logo){
    const input = document.getElementById("password");
    console.log(input)
    if(input.type == "password"){
        input.type = "text";
        logo.classList.replace("bx-lock","bx-lock-open-alt");
    } else {
        input.type = "password";
        logo.classList.replace("bx-lock-open-alt","bx-lock");
    }
}

function Validasi(){
    const pass = document.getElementById("password").value.trim();
    const pass1 = document.getElementById("pass2").value.trim();
    const pesan = document.getElementById("pesan");
    if(pass.length < 8){
        pesan.textContent = "Panjang Minimal Password adalah 8";
        return false;
    } else if (pass !== pass1){
        pesan.textContent = "Password dan Konfirmasi Salah";
        return false;
    } else {
        return true;
    }
}

function ValidasiCompany(){
    const pass = document.getElementById("password").value.trim();
    const pesan  = document.getElementById("pesan");
    if(pass.length < 8){
        pesan.textContent = "Panjang Minimal Password adalah 8";
        return false;
    } else {
        return true;
    }
}


function ValidasiLogin(){
    const pass = document.getElementById("password").value.trim();
    const pesan  = document.getElementById("pesan1");
    console.log(pesan);
    if(pass.length < 8){
        pesan.textContent = "Panjang Minimal Password adalah 8";
        return false;
    } else {
        return true;
    }
}

function validateUkuran(idokumen, maximalsize, namafile) {
    const fileInput = document.getElementById(idokumen);
    const file = fileInput.files[0];
    if (file && file.size > maximalsize * 1024 * 1024) {
        alert("Ukuran file " + namafile + " tidak boleh lebih dari " + maximalsize + "MB.");
        return false;
    }
    return true;
}

function validateForm() {
    const validCV = validateUkuran("cv", 5, "CV");
    const validPortofolio = validateUkuran("Portofolio", 5, "Portofolio");
    const validLamaran = validateUkuran("lamaran", 5, "Surat Lamaran");

    return validCV && validPortofolio && validLamaran;
}

function detailPelamar(element) {
    const nama = element.dataset.nama;
    const tglLahir = element.dataset.tgllahir;
    const email = element.dataset.email;
    const nomorHP = element.dataset.nomorhp;
    const cv = element.dataset.cv;
    const portofolio = element.dataset.portofolio;
    const suratLamaran = element.dataset.suratlamaran;

    const detailDiv = document.getElementById('detailContent');
    const btns = document.getElementById('btnAction');

    let detailHTML = `
        <table>
            <tr>
                <td><p><strong>Nama</strong></p></td>
                <td>:</td>
                <td><p><strong>${nama}</strong></p></td>
            </tr>
            <tr>
                <td><p><strong>Tanggal Lahir</strong></p></td>
                <td>:</td>
                <td><p><strong>${tglLahir}</strong></p></td>
            </tr>
            <tr>
                <td><p><strong>Email</strong></p></td>
                <td>:</td>
                <td><p><strong>${email}</strong></p></td>
            </tr>
            <tr>
                <td><p><strong>Nomor HP</strong></p></td>
                <td>:</td>
                <td><p><strong>${nomorHP}</strong></p></td>
            </tr>
            <tr>
                <td><p><strong>CV</strong></p></td>
                <td>:</td>
                <td><p><strong>${
                    cv && cv !== ""
                        ? `<a href="${cv}" target="_blank">Lihat CV</a>`
                        : "<em>Tidak ada file</em>"
                }</strong></p></td>
            </tr>
            <tr>
                <td><p><strong>Portofolio</strong></p></td>
                <td>:</td>
                <td><p><strong>${
                    portofolio && portofolio !== ""
                        ? `<a href="${portofolio}" target="_blank">Lihat Portofolio</a>`
                        : "<em>Tidak ada file</em>"
                }</strong></p></td>
            </tr>
            <tr>
                <td><p><strong>Surat Lamaran</strong></p></td>
                <td>:</td>
                <td><p><strong>${
                    suratLamaran && suratLamaran !== ""
                        ? `<a href="${suratLamaran}" target="_blank">Lihat Surat</a>`
                        : "<em>Tidak ada file</em>"
                }</strong></p></td>
            </tr>
        </table>`;

    detailDiv.innerHTML = detailHTML;
    btns.style.display = 'block';
}


