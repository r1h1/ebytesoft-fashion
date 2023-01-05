// Función para obtener fecha y hora desde una instancia de tipo fecha
// esta se concatena y se hace un inner a una propiedad HTML
// la funcion se inicia al iniciar la página y se repite cada segundo para la fecha
function fechaYHora() {

    var hoy = new Date();
    var opciones = {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    };
    var fecha = hoy.toLocaleString('es-GT', opciones);
    var hora = hoy.getHours() + ':' + hoy.getMinutes() + ':' + hoy.getSeconds();

    // Se imprime en pantalla con el ID fechaYHora
    document.getElementById("fechaYHora").innerHTML = fecha + ', ' + hora;

}

// Se inicia la función y se repite cada segundo
fechaYHora();
setInterval(fechaYHora, 1000);


function authToken() {

    var auth = localStorage.getItem('auth');

    if (auth == null || auth.length == 0 || auth == '') {
        localStorage.removeItem('auth');
        window.location.href = '../../start';
    }
    else {
        var log = JSON.parse(auth);

        document.getElementById('nombre').innerHTML = log[0].nombreCompleto;
        document.getElementById('numeroTelefono').innerHTML = log[0].telefono;
        document.getElementById('caja').innerHTML = log[0].nombreCaja;

        getMenu();
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
        text: 'Su sesión expirará por seguridad en 1 minuto',
        confirmButtonText: 'Entendido'
    });
}

//Ejecuta la función closeSession cada 9 horas
setInterval(alertSessionExpired, 30924000);
setInterval(closeSession, 32400000);



function getMenu() {

    var auth2 = localStorage.getItem('auth');
    var log2 = JSON.parse(auth2);
    var rol = log2[0].rol;

    var url = 'http://localhost/mbyte/bytebend/api/v1/dashboard/options?rol=' + rol;

    fetch(url)
        .then(response => response.json())
        .then(data => mostrarData(data))
        .catch(error => console.log(error));

    const mostrarData = (data) => {

        let body = '';

        for (var i = 0; i < data.length; i++) {
            var j = 0;
            body += `<div class="col">
                        ${data[i].rutaModulo}
                     </div>`;
        }

        document.getElementById('menu').innerHTML = body;

    }
}