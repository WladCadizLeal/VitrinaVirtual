<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Listar Marcas</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('marca/add'); ?>" class="btn btn-success btn-sm">Agregar</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Nombre</th>
						<th>Descripcion</th>
						<th>Imagen</th>
						<th>Creado En</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($marcas as $m){ ?>
                    <tr>
						<td><?php echo $m['nombre']; ?></td>
						<td><?php echo $m['descripcion']; ?></td>
						<td><img src="<?php echo base_url($m['imagen']); ?>" height="100" width="150"/></td>
						<td><?php echo $m['creado_en']; ?></td>
						<td>
                            <a href="<?php echo site_url('marca/edit/'.$m['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span>Editar</a> 
                            <a href="<?php echo site_url('marca/remove/'.$m['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span>Borrar</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
