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
                <?php echo form_open('project/edit/'.$project['id'],array("class"=>"form-row")); ?>

                    <div class="form-group col-md-6">
                        <label for="status" class="form-label">Status</label>
                        <div class="">
                            <select name="status" class="custom-select">
                                <option value="">select</option>
                                <?php 
                                $status_values = array(
                                    '0'=> 'On hold',
                                    '1'=> 'On Process',
                                    '2'=> 'Completed',
                                    '3'=> 'Cancelled',                                    
                                );

                                foreach($status_values as $value => $display_text)
                                {
                                    $selected = ($value == $project['status']) ? ' selected="selected"' : "";

                                    echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
                                } 
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="project" class="form-label"><span class="text-danger">*</span>Project</label>
                        <div class="">
                            <input type="text" name="project" value="<?php echo ($this->input->post('project') ? $this->input->post('project') : $project['project']); ?>" class="form-control" id="project" />
                            <span class="text-danger"><?php echo form_error('project');?></span>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="client" class="form-label"><span class="text-danger">*</span>Client</label>
                        <div class="">
                            <input type="text" name="client" value="<?php echo ($this->input->post('client') ? $this->input->post('client') : $project['client']); ?>" class="form-control" id="client" />
                            <span class="text-danger"><?php echo form_error('client');?></span>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="place" class="form-label"><span class="text-danger">*</span>Place</label>
                        <div class="">
                            <input type="text" name="place" value="<?php echo ($this->input->post('place') ? $this->input->post('place') : $project['place']); ?>" class="form-control" id="place" />
                            <span class="text-danger"><?php echo form_error('place');?></span>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="enquiry_no" class="form-label"><span class="text-danger">*</span>Enquiry No</label>
                        <div class="">
                            <input type="text" name="enquiry_no" value="<?php echo ($this->input->post('enquiry_no') ? $this->input->post('enquiry_no') : $project['enquiry_no']); ?>" class="form-control" id="enquiry_no" />
                            <span class="text-danger"><?php echo form_error('enquiry_no');?></span>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="project_no" class="form-label"><span class="text-danger">*</span>Project No</label>
                        <div class="">
                            <input type="text" name="project_no" value="<?php echo ($this->input->post('project_no') ? $this->input->post('project_no') : $project['project_no']); ?>" class="form-control" id="project_no" />
                            <span class="text-danger"><?php echo form_error('project_no');?></span>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="mobile1" class="form-label"><span class="text-danger">*</span>Mobile1</label>
                        <div class="">
                            <input type="text" name="mobile1" value="<?php echo ($this->input->post('mobile1') ? $this->input->post('mobile1') : $project['mobile1']); ?>" class="form-control" id="mobile1" />
                            <span class="text-danger"><?php echo form_error('mobile1');?></span>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="mobile2" class="form-label">Mobile2</label>
                        <div class="">
                            <input type="text" name="mobile2" value="<?php echo ($this->input->post('mobile2') ? $this->input->post('mobile2') : $project['mobile2']); ?>" class="form-control" id="mobile2" />
                            <span class="text-danger"><?php echo form_error('mobile2');?></span>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="project_date" class="form-label"><span class="text-danger">*</span>Project Date</label>
                        <div class="">
                            <input type="text" name="project_date" value="<?php echo ($this->input->post('project_date') ? $this->input->post('project_date') :date("d-m-Y",strtotime($project['project_date']))); ?>" class="form-control" id="datepicker-inline" />
                            <span class="text-danger"><?php echo form_error('project_date');?></span>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="discription" class="form-label">Discription</label>
                        <div class="">
                            <textarea name="discription" class="form-control" id="discription"><?php echo ($this->input->post('discription') ? $this->input->post('discription') : $project['discription']); ?></textarea>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="address" class="form-label">Address</label>
                        <div class="">
                            <textarea name="address" class="form-control" id="address"><?php echo ($this->input->post('address') ? $this->input->post('address') : $project['address']); ?></textarea>
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