<?php

include('db.php');

if (isset($_POST['guardar_categoria'])) {
  $nombre = $_POST['nombre'];
  $descripcion = $_POST['descripcion'];
  $query = "INSERT INTO categorias (nombre, descripcion) VALUES ('$nombre', '$descripcion')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: index_categoria.php');

}

?>
