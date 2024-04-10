<?php
// Incluir el archivo de inicialización de la API de Google Drive
require_once "api/google-api-php-client--PHP8.0/vendor/autoload.php";

// Configurar las credenciales de la aplicación de Google Drive
putenv('GOOGLE_APPLICATION_CREDENTIALS=prueba-413800-4ab124641d57.json');

// Crear una instancia del cliente de Google Drive
$client = new Google_Client();
$client->useApplicationDefaultCredentials();
$client->setScopes(['https://www.googleapis.com/auth/drive.file']);

// Crear una instancia del servicio de Google Drive
$service = new Google_Service_Drive($client);

// Obtener el ID de la carpeta seleccionada enviado desde la solicitud AJAX
$carpetaId = $_POST['carpeta_id'];

// Configurar los parámetros para obtener el contenido de la carpeta
$optParams = array(
    'q' => "'$carpetaId' in parents",
    'pageSize' => 100,
    'fields' => 'files(id, name, mimeType, webViewLink)',
);

// Realizar la solicitud para obtener el contenido de la carpeta
$resultado = $service->files->listFiles($optParams);

// Construir el HTML con el contenido de la carpeta
$htmlContenidoCarpeta = '';
if (count($resultado->getFiles()) > 0) {
    foreach ($resultado->getFiles() as $elemento) {
        $htmlContenidoCarpeta .= '<div class="col-md-12 mb-4">' .
            '<div class="d-flex align-items-center justify-content-between border-bottom mb-2 pb-2">' .
            '<div class="d-flex align-items-center">' .
            '<div class="mr-3">' .
            '<lord-icon src="https://cdn.lordicon.com/bgitlnnj.json" trigger="hover" style="width: 50px; height: 50px;"></lord-icon>' .
            '</div>' .
            '<div>' .
            '<a href="' . ($elemento->getMimeType() === 'application/vnd.google-apps.folder' ? 'carpeta4.php?carpeta_id=' . $elemento->getId() : $elemento->getWebViewLink()) . '" style="text-decoration: none; color: inherit;">' .
            '<h5 class="card-title">' . ($elemento->getMimeType() === 'application/vnd.google-apps.folder' ? $elemento->getName() : pathinfo($elemento->getName(), PATHINFO_FILENAME)) . '</h5>' .
            '</a>' .
            '</div>' .
            '</div>' .
            '<div class="btn-group">' .
            '<form method="post" class="mr-2"></form>';
        if ($elemento->getMimeType() !== 'application/vnd.google-apps.folder') {
            $htmlContenidoCarpeta .= '<form method="post">' .
                '<input type="hidden" name="origin" value="vista">' .
                '<button type="submit" class="btn btn-success" name="descargar" value="' . $elemento->getId() . '">' .
                'Descargar <i class="file-icon ' . obtenerIconoArchivo($elemento->getMimeType()) . '"></i>' .
                '</form>';
        }
        $htmlContenidoCarpeta .= '</div>' .
            '</div>' .
            '</div>';
    }
} else {
    $htmlContenidoCarpeta .= '<div class="col-md-12">' .
        '<p>No se encontraron archivos</p>' .
        '</div>';
}

// Devolver el HTML con el contenido de la carpeta
echo $htmlContenidoCarpeta;

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
?>
