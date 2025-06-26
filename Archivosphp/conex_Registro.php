<?php
$conexion = new mysqli("localhost", "root", "", "mi_base");
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // cifrado
$apellidoP = $_POST['apellidoP'] ?? null;
$apellidoM = $_POST['apellidoM'] ?? null;
$correo = $_POST['correo'] ?? null;
$tipoDocumento = $_POST['tipoDocumento'] ?? null;
$numeroDocumento = $_POST['numeroDocumento'] ?? null;
$nacimiento = $_POST['nacimiento'] ?? null;
$celular = $_POST['celular'] ?? null;
$departamento = $_POST['departamento'] ?? null;
$genero = $_POST['genero'] ?? null;

$sql = "INSERT INTO usuarios (username, password, apellidoP, apellidoM, correo, tipoDocumento, numeroDocumento, nacimiento, celular, departamento, genero) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conexion->prepare($sql);
$stmt->bind_param("sssssssssss", $username, $password, $apellidoP, $apellidoM, $correo, $tipoDocumento, $numeroDocumento, $nacimiento, $celular, $departamento, $genero);

if ($stmt->execute()) {
    echo "<script>alert('Registro exitoso'); window.history.back();</script>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conexion->close();
?>
