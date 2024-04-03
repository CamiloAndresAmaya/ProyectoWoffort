<?php
   session_start();
   include 'php/conexion_be.php';
   $usuarioDatos = $_SESSION['usuario'];
   $validarDatos = mysqli_query($conexion,"SELECT * FROM empresa WHERE UsuarioEmpresa='$usuarioDatos'");

   if ($validarDatos->num_rows>0){
      header("location: Home.php");
   }


?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Empresa</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="assets/css/EstiloFormularios.css">

</head>

<body>

   <header class="header">
      <section class="flex" id="Persona" >

         <a class="logo">WOFFORT</a>

      <div class="icons">
            <div id="toggle-btn" class="fas fa-sun"></div>
            <div id="search-btn" class="fas fa-search"></div>
            <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="profile">
         <img src="assets/images/pic-1.jpg" class="image" alt="">
         <h3 class="name" value =""></h3>
         <p class="role">Postulante</p>
         <a href="profile.php" class="btn">Ver Perfil</a>
         <div class="flex-btn">
            <a href="php/cerrar_session.php" class="option-btn">Cerrar Sesion</a>
         </div>
      </div>  
      </section>
   </header>

   <section class="form-containerPersona">
      <form  action="php/RegistrarDatosEmpresa.php" method="POST" enctype="multipart/form-data">
            <h3>Datos De La Empresa</h3>
            <p>Logo De La Empresa<span>*</span></p>
            <input class="box" type="file" name="logoEmpresa" placeholder="Adjunte El Logo De Su Empresa">
            <p>Nombre Empresa<span>*</span></p>
            <input class="box" type="text" name="nombreEmpresa" placeholder="Digite el nombre de su Empresa" maxlength="23">
            <p>NIT<span>*</span></p>
            <input class="box" type="text" name="Nit" placeholder="Digite el NIT" maxlength="23">
            <p>Razon Social<span>*</span></p>
            <input class="box" type="text" name="razonSocial" placeholder="Digite La Razon Social" maxlength="30">
            <p>Direccion<span>*</span></p>
            <input class="box" type="text" name="direccionEmpresa" placeholder="Digite La Direccion De La Empresa" maxlength="15">
            <input class="box" type="submit" value="Cargar Datos" name="submit" class="btn" style="background-color: #d89503">
      </form>

   </section>

   <footer class="footerPersona">

      &copy; copyright @ 2023 by <span style="color: #d89503">Equipo De Trabajo WOFFORT</span> | all rights reserved!

   </footer>

   <!-- custom js file link  -->
   <script src="assets/js/scriptHome.js"></script>


</body>


</html>