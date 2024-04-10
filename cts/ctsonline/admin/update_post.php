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

  // Obtener datos del formulario
  $postId = $_POST["postId"];
  $title = $_POST["title"];
  $content = $_POST["content"];

  // Manejar la imagen
  $imagePath = '';
  if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $imageTmp = $_FILES['image']['tmp_name'];
    $imageName = $_FILES['image']['name'];
    $imagePath = 'uploads/' . $imageName;
    move_uploaded_file($imageTmp, $imagePath);
  }

  // Actualizar la publicación en la base de datos
  $stmt = $conn->prepare("UPDATE posts SET title = ?, content = ?, image_path = ? WHERE id = ?");
  $stmt->bind_param("sssi", $title, $content, $imagePath, $postId);
  $stmt->execute();
  $stmt->close();

  // Cerrar la conexión a la base de datos
  $conn->close();
}
?>
