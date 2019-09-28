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
            <h6 class="card-header">Add</h6>
			<div class="card-body">
				
                <?php echo form_open('Leave/apply',array("class"=>"form")); ?>
<div class="box-body">
							<div class="row clearfix">
                <div class="col-md-6">
                    <label for="LeaveType" class="form-label"><span class="text-danger">*</span>Leave Type</label>
                    <div class="form-group">
                    <select name="LeaveType" required class="form-control" id="LeaveType">
                        <option value="">Select</option>
                        <?php foreach($leave_types as $lt){ ?>
                            <option value="<?php echo $lt['id']; ?>"><?php echo $lt['leaveType']; ?></option>
                        <?php } ?>
                    </select>
                        
                        <span class="text-danger"><?php echo form_error('LeaveType');?></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="ToDate" class="form-label"><span class="text-danger">*</span>Date</label>
                    <div class="form-group input-daterange input-group" id="datepicker-range">
                        <input type="text" class="form-control" name="FromDate" value="<?php echo $this->input->post('FromDate'); ?>">
                        <div class="input-group-prepend">
                            <span class="input-group-text">to</span>
                        </div>
                        <input type="text" class="form-control" name="ToDate" value="<?php echo $this->input->post('ToDate'); ?>" >
                    </div>

                   
                </div>
                
                <div class="col-md-12">
                    <label for="Description" class="col-md-4 control-label"><span class="text-danger">*</span>Description</label>
                    <div class="form-group">
                        <textarea name="Description" class="form-control" id="Description"><?php echo $this->input->post('Description'); ?></textarea>
                        <span class="text-danger"><?php echo form_error('Description');?></span>
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