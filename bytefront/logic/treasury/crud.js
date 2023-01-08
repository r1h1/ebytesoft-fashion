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


function getUserLog() {
    var texto = localStorage.getItem('auth');
    var txtEnc = texto.replace(/enter/gi, "e").replace(/imes/gi, "i").replace(/ai/gi, "a").replace(/ober/gi, "o").replace(/ufat/gi, "u");

    var log = JSON.parse(txtEnc);

    document.getElementById('usuarioLogueado').value = log[0].usuario;
    document.getElementById('usuarioAperturaCaja').value = log[0].usuario;
    document.getElementById('usuarioLogueadoCaja').innerHTML = log[0].nombreCompleto;
}
getUserLog();


function getBanks() {

    var url = 'http://localhost/mbyte/bytebend/api/v1/treasury/banks';
    fetch(url)
        .then(response => response.json())
        .then(data => mostrarData(data))
        .catch(error => console.log('Error devuelto por BackEnd: ' + error))

    const mostrarData = (data) => {

        if (data.length == 0) {
            let body = '';
            body += `<div class="card gray mt-3">
                        <div class="row">
                            <div class="col me-2">
                                <div class="card-body p-3 text-center">
                                    <p class="card-text text-muted fw-bold h5">-- No existe información --</p>
                                </div>
                            </div>
                        </div>
                    </div>`;
            document.getElementById('listar-bancos').innerHTML = body;
        }
        else {
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
                                    <a class="btn btn-danger text-white fw-bold" onclick="delete_methodBanks(${data[i].id})"><i class="fa-solid fa-trash"></i> Eliminar</a>
                                </div>
                            </div>
                        </div>`;
            }

            document.getElementById('listar-bancos').innerHTML = body;
        }
    }
}
getBanks();


function getBanksSelect() {

    var url = 'http://localhost/mbyte/bytebend/api/v1/treasury/banks';
    fetch(url)
        .then(response => response.json())
        .then(data => mostrarData(data))
        .catch(error => console.log('Error devuelto por BackEnd: ' + error))

    const mostrarData = (data) => {

        if (data.length == 0) {
            Swal.fire({
                icon: 'warning',
                title: 'Advertencia',
                text: 'No existen bancos registrados, por favor, informe al administrador',
                confirmButtonText: 'Entendido'
            });
            console.log('No datos empresa, insertelo');
        }
        else {
            let body = '';

            for (var i = 0; i < data.length; i++) {
                var j = 0;
                body += `<option value="${data[i].id}">${data[i].nombreBancoEntidad}</option>`;
            }

            document.getElementById('bancosSelect').innerHTML = body;
        }
    }
}
getBanksSelect();


function getDeposits() {

    var url = 'http://localhost/mbyte/bytebend/api/v1/treasury/deposit';
    fetch(url)
        .then(response => response.json())
        .then(data => mostrarData(data))
        .catch(error => console.log('Error de BackEnd: ' + error))

    const mostrarData = (data) => {

        let body = '';
        for (var i = 0; i < data.length; i++) {
            var j = 0;
            body += `<tr>
            <td hidden>${data[i].id}</td>
            <td>${j = i + 1}</td>
            <td class="text-uppercase">${data[i].fechaYHoraInicio}</td>
            <td>${data[i].noBoletaDeposito}</td>
            <td>${data[i].nombreBancoEntidad}</td>
            <td>${data[i].monto}</td>
            <td>${data[i].motivo}</td>
            <td>${data[i].nombreCompleto}</td>
            <td class="text-center">
                <a class="btn btn-danger text-white fw-bold" onclick="delete_method(${data[i].id})"><i class="fa-solid fa-trash"></i></a>
            </td>
            </tr>`
        }

        document.getElementById('tabla-de-datos-depositos').innerHTML = body;

        if (data.length <= 1) {
            document.getElementById('totalDepositado').innerHTML = data[0].monto;
        }
        else {

            var acumulador = 0;
            for (i = 0; i < data.length; i++) {
                acumulador = acumulador + parseInt(data[i].monto);
            }
            document.getElementById('totalDepositado').innerHTML = acumulador;
        }
    }
}
getDeposits();


function getCashOpen() {
    var url = 'http://localhost/mbyte/bytebend/api/v1/treasury/cash';
    fetch(url)
        .then(response => response.json())
        .then(data => mostrarData(data))
        .catch(error => console.log('Posible conexión con BackEnd incorrecta'))

    const mostrarData = (data) => {

        let body = '';

        for (var i = 0; i < data.length; i++) {
            if (data[i].estado == 0) {
                var j = 0;
                body += `<tr>
                            <td hidden>${data[i].id}</td>
                            <td>${j = i + 1}</td>
                            <td class="text-uppercase">${data[i].fechaYHoraInicio}</td>
                            <td>${data[i].fechaYHoraFin}</td>
                            <td>${data[i].nombreCompleto}</td>
                            <td>${data[i].monto}</td>
                            <td>${data[i].montoFinal}</td>
                            <td>${data[i].turno}</td>
                            <td class="text-center">
                                <a class="btn btn-secondary text-white fw-bold" onclick="javascript:void(0);"><i class="fa-solid fa-lock"></i></a>
                            </td>
                        </tr>`
            }
            else {
                var j = 0;
                body += `<tr>
                            <td hidden>${data[i].id}</td>
                            <td>${j = i + 1}</td>
                            <td class="text-uppercase">${data[i].fechaYHoraInicio}</td>
                            <td>${data[i].fechaYHoraFin}</td>
                            <td>${data[i].nombreCompleto}</td>
                            <td>${data[i].monto}</td>
                            <td>${data[i].montoFinal}</td>
                            <td>${data[i].turno}</td>
                            <td class="text-center">
                                <a class="btn btn-danger text-white fw-bold" data-bs-toggle="modal" data-bs-target="#cerrarCaja"><i class="fa-solid fa-lock"></i></a>
                            </td>
                        </tr>`
            }
        }

        document.getElementById('dineroIniciaCaja').innerHTML = data[0].monto;
        document.getElementById('tabla-de-datos-caja').innerHTML = body;
    }
}
getCashOpen();


function postBanks() {

    var nombreBancoEntidad = document.getElementById("nombre").value;
    var tipoCuenta = document.getElementById("tipoCuenta").value.toUpperCase();
    var numeroCuenta = document.getElementById("numeroCuenta").value;
    var aliasNombreCuenta = document.getElementById("aliasCuenta").value;

    var url = "http://localhost/mbyte/bytebend/api/v1/treasury/banks";

    if (nombreBancoEntidad == "" || tipoCuenta == '' || numeroCuenta == '' || aliasNombreCuenta == '') {
        Swal.fire({
            icon: 'error',
            title: 'Error en la Operación',
            text: 'Debe llenar todos los campos que tengan un *',
            confirmButtonText: 'Entendido',
        });
    }
    else {

        var formdata = new FormData();
        formdata.append("nombreBancoEntidad", nombreBancoEntidad);
        formdata.append("tipoCuenta", tipoCuenta);
        formdata.append("numeroCuenta", numeroCuenta);
        formdata.append("aliasNombreCuenta", aliasNombreCuenta);

        var requestOptions = {
            method: 'POST',
            body: formdata,
            redirect: 'follow'
        };

        fetch(url, requestOptions)
            .then(response => response.json())
            .then(data => mostrarData(data))
            .catch(error => Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Error en la operación, reporte al administrador del sistema',
                confirmButtonText: 'Entendido',
            }, console.log('Posible conexión con BackEnd incorrecta: ' + error)));

        const mostrarData = (data) => {
            Swal.fire({
                icon: 'success',
                title: 'Correcto',
                text: 'La operación se completó.',
                confirmButtonText: 'Entendido',
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#nuevobanco').modal('toggle');
                    getBanks();
                    getUserLog();
                    getBanksSelect();
                    document.getElementById("nombre").value = '';
                    document.getElementById("tipoCuenta").value = '';
                    document.getElementById("numeroCuenta").value = '';
                    document.getElementById("aliasCuenta").value = '';
                } else if (result.isDenied) {
                    $('#nuevobanco').modal('toggle');
                    getBanks();
                    getUserLog();
                    getBanksSelect();
                    document.getElementById("nombre").value = '';
                    document.getElementById("tipoCuenta").value = '';
                    document.getElementById("numeroCuenta").value = '';
                    document.getElementById("aliasCuenta").value = '';
                }
            });
        }
    }
}



function delete_methodBanks(id) {

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
                        getUserLog();
                        getBanksSelect();
                    } else if (result.isDenied) {
                        $('#verbancos').modal('toggle');
                        getBanks();
                        getUserLog();
                        getBanksSelect();
                    }
                });
            }

        } else if (result.isDenied) {
            getBanks();
            getUserLog();
            getBanksSelect();
        }
    });

}