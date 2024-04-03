<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="assets/css/EstiloFormularios.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <title>Contrasñesa recovery</title>
</head>
<header class="header">
    <section class="flex" id="Persona">

        <a class="logo">WOFFORT</a>
        <p class="logo"> Restablecer Contraseña</p>

        <div class="icons">
            <div id="toggle-btn" class="fas fa-sun"></div>
            <div id="search-btn" class="fas fa-search"></div>

        </div>
        </div>
    </section>
</header>

<body>
    <section class="form-containerPersona">
        <form action="php/recupera.php" method="POST" class="formulario__login">
            <h2>Recuperar Contraseña</h2>
            <input type="email" placeholder="Correo Electronico" name="correo" require> <br>

            <button>Entrar</button>
        </form>
    </section>
</body>
</section>

<footer class="footerPersona">

    &copy; copyright @ 2023 by <span style="color: #d89503">Equipo De Trabajo WOFFORT</span> | all rights reserved!

</footer>

<!-- custom js file link  -->
<script src="assets/js/scriptHome.js"></script>

</html>