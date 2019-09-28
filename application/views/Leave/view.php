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
            <h6 class="card-header">View</h6>
			<div class="card-body">              
                <div class="form-group">
                    <label for="LeaveType" class="col-md-4 control-label"><strong>Employee Name</strong> : Srikanthi</label>
                    <div class="col-md-8">                   
    
                    </div>
                </div>
                <div class="form-group">
                    <label for="LeaveType" class="col-md-4 control-label"><strong>Leave Type</strong> : <?php echo $leave['leaveType'];?></label>
                    <div class="col-md-8">
                    
    
                    </div>
                </div>
                <div class="form-group">
                    <label for="ToDate" class="col-md-4 control-label"><strong>Date</strong> <?php echo date("d-m-Y",strtotime($leave['FromDate']));?> To <?php echo date("d-m-Y",strtotime($leave['ToDate']));?></label>
                    <div class="col-md-8 input-daterange input-group" id="datepicker-range">
                        
                    </div>

                   
                </div>
                
                <div class="form-group">
                    <label for="Description" class="col-md-4 control-label"><strong>Description :</strong> <?php echo $leave['Description'];?></label>
                    
                </div>

                <?php if ($this->ion_auth->is_admin()) {?>
                    <?php echo form_open('leave/update_status/'.$leave['id']); ?>
                    <div class="form-group">
                    <!--  <label for="status" class="col-md-4 control-label"><strong>Status :</strong> </label> -->
                        <div class="col-md-4">
                        <select name="Status" required class="form-control" id="Status">
                            <option value="0" <?php echo ($leave['Status'] == 0) ? ' selected="selected"' : "";?>>Pending</option>
                            <option value="1" <?php echo ($leave['Status'] == 1) ? ' selected="selected"' : "";?>>Accepted</option>
                            <option value="2" <?php echo ($leave['Status'] == 2) ? ' selected="selected"' : "";?>>Declined</option>
                        </select>
                        
                        </div>
                        
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-8">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </div>

                    <?php echo form_close(); ?>
                <?php }
                else{?>
                    <div class="form-group">
                        <label for="Description" class="col-md-4 control-label"><strong>Status :</strong> <?php if($leave['Status']=="0") echo "Pending"; else if($leave['Status']=="1") echo "Approved"; ?></label>
                        
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-8">
                            <a href="<?php echo site_url('Leave/index'); ?>"  class="btn btn-success">Back</a>
                        </div>
                    </div>
                <?php
                }
                    
                    
                    ?>

                </div>
			</div>
		</div>
	</div>


</div>
<!-- / Content -->