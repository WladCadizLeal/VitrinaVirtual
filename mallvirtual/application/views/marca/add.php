<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Agregar Marca</h3>
            </div>
            <?php echo form_open_multipart('marca/add'); ?>
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