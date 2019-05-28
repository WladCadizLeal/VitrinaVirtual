<!doctype html>
<html lang="en">
  <head>
    <title>Crear cuentas</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
<body>

<div class="container">

	<?php

	include 'conn.php';

	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	// Verifica conexion
	if (!$conn) {
		die("Conexión fallida: " . mysqli_connect_error());
	}
	
	// Query tpara verificar si el correo ya esta registrado en la base de datos
	$checkEmail = "SELECT * FROM usuarios WHERE Email = '$_POST[email]' ";

	// Variable $result almacena la conexion y el query
	$result = $conn-> query($checkEmail);

	// Variable $count almacena el resultado del query
	$count = mysqli_num_rows($result);

	// Si el count es igual a 1 el email ya está registrado en la base de datos
	if ($count == 1) {
	echo "<div class='alert alert-warning mt-4' role='alert'>
					<p>Email ya registrado.</p>
					<p><a href='login.html'>Por favor, inicie sesión</a></p>
				</div>";
	} else {	
	
	/*
	Si el email no existe en la base de datos, los datos son enviados a
	la base de datos y se crea la cuenta nueva.
	*/
	$name = $_POST['name'];
	$email = $_POST['email'];
	$pass = $_POST['password'];
	
	// La funcion password_hash() cifra la contraseña antes de almacenarla en la base de datos.
	$passHash = password_hash($pass, PASSWORD_DEFAULT);
	
	// Query para registrar el nombre, email and contraseña cifrada en la base de datos
	$query = "INSERT INTO usuarios (nombre, email, contrasenia) VALUES ('$name', '$email', '$passHash')";

	if (mysqli_query($conn, $query)) {
		echo "<div class='alert alert-success mt-4' role='alert'><h3>Tu cuenta ha sido creada exitosamente.</h3>
		<a class='btn btn-outline-primary' href='login.html' role='button'>Ingresar</a></div>";		
		} else {
			echo "Error: " . $query . "<br>" . mysqli_error($conn);
		}	
	}	
	mysqli_close($conn);
	?>
</div>
	<!-- JavaScript Opcional -->
    <!-- jQuery primero, luego Popper.js, finalmente Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>