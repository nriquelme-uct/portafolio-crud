<?php
$host = "teclab.uct.cl";
$db = "nicolas_riquelme_db1";
$user = "nicolas_riquelme";
$pass = "nicolas_riquelme2025";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die("Error de conexión: " . $conn->connect_error);
}
?>