<?php
include 'auth.php';
include 'db.php';
$result = $conn->query("SELECT * FROM proyectos ORDER BY created_at DESC");
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
        <a href="logout.php">
          <button type="button" class="btn btn-outline-light me-2">Cerrar sesión</button>
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
        <?php while($row = $result->fetch_assoc()): ?>
          <div class="border border-2 rounded p-3 mx-2 d-flex flex-column text-wrap col-2 shadow-lg">
            <h3><?= $row['titulo'] ?></h3>
            <p><?= $row['descripcion'] ?></p>
            <img src="uploads/<?= $row['imagen'] ?>" width="150"><br>
            <div class="mt-auto mx-auto">
              <a href="<?= $row['url_github'] ?>" class="px-2 text-secondary">GitHub</a> |
              <a href="<?= $row['url_produccion'] ?>" class="px-2 text-secondary">Enlace</a><br>
              <a href="edit.php?id=<?= $row['id'] ?>" class="px-2 text-secondary">Editar</a> |
              <a href="delete.php?id=<?= $row['id'] ?>" class="px-2 text-secondary" onclick="return confirm('¿Seguro?')">Eliminar</a>
            </div>
            
          </div>
          
        <?php endwhile; ?>
      </div>
      <hr>
    <a href="add.php">
      <button type="button" class="btn btn-dark me-2">Agregar Proyecto</button>
    </a> 
    </div>
  
    </section>
  </div>
    
  <footer class="footer mt-auto py-3 bg-dark text-white text-center">
    <div class="container">
      <span>placeholder</span>
    </div>
  </footer>
</body>
</html>

