<?php
    include 'conexion_be.php';
    //include 'registro_usuario_be.php';

    session_start();

    $nombreEmpresa = $_POST['nombreEmpresa'];
    $NIT = $_POST['Nit'];
    $razonSocial = $_POST['razonSocial'];
    $direccionEmpresa = $_POST['direccionEmpresa'];
    $archivo = $_FILES['logoEmpresa'];
    $extension = pathinfo($archivo['name'],PATHINFO_EXTENSION);
    $usuarioDatos = $_SESSION['usuario'];
    $imagen = $usuarioDatos.".".$extension;

    move_uploaded_file($archivo["tmp_name"],"../assets/images/$imagen");

    $_SESSION['nombreEmpresa']= $nombreEmpresa;

    
    if(empty($_POST['nombreEmpresa'])){
        echo"llene todos los campos los datos";
    }else{
        
        $query = "INSERT INTO empresa(UsuarioEmpresa,Nombre_Empresa,NIT,Razon_Social,Empresa_Logo,direccionEmpresa,tiporol_idTipoRol) 
         VALUES('$usuarioDatos','$nombreEmpresa','$NIT','$razonSocial','$imagen','$direccionEmpresa','1')";


        $ejecutar = mysqli_query($conexion,$query);

        if ($ejecutar){
            echo'
                <script>
                    alert("Datos Empresa Registrados Exitosamente")
                    window.location = "../Home.php";
                </script>
    
            ';
        }else{
            echo'
                <script>
                    alert("Intentalo nuevamente, datos no almacenados")
                    window.location = "../index.php";
                </script>

            ';
        }
    }




?>