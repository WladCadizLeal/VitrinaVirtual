<?php
session_start();
?>

<!doctype html>
<html lang="en">
	<head>
		<title>Validación y creación de sesión</title>
		<!-- Meta datos requeridos -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
		
			<?php
			// Archivo de conexión
			include 'conn.php';	
			
			// Variables de conexión
			$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

			// Valida la conexión
			if (!$conn) {
				die("Conexion fallida: " . mysqli_connect_error());
			}
			
			// Datos recibidos de login.html 
			$email = $_POST['email']; 
			$password = $_POST['password'];
			
			// Query enviado a la base de datos
			$result = mysqli_query($conn, "SELECT Email, Contrasenia, Nombre FROM pruebalogin.usuarios WHERE Email = '$email';");
			
			// Variable $row almacena el resultado del query
			$row = mysqli_fetch_assoc($result);
			
			// Variable $hash mantiene la contraseña encriptada en la base de datos
			$hash = $row['Contrasenia'];
			
			/* 
			password_Verify() esta funcion valida si la contraseña ingresada
			por el usuario coincide con la contraseña encriptada en la base de datos.
			Si todo está bien, se crea una sesión por 10 minutos.
			*/
			if (password_verify($_POST['password'], $hash)) {	
				
				$_SESSION['loggedin'] = true;
				$_SESSION['name'] = $row['Nombre'];
				$_SESSION['start'] = time();
				$_SESSION['expire'] = $_SESSION['start'] + (10 * 60) ;						
				
				echo "<div class='alert alert-success mt-4' role='alert'><strong>Bienvenido(a) !</strong> $row[Nombre]			
				<p><a href='edit-profile.php'>Editar Perfil</a></p>	
				<p><a href='logout.php'>Cerrar Sesión</a></p></div>";	
			
			} else {
				echo "<div class='alert alert-danger mt-4' role='alert'>¡Email o Contraseña incorrectos!
				<p><a href='login.html'><strong>Por favor, intente nuevamente.</strong></a></p></div>";			
			}	
			?>
		</div>
		<!-- JavaScript Opcional -->
		<!-- jQuery primero, luego Popper.js, finalmente Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

	</body>
</html>