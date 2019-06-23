<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Agregar Telefono</h3>
            </div>
            <?php echo form_open('telefono/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="dueno" class="control-label">Dueño</label>
						<div class="form-group">
							<input type="text" name="dueno" value="<?php echo $this->input->post('dueno'); ?>" class="form-control" id="dueno" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="numero" class="control-label">Numero</label>
						<div class="form-group">
							<input type="number" name="numero" value="<?php echo $this->input->post('numero'); ?>" class="form-control" id="numero" />
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