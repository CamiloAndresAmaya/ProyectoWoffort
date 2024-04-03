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
   <title>Personal De Trabajo</title>

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

<section class="teachers">

   <h1 class="heading">Personal Aun No Contratado</h1>

   <form action="" method="post" class="search-tutor">
      <input type="text" name="search_box" placeholder="search personal..." required maxlength="100">
      <button type="submit" class="fas fa-search" name="search_tutor"></button>
   </form>

   <div class="box-container">
      <?php 

      if($consultarUsuario->num_rows>0){?>
         <div class="box offer">
         <h3>Crea Tu Hoja De Vida</h3>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet, itaque ipsam fuga ex et aliquam.</p>
         <a href="HojaVida.php" class="inline-btn" style="background-color: #d89503">Crear Hoja De Vida</a>
         </div><?php

      }else if($consultarEmpresa->num_rows>0){
         $nothing = $nombre;
      }

      ?>

      <div class="box">
         <div class="tutor">
            <img src="assets/images/pic-2.jpg" alt="">
            <div>
               <h3>Neider</h3>
               <span>Informal</span>
            </div>
         </div>
         <p>Titulos: <span>None</span></p>
         <p>Visitas Al Perfil: <span>0</span></p>
         <p>Antecedentes: <span>26 y contando</span></p>
         <a href="PerfilPersonal.php" class="inline-btn" style="background-color: #d89503">Ver Perfil</a>
      </div>

      <div class="box">
         <div class="tutor">
            <img src="assets/images/pic-3.jpg" alt="">
            <div>
               <h3>Tunjano</h3>
               <span>Desarrollador Senior</span>
            </div>
         </div>
         <p>Titulos: <span>4</span></p>
         <p>Visitas Al Perfil: <span>1B</span></p>
         <p>Antecedentes: <span>0</span></p>
         <a href="PerfilPersonal.php" class="inline-btn" style="background-color: #d89503">Ver Perfil</a>
      </div>

      <div class="box">
         <div class="tutor">
            <img src="assets/images/pic-4.jpg" alt="">
            <div>
               <h3>Wilson</h3>
               <span>Tecnico</span>
            </div>
         </div>
         <p>Titulos: <span>1</span></p>
         <p>Visitas Al Perfil: <span>18</span></p>
         <p>Antecedentes: <span>1208</span></p>
         <a href="PerfilPersonal.php" class="inline-btn" style="background-color: #d89503">Ver Perfil</a>
      </div>

      <div class="box">
         <div class="tutor">
            <img src="assets/images/pic-5.jpg" alt="">
            <div>
               <h3>Cristina</h3>
               <span>Tecnologo</span>
            </div>
         </div>
         <p>Titulos: <span>2</span></p>
         <p>Visitas Al Perfil: <span>3</span></p>
         <p>Antecedentes: <span>Terrorista Mundial</span></p>
         <a href="PerfilPersonal.php" class="inline-btn" style="background-color: #d89503">Ver Perfil</a>
      </div>

      <div class="box">
         <div class="tutor">
            <img src="assets/images/pic-6.jpg" alt="">
            <div>
               <h3>Roberta</h3>
               <span>Postgrado</span>
            </div>
         </div>
         <p>Titulos: <span>9</span></p>
         <p>Visitas Al Perfil: <span>18</span></p>
         <p>Antecedentes: <span>Narcotraficante</span></p>
         <a href="PerfilPersonal.php" class="inline-btn" style="background-color: #d89503">Ver Perfil</a>
      </div>

      <div class="box">
         <div class="tutor">
            <img src="assets/images/pic-7.jpg" alt="">
            <div>
               <h3>Andres</h3>
               <span>Informal</span>
            </div>
         </div>
         <p>Titulos: <span>1</span></p>
         <p>Visitas Al Perfil: <span>98</span></p>
         <p>Antecedentes: <span>Limpio, Persona Sana</span></p>
         <a href="PerfilPersonal.php" class="inline-btn" style="background-color: #d89503">Ver Perfil</a>
      </div>

      <div class="box">
         <div class="tutor">
            <img src="assets/images/pic-8.jpg" alt="">
            <div>
               <h3>Jhon Pork</h3>
               <span>Lider Mundial</span>
            </div>
         </div>
         <p>Titulos: <span>40</span></p>
         <p>Visitas Al Perfil: <span>3B</span></p>
         <p>Antecedentes: <span>Ex-Convicto</span></p>
         <a href="PerfilPersonal.php" class="inline-btn" style="background-color: #d89503">Ver Perfil</a>
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