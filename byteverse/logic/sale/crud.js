
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

// Función para setear los valores en los inputs de membresía y empleado
function codigoMembresiaCliente() {

    var membresia = document.getElementById("tipo-membresia").value;

    if (membresia != 0) {
        document.getElementById("div-membresia").style.display = "block";
        document.getElementById("membresia-codigo").value = 'FS' + '-' + membresia + '-' + randomNumberGenerator();
        document.getElementById("empleado-codigo").value = 'FS' + randomNumberGenerator();
    }
    else {
        document.getElementById("div-membresia").style.display = "none";
    }
}