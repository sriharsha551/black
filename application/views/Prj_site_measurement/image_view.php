
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
            <h6 class="card-header">Attachment view</h6>
			<div class="card-body"> 
				<div class="box-body"> 
            		<?php echo form_open('Prj_site_measurements/update_remarks/'.$id); ?>

					<div class="row clearfix">
						<div class="col-md-6">
                        <a target="_blank" href="<?php echo site_url($imagepath) ;?>"><img src="<?php echo site_url($imagepath) ;?>" class="img-fluid" /></a>
                        <div class="form-group">
                            <label class="form-label">Remarks</label>
                            <input type="text" name="remarks" class="form-control"/>
                        </div>
                        </div>
					</div>
				
					<div class="box-footer">
						<button type="submit" class="btn btn-success">
							<i class="fa fa-check"></i> Add Remarks
						</button>
					</div>
            		<?php echo form_close(); ?>
      			</div>
        
     		</div>
		</div>    
	</div>
<!-- / Content -->
