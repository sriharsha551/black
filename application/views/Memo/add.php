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
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="user-add-account">
                    <div class="card-body memo_block">                         
                        <div class="form-group col-md-6">
                            <label class="form-label">Memo Id</label>
                            <input type="text" class="form-control" placeholder=""name="memo_id" value="<?php echo $memo_id;?>" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Date</label>
                            <input type="date" class="form-control" placeholder="Select Date" name="memo_date" value="" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" placeholder="Memo Title" name="memo_name" value="" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Type</label>
                            <select class="custom-select" name="memo_type" required>  
                                <option value="">Select</option>                  
                                <option value="Circular">Circular</option>
                                <option value="Activity">Activity</option>
                                <option value="Notice">Notice</option>
                                <option value="Meeting">Meeting</option>                    
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Project</label>
                            <select class="custom-select" name="project_id">  
                                <option value="">Select</option>
                                <?php foreach($projects as $project) {?>
                                    <option value="<?php echo $project['id'];?>"> <?php echo $project['project'];?></option>
                                    <?php 
                                }?>                  
                                                
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                        
                            <label class="form-label">Description</label>
                            <textarea id="bs-markdown" class="form-control" rows="10" name="description" required></textarea>
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
                                <label class="custom-control custom-checkbox m-0">
                                    <input type="checkbox" name="employees[]" class="custom-control-input employees" value="<?php echo $employee['id'];?>"/>
                                    <span class="custom-control-label"><?php echo ucwords($employee['empName']);?></span>
                                </label>
                            </div>
                            <?php
                        }?>
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="text-right mt-3">
            <button type="submit" class="btn btn-primary">Save changes</button>&nbsp;
      <!--       <button type="button" class="btn btn-default">Cancel</button> -->
        </div>  
    </form>    
    <!-- </div> -->
</div>    
</div>
<!-- / Content -->
