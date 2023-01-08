function authToken() {

    var auth = localStorage.getItem('auth');

    if (auth == null || auth.length == 0 || auth == '') {
        localStorage.removeItem('auth');
        window.location.href = '../../start';
    }
    else {

        var texto = localStorage.getItem('auth');
        var txtEnc = texto.replace(/enter/gi, "e").replace(/imes/gi, "i").replace(/ai/gi, "a").replace(/ober/gi, "o").replace(/ufat/gi, "u");

        var log = JSON.parse(txtEnc);

        const nombreCompleto = log[0].nombreCompleto;
        const separador = nombreCompleto.split(' ');
        const primeraLetraNombre = separador[0].charAt(0).toUpperCase();
        const primeraLetraApellido = separador[1].charAt(0).toUpperCase();
        const nombre = separador[0].slice(1);
        const apellido = separador[1].slice(1);

        document.getElementById('nombre').innerHTML = primeraLetraNombre + nombre + ' ' + primeraLetraApellido + apellido;
        document.getElementById('telefono').innerHTML = log[0].telefono;
        document.getElementById('caja').innerHTML = log[0].nombreCaja;
        document.getElementById('email').innerHTML = log[0].correoelectronico;
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
        text: 'Su sesión expirará por seguridad en 5 minutos',
        confirmButtonText: 'Entendido'
    });
}

//Ejecuta la función closeSession cada 1 hora
setInterval(alertSessionExpired, 1944000);
setInterval(closeSession, 3600000);


function put() {

    var texto = localStorage.getItem('auth');
    var txtEnc = texto.replace(/enter/gi, "e").replace(/imes/gi, "i").replace(/ai/gi, "a").replace(/ober/gi, "o").replace(/ufat/gi, "u");

    var log = JSON.parse(txtEnc);

    var idp = log[0].id;
    var claveE = document.getElementById('claveE').value;

    var url = "http://localhost/mbyte/bytebend/api/v1/employees/profile?clave=" + claveE + "&id=" + idp;

    if (claveE == "") {
        Swal.fire({
            icon: 'error',
            title: 'Error en la Operación',
            text: 'Debe llenar todos los campos con *',
            confirmButtonText: 'Entendido',
        });
    }

    else {
        var requestOptions = {
            method: 'PUT',
            redirect: 'follow'
        };

        fetch(url, requestOptions)
            .then(response => response.json())
            .then(data => mostrarData(data))
            .catch(error => Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Error en la operación, reporte al administrador',
                confirmButtonText: 'Entendido',
            }, console.log('Posible conexión con BackEnd incorrecta' + error)));

        const mostrarData = (data) => {
            $('#editarDatosPerfil').modal('toggle');
            Swal.fire({
                icon: 'warning',
                title: 'Advertencia',
                text: 'Se cerrará la sesión actual, vuelve a ingresar',
                confirmButtonText: 'Entendido',
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#editarDatosPerfil').modal('toggle');
                    closeSession();
                } else if (result.isDenied) {
                    $('#editarDatosPerfil').modal('toggle');
                    closeSession();
                } else {
                    $('#editarDatosPerfil').modal('toggle');
                    closeSession();
                }
            });
        }
    }
}


function closeSession() {
    sessionStorage.removeItem('token');
    localStorage.removeItem('auth');
    window.location.href = '../../start';
}