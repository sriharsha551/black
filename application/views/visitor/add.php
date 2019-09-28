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
          <h6 class="card-header">ADD</h6>
			<div class="card-body">
				<div class="col-md-12">
                <?php echo form_open('visitor/add', array("class" => "form-row")); ?>    
                    <div class="form-group col-md-6">
                        <label for="name" class="form-label"><span class="text-danger">*</span>Name</label>
                        <div class="">
                            <input type="text" name="name" value="<?php echo $this->input->post('name'); ?>" class="form-control" id="name" />
                            <span class="text-danger"><?php echo form_error('name'); ?></span>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="requirement" class="form-label"><span class="text-danger">*</span>Requirement</label>
                        <div class="">
                            <input type="text" name="requirement" value="<?php echo $this->input->post('requirement'); ?>" class="form-control" id="requirement" />
                            <span class="text-danger"><?php echo form_error('requirement'); ?></span>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="proffession" class="form-label">profession</label>
                        <div class="">
                            <input type="text" name="proffession" value="<?php echo $this->input->post('proffession'); ?>" class="form-control" id="proffession" />
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="mobile" class="form-label">Mobile</label>
                        <div class="">
                            <input type="text" name="mobile" value="<?php echo $this->input->post('mobile'); ?>" class="form-control" id="mobile" />
                            <span class="text-danger"><?php echo form_error('mobile'); ?></span>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <div class="">
                            <input type="text" name="email" value="<?php echo $this->input->post('email'); ?>" class="form-control" id="email" />
                            <span class="text-danger"><?php echo form_error('email'); ?></span>
                        </div>
                    </div>
                    
                    <div class="form-group col-md-6 visitors_hear">
                        <label for="hear_from" class="control-label"><strong>Hear From</strong></label>
                        <label class="custom-control custom-radio custom-control-inline">
                            <input type="checkbox" class="custom-control-input" name="hear_from" value="Brochure"  id="" /><span class="custom-control-label">Brochure</span>
                        </label>
                        <label class="custom-control custom-radio custom-control-inline">
                            <input type="checkbox" class="custom-control-input" name="hear_from" value="Hoarding"  id="" /><span class="custom-control-label">Hoarding</span>
                        </label>
                        <label class="custom-control custom-radio custom-control-inline">
                            <input type="checkbox" class="custom-control-input" name="hear_from" value="Referal"  id="" /><span class="custom-control-label">Referal</span>
                        </label>
                        <label class="custom-control custom-radio custom-control-inline">
                            <input type="checkbox" class="custom-control-input" name="hear_from" value="Other"  id="" /><span class="custom-control-label">Other</span>
                        </label>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="referred_by" class="form-label">Referred By</label>
                        <div class="">
                            <input type="text" name="referred_by" value="<?php echo $this->input->post('referred_by'); ?>" class="form-control" id="referred_by" />
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        
                        
                    </div>
                    <div class="form-group col-md-6">
                        <label for="address" class="form-label">Address</label>
                        <div class="">
                            <textarea name="address" class="form-control" id="address"><?php echo $this->input->post('address'); ?></textarea>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="comments" class="form-label">Comments</label>
                        <div class="">
                            <textarea name="comments" class="form-control" id="comments"><?php echo $this->input->post('comments'); ?></textarea>
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <div class="">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </div>

                <?php echo form_close(); ?>
			</div>
            </div>
		</div>
	</div>
</div>
<!-- / Content -->