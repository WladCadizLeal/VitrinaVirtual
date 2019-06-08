<?php
include("db.php");
$nombre = '';
$descripcion= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM telefonos WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $dueno = $row['dueno'];
    $numero = $row['numero'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $dueno= $_POST['dueno'];
  $numero = $_POST['numero'];

  $query = "UPDATE telefonos set dueno = '$dueno', numero = '$numero' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Task Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: index_telefono.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="editar_telefono.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="dueno" type="text" class="form-control" value="<?php echo $dueno; ?>" placeholder="Update nombre">
        </div>
        <div class="form-group">
        <textarea name="numero" class="form-control" cols="30" rows="10"><?php echo $numero;?></textarea>
        </div>
        <button class="btn-success" name="update">
          Update
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
