
<!-- Content -->
<div class="container-fluid flex-grow-1 container-p-y">

<h4 class="font-weight-bold py-2 mb-4">
	<span class="text-muted font-weight-light"><?php echo $pagetitle; ?></span>
	<?php echo $breadcrumb; ?>
</h4>
      	<div class="card mb-4">
          <h6 class="card-header">Account_items Edit</h6>
            
            <div class="box card">
                <div class="card-body"> 
                    <div class="box-body"> 
			<?php echo form_open('Account_items/edit/'.$Account_items['id']); ?>
		
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="name" class="control-label"><span class="text-danger">*</span>Name</label>
						<div class="form-group">
							<input type="text" name="name" value="<?php echo ($this->input->post('name') ? $this->input->post('name') : $Account_items['name']); ?>" class="form-control" id="name" />
							<span class="text-danger"><?php echo form_error('name');?></span>
						</div>
					</div>
					<?php if($Account_items['enabled']=='0')
                            {
                                $Account_items['enabled']='Yes';
                            }
                            else
                            {
                                $Account_items['enabled']='No';
                            }?>
					<div class="col-md-6">
						<label for="price" class="control-label"><span class="text-danger">*</span>Unit Price</label>
						<div class="form-group">
							<input type="text" name="price" value="<?php echo ($this->input->post('price') ? $this->input->post('price') : $Account_items['price']); ?>" class="form-control" id="price" />
							<span class="text-danger"><?php echo form_error('price');?></span>
						</div>
					</div>
					<div class="form-group col-md-6">
					<label class="form-label">Enabled</label>
						<select class="custom-select" name="enabled" required>
						<option value="<?= $Account_items['enabled'];?>" ><?= $Account_items['enabled'];?></option>
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