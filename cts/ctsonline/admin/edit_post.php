<?php
// Obtener el ID de la publicación desde la URL
$postId = $_GET['postId'];

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "servicios";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
}

// Obtener detalles de la publicación
$stmt = $conn->prepare("SELECT * FROM posts WHERE id = ?");
$stmt->bind_param("i", $postId);
$stmt->execute();
$result = $stmt->get_result();
$postDetails = $result->fetch_assoc();
$stmt->close();

// Cerrar la conexión a la base de datos
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Publicación</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <h1>Editar Publicación</h1>
    <form id="edit-post-form" enctype="multipart/form-data">
      <input type="hidden" name="postId" value="<?php echo $postId; ?>">
      <div class="form-group">
        <label for="title">Título:</label>
        <input type="text" class="form-control" id="title" name="title" value="<?php echo $postDetails['title']; ?>" required>
      </div>
      <div class="form-group">
        <label for="content">Contenido:</label>
        <textarea class="form-control" id="content" name="content" required><?php echo $postDetails['content']; ?></textarea>
      </div>
      <div class="form-group">
        <label for="image">Imagen:</label>
        <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
      </div>
      <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    document.getElementById('edit-post-form').addEventListener('submit', function (event) {
      event.preventDefault();

      const postId = document.querySelector('input[name="postId"]').value;
      const title = document.getElementById('title').value;
      const content = document.getElementById('content').value;
      const image = document.getElementById('image').files[0];

      const formData = new FormData();
      formData.append('postId', postId);
      formData.append('title', title);
      formData.append('content', content);
      formData.append('image', image);

      $.ajax({
        type: 'POST',
        url: 'update_post.php',
        data: formData,
        contentType: false,
        processData: false,
        success: function () {
          window.location.href = 'view_post.php?postId=' + postId;
        }
      });
    });
  </script>
</body>
</html>
