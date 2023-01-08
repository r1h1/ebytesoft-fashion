<!DOCTYPE html>
<html lang="es">

<>
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
                    Dashboard | ebyte-soft
                </a>

                <form class="d-flex ms-auto my-3 my-lg-0"></form>

                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-center text-muted" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-gear"></i>
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
    <main class="container-fluid px-4">

        <div class="row">

            <div class="col-md-12 col-lg-3 rounded rounded-5 border border-1 stretch-card perfil shadow">
                <p class="h5 p-4 fw-bold text-muted">Bienvenido</p>
                <div class="mt-5 mb-4">
                    <div class="imagen text-center d-block">
                        <img src="../../../assets/img/logo.png" alt="logo" width="100">
                    </div>
                    <div class="text-center">
                        <h4 class="fw-bold mt-4" id="nombre"></h4>
                        <p class="mt-4"><i class="fa-solid fa-phone fs-6 me-2"></i> <span id="numeroTelefono"></span></p>
                        <p><i class="fa-solid fa-cash-register fs-6 me-2"></i> <span id="caja"></span></p>
                        <p class="h6 text-muted mt-4">Fashion, tu mejor opción</p>
                        <a class="btn btn-danger mt-4 mb-5" onclick="closeSession()"><i class="fa-solid fa-right-from-bracket me-2"></i> Cerrar
                            Sesión</a>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-9 px-4">

                <div class="bienvenida mb-4 text-end mt-3">
                    <p id="fechaYHora" class="h5 text-muted"></p>
                    <span class="text-muted">&copy; MiniByte Studios</span>
                </div>

                <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-2" id="menu">

                </div>
            </div>

        </div>

    </main>

    <!-- Footer or pie de página -->
    <footer class="mt-5">

    </footer>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    
    <script src="../../logic/dashboard/logic.js"></script>
    <script>
        // Loading spinner
        const preloaderWrapper = document.querySelector('.preloader-wrapper');

        window.addEventListener('load', function() {
            preloaderWrapper.classList.add('fade-out-animation');
        });
    </script>
</body>

</html>