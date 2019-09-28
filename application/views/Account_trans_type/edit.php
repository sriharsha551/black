
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
            		<?php echo form_open('Account_trans_type/edit/'.$type['id']); ?>

					<div class="row clearfix">
						<div class="col-md-6">
							<label for="trans" class="form-label"><span class="text-danger">*</span>Transaction Type</label>
							<div class="form-group">
								<input type="text" name="trans_type" value="<?php echo ($this->input->post('trans_type') ? $this->input->post('trans_type') : $type['trans_type']); ?>" class="form-control" id="trans" />
								<span class="text-danger"><?php echo form_error('trans_type');?></span>
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
