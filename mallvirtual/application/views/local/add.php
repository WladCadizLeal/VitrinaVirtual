<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Agregar Local</h3>
            </div>
            <?php echo form_open_multipart('local/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
				  	<div class="col-md-6">
						<label for="nombre" class="control-label">Nombre</label>
						<div class="form-group">
							<input type="text" name="nombre" value="<?php echo $this->input->post('nombre'); ?>" class="form-control" id="nombre" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="descripcion" class="control-label">Descripcion</label>
						<div class="form-group">
							<textarea name="descripcion" class="form-control" id="descripcion"><?php echo $this->input->post('descripcion'); ?></textarea>
						</div>
					</div>
					<div class="col-md-6">
						<label for="sucursal_fk" class="control-label">Sucursal</label>
						<div class="form-group">
							<select name="sucursal_fk" class="form-control">
								<option value="">Selecciona una Sucursal</option>
								<?php 
								foreach($all_sucursales as $sucursal)
								{
									$selected = ($sucursal['id'] == $this->input->post('sucursal_fk')) ? ' selected="selected"' : "";

									echo '<option value="'.$sucursal['id'].'" '.$selected.'>'.$sucursal['nombre'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="telefono_fk" class="control-label">Telefono</label>
						<div class="form-group">
							<select name="telefono_fk" class="form-control">
								<option value="">Selecciona un Telefono</option>
								<?php 
								foreach($all_telefonos as $telefono)
								{
									$selected = ($telefono['id'] == $this->input->post('telefono_fk')) ? ' selected="selected"' : "";

									echo '<option value="'.$telefono['id'].'" '.$selected.'>'.$telefono['numero'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="imagen" class="control-label">Imagen</label>
						<div class="form-group">
							<input type="file" name="file" value="<?php echo $this->input->post('imagen'); ?>" class="form-control" id="imagen" />
						</div>
					</div>
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i>Guardar
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>