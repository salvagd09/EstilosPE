<?php
class RealizarContacto {
    private $conn;
    public function __construct($db) {
        $this->conn = $db;
    }
    public function contactar($nombre,$apellido,$correo,$telefono,$mensaje){
        $stmt=mysqli_prepare($this->conn,"INSERT INTO contactos(nombre, apellido, correo, telefono, mensaje) VALUES (?, ?, ?, ?, ?)");
        if (!$stmt) {
            return ["error" => "Error en la preparación de la consulta: " . mysqli_error($this->conn)];
        }
        mysqli_stmt_bind_param($stmt, "sssss", 
            $nombre,$apellido,$correo,$telefono,$mensaje);
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            return ["success" => true];
        } else {
            $error = mysqli_stmt_error($stmt);
            mysqli_stmt_close($stmt);
            return ["error" => $error];
        }
    }
}
?>