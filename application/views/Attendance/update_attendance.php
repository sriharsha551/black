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
				<div class="box-body">
                <form method="post" class="form-row">

					<div class="form-group col-md-6">
						<label for="employee_id" class="form-label">Employee</label>
						<div class="">
							<select name="UID" class="custom-select">
								<option value="">select</option>
								<?php foreach($employee as $e) {
                                    $selected = ($attended->UID == $e['id'])? "selected" : ""; ?>
									<option value="<?php echo $e['id'];?>" <?php echo $selected;?>><?php echo $e["empName"];?></option>
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
								<option value="Office" <?php echo ($attended->LOCATION == "Office")? "selected" : "";?>>Office</option>
								<option value="Onsite" <?php echo ($attended->LOCATION == "Onsite")? "selected" : "";?>>Onsite</option>
							</select>
							<span class="text-danger"><?php echo form_error('LOCATION'); ?></span>
						</div>
					</div>
					<div class="form-group col-md-4">
						<label for="resign_date" class="form-label">Date</label>
						<div class="">
							<input type="text" id="datepicker-inline" name="attendance_date" value="<?php echo ($attended->ATTENDANCE_TAKEN_DATE)? date("m/d/Y", strtotime($attended->ATTENDANCE_TAKEN_DATE)) : ""; ?>" class="form-control" id="resign_date" />
							<span class="text-danger"><?php echo form_error('attendance_date'); ?></span>
						</div>
					</div>
					
					<div class="form-group col-md-4">
						<label for="resign_reason" class="form-label">Sign In Time</label>
						<div class="">
							<input type="text" id="flatpickr-time" name="sign_in" value="<?php echo date("H:M",strtotime(($attended->SIGN_IN))); ?>" class="form-control" />
							<span class="text-danger"><?php echo form_error('sign_in'); ?></span>
						</div>
					</div>
					<div class="form-group col-md-4">
						<label for="resign_reason" class="form-label">Sign Out Time</label>
						<div class="">
							<input type="text" id="flatpickr-time1" name="sign_out" value="<?php echo ($attended->SIGN_OUT)? $attended->SIGN_OUT : ""; ?>" class="form-control" />
							<span class="text-danger"><?php echo form_error('sign_out'); ?></span>
						</div>
					</div>
					
					<div class="form-group col-md-12">
						<div class="">
							<button type="submit" name="submit" class="btn btn-success">Save</button>
						</div>
					</div>

				<?php echo form_close(); ?>
			</div>

		</div>
	</div>
</div>
<!-- / Content -->
