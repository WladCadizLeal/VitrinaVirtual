<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Listar Productos Destacados</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('producto_destacado/add'); ?>" class="btn btn-success btn-sm">Agregar</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Nombre</th>
						<th>Producto</th>
						<th>Creado En</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($productos_destacados as $p){ ?>
                    <tr>
                        <td><?php echo $p['nombre']; ?></td>
                        <td><?php echo $p['producto']; ?></td>
						<td><?php echo $p['creado_en']; ?></td>
						<td>
                            <a href="<?php echo site_url('producto_destacado/edit/'.$p['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span>Editar</a> 
                            <a href="<?php echo site_url('producto_destacado/remove/'.$p['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span>Borrar</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
