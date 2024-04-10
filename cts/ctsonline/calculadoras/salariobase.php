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
                    <h1 class="align-content-center text-center" style="font-size: rem; letter-spacing: 3px;">SALARIO DE BASE DE COTIZACIÓN</h1><br>
                    <p>Las calculadoras fiscales son herramientas que facilitan el cálculo de diversos aspectos relacionados con los impuestos y las obligaciones fiscales de una persona, empresa u entidad. Estas calculadoras están diseñadas para ayudar a determinar diferentes aspectos, como la cantidad de impuestos a pagar, las deducciones fiscales disponibles, las retenciones, y otros cálculos relacionados con asuntos tributarios.</p><br>
                </article><br>

                    <section class="about section-padding">

                        <div class="container">
                            <div class="row">
                                <div>
                                    <h3>General</h3>
                                    <hr>
                                </div>

                                <h1 class="fw-bold text-center py-1">Calculadora Retención piramidación IVA</h1>

                                <form id="agregar" action="../phpcalculadoras/calculadora1.php" method="POST">
                                    <input placeholder="Ingrese Cantidad" type="text" class="container form-control w-25" name="ingrese" id="ingresar"><br>
                                    <div class="d-grid">
                                        <input type="submit" class="container w-25 btn btn-primary btt"><br>
                                    </div>
                                </form>
                                <div class="row">
                                    <!-- Resultados de la primera operación -->
                                    <div id="resultado" class="col-md-5 segcaja1">
                                        <table class="table table-responsive-m table-responsive-sm border-black float-md-start w-75 h-25 segcaja1 d-none" id="lista" >
                                            <tr>
                                                <th class="text-center bg-primary border-primary-subtle">HONORARIO PIRAMIDAL</th>
                                            </tr>
                                        <tr>
                                            <th>Honorario Bruto</th>
                                            <td id="bruto"></td>
                                        </tr>
                                        <tr>
                                            <th>IVA</th>
                                            <td id="iva"></td>
                                        </tr>
                                        <tr>
                                            <th>Honorario Total</th>
                                            <td id="total"></td>
                                        </tr>
                                        <tr>
                                            <th>Retención ISR</th>
                                            <td id="retencion"></td>
                                        </tr>
                                        <tr>
                                            <th>Retención IVA</th>
                                            <td id="retencioniva"></td>
                                        </tr>
                                        <tr>
                                            <th>Honorario Neto</th>
                                            <td id="hnetot"></td>
                                        </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            
                                
                                <!-- Resultados de la segunda operación -->
                                <div id="resultado2" class="col-md-5 segcaja ">
                                    <table class="table table-responsive-md table-responsive-sm  border-black border-3  float-md-start w-75 h-25 segcaja d-none" id="lista2">
                            
                                            <tr>
                                                <th class="text-center bg-primary  border-primary-subtle">HONORARIO RETENCIÓN PIRAMIDAL   </th>
                                            </tr>
                                            <tr>
                                        
                                                <th>Honorario Bruto</th>
                                                <td id="bruto2"></td>
                                            </tr>
                                            <tr>
                                                <th>IVA</th>
                                                <td id="iva2"></td>
                                            </tr>
                                            <tr>
                                                <th>Honorario Total</th>
                                                <td id="total2"></td>
                                            </tr>
                                            <tr>
                                                <th>Retención ISR</th>
                                                <td id="retencion2"></td>
                                            </tr>
                                            <tr>
                                                <th>Retención IVA</th>
                                                <td id="retencioniva2"></td>
                                            </tr>
                                            <tr>
                                                <th>Honorario Neto</th>
                                                <td id="hnetot2"></td>
                                            </tr>
                                        </table>
                                    </div>
                                
                            </div>
                          

    
                                </div>

                                

                             


                        </div>
            

                    </section>

                


    </main>








    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#agregar').submit(function(event){
                event.preventDefault();
                const monto = $('#ingresar').val();
                $.ajax({
                    type: "POST",
                    url: '../phpcalculadoras/calculadora1.php',
                    data: $("#agregar").serialize(),
                    success: function(data) {
                        // Parse the JSON response from the server
                        const result = JSON.parse(data);

                        // Update table with received data for the primera operación
                        $('#neto').text(result.operacion1.HonorarioNeto);
                        $('#iva').text(result.operacion1.Iva);
                        $('#bruto').text(result.operacion1.HonorarioBruto);
                        $('#total').text(result.operacion1.HonorarioTotal);
                        $('#retencion').text(result.operacion1.RetencionIsr);
                        $('#retencioniva').text(result.operacion1.RetencionIva);
                        $('#hnetot').text(result.operacion1.HonorarioNetoResultado);
                        $('#lista').removeClass('d-none');  // Show the table

                        // Update table with received data for the segunda operación
                        $('#neto2').text(result.operacion2.HonorarioNeto);
                        $('#iva2').text(result.operacion2.Iva);
                        $('#bruto2').text(result.operacion2.HonorarioBruto);
                        $('#total2').text(result.operacion2.HonorarioTotal);
                        $('#retencion2').text(result.operacion2.RetencionIsr);
                        $('#retencioniva2').text(result.operacion2.RetencionIva);
                        $('#hnetot2').text(result.operacion2.HonorarioNetoResultado);
                        $('#lista2').removeClass('d-none');  // Show the table
                    },
                    error: function() {
                        $('#resultado').html('<p>Error en la solicitud AJAX</p>');
                    }
                });
            });
        });
    </script>


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