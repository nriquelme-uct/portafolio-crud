<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET, POST, PATCH, DELETE");

$host = "teclab.uct.cl";
$db = "nicolas_riquelme_db1";
$user = "nicolas_riquelme";
$pass = "nicolas_riquelme2025";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die(json_encode(["error" => "Conexión fallida"]));
}
?>