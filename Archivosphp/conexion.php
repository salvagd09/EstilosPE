<?php
$host = "localhost";
$user = "root";
$pass = ""; // vacío por defecto en XAMPP
$db = "mi_base";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
