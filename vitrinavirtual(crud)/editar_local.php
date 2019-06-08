<?php
include("db.php");
$nombre = '';
$descripcion= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM locales WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nombre = $row['nombre'];
    $descripcion = $row['descripcion'];
    $sucursal_fk = $row['sucursal_fk'];
    $telefono_fk = $row['telefono_fk'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $nombre= $_POST['nombre'];
  $descripcion = $_POST['descripcion'];
  $sucursal_fk = $_POST['sucursal_fk'];
  $telefono_fk = $_POST['telefono_fk'];

  $query = "UPDATE locales set nombre = '$nombre', descripcion = '$descripcion', sucursal_fk = '$sucursal_fk', telefono_fk = '$telefono_fk' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Local actualizado con exito';
  $_SESSION['message_type'] = 'warning';
  header('Location: index_local.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="editar_local.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="nombre" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="Update nombre">
        </div>
        <div class="form-group">
        <textarea name="descripcion" class="form-control" cols="30" rows="10"><?php echo $descripcion;?></textarea>
        </div>
        <div class="form-group">
            <?php $query=mysqli_query($conn,"SELECT id, nombre FROM sucursales"); ?>
            <select name="sucursal_fk" class="form-control">
            <?php 
              while($sucursales = mysqli_fetch_array($query)){
            ?>
                <option value="<?php echo $sucursales['id']?>"> <?php echo $sucursales['nombre']?> </option>
            <?php
              }
            ?>
            </select>
          </div>
          <div class="form-group">
            <?php $query=mysqli_query($conn,"SELECT id, dueno FROM telefonos"); ?>
            <select name="telefono_fk" class="form-control">
            <?php 
              while($telefonos = mysqli_fetch_array($query)){
            ?>
                <option value="<?php echo $telefonos['id']?>"> <?php echo $telefonos['dueno']?> </option>
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
