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
      <H3>Locales</H3>
        <form action="guardar_local.php" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <input type="text" name="nombre" class="form-control" placeholder="Nombre de local" autofocus>
          </div>
          <div class="form-group">
            <textarea name="descripcion" rows="2" class="form-control" placeholder="Descripcion de local"></textarea>
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
          <div class="form-group">
            <input type="file" name="file">
          </div>
          <input type="submit" name="guardar_local" class="btn btn-success btn-block" value="Guardar">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Descripcion</th>
            <th>Sucursal</th>
            <th>Telefono</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM locales";
          $result_locales = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_locales)) { ?>
          <tr>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['descripcion']; ?></td>
            <td><?php echo $row['sucursal_fk']; ?></td>
            <td><?php echo $row['telefono_fk']; ?></td>
            <td><?php echo $row['creado_en']; ?></td>
            <td>
              <a href="editar_local.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="borrar_local.php?id=<?php echo $row['id']?>" class="btn btn-danger">
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
