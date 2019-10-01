
<!-- Content -->
<div class="container-fluid flex-grow-1 container-p-y">

<h4 class="font-weight-bold py-2 mb-4">
	<span class="text-muted font-weight-light"><?php echo $pagetitle; ?></span>
	<?php echo $breadcrumb;?>
</h4>
<div class="card mb-4">
            <h6 class="card-header">Edit</h6>
			<div class="card-body"> 
				<div class="box-body"> 
            		<?php echo form_open('Exe_client_request/edit/'.$request['id']); ?>
					<div class="row clearfix">
						<div class="col-md-6">
						<label for="prj_id" class="form-label"><span class="text-danger">*</span>Project</label>
						<div class='form-group'>
						<select class="form-control" name="prj_id" >
							        <?php foreach($prj_ids as $row) {?>
									  <option value='<?php echo $row->id?>' <?php echo (($this->input->post('prj_id') ? ($this->input->post('prj_id') == $row->id) : $row->id == $request['prj_id'])) ? 'selected="selected"' : "" ?> ><?php echo $row->name?></option>

							        <?php }?>
								</select>	
						<span class="text-danger"><?php echo form_error('prj_id');?></span>
						</div>
						</div>
						<div class="col-md-6">
							<label for="date_req" class="form-label"><span class="text-danger">*</span>Date</label>
							<div class="form-group">
								<input type="date" name="date_req" value="<?php echo ($this->input->post('date_req') ? $this->input->post('date_req') : $request['date_req']); ?>" class="form-control" id="date_req" />
								<span class="text-danger"><?php echo form_error('date_req');?></span>
							</div>
						</div>
						<div class="col-md-6">
							<label  class="form-label"><span class="text-danger">*</span>Material</label>
							<div class="form-group">
							<select class="form-control" name="material_id" >
							        <?php foreach($material_ids as $row) {?>
									  <option value='<?php echo $row->id?>' <?php echo (($this->input->post('material_id') ? ($this->input->post('material_id') == $row->id) : $row->id == $request['material_id'])) ? 'selected="selected"' : "" ?> ><?php echo $row->material_name?></option>
							        <?php }?>
								</select>
								<span class="text-danger"><?php echo form_error('material_id');?></span>
							</div>
                        </div>
                        <div class="col-md-6">
							<label  class="form-label"><span class="text-danger">*</span>Quantity</label>
							<div class="form-group">
								<input type="text" name="quantity" value="<?php echo ($this->input->post('quantity') ? $this->input->post('quantity') : $request['quantity']); ?>" class="form-control" id="quantity" />
								<span class="text-danger"><?php echo form_error('quantity');?></span>
							</div>
                        </div>
					</div>
					
					<div class="box-footer">
						<button type="submit" class="btn btn-success">
							<i class="fa fa-check"></i> Save
						</button>
					</div>
            		<?php echo form_close(); ?>
      			</div>
        
     		</div>
		</div>    
	</div>
<!-- / Content -->
