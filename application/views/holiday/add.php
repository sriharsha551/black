<!-- Layout content -->
<div class="layout-content">

	<!-- Content -->
	<div class="container-fluid flex-grow-1 container-p-y">

		<h4 class="font-weight-bold py-2 mb-4">
			<span class="text-muted font-weight-light"><?php echo $pagetitle; ?></span>
			<?php echo $breadcrumb; ?>
		</h4>

		<div class="card mb-4">
            <h6 class="card-header">add</h6>
			<div class="card-body">
				<div class="box-body">
                <?php echo form_open('holiday/add', array("class" => "form")); ?>
<div class="box-body">
							<div class="row clearfix">
                    <div class="col-md-6">
                        <label for="name" class="form-label"><span class="text-danger">*</span>Name</label>
                        <div class="form-group">
                            <input type="text" name="name" value="<?php echo $this->input->post('name'); ?>" class="form-control" id="name" />
                            <span class="text-danger"><?php echo form_error('name'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="holiday_date" class="form-label"><span class="text-danger">*</span>Holiday Date</label>
                        <div class="form-group">
                            <input type="text" name="holiday_date" value="<?php echo $this->input->post('holiday_date'); ?>" class="form-control" id="datepicker-inline" />
                            <span class="text-danger"><?php echo form_error('holiday_date'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-8">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </div>
  </div>  </div>
                <?php echo form_close(); ?>
                </div>

     		</div>
		</div>
	</div>
<!-- / Content -->
