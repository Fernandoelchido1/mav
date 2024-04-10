<?php
session_start(); // Inicia la sesión al principio del archivo
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/menul.css">
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
                    <h2 class="align-content-center text-center" style="font-size: rem; letter-spacing: 3px;"></h2>
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner shadow rounded-4">
                            <div class="carousel-item active">
                                <img src="../imgs/p.jpg" class="d-block w-100 opacity-50"
                                    style="width: 55rem; height: 32.5rem; top:.5rem" alt="...">
                                <div class="carousel-caption d-none d-md-block text-black">
                                    <h1>CTS ONLINE PLATINUM</h1><br><br><br><br><br>
                                    <p class="lead">"Descubre contenido exclusivo, accede a funciones PLATINUM y
                                        disfruta de una membresía que te hará sentir parte de la familia CTS"</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="../imgs/dorado.jpg" class="d-block w-100"
                                    style="width: 25rem; height: 32.5rem; top:.5rem" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h1>CTS ONLINE GOLD</h1><br><br><br><br><br>
                                    <p class="lead">"Disfruta de recompensas adicionales y se parte de esta comunidad, contando con grandes funcionalidades que te serviran de gran ayuda."
                                    </p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="../imgs/azul.jpg" class="d-block w-100"
                                    style="width: 25rem; height: 32.5rem; top:.5rem" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h1>CTS ONLINE PREMIUM</h1><br><br><br><br><br><br>
                                    <p class="lead">"Con todas las ventajas de los planes anteriores y mucho más. Disfruta de beneficios exclusivos y un
                                       una experiencia nueva."</p>
                                </div>
                            </div>


                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Anterior</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Siguiente</span>
                        </button>
                    </div>
                    <br><br>

                    <section class="about section-padding">

                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4 col-md-12 col-12">
                                    <div class="about-img">
                                        <img src="../imgs/edi.jpg" class="img-fluid shadow rounded-4 car" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-12 col-12 ps-lg-5 mt-md-5">
                                    <div class="about-text text-black">
                                        <h2>BLOGS</h2>
                                        <p>Blogs es un apartado donde podras consultar los articulos más importantes dentro de esta área.
                                        </p>
                                        <a href="blog.php" class="btn btn-primary">Mas Información</a>

                                    </div>

                                </div>

                            </div>

                        </div>
                        

                    </section><br>

                    <section class="team section-padding">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-md-10 col-lg-6">
                                    <div class="card text-center bg-danger shadow rounded-3 car">
                                        <div class="card-body text-white">
                                            <img src="../imgs/ctsicon.ico" class="img-fluid rounded-circle" alt="">
                                            <h3 class="card-title py-2">CTS RRHH</h3>
                                            <p class="card-text">
                                                CTS RRHH es una página para recursos humanos, entra a este nuevo espacio con bastante utilidad.
                                            </p>
                                        </div>

                                    </div>

                                </div>

                                <div class="col-12 col-md-10 col-lg-6">
                                    <div class="card text-center bg-success shadow rounded-3 car">
                                        <div class="card-body text-black">
                                            <img src="../imgs/ctsicon.ico" class="img-fluid rounded-circle" alt="">
                                            <h3 class="card-title py-2">CTS SUMINISTROS</h3>
                                            <p class="card-text">
                                                CTS SUMINISTROS es una nueva página dirigida para los productos que se manejan.
                                            </p>
                                            
                                        </div>

                                    </div>

                                </div>


                            </div>

                        </div>

                    </section>
                    <br><br>

                    <section class="portafolio section-padding">

                        <div class="container">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="section-header text-center text-black pb-5">
                                        <h2>Nuestros servicios</h2>
                                        <p>Contamos con los mejores servicios que te ayudaran en tu dia a dia, dando beneficios unicos.</p>
                                    </div>
                                </div>
                            </div>
                
                            <div class="row">
                                <div class="col-12 col-md-12 col-lg-4">
                                    <div class="card text-light text-center bg-white pb-2 shadow rounded-4 car">
                                        <div class="card-body text-black">
                                            <div class="img-area mb-4">
                                                <lord-icon
                                                src="https://cdn.lordicon.com/caaolypd.json"
                                                trigger="hover"
                                                style="width:100px;height:100px">
                                            </lord-icon>
                                            </div>
                                            <h3>Calculadora</h3>
                                            <p class="lead">
                                            Las calculadoras fiscales son herramientas que facilitan el cálculo Fiscal con un variedad de calculadoras
                                            </p>
                                            <a href="calculadora2.php">
                                            <button class="btn bg-primary text-white">Más información</button>
                                            </a>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-12 col-md-12 col-lg-4">
                                    <div class="card text-light text-center bg-white pb-2 shadow rounded-4 car">
                                        <div class="card-body text-black">
                                            <div class="img-area mb-4">
                                                <lord-icon
                                                src="https://cdn.lordicon.com/depeqmsz.json"
                                                trigger="hover"
                                                style="width:100px;height:100px">
                                            </lord-icon>

                                            </div>
                                            <h3>Legislación</h3>
                                            <p class="lead">
                                                Legislación es un apartado donde cuenta con documentos Estatales, Federales y Historicas.
                                            </p>
                                            <button class="btn bg-primary text-white">Más Información</button>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-12 col-md-12 col-lg-4">
                                    <div class="card text-light text-center bg-white pb-2 shadow rounded-4 car">
                                        <div class="card-body text-black">
                                            <div class="img-area mb-4">
                                                <lord-icon
                                                src="https://cdn.lordicon.com/wmlleaaf.json"
                                                trigger="hover"
                                                style="width:100px;height:100px">
                                            </lord-icon>
                                            </div>
                                            <h3>Calendario Fiscal</h3>
                                            <p class="lead">
                                                En este apartado podras consultar las fechas más importantes en el tema fiscal, donde podras consultarlas.
                                            </p>
                                            <button class="btn bg-primary text-white">Más Información</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </section><br>
<!-- 
                    <section class="services section-padding">
                        <div class="container">
                            <div class="row">

                                <div class="col-6 col-md-8 col-lg-6" >
                                    <div class="card text-white text-center bg-secondary pb-2 shadow-sm rounded-4 car">
                                        <div class="card-body">
                                            <i class="bi bi-wifi"></i>
                                            <h3 class="card-title">DOLAR</h3>
                                            <img class="img-fluid" src="../imgs/dolar.png" alt="">
                                        </div>

                                    </div>

                                </div>

                                <div class="col-6 col-md-8 col-lg-6">
                                    <div class="card text-white text-center bg-secondary pb-2 shadow-sm rounded-4 car">
                                        <div class="card-body">
                                            <i class="bi bi-tv"></i>
                                            <h3 class="card-title">PESO MEXICANO</h3>
                                                <img class="img-fluid" src="../imgs/dolar.png" alt="">
                                        </div>

                                    </div>

                                </div>


                            </div>
                        </div>

                    </section><br>

-->

                   




    </main>


    <script src="https://cdn.lordicon.com/lordicon-1.2.0.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
    <script src="../js/script.js"></script>


    <script>
        document.getElementById('cerrarSesionIcon').addEventListener('click', function () {
            // Agrega aquí el código para cerrar la sesión, por ejemplo, redireccionar a la página de logout
            window.location.href = '../php/logout.php';
        });
    </script>

</body>

</html>