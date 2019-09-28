<!-- Layout content -->
<div class="layout-content">

	<!-- Content -->
	<div class="container-fluid flex-grow-1 container-p-y">

		<h4 class="font-weight-bold py-1 mb-4">
			<span class="text-muted font-weight-light"><?php echo $pagetitle; ?></span>
			<?php echo $breadcrumb; ?>
		</h4>

		<div class="card mb-4">
         <h6 class="card-header">Take Attendance</h6>
			<div class="card-body">
				<div class="box-body"><?php echo form_open('Employee_attendance/TakeAttendance',array("class"=>"form-row")); ?>

					<div class="form-group col-md-6">
						<label for="employee_id" class="form-label">Employee</label>
						<div class="">
							<select name="UID" class="custom-select">
								<option value="">select</option>
								<?php foreach($employee as $e) { ?>
									<option value="<?php echo $e['id'];?>"><?php echo $e["empName"];?></option>
								<?php }?> 
							</select>
							<span class="text-danger"><?php echo form_error('UID'); ?></span>
						</div>
					</div>
					<div class="form-group col-md-6">
						<label for="LOCATION" class="form-label">Location</label>
						<div class="">
							<select name="LOCATION" class="custom-select">
								<option value="">select</option>
								<option value="Office" selected>Office</option>
								<option value="Onsite">Onsite</option>
							</select>
							<span class="text-danger"><?php echo form_error('LOCATION'); ?></span>
						</div>
					</div>
					<div class="form-group col-md-4">
						<label for="resign_date" class="form-label">Date</label>
						<div class="">
							<input type="text" id="datepicker-inline" name="attendance_date" value="<?php echo ($this->input->post('resign_date'))? $this->input->post('resign_date') : ""; ?>" class="form-control" id="resign_date" />
							<span class="text-danger"><?php echo form_error('attendance_date'); ?></span>
						</div>
					</div>
					
					<div class="form-group col-md-4">
						<label for="resign_reason" class="form-label">Sign In Time</label>
						<div class="">
							<input type="text" id="flatpickr-time" name="sign_in" value="<?php echo ($this->input->post('sign_in')); ?>" class="form-control" />
							<span class="text-danger"><?php echo form_error('sign_in'); ?></span>
						</div>
					</div>
					<div class="form-group col-md-4">
						<label for="resign_reason" class="form-label">Sign Out Time</label>
						<div class="">
							<input type="text" id="flatpickr-time1" name="sign_out" value="<?php echo ($this->input->post('sign_out')); ?>" class="form-control" />
							<span class="text-danger"><?php echo form_error('sign_out'); ?></span>
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
