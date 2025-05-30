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