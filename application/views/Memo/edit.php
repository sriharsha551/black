<!-- joing form -->
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
                    <a class="nav-link active" data-toggle="tab" href="#user-edit-account">Details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#user-edit-info">Employees</a>
                </li>
            </ul>
            <div class="tab-content">
            
                <div class="tab-pane fade show active" id="user-edit-account">
                    <div class="card-body memo_block">
                        
                        <div class="form-group col-md-6">
                            <label class="form-label">Memo Id</label>
                            <input type="text" class="form-control" placeholder=""name="memo_id" value="<?php echo $memo['memo_id'];?>" required>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label class="form-label">Date</label>
                            <input type="date" class="form-control" placeholder="Select Date" name="memo_date" value="<?php echo $memo['memo_date'];?>" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" placeholder="Memo Title" name="memo_name" value="<?php echo $memo['memo_name'];?>" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Type</label>
                            <select class="custom-select" name="memo_type" required>  
                                <option value="">Select</option>                  
                                <option value="Circular" <?php echo ($memo['memo_type'] ==  'Circular') ? ' selected="selected"' : "";?>>Circular</option>
                                <option value="Activity" <?php echo ($memo['memo_type'] ==  'Activity') ? ' selected="selected"' : "";?>>Activity</option>
                                <option value="Notice" <?php echo ($memo['memo_type'] ==  'Notice') ? ' selected="selected"' : "";?>>Notice</option>
                                <option value="Meeting" <?php echo ($memo['memo_type'] ==  'Meeting') ? ' selected="selected"' : "";?>>Meeting</option>                    
                            </select>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label class="form-label">Project</label>
                            <select class="custom-select" name="project_id">  
                                <option value="">Select</option>
                                <?php foreach($projects as $project) {
                                    $selected = ($project['id']== $memo['project_id']) ? "selected" : ""; ?>
                                    <option value="<?php echo $project['id'];?>" <?php echo $selected;?> > <?php echo $project['project'];?></option>
                                    <?php 
                                }?>                  
                                
                                            
                            </select>
                        </div>
                        
                        <div class="form-group col-md-12">
                            <label class="form-label">Description</label>
                            <textarea id="bs-markdown" class="form-control" rows="10"  name="description" required><?php echo $memo['description'];?></textarea>
                        </div>
                       
                    </div>
                </div>
                <div class="tab-pane fade" id="user-edit-info">
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
            </div>
        </div>

        <div class="text-right mt-3">
            <button type="submit" class="btn btn-primary">Save changes</button>&nbsp;
           <!--  <button type="button" class="btn btn-default">Cancel</button> -->
        </div>   
    </form>    
    <!-- </div> -->
</div>    
</div>
<!-- / Content -->
