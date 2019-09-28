
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
            		<?php echo form_open_multipart('SiteVisitPics/add'); ?>
					
					<div class="row clearfix">
						<div class="col-md-6">
						<label class="form-label">ProjectId</label>
						<select class="custom-select" name="project_id" required>
						<option value="">Select project</option>
						<span class="text-danger"><?php echo form_error('project_id');?></span>
						<?php foreach($PROJECTS as $project){?>
                			<option value="<?=$project->id;?>"><?=$project->name;?></option>    
        				<?php }?>
						</select>
						</div>
						<div class="form-group col-md-6">
						<label for="attach_name" class="form-label">Choose files</label>
						<input type="file" name="attach_name" value="<?php echo $this->input->post('attach_name'); ?>" class="form-control" id="attach_name" />
						<span class="text-danger"><?php echo form_error('attach_name');?></span>
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
