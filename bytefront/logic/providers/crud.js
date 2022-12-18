function get() {

    var url = 'http://localhost/mbyte/bytebend/api/v1/providers';
    fetch(url)
        .then(response => response.json())
        .then(data => mostrarData(data))
        .catch(error => Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Error en servicio, nombre del error: ' + error,
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
                <a class="btn btn-warning text-dark fw-bold" data-bs-toggle="modal" data-bs-target="#editar"><i class="fa-solid fa-pen-to-square"></i></a>
                <a class="btn btn-danger text-white fw-bold" onclick="delete_method(${data[i].id})"><i class="fa-solid fa-trash"></i></a>
            </td>
            </tr>`
        }

        document.getElementById('tabla-de-datos-body').innerHTML = body;
    }

}

get();
setInterval(get, 10000);



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


            var url = 'http://localhost/mbyte/bytebend/api/v1/providers?id=' + id;

            fetch(url, requestOptions)
                .then(response => response.text())
                .then(result => exitoso(result))
                .catch(error => Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Error en servicio, nombre del error: ' + error,
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