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
    <link rel="stylesheet" href="../assets/css/login.css">

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/be221c52b4.js" crossorigin="anonymous"></script>

    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">

    <!-- SweetAlert2 Library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- ICON -->
    <link rel="icon" href="../assets/img/logo.png">

    <title>Inicio | MiniByte</title>
</head>

<body>

    <header>
        <!-- Empty -->
    </header>

    <!-- Start main site content -->
    <div class="container-sm">

        <main class="login-card">

            <div class="principal-container">

                <div class="card rounded rounded-4">

                    <div class="card-body p-4">

                        <div class="principal-img text-center mb-4">
                            <img src="../assets/img/logo.png" alt="logo-minibyte" width="100">
                        </div>

                        <div>
                            <h5 class="fw-bold mt-3 text-center">¬°Bienvenido de nuevo!</h5>
                        </div>

                        <div class="login-container mb-4 mt-4">

                            <form>

                                <input type="text" class="form-control mb-2 gray inputClass" placeholder="Usuario *"
                                    id="usuario" required maxlength="10"/>
                                <input type="number" pattern="[0-9]*" inputmode="numeric" min="1111" max="9999999999"
                                    style="-webkit-text-security: disc;" class="form-control gray inputClass"
                                    placeholder="C√≥digo de acceso *" id="clave" required />

                                <div class="action-buttons text-center mt-4">
                                    <a class="btn blue text-white w-100 boton-ingresar" onclick="authDB()">Ingresar</a>
                                </div>
                            </form>

                        </div>

                        <div class="text-center mb-2">
                            <span class="text-muted p">&copy; MiniByte Studios, 2022</span>
                        </div>

                    </div>
                </div>

            </div>
        </main>
        <!-- End main site content -->
    </div>
    <!-- End principal container -->

    <!-- Start Top Footer -->
    <footer>
        <!-- Empty -->
    </footer>
    <!-- End Top Footer -->

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="logic/auth/auth.js"></script>
</body>

</html>