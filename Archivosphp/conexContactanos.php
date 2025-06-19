<?php
$host = 'localhost';
$usuario = 'root';
$clave = '';
$base_datos = 'ejemplo';

$enlace = mysqli_connect($host, $usuario, $clave, $base_datos);

if (!$enlace) {
    die("Error de conexión: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] === "POST")  {
    // Recoger datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $mensaje = $_POST['mensaje'];

    // Preparar sentencia para prevenir inyección SQL
    $stmt = mysqli_prepare($enlace, "INSERT INTO datos (nombre, apellido, correo, telefono, mensaje) VALUES (?, ?, ?, ?, ?)");

    // Verificar que se preparó correctamente
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssss", $nombre, $apellido, $correo, $telefono, $mensaje);
        mysqli_stmt_execute($stmt);
        
        if (mysqli_stmt_affected_rows($stmt) > 0) {
            echo "Datos enviados correctamente.";
        } else {
            echo "No se pudieron insertar los datos.";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error en la preparación de la consulta: " . mysqli_error($enlace);
    }

    mysqli_close($enlace);
}
?>
