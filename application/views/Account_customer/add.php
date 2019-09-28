
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
            		<?php echo form_open('Account_customer/add'); ?>

					<div class="row clearfix">
						<div class="col-md-6">
							<label for="name" class="form-label"><span class="text-danger">*</span>Name</label>
							<div class="form-group">
								<input type="text" name="name" value="<?php echo $this->input->post('name'); ?>" class="form-control" id="name" />
								<span class="text-danger"><?php echo form_error('name');?></span>
							</div>
						</div>
						<div class="col-md-6">
							<label for="email" class="form-label"><span class="text-danger">*</span>Email</label>
							<div class="form-group">
								<input type="text" name="email" value="<?php echo $this->input->post('email'); ?>" class="form-control" id="email" />
								<span class="text-danger"><?php echo form_error('email');?></span>
							</div>
						</div>
						<div class="col-md-6">
							<label for="phone" class="form-label"><span class="text-danger">*</span>Phone</label>
							<div class="form-group">
								<input type="text" name="phone" value="<?php echo $this->input->post('phone'); ?>" class="form-control" id="phone" />
								<span class="text-danger"><?php echo form_error('phone');?></span>
							</div>
						</div>
						<div class="col-md-6">
							<label for="address" class="form-label"><span class="text-danger">*</span>Address</label>
							<div class="form-group">
								<input type="text" name="address" value="<?php echo $this->input->post('address'); ?>" class="form-control" id="address" />
								<span class="text-danger"><?php echo form_error('address');?></span>
							</div>
						</div>
						<div class="col-md-6">
						<label class="form-label">Tax</label>
						<span class="text-danger">*</span>
						<select class="custom-select" name="tax" required>
						<option value="">Select tax</option>
						<?php foreach($Tax as $tax){?>
                			<option value="<?= $tax['id'];?>"><?=$tax['name'];?></option>    
        				<?php }?>
						</select>
						</div>
					</div>
							</div>
							<br>
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
