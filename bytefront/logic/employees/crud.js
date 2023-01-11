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
    document.getElementById("empleado-codigo").value = 'EMPF' + randomNumberGenerator();
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
    var url = 'http://localhost/mbyte/bytebend/api/v1/employees/crud';
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
            <td>${data[i].departamento}</td>
            <td>${data[i].nombreCompleto}</td>
            <td>${data[i].dpiNit}</td>
            <td>${data[i].telefono}</td>
            <td>${data[i].direccion}</td>
            <td>${data[i].correoElectronico}</td>
            <td>${data[i].fechaNacimiento}</td>
            <td>${data[i].puesto}</td>
            <td>${data[i].salario}</td>
            <td>${data[i].usuario}</td>
            <td>${data[i].descripcion}</td>
            <td class="text-center">
                <a class="btn btn-warning text-dark fw-bold" onclick="getIdEditForm(${data[i].id})" data-bs-toggle="modal" data-bs-target="#editar"><i class="fa-solid fa-pen-to-square"></i></a>
                <a class="btn btn-danger text-white fw-bold" onclick="delete_method(${data[i].id})"><i class="fa-solid fa-trash"></i></a>
            </td>
            </tr>`
        }

        document.getElementById('tabla-de-datos-body').innerHTML = body;
        document.getElementById('cajaPertenece').disabled = true;
        getTotals(data);
    }
}
get();



function getTotals(data) {
    document.getElementById('total-empleados').innerHTML = data.length;
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

            document.getElementById('localPertenece').innerHTML = body;
            document.getElementById('locales').innerHTML = body;
        }

    }

}
getLocals();



function getCashRegisters() {

    var id = document.getElementById("localPertenece").value;
    var url = 'http://localhost/mbyte/bytebend/api/v1/cash_registers/crud?localPertenece=' + id;

    fetch(url)
        .then(response => response.json())
        .then(data => mostrarData(data))
        .catch(error => console.log(error));

    const mostrarData = (data) => {

        if (data.length == 0) {
            $('#nuevo').modal('toggle');
            Swal.fire({
                icon: 'warning',
                title: 'Advertencia',
                text: 'Primero debe crear un local, y a continuación, una caja para continuar',
                confirmButtonText: 'Entendido'
            });
        }
        else {
            let body = '';

            for (var i = 0; i < data.length; i++) {
                var j = 0;
                body += `<option value="${data[i].id}">${data[i].nombreCaja}</option>`;
            }
            if (data.length > 0) {
                document.getElementById('cajaPertenece').disabled = false;
            }
            else {
                document.getElementById('cajaPertenece').disabled = true;
            }

            document.getElementById('cajaPertenece').innerHTML = body;
            document.getElementById('cajas').innerHTML = body;
        }
    }

}



function getCashRegistersEdit() {

    var id2 = document.getElementById("locales").value;
    var url2 = 'http://localhost/mbyte/bytebend/api/v1/cash_registers/crud?localPertenece=' + id2;

    fetch(url2)
        .then(response => response.json())
        .then(data => mostrarData(data))
        .catch(error => console.log(error));

    const mostrarData = (data) => {
        let body2 = '';

        for (var i = 0; i < data.length; i++) {
            var j = 0;
            body2 += `<option value="${data[i].id}">${data[i].nombreCaja}</option>`;
        }
        if (data.length > 0) {
            document.getElementById('cajas').disabled = false;
        }
        else {
            document.getElementById('cajas').disabled = true;
        }
        document.getElementById('cajas').innerHTML = body2;
    }
}


function getRols() {

    var url = 'http://localhost/mbyte/bytebend/api/v1/dashboard/rols';
    fetch(url)
        .then(response => response.json())
        .then(data => mostrarData(data))
        .catch(error => console.log(error));

    const mostrarData = (data) => {

        let body = '';

        for (var i = 0; i < data.length; i++) {
            body += `<option value="${data[i].id}">${data[i].descripcion}</option>`
        }

        document.getElementById('rolN').innerHTML = body;

    }

}
getRols();



function getIdEditForm(id) {

    var url = 'http://localhost/mbyte/bytebend/api/v1/employees/crud?id=' + id;

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
        document.getElementById('ide').value = data[0].id;
        document.getElementById('localActual').value = data[0].nombreLocal;
        document.getElementById('cajaActual').value = data[0].nombreCaja;
        document.getElementById('departamentoE').value = data[0].departamento;
        document.getElementById('nombreE').value = data[0].nombreCompleto;
        document.getElementById('dpiNitE').value = data[0].dpiNit;
        document.getElementById('telefonoE').value = data[0].telefono;
        document.getElementById('direccionE').value = data[0].direccion;
        document.getElementById('correoE').value = data[0].correoElectronico;
        document.getElementById('fechaNacimientoE').value = data[0].fechaNacimiento;
        document.getElementById('puestoE').value = data[0].puesto;
        document.getElementById('salarioE').value = data[0].salario;
        document.getElementById('usuarioE').value = data[0].usuario;
    }

}



function post() {

    var url = "http://localhost/mbyte/bytebend/api/v1/employees/crud";

    var codigo = document.getElementById('empleado-codigo').value;
    var localN = document.getElementById('localPertenece').value;
    var cajaN = document.getElementById('cajaPertenece').value;
    var departamentoN = document.getElementById('departamentoN').value;
    var nombreN = document.getElementById('nombreN').value;
    var dpiNitN = document.getElementById('dpiNitN').value;
    var telefonoN = document.getElementById('telefonoN').value;
    var direccionN = document.getElementById('direccionN').value;
    var correoN = document.getElementById('correoN').value;
    var fechaNacimientoN = document.getElementById('fechaNacimientoN').value;
    var puestoN = document.getElementById('puestoN').value;
    var salarioN = document.getElementById('salarioN').value;
    var usuarioN = document.getElementById('usuarioN').value;
    var claveN = document.getElementById('claveN').value;
    var rolN = document.getElementById('rolN').value;


    if (localN == "" || nombreN == "" || dpiNitN == "" || direccionN == "" || telefonoN == "" || usuarioN == "" || claveN == "" || rolN == "") {
        Swal.fire({
            icon: 'error',
            title: 'Error en la Operación',
            text: 'Debe llenar todos los campos que tengan un *',
            confirmButtonText: 'Entendido'
        });
    }
    else if (cajaN == "") {
        Swal.fire({
            icon: 'error',
            title: 'Error en la Operación',
            text: 'Debe seleccionar una caja de un local, si esta no existe, por favor cree una en la sección Cajas',
            confirmButtonText: 'Entendido'
        });
    }
    else if (localN != "" || cajaN != "" || nombreN != "" || dpiNitN != "" || direccionN != "" || telefonoN != "" || usuarioN != "" || claveN != "" || rolN != "") {

        var formdata = new FormData();

        formdata.append("codigo", codigo);
        formdata.append("departamento", departamentoN);
        formdata.append("nombreCompleto", nombreN);
        formdata.append("dpiNit", dpiNitN);
        formdata.append("telefono", telefonoN);
        formdata.append("direccion", direccionN);
        formdata.append("correoElectronico", correoN);
        formdata.append("fechaNacimiento", fechaNacimientoN);
        formdata.append("puesto", puestoN);
        formdata.append("salario", salarioN);
        formdata.append("usuario", usuarioN);
        formdata.append("clave", claveN);
        formdata.append("localPertenece", localN);
        formdata.append("cajaPertenece", cajaN);
        formdata.append("rol", rolN);

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
            }, console.log('Posible conexión con BackEnd incorrecta, código error: ' + error)));

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
                    getCashRegisters();
                    getLocals();
                    getCashRegistersEdit();
                    getRols();
                    document.getElementById('localPertenece').value = '';
                    document.getElementById('cajaPertenece').value = '';
                    document.getElementById('empleado-codigo').value = '';
                    document.getElementById('departamentoN').value = '';
                    document.getElementById('nombreN').value = '';
                    document.getElementById('dpiNitN').value = '';
                    document.getElementById('telefonoN').value = '';
                    document.getElementById('direccionN').value = '';
                    document.getElementById('correoN').value = '';
                    document.getElementById('fechaNacimientoN').value = '';
                    document.getElementById('puestoN').value = '';
                    document.getElementById('salarioN').value = '';
                    document.getElementById('usuarioN').value = '';
                    document.getElementById('claveN').value = '';
                } else if (result.isDenied) {
                    $('#nuevo').modal('toggle');
                    get();
                    getTotals();
                    getCashRegisters();
                    getLocals();
                    getCashRegistersEdit();
                    getRols();
                    document.getElementById('localPertenece').value = '';
                    document.getElementById('cajaPertenece').value = '';
                    document.getElementById('empleado-codigo').value = '';
                    document.getElementById('departamentoN').value = '';
                    document.getElementById('nombreN').value = '';
                    document.getElementById('dpiNitN').value = '';
                    document.getElementById('telefonoN').value = '';
                    document.getElementById('direccionN').value = '';
                    document.getElementById('correoN').value = '';
                    document.getElementById('fechaNacimientoN').value = '';
                    document.getElementById('puestoN').value = '';
                    document.getElementById('salarioN').value = '';
                    document.getElementById('usuarioN').value = '';
                    document.getElementById('claveN').value = '';
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

    var ide = document.getElementById('ide').value;
    var localE = document.getElementById('locales').value;
    var cajaE = document.getElementById('cajas').value;
    var departamentoE = document.getElementById('departamentoE').value;
    var nombreE = document.getElementById('nombreE').value;
    var dpiNitE = document.getElementById('dpiNitE').value;
    var telefonoE = document.getElementById('telefonoE').value;
    var direccionE = document.getElementById('direccionE').value;
    var correoE = document.getElementById('correoE').value;
    var fechaNacimientoE = document.getElementById('fechaNacimientoE').value;
    var puestoE = document.getElementById('puestoE').value;
    var salarioE = document.getElementById('salarioE').value;
    var usuarioE = document.getElementById('usuarioE').value;


    var url = "http://localhost/mbyte/bytebend/api/v1/employees/crud?departamento=" + departamentoE + "&nombreCompleto=" + nombreE +
        "&dpiNit=" + dpiNitE + "&telefono=" + telefonoE + "&direccion=" + direccionE + "&correoElectronico=" + correoE + "&fechaNacimiento=" + fechaNacimientoE +
        "&puesto=" + puestoE + "&salario=" + salarioE + "&usuario=" + usuarioE + "&localPertenece=" + localE + "&cajaPertenece=" + cajaE + "&id=" + ide;


    if (cajaE == "") {
        Swal.fire({
            icon: 'error',
            title: 'Error en la Operación',
            text: 'Debe seleccionar una caja de un local, si esta no existe, por favor cree una en la sección Cajas',
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
            Swal.fire({
                icon: 'success',
                title: 'Correcto',
                text: 'La operación se completó.',
                confirmButtonText: 'Entendido',
            }).then((result) => {
                if (result.isConfirmed) {
                    get();
                    getTotals();
                    getCashRegisters();
                    getLocals();
                    getCashRegistersEdit();
                    getRols();
                    $('#editar').modal('toggle');
                } else if (result.isDenied) {
                    get();
                    getTotals();
                    getCashRegisters();
                    getLocals();
                    getCashRegistersEdit();
                    getRols();
                    $('#editar').modal('toggle');
                }
            });
        }
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


            var url = 'http://localhost/mbyte/bytebend/api/v1/employees/crud?id=' + id;

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
                        getCashRegisters();
                        getLocals();
                        getCashRegistersEdit();
                        getRols();
                    } else if (result.isDenied) {
                        get();
                        getTotals();
                        getCashRegisters();
                        getLocals();
                        getCashRegistersEdit();
                        getRols();
                    }
                });
            }

        } else if (result.isDenied) {
            get();
            getTotals();
            getCashRegisters();
            getLocals();
            getCashRegistersEdit();
            getRols();
        }
    });

}