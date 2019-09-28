
<!-- Content -->
<!-- Layout content -->
<div class="layout-content">

	<!-- Content -->
	<div class="container-fluid flex-grow-1 container-p-y">

		<h4 class="font-weight-bold py-2 mb-4">
			<span class="text-muted font-weight-light"><?php echo $pagetitle; ?></span>
			<?php echo $breadcrumb; ?>
		</h4>
    
		<div class="card mb-4">
            <h6 class="card-header">ADD</h6>
			<div class="card-body"> 
				<div class="box-body"> 
            		<?php echo form_open_multipart('Suppliers/add'); ?>
                   	<div class="row clearfix">
					<div class="col-md-6">
                    <div class="form-group">
                                <label for="name" class="form-label"><span class="text-danger">*</span>NAME</label>
								<input type="text" name="name" value="<?php echo $this->input->post('name'); ?>" class="form-control" id="name" />
								<span class="text-danger"><?php echo form_error('name');?></span>
                            </div>
                            <div class="form-group">
                                <label for="email_id" class="form-label"><span class="text-danger">*</span>EMAIL ID</label>
								<input type="text" name="email_id" value="<?php echo $this->input->post('email_id'); ?>" class="form-control" id="email_id" />
								<span class="text-danger"><?php echo form_error('email_id');?></span>
							</div>
					 <div class="form-group">
                                <label for="contact_no_1" class="form-label"><span class="text-danger">*</span>CONTACT NUMBER</label>
								<input type="text" name="contact_no_1" value="<?php echo $this->input->post('contact_no_1'); ?>" class="form-control" id="contact_no_1" />
								<span class="text-danger"><?php echo form_error('contact_no_1');?></span>
                            </div>
                            <div class="form-group">
                                <label for="contact_no_2" class="form-label"><span class="text-danger">*</span>ALTERNATIVE NUMBER</label>
								<input type="text" name="contact_no_2" value="<?php echo $this->input->post('contact_no_2'); ?>" class="form-control" id="contact_no_2" />
								<span class="text-danger"><?php echo form_error('contact_no_2');?></span>
                            </div>
					 <div class="form-group">
								<label for="address" class="form-label"><span class="text-danger">*</span>ADDRESS</label>
								<input type="text" name="address" value="<?php echo $this->input->post('address'); ?>" class="form-control" id="address" />
								<span class="text-danger"><?php echo form_error('address');?></span>
                            </div>	
                    <div class="form-group">
								<label for="location" class="form-label"><span class="text-danger">*</span>LOCATION</label>
								<input type="text" name="location" value="<?php echo $this->input->post('location'); ?>" class="form-control" id="location" />
								<span class="text-danger"><?php echo form_error('location');?></span>
							</div>
						</div>
					</div>
					<div class="box-footer">
						<button type="submit" class="btn btn-success">
							<i class="fa fa-check"></i> Save
						</button>
					</div>
            		<?php echo form_close(); ?>
      			</div>
        
     		</div>
		</div>    
	</div>
<!-- / Content -->
