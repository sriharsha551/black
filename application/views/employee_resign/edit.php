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
			<?php echo form_open('employee_resign/edit/'.$employee_resign['id'],array("class"=>"form-row")); ?>

	<div class="form-group col-md-6">
		<label for="employee_id" class="form-label">Employee</label>
		<div class="">
			<select name="employee_id" class="custom-select">
				<option value="">select</option>
				<?php foreach($employee as $e) { ?>
					<option value="<?php echo $e['id'];?>" <?php echo ($employee_resign['employee_id'] ==  $e['id']) ? ' selected="selected"' : "";?>><?php echo $e["empName"];?></option>
				<?php }?> 
			</select>
		</div>
	</div>
	<div class="form-group col-md-6">
		<label for="resign_date" class="form-label">Resign Date</label>
		<div class="">
			<input type="text" id="datepicker-inline" name="resign_date" value="<?php echo ($this->input->post('resign_date') ? $this->input->post('resign_date') : $employee_resign['resign_date']); ?>" class="form-control" id="resign_date" />
		</div>
	</div>
	<div class="form-group col-md-6">
		<label for="resign_reason" class="form-label">Resign Reason</label>
		<div class="">
			<textarea name="resign_reason" class="form-control" id="resign_reason"><?php echo ($this->input->post('resign_reason') ? $this->input->post('resign_reason') : $employee_resign['resign_reason']); ?></textarea>
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
