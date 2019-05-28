<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Editar perfil</title>
	
    <!-- Meta datos requeridos -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  
  <body>      
    <?php
    if (isset($_SESSION['loggedin'])) {  
    }
    else {
        echo "<div class='alert alert-danger mt-4' role='alert'>
        <h4>Debes iniciar sesión para acceder a esta página</h4>
        <p><a href='login.html'>Ingresar</a></p></div>";
        exit;
    }
    // Verifica el tiempo actual de inicio de sesión
    $now = time();           
    if ($now > $_SESSION['expire']) {
        session_destroy();
        echo "<div class='alert alert-danger mt-4' role='alert'>
        <h4>¡Tu sesión ha expirado!</h4>
        <p><a href='login.html'>Ingresar</a></p></div>";
        exit;
        }
    ?>

    <div class="container">
        <p>Bienvenido(a): <?php echo $_SESSION['name']; ?></p>
        <h3>Editar tu perfil</h3>
        <ul>
            <li>Cambiar imagen</li>
            <li>Cambiar descripcion</li>
            <li>Cambiar contraseña</li>
            <li>Entre otros.</li>
        </ul>
        <p><a href="logout.php">Cerrar sesión</a></p>
    </div>

	<!-- JavaScript Opcional -->
    <!-- jQuery primero, despues Popper.js, finalmente Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

	</body>
</html>