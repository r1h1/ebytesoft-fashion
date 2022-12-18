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
                        <a class="nav-link dropdown-toggle text-center text-muted" href="#" role="button"
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
    <main class="container-fluid px-4">

        <div class="row">

            <div class="col-md-12 col-lg-3 rounded rounded-5 border border-1 perfil shadow mb-5">
                <p class="p-3 h5 text-muted mt-2">Bienvenido</p>
                <div class="perfil-bienvenida mt-5">
                    <div class="imagen text-center d-block">
                        <img src="../../../assets/img/logo.png" alt="logo" width="100">
                    </div>
                    <div class="text-center">
                        <h4 class="fw-bold mt-4">Daniel Rivas</h4>
                        <p class="mt-4"><i class="fa-solid fa-phone fs-6 me-2"></i> (+502) 4502-4363</p>
                        <p><i class="fa-solid fa-cash-register fs-6 me-2"></i> Caja #2</p>
                        <p class="h6 text-muted mt-4">Fashion, tu mejor opción</p>
                        <a href="../../start" class="btn btn-danger mt-4 mb-5"><i
                                class="fa-solid fa-right-from-bracket me-2"></i> Cerrar
                            Sesión</a>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-9 px-4">

                <div class="bienvenida mb-4 text-end">
                    <p id="fechaYHora" class="h5 text-muted"></p>
                </div>

                <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-2">

                    <div class="col">
                        <a href="treasury">
                            <div class="p-2 green zoom-out rounded rounded-3">
                                <div class="card-body">
                                    <div class="icon text-center p-4">
                                        <i class="fa-solid fa-money-bill h1 text-white"></i>
                                    </div>
                                    <p class="card-text text-white text-center">Depósitos</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="employees">
                            <div class="p-2 oranje zoom-out rounded rounded-3">
                                <div class="card-body">
                                    <div class="icon text-center p-4">
                                        <i class="fa-solid fa-users h1 text-white"></i>
                                    </div>
                                    <p class="card-text text-white text-center">Empleados</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="products">
                            <div class="p-2 gray-card zoom-out rounded rounded-3">
                                <div class="card-body">
                                    <div class="icon text-center p-4">
                                        <i class="fa-solid fa-list h1 text-white"></i>
                                    </div>
                                    <p class="card-text text-white text-center">Inventario</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="sale_start">
                            <div class="p-2 purple zoom-out rounded rounded-3">
                                <div class="card-body">
                                    <div class="icon text-center p-4">
                                        <i class="fa-solid fa-sack-dollar h1 text-white"></i>
                                    </div>
                                    <p class="card-text text-white text-center">Aperturar Caja</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="cash_registers">
                            <div class="p-2 blue zoom-out rounded rounded-3">
                                <div class="card-body">
                                    <div class="icon text-center p-4">
                                        <i class="fa-solid fa-cash-register h1 text-white"></i>
                                    </div>
                                    <p class="card-text text-white text-center">Cajas</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="sale">
                            <div class="p-2 green zoom-out rounded rounded-3">
                                <div class="card-body">
                                    <div class="icon text-center p-4">
                                        <i class="fa-solid fa-cart-arrow-down h1 text-white"></i>
                                    </div>
                                    <p class="card-text text-white text-center">Venta</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="return_clothes">
                            <div class="p-2 oranje zoom-out rounded rounded-3">
                                <div class="card-body">
                                    <div class="icon text-center p-4">
                                        <i class="fa-solid fa-shirt h1 text-white"></i>
                                    </div>
                                    <p class="card-text text-white text-center">Devolución</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="providers">
                            <div class="p-2 gray-card zoom-out rounded rounded-3">
                                <div class="card-body">
                                    <div class="icon text-center p-4">
                                        <i class="fa-solid fa-people-carry-box h1 text-white"></i>
                                    </div>
                                    <p class="card-text text-white text-center">Proveedores</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="clients">
                            <div class="p-2 purple zoom-out rounded rounded-3">
                                <div class="card-body">
                                    <div class="icon text-center p-4">
                                        <i class="fa-solid fa-user-tie h1 text-white"></i>
                                    </div>
                                    <p class="card-text text-white text-center">Clientes</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <div class="p-2 blue zoom-out rounded rounded-3">
                            <div class="card-body">
                                <div class="icon text-center p-4">
                                    <i class="fa-solid fa-tag h1 text-white"></i>
                                </div>
                                <p class="card-text text-white text-center">Descuentos</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <a href="locals">
                            <div class="p-2 green zoom-out rounded rounded-3">
                                <div class="card-body">
                                    <div class="icon text-center p-4">
                                        <i class="fa-solid fa-store h1 text-white"></i>
                                    </div>
                                    <p class="card-text text-white text-center">Locales</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="reports">
                            <div class="p-2 oranje zoom-out rounded rounded-3">
                                <div class="card-body">
                                    <div class="icon text-center p-4">
                                        <i class="fa-solid fa-chart-pie h1 text-white"></i>
                                    </div>
                                    <p class="card-text text-white text-center">Reportes</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="row row-cols-sm-1 row-cols-md-1 row-cols-lg-1 mt-2">
                    <div class="col">
                        <a href="maintenance">
                            <div class="p-2 gray-card zoom-out rounded rounded-3">
                                <div class="card-body">
                                    <div class="icon text-center p-4">
                                        <i class="fa-solid fa-gear h1 text-white"></i>
                                    </div>
                                    <p class="card-text text-white text-center">Mantenimiento</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

        </div>

    </main>

    <!-- Footer or pie de página -->
    <footer class="footer py-2 bg-light text-center">
        <div class="container">
            <span class="text-muted">&copy; MiniByte Studios, 2022</span>
        </div>
    </footer>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <script>

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