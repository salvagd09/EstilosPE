<?php
require_once("../modelo/verProductos.php");

class ProductoController {
    private $model;
    public function __construct($conn) {
        $this->model = new ObservarP($conn);
    }
    public function listarProductos() {
        header('Content-Type: application/json');
        try {
            $productos = $this->model->observarProductos();
            echo json_encode([
                'success' => true,
                'data' => $productos
            ]);
        } catch (Exception $e) {
            throw new Exception("Error al listar productos: " . $e->getMessage());
        }
    }
}
?>