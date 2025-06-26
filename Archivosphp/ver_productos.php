<?php
include("conexion.php");

$sql = "SELECT id, nombre, descripcion, categoria, precio, stock FROM inventario";
$resultado = $conn->query($sql);

if (!$resultado) {
    die("Error en la consulta SQL: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Productos en Inventario</title>
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
    <h1>Inventario de Productos</h1>
    <table class="tabla-admin">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Descripción</th>
          <th>Categoría</th>
          <th>Precio</th>
          <th>Stock</th>
        </tr>
      </thead>
      <tbody>
        <?php while($fila = $resultado->fetch_assoc()): ?>
          <tr>
            <td><?= $fila['id'] ?></td>
            <td><?= $fila['nombre'] ?></td>
            <td><?= $fila['descripcion'] ?></td>
            <td><?= $fila['categoria'] ?></td>
            <td>S/ <?= number_format($fila['precio'], 2) ?></td>
            <td><?= $fila['stock'] ?></td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
    <a href="admin.php" class="btn-volver">← Volver al panel</a>
  </main>
</body>
</html>