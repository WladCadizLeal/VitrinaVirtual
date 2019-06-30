<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Listar Sucursales</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('sucursal/add'); ?>" class="btn btn-success btn-sm">Agregar</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Nombre</th>
						<th>Direccion</th>
						<th>Imagen</th>
						<th>Creado En</th>
						<th>Acciones</th>
                    </tr>
                    <?php foreach($sucursales as $s){ ?>
                    <tr>
						<td><?php echo $s['nombre']; ?></td>
						<td><?php echo $s['direccion']; ?></td>
						<td><img src="<?php echo base_url($s['imagen']); ?>" height="100" width="150"/></td>
						<td><?php echo $s['creado_en']; ?></td>
						<td>
                            <a href="<?php echo site_url('sucursal/edit/'.$s['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span>Editar</a> 
                            <a href="<?php echo site_url('sucursal/remove/'.$s['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span>Borrar</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
