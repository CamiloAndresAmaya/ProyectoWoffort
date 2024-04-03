<?php
   
   session_start();
   include 'php/conexion_be.php';
   $usuario = $_SESSION['usuario'];

   if (isset($usuario)){
         $cliente = $usuario;
   }else{
      echo'
      <script>
          alert("No se encontró ninguna sesión abierta, Por favor inicia sesión")
          window.location="index.php";
      </script>
      ';

   }
   $sql = "SELECT nombre, apellido, telefono, direccion, tipoDoc, numeroDoc FROM userdb WHERE UsuarioUser ='".$usuario."'";
      $resultado =$conexion->query($sql);
  
   $sqlEmpresa = "SELECT Nombre_Empresa FROM empresa WHERE UsuarioEmpresa ='".$usuario."'";
      $resultadoEmpresa =$conexion->query($sqlEmpresa);

   $consultarUsuario = mysqli_query($conexion,"SELECT * FROM userdb WHERE UsuarioUser='$usuario'");
   $consultarEmpresa = mysqli_query($conexion,"SELECT * FROM empresa WHERE UsuarioEmpresa='$usuario'");
   


   if($consultarUsuario->num_rows>0){
      while($data=$resultado->fetch_assoc()){
      $nombre = $data['nombre'];
      $apellido = $data['apellido'];
      $telefono = $data['telefono'];
      $direccion = $data['direccion'];
      $tipoDoc = $data['tipoDoc'];
      $numeroDoc = $data['numeroDoc'];
      $extension = "png";
      $rutaImagen = "assets/images/{$usuario}.{$extension}";


      }  
   }else if($consultarEmpresa->num_rows>0){
      while($dataEmpresa=$resultadoEmpresa->fetch_assoc()){
         $nombre = $dataEmpresa['Nombre_Empresa'];
         $extension = "png";
         $rutaImagen = "assets/images/{$usuario}.{$extension}";
      }
   }
?>



<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Perfil</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="assets/css/EstiloCasa.css">

</head>
<body>

<header class="header">
   
   <section class="flex">

      <a href="home.php" class="logo">WOFFORT</a>

      <form action="search.php" method="post" class="search-form">
         <input type="text" name="search" required placeholder="search" maxlength="100">
         <button type="submit" class="fas fa-search"></button>
      </form>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="search-btn" class="fas fa-search"></div>
         <div id="user-btn" class="fas fa-user"></div>
         <div id="toggle-btn" class="fas fa-sun"></div>
      </div>

      <div class="profile">

         <?php 

         if($consultarUsuario->num_rows>0){?>
            <img src="<?php echo $rutaImagen?>" class="image" alt="">;<?php

         }else if($consultarEmpresa->num_rows>0){?>
            <img src="<?php echo $rutaImagen?>" class="image" alt="">;<?php
         }

         ?>
         <h3 class="name"><?php 

         if($consultarUsuario->num_rows>0){
            echo $nombre." ".$apellido;
      
         }else if($consultarEmpresa->num_rows>0){
            echo $nombre;
         }
         
         ?></h3>
         <p class="role"><?php 

         if($consultarUsuario->num_rows>0){
            echo "Postulante";

         }else if($consultarEmpresa->num_rows>0){
            echo "Ofertador";
         }

         ?></p>
         <a href="profile.php" class="btn">Ver Perfil</a>
         <div class="flex-btn">
            <a href="php/cerrar_session.php" class="option-btn">Cerrar Sesion</a>
         </div>
      </div>

   </section>

</header>   

<div class="side-bar">

   <div id="close-btn">
      <i class="fas fa-times"></i>
   </div>

   <div class="profile">
      <?php 

      if($consultarUsuario->num_rows>0){?>
         <img src="<?php echo $rutaImagen?>" class="image" alt="">;<?php

      }else if($consultarEmpresa->num_rows>0){?>
         <img src="<?php echo $rutaImagen?>" class="image" alt="">;<?php
      }

      ?>
      <h3 class="name"><?php 
      if($consultarUsuario->num_rows>0){
         echo $nombre." ".$apellido;

      }else if($consultarEmpresa->num_rows>0){
         echo $nombre;
      }

      ?></h3>
      <p class="role"><?php 

      if($consultarUsuario->num_rows>0){
         echo "Postulante";

      }else if($consultarEmpresa->num_rows>0){
         echo "Ofertador";
      }

      ?></p>
      <a href="profile.php" class="btn" style="background-color: #d89503">Ver Perfil</a>
   </div>

   <nav class="navbar">
      <a href="Home.php"><i class="fas fa-home" style="color: #d89503"></i><span>Inicio</span></a>
      <a href="Acerca.php"><i class="fas fa-question" style="color: #d89503"></i><span>Acerca De</span></a>
      <a href="Ofertas.php"><i class="fas fa-briefcase" style="color: #d89503"></i><span>Ofertas</span></a>
      <?php 

      if($consultarUsuario->num_rows>0){
         $nothing = $nombre;

      }else if($consultarEmpresa->num_rows>0){?>
         <a href="Personal.php"><i class="fas fa-chalkboard-user" style="color: #d89503"></i><span>Personal</span></a>
         <?php
      }
      ?>
      <a href="Contacto.php"><i class="fas fa-headset" style="color: #d89503"></i><span>Contactanos</span></a>
   </nav>

</div>

<section class="user-profile">

   <h1 class="heading">Su Perfil</h1>

   <div class="info">

      <div class="user">
         <?php 

         if($consultarUsuario->num_rows>0){?>
            <img src="<?php echo $rutaImagen?>" class="image" alt="">;<?php

         }else if($consultarEmpresa->num_rows>0){?>
            <img src="<?php echo $rutaImagen?>" class="image" alt="">;<?php
         }

         ?>
         <h3><?php 

         if($consultarUsuario->num_rows>0){
            echo $nombre." ".$apellido;

         }else if($consultarEmpresa->num_rows>0){
            echo $nombre;
         }

         ?></h3>
         <p><?php 

         if($consultarUsuario->num_rows>0){
            echo "Postulante";

         }else if($consultarEmpresa->num_rows>0){
            echo "Ofertador";
         }

         ?></p>
         <?php 

         if($consultarUsuario->num_rows>0){?>
            <a href="actualizarPersona.php" class="inline-btn" style="background-color: #d89503">Actualizar Perfil</a>;<?php

         }else if($consultarEmpresa->num_rows>0){?>
            <a href="actualizarEmpresa.php" class="inline-btn" style="background-color: #d89503">Actualizar Perfil</a>;<?php
         }

         ?>
      </div>
   
      <div class="box-container">
   
         <div class="box">
            <div class="flex">
               <i class="fas fa-bookmark"></i>
               <div>
                  <span style="color: #d89503">4</span>
                  <p>Ofertas Guardadas</p>
               </div>
            </div>
            <a href="#" class="inline-btn" style="background-color: #d89503">Ver Ofertas Guardadas</a>
         </div>
   
         <div class="box">
            <div class="flex">
               <i class="fas fa-heart"></i>
               <div>
                  <span style="color: #d89503">33</span>
                  <p>Gente Que Te Visita</p>
               </div>
            </div>
            <a href="#" class="inline-btn" style="background-color: #d89503">Ver Visitantes</a>
         </div>
   
         <div class="box">
            <div class="flex">
               <i class="fas fa-comment"></i>
               <div>
                  <span style="color: #d89503">12</span>
                  <p>Ofertas En Proceso</p>
               </div>
            </div>
            <a href="#" class="inline-btn" style="background-color: #d89503">Ver Ofertas En Proceso</a>
         </div>
   
      </div>
   </div>

</section>














<footer class="footer">

   &copy; copyright @ 2023 by <span style="color: #d89503">Equipo De Trabajo WOFFORT</span> | all rights reserved!

</footer>

<!-- custom js file link  -->
<script src="assets/js/scriptHome.js"></script>

   
</body>
</html>