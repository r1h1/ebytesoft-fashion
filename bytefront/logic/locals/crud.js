
// Función para generar números random
function randomNumberGenerator() {

    const characters = "ABCDEFGHIJKLMNÑOPQRSTUVWXYZ0123456789";
    const charactersLength = characters.length;
    let result = "";

    for (let i = 0; i < 6; i++) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }

    return result;

}


// Función para setear el codigo generado
function codigo() {
    document.getElementById("codigo_n").value = 'LOCAL' + randomNumberGenerator();

    var empresa = document.getElementById('empresaPertenece').value;
    if (empresa == '' || empresa == null || empresa == 0) {
        Swal.fire({
            icon: 'warning',
            title: 'Advertencia',
            text: 'No existen datos de la empresa, por favor, informe al administrador',
            confirmButtonText: 'Entendido'
        });
        $('#nuevo').modal('toggle');
    }
    else {
        console.log('1');
    }
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



function get() {

    var url = 'http://localhost/mbyte/bytebend/api/v1/locals/crud';
    fetch(url)
        .then(response => response.json())
        .then(data => mostrarData(data))
        .catch(error => console.log('Posible conexión con BackEnd incorrecta'))

    const mostrarData = (data) => {

        let body = '';

        for (var i = 0; i < data.length; i++) {
            var j = 0;
            body += `<tr>
            <td hidden>${data[i].id}</td>
            <td>${j = i + 1}</td>
            <td class="text-uppercase">${data[i].codigo}</td>
            <td>${data[i].nombreLocal}</td>
            <td>${data[i].nombreEmpresa}</td>
            <td>${data[i].telefono}</td>
            <td>${data[i].direccion}</td>
            <td>${data[i].correoElectronico}</td>
            <td class="text-center">
                <a class="btn btn-warning text-dark fw-bold" onclick="getIdEditForm(${data[i].id})" data-bs-toggle="modal" data-bs-target="#editar"><i class="fa-solid fa-pen-to-square"></i></a>
                <a class="btn btn-danger text-white fw-bold" onclick="delete_method(${data[i].id})"><i class="fa-solid fa-trash"></i></a>
            </td>
            </tr>`
        }

        document.getElementById('tabla-de-datos-body').innerHTML = body;
        getTotals(data);
    }

}
get();


function getTotals(data) {
    document.getElementById('total-locals').innerHTML = data.length;
}
getTotals();



function getEnterprices() {

    var url = 'http://localhost/mbyte/bytebend/api/v1/locals/enterprices';
    fetch(url)
        .then(response => response.json())
        .then(data => mostrarData(data))
        .catch(error => console.log(error));

    const mostrarData = (data) => {
        if (data.length == 0) {
            Swal.fire({
                icon: 'warning',
                title: 'Advertencia',
                text: 'No existen datos de la empresa, por favor, informe al administrador',
                confirmButtonText: 'Entendido'
            });
            console.log('No datos empresa, insertelo');
        }
        else {
            let body = '';

            for (var i = 0; i < data.length; i++) {
                var j = 0;
                body += `<option value="${data[i].id}">${data[i].nombreEmpresa}</option>`
            }
            document.getElementById('empresaPertenece').innerHTML = body;
            document.getElementById('empresaEdicion').innerHTML = body;
        }
    }

}
getEnterprices();



function getIdEditForm(id) {

    var url = 'http://localhost/mbyte/bytebend/api/v1/locals/crud?id=' + id;

    fetch(url)
        .then(response => response.json())
        .then(data => mostrarData(data))
        .catch(error => Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Error en la operación, reporte al administrador del sistema',
            confirmButtonText: 'Entendido',
        }, console.log(error)));

    const mostrarData = (data) => {
        document.getElementById('idl').value = data[0].id;
        document.getElementById('nombre_e').value = data[0].nombreLocal;
        document.getElementById('empresaActual').value = data[0].nombreEmpresa;
        document.getElementById('telefono_e').value = data[0].telefono;
        document.getElementById('direccion_e').value = data[0].direccion;
        document.getElementById('correo_e').value = data[0].correoElectronico;
    }

}



function post() {

    var url = "http://localhost/mbyte/bytebend/api/v1/locals/crud";

    var codigo = document.getElementById('codigo_n').value;
    var nombre = document.getElementById('nombre_n').value;
    var empresa = document.getElementById('empresaPertenece').value;
    var telefono = document.getElementById('telefono_n').value;
    var direccion = document.getElementById('direccion_n').value;
    var correo = document.getElementById('correo_n').value;


    if (nombre == "" || empresa == "" || telefono == "" || direccion == "" || codigo == "" || correo == "") {
        Swal.fire({
            icon: 'error',
            title: 'Error en la Operación',
            text: 'Debe llenar todos los campos que tengan un *',
            confirmButtonText: 'Entendido',
        });
    }
    else if (nombre != "" || empresa != "" || telefono != "" || direccion != "" || codigo != "" || correo != "") {

        var formdata = new FormData();

        formdata.append("codigo", codigo);
        formdata.append("nombreLocal", nombre);
        formdata.append("telefono", telefono);
        formdata.append("direccion", direccion);
        formdata.append("correoElectronico", correo);
        formdata.append("empresaPertenece", empresa);

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
            }, console.log('Posible conexión con BackEnd incorrecta' + error)));

        const mostrarData = (data) => {
            Swal.fire({
                icon: 'success',
                title: 'Correcto',
                text: 'La operación se completó.',
                confirmButtonText: 'Entendido',
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#nuevo').modal('toggle');
                    get();
                    getTotals();
                    document.getElementById('nombre_n').value = '';
                    document.getElementById('telefono_n').value = '';
                    document.getElementById('direccion_n').value = '';
                    document.getElementById('correo_n').value = '';
                } else if (result.isDenied) {
                    $('#nuevo').modal('toggle');
                    get();
                    getTotals();
                    document.getElementById('nombre_n').value = '';
                    document.getElementById('telefono_n').value = '';
                    document.getElementById('direccion_n').value = '';
                    document.getElementById('correo_n').value = '';
                }
            });
        }
    }
}



function put() {

    var idl = document.getElementById('idl').value;
    var nombrel = document.getElementById('nombre_e').value;
    var empresal = document.getElementById('empresaEdicion').value;
    var telefonol = document.getElementById('telefono_e').value;
    var direccionl = document.getElementById('direccion_e').value;
    var correol = document.getElementById('correo_e').value;

    var url = "http://localhost/mbyte/bytebend/api/v1/locals/crud?nombreLocal=" + nombrel + "&telefono=" + telefonol +
        "&direccion=" + direccionl + "&correoElectronico=" + correol + "&empresaPertenece=" + empresal + "&id=" + idl;


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
        Swal.fire({
            icon: 'success',
            title: 'Correcto',
            text: 'La operación se completó.',
            confirmButtonText: 'Entendido',
        }).then((result) => {
            if (result.isConfirmed) {
                get();
                getTotals();
                $('#editar').modal('toggle');
            } else if (result.isDenied) {
                get();
                getTotals();
                $('#editar').modal('toggle');
            }
        });
    }
}



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


            var url = 'http://localhost/mbyte/bytebend/api/v1/locals/crud?id=' + id;

            fetch(url, requestOptions)
                .then(response => response.text())
                .then(result => exitoso(result))
                .catch(error => Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Error en la operación, reporte al administrador del sistema',
                    confirmButtonText: 'Entendido',
                }, console.log('Posible conexión con BackEnd incorrecta')));

            const exitoso = (result) => {

                Swal.fire({
                    icon: 'success',
                    title: 'Correcto',
                    text: 'La operación se completó.',
                    confirmButtonText: 'Entendido',
                }).then((result) => {
                    if (result.isConfirmed) {
                        get();
                        getTotals();
                    } else if (result.isDenied) {
                        get();
                        getTotals();
                    }
                });
            }

        } else if (result.isDenied) {
            get();
            getTotals();
        }
    });

}