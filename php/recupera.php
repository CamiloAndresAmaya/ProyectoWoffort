<?php
include 'conexion_be.php';
session_start();
//WoffortSena1234 Correo
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';
include 'conexion_be.php';
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
//Load Composer's autoloader
//require 'vendor/autoload.php';
$mail = new PHPMailer(true);
$correo = $_POST['correo'];
$query = "SELECT * FROM registro where correo = '$correo'";
$result = $conexion->query($query);
$row = $result->fetch_assoc();
if ($result->num_rows > 0) {
    $mail = new PHPMailer(true);
    $token = $row['Token'];
    $usuario = $row['usuario'];

    try {
        //Server 
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                    
        $mail->isSMTP();                                            // SMTP
        $mail->Host = 'smtp.gmail.com';                             
        $mail->SMTPAuth = true;                                     //Enable SMTP authentication
        $mail->Username = 'saswoffort@gmail.com';                   //SMTP username
        $mail->Password = 'hcci sciu vzxv thhd';                    //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port = 465;                                          //TCP port  use 587 if you have set

        //Reci
        $mail->setFrom('saswoffort@gmail.com', 'WOFFORT');
        $mail->addAddress($correo, 'Usuario_Gen');               

        //Con
        $mail->isHTML(true);                                  
        $mail->Subject = 'Restablecer clave';
        $mail->Body = 'HOLA '.$usuario.' El siguiente token te permitira cambiar tu contraseña por favor ingresa el siguiente  numero: '.$token.' :) ';
        $mail->AltBody = ' &copy; copyright @ 2023 by <span style="color: #d89503">Equipo De Trabajo WOFFORT</span> | all rights reserved!';
        $mail->send();
        echo 'Mensaje enviado verfica tu correo electronico para cambiar su contraseña';
        header("Location: ../FormularioRecupera.php?message=ok?usuario=$usuario&token=$token");
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

} else {
    echo "No se encontro el correo registrado";
    header("Location: ../index.php?message=not_found");
}

?>
