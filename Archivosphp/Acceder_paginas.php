<?php
$host = "localhost";
$user = "root";
$pass = ""; 
$db = "mi_base";
$conn = new mysqli($host, $user, $pass, $db);
$conn->set_charset("utf8mb4");
$usuario = $_POST["usuario"];
 $contraseña = $_POST["contraseña"];
$stmt = $conn->prepare("SELECT * FROM admin WHERE usuario = ? AND contraseña = ?");
$stmt->bind_param("ss", $usuario, $contraseña);
$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows > 0){
    header('Location: ../ArchivosHtml/Admin.html');
    exit; // Importante terminar el script después de redireccionar
} 
else {
    echo '<div class="alerta">ACCESO DENEGADO</div>';
}
$stmt->close();
?>
