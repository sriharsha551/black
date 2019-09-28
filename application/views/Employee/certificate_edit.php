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
        <h6 class="card-header">Certificates Received</h6>
        <div class="card-body">
            <div class="col-md-12">
            <?php echo $message;?>
            <form action="" method="post" class="row">
                <div class="form-group col-md-6">
                    <label class="form-label">Employee Id</label>
                    <input type="text" class="form-control" placeholder=""name="empId" disabled value="<?php echo $employee['empId'];?>" required>
                </div>
                <div class="form-group col-md-6">
                    <label class="form-label">Name of the employee</label>
                    <input type="text" class="form-control" placeholder="Name" disabled name="empName" value="<?php echo $employee['empName'];?>" required>
                </div>
                
                
               

                <div class="col-md-12">
                    <h5 class="card-header col-md-12 mb-3 custom-header">Documents Received</h5>   
                </div>     
                <div class="form-group col-md-12">
                    <label class="custom-control custom-checkbox m-0">
                    <?php $checked = ($employee['original_certificate']== "1") ? "checked" : "" ;?>
                        <input type="checkbox" name="original_certificate" value="1" class="custom-control-input" <?php echo $checked;?>/>
                        <span class="custom-control-label">Original Certificate</span>
                    </label>
                </div>
                <div class="form-group col-md-12">
                    <label class="custom-control custom-checkbox m-0">
                    <?php $checked = ($employee['experience_certificate']== "1") ? "checked" : "" ;?>
                        <input type="checkbox" name="experience_certificate" value="1" class="custom-control-input" <?php echo $checked;?>/>
                        <span class="custom-control-label">Copy of Experience Certificate</span>
                    </label>
                </div>
                <div class="form-group col-md-12">
                    <label class="custom-control custom-checkbox m-0">
                    <?php $checked = ($employee['id_proof']== "1") ? "checked" : "" ;?>
                        <input type="checkbox" name="id_proof" value="1" class="custom-control-input" <?php echo $checked;?>/>
                        <span class="custom-control-label">ID Proof</span>
                    </label>
                </div>
                <div class="form-group col-md-12">
                    <label class="custom-control custom-checkbox m-0">
                    <?php $checked = ($employee['education_certificate']== "1") ? "checked" : "" ;?>
                        <input type="checkbox" name="education_certificate" value="1" class="custom-control-input" <?php echo $checked;?>/>
                        <span class="custom-control-label">Copy of Educational Certificate</span>
                    </label>
                </div>
                <div class="form-group col-md-12">
                    <label class="custom-control custom-checkbox m-0">
                    <?php $checked = ($employee['photos']== "1") ? "checked" : "" ;?>
                        <input type="checkbox" name="photos" value="1" class="custom-control-input" <?php echo $checked;?>/>
                        <span class="custom-control-label">2 Photographs</span>
                    </label>
                </div>
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
