<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'username' => $_POST['username'],
        'password' => $_POST['password']
    ];

    $ch = curl_init('https://teclab.uct.cl/~nicolas.riquelme/portafolio_crud_api/api/users.php/login');
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => json_encode($data),
        CURLOPT_HTTPHEADER => ['Content-Type: application/json']
    ]);

    $response = curl_exec($ch);
    $result = json_decode($response, true);
    curl_close($ch);

    if (!empty($result['success'])) {
        $_SESSION['user_id'] = $result['id'];
        $_SESSION['username'] = $result['username'];
        header("Location: ../index2.php");
        exit;
    } else {
        $error = $result['error'] ?? 'Login failed';
        
    }
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
    <hr>
  </div>
</header>

<div class="container m-auto col-4">
  <h2>Login</h2>
  <hr>
  <form method="post">
    <input type="text" class="form-control" name="username" placeholder="Usuario" required><br>
    <input type="password" class="form-control" name="password" placeholder="Contraseña" required><br>
    <button type="submit" class="btn btn-outline-light me-2">Iniciar Sesión</button>
  </form>
</div>

</body>
</html>
