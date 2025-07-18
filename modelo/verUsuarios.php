<?php
    class ObservarU{
        private $conn;
        public function __construct($db) {
            $this->conn = $db;
        }
        public function observarUsuarios(){
          $sql = "SELECT id, correo, username FROM usuarios";
        $resultado = $this->conn->query($sql);
        if (!$resultado) {
            throw new Exception("Error en la consulta SQL: " . $this->conn->error);
        }
        return $resultado->fetch_all(MYSQLI_ASSOC);
        }
    }
?>