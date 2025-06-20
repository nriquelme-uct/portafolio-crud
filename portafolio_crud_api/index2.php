<?php

// Utilización de metodo cURL, acceder a la api a través de URL en vez de acceder directamente al archivo php.
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://teclab.uct.cl/~nicolas.riquelme/portafolio_crud_api/api/proyectos.php');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$json = curl_exec($ch);
curl_close($ch);

// $json = file_get_contents('../api/proyectos.php'); Depreciada en favor de método cURL.
$proyectos = json_decode($json, true);

// Mensajes utilizados para debug.
if ($json === false) {
  die("Error al obtener datos de la API.");
}

if (json_last_error() !== JSON_ERROR_NONE) {
  die("Error al decodificar JSON: " . json_last_error_msg());
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portafolio CRUD</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<body class="d-flex flex-column vh-100">


<header class="p-3 bg-dark text-white">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <h2 class="me-3">Panel admin portafolio</h2>

      <div class="ms-auto text-end">
        <a href="users/logout.php">
          <button type="button" class="btn btn-outline-light me-2">Cerrar sesión</button>
        </a>
      </div>
    </div>
  </div>
</header>

<div class="container mt-5">
  <section id="proyectos">
    <div class="mb-5">
      <h2>Proyectos</h2>
      <hr>
      <div class="container my-3 mx-4 d-flex flex-row flex-wrap">
        <!-- Dar formato HTML/CSS a cada proyecto y mostrarlo en el contenedor div. -->
        <!-- Check añadido para verificar que el formato sea correcto, ver que haya uno o más proyectos para desplegar -->
        <?php if (is_array($proyectos) && count($proyectos) > 0): ?>
        <?php foreach($proyectos as $p): ?>
        <div class="border border-2 rounded p-3 mx-2 d-flex flex-column text-wrap col-2 shadow-lg">
          <h3><?=htmlspecialchars($p['titulo'])?></h3>
          <p><?=htmlspecialchars($p['descripcion'])?></p>
          <img src="uploads/<?=htmlspecialchars($p['imagen'])?>" width="150"><br>
          <div class="pt-2 mt-auto mx-auto">
            <a href="<?=htmlspecialchars($p['url_github'])?>" class="px-2 text-secondary" target="_blank">GitHub</a>
            <a href="<?=htmlspecialchars($p['url_produccion'])?>" class="px-2 text-secondary" target="_blank">Despliegue</a><br>
            <a href="crud/edit.php?id=<?=htmlspecialchars($p['id'])?>" class="px-2 text-secondary">Editar</a>
            <a href="crud/delete.php?id=<?=htmlspecialchars($p['id'])?>" class="px-2 text-secondary" onclick="return confirm('¿Seguro?')">Eliminar</a>
          </div>
        </div><hr>
        <?php endforeach; ?>
        <?php else: ?>
          <p>No hay proyectos para mostrar.</p>
        <?php endif; ?>
      </div>
      <hr>
    <a href="crud/add.php">
      <button type="button" class="btn btn-dark me-2">Agregar Proyecto</button>
    </a> 
    </div>
  
    </section>
  </div>
    
  <footer class="footer mt-auto py-3 bg-dark text-white text-center">
    <div class="container">
      <span>Footer.</span>
    </div>
  </footer>
</body>
</html>



