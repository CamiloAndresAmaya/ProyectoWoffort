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
      $rutaImagen = "assets/images/{$nombre}.{$extension}";


      }  
   }else if($consultarEmpresa->num_rows>0){
      while($dataEmpresa=$resultadoEmpresa->fetch_assoc()){
         $nombre = $dataEmpresa['Nombre_Empresa'];
         $extension = "png";
         $rutaImagen = "assets/images/{$nombre}.{$extension}";
      }
   }

   $search = $_POST['search'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Ofertas</title>

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

<section class="courses">

   <h1 class="heading">Ofertas De Trabajo Vigentes</h1>
   <?php 

      if($consultarUsuario->num_rows>0){
         $nothing = $nombre;

      }else if($consultarEmpresa->num_rows>0){?>
         <a href="FormularioOfertaPub.php" class="inline-btn" style="background-color: #d89503">Crear Oferta De Empleo</a> <br><br>
         <?php
      }

   ?>
   <div class="box-container">


   <?php
         $consultarSearchEmpresa = mysqli_query($conexion,"SELECT * FROM empresa WHERE Nombre_Empresa='$search'");
         $result = mysqli_num_rows($consultarSearchEmpresa);

         if($result>0){
            while($data = mysqli_fetch_array($consultarSearchEmpresa)){ // crea filas 
               ?>
               <form action="DetallesOferta.php" method="post">
                  <div class="box">
                     <div class="tutor">
                     <?php
                     
                     $extension = "png";
                     $rutaTipo = "assets/images/{$data['Nombre_Empresa']}.{$extension}";

                     if($consultarUsuario->num_rows>0){?>
                        <img src="<?php echo $rutaTipo?>" class="image" alt="">;<?php

                     }else if($consultarEmpresa->num_rows>0){?>
                        <img src="<?php echo $rutaTipo?>" class="image" alt="">;<?php
                     }

                     ?>
                        <div class="info">
                           <h3><?php echo $data['Nombre_Empresa']?></h3>
                           <span><?php echo $data['Razon_Social']?></span>
                        </div>
                     </div>
                     <div class="thumb">
                        <img src="assets/images/thumb-1.png" alt="">
                        <span><?php echo $data['NIT']?></span>
                     </div>
                     <input class="box" type="submit" value="Ver Empresa" name="submit" class="btn" style="background-color: #d89503" style="cursor:pointer">
                  </div>
               </form>
               <?php
            }
         }else{
            ?>
            <p hidden>no hay nada cachon</p>
            <?php
         }
      ?>


      <?php
         $consultarSearchOferta = mysqli_query($conexion,"SELECT * FROM oferta WHERE Titulo_Oferta='$search' || Ciudad ='$search' || Salario ='$search'");
         $result = mysqli_num_rows($consultarSearchOferta);

         if($result>0){
            while($data = mysqli_fetch_array($consultarSearchOferta)){ // crea filas 
               ?>
               <form action="DetallesOferta.php" method="post">
                  <div class="box">
                     <div class="tutor">
                     <?php
                     
                     $extension = "png";
                     $rutaTipo = "assets/images/{$data['UsuarioOferta']}.{$extension}";

                     if($consultarUsuario->num_rows>0){?>
                        <img src="<?php echo $rutaTipo?>" class="image" alt="">;<?php

                     }else if($consultarEmpresa->num_rows>0){?>
                        <img src="<?php echo $rutaTipo?>" class="image" alt="">;<?php
                     }

                     ?>
                        <div class="info">
                           <h3><?php echo $data['UsuarioOferta']?></h3>
                           <span><?php echo $data['Fecha_ing']?></span>
                        </div>
                     </div>
                     <div class="thumb">
                        <img src="assets/images/thumb-1.png" alt="">
                        <span><?php echo $data['Titulo_Oferta']?></span>
                     </div>
                     <h3 class="title"><?php echo $data['Descripcion']?></h3>
                     <input hidden type="text" name="idOferta" value="<?php echo $data['id_Oferta']?>">
                     <input class="box" type="submit" value="Ver Oferta" name="submit" class="btn" style="background-color: #d89503" style="cursor:pointer">
                  </div>
               </form>
               <?php
            }
         }else{
            ?>
            <p hidden>no hay nada cachon</p>
            <?php
         }
      ?>

</section>














<footer class="footer">

   &copy; copyright @ 2023 by <span style="color: #d89503">Equipo De Trabajo WOFFORT</span> | all rights reserved!

</footer>

<!-- custom js file link  -->
<script src="assets/js/scriptHome.js"></script>

   
</body>
</html>