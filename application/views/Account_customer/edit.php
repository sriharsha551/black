
<!-- Content -->
<div class="container-fluid flex-grow-1 container-p-y">

<h4 class="font-weight-bold py-2 mb-4">
	<span class="text-muted font-weight-light"><?php echo $pagetitle; ?></span>
	<?php echo $breadcrumb; ?>
</h4>
      	<div class="card mb-4">
          <h6 class="card-header">Account_customer Edit</h6>
            
            <div class="box card">
                <div class="card-body"> 
                    <div class="box-body"> 
			<?php echo form_open('Account_customer/edit/'.$Account_customer['id']); ?>
		
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="name" class="control-label"><span class="text-danger">*</span>Name</label>
						<div class="form-group">
							<input type="text" name="name" value="<?php echo ($this->input->post('name') ? $this->input->post('name') : $Account_customer['name']); ?>" class="form-control" id="name" />
							<span class="text-danger"><?php echo form_error('name');?></span>
						</div>
					</div>
					<?php if($Account_customer['enabled']=='0')
                            {
                                $Account_customer['enabled']='Yes';
                            }
                            else
                            {
                                $Account_customer['enabled']='No';
                            }?>
					<div class="col-md-6">
						<label for="email" class="control-label"><span class="text-danger">*</span>Email</label>
						<div class="form-group">
							<input type="text" name="email" value="<?php echo ($this->input->post('email') ? $this->input->post('email') : $Account_customer['email']); ?>" class="form-control" id="email" />
							<span class="text-danger"><?php echo form_error('email');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="phone" class="control-label"><span class="text-danger">*</span>Phone</label>
						<div class="form-group">
							<input type="text" name="phone" value="<?php echo ($this->input->post('phone') ? $this->input->post('phone') : $Account_customer['phone']); ?>" class="form-control" id="phone" />
							<span class="text-danger"><?php echo form_error('phone');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="address" class="control-label"><span class="text-danger">*</span>Address</label>
						<div class="form-group">
							<input type="text" name="address" value="<?php echo ($this->input->post('address') ? $this->input->post('address') : $Account_customer['address']); ?>" class="form-control" id="address" />
							<span class="text-danger"><?php echo form_error('address');?></span>
						</div>
					</div>
					<div class="form-group col-md-6">					
					<label class="form-label">Tax</label>
						<select class="custom-select" name="tax" required>
						<option value="<?= $Account_customer['tax'][0]['id'];?>" ><?= $Account_customer['tax'][0]['name'];?></option>
						<?php foreach($Tax as $tax){?>
                			<option value="<?=$tax['id'];?>"><?=$tax['name'];?></option>    
        				<?php }?>
						</select>
						</div>

					<div class="form-group col-md-6">
					<label class="form-label">Enabled</label>
						<select class="custom-select" name="enabled" required>
						<option value="<?= $Account_customer['enabled'];?>" ><?= $Account_customer['enabled'];?></option>
                			<option value="0">Yes</option>
							<option value="1">No</option>    
						</select>
						</div>
				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Save
				</button>
	        </div>				
			<?php echo form_close(); ?>
		</div>  </div></div>
        


</div>
<!-- / Content -->