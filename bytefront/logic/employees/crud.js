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
    var url = 'http://localhost/mbyte/bytebend/api/v1/employees/crud';
    fetch(url)
        .then(response => response.json())
        .then(data => mostrarData(data))
        .catch(error => document.getElementById('total-empleados').innerHTML = '0');

    const mostrarData = (data) => {
        document.getElementById('total-empleados').innerHTML = data.length;
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

        let body = '';

        for (var i = 0; i < data.length; i++) {
            var j = 0;
            body += `<option value="${data[i].id}">${data[i].nombreLocal}</option>`
        }

        document.getElementById('localPertenece').innerHTML = body;
        document.getElementById('locales').innerHTML = body;

    }

}
getLocals();



function getCashRegisters() {

    var url = 'http://localhost/mbyte/bytebend/api/v1/cash_registers/crud';
    fetch(url)
        .then(response => response.json())
        .then(data => mostrarData(data))
        .catch(error => console.log(error));

    const mostrarData = (data) => {

        let body = '';

        for (var i = 0; i < data.length; i++) {
            var j = 0;
            body += `<option value="${data[i].id}">${data[i].nombreCaja}</option>`
        }

        document.getElementById('cajaPertenece').innerHTML = body;
        document.getElementById('cajas').innerHTML = body;

    }

}
getCashRegisters();



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


    if (localN == "" || cajaN == "" || nombreN == "" || dpiNitN == "" || direccionN == "" || telefonoN == "" || usuarioN == "" || claveN == "") {
        Swal.fire({
            icon: 'error',
            title: 'Error en la Operación',
            text: 'Debe llenar todos los campos que tengan un *',
            confirmButtonText: 'Entendido',
        });
    }
    else if (localN != "" || cajaN != "" || nombreN != "" || dpiNitN != "" || direccionN != "" || telefonoN != "" || usuarioN != "" || claveN != "") {

        var formdata = new FormData();

        formdata.append("codigo", codigo);
        formdata.append("nombreLocal", nombre);
        formdata.append("telefono", telefono);
        formdata.append("direccion", direccion);
        formdata.append("correoElectronico", correo);
        formdata.append("empresaPertenece", empresa);
        formdata.append("codigo", codigo);
        formdata.append("nombreLocal", nombre);
        formdata.append("telefono", telefono);
        formdata.append("direccion", direccion);
        formdata.append("correoElectronico", correo);
        formdata.append("empresaPertenece", empresa);
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
            }, console.log('Posible conexión con BackEnd incorrecta, codigo: ' + error)));

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