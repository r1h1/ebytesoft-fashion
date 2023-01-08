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
                            <h3 class="fw-bold mt-3" id="nombre">Daniel Rivas</h3>
                            <p class="mt-3"><i class="fa-solid fa-phone fs-6 me-2"></i> <span id="telefono"></span></p>
                            <p><i class="fa-solid fa-envelope fs-6 me-2"></i> <span id="email"></span></p>
                            <p><i class="fa-solid fa-cash-register fs-6 me-2"></i> <span id="caja"></span></p>
                            <button class="btn btn-warning mt-3" data-bs-toggle="modal" data-bs-target="#editarDatosPerfil"><i class="fa-solid fa-pen me-2"></i> Editar mis
                                Datos</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="editarDatosPerfil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header blue">
                            <h1 class="modal-title fs-5 text-white fw-bold " id="exampleModalLabel">Editar Perfil</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="row g-3">
                                <div class="col-md-12">
                                    <input type="text" class="form-control gray inputClass" id="inputEmail4" placeholder="Nombre *">
                                </div>
                                <div class="col-md-12">
                                    <input type="number" class="form-control gray inputClass" id="inputPassword4" placeholder="Teléfono" min="1">
                                </div>
                                <div class="col-12">
                                    <input type="email" class="form-control gray inputClass" placeholder="Correo Electrónico *">
                                </div>
                                <div class="col-12">
                                    <input type="number" class="form-control gray inputClass" placeholder="Clave de Acceso *" min="1">
                                </div>
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-success px-2 py-2"><i class="fa-solid fa-floppy-disk me-2"></i> Guardar Datos</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer gray text-center">
                            <p class="text-muted mt-2 mb-2">Puedes modificar los datos que se mostrarán en tu perfil,
                                tu número de teléfono o correo electrónico.
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

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