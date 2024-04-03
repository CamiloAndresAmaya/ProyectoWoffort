<?php
    
    include 'conexion_be.php';
    $numero_aleatorio = mt_rand(10000, 99999);
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $opcion = $_POST['opcion'];
   


    $opcion = isset($_POST['opcion']) ? $_POST['opcion'] : null; // verificar el valor de opcion seleccionada

    $query = "INSERT INTO registro(usuario, contrasena, Token, correo, tiporol_idTipoRol) 
              VALUES('$usuario', '$contrasena', '$numero_aleatorio', '$correo', '$opcion' )";

    //verificar que el usuario no se repita en la base de datos

    $verificarUsuario = mysqli_query($conexion,"SELECT * FROM registro WHERE Usuario='$usuario' ");
    if (mysqli_num_rows($verificarUsuario) > 0){
        echo'
            <script>
                alert("Este Usuario ya existe, intenta con otro diferente o inicia sesión");
                window.location= "../index.php";
            </script>
        ';
        exit ();
    }
    $ejecutar = mysqli_query($conexion,$query);

    if ($ejecutar){
        echo'
            <script>
                alert("Usuario Registrado Exitosamente, Por favor inicie sesión")
                window.location = "../index.php";
            </script>
        
        ';
    }else{
        echo'
        <script>
            alert("Intentalo nuevamente, usuario no almacenado")
            window.location = "../Home.php";
        </script>
    
    ';
    }

?>