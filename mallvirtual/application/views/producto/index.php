<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Listar Productos</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('producto/add'); ?>" class="btn btn-success btn-sm">Agregar</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Nombre</th>
						<th>Descripcion</th>
						<th>Precio</th>
						<th>Marca</th>
                        <th>Categoria</th>
                        <th>Local</th>
						<th>Imagen</th>
						<th>Creado En</th>
						<th>Acciones</th>
                    </tr>
                    <?php foreach($productos as $p){ ?>
                    <tr>
						<td><?php echo $p['nombre']; ?></td>
						<td><?php echo $p['descripcion']; ?></td>
						<td>$<?php echo number_format($p['precio'], 0, ".", "."); ?></td>
						<td><?php echo $p['marca']; ?></td>
                        <td><?php echo $p['categoria']; ?></td>
                        <td><?php echo $p['local']; ?></td>
						<td><img src="<?php echo base_url($p['imagen']); ?>" height="100" width="150"/></td>
						<td><?php echo $p['creado_en']; ?></td>
						<td>
                            <a href="<?php echo site_url('producto/edit/'.$p['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span>Editar</a> 
                            <a href="<?php echo site_url('producto/remove/'.$p['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span>Borrar</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
