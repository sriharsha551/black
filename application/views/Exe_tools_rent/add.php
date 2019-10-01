
<!-- Content -->
<!-- Layout content -->
<div class="layout-content">

	<!-- Content -->
	<div class="container-fluid flex-grow-1 container-p-y">

		<h4 class="font-weight-bold py-2 mb-4">
			<span class="text-muted font-weight-light"><?php echo $pagetitle; ?></span>
			<?php echo $breadcrumb;?>
		</h4>
    
		<div class="card mb-4">
            <h6 class="card-header">ADD</h6>
			<div class="card-body"> 
				<div class="box-body"> 
            		<?php echo form_open('Exe_tools_rent/add'); ?>
					<div class="row clearfix">
						<div class="col-md-6">
						<label for="prj_id" class="form-label"><span class="text-danger">*</span>Project</label>
						<div class='form-group'>
						<select class="form-control" name="prj_id">
							<option value=''>select project</option>
							<?php foreach($prj_ids as $row) {?>
  							<option value='<?php echo $row->id?>'><?php echo $row->name?></option>
							<?php }?>
						</select>
						<span class="text-danger"><?php echo form_error('prj_id');?></span>
						</div>
						</div>
						<div class="col-md-6">
							<label for="tool_id" class="form-label"><span class="text-danger">*</span>Tool</label>
							<div class="form-group">
							<select class="form-control" name="tool_id">
							<option value=''>select tool</option>
							<?php foreach($tool_ids as $row) {?>
  							<option value='<?php echo $row->id?>'><?php echo $row->tool_name?></option>
							<?php }?>
						    </select>		
							<span class="text-danger"><?php echo form_error('tool_id');?></span>
							</div>
						</div>
						<div class="col-md-6">
							<label for="attach_link" class="form-label"><span class="text-danger">*</span>Hire Start Date</label>
							<div class="form-group">
								<input type="date" name="hire_start" value="<?php echo $this->input->post('hire_start'); ?>" class="form-control" id="hire_start" />
								<span class="text-danger"><?php echo form_error('hire_start');?></span>
							</div>
						</div>
						<div class="col-md-6">
							<label for="no_of_hours" class="form-label"><span class="text-danger">*</span>Number Of Hours</label>
							<div class="form-group">
								<input type="text" name="no_of_hours" value="<?php echo $this->input->post('no_of_hours'); ?>" class="form-control" id="no_of_hours" />
								<span class="text-danger"><?php echo form_error('no_of_hours');?></span>
							</div>
                        </div>
                        <div class="col-md-6">
							<label for="remarks" class="form-label"><span class="text-danger">*</span>Remarks</label>
							<div class="form-group">
								<input type="text" name="remarks" value="<?php echo $this->input->post('remarks'); ?>" class="form-control" id="remarks" />
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



							