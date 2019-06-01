<?php

include('db.php');

if (isset($_POST['guardar_producto'])) {
  $nombre = $_POST['nombre'];
  $descripcion = $_POST['descripcion'];
  $precio = $_POST['precio'];
  $marca_fk = $_POST['marca_fk'];
  $categoria_fk = $_POST['categoria_fk'];
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

  $query = "INSERT INTO productos (nombre, descripcion, precio, marca_fk, categoria_fk) VALUES ('$nombre', '$descripcion', '$precio', '$marca_fk', '$categoria_fk')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Producto guardado con exito';
  $_SESSION['message_type'] = 'success';
  header('Location: index_producto.php');

}

?>
