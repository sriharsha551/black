
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
            		<?php echo form_open('Account_coa/add'); ?>

					<div class="row clearfix">
						<div class="col-md-6">
							<label for="name" class="form-label"><span class="text-danger">*</span>Name</label>
							<div class="form-group">
								<input type="text" name="name" value="<?php echo $this->input->post('name'); ?>" class="form-control" id="name" />
								<span class="text-danger"><?php echo form_error('name');?></span>
							</div>
						</div>
						<div class="col-md-6">
							<label  class="form-label"><span class="text-danger">*</span>Type</label>
							<div class="form-group">
							<select name="type_id" class="form-control">
									<option value="">Select Type</option>
									<?php foreach(array_keys($dropdown_data) as $group) {?>
										<optgroup label="<?php echo $group;?>">
											<?php foreach($dropdown_data[$group] as $type) { ?>
												<option value="<?php echo $type['id'];?>" <?php echo $this->input->post('type_id') == $type['id'] ? 'selected="selected"' : ""; ?>>
													<?php echo $type['name'];?>
												</option>
											<?php } ?>
										</optgroup>
									<?php }?>
							</select>
								<span class="text-danger"><?php echo form_error('enabled');?></span>
							</div>
						</div>
                        <div class="col-md-6">
							<label for="enabled" class="form-label"><span class="text-danger">*</span>Enabled</label>
							<div class="form-group">
                            <select name="enabled" class="form-control">
                                <option value="1" <?php echo $this->input->post('enabled') == "1" ? 'selected="selected"' : ""; ?>>Yes</option>
                                <option value="0" <?php echo $this->input->post('enabled') == "0" ? 'selected="selected"' : ""; ?>>No</option>
                            </select>
								<span class="text-danger"><?php echo form_error('enabled');?></span>
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
