<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cal_db";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Función para insertar un evento en la base de datos
function insertarEvento($titulo, $fecha, $horaDesde, $horaHasta) {
    global $conn;
    $sql = "INSERT INTO eventos (titulo, fecha, hora_desde, hora_hasta)
            VALUES ('$titulo', '$fecha', '$horaDesde', '$horaHasta')";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Función para eliminar un evento de la base de datos
function eliminarEvento($id) {
    global $conn;
    $sql = "DELETE FROM eventos WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Más funciones para actualizar, seleccionar eventos, etc.

?>
