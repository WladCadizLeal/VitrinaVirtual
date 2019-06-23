<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Listar Categorias</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('categoria/add'); ?>" class="btn btn-success btn-sm">Agregar</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>ID</th>
						<th>Nombre</th>
						<th>Descripcion</th>
						<th>Creado En</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($categorias as $c){ ?>
                    <tr>
						<td><?php echo $c['id']; ?></td>
						<td><?php echo $c['nombre']; ?></td>
						<td><?php echo $c['descripcion']; ?></td>
						<td><?php echo $c['creado_en']; ?></td>
						<td>
                            <a href="<?php echo site_url('categoria/edit/'.$c['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span>Editar</a> 
                            <a href="<?php echo site_url('categoria/remove/'.$c['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span>Borrar</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
