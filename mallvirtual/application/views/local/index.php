<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Listar Locales</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('local/add'); ?>" class="btn btn-success btn-sm">Agregar</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Nombre</th>
						<th>Descripcion</th>
						<th>Sucursal</th>
						<th>Telefono</th>
						<th>Imagen</th>
						<th>Creado En</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($locales as $l){ ?>
                    <tr>
						<td><?php echo $l['nombre']; ?></td>
						<td><?php echo $l['descripcion']; ?></td>
						<td><?php echo $l['sucursal']; ?></td>
						<td><?php echo $l['telefono']; ?></td>
						<td><img src="<?php echo base_url($l['imagen']); ?>" height="100" width="150"/></td>
						<td><?php echo $l['creado_en']; ?></td>
						<td>
                            <a href="<?php echo site_url('local/edit/'.$l['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span>Editar</a> 
                            <a href="<?php echo site_url('local/remove/'.$l['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span>Eliminar</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
