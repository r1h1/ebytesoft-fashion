<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Punto de Venta, FashionGT, compra de todo y ahorra!">
    <meta name="keywords" content="HTML, CSS, JavaScript, PHP, MariaDB, Firebase, SQL, Bootstrap">
    <meta name="author" content="Daniel Rivas">

    <!-- Bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

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
                        <a class="nav-link dropdown-toggle ms-2 text-muted" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-gear"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="profile"><i class="fa-solid fa-user green-text me-2"></i>
                                    Editar Perfil</a>
                            </li>
                            <li>
                                <a class="dropdown-item dropdown-item bg-danger mt-2 text-white" onclick="closeSession()"><i class="fa-solid fa-right-from-bracket me-2"></i> Cerrar
                                    Sesi??n</a>
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
                <a href="dashboard" class="boton oranje text-white mb-5"><i class="fa-solid fa-arrow-left fs-6 me-2"></i> Volver al men??</a>
            </div>

        </div>

        <div class="row">

            <div class="col border border-1 shadow mt-3">

                <div class="mx-auto">

                    <div class="row mt-5">

                        <div class="col-lg-6 mt-5 text-center">
                            <p class="h3"><i class="fa-solid fa-store h1 me-2"></i> <span class="fw-bold h2">Locales</span></p>
                        </div>

                        <div class="col-lg-6 mt-2">
                            <div class="card">
                                <div class="card-body p-3">
                                    <p class="card-text text-muted fw-bold">Locales Registrados</p>
                                    <div class="icon p-1 text-center">
                                        <p class="fw-bold h1" id="total-locals"></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col px-3 mt-5">

                        <div class="header text-end mb-3">
                            <button class="btn btn-success mt-4" data-bs-toggle="modal" data-bs-target="#nuevo" onclick="codigo()">
                                <i class="fa-solid fa-plus me-2 py-2"></i> Nuevo Local</button>
                        </div>

                        <div class="table-responsive mt-5 mb-5">
                            <table id="example" class="table table-striped">
                                <thead class=" blue text-white">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">C??digo</th>
                                        <th scope="col">Nombre del Local</th>
                                        <th scope="col">Empresa Pertenece</th>
                                        <th scope="col">Tel??fono</th>
                                        <th scope="col">Direcci??n</th>
                                        <th scope="col">Email</th>
                                        <th scope="col" class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="tabla-de-datos-body">

                                </tbody>
                            </table>
                        </div>

                        <!-- Modal para crear nuevos clientes -->
                        <div class="moda-new">

                            <div class="modal fade" id="nuevo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header green">
                                            <h1 class="modal-title fs-5 text-white fw-bold " id="exampleModalLabel">
                                                Agregar</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                            <form class="row g-3">

                                                <div class="col-md-12">
                                                    <input type="text" class="form-control gray inputClass" placeholder="C??digo" id="codigo_n" hidden>
                                                </div>
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control gray inputClass" placeholder="Nombre del Local *" min="1" id="nombre_n">
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label">Empresa Pertenece *</label>
                                                    <select class="form-select inputClass" id="empresaPertenece">

                                                    </select>
                                                </div>
                                                <div class="col-12">
                                                    <input type="number" class="form-control gray inputClass" placeholder="Tel??fono *" min="1" id="telefono_n">
                                                </div>
                                                <div class="col-12">
                                                    <input type="text" class="form-control gray inputClass" placeholder="Direcci??n *" id="direccion_n">
                                                </div>
                                                <div class="col-12">
                                                    <input type="email" class="form-control gray inputClass" placeholder="Correo Electr??nico *" id="correo_n">
                                                </div>
                                                <div class="col-12 text-center">
                                                    <a class="btn btn-success px-3 py-2" onclick="post()"><i class="fa-solid fa-floppy-disk me-2"></i> Guardar
                                                        Datos</a>
                                                </div>
                                            </form>

                                        </div>
                                        <div class="modal-footer gray text-center">
                                            <p class="text-muted mt-2 mb-2">Puedes agregar la informaci??n
                                                correspondiente desde este
                                                m??dulo
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Modal para editar clientes -->
                        <div class="moda-edit">

                            <div class="modal fade" id="editar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header oranje">
                                            <h1 class="modal-title fs-5 text-white fw-bold " id="exampleModalLabel">
                                                Editar</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                            <form class="row g-3">

                                                <div class="col-md-12">
                                                    <input type="text" class="form-control gray inputClass" min="1" id="idl" hidden>
                                                </div>
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control gray inputClass" placeholder="Nombre del Local *" min="1" id="nombre_e">
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label">Empresa Actual *</label>
                                                    <input type="text" class="form-control gray inputClass" min="1" id="empresaActual" disabled>
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label">Cambiar de Empresa *</label>
                                                    <select class="form-select inputClass" id="empresaEdicion">

                                                    </select>
                                                </div>
                                                <div class="col-12">
                                                    <input type="number" class="form-control gray inputClass" placeholder="Tel??fono *" min="1" id="telefono_e">
                                                </div>
                                                <div class="col-12">
                                                    <input type="text" class="form-control gray inputClass" placeholder="Direcci??n *" id="direccion_e">
                                                </div>
                                                <div class="col-12">
                                                    <input type="email" class="form-control gray inputClass" placeholder="Correo Electr??nico *" id="correo_e">
                                                </div>
                                                <div class="col-12 text-center">
                                                    <a class="btn btn-warning px-3 py-2" onclick="put()"><i class="fa-solid fa-floppy-disk me-2"></i> Guardar
                                                        Datos</a>
                                                </div>
                                            </form>

                                        </div>
                                        <div class="modal-footer gray text-center">
                                            <p class="text-muted mt-2 mb-2">Puedes editar toda la informaci??n que
                                                necesites
                                                desde este m??dulo
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

    </main>

    <!-- Footer or pie de p??gina -->
    <footer class="footer py-3 bg-light text-center">
        <div class="container">
            <span class="text-muted">&copy; MiniByte Studios, 2022</span>
        </div>
    </footer>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <!-- Data Table Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="../../logic/locals/crud.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "language": {
                    "decimal": "",
                    "emptyTable": "-- No hay informaci??n --",
                    "info": "P??gina _PAGE_ de _PAGES_",
                    "infoEmpty": "Mostrando 0 de 0 Registros",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Ver _MENU_ Registros",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
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

        window.addEventListener('load', function() {
            preloaderWrapper.classList.add('fade-out-animation');
        });
    </script>

</body>

</html>