// Función para obtener fecha y hora desde una instancia de tipo fecha
// esta se concatena y se hace un inner a una propiedad HTML
// la funcion se inicia al iniciar la página y se repite cada segundo para la fecha
function fechaYHora() {

    var hoy = new Date();
    var opciones = {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    };
    var fecha = hoy.toLocaleString('es-GT', opciones);
    var hora = hoy.getHours() + ':' + hoy.getMinutes() + ':' + hoy.getSeconds();

    // Se imprime en pantalla con el ID fechaYHora
    document.getElementById("fechaYHora").innerHTML = fecha + ', ' + hora;

}

// Se inicia la función y se repite cada segundo
fechaYHora();
setInterval(fechaYHora, 1000);


function getMenu() {

    var url = 'http://localhost/mbyte/bytebend/api/v1/dashboard/options?rol=' + 1;

    fetch(url)
        .then(response => response.json())
        .then(data => mostrarData(data))
        .catch(error => console.log(error));

    const mostrarData = (data) => {

        let body = '';

        for (var i = 0; i < data.length; i++) {
            var j = 0;
            body += `<div class="col">
                        ${data[i].rutaModulo}
                     </div>`;
        }

        document.getElementById('menu').innerHTML = body;
        
    }
}
getMenu();