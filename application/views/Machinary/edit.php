
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
            		<?php echo  form_open('Machinary/edit/'.$tool['id']); ?>
                    <div class="row clearfix">
						<div class="col-md-6">
                        <div class="form-group">
                                <label for="tool_name" class="form-label"><span class="text-danger">*</span>Tool Name</label>
								<input type="text" name="tool_name" value="<?php echo $this->input->post('tool_name') ?  $this->input->post('tool_name') : $tool['tool_name']; ?>" class="form-control" id="tool_name" />
								<span class="text-danger"><?php echo form_error('tool_name');?></span>
                            </div>
							<div class="form-group">
                                <label for="qty" class="form-label"><span class="text-danger">*</span>Quantity</label>
								<input type="text" name="qty" value="<?php echo $this->input->post('qty') ?  $this->input->post('qty') : $tool['qty']; ?>" class="form-control" id="qty" />
								<span class="text-danger"><?php echo form_error('qty');?></span>
                            </div>
                		<div class="box-footer">
						<button type="submit" class="btn btn-success">
							<i class="fa fa-check"></i> Save	</button>
					</div>
            		<?php echo form_close(); ?>
      			</div>
        
     		</div>
		</div>    
	</div>
<!-- / Content -->
