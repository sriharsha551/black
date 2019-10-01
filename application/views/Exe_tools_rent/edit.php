
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
            		<?php echo form_open('Exe_tools_rent/edit/'.$tools_rent['id']); ?>
					<div class="row clearfix">
						<div class="col-md-6">
						<label for="prj_id" class="form-label"><span class="text-danger">*</span>Project</label>
						<div class='form-group'>
						<select class="form-control" name="prj_id" >
							        <?php foreach($prj_ids as $row) {?>
									  <option value='<?php echo $row->id?>' <?php echo (($this->input->post('prj_id') ? ($this->input->post('prj_id') == $row->id) : $row->id == $tools_rent['prj_id'])) ? 'selected="selected"' : "" ?> ><?php echo $row->name?></option>
							        <?php }?>
								</select>	
						<span class="text-danger"><?php echo form_error('prj_id');?></span>
						</div>
						</div>
						<div class="col-md-6">
							<label for="hire_start" class="form-label"><span class="text-danger">*</span>Hire Start Date</label>
							<div class="form-group">
								<input type="date" name="hire_start" value="<?php echo ($this->input->post('hire_start') ? $this->input->post('hire_start') : $tools_rent['hire_start']); ?>" class="form-control" id="hire_start" />
								<span class="text-danger"><?php echo form_error('hire_start');?></span>
							</div>
						</div>
						<div class="col-md-6">
							<label for="attach_link" class="form-label"><span class="text-danger">*</span>Hire End Date</label>
							<div class="form-group">
								<input type="date" name="hire_end" value="<?php echo ($this->input->post('hire_end') ? $this->input->post('hire_end') : $tools_rent['hire_end']); ?>" class="form-control" id="hire_end" />
								<span class="text-danger"><?php echo form_error('hire_end');?></span>
							</div>
						</div>
                        <div class="col-md-6">
							<label for="name" class="form-label"><span class="text-danger">*</span>Tool</label>
							<div class="form-group">
							<select class="form-control" name="tool_id" >
							        <?php foreach($tool_ids as $row) {?>
									  <option value='<?php echo $row->id?>' <?php echo (($this->input->post('tool_id') ? ($this->input->post('tool_id') == $row->id) : $row->id == $tools_rent['tool_id'])) ? 'selected="selected"' : "" ?> ><?php echo $row->tool_name?></option>

							        <?php }?>
								</select>	
								<span class="text-danger"><?php echo form_error('tool_id');?></span>
							</div>
						</div>
                        <div class="col-md-6">
							<label  class="form-label"><span class="text-danger">*</span>No Of Hours</label>
							<div class="form-group">
								<input type="text" name="no_of_hours" value="<?php echo ($this->input->post('no_of_hours') ? $this->input->post('no_of_hours') : $tools_rent['no_of_hours']); ?>" class="form-control" id="no_of_hours" />
								<span class="text-danger"><?php echo form_error('no_of_hours');?></span>
							</div>
                        </div>
					</div>
                        <div class="col-md-6">
							<label  class="form-label"><span class="text-danger">*</span>Remarks</label>
							<div class="form-group">
								<input type="text" name="remarks" value="<?php echo ($this->input->post('remarks') ? $this->input->post('remarks') : $tools_rent['remarks']); ?>" class="form-control" id="remarks" />
								<span class="text-danger"><?php echo form_error('remarks');?></span>
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
