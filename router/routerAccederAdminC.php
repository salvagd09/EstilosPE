<?php
include("../config/conexion.php");
require_once ("../controlador/AccederAdminC.php");
session_start();

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuario = $_POST['usuario'] ?? '';
    $contraseña = $_POST['contraseña'] ?? '';

    $controller = new AdminController();
    $loginExitoso = $controller->login($usuario, $contraseña);
    if ($loginExitoso) {
        $_SESSION['usuario'] = $usuario;
        echo json_encode(['success' => true, 'message' => 'Login correcto']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Usuario o contraseña incorrectos']);
    }
    exit; 
}
echo json_encode(['success' => false, 'message' => 'Método no permitido']);
exit;
