function frmLogin(e) {
    e.preventDefault();
    const usuario = document.getElementById("usuario");
    const clave = document.getElementById("clave");

    if (usuario.value == "") {
        clave.classList.remove("is-invalid");
        usuario.classList.add("is-invalid");
        usuario.focus();
    } else if (clave.value == "") {
        usuario.classList.remove("is-invalid");
        clave.classList.add("is-invalid");
        clave.focus();
    } else {
        const url = base_url + "Usuarios/validar";
        const frm = document.getElementById("frmLogin");
        const http = new XMLHttpRequest();

        http.open("POST", url, true);
        http.send(new FormData(frm));

        http.onreadystatechange = function () {
            if (this.readyState == 4) { 
                if (this.status == 200) {
                    console.log("Respuesta del servidor:", this.responseText); 

                    try {
                        const res = JSON.parse(this.responseText);
                        if (res.icono == "success") {
                            window.location = base_url + "Configuracion/admin";
                        } else {
                            document.getElementById("alerta").classList.remove("d-none");
                            document.getElementById("alerta").innerHTML = res.msg;
                        }
                    } catch (e) {
                        console.error("Error al analizar JSON:", e);
                        document.getElementById("alerta").classList.remove("d-none");
                        document.getElementById("alerta").innerHTML = "Error en la respuesta del servidor.";
                    }
                } else {
                    console.error("Error en la solicitud:", this.status, this.statusText);
                    document.getElementById("alerta").classList.remove("d-none");
                    document.getElementById("alerta").innerHTML = "Error en la solicitud: " + this.statusText;
                }
            }
        }
    }
}
