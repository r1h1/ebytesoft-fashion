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
                                        <p class="fw-bold h1" id="total-products"></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col px-3 mt-5">

                        <div class="header text-end mb-5">

                            <button class="btn btn-success mt-2 mb-5" data-bs-toggle="modal" data-bs-target="#nuevo">
                                <i class="fa-solid fa-plus me-2 py-2"></i> Nuevo
                                Producto</button>

                            <button class="btn btn-success mt-2 mb-5" data-bs-toggle="modal" data-bs-target="#categoria">
                                <i class="fa-solid fa-plus me-2 py-2"></i> Nueva
                                Categoría</button>

                            <button class="btn btn-success mt-2 mb-5" data-bs-toggle="modal" data-bs-target="#tipoProducto">
                                <i class="fa-solid fa-plus me-2 py-2"></i> Nuevo Tipo de Productos</button>

                            <button class="btn btn-warning mt-2 mb-5" data-bs-toggle="modal" data-bs-target="#verCategorias" onclick="getCategoriesButton()">
                                <i class="fa-solid fa-eye me-2 py-2"></i> Ver Categorías</button>

                            <button class="btn btn-warning mt-2 mb-5" data-bs-toggle="modal" data-bs-target="#verTipoProductos" onclick="getProductTypesButton()">
                                <i class="fa-solid fa-eye me-2 py-2"></i> Ver Tipo de Productos</button>
                        </div>

                        <div class="table-responsive mt-5 mb-5">
                            <table id="example" class="table table-striped">
                                <thead class=" blue text-white">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Código Producto</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Descripcion</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Local Pertenece</th>
                                        <th scope="col">Categoria</th>
                                        <th scope="col">Proveedor</th>
                                        <th scope="col">Tipo de Producto</th>
                                        <th scope="col" class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="tabla-de-datos-body">

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
                                                    <input type="text" class="form-control gray inputClass" placeholder="Código Producto *" id="codigoN">
                                                </div>

                                                <div class="col-12">
                                                    <input type="text" class="form-control gray inputClass" placeholder="Nombre *" id="nombreN">
                                                </div>

                                                <div class="col-12">
                                                    <input type="text" class="form-control gray inputClass" placeholder="Descripcion *" maxlength="70" id="descripcionN">
                                                </div>

                                                <div class="col-6">
                                                    <label class="form-label text-muted">Categoria *</label>
                                                    <select class="form-select gray inputClass" id="categoriaN">

                                                    </select>
                                                </div>

                                                <div class="col-6">
                                                    <label class="form-label text-muted">Local Asignado *</label>
                                                    <select class="form-select gray inputClass" id="localesN">

                                                    </select>
                                                </div>

                                                <div class="col-6">
                                                    <label class="form-label text-muted">Proveedor *</label>
                                                    <select class="form-select gray inputClass" id="proveedorN">

                                                    </select>
                                                </div>

                                                <div class="col-6">
                                                    <label class="form-label text-muted">Tipo de Producto *</label>
                                                    <select class="form-select gray inputClass" id="tipoProductoN">

                                                    </select>
                                                </div>

                                                <div class="col-6">
                                                    <input type="number" class="form-control gray inputClass" placeholder="Cantidad *" min="1" max="99999" id="cantidadN">
                                                </div>

                                                <div class="col-6">
                                                    <select class="form-select gray inputClass" id="estadoN">
                                                        <option value="">Estado *</option>
                                                        <option value="Excelentes Condiciones">Excelentes Condiciones</option>
                                                        <option value="En Buen Estado">En Buen Estado</option>
                                                        <option value="Dañado">Dañado</option>
                                                    </select>
                                                </div>

                                                <div class="col-12 text-center mt-4">
                                                    <a class="btn btn-success px-3 py-2" onclick="post()"><i class="fa-solid fa-floppy-disk me-2"></i> Guardar
                                                        Datos</a>
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
                                                Agregar Categoria</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                            <form class="row g-3">


                                                <div class="col-12">
                                                    <input type="text" class="form-control gray inputClass" placeholder="Nombre de Categoría *" id="categoriaNueva">
                                                </div>

                                                <div class="col-12 text-center mt-4">
                                                    <a class="btn btn-success px-3 py-2" onclick="postCategories()"><i class="fa-solid fa-floppy-disk me-2"></i> Guardar
                                                        Datos</a>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal para crear nuevos tipo producto -->
                        <div class="moda-new">

                            <div class="modal fade" id="tipoProducto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header green">
                                            <h1 class="modal-title fs-5 text-white fw-bold " id="exampleModalLabel">
                                                Agregar Tipo de Producto</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                            <form class="row g-3">


                                                <div class="col-12">
                                                    <input type="text" class="form-control gray inputClass" placeholder="Nombre Tipo de Producto *" id="tipoProductoNuevo">
                                                </div>

                                                <div class="col-12 text-center mt-4">
                                                    <a class="btn btn-success px-3 py-2" onclick="postProductTypes()"><i class="fa-solid fa-floppy-disk me-2"></i> Guardar
                                                        Datos</a>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Modal para ver categorias registradas -->
                        <div class="moda-new">

                            <div class="modal fade" id="verCategorias" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-warning">
                                            <h1 class="modal-title fs-5 fw-bold " id="exampleModalLabel">
                                                Categorias Registradas</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                            <form class="row g-3">

                                                <div class="col-12" id="listar-categorias">


                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- fin modal -->



                        <!-- Modal para ver tipo de productos -->
                        <div class="moda-new">

                            <div class="modal fade" id="verTipoProductos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-warning">
                                            <h1 class="modal-title fs-5 fw-bold " id="exampleModalLabel">
                                                Tipo Productos Registrados</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                            <form class="row g-3">

                                                <div class="col-12" id="listar-tipo-productos">


                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- fin modal -->

                        <!-- Modal para editar productos -->
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
                                                    <input type="text" class="form-control gray inputClass" id="idp" hidden>
                                                </div>

                                                <div class="col-md-12">
                                                    <input type="text" class="form-control gray inputClass" placeholder="Código Producto *" id="codigoE">
                                                </div>

                                                <div class="col-12">
                                                    <input type="text" class="form-control gray inputClass" placeholder="Nombre *" id="nombreE">
                                                </div>

                                                <div class="col-12">
                                                    <input type="text" class="form-control gray inputClass" placeholder="Descripcion *" maxlength="70" id="descripcionE">
                                                </div>

                                                <div class="col-6">
                                                    <label class="form-label text-muted">Categoria Actual*</label>
                                                    <input type="text" class="form-control gray inputClass" id="categoriaActual" disabled>
                                                </div>

                                                <div class="col-6">
                                                    <label class="form-label text-muted">Nueva Categoria *</label>
                                                    <select class="form-select gray inputClass" id="categoriaE">

                                                    </select>
                                                </div>

                                                <div class="col-6">
                                                    <label class="form-label text-muted">Local Actual*</label>
                                                    <input type="text" class="form-control gray inputClass" id="localActual" disabled>
                                                </div>

                                                <div class="col-6">
                                                    <label class="form-label text-muted">Nuevo Local Asignado *</label>
                                                    <select class="form-select gray inputClass" id="localesE">

                                                    </select>
                                                </div>

                                                <div class="col-6">
                                                    <label class="form-label text-muted">Proveedor Actual*</label>
                                                    <input type="text" class="form-control gray inputClass" id="proveedorActual" disabled>
                                                </div>

                                                <div class="col-6">
                                                    <label class="form-label text-muted">Nuevo Proveedor *</label>
                                                    <select class="form-select gray inputClass" id="proveedorE">

                                                    </select>
                                                </div>

                                                <div class="col-6">
                                                    <label class="form-label text-muted">Tipo Producto Actual*</label>
                                                    <input type="text" class="form-control gray inputClass" id="tipoProductoActual" disabled>
                                                </div>

                                                <div class="col-6">
                                                    <label class="form-label text-muted">Nuevo Tipo de Producto *</label>
                                                    <select class="form-select gray inputClass" id="tipoProductoE">

                                                    </select>
                                                </div>

                                                <div class="col-6">
                                                    <input type="number" class="form-control gray inputClass" placeholder="Cantidad *" min="1" max="99999" id="cantidadE">
                                                </div>

                                                <div class="col-6">
                                                    <select class="form-select gray inputClass" id="estadoE">
                                                        <option value="">Estado *</option>
                                                        <option value="Excelentes Condiciones">Excelentes Condiciones</option>
                                                        <option value="En Buen Estado">En Buen Estado</option>
                                                        <option value="Dañado">Dañado</option>
                                                    </select>
                                                </div>

                                                <div class="col-12 text-center mt-4">
                                                    <a class="btn btn-success px-3 py-2" onclick="put()"><i class="fa-solid fa-pen me-2"></i> Guardar
                                                        Datos</a>
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

    <!-- Data Table Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="../../logic/products/crud.js"></script>
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