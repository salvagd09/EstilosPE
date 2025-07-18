<?php
include("../config/conexion.php");
require_once("../controlador/RegistroC.php");
header('Content-Type: application/json');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new RegistroController($conn);
    $resultado = $controller->registrar($_POST);

    if (isset($resultado['error'])) {
        http_response_code(400);
        echo json_encode(["status" => "error", "message" => $resultado['error']]);
    } else {
        echo json_encode(["status" => "success", "message" => "Registro exitoso"]);
    }
} else {
    http_response_code(405);
    echo json_encode(["status" => "error", "message" => "Método no permitido"]);
}
?>