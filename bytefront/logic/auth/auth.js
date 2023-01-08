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
            localStorage.removeItem('auth');
            console.log('GET OUTTA HERE, HACKER');
        }
        else {
            var texto = JSON.stringify(data);
            var dataEncrypt = texto.replace(/e/gi, "enter").replace(/i/gi, "imes").replace(/a/gi, "ai").replace(/o/gi, "ober").replace(/u/gi, "ufat");
            localStorage.setItem('auth', dataEncrypt);
            window.location.href = 'home/view/dashboard';
        }
    }
}





