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
        document.getElementById("membresia-codigo").value = 'FS' + '-' + randomNumberGenerator();
    }
    else {
        document.getElementById("div-membresia").style.display = "none";
        document.getElementById("membresia-codigo").value = '';
    }
}


// Función para setear los valores en los inputs de empleado
function codigoCliente() {
    document.getElementById("codigo").value = 'CL' + randomNumberGenerator();
}


function get() {

    var url = 'http://localhost/mbyte/bytebend/api/v1/clients/crud';
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
            <td>${data[i].membresia}</td>
            <td>${data[i].codigoMembresia}</td>
            <td>${data[i].nit}</td>
            <td>${data[i].nombreCompleto}</td>
            <td>${data[i].direccion}</td>
            <td>${data[i].telefono}</td>
            <td>${data[i].correoElectronico}</td>
            <td>${data[i].puntosDisponibles}</td>
            <td class="text-center">
                <a class="btn btn-warning text-dark fw-bold" onclick="getIdEditForm(${data[i].id})" data-bs-toggle="modal" data-bs-target="#editar"><i class="fa-solid fa-pen-to-square"></i></a>
                <a class="btn btn-danger text-white fw-bold" onclick="delete_method(${data[i].id})"><i class="fa-solid fa-trash"></i></a>
            </td>
            </tr>`
        }

        document.getElementById('tabla-de-datos-body').innerHTML = body;
    }

}
get();


function getTotals() {

    var url = 'http://localhost/mbyte/bytebend/api/v1/clients/count';
    fetch(url)
        .then(response => response.json())
        .then(data => mostrarData(data))
        .catch(error => document.getElementById('total-clients').innerHTML = '0');

    const mostrarData = (data) => {
        document.getElementById('total-clients').innerHTML = data[0].totalClients;
    }

}
getTotals();



function getIdEditForm(id) {

    var url = 'http://localhost/mbyte/bytebend/api/v1/clients/crud?id=' + id;

    fetch(url)
        .then(response => response.json())
        .then(data => mostrarData(data))
        .catch(error => Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Error en la operación, reporte al administrador del sistema',
            confirmButtonText: 'Entendido',
        }));

    const mostrarData = (data) => {
        document.getElementById('id_c').value = data[0].id;
        document.getElementById('nit_e').value = data[0].nit;
        document.getElementById('nombre_e').value = data[0].nombreCompleto;
        document.getElementById('direccion_e').value = data[0].direccion;
        document.getElementById('telefono_e').value = data[0].telefono;
        document.getElementById('correo_e').value = data[0].correoElectronico;
        document.getElementById('membresia-actual').value = data[0].membresia;
    }

}



function post() {

    var url = "http://localhost/mbyte/bytebend/api/v1/clients/crud";

    var codigo = document.getElementById('codigo').value;
    var nit = document.getElementById('nit_n').value;
    var nombre = document.getElementById('nombre_n').value;
    var direccion = document.getElementById('direccion_n').value;
    var telefono = document.getElementById('telefono_n').value;
    var correo = document.getElementById('correo_n').value;
    var tipoMembresia = document.getElementById('tipo-membresia').value;
    var membresiaCodigo = document.getElementById('membresia-codigo').value;
    var puntosDisponibles = '0';


    if (nit == "" || nombre == "" || direccion == "" || telefono == "" || correo == "") {
        Swal.fire({
            icon: 'error',
            title: 'Error en la Operación',
            text: 'Debe llenar todos los campos que tengan un *',
            confirmButtonText: 'Entendido',
        });
    }
    else if (nit != "" || nombre != "" || direccion != "" || telefono != "" || correo != "") {

        var formdata = new FormData();

        formdata.append("codigo", codigo);
        formdata.append("membresia", tipoMembresia);
        formdata.append("codigoMembresia", membresiaCodigo);
        formdata.append("nit", nit);
        formdata.append("nombreCompleto", nombre);
        formdata.append("direccion", direccion);
        formdata.append("telefono", telefono);
        formdata.append("correoElectronico", correo);
        formdata.append("puntosDisponibles", puntosDisponibles);

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
                text: 'Error en la operación, reporte al administrador',
                confirmButtonText: 'Entendido',
            }, console.log('Posible conexión con BackEnd incorrecta')));

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
                    document.getElementById('codigo').value = '';
                    document.getElementById('nit_n').value = '';
                    document.getElementById('nombre_n').value = '';
                    document.getElementById('direccion_n').value = '';
                    document.getElementById('telefono_n').value = '';
                    document.getElementById('correo_n').value = '';
                    document.getElementById('tipo-membresia').value = 0;
                    document.getElementById('membresia-codigo').value = '';
                    document.getElementById("div-membresia").style.display = "none";
                } else if (result.isDenied) {
                    $('#nuevo').modal('toggle');
                    get();
                    getTotals();
                    document.getElementById('id_provn').value = '';
                    document.getElementById('codigo_provn').value = '';
                    document.getElementById('tipo_provn').value = '';
                    document.getElementById('tpago_provn').value = '';
                    document.getElementById('numero_provn').value = '';
                    document.getElementById('direccion_provn').value = '';
                    document.getElementById('email_provn').value = '';
                    document.getElementById("div-membresia").style.display = "none";
                }
            });
        }
    }
}



function put() {

    var id = document.getElementById('id_c').value;
    var nit = document.getElementById('nit_e').value;
    var nombre = document.getElementById('nombre_e').value;
    var direccion = document.getElementById('direccion_e').value;
    var telefono = document.getElementById('telefono_e').value;
    var correo = document.getElementById('correo_e').value;
    var tipoMembresia = document.getElementById('membresia_nueva').value;


    var url = "http://localhost/mbyte/bytebend/api/v1/clients/crud?id=" + id;

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
        }, console.log(error)));

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


            var url = 'http://localhost/mbyte/bytebend/api/v1/clients/crud?id=' + id;

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