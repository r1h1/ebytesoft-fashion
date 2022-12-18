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

                    <div class="row mt-5">

                        <div class="col-lg-12 mt-5 text-center">
                            <p class="h3 px-3"><i class="fa-solid fa-gear h1 me-2"></i> <span
                                    class="fw-bold h2">Mantenimiento</span></p>
                            <p class="text-center mt-5 fw-bold bg-danger py-3 text-white">Cuidado, cualquier acción en
                                este módulo puede ser perjudicial e
                                irrevertible, proceda con precaución</p>
                        </div>

                    </div>

                    <div class="col px-3 mt-5 mb-5">
                        <div class="col-lg-12 mt-2">
                            <div class="row g-2">

                                <div class="col-lg-4">
                                    <div class="card gray">
                                        <div class="card-body p-3 py-5">
                                            <p class="card-text text-muted text-center h5">Registros por Día</p>
                                            <div class="icon p-1 text-center mt-4">
                                                <button class="btn btn-danger mt-2"><i
                                                        class="fa-solid fa-trash ms-2"></i> Eliminar</button>
                                                <button class="btn btn-success mt-2"><i
                                                        class="fa-solid fa-file-excel ms-2"></i>Exportar</button>
                                            </div>
                                        </div>
                                        <div class="card-footer gray">
                                            <p class="text-center mt-4 text-muted fw-bold">* Permite eliminar TODOS los
                                                registros guardados en el día *</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="card gray">
                                        <div class="card-body p-3 py-5">
                                            <p class="card-text text-muted text-center h5">Registros por Mes</p>
                                            <div class="icon p-1 text-center mt-4">
                                                <button class="btn btn-danger mt-2"><i
                                                        class="fa-solid fa-trash ms-2"></i> Eliminar</button>
                                                <button class="btn btn-success mt-2"><i
                                                        class="fa-solid fa-file-excel ms-2"></i>Exportar</button>
                                            </div>
                                        </div>
                                        <div class="card-footer gray">
                                            <p class="text-center mt-4 text-muted fw-bold">* Permite eliminar TODOS los
                                                registros guardados en el mes *</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="card gray">
                                        <div class="card-body p-3 py-5">
                                            <p class="card-text text-muted text-center h5">Registros por Año</p>
                                            <div class="icon p-1 text-center mt-4">
                                                <button class="btn btn-danger mt-2"><i
                                                        class="fa-solid fa-trash ms-2"></i> Eliminar</button>
                                                <button class="btn btn-success mt-2"><i
                                                        class="fa-solid fa-file-excel ms-2"></i>Exportar</button>
                                            </div>
                                        </div>
                                        <div class="card-footer gray">
                                            <p class="text-center mt-4 text-muted fw-bold">* Permite eliminar TODOS los
                                                registros guardados en el año *</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
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

        // Loading spinner
        const preloaderWrapper = document.querySelector('.preloader-wrapper');

        window.addEventListener('load', function () {
            preloaderWrapper.classList.add('fade-out-animation');
        });
    </script>

</body>

</html>