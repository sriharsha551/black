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
        <h6 class="card-header">Basic details</h6>
        <div class="card-body">
            <div class="col-md-12">
            
            <form action="" method="post" class="row">
                <div class="form-group col-md-6">
                    <label class="form-label">Employee Id : </label>
                    <div><?php echo $employee['empId'];?></div>
                </div>
                <div class="form-group col-md-6">
                    <label class="form-label">Name of the employee</label>
                    <?php echo $employee['empName'];?>
                </div>
                <div class="form-group col-md-6">
                    <label class="form-label">Designation</label><?php echo $employee['Designation'];?>
                    
                </div>
                <div class="form-group col-md-6">
                    <label class="form-label">Department</label><?php echo $employee['Department'];?>
                   
                </div>
                
                <div class="form-group col-md-6">
                    <label class="form-label">Present Address</label><?php echo $employee['presentAddress'];?>
                 
                </div>
                <div class="form-group col-md-6">
                    <label class="form-label mr-3">Permanent Address</label> 
                    <?php echo $employee['permanentAddress'];?>
                </div>
                <div class="form-group col-md-6">
                    <label class="form-label">Contact No</label>
                    <?php echo $employee['phone'];?>
                </div>
                <div class="form-group col-md-6">
                    <label class="form-label">Email Id</label>
                    <?php echo $employee['email'];?>
                </div>
                <div class="form-group col-md-6">
                    <label class="form-label">Joining Date</label>
                   
                </div>
                
                <div class="col-md-12">
                    <h5 class="card-header col-md-12 mb-3 custom-header">personal details</h5>

                    
                    <div class="form-group">
                    <label class="form-label mr-4">Gender</label> <?php echo $employee['gender'];?>
                        
                    </div>

                    <label class="form-label">Family Details</label>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Relation</th>
                                <th>Occupation</th>
                                <th>Contact Number</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($families as $family) {?>
                            <tr>
                                <td><?php echo $family['fullName'];?></td>
                                <td><?php echo $family['relation'];?></td>
                                <td><?php echo $family['occupation'];?></td>
                                <td><?php echo $family['phone'];?></td>
                            </tr>
                        <?php }?>    
                           
                        </tbody>
                    </table>
                </div>

                <div class="col-md-12">
                    <label class="form-label">Education Qualification (Start with School leaving certificate or Equivalent)</label>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Qualification</th>
                                <th>University / Institute</th>
                                <th>Year of Passing</th>
                                <th>% of marks</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($education as $edu){?>
                            <tr>
                                <td><?php echo $edu['qualification'];?></td>
                                <td><?php echo $edu['institute'];?></td>
                                <td><?php echo $edu['yearOfPassing'];?></td>
                                <td><?php echo $edu['marks'];?></td>
                            </tr>
                        <?php }?>    
                            
                         
                        </tbody>
                    </table>
                </div>

               
            
                </div>
            </div>
        </div>
    </div>
</div>

    

</form>
</div>
<!-- / Content -->
