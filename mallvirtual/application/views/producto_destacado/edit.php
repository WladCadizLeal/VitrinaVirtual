<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Producto Destacado Edit</h3>
            </div>
			<?php echo form_open('producto_destacado/edit/'.$producto_destacado['id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="producto_fk" class="control-label">Producto</label>
						<div class="form-group">
							<select name="producto_fk" class="form-control">
								<option value="">select producto</option>
								<?php 
								foreach($all_productos as $producto)
								{
									$selected = ($producto['id'] == $producto_destacado['producto_fk']) ? ' selected="selected"' : "";

									echo '<option value="'.$producto['id'].'" '.$selected.'>'.$producto['nombre'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="nombre" class="control-label">Nombre</label>
						<div class="form-group">
							<input type="text" name="nombre" value="<?php echo ($this->input->post('nombre') ? $this->input->post('nombre') : $producto_destacado['nombre']); ?>" class="form-control" id="nombre" />
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