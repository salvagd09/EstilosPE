<?php
require_once '../modelo/realizarContacto.php';
class Contactar {
    private $model;
    public function __construct($db) {
        $this->model = new RealizarContacto($db);
    }
    public function contactar($postData) {
         if (empty($postData['nombre']) || empty($postData['apellido'])) {
            return ["error" => "Username y password son obligatorios"];
        }
        return $this->model->contactar(
            $postData['nombre'],
            $postData['apellido'] ?? null,
            $postData['correo'] ?? null,
            $postData['telefono'] ?? null,
            $postData['mensaje'] ?? null
        );
    }
}
?>