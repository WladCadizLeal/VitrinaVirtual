<?php

include('db.php');

if (isset($_POST['guardar_marca'])) {
  $nombre = $_POST['nombre'];
  $descripcion = $_POST['descripcion'];
  $query = "INSERT INTO marcas (nombre, descripcion) VALUES ('$nombre', '$descripcion')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Marca guardada con exito';
  $_SESSION['message_type'] = 'success';
  header('Location: index_marca.php');

}

?>
