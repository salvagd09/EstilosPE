<?php
require_once("../modelo/verMensajes.php");

class ContactoController {
    private $model;
    
    public function __construct($conn) {
        $this->model = new Observar($conn);
    }
    
    public function listarMensajes() {
        header('Content-Type: application/json');
        try {
            $mensajes = $this->model->observarMensajes();
            echo json_encode([
                'success' => true,
                'data' => $mensajes
            ]);
        } catch (Exception $e) {
            throw new Exception("Error al listar mensajes: " . $e->getMessage());
        }
    }
}
?>