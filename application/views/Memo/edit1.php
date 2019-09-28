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

    <div class="card mb-4">
        <h6 class="card-header">Memo details</h6>
        <div class="card-body">
            <div class="col-md-12">
            <form action="" method="post" class="row">
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
                        <?php foreach($projects as $project) {
                            $selected = ($project['id']== $memo['project_id']) ? "selected" : ""; ?>
                            <option value="<?php echo $project['id'];?>" <?php echo $selected;?> > <?php echo $project['project'];?></option>
                            <?php 
                        }?>                  
                        
                                     
                    </select>
                </div>
                
                <div class="form-group col-md-12">
                    <label class="form-label">Description</label>
                    <textarea class="form-control"  name="description" required><?php echo $memo['description'];?></textarea>
                </div>
                
                <div class="col-md-12">
                    <h5 class="card-header col-md-12 mb-3 custom-header">Employees</h5>   
                </div> 

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
                    <div class="form-group col-md-4">
                        <label class="custom-control custom-control-inline custom-checkbox">
                            <input name="employees[]"  type="checkbox" class="custom-control-input" value="<?php echo $employee['id'];?>">
                            <span class="custom-control-label"><?php echo ucwords($employee['empName']);?></span>
                           
                            
                            <div class="form-group">
                                <label class="switcher">
                                    <input type="checkbox" class="switcher-input" >
                                    <span class="switcher-indicator">
                                    <span class="switcher-yes"></span>
                                    <span class="switcher-no"></span>
                                    </span>
                                    
                                </label>
                            </div>

                        </label>    
                        </label>
                                           
                    </div>
                    <?php
                }?>
                
               
                
                <div class="form-group col-md-12">
                    <input type="submit" name="submit" value="submit" class="btn btn-success">
                </div>
            
                </div>
            </div>
        </div>
    </div>
</div>

    

</form>
</div>
<!-- / Content -->
