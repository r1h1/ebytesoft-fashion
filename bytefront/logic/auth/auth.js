function authDB() {

    var user = document.getElementById('usuario').value;
    var pass = document.getElementById('clave').value;

    var url = 'http://localhost/mbyte/bytebend/api/v1/dashboard/authentication?usuario=' + user + '&clave=' + pass;

    fetch(url)
        .then(response => response.json())
        .then(data => mostrarData(data))
        .catch(error => console.log(error));

    const mostrarData = (data) => {

        if (data.length == 0) {
            Swal.fire({
                icon: 'error',
                title: 'Error en la Operación',
                text: 'Usuario y/o Contraseña Incorrecto',
                confirmButtonText: 'Entendido',
            });
            console.log(data.length);
        }
        else {
            localStorage.setItem('auth',JSON.stringify(data));
            window.location.href = 'home/view/dashboard'
        }

    }
}