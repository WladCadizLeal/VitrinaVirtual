<?php

include('db.php');

if (isset($_POST['guardar_telefono'])) {
  $dueno = $_POST['dueno'];
  $numero = $_POST['numero'];
  $query = "INSERT INTO telefonos (dueno, numero) VALUES ('$dueno', '$numero')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: index_telefono.php');

}

?>
