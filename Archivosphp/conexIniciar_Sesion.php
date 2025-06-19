<?php
$host = 'localhost';
$usuario = 'root';
$clave = '';
$base_datos = 'ejemplo';

$enlace = mysqli_connect($host, $usuario, $clave, $base_datos);

if (!$enlace) {
    die("Error de conexión: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($username) || empty($password)) {
        die("Por favor, completa ambos campos.");
    }

    // Buscar usuario
    $stmt = mysqli_prepare($enlace, "SELECT password FROM usuarios WHERE username = ?");
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $password_db);
    mysqli_stmt_fetch($stmt);

    if ($password_db) {
        if ($password === $password_db) { // Para pruebas, sin hash
            echo "Inicio de sesión exitoso.";
            // Aquí puedes redirigir o iniciar sesión
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "Usuario no encontrado.";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($enlace);
}
?>
