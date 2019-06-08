<?php

include('db.php');

if (isset($_POST['guardar_sucursal'])) {
  $nombre = $_POST['nombre'];
  $direccion = $_POST['direccion'];
  $file = $_FILES['file'];
    
  $fileName = $_FILES['file']['name'];
  $fileTmpName = $_FILES['file']['tmp_name'];
  $fileSize = $_FILES['file']['size'];
  $fileError = $_FILES['file']['error'];
  $fileType = $_FILES['file']['type'];

  $fileExt = explode('.', $fileName);
  $fileActualExt = strtolower(end($fileExt));

  $allowed = array('jpg', 'jpeg', 'png');

  if(in_array($fileActualExt, $allowed)){
    if($fileError === 0){
        if($fileSize < 1000000){
            $fileNameNew = uniqid('', true).".".$fileActualExt;
            $fileDestination = 'includes/img/'.$fileNameNew;
            move_uploaded_file($fileTmpName, $fileDestination);
        }
        else{
            echo "Tu archivo es demasiado grande";
        }
    }
    else{
        echo "Hubo un error al subir tu imagen";
    }
  }else{
    echo "No puedes subir archivos de este tipo";
  }
  $query = "INSERT INTO marcas (nombre, descripcion) VALUES ('$nombre', '$descripcion')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $query = "INSERT INTO sucursales (nombre, direccion) VALUES ('$nombre', '$direccion')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Sucursal guardada con exito';
  $_SESSION['message_type'] = 'success';
  header('Location: index_sucursal.php');

}

?>
