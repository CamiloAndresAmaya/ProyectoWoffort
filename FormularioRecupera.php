<?php

   include 'php/conexion_be.php';
   session_start();

?>
<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Restablece tu contraseña</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
   <link rel="stylesheet" href="assets/css/EstiloFormularios.css">
</head>

<body>

   <header class="header">
      <section class="flex" id="Persona" >

         <a href ="index.php" class="logo">WOFFORT</a>
         <p class="logo"> Restablece tu contraseña</p>

      <div class="icons">
            <div id="toggle-btn" class="fas fa-sun"></div>
            <div id="search-btn" class="fas fa-search"></div>
            <div style="color: #d89503" class="fas fa-home" ></div>
      </div>
      </div>  
      </section>
   </header>

   <section class="form-containerPersona">
      <form  action="php/validartoken.php" method="POST" enctype="multipart/form-data">
            <img src="assets/images/IMG-20230503-WA0005.jpg" class="image" alt="imagen logo" style="display: block; margin: 0 auto;">
            <p>Ingresa el token<span>*</span></p>
            <input class="box" type="text" name="token" placeholder="Ingresa el token de verificacion">
            <p>Ingresa tu nueva contraseña<span>*</span></p>
            <input class="box" type="password" name="contrasena" placeholder="Password" maxlength="15">
            <p>Nuevamente ingresa la contraseña<span>*</span></p>
            <input class="box" type="password" name="contrasena" placeholder="Password" maxlength="15">
            <input class="box" type="submit" value="Cambiar clave" name="submit" class="btn" style="background-color: #d89503">
      </form>

   </section>

   <footer class="footerPersona">

      &copy; copyright @ 2023 by <span style="color: #d89503">Equipo De Trabajo WOFFORT</span> | all rights reserved!

   </footer>

   <!-- custom js file link  -->
   <script src="assets/js/scriptHome.js"></script>


</body>


</html>