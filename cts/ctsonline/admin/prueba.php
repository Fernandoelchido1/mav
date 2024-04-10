<?php

include "api/google-api-php-client--PHP8.0/vendor/autoload.php";

putenv('GOOGLE_APPLICATION_CREDENTIALS=prueba-413800-4ab124641d57.json');

$client = new Google_Client();
$client->useApplicationDefaultCredentials();
$client->setScopes(['https://www.googleapis.com/auth/drive.file']);

try {
    // Verificar si se subió un archivo y es un PDF o Word
    if ($_FILES['archivos']['size'] > 0) {
        $allowed_types = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime_type = finfo_file($finfo, $_FILES['archivos']['tmp_name']);

        if (!in_array($mime_type, $allowed_types)) {
            throw new Exception('Solo se permiten archivos PDF y Word.');
        }
    } else {
        throw new Exception('No se seleccionó ningún archivo.');
    }

    $service = new Google_Service_Drive($client);
    $file_path = $_FILES['archivos']['tmp_name'];

    $file = new Google_Service_Drive_DriveFile();
    $file->setName($_FILES['archivos']['name']);

    $file->setParents(["112VRoqvBcBuiF3XlE8Ab7aHV8ydoxE3I"]);

    $file->setDescription("Archivo cargado desde PHP");
    $file->setMimeType($mime_type);

    $resultado = $service->files->create(
        $file,
        [
            'data' => file_get_contents($file_path),
            'mimeType' => "image/jpg",
            'uploadType' => 'media'
        ]
    );

    echo "<script>alert('Archivo cargado exitosamente'); window.location.href = 'vista.php';</script>";
} catch (Google_Service_Exception $gs) {
    $mensaje = json_decode($gs->getMessage());
    echo $mensaje->error->message;
} catch (Exception $e) {
    echo $e->getMessage();
}