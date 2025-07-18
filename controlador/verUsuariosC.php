<?php
require_once("../modelo/verUsuarios.php");

class UsuarioController {
    private $model;
    public function __construct($conn) {
        $this->model = new ObservarU($conn);
    }
    public function listarUsuarios() {
        header('Content-Type: application/json');
        try {
            $usuarios = $this->model->observarUsuarios();
            echo json_encode([
                'success' => true,
                'data' => $usuarios
            ]);
        } catch (Exception $e) {
            throw new Exception("Error al listar usuarios: " . $e->getMessage());
        }
    }
}
?>