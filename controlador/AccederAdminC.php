<?php
require_once '../modelo/AccederAdmin.php';
class AdminController {
    private $model;
    public function __construct($conn) {
        $this->model = new AccederAdmin($conn);
    }
    public function login($usuario, $contraseña) {
        return $this->model->validarUsuario($usuario, $contraseña);
    }
}
