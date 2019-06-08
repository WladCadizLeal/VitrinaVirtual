<?php

include('db.php');

if (isset($_POST['guardar_producto_destacado'])) {
  $nombre = $_POST['nombre'];
  $producto_fk = $_POST['producto_fk'];
  $query = "INSERT INTO productos_destacados (nombre, producto_fk) VALUES ('$nombre', '$producto_fk')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Producto destacado guardado con exito';
  $_SESSION['message_type'] = 'success';
  header('Location: index_producto_destacado.php');

}

?>
