<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Editar Usuario</h3>
            </div>
			<?php echo form_open('usuario/edit/'.$usuario['id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="nombre" class="control-label">Nombre</label>
						<div class="form-group">
							<input type="text" name="nombre" value="<?php echo ($this->input->post('nombre') ? $this->input->post('nombre') : $usuario['nombre']); ?>" class="form-control" id="nombre" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="correo" class="control-label">Correo</label>
						<div class="form-group">
							<input type="email" name="correo" value="<?php echo ($this->input->post('correo') ? $this->input->post('correo') : $usuario['correo']); ?>" class="form-control" id="correo" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="contrasena" class="control-label">Contraseña</label>
						<div class="form-group">
							<input type="password" name="contrasena" value="<?php echo ($this->input->post('contrasena') ? $this->input->post('contrasena') : $usuario['contrasena']); ?>" class="form-control" id="contrasena" />
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