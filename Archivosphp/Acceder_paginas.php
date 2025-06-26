<?php
   $host = "localhost";
    $user = "root";
    $pass = ""; 
    $db = "mi_base";
    $conn = new mysqli($host, $user, $pass, $db);
    $conn->set_charset("utf8mb4");
    if(!empty($_POST["btnIngresar"])){
        if(empty($_POST["usuario"]) || empty($_POST["contraseña"])){
            echo '<div class="alerta">LOS CAMPOS ESTÁN VACÍOS</div>';
        }else{
          $usuario=$_POST["usuario"];
          $contraseña=$_POST["contraseña"];
          $sql=$conn->query("select * from admin where usuario=$usuario and contraseña=$contraseña");
          if($datos=$sql->fetch_object()){
            header("Location: Admin.php");
          }else{
            echo'<div class="alerta">ACCESO DENEGADO</div>';
          }
        }
    }
?>
