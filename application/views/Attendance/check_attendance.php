<!-- Layout content -->
<div class="layout-content">

	<!-- Content -->
	<div class="container-fluid flex-grow-1 container-p-y">

		<h4 class="font-weight-bold py-1 mb-4">
			<span class="text-muted font-weight-light"><?php echo $pagetitle; ?></span>
			<?php echo $breadcrumb; ?>
		</h4>

		<div class="card mb-4">
         <h6 class="card-header">Check Attendance</h6>
			<div class="card-body">
				<div class="box-body row">
					<div class="form-group col-md-4">
						<label for="resign_date" class="form-label">Date</label>
						<div class="">
							<input type="date" id="check_date" name="attendance_date" value="<?php echo ($this->input->post('resign_date'))? $this->input->post('resign_date') : ""; ?>" class="form-control" id="resign_date" />
							<span class="text-danger"><?php echo form_error('attendance_date'); ?></span>
						</div>
					</div>
					
					
					<div class="form-group col-md-2">
                    <label for="resign_date" class="form-label"></label>
						<div class="">
							<button type="button" id="get_attendance" class="btn btn-success">Submit</button>
						</div>
					</div>

				
			</div>
            <div class="box-body row" id="load_report">

            </div>

		</div>
	</div>
</div>
<!-- / Content -->
