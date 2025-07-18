<?php
header('Content-Type: application/json');

try {
    include("../config/conexion.php");
    require_once("../modelo/verMensajes.php");
    require_once("../controlador/verMensajsC.php");
    
    // Configura para mostrar errores PHP (solo en desarrollo)
    ini_set('display_errors', 0);
    error_reporting(0); // En producción
    
    $controller = new ContactoController($conn);
    $accion = $_GET['accion'] ?? '';
    
    switch($accion) {
        case 'listar':
            $controller->listarMensajes();
            break;
        default:
            throw new Exception('Acción no válida');
    }  
    } catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ]);
}
?>