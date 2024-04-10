<!-- get_posts.php -->
<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "servicios";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
}

// Obtener posts desde la base de datos
$result = $conn->query("SELECT * FROM posts");
$posts = $result->fetch_all(MYSQLI_ASSOC);

// Establecer el tamaño fijo para las imágenes
$imageSize = '200px';

// Mostrar posts en filas de tres
foreach (array_chunk($posts, 3) as $row) {
    echo '<div class="row mt-3">';
  
    foreach ($row as $post) {
      echo '<div class="col-md-4">';
      echo '<div class="card" style="height: 400px; display: flex; flex-direction: column; justify-content: space-between; border: none; background:#F5F5F5;">';
  
      // Estilo para el título con altura mínima
      echo '<h3 class="card-title" style="font-size: 20px; color: #000080; text-align: center; margin-bottom: 0.75em; min-height: 40px;">' . $post['title'] . '</h3>';
  
      // Mostrar la imagen si existe con un tamaño específico y alineación fija
      if (!empty($post['image_path'])) {
        echo '<img src="' . $post['image_path'] . '" alt="Imagen del post" style="width: 100%; height: 200px; object-fit: cover; margin-bottom: 0.75em; align-self: center;">';
      }
  
      // Enlace para ver la publicación individual
      echo '<a href="view_post.php?postId=' . $post['id'] . '" class="btn btn-primary">Ver publicación completa</a>';
  
      // Agregar botones de Editar y Eliminar con espacio adicional
      echo '<div class="mt-2">';
      echo '<button class="btn btn-warning btn-edit mr-2" data-post-id="' . $post['id'] . '">Editar</button>';
      echo '<button class="btn btn-danger btn-delete" data-post-id="' . $post['id'] . '">Eliminar</button>';
      echo '</div>';
  
      echo '</div>';
      echo '</div>';
    }
  
    echo '</div>';
  }

// Cerrar la conexión a la base de datos
$conn->close();
?>
