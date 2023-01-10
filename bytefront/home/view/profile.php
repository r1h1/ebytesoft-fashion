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
    <link rel="stylesheet" href="../../../assets/css/dashboard.css">

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
    <main class="container">
        <div class="row">

            <div class="col text-start mb-4">
                <h2 class="fw-bold mb-3">Mi Perfil</h2>
                <a href="dashboard" class="boton oranje text-white mb-5"><i class="fa-solid fa-arrow-left fs-6 me-2"></i> Volver al menú</a>
            </div>

        </div>

        <div class="row px-3">

            <div class="col border border-1 shadow mt-3">

                <div class="p-4 mx-auto">
                    <div class="row">
                        <div class="col text-muted text-center">
                            <img src="../../../assets/img/logo.png" alt="logo" width="90">
                            <h3 class="fw-bold mt-3" id="nombre"></h3>
                            <p class="mt-3"><i class="fa-solid fa-phone fs-6 me-2"></i> <span id="telefono"></span></p>
                            <p><i class="fa-solid fa-envelope fs-6 me-2"></i> <span id="email"></span></p>
                            <p><i class="fa-solid fa-cash-register fs-6 me-2"></i> <span id="caja"></span></p>
                            <button class="btn btn-outline-danger mt-3" data-bs-toggle="modal" data-bs-target="#editarDatosPerfil">
                                <i class="fa-solid fa-key me-2"></i> Restablecer Contraseña</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="editarDatosPerfil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-warning">
                            <h1 class="modal-title fs-5 fw-bold " id="exampleModalLabel">Cambiar Contraseña</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="row g-3">
                                <div class="col-12">
                                    <input type="number" class="form-control gray inputClass" id="claveE" placeholder="Clave de Acceso *" min="1">
                                </div>
                                <div class="col-12 text-center">
                                    <a class="btn btn-success px-2 py-2" onclick="put()"><i class="fa-solid fa-floppy-disk me-2"></i> Guardar Datos</a>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer gray text-center">
                            <p class="text-muted mt-2 mb-2">Al cambiar la contraseña, tu sesión quedará inhabilitada
                                y deberás volver a ingresar, los datos no guardados podrían eliminarse y no recuperarse.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
    </main>

    <!-- Footer or pie de página -->
    <footer class="footer py-3 fixed-bottom bg-light text-center">
        <div class="container">
            <span class="text-muted">&copy; MiniByte Studios, 2022</span>
        </div>
    </footer>


    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="../../logic/profile/crud.js"></script>

    <script>
        // Loading spinner
        const preloaderWrapper = document.querySelector('.preloader-wrapper');

        window.addEventListener('load', function() {
            preloaderWrapper.classList.add('fade-out-animation');
        });
    </script>

</body>

</html>