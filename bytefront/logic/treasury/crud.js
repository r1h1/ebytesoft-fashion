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


function getBanks() {
    var url = 'http://localhost/mbyte/bytebend/api/v1/treasury/banks';
    fetch(url)
        .then(response => response.json())
        .then(data => mostrarData(data))
        .catch(error => console.log('Error devuelto por BackEnd: ' + error))

    const mostrarData = (data) => {

        let body = '';

        for (var i = 0; i < data.length; i++) {
            var j = 0;
            body += `<div class="card gray mt-3">
            <div class="row">
                <div class="col me-2">
                    <div class="card-body p-3">
                        <p id="idBanco" hidden>${data[i].id}</p>
                        <p class="card-text text-muted fw-bold h5">${data[i].nombreBancoEntidad}</p>
                        <div class="icon p-1">
                            <p class="text-muted">${data[i].aliasNombreCuenta}</p>
                            <p class="text-muted"><span>${data[i].tipoCuenta}</span>
                            </p>
                            <p class="text-muted">No.
                                <span>${data[i].numeroCuenta}</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col mt-5">
                    <a class="btn btn-danger text-white fw-bold" onclick="delete_method(${data[i].id})"><i class="fa-solid fa-trash"></i> Eliminar</a>
                </div>
            </div>
        </div>`
        }

        document.getElementById('listar-bancos').innerHTML = body;
    }
}
getBanks();



function delete_method(id) {

    Swal.fire({
        icon: 'warning',
        title: '¿Está seguro?',
        text: 'Los datos no se podrán recuperar',
        showDenyButton: true,
        confirmButtonText: 'Eliminar',
        denyButtonText: `Cancelar`,
    }).then((result) => {

        if (result.isConfirmed) {

            var requestOptions = {
                method: 'DELETE',
                redirect: 'follow'
            };


            var url = 'http://localhost/mbyte/bytebend/api/v1/treasury/banks?id=' + id;

            fetch(url, requestOptions)
                .then(response => response.text())
                .then(result => exitoso(result))
                .catch(error => Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Error en la operación, reporte al administrador del sistema',
                    confirmButtonText: 'Entendido',
                }, console.log('Error devuelto por BackEnd: ' + error)));

            const exitoso = (result) => {

                Swal.fire({
                    icon: 'success',
                    title: 'Correcto',
                    text: 'La operación se completó.',
                    confirmButtonText: 'Entendido',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#verbancos').modal('toggle');
                        getBanks();
                    } else if (result.isDenied) {
                        $('#verbancos').modal('toggle');
                        getBanks();
                    }
                });
            }

        } else if (result.isDenied) {
            getBanks();
        }
    });

}