
<!-- Content -->
<div class="container-fluid flex-grow-1 container-p-y">

<h4 class="font-weight-bold py-2 mb-4">
	<span class="text-muted font-weight-light"><?php echo $pagetitle; ?></span>
	<?php echo $breadcrumb; ?>
</h4>
      	<div class="card mb-4">
          <h6 class="card-header">Stage Edit</h6>
            
            <div class="box card">
                                    <div class="card-body"> 
                                    	<div class="box-body"> 
			<?php echo form_open('Prj_dsg_stage/edit/'.$stage['id']); ?>
		
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="stage" class="control-label"><span class="text-danger">*</span>Stage</label>
						<div class="form-group">
							<input type="text" name="stage" value="<?php echo ($this->input->post('stage') ? $this->input->post('stage') : $stage['design_stage']); ?>" class="form-control" id="stage" />
							<span class="text-danger"><?php echo form_error('stage');?></span>
						</div>
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