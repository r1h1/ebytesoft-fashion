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

            var hoy = new Date();
            var fecha = hoy.getFullYear();
            var dia = hoy.getDay() + 1;
            var hora = hoy.getHours() + '' + hoy.getMinutes() + '' + hoy.getSeconds();

            var texto = JSON.stringify(data);

            var dataEncrypt = texto.replace(/e/gi, "enter").replace(/i/gi, "imes").replace(/a/gi, "ai").replace(/o/gi, "ober").replace(/u/gi, "ufat");

            var token = 'TK'+'$'+fecha+'/'+hora+'u'+Math.floor(Math.random() * 1000000000000000000)+'ñ'+hora+'#='+fecha+'!'+'LOR'+data[0].rol+'%'+dia+'====';

            sessionStorage.setItem('token',token);
            localStorage.setItem('auth', dataEncrypt);
            
            window.location.href = 'home/view/dashboard';
        }
    }
}





