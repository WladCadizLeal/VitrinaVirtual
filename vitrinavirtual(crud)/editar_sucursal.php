<?php
include("db.php");
$nombre = '';
$descripcion= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM sucursales WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nombre = $row['nombre'];
    $direccion = $row['direccion'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $nombre= $_POST['nombre'];
  $direccion = $_POST['direccion'];

  $query = "UPDATE sucursales set nombre = '$nombre', direccion = '$direccion' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Sucursal actualizada con exito';
  $_SESSION['message_type'] = 'warning';
  header('Location: index_sucursal.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="editar_sucursal.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="nombre" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="Update nombre">
        </div>
        <div class="form-group">
        <input name="direccion" type="text" class="form-control" value="<?php echo $direccion; ?>" placeholder="Update direccion">
        </div>
          <input type="submit" name="update" class="btn btn-success btn-block" value="Guardar">
        </div>
        </form>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
