<?php
include("../config/conexion.php");
require_once("../controlador/realizarContactoC.php");
header('Content-Type: application/json');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new Contactar();
    $resultado = $controller->contactar($_POST);
    if (isset($resultado['error'])) {
        http_response_code(400);
        echo json_encode(['success' => false, "message" => $resultado['error']]);
    } else {
        echo json_encode(['success' => true, "message" => "Mensaje enviado correctamente"]);
    }
} else {
    http_response_code(405);
    echo json_encode(["status" => "error", "message" => "Método no permitido"]);
}
?>