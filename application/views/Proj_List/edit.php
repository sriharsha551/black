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
            		<?php echo form_open('Project_List/edit/'.$project['id']); ?>

					<div class="row clearfix">
                        <div class="col-md-6">
                            <label for="type" class="form-label"><span class="text-danger">*</span>Type</label>
                            <div class="form-group">
								<select name="type" class="form-control">
                                    <option value="">Select </option>
                                    <?php foreach($types as $t) {?>
                                        <option value="<?php echo $t['id']?>" <?php echo ($project['type'] == $t['type']) ? ' selected="selected"' : "";?> ><?php echo $t['type']?></option>
                                    <?php }?>
                                </select>
                                <span class="text-danger"><?php echo form_error('type');?></span>
							</div>
                        </div>
                        <div class="col-md-6">
                            <label for="cat" class="form-label"><span class="text-danger">*</span>Category</label>
                            <div class="form-group">
								<select name="cat_name" class="form-control">
                                    <option value="">Select </option>
                                    <?php foreach($category as $t) {?>
                                        <option value="<?php echo $t['id']?>" <?php echo ($project['category'] == $t['category']) ? ' selected="selected"' : "";?> ><?php echo $t['category']?></option>
                                    <?php }?>
                                </select>
                                <span class="text-danger"><?php echo form_error('cat_name');?></span>
							</div>
                        </div>
						<div class="col-md-6">
							<label for="name" class="form-label"><span class="text-danger">*</span>Name</label>
							<div class="form-group">
                            <input type="text" name="pro_name" value="<?php echo ($this->input->post('name') ? $this->input->post('name') : $project['name']); ?>" class="form-control" id="type" />
								<span class="text-danger"><?php echo form_error('name');?></span>
							</div>
						</div>
                        <div class="col-md-6">
                            <label for="stage" class="form-label"><span class="text-danger">*</span>Stage</label>
                            <div class="form-group">
								<select name="stage" class="form-control">
                                    <option value="">Select </option>
                                    <?php foreach($stages as $t) {?>
                                        <option value="<?php echo $t['id']?>" <?php echo ($project['stage_name'] == $t['stage_name']) ? ' selected="selected"' : "";?>><?php echo $t['stage_name']?></option>
                                    <?php }?>
                                </select>
                                <span class="text-danger"><?php echo form_error('stage');?></span>
							</div>
                        </div>
                        <div class="col-md-12">
							<label for="remarks" class="form-label"><span class="text-danger"></span>Remarks</label>
							<div class="form-group">
								<input type="text" name="remarks" value="<?php echo ($this->input->post('remarks') ? $this->input->post('remarks') : $project['remarks']); ?>" class="form-control" id="remarks" />
								<span class="text-danger"><?php echo form_error('remarks');?></span>
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
