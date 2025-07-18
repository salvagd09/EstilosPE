<?php
require_once '../modelo/registro.php';
class RegistroController {
    private $model;

    public function __construct($db) {
        $this->model = new Registro($db);
    }

    public function registrar($postData) {
        if (empty($postData['username']) || empty($postData['password'])) {
            return ["error" => "Username y password son obligatorios"];
        }

        // Hasheamos la contraseña aquí
        $passwordHash = password_hash($postData['password'], PASSWORD_DEFAULT);

        return $this->model->registrar(
            $postData['username'],
            $passwordHash,
            $postData['apellidoP'] ?? null,
            $postData['apellidoM'] ?? null,
            $postData['correo'] ?? null,
            $postData['tipoDocumento'] ?? null,
            $postData['numeroDocumento'] ?? null,
            $postData['nacimiento'] ?? null,
            $postData['celular'] ?? null,
            $postData['departamento'] ?? null,
            $postData['genero'] ?? null
        );
    }
}
?>