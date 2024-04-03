<?php
    include 'conexion_be.php';
    session_start();

    $fecha =date("Y")."-".date("m")."-".date("d");
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $tipoDocumento = $_POST['opcion'];
    $numeroDocumento = $_POST['numeroDoc'];
    $archivo = $_FILES['foto'];
    $extension = pathinfo($archivo['name'],PATHINFO_EXTENSION);
    $usuarioDatos = $_SESSION['usuario'];
    $imagen = $usuarioDatos.".".$extension;

    $sql = "SELECT idRegistro FROM registro WHERE usuario ='".$usuarioDatos."'";
    $resultado =$conexion->query($sql);
    while($data=$resultado->fetch_assoc()){
     $idRegistro = $data['idRegistro'];
    }

  


    move_uploaded_file($archivo["tmp_name"],"../assets/images/$imagen");

    if(empty($_POST['nombre'])){
        echo"llene todos los campos los datos";
    }else{

        $query = "INSERT INTO userdb(UsuarioUser,nombre,apellido,telefono,direccion,tipoDoc,numeroDoc, Foto,registro_idRegistro,registro_tiporol_idTipo_Rol	) 
         VALUES('$usuarioDatos','$nombre','$apellido','$telefono','$direccion','$tipoDocumento','$numeroDocumento','$imagen','$idRegistro','2')";


        $ejecutar = mysqli_query($conexion,$query);

        if ($ejecutar){
            echo'
                <script>
                    alert("Datos Usuario Registrados Exitosamente")
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