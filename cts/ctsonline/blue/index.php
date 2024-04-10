<!-- index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Publicaciones con Imágenes</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="../CSS/blog.css">
</head>
<body>
  <div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h1>Mis Publicaciones</h1><br>
    </div>
    
    <div id="posts-container"></div>
  </div>

  <!-- Modal para el formulario -->
  <div class="modal fade" id="postModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nueva Publicación</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Formulario -->
          <form id="post-form" enctype="multipart/form-data">
            <div class="form-group">
              <label for="title">Título:</label>
              <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
              <label for="content">Contenido:</label>
              <textarea class="form-control" id="content" name="content" required></textarea>
            </div>
            <div class="form-group">
              <label for="image">Imagen:</label>
              <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary">Publicar</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    document.getElementById('post-form').addEventListener('submit', function (event) {
      event.preventDefault();

      // Obtener datos del formulario
      const title = document.getElementById('title').value;
      const content = document.getElementById('content').value;
      const image = document.getElementById('image').files[0];

      // Crear un objeto FormData para manejar archivos
      const formData = new FormData();
      formData.append('title', title);
      formData.append('content', content);
      formData.append('image', image);

      $.ajax({
        type: 'POST',
        url: 'post_handler.php',
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {
          fetchPosts();
          // Cierra el modal después de enviar el formulario
          $('#postModal').modal('hide');
        }
      });
    });

    function fetchPosts() {
  $.ajax({
    type: 'GET',
    url: 'get_posts.php',
    success: function (data) {
      $('#posts-container').html(data);

      // Agregar enlace a la vista de publicación individual
      $('.view-post-link').on('click', function () {
        const postId = $(this).data('post-id');
        window.location.href = 'view_post.php?postId=' + postId;
      });

      // Agregar eventos de Editar y Eliminar
      $('.btn-edit').on('click', function () {
        const postId = $(this).data('post-id');
        window.location.href = 'edit_post.php?postId=' + postId;
      });

      $('.btn-delete').on('click', function () {
        const postId = $(this).data('post-id');
        deletePost(postId);
      });
    }
  });
}


    $(document).ready(function () {
      fetchPosts();
    });
    function deletePost(postId) {
  $.ajax({
    type: 'POST',
    url: 'delete_post.php',
    data: { postId: postId },
    success: function () {
      fetchPosts(); // Recargar publicaciones después de eliminar
    }
  });
}
  </script>
</body>
</html>