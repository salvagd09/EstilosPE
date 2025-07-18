<?php
class AccederAdmin {
    private $conn;
    public function __construct($db) {
        $this->conn = $db;
    }
    public function validarUsuario($usuario,$contraseña) {
        $stmt = $this->conn->prepare("SELECT * FROM admin WHERE usuario = ? AND contraseña = ?");
        $stmt->bind_param("ss", $usuario, $contraseña);
        $stmt->execute();
        $result = $stmt->get_result();
        $valid = $result->num_rows > 0;
        $stmt->close();
        return $valid;
    }
}
?>