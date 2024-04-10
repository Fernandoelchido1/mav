<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Conexión a la base de datos
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "servicios";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
  }

  // Obtener el ID de la publicación a eliminar
  $postId = $_POST['postId'];

  // Eliminar la publicación de la base de datos
  $stmt = $conn->prepare("DELETE FROM posts WHERE id = ?");
  $stmt->bind_param("i", $postId);
  $stmt->execute();
  $stmt->close();

  // Cerrar la conexión a la base de datos
  $conn->close();
}
?>
