<?php
include("conexion.php");

// Consulta corregida
$sql = "SELECT id, correo, username FROM usuarios";
$resultado = $conn->query($sql);

if (!$resultado) {
    die("Error en la consulta SQL: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Usuarios Registrados</title>
  <style>
    .tabla-admin {
      width: 90%;
      margin: auto;
      border-collapse: collapse;
      margin-top: 20px;
    }
    .tabla-admin th, .tabla-admin td {
      padding: 10px;
      border: 1px solid #ccc;
      text-align: center;
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
    <h1>Usuarios Registrados</h1>
    <table class="tabla-admin">
      <thead>
        <tr>
          <th>ID</th>
          <th>Correo</th>
          <th>Usuario</th>
        </tr>
      </thead>
      <tbody>
        <?php while($fila = $resultado->fetch_assoc()): ?>
          <tr>
            <td><?= $fila['id'] ?></td>
            <td><?= $fila['correo'] ?></td>
            <td><?= $fila['username'] ?></td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>

    <a href="admin.php" class="btn-volver">← Volver al panel</a>
  </main>
</body>
</html>
