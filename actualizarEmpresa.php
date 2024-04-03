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
  
   $sqlEmpresa = "SELECT Nombre_Empresa,NIT,Razon_Social,direccionEmpresa FROM empresa WHERE UsuarioEmpresa ='".$usuario."'";
      $resultadoEmpresa =$conexion->query($sqlEmpresa);

   $consultarUsuario = mysqli_query($conexion,"SELECT * FROM userdb WHERE UsuarioUser='$usuario'");
   $consultarEmpresa = mysqli_query($conexion,"SELECT * FROM empresa WHERE UsuarioEmpresa='$usuario'");
   


   if($consultarUsuario->num_rows>0){
      while($data=$resultado->fetch_assoc()){
            echo'
            <script>
                alert("Este usuario no esta autorizado para ingresar a este formulario")
                window.location = "Home.php";
            </script>

            ';
      }  
   }else if($consultarEmpresa->num_rows>0){
      while($dataEmpresa=$resultadoEmpresa->fetch_assoc()){
         $nombre = $dataEmpresa['Nombre_Empresa'];
         $nit = $dataEmpresa['NIT'];
         $razonSocial = $dataEmpresa['Razon_Social'];
         $direccionEmpresa = $dataEmpresa['direccionEmpresa'];
      }
   }
?>




<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Cargar Hoja De vida</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="assets/css/EstiloCasa.css">

</head>
    
<body>
    
   <header class="headerPersona">

      <section class="flex" >

         <a href="home.php" class="logo">WOFFORT</a>


         <div class="icons">
            <div id="toggle-btn" class="fas fa-sun"></div>
         </div>

      </section>

   </header>

   <section class="form-containerPersona">

      <form action="php/ActualizarDatosEmpresa.php" method="POST" enctype="multipart/form-data">
         <form action="">
            <h3>Actualizacion De Datos</h3>
            <p>Nombre Empresa<span>*</span></p>
            <input class="box" type="text" name="nombreEmpresa" placeholder="<?php echo $nombre?>" maxlength="23">
            <p>NIT<span>*</span></p>
            <input class="box" type="text" name="Nit" placeholder="<?php echo $nit?>" maxlength="23">
            <p>Razon Social<span>*</span></p>
            <input class="box" type="text" name="razonSocial" placeholder="<?php echo $razonSocial?>">
            <p>Direccion<span>*</span></p>
            <input class="box" type="text" name="direccionEmpresa" placeholder="<?php echo $direccionEmpresa?>" maxlength="30">
            <input class="box" type="submit" value="Actualizar Datos" name="btnActualizar" class="btn" style="background-color: #d89503">


         </form>
      </form>

   </section>

   <footer class="footerPersona">

      &copy; copyright @ 2023 by <span style="color: #d89503">Equipo De Trabajo WOFFORT</span> | all rights reserved!

   </footer>

   <!-- custom js file link  -->
   <script src="assets/js/scriptHome.js"></script>


</body>

</html>