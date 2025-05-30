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