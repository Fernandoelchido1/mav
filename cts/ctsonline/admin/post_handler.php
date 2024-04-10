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

  // Insertar nuevo post en la base de datos
  $stmt = $conn->prepare("INSERT INTO posts (title, content, image_path) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $title, $content, $imagePath);
  $stmt->execute();
  $stmt->close();

  // Cerrar la conexión a la base de datos
  $conn->close();
}
?>
