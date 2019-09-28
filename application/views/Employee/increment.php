<!-- Increment form -->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- Layout content -->
<div class="layout-content">

<!-- Content -->
<div class="container-fluid flex-grow-1 container-p-y">

<h4 class="font-weight-bold py-3 mb-4">
	<span class="text-muted font-weight-light"><?php echo $pagetitle; ?></span>
	<?php echo $breadcrumb; ?>
</h4>

<div class="card mb-4">
              <h6 class="card-header">
                Increament Form
              </h6>
              <div class="card-body">
                <form method="post" target="_blank" action="http://localhost/purple/Createpdf/generateIncrementPDF">
                  <div class="form-row">
                    <!-- <div class="form-group col-md-6">
                      <label class="form-label">Prefix</label>
                      <select class="custom-select" name="prefix" required>
                        <option value="">Select</option>
                        <option value="Mr">Mr</option>
                        <option value="Mrs">Mrs</option>
                        <option value="Miss">Miss</option>
                        
                      </select>
                    </div> -->
                    <div class="form-group col-md-6">
                      <label class="form-label">Employee Name</label>
                      <select class="custom-select" name="empName" required>
                        <option value="">Select Employee</option>
                        <?php foreach($employee as $e) { ?>
                          <option value="<?php echo $e['id'];?>"><?php echo $e["empName"];?></option>
                        <?php }?>  
                        
                      </select>
                    </div>
                    
                  </div>
                  
                  <div class="form-row">
                    <div class="form-group col-md-2">
                      <label class="form-label">Revised To</label>
                      <input type="text" name="amount" class="form-control" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label class="form-label">In Words</label>
                      <input type="text" name="in_words" class="form-control" required>
                    </div>
                    <div class="form-group col-md-4">
                      <label class="form-label">From</label>
                      <input type="text" name="revised_from" class="form-control" id="datepicker-base" required>
                    </div>
                  </div>
                  
                  <button type="submit" class="btn btn-primary">Generate</button>
                </form>
              </div>
            </div>



</div>
<!-- / Content -->
