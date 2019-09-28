
<!-- Content -->
<!-- Layout content -->
<div class="layout-content">

	<!-- Content -->
	<div class="container-fluid flex-grow-1 container-p-y">

		<h4 class="font-weight-bold py-2 mb-4">
			<span class="text-muted font-weight-light"><?php echo $pagetitle; ?></span>
			<?php echo $breadcrumb; ?>
		</h4>
    
		<div class="card mb-4">
            <h6 class="card-header">ADD</h6>
			<div class="card-body"> 
				<div class="box-body"> 
            		<?php echo form_open('SiteVisit/add'); ?>
					
					<div class="row clearfix">
						<div class="col-md-6">
						<label class="form-label">Project Name</label>
						<select class="custom-select" name="project_id" required>
						<option value="">Select Project</option>
						<?php foreach($PROJECTS as $project){?>
                			<option value="<?=$project->id;?>"><?=$project->name;?></option>    
        				<?php }?>
						</select>
						</div>
						<div class="form-group col-md-6">
						<label class="form-label">Date</label>
						<input type="date" class="form-control" placeholder="Select Date" name="date" value="" required>
						</div>
						<div class="form-group col-md-6">
						<label class="form-label">Time</label>
							<input type="time" class="form-control" placeholder="Select Date" name="time" value="" required>
						</div>
						<div class="form-group col-md-6">	
							<label class="form-label">Employee Name</label>
						<select class="custom-select" name="emp" required>
						<option value="">Select Employee</option>
						<?php foreach($EMPLOYEES as $employee){?>
                			<option value="<?=$employee->id;?>"><?=$employee->empName;?></option>    
        				<?php }?>
						</select>
						</div>
						<div class="form-group col-md-6">
							<label for="name" class="form-label">Remarks</label>
								<input type="text" name="remarks" value="<?php echo $this->input->post('remarks'); ?>" class="form-control" id="name" />
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
