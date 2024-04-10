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
    <link rel="stylesheet" href="../CSS/c2.css">
    <link rel="shortcut icon" href="../imgs/favicon.png">
    <title>CALCULADORA</title>
</head>


<style>
        main {
            filter: blur(5px); /* Aplica un desenfoque de 5px al contenido dentro de la etiqueta <main> */
        }

        /* Estilos del modal */
        .modal-container {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.7);
            text-align: center;
            max-width: 500px;
            width: 90%;
        }

        .modal-container img {
            width: 100px;
            margin-top: -50px;
            border-radius: 50%;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .modal-container h2 {
            font-size: 24px;
            font-weight: bold;
            margin: 20px 0 10px;
        }

        .modal-container p {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .modal-container button {
            width: 100%;
            padding: 10px 0;
            background-color: #f37405;
            color: #fff;
            border: 0;
            outline: none;
            font-size: 18px;
            border-radius: 4px;
            box-shadow: 0 5px 5px rgba(0, 0, 0, 0.2);
            cursor: pointer;
        }
    </style>


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
                <li id="calc">
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
                    <a href="../gold/c/index.php">
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
                    <a href="../gold/Calendario-Bootstrap-php-mysql-master/index.php">
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
                    <h1 class="align-content-center text-center" style="font-size: rem; letter-spacing: 3px;">CALCULADORAS</h1><br>
                    <p>Las calculadoras fiscales son herramientas que facilitan el cálculo de diversos aspectos relacionados con los impuestos y las obligaciones fiscales de una persona, empresa u entidad. Estas calculadoras están diseñadas para ayudar a determinar diferentes aspectos, como la cantidad de impuestos a pagar, las deducciones fiscales disponibles, las retenciones, y otros cálculos relacionados con asuntos tributarios.</p><br>
                </article><br>

                    <section class="about section-padding">

                        <div class="container">
                            <div class="row">
                                <div>
                                    <h2>FISCAL</h2>
                                    <hr>
                                </div><br><br><br><br>
                                <div>
                                    <h3>General</h3>
                                    <hr>
                                </div>
                                <div class="col-lg-2 col-md-4 col-12">
                                        <lord-icon
                                        src="https://cdn.lordicon.com/caaolypd.json"
                                        trigger="hover"
                                        style="width:200px;height:170px">
                                    </lord-icon>
                                    
                                </div>
                                <div class="col-lg-4 col-md-12 col-12 ps-lg-3 mt-md-2">
                                    <div class="about-text text-black">
                                        <h4>Actualización de cantidades</h4>
                                        <a href="../calculadoras/cantidades.php" class="btn btn-primary">Calcular</a>

                                    </div>

                                </div>


                                <div class="col-lg-2 col-md-4 col-12">
                                    <lord-icon
                                    src="https://cdn.lordicon.com/caaolypd.json"
                                    trigger="hover"
                                    style="width:200px;height:170px">
                                </lord-icon>
                                </div>
                                <div class="col-lg-4 col-md-12 col-12 ps-lg-3 mt-md-2">
                                    <div class="about-text text-black">
                                        <h4>Actualización y recargos</h4>
                                        <a href="../calculadoras/recargos.php" class="btn btn-primary">Calcular</a>

                                    </div>

                                </div>

                            </div><br><br>

                                <div class="row">
                                    <div class="col-lg-2 col-md-4 col-12">
                                        <lord-icon
                                    src="https://cdn.lordicon.com/caaolypd.json"
                                    trigger="hover"
                                    style="width:200px;height:170px">
                                </lord-icon>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-12 ps-lg-3 mt-md-2">
                                        <div class="about-text text-black">
                                            <h4>Amortización de pérdidas fiscales</h4>
                                            <a href="../calculadoras/amorti.php" class="btn btn-primary">Calcular</a>
    
                                        </div>
    
                                    </div>
    
    
                                    <div class="col-lg-2 col-md-4 col-12">
                                        <lord-icon
                                        src="https://cdn.lordicon.com/caaolypd.json"
                                        trigger="hover"
                                        style="width:200px;height:170px">
                                    </lord-icon>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-12 ps-lg-3 mt-md-2">
                                        <div class="about-text text-black">
                                            <h4>Convertidor de monedas extranjeras</h4>
                                            <a href="../calculadoras/convertidor.php" class="btn btn-primary">Calcular</a>
    
                                        </div>
    
                                    </div>
    
                                </div><br><br>

                                <div class="row">
                                    <div class="col-lg-2 col-md-4 col-12">
                                        <lord-icon
                                        src="https://cdn.lordicon.com/caaolypd.json"
                                        trigger="hover"
                                        style="width:200px;height:170px">
                                    </lord-icon>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-12 ps-lg-3 mt-md-2">
                                        <div class="about-text text-black">
                                            <h4>Depreciación para el ISR</h4>
                                            <a href="../calculadoras/deprecisr.php" class="btn btn-primary">Calcular</a>
    
                                        </div>
    
                                    </div>
    
    
                                </div><br><br>

                            <div class="row">
                                <div>
                                    <h3>Personas morales</h3>
                                    <hr>
                                </div>
                                <div class="col-lg-2 col-md-4 col-12">
                                    <lord-icon
                                    src="https://cdn.lordicon.com/caaolypd.json"
                                    trigger="hover"
                                    style="width:200px;height:170px">
                                    </lord-icon>
                                </div>
                                <div class="col-lg-4 col-md-12 col-12 ps-lg-3 mt-md-2">
                                    <div class="about-text text-black">
                                        <h4>Cuenta de capital de aportación actualizada</h4>
                                        <a href="../calculadoras/cuentacap.php" class="btn btn-primary">Calcular</a>

                                    </div>

                                </div>

                                <div class="col-lg-2 col-md-4 col-12">
                                    <lord-icon
                                    src="https://cdn.lordicon.com/caaolypd.json"
                                    trigger="hover"
                                    style="width:200px;height:170px">
                                </lord-icon>
                                </div>
                                <div class="col-lg-4 col-md-12 col-12 ps-lg-3 mt-md-2">
                                    <div class="about-text text-black">
                                        <h4>Fluctuación cambiaria</h4>
                                        <a href="../calculadoras/fluctcamb.php" class="btn btn-primary">Calcular</a>

                                    </div>

                                </div>

                            </div>




                                <div class="row">

                                    <div>
                                        <h3>Personas físicas</h3>
                                        <hr>
                                    </div>

                                    <div class="col-lg-2 col-md-4 col-12">
                                        <lord-icon
                                    src="https://cdn.lordicon.com/caaolypd.json"
                                    trigger="hover"
                                    style="width:200px;height:170px">
                                </lord-icon>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-12 ps-lg-3 mt-md-2">
                                        <div class="about-text text-black">
                                            <h4>Amortización de pérdidas por intereses</h4>
                                            <a href="../calculadoras/perdidas.php" class="btn btn-primary">Calcular</a>
    
                                        </div>
    
                                    </div>

                                    <div class="col-lg-2 col-md-4 col-12">
                                        <lord-icon
                                        src="https://cdn.lordicon.com/caaolypd.json"
                                        trigger="hover"
                                        style="width:200px;height:170px">
                                    </lord-icon>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-12 ps-lg-3 mt-md-2">
                                        <div class="about-text text-black">
                                            <h4>ISR de aguinaldo</h4>
                                            <a href="../calculadoras/isragui.php" class="btn btn-primary">Calcular</a>
    
                                        </div>
    
                                    </div>

    
                                </div><br><br>

                                <div class="row">
                                    <div class="col-lg-2 col-md-4 col-12">
                                        <lord-icon
                                        src="https://cdn.lordicon.com/caaolypd.json"
                                        trigger="hover"
                                        style="width:200px;height:170px">
                                    </lord-icon>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-12 ps-lg-3 mt-md-2">
                                        <div class="about-text text-black">
                                            <h4>ISR de prima vacacional</h4>
                                            <a href="../calculadoras/isrprima.php" class="btn btn-primary">Calcular</a>
    
                                        </div>
    
                                    </div>

                                    <div class="col-lg-2 col-md-4 col-12">
                                        <lord-icon
                                            src="https://cdn.lordicon.com/caaolypd.json"
                                            trigger="hover"
                                            style="width:200px;height:170px">
                                        </lord-icon>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-12 ps-lg-3 mt-md-2">
                                        <div class="about-text text-black">
                                            <h4>ISR de PTU</h4>
                                            <a href="../calculadoras/isrptu.php" class="btn btn-primary">Calcular</a>
    
                                        </div>
    
                                    </div>
    
                                </div><br><br>

                                <div class="row">
                                   
                                    <div class="col-lg-2 col-md-4 col-12">
                                        <lord-icon
                                    src="https://cdn.lordicon.com/caaolypd.json"
                                    trigger="hover"
                                    style="width:200px;height:170px">
                                </lord-icon>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-12 ps-lg-3 mt-md-2">
                                        <div class="about-text text-black">
                                            <h4>ISR de Régimen de Incorporación</h4>
                                            <a href="../calculadoras/isrreginc.php" class="btn btn-primary">Calcular</a>
    
                                        </div>
    
                                    </div>

                                    <div class="col-lg-2 col-md-4 col-12">
                                        <lord-icon
                                        src="https://cdn.lordicon.com/caaolypd.json"
                                        trigger="hover"
                                        style="width:200px;height:170px">
                                    </lord-icon>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-12 ps-lg-3 mt-md-2">
                                        <div class="about-text text-black">
                                            <h4>ISR por actividad empresarial y profesional</h4>
                                            <a href="../calculadoras/isractivempre.php" class="btn btn-primary">Calcular</a>
    
                                        </div>
    
                                    </div>
    
                                </div><br><br>

                                <div class="row">
    
    
                                    <div class="col-lg-2 col-md-4 col-12">
                                        <lord-icon
                                        src="https://cdn.lordicon.com/caaolypd.json"
                                        trigger="hover"
                                        style="width:200px;height:170px">
                                    </lord-icon>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-12 ps-lg-3 mt-md-2">
                                        <div class="about-text text-black">
                                            <h4>ISR por arrendamiento</h4>
                                            <a href="../calculadoras/israrrend.php" class="btn btn-primary">Calcular</a>
    
                                        </div>
    
                                    </div>

                                    <div class="col-lg-2 col-md-4 col-12">
                                        <lord-icon
                                        src="https://cdn.lordicon.com/caaolypd.json"
                                        trigger="hover"
                                        style="width:200px;height:170px">
                                    </lord-icon>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-12 ps-lg-3 mt-md-2">
                                        <div class="about-text text-black">
                                            <h4>ISR por salarios y asimilados</h4>
                                            <a href="../calculadoras/isrsalarios.php" class="btn btn-primary">Calcular</a>
    
                                        </div>
    
                                    </div>
    
                                </div><br><br>

                                <div class="row">
    
                                    <div class="col-lg-2 col-md-4 col-12">
                                        <lord-icon
                                        src="https://cdn.lordicon.com/caaolypd.json"
                                        trigger="hover"
                                        style="width:200px;height:170px">
                                    </lord-icon>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-12 ps-lg-3 mt-md-2">
                                        <div class="about-text text-black">
                                            <h4>Pago en parcialidades de personas físicas</h4>
                                            <a href="../calculadoras/pagoenpar.php" class="btn btn-primary">Calcular</a>
    
                                        </div>
    
                                    </div>
    
                                </div><br><br>

                            
                                <div class="row">

                                    <div>
                                        <h3>LABORAL</h3>
                                        <hr>
                                    </div>

                                    <div class="col-lg-2 col-md-4 col-12">
                                        <lord-icon
                                        src="https://cdn.lordicon.com/caaolypd.json"
                                        trigger="hover"
                                        style="width:200px;height:170px">
                                    </lord-icon>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-12 ps-lg-3 mt-md-2">
                                        <div class="about-text text-black">
                                            <h4>Cálculo inverso de salarios</h4>
                                            <a href="../calculadoras/calcinv.php" class="btn btn-primary">Calcular</a>
    
                                        </div>
    
                                    </div>
    
    
                                    <div class="col-lg-2 col-md-4 col-12">
                                        <lord-icon
                                        src="https://cdn.lordicon.com/caaolypd.json"
                                        trigger="hover"
                                        style="width:200px;height:170px">
                                    </lord-icon>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-12 ps-lg-3 mt-md-2">
                                        <div class="about-text text-black">
                                            <h4>Cálculo integral de salarios</h4>
                                            <a href="../calculadoras/calcintegr.php" class="btn btn-primary">Calcular</a>
    
                                        </div>
    
                                    </div>
    
                                </div><br><br>

                                <div class="row">
                                    <div class="col-lg-2 col-md-4 col-12">
                                        <lord-icon
                                    src="https://cdn.lordicon.com/caaolypd.json"
                                    trigger="hover"
                                    style="width:200px;height:170px">
                                </lord-icon>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-12 ps-lg-3 mt-md-2">
                                        <div class="about-text text-black">
                                            <h4>Indemnización por separación laboral</h4>
                                            <a href="../calculadoras/indemnsep.php" class="btn btn-primary">Calcular</a>
    
                                        </div>
    
                                    </div>
    
    
                                    <div class="col-lg-2 col-md-4 col-12">
                                        <lord-icon
                                        src="https://cdn.lordicon.com/caaolypd.json"
                                        trigger="hover"
                                        style="width:200px;height:170px">
                                    </lord-icon>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-12 ps-lg-3 mt-md-2">
                                        <div class="about-text text-black">
                                            <h4>Participación de los trabajadores en las utilidades de la empresa</h4>
                                            <a href="../calculadoras/partitrabaj.php" class="btn btn-primary">Calcular</a>
    
                                        </div>
    
                                    </div>
    
                                </div><br><br>

                                <div class="row">
                                    <div>
                                        <h3>SEGURO SOCIAL</h3>
                                        <hr>
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-12">
                                        <lord-icon
                                        src="https://cdn.lordicon.com/caaolypd.json"
                                        trigger="hover"
                                        style="width:200px;height:170px">
                                    </lord-icon>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-12 ps-lg-3 mt-md-2">
                                        <div class="about-text text-black">
                                            <h4>Cuotas obrero-patronales</h4>
                                            <a href="../calculadoras/coutasobrer.php" class="btn btn-primary">Calcular</a>
    
                                        </div>
    
                                    </div>
    
    
                                    <div class="col-lg-2 col-md-4 col-12">
                                        <lord-icon
                                            src="https://cdn.lordicon.com/caaolypd.json"
                                            trigger="hover"
                                            style="width:200px;height:170px">
                                        </lord-icon>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-12 ps-lg-3 mt-md-2">
                                        <div class="about-text text-black">
                                            <h4>Factor de integración de salario</h4>
                                            <a href="../calculadoras/factorintegr.php" class="btn btn-primary">Calcular</a>
    
                                        </div>
    
                                    </div>
    
                                </div>


                                
                                <div class="row">
                                    <div class="col-lg-2 col-md-4 col-12">
                                        <lord-icon
                                        src="https://cdn.lordicon.com/caaolypd.json"
                                        trigger="hover"
                                        style="width:200px;height:170px">
                                    </lord-icon>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-12 ps-lg-3 mt-md-2">
                                        <div class="about-text text-black">
                                            <h4>Prima de riesgo</h4>
                                            <a href="../calculadoras/primriesgo.php" class="btn btn-primary">Calcular</a>
    
                                        </div>
    
                                    </div>
    
    
                                    <div class="col-lg-2 col-md-4 col-12">
                                        <lord-icon
                                            src="https://cdn.lordicon.com/caaolypd.json"
                                            trigger="hover"
                                            style="width:200px;height:170px">
                                        </lord-icon>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-12 ps-lg-3 mt-md-2">
                                        <div class="about-text text-black">
                                            <h4>Salario base de cotización</h4>
                                            <a href="../calculadoras/salariobase.php" class="btn btn-primary">Calcular</a>
    
                                        </div>
    
                                    </div>
    
                                </div>

                                

                             


                        </div>
            

                    </section>

                


    </main>

    <div class="modal-container">
        <img src="../imgs/candado (1).png" alt="">
        <h2>CTS ONLINE</h2>
        <p>Si quieres disfrutar de este apartado, <br> ¡CAMBIATE DE PLAN!</p>
        <a href="panel.php"><button type="button">Planes</button></a>
    </div>


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
</body>

</html>