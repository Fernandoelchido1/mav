<?php
session_start(); // Inicia la sesión al principio del archivo
?>
<?php
include "../admin/api/google-api-php-client--PHP8.0/vendor/autoload.php";

putenv('GOOGLE_APPLICATION_CREDENTIALS=prueba-413800-4ab124641d57.json');

$client = new Google_Client();
$client->useApplicationDefaultCredentials();
$client->setScopes(['https://www.googleapis.com/auth/drive.file']);

$service = new Google_Service_Drive($client);

// Lógica para crear una nueva carpeta
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nombre_carpeta'])) {
    $nombre_carpeta = $_POST['nombre_carpeta'];
    $fileMetadata = new Google_Service_Drive_DriveFile(array(
        'name' => $nombre_carpeta,
        'mimeType' => 'application/vnd.google-apps.folder',
        'parents' => ["112VRoqvBcBuiF3XlE8Ab7aHV8ydoxE3I"] // ID de la carpeta principal
    ));

    $folder = $service->files->create($fileMetadata, array(
        'fields' => 'id'
    ));

    echo "<script>var folderCreatedMessage = 'Carpeta creada exitosamente';</script>";
}


// Lógica para eliminar un archivo
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['eliminar'])) {
    $fileId = $_POST['eliminar'];
    try {
        $service->files->delete($fileId);
        echo "<script>var folderCreatedMessage = 'Archivo eliminado exitosamente';</script>";
    } catch (Exception $e) {
        echo "<script>alert('Error al eliminar el archivo: " . $e->getMessage() . "');</script>";
    }
}

// Lógica para subir un archivo
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['archivos'])) {
    $fileMetadata = new Google_Service_Drive_DriveFile(array(
        'name' => $_FILES['archivos']['name'],
        'parents' => ["112VRoqvBcBuiF3XlE8Ab7aHV8ydoxE3I"] // ID de la carpeta principal
    ));
    $content = file_get_contents($_FILES['archivos']['tmp_name']);
    $file = $service->files->create($fileMetadata, array(
        'data' => $content,
        'mimeType' => $_FILES['archivos']['type'],
        'uploadType' => 'multipart',
        'fields' => 'id'
    ));

    echo "<script>var folderCreatedMessage = 'Archivo subido correctamente';</script>";
}
// Lógica para descargar un archivo desde la vista principal
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['descargar'])) {
    $fileId = $_POST['descargar'];
    try {
        // Obtener la metadata del archivo
        $fileMetadata = $service->files->get($fileId);
        // Obtener el nombre del archivo
        $fileName = $fileMetadata->getName();
        // Obtener el contenido del archivo
        $fileContent = $service->files->get($fileId, array('alt' => 'media'));
        // Configurar la cabecera para la descarga del archivo
        header('Content-Disposition: attachment; filename="' . $fileName . '"');
        // Imprimir el contenido del archivo para descargar
        echo $fileContent->getBody()->getContents();
        exit;
    } catch (Exception $e) {
        echo "<script>alert('Error al descargar el archivo: " . $e->getMessage() . "');</script>";
    }
}

// Función para obtener el icono según el tipo de archivo
function obtenerIconoArchivo($mimeType) {
    switch ($mimeType) {
        case 'application/pdf':
            return 'far fa-file-pdf'; // Icono de PDF
        case 'application/msword':
            return 'far fa-file-word'; // Icono de Word
        case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document':
            return 'far fa-file-word'; // Icono de Word
        case 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet':
            return 'far fa-file-excel'; // Icono de Excel
        default:
            return 'far fa-file'; // Icono de archivo por defecto
    }
}


// Obtener los archivos y carpetas directamente en la carpeta principal
$optParams = array(
    'q' => "'112VRoqvBcBuiF3XlE8Ab7aHV8ydoxE3I' in parents", // Archivos y carpetas directamente en la carpeta principal
    'pageSize' => 100,
    'fields' => 'files(id, name, mimeType, webViewLink)',
);
$resultado = $service->files->listFiles($optParams);
?>



<!-- vista.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/legislaci.css">
    <link rel="shortcut icon" href="../imgs/favicon.png">
    <title>Tu Título Aquí</title>
    <style>
        /* Estilos para el botón de subir archivo y crear carpeta */
        .btn-primary{
            cursor: pointer;
        }
        .custom-file-container {
            display: inline-block;
            vertical-align: middle;
            margin-right: 10px; /* Separación entre botones */
        }

        .custom-file-label {
            padding: .375rem .75rem;
            font-size: 1rem;
            line-height: 1.5;
            color: #fff;
            background-color: #007bff;
            border: 1px solid #007bff;
            border-radius: .125rem;
        }

        .custom-file-label::after {
            content: '\271A'; /* Unicode for the plus sign icon */
            margin-left: 5px;
        }

        .custom-file-label:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-crear-carpeta {
            margin-top: 0px; 
            margin-bottom: 10px;
            background-color: #007bff;
            color: #fff;
            border: 1px solid #007bff;
        }

        .card {
            border-radius: 15px; /* Bordes redondeados */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.4); /* Sombra */
            transition: transform 0.3s, box-shadow 0.3s; /* Transición */
            height: 280px; /* Altura fija para todas las tarjetas */
        }

        .card:hover {
            transform: translateY(-5px); /* Desplazamiento al pasar el mouse */
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.1); /* Sombra más pronunciada */
        }

        .card .file-icon {
            position: absolute;
            top: 10px;
            left: 10px;
            font-size: 32px; /* Tamaño de icono ajustado */
            color: #666;
            z-index: 999;
        }

        .card-body {
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        /* Estilos para el botón de eliminar */
        .btn-danger {
            margin-top: auto; /* Margen superior automático para empujarlo hacia abajo */
        }
    </style>
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

                <li id="calc">
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
            <!-- 
            primera seccion <div class="modo-oscuro">
                <div class="info">
                    <ion-icon name="invert-mode-outline"></ion-icon>
                    <span>Dark Mode</span>s
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
                    <h1 class="align-content-center text-center" style="font-size: rem; letter-spacing: 3px;">LEY ESTATAL</h1><br>
                    <p>
                    Los datos de índices, tasas y tarifas son publicados en el Diario Oficial de la Federación.</p><br>
                </article><br>
         </div><br>


<div class="container mt-5">
    <div class="row">
        <?php if (count($resultado->getFiles()) > 0): ?>
            <?php foreach ($resultado->getFiles() as $elemento): ?>
                <div class="col-md-12 mb-4"> <!-- Dividido en dos columnas -->
                    <div class="d-flex align-items-center justify-content-between border-bottom mb-2 pb-2"> <!-- Alineación horizontal y borde inferior -->
                        <div class="d-flex align-items-center"> <!-- Contenedor del icono y título -->
                            <?php if ($elemento->getMimeType() === 'application/vnd.google-apps.folder'): ?>
                                <div class="mr-3">
                                    <lord-icon
                                        src="https://cdn.lordicon.com/bgitlnnj.json"
                                        trigger="hover"
                                        style="width: 50px; height: 50px;">
                                    </lord-icon>
                                </div>
                                <div>
                                <a href="carpeta.php?carpeta_id=<?= $elemento->getId() ?>" style="text-decoration: none; color: inherit;">
                                        <h5 class="card-title"><?= $elemento->getName() ?></h5> <!-- Texto del título -->
                                    </a>
                                </div>
                            <?php else: ?>
                                <div class="mr-3">
                                <lord-icon
                                    src="https://cdn.lordicon.com/ofcynlwa.json"
                                    trigger="hover"
                                    style="width:50px;height:50px">
                                </lord-icon>
                                 
                                </div>
                                <div>
                                    <a href="<?= $elemento->getWebViewLink() ?>" style="text-decoration: none; color: inherit;">
                                        <h5 class="card-title"><?= pathinfo($elemento->getName(), PATHINFO_FILENAME) ?></h5> <!-- Texto del título -->
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                        <!-- Botones de eliminar y descargar -->
                        <div class="btn-group">
                        
                            <?php if ($elemento->getMimeType() !== 'application/vnd.google-apps.folder'): ?>
                                <form method="post">
                                    <input type="hidden" name="origin" value="vista">
                                    <button type="submit" class="btn btn-success" name="descargar" value="<?= $elemento->getId() ?>">
                                        Descargar <i class="file-icon <?= obtenerIconoArchivo($elemento->getMimeType()) ?>"></i>
                                </form>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-md-12">
                <p>No se encontraron archivos</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<style>
    .card {
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .card-body {
        flex: 1 1 auto;
    }

    .card-footer {
        margin-top: auto;
    }

    .card a {
        text-decoration: none;
        color: inherit;
        display: block;
        height: 100%;
    }

    .card a:hover {
        text-decoration: none;
        color: inherit;
    }
</style>
</main>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdn.lordicon.com/lordicon.js"></script>
<script src="../js/script.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
    // Verifica si la variable está definida antes de mostrar el mensaje
    if (typeof folderCreatedMessage !== 'undefined') {
        Swal.fire({
            icon: 'success',
            title: folderCreatedMessage,
            showConfirmButton: false,
            timer: 1500
        }).then(() => {
            window.location.href = 'leyestatal.php';
        });
    }
</script>


</body>
</html>