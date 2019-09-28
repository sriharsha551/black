<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Layout content -->
<div class="layout-content">

    <!-- Content -->
    <div class="container-fluid flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-1 mb-4">
            <span class="text-muted font-weight-light"><?php echo $pagetitle; ?></span>
            <?php echo $breadcrumb; ?>
        </h4>

        <!-- <div class="card mb-4"> -->
    <form method="post">
        <div class="nav-tabs-top">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#user-add-account">Details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#user-add-info">Employees</a>
                </li>
				<li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#points">Points</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="user-add-account">
                    <div class="card-body memo_block">                         
                        <div class="form-group col-md-6">
                            <label class="form-label">MOM Id</label>
                            <input type="text" class="form-control" placeholder="" name="meeting_id" value="<?php echo $mom["meeting_id"];?>" required>
                        </div>
						<div class="form-group col-md-6">
                            <label class="form-label">Project</label>
                            <select class="custom-select" name="project_id">  
                                <option value="">Select</option>
                                <?php foreach($projects as $project) {
                                    $selected = ($project['id'] == $mom["project_id"]) ? "selected": "";?>
                                    <option value="<?php echo $project['id'];?>" <?php echo $selected;?>> <?php echo $project['project'];?></option>
                                    <?php 
                                }?>                  
                                                
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Date</label>
                            <input type="date" class="form-control" placeholder="Select Date" name="meeting_date" value="<?php echo $mom["meeting_date"];?>" required>
                        </div>
						<div class="form-group col-md-3">
                            <label class="form-label">From Time</label>
                            <input type="text" class="form-control" placeholder="From " name="start_time" value="<?php echo $mom["start_time"];?>" required id = "flatpickr-time">
							
                        </div>
						<div class="form-group col-md-3">
							<label class="form-label">To Time</label>
							<input type="text" class="form-control" placeholder="To " name="end_time" value="<?php echo $mom["end_time"];?>" required id = "flatpickr-time1">
                        </div>
						<div class="form-group col-md-6">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" placeholder="" name="title" value="<?php echo $mom["title"];?>" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Location</label>
                            <input type="text" class="form-control" placeholder="Location" name="location" value="<?php echo $mom["location"];?>" required>
                        </div>
                                                     
                    </div>
                </div>
                <div class="tab-pane fade" id="user-add-info">
                    <h6 class="card-header">
                        <label class="custom-control custom-checkbox m-0">
                            <input type="checkbox" name="all_employees" id="all_employees" class="custom-control-input" value=""/>
                            <span class="custom-control-label">Check all Employees</span>
                        </label>
                        
                    </h6>
                    <div class="card-body pb-2 memo_block">                                 
                    <?php 
                            $dep = "";
                            foreach($employees as $employee){
                                if($dep!=$employee['department'])
                                {?>
                                    <div class="form-group col-md-12">
                                        <b><?php echo $employee['department'];?></b>
                                    </div>
                                    <?php
                                    $dep = $employee['department'];
                                }
                                ?> 
                                <div class="form-group col-md-3">
                                    <label class="custom-control custom-control-inline custom-checkbox">
                                        <input name="employees[]"  type="checkbox" class="custom-control-input" value="<?php echo $employee['id'];?>"  <?php if (in_array($employee['id'], $memo_employees)) { echo "checked"; } ?> >
                                        <span class="custom-control-label"><?php echo ucwords($employee['empName']);?></span>

                                    </label>    
                                    </label>
                                                    
                                </div>
                                <?php
                            }?>
                        
                    </div>
                </div>
				<div class="tab-pane fade " id="points">
                    <h6 class="card-header">
                        Points for discussion
                        <a  href="javascript:void(0);" id="add_point" class="btn btn-warning btn-xs float-right mb-2" title="Add another point"><span class="ion ion-md-add-circle"></span></a>
                    </h6>
                    <div class="row card-body pb-2 memo_block" id="discussion_block">  
                    <?php 
                    foreach($mom_points as $point){?> 
                        <div class="col-md-12"  >
							<div class="form-group col-md-4">  		                     
								<textarea class="form-control" placeholder="points" name="points[]" required rows=3><?php echo $point["points"];?></textarea>	
							</div>
							<div class="form-group col-md-4">
								<textarea class="form-control" placeholder="recommenation" name="recommenation[]" required rows=3><?php echo $point["recommenation"];?></textarea>	
								
							</div>
							<div class="form-group col-md-3">
							    <select class="form-control mb-2" name="assigned_to[]">
								<option value="">Select</option>
								<?php 
									$dep = "";
									foreach($employees as $employee){
                                        $selected = ($employee['id']==$point["assigned_to"]) ? "selected" : "";
										if($dep!=$employee['department'])
										{?>
											<optgroup label="<?php echo $employee['department'];?>">
											<?php	
											$dep = $employee['department'];									
										}
										?>
										<option value="<?php echo $employee['id'];?>" <?php echo $selected;?>><?php echo ucwords($employee['empName']);?></option>
										
										<?php
										if($dep!=$employee['department'])
										{ ?></optgroup><?php  }
									}?>
								</select>                           
								<input type="date" class="form-control flatpickr-date" placeholder="Due date" name="due_date[]" value="<?php echo $point["due_date"];?>" required>
							</div>
							<div class="form-group col-md-1">                           
								<a  href="javascript:void(0);" id="" class="btn btn-danger btn-xs remove_point" title="Remove point"><span class="ion ion-md-close-circle"></span></a>
							</div>
						</div>	
                    <?php
                    }?>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-right mt-3">
            <button type="submit" class="btn btn-primary">Save changes</button>&nbsp;
            <button type="button" class="btn btn-default">Cancel</button>
        </div>  
    </form>    
    <!-- </div> -->
</div>    
</div>
<!-- / Content -->
