<?php
include 'auth.php';
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $titulo = $_POST['titulo'];
  $descripcion = $_POST['descripcion'];
  $url_github = $_POST['url_github'];
  $url_produccion = $_POST['url_produccion'];

  $imagen = $_FILES['imagen']['name'];
  $tmp = $_FILES['imagen']['tmp_name'];
  move_uploaded_file($tmp, "uploads/$imagen");

  $sql = "INSERT INTO proyectos (titulo, descripcion, url_github, url_produccion, imagen) 
          VALUES ('$titulo', '$descripcion', '$url_github', '$url_produccion', '$imagen')";

  $conn->query($sql);
  header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Añadir proyecto</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body class="bg-dark text-white d-flex flex-column vh-100">
  
<header class="p-3 bg-dark text-white">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <h2 class="me-auto">Portafolio CRUD</h2>


      <div class="text-end">
        <a href="logout.php">
          <button type="button" class="btn btn-outline-light me-2">Cerrar sesión</button>
        </a>
      </div>
    </div>
  </div>
</header>

<div class="container m-auto col-4">
  <h2>Añadir Proyecto</h2>
  <hr>
  <form method="post" enctype="multipart/form-data">
  <input type="text" class="form-control" name="titulo" placeholder="Título" required><br>
  <textarea name="descripcion" class="form-control" maxlength="200" placeholder="Descripción (máx 200 palabras)" required></textarea><br>
  <input type="url" class="form-control" name="url_github" placeholder="URL GitHub"><br>
  <input type="url" class="form-control" name="url_produccion" placeholder="URL Producción"><br>
  <input type="file" name="imagen" required><br>
  <button type="submit" class="btn btn-outline-light my-3">Guardar</button>
  </form>
</div>

</body>
</html>
