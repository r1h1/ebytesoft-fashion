// Función para generar números random
function randomNumberGenerator() {
    const characters = "0123456789ABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
    const charactersLength = characters.length;
    let result = "";
    for (let i = 0; i < 6; i++) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return result;
}


// Función para setear el codigo generado
function codigo() {
    document.getElementById("caja-codigo").value = 'CR' + randomNumberGenerator();
    var locales = document.getElementById('localesN').value;

    if (locales == '' || locales == 0 || locales == null) {
        $('#nuevo').modal('toggle');
        Swal.fire({
            icon: 'warning',
            title: 'Advertencia',
            text: 'No existe ningún local creado, por favor, cree uno o informe al administrador',
            confirmButtonText: 'Entendido'
        });
        console.log('0_0');
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
    var url = 'http://localhost/mbyte/bytebend/api/v1/cash_registers/crud';
    fetch(url)
        .then(response => response.json())
        .then(data => mostrarData(data))
        .catch(error => console.log('Error devuelto por BackEnd: ' + error))

    const mostrarData = (data) => {

        let body = '';

        for (var i = 0; i < data.length; i++) {
            var j = 0;
            body += `<tr>
            <td hidden>${data[i].id}</td>
            <td>${j = i + 1}</td>
            <td class="text-uppercase">${data[i].codigo}</td>
            <td>${data[i].nombreLocal}</td>
            <td>${data[i].nombreCaja}</td>
            <td class="text-center">
                <a class="btn btn-warning text-dark fw-bold" onclick="getIdEditForm(${data[i].id})" data-bs-toggle="modal" data-bs-target="#editar">
                <i class="fa-solid fa-pen-to-square"></i></a>
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
    if (data) {
        document.getElementById('total-cajas').innerHTML = data.length;
    }
}
getTotals();



function getLocals() {

    var url = 'http://localhost/mbyte/bytebend/api/v1/locals/crud';
    fetch(url)
        .then(response => response.json())
        .then(data => mostrarData(data))
        .catch(error => console.log(error));

    const mostrarData = (data) => {
        if (data.length == 0) {
            Swal.fire({
                icon: 'warning',
                title: 'Advertencia',
                text: 'No existe ningún local creado, por favor, cree uno o informe al administrador',
                confirmButtonText: 'Entendido'
            });
        }
        else {
            let body = '';

            for (var i = 0; i < data.length; i++) {
                var j = 0;
                body += `<option value="${data[i].id}">${data[i].nombreLocal}</option>`
            }

            document.getElementById('localesN').innerHTML = body;
            document.getElementById('localesE').innerHTML = body;

        }
    }

}
getLocals();




function getIdEditForm(id) {

    var url = 'http://localhost/mbyte/bytebend/api/v1/cash_registers/crud?id=' + id;

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
        document.getElementById('idcr').value = data[0].id;
        document.getElementById('localActual').value = data[0].nombreLocal;
        document.getElementById('nombreE').value = data[0].nombreCaja;
    }

}




function post() {

    var url = "http://localhost/mbyte/bytebend/api/v1/cash_registers/crud";

    var codigo = document.getElementById('caja-codigo').value;
    var localesN = document.getElementById('localesN').value;
    var nombreN = document.getElementById('nombreN').value;


    if (localesN == "" || nombreN == "" || codigo == "") {
        Swal.fire({
            icon: 'error',
            title: 'Error en la Operación',
            text: 'Debe llenar todos los campos que tengan un *',
            confirmButtonText: 'Entendido',
        });
        $('#nuevo').modal('toggle');
    }
    else if (localesN != "" || nombreN != "" || codigo != "") {

        var formdata = new FormData();

        formdata.append("codigo", codigo);
        formdata.append("nombreCaja", nombreN);
        formdata.append("localPertenece", localesN);

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
            }, console.log('Error devuelto por BackEnd: ' + error)));

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
                    getLocals();
                    document.getElementById('caja-codigo').value = '';
                    document.getElementById('localesN').value = 0;
                    document.getElementById('nombreN').value = '';
                } else if (result.isDenied) {
                    $('#nuevo').modal('toggle');
                    get();
                    getTotals();
                    getLocals();
                    document.getElementById('caja-codigo').value = '';
                    document.getElementById('localesN').value = 0;
                    document.getElementById('nombreN').value = '';
                }
            });
        }
    }
    else {
        Swal.fire({
            icon: 'error',
            title: 'Error en la Operación',
            text: 'Error no manejado, contacte al administrador',
            confirmButtonText: 'Entendido',
        });
    }
}



function put() {

    var idcr = document.getElementById('idcr').value;
    var localesE = document.getElementById('localesE').value;
    var nombreE = document.getElementById('nombreE').value;


    var url = "http://localhost/mbyte/bytebend/api/v1/cash_registers/crud?nombreCaja=" + nombreE + "&localPertenece=" + localesE + "&id=" + idcr;

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
                getLocals();
                $('#editar').modal('toggle');
            } else if (result.isDenied) {
                get();
                getTotals();
                getLocals();
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


            var url = 'http://localhost/mbyte/bytebend/api/v1/cash_registers/crud?id=' + id;

            fetch(url, requestOptions)
                .then(response => response.text())
                .then(result => exitoso(result))
                .catch(error => Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Error en la operación, reporte al administrador del sistema',
                    confirmButtonText: 'Entendido',
                }, console.log('Posible conexión con BackEnd incorrecta: ' + error)));

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
                        getLocals();
                    } else if (result.isDenied) {
                        get();
                        getTotals();
                        getLocals();
                    }
                });
            }

        } else if (result.isDenied) {
            get();
            getTotals();
            getLocals();
        }
    });

}