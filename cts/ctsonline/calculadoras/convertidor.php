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

            <a class="text-decoration-none" href="../admin/menul.php"><button  id="inicio" class="boton">
                <ion-icon name="home-outline"></ion-icon>
                <span>Inicio</span>
            </button>
        </a>

        </div>

        <!-- segunda seccion -->

        <nav class="navegacion">
            <ul>
                <li id="calc">
                    <a href="../admin/calculadora2.php">
                        <ion-icon name="calculator-outline"></ion-icon>
                        <span>Calculadora</span>
                    </a>
                </li>

                <li>
                    <a href="../admin/legislaci.php">
                        <ion-icon name="briefcase-outline"></ion-icon>
                        <span>Legislacion</span>
                    </a>
                </li>

                <li>
                    <a href="../admin/cfiscal.php">
                        <ion-icon name="calendar-number-outline"></ion-icon>
                        <span>Calendario Fiscal</span>
                    </a>
                </li>

                <li>
                    <a href="../admin/teindicadores.php">
                        <ion-icon name="stats-chart-outline"></ion-icon>
                        <span>Tablas e Indicadores</span>
                    </a>
                </li>

                <li>
                    <a href="../admin/blog.php">
                        <ion-icon name="book-outline"></ion-icon>
                        <span>Blogs</span>
                    </a>
                </li>

                <li>
                    <a href="../admin/enlac.php">
                        <ion-icon name="file-tray-stacked-outline"></ion-icon>
                        <span>Enlaces</span>
                    </a>
                </li>

                <li>
                    <a href="../admin/dof.php">
                        <ion-icon name="document-outline"></ion-icon>
                        <span>DOF</span>
                    </a>
                </li>
                <li>
                    <a href="../admin/cyeventos.php">
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
                            <h1 class="align-content-center text-center" style="font-size: rem; letter-spacing: 3px;">CONVERTIDOR DE MONEDAS EXTRANJERAS</h1><br>
                            <p>Las calculadoras fiscales son herramientas que facilitan el cálculo de diversos aspectos relacionados con los impuestos y las obligaciones fiscales de una persona, empresa u entidad. Estas calculadoras están diseñadas para ayudar a determinar diferentes aspectos, como la cantidad de impuestos a pagar, las deducciones fiscales disponibles, las retenciones, y otros cálculos relacionados con asuntos tributarios.</p><br>
                            </article><br>
                            <div>
                                    <h3>General</h3>
                                    <hr>
                                </div>
                <article class="col-md-12"><br>
                    <section class="about section-padding">
                        <div class="container form-container">
                            <div class="row">
                                <form id="agregar" action="" method="POST">
                                    <div class="mb-3">
                                        <label for="ingresar" class="form-label">Ingrese Cantidad</label>
                                        <input type="text" class="form-control" name="can" id="ingresar">
                                    </div>

                                    <div class="mb-3">
                                        <label for="moneda" class="form-label">Moneda de origen:</label>
                                        <select name="mon" class="form-select">
                                            <option value="1">Pesos</option>
                                            <option value="2">Dólares</option>
                                            <option value="3">Euros</option>
                                            <option value="4">Libras</option>
                                        </select>
                                    </div>

                                    <div class="d-grid mt-3">
                                        <input type="submit" class="btn btn-primary" value="Calcular">
                                    </div>
                                </form>

                                <div class="row mt-4">
                                    <div id="resultado" class="col-md-6">
                                        <table class="table table-responsive-m table-responsive-sm w-100 h-25" id="lista">
                                        </table>
                                    </div>

                                    <div id="resultado2" class="col-md-6 ">
                                        <table class="table table-responsive-md table-responsive-sm w-100 h-25" id="lista2">
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </article>
            </section>
        </div>
    </main>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $can = $_POST['can'];
    $mon = $_POST['mon'];

    echo '<script>';
    echo 'document.getElementById("resultado").classList.remove("d-none");';
    echo 'document.getElementById("resultado2").classList.remove("d-none");';

    echo 'document.getElementById("lista").innerHTML = "<tr><th class=\'text-center bg-primary border-primary-subtle\'>Cantidad Ingresada</th><td>' . number_format($can, 2, '.', ',') . ' ' . obtenerSimboloMoneda($mon) . '</td></tr>";';

    if ($mon == 1) {
        $dol = $can / 16.90;
        $eur = $can / 18.68;
        $lib = $can / 21.51;

        echo 'document.getElementById("lista2").innerHTML = "<tr><th class=\'text-center bg-primary  border-primary-subtle\'>Dólares</th><td>' . number_format($dol, 2, '.', ',') . ' &dollar;</td></tr><tr><th class=\'text-center bg-primary  border-primary-subtle\'>Euros</th><td>' . number_format($eur, 2, '.', ',') . ' &euro;</td></tr><tr><th class=\'text-center bg-primary  border-primary-subtle\'>Libras</th><td>' . number_format($lib, 2, '.', ',') . ' &pound;</td></tr>";';
    } elseif ($mon == 2) {
        $pes = $can * 16.90;
        $eur = $can * 16.90 / 18.68;
        $lib = $can * 16.90 / 21.51;

        echo 'document.getElementById("lista2").innerHTML = "<tr><th class=\'text-center bg-primary  border-primary-subtle\'>Pesos</th><td>&dollar;' . number_format($pes, 2, '.', ',') . '</td></tr><tr><th class=\'text-center bg-primary  border-primary-subtle\'>Euros</th><td>' . number_format($eur, 2, '.', ',') . ' &euro;</td></tr><tr><th class=\'text-center bg-primary  border-primary-subtle\'>Libras</th><td>' . number_format($lib, 2, '.', ',') . ' &pound;</td></tr>";';
    } elseif ($mon == 3) {
        $pes = $can * 18.68;
        $dol = $can * 18.68 / 16.90;
        $lib = $can * 18.68 / 21.51;

        echo 'document.getElementById("lista2").innerHTML = "<tr><th class=\'text-center bg-primary border-primary-subtle\'>Pesos</th><td>&dollar;' . number_format($pes, 2, '.', ',') . '</td></tr><tr><th class=\'text-center bg-primary border-primary-subtle\'>Dólares</th><td>' . number_format($dol, 2, '.', ',') . ' &dollar;</td></tr><tr><th class=\'text-center bg-primary border-primary-subtle\'>Libras</th><td>' . number_format($lib, 2, '.', ',') . ' &pound;</td></tr>";';
    } elseif ($mon == 4) {
        $pes = $can * 21.51;
        $dol = $can * 21.51 / 16.90;
        $eur = $can * 21.51 / 18.68;

        echo 'document.getElementById("lista2").innerHTML = "<tr><th class=\'text-center bg-primary  border-primary-subtle\'>Pesos</th><td>&dollar;' . number_format($pes, 2, '.', ',') . '</td></tr><tr><th class=\'text-center bg-primary  border-primary-subtle\'>Dólares</th><td>' . number_format($dol, 2, '.', ',') . ' &dollar;</td></tr><tr><th class=\'text-center bg-primary  border-primary-subtle\'>Euros</th><td>' . number_format($eur, 2, '.', ',') . ' &euro;</td></tr>";';
    }
    echo '</script>';
}

function obtenerSimboloMoneda($moneda) {
    switch ($moneda) {
        case 1:
            return ' &dollar;'; // Pesos
        case 2:
            return '&dollar;'; // Dolar
        case 3:
            return '&euro;'; // Euro
        case 4:
            return '&pound;'; // Libras
        default:
            return '';
    }
}
?>

</body>
</html>
