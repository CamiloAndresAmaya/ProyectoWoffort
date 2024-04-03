<?php
include 'conexion_be.php';
session_start();
$consultarId = $_SESSION['usuario'];
$consulta = "SELECT idUserDb FROM userdb WHERE UsuarioUser = '".$consultarId."' ";
$resultado = $conexion -> query($consulta);
while($data=$resultado ->fetch_assoc()){
    $idUser = $data['idUserDb'];
}
if (!empty($_POST["btnActualizar"])) {
    if (!empty($_POST["nombre"]) and !empty($_POST["apellido"]) and !empty($_POST["telefono"]) and !empty($_POST["direccion"]) and !empty($_POST["opcion"])){
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        $tipoDocumento = $_POST['opcion'];
        
        $sql=$conexion->query(" UPDATE userdb set nombre='$nombre',apellido='$apellido',telefono='$telefono',direccion='$direccion',tipoDoc='$tipoDocumento' WHERE idUserDb=$idUser");
        echo'
        <script>
            alert("Datos Actualizados Exitosamente")
            window.location = "../Home.php";
        </script>

    ';
    } else{
        echo'
            <script>
                alert("Se requiere llenar todos los campos, intentelo de nuevo")
                window.location = "../profile.php";
            </script>
    
        ';
    }  
}
?>
