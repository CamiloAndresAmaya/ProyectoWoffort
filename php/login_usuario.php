<?php
    session_start();

    include 'conexion_be.php';
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $_SESSION['usuario'] = $usuario;
    $validar_login = mysqli_query($conexion,"SELECT * FROM registro WHERE usuario='$usuario' and contrasena='$contrasena'");
    $validarDatos = mysqli_query($conexion,"SELECT * FROM empresa WHERE UsuarioEmpresa='$usuario'");
    $validarDatosUsuario = mysqli_query($conexion,"SELECT * FROM userdb WHERE UsuarioUser='$usuario'");

    

    if ($validar_login->num_rows>0){
       $fila = $validar_login->fetch_assoc();
       $opcionRol = $fila['tiporol_idTipoRol'];
       if($opcionRol==1){
            if ($validarDatos->num_rows>0){
                header("location: ../Home.php");
            }else{
                echo'
                <script>
                    alert("Por favor, Llene Los Siguientes Datos")
                    window.location="../FormularioEmpresa.php";
                </script>
                ';
            }
        }else if($opcionRol==2){
            if ($validarDatosUsuario->num_rows>0){
                header("location: ../Home.php");
            }else{
                echo'
                <script>
                    alert("Por favor, Llene Los Siguientes Datos")
                    window.location="../FormularioPersona.php";
                </script>
                ';
            }
        }
    }else{
        echo'
            <script>
                alert("Usuario no existe, por favor verifique los datos introducidos")
                window.location="../index.php";
            </script>
        ';
    }

?>mm