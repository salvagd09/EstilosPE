<?php
include("../config/conexion.php");
require_once("../controlador/iniciarSesionC.php");

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $auth = new AuthController();
    $result = $auth->login($username, $password);

    echo json_encode($result);
} else {
    echo json_encode(['success' => false, 'message' => 'Método no permitido']);
}
?>