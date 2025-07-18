<?php
    class ObservarP{
        private $conn;
        public function __construct($db) {
            $this->conn = $db;
        }
        public function observarProductos(){
          $sql = "SELECT id, nombre, descripcion, categoria, precio, stock FROM inventario";
            $resultado = $this->conn->query($sql);
        if (!$resultado) {
            throw new Exception("Error en la consulta SQL: " . $this->conn->error);
        }
        return $resultado->fetch_all(MYSQLI_ASSOC);
        }
    }
?>