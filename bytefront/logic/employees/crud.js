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

    }

}
getCashRegisters();