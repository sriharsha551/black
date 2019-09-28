 
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
        <h6 class="card-header">Edit</h6>
        <div class="card-body"> 
            <div class="box-body">
                <?php echo form_open('Account_types/edit/'.$type_detail['id']); ?>

                <div class="row clearfix">
                    <div class="col-md-6">
                        <label for="name" class="form-label"><span class="text-danger">*</span>Name</label>
                        <div class="form-group">
                            <input type="text" name="name" value="<?php echo ($this->input->post('name') ? $this->input->post('name') : $type_detail['name']); ?>" class="form-control" id="name" />
                            <span class="text-danger"><?php echo form_error('name');?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
							<label  class="form-label"><span class="text-danger">*</span>Group</label>
							<div class="form-group">
                            <select name="group_id" class="form-control">
								<option value="">Select Group</option>
								<?php foreach ($group_list as $group) { ;?>
									<option value="<?php echo $group['id'];?>" <?php echo ($this->input->post('group_id') == $group['id'] || $type_detail['group_id'] == $group['id']  ) ? 'selected="selected"' : ""; ?>>
										<?php echo $group['name'];?>
									</option>
								<?php } ?>
                            </select>
								<span class="text-danger"><?php echo form_error('enabled');?></span>
							</div>
						</div>
                    <div class="col-md-6">
						<label for="enabled" class="form-label"><span class="text-danger">*</span>Enabled</label>
						<div class="form-group">
                            <select name="enabled" class="form-control">
                                <option value="1" <?php echo ($this->input->post('enabled') == "1" || $type_detail['enabled'] == "1") ? 'selected="selected"' : ""; ?>>Yes</option>
                                <option value="0" <?php echo ($this->input->post('enabled') == "0" || $type_detail['enabled'] == "0") ? 'selected="selected"' : ""; ?>>No</option>
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
