
<div class="layout-content">

<!-- Content -->
<div class="container-fluid flex-grow-1 container-p-y">

	<h4 class="font-weight-bold py-2 mb-4">
		<span class="text-muted font-weight-light"><?php echo $pagetitle; ?></span>
		<?php echo $breadcrumb; ?>
	</h4>

	<div class="card mb-4">
		<h6 class="card-header">Add</h6>
		<div class="card-body"> 
			<div class="box-body"> 
				<?php echo form_open_multipart('Labour_details/add'); ?>
				   <div class="row clearfix">
			
				<div class="col-md-6">
						 
							<label for="prj_id" class="col-md-6"><span class="text-danger">*</span>Project Name</label>
							<div class="form-group">
						   <select name="prj_id" class="form-control" id="prj_id"  required>
							<option value="">Select project</option>
							<?php foreach ($prj as $p) { ?>
							<option value="<?php echo $p['id']; ?>" <?php echo ($this->input->post('prj_id') == $p['id']) ? 'selected="selected"' : ""; ?> ><?php echo $p['name']; ?></option>
							<?php } ?>
						</select>

				 </div>
				 </div> 
                 
				<div class="col-md-6">
						 
                         <label for="trade_id" class="col-md-6"><span class="text-danger">*</span>Trade Name</label>
                         <div class="form-group">
                        <select name="trade_id" class="form-control" id="trade_id"  required>
                         <option value="">Select trade</option>
                         <?php foreach ($trade as $p) { ?>
                         <option value="<?php echo $p['id']; ?>" <?php echo ($this->input->post('trade_id') == $p['id']) ? 'selected="selected"' : ""; ?> ><?php echo $p['trade_name']; ?></option>
                         <?php } ?>
                     </select>

              </div>
              </div> 
				 <div class="col-md-6">
							<label for="general_time" class="form-label"><span class="text-danger">*</span>General Hours</label>
							<div class="form-group">
								<input type="text" name="general_time" value="<?php echo $this->input->post('general_time'); ?>" class="form-control" id="general_time" />
								<span class="text-danger"><?php echo form_error('general_time');?></span>
							</div>
				</div>

                <div class="col-md-6">
							<label for="over_time" class="form-label"><span class="text-danger">*</span>OverTime hours</label>
							<div class="form-group">
								<input type="text" name="over_time" value="<?php echo $this->input->post('over_time'); ?>" class="form-control" id="over_time" />
								<span class="text-danger"><?php echo form_error('over_time');?></span>
							</div>
				</div>
                <div class="col-md-6">
							<label for="date" class="form-label"><span class="text-danger">*</span>Date</label>
							<div class="form-group">
								<input type="date" name="date" value="<?php echo $this->input->post('date'); ?>" class="form-control" id="date" />
								<span class="text-danger"><?php echo form_error('date');?></span>
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
