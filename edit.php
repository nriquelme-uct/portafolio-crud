<?php
include 'auth.php';
include 'db.php';

$id = $_GET['id'];
$proyecto = $conn->query("SELECT * FROM proyectos WHERE id=$id")->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $titulo = $_POST['titulo'];
  $descripcion = $_POST['descripcion'];
  $url_github = $_POST['url_github'];
  $url_produccion = $_POST['url_produccion'];

  if ($_FILES['imagen']['name']) {
    $imagen = $_FILES['imagen']['name'];
    move_uploaded_file($_FILES['imagen']['tmp_name'], "uploads/$imagen");
    $img_sql = ", imagen='$imagen'";
  } else {
    $img_sql = "";
  }

  $sql = "UPDATE proyectos SET titulo='$titulo', descripcion='$descripcion', url_github='$url_github', url_produccion='$url_produccion' $img_sql WHERE id=$id";
  $conn->query($sql);
  header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body class="bg-dark text-white d-flex flex-column vh-100">
  
<header class="p-3 bg-dark text-white">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <h2 class="me-auto">Portafolio CRUD</h2>
      </div>
    </div>
  </div>
</header>

<div class="container m-auto col-4">
  <h2>Editar Proyecto</h2>
  <hr>
  <form method="post" enctype="multipart/form-data">
    <input type="text" class="form-control" name="titulo" value="<?= $proyecto['titulo'] ?>" required><br>
    <textarea name="descripcion" class="form-control"><?= $proyecto['descripcion'] ?></textarea><br>
    <input type="url" class="form-control" name="url_github" value="<?= $proyecto['url_github'] ?>"><br>
    <input type="url" class="form-control" name="url_produccion" value="<?= $proyecto['url_produccion'] ?>"><br>
    <input type="file" class="form-control" name="imagen"><br>
    <button type="submit" class="btn btn-outline-light my-3">Actualizar</button>
  </form>
</div>

</body>
</html>
