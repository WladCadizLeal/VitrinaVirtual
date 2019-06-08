<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD TASK FORM -->
      <div class="card card-body">
      <H3>Productos destacados</H3>
        <form action="guardar_producto_destacado.php" method="POST">
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
          <input type="submit" name="guardar_producto_destacado" class="btn btn-success btn-block" value="Guardar">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Producto</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM productos_destacados";
          $result_productos_destacados = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_productos_destacados)) { ?>
          <tr>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['producto_fk']; ?></td>
            <td>
              <a href="editar_producto_destacado.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="borrar_producto_destacado.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>
