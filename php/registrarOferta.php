<?php
    include 'conexion_be.php';
    session_start();
    if(empty($_POST['descripcionOferta'])){
        echo"llene todos los campos los datos";
    }else{
        $tituloOferta = $_POST['tituloOferta'];
        $descripcion = $_POST['descripcionOferta'];
        $categoriaId = $_POST['categoriaOferta'];
        $salarioOferta = $_POST['salarioOferta'];
        $ciudadOferta = $_POST['ciudadOferta'];
        $usuarioDatos = $_SESSION['usuario'];
        //$archivo = $_FILES['fotoCargo'];
        //$extension = pathinfo($archivo['name'],PATHINFO_EXTENSION);
        //$imagen = $usuarioDatos.".".$extension;
        $fecha = date("Y")."-".date("m")."-".date("d");
        $usuarioDatos = $_SESSION['usuario'];

        move_uploaded_file($archivo["tmp_name"],"../assets/images/$imagen");


        if($categoriaId=="Formal"){
            $IdCategoria="1";
        }else if($categoriaId=="Informal"){
            $IdCategoria="2";
        }

        $sql = "SELECT idEmpresa FROM empresa WHERE UsuarioEmpresa ='".$usuarioDatos."'";
        $resultado =$conexion->query($sql);
        while($data=$resultado->fetch_assoc()){
         $idEmpresa = $data['idEmpresa'];
        }

        $consultaNombreEmpresa = "SELECT Nombre_Empresa FROM empresa WHERE UsuarioEmpresa ='".$usuarioDatos."'";
        $resultado =$conexion->query($consultaNombreEmpresa);
        while($data=$resultado->fetch_assoc()){
            $nombreEmpresa= $data['Nombre_Empresa'];
        }

        $query = "INSERT INTO oferta(UsuarioOferta,Descripcion, Salario, Ciudad, Fecha_ing,Titulo_Oferta,empresa_idEmpresa,categoria_idCategoria)
         VALUES('$usuarioDatos','$descripcion','$salarioOferta','$ciudadOferta','$fecha','$tituloOferta','$idEmpresa','$IdCategoria')";
         
        $ejecutar = mysqli_query($conexion,$query);

        if ($ejecutar){
            echo'
                <script>
                    alert("Oferta Registrada Exitosamente")
                    window.location = "../Ofertas.php";
                </script>
    
            ';
        }else{
            echo'
                <script>
                    alert("Intentalo nuevamente, oferta no almacenado")
                    window.location = "../Ofertas.php";
                </script>

            ';
        }
    }




?>