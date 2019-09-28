<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Layout content -->
<div class="layout-content">

	<!-- Content -->
	<div class="container-fluid flex-grow-1 container-p-y">

		<h4 class="font-weight-bold py-1 mb-4">
			<span class="text-muted font-weight-light"><?php echo $pagetitle; ?></span>
			<?php echo $breadcrumb; ?>
		</h4>

		<div class="card mb-4">
        <h6 class="card-header">View</h6>
			<div class="card-body">
				<div class="col-md-12">
                <div class="box-body">
                    <div class="row clearfix">
                        <div class="col-md-6">                            
                            <div class="form-group">
                                <label for="candidate_name" class="control-label"><strong>Status</strong></label><span> : </span>
                                <?php if($project['status']==0) echo "On hold"; else if($project['status']==1) echo "On process"; else if($project['status']==2) echo "completed"; else if($project['status']==3) echo "cancelled"; ?>
                            </div>
                        </div>
                        <div class="col-md-6">                            
                            <div class="form-group">
                            <label for="date_of_interview" class="control-label"><strong>Client</strong></label><span> : </span><?php echo $project['client'];?></div>
                        </div>
                        <div class="col-md-6">                            
                            <div class="form-group">
                            <label for="" class="control-label"><strong>Project</strong></label><span> : </span><?php echo $project['project'];?></div>
                        </div>
                        <div class="col-md-6">                            
                            <div class="form-group">
                            <label for="" class="control-label"><strong>Place</strong></label><span> : </span><?php echo $project['place'];?></div>
                        </div>

                        <div class="col-md-6">                            
                            <div class="form-group">
                            <label for="" class="control-label"><strong>Enquirey Number</strong></label><span> : </span><?php echo $project['enquiry_no'];?></div>
                        </div>
                        <div class="col-md-6">                            
                            <div class="form-group">
                            <label for="" class="control-label"><strong>Project Number</strong></label><span> : </span><?php echo $project['project_no'];?></div>
                        </div>
                        
                        <div class="col-md-6">                            
                            <div class="form-group">
                            <label for="" class="control-label"><strong>Contact </strong></label><span> : </span><?php echo $project['mobile1'];?>, <?php echo $project['mobile2'];?></div>
                        </div>
                        <div class="col-md-6">                            
                            <div class="form-group">
                            <label for="" class="control-label"><strong>Date</strong></label><span> : </span><?php echo date("d-m-Y",strtotime($project['project_date']));?></div>
                        </div>
                        <div class="col-md-6">                            
                            <label for="" class="control-label"><strong>Discription </strong></label>
                            <div class="form-group">
                            <?php echo $project['discription'];?></div>
                        </div>
                        <div class="col-md-6">                            
                            <label for="" class="control-label"><strong>Address</strong></label>
                            <div class="form-group">
                            <?php echo $project['address'];?></div>
                        </div>
                             
			</div>
            </div>
		</div>
	</div>


</div>
<!-- / Content -->