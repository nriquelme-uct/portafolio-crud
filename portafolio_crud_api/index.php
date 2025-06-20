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
      <h2 class="me-3">Portafolio CRUD</h2>

      <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="#section1" class="nav-link px-2 text-secondary">ABCD</a></li>
          <li><a href="#section2" class="nav-link px-2 text-secondary">ABCD</a></li>
          <li><a href="#section3" class="nav-link px-2 text-secondary">ABCD</a></li>
          <li><a href="#section4" class="nav-link px-2 text-secondary">ABCD</a></li>
          <li><a href="#proyectos" class="nav-link px-2 text-secondary">Proyectos</a></li>
        </ul>

      <div class="text-end">
        <a href="users/login.php">
          <button type="button" class="btn btn-outline-light me-2">Iniciar sesión</button>
        </a>
      </div>
    </div>
  </div>
</header>

<div class="container mt-5">

  <section id="section1">
    <div class="mb-5 mx-auto w-75">
      <h2>Titulo</h2>
      <hr>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin imperdiet vehicula leo id pellentesque. 
        Pellentesque at leo nulla. Etiam blandit ante est, sit amet tincidunt leo pellentesque quis. Etiam 
        imperdiet mi in magna tempor, at rhoncus nulla porta. Nulla convallis lobortis cursus. Donec maximus dui 
        eget est scelerisque, vel egestas quam accumsan. In efficitur lorem feugiat ipsum sodales facilisis. In 
        facilisis facilisis libero, ac malesuada dolor vestibulum nec. Curabitur nec augue vel odio volutpat placerat 
        in in metus. </p>
    </div>
  </section>

  <section id="section2">
    <div class="mb-5 mx-auto w-75">
      <h2>Titulo</h2>
      <hr>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin imperdiet vehicula leo id pellentesque. 
        Pellentesque at leo nulla. Etiam blandit ante est, sit amet tincidunt leo pellentesque quis. Etiam 
        imperdiet mi in magna tempor, at rhoncus nulla porta. Nulla convallis lobortis cursus. Donec maximus dui 
        eget est scelerisque, vel egestas quam accumsan. In efficitur lorem feugiat ipsum sodales facilisis. In 
        facilisis facilisis libero, ac malesuada dolor vestibulum nec. Curabitur nec augue vel odio volutpat placerat 
        in in metus. </p>
    </div>
  </section>

  <section id="section3">
    <div class="mb-5 mx-auto w-75">
      <h2>Titulo</h2>
      <hr>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin imperdiet vehicula leo id pellentesque. 
        Pellentesque at leo nulla. Etiam blandit ante est, sit amet tincidunt leo pellentesque quis. Etiam 
        imperdiet mi in magna tempor, at rhoncus nulla porta. Nulla convallis lobortis cursus. Donec maximus dui 
        eget est scelerisque, vel egestas quam accumsan. In efficitur lorem feugiat ipsum sodales facilisis. In 
        facilisis facilisis libero, ac malesuada dolor vestibulum nec. Curabitur nec augue vel odio volutpat placerat 
        in in metus. </p>
    </div>
  </section>

  <section id="section4">
    <div class="mb-5 mx-auto w-75">
      <h2>Titulo</h2>
      <hr>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin imperdiet vehicula leo id pellentesque. 
        Pellentesque at leo nulla. Etiam blandit ante est, sit amet tincidunt leo pellentesque quis. Etiam 
        imperdiet mi in magna tempor, at rhoncus nulla porta. Nulla convallis lobortis cursus. Donec maximus dui 
        eget est scelerisque, vel egestas quam accumsan. In efficitur lorem feugiat ipsum sodales facilisis. In 
        facilisis facilisis libero, ac malesuada dolor vestibulum nec. Curabitur nec augue vel odio volutpat placerat 
        in in metus. </p>
    </div>
  </section>

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
          </div>
        </div><hr>
        <?php endforeach; ?>
        <?php else: ?>
          <p>No hay proyectos para mostrar.</p>
        <?php endif; ?>
      </div>
      <hr>
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



