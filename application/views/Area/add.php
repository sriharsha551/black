
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
				<?php echo form_open_multipart('Area/add'); ?>
				   <div class="row clearfix">
			
				<div class="col-md-6">
						 
							<label for="prj_id" class="col-md-6"><span class="text-danger">*</span>project Name</label>
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
							<label for="area" class="form-label"><span class="text-danger">*</span>Area</label>
							<div class="form-group">
								<input type="text" name="area" value="<?php echo $this->input->post('area'); ?>" class="form-control" id="area" />
								<span class="text-danger"><?php echo form_error('area');?></span>
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
</div>    


<!-- / Content -->
