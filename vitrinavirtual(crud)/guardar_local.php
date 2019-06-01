<?php

include('db.php');

if (isset($_POST['guardar_local'])) {
  $nombre = $_POST['nombre'];
  $descripcion = $_POST['descripcion'];
  $sucursal_fk = $_POST['sucursal_fk'];
  $telefono_fk = $_POST['telefono_fk'];
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

  $query = "INSERT INTO locales (nombre, descripcion, sucursal_fk, telefono_fk) VALUES ('$nombre', '$descripcion', '$sucursal_fk', '$telefono_fk')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Local guardado con exito';
  $_SESSION['message_type'] = 'success';
  header('Location: index_local.php');

}

?>
