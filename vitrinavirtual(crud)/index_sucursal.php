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
      <H3>Sucursal</H3>
        <form action="guardar_sucursal.php" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <input type="text" name="nombre" class="form-control" placeholder="Nombre de sucursal" autofocus>
          </div>
          <div class="form-group">
            <textarea name="direccion" rows="2" class="form-control" placeholder="Descripcion de sucursal"></textarea>
          </div>
          <div class="form-group">
            <input type="file" name="file">
          </div>
          <input type="submit" name="guardar_sucursal" class="btn btn-success btn-block" value="Guardar">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Direccion</th>
            <th>Creado en</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM sucursales";
          $result_sucursales = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_sucursales)) { ?>
          <tr>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['direccion']; ?></td>
            <td><?php echo $row['creado_en']; ?></td>
            <td>
              <a href="editar_sucursal.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="borrar_sucursal.php?id=<?php echo $row['id']?>" class="btn btn-danger">
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
