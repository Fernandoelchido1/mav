<?php
session_start(); // Inicia la sesión al principio del archivo
// Incluir la lógica para crear, editar y eliminar publicaciones
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/blog.css">
    <link rel="shortcut icon" href="../imgs/favicon.png">
    <title>BLOG</title>
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

            <a class="text-decoration-none" href="menul.php"><button  id="inicio" class="boton">
                <ion-icon name="home-outline"></ion-icon>
                <span>Inicio</span>
            </button>
        </a>
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
                    <a href="c/index.php">
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

                <li id="bl">
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
                    <a href="Calendario-Bootstrap-php-mysql-master/index.php">
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
            <!-- 
            primera seccion <div class="modo-oscuro">
                <div class="info">
                    <ion-icon name="invert-mode-outline"></ion-icon>
                    <span>Dark Mode</span>
                </div>
                -->
            <div class="switch">
                <div class="base">
                    <div class="circulo">

                    </div>
                </div>
            </div>
        </div>


    </div>

    </div>


    <main>
   
        <div class="container"><br>
            <section class="row">
                <article class="col-md-12">
                    <h1 class="align-content-center text-center" style="font-size: rem; letter-spacing: 3px;">BLOGS</h1><br>
                    <p>Los blogs fiscales son espacios digitales que ofrecen análisis, consejos y noticias sobre leyes, normativas y prácticas relacionadas con la fiscalidad, destinados a informar y orientar a profesionales y público en general sobre aspectos tributarios y financieros relevantes.</p><br>

                       <!-- Contenido del blog cargado desde index.php -->
                       <?php include('index.php'); ?>
                </article><br>




    </main>

    
        


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="../js/script.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>