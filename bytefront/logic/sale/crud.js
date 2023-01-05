
// Función para calcular el cambio que hay que dar al recibir efectivo
function calcularCambioEfectivo() {
    var e = parseFloat(document.getElementById("total-a-pagar").innerHTML),
        a = parseFloat(document.getElementById("efectivo-recibido").value);
    a < e && (Swal.fire({
        title: "Error en la Operaci\xf3n",
        text: "La cantidad de efectivo recibida no puede ser menor que el total a pagar o cero",
        icon: "error",
        confirmButtonText: "Entendido"
    }), document.getElementById("efectivo-recibido").value = "", document.getElementById("cambio").value = ""), a > e && (document.getElementById("cambio").value = Math.abs(e - a).toFixed(2))
}


// Función para generar números random
function randomNumberGenerator() {

    const characters = "ABCDEFGHIJKLMNÑOPQRSTUVWXYZ0123456789";
    const charactersLength = characters.length;
    let result = "";

    for (let i = 0; i < 8; i++) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }

    return result;

}

// Función para setear los valores en los inputs de membresía
function membresiaCliente() {

    var membresia = document.getElementById("tipo-membresia").value;

    if (membresia != 0) {
        document.getElementById("div-membresia").style.display = "block";
        document.getElementById("membresia-codigo").value = 'FS' + '-' + membresia + '-' + randomNumberGenerator();
    }
    else {
        document.getElementById("div-membresia").style.display = "none";
    }
}


// Función para setear los valores en los inputs de empleado
function codigoCliente() {
    document.getElementById("empleado-codigo").value = 'CL' + randomNumberGenerator();
}


function authToken() {

    var auth = localStorage.getItem('auth');

    if (auth == null || auth.length == 0 || auth == '') {
        localStorage.removeItem('auth');
        window.location.href = '../../start';
    }
    else {
        console.log('Acceso Correcto');
    }
}
authToken();


function closeSession() {
    var auth = localStorage.getItem('auth');
    localStorage.removeItem('auth');
    window.location.href = '../../start';
}

function alertSessionExpired() {
    Swal.fire({
        icon: 'warning',
        title: 'Advertencia',
        text: 'Su sesión expirará por seguridad en 10 minutos',
        confirmButtonText: 'Entendido'
    });
}

//Ejecuta la función closeSession cada 1 hora
setInterval(alertSessionExpired, 1764000);
setInterval(closeSession, 3600000);