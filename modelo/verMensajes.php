<?php
    class Observar{
        private $conn;
        public function __construct($db) {
            $this->conn = $db;
        }
        public function observarMensajes(){
          $sql = "SELECT nombre,correo,Mensaje FROM contactos ORDER BY id DESC";
            $resultado = $this->conn->query($sql);
        if (!$resultado) {
            throw new Exception("Error en la consulta SQL: " . $this->conn->error);
        }
        
        return $resultado->fetch_all(MYSQLI_ASSOC);
        }
    }
?>