<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Agregar Producto Destacado</h3>
            </div>
            <?php echo form_open('producto_destacado/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="nombre" class="control-label">Nombre</label>
						<div class="form-group">
							<input type="text" name="nombre" value="<?php echo $this->input->post('nombre'); ?>" class="form-control" id="nombre" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="producto_fk" class="control-label">Producto</label>
						<div class="form-group">
							<select name="producto_fk" class="form-control">
								<option value="">Selecciona un Producto</option>
								<?php 
								foreach($all_productos as $producto)
								{
									$selected = ($producto['id'] == $this->input->post('producto_fk')) ? ' selected="selected"' : "";

									echo '<option value="'.$producto['id'].'" '.$selected.'>'.$producto['nombre'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i>Guardar
            	</button>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>