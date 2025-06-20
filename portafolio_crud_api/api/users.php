<?php
include 'config.php';

$method = $_SERVER['REQUEST_METHOD'];
$path = isset($_SERVER['PATH_INFO']) ? explode('/', trim($_SERVER['PATH_INFO'], '/')) : [];

$resource = $path[0] ?? null;
$id = isset($path[1]) ? intval($path[1]) : null;

function getInput() {
    return json_decode(file_get_contents("php://input"), true);
}

switch ($method) {
    case 'POST':
        if ($resource === 'login') {
            $d = getInput();
            $username = $d['username'] ?? '';
            $password = $d['password'] ?? '';

            $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $res = $stmt->get_result();
            $user = $res->fetch_assoc();

            if ($user && md5($password) === $user['password']) {
                echo json_encode([
                    "success" => true,
                    "id" => $user['id'],
                    "username" => $username
                ]);
            } else {
                http_response_code(401);
                echo json_encode(["error" => "Credenciales incorrectas"]);
            }
            break;
        }

        http_response_code(400);
        echo json_encode(["error" => "Ruta de POST inválida"]);
        break;

    default:
        http_response_code(405);
        echo json_encode(["error" => "Método no permitido"]);
        break;
}
?>
