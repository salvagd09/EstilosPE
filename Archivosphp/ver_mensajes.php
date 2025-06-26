<?php
include("conexion.php");

$sql = "SELECT nombre, correo, mensaje FROM contactos ORDER BY fecha DESC";
$resultado = $conn->query($sql);

if (!$resultado) {
    die("Error en la consulta SQL: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Mensajes de Contacto</title>
  <link rel="stylesheet" href="estilo_Admin.css">
  <style>
    .tabla-admin {
      width: 95%;
      margin: auto;
      border-collapse: collapse;
      margin-top: 20px;
    }
    .tabla-admin th, .tabla-admin td {
      padding: 10px;
      border: 1px solid #ccc;
      text-align: left;
      vertical-align: top;
    }
    .tabla-admin th {
      background-color: #f4f4f4;
    }
    .btn-volver {
      display: inline-block;
      margin: 20px;
      text-decoration: none;
      background-color: #444;
      color: white;
      padding: 10px 20px;
      border-radius: 8px;
    }
  </style>
</head>
<body>
  <main class="admin-panel">
    <h1>Mensajes de Contacto</h1>
    <table class="tabla-admin">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Correo</th>
          <th>Mensaje</th>
        </tr>
      </thead>
      <tbody>
        <?php while($fila = $resultado->fetch_assoc()): ?>
          <tr>
            <td><?= htmlspecialchars($fila['nombre']) ?></td>
            <td><?= htmlspecialchars($fila['correo']) ?></td>
            <td><?= nl2br(htmlspecialchars($fila['mensaje'])) ?></td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
    <a href="admin.php" class="btn-volver">← Volver al panel</a>
  </main>
</body>
</html>
