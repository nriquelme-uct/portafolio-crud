<?php
$id = intval($_GET['id']);

if (!isset($_GET['id'])) {
  die("Error: No se especificó el ID del proyecto.");
}

// Cambio de ruta por url, para evitar abrir el archivo tal cual
// $json=file_get_contents("http://localhost/portafolio-crud/portafolio_crud_api/api/proyectos.php/$id");
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://localhost/portafolio-crud/portafolio_crud_api/api/proyectos.php/$id");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$json = curl_exec($ch);
curl_close($ch);

$p=json_decode($json,true);

if ($_SERVER['REQUEST_METHOD']=='POST') {
  $data = [
    'titulo'=>$_POST['titulo'],
    'descripcion'=>$_POST['descripcion'],
    'url_github'=>$_POST['url_github'],
    'url_produccion'=>$_POST['url_produccion']
  ];
  if (!empty($_FILES['imagen']['name'])) {
    $img=$_FILES['imagen']['name'];
    move_uploaded_file($_FILES['imagen']['tmp_name'],"uploads/$img");
    $data['imagen']=$img;
  }
  $ch=curl_init("https://teclab.uct.cl/~nicolas.riquelme/portafolio_crud_api/api/proyectos.php/$id");
  curl_setopt_array($ch,[
    CURLOPT_CUSTOMREQUEST=>'PATCH',
    CURLOPT_HTTPHEADER=>['Content-Type: application/json'],
    CURLOPT_RETURNTRANSFER=>true,
    CURLOPT_POSTFIELDS=>json_encode($data)
  ]);
  curl_exec($ch); curl_close($ch);
  header("Location: ../index.php"); exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar proyecto</title>
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
    <input type="text" class="form-control" name="titulo" value="<?=htmlspecialchars($p['titulo'])?>" required><br>
    <textarea name="descripcion" class="form-control"><?=htmlspecialchars($p['descripcion'])?></textarea><br>
    <input type="url" class="form-control" name="url_github" value="<?=htmlspecialchars($p['url_github'])?>"><br>
    <input type="url" class="form-control" name="url_produccion" value="<?=htmlspecialchars($p['url_produccion'])?>"><br>
    <input type="file" class="form-control" name="imagen"><br>
    <button type="submit" class="btn btn-outline-light my-3">Actualizar</button>
  </form>
</div>

</body>
</html>
