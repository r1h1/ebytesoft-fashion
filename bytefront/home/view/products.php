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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

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
                                <a class="dropdown-item dropdown-item bg-danger mt-2 text-white" href="../../start"><i class="fa-solid fa-right-from-bracket me-2"></i> Cerrar
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
                <a href="dashboard" class="boton oranje text-white mb-5"><i class="fa-solid fa-arrow-left fs-6 me-2"></i> Volver al menú</a>
            </div>

        </div>

        <div class="row">

            <div class="col border border-1 shadow mt-3">

                <div class="mx-auto">

                    <div class="row mt-5">

                        <div class="col-lg-6 mt-5 text-center">
                            <p class="h3"><i class="fa-solid fa-box h1 me-2"></i> <span class="fw-bold h2">Inventario</span></p>
                        </div>

                        <div class="col-lg-6 mt-2">
                            <div class="card">
                                <div class="card-body p-3">
                                    <p class="card-text text-muted fw-bold">Productos Registrados</p>
                                    <div class="icon p-1 text-center">
                                        <p class="fw-bold h1">1</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col px-3 mt-5">

                        <div class="header text-end mb-3">
                            <button class="btn btn-success mt-4" data-bs-toggle="modal" data-bs-target="#nuevo"><i class="fa-solid fa-plus me-2 py-2"></i> Nuevo
                                Producto</button>
                            <button class="btn btn-success mt-4" data-bs-toggle="modal" data-bs-target="#categoria"><i class="fa-solid fa-plus me-2 py-2"></i> Nueva
                                Categoría</button>
                        </div>

                        <div class="table-responsive mt-5 mb-5">
                            <table id="example" class="table table-striped">
                                <thead class=" blue text-white">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Local Pertenece</th>
                                        <th scope="col">Código Producto</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Descripcion</th>
                                        <th scope="col">Categoría</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Precio Unitario</th>
                                        <th scope="col">Stock en Inventario</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col" class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Otto</td>
                                        <td>Otto</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                        <td>@mdo</td>
                                        <td>@mdo</td>
                                        <td>@mdo</td>
                                        <td>@mdo</td>
                                        <td>Activo</td>
                                        <td class="text-center">
                                            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editar"><i class="fa-solid fa-pen"></i></button>
                                            <button class="btn btn-danger" onclick="apiDelete()"><i class="fa-solid fa-trash"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Modal para crear nuevos productos -->
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
                                                    <input type="text" class="form-control gray inputClass" placeholder="Código Producto *">
                                                </div>
                                                <div class="col-12">
                                                    <input type="text" class="form-control gray inputClass" placeholder="Nombre *">
                                                </div>
                                                <div class="col-12">
                                                    <input type="text" class="form-control gray inputClass" placeholder="Descripcion *" maxlength="70">
                                                </div>
                                                <div class="col-12">
                                                    <select class="form-select gray inputClass">
                                                        <option value="">Categoría *</option>
                                                        <option value="0">Ninguna</option>
                                                        <option value="1">Fashion Oro</option>
                                                        <option value="2">Fashion Platinum</option>
                                                    </select>
                                                </div>
                                                <div class="col-12">
                                                    <select class="form-select gray inputClass">
                                                        <option value="">Local Asignado *</option>
                                                        <option value="0">Ninguna</option>
                                                        <option value="1">San Miguel Petapa</option>
                                                        <option value="2">Villa Nueva</option>
                                                    </select>
                                                </div>
                                                <div class="col-6">
                                                    <input type="number" class="form-control gray inputClass" placeholder="Cantidad *" min="1">
                                                </div>
                                                <div class="col-6">
                                                    <input type="number" class="form-control gray inputClass" placeholder="Precio Unitario *" min="1">
                                                </div>
                                                <div class="col-12 text-center mt-4">
                                                    <button type="submit" class="btn btn-success px-3 py-2"><i class="fa-solid fa-floppy-disk me-2"></i> Guardar
                                                        Datos</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Modal para crear nuevas categorías -->
                        <div class="moda-new">

                            <div class="modal fade" id="categoria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header green">
                                            <h1 class="modal-title fs-5 text-white fw-bold " id="exampleModalLabel">
                                                Agregar</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                            <form class="row g-3">


                                                <div class="col-12">
                                                    <input type="text" class="form-control gray inputClass" placeholder="Nombre de Categoría *">
                                                </div>

                                                <div class="col-12">
                                                    <select class="form-select gray inputClass">
                                                        <option value="">Lista de Descuento *</option>
                                                        <option value="1">San Miguel Petapa</option>
                                                        <option value="2">Villa Nueva</option>
                                                    </select>
                                                </div>

                                                <div class="col-12 text-center mt-4">
                                                    <button type="submit" class="btn btn-success px-3 py-2"><i class="fa-solid fa-floppy-disk me-2"></i> Guardar
                                                        Datos</button>
                                                </div>
                                            </form>

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
                                        <div class="modal-header bg-warning">
                                            <h1 class="modal-title fs-5 fw-bold " id="exampleModalLabel">
                                                Editar</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                            <form class="row g-3">

                                                <div class="col-md-12">
                                                    <input type="text" class="form-control gray inputClass" placeholder="Código Producto *">
                                                </div>
                                                <div class="col-12">
                                                    <input type="text" class="form-control gray inputClass" placeholder="Nombre *">
                                                </div>
                                                <div class="col-12">
                                                    <input type="text" class="form-control gray inputClass" placeholder="Descripcion *" maxlength="70">
                                                </div>
                                                <div class="col-12">
                                                    <select class="form-select gray inputClass">
                                                        <option value="">Categoría *</option>
                                                        <option value="0">Ninguna</option>
                                                        <option value="1">Fashion Oro</option>
                                                        <option value="2">Fashion Platinum</option>
                                                    </select>
                                                </div>
                                                <div class="col-12">
                                                    <select class="form-select gray inputClass">
                                                        <option value="">Local Asignado *</option>
                                                        <option value="0">Ninguna</option>
                                                        <option value="1">San Miguel Petapa</option>
                                                        <option value="2">Villa Nueva</option>
                                                    </select>
                                                </div>
                                                <div class="col-6">
                                                    <input type="number" class="form-control gray inputClass" placeholder="Cantidad *" min="1">
                                                </div>
                                                <div class="col-6">
                                                    <input type="number" class="form-control gray inputClass" placeholder="Precio Unitario *" min="1">
                                                </div>
                                                <div class="col-12">
                                                    <select class="form-select gray inputClass">
                                                        <option value="">Estado *</option>
                                                        <option value="1">Activo</option>
                                                        <option value="2">Inactivo</option>
                                                    </select>
                                                </div>

                                                <div class="col-12 text-center mt-4">
                                                    <button type="submit" class="btn btn-success px-3 py-2"><i class="fa-solid fa-pen me-2"></i> Guardar
                                                        Datos</button>
                                                </div>
                                            </form>

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="../../logic/clients/crud.js"></script>

    <!-- Data Table Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "language": {
                    "decimal": "",
                    "emptyTable": "-- No hay información --",
                    "info": "Página _PAGE_ de _PAGES_",
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