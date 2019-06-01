<?php
include("db.php");
$nombre = '';
$descripcion= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM productos_destacados WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nombre = $row['nombre'];
    $producto_fk = $row['producto_fk'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $nombre= $_POST['nombre'];
  $producto_fk = $_POST['producto_fk'];

  $query = "UPDATE productos set nombre = '$nombre', producto_fk = '$producto_fk' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Producto destacado actualizado con exito';
  $_SESSION['message_type'] = 'warning';
  header('Location: index_producto_destacado.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="editar_producto_destacado.php?id=<?php echo $_GET['id']; ?>" method="POST">
      <div class="form-group">
            <input type="text" name="nombre" class="form-control" placeholder="Nombre de producto destacado" autofocus>
          </div>
          <div class="form-group">
            <?php $query=mysqli_query($conn,"SELECT id, nombre FROM productos"); ?>
            <select name="producto_fk" class="form-control">
            <?php 
              while($productos = mysqli_fetch_array($query)){
            ?>
                <option value="<?php echo $productos['id']?>"> <?php echo $productos['nombre']?> </option>
            <?php
              }
            ?>
            </select>
          </div>
          <input type="submit" name="update" class="btn btn-success btn-block" value="Guardar">
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
