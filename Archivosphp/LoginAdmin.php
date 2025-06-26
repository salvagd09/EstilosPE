<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login del administrador</title>
    <link href="../ArchivosCSS/EstiloLoginAdmin.css" rel="stylesheet" />
    <link
      href="https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,100..900;1,100..900&family=Kaushan+Script&family=Kay+Pho+Du:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <script
      src="https://kit.fontawesome.com/95f1b4897f.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <div class="imagen"></div>
    <div class="area_login">
      <div class="imagen2">
        <img
          src="../Imagenes/Avatar_PNG.png"
          alt="Avatar de una persona importante"
        />
      </div>
      <h1>EstilosPE</h1>
      <h2>Area de administracion</h2>
      ?>
      <form  method="post" action="Acceder_paginas.php">
        <?php include("Acceder_paginas.php")?>
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" />
        <label for="contraseña"> Contraseña: </label>
        <input type="password" id="contraseña" name="contraseña" />
        <button type="submit" name="btnIngresar">Ingresar</button>
      </form>
    </div>
  </body>
</html>