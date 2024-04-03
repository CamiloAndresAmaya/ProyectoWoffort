
<?php
include 'conexion_be.php';
session_start();
$numero_aleatorio = mt_rand(10000, 99999);

// Datos del formulario
$token = $_POST['token'];
$newcontraseña = $_POST['contrasena'];
// Consulta para validar si el token se encuentra registrado en la base de datos
$query = "SELECT * FROM registro WHERE token = '$token'";
$result = $conexion->query($query);

if ($result->num_rows > 0) {
    // valida el token
    $row = $result->fetch_assoc();
    $contrasena_bd = $row['contrasena'];
    $token_bd = $row['token'];
    
    // Actualizar contraseña
    $update_query = "UPDATE registro SET contrasena = '$newcontraseña' WHERE token = '$token'";
    $update_token = "UPDATE registro SET token = '$numero_aleatorio' WHERE token = '$token'";
    $update_result = $conexion->query($update_query);

    if ($update_result) {
        // La contraseña se actualizó correctamente
        echo '<script>alert("La contraseña se ha modificado correctamente.");</script>';
        header("Location: ../index.php?password=ok"); // Redireccionar al index una vez que el password se cambie
    } else {
        // Error al actualizar la contraseña
        echo '<script>alert("Hubo un error al intentar modificar la contraseña.");</script>';
        header("Location: ../index.php"); // Redireccionar al index
    }
} else {
    // No se encontró un token coincidente en la base de datos
    echo '<script>alert("El token proporcionado no es válido.");</script>';
    header("Location: ../index.php"); // Redireccionar al index
}
?>
