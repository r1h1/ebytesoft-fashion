function apiDelete() {

    Swal.fire({
        title: '¿Estás Seguro?',
        text: "No puedes revertir esta acción",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Continuar'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Operación Exitosa',
                icon: 'success',
                confirmButtonText: 'Entendido'
            });
        }
    });

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
    document.getElementById("empleado-codigo").value = 'FS' + randomNumberGenerator();
}