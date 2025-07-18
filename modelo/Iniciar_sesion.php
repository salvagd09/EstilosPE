<?php
class Usuario {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function encontrarpornombredeUsuario($username) {
        $stmt = mysqli_prepare($this->conn, "SELECT password FROM usuarios WHERE username = ?");
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $password_db);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        return $password_db; // null si no existe usuario
    }
}
?>