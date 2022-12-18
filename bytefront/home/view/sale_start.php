<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Punto de Venta, FashionGT, compra de todo y ahorra!">
    <meta name="keywords" content="HTML, CSS, JavaScript, PHP, MariaDB, Firebase, SQL, Bootstrap">
    <meta name="author" content="Daniel Rivas">

    <!-- Bootstrap 5.2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="../../../assets/css/clients.css">
    <!-- Data Table CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/be221c52b4.js" crossorigin="anonymous"></script>

    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">

    <!-- SweetAlert2 Library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- ICON -->
    <link rel="icon" href="../../../assets/img/logo.png">

</head>
<title>POS | MiniByte</title>

<body>

    <!-- loader page -->
    <div class="preloader-wrapper">
        <div class="spinner-border text-primary" style="width: 3rem;height: 3rem;">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>

    <header>

        <!-- Navbar with information of users and report problems -->
        <nav class="navbar navbar-expand-lg navbar-light gray fixed-top">

            <div class="container-fluid">

                <a class="nav-link text-muted" href="dashboard">
                    POS | ebyte-soft
                </a>

                <form class="d-flex ms-auto my-3 my-lg-0"></form>

                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle ms-2 text-muted" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-gear"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="profile"><i
                                        class="fa-solid fa-user green-text me-2"></i>
                                    Editar Perfil</a>
                            </li>
                            <li>
                                <a class="dropdown-item dropdown-item bg-danger mt-2 text-white"
                                    href="../../start"><i class="fa-solid fa-right-from-bracket me-2"></i> Cerrar
                                    Sesión</a>
                            </li>
                        </ul>
                    </li>
                </ul>

            </div>
        </nav>
    </header>

    <!-- Principal menu of POS - Cards -->
    <main class="container-fluid px-5">
        <div class="row">

            <div class="col text-start mb-4">
                <a href="dashboard" class="boton oranje text-white mb-5"><i
                        class="fa-solid fa-arrow-left fs-6 me-2"></i> Volver al menú</a>
            </div>

        </div>

        <div class="row">

            <div class="col border border-1 shadow mt-3">

                <div class="mx-auto">

                    <div class="row mt-5 px-3">

                        <div class="col-lg-6 mt-5 text-center">
                            <p class="h3"><i class="fa-solid fa-cash-register h1 me-2"></i> <span
                                    class="fw-bold h2">Apertura de Caja</span></p>
                            <div class="row mt-5 text-center justify-content-center">
                                <div class="col-sm-6 col-md-4 col-lg-4 mt-2 mb-4">
                                    <div class="body">
                                        <p class="fw-bold h4 bg-success py-2 text-white rounded rounded-2">Abierta</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 mt-2">
                            <div class="row g-2">

                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body p-3">
                                            <p class="card-text text-muted">Dinero en Caja</p>
                                            <div class="icon p-1 text-center">
                                                <p class="fw-bold h2">Q <span>100.00</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body p-3">
                                            <p class="card-text text-muted">Usuario que Inicia</p>
                                            <div class="icon p-1 text-center">
                                                <p class="fw-bold h3">Daniel Rivas</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body p-3">
                                            <p class="card-text text-muted">Fecha Actual</p>
                                            <div class="icon p-1 text-center">
                                                <p class="h4 fw-bold" id="fechaYHora"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col px-3 mt-4">

                        <div class="header text-end">
                            <button class="btn btn-success mt-2" data-bs-toggle="modal" data-bs-target="#nuevo"><i
                                    class="fa-solid fa-plus me-2 py-2"></i> Nueva Apertura de Caja</button>
                        </div>

                        <div class="table-responsive mt-2 mb-5">
                            <table id="example" class="table table-striped">
                                <thead class=" blue text-white">
                                    <tr>
                                        <th scope="col">Fecha y Hora Apertura</th>
                                        <th scope="col">Fecha y Hora Cierre</th>
                                        <th scope="col">Usuario</th>
                                        <th scope="col">Inicia</th>
                                        <th scope="col">Entrega</th>
                                        <th scope="col">Turno</th>
                                        <th scope="col">Ventas Totales</th>
                                        <th scope="col">Ventas Efectivo</th>
                                        <th scope="col">Ventas Tarjeta</th>
                                        <th scope="col" class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>PROV000001</td>
                                        <td>PROV000001</td>
                                        <td>Limpieza</td>
                                        <td>Crédito</td>
                                        <td>45024363</td>
                                        <td>Ciudad de Guatemala, Guatemala</td>
                                        <td>de.rivasherrera@gmail.com</td>
                                        <td>PROV000001</td>
                                        <td>Limpieza</td>
                                        <td class="text-center">
                                            <button class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#cerrar"><i class="fa-solid fa-lock"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Modal para iniciar caja -->
                        <div class="moda-new">

                            <div class="modal fade" id="nuevo" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header green">
                                            <h1 class="modal-title fs-5 text-white fw-bold " id="exampleModalLabel">
                                                Abrir</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                            <form class="row g-3">

                                                <div class="col-12">
                                                    <label class="form-label">Fecha y hora de apertura *</label>
                                                    <input type="datetime-local" class="form-control gray inputClass"
                                                        placeholder="Fecha y Hora Apertura *">
                                                </div>
                                                <div class="col-12">
                                                    <input type="text" class="form-control gray inputClass"
                                                        placeholder="Usuario" disabled>
                                                </div>
                                                <div class="col-12">
                                                    <input type="number" class="form-control gray inputClass"
                                                        placeholder="Dinero con el que inicia *" min="1">
                                                </div>
                                                <div class="col-12">
                                                    <input type="text" class="form-control gray inputClass"
                                                        placeholder="Turno *">
                                                </div>

                                                <div class="col-12 text-center">
                                                    <button type="submit" class="btn btn-success px-3 py-2"><i
                                                            class="fa-solid fa-floppy-disk me-2"></i> Guardar
                                                        Datos</button>
                                                </div>
                                            </form>

                                        </div>
                                        <div class="modal-footer gray text-center">
                                            <p class="text-muted mt-2 mb-2">Puedes agregar la información
                                                correspondiente desde este
                                                módulo
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- fin modal iniciar caja -->


                        <!-- Modal para cerrar caja -->
                        <div class="moda-new">

                            <div class="modal fade" id="cerrar" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger">
                                            <h1 class="modal-title fs-5 text-white fw-bold " id="exampleModalLabel">
                                                Cerrar</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                            <form class="row g-3">

                                                <div class="col-12">
                                                    <label class="form-label">Fecha y hora de cierre *</label>
                                                    <input type="datetime-local" class="form-control gray inputClass"
                                                        placeholder="Fecha y Hora *">
                                                </div>
                                                <div class="col-12">
                                                    <input type="number" class="form-control gray inputClass"
                                                        placeholder="Dinero que entrega *" min="1">
                                                </div>
                                                <div class="col-12">
                                                    <input type="number" class="form-control gray inputClass"
                                                        placeholder="Venta Efectivo *" disabled>
                                                </div>
                                                <div class="col-12">
                                                    <input type="number" class="form-control gray inputClass"
                                                        placeholder="Venta Tarjeta *" disabled>
                                                </div>
                                                <div class="col-12">
                                                    <input type="number" class="form-control gray inputClass"
                                                        placeholder="Ventas Totales *" disabled>
                                                </div>

                                                <div class="col-12 text-center">
                                                    <button type="submit" class="btn btn-success px-3 py-2"><i
                                                            class="fa-solid fa-floppy-disk me-2"></i> Guardar
                                                        Datos</button>
                                                </div>
                                            </form>

                                        </div>
                                        <div class="modal-footer gray text-center">
                                            <p class="text-muted mt-2 mb-2">Puedes agregar la información
                                                correspondiente desde este
                                                módulo
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- fin modal cierre caja -->

                    </div>
                </div>
            </div>

    </main>

    <!-- Footer or pie de página -->
    <footer class="footer py-3 bg-light text-center">
        <div class="container">
            <span class="text-muted">&copy; MiniByte Studios, 2022</span>
        </div>
    </footer>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <!-- Data Table Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                bFilter: false,
                "language": {
                    "decimal": "",
                    "emptyTable": "-- No hay información --",
                    "info": "Página _PAGE_ de _PAGES_",
                    "infoEmpty": "Mostrando 0 de 0 Registros",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "",
                    "zeroRecords": "-- Sin resultados encontrados --",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                }
            });
        });


        // Función para obtener fecha y hora desde una instancia de tipo fecha
        // esta se concatena y se hace un inner a una propiedad HTML
        // la funcion se inicia al iniciar la página y se repite cada segundo para la fecha

        function fechaYHora() {

            var hoy = new Date();
            var opciones = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            var fecha = hoy.toLocaleString('es-GT', opciones);
            var hora = hoy.getHours() + ':' + hoy.getMinutes() + ':' + hoy.getSeconds();

            // Se imprime en pantalla con el ID fechaYHora
            document.getElementById("fechaYHora").innerHTML = fecha + ', ' + hora;

        }

        // Se inicia la función y se repite cada segundo
        fechaYHora();
        setInterval(fechaYHora, 1000);


        // Loading spinner
        const preloaderWrapper = document.querySelector('.preloader-wrapper');

        window.addEventListener('load', function () {
            preloaderWrapper.classList.add('fade-out-animation');
        });
    </script>

</body>

</html>