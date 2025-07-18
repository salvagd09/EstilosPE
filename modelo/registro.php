<?php
class Registro {
    private $conn;
    public function __construct($db) {
        $this->conn = $db;
    }
    public function registrar($username,$password,$apellidoP,$apellidoM,$correo,$tipoDocumento,$numeroDocumento,$nacimiento,$celular,$departamento,$genero){
        $stmt=mysqli_prepare($this->conn,"INSERT INTO usuarios (username, password, apellidoP, apellidoM, correo, tipoDocumento, numeroDocumento, nacimiento, celular, departamento, genero) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        if (!$stmt) {
            return ["error" => "Error en la preparación de la consulta: " . mysqli_error($this->conn)];
        }
        mysqli_stmt_bind_param($stmt, "sssssssssss", 
            $username, $password, $apellidoP, $apellidoM, $correo, $tipoDocumento, $numeroDocumento, $nacimiento, $celular, $departamento, $genero);
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