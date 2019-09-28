<!-- Content -->
<div class="container-fluid flex-grow-1 container-p-y">

<h4 class="font-weight-bold py-2 mb-4">
	<span class="text-muted font-weight-light"><?php echo $pagetitle; ?></span>
	<?php echo $breadcrumb; ?>
</h4>
      	<div class="card mb-4">
          <h6 class="card-header">SiteVisit Edit</h6>
            
            <div class="box card">
                                    <div class="card-body"> 
                                    	<div class="box-body"> 
			<?php echo form_open('SiteVisit/edit/'.$sitevisit['id']); ?>
		
				<div class="row clearfix">
				<div class="form-group col-md-6">
					<label class="form-label">ProjectId</label>
						<select class="custom-select" name="project_id" required>
						<option value="<?= $sitevisit['project_id'];?>" ><?= $sitevisit['project_name'];?></option>
						<?php foreach($PROJECTS as $project){?>
                			<option value="<?=$project->id;?>"><?=$project->name;?></option>    
        				<?php }?>
						</select>
						</div>
						<div class="form-group col-md-6">
						<label class="form-label">Date</label>
						<input type="date" class="form-control" placeholder="Select Date" name="date" value="<?php echo ($this->input->post('date') ? $this->input->post('date') : $sitevisit['site_visit_date']); ?>" id="date">
						</div>
						<div class="form-group col-md-6">
						<label class="form-label">Time</label>
							<input type="time" class="form-control" placeholder="Select Time" name="time" value="<?php echo ($this->input->post('time') ? $this->input->post('time') : $sitevisit['site_visit_time']); ?>"  >
						</div>
						<div class="form-group col-md-6">	
							<label class="form-label">EmployeeId</label>
						<select class="custom-select" name="emp" required>
						<option value="<?=$sitevisit['site_engineer_id']?>" ><?=$sitevisit['Employee_name']?></option>
						<?php foreach($EMPLOYEES as $employee){?>
                			<option value="<?=$employee->id;?>"><?=$employee->empName;?></option>    
        				<?php }?>
						</select>
						</div>
						<div class="col-md-6">
						<label for="name" class="control-label">Remarks</label>
						<div class="form-group">
							<input type="text" name="remarks" value="<?php echo ($this->input->post('remarks') ? $this->input->post('remarks') : $sitevisit['remarks']); ?>" class="form-control" id="name" />
							<span class="text-danger"><?php echo form_error('name');?></span>
						</div>
					</div>

				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Save
				</button>
	        </div>				
			<?php echo form_close(); ?>
		</div>  </div></div>
        


</div>
<!-- / Content -->