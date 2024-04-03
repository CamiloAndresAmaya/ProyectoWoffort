<?php

   session_start();
   include 'php/conexion_be.php';
   $usuarioDatos = $_SESSION['usuario'];
   $validarDatos = mysqli_query($conexion,"SELECT * FROM userdb WHERE UsuarioUser='$usuarioDatos'");

   if (isset($usuarioDatos)){
      $cliente = $usuarioDatos; 
   }else{
      echo'
         <script>
            alert("No se encontró ninguna sesión abierta, Por favor inicia sesión")
            window.location="index.php";
         </script>
      ';

   }

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

      <form action="php/RegistrarDatosPersona.php" method="POST" enctype="multipart/form-data">
         <form action="">
            <h3>Datos Personales</h3>
            <p>Foto<span>*</span></p>
            <input class="box" type="file" name="foto">
            <p>Nombre<span>*</span></p>
            <input class="box" type="text" name="nombre" placeholder="Escriba su nombre" maxlength="23">
            <p>Apellido<span>*</span></p>
            <input class="box" type="text" name="apellido" placeholder="Escriba su Apellido" maxlength="23">
            <p>Telefono<span>*</span></p>
            <input class="box" type="text" name="telefono" placeholder="Escriba su Telefono" max="11">
            <p>Direccion<span>*</span></p>
            <input class="box" type="text" name="direccion" placeholder="Escriba su Direccion" maxlength="35">
            <p>Tipo Documento<span>*</span></p>
            <select class="box" id="tipoDoc" name="opcion">
               <option disabled>Seleccione una opción.</option>
               <option>Cedula</option>
               <option>Pasaporte</option>
               <option>DNI-NIF</option>
               <option>Pasaporte nacional</option>
               <option>CIF</option>
            </select>
            <p>Numero Documento<span>*</span></p>
            <input class="box" type="number" name="numeroDoc" placeholder="Escriba su Numero" maxlength="15">
            <input class="box" type="submit" value="Cargar Datos" name="submit" class="btn" style="background-color: #d89503">


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