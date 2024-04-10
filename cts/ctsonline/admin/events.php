<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "cal_db";

$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se recibieron datos POST para guardar un evento
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del evento desde el frontend
    $title = $_POST['title'];
    $time_from = $_POST['time_from'];
    $time_to = $_POST['time_to'];

    // Preparar la consulta SQL para insertar el evento en la base de datos
    $sql = "INSERT INTO events (title, time_from, time_to) VALUES ('$title', '$time_from', '$time_to')";

    // Ejecutar la consulta SQL
    if ($conn->query($sql) === TRUE) {
        echo "Evento guardado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Verificar si se recibió una solicitud GET para recuperar eventos
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Preparar la consulta SQL para recuperar los eventos de la base de datos
    $sql = "SELECT * FROM events";

    // Ejecutar la consulta SQL
    $result = $conn->query($sql);

    // Crear un array para almacenar los eventos
    $events = [];

    // Verificar si se encontraron eventos
    if ($result->num_rows > 0) {
        // Recorrer los resultados y guardarlos en el array de eventos
        while ($row = $result->fetch_assoc()) {
            $events[] = $row;
        }
    }

    // Convertir el array de eventos a formato JSON y enviarlo al frontend
    echo json_encode($events);
}

// Cerrar la conexión
$conn->close();
?>
