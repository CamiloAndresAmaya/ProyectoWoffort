<?php
include 'conexion_be.php';
session_start();
$consultarId = $_SESSION['usuario'];
$consulta = "SELECT idEmpresa FROM empresa WHERE UsuarioEmpresa = '".$consultarId."' ";
$resultado = $conexion -> query($consulta);
while($data=$resultado ->fetch_assoc()){
    $idEmpresa = $data['idEmpresa'];
}
if (!empty($_POST["btnActualizar"])) {
    if (!empty($_POST["nombre"]) and !empty($_POST["apellido"]) and !empty($_POST["telefono"]) and !empty($_POST["direccion"]) and !empty($_POST["opcion"])){
        $nombre = $_POST['nombreEmpresa'];
        $nit = $_POST['Nit'];
        $razonSocial = $_POST['razonSocial'];
        $direccionEmpresa = $_POST['direccionEmpresa'];
        
        $sql=$conexion->query(" UPDATE empresa set Nombre_Empresa='$nombre',NIT='$nit',Razon_Social='$razonSocial',direccionEmpresa='$direccionEmpresa' WHERE idEmpresa=$idEmpresa");
        echo'
        <script>
            alert("Datos Actualizados Exitosamente")
            window.location = "../Home.php";
        </script>

    ';
    }else{
        echo'
            <script>
                alert("Se requiere llenar todos los campos, intentelo de nuevo")
                window.location = "../profile.php";
            </script>
    
        ';
    }
}
?>
