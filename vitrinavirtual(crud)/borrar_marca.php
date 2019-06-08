<?php

include("db.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM marcas WHERE id = $id";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Marca eliminada con exito';
  $_SESSION['message_type'] = 'danger';
  header('Location: index_marca.php');
}

?>
