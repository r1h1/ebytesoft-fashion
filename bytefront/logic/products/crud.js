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

    var url = 'http://localhost/mbyte/bytebend/api/v1/products/crud';
    fetch(url)
        .then(response => response.json())
        .then(data => mostrarData(data))
        .catch(error => console.log('Posible conexión con BackEnd incorrecta: ' + error))

    const mostrarData = (data) => {

        let body = '';

        for (var i = 0; i < data.length; i++) {
            var j = 0;
            body += `<tr>
            <td hidden>${data[i].id}</td>
            <td>${j = i + 1}</td>
            <td class="text-uppercase">${data[i].codigo}</td>
            <td>${data[i].nombre}</td>
            <td>${data[i].descripcion}</td>
            <td>${data[i].cantidad}</td>
            <td>${data[i].estado}</td>
            <td>${data[i].nombreLocal}</td>
            <td>${data[i].nombreCategoria}</td>
            <td>${data[i].tipoProveedor}</td>
            <td>${data[i].nombreTipo}</td>
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

    var url = 'http://localhost/mbyte/bytebend/api/v1/products/crud';
    fetch(url)
        .then(response => response.json())
        .then(data => mostrarData(data))
        .catch(error => document.getElementById('total-products').innerHTML = '0');

    const mostrarData = (data) => {
        document.getElementById('total-products').innerHTML = data.length;
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


function getProviders() {

    var url = 'http://localhost/mbyte/bytebend/api/v1/providers/crud';
    fetch(url)
        .then(response => response.json())
        .then(data => mostrarData(data))
        .catch(error => console.log('Posible conexión con BackEnd incorrecta: ' + error))

    const mostrarData = (data) => {
        if (data.length == 0) {
            Swal.fire({
                icon: 'warning',
                title: 'Advertencia',
                text: 'No existe ningún proveedor creado, por favor, cree uno o informe al administrador',
                confirmButtonText: 'Entendido'
            });
        }
        else {
            let body = '';
            for (var i = 0; i < data.length; i++) {
                var j = 0;
                body += `<option value="${data[i].id}">${data[i].tipoProveedor}</option>`
            }
            document.getElementById('proveedorN').innerHTML = body;
            document.getElementById('proveedorE').innerHTML = body;
        }
    }
}
getProviders();


function getCategories() {

    var url = 'http://localhost/mbyte/bytebend/api/v1/categories/crud';
    fetch(url)
        .then(response => response.json())
        .then(data => mostrarData(data))
        .catch(error => console.log('Posible conexión con BackEnd incorrecta: ' + error))

    const mostrarData = (data) => {
        if (data.length == 0) {
            Swal.fire({
                icon: 'warning',
                title: 'Advertencia',
                text: 'No existe ninguna categoría creada, por favor, cree uno o informe al administrador',
                confirmButtonText: 'Entendido'
            });
        }
        else {
            let body = '';
            for (var i = 0; i < data.length; i++) {
                var j = 0;
                body += `<option value="${data[i].id}">${data[i].nombreCategoria}</option>`
            }
            document.getElementById('categoriaN').innerHTML = body;
            document.getElementById('categoriaE').innerHTML = body;
        }
    }
}
getCategories();


function getProductTypes() {

    var url = 'http://localhost/mbyte/bytebend/api/v1/product_type/crud';
    fetch(url)
        .then(response => response.json())
        .then(data => mostrarData(data))
        .catch(error => console.log('Posible conexión con BackEnd incorrecta: ' + error))

    const mostrarData = (data) => {
        if (data.length == 0) {
            Swal.fire({
                icon: 'warning',
                title: 'Advertencia',
                text: 'No existe ningún tipo de producto creado, por favor, cree uno o informe al administrador',
                confirmButtonText: 'Entendido'
            });
        }
        else {
            let body = '';
            for (var i = 0; i < data.length; i++) {
                var j = 0;
                body += `<option value="${data[i].id}">${data[i].nombreTipo}</option>`
            }
            document.getElementById('tipoProductoN').innerHTML = body;
            document.getElementById('tipoProductoE').innerHTML = body;
        }
    }
}
getProductTypes();


function getProductTypesButton() {
    var url = 'http://localhost/mbyte/bytebend/api/v1/product_type/crud';
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
            document.getElementById('listar-tipo-productos').innerHTML = body;
        }
        else {
            let body = '';
            for (var i = 0; i < data.length; i++) {
                var j = 0;
                body += `<div class="card gray mt-3">
            <div class="row">
                <div class="col me-2">
                    <div class="card-body p-3">
                        <p id="idTipoProducto" hidden>${data[i].id}</p>
                        <p class="card-text text-muted fw-bold h5">${data[i].nombreTipo}</p>
                    </div>
                </div>
                <div class="col mt-3 mb-3">
                    <a class="btn btn-danger text-white fw-bold" onclick="deleteProductTypes(${data[i].id})"><i class="fa-solid fa-trash"></i> Eliminar</a>
                </div>
            </div>
        </div>`
            }
            document.getElementById('listar-tipo-productos').innerHTML = body;
        }
    }
}


function getCategoriesButton() {
    var url = 'http://localhost/mbyte/bytebend/api/v1/categories/crud';
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
            document.getElementById('listar-categorias').innerHTML = body;
        }
        else {
            let body = '';
            for (var i = 0; i < data.length; i++) {
                var j = 0;
                body += `<div class="card gray mt-3">
            <div class="row">
                <div class="col me-2">
                    <div class="card-body p-3">
                        <p id="idTipoProducto" hidden>${data[i].id}</p>
                        <p class="card-text text-muted fw-bold h5">${data[i].nombreCategoria}</p>
                    </div>
                </div>
                <div class="col mt-3 mb-3">
                    <a class="btn btn-danger text-white fw-bold" onclick="deleteCategories(${data[i].id})"><i class="fa-solid fa-trash"></i> Eliminar</a>
                </div>
            </div>
        </div>`
            }
            document.getElementById('listar-categorias').innerHTML = body;
        }
    }
}


function getIdEditForm(id) {

    var url = 'http://localhost/mbyte/bytebend/api/v1/products/crud?id=' + id;

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
        document.getElementById('idp').value = data[0].id;
        document.getElementById('codigoE').value = data[0].codigo;
        document.getElementById('nombreE').value = data[0].nombre;
        document.getElementById('descripcionE').value = data[0].descripcion;
        document.getElementById('categoriaActual').value = data[0].nombreCategoria;
        document.getElementById('localActual').value = data[0].nombreLocal;
        document.getElementById('proveedorActual').value = data[0].tipoProveedor;
        document.getElementById('tipoProductoActual').value = data[0].nombreTipo;
        document.getElementById('cantidadE').value = data[0].cantidad;
    }
}


function post() {

    var url = "http://localhost/mbyte/bytebend/api/v1/products/crud";

    var codigo = document.getElementById('codigoN').value;
    var nombre = document.getElementById('nombreN').value;
    var descripcion = document.getElementById('descripcionN').value;
    var cantidad = document.getElementById('cantidadN').value;
    var estado = document.getElementById('estadoN').value;
    var localPertenece = document.getElementById('localesN').value;
    var categoria = document.getElementById('categoriaN').value;
    var proveedor = document.getElementById('proveedorN').value;
    var tipoProducto = document.getElementById('tipoProductoN').value;


    if (codigo == "" || nombre == "" || descripcion == "" || cantidad == "" || estado == "" || localPertenece == "" || categoria == "" || tipoProducto == "") {
        Swal.fire({
            icon: 'error',
            title: 'Error en la Operación',
            text: 'Debe llenar todos los campos que tengan un *',
            confirmButtonText: 'Entendido'
        });
    }
    else if (codigo != "" || nombre != "" || descripcion != "" || cantidad != "" || estado != "" || localPertenece != "" || categoria != "" || tipoProducto != "") {

        var formdata = new FormData();

        formdata.append("codigo", codigo);
        formdata.append("nombre", nombre);
        formdata.append("descripcion", descripcion);
        formdata.append("cantidad", cantidad);
        formdata.append("estado", estado);
        formdata.append("localPertenece", localPertenece);
        formdata.append("categoria", categoria);
        formdata.append("proveedor", proveedor);
        formdata.append("tipoProducto", tipoProducto);

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
                    getCategories();
                    getLocals();
                    getProductTypes();
                    getProviders();
                    getTotals();
                    document.getElementById('codigoN').value = '';
                    document.getElementById('nombreN').value = '';
                    document.getElementById('descripcionN').value = '';
                    document.getElementById('cantidadN').value = '';
                    document.getElementById('estadoN').value = 'Excelentes Condiciones';
                } else if (result.isDenied) {
                    $('#nuevo').modal('toggle');
                    get();
                    getCategories();
                    getLocals();
                    getProductTypes();
                    getProviders();
                    getTotals();
                    document.getElementById('codigoN').value = '';
                    document.getElementById('nombreN').value = '';
                    document.getElementById('descripcionN').value = '';
                    document.getElementById('cantidadN').value = '';
                    document.getElementById('estadoN').value = 'Excelentes Condiciones';
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


function postCategories() {

    var categoriaCrear = document.getElementById("categoriaNueva").value;
    var url = "http://localhost/mbyte/bytebend/api/v1/categories/crud";

    if (categoriaCrear == "") {
        Swal.fire({
            icon: 'error',
            title: 'Error en la Operación',
            text: 'Debe llenar todos los campos que tengan un *',
            confirmButtonText: 'Entendido',
        });
    }
    else {
        var formdata = new FormData();
        formdata.append("nombreCategoria", categoriaCrear);

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
                    $('#categoria').modal('toggle');
                    get();
                    getCategories();
                    getLocals();
                    getProductTypes();
                    getProviders();
                    getTotals();
                    document.getElementById('categoriaNueva').value = '';
                } else if (result.isDenied) {
                    $('#categoria').modal('toggle');
                    get();
                    getCategories();
                    getLocals();
                    getProductTypes();
                    getProviders();
                    getTotals();
                    document.getElementById('categoriaNueva').value = '';
                }
            });
        }
    }
}


function postProductTypes() {

    var tipoProductoNuevo = document.getElementById("tipoProductoNuevo").value;
    var url = "http://localhost/mbyte/bytebend/api/v1/product_type/crud";

    if (tipoProductoNuevo == "") {
        Swal.fire({
            icon: 'error',
            title: 'Error en la Operación',
            text: 'Debe llenar todos los campos que tengan un *',
            confirmButtonText: 'Entendido',
        });
    }
    else {
        var formdata = new FormData();
        formdata.append("nombreTipo", tipoProductoNuevo);

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
                    $('#tipoProducto').modal('toggle');
                    get();
                    getCategories();
                    getLocals();
                    getProductTypes();
                    getProviders();
                    getTotals();
                    document.getElementById('tipoProductoNuevo').value = '';
                } else if (result.isDenied) {
                    $('#tipoProducto').modal('toggle');
                    get();
                    getCategories();
                    getLocals();
                    getProductTypes();
                    getProviders();
                    getTotals();
                    document.getElementById('tipoProductoNuevo').value = '';
                }
            });
        }
    }
}


function put() {

    var idp = document.getElementById('idp').value;
    var codigo = document.getElementById('codigoE').value;
    var nombre = document.getElementById('nombreE').value;
    var descripcion = document.getElementById('descripcionE').value;
    var local = document.getElementById('localesE').value;
    var categoria = document.getElementById('categoriaE').value;
    var proveedor = document.getElementById('proveedorE').value;
    var tipoProducto = document.getElementById('tipoProductoE').value;
    var cantidad = document.getElementById('cantidadE').value;
    var estado = document.getElementById('estadoE').value;

    var url = "http://localhost/mbyte/bytebend/api/v1/products/crud?codigo=" + codigo + "&nombre=" + nombre +
        "&descripcion=" + descripcion + "&cantidad=" + cantidad + "&estado=" + estado + "&localPertenece=" + local + "&categoria=" + categoria +
        "&proveedor=" + proveedor + "&tipoProducto=" + tipoProducto + "&id=" + idp;


    if (estado == "") {
        Swal.fire({
            icon: 'error',
            title: 'Error en la Operación',
            text: 'Debe llenar todos los campos y opciones',
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
                    $('#editar').modal('toggle');
                    get();
                    getCategories();
                    getLocals();
                    getProductTypes();
                    getProviders();
                    getTotals();
                } else if (result.isDenied) {
                    $('#editar').modal('toggle');
                    get();
                    getCategories();
                    getLocals();
                    getProductTypes();
                    getProviders();
                    getTotals();
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

            var url = 'http://localhost/mbyte/bytebend/api/v1/products/crud?id=' + id;

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
                console.log(result);
                Swal.fire({
                    icon: 'success',
                    title: 'Correcto',
                    text: 'La operación se completó.',
                    confirmButtonText: 'Entendido',
                }).then((result) => {
                    if (result.isConfirmed) {
                        get();
                        getCategories();
                        getLocals();
                        getProductTypes();
                        getProviders();
                        getTotals();
                    } else if (result.isDenied) {
                        get();
                        getCategories();
                        getLocals();
                        getProductTypes();
                        getProviders();
                        getTotals();
                    }
                });
            }
        } else if (result.isDenied) {
            get();
            getCategories();
            getLocals();
            getProductTypes();
            getProviders();
            getTotals();
        }
    });
}


function deleteCategories(id) {

    var requestOptions = {
        method: 'DELETE',
        redirect: 'follow'
    };

    var url = 'http://localhost/mbyte/bytebend/api/v1/categories/crud?id=' + id;

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
                $('#verCategorias').modal('toggle');
                get();
                getCategories();
                getLocals();
                getProductTypes();
                getProviders();
                getTotals();
            } else if (result.isDenied) {
                $('#verCategorias').modal('toggle');
                get();
                getCategories();
                getLocals();
                getProductTypes();
                getProviders();
                getTotals();
            }
        });
    }
}


function deleteProductTypes(id) {

    var requestOptions = {
        method: 'DELETE',
        redirect: 'follow'
    };

    var url = 'http://localhost/mbyte/bytebend/api/v1/product_type/crud?id=' + id;

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
                $('#verTipoProductos').modal('toggle');
                get();
                getCategories();
                getLocals();
                getProductTypes();
                getProviders();
                getTotals();
            } else if (result.isDenied) {
                $('#verTipoProductos').modal('toggle');
                get();
                getCategories();
                getLocals();
                getProductTypes();
                getProviders();
                getTotals();
            }
        });
    }
}