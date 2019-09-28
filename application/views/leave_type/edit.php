<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Layout content -->
<div class="layout-content">

	<!-- Content -->
	<div class="container-fluid flex-grow-1 container-p-y">

		<h4 class="font-weight-bold py-2 mb-4">
			<span class="text-muted font-weight-light"><?php echo $pagetitle; ?></span>
			<?php echo $breadcrumb; ?>
		</h4>

		<div class="card mb-4">
         <h6 class="card-header">Edit</h6>
			<div class="card-body">
				<?php echo form_open('leave_type/edit/'.$leave_type['id'],array("class"=>"form")); ?>
<div class="box-body">
							<div class="row clearfix">
	<div class="col-md-6">
		<label for="leaveType" class="form-label"><span class="text-danger">*</span>Leave Type</label>
		<div class="form-group">
			<input type="text" name="leaveType" value="<?php echo ($this->input->post('leaveType') ? $this->input->post('leaveType') : $leave_type['leaveType']); ?>" class="form-control" id="leaveType" />
			<span class="text-danger"><?php echo form_error('leaveType');?></span>
		</div>
	</div>
	<div class="col-md-6">
		<label for="noOfLeaves" class="form-label"><span class="text-danger">*</span>No Of Leaves</label>
		<div class="form-group">
			<input type="text" name="noOfLeaves" value="<?php echo ($this->input->post('noOfLeaves') ? $this->input->post('noOfLeaves') : $leave_type['noOfLeaves']); ?>" class="form-control" id="noOfLeaves" />
			<span class="text-danger"><?php echo form_error('noOfLeaves');?></span>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
	</div>
			</div>
<?php echo form_close(); ?>
</div>
			</div>
		</div>
	</div>


</div>
<!-- / Content -->