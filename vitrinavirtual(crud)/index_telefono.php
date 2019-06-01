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
      <H3>Telefonos</H3>
        <form action="guardar_telefono.php" method="POST">
          <div class="form-group">
            <input type="text" name="dueno" class="form-control" placeholder="Dueño de telefono" autofocus>
          </div>
          <div class="form-group">
          <input type="text" name="numero" class="form-control" placeholder="Numero de telefono" autofocus>
          </div>
          <input type="submit" name="guardar_telefono" class="btn btn-success btn-block" value="Guardar">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Dueño</th>
            <th>Numero</th>
            <th>Creado en</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM telefonos";
          $result_telefonos = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_telefonos)) { ?>
          <tr>
            <td><?php echo $row['dueno']; ?></td>
            <td><?php echo $row['numero']; ?></td>
            <td><?php echo $row['creado_en']; ?></td>
            <td>
              <a href="editar_telefono.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="borrar_telefono.php?id=<?php echo $row['id']?>" class="btn btn-danger">
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
