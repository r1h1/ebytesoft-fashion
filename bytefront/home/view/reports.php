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
                                    Sesión</a>
                            </li>
                        </ul>
                    </li>
                </ul>

            </div>
        </nav>
    </header>

    <!-- Principal menu of POS - Cards -->
    <main>

        <div class="col text-start mb-2 contenedor-96 px-5">
            <a href="dashboard" class="boton oranje text-white mb-5"><i class="fa-solid fa-arrow-left fs-6 me-2"></i> Volver al menú</a>
        </div>

        <div class="row contenedor-96 mx-auto px-3">

            <div class="col border border-1 shadow mt-3">

                <div class="mx-auto">

                    <div class="row mt-5 mb-5 px-3">

                        <div class="col-lg-12 mt-5 text-center">
                            <p class="h3"><i class="fa-solid fa-chart-pie h1 me-2"></i> <span class="fw-bold h2">Reportes</span></p>
                        </div>
                    </div>

                </div>


                <div class="row mt-5">
                    <div class="col-lg-4">
                        <label class="form-label">Fecha de Inicio *</label>
                        <input type="date" class="form-control gray inputClass">
                    </div>
                    <div class="col-lg-4">
                        <label class="form-label">Fecha Final *</label>
                        <input type="date" class="form-control gray inputClass">
                    </div>
                    <div class="col-lg-4">
                        <label class="form-label">Tipo de Reporte (Seleccione) *</label>
                        <div class="busquedas input-group">
                            <select class="form-select gray inputClass">
                                <option value="1">Ventas</option>
                                <option value="2">Depósitos</option>
                                <option value="3">Devoluciones</option>
                            </select>
                            <button class="btn btn-success">Generar Reporte</button>
                        </div>
                    </div>
                </div>

                <div class="contenedor-reportes table-responsive" id="reporte-generado">
                    <div class="encabezado-reporte">
                        <p class="text-center mt-5 fw-bold blue py-2 text-white">El reporte se basa en los filtros
                            elegidos</p>
                    </div>
                    <div class="contenedor-reporte mb-2">
                        <div class="card p-5">
                            <div class="card-body">
                                <p class="fw-bold text-center text-muted">-- No se encontraron datos --</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Modal pago efectivo -->
        <div class="moda-new">

            <div class="modal fade" id="pago-efectivo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header green">
                            <h1 class="modal-title fs-5 text-white fw-bold " id="exampleModalLabel">
                                Efectivo</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="row g-3">

                                <div class="col-12">
                                    <div class="card gray">
                                        <div class="card-body p-3">
                                            <p class="card-text text-muted fw-bold">Total a Pagar</p>
                                            <div class="icon p-1 text-center">
                                                <p class="fw-bold h1">Q <span id="total-a-pagar">100.00</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <!-- metodo de pago = 1 = efectivo -->
                                    <input type="text" value="1" id="metodo-pago-efectivo" hidden>
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Efectivo Recibido *</label>
                                    <input type="number" id="efectivo-recibido" class="form-control gray inputClass" step="any" placeholder="0.00" min="1" onchange="calcularCambioEfectivo()">
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Cambio</label>
                                    <input type="number" id="cambio" class="form-control gray inputClass" step="any" placeholder="0.00" disabled>
                                </div>

                                <div class="col-12 text-center mt-4">
                                    <button type="submit" class="btn btn-success px-3 py-2"><i class="fa-solid fa-print me-2"></i> Facturar</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Fin modal pago efectivo -->


        <!-- Modal pago tarjeta -->
        <div class="moda-new">

            <div class="modal fade" id="pago-tarjeta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header oranje">
                            <h1 class="modal-title fs-5 text-white fw-bold " id="exampleModalLabel">
                                Tarjeta</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="row g-3">

                                <div class="col-12">
                                    <div class="card gray">
                                        <div class="card-body p-3">
                                            <p class="card-text text-muted fw-bold">Total a Pagar</p>
                                            <div class="icon p-1 text-center">
                                                <p class="fw-bold h1">Q <span>100.00</span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-muted text-center mt-2">** Coloca esta cantidad en el POS **
                                    </p>
                                </div>

                                <div class="col-12">
                                    <!-- metodo de pago = 2 = tarjeta -->
                                    <input type="text" value="2" id="metodo-pago-tarjeta" hidden>
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Tipo de Tarjeta *</label>
                                    <select class="form-select gray inputClass" aria-label="Default select example">
                                        <option value="">Seleccione...</option>
                                        <option value="1">Crédito</option>
                                        <option value="2">Débito</option>
                                    </select>
                                </div>

                                <div class="col-12 text-center mt-4">
                                    <button type="submit" class="btn btn-primary px-3 py-2"><i class="fa-regular fa-credit-card me-2"></i></i> Software
                                        POS</button>
                                    <button type="submit" class="btn btn-success px-3 py-2"><i class="fa-solid fa-print me-2"></i> Facturar</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Fin modal pago tarjeta -->

        <!-- Modal para crear nuevos clientes -->
        <div class="moda-new">

            <div class="modal fade" id="nuevo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header blue">
                            <h1 class="modal-title fs-5 text-white fw-bold " id="exampleModalLabel">
                                Agregar</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="row g-3">

                                <div class="col-md-12">
                                    <input type="text" class="form-control gray inputClass" placeholder="Código" id="empleado-codigo" hidden>
                                </div>
                                <div class="col-md-12">
                                    <input type="number" class="form-control gray inputClass" id="inputPassword4" placeholder="NIT *" min="1">
                                </div>
                                <div class="col-12">
                                    <input type="text" class="form-control gray inputClass" placeholder="Nombre Completo *">
                                </div>
                                <div class="col-12">
                                    <input type="text" class="form-control gray inputClass" placeholder="Dirección *">
                                </div>
                                <div class="col-6">
                                    <input type="number" class="form-control gray inputClass" placeholder="Teléfono *">
                                </div>
                                <div class="col-6">
                                    <input type="email" class="form-control gray inputClass" placeholder="Correo Electrónico *">
                                </div>
                                <div class="col-12">
                                    <select class="form-select gray inputClass" id="tipo-membresia" onchange="membresiaCliente()">
                                        <option value="0">Tipo de Membresía</option>
                                        <option value="0">Ninguna</option>
                                        <option value="1">Fashion Oro</option>
                                        <option value="2">Fashion Platinum</option>
                                    </select>
                                </div>
                                <div class="col-12" id="div-membresia">
                                    <input type="email" class="form-control gray inputClass" placeholder="" id="membresia-codigo" readonly>
                                    <p class="text-muted text-center">Este es el código de su
                                        membresía, guárdelo.</p>
                                </div>
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-success px-3 py-2"><i class="fa-solid fa-floppy-disk me-2"></i> Guardar
                                        Datos</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer gray text-center">
                            <p class="text-muted mt-2 mb-2">Puedes agregar la información de un
                                cliente desde este módulo
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fin modal nuevo cliente -->

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>


    <script src="../../logic/sale/crud.js"></script>

    <!-- Data Table Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

    <script>
        // Documento de traducción para plugin DataTable
        $(document).ready(function() {
            $("#example").DataTable({
                bFilter: false,
                language: {
                    decimal: ".",
                    emptyTable: "-- No hay informaci\xf3n --",
                    info: "P\xe1gina _PAGE_ de _PAGES_",
                    infoEmpty: "Mostrando 0 de 0 Registros",
                    infoFiltered: "(Filtrado de _MAX_ total entradas)",
                    infoPostFix: "",
                    thousands: ",",
                    lengthMenu: "",
                    loadingRecords: "Cargando...",
                    processing: "Procesando...",
                    search: "",
                    zeroRecords: "-- Sin resultados encontrados --",
                    paginate: {
                        first: "Primero",
                        last: "Ultimo",
                        next: "Siguiente",
                        previous: "Anterior"
                    }
                }
            })
        });

        // Loading spinner
        const preloaderWrapper = document.querySelector('.preloader-wrapper');

        window.addEventListener('load', function() {
            preloaderWrapper.classList.add('fade-out-animation');
        });
    </script>

</body>

</html>