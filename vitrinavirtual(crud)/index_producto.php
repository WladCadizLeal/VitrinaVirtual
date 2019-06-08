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
      <H3>Productos</H3>
        <form action="guardar_producto.php" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <input type="text" name="nombre" class="form-control" placeholder="Nombre de producto" autofocus>
          </div>
          <div class="form-group">
            <textarea name="descripcion" rows="2" class="form-control" placeholder="Descripcion de producto"></textarea>
          </div>
          <div class="form-group">
            <input type="number" name="precio" class="form-control" placeholder="Precio" autofocus>
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
          <div class="form-group">
            <input type="file" name="file">
          </div>
          <input type="submit" name="guardar_producto" class="btn btn-success btn-block" value="Guardar">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Marca</th>
            <th>Categoria</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM productos";
          $result_productos = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_productos)) { ?>
          <tr>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['descripcion']; ?></td>
            <td><?php echo $row['precio']; ?></td>
            <td><?php echo $row['marca_fk']; ?></td>
            <td><?php echo $row['categoria_fk']; ?></td>
            <td>
              <a href="editar_producto.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="borrar_producto.php?id=<?php echo $row['id']?>" class="btn btn-danger">
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
