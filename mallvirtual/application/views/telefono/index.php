<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Listar Telefonos</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('telefono/add'); ?>" class="btn btn-success btn-sm">Agregar</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Dueño</th>
						<th>Numero</th>
						<th>Creado En</th>
						<th>Acciones</th>
                    </tr>
                    <?php foreach($telefonos as $t){ ?>
                    <tr>
						<td><?php echo $t['dueno']; ?></td>
						<td><?php echo $t['numero']; ?></td>
						<td><?php echo $t['creado_en']; ?></td>
						<td>
                            <a href="<?php echo site_url('telefono/edit/'.$t['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span>Editar</a> 
                            <a href="<?php echo site_url('telefono/remove/'.$t['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span>Eliminar</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
