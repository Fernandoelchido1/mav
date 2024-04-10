<?php
session_start(); // Inicia la sesión al principio del archivo

// Verifica si el usuario está autenticado
if (!isset($_SESSION['correo'])) {
    header("Location: ../login2.html");
    exit();
}

// Procesar el cambio de plan si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nuevoPlan'])) {
        $nuevoPlan = $_POST['nuevoPlan'];

        // Actualizar el plan del usuario en la base de datos
        include("../php/conexion.php");
        $conexion = conectar();

        if (!$conexion) {
            die("Error en la conexión a la base de datos: " . mysqli_connect_error());
        }

        $correoUsuario = $_SESSION['correo'];

        $consultaUpdate = "UPDATE registro SET rol = '$nuevoPlan' WHERE correo = '$correoUsuario'";
        $resultadoUpdate = mysqli_query($conexion, $consultaUpdate);

        if ($resultadoUpdate) {
            // Redirigir al usuario a la página del nuevo plan
            header("Location:../$nuevoPlan/menul.php");
            exit();
        } else {
            echo "Error al ejecutar la consulta de actualización: " . mysqli_error($conexion);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/panel.css">
    <link rel="stylesheet" href="../ctsonline/css/ctsonline2.css">
    <link rel="shortcut icon" href="../imgs/favicon.png">
    <title>MENU</title>
</head>

<body>

<div class="menu">
        <ion-icon name="menu-outline"></ion-icon>
        <ion-icon name="close-outline"></ion-icon>
    </div>
    <!-- primera seccion -->
    <div class="barra-lateral">
        <div>
            <div class="nombre-pagina">
                <img id="inicio" src="../imgs/ctss.png" alt="">
                <span>ONLINE</span>
            </div>

            <button id="inicio" class="boton"><a href="menul.php"></a>
                <ion-icon name="home-outline"></ion-icon>
                <span>Inicio</span>
            </button>
        </div>

        <!-- segunda seccion -->

        <nav class="navegacion">
            <ul>
                <li>
                    <a href="calculadora2.php">
                        <ion-icon name="calculator-outline"></ion-icon>
                        <span>Calculadora</span>
                    </a>
                </li>

                <li>
                    <a href="legislaci.php">
                        <ion-icon name="briefcase-outline"></ion-icon>
                        <span>Legislacion</span>
                    </a>
                </li>

                <li>
                    <a href="../premium/c/index.php">
                        <ion-icon name="calendar-number-outline"></ion-icon>
                        <span>Calendario Fiscal</span>
                    </a>
                </li>

                <li>
                    <a href="teindicadores.php">
                        <ion-icon name="stats-chart-outline"></ion-icon>
                        <span>Tablas e Indicadores</span>
                    </a>
                </li>

                <li>
                    <a href="blog.php">
                        <ion-icon name="book-outline"></ion-icon>
                        <span>Blogs</span>
                    </a>
                </li>

                <li>
                    <a href="enlac.php">
                        <ion-icon name="file-tray-stacked-outline"></ion-icon>
                        <span>Enlaces</span>
                    </a>
                </li>

                <li>
                    <a href="dof.php">
                        <ion-icon name="document-outline"></ion-icon>
                        <span>DOF</span>
                    </a>
                </li>
                <li>
                    <a href="../premium/Calendario-Bootstrap-php-mysql-master/index.php">
                        <ion-icon name="calendar-outline"></ion-icon>
                        <span>Cursos y Eventos</span>
                    </a>
                </li>
            </ul>
        </nav>
        <hr>

        <div class="usuario">
            <a href="panel.php">
                <img src="../imgs/avatar.png" alt="">
            </a>
            <div class="info-usuario">
                <div class="nombre-email">
                    <span class="nombre"><?php echo $_SESSION['nombres']; ?></span>
                    <span class="email"><?php echo $_SESSION['correo']; ?></span>
                </div>
            </div>
            <a href="../php/logout.php" id="cerrarSesionIcon" class="btn btn-light">
                <ion-icon style="width:40px;height:30px" name="log-out"></ion-icon>
            </a>
        </div>

        <div>
            <div class="linea d-none"></div>

            <div class="switch">
                <div class="base">
                    <div class="circulo"></div>
                </div>
            </div>
        </div>
    </div>
    <main> 
    <!-- Contenido principal -->
    <main class="container">
        <div class="row">
            <div class="cont">
                    <div>
                        <!-- Contenido actual -->
                        <img style="width:150px;height:150px" src="../imgs/avatar.png" alt="">
                    </div><br>
                    <div class="dos"><br>
                    <!-- Contenido actual -->
                    <h1>¡Bienvenido a CTS ONLINE!</h1>
                    <div class="nombre-email">
                    <h1 class="nombre"><?php echo $_SESSION['nombres']; ?></h1>
                    </div>
                    </div>
            </div>
        </div>
    <br>
        
        <div class="pla">
        <a id="aa"  style="--clr:#FF9F0D"><span>Cambia de plan</span><i></i></a>
        </div>
        <br><br><br>

        <div class="product-info">
            <div class="product" onclick="seleccionarRol('BLUE');">
            <img src="../imgs/naranja.jpg" alt="">
                <h3>BÁSICO</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea magnam blanditiiste</p>
            </div>

            <div class="product" onclick="seleccionarRol('GOLD');">
            <img class="img3" src="../imgs/dorado.jpg" alt="">
                <h3>GOLD</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Expedita dolorum iste</p>
            </div>

            <div class="product" onclick="seleccionarRol('PREMIUM');">
            <img src="../imgs/azul.jpg" alt="">
                <h3>PREMIUM</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Expedita dolorum iste</p>
            </div>
        </div>
    </main>
    </main>

    <!-- Scripts -->
    <script src="https://cdn.lordicon.com/lordicon-1.2.0.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="../js/script.js"></script>

    <script>
        function seleccionarRol(rol) {
            // Realiza una solicitud al servidor para cambiar el plan
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '<?php echo $_SERVER['PHP_SELF']; ?>', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Redirigir a la página del nuevo plan
                    window.location.href = '../' + rol + '/menul.php';
                }
            };
            xhr.send('nuevoPlan=' + rol);
        }

        document.getElementById('cerrarSesionIcon').addEventListener('click', function () {
            // Agrega aquí el código para cerrar la sesión, por ejemplo, redireccionar a la página de logout
            window.location.href = '../php/logout.php';
        });
    </script>

</body>

</html>
