<?php
include("db.php");
$nombre = '';
$descripcion= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM productos WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nombre = $row['nombre'];
    $descripcion = $row['descripcion'];
    $precio = $row['precio'];
    $marca_fk = $row['marca_fk'];
    $categoria_fk = $row['categoria_fk'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $nombre= $_POST['nombre'];
  $descripcion = $_POST['descripcion'];
  $precio = $_POST['precio'];
  $marca_fk = $_POST['marca_fk'];
  $categoria_fk = $_POST['categoria_fk'];

  $query = "UPDATE productos set nombre = '$nombre', descripcion = '$descripcion', precio = '$precio', marca_fk = '$marca_fk', categoria_fk = '$categoria_fk' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Producto actualizado con exito';
  $_SESSION['message_type'] = 'warning';
  header('Location: index_producto.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="editar_producto.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="nombre" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="Update nombre">
        </div>
        <div class="form-group">
        <textarea name="descripcion" class="form-control" cols="30" rows="10"><?php echo $descripcion;?></textarea>
        </div>
        <div class="form-group">
            <input type="number" name="precio" class="form-control" autofocus>
          </div>
          <div class="form-group">
            <?php $query=mysqli_query($conn,"SELECT id, nombre FROM marcas"); ?>
            <select name="marca_fk" class="form-control">
            <?php 
              while($marcas = mysqli_fetch_array($query)){
            ?>
                <option value="<?php echo $marcas['id']?>"> <?php echo $marcas['nombre']?> </option>
            <?php
              }
            ?>
            </select>
          </div>
          <div class="form-group">
            <?php $query=mysqli_query($conn,"SELECT id, nombre FROM categorias"); ?>
            <select name="categoria_fk" class="form-control">
            <?php 
              while($categorias = mysqli_fetch_array($query)){
            ?>
                <option value="<?php echo $categorias['id']?>"> <?php echo $categorias['nombre']?> </option>
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
