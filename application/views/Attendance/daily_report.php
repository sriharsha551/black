<!-- Layout content -->
<div class="layout-content">

	<!-- Content -->
	<div class="container-fluid flex-grow-1 container-p-y">

		<h4 class="font-weight-bold py-1 mb-4">
			<span class="text-muted font-weight-light"><?php echo $pagetitle; ?></span>
			<?php echo $breadcrumb; ?>
		</h4>

		<div class="card mb-4">
         <h6 class="card-header">Daily Report</h6>
			<div class="card-body">
				<div class="box-body row">
                    <div class="form-group col-md-5">
						<label for="from_date" class="form-label">From Date</label>
						<div class="">
							<input type="date" id="from_date" name="from_date" value="<?php echo $this->input->post('from_date'); ?>" class="form-control" id="from_date" />
							<span class="text-danger"><?php echo form_error('from_date'); ?></span>
						</div>
					</div>
					<div class="form-group col-md-5">
						<label for="to_date" class="form-label">To Date</label>
						<div class="">
							<input type="date" id="to_date" name="to_date" value="<?php echo $this->input->post('to_date'); ?>" class="form-control" id="to_date" />
							<span class="text-danger"><?php echo form_error('to_date'); ?></span>
						</div>
					</div>
					
					
					<div class="form-group col-md-2">
                        <label for="" class="form-label"></label>
						<div class="">
							<button type="button" id="get_report" class="btn btn-success">Submit</button>
						</div>
                    </div>
                </div>
                <div class="box-body row" id="load_report">

                </div>   
			</div>

		</div>
	</div>
</div>
<!-- / Content -->
