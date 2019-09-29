
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
            <h6 class="card-header">EDIT</h6>
			<div class="card-body"> 
				<div class="box-body"> 
            		<?php echo  form_open('Credit_days/edit/'.$credit['id']); ?>
                    <div class="row clearfix">
						<div class="col-md-6">
                        <div class="form-group">
                                <label for="name" class="form-label"><span class="text-danger">*</span>Name</label>
								<input type="text" name="name" value="<?php echo $this->input->post('name') ?  $this->input->post('name') : $credit['name']; ?>" class="form-control" id="name" />
								<span class="text-danger"><?php echo form_error('name');?></span>
                            </div>
                		<div class="box-footer">
						<button type="submit" class="btn btn-success">
							<i class="fa fa-check"></i> Sav	</button>
					</div>
            		<?php echo form_close(); ?>
      			</div>
        
     		</div>
		</div>    
	</div>
<!-- / Content -->
