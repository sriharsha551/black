<!-- Layout content -->
<div class="layout-content">

	<!-- Content -->
	<div class="container-fluid flex-grow-1 container-p-y">

		<h4 class="font-weight-bold py-1 mb-4">
			<span class="text-muted font-weight-light"><?php echo $pagetitle; ?></span>
			<?php echo $breadcrumb; ?>
		</h4>

		<div class="card mb-4">
         <h6 class="card-header">Edit</h6>
			<div class="card-body">
			<div class="box-body">
			<?php echo form_open('employee_termination/edit/'.$employee_termination['id'],array("class"=>"form-row")); ?>
	<div class="form-group col-md-6">
		<label for="employee_id" class="form-label">Employee</label>
		<div class="">
			<select name="employee_id" class="custom-select">
				<option value="">select</option>
				<?php foreach($employee as $e) { ?>
					<option value="<?php echo $e['id'];?>" <?php echo ($employee_termination['employee_id'] ==  $e['id']) ? ' selected="selected"' : "";?>><?php echo $e["empName"];?></option>
				<?php }?> 
			</select>
		</div>
	</div>
	<div class="form-group col-md-6">
		<label for="termination_date" class="form-label">Termination Date</label>
		<div class="">
			<input type="text" id="datepicker-inline" name="termination_date" value="<?php echo ($this->input->post('termination_date') ? $this->input->post('termination_date') : $employee_termination['termination_date']); ?>" class="form-control" id="termination_date" />
		</div>
	</div>
	<div class="form-group col-md-6">
		<label for="termination_reason" class="form-label">Termination Reason</label>
		<div class="">
			<textarea name="termination_reason" class="form-control" id="termination_reason"><?php echo ($this->input->post('termination_reason') ? $this->input->post('termination_reason') : $employee_termination['termination_reason']); ?></textarea>
		</div>
	</div>
	
	<div class="form-group col-md-12">
		<div class="">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
	
<?php echo form_close(); ?>
</div>

		</div>
	</div>
</div>
<!-- / Content -->
