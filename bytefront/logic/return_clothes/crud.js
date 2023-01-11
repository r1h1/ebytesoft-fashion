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


function convertImgToBase64() {
    const fileInput = document.getElementById('imagenProductoRetorno');

    fileInput.addEventListener("change", e => {
        const file = fileInput.files[0];
        const reader = new FileReader();

        reader.addEventListener("load", () => {
            var rutaImagen = reader.result;
            var tamañoImagen = file.size;

            if (tamañoImagen > 100000) {
                document.getElementById('imagenProductoRetorno').value = '';
                Swal.fire({
                    icon: 'warning',
                    title: 'Advertencia',
                    text: 'La imagen supera el peso establecido, comprimala e intente de nuevo',
                    footer: '<a href="https://tinyjpg.com/" target="_blank">Presione acá para ser redirigido al compresor de imágenes</a>',
                    confirmButtonText: 'Entendido'
                });
            }
            else {
                console.log('imagen aceptada');
            }
        });
        reader.readAsDataURL(file);
    });
}
convertImgToBase64();


function get() {

    var texto = localStorage.getItem('auth');
    var txtEnc = texto.replace(/enter/gi, "e").replace(/imes/gi, "i").replace(/ai/gi, "a").replace(/ober/gi, "o").replace(/ufat/gi, "u");

    var log = JSON.parse(txtEnc);

    const nombreCompleto = log[0].nombreCompleto;
    const separador = nombreCompleto.split(' ');
    const primeraLetraNombre = separador[0].charAt(0).toUpperCase();
    const primeraLetraApellido = separador[1].charAt(0).toUpperCase();
    const nombre = separador[0].slice(1);
    const apellido = separador[1].slice(1);

    document.getElementById('idUsuarioRecibeN').value = log[0].id;
    document.getElementById('usuarioRecibeN').value = primeraLetraNombre + nombre + ' ' + primeraLetraApellido + apellido;


    var url = 'http://localhost/mbyte/bytebend/api/v1/return_clothes/crud';
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
            <td>${data[i].motivoCambio}</td>
            <td><img src="${data[i].fotografia}" alt="fotografiaProductoDevolucion" width="90"></td>
            <td>${data[i].usuarioRecibeName}</td>
            <td>${data[i].usuarioAutorizaName}</td>
            <td>${data[i].fechaYHora}</td>
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
    if (data) {
        document.getElementById('totalPrendasDevueltas').innerHTML = data.length;
    }
}
getTotals();


function getUsersAdmon() {

    var url = 'http://localhost/mbyte/bytebend/api/v1/employees/crud';
    fetch(url)
        .then(response => response.json())
        .then(data => mostrarData(data))
        .catch(error => console.log(error));

    const mostrarData = (data) => {
        if (data.length == 0) {
            Swal.fire({
                icon: 'warning',
                title: 'Advertencia',
                text: 'No existen usuarios creados, por favor, informe al administrador',
                confirmButtonText: 'Entendido'
            });
        }
        else {
            let body = '';

            for (var i = 0; i < data.length; i++) {

                if (data[i].descripcion == 'Super Administrador' || data[i].descripcion == 'Administrador') {
                    body += `<option value="${data[i].id}">${data[i].nombreCompleto}</option>`;
                }
                else{
                    body += `<option value="">-- No existen usuarios --</option>`;
                }
            }
            document.getElementById('selectUsuarioAutorizaN').innerHTML = body;
        }
    }
}
getUsersAdmon();