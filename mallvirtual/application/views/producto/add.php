<div class="row">
	<div class="col-md-12">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Agregar Producto</h3>
			</div>
			<?php echo form_open_multipart('producto/add'); ?>
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
						<label for="precio" class="control-label">Precio</label>
						<div class="form-group">
							<input type="number" name="precio" value="<?php echo $this->input->post('precio'); ?>" class="form-control" id="precio" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="marca_fk" class="control-label">Marca</label>
						<div class="form-group">
							<select name="marca_fk" class="form-control">
								<option value="">Selecciona una Marca</option>
								<?php
								foreach ($all_marcas as $marca) {
									$selected = ($marca['id'] == $this->input->post('marca_fk')) ? ' selected="selected"' : "";

									echo '<option value="' . $marca['id'] . '" ' . $selected . '>' . $marca['nombre'] . '</option>';
								}
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="categoria_fk" class="control-label">Categoria</label>
						<div class="form-group">
							<select name="categoria_fk" class="form-control">
								<option value="">Selecciona una Categoria</option>
								<?php
								foreach ($all_categorias as $categoria) {
									$selected = ($categoria['id'] == $this->input->post('categoria_fk')) ? ' selected="selected"' : "";

									echo '<option value="' . $categoria['id'] . '" ' . $selected . '>' . $categoria['nombre'] . '</option>';
								}
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="local_fk" class="control-label">Local</label>
						<div class="form-group">
							<select name="local_fk" class="form-control">
								<option value="">Selecciona un Local</option>
								<?php
								foreach ($all_locales as $local) {
									$selected = ($local['id'] == $this->input->post('local_fk')) ? ' selected="selected"' : "";

									echo '<option value="' . $local['id'] . '" ' . $selected . '>' . $local['nombre'] . '</option>';
								}
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="destacado" class="control-label">Destacado</label>
						<div class="form-group">
							<select name="destacado" class="form-control">
								<option value=null>No</option>
								<option value="1">Si</option>
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
				</button>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>