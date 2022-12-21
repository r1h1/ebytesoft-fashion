function get() {

    var url = 'http://localhost/mbyte/bytebend/api/v1/providers/crud';
    fetch(url)
        .then(response => response.json())
        .then(data => mostrarData(data))
        .catch(error => Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Error en la operación, reporte al administrador del sistema',
            footer: error,
            confirmButtonText: 'Entendido',
        }));

    const mostrarData = (data) => {

        let body = '';

        for (var i = 0; i < data.length; i++) {
            var j = 0;
            body += `<tr>
            <td hidden>${data[i].id}</td>
            <td>${j = i + 1}</td>
            <td class="text-uppercase">${data[i].codigo}</td>
            <td>${data[i].tipoProveedor}</td>
            <td>${data[i].tipoPago}</td>
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
    }

}

get();
setInterval(get, 10000);



function getIdEditForm(id) {

    var url = 'http://localhost/mbyte/bytebend/api/v1/providers/crud?id=' + id;

    fetch(url)
        .then(response => response.json())
        .then(data => mostrarData(data))
        .catch(error => Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Error en la operación, reporte al administrador del sistema',
            footer: error,
            confirmButtonText: 'Entendido',
        }));

    const mostrarData = (data) => {
        document.getElementById('id_prove').value = data[0].id;
        document.getElementById('codigo_prove').value = data[0].codigo;
        document.getElementById('tipo_prove').value = data[0].tipoProveedor;
        document.getElementById('tpago_prove').value = data[0].tipoPago;
        document.getElementById('numero_prove').value = data[0].telefono;
        document.getElementById('direccion_prove').value = data[0].direccion;
        document.getElementById('email_prove').value = data[0].correoElectronico;
    }

}


function post() {

    var url = "http://localhost/mbyte/bytebend/api/v1/providers/crud";

    var codigoProv = document.getElementById('codigo_provn').value;
    var tipoProv = document.getElementById('tipo_provn').value;
    var tipoPagoProv = document.getElementById('tpago_provn').value;
    var numeroProv = document.getElementById('numero_provn').value;
    var direccionProv = document.getElementById('direccion_provn').value;
    var correoProv = document.getElementById('email_provn').value;

    if (tipoProv == "" || tipoPagoProv == "" || numeroProv == "" || direccionProv == "" || correoProv == "") {
        Swal.fire({
            icon: 'error',
            title: 'Error en la Operación',
            text: 'Debe llenar todos los campos que tengan un *',
            confirmButtonText: 'Entendido',
        });
    }
    else if (tipoProv != "" || tipoPagoProv != "" || numeroProv != "" || direccionProv != "" || correoProv != "") {

        var formdata = new FormData();

        formdata.append("codigo", codigoProv);
        formdata.append("tipoProveedor", tipoProv);
        formdata.append("tipoPago", tipoPagoProv);
        formdata.append("telefono", numeroProv);
        formdata.append("direccion", direccionProv);
        formdata.append("correoElectronico", correoProv);

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
                footer: error,
                confirmButtonText: 'Entendido',
            }));

        const mostrarData = (data) => {
            Swal.fire({
                icon: 'success',
                title: 'Correcto',
                text: 'La operación se completó.',
                confirmButtonText: 'Entendido',
            }).then((result) => {
                if (result.isConfirmed) {
                    get();
                    $('#nuevo').modal('toggle');
                } else if (result.isDenied) {
                    get();
                    $('#nuevo').modal('toggle');
                }
            });
        }
    }
}


function put() {

    var id = document.getElementById('id_prove').value;
    var codigoProv = document.getElementById('codigo_prove').value;
    var tipoProv = document.getElementById('tipo_prove').value;
    var tipoPagoProv = document.getElementById('tpago_prove').value;
    var numeroProv = document.getElementById('numero_prove').value;
    var direccionProv = document.getElementById('direccion_prove').value;
    var correoProv = document.getElementById('email_prove').value;

    var url = "http://localhost/mbyte/bytebend/api/v1/providers/crud?id=" + id + "&codigo=" + codigoProv + "&tipoProveedor=" + tipoProv +
        "&tipoPago=" + tipoPagoProv + "&telefono=" + numeroProv + "&direccion=" + direccionProv + "&correoElectronico=" + correoProv;

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
            text: 'Error en la operación, reporte al administrador del sistema',
            footer: error,
            confirmButtonText: 'Entendido',
        }));

    const mostrarData = (data) => {
        Swal.fire({
            icon: 'success',
            title: 'Correcto',
            text: 'La operación se completó.',
            confirmButtonText: 'Entendido',
        }).then((result) => {
            if (result.isConfirmed) {
                get();
                $('#editar').modal('toggle');
            } else if (result.isDenied) {
                get();
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
        confirmButtonText: 'Si, Eliminar',
        denyButtonText: `Cancelar`,
    }).then((result) => {

        if (result.isConfirmed) {

            var requestOptions = {
                method: 'DELETE',
                redirect: 'follow'
            };


            var url = 'http://localhost/mbyte/bytebend/api/v1/providers/crud?id=' + id;

            fetch(url, requestOptions)
                .then(response => response.text())
                .then(result => exitoso(result))
                .catch(error => Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Error en la operación, reporte al administrador del sistema',
                    footer: error,
                    confirmButtonText: 'Entendido',
                }));

            const exitoso = (result) => {

                Swal.fire({
                    icon: 'success',
                    title: 'Correcto',
                    text: 'La operación se completó.',
                    confirmButtonText: 'Entendido',
                }).then((result) => {
                    if (result.isConfirmed) {
                        get();
                    } else if (result.isDenied) {
                        get();
                    }
                });
            }

        } else if (result.isDenied) {
            get();
        }
    });

}