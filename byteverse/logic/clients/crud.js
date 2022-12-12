function apiDelete() {

    Swal.fire({
        title: '¿Estás Seguro?',
        text: "No puedes revertir esta acción",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Continuar'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Operación Exitosa',
                icon: 'success',
                confirmButtonText: 'Entendido'
            });
        }
    });

}