<?php
require_once '../modelo/Iniciar_sesion.php';

class AuthController {
    private $userModel;

    public function __construct($db) {
        $this->userModel = new Usuario($db);
    }

    public function login($username, $password) {
        if (empty($username) || empty($password)) {
            return ['success' => false, 'message' => 'Por favor, completa ambos campos.'];
        }

        $password_db = $this->userModel->encontrarpornombredeUsuario($username);

        if ($password_db) {
            if (password_verify($password, $password_db)) {
                // Aquí puedes iniciar sesión, por ejemplo:
                session_start();
                $_SESSION['username'] = $username;

                return ['success' => true, 'message' => 'Inicio de sesión exitoso.'];
            } else {
                return ['success' => false, 'message' => 'Contraseña incorrecta.'];
            }
        } else {
            return ['success' => false, 'message' => 'Usuario no encontrado.'];
        }
    }
}
?>