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
      $tipoRol = "Postulante";

      }  
   }else if($consultarEmpresa->num_rows>0){
      echo'
            <script>
                alert("Este usuario no esta autorizado para ingresar a este formulario")
                window.location = "Home.php";
            </script>

            ';
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

      <form action="php/ActualizarDatosPersona.php" method="POST" enctype="multipart/form-data">
         <form action="">
            <h3>Actualizacion De Datos</h3>
            <p>Nombre<span>*</span></p>
            <input class="box" type="text" name="nombre" placeholder="<?php echo $nombre?>" maxlength="23">
            <p>Apellido<span>*</span></p>
            <input class="box" type="text" name="apellido" placeholder="<?php echo $apellido?>" maxlength="23">
            <p>Telefono<span>*</span></p>
            <input class="box" type="number" name="telefono" placeholder="<?php echo $telefono?>">
            <p>Direccion<span>*</span></p>
            <input class="box" type="text" name="direccion" placeholder="<?php echo $direccion?>" maxlength="30">
            <p>Tipo Documento<span>*</span></p>
            <select class="box" name="opcion">
               <option disabled>Seleccione una opción.</option>
               <option disabled><?php echo $tipoDoc?></option>
               <option>Cedula</option>
               <option>Pasaporte</option>
               <option>DNI-NIF</option>
               <option>Pasaporte nacional</option>
               <option>CIF</option>
            </select>
            <p>Numero Documento<span>*</span></p>
            <input class="box" type="number" name="numeroDoc" placeholder="<?php echo $numeroDoc?>" disabled>
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