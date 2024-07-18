let signUp = document.getElementById("signUp");
let signIn = document.getElementById("signIn");
let nameInput = document.getElementById("nameInput");
let title = document.getElementById("title");

signIn.onclick = function(){
    nameInput.style.maxHeight = "0";
    title.innerHTML = "Login";
    signUp.classList.add("disable");
    signUp.classList.remove("disable");
}


function admin() {
    user = document.getElementById("user").value;
    pass = document.getElementById("pass").value;

    if (user === "admin" && pass === "admin123") {
        window.location.href = "../sesion/baseDatos.php";

    }

    
    
    if (user !== "admin") {
        alert("Usuario Incorrecto");
        document.getElementById("user").value="";
        document.getElementById("pass").value="";
        document.getElementById("mail").value="";

        document.getElementById("user").focus();
    }

    if (pass !== "admin123") {
        alert("Contraseña Incorrecta");
        document.getElementById("user").value="";
        document.getElementById("pass").value="";
        document.getElementById("mail").value="";
        document.getElementById("user").focus();
    }
    
}
